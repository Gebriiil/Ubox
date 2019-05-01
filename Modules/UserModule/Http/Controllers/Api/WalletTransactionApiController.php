<?php

namespace Modules\UserModule\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\UserModule\Repository\AddressRepository;
use JWTAuth;
use Modules\UserModule\Repository\WalletTransactionRepository;
use Validator;

class WalletTransactionApiController extends Controller
{

    use ApiResponseHelper;

    public $user;
    public $walletRepository;

    public function __construct(WalletTransactionRepository $walletRepository)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $this->walletRepository = $walletRepository;

    }

    public function withdraw(Request $request)
    {

        $rules = [
            'value' => 'required|numeric|min:0|not_in:0',
        ];
        // Validate Data
        $validator = $this->validate($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setCode(400)->setError($validator->messages())->send();
        }

        $data['value'] = $request->get('value');
        $data['user_id'] = $this->user->id;

        if ($this->user->wallet >= $data['value']) {
            $user_wallet = $this->walletRepository->withdraw($data);
            return $this->setCode(200)->setData($user_wallet)->send();
        }
        return $this->setCode(200)->setError("Value Greater Than Wallet Money")->send();

    }

    public function deposit(Request $request)
    {
        $rules = [
            'value' => 'required|numeric|min:0|not_in:0',
        ];
        // Validate Data
        $validator = $this->validate($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setCode(400)->setError($validator->messages())->send();
        }

        $data['value'] = $request->get('value');
        $data['user_id'] = $this->user->id;
        $user_wallet = $this->walletRepository->deposit($data);
        // $user_wallet = $user_wallet->load('transactions');
        return $this->setCode(200)->setData($user_wallet)->send();
    }

    public function history()
    {
        $history = $this->walletRepository->history($this->user);
        return $this->setCode(200)->setData($history)->send();
    }

    public function getWallet()
    {

        if (Carbon::parse($this->user->wallet_expired_at)->lt(Carbon::now()->format('Y-m-d'))) {
            $this->user->wallet = 0;
            $this->user->save();
        }
        $wallet = $this->user->wallet ?? 0;

        $walletar['wallet'] = $wallet;
        if (isset($this->user->birth_date)) {
            $walletar['birth'] =1;
        } else {
            $walletar['birth'] = 0;
        }
        return $this->setCode(200)->setData($walletar)->send();
    }
}

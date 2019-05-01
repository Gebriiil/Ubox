<?php

namespace Modules\UserModule\Repository;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;
use Modules\UserModule\Entities\User;
use Modules\UserModule\Entities\UserAddress;
use Modules\UserModule\Entities\WalletTransaction;
use Modules\UserModule\Repository\UserRepository;

class WalletTransactionRepository
{
     function transaction($data){
         DB::beginTransaction();
         try{
             $transaction = WalletTransaction::create($data);
             if ($transaction){
                 switch ($transaction->status){
                     case "withdraw":
                         $user_id = $transaction->user_id;
                         $user = User::find($user_id);
                         $user->wallet = $user->wallet - $transaction->value;
                         $user->save();
                         break;
                     case "deposit":
                         $user_id = $transaction->user_id;
                         $user = User::find($user_id);
                         $user->wallet = $user->wallet + $transaction->value;
                         $user->save();
                         break;
                     default:
                         DB::rollBack();
                         break;
                 }
             }else{
                 DB::rollBack();
             }
         }catch (\Exception $e){
             DB::rollBack();
             return null;
         }
         DB::commit();
         return $transaction;
     }

     function history(User $user){
         return $user->transactions;
     }

    function withdraw($data){
        // prepare history Data
        $transactionData['status'] = "withdraw";
        $transactionData['value'] = $data['value'] ?? 0;
        $user_id = $data['user_id'];
        DB::beginTransaction();
        try{
            $user = User::find($user_id);
            if (!$user){
                return null;
            }
            $user->wallet = $user->wallet - $transactionData['value'];
            $user->save();
            $transactionData['user_id'] = $user->id;
            WalletTransaction::create($transactionData);

        }catch (\Exception $e){
            DB::rollBack();
            return null;
        }
        DB::commit();
        return $user->load('transactions');
    }

    function deposit($data){
        // prepare history Data
        $transactionData['status'] = "deposit";
        $transactionData['value'] = $data['value'] ?? 0;
        $user_id = $data['user_id'];
        DB::beginTransaction();
        try{
            $user = User::find($user_id);
            if (!$user){
                return null;
            }
            $user->wallet = $user->wallet + $transactionData['value'];
            $user->wallet_expired_at = Carbon::parse($user->wallet_expired_at)->addMonths(1)->format('Y-m-d H:i:s');
            $user->save();

            $transactionData['user_id'] = $user->id;
            WalletTransaction::create($transactionData);

        }catch (\Exception $e){
            DB::rollBack();
            return null;
        }
        DB::commit();
        return $user->load('transactions') ?? null;
    }



}
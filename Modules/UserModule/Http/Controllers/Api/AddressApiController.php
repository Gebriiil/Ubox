<?php

namespace Modules\UserModule\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\UserModule\Repository\AddressRepository;
use JWTAuth;
use Modules\UserModule\Transformers\UserAdressResource;
use Validator;

class AddressApiController extends Controller
{

    use ApiResponseHelper;

    public $user;
    public $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $this->addressRepository = $addressRepository;

    }
    public function store(Request $request)
    {
        $rules = [
            'city_id'=>'required|exists:cities,id',
            'zone_id'=>'nullable|exists:zones,id',
        ];
        // Validate Data
        $validator = $this->validate($request->all(),$rules);
        if($validator->fails()) {
            return $this->setCode(400)->setError($validator->messages())->send();
        }
        // Get Data From Request After Validation
        $data = $request->only('city_id','longitude','latitude','phone',
            'address','flat_num', 'building_num', 'floor_num', 'other','zone_id','government_id');
        // Set user_id
        $data['user_id'] = $this->user->id;
        // Save Data
        $address = $this->addressRepository->save($data);
        // Return Response
        $address=new UserAdressResource($address);
        return $this->setCode(200)->setData($address)->send();
    }

    public function index()
    {
        // Get Data
        $data = $this->addressRepository->findAllByUser($this->user->id);
        // Return Response
        return $this->setCode(200)->setData($data)->send();
    }


}

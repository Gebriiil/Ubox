<?php

namespace Modules\UserModule\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\UserModule\Repository\AddressRepository;
use JWTAuth;
use Modules\UserModule\Repository\UserRepository;
use Modules\UserModule\Transformers\UserResource;
use Validator;

class UserPackageApiController extends Controller
{

    use ApiResponseHelper;

    public $user;
    public $userRepo;

    public function __construct(UserRepository $userRepository)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $this->userRepo = $userRepository;
    }

    public function index()
    {

    }


}

<?php

namespace Modules\UserModule\Repository;

use Modules\UserModule\Entities\UserAddress;

class AddressRepository
{
    function save($data) {
        $address = UserAddress::create($data);
        return $address;
    }
    function findAll() {
        $addresses = UserAddress::orderBy('id', 'desc')->get();
        return $addresses;
    }

    function findAllByUser($user_id) {
        $addresses = UserAddress::orderBy('id', 'desc')->where('user_id',$user_id)->get();
        return $addresses;
    }
}
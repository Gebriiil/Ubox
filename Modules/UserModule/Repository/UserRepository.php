<?php
/**
 * Created by PhpStorm.
 * User: mallahsoft
 * Date: 1/22/19
 * Time: 7:01 PM
 */

namespace Modules\UserModule\Repository;



use Modules\UserModule\Entities\User;

class UserRepository
{


    function save($data) {

        $user = User::create($data);
        return $user;
    }

    function findAll() {
        $users = User::orderBy('id', 'desc')->get();
        return $users;
    }

    function findById($id) {
        $user=User::find($id);
        return $user;
    }
    function findByCode($code) {
        $user=User::where('affiliate_code',$code)->first();
        return $user;
    }
    function findByPhone($phone) {
        $user=User::where('phone',$phone)->first();
        return $user;
    }

    function findByEmail($email) {
        $user=User::where('email',$email)->first();
        return $user;
    }

    function update($id, $data) {
        $user=User::where('id',$id)->update($data);
        return $user;
    }

    function delete($id) {
        User::destroy($id);
        return true;
    }
    function userPackages($id){
        $user = User::where('id',$id)->with('packages.products')->first();
        return $user;
    }


}

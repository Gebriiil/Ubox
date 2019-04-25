<?php


namespace Modules\CommonModule\Helper;


class AuthHelper
{
    public function doLogin($user){

        $remember_me = request('remember_me') == 'on' ? true : false;

        return auth('user')->login($user , $remember_me);
    }
}

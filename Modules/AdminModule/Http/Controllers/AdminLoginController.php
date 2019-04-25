<?php

namespace Modules\AdminModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
class AdminLoginController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function login_page()
    {
        return view('adminmodule::admin_login.login');
    }

    public function dologin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);


        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect('/admin-panel/admins');
        }

        return redirect()->back()->withErrors(['error' => 'Email or password are wrong.']);
    }

    
}

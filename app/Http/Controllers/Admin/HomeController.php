<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/31/2017
 * Time: 7:11 AM
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function home(Request $request){
        return view('welcome');
    }

    function loginPage(){
        return view('login');
    }

    function loginPost(Request $request){
        $credential = $request->only('email', 'password');
        if(Auth::guard(AUTH_GUARD_USER)->attempt($credential)){
            return redirect()->route(ADMIN_HOME);
        }
        return redirect()->back()->with(
            'error_login', 'Email or password is incorrect'
        );
    }

    function logout(){
        Auth::guard(AUTH_GUARD_USER)->logout();
        return redirect()->route(ADMIN_LOGIN);
    }
}
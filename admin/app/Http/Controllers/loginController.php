<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class loginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function onLogin(Request $request){
        $username = $request->input('user');
        $password = $request->input('pass');
        // return $password;
        $userCount = Admin::where('username',$username)->where('password',$password)->count();

        if ($userCount == 1) {
            $request->session()->put('user',$username);
             return 1;
        }
        else{
            return 0;
        }
    }
     public function logOut(Request $request){
        $request->session()->flush();
        return redirect('login');
    }
}

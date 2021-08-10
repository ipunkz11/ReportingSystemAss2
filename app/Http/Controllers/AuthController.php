<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth/login');
    }

    function logout(){
        return view('auth/login');
    }

    function notregister(){
        return view('pages/notregister');
    }

    public function proses_login(Request $request){
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );

        $test = $request->only('email','password');
        if(Auth::attempt($test)){
            $user = Auth::user();
            if($user->level == 'admin'){
                return redirect()->intended('home');
            }elseif($user->level == 'owner'){
                return redirect()->intended('listadmin');
            }
            return redirect()->intended('notregister');
        }
        return redirect('notregister');
    }
}

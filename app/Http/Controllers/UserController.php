<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('auth/register');
    }
    
    public function register(Request $request){
        
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt('password');
        $user->level ='admin';
        $user->save();

        return redirect('listadmin');
    }

    function apiRegister(Request $request){
            
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt('password');
        $user->level ='admin';

        // Input to DBase
        if($user->save()){
            $code = 200;
            $output = [
                'message' => 'Success Register',
                'user' => $user
            ];
        }else{
            $code = 500;
            $output = [
                'message' => 'Error Register'
            ];
        }
        return response()->json($output, $code);
    }
}

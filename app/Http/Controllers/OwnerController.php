<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('owner');
    // }


    public function listAdmin(){
        $admin = DB::select('SELECT * FROM users');
        return view('pages/listadmin', ['admin'=>$admin]);
    }


    function deleteAdmin($id){
        DB::delete('delete from users where id = ?',[$id]);
        return redirect('listadmin');
    }

    function listAdminApi(){
        $admin = DB::select('SELECT * FROM users');
        if($admin != null){
            return response()->json([
                'meesage'=>'List Admin Success Get',
                'code'=>200,
                'data'=>$admin
            ]);
        }
        return response()->json([
            'message'=>'Data Not Found',
            'code'=>404
        ]);
    }
}

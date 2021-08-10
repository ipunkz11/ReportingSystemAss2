<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemasukanController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('owner');
    // }

    public function index(){
        $pemasukan = DB::select('SELECT * FROM pemasukan');
        return view('pages/chartpemasukan', ['pemasukan' => $pemasukan]);
    }
    function listPemasukanApi(){
        $pemasukan = DB::select('SELECT * FROM pemasukan');
        if($pemasukan != null){
            return response()->json([
                'meesage'=>'List Pemasukan Success Get',
                'code'=>200,
                'data'=>$pemasukan
            ]);
        }
        return response()->json([
            'message'=>'Data Not Found',
            'code'=>404
        ]);
    }
}
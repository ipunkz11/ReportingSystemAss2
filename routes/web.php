<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('layouts.home');
// });

Route::get('/forgot-password', function () {
    return view('auth/forgot-password');
});

Route::get('/sidebar', function () {
    return view('layouts/sidebar');
});

Route::get('/home', function () {
    return view('layouts.home');
});
Route::get('/chart', function () {
    return view('pages.chart');
});

Route::get('/chartpemasukan', [PemasukanController::class, 'index']);
Route::get('/listadmin', [OwnerController::class, 'listAdmin']);
Route::get('delete/{id}',[OwnerController::class, 'deleteAdmin']);
Route::get('/notregister', [AuthController::class,'notregister'])->name('notregister');


Route::get('register', [UserController::class, 'index']);
Route::post('register', [UserController::class, 'register'])->name('register');

// Authentication
Route::get('/', [AuthController::class,'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');


Route::group(['middleware' => 'admin'], function(){    
    Route::post('/', [AuthController::class, 'logout'])->name('logout');
    Route::get('home', function(){
        return view('layouts/home');
    });
});
    

Route::group(['middleware'=>['auth']], function(){
    Route::group(['middleware'=>['cek_login:owner']], function(){
        Route::get('owner', [AuthController::class, 'index'])->middleware('auth');
    });
});
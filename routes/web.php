<?php

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


Route::get('/', function () {
    return view('welcome');
});

//Admin 
//Laravel 8 goi Controller cần ghi địa chỉ đầy đủ
//Màn hình đăng nhập admin
Route::get('/admin','App\Http\Controllers\Admincontroller@index');

//Giao diện chính admin
Route::get('/dashboard','App\Http\Controllers\Admincontroller@show_dashboard');

//Giao diện chính admin
Route::post('/admin-dashboard','App\Http\Controllers\Admincontroller@dashboard');

//Đăng xuất admin
Route::get('/logout','App\Http\Controllers\Admincontroller@logout');



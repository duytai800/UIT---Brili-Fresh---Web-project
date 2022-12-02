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
Route::get('/admin','App\Http\Controllers\AdminController@index');

//Giao diện chính admin
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');

//Giao diện chính admin
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');

//Đăng xuất admin
Route::get('/logout','App\Http\Controllers\AdminController@logout');

//Quản lý khách hàng all-customers
Route::get('/all-customers','App\Http\Controllers\AdminCustomer@all_customers');
Route::get('/detail-customers/{customer_id}','App\Http\Controllers\AdminCustomer@detail_customers');

//Quản lý nhân viên 
Route::get('/all-employee','App\Http\Controllers\AdminEmployee@all_employee');
Route::get('/create-employee','App\Http\Controllers\AdminEmployee@create_employee');
Route::post('/save-employee','App\Http\Controllers\AdminEmployee@save_employee');






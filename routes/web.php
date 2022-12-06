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
Route::get('/detail-employee/{employee_id}','App\Http\Controllers\AdminEmployee@detail_employee');
Route::get('/edit-employee/{employee_id}','App\Http\Controllers\AdminEmployee@edit_employee');
Route::post('/update-employee/{employee_id}','App\Http\Controllers\AdminEmployee@update_employee');
Route::get('/delete-employee/{employee_id}','App\Http\Controllers\AdminEmployee@delete_employee');

//Quản lý sản phẩm 
Route::get('/all-products','App\Http\Controllers\AdminProduct@all_products');
//Route::get('/detail-product/{productid}','App\Http\Controllers\AdminProduct@detail_product');
Route::get('/create-product','App\Http\Controllers\AdminProduct@create_product');
Route::post('/save-product','App\Http\Controllers\AdminProduct@save_product');
Route::get('/edit-product/{product_id}','App\Http\Controllers\AdminProduct@edit_product');





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

//Quản lý cửa hàng
Route::get('/index-store','App\Http\Controllers\AdminStore@index_store');
Route::get('/create-store','App\Http\Controllers\AdminStore@create_store');
Route::post('/save-store','App\Http\Controllers\AdminStore@save_store');
Route::get('/detail-store/{store_id}','App\Http\Controllers\AdminStore@detail_store');
Route::get('/edit-store/{store_id}','App\Http\Controllers\AdminStore@edit_store');
Route::post('/update-store/{store_id}','App\Http\Controllers\AdminStore@update_store');
Route::get('/delete-store/{store_id}','App\Http\Controllers\AdminStore@delete_store');
Route::post('/soft-delete-store/{store_id}','App\Http\Controllers\AdminStore@soft_delete_store');

//Quản lý sản phẩm 
Route::get('/all-products','App\Http\Controllers\AdminProduct@all_products');
Route::get('/detail-product/{productid}','App\Http\Controllers\AdminProduct@detail_product');
Route::get('/create-product','App\Http\Controllers\AdminProduct@create_product');
Route::post('/save-product','App\Http\Controllers\AdminProduct@save_product');
Route::get('/edit-product/{product_id}','App\Http\Controllers\AdminProduct@edit_product');
Route::post('/update-product/{product_id}','App\Http\Controllers\AdminProduct@update_product');
Route::get('/delete-product/{product_id}','App\Http\Controllers\AdminProduct@delete_product');
Route::post('/soft-delete-product/{product_id}','App\Http\Controllers\AdminProduct@soft_delete_product');

//Quản lý kho
Route::get('/index-stock/{store_id?}','App\Http\Controllers\AdminStock@index_stock');
Route::get('/create-stock/{store_id?}','App\Http\Controllers\AdminStock@create_stock');
Route::post('/save-stock','App\Http\Controllers\AdminStock@save_stock');
Route::get('/detail-stock/{store_id}/{pro_id}','App\Http\Controllers\AdminStock@detail_stock');
Route::get('/edit-stock/{store_id}/{pro_id}','App\Http\Controllers\AdminStock@edit_stock');
Route::post('/update-stock/{store_id}/{pro_id}','App\Http\Controllers\AdminStock@update_stock');
Route::get('/delete-stock/{stock_id}/{pro_id}','App\Http\Controllers\AdminStock@delete_stock');
Route::post('/confirm-delete-stock/{stock_id}/{pro_id}','App\Http\Controllers\AdminStock@confirm_delete_stock');

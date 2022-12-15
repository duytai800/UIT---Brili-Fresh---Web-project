<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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

//Admin 
//Laravel 8 goi Controller cần ghi địa chỉ đầy đủ
//Màn hình đăng nhập admin

//Quản lý khách hàng all-customers
Route::get('/all-customers', 'App\Http\Controllers\AdminCustomer@all_customers');
Route::get('/detail-customers/{customer_id}', 'App\Http\Controllers\AdminCustomer@detail_customers');

//Quản lý nhân viên 
Route::get('/all-employee', 'App\Http\Controllers\AdminEmployee@all_employee');
Route::get('/create-employee', 'App\Http\Controllers\AdminEmployee@create_employee');
Route::post('/save-employee', 'App\Http\Controllers\AdminEmployee@save_employee');
Route::get('/detail-employee/{employee_id}', 'App\Http\Controllers\AdminEmployee@detail_employee');
Route::get('/edit-employee/{employee_id}', 'App\Http\Controllers\AdminEmployee@edit_employee');
Route::post('/update-employee/{employee_id}', 'App\Http\Controllers\AdminEmployee@update_employee');
Route::get('/delete-employee/{employee_id}', 'App\Http\Controllers\AdminEmployee@delete_employee');
Route::post('/soft-delete-employee/{employee_id}', 'App\Http\Controllers\AdminEmployee@soft_delete_employee');

//Quản lý cửa hàng
Route::get('/index-store', 'App\Http\Controllers\AdminStore@index_store');
Route::get('/create-store', 'App\Http\Controllers\AdminStore@create_store');
Route::post('/save-store', 'App\Http\Controllers\AdminStore@save_store');
Route::get('/detail-store/{store_id}', 'App\Http\Controllers\AdminStore@detail_store');
Route::get('/edit-store/{store_id}', 'App\Http\Controllers\AdminStore@edit_store');
Route::post('/update-store/{store_id}', 'App\Http\Controllers\AdminStore@update_store');
Route::get('/delete-store/{store_id}', 'App\Http\Controllers\AdminStore@delete_store');
Route::post('/soft-delete-store/{store_id}', 'App\Http\Controllers\AdminStore@soft_delete_store');

//Quản lý sản phẩm 
Route::get('/all-products', 'App\Http\Controllers\AdminProduct@all_products');
Route::get('/detail-product/{productid}', 'App\Http\Controllers\AdminProduct@detail_product');
Route::get('/create-product', 'App\Http\Controllers\AdminProduct@create_product');
Route::post('/save-product', 'App\Http\Controllers\AdminProduct@save_product');
Route::get('/edit-product/{product_id}', 'App\Http\Controllers\AdminProduct@edit_product');
Route::post('/update-product/{product_id}', 'App\Http\Controllers\AdminProduct@update_product');
Route::get('/delete-product/{product_id}', 'App\Http\Controllers\AdminProduct@delete_product');
Route::post('/soft-delete-product/{product_id}', 'App\Http\Controllers\AdminProduct@soft_delete_product');

//Quản lý kho
Route::get('/index-stock/{store_id?}', 'App\Http\Controllers\AdminStock@index_stock');
Route::get('/create-stock/{store_id?}', 'App\Http\Controllers\AdminStock@create_stock');
Route::post('/save-stock', 'App\Http\Controllers\AdminStock@save_stock');
Route::get('/detail-stock/{store_id}/{pro_id}', 'App\Http\Controllers\AdminStock@detail_stock');
Route::get('/edit-stock/{store_id}/{pro_id}', 'App\Http\Controllers\AdminStock@edit_stock');
Route::post('/update-stock/{store_id}/{pro_id}', 'App\Http\Controllers\AdminStock@update_stock');
Route::get('/delete-stock/{stock_id}/{pro_id}', 'App\Http\Controllers\AdminStock@delete_stock');
Route::post('/confirm-delete-stock/{stock_id}/{pro_id}', 'App\Http\Controllers\AdminStock@confirm_delete_stock');

//Quản lý tài khoản
Route::get('/index-account/{user_id?}', 'App\Http\Controllers\AdminAccount@index_account');
Route::get('/delete-account/{user_id}', 'App\Http\Controllers\AdminAccount@delete_account');
Route::post('/confirm-delete-account/{user_id}', 'App\Http\Controllers\AdminAccount@confirm_delete_account');
// Route::post('/confirm-delete-account/{user_id}','App\Http\Controllers\AdminAccount@confirm_delete_account');

//Quản lý khuyến mãi sản phẩm 
Route::get('/all-discount-products', 'App\Http\Controllers\AdminDiscount@all_discount_products');
Route::get('/create-discount-product', 'App\Http\Controllers\AdminDiscount@create_discount_product');
Route::post('/save-discount-product', 'App\Http\Controllers\AdminDiscount@save_discount_product');
Route::get('/edit-discount-product/{dis_id}', 'App\Http\Controllers\AdminDiscount@edit_discount_product');
Route::post('/update-discount-product/{dis_id}', 'App\Http\Controllers\AdminDiscount@update_discount_product');
Route::get('/delete-discount-product/{dis_id}', 'App\Http\Controllers\AdminDiscount@delete_discount_product');
Route::post('/confirm-delete-discount-product/{dis_id}', 'App\Http\Controllers\AdminDiscount@confirm_delete_discount_product');

//Quản lý khuyến mãi loại sản phẩm 
Route::get('/all-discount-types', 'App\Http\Controllers\AdminDiscount@all_discount_types');
Route::get('/create-discount-type', 'App\Http\Controllers\AdminDiscount@create_discount_type');
Route::post('/save-discount-type', 'App\Http\Controllers\AdminDiscount@save_discount_type');
Route::get('/edit-discount-type/{dis_id}', 'App\Http\Controllers\AdminDiscount@edit_discount_type');
Route::post('/update-discount-type/{dis_id}', 'App\Http\Controllers\AdminDiscount@update_discount_type');
Route::get('/delete-discount-type/{dis_id}', 'App\Http\Controllers\AdminDiscount@delete_discount_type');
Route::post('/confirm-delete-discount-type/{dis_id}', 'App\Http\Controllers\AdminDiscount@confirm_delete_discount_type');

//Quản lý khuyến mãi hoá đơn 
Route::get('/all-discount-orders', 'App\Http\Controllers\AdminDiscount@all_discount_orders');
Route::get('/create-discount-order', 'App\Http\Controllers\AdminDiscount@create_discount_order');
Route::post('/save-discount-order', 'App\Http\Controllers\AdminDiscount@save_discount_order');
Route::get('/edit-discount-order/{dis_id}', 'App\Http\Controllers\AdminDiscount@edit_discount_order');
Route::post('/update-discount-order/{dis_id}', 'App\Http\Controllers\AdminDiscount@update_discount_order');
Route::get('/delete-discount-order/{dis_id}', 'App\Http\Controllers\AdminDiscount@delete_discount_order');
Route::post('/confirm-delete-discount-order/{dis_id}', 'App\Http\Controllers\AdminDiscount@confirm_delete_discount_order');

//Quản lý khuyến mãi cửa hàng 
Route::get('/all-discount-stores', 'App\Http\Controllers\AdminDiscount@all_discount_stores');
Route::get('/create-discount-store', 'App\Http\Controllers\AdminDiscount@create_discount_store');
Route::post('/save-discount-store', 'App\Http\Controllers\AdminDiscount@save_discount_store');
Route::get('/edit-discount-store/{dis_id}', 'App\Http\Controllers\AdminDiscount@edit_discount_store');
Route::post('/update-discount-store/{dis_id}', 'App\Http\Controllers\AdminDiscount@update_discount_store');
Route::get('/delete-discount-store/{dis_id}', 'App\Http\Controllers\AdminDiscount@delete_discount_store');
Route::post('/confirm-delete-discount-store/{dis_id}', 'App\Http\Controllers\AdminDiscount@confirm_delete_discount_store');



Route::get('/', 'App\Http\Controllers\AdminController@homepage');

Route::get('/login', 'App\Http\Controllers\AdminController@index');
//Giao diện chính admin
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');
//Giao diện chính admin
Route::post('/process-role', 'App\Http\Controllers\AdminController@process_role');
//Đăng xuất admin
Route::get('/logout', 'App\Http\Controllers\AdminController@logout');

//sản phẩm thịt cá
Route::get('/fish-and-meat', 'App\Http\Controllers\ClientController@index_fish_and_meat');
Route::get('/fish-and-meat/beef-goat', 'App\Http\Controllers\ClientController@index_beef_goat');
Route::get('/fish-and-meat/beef-goat/detail-beef-goat', 'App\Http\Controllers\ClientController@detail_beef_goat');

//sản phẩm trái cây 4 mùa
Route::get('/fruit', 'App\Http\Controllers\ClientController@index_fruit');
Route::get('/fruit/imported-fruit', 'App\Http\Controllers\ClientController@index_imported_fruit');
Route::get('/fruit/imported-fruit/detail-imported-fruit', 'App\Http\Controllers\ClientController@detail_imported_fruit');

//sản phẩm rau củ
Route::get('/vegetable', 'App\Http\Controllers\ClientController@index_vegetable');
Route::get('/vegetable/vegetable', 'App\Http\Controllers\ClientController@index_leaf_vegetable');
Route::get('/vegetable/vegetable/detail-vegetable', 'App\Http\Controllers\ClientController@detail_leaf_vegetable');

//thanh toán
Route::get('/cart-info-check', 'App\Http\Controllers\ClientBuyAndPay@cart_info_check');
Route::post('/cart-info', 'App\Http\Controllers\ClientBuyAndPay@cart_info');


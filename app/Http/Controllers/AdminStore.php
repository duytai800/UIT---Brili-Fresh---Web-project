<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class AdminStore extends Controller
{
    public function index_store()
    {
        $index_store = DB::table('store')->where('isDeleted', 0)
                        ->select('store.*')->get();
        $manager_index_store = view('admin.store.index_store')->with('index_store', $index_store);
        return view('admin_layout')->with('admin.store.index_store', $manager_index_store);
    }

    public function create_store(){
        $manage_insert_store_id = view('admin.store.create_store');
        return view('admin_layout')->with('admin.store.create_store', $manage_insert_store_id);
        
    }

    public function save_store(Request $request){        
        $data = array();
        $data['SpecificAddress']=$request->specificAddress;
        $data['Ward']=$request->selected_ward;
        $data['District']=$request->selected_district;
        $data['City']=$request->selected_city;
        $data['IsDeleted']=0;
       
        DB::table('store')->insert($data);
        Session::put('add_store_message','Thêm cửa hàng thành công!');
        return Redirect::to('index-store');      
    }

    public function detail_store($store_id)
    {
        $detail_store = DB::table('store')->where('storeid',$store_id)
        ->select('store.*')->get();
        $manage_detail_store = view('admin.store.detail_store')->with('detail_store', $detail_store);
        return view('admin_layout')->with('admin.store.detail_store', $manage_detail_store);
    }

    public function edit_store($store_id){

        $edit_store = DB::table('store')->where('storeid',$store_id)->get();
        $manage_edit_store = view('admin.store.edit_store')
        ->with('edit_store', $edit_store);
        
        return view('admin_layout')->with('admin.store.edit_store', $manage_edit_store);
    }

    public function update_store(Request $request, $store_id){
        $data = array();
        $data['SpecificAddress']=$request->specificAddress;
        $data['Ward']=$request->selected_ward;
        $data['District']=$request->selected_district;
        $data['City']=$request->selected_city;
        DB::table('store')->where('StoreID',$store_id)->update($data);
        Session::put('add_store_message','Sửa thông tin cua hang thành công!');
        return Redirect::to('index-store');    
    }

    public function delete_store($store_id){
        $delete_store = DB::table('store')->where('storeid',$store_id)->get();
        $manage_delete_store = view('admin.store.delete_store')
        ->with('delete_store', $delete_store);
        
        return view('admin_layout')->with('admin.store.delete_store', $manage_delete_store);   
    }

    public function soft_delete_store($store_id){
        $data = array();
        $data['IsDeleted']=1;

        DB::table('store')->where('StoreID',$store_id)->update($data);
        Session::put('add_store_message','Xoá thông tin cua hang thành công!');
        return Redirect::to('index-store');   
    }

}
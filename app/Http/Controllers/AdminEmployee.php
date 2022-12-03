<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class AdminEmployee extends Controller
{
    public function all_employee()
    {
        $all_employee = DB::table('employee')->join('store','employee.storeid','=','store.storeid')
        ->select('employee.*', 'store.city as store_city', 'store.SpecificAddress as store_address', 'store.IsDeleted as store_isdeleted')
        ->where('employee.IsDeleted',1)->get();
        $manager_all_employee = view('admin.employee.admin_employee')->with('all_employee', $all_employee);
        return view('admin_layout')->with('admin.employee.admin_employee', $manager_all_employee);
    }

    public function create_employee(){
        $insert_store_id = DB::table('store')->get();
        $manage_insert_store_id = view('admin.employee.create_employee')->with('insert_store_id', $insert_store_id);
        return view('admin_layout')->with('admin.employee.create_employee', $manage_insert_store_id);
        
    }

    public function save_employee(Request $request){        
        $data = array();
        $data['LastName']=$request->employeeLastName;
        $data['FirstName']=$request->employeeFirstName;
        $data['Gender']=$request->employeeGender;
        $data['SpecificAddress']=$request->address;
        $data['StartDate']=$request->startdate;
        $data['StoreID']=$request->store_id;
        $data['Phone']=$request->phone;
        $data['Email']=$request->email;
        DB::table('employee')->insert($data);
        Session::put('add_employee_message','Thêm nhân viên thành công!');
        return Redirect::to('all-employee');      
    }

    public function detail_employee($employee_id)
    {
        $detail_employee = DB::table('employee')->join('store','employee.StoreID','=','store.StoreID')->where('empid',$employee_id)
        ->select('employee.*', 'store.city as store_city', 'store.SpecificAddress as store_address')->get();
        $manage_detail_employee = view('admin.employee.detail_employee')->with('detail_employee', $detail_employee);
        return view('admin_layout')->with('admin.customer.detail_employee', $manage_detail_employee);
    }

    public function edit_employee($employee_id){
        
        $insert_store_id = DB::table('store')->get();
        //$manage_insert_store_id = view('admin.employee.edit_employee')->with('insert_store_id', $insert_store_id);

        $edit_employee = DB::table('employee')->where('empid',$employee_id)->get();
        $manage_edit_employee = view('admin.employee.edit_employee')->with('insert_store_id', $insert_store_id)
        ->with('edit_employee', $edit_employee);
        
        return view('admin_layout')->with('admin.customer.edit_employee', $manage_edit_employee);
        //->with('admin.employee.edit_employee', $manage_insert_store_id);
    }

    public function update_employee(Request $request, $employee_id){
        $data = array();
        $data['LastName']=$request->employeeLastName;
        $data['FirstName']=$request->employeeFirstName;
        $data['Gender']=$request->employeeGender;
        $data['SpecificAddress']=$request->address;
        $data['StartDate']=$request->startdate;
        $data['EndDate']=$request->enddate;
        $data['StoreID']=$request->store_id;
        $data['Phone']=$request->phone;
        $data['Email']=$request->email;
        DB::table('employee')->where('empid',$employee_id)->update($data);
        Session::put('add_employee_message','Sửa thông tin nhân viên thành công!');
        return Redirect::to('all-employee');    
    }

    public function delete_employee($employee_id){
        $data = array();
        $data['IsDeleted']=0;
        DB::table('employee')->where('empid',$employee_id)->update($data);
        Session::put('add_employee_message','Xoá thông tin nhân viên thành công!');
        return Redirect::to('all-employee');  
    }
}
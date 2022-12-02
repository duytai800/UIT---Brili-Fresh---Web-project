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
        $all_employee = DB::table('employee')->join('store','employee.storeid','=','store.storeid')->select('employee.*', 'store.city as store_city')->get();
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
}
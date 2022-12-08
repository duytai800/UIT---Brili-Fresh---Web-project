<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class AdminAccount extends Controller
{
    public function index_account()
    {
        $index_account = (DB::table('user')->where('user.isDeleted', 0)->leftJoin('employee','user.userid','=','employee.userid'))
                        ->leftJoin('customer','user.userid','=', 'customer.userid')
                        ->select('user.*','employee.empid as employee_empid',
                                          'employee.FirstName as employee_FirstName',        
                                          'employee.LastName as employee_LastName',
                                          'customer.CusID as customer_CusID',
                                          'customer.FirstName as customer_FirstName',
                                          'customer.LastName as customer_LastName',
                        )->get();
        $manager_index_account = view('admin.account.index_account')->with('index_account', $index_account);
        
        return view('admin_layout')->with('admin.store.index_account', $manager_index_account);
    }

    public function delete_account($user_id){
        $delete_account = (DB::table('user')->leftJoin('employee','user.userid','=','employee.userid'))
        ->leftJoin('customer','user.userid','=', 'customer.userid')
        ->where('user.isDeleted', 0)->where('user.userid', $user_id)
        ->select('user.*','employee.empid as employee_empid',
                            'employee.FirstName as employee_FirstName',        
                            'employee.LastName as employee_LastName',
                            'customer.CusID as customer_CusID',
                            'customer.FirstName as customer_FirstName',
                            'customer.LastName as customer_LastName',
        )->get();
        $manage_delete_account = view('admin.account.delete_account')
        ->with('delete_account', $delete_account);
        return view('admin_layout')->with('admin.account.delete_account', $manage_delete_account);
    }

    public function confirm_delete_account($user_id){
        $data = array();
        $data['IsDeleted'] = 1;
        DB::table('user')->where('user.userid', $user_id)->update($data);
        Session::put('add_account_message','Xoá thông tin tài khoản thành công!');
        return Redirect::to('index-account');    
    }
}
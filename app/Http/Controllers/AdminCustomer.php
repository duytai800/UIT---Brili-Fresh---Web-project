<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class AdminCustomer extends Controller
{
    public function AuthLogin()
    {
        $UserID_employee = Session::get('UserID_employee');
        $UserID_manager = Session::get('UserID_manager');
        
        if ($UserID_employee or $UserID_manager ) {
        } else {
            return Redirect::to('/login')->send();
        }
    }

    public function all_customers()
    
    {
        $this->AuthLogin();
        $all_customers = DB::table('customer')->join('reward','customer.rewardid','=','reward.rewardid')->get();
        $manager_all_customers = view('admin.customer.admin_customer')->with('all_customers', $all_customers);
        return view('admin_layout')->with('admin.customer.admin_customer', $manager_all_customers);
    }

    public function detail_customers($customer_id)
    {
        $this->AuthLogin();
        $detail_customers = DB::table('customer')->join('reward','customer.rewardid','=','reward.rewardid')->where('cusid',$customer_id)->get();
        $manager_detail_customers = view('admin.customer.detail_customer')->with('detail_customer', $detail_customers);
        return view('admin_layout')->with('admin.customer.detail_customer', $manager_detail_customers);
    }

    // public function ajax(){
    //     $all_customers = DB::table('customer')->join('reward','customer.rewardid','=','reward.rewardid')->get();
    //     $customer_id=$all_customers->sortBy('CusID')->pluck('CusID')->unique();
    //     return view('admin_layout')->with('admin.customer.admin_customer', $customer_id, compact('cusid'));    }
}

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
}
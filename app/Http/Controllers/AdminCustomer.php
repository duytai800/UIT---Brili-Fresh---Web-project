<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCustomer extends Controller
{
    public function all_customers(){
        return view('admin.admin_customer');
    }
}

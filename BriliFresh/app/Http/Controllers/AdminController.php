<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }

    public function show_dashboard(){
        return view('admin_layout');
    }

    public function dashboard(Request $request){
        $admin_email=$request->admin_username;
        $admin_pass=md5($request->admin_pass);
        $result = DB::table('user')->where('UserName',$admin_email)-> where('UserPassword',$admin_pass)->first();
        return view('admin.dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Session;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();
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
        if($result){
            Session::put('UserID',$result->UserID);
            return Redirect::to('/dashboard');
        }else{
            Session::put('fail_message','Sai tài khoản hoặc mật khẩu!');
            return Redirect::to('/admin');
        }
    }
    public function logout(){
        Session::put('admin_username',null);
        Session::put('admin_pass',null);
        return Redirect::to('/admin');
    }

    
}

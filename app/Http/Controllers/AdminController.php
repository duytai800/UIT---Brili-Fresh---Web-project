<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;

session_start();
class AdminController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function homepage()
    {
        //$user_roles = 0;
        //$manage_homeheader = view('share.homeheader')->with('user_roles', $user_roles);
        $UserID_client = Session::get('UserID_client');
        if($UserID_client){
            $homeheader = view('share.homeheader_login')->with('UserID_client', $UserID_client);
            $homefooter = view('share.homefooter');
            return view('welcome')->with('share.homeheader_login', $homeheader)->with('share.homefooter', $homefooter);
        }else {
            $homeheader = view('share.homeheader')->with('UserID_client', $UserID_client);
            $homefooter = view('share.homefooter');
            return view('welcome')->with('share.homeheader', $homeheader)->with('share.homefooter', $homefooter);
        } 
    }

    public function show_dashboard()
    {
        return view('admin.dashboard');
    }

    public function process_role(Request $request)
    {
        $admin_email = $request->admin_username;
        $admin_pass = md5($request->admin_pass);
        $result = DB::table('user')->where('UserName', $admin_email)->where('UserPassword', $admin_pass)->get()->toArray();;
        //         echo '<pre>';
        // print_r($result);
        // echo '</pre>';
        if ($result) {
            $user_role = $result[0]->UserRole;
            if ($user_role == 2) {
                Session::put('UserID_employee', $result[0]->UserID);
                return Redirect::to('/dashboard');
            } elseif ($user_role == 3) {
                Session::put('UserID_manager', $result[0]->UserID);
                return Redirect::to('/dashboard');
            } elseif ($user_role == 1) {
                Session::put('UserID_client', $result[0]->UserID);
                return Redirect::to('/');
                // Session::put('UserID_client', $result[0]->UserID);
                // return redirect(url()->previous());
            }
        } else {
            Session::put('fail_message', 'Sai tài khoản hoặc mật khẩu!');
            return Redirect::to('/login');
        }
    }
    public function logout()
    {
        Session::put('admin_username', null);
        Session::put('admin_pass', null);
        Session::put('fail_message', null);
        return Redirect::to('/login');
    }
}

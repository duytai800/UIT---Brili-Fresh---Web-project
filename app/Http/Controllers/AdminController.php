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
    public function AuthLogin()
    {
        $UserID_client = Session::get('UserID_employee');
        $UserID_manager = Session::get('UserID_manager');
        if ($UserID_client == 2 or $UserID_manager == 3) {
            //return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/login');
        }
    }

    public function index()
    {
        return view('login');
    }

    public function homepage()
    {
        //$user_roles = 0;
        //$manage_homeheader = view('share.homeheader')->with('user_roles', $user_roles);
        $UserID_client = Session::get('UserID_client');
        Session::put('store_id', 1);
        $store_id = Session::get('store_id');

        $store_selected = DB::table('store')
            ->where('storeid', $store_id)->get()->toArray();

         $store = DB::table('store')//->select(
        //     'store.city as city',
        //     'store.district as district',
        //     'store.ward as ward',
        //     'store.specificaddress as specificaddress',
        //     'store.storeid as storeid')
        ->whereNotIn('store.storeid', [$store_id])
        ->get()->toArray();

        // echo '<pre>';
        // print_r($store_selected);
        // echo '</pre>';

        //  echo '<pre>';
        // print_r($store);
        // echo '</pre>';

        if ($UserID_client) {
            $customer = DB::table('customer')
                ->join('user', 'user.userid', '=', 'customer.userid')
                ->where('customer.userid', $UserID_client)->get()->toArray();
            // echo '<pre>';
            // print_r($customer);
            // echo '</pre>';

            $homeheader = view('share.homeheader_login')->with('UserID_client', $UserID_client)
                ->with('store', $store)
                ->with('store_selected', $store_selected)
                ->with('customer', $customer);
            $homefooter = view('share.homefooter');
            return view('welcome')->with('share.homeheader_login', $homeheader)->with('share.homefooter', $homefooter);
        } else {
            $homeheader = view('share.homeheader')->with('UserID_client', $UserID_client)
                ->with('store', $store)->with('store_selected', $store_selected);
            $homefooter = view('share.homefooter');
            return view('welcome')->with('share.homeheader', $homeheader)->with('share.homefooter', $homefooter);
        }
    }

    public function show_dashboard()
    {
        $this->AuthLogin();
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
                return Redirect::to('/all-products');
            } elseif ($user_role == 3) {
                Session::put('UserID_manager', $result[0]->UserID);
                Session::put('Role', $result[0]->UserRole);
                return Redirect::to('/index-statistic');
            } elseif ($user_role == 1) {
                Session::put('UserID_client', $result[0]->UserID);
                return Redirect::to('');
            }
        } else {
            Session::put('fail_message', 'Sai tài khoản hoặc mật khẩu!');
            return Redirect::to('/login');
        }
    }
    public function logout()
    {
        //dd(session()->all());
        // Session::put('admin_username', null);
        // Session::put('admin_pass', null);
        // Session::put('fail_message', null);
        Session::flush();
        //dd(session()->all());
        return Redirect::to('/');
    }
}

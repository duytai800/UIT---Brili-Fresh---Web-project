<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ClientBuyAndPay extends Controller{
    public function AuthLogin(){
        $UserID_client=Session::get('UserID_client');
        if ($UserID_client){
            return Redirect::to('/client');
        } else {
            return Redirect::to('/');
        }   
    }
    
    public function save_cart(Request $request){
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        $pro_id_hidden=$request->pro_id_hidden;
        $quantity=$request->quantity;
        if($UserID_client){
            $homeheader = view('share.homeheader_login')->with('UserID_client', $UserID_client);
            $homefooter = view('share.homefooter');
            return view('client.buy-and-pay.cart_info_check')->with('share.homeheader_login', $homefooter)->with('share.homeheader_login', $homeheader);
        }else {
            $homeheader = view('share.homeheader')->with('UserID_client', $UserID_client);
            $homefooter = view('share.homefooter');
            return view('client.buy-and-pay.cart_info_check')->with('share.homefooter', $homefooter)->with('share.homeheader', $homeheader);
        } 
    }
}
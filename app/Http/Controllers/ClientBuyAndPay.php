<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redis;

class ClientBuyAndPay extends Controller
{
    public function AuthLogin()
    {
        $UserID_client = Session::get('UserID_client');
        if ($UserID_client) {
            return Redirect::to('/client');
        } else {
            return Redirect::to('/');
        }
    }

    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        // print_r($data);
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if ($cart == true) {
            $is_available = 0;
            foreach ($cart as $key => $val) {
                if ($val['product_id'] == $data['product_id']) {
                    $is_available++;
                }
            }
            if ($is_available == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_id' => $data['product_id'],
                    'product_name' => $data['product_name'],
                    'product_image' => $data['product_image'],
                    'product_price' => $data['product_price'],
                    'product_quantity' => $data['product_quantity'],
                    'product_unit' => $data['product_unit'],
                );
                Session::put('cart', $cart);
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['product_id'],
                'product_name' => $data['product_name'],
                'product_image' => $data['product_image'],
                'product_price' => $data['product_price'],
                'product_quantity' => $data['product_quantity'],
                'product_unit' => $data['product_unit'],
            );
        }
        Session::put('cart', $cart);
        Session::save();
        //session()->forget('cart');
    }

    public function show_cart(Request $request)
    {
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        //seo
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Gió hàng";
        $meta_title = "Giỏ hàng";
        $url_canonical = $request->url();

        if ($UserID_client) {
            $homeheader = view('share.homeheader_login')->with('UserID_client', $UserID_client);
            $homefooter = view('share.homefooter');
            return view('client.buy-and-pay.cart_info_check')->with('share.homeheader_login', $homefooter)->with('share.homeheader_login', $homeheader)
                ->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)
                ->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)
                ->with('meta_desc', $meta_desc);
        } else {
            $homeheader = view('share.homeheader')->with('UserID_client', $UserID_client);
            $homefooter = view('share.homefooter');
            return view('client.buy-and-pay.cart_info_check')->with('share.homefooter', $homefooter)->with('share.homeheader', $homeheader)
                ->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)
                ->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)
                ->with('meta_desc', $meta_desc);
        }
    }

    public function delete_cart($session_id)
    {
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($cart as $key => $val) {
                if ($val['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('delete_cart','Đã bỏ một sản phẩm ra khỏi giỏ hàng');
        } else return  redirect()->back()->with('delete_cart_fail', 'Chưa thể bỏ sản phẩm này ra khỏi giỏ hàng');
    }
}

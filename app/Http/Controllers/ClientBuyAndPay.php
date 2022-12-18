<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;


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
                    $cart[$key] = array(
                        'session_id' => $session_id,
                        'product_id' => $val['product_id'],
                        'product_name' => $val['product_name'],
                        'product_image' => $val['product_image'],
                        'product_price' => $val['product_price'],
                        'product_quantity' => $val['product_quantity'] + $data['product_quantity'],
                        'product_unit' => $val['product_unit'],
                    );
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
            return view('client.buy-and-pay.cart_info_check')->with('share.homefooter', $homefooter)->with('share.homeheader_login', $homeheader)
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
            return redirect()->back()->with('delete_cart', 'Đã bỏ một sản phẩm ra khỏi giỏ hàng');
        } else return  redirect()->back()->with('delete_cart_fail', 'Chưa thể bỏ sản phẩm này ra khỏi giỏ hàng');
    }

    public function cart_info(Request $request)
    {
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');

        $type_client = DB::table('customer')->where('userid', $UserID_client)->select('customer.rewardid')->get();

        //seo
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Gió hàng";
        $meta_title = "Giỏ hàng";
        $url_canonical = $request->url();

        $coupon = DB::table('discount_order')->get();

        if ($UserID_client) {
            $homeheader = view('share.homeheader_login')->with('UserID_client', $UserID_client);
            $homefooter = view('share.homefooter');

            return view('client.buy-and-pay.cart_info', compact('coupon'))->with('share.homefooter', $homefooter)->with('share.homeheader_login', $homeheader)
                ->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)
                ->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)->with('type_client', $type_client)
                ->with('meta_desc', $meta_desc);
        } else {
            $homeheader = view('share.homeheader')->with('UserID_client', $UserID_client);
            $homefooter = view('share.homefooter');
            return view('client.buy-and-pay.cart_info', compact('coupon'))->with('share.homefooter', $homefooter)->with('share.homeheader', $homeheader)
                ->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)
                ->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)->with('type_client', $type_client)
                ->with('meta_desc', $meta_desc);
        }
    }

    public function check_coupon(Request $request)
    {
        $data = $request->all();
        $coupon = DB::table('discount_order')->where('discode', $data['coupon'])
            ->first();
        if ($coupon) {
            $coupon_session = Session::get('coupon');
            if ($coupon_session) {
                $is_available = 0;
                if ($is_available == 0) {
                    $cou[] = array(
                        'DisCode' => $coupon->DisCode,
                        'DisRate' => $coupon->DisRate,
                        'MaxDis' => $coupon->MaxDis,
                        'CusType' => $coupon->CusType,
                    );
                    Session::put('coupon', $cou);
                }
            } else {
                $cou[] = array(
                    'DisCode' => $coupon->DisCode,
                    'DisRate' => $coupon->DisRate,
                    'MaxDis' => $coupon->MaxDis,
                    'CusType' => $coupon->CusType,
                );
                Session::put('coupon', $cou);
            }
            Session::save();
            return redirect()->back();
        }
    }

    public function delivery_info()
    {
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');

        if ($UserID_client) {
            $homeheader = view('share.homeheader_login')->with('UserID_client', $UserID_client);
            $homefooter = view('share.homefooter');
            return view('client.buy-and-pay.delivery_info')->with('share.homefooter', $homefooter)->with('share.homeheader_login', $homeheader);
        } else {
            $homeheader = view('share.homeheader')->with('UserID_client', $UserID_client);
            $homefooter = view('share.homefooter');
            return view('client.buy-and-pay.delivery_info')->with('share.homefooter', $homefooter)->with('share.homeheader', $homeheader);
        }
    }

    public function pay_info()
    {
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');

        if ($UserID_client) {
            $homeheader = view('share.homeheader_login')->with('UserID_client', $UserID_client);
            $homefooter = view('share.homefooter');
            return view('client.buy-and-pay.pay_info')->with('share.homefooter', $homefooter)->with('share.homeheader_login', $homeheader);
        } else {
            $homeheader = view('share.homeheader')->with('UserID_client', $UserID_client);
            $homefooter = view('share.homefooter');
            return view('client.buy-and-pay.pay_info')->with('share.homefooter', $homefooter)->with('share.homeheader', $homeheader);
        }
    }
}

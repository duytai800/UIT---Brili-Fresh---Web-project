<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;


class ClientBuyAndPay extends Controller
{
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
        $UserID_client = Session::get('UserID_client');
        //seo
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Gió hàng";
        $meta_title = "Giỏ hàng";
        $url_canonical = $request->url();

        $customer = DB::table('customer')
            ->join('user', 'user.userid', '=', 'customer.userid')
            ->where('customer.userid', $UserID_client)->get()->toArray();

        if ($UserID_client) {
            $store_id = Session::get('store_id');
            $store_selected = DB::table('store')
                ->where('storeid', $store_id)->get()->toArray();
            $store = DB::table('store')
                ->whereNotIn('store.storeid', [$store_id])
                ->get()->toArray();

            $homeheader = view('share.homeheader_login')
                ->with('UserID_client', $UserID_client)
                ->with('customer', $customer)
                ->with('store_selected', $store_selected)
                ->with('store', $store);
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
        $UserID_client = Session::get('UserID_client');

        $type_client = DB::table('customer')->where('userid', $UserID_client)->select('customer.rewardid')->get();
        $customer = DB::table('customer')
            ->join('user', 'user.userid', '=', 'customer.userid')
            ->where('customer.userid', $UserID_client)->get()->toArray();
        //seo
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Gió hàng";
        $meta_title = "Giỏ hàng";
        $url_canonical = $request->url();

        $coupon = DB::table('discount_order')->get();

        if ($UserID_client) {
            $store_id = Session::get('store_id');
            $store_selected = DB::table('store')
                ->where('storeid', $store_id)->get()->toArray();
            $store = DB::table('store')
                ->whereNotIn('store.storeid', [$store_id])
                ->get()->toArray();

            $homeheader = view('share.homeheader_login')
                ->with('UserID_client', $UserID_client)
                ->with('customer', $customer)
                ->with('store_selected', $store_selected)
                ->with('store', $store);
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

    public function delivery_info()
    {
        $UserID_client = Session::get('UserID_client');
        $customer = DB::table('customer')
            ->join('user', 'user.userid', '=', 'customer.userid')
            ->where('customer.userid', $UserID_client)->get()->toArray();
        if ($UserID_client) {
            $client_address_default = DB::table('address')
                //->select('product.*', 'product_image.*', 'type.*', 'stock.ProId', 'stock.quantity as product_quantity')
                ->join('customer', 'customer.cusid', '=', 'address.cusid')
                ->where('customer.userid', $UserID_client)->where('address.default', 1)
                ->get();
            $client_address = DB::table('address')
                //->select('product.*', 'product_image.*', 'type.*', 'stock.ProId', 'stock.quantity as product_quantity')
                ->join('customer', 'customer.cusid', '=', 'address.cusid')
                ->where('customer.userid', $UserID_client)->where('address.default', 0)
                ->get();

                $store_id = Session::get('store_id');
                $store_selected = DB::table('store')
                    ->where('storeid', $store_id)->get()->toArray();
                $store = DB::table('store')
                    ->whereNotIn('store.storeid', [$store_id])
                    ->get()->toArray();
    
                $homeheader = view('share.homeheader_login')
                    ->with('UserID_client', $UserID_client)
                    ->with('customer', $customer)
                    ->with('store_selected', $store_selected)
                    ->with('store', $store);
                $homefooter = view('share.homefooter');
            return view('client.buy-and-pay.delivery_info_login')->with('share.homefooter', $homefooter)->with('share.homeheader_login', $homeheader)
                ->with('client_address_default', $client_address_default)
                ->with('client_address', $client_address);
        } else {
            $homeheader = view('share.homeheader')->with('UserID_client', $UserID_client);
            $homefooter = view('share.homefooter');
            return view('client.buy-and-pay.delivery_info')->with('share.homefooter', $homefooter)->with('share.homeheader', $homeheader);
        }
    }

    public function pay_info()
    {
        $UserID_client = Session::get('UserID_client');
        $customer = DB::table('customer')
            ->join('user', 'user.userid', '=', 'customer.userid')
            ->where('customer.userid', $UserID_client)->get()->toArray();

        if ($UserID_client) {
            $store_id = Session::get('store_id');
            $store_selected = DB::table('store')
                ->where('storeid', $store_id)->get()->toArray();
            $store = DB::table('store')
                ->whereNotIn('store.storeid', [$store_id])
                ->get()->toArray();

            $homeheader = view('share.homeheader_login')
                ->with('UserID_client', $UserID_client)
                ->with('customer', $customer)
                ->with('store_selected', $store_selected)
                ->with('store', $store);
            $homefooter = view('share.homefooter');
            return view('client.buy-and-pay.pay_info')->with('share.homefooter', $homefooter)->with('share.homeheader_login', $homeheader);
        } else {
            $homeheader = view('share.homeheader')->with('UserID_client', $UserID_client);
            $homefooter = view('share.homefooter');
            return view('client.buy-and-pay.pay_info')->with('share.homefooter', $homefooter)->with('share.homeheader', $homeheader);
        }
    }

    public function pay_info_ajax(Request $request)
    {
        $data = $request->all();

        //print_r($data);

        $id_transport = DB::table('transport')->max('transid') + 1;
        $id_order = DB::table('order')->max('orderid') + 1;
        $data_insert_transport = array();
        $tranport_type =  $data['delivery_method'];
        $data_insert_transport['Type'] = $tranport_type;
        $data_insert_transport['Status'] = 1;
        $data_insert_transport['TransID'] = $id_transport;
        if ($tranport_type == 1) {
            $data_insert_transport['Fee'] = 14000;
        } else {
            $data_insert_transport['Fee'] = 30000;
        }
        DB::table('transport')->insert($data_insert_transport);

        $UserID_client = Session::get('UserID_client');
        $data_insert_order = array();

        if ($UserID_client) {
            $cus_id = DB::table('customer')->select('cusid')
                ->where('userid', $UserID_client)
                ->get()->toArray();
            $cus_id = $cus_id[0]->cusid;
            $data_insert_order['CusID'] = $cus_id;
        }

        $add_id = DB::table('address')->select('addid')->where('city', $data['city'])
            ->where('district', $data['district'])
            ->where('ward', $data['ward'])
            ->where('specificaddress', $data['specificAddress'])->get()->toArray();

        if ($add_id) {
            $add_id = $add_id[0]->addid;
            $data_insert_order['AddID'] =  $add_id;
        }
        $data_insert_order['OrderDate'] = $data['OrderDate'];
        $data_insert_order['TransID'] = $id_transport;
        $data_insert_order['OrderTotal'] = $data['total'];
        $data_insert_order['DisID'] = $data['disid'];
        $data_insert_order['OrderID'] = $id_order;

        $data_insert_order['SubTotal'] = $data['subtotal'];
        $data_insert_order['PayBy'] = $data['payment_method'];
        DB::table('order')->insert($data_insert_order);

        $data_insert_order_detail = array();
        $row = count($data['product_image']);

        for ($i = 0; $i < $row; $i++) {
            //$data_insert_order_detail = array();

            $product_image = $data['product_image'][$i];
            $product_image = explode("/", $product_image);
            $product_image = $product_image[7];
            $pro_id = DB::table('product_image')->select('proid')->where('imgdata', $product_image)
                ->get()->toArray();
            $pro_id = $pro_id[0]->proid;
            $product_quantity = $data['product_quantity'][$i];
            $product_unit_price = $data['product_unit_price'][$i];
            $product_unit_price = explode(" ", $product_unit_price);
            $product_unit_price = explode(",", $product_unit_price[0]);
            $product_unit_price = $product_unit_price[0] . $product_unit_price[1];

            $data_insert_order_detail['OrderID'] = $id_order;
            $data_insert_order_detail['ProID'] = $pro_id;
            $data_insert_order_detail['Quantity'] = $product_quantity;
            $data_insert_order_detail['Price'] = $product_unit_price;
            // echo '<pre>';
            // print_r($data_insert_order_detail);
            // echo '</pre>';
            DB::table('order_details')->insert($data_insert_order_detail);
        }
    }
}

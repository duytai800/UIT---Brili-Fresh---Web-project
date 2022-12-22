<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;


class ClientMyAccount extends Controller
{
    public function AuthLogin()
    {
        $UserID_client = Session::get('UserID_client');
        if ($UserID_client) {
        } else {
            return Redirect::to('/login')->send();
        }
    }

    public function account_info()
    {
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        $customer = DB::table('customer')
            ->join('user', 'user.userid', '=', 'customer.userid')
            ->where('customer.userid', $UserID_client)->get()->toArray();

        $store_id = Session::get('store_id');
        echo $store_id;
        $store_selected = DB::table('store')
            ->where('storeid', $store_id)->get()->toArray();
        $store = DB::table('store')
            ->whereNotIn('store.storeid', [$store_id])
            ->get()->toArray();

        $homeheader = view('share.homeheader_login')->with('UserID_client', $UserID_client)
            ->with('customer', $customer)
            ->with('store_selected', $store_selected)
            ->with('store', $store);
        $homefooter = view('share.homefooter');
        $sub_nav_my_account = view('share.sub_nav_my_account')->with('customer', $customer);
        return view('client.my-account.account_info')->with('share.homeheader_login', $homeheader)->with('share.homefooter', $homefooter)
            ->with('share.sub_nav_my_account', $sub_nav_my_account)
            ->with('customer', $customer);
    }

    public function change_password()
    {
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        $customer = DB::table('customer')
            ->join('user', 'user.userid', '=', 'customer.userid')
            ->where('customer.userid', $UserID_client)->get()->toArray();
            $store_id = Session::get('store_id');
            $store_selected = DB::table('store')
                ->where('storeid', $store_id)->get()->toArray();
            $store = DB::table('store')
                ->whereNotIn('store.storeid', [$store_id])
                ->get()->toArray();
    
            $homeheader = view('share.homeheader_login')->with('UserID_client', $UserID_client)
                ->with('customer', $customer)
                ->with('store_selected', $store_selected)
                ->with('store', $store);
            $homefooter = view('share.homefooter');
        $sub_nav_my_account = view('share.sub_nav_my_account')->with('customer', $customer);
        return view('client.my-account.change_password')->with('share.homeheader_login', $homeheader)->with('share.homefooter', $homefooter)
            ->with('share.sub_nav_my_account', $sub_nav_my_account);
    }

    public function confirm_change_password(Request $request)
    {
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        $customer = DB::table('customer')
            ->join('user', 'user.userid', '=', 'customer.userid')
            ->where('customer.userid', $UserID_client)->get()->toArray();
        $old_pass = $customer[0]->UserPassword;
        $old_pass_input = md5($request->CurrentPassword);
        $new_pass_input = $request->NewPassword;
        $new_pass_input_check = md5($request->NewPassword);
        $new_pass_confirm = $request->confirm_password;
        if ($old_pass == $old_pass_input) {
        } else
            return redirect()->back()->with('error_change_password', 'Nhập mật khẩu hiện tại không khớp!');
        if (strlen($new_pass_input) < 7) {
            return redirect()->back()->with('error_change_password', 'Mật khẩu mới cần ít nhất gồm 6 ký tự, trong đó có 1 ký tự in hoa, 1 số và 1 ký tự đặc biệt');
        }
        if ($new_pass_input_check == $old_pass) {
            return redirect()->back()->with('error_change_password', 'Mật khẩu mới trùng mật khẩu cũ');;
        }
        if (preg_match('/[A-Z]/', $new_pass_input)) {
        } else return redirect()->back()->with('error_change_password', 'Mật khẩu mới cần ít nhất gồm 6 ký tự, trong đó có 1 ký tự in hoa, 1 số và 1 ký tự đặc biệt');;
        if (preg_match('/[A-Z]/', $new_pass_confirm)) {
        } else return redirect()->back()->with('error_change_password', 'Mật khẩu mới cần ít nhất gồm 6 ký tự, trong đó có 1 ký tự in hoa, 1 số và 1 ký tự đặc biệt');
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $new_pass_input)) {
        } else return redirect()->back()->with('error_change_password', 'Mật khẩu mới cần ít nhất gồm 6 ký tự, trong đó có 1 ký tự in hoa, 1 số và 1 ký tự đặc biệt');
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $new_pass_confirm)) {
        } else return redirect()->back()->with('error_change_password', 'Mật khẩu mới cần ít nhất gồm 6 ký tự, trong đó có 1 ký tự in hoa, 1 số và 1 ký tự đặc biệt');
        if (preg_match('~[0-9]+~', $new_pass_input)) {
        } else return redirect()->back()->with('error_change_password', 'Mật khẩu mới cần ít nhất gồm 6 ký tự, trong đó có 1 ký tự in hoa, 1 số và 1 ký tự đặc biệt');
        if (preg_match('~[0-9]+~', $new_pass_input)) {
        } else return redirect()->back()->with('error_change_password', 'Mật khẩu mới cần ít nhất gồm 6 ký tự, trong đó có 1 ký tự in hoa, 1 số và 1 ký tự đặc biệt');
        if ($new_pass_input == $new_pass_confirm) {
        } else return redirect()->back()->with('error_change_password', 'Xác nhận mật khẩu không thành công');

        $data = array();
        $data['UserPassword'] = md5($new_pass_input);
        DB::table('user')->where('userid', $UserID_client)->update($data);
        return redirect()->back()->with('succes_change_password', 'Thay đổi mật khẩu thành công!');
    }

    public function confirm_change_info(Request $request)
    {
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        $data = array();

        $data['LastName'] = $request->LastName;
        $data['FirstName'] = $request->FirstName;
        $data['Email'] = $request->Email;
        $data['Gender'] = $request->gender;
        //DB::table('customer')->where('userid', $UserID_client)->update($data);

        $get_image_main = $request->file('Photo');
        if ($get_image_main) {
            $get_name_img = $get_image_main->getClientOriginalName();
            $name_img = current(explode('.', $get_name_img));
            $image_main = 'user' . $UserID_client . '-' . $name_img . rand(0, 999) . '.' . $get_image_main->getClientOriginalExtension();
            $get_image_main->move('public/client/avatar', $image_main);
            $data_img['Avatar'] = $image_main;
            DB::table('user')->where('userid', $UserID_client)->update($data_img);
        }
        return redirect()->back()->with('succes_change_info', 'Cập nhật thông tin thành công!');
    }

    public function manage_address()
    {
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        $customer = DB::table('customer')
            ->join('user', 'user.userid', '=', 'customer.userid')
            ->where('customer.userid', $UserID_client)->get()->toArray();
            $store_id = Session::get('store_id');
            $store_selected = DB::table('store')
                ->where('storeid', $store_id)->get()->toArray();
            $store = DB::table('store')
                ->whereNotIn('store.storeid', [$store_id])
                ->get()->toArray();
    
            $homeheader = view('share.homeheader_login')->with('UserID_client', $UserID_client)
                ->with('customer', $customer)
                ->with('store_selected', $store_selected)
                ->with('store', $store);
            $homefooter = view('share.homefooter');
        $sub_nav_my_account = view('share.sub_nav_my_account')->with('customer', $customer);

        $customer_address = DB::table('customer')
            ->join('user', 'user.userid', '=', 'customer.userid')
            ->join('address', 'address.cusid', '=', 'customer.cusid')
            ->where('customer.userid', $UserID_client)->get()->toArray();

        return view('client.my-account.manage_address')->with('share.homeheader_login', $homeheader)->with('share.homefooter', $homefooter)
            ->with('share.sub_nav_my_account', $sub_nav_my_account)
            ->with('customer_address', $customer_address);
    }

    public function manage_orders()
    {
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        $customer = DB::table('customer')
            ->join('user', 'user.userid', '=', 'customer.userid')
            ->where('customer.userid', $UserID_client)->get()->toArray();
            
        $customer_order = DB::table('customer')
            ->join('user', 'user.userid', '=', 'customer.userid')
            ->join('order', 'order.cusid', '=', 'customer.cusid')
            //->join('order_details', 'order_details.orderid', '=', 'order.orderid')
            ->where('customer.userid', $UserID_client)
            ->orderBy('order.orderid', 'desc')->get()->toArray();

        $customer_order_detail = DB::table('customer')
            ->select(
                'user.*',
                'order.*',
                'product.*',
                'product_image.*',
                'order_details.price as price_detail',
                'order_details.orderid as orderid',
                'order_details.proid as proid',
                'order_details.quantity as Quantity'
            )
            ->join('user', 'user.userid', '=', 'customer.userid')
            ->join('order', 'order.cusid', '=', 'customer.cusid')
            ->join('order_details', 'order_details.orderid', '=', 'order.orderid')
            ->join('product', 'product.proid', '=', 'order_details.proid')
            ->join('product_image', 'product.proid', '=', 'product_image.proid')
            ->where('customer.userid', $UserID_client)
            ->where('product_image.imgdata', 'like', 'main%')
            ->orderBy('order.orderid', 'desc')->distinct('product.orderid')->get()->toArray();

        // echo '<pre>';
        // print_r($customer_order_detail);
        // echo '</pre>';

        $store_id = Session::get('store_id');
        $store_selected = DB::table('store')
            ->where('storeid', $store_id)->get()->toArray();
        $store = DB::table('store')
            ->whereNotIn('store.storeid', [$store_id])
            ->get()->toArray();

        $homeheader = view('share.homeheader_login')->with('UserID_client', $UserID_client)
            ->with('customer', $customer)
            ->with('store_selected', $store_selected)
            ->with('store', $store);
        $homefooter = view('share.homefooter');
        $sub_nav_my_account = view('share.sub_nav_my_account')->with('customer', $customer);

        return view('client.my-account.manage_orders')->with('share.homeheader_login', $homeheader)->with('share.homefooter', $homefooter)
            ->with('share.sub_nav_my_account', $sub_nav_my_account)
            ->with('customer_order', $customer_order)
            ->with('customer_order_detail', $customer_order_detail);
    }

    public function order_detail($order_id)
    {
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        $customer = DB::table('customer')
            ->join('user', 'user.userid', '=', 'customer.userid')
            ->where('customer.userid', $UserID_client)->get()->toArray();

        $order_detail = DB::table('customer')
            ->join('user', 'user.userid', '=', 'customer.userid')
            ->join('order', 'order.cusid', '=', 'customer.cusid')
            //->join('order_details', 'order_details.orderid', '=', 'order.orderid')
            //->join('product', 'product.proid', '=', 'order_details.proid')
            //->join('product_image', 'product.proid', '=', 'product_image.proid')
            ->join('transport', 'transport.transid', '=', 'order.transid')
            ->join('address', 'address.addid', '=', 'order.addid')
            ->where('customer.userid', $UserID_client)
            ->where('order.orderid', $order_id)
            //->where('product_image.imgdata', 'like', 'main%')
            ->orderBy('order.orderid', 'desc')->distinct('product.orderid')->get()->toArray();

        $order_detail_product = DB::table('customer')
            ->select(
                'user.*',
                'order.*',
                'product.*',
                'product_image.*',
                'transport.*',
                'address.*',
                'order_details.price as price_detail',
                'order_details.orderid as orderid',
                'order_details.proid as proid',
                'order_details.quantity as quantity'
            )
            ->join('user', 'user.userid', '=', 'customer.userid')
            ->join('order', 'order.cusid', '=', 'customer.cusid')
            ->join('order_details', 'order_details.orderid', '=', 'order.orderid')
            ->join('product', 'product.proid', '=', 'order_details.proid')
            ->join('product_image', 'product.proid', '=', 'product_image.proid')
            ->join('transport', 'transport.transid', '=', 'order.transid')
            ->join('address', 'address.addid', '=', 'order.addid')
            ->where('customer.userid', $UserID_client)
            ->where('order.orderid', $order_id)
            ->where('product_image.imgdata', 'like', 'main%')
            ->orderBy('order.orderid', 'desc')->distinct('product.orderid')->get()->toArray();

        // echo '<pre>';
        // print_r($order_detail);
        // echo '</pre>';

        $store_id = Session::get('store_id');
        $store_selected = DB::table('store')
            ->where('storeid', $store_id)->get()->toArray();
        $store = DB::table('store')
            ->whereNotIn('store.storeid', [$store_id])
            ->get()->toArray();

        $homeheader = view('share.homeheader_login')->with('UserID_client', $UserID_client)
            ->with('customer', $customer)
            ->with('store_selected', $store_selected)
            ->with('store', $store);
        $homefooter = view('share.homefooter');
        $sub_nav_my_account = view('share.sub_nav_my_account')->with('customer', $customer);

        return view('client.my-account.order_detail')->with('share.homeheader_login', $homeheader)->with('share.homefooter', $homefooter)
            ->with('share.sub_nav_my_account', $sub_nav_my_account)
            ->with('order_detail', $order_detail)
            ->with('order_detail_product', $order_detail_product);
    }
}

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
            return Redirect::to('/client');
        } else {
            return Redirect::to('/');
        }
    }

    public function account_info()
    {
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        $customer = DB::table('customer')
            ->join('user', 'user.userid', '=', 'customer.userid')
            ->where('customer.userid', $UserID_client)->get()->toArray();
        $homeheader = view('share.homeheader_login')->with('UserID_client', $UserID_client)->with('customer', $customer);
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
        $homeheader = view('share.homeheader_login')->with('UserID_client', $UserID_client)->with('customer', $customer);
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
}

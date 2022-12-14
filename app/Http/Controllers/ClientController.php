<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function AuthLogin(){
        $UserID_client=Session::get('UserID_client');
        if ($UserID_client){
            return Redirect::to('/client');
        } else {
            return Redirect::to('/');
        }   
    }

    public function homepage_login()
    {
        $homeheader = view('share.homeheader_login');
        $homefooter = view('share.homefooter');
        return view('welcome_login')->with('share.homeheader_login', $homeheader)->with('share.homefooter', $homefooter);
    }

    public function index_fish_and_meat(){
        $this->AuthLogin();
        return view('client.overview-product.index_fish_and_meat');
    }

    public function login_index_fish_and_meat(){
        $this->AuthLogin();
        return view('client.overview-product.login_index_fish_and_meat');
    }

    public function index_beef_goat(){
        return view('client.overview-product.index_beef_goat');
    }

    public function detail_beef_goat(){
        return view('client.overview-product.detail_beef_goat');

    }

    public function login_index_beef_goat(){
        $this->AuthLogin();
        return view('client.overview-product.login_index_beef_goat');
    }

    public function login_detail_beef_goat(){
        $this->AuthLogin();
        return view('client.overview-product.login_detail_beef_goat');
    }

    public function index_fruit(){
        $this->AuthLogin();
        return view('client.overview-product.index_fruit');
    }

    public function index_imported_fruit(){
        $this->AuthLogin();
        return view('client.overview-product.index_imported_fruit');
    }

    public function index_vegetable(){
        $this->AuthLogin();
        return view('client.overview-product.index_vegetable');
    }

    public function index_leaf_vegetable(){
        $this->AuthLogin();
        return view('client.overview-product.index_leaf_vegetable');
    }

    public function detail_leaf_vegetable(){
        $this->AuthLogin();
        return view('client.overview-product.detail_leaf_vegetable');
    }
    
    public function login_index_vegetable(){
        $this->AuthLogin();
        return view('client.overview-product.login_index_vegetable');
    }

    public function login_index_leaf_vegetable(){
        $this->AuthLogin();
        return view('client.overview-product.login_index_leaf_vegetable');
    }

    public function login_detail_leaf_vegetable(){
        $this->AuthLogin();
        return view('client.overview-product.login_detail_leaf_vegetable');
    }

    public function detail_imported_fruit(){
        $this->AuthLogin();
        return view('client.overview-product.detail_imported_fruit');
    }

    public function login_index_fruit(){
        $this->AuthLogin();
        return view('client.overview-product.login_index_fruit');
    }

    public function login_index_imported_fruit(){
        $this->AuthLogin();
        return view('client.overview-product.login_index_imported_fruit');
    }

    public function login_detail_imported_fruit(){
        $this->AuthLogin();
        return view('client.overview-product.login_detail_imported_fruit');
    }

    public function cart_info(){
        $this->AuthLogin();
        return view('client.buy-and-pay.cart_info');
    }

}

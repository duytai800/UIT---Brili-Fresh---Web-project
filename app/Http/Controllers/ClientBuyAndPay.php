<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class ClientBuyAndPay extends Controller{
    public function cart_info_check(){
        return view('client.buy-and-pay.cart_info_check');
    }
}
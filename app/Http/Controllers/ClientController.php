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

    public function index_fish_and_meat(){
        $this->AuthLogin();
        //Redirect::setIntendedUrl(url()->previous()); 
        $UserID_client = Session::get('UserID_client');
        if($UserID_client){
            $header = view('share.login_fish_and_meat_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_fish_and_meat')->with('share.login_fish_and_meat_header', $header)->with('share.homefooter', $footer);
        }else {           
            $header = view('share.fish_and_meat_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_fish_and_meat')->with('share.fish_and_meat_header', $header)->with('share.homefooter', $footer);
        }  
    }

    public function index_beef_goat(){
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        if($UserID_client){
            $header = view('share.login_fish_and_meat_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_beef_goat')->with('share.login_fish_and_meat_header', $header)->with('share.homefooter', $footer);
        }else {           
            $header = view('share.fish_and_meat_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_beef_goat')->with('share.fish_and_meat_header', $header)->with('share.homefooter', $footer);
        }  
    }

    public function detail_beef_goat(){
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        if($UserID_client){
            $header = view('share.login_fish_and_meat_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.detail_beef_goat')->with('share.login_fish_and_meat_header', $header)->with('share.homefooter', $footer);
        }else {           
            $header = view('share.fish_and_meat_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.detail_beef_goat')->with('share.fish_and_meat_header', $header)->with('share.homefooter', $footer);
        }          
    }

    public function index_fruit(){
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        if($UserID_client){
            $header = view('share.login_fruit_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_fruit')->with('share.login_fruit_header', $header)->with('share.homefooter', $footer);
        }else {           
            $header = view('share.fruit_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_fruit')->with('share.fruit_header', $header)->with('share.homefooter', $footer);
        }         
    }

    public function index_imported_fruit(){
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        if($UserID_client){
            $header = view('share.login_fruit_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_imported_fruit')->with('share.login_fruit_header', $header)->with('share.homefooter', $footer);
        }else {           
            $header = view('share.fruit_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_imported_fruit')->with('share.fruit_header', $header)->with('share.homefooter', $footer);
        }       
    }

    public function detail_imported_fruit(){
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        if($UserID_client){
            $header = view('share.login_fruit_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.detail_imported_fruit')->with('share.login_fruit_header', $header)->with('share.homefooter', $footer);
        }else {           
            $header = view('share.fruit_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.detail_imported_fruit')->with('share.fruit_header', $header)->with('share.homefooter', $footer);
        }    
        
    } 

    public function index_vegetable(){
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        if($UserID_client){
            $header = view('share.login_vegetable_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_vegetable')->with('share.login_vegetable_header', $header)->with('share.homefooter', $footer);
        }else {           
            $header = view('share.vegetable_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_vegetable')->with('share.vegetable_header', $header)->with('share.homefooter', $footer);
        }      
    }

    public function index_leaf_vegetable(){
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        if($UserID_client){
            $header = view('share.login_vegetable_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_leaf_vegetable')->with('share.login_vegetable_header', $header)->with('share.homefooter', $footer);
        }else {           
            $header = view('share.vegetable_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_leaf_vegetable')->with('share.vegetable_header', $header)->with('share.homefooter', $footer);
        }  
    }

    public function detail_leaf_vegetable(){
        $this->AuthLogin();
        $UserID_client = Session::get('UserID_client');
        if($UserID_client){
            $header = view('share.login_vegetable_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.detail_leaf_vegetable')->with('share.login_vegetable_header', $header)->with('share.homefooter', $footer);
        }else {           
            $header = view('share.vegetable_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.detail_leaf_vegetable')->with('share.vegetable_header', $header)->with('share.homefooter', $footer);
        }  
        
    }

}

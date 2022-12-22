<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class ClientController extends Controller
{


    public function index_fish_and_meat()
    {
        //Redirect::setIntendedUrl(url()->previous()); 
        $UserID_client = Session::get('UserID_client');
        if ($UserID_client) {
            $header = view('share.login_fish_and_meat_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_fish_and_meat')->with('share.login_fish_and_meat_header', $header)->with('share.homefooter', $footer);
        } else {
            $header = view('share.fish_and_meat_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_fish_and_meat')->with('share.fish_and_meat_header', $header)->with('share.homefooter', $footer);
        }
    }

    public function index_beef_goat()
    {
        $UserID_client = Session::get('UserID_client');

        $beef_goat_products = DB::table('product')
            ->select('product.*', 'product_image.*', 'type.*', 'discount_product.value as value_discount_product', 'discount_type.value as value_discount_type', 'stock.ProId', 'stock.quantity as product_quantity')
            ->join('product_image', 'product.proid', '=', 'product_image.proid')
            ->join('type', 'product.typeid', '=', 'type.typeid')
            ->leftjoin('stock', 'product.proid', '=', 'stock.proid')
            ->leftjoin('discount_product', 'product.proid', '=', 'discount_product.proid')
            ->leftjoin('discount_type', 'product.typeid', '=', 'discount_type.typeid')

            ->where('product.IsDeleted', 0)->where('product_image.imgdata', 'like', 'main%')
            ->where('type.typeid', 5)->where('type.typeid', 5)->whereRaw('stock.quantity  >0')
            ->orderBy('product.proid', 'asc')->distinct('product.proid')        
            //->get();
            ->paginate(2);


        if ($UserID_client) {
            $header = view('share.login_fish_and_meat_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');

            return view('client.overview-product.index_beef_goat')->with('share.login_fish_and_meat_header', $header)->with('share.homefooter', $footer)
                ->with('beef_goat_products', $beef_goat_products);
        } else {
            $header = view('share.fish_and_meat_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_beef_goat')->with('share.fish_and_meat_header', $header)->with('share.homefooter', $footer)
                ->with('beef_goat_products', $beef_goat_products);
        }
    }

    public function detail_beef_goat($pro_id)
    {
        $UserID_client = Session::get('UserID_client');

        $beef_goat_products = DB::table('product')
            ->select('product.*', 'product_image.*', 'type.*', 'discount_product.value as value_discount_product', 'discount_type.value as value_discount_type', 'stock.ProId', 'stock.quantity as product_quantity')
            ->join('product_image', 'product.proid', '=', 'product_image.proid')
            ->join('type', 'product.typeid', '=', 'type.typeid')
            ->leftjoin('stock', 'product.proid', '=', 'stock.proid')
            ->leftjoin('discount_product', 'product.proid', '=', 'discount_product.proid')
            ->leftjoin('discount_type', 'product.typeid', '=', 'discount_type.typeid')

            ->where('product.IsDeleted', 0)->where('product_image.imgdata', 'like', 'main%')
            ->where('type.typeid', 5)->whereRaw('stock.quantity  >0')
            ->where('product.proid', $pro_id)
            ->orderBy('product.proid', 'asc')->distinct('product.proid')->get();

        $related_beef_goat_products = DB::table('product')
            ->select('product.*', 'product_image.*', 'type.*', 'discount_product.value as value_discount_product', 'discount_type.value as value_discount_type', 'stock.ProId', 'stock.quantity as product_quantity')
            ->join('product_image', 'product.proid', '=', 'product_image.proid')
            ->join('type', 'product.typeid', '=', 'type.typeid')
            ->leftjoin('stock', 'product.proid', '=', 'stock.proid')
            ->leftjoin('discount_product', 'product.proid', '=', 'discount_product.proid')
            ->leftjoin('discount_type', 'product.typeid', '=', 'discount_type.typeid')
            ->where('product.IsDeleted', 0)->where('product_image.imgdata', 'like', 'main%')
            ->where('type.typeid', 5)->whereNotIn('product.proid', [$pro_id])->whereRaw('stock.quantity >0')
            ->orderBy('product.proid', 'asc')->distinct('product.proid')->get()->random(5);

        // echo '<pre>';
        // print_r($related_beef_goat_products);
        // echo '</pre>';

        $des_img = DB::table('product_image')
            ->select('ImgData')->where('product_image.ImgData', 'like', 'des%')->where('product_image.proid', $pro_id)
            ->distinct()->get()->toArray();

        if (count($des_img) == 3) {
            $des_img_0 = $des_img[0]->ImgData;
            $des_img_1 = $des_img[1]->ImgData;
            $des_img_2 = $des_img[2]->ImgData;
        } elseif (count($des_img) == 2) {
            $des_img_0 = $des_img[0]->ImgData;
            $des_img_1 = $des_img[1]->ImgData;
            $des_img_2 = null;
        } elseif (count($des_img) == 1) {
            $des_img_0 = $des_img[0]->ImgData;
            $des_img_1 = null;
            $des_img_2 = null;
        } else {
            $des_img_0 = null;
            $des_img_1 = null;
            $des_img_2 = null;
        }

        if ($UserID_client) {
            $header = view('share.login_fish_and_meat_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.detail_beef_goat')->with('share.login_fish_and_meat_header', $header)->with('share.homefooter', $footer)
                ->with('des_img', $des_img)
                ->with('des_img_0', $des_img_0)
                ->with('des_img_1', $des_img_1)
                ->with('des_img_2', $des_img_2)
                ->with('des_img_2', $des_img_2)
                ->with('related_beef_goat_products', $related_beef_goat_products)
                ->with('beef_goat_products', $beef_goat_products);
        } else {
            $header = view('share.fish_and_meat_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.detail_beef_goat')->with('share.fish_and_meat_header', $header)->with('share.homefooter', $footer)
                ->with('des_img', $des_img)
                ->with('des_img_0', $des_img_0)
                ->with('des_img_1', $des_img_1)
                ->with('des_img_2', $des_img_2)
                ->with('related_beef_goat_products', $related_beef_goat_products)
                ->with('beef_goat_products', $beef_goat_products);
        }
    }

    public function index_fruit()
    {
        $UserID_client = Session::get('UserID_client');
        if ($UserID_client) {
            $header = view('share.login_fruit_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_fruit')->with('share.login_fruit_header', $header)->with('share.homefooter', $footer);
        } else {
            $header = view('share.fruit_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_fruit')->with('share.fruit_header', $header)->with('share.homefooter', $footer);
        }
    }

    public function index_imported_fruit()
    {
        $UserID_client = Session::get('UserID_client');
        if ($UserID_client) {
            $header = view('share.login_fruit_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_imported_fruit')->with('share.login_fruit_header', $header)->with('share.homefooter', $footer);
        } else {
            $header = view('share.fruit_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_imported_fruit')->with('share.fruit_header', $header)->with('share.homefooter', $footer);
        }
    }

    public function detail_imported_fruit()
    {
        $UserID_client = Session::get('UserID_client');
        if ($UserID_client) {
            $header = view('share.login_fruit_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.detail_imported_fruit')->with('share.login_fruit_header', $header)->with('share.homefooter', $footer);
        } else {
            $header = view('share.fruit_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.detail_imported_fruit')->with('share.fruit_header', $header)->with('share.homefooter', $footer);
        }
    }

    public function index_vegetable()
    {
        $UserID_client = Session::get('UserID_client');
        if ($UserID_client) {
            $header = view('share.login_vegetable_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_vegetable')->with('share.login_vegetable_header', $header)->with('share.homefooter', $footer);
        } else {
            $header = view('share.vegetable_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_vegetable')->with('share.vegetable_header', $header)->with('share.homefooter', $footer);
        }
    }

    public function index_leaf_vegetable()
    {
        $UserID_client = Session::get('UserID_client');
        if ($UserID_client) {
            $header = view('share.login_vegetable_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_leaf_vegetable')->with('share.login_vegetable_header', $header)->with('share.homefooter', $footer);
        } else {
            $header = view('share.vegetable_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.index_leaf_vegetable')->with('share.vegetable_header', $header)->with('share.homefooter', $footer);
        }
    }

    public function detail_leaf_vegetable()
    {
        $UserID_client = Session::get('UserID_client');
        if ($UserID_client) {
            $header = view('share.login_vegetable_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.detail_leaf_vegetable')->with('share.login_vegetable_header', $header)->with('share.homefooter', $footer);
        } else {
            $header = view('share.vegetable_header')->with('UserID_client', $UserID_client);
            $footer = view('share.homefooter');
            return view('client.overview-product.detail_leaf_vegetable')->with('share.vegetable_header', $header)->with('share.homefooter', $footer);
        }
    }
}

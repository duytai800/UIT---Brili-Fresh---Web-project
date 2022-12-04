<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class AdminProduct extends Controller
{
    public function all_products()
    {
        $all_products = DB::table('product')
            ->select('product.*', 'product_image.*', 'type.*', 'stock.ProId', 'stock.quantity as product_quantity')
            ->join('product_image', 'product.proid', '=', 'product_image.proid')
            ->join('type', 'product.typeid', '=', 'type.typeid')
            ->join('stock', 'product.proid', '=', 'stock.proid')
            ->where('product.IsDeleted', 0)-> orderBy('product.proid', 'asc')->distinct()->get();

        $manage_all_products = view('admin.product.admin_product')
            ->with('all_products', $all_products);
        // echo '<pre>';
        // print_r($all_products);
        // echo '</pre>';

        return view('admin_layout')->with('admin.product.admin_product', $manage_all_products);
    }

}

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
            ->where('product.IsDeleted', 0)->orderBy('product.proid', 'asc')->distinct()->get();

        $manage_all_products = view('admin.product.admin_product')
            ->with('all_products', $all_products);
        // echo '<pre>';
        // print_r($all_products);
        // echo '</pre>';

        return view('admin_layout')->with('admin.product.admin_product', $manage_all_products);
    }

    public function create_product()
    {

        $main_type = DB::table('type')
            ->select('type.MainType')

            ->distinct()->get();
        $sub_type_thitca = DB::table('type')
            ->select('type.SubType')->where('type.MainType', 'Thịt cá')
            ->distinct()->get()->toArray();
        $sub_type_raucu = DB::table('type')
            ->select('type.SubType')->where('type.MainType', 'Rau củ')
            ->distinct()->get();
        $sub_type_traicay = DB::table('type')
            ->select('type.SubType')->where('type.MainType', 'Trái cây 4 mùa')
            ->distinct()->get();

        $manage_type = view('admin.product.create_product')
            ->with('sub_type_thitca', $sub_type_thitca)
            ->with('sub_type_raucu', $sub_type_raucu)
            ->with('sub_type_traicay', $sub_type_traicay)
            ->with('main_type', $main_type);

        return view('admin_layout')->with('admin.product.create_product', $manage_type);
    }

    public function save_product(Request $request)
    {
        $type_id = DB::table('type')
            ->select('typeid')->where('type.subtype', $request->product_subtype)
            ->where('type.maintype', $request->product_type)->get()->toArray();
        $type_id = $type_id[0]->typeid;

        $product_date = $request->product_date;
        $product_date = explode("/", $product_date);
        $product_date = $product_date[1] . "-" . $product_date[0] . "-" . $product_date[2];
        $product_date = date('Y-m-d', strtotime($product_date));

        $product_unit = $request->unit_number . " " . $request->unit_count;

        $data = array();
        $data['ProName'] = $request->product_name;
        $data['Price'] = $request->product_price;
        $data['TypeID'] = $type_id;
        $data['Source'] = $request->product_source;
        $data['StartDate'] = $product_date;
        $data['Des'] = $request->product_discription;
        $data['Unit'] = $product_unit;

        DB::table('product')->insert($data);
        //Session::put('message','Thêm sản phẩm thành công!');
        //return Redirect::to('all-products');     
    }
}

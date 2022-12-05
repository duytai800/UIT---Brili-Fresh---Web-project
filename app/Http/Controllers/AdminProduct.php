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
            ->leftjoin('stock', 'product.proid', '=', 'stock.proid')
            ->where('product.IsDeleted', 0)->where('product_image.imgdata', 'like', 'main%')
            ->orderBy('product.proid', 'asc')->distinct('product.proid')->get();

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
            ->select('type.SubType')->where('type.MainType', 'Hoa quả 4 mùa')
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
        $pro_id = DB::table('product')->max('proid') + 1;

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
        $data['ProID'] = $pro_id;
        $data['ProName'] = $request->product_name;
        $data['Price'] = $request->product_price;
        $data['TypeID'] = $type_id;
        $data['Source'] = $request->product_source;
        $data['StartDate'] = $product_date;
        $data['Des'] = $request->product_discription;
        $data['Unit'] = $product_unit;
        DB::table('product')->insert($data);

        $data_img = array();
        $data_img_description = array();
        $get_image_main = $request->file('product_img_main');

  
        if ($get_image_main) {
            if ($get_image_description = $request->file('product_img_description')) {

                $get_name_img = $get_image_main->getClientOriginalName();
                $name_img = current(explode('.', $get_name_img));
                $image_main = 'main' . '-' . $name_img . rand(0, 999) . '.' . $get_image_main->getClientOriginalExtension();
                $get_image_main->move('public/upload/product', $image_main);
                $data_img['ImgData'] = $image_main;
                $data_img['ProID'] = $pro_id;
                echo '<pre>';
                print_r($data_img);
                echo '</pre>';
     
                foreach ($get_image_description as $get_image_description_detail) {

                    $get_name_img_description = $get_image_description_detail->getClientOriginalName();
                    $name_img_description = current(explode('.', $get_name_img_description));
                    $image_description = 'des' . '-' . $name_img_description . rand(0, 999) . '.' . $get_image_description_detail->getClientOriginalExtension();
                    $get_image_description_detail->move('public/upload/product', $image_description);
                    $data_img_description['ProID'] = $pro_id;
                    $data_img_description['ImgData'] = $image_description;
                    DB::table('product_image')->insert($data_img_description);

                    //echo $get_name_img_description;
                    echo "OK";


                    echo '<pre>';
                    print_r($data_img_description);
                    echo '</pre>';
                }

                DB::table('product_image')->insert($data_img);
                Session::put('message', 'Thêm sản phẩm thành công!');
                return Redirect::to('all-products');
            }


            // DB::table('product_image')->insert($data_img);
            // Session::put('message', 'Thêm sản phẩm thành công!');
            // return Redirect::to('all-products');
        }
        $data_img['ImgData'] = '';
        $data_img['ProID'] = $pro_id;
        // DB::table('product_image')->insert($data_img);
        // Session::put('message', 'Thêm sản phẩm thành công!');
        // return Redirect::to('all-products');
    }
}

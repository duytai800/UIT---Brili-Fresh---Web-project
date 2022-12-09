<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class AdminDiscount extends Controller
{
    public function all_discount_products()
    {
        $all_discount_products = DB::table('discount_product')
            ->join('product_image', 'product_image.proid', '=', 'discount_product.proid')
            ->join('product', 'product.proid', '=', 'discount_product.proid')
            ->where('product_image.imgdata', 'like', 'main%')
            ->select(
                DB::raw('DATE_FORMAT(discount_product.startdate, "%d-%m-%Y %H:%m:%s") as startdate'),
                DB::raw('DATE_FORMAT(discount_product.enddate, "%d-%m-%Y %H:%m:%s") as enddate'),
                'discount_product.disid',
                'product.proid',
                'product.proname',
                'discount_product.value',
                'product_image.ImgData',
                'discount_product.isdeleted'
            )
            ->orderBy('discount_product.disid', 'asc')->get();

        // $start_date = DB::table('discount_product')->select('startdate')->orderBy('discount_product.disid', 'asc')->get()->toArray();
        // $list_start_date = array();

        // for ($i = 0; $i < count($start_date); $i++) {
        //     $temp_start_date = $start_date[$i]->startdate;
        //     echo $temp_start_date;
        //     if ($temp_start_date) {
        //         $temp_start_date_time = explode(" ", $temp_start_date);
        //         $temp_start_date = explode("-", $temp_start_date_time[0]);
        //         $temp_start_date = $temp_start_date[2] . "-" . $temp_start_date[1] . "-" . $temp_start_date[0] . " " . $temp_start_date_time[1];
        //         array_push($list_start_date, $temp_start_date);
        //     } else {
        //         array_push($list_start_date, $temp_start_date);
        //     }
        // }

        $manage_all_discount_products = view('admin.discount-product.admin_discount_products')
            ->with('all_discount_products', $all_discount_products);
        return view('admin_layout')->with('admin.discount-product.admin_discount_products', $manage_all_discount_products);
    }

    public function create_discount_product()
    {
        $products = DB::table('product')
            ->where('product.isdeleted', 0)->orderBy('product.proid', 'asc')->get();
        $manage_discount_product = view('admin.discount-product.create_discount_product')
            ->with('products', $products);
        return view('admin_layout')->with('admin.discount-product.create_discount_product', $manage_discount_product);
    }

    public function save_discount_product(Request $request)
    {
        $startdate = $request->startdate;
        //echo $startdate;
        $startdate = explode(" ", $startdate);
        $start_time = $startdate[1];
        $startdate = explode("/", $startdate[0]);
        $startdate = $startdate[2] . "-" . $startdate[1] . "-" . $startdate[0] . " " .  $start_time . ":" . "00";
        $startdate = date('Y-m-d H:i:s', strtotime($startdate));


        $enddate = $request->enddate;
        $enddate = explode(" ", $enddate);
        $end_time = $enddate[1];
        $enddate = explode("/", $enddate[0]);
        $enddate = $enddate[2] . "-" . $enddate[1] . "-" . $enddate[0] . " " .  $end_time . ":" . "00";
        $enddate = date('Y-m-d H:i:s', strtotime($enddate));
        //echo $enddate;

        $data = array();
        $data['ProID'] = $request->pro_id;
        $data['Value'] = $request->discount_value;
        $data['StartDate'] = $startdate;
        $data['EndDate'] = $enddate;

        DB::table('discount_product')->insert($data);
        Session::put('add_discount_product', 'Thêm khuyến mãi sản phẩm thành công!');
        return Redirect::to('all-discount-products');
    }

    public function edit_discount_product($dis_id)
    {
        $discount_product = DB::table('discount_product')
            ->where('discount_product.disid', $dis_id)->get();
        $product = DB::table('product')
            ->join('discount_product', 'product.proid', '=', 'discount_product.proid')
            ->where('product.isdeleted', 0)->where('discount_product.disid', $dis_id)->orderBy('product.proid', 'asc')->get();

        $startdate = $discount_product[0]->StartDate;
        $startdate = explode(" ", $startdate);
        $start_time = $startdate[1];
        $startdate = explode("-", $startdate[0]);
        $startdate = $startdate[2] . "/" . $startdate[1] . "/" . $startdate[0] . " " .  $start_time . ":" . "00";

        $manage_discount_product = view('admin.discount-product.edit_discount_product')
            ->with('discount_product', $discount_product)
            ->with('startdate', $startdate)
            ->with('product', $product);
        return view('admin_layout')->with('admin.discount-product.edit_discount_product', $manage_discount_product);
    }

    public function update_discount_product(Request $request, $did_id)
    {
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        if (is_null($startdate)) {
            $startdate = $request->startdate;
        } else {
            $startdate = explode(" ", $startdate);
            $start_time = $startdate[1];
            $startdate = explode("/", $startdate[0]);
            $startdate = $startdate[2] . "-" . $startdate[1] . "-" . $startdate[0] . " " .  $start_time . ":" . "00";
            $startdate = date('Y-m-d H:i:s', strtotime($startdate));
        }

        if (is_null($enddate)) {
            $enddate = $request->enddate;
        } else {
            $enddate = $request->enddate;
            $enddate = explode(" ", $enddate);
            $end_time = $enddate[1];
            $enddate = explode("/", $enddate[0]);
            $enddate = $enddate[2] . "-" . $enddate[1] . "-" . $enddate[0] . " " .  $end_time . ":" . "00";
            $enddate = date('Y-m-d H:i:s', strtotime($enddate));
        }

        $data = array();
        $data['Value'] = $request->discount_value;
        $data['StartDate'] = $startdate;
        $data['EndDate'] = $enddate;
        DB::table('discount_product')->where('disid', $did_id)->update($data);
        Session::put('edit_dicsount_product_message', 'Sửa thông tin khuyến mãi thành công!');
        return Redirect::to('all-discount-products');
    }

    public function delete_discount_product($dis_id)
    {

        $product = DB::table('product')
            ->join('discount_product', 'product.proid', '=', 'discount_product.proid')
            ->where('product.isdeleted', 0)->where('discount_product.disid', $dis_id)->orderBy('product.proid', 'asc')->get();

        $startdate = $product[0]->StartDate;
        $startdate = explode(" ", $startdate);
        $start_time = $startdate[1];
        $startdate = explode("-", $startdate[0]);
        $startdate = $startdate[2] . "/" . $startdate[1] . "/" . $startdate[0] . " " .  $start_time;

        $enddate = $product[0]->EndDate;
        $enddate = explode(" ", $enddate);
        $end_time = $enddate[1];
        $enddate = explode("-", $enddate[0]);
        $enddate = $enddate[2] . "/" . $enddate[1] . "/" . $enddate[0] . " " .  $end_time ;

        $manage_discount_product = view('admin.discount-product.delete_discount_product')
            ->with('startdate', $startdate)
            ->with('enddate', $enddate)
            ->with('product', $product);
        return view('admin_layout')->with('admin.discount-product.delete_discount_product', $manage_discount_product);
    }

    public function confirm_delete_discount_product($dis_id){
        $data = array();
        $data['IsDeleted'] = 1;
        DB::table('discount_product')->where('discount_product.disid', $dis_id)->update($data);
        Session::put('delete_discount_product_message', 'Xoá thông tin khuyến mãi thành công!');
        return Redirect::to('all-discount-products');
    }
}

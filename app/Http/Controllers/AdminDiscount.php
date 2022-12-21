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
                DB::raw('DATE_FORMAT(discount_product.startdate, "%d-%m-%Y %H:%i:%s") as startdate'),
                DB::raw('DATE_FORMAT(discount_product.enddate, "%d-%m-%Y %H:%i:%s") as enddate'),
                'discount_product.disid',
                'product.proid',
                'product.proname',
                'discount_product.value',
                'product_image.ImgData',
                'discount_product.isdeleted'
            )
            ->orderBy('discount_product.disid', 'asc')->get();

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
        $disid = DB::table('discount_type')->where('discount_type.typeid', $request->pro_id)->get()->toArray();
        if (empty($disid)) {
            $startdate = $request->startdate;
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
        } else {
            Session::put('add_discount_product_fail', 'Chương trình khuyến mãi cho sản phẩm này đã được áp dụng!');
            return Redirect::to('all-discount-products');
        }
    }

    public function edit_discount_product($dis_id)
    {
        // $discount_product = DB::table('discount_product')
        //     ->where('discount_product.disid', $dis_id)->get();
        $product = DB::table('product')
            ->join('discount_product', 'product.proid', '=', 'discount_product.proid')
            ->where('discount_product.disid', $dis_id)
            ->select(
                DB::raw('DATE_FORMAT(discount_product.startdate, "%d-%m-%Y %H:%i:%s") as StartDate'),
                DB::raw('DATE_FORMAT(discount_product.enddate, "%d-%m-%Y %H:%i:%s") as EndDate'),
                'discount_product.DisID',
                'discount_product.ProID',
                'product.ProName',
                'discount_product.Value'
            )->orderBy('product.proid', 'asc')->get();

        $manage_discount_product = view('admin.discount-product.edit_discount_product')
            //->with('discount_product', $discount_product)
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
        Session::put('edit_discount_product_message', 'Sửa thông tin khuyến mãi thành công!');
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
        $enddate = $enddate[2] . "/" . $enddate[1] . "/" . $enddate[0] . " " .  $end_time;

        $manage_discount_product = view('admin.discount-product.delete_discount_product')
            ->with('startdate', $startdate)
            ->with('enddate', $enddate)
            ->with('product', $product);
        return view('admin_layout')->with('admin.discount-product.delete_discount_product', $manage_discount_product);
    }

    public function confirm_delete_discount_product($dis_id)
    {
        $data = array();
        $data['IsDeleted'] = 1;
        DB::table('discount_product')->where('discount_product.disid', $dis_id)->update($data);
        Session::put('delete_discount_product_message', 'Xoá thông tin khuyến mãi thành công!');
        return Redirect::to('all-discount-products');
    }

    public function all_discount_types()
    {
        $all_discount_types = DB::table('discount_type')
            ->join('type', 'discount_type.typeid', '=', 'type.typeid')
            ->select(
                DB::raw('DATE_FORMAT(discount_type.startdate, "%d/%m/%Y %H:%i:%s") as StartDate'),
                DB::raw('DATE_FORMAT(discount_type.enddate, "%d/%m/%Y %H:%i:%s") as EndDate'),
                'discount_type.DisID',
                'discount_type.TypeID',
                'Type.SubType',
                'discount_type.Value'
            )
            ->orderBy('discount_type.disid', 'asc')->get();
        $manage_all_discount_types = view('admin.discount-type.admin_discount_type')
            ->with('manage_all_discount_types', $all_discount_types);
        return view('admin_layout')->with('admin.discount-type.admin_discount_type', $manage_all_discount_types);
    }

    public function create_discount_type()
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
        $manage_all_discount_types = view('admin.discount-type.create_discount_type')
            //->with('manage_all_discount_types', $all_discount_types)
            ->with('sub_type_thitca', $sub_type_thitca)
            ->with('sub_type_raucu', $sub_type_raucu)
            ->with('sub_type_traicay', $sub_type_traicay)
            ->with('main_type', $main_type);
        return view('admin_layout')->with('admin.discount-type.create_discount_type', $manage_all_discount_types);
    }

    public function save_discount_type(Request $request)
    {

        $type_id = DB::table('type')
            ->select('typeid')->where('type.subtype', $request->product_subtype)
            ->where('type.maintype', $request->product_type)->get()->toArray();
        $type_id = $type_id[0]->typeid;

        $disid = DB::table('discount_type')->where('discount_type.typeid', $type_id)->get()->toArray();
        if (empty($disid)) {
            $startdate = $request->startdate;
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
            $data['TypeID'] = $type_id;
            $data['Value'] = $request->discount_value;
            $data['StartDate'] = $startdate;
            $data['EndDate'] = $enddate;

            DB::table('discount_type')->insert($data);
            Session::put('add_discount_type', 'Thêm khuyến mãi sản phẩm thành công!');
            return Redirect::to('all-discount-types');
        } else {
            Session::put('add_discount_type_fail', 'Chương trình khuyến mãi cho loại sản phẩm này đã được áp dụng!');
            return Redirect::to('all-discount-types');
        }
    }

    public function edit_discount_type(Request $request, $dis_id)
    {
        $edit_discount_type = DB::table('discount_type')
            ->join('type', 'discount_type.typeid', '=', 'type.typeid')
            ->select(
                DB::raw('DATE_FORMAT(discount_type.startdate, "%d-%m-%Y %H:%i:%s") as StartDate'),
                DB::raw('DATE_FORMAT(discount_type.enddate, "%d-%m-%Y %H:%i:%s") as EndDate'),
                'discount_type.DisID',
                'discount_type.TypeID',
                'Type.SubType',
                'discount_type.Value',
                'type.MainType',
                'type.SubType',
                'type.TypeID'
            )->where('discount_type.disid', $dis_id)->orderBy('discount_type.disid', 'asc')->get();

        $manage_all_discount_types = view('admin.discount-type.edit_discount_type')
            ->with('edit_discount_type', $edit_discount_type);
        return view('admin_layout')->with('admin.discount-type.edit_discount_type', $manage_all_discount_types);
    }

    public function update_discount_type(Request $request, $dis_id)
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
        DB::table('discount_type')->where('disid', $dis_id)->update($data);
        Session::put('edit_discount_type_message', 'Sửa thông tin khuyến mãi thành công!');
        return Redirect::to('all-discount-types');
    }

    public function delete_discount_type($dis_id)
    {
        $delete_discount_type = DB::table('discount_type')
            ->join('type', 'discount_type.typeid', '=', 'type.typeid')
            ->select(
                DB::raw('DATE_FORMAT(discount_type.startdate, "%d-%m-%Y %H:%i:%s") as StartDate'),
                DB::raw('DATE_FORMAT(discount_type.enddate, "%d-%m-%Y %H:%i:%s") as EndDate'),
                'discount_type.DisID',
                'discount_type.TypeID',
                'Type.SubType',
                'discount_type.Value',
                'type.MainType',
                'type.SubType',
                'type.TypeID'
            )->where('discount_type.disid', $dis_id)->orderBy('discount_type.disid', 'asc')->get();
        $startdate = $delete_discount_type[0]->StartDate;
        $startdate = explode(" ", $startdate);
        $start_time = $startdate[1];
        $startdate = explode("-", $startdate[0]);
        $startdate = $startdate[0] . "/" . $startdate[1] . "/" . $startdate[2] . " " .  $start_time;

        $enddate = $delete_discount_type[0]->EndDate;
        $enddate = explode(" ", $enddate);
        $end_time = $enddate[1];
        $enddate = explode("-", $enddate[0]);
        $enddate = $enddate[0] . "/" . $enddate[1] . "/" . $enddate[2] . " " .  $end_time;

        $manage_all_discount_types = view('admin.discount-type.delete_discount_type')
            ->with('startdate', $startdate)
            ->with('enddate', $enddate)
            ->with('delete_discount_type', $delete_discount_type);
        return view('admin_layout')->with('admin.discount-type.delete_discount_type', $manage_all_discount_types);
    }

    public function confirm_delete_discount_type(Request $request, $dis_id)
    {
        DB::table('discount_type')->where('discount_type.disid', $dis_id)->delete();
        Session::put('delete_discount_type_message', 'Xoá thông tin khuyến mãi thành công!');
        return Redirect::to('all-discount-types');
    }

    public function all_discount_stores()
    {
        $all_discount_stores = DB::table('discount_store')
            ->join('store', 'discount_store.storeid', '=', 'store.storeid')
            ->select(
                DB::raw('DATE_FORMAT(discount_store.startdate, "%d/%m/%Y %H:%i:%s") as StartDate'),
                DB::raw('DATE_FORMAT(discount_store.enddate, "%d/%m/%Y %H:%i:%s") as EndDate'),
                'discount_store.DisID',
                'discount_store.StoreID',
                'discount_store.Value',
                'store.SpecificAddress',
                'store.District',
                'store.City',
                'store.Ward'
            )
            ->orderBy('discount_store.disid', 'asc')->get();
        $manage_all_discount_stores = view('admin.discount-store.admin_discount_store')
            ->with('all_discount_stores', $all_discount_stores);
        return view('admin_layout')->with('admin.discount-store.admin_discount_store', $manage_all_discount_stores);
    }

    public function create_discount_store()
    {
        $discount_store = DB::table('store')->where('isDeleted', 0)
            ->select('store.*')->get();
        $manage_discount_store = view('admin.discount-store.create_discount_store')
            ->with('discount_store', $discount_store);
        return view('admin_layout')->with('admin.discount-store.create_discount_store', $manage_discount_store);
    }

    public function save_discount_store(Request $request)
    {

        $store_id = DB::table('discount_store')
            ->select('storeid')->where('discount_store.storeid', $request->store_id)
            ->get()->toArray();

        if (empty($store_id)) {
            $startdate = $request->startdate;
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

            $data = array();
            $data['StoreID'] = $request->store_id;
            $data['Value'] = $request->discount_value;
            $data['StartDate'] = $startdate;
            $data['EndDate'] = $enddate;

            DB::table('discount_store')->insert($data);
            Session::put('add_discount_store', 'Áp dụng khuyến mãi cho cửa hàng thành công!');
            return Redirect::to('all-discount-stores');
        } else {
            Session::put('add_discount_store_fail', 'Cửa hàng này đã được áp dụng chương trình khuyến mãi!');
            return Redirect::to('all-discount-stores');
        }
    }

    public function edit_discount_store($dis_id)
    {
        $edit_discount_store = DB::table('discount_store')
            ->join('store', 'discount_store.storeid', '=', 'store.storeid')
            ->select(
                DB::raw('DATE_FORMAT(discount_store.startdate, "%d/%m/%Y %H:%i:%s") as StartDate'),
                DB::raw('DATE_FORMAT(discount_store.enddate, "%d/%m/%Y %H:%i:%s") as EndDate'),
                'discount_store.DisID',
                'discount_store.StoreID',
                'discount_store.Value',
                'store.SpecificAddress',
                'store.District',
                'store.City',
                'store.Ward'
            )->where('discount_store.disid', $dis_id)
            ->orderBy('discount_store.disid', 'asc')->get();
        $manage_discount_store = view('admin.discount-store.edit_discount_store')
            ->with('edit_discount_store', $edit_discount_store);
        return view('admin_layout')->with('admin.discount-store.edit_discount_store', $manage_discount_store);
    }

    public function update_discount_store(Request $request, $dis_id)
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
        DB::table('discount_store')->where('disid', $dis_id)->update($data);
        Session::put('edit_discount_store_message', 'Sửa thông tin khuyến mãi thành công!');
        return Redirect::to('all-discount-stores');
    }

    public function delete_discount_store($dis_id)
    {
        $delete_discount_store = DB::table('discount_store')
            ->join('store', 'discount_store.storeid', '=', 'store.storeid')
            ->select(
                DB::raw('DATE_FORMAT(discount_store.startdate, "%d/%m/%Y %H:%i:%s") as StartDate'),
                DB::raw('DATE_FORMAT(discount_store.enddate, "%d/%m/%Y %H:%i:%s") as EndDate'),
                'discount_store.DisID',
                'discount_store.StoreID',
                'discount_store.Value',
                'store.SpecificAddress',
                'store.District',
                'store.City',
                'store.Ward'
            )->where('discount_store.disid', $dis_id)
            ->orderBy('discount_store.disid', 'asc')->get();

        $manage_discount_store = view('admin.discount-store.delete_discount_store')
            ->with('delete_discount_store', $delete_discount_store);
        return view('admin_layout')->with('admin.discount-store.delete_discount_store', $manage_discount_store);
    }

    public function confirm_delete_discount_store($dis_id)
    {
        DB::table('discount_store')->where('discount_store.disid', $dis_id)->delete();
        Session::put('delete_discount_store_message', 'Xoá thông tin khuyến mãi thành công!');
        return Redirect::to('all-discount-stores');
    }

    public function all_discount_orders()
    {
        $all_discount_orders = DB::table('discount_order')
            ->select(
                DB::raw('DATE_FORMAT(discount_order.startdate, "%d/%m/%Y %H:%i:%s") as StartDate'),
                DB::raw('DATE_FORMAT(discount_order.enddate, "%d/%m/%Y %H:%i:%s") as EndDate'),
                'discount_order.DisID',
                'discount_order.DisCode',
                'discount_order.MaxDis',
                'discount_order.CusType',
                'discount_order.DisRate'
            )
            ->orderBy('discount_order.disid', 'asc')->get();
        $manage_all_discount_orders = view('admin.discount-order.admin_discount_order')
            ->with('all_discount_orders', $all_discount_orders);
        return view('admin_layout')->with('admin.discount-order.admin_discount_order', $manage_all_discount_orders);
    }

    public function create_discount_order()
    {
        $manage_all_discount_orders = view('admin.discount-order.create_discount_order');
        return view('admin_layout')->with('admin.discount-order.create_discount_order', $manage_all_discount_orders);
    }

    public function save_discount_order(Request $request)
    {
        $code_discount_order = DB::table('discount_order')
            ->select('discode')->where('discount_order.discode', $request->discode)
            ->get()->toArray();

        if (empty($code_discount_order)) {
            $startdate = $request->startdate;
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

            if (is_null($request->discode)) {
                $code = "BRILI-" . bin2hex(random_bytes(3));
                $data = array();
                $data['DisCode'] = $code;
                $data['DisRate'] = $request->discount_value;
                $data['MaxDis'] = $request->max_discount_value;
                $data['StartDate'] = $startdate;
                $data['EndDate'] = $enddate;
                $data['CusType'] = $request->rank_customer;
                DB::table('discount_order')->insert($data);
                Session::put('add_discount_order_auto', 'Tự động tạo mã khuyến mãi thành công!');
                return Redirect::to('all-discount-orders');
            } else {
                $data = array();
                $data['DisCode'] = $request->discode;
                $data['DisRate'] = $request->discount_value;
                $data['MaxDis'] = $request->max_discount_value;
                $data['StartDate'] = $startdate;
                $data['EndDate'] = $enddate;
                $data['CusType'] = $request->rank_customer;
                DB::table('discount_order')->insert($data);
                Session::put('add_discount_order', 'Tạo mã khuyến mãi thành công!');
                return Redirect::to('all-discount-orders');
            }
        } else {
            Session::put('add_discount_order_fail', 'Mã khuyến mãi này đã được tạo');
            return Redirect::to('all-discount-orders');
        }
    }

    public function edit_discount_order($dis_id)
    {
        $edit_discount_order = DB::table('discount_order')
            ->select(
                DB::raw('DATE_FORMAT(discount_order.startdate, "%d/%m/%Y %H:%i:%s") as StartDate'),
                DB::raw('DATE_FORMAT(discount_order.enddate, "%d/%m/%Y %H:%i:%s") as EndDate'),
                'discount_order.DisID',
                'discount_order.DisCode',
                'discount_order.MaxDis',
                'discount_order.CusType',
                'discount_order.DisRate'
            )->where('discount_order.disid', $dis_id)
            ->orderBy('discount_order.disid', 'asc')->get();
        $custype_original = $edit_discount_order[0]->CusType;
        $manage_all_discount_orders = view('admin.discount-order.edit_discount_order')
            ->with('custype_original', $custype_original)
            ->with('all_discount_orders', $edit_discount_order);
        return view('admin_layout')->with('admin.discount-order.edit_discount_order', $manage_all_discount_orders);
    }

    public function update_discount_order(Request $request, $dis_id)
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
        $data['DisCode'] = $request->discode;
        $data['DisRate'] = $request->discount_value;
        $data['MaxDis'] = $request->max_discount_value;
        $data['StartDate'] = $startdate;
        $data['EndDate'] = $enddate;
        $data['CusType'] = $request->rank_customer;
        DB::table('discount_order')->where('disid', $dis_id)->update($data);
        Session::put('edit_discount_store_message', 'Sửa thông tin khuyến mãi thành công!');
        return Redirect::to('all-discount-orders');
    }

    public function delete_discount_order($dis_id)
    {
        $delete_discount_order = DB::table('discount_order')
            ->select(
                DB::raw('DATE_FORMAT(discount_order.startdate, "%d/%m/%Y %H:%i:%s") as StartDate'),
                DB::raw('DATE_FORMAT(discount_order.enddate, "%d/%m/%Y %H:%i:%s") as EndDate'),
                'discount_order.DisID',
                'discount_order.DisCode',
                'discount_order.MaxDis',
                'discount_order.CusType',
                'discount_order.DisRate'
            )->where('discount_order.disid', $dis_id)
            ->orderBy('discount_order.disid', 'asc')->get();
        $manage_all_discount_orders = view('admin.discount-order.delete_discount_order')
            ->with('all_discount_orders', $delete_discount_order);
        return view('admin_layout')->with('admin.discount-order.delete_discount_order', $manage_all_discount_orders);
    }

    public function confirm_delete_discount_order(Request $request, $dis_id)
    {
        DB::table('discount_order')->where('discount_order.disid', $dis_id)->delete();
        Session::put('delete_discount_order_message', 'Xoá thông tin khuyến mãi thành công!');
        return Redirect::to('all-discount-orders');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class AdminProduct extends Controller
{
    public function AuthLogin()
    {
        $UserID_employee = Session::get('UserID_employee');
        $UserID_manager = Session::get('UserID_manager');
        
        if ($UserID_employee or $UserID_manager ) {
        } else {
            return Redirect::to('/login')->send();
        }
    }


    public function all_products()
    {
        $this->AuthLogin();

        $all_products = DB::table('product')
            ->select('product.*', 'product_image.*', 'type.*')
            ->join('product_image', 'product.proid', '=', 'product_image.proid')
            ->join('type', 'product.typeid', '=', 'type.typeid')
            ->where('product.IsDeleted', 0)->where('product_image.imgdata', 'like', '%is_avt%')
            ->orderBy('product.proid', 'asc')->distinct('product.proid')->get();

        foreach ($all_products as $item) {
            $totalQuantity = AdminProduct::TotalQuantity($item->ProID);
        }

        $insert_subtype = DB::table('type')->get();
        $manage_all_products = view('admin.product.admin_product')
            ->with('all_products', $all_products)
            ->with('insert_subtype', $insert_subtype)
            ->with('totalQuantity', $totalQuantity);
        // echo '<pre>';
        // print_r($all_products);
        // echo '</pre>';

        return view('admin_layout')->with('admin.product.admin_product', $manage_all_products);
    }

    public function TotalQuantity(int $id)
    {
        $TotalQuantity = DB::table('stock')
            ->where('proid', $id)
            ->sum('Quantity');
        if (is_null($TotalQuantity)) {
            $TotalQuantity = 0;
        }
        return $TotalQuantity;
    }

    public function create_product()
    {
        $this->AuthLogin();


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
        $this->AuthLogin();

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
        $data['OriginalPrice'] = $request->product_original_price;
        $data['Price'] = $request->product_price;
        $data['TypeID'] = $type_id;
        $data['Source'] = $request->product_source;
        $data['StartDate'] = $product_date;
        $data['Des'] = $request->product_discription;
        $data['Unit'] = $product_unit;

        $data_img = array();
        $data_img_description = array();
        $get_image_main = $request->file('product_img_main');

        if ($get_image_main) {
            $get_name_img = $get_image_main->getClientOriginalName();
            $name_img = current(explode('.', $get_name_img));
            $image_main = 'is_avt' . '-' . $name_img . rand(0, 999) . '.' . $get_image_main->getClientOriginalExtension();
            $get_image_main->move('public/upload/product', $image_main);
            $data_img['ImgData'] = $image_main;
            $data_img['ProID'] = $pro_id;
            DB::table('product')->insert($data);
            DB::table('product_image')->insert($data_img);
            if ($get_image_description = $request->file('product_img_description')) {
                foreach ($get_image_description as $get_image_description_detail) {
                    $get_name_img_description = $get_image_description_detail->getClientOriginalName();
                    $name_img_description = current(explode('.', $get_name_img_description));
                    $image_description = 'des' . '-' . $name_img_description . rand(0, 999) . '.' . $get_image_description_detail->getClientOriginalExtension();
                    $get_image_description_detail->move('public/upload/product', $image_description);
                    $data_img_description['ProID'] = $pro_id;
                    $data_img_description['ImgData'] = $image_description;
                    DB::table('product_image')->insert($data_img_description);
                }
                Session::put('message_save_product', 'Thêm sản phẩm thành công!');
                return Redirect::to('all-products');
            } else {
                Session::put('message_save_product', 'Thêm sản phẩm thành công! Sản phẩm vừa thêm không có ảnh chi tiết');
                return Redirect::to('all-products');
            }
        } else {
            Session::put('message_save_product_no_des', 'Thêm sản phẩm thất bại! Sản phẩm vừa thêm không có ảnh!');
            return Redirect::to('create-product');
        }
    }

    public function edit_product($product_id)
    {
        $this->AuthLogin();

        $edit_product = DB::table('product')
            ->select(
                'product.*',
                'product_image.*',
                'type.*',
                DB::raw('DATE_FORMAT(product.startdate, "%d-%m-%Y ") as StartDate')
            )
            ->join('product_image', 'product.proid', '=', 'product_image.proid')
            ->join('type', 'product.typeid', '=', 'type.typeid')
            ->where('product.IsDeleted', 0)->where('product_image.imgdata', 'like', '%is_avt%')
            ->where('product.proid', $product_id)
            ->orderBy('product.proid', 'asc')->distinct('product.proid')->get();

        // echo '<pre>';
        // print_r($edit_product);
        // echo '</pre>';

        $product_unit = DB::table('product')
            ->select('unit')->where('product.proid', $product_id)
            ->distinct()->get();
        $product_unit = $product_unit[0]->unit;
        $product_unit = explode(" ", $product_unit);
        $product_unit_unit = array(
            "Kg", "Gam", "Hộp", "Túi"
        );

        $main_img = DB::table('product_image')
            ->select('ImgData')->where('product_image.ImgData', 'like', '%is_avt%')->where('product_image.proid', $product_id)
            ->distinct()->get();
        $des_img = DB::table('product_image')
            ->select('ImgData')->where('product_image.ImgData', 'not like', '%is_avt%')->where('product_image.proid', $product_id)
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

        $product_source = array(
            "Sản phẩm của Brili Fresh", "Sản phẩm nhập khẩu",
        );

        $main_type = DB::table('type')
            ->select('type.MainType')
            ->distinct()->get();

        $sub_type_thitca = DB::table('type')
            ->select('type.SubType', 'type.TypeID')->where('type.MainType', 'Thịt cá')
            ->distinct()->get()->toArray();
        $sub_type_raucu = DB::table('type')
            ->select('type.SubType', 'type.TypeID')->where('type.MainType', 'Rau củ')
            ->distinct()->get()->toArray();
        $sub_type_traicay = DB::table('type')
            ->select('type.SubType', 'type.TypeID')->where('type.MainType', 'Hoa quả 4 mùa')
            ->distinct()->get()->toArray();

        $manage_type = view('admin.product.edit_product')
            ->with('sub_type_thitca', $sub_type_thitca)
            ->with('sub_type_raucu', $sub_type_raucu)
            ->with('sub_type_traicay', $sub_type_traicay)
            ->with('edit_product', $edit_product)
            ->with('main_type', $main_type)
            ->with('main_img', $main_img)
            ->with('des_img_0', $des_img_0)
            ->with('des_img_1', $des_img_1)
            ->with('des_img_2', $des_img_2)
            //->with('product_date', $product_date)
            ->with('product_source', $product_source)
            ->with('product_unit_number', $product_unit[0])
            ->with('product_unit_unit_original', $product_unit[1])
            ->with('product_unit_unit', $product_unit_unit);

        return view('admin_layout')->with('admin.product.edit_product', $manage_type);
    }

    public function update_product(Request $request, $product_id)
    {
        $this->AuthLogin();

        $type_id = DB::table('type')
            ->select('typeid')->where('type.subtype', $request->product_subtype)
            ->where('type.maintype', $request->product_type)->get()->toArray();
        $type_id = $type_id[0]->typeid;
        //echo $type_id;

        $product_date = $request->product_date;

        $product_date = explode("/", $product_date);
        $product_date = $product_date[1] . "-" . $product_date[0] . "-" . $product_date[2];
        $product_date = date('Y-m-d', strtotime($product_date));

        $product_unit = $request->unit_number . " " . $request->unit_count;

        $data = array();

        $data['ProName'] = $request->product_name;
        $data['Price'] = $request->product_price;
        $data['OriginalPrice'] = $request->product_original_price;
        $data['TypeID'] = $type_id;
        $data['Source'] = $request->product_source;
        $data['StartDate'] = $product_date;
        $data['Des'] = $request->product_discription;
        $data['Unit'] = $product_unit;
        DB::table('product')->where('proid', $product_id)->update($data);
        Session::put('message_info', 'Sửa thành công thông tin của sản phẩm!');

        $id_img_main = DB::table('product_image')
            ->select('ImgID')->where('product_image.proid', $product_id)
            ->where('product_image.imgdata', 'like', '%is_avt%')
            ->distinct()->get()->toArray();
        $id_img_main = $id_img_main[0]->ImgID;
        $data_img = array();
        $get_image_main = $request->file('product_img_main');

        if ($get_image_main) {
            $get_name_img = $get_image_main->getClientOriginalName();
            $name_img = current(explode('.', $get_name_img));
            $image_main = 'is_avt' . '-' . $name_img . rand(0, 999) . '.' . $get_image_main->getClientOriginalExtension();
            $get_image_main->move('public/upload/product', $image_main);
            $data_img['ImgData'] = $image_main;
            DB::table('product_image')->where('imgid', $id_img_main)->update($data_img);
            Session::put('message_main', 'Đã sửa ảnh chính của sản phẩm.');
        }

        $id_img_des = DB::table('product_image')
            ->select('ImgID')->where('product_image.proid', $product_id)
            ->where('product_image.imgdata', 'not like', '%is_avt%')
            ->distinct()->get()->toArray();

        $get_image_description = $request->file('product_img_description');
        // echo '<pre>';
        // print_r($get_image_description);
        // echo '</pre>';

        //echo $get_image_description[0]->getClientOriginalName();

        if ($get_image_description) {
            $number_of_img_des_added = count($get_image_description);
            $number_of_img_des = count($id_img_des);
            if ($number_of_img_des_added == $number_of_img_des) {
                for ($i = 0; $i < count($get_image_description); $i++) {
                    $get_name_img_description = $get_image_description[$i]->getClientOriginalName();
                    $name_img_description = current(explode('.', $get_name_img_description));
                    $image_description = 'des' . '-' . $name_img_description . rand(0, 999) . '.' . $get_image_description[$i]->getClientOriginalExtension();
                    $get_image_description[$i]->move('public/upload/product', $image_description);
                    $data_img_description['ImgData'] = $image_description;
                    DB::table('product_image')
                        ->where('imgid', $id_img_des[$i]->ImgID)->update($data_img_description);
                }
                Session::put('message_des', 'Sửa ảnh mô tả thành công.');
                return Redirect::to('all-products');
            } else {
                $bonus_img = $number_of_img_des_added - $number_of_img_des;
                if ($bonus_img == 3) {
                    foreach ($get_image_description as $get_image_description_detail) {
                        $get_name_img_description = $get_image_description_detail->getClientOriginalName();
                        $name_img_description = current(explode('.', $get_name_img_description));
                        $image_description = 'des' . '-' . $name_img_description . rand(0, 999) . '.' . $get_image_description_detail->getClientOriginalExtension();
                        $get_image_description_detail->move('public/upload/product', $image_description);
                        $data_img_description['ImgData'] = $image_description;
                        $data_img_description['ProID'] = $product_id;
                        DB::table('product_image')->insert($data_img_description);
                    }
                    Session::put('message_des', 'Đã thêm 3 ảnh mô tả sản phẩm.');
                    return Redirect::to('all-products');
                } elseif ($bonus_img == 2) {
                    if ($number_of_img_des == 0) {
                        foreach ($get_image_description as $get_image_description_detail) {
                            $get_name_img_description = $get_image_description_detail->getClientOriginalName();
                            $name_img_description = current(explode('.', $get_name_img_description));
                            $image_description = 'des' . '-' . $name_img_description . rand(0, 999) . '.' . $get_image_description_detail->getClientOriginalExtension();
                            $get_image_description_detail->move('public/upload/product', $image_description);
                            $data_img_description['ImgData'] = $image_description;
                            $data_img_description['ProID'] = $product_id;
                            DB::table('product_image')->insert($data_img_description);
                        }
                        Session::put('message_des', 'Đã thêm 2 ảnh mô tả sản phẩm.');
                        return Redirect::to('all-products');
                    } elseif ($number_of_img_des == 1) {
                        for ($i = 0; $i < 1; $i++) {
                            $get_name_img_description = $get_image_description[$i]->getClientOriginalName();
                            $name_img_description = current(explode('.', $get_name_img_description));
                            $image_description = 'des' . '-' . $name_img_description . rand(0, 999) . '.' . $get_image_description[$i]->getClientOriginalExtension();
                            $get_image_description[$i]->move('public/upload/product', $image_description);
                            $data_img_description['ImgData'] = $image_description;
                            DB::table('product_image')
                                ->where('imgid', $id_img_des[$i]->ImgID)->update($data_img_description);
                        }
                        foreach (array_slice($get_image_description, 1) as $get_image_description_detail) {
                            $get_name_img_description = $get_image_description_detail->getClientOriginalName();
                            $name_img_description = current(explode('.', $get_name_img_description));
                            $image_description = 'des' . '-' . $name_img_description . rand(0, 999) . '.' . $get_image_description_detail->getClientOriginalExtension();
                            $get_image_description_detail->move('public/upload/product', $image_description);
                            $data_img_description['ImgData'] = $image_description;
                            $data_img_description['ProID'] = $product_id;
                            DB::table('product_image')->insert($data_img_description);
                        }
                        Session::put('message_des', 'Đã sửa 1 và thêm 2 ảnh mô tả sản phẩm.');
                        return Redirect::to('all-products');
                    }
                } else {
                    if ($bonus_img == 1) {
                        if ($number_of_img_des == 0) {
                            foreach ($get_image_description as $get_image_description_detail) {
                                $get_name_img_description = $get_image_description_detail->getClientOriginalName();
                                $name_img_description = current(explode('.', $get_name_img_description));
                                $image_description = 'des' . '-' . $name_img_description . rand(0, 999) . '.' . $get_image_description_detail->getClientOriginalExtension();
                                $get_image_description_detail->move('public/upload/product', $image_description);
                                $data_img_description['ImgData'] = $image_description;
                                $data_img_description['ProID'] = $product_id;
                                DB::table('product_image')->insert($data_img_description);
                                Session::put('message_des', 'Đã thêm 1 ảnh mô tả sản phẩm.');
                                return Redirect::to('all-products');
                            }
                        } elseif ($number_of_img_des == 1) {
                            for ($i = 0; $i < 1; $i++) {
                                $get_name_img_description = $get_image_description[$i]->getClientOriginalName();
                                $name_img_description = current(explode('.', $get_name_img_description));
                                $image_description = 'des' . '-' . $name_img_description . rand(0, 999) . '.' . $get_image_description[$i]->getClientOriginalExtension();
                                $get_image_description[$i]->move('public/upload/product', $image_description);
                                $data_img_description['ImgData'] = $image_description;
                                DB::table('product_image')
                                    ->where('imgid', $id_img_des[$i]->ImgID)->update($data_img_description);
                            }
                            foreach (array_slice($get_image_description, 1) as $get_image_description_detail) {
                                $get_name_img_description = $get_image_description_detail->getClientOriginalName();
                                $name_img_description = current(explode('.', $get_name_img_description));
                                $image_description = 'des' . '-' . $name_img_description . rand(0, 999) . '.' . $get_image_description_detail->getClientOriginalExtension();
                                $get_image_description_detail->move('public/upload/product', $image_description);
                                $data_img_description['ImgData'] = $image_description;
                                $data_img_description['ProID'] = $product_id;
                                DB::table('product_image')->insert($data_img_description);
                            }
                            Session::put('message_des', 'Đã sửa 1 và thêm 1 ảnh mô tả sản phẩm.');
                            return Redirect::to('all-products');
                        } else {
                            for ($i = 0; $i < 2; $i++) {
                                $get_name_img_description = $get_image_description[$i]->getClientOriginalName();
                                $name_img_description = current(explode('.', $get_name_img_description));
                                $image_description = 'des' . '-' . $name_img_description . rand(0, 999) . '.' . $get_image_description[$i]->getClientOriginalExtension();
                                $get_image_description[$i]->move('public/upload/product', $image_description);
                                $data_img_description['ImgData'] = $image_description;
                                DB::table('product_image')
                                    ->where('imgid', $id_img_des[$i]->ImgID)->update($data_img_description);
                            }
                            foreach (array_slice($get_image_description, 2) as $get_image_description_detail) {
                                $get_name_img_description = $get_image_description_detail->getClientOriginalName();
                                $name_img_description = current(explode('.', $get_name_img_description));
                                $image_description = 'des' . '-' . $name_img_description . rand(0, 999) . '.' . $get_image_description_detail->getClientOriginalExtension();
                                $get_image_description_detail->move('public/upload/product', $image_description);
                                $data_img_description['ImgData'] = $image_description;
                                $data_img_description['ProID'] = $product_id;
                                DB::table('product_image')->insert($data_img_description);
                            }
                            Session::put('message_des', 'Đã sửa 2 và thêm 1 ảnh mô tả sản phẩm.');
                            return Redirect::to('all-products');
                        }
                    }
                }
            }
        } else {
            if (empty($id_img_des)) {
                Session::put('message_no_des', 'Sản phẩm hiện không có ảnh mô tả sản phẩm');
                return Redirect::to('all-products');
            } else  return Redirect::to('all-products');
        }
    }

    public function detail_product($product_id)
    {
        $this->AuthLogin();

        $detail_product = DB::table('product')
            ->select('product.*', 'product_image.*', 'type.*',   DB::raw('DATE_FORMAT(product.startdate, "%d-%m-%Y ") as StartDate'))
            ->join('product_image', 'product.proid', '=', 'product_image.proid')
            ->join('type', 'product.typeid', '=', 'type.typeid')
            ->where('product.IsDeleted', 0)->where('product.proid', $product_id)->where('product_image.imgdata', 'like', '%is_avt%')
            ->orderBy('product.proid', 'asc')->distinct('product.proid')->get();

        $type_detail_product = DB::table('product')->select('MainType', 'SubType')
            ->join('type', 'product.typeid', '=', 'type.typeid')
            ->where('product.proid', $product_id)->distinct('product.proid')->get();
        $des_detail_product = DB::table('product')->select('Des')
            ->where('product.proid', $product_id)->distinct('product.proid')->get();
        $des_img = DB::table('product_image')
            ->select('ImgData')->where('product_image.ImgData', 'not like', '%is_avt%')->where('product_image.proid', $product_id)
            ->distinct()->get()->toArray();
        $count_des_img = count($des_img);

        foreach ($detail_product as $item) {
            $totalQuantity = AdminProduct::TotalQuantity($item->ProID);
        }

        $manage_detail_product = view('admin.product.detail_product')
            ->with('type_detail_product', $type_detail_product)
            ->with('des_detail_product', $des_detail_product)
            ->with('des_img', $des_img)
            ->with('count_des_img', $count_des_img)
            ->with('detail_product', $detail_product)
            ->with('totalQuantity', $totalQuantity);
        // echo '<pre>';
        // print_r($detail_product[0]->Des);
        // echo '</pre>';

        return view('admin_layout')->with('admin.product.detail_product', $manage_detail_product);
    }

    public function delete_product($product_id)
    {
        $this->AuthLogin();

        $detail_product = DB::table('product')
            ->select('product.*', 'product_image.*', 'type.*', 'stock.ProId', 'stock.quantity as product_quantity')
            ->join('product_image', 'product.proid', '=', 'product_image.proid')
            ->join('type', 'product.typeid', '=', 'type.typeid')
            ->leftjoin('stock', 'product.proid', '=', 'stock.proid')
            ->where('product.IsDeleted', 0)->where('product.proid', $product_id)->where('product_image.imgdata', 'like', '%is_avt%')
            ->orderBy('product.proid', 'asc')->distinct('product.proid')->get();

        $type_detail_product = DB::table('product')->select('MainType', 'SubType')
            ->join('type', 'product.typeid', '=', 'type.typeid')
            ->where('product.proid', $product_id)->distinct('product.proid')->get();
        $des_detail_product = DB::table('product')->select('Des')
            ->where('product.proid', $product_id)->distinct('product.proid')->get();
        $id_product = DB::table('product')->select('ProID')
            ->where('product.proid', $product_id)->get();
        $des_img = DB::table('product_image')
            ->select('ImgData')->where('product_image.ImgData', 'not like', '%is_avt%')->where('product_image.proid', $product_id)
            ->distinct()->get()->toArray();
        $count_des_img = count($des_img);

        $manage_detail_product = view('admin.product.delete_product')
            ->with('type_detail_product', $type_detail_product)
            ->with('des_detail_product', $des_detail_product)
            ->with('des_img', $des_img)
            ->with('count_des_img', $count_des_img)
            ->with('id_product', $id_product)
            ->with('detail_product', $detail_product);
        // echo '<pre>';
        // print_r($detail_product[0]->Des);
        // echo '</pre>';

        return view('admin_layout')->with('admin.product.delete_product', $manage_detail_product);
    }

    public function soft_delete_product($product_id)
    {
        $this->AuthLogin();

        $data = array();
        $data['IsDeleted'] = 1;
        DB::table('product')->where('proid', $product_id)->update($data);
        Session::put('delete_product_message', 'Xoá thông tin sản phẩm thành công!');
        return Redirect::to('all-products');
    }
}

@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-discount-typ')}}">Quản lý khuyến mãi sản phẩm</a>
            <span class="breadcrumb-item active">Danh sách sản phẩm khuyến mãi</span>
        </nav>
    </div>
</div>
<hr />
<h1>Danh sách sản phẩm khuyến mãi</h1>
<?php

use Illuminate\Support\Facades\Session;
$add_discount_product = Session::get('add_discount_product');
if ($add_discount_product) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $add_discount_product . '</span>';
    Session::put('add_discount_product', null);
}

$add_discount_product_fail = Session::get('add_discount_product_fail');
if ($add_discount_product_fail) {
    echo '<span style= "color: red"; text-align: center; font-size: 14px; >' . $add_discount_product_fail . '</span>';
    Session::put('add_discount_product_fail', null);
}

$edit_discount_product_message = Session::get('edit_discount_product_message');
if ($edit_discount_product_message) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $edit_discount_product_message . '</span>';
    Session::put('edit_discount_product_message', null);
}

$delete_discount_product_message = Session::get('delete_discount_product_message');
if ($delete_discount_product_message) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $delete_discount_product_message . '</span>';
    Session::put('delete_discount_product_message', null);
}
?>

<div class="card">
    <div class="card-body">
        <div class="row m-b-30">
            <div class="col-lg-8">
                <div class="d-md-flex">
                    <div class="m-b-10 m-r-15">
                        <select class="custom-select" id="rank_customer" style="min-width: 180px;">
                            <option value="" selected>Hạng khách hàng</option>
                            <option value=1>Vàng</option>
                            <option value=2>Bạc</option>
                            <option value=3>Đồng</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-right">
                <a href="{{URL::to('/create-discount-product')}}" class="btn btn-primary">
                    <i class="anticon anticon-plus-circle m-r-5"></i>
                    <span>Thêm khuyến mãi</span>
                </a>

            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover e-commerce-table" id="datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sản phẩm</th>
                        <th>Giá trị KM</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_discount_products as $key =>$all_discount_products)
                    <tr>
                        <td>{{$all_discount_products->disid}}</td>
                        <td>
                            <div class="d-flex align-items-center" class="logo logo-dark">
                                <img src="{{URL::to('../public/upload/product/'.$all_discount_products->ImgData)}}" height="70" width="70" alt="Logo">
                                <h6 class="m-b-0 m-l-10">{{$all_discount_products->proname}}</h6>
                            </div>
                        </td>
                        <td>{{$all_discount_products->value}}</td>
                        <td>{{$all_discount_products->startdate}}</td>
                        <td>{{$all_discount_products->enddate}}</td>

                        <?php {
                            echo "<td>";
                            echo    "<div class='d-flex align-items-center' class='logo logo-dark'> ";
                            $status = $all_discount_products->isdeleted;
                            if ($status == 0) {
                                echo "<div class='badge badge-success badge-dot m-r-10'></div>";
                                echo "<div>Hoạt động</div>";
                            } else {
                                echo "<div class='badge badge-danger badge-dot m-r-10'></div>";
                                echo "<div>Hết hạn</div>";
                            }
                            echo "</td>";
                        }
                        ?>
                        <td class="text-right">
                            <a href="{{URL::to('/edit-discount-product/'.$all_discount_products->disid)}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                <i class="anticon anticon-edit"></i>
                            </a>
                            <a href="{{URL::to('/delete-discount-product/'.$all_discount_products->disid)}}" class="btn btn-icon btn-hover btn-sm btn-rounded">
                                <i class="anticon anticon-delete"></i>
                            </a>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
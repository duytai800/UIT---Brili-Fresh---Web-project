@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-discount-orders')}}">Quản lý khuyến mãi hoá đơn</a>
            <span class="breadcrumb-item active">Danh sách khuyến mãi hoá đơn</span>
        </nav>
    </div>
</div>
<hr />
<h1>Danh sách khuyến mãi hoá đơn</h1>
<?php

use Illuminate\Support\Facades\Session;
$add_discount_order_auto = Session::get('add_discount_product');
if ($add_discount_order_auto) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $add_discount_order_auto . '</span>';
    Session::put('add_discount_order_auto', null);
}

$add_discount_order = Session::get('add_discount_order');
if ($add_discount_order) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $add_discount_order . '</span>';
    Session::put('add_discount_order', null);
}

$add_discount_order_fail = Session::get('add_discount_order_fail');
if ($add_discount_order_fail) {
    echo '<span style= "color: red"; text-align: center; font-size: 14px; >' . $add_discount_order_fail . '</span>';
    Session::put('add_discount_order_fail', null);
}

$edit_discount_store_message = Session::get('edit_discount_store_message');
if ($edit_discount_store_message) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $edit_discount_store_message . '</span>';
    Session::put('edit_discount_store_message', null);
}

$delete_discount_order_message = Session::get('delete_discount_order_message');
if ($delete_discount_order_message) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $delete_discount_order_message . '</span>';
    Session::put('delete_discount_order_message', null);
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
                <a href="{{URL::to('/create-discount-order')}}" class="btn btn-primary">
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
                        <th>Code</th>
                        <th>Giá trị KM</th>
                        <th>Bắt đầu</th>
                        <th>Kết thúc</th>
                        <th>Khách hàng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_discount_orders as $key =>$all_discount_orders)
                    <tr>
                        <td>{{$all_discount_orders->DisID}}</td>
                        <td>{{$all_discount_orders->DisCode}}</td>
                        <td>{{$all_discount_orders->DisRate*100}}% <br> Giảm tối đa: {{$all_discount_orders->MaxDis}} VNĐ</td>
                        
                        <td>{{$all_discount_orders->StartDate}}</td>
                        <td>{{$all_discount_orders->EndDate}}</td>
                        <?php
                        $type_customer = $all_discount_orders->CusType;
                        if ($type_customer == 1) {
                            echo "<td>";
                            echo "<div class='badge badge-warning badge-dot m-r-10'></div>";                          
                            echo "Vàng";
                            echo "</td>";
                        } elseif ($type_customer == 2) {
                            echo "<td>";
                            echo "<div class='badge badge-dark badge-dot m-r-10'></div>";                          
                            echo "Bạc";
                            echo "</td>";
                        } else {
                            echo "<td>";
                            echo "<div class='badge badge-light badge-dot m-r-10'></div>";                          
                            echo "Đồng";
                            echo "</td>";
                        };
                        ?>
                        <td class="text-right">
                            <a href="{{URL::to('/edit-discount-order/'.$all_discount_orders->DisID)}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                <i class="anticon anticon-edit"></i>
                            </a>
                            <a href="{{URL::to('/delete-discount-order/'.$all_discount_orders->DisID)}}" class="btn btn-icon btn-hover btn-sm btn-rounded">
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
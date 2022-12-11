@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-discount-types')}}">Quản lý khuyến mãi loại sản phẩm</a>
            <span class="breadcrumb-item active">Danh sách loại sản phẩm khuyến mãi</span>
        </nav>
    </div>
</div>
<hr />
<h1>Danh sách loại sản phẩm khuyến mãi</h1>
<?php

use Illuminate\Support\Facades\Session;
$add_discount_type = Session::get('add_discount_type');
if ($add_discount_type) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $add_discount_type . '</span>';
    Session::put('add_discount_type', null);
}

$add_discount_type_fail = Session::get('add_discount_type_fail');
if ($add_discount_type_fail) {
    echo '<span style= "color: red"; text-align: center; font-size: 14px; >' . $add_discount_type_fail . '</span>';
    Session::put('add_discount_type_fail', null);
}

$edit_discount_type_message = Session::get('edit_discount_type_message');
if ($edit_discount_type_message) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $edit_discount_type_message . '</span>';
    Session::put('edit_discount_type_message', null);
}

$delete_discount_type_message = Session::get('delete_discount_type_message');
if ($delete_discount_type_message) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $delete_discount_type_message . '</span>';
    Session::put('delete_discount_type_message', null);
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
                <a href="{{URL::to('/create-discount-type')}}" class="btn btn-primary">
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
                        <th>Loại sản phẩm</th>
                        <th>Giá trị KM</th>
                        <th>Bắt đầu</th>
                        <th>Kết thúc</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($manage_all_discount_types as $key =>$manage_all_discount_type)
                    <tr>
                        <td>{{$manage_all_discount_type->DisID}}</td>
                        <td>ID: {{$manage_all_discount_type->TypeID}} <br> {{$manage_all_discount_type->SubType}}</td>
                        <td>{{$manage_all_discount_type->Value}}</td>
                        <td>{{$manage_all_discount_type->StartDate}}</td>
                        <td>{{$manage_all_discount_type->EndDate}}</td>
                        <td class="text-right">
                            <a href="{{URL::to('/edit-discount-type/'.$manage_all_discount_type->DisID)}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                <i class="anticon anticon-edit"></i>
                            </a>
                            <a href="{{URL::to('/delete-discount-type/'.$manage_all_discount_type->DisID)}}" class="btn btn-icon btn-hover btn-sm btn-rounded">
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
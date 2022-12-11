@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-discount-stores')}}">Quản lý cửa hàng khuyến mãi </a>
            <span class="breadcrumb-item active">Danh sách cửa hàng khuyến mãi</span>
        </nav>
    </div>
</div>
<hr />
<h1>Danh sách cửa hàng khuyến mãi</h1>
<?php

use Illuminate\Support\Facades\Session;
$add_discount_store = Session::get('add_discount_store');
if ($add_discount_store) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $add_discount_store . '</span>';
    Session::put('add_discount_store', null);
}

$add_discount_store_fail = Session::get('add_discount_store_fail');
if ($add_discount_store_fail) {
    echo '<span style= "color: red"; text-align: center; font-size: 14px; >' . $add_discount_store_fail . '</span>';
    Session::put('add_discount_store_fail', null);
}

$edit_discount_store_message = Session::get('edit_discount_store_message');
if ($edit_discount_store_message) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $edit_discount_store_message . '</span>';
    Session::put('edit_discount_store_message', null);
}

$delete_discount_store_message = Session::get('delete_discount_store_message');
if ($delete_discount_store_message) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $delete_discount_store_message . '</span>';
    Session::put('delete_discount_store_message', null);
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
                <a href="{{URL::to('/create-discount-store')}}" class="btn btn-primary">
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
                        <th>Cửa hàng</th>
                        <th>Giá trị KM</th>
                        <th>Bắt đầu</th>
                        <th>Kết thúc</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_discount_stores as $key =>$discount_store)
                    <tr>
                        <td>{{$discount_store->DisID}}</td>
                        <td>{{$discount_store->Value}}</td>
                        <td>ID: {{$discount_store->StoreID}} <br>Địa chỉ: {{$discount_store->SpecificAddress}}, {{$discount_store->Ward}}, <br> {{$discount_store->District}}, {{$discount_store->City}}   </td>
                        
                        <td>{{$discount_store->StartDate}}</td>
                        <td>{{$discount_store->EndDate}}</td>
                        <td class="text-right">
                            <a href="{{URL::to('/edit-discount-store/'.$discount_store->DisID)}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                <i class="anticon anticon-edit"></i>
                            </a>
                            <a href="{{URL::to('/delete-discount-store/'.$discount_store->DisID)}}" class="btn btn-icon btn-hover btn-sm btn-rounded">
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
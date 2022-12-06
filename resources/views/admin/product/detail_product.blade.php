@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-products')}}">Quản lý sản phẩm</a>
            <span class="breadcrumb-item active">Thông tin sản phẩm</span>
        </nav>
    </div>
</div>
<hr />

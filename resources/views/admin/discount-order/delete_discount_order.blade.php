@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-discount-orders')}}">Quản lý khuyến mãi hoá đơn</a>
            <span class="breadcrumb-item active">Xoá khuyến mãi hoá đơn</span>
        </nav>
    </div>
</div>
<hr />
<h1>Xoá thông tin khuyến mãi hoá đơn</h1>
@foreach ($all_discount_orders as $key =>$discount_order)
ID: {{$discount_order->DisID}}
<div>
    <dl class="row">
        <dt class="col-sm-2">
            Code
        </dt>
        <dd class="col-sm-10">
            {{$discount_order->DisCode}}
        </dd>
        <dt class="col-sm-2">
            Giá trị giảm
        </dt>
        <dd class="col-sm-10">
            {{$discount_order->DisRate}}
        </dd>
        <dt class="col-sm-2">
            Giá trị giảm tối đa
        </dt>
        <dd class="col-sm-10">
            {{$discount_order->MaxDis}} VNĐ
        </dd>
        <dt class="col-sm-2">
            Ngày bắt đầu
        </dt>
        <dd class="col-sm-10">
            {{$discount_order->StartDate}}
        </dd>
        <dt class="col-sm-2">
            Ngày kết thúc
        </dt>
        <dd class="col-sm-10">
            {{$discount_order->EndDate}}
        </dd>
        <dt class="col-sm-2">
            Hạng khách hàng
        </dt>
        <?php
        $type_customer = $discount_order->CusType;
        if ($type_customer == 1) {
            echo "<dt class='col-sm-2'>";
            echo "<div class='badge badge-warning badge-dot m-r-10'></div>";
            echo "Vàng";
            echo "</dt>";
        } elseif ($type_customer == 2) {
            echo "<dt class='col-sm-2'>";
            echo "<div class='badge badge-dark badge-dot m-r-10'></div>";
            echo "Bạc";
            echo "</dt>";
        } else {
            echo "<dt class='col-sm-2'>";
            echo "<div class='badge badge-light badge-dot m-r-10'></div>";
            echo "Đồng";
            echo "</dt>";
        };
        ?>
    </dl>

    <form action="{{URL::to('confirm-delete-discount-order/'.$discount_order->DisID)}}" method="post">
        {{csrf_field()}}
        <input type="submit" value="Xóa" class="btn btn-danger" />
        <a style="margin-left:20px;" href="{{URL::to('/all-discount-orders')}}" class="btn btn-success btn-tone m-r-5">Quay lại danh sách</a>
    </form>

    @endforeach
</div>
@endsection
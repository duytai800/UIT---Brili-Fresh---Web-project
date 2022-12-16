@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-discount-stores')}}">Quản lý cửa hàng khuyến mãi </a>
            <span class="breadcrumb-item active">Xoá cửa hàng khuyến mãi</span>
        </nav>
    </div>
</div>
<hr />
<h1>Xoá cửa hàng khuyến mãi</h1>
@foreach ($delete_discount_store as $key=>$discount_store)
ID khuyễn mãi: {{$discount_store->DisID}}

<div>
    <dl class="row">
        <dt class="col-sm-2">
            ID cửa hàng:
        </dt>
        <dd class="col-sm-10">
            {{$discount_store->StoreID}}
        </dd>
        <dt class="col-sm-2">
            Địa chỉ:
        </dt>
        <dd class="col-sm-10">
            {{$discount_store->SpecificAddress}}, {{$discount_store->Ward}}, {{$discount_store->District}}, {{$discount_store->City}}
        </dd>
        <dt class="col-sm-2">
            Giá trị giảm giá
        </dt>
        <dd class="col-sm-10">
            {{$discount_store->Value}}
        </dd>
        <dt class="col-sm-2">
            Ngày bắt đầu
        </dt>
        <dd class="col-sm-10">
            {{$discount_store->StartDate}}
        </dd>
        <dt class="col-sm-2">
            Ngày kết thúc
        </dt>
        <dd class="col-sm-10">
            {{$discount_store->EndDate}}
        </dd>
    </dl>

    <form action="{{URL::to('confirm-delete-discount-store/'.$discount_store->DisID)}}" method="post">
        {{csrf_field()}}
        <input type="submit" value="Xóa" class="btn btn-danger" />
        <a style="margin-left:20px;" href="{{URL::to('/all-discount-stores')}}" class="btn btn-success btn-tone m-r-5">Quay lại danh sách</a>
    </form>

    @endforeach
</div>
@endsection
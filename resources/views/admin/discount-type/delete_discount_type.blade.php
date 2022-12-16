@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-discount-types')}}">Quản lý khuyến mãi loại sản phẩm</a>
            <span class="breadcrumb-item active">Xoá khuyến mãi loại sản phẩm </span>
        </nav>
    </div>
</div>
<hr />
<h1>Xoá khuyến mãi loại sản phẩm</h1>
<div>
    <dl class="row">
    @foreach ($delete_discount_type as $key =>$delete_discount_type)
        <dt class="col-sm-2">
            Loại sản phẩm
        </dt>
        <dd class="col-sm-10">
            ID: {{$delete_discount_type->TypeID}} <br>
            Danh mục: {{$delete_discount_type->MainType}} <br>
            Loại: {{$delete_discount_type->SubType}} <br>
        </dd>
        <dt class="col-sm-2">
            Giá trị giảm
        </dt>
        <dd class="col-sm-10">
            {{$delete_discount_type->Value}}
        </dd>
        <dt class="col-sm-2">
            Ngày bắt đầu
        </dt>
        <dd class="col-sm-10">
            {{$startdate}}
        </dd>
        <dt class="col-sm-2">
            Ngày kết thúc
        </dt>
        <dd class="col-sm-10">
            {{$enddate}}
        </dd>
    </dl>

    <form action="{{URL::to('confirm-delete-discount-type/'.$delete_discount_type->DisID)}}" method="post">
        {{csrf_field()}}
        <input type="submit" value="Xóa" class="btn btn-danger" />
        <a style="margin-left:20px;" href="{{URL::to('/all-discount-types')}}" class="btn btn-success btn-tone m-r-5">Quay lại danh sách</a>
    </form>

    @endforeach
</div>
@endsection
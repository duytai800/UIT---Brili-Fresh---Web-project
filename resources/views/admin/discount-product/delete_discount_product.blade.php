@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-products')}}">Quản lý khuyến mãi</a>
            <span class="breadcrumb-item active">Xoá thông tin </span>
        </nav>
    </div>
</div>
<hr />
<h1>Xóa khuyến mãi sản phẩm</h1>
<h3>Bạn có chắc muốn xóa khuyến mãi sản phẩm này?</h3>
<br>

<div>
    <dl class="row">
    @foreach ($product as $key =>$product)
        <dt class="col-sm-2">
            Sản phẩm
        </dt>
        <dd class="col-sm-10">
            ID: {{$product->ProID}} <br>
            Tên: {{$product->ProName}}
        </dd>
        <dt class="col-sm-2">
            Giá trị giảm
        </dt>
        <dd class="col-sm-10">
            {{$product->Value}}
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

    <form action="{{URL::to('confirm-delete-discount-product/'.$product->DisID)}}" method="post">
        {{csrf_field()}}
        <input type="submit" value="Xóa" class="btn btn-danger" />
        <a style="margin-left:20px;" href="{{URL::to('/all-discount-products')}}" class="btn btn-success btn-tone m-r-5">Quay lại danh sách</a>
    </form>

    @endforeach
</div>

@endsection
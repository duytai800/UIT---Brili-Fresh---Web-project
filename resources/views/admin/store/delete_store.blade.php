@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a href="{{URL::to('/index-store')}}" class="breadcrumb-item">Quản lý cửa hàng</a>
            <span class="breadcrumb-item active">Xóa</span>
        </nav>
    </div>
</div>
<h1>Xóa cửa hàng</h1>

<h3>Bạn có chắc muốn xóa cửa hàng?</h3>
<div>
    @foreach($delete_store as $key =>$store)
    <hr />
    <h4>ID: {{$store->StoreID}}</h4>
    <dl class="row">
        <dt class = "col-sm-2">
            Địa chỉ
        </dt>
        <dd class = "col-sm-10">
            {{$store->SpecificAddress}}
        </dd>
        <dt class = "col-sm-2">
            Phường/Xã
        </dt>
        <dd class = "col-sm-10">
            {{$store->Ward}}
        </dd>
        <dt class = "col-sm-2">
            Quận/Huyện
        </dt>
        <dd class = "col-sm-10">
            {{$store->District}}
        </dd>
        <dt class = "col-sm-2">
            Tỉnh/Thành
        </dt>
        <dd class = "col-sm-10">
            {{$store->City}}
        </dd>
    </dl>
    
    <form action="{{URL::to('/soft-delete-store/'.$store->StoreID)}}" method="post">
        {{csrf_field()}}
        <input type="submit" value="Xóa" class="btn btn-danger" /> 
        <a style="margin-left:20px;" href="{{URL::to('/index-store')}}" class="btn btn-success btn-tone m-r-5">Quay lại Danh sách</a>
    </form>
    @endforeach
</div>
@endsection
@extends('admin_layout')
@section('admin_content')
<div class="page-header">
     <h2 class="header-title">Brili Fresh</h2>
     <div class="header-sub-title">
          <nav class="breadcrumb breadcrumb-dash">
               <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i
                         class="anticon anticon-home m-r-5"></i>Trang chủ</a>
               <a href="{{URL::to('/index-stock')}}" class="breadcrumb-item">Quản lý kho</a>
               <span class="breadcrumb-item active">Xóa</span>
          </nav>
     </div>
</div>
<h1>Xóa thông tin kho</h1>

<h3>Bạn có chắc muốn xóa sản phẩm khỏi cửa hàng?</h3>
<div>
     @foreach($delete_stock as $key =>$stock)
     <hr />
     <dl class="row">
          <dt class="col-sm-2">
               ID cửa hàng
          </dt>
          <dd class="col-sm-10">
               {{$stock->StoreID}}
          </dd>
          <dt class="col-sm-2">
               Địa chỉ
          </dt>
          <dd class="col-sm-10">
               {{$stock->Store_SpecificAddress}}, {{$stock->Store_Ward}}, {{$stock->Store_District}},
               {{$stock->Store_City}}
          </dd>
          <dt class="col-sm-2">
               ID sản phẩm
          </dt>
          <dd class="col-sm-10">
               {{$stock->ProID}}
          </dd>
          <dt class="col-sm-2">
               Tên sản phẩm
          </dt>
          <dd class="col-sm-10">
               {{$stock->Pro_ProName}}
          </dd>
          <dt class="col-sm-2">
               Số lượng
          </dt>
          <dd class="col-sm-10">
               {{$stock->Quantity}}
          </dd>

     </dl>

     <form action="/confirm-delete-stock/{{$stock->StoreID}}/{{$stock->ProID}}" method="post">
          {{csrf_field()}}
          <input type="submit" value="Xóa" class="btn btn-danger" />
          <a style="margin-left:20px;" href="{{URL::to('/index-stock')}}" class="btn btn-success btn-tone m-r-5">Quay
               lại Danh sách</a>
     </form>
     @endforeach
</div>
@endsection
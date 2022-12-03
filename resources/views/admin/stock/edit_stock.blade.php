@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a href="{{URL::to('/index-stock')}}" class="breadcrumb-item">Quản lý kho</a>
            <span class="breadcrumb-item active">Chỉnh sửa</span>
        </nav>
    </div>
</div>
@foreach($edit_stock as $key =>$stock)
<h3>Chỉnh sửa thông tin kho</h3>
<p class="text-dark font-weight-semibold">ID cửa hàng: {{$stock->StoreID}}</p>
<p class="text-dark font-weight-semibold">Địa chỉ: {{$stock->Store_SpecificAddress}}, {{$stock->Store_Ward}}, {{$stock->Store_District}}, {{$stock->Store_City}}</p>
<p class="text-dark font-weight-semibold">ID sản phẩm: {{$stock->ProID}}</p>
<p class="text-dark font-weight-semibold">Tên sản phẩm: {{$stock->Pro_ProName}}</p>

<hr />
<div class="row">
    <div class="col-md-4">
        <form action="/update-stock/{{$stock->StoreID}}/{{$stock->ProID}}" method="post">
        {{csrf_field()}}
            <div class="form-group">
                <label class="control-label">Số lượng</label>
                <input id="quantity" name="quantity"  class="form-control" value="{{$stock->Quantity}}"/>
                <span class="text-danger" id="quantity-message" style="display:none">Vui lòng nhập Số lượng!</span>
                <span class="text-danger" id="quantity-message1" style="display:none">Số lượng sản phẩm không thể âm!</span>
            </div>
            <div class="form-group">
                <input id="save-btn" type="submit" value="Lưu" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>
@endforeach
<div>
    <a href="{{URL::to('/index-stock')}}" class="btn btn-success btn-tone m-r-5">Quay lại Danh sách</a>
</div>

<script>
    $("#save-btn").click(function () {
            if ($("#quantity").is(':invalid')) {
                $("#quantity-message").show();
            }
            if ($("#quantity").val() < 0) {
                $("#quantity-message1").show();
            }

        })
        //Bỏ thông báo yêu cầu chọn/nhập
        $("#quantity").keyup(function(){
            $("#quantity-message").hide();
            $("#quantity-message1").hide();
        })
</script>
@endsection
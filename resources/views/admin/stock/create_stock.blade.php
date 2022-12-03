@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a href="{{URL::to('/index-stock')}}" class="breadcrumb-item">Quản lý kho</a>
            <span class="breadcrumb-item active">Thêm mới</span>
        </nav>
    </div>
</div>
<h3>Thêm mới kho</h3>
<hr />
<div class="row">
    <div class="col-md-4">
        <form action="{{URL::to('/save-stock')}}" method="post">
        {{csrf_field()}}
            <div asp-validation-summary="ModelOnly" class="text-danger"></div>
            <div class="form-group">
                <label class="control-label">ID cửa hàng</label>
                <select name="store_id" id="store_id" class ="form-control" required>
                    <option value="" selected>Chọn mã cửa hàng</option>
                    @foreach ($insert_store_id as $key =>$store_id)
                    <option value="{{$store_id->StoreID}}">{{$store_id->StoreID}} </option>
                    @endforeach
                </select>
                <span class="text-danger" id="store-message" style="display:none">Vui lòng chọn Mã cửa hàng!</span>
            </div>
            <div class="form-group">
                <label class="control-label">ID sản phẩm</label>
                <select name="pro_id" id="pro_id" class ="form-control" required>
                    <option value="" selected>Chọn mã sản phẩm</option>
                    @foreach ($insert_pro_id as $key =>$pro_id)
                    <option value="{{$pro_id->ProID}}">{{$pro_id->ProID}} </option>
                    @endforeach
                </select>
                <span class="text-danger" id="pro-message" style="display:none">Vui lòng chọn Mã sản phẩm!</span>
            </div>
            <div class="form-group">
                <label class="control-label">Số lượng</label>
                <input name="quantity" id="quantity" class="form-control" placeholder="Nhập số lượng sản phẩm" required/>
                <span class="text-danger" id="quantity-message" style="display:none">Vui lòng nhập Số lượng!</span>
                <span class="text-danger" id="quantity-message1" style="display:none">Số lượng sản phẩm không thể âm!</span>
            </div>
            <div class="form-group">
                <input id="create-btn" type="submit" value="Thêm mới" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>

<div>
    <a href="{{URL::to('/index-stock')}}" class="btn btn-success btn-tone m-r-5">Quay lại Danh sách</a>
</div>

<script>
    $(document).ready(function () {
        var path = location.pathname;
        path = path.replace('/index.php/create-stock/', '');
        $('#store_id option[value=' + path + ']').attr('selected', true);
        
    })
    $("#create-btn").click(function () {
            if ($("#store_id").is(':invalid')) {
                $("#store-message").show();
            }
            if ($("#pro_id").is(':invalid')) {
                $("#pro-message").show();
            }
            if ($("#quantity").is(':invalid')) {
                $("#quantity-message").show();
            }
            if ($("#quantity").val() < 0) {
                $("#quantity-message1").show();
            }

        })
        //Bỏ thông báo yêu cầu chọn/nhập
        $("#store_id").change(function(){
            $("#store-message").hide();
        })
        $("#pro_id").change(function(){
            $("#pro-message").hide();
        })
        $("#quantity").keyup(function(){
            $("#quantity-message").hide();
            $("#quantity-message1").hide();
        })
</script>
@endsection
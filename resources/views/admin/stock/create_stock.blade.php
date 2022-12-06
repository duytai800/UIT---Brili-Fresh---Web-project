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
        <form action="{{URL::to('/save-stock')}}" method="post" style="width:1000px">
        {{csrf_field()}}
            <div asp-validation-summary="ModelOnly" class="text-danger"></div>
            <table style="width:1000px">
                <tr>
                    <td style="padding:0px 20px">
                        <div class="form-group">
                            <label class="control-label"><b>ID cửa hàng</b></label>
                            <select name="store_id" id="store_id" class ="form-control" required>
                                <option value="" selected>Chọn mã cửa hàng</option>
                                @foreach ($insert_store_id as $key =>$store_id)
                                <option value="{{$store_id->StoreID}}">{{$store_id->StoreID}} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="store-message" style="display:none">Vui lòng chọn Mã cửa hàng!</span>
                        </div>
                    </td>
                    <td style="padding:0px 20px">
                        <div class="form-group">
                            <label class="control-label"><b>ID sản phẩm</b></label>
                            <select name="pro_id" id="pro_id" class ="form-control" required>
                                <option value="" selected>Chọn mã sản phẩm</option>
                                @foreach ($insert_pro_id as $key =>$pro_id)
                                <option value="{{$pro_id->ProID}}">{{$pro_id->ProID}} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="pro-message" style="display:none">Vui lòng chọn Mã sản phẩm!</span>
                        </div>
                    </td>
                    <td style="padding:0px 20px">
                        <div class="form-group">
                            <label class="control-label"><b>Số lượng</b></label>
                            <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Nhập số lượng sản phẩm" required/>
                            <span class="text-danger" id="quantity-message" style="display:none">Vui lòng nhập Số lượng!</span>
                            <span class="text-danger" id="quantity-message1" style="display:none">Số lượng sản phẩm không thể âm!</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding:0px 20px">
                        <div class="form-group">
                            <label class="control-label">Địa chỉ</label>
                            <select name="specificAddress" id="specificAddress" class ="form-control" disabled>
                                <option value="" selected></option>
                                @foreach ($insert_store_id as $key =>$store_id)
                                <option value="{{$store_id->StoreID}}">{{$store_id->SpecificAddress}} </option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td style="padding:0px 20px">
                        <div class="form-group">
                            <label class="control-label">Tên sản phẩm</label>
                            <select name="proName" id="proName" class ="form-control" disabled>
                                <option value="" selected></option>
                                @foreach ($insert_pro_id as $key =>$pro_id)
                                <option value="{{$pro_id->ProID}}">{{$pro_id->ProName}} </option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding:0px 20px">
                        <div class="form-group">
                            <label class="control-label">Phường/Xã</label>
                            <select name="ward" id="ward" class ="form-control" disabled>
                                <option value="" selected></option>
                                @foreach ($insert_store_id as $key =>$store_id)
                                <option value="{{$store_id->StoreID}}">{{$store_id->Ward}} </option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding:0px 20px">
                        <div class="form-group">
                            <label class="control-label">Quận/Huyện</label>
                            <select name="district" id="district" class ="form-control" disabled>
                                <option value="" selected></option>
                                @foreach ($insert_store_id as $key =>$store_id)
                                <option value="{{$store_id->StoreID}}">{{$store_id->District}} </option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding:0px 20px">
                        <div class="form-group">
                            <label class="control-label">Tỉnh/Thành</label>
                            <select name="city" id="city" class ="form-control" disabled>
                                <option value="" selected></option>
                                @foreach ($insert_store_id as $key =>$store_id)
                                <option value="{{$store_id->StoreID}}">{{$store_id->City}} </option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <div class="form-group" style="float:right">
                <a href="{{URL::to('/index-stock')}}" class="btn btn-success btn-tone m-r-5">Quay lại Danh sách</a>
                <input id="create-btn" type="submit" value="Thêm mới" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        var path = location.pathname;
        path = path.replace('/index.php/create-stock/', '');
        $('#store_id option[value=' + path + ']').attr('selected', true);
        
    })
    $("#create-btn").click(function (e) {
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
            e.preventDefault();
            $("#quantity-message1").show();
        }

    })
    //Bỏ thông báo yêu cầu chọn/nhập
     $("#store_id").change(function(){
        $("#store-message").hide();
        var $storeId = $(this).val();
        $("#specificAddress option[value='"+ $storeId + "']").prop('selected', true);
        $("#ward option[value='" + $storeId + "']").prop('selected', true);
        $("#district option[value='" + $storeId + "']").prop('selected', true);
        $("#city option[value='" + $storeId + "']").prop('selected', true);
    })
        $("#pro_id").change(function(){
        $("#pro-message").hide();
        var $proId = $(this).val();
        $("#proName option[value='" + $proId + "']").prop('selected', true);
    })
    $("#quantity").keyup(function(){
        $("#quantity-message").hide();
        $("#quantity-message1").hide();
    })
</script>
@endsection
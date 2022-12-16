@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-discount-types')}}">Quản lý khuyến mãi loại sản phẩm</a>
            <span class="breadcrumb-item active">Thêm loại sản phẩm khuyến mãi</span>
        </nav>
    </div>
</div>
<hr />
<h1>Thêm loại sản phẩm khuyến mãi</h1>
<form action="{{URL::to('/save-discount-type')}}" method="post">
    {{csrf_field()}}
    <div class="tab-content m-t-15">
        <div class="tab-pane fade show active" id="product-edit-basic">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="product_type">Danh mục</label>
                        <select class="custom-select" name="product_type" id="Type_MainType" required>
                            <option value="" disabled="true" selected>Chọn danh mục</option>
                            @foreach ($main_type as $key =>$main_type)
                            <option value="{{$main_type->MainType}}">{{$main_type->MainType}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="sub1">
                        <select class="custom-select" name="product_subtype" id="type1" required>
                            <option value="" disabled="true" selected>Chọn loại sản phẩm</option>
                            @foreach ($sub_type_raucu as $key =>$sub_type_raucu)
                            <option value=" {{$sub_type_raucu->SubType}}">{{$sub_type_raucu->SubType}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="sub2">
                        <select class="custom-select" name="product_subtype" id="type2" required>
                            <option value="" selected>Chọn loại sản phẩm</option>
                            @foreach ($sub_type_thitca as $key =>$sub_type_thitca)
                            <option value="{{$sub_type_thitca->SubType}}">{{$sub_type_thitca->SubType}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="sub3">
                        <select class="custom-select" name="product_subtype" id="type3" required>
                            <option value="" selected>Chọn loại sản phẩm</option>
                            @foreach ($sub_type_traicay as $key =>$sub_type_traicay)
                            <option value="{{$sub_type_traicay->SubType}}">{{$sub_type_traicay->SubType}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="discount_value">Phần trăm giảm giá</label>
                        <input type="number" class="form-control" name="discount_value" id="discount_value" step=".1" min="0.05" max="0.75" placeholder="...%" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="startdate">Ngày bắt đầu</label>
                        <input type="datetime-local" class="form-control" name="startdate" id="startdate" placeholder="d/m/y H:m:s" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="enddate">Ngày kết thúc</label>
                        <input type="datetime-local" class="form-control" name="enddate" id="startdate" placeholder="d/m/y H:m:s" required>
                    </div>
                </div>
                <div class="m-b-15">
                    <button type="submit" name="save-discount-product" class="btn btn-primary">
                        <i class="anticon anticon-save"></i>
                        <span>Thêm</span>
                    </button>
                    <a class="breadcrumb-item" href="{{URL::to('/all-employee')}}"> &nbsp Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript">
    var s1 = $("#sub1")
    var t1 = $("#type1")
    var s2 = $("#sub2")
    var t2 = $("#type2")
    var s3 = $("#sub3")
    var t3 = $("#type3")
    var maintype = $("#Type_MainType");
    t2.prop("disabled", true);
    t3.prop("disabled", true);
    s2.hide()
    s3.hide()

    maintype.change(function() {
        if (maintype.find(":selected").val() === 'Rau củ') {
            t2.prop("disabled", true);
            t3.prop("disabled", true);
            t1.prop("disabled", false);
            s2.hide()
            s3.hide()
            s1.show()


        } else if (maintype.find(":selected").val() === 'Thịt cá') {
            t2.prop("disabled", false);
            t3.prop("disabled", true);
            t1.prop("disabled", true);
            s2.show()
            s3.hide()
            s1.hide()
        } else {
            t2.prop("disabled", true);
            t3.prop("disabled", false);
            t1.prop("disabled", true);
            s2.hide()
            s3.show()
            s1.hide()
        }
    })
    
    $(document).ready(function() {
        flatpickr("#startdate", {
            altInput: true,
            enableTime: true,
            altFormat: "d/m/Y H:i",
            dateFormat: "d/m/Y H:i",
            minDate: 'today',
            maxDate: new Date().fp_incr(14)
        });
  
    })
</script>
@endsection
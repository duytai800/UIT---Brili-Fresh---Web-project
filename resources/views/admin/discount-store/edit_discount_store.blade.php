@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-discount-stores')}}">Quản lý cửa hàng khuyến mãi </a>
            <span class="breadcrumb-item active">Sửa thông tin khuyến mãi cửa hàng </span>
        </nav>
    </div>
</div>
<hr />
<h1>Chỉnh sửa thông tin cửa hàng khuyến mãi</h1>
@foreach ($edit_discount_store as $key=>$edit_discount_store)
ID cửa hàng: {{$edit_discount_store->StoreID}} 
<br>
Địa chỉ: {{$edit_discount_store->SpecificAddress}}, {{$edit_discount_store->Ward}}, {{$edit_discount_store->District}}, {{$edit_discount_store->City}}
<br>
<form action="{{URL::to('/update-discount-store/'.$edit_discount_store->DisID)}}" method="post">
    {{csrf_field()}}
    <div class="tab-content m-t-15">
        <div class="tab-pane fade show active" id="product-edit-basic">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="discount_value">Phần trăm giảm giá</label>
                        <input type="number" class="form-control" name="discount_value" id="discount_value" step=".05" placeholder="...%" min="0.05" max="0.7" value="{{$edit_discount_store->Value}}" >
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="startdate">Ngày bắt đầu</label>
                        <input type="datetime-local" class="form-control" name="startdate" id="startdate" placeholder="d/m/y H:m:s" value="{{$edit_discount_store->StartDate}}" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="enddate">Ngày kết thúc</label>
                        <input type="datetime-local" class="form-control" name="enddate" id="startdate" placeholder="d/m/y H:m:s" value="{{$edit_discount_store->EndDate}}" required>
                    </div>
                </div>
                <div class="m-b-15">
                    <button type="submit" name="save-discount-product" class="btn btn-primary">
                        <i class="anticon anticon-save"></i>
                        <span>Sửa</span>
                    </button>
                    <a class="breadcrumb-item" href="{{URL::to('/all-employee')}}"> &nbsp Quay lại</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</form>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript">
    $(document).ready(function() {
        flatpickr("#startdate", {
            altInput: true,
            enableTime: true,
            altFormat: " d/m/Y H:i ",
            dateFormat: "d/m/Y H:i",
            minDate: 'today',
            maxDate: new Date().fp_incr(14)
        })
    });
</script>
@endsection
@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-discount-orders')}}">Quản lý khuyến mãi hoá đơn</a>
            <span class="breadcrumb-item active">Tạo khuyến mãi hoá đơn</span>
        </nav>
    </div>
</div>
<hr />
<h1>Tạo khuyến mãi hoá đơn</h1>
<form action="{{URL::to('/save-discount-order')}}" method="post">
    {{csrf_field()}}
    <div class="tab-content m-t-15">
        <div class="tab-pane fade show active" id="product-edit-basic">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="discode">Nhập mã giảm giá</label>
                        <input type="text" class="form-control" name="discode" id="discode" placeholder="Nhập mã giảm giá">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="discount_value">Phần trăm giảm giá</label>
                        <input type="number" class="form-control" name="discount_value" id="discount_value" step=".1" min="0.05" max="0.75" placeholder="...%" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="max_discount_value">Giá trị giảm giá tối đa </label>
                        <input type="number" class="form-control" name="max_discount_value" id="max_discount_value" step="5000" min="0" max="50000" placeholder="...VNĐ" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="startdate">Ngày bắt đầu</label>
                        <input type="datetime-local" class="form-control" name="startdate" id="startdate" placeholder="d/m/y H:m:s" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="enddate">Ngày kết thúc</label>
                        <input type="datetime-local" class="form-control" name="enddate" id="startdate" placeholder="d/m/y H:m:s" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="rank_customer">Hạng khách hàng</label>
                        <select class="custom-select" name="rank_customer" id="rank_customer" required>
                            <option value="" disabled="true" selected>Chọn hạng khách hàng được áp dụng khuyến mãi</option>
                            <option value=1>Vàng</option>
                            <option value=2>Bạc</option>
                            <option value=3>Đồng</option>
                        </select>
                    </div>
                </div>
                <div class="m-b-15">
                    <button type="submit" name="save-discount-product" class="btn btn-primary">
                        <i class="anticon anticon-save"></i>
                        <span>Thêm</span>
                    </button>
                    <a class="breadcrumb-item" href="{{URL::to('/all-discount-products')}}"> &nbsp Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript">
    $(document).ready(function() {
        flatpickr("#startdate", {
            altInput: true,
            enableTime: true,
            altFormat: "d/m/Y H:i",
            dateFormat: "d/m/Y H:i",
            minDate: 'today',
            maxDate: new Date().fp_incr(14)
        })
    });
</script>
@endsection
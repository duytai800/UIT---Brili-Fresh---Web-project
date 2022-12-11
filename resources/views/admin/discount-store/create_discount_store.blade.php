@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-discount-stores')}}">Quản lý cửa hàng khuyến mãi </a>
            <span class="breadcrumb-item active">Thêm cửa hàng khuyến mãi</span>
        </nav>
    </div>
</div>
<hr />
<h1>Thêm cửa hàng khuyến mãi</h1>
<form action="{{URL::to('/save-discount-store')}}" method="post">
    {{csrf_field()}}
    <div class="tab-content m-t-15">
        <div class="tab-pane fade show active" id="product-edit-basic">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="store_id">Cửa hàng khuyến mãi</label>
                        <select class="custom-select" name="store_id" id="store_id" required>
                            <option value="" disabled="true" selected>Chọn cửa hàng khuyến mãi</option>
                            @foreach ($discount_store as $key =>$discount_store)
                            <option value="{{$discount_store->StoreID}}">ID: {{$discount_store->StoreID}}; &nbsp Địa chỉ: {{$discount_store->SpecificAddress}}, {{$discount_store->Ward}}, {{$discount_store->District}}, {{$discount_store->City}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="discount_value">Phần trăm giảm giá</label>
                        <input type="number" class="form-control" name="discount_value" id="discount_value" step=".1" min="0.05" max="0.75"placeholder="...%" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="startdate">Ngày bắt đầu</label>
                        <input type="datetime-local" class="form-control" name="startdate" id="date" placeholder="d/m/y H:m:s" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="enddate">Ngày kết thúc</label>
                        <input type="datetime-local" class="form-control" name="enddate" id="date" placeholder="d/m/y H:m:s" required>
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
        flatpickr("#date", {
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

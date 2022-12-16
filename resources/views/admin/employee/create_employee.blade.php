@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-employee')}}">Quản lý nhân viên</a>
            <span class="breadcrumb-item active">Thêm nhân viên</span>
        </nav>
    </div>
</div>
<hr />
<form action="{{URL::to('/save-employee')}}" method="post">
    {{csrf_field()}}
    <h1>Thêm thông tin nhân viên</h1>

    <?php

    use Illuminate\Support\Facades\Session;

    $add_employee_message_fail = Session::get('add_employee_message_fail');
    if ($add_employee_message_fail) {
        echo '<span style= "color: red"; text-align: center; font-size: 14px; >' . $add_employee_message_fail . '</span>';
        Session::put('add_employee_message_fail', null);
    }
    ?>

    <div class="tab-content m-t-15">
        <div class="tab-pane fade show active" id="product-edit-basic">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="employeeLastName">Họ</label>
                        <input type="text" class="form-control" name="employeeLastName" id="employeeLastName" placeholder="Họ" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="employeeFirstName">Tên</label>
                        <input type="text" class="form-control" name="employeeFirstName" id="employeeFirstName" placeholder="Tên" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="employeeGender">Giới tính</label>
                        <select class="custom-select" name="employeeGender" id="employeeGender">
                            <option value=1 selected>Nam</option>
                            <option value=2>Nữ</option>
                            <option value=0>Khác</option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label class="font-weight-semibold" for="productBrand">Nhập địa chỉ</label>
                        <label class="font-weight-semibold" for="city">Tỉnh/Thành</label>
                        <select class="custom-select" id="city">
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="district">Quận/Huyện</label>
                        <select class="custom-select" id="district">
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="ward">Phường/Xã</label>
                        <select class="custom-select" id="ward">
                            
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label class="font-weight-semibold" for="address">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="58/1 Trần Mai Ninh">

                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="startdate">Ngày vào làm</label>
                        <input type="date" class="form-control" name="startdate" id="startdate" placeholder="dd/mm/yyyy" min="01/01/1980" max="31/12/2030" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="store_id">Cừa hàng làm việc</label>
                        <select class="custom-select" name="store_id" id="store_id" required>
                            <option value="" selected>Cửa hàng làm việc </option>
                            @foreach ($insert_store_id as $key =>$store_id)
                            <option value="{{$store_id->StoreID}}">ID: {{$store_id->StoreID}}; &nbsp Địa chỉ: {{$store_id->SpecificAddress}}, {{$store_id->Ward}}, {{$store_id->District}}, {{$store_id->City}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="employee_user">Tên tài khoản</label>
                        <input type="text" class="form-control" name="employee_user" id="employee_user" placeholder="Nhập tên tài khoản" required>

                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="employee_pass">Mật khẩu</label>
                        <input type="password" class="form-control" name="employee_pass" id="employee_pass" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="employee_pass_confirm">Xác nhận lại mật khẩu</label>
                        <input type="password" class="form-control" name="employee_pass_confirm" id="employee_pass_confirm" placeholder="Nhập lại mật khẩu" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="phone">Số điện thoại</label>
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="0335586347" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="mail@gmail.com" required>
                    </div>
                </div>
                <div class="m-b-15">
                    <button type="submit" name="save-employee" class="btn btn-primary">
                        <i class="anticon anticon-save"></i>
                        <span>Lưu</span>
                    </button>
                    <a class="breadcrumb-item" href="{{URL::to('/all-employee')}}"> &nbsp Quay lại</a>
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
                    altFormat: " d/m/Y ",
                    dateFormat: "m/d/Y",
                })});
</script>
@endsection
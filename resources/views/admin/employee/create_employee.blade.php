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
<form action="{{URL::to('/save-employee')}}" method="post">
    {{csrf_field()}}
    <h1>Thêm thông tin nhân viên</h1>
    <div class="tab-content m-t-15">
        <div class="tab-pane fade show active" id="product-edit-basic">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="employeeLastName">Họ</label>
                        <input type="text" class="form-control" name="employeeLastName" id="employeeLastName" placeholder="Họ">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="employeeFirstName">Tên</label>
                        <input type="text" class="form-control" name="employeeFirstName" id="employeeFirstName" placeholder="Tên">
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
                        <input type="date" class="form-control" name="startdate" id="startdate" placeholder="dd-mm-yyyy" min="01/01/1980" max="31/12/2030" value="">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="store_id">Cừa hàng làm việc</label>
                        <select class="custom-select" name="store_id" id="store_id" required>
                            <option value="" selected>Cửa hàng làm việc </option>
                            @foreach ($insert_store_id as $key =>$store_id)
                            <option value="{{$store_id->StoreID}}">{{$store_id->StoreID}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="phone">Số điện thoại</label>
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="0335586347">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="mail@gmail.com">
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
@endsection

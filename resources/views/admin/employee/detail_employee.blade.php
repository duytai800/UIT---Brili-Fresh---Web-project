@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-employee')}}">Quản lý nhân viên</a>
            <span class="breadcrumb-item active">Thông tin nhân viên</span>
        </nav>
    </div>
</div>
<hr />

<h1>Thông tin nhân viên</h1>
<div class="page-header no-gutters has-tab">
    <div class="d-md-flex m-b-15 align-items-center justify-content-between">
        <div class="media align-items-center m-b-15">
            <div class="m-l-15">
                @foreach($detail_employee as $key =>$detail_employee)
                <h4 class="m-b-0">Nhân viên: {{$detail_employee->LastName}} {{$detail_employee->FirstName}}</h4>
                <p class="text-muted m-b-0">Mã nhân viên: {{$detail_employee->EmpID}}</p>
            </div>
        </div>
        <div class="m-b-15">
            <a href="{{URL::to('/edit-employee/'.$detail_employee->EmpID)}}">
                <button class="btn btn-primary">
                    <i class="anticon anticon-edit"></i>
                    <span>Chỉnh sửa</span>
                </button>
            </a>
        </div>
        @endforeach
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#detail-work">Công việc</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#detail-info">Thông tin cá nhân</a>
        </li>
    </ul>
</div>
<div class="container-fluid">
    <div class="tab-content m-t-15">
        <div class="tab-pane fade show active" id="detail-work">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="product-info-table m-t-20">
                            <tbody>
                                <tr>
                                    <td>ID nhân viên:</td>
                                    <td class="text-dark font-weight-semibold">{{$detail_employee->EmpID}}</td>
                                </tr>
                                <tr>
                                    <td>ID tài khoản:</td>
                                    <td class="text-dark font-weight-semibold">{{$detail_employee->UserID}}</td>
                                </tr>

                                <tr>
                                    <td>Cửa hàng làm việc:</td>
                                    <td class="text-dark font-weight-semibold">ID cửa hàng: {{$detail_employee->StoreID}} <br>
                                   Địa chỉ: {{$detail_employee->store_address}}, {{$detail_employee->store_ward}}, {{$detail_employee->store_district}}, {{$detail_employee->store_city}} </td>
                                </tr>
                                <tr>
                                    <td>Ngày vào làm</td>
                                    <td class="text-dark font-weight-semibold" >{{$startdate}}</td>
                                </tr>
                                <tr>
                                    <td>Ngày kết thúc</td>
                                    <td class="text-dark font-weight-semibold">{{$detail_employee->EndDate}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="detail-info">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="product-info-table m-t-20">
                            <tbody>
                                <tr>
                                    <td>Tên:</td>
                                    <td class="text-dark font-weight-semibold">{{$detail_employee->FirstName}}</td>
                                </tr>
                                <tr>
                                    <td>Họ:</td>
                                    <td class="text-dark font-weight-semibold">{{$detail_employee->LastName}}</td>
                                </tr>
                                <tr>
                                    <td>Giới tính:</td>
                                    <?php
                                    $gender_customer = $detail_employee->Gender;
                                    if ($gender_customer == 1) {
                                        echo "<td class='text-dark font-weight-semibold'>Nam</td>";
                                    } elseif ($gender_customer == 2) {
                                        echo "<td class='text-dark font-weight-semibold'>Nữ</td>";
                                    } else
                                        echo "<td class='text-dark font-weight-semibold'>Khác</td>";
                                    ?>
                                </tr>
                                <tr>
                                    <td>Số điện thoại:</td>
                                    <td class="text-dark font-weight-semibold">{{$detail_employee->Phone}}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td class="text-dark font-weight-semibold">{{$detail_employee->Email}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript">
    $(document).ready(function() {
                flatpickr("#start_date", {
                    altInput: true,
                    altFormat: " d/m/Y ",
                    dateFormat: "m/d/Y",
                })});
</script>
@endsection
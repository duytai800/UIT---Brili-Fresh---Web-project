@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-customers')}}">Quản lý khách hàng</a>
            <span class="breadcrumb-item active">Thông tin khách hàng</span>
        </nav>
    </div>
</div>
<hr />

<div class="page-header no-gutters has-tab">
    <div class="d-md-flex m-b-15 align-items-center justify-content-between">
        <div class="media align-items-center m-b-15">
            <div class="m-l-15">
                @foreach($detail_customer as $key =>$customer)
                <h4 class="m-b-0">Khách hàng: {{$customer->LastName}} {{$customer->FirstName}}</h4>
                <p class="text-muted m-b-0">Mã khách hàng: {{$customer->CusID}}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="tab-content m-t-15">
        <div class="tab-pane fade show active" id="product-overview">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thông tin chi tiết</h4>
                    <div class="table-responsive">
                        <table class="product-info-table m-t-20">
                            <tbody>
                                @foreach($detail_customer as $key =>$customer)
                                <tr>
                                    <td>Hạng khách hàng</td>
                                    <?php
                                    $type_customer = $customer->CusType;
                                    if ($type_customer == 1) {
                                        echo "<td class='badge badge-pill badge-warning'>Vàng</td>";
                                    } elseif ($type_customer == 2) {
                                        echo "<td class='badge badge-pill badge-secondary'>Bạc</td>";   
                                    } else 
                                        echo "<td class='badge badge-pill badge-light'>Đồng</td>"; 
                                    ?>
                                </tr>
                                <tr>
                                    <td>ID khách hàng:</td>
                                    <td class="text-dark font-weight-semibold">{{$customer->CusID}}</td>
                                </tr>
                                <tr>
                                    <td>ID tài khoản:</td>
                                    <td class="text-dark font-weight-semibold">{{$customer->UserID}}</td>
                                </tr>
                                <tr>
                                    <td>Tên:</td>
                                    <td class="text-dark font-weight-semibold">{{$customer->FirstName}}</td>
                                </tr>
                                <tr>
                                    <td>Họ:</td>
                                    <td class="text-dark font-weight-semibold">{{$customer->LastName}}</td>
                                </tr>
                                <tr>
                                    <td>Giới tính:</td>
                                    <?php
                                    $gender_customer = $customer->Gender;
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
                                    <td class="text-dark font-weight-semibold">{{$customer->Phone}}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td class="text-dark font-weight-semibold">{{$customer->Email}}</td>
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
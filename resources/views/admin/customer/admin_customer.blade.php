@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-customers')}}">Quản lý khách hàng</a>
            <span class="breadcrumb-item active">Danh sách khách hàng</span>
        </nav>
    </div>
</div>
<hr />

<h1>Danh sách khách hàng</h1>
<div class="card">
    <div class="card-body">
        <div class="row m-b-30">
            <div class="col-lg-8">
                <div class="d-md-flex">
                    <div class="m-b-10 m-r-15">
                        <select class="custom-select" id="rank_customer" style="min-width: 180px;">
                            <option value="" selected>Hạng khách hàng</option>
                            <option value=1>Vàng</option>
                            <option value=2>Bạc</option>
                            <option value=3>Đồng</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
        <div class="table-responsive" >
            <table class="table table-hover e-commerce-table" id="datatable">
                <thead>
                    <tr>
                        <th>ID khách</th>
                        <th>Họ tên</th>
                        <th>Giới tính </th>
                        <th>SĐT</th>
                        <th>Email</th>
                        <th>Hạng khách hàng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($all_customers as $key =>$customer)
                    <tr>
                        <td>{{$customer->CusID}}</td>
                        <td>
                            <div class="d-flex align-items-center">
                            {{$customer->LastName}} {{$customer->FirstName}}
                            </div>
                        </td>

                        <?php
                        $gender_customer = $customer->Gender;
                        if ($gender_customer == 1) {
                            echo "<td>Nam</td>";
                        } elseif ($gender_customer == 2) {
                            echo "<td>Nữ</td>";
                        } else echo "<td>Khác</td>";
                        ?>

                        <td>{{$customer->Phone}}</td>
                        <td>{{$customer->Email}}</td>

                        <?php
                        $type_customer = $customer->CusType;
                        if ($type_customer == 1) {
                            echo "<td>";
                            echo "<div class='badge badge-warning badge-dot m-r-10'></div>";                          
                            echo "Vàng";
                            echo "</td>";
                        } elseif ($type_customer == 2) {
                            echo "<td>";
                            echo "<div class='badge badge-dark badge-dot m-r-10'></div>";                          
                            echo "Bạc";
                            echo "</td>";
                        } elseif ($type_customer == null) {
                            echo "<td></td>";
                        }
                        else {
                            echo "<td>";
                            echo "<div class='badge badge-light badge-dot m-r-10'></div>";                          
                            echo "Đồng";
                            echo "</td>";
                        };
                        ?>

                        <td class="text-right">
                            <a href="{{URL::to('/detail-customers/'.$customer->CusID)}}" style="padding: 12px 20px;">
                                Xem chi tiết
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

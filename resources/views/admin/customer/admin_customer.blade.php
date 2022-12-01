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
                                <h6 class="m-b-0 m-l-10">{{$customer->LastName}}</h6>
                                <h6 class="m-b-0 m-l-10">{{$customer->FirstName}}</h6>
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
                            echo "<td>Vàng</td>";
                        } elseif ($type_customer == 2) {
                            echo "<td>Bạc</td>";
                        } else echo "<td>Đồng</td>";
                        ?>

                        <td class="text-right">
                            <!-- <a  class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                <i class="anticon anticon-edit"></i>
                            </a>
                            <a  class="btn btn-icon btn-hover btn-sm btn-rounded">
                                <i class="anticon anticon-delete"></i>
                            </a> -->
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
<!-- @section('javascript')
<script>
    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            'processing': true,
            'serverSide': true,
            'ajax': "{{route('api.customers.index')}}",

            // 'ajax': '{{route("filter-customers")}}',
            'columns': [{
                    'data': 'first_name'
                },
                {
                    'data': 'last_name'
                },
                {
                    'data': 'email'
                }
            ],
        });

        $('.custom-select').change(function() {
            table.column($(this).data('column'))
                .search($(this).val())
                .draw();
        });
    })
</script>
@endsection -->
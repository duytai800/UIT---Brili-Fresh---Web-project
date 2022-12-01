@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-customers')}}">Quản lý nhân viên</a>
            <span class="breadcrumb-item active">Danh sách nhân viên</span>
        </nav>
    </div>
</div>
<h1>Danh sách nhân viên</h1>
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
            <div class="col-lg-4 text-right">
                <a class="btn btn-primary">
                    <i class="anticon anticon-plus-circle m-r-5"></i>
                    <span>Thêm nhân viên</span>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover e-commerce-table" id="datatable">
                <thead>
                    <tr>
                        <th>ID Nhân viên</th>
                        <th>Họ tên</th>
                        <th>Cửa hàng</th>
                        <th>Ngày vào làm</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($all_employee as $key =>$employee)
                    <tr>
                        <td>{{$employee->EmpID}}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <h6 class="m-b-0 m-l-10">{{$employee->LastName}}</h6>
                                <h6 class="m-b-0 m-l-10">{{$employee->FirstName}}</h6>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <h6 class="m-b-0 m-l-10">{{$employee->store_city}}</h6>
                                <h6 class="m-b-0 m-l-10">{{$employee->SpecificAddress}}</h6>
                            </div>
                        </td>
                        <td>{{$employee->StartDate}}</td>

                        <td class="text-right">
                            <a href="{{URL::to('/edit-employee/'.$employee->EmpID)}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                <i class="anticon anticon-edit"></i>
                            </a>
                            <a href="{{URL::to('/delete-employee/'.$employee->EmpID)}}" class="btn btn-icon btn-hover btn-sm btn-rounded">
                                <i class="anticon anticon-delete"></i>
                            </a>
                            <a href="{{URL::to('/detail-employee/'.$employee->EmpID)}}" style="padding: 12px 20px;">
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

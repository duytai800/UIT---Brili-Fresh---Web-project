@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-products')}}">Quản lý sản phẩm</a>
            <span class="breadcrumb-item active">Xoá thông tin sản phẩm</span>
        </nav>
    </div>
</div>
<hr />
<h1>Xóa thông tin nhân viên</h1>
<h3>Bạn có chắc muốn xóa thông tin nhân viên này?</h3>
<div>
    <dl class="row">
        @foreach($edit_employee as $key =>$edit_employee)
        <dt class="col-sm-2">
            Mã nhân viên
        </dt>
        <dd class="col-sm-10">
            {{$edit_employee->EmpID}}
        </dd>
        <dt class="col-sm-2">
            Mã tài khoản
        </dt>
        <dd class="col-sm-10">
            {{$edit_employee->UserID}}
        </dd>
        <dt class="col-sm-2">
            Họ và tên
        </dt>
        <dd class="col-sm-10">
            {{$edit_employee->LastName}} {{$edit_employee->FirstName}}
        </dd>
        <dt class="col-sm-2">
            Cửa hàng làm việc 
        </dt>
        <dd class="col-sm-10">
            ID cửa hàng: {{$edit_employee->StoreID}} <br>
            Địa chỉ: {{$insert_store_id[0]->SpecificAddress}}, {{$insert_store_id[0]->Ward}}, {{$insert_store_id[0]->District}}, {{$insert_store_id[0]->City}}
        </dd>
        <dt class="col-sm-2">
            Thông tin liên hệ
        </dt>
        <dd class="col-sm-10">
            SĐT: {{$edit_employee->Phone}} <br>
            Email: {{$edit_employee->Email}}<br>
            Địa chỉ: {{$edit_employee->SpecificAddress}}
        </dd>       
    </dl>

    <form action="{{URL::to('/soft-delete-employee/'.$edit_employee->EmpID)}}" method="post">
        {{csrf_field()}}
        <input type="submit" value="Xóa" class="btn btn-danger" />
        <a style="margin-left:20px;" href="{{URL::to('/all-employee')}}" class="btn btn-success btn-tone m-r-5">Quay lại danh sách</a>
    </form>
    
    @endforeach
</div>
@endsection
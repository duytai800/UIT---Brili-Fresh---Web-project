@extends('admin_layout')
@section('admin_content')
<div class="page-header">
     <h2 class="header-title">Brili Fresh</h2>
     <div class="header-sub-title">
          <nav class="breadcrumb breadcrumb-dash">
               <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i
                         class="anticon anticon-home m-r-5"></i>Trang chủ</a>
               <a href="{{URL::to('/index-account')}}" class="breadcrumb-item">Quản lý cửa hàng</a>
               <span class="breadcrumb-item active">Xóa</span>
          </nav>
     </div>
</div>
<h1>Xóa tài khoản</h1>

<h3>Bạn có chắc muốn xóa tài khoản?</h3>
<div>
     @foreach($delete_account as $key =>$account)
     <hr />
     <h4>Mã tài khoản: {{$account->UserID}}</h4>
     <dl class="row">
          <dt class="col-sm-2">
               Mã nhân viên
          </dt>
          <dd class="col-sm-10">
               {{$account->employee_empid}}
          </dd>
          <dt class="col-sm-2">
               Họ và tên
          </dt>
          <dd class="col-sm-10">
               {{$account->employee_LastName}} {{$account->employee_FirstName}}
          </dd>
          <dt class="col-sm-2">
               Tên đăng nhập
          </dt>
          <dd class="col-sm-10">
               {{$account->UserName}}
          </dd>
          <dt class="col-sm-2">
               Mật khẩu
          </dt>
          <dd class="col-sm-10">
               {{$account->UserPassword}}
          </dd>
          <dt class="col-sm-2">
               Loại tài khoản
          </dt>
          <dd class="col-sm-10">
               Nhân viên
          </dd>
     </dl>

     <form action="/confirm-delete-account/{{$account->UserID}}" method="post">
          {{csrf_field()}}
          <input type="submit" value="Xóa" class="btn btn-danger" />
          <a style="margin-left:20px;" href="{{URL::to('/index-account')}}" class="btn btn-success btn-tone m-r-5">Quay
               lại Danh sách</a>
     </form>

     @endforeach
</div>
@endsection
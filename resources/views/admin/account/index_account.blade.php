@extends('admin_layout')
@section('admin_content')
<div class="page-header">
     <h2 class="header-title">Brili Fresh</h2>
     <div class="header-sub-title">
          <nav class="breadcrumb breadcrumb-dash">
               <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i
                         class="anticon anticon-home m-r-5"></i>Trang chủ</a>
               <span class="breadcrumb-item active">Danh sách tài khoản</span>
          </nav>
     </div>
</div>
<div class="card">
     <div class="card-body">
          <div class="row m-b-30">
               <div class="col-lg-8">
                    <div class="d-md-flex">
                         <div class="m-b-10 m-r-15">
                              <select class="custom-select" style="min-width: 180px;">
                                   <option selected>Catergory</option>
                                   <option value="all">All</option>
                                   <option value="homeDeco">Home Decoration</option>
                                   <option value="eletronic">Eletronic</option>
                                   <option value="jewellery">Jewellery</option>
                              </select>
                         </div>
                         <div class="m-b-10">
                              <select class="custom-select" style="min-width: 180px;">
                                   <option selected>Status</option>
                                   <option value="all">All</option>
                                   <option value="inStock">In Stock </option>
                                   <option value="outOfStock">Out of Stock</option>
                              </select>
                         </div>
                    </div>
               </div>
          </div>
          <div class="table-responsive">
               <table class="table table-hover e-commerce-table">
                    <thead>
                         <tr>
                              <th>ID</th>
                              <th>Mã NV/KH</th>
                              <th>Họ tên</th>
                              <th>Tên đăng nhập</th>
                              <th>Mật khẩu</th>
                              <th>Loại tài khoản</th>
                              <th></th>
                         </tr>
                    </thead>
                    <tbody>
                         @foreach($index_account as $key =>$account)
                         <tr>
                              <td>
                                   {{$account->UserID}}
                              </td>
                              <?php
                                if($account->employee_empid != null){
                                  echo "<td>{$account->employee_empid}</td>";
                                  echo "<td>{$account->employee_LastName} {$account->employee_FirstName}</td>";
                                }else{
                                  echo "<td>{$account->customer_CusID}</td>";
                                  echo "<td>{$account->customer_LastName} {$account->customer_FirstName}</td>";
                                }
                              ?>

                              <td>
                                   {{$account->UserName}}
                              </td>
                              <td>
                                   {{$account->UserPassword}}
                              </td>
                              <?php
                                if($account->UserRole == 1){
                                  echo "<td>Khách hàng</td>";
                                }else if($account->UserRole == 2){
                                  echo "<td>Nhân viên</td>";
                                }else{
                                   echo "<td>Quản lý</td>";
                                }

                                if($account->UserRole == 2){
                                   echo"<td class=\"text-right\">";
                                   echo"<a href=\"/delete-account/$account->UserID\"";
                                   echo"class=\"btn btn-icon btn-hover btn-sm btn-rounded\">";
                                   echo"<i class=\"anticon anticon-delete\"></i></a> </td>>";
                                }

                              ?>
                              <td>

                              </td>

                         </tr>
                         @endforeach
                    </tbody>
               </table>
          </div>
     </div>
</div>
@endsection
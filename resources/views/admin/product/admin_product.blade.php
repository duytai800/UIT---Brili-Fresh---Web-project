@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-products')}}">Quản lý sản phẩm</a>
            <span class="breadcrumb-item active">Danh sách sản phẩm</span>
        </nav>
    </div>
</div>
<hr />

<h1>Danh sách sản phẩm</h1>
<?php

use Illuminate\Support\Facades\Session;

$message = Session::get('message');
if ($message) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $message . '</span>';
    Session::put('add_employee_message', null);
}
?>
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
                <a href="{{URL::to('/create-product')}}" class="btn btn-primary">
                    <i class="anticon anticon-plus-circle m-r-5"></i>
                    <span>Thêm sản phẩm</span>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover e-commerce-table" id="datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại</th>
                        <th>Đơn vị</th>
                        <th>Giá bán</th>
                        <th>Nguồn gốc</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_products as $key =>$product)

                    <tr>
                        <td>{{$product->ProID}}</td>
                        <td>
                            <div class="d-flex align-items-center" class="logo logo-dark">
                                <img src="{{URL::to('../public/upload/product/'.$product->ImgData)}}" height="70" width="70" alt="Logo">
                                <h6 class="m-b-0 m-l-10">{{$product->ProName}}</h6>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center" class="logo logo-dark">
                                <h6 class="m-b-0 m-l-10">{{$product->MainType}}</h6>
                                <h6 class="m-b-0 m-l-10">{{$product->SubType}}</h6>
                            </div>
                        </td>
                        <td>{{$product->Unit}}</td>
                        <td>{{$product->Price}}</td>
                        <td>{{$product->Source}}</td>

                        <?php {
                            echo "<td>";
                            echo    "<div class='d-flex align-items-center' class='logo logo-dark'> ";
                            $pro_quantity = $product->product_quantity;
                            if ($pro_quantity > 0) {
                                echo "<div class='badge badge-success badge-dot m-r-10'></div>";
                                echo "<div>Còn hàng</div>";
                            } else {
                                echo "<div class='badge badge-danger badge-dot m-r-10'></div>";
                                echo "<div>Hết hàng</div>";
                            }
                            echo "</td>";
                        }
                        ?>
                        <td class="text-right">
                            <a href="{{URL::to('/edit-product/'.$product->ProID)}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                <i class="anticon anticon-edit"></i>
                            </a>
                            <a onclick="return confirm('Bạn có chắc muốn xoá thông tin sản phẩm này?')" href="{{URL::to('/delete-employee/'.$product->ProID)}}" class="btn btn-icon btn-hover btn-sm btn-rounded">
                                <i class="anticon anticon-delete"></i>
                            </a>
                            <a href="{{URL::to('/detail-product/'.$product->ProID)}}" style="padding: 12px 20px;">
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
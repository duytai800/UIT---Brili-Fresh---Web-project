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

<h2>DANH SÁCH SẢN PHẨM</h2>
<?php

use Illuminate\Support\Facades\Session;

$delete_product_message = Session::get('delete_product_message');
if ($delete_product_message) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $delete_product_message . '</span>';
    Session::put('delete_product_message', null);
}

$message_save_product = Session::get('message_save_product');
if ($message_save_product) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $message_save_product . '</span>';
    Session::put('message_save_product', null);
}

$message_info = Session::get('message_info');
if ($message_info) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $message_info . '</span>';
    echo "<br>";
    Session::put('message_info', null);
}

$message_main = Session::get('message_main');
if ($message_main) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $message_main . '</span>';
    echo "<br>";
    Session::put('message_main', null);
}

$message_des = Session::get('message_des');
if ($message_des) {
    echo '<span style= "color: green"; text-align: center; font-size: 14px; >' . $message_des . '</span>';
    echo "<br>";
    Session::put('message_des', null);
}

$message_no_des = Session::get('message_no_des');
if ($message_no_des) {
    echo '<span style= "color: red"; text-align: center; font-size: 14px; >' . $message_no_des . '</span>';
    echo "<br>";
    Session::put('message_no_des', null);
}

?>
<div class="card">
    <div class="card-body">
        <div class="row m-b-30">
            <div class="col-lg-8">
                <div class="d-md-flex">
                <div class="m-b-10 m-r-15">
                        <b>Loại sản phẩm</b>
                        <select id="type" class="form-control">
                            <option value="" selected>Tất cả</option>
                            
                        @foreach($insert_subtype as $key =>$subtype)
                            <option value="{{$subtype->SubType}}">{{$subtype->SubType}}</option>
                            
                        @endforeach
                        </select>
                    </div>
                    <div class="m-b-10 m-r-15" style="margin-left: 12px">
                        <b>Tình trạng tồn kho</b>
                        <select id="status" class="form-control">
                            <option value="" selected>Tất cả</option>
                            <option value="Còn hàng">Còn hàng</option>
                            <option value="Hết hàng">Hết hàng</option>
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
                                <h6 class="m-b-0 m-l-10">{{$product->SubType}}</h6>
                            </div>
                        </td>
                        <td>{{$product->Unit}}</td>
                        <td>{{number_format($product->Price)}} VNĐ</td>
                        <td>{{$product->Source}}</td>

                        <?php {
                            echo "<td>";
                            echo    "<div class='d-flex align-items-center' class='logo logo-dark'> ";
                            if ($totalQuantity > 0) {
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
                            <a href="{{URL::to('/delete-product/'.$product->ProID)}}" class="btn btn-icon btn-hover btn-sm btn-rounded">
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
<script>
    $('#type, #status').change(function(){
        var a = $('#type').val();
        var b = $('#status').val();
        $("input[type=search]").val(a + " " + b).trigger("keyup");
        $("input[type=search]").val("");
    })

</script>
@endsection
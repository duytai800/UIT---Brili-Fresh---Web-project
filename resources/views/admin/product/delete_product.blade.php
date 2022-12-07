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
<h1>Xóa sản phẩm</h1>
<h3>Bạn có chắc muốn xóa sản phẩm này?</h3>
<div>
    <dl class="row">
        @foreach($detail_product as $key =>$detail_product)
        <dt class="col-sm-2">
            Mã sản phẩm
        </dt>
        <dd class="col-sm-10">
            {{$detail_product->ProID}}
        </dd>
        <dt class="col-sm-2">
            Tên sản phẩm
        </dt>
        <dd class="col-sm-10">
            {{$detail_product->ProName}}
        </dd>
        <dt class="col-sm-2">
            Danh mục
        </dt>
        <dd class="col-sm-10">
            {{$type_detail_product[0]->MainType}}
        </dd>
        <dt class="col-sm-2">
            Loại
        </dt>
        <dd class="col-sm-10">
            {{$type_detail_product[0]->SubType}}
        </dd>
        <dt class="col-sm-2">
            Giá bán
        </dt>
        <dd class="col-sm-10">
            <div class="price">
                <span class="main">
                    {{$detail_product->Price}} VNĐ
                </span>
            </div>

        </dd>
        <dt class="col-sm-2">
            Nguồn gốc
        </dt>
        <dd class="col-sm-10">
            {{$detail_product->Source}}
        </dd>
        <dt class="col-sm-2">
            Ngày nhập
        </dt>
        <dd class="col-sm-10">
            {{$detail_product->StartDate}}
        </dd>
        <dt class="col-sm-2">
            Mô tả
        </dt>
        <dd class="col-sm-10">
            {{$des_detail_product[0]->Des}}
        </dd>
        <dt class="col-sm-2">
            Đơn vị bán
        </dt>
        <dd class="col-sm-10">
            {{$detail_product->Unit}}
        </dd>
        <dt class="col-sm-2">
            Tồn kho
        </dt>
        <dd class="col-sm-10">
            <?php {
                echo "<td>";
                echo    "<div class='d-flex align-items-center' class='logo logo-dark'> ";
                $detail_product = $detail_product->product_quantity;
                if ($detail_product > 0) {
                    echo "<div class='badge badge-success badge-dot m-r-10'></div>";
                    echo "<div>Còn hàng</div>";
                } else {
                    echo "<div class='badge badge-danger badge-dot m-r-10'></div>";
                    echo "<div>Hết hàng</div>";
                }
                echo "</td>";
            }
            ?>
        </dd>

    </dl>

    <form action="{{URL::to('/soft-delete-product/'.$id_product[0]->ProID)}}" method="post">
        {{csrf_field()}}
        <input type="submit" value="Xóa" class="btn btn-danger" />
        <a style="margin-left:20px;" href="{{URL::to('/all-products')}}" class="btn btn-success btn-tone m-r-5">Quay lại danh sách</a>
    </form>
    
    @endforeach
</div>
<script>
    for (var i = 0; i < $(".price").length; i++) {
        var a = $(".price")[i].value;
        a = a.replace('.00', '');
        $(".main")[i].innerHTML = a;
    }
</script>
@endsection
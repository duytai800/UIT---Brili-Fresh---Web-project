@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a class="breadcrumb-item" href="{{URL::to('/all-products')}}">Quản lý sản phẩm</a>
            <span class="breadcrumb-item active">Thông tin sản phẩm</span>
        </nav>
    </div>
</div>
<hr />
@foreach($detail_product as $key =>$detail_product)
<div class="page-header no-gutters has-tab">
    <div class="d-md-flex m-b-15 align-items-center justify-content-between">
        <div class="media align-items-center m-b-15">
            <div class="avatar avatar-image rounded" style="height: 70px; width: 70px">
                <img src="{{URL::to('../public/upload/product/'.$detail_product->ImgData)}}" alt="">
            </div>
            <div class="m-l-15">

                <h4 class="m-b-0">{{$detail_product->ProName}}</h4>
                <p class="text-muted m-b-0">ID: {{$detail_product->ProID}}</p>
            </div>
        </div>
        <div class="m-b-15">
            <a href="{{URL::to('/edit-product/'.$detail_product->ProID)}}">
                <button class="btn btn-primary">
                    <i class="anticon anticon-edit"></i>
                    <span>Chỉnh sửa</span>
                </button>
            </a>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#product-overview">Tổng quan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#product-images">Ảnh mô tả</a>
        </li>
    </ul>
</div>
<div class="container-fluid">
    <div class="tab-content m-t-15">
        <div class="tab-pane fade show active" id="product-overview">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <i class="font-size-40 text-success anticon anticon-smile"></i>
                                <div class="m-l-15">
                                    <p class="m-b-0 text-muted">3712 đánh giá</p>
                                    <div class="star-rating m-t-5">
                                        <input type="radio" id="star3-5" name="rating-3" value="5" checked disabled /><label for="star3-5" title="5 star"></label>
                                        <input type="radio" id="star3-4" name="rating-3" value="4" disabled /><label for="star3-4" title="4 star"></label>
                                        <input type="radio" id="star3-3" name="rating-3" value="3" disabled /><label for="star3-3" title="3 star"></label>
                                        <input type="radio" id="star3-2" name="rating-3" value="2" disabled /><label for="star3-2" title="2 star"></label>
                                        <input type="radio" id="star3-1" name="rating-3" value="1" disabled /><label for="star3-1" title="1 star"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <i class="font-size-40 text-primary anticon anticon-shopping-cart"></i>
                                <div class="m-l-15">
                                    <p class="m-b-0 text-muted">Lượt mua</p>
                                    <h3 class="m-b-0 ls-1">1,521</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <i class="font-size-40 text-primary anticon anticon-message"></i>
                                <div class="m-l-15">
                                    <p class="m-b-0 text-muted">Đánh giá</p>
                                    <h3 class="m-b-0 ls-1">27</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <i class="font-size-40 text-primary anticon anticon-stock"></i>
                                <div class="m-l-15">
                                    <p class="m-b-0 text-muted">Số lượng trong kho</p>
                                    <h3 class="m-b-0 ls-1">152</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thông tin cơ bản</h4>
                    <div class="table-responsive">
                        <table class="product-info-table m-t-20">
                            <tbody>

                                <tr>
                                    <td>Danh mục:</td>
                                    <td class="text-dark font-weight-semibold">{{$type_detail_product[0]->MainType}}</td>
                                </tr>
                                <tr>
                                    <td>Loại:</td>
                                    <td class="text-dark font-weight-semibold">{{$type_detail_product[0]->SubType}}</td>
                                </tr>
                                <tr>
                                    <td>Giá nhập hàng:</td>
                                    <td class="text-dark font-weight-semibold">{{number_format($detail_product->OriginalPrice)}}  VNĐ</td>
                                </tr>
                                <tr>
                                    <td>Đơn giá:</td>
                                    <td class="text-dark font-weight-semibold">{{number_format($detail_product->Price)}} VNĐ</td>
                                </tr>
                                <tr>
                                    <td>Ngày nhập</td>
                                    <td class="text-dark font-weight-semibold">{{$detail_product->StartDate}}</td>
                                </tr>

                                <tr>
                                    <td>Nguồn:</td>
                                    <td class="text-dark font-weight-semibold">{{$detail_product->Source}}</td>
                                </tr>
        
                                <tr>
                                    <td>Đơn vị tính</td>
                                    <td class="text-dark font-weight-semibold">{{$detail_product->Unit}}</td>
                                </tr>
                                <tr>
                                    <td>Tình trạng:</td>
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Mô tả sản phẩm</h4>
                </div>
                <div class="card-body">
                    <p>{{$des_detail_product[0]->Des}}</p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="product-images">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if ($count_des_img==3)
                        <div class="col-md-3">
                            <img class="img-fluid" src="{{URL::to('../public/upload/product/'.$des_img[0]->ImgData)}}" alt="">
                        </div>

                        <div class="col-md-3">
                            <img class="img-fluid" src="{{URL::to('../public/upload/product/'.$des_img[1]->ImgData)}}" alt="">
                        </div>

                        <div class="col-md-3">

                            <img class="img-fluid" src="{{URL::to('../public/upload/product/'.$des_img[2]->ImgData)}}" alt="">
                        </div>

                        @elseif ($count_des_img==2)
                        <div class="col-md-3">
                            <img class="img-fluid" src="{{URL::to('../public/upload/product/'.$des_img[0]->ImgData)}}" alt="">
                        </div>

                        <div class="col-md-3">
                            <img class="img-fluid" src="{{URL::to('../public/upload/product/'.$des_img[1]->ImgData)}}" alt="">
                        </div>

                        @elseif ($count_des_img==1)
                        <div class="col-md-3">
                            <img class="img-fluid" src="{{URL::to('../public/upload/product/'.$des_img[0]->ImgData)}}" alt="">
                        </div>

                        @else
                        <p>Sản phẩm không có ảnh mô tả sản phẩm</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>


@endsection
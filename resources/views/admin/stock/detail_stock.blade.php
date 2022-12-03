@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a href="{{URL::to('/index-stock')}}" class="breadcrumb-item">Quản lý kho</a>
            <span class="breadcrumb-item active">Chi tiết</span>
        </nav>
    </div>
</div>
<div class="page-header no-gutters has-tab">
    <div class="d-md-flex m-b-15 align-items-center justify-content-between">
        <div class="media align-items-center m-b-15">
            <div class="m-l-15">
            @foreach($detail_stock as $key =>$detail_stock)
                <h4 class="m-b-0">Kho</h4>
                <p class="text-dark font-weight-semibold">ID cửa hàng: {{$detail_stock->StoreID}}</p>
            </div>
        </div>
        <div class="m-b-15">
            <a href="{{URL::to('/edit-stock/'.$detail_stock->StoreID)}}" class="btn btn-primary">
                <i class="anticon anticon-edit"></i>
                <span>Sửa</span>
            </a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="tab-content m-t-15">
        <div class="tab-pane fade show active" id="product-overview">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thông tin chi tiết</h4>
                    <div class="table-responsive">
                        <table class="product-info-table m-t-20">
                            <tbody>
                                <tr>
                                    <td class="text-dark font-weight-semibold">ID cửa hàng:</td>
                                    <td>{{$detail_stock->StoreID}}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark font-weight-semibold">Địa chỉ:</td>
                                    <td>{{$detail_stock->Store_SpecificAddress}}, {{$detail_stock->Store_Ward}}, {{$detail_stock->Store_District}}, {{$detail_stock->Store_City}}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark font-weight-semibold">ID sản phẩm:</td>
                                    <td>{{$detail_stock->ProID}}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark font-weight-semibold">Tên sản phẩm:</td>
                                    <td>{{$detail_stock->Pro_ProName}}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark font-weight-semibold">Số lượng:</td>
                                    <td><h3>{{$detail_stock->Quantity}}</h3></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <a href="{{URL::to('/index-stock')}}" class="btn btn-success btn-tone m-r-5">Quay lại Danh sách</a>
</div>
@endsection
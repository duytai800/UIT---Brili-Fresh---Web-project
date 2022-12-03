@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a href="{{URL::to('/index-store')}}" class="breadcrumb-item">Quản lý cửa hàng</a>
            <span class="breadcrumb-item active">Chi tiết</span>
        </nav>
    </div>
</div>
<div class="page-header no-gutters has-tab">
    <div class="d-md-flex m-b-15 align-items-center justify-content-between">
        <div class="media align-items-center m-b-15">
            <div class="m-l-15">
                @foreach($detail_store as $key =>$detail_store)
                <h4 class="m-b-0">Cửa hàng</h4>
                <p class="text-dark font-weight-semibold">ID: {{$detail_store->StoreID}}</p>
            </div>
        </div>
        <div class="m-b-15">
            <a href="{{URL::to('/edit-store/'.$detail_store->StoreID)}}" class="btn btn-primary">
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
                                    <td class="text-dark font-weight-semibold">Địa chỉ:</td>
                                    <td>{{$detail_store->SpecificAddress}}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark font-weight-semibold">Phường/Xã:</td>
                                    <td>{{$detail_store->Ward}}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark font-weight-semibold">Quận/Huyện:</td>
                                    <td>{{$detail_store->District}}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark font-weight-semibold">Tỉnh/Thành:</td>
                                    <td>{{$detail_store->City}}</td>
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
    <a href="{{URL::to('/index-store')}}" class="btn btn-success btn-tone m-r-5">Quay lại Danh sách</a>
</div>
@endsection
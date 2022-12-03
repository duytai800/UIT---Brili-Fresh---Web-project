@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
                <span class="breadcrumb-item active">Quản lý cửa hàng</span>
            </nav>
        </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row m-b-30">
            <div class="col-lg-8">
                <div class="d-md-flex">
                    <div class="m-b-10 m-r-15">
                        <h2>DANH SÁCH CỬA HÀNG</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-right">
                <a href="{{URL::to('/create-store')}}" class="btn btn-primary">
                    <i class="anticon anticon-plus-circle m-r-5"></i>
                    <span>Thêm mới cửa hàng</span>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover e-commerce-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Địa chỉ</th>
                        <th>Phường/Xã</th>
                        <th>Quận/Huyện</th>
                        <th>Tỉnh/Thành</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($index_store as $key =>$store)
                        <tr>
                            <td>{{$store->StoreID}}</td>
                            <td>{{$store->SpecificAddress}}</td>
                            <td>{{$store->Ward}}</td>
                            <td>{{$store->District}}</td>
                            <td>{{$store->City}}</td>
                            <td class="text-right">
                                <a href="{{URL::to('/edit-store/'.$store->StoreID)}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                    <i class="anticon anticon-edit"></i>
                                </a>
                                <a href="{{URL::to('/delete-store/'.$store->StoreID)}}" class="btn btn-icon btn-hover btn-sm btn-rounded">
                                    <i class="anticon anticon-delete"></i>
                                </a>
                                <a href="{{URL::to('/detail-store/'.$store->StoreID)}}" style="padding: 12px 20px;">
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
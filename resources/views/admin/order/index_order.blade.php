@extends('admin_layout')
@section('admin_content')

<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <span class="breadcrumb-item active">Quản lý đơn hàng</span>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row m-b-30">
            <div class="col-lg-8">
                <h2>DANH SÁCH ĐƠN HÀNG</h2>
                <hr />
                <div class="d-md-flex">
                    <div class="m-b-10 m-r-15">
                        <b>Mã cửa hàng</b>
                        <select id="store" class="form-control" >
                            <option value="" selected>Tất cả</option>
                            @foreach ($insert_store_id as $key =>$store_id)
                                   <option value="{{$store_id->StoreID}}">{{$store_id->StoreID}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="m-b-10 m-r-15" style="margin-left: 12px">
                        <b>Trạng thái thanh toán</b>
                        <select id="paymentStatus" class="form-control">
                            <option value="" selected>Tất cả</option>
                            <option value="Chưa thanh toán">Chưa thanh toán</option>
                            <option value="Đã thanh toán">Đã thanh toán</option>
                        </select>
                    </div>
                    <div class="m-b-10 m-r-15" style="margin-left: 12px">
                        <b>Trạng thái hóa đơn</b>
                        <select id="status" class="form-control">
                            <option value="">Tất cả</option>
                            <option value="Đang xử lý">Đang xử lý</option>
                            <option value="Thành công">Thành công</option>
                            <option value="Thất bại">Thất bại</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div style="float: right;">
        </div>
        <div class="table-responsive">
            <table class="table table-hover e-commerce-table">
                <thead>
                    <tr>
                        <th>Mã hóa đơn</th>
                        <th>Mã cửa hàng</th>
                        <th>Thanh toán</th>
                        <th>Thời gian</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>@foreach ($index_order as $key =>$order)
                        
                            <tr class="rowitem">
                                <td>{{$order->OrderID}}</td>
                                <td><span class="storeId">{{$order->StoreID}}</span></td>
                                <td>
                                
                                <?php
                                $order_status = $order->Status;
                                 if ( $order_status==0): ?>
                                        <div class="paymentStatus">Chưa thanh toán</div>
                                        <?php else: ?>
                                        <div class="paymentStatus">Đã thanh toán</div>
                                        <?php endif; ?>
                                </td>
                                <td>{{$order->OrderDate}}</td>

                                <td class="orderTotal" style="float:right">
                                    {{$order->OrderTotal}}
                                </td>
                                <td>
                                <?php
                                $order_trans_status = $order->Trans_Status;
                                 if ( $order_trans_status==1 || $order_trans_status==2 || $order_trans_status==3 || $order_trans_status==4 || $order_trans_status==5): ?>
                                   
                                        <div class="d-flex align-items-center">
                                            <div style="background-color: yellow" class="badge badge-success badge-dot m-r-10"></div>
                                            <div class="status">Đang xử lý</div>
                                        </div>
                                        <?php elseif ($order_trans_status==6): ?> 
                                    
                                        <div class="d-flex align-items-center">
                                            <div class="badge badge-success badge-dot m-r-10"></div>
                                            <div class="status">Thành công</div>
                                        </div>
                                    
                                        <?php else: ?>
                                    
                                        <div class="d-flex align-items-center">
                                            <div class="badge badge-danger badge-dot m-r-10"></div>
                                            <div class="status">Thất bại</div>
                                        </div>
                                        <?php endif; ?>

                                </td>
                                <td class="text-left">
                                    <a href="/edit-order/{{$order->OrderID}}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <a href="/detail-order/{{$order->OrderID}}">
                                        Xem chi tiết
                                    </a>
                                </td>
                            </tr>
                        
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

<script>
    for (var i = 0; i < $(".orderTotal").length; i++) {
        var a = $(".orderTotal")[i].innerHTML;
        //a = a.replace('.00', '');
        a = Number(a).toLocaleString('en');
        $(".orderTotal")[i].innerHTML = a + ' đ';

        if ($(".status")[i].innerHTML == "Thành công" || $(".status")[i].innerHTML == "Thất bại") {
            $(".pull-right")[i].style.visibility = 'hidden';
        }

    }
    $('#store, #paymentStatus, #status').change(function(){
        var a = $('#store').val();
        var b = $('#paymentStatus').val();
        var c = $('#status').val();
        $("input[type=search]").val(a + " " + b + " " + c).trigger("keyup");
        $("input[type=search]").val("");
    })
</script>
@endsection
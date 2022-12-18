@extends('admin_layout')
@section('admin_content')

<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a href="{{URL::to('/index-order')}}" class="breadcrumb-item">Quản lý đơn hàng</a>
            <span class="breadcrumb-item active">Chi tiết</span>
        </nav>
    </div>
</div>
<hr />
<!-- Content Wrapper START -->
<div class="page-header no-gutters has-tab">
    @foreach ($detail_order as $key =>$order)
    <div class="d-md-flex m-b-15 align-items-center justify-content-between">
        <div class="media align-items-center m-b-15">
            <div class="m-l-15">
                <h4 class="m-b-0">ĐƠN HÀNG</h4>
                <p class="text-muted m-b-0">ID: {{$order->OrderID}}</p>
            </div>
        </div>
        <div class="m-b-15">
            <a href="/edit-order/{{$order->OrderID}}" id="update-btn" class="btn btn-warning m-r-5">
                <i class="anticon anticon-edit"></i>
                <span>Cập nhật tình trạng đơn hàng</span>
            </a>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#product-overview">Thông tin hóa đơn</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#product-images">Thông tin vận chuyển</a>
        </li>
    </ul>
</div>
<div class="container-fluid">
    <div class="tab-content m-t-15">
        <div class="tab-pane fade show active" id="product-overview">
            <div class="row">
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thông tin cơ bản</h4>
                    <div class="table-responsive">
                        <table class="product-info-table m-t-20">
                            <tbody>
                                <tr>
                                    <td>Mã hóa đơn:</td>
                                    <td class="text-dark font-weight-semibold">{{$order->OrderID}}</td>
                                </tr>
                                <tr>
                                    <td>Mã cửa hàng:</td>
                                    <td>
                                        {{$order->StoreID}}
                                        <button class="badge badge-pill badge-info" id="store-detail-btn" type="button" style="float:right; border:none; outline:none">Xem thông tin</button>
                                    </td>
                                </tr>
                                <tr class="storeInfo" style="background-color: #f2f2f2">
                                    <td>Địa chỉ:</td>
                                    <td>{{$order->Store_SpecificAddress}}, {{$order->Store_Ward}},
                                        {{$order->Store_District}}, {{$order->Store_City}}</td>
                                </tr>
                                <tr>
                                    <td>Mã khách hàng:</td>
                                    <td>
                                        {{$order->CusID}}
                                        <button class="badge badge-pill badge-info" id="cus-detail-btn" type="button" style="float:right;border:none; outline:none">Xem thông tin</button>
                                    </td>
                                    </td>
                                </tr>
                                <tr class="cusInfo" style="background-color: #f2f2f2">
                                    <td>Họ tên:</td>
                                    <td>{{$order->Cus_LastName}} {{$order->Cus_FirstName}}</td>
                                </tr>
                                <tr class="cusInfo" style="background-color: #f2f2f2">
                                    <td>Giới tính:</td>
                                    <td>
                                        <?php
                                        $cus_gender = $order->Cus_Gender;
                                        if ($cus_gender==1): ?>
                                            <span>Nam</span>
                                        <?php elseif ($cus_gender==2): ?>
                                            <span>Nam</span>
                                        <?php else: ?>
                                            <span>Khác</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr class="cusInfo" style="background-color: #f2f2f2">
                                    <td>Điện thoại:</td>
                                    <td>{{$order->Cus_Phone}}</td>
                                </tr>
                                <tr class="cusInfo" style="background-color: #f2f2f2">
                                    <td>Email:</td>
                                    <td>{{$order->Cus_Email}}</td>
                                </tr>
                                <tr>
                                    <td>Tổng tiền:</td>
                                    <td class="text-dark font-weight-semibold" id="orderTotal">{{$order->OrderTotal}}</td>
                                </tr>
                                <tr>
                                    <td>Ngày đặt:</td>
                                    <td>{{$order->OrderDate}}</td>
                                </tr>
                                <tr>
                                    <td>Thanh toán:</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <?php
                                            $order_status = $order->Status;
                                             if ($order_status == 0): ?>
                                                <span class="badge badge-pill badge-gold">Chưa thanh toán</span>
                                            <?php else: ?>
                                                <span class="badge badge-pill badge-cyan">Đã thanh toán</span>
                                            <?php endif; ?>
                                            <?php 
                                            $order_payby = $order->PayBy;
                                            if ($order_payby == 1): ?>
                                                <div class="paymentStatus" style="margin-left: 12px">Thanh toán bằng tiền mặt</div>
                                            <?php elseif ($order_payby == 2): ?>
                                                <div class="paymentStatus" style="margin-left: 12px">Thanh toán qua ví điện tử MoMo</div>
                                            <?php elseif ($order_payby == 3): ?>
                                                <div class="paymentStatus" style="margin-left: 12px">Thanh toán qua ví điện tử VNPAY</div>
                                            <?php elseif ($order_payby == 4): ?>
                                                <div class="paymentStatus" style="margin-left: 12px">Thanh toán qua ví điện tử ZaloPay</div>
                                            <?php elseif ($order_payby == 5): ?>
                                                <div class="paymentStatus" style="margin-left: 12px">Thanh toán qua ví điện tử VinID</div>
                                            <?php elseif ($order_payby == 6): ?>
                                                <div class="paymentStatus" style="margin-left: 12px">Thanh toán qua ví điện tử Moca</div>
                                            <?php elseif ($order_payby == 7): ?>
                                                <div class="paymentStatus" style="margin-left: 12px">Thanh toán qua thẻ quốc tế</div>
                                            <?php elseif ($order_payby == 8): ?>
                                                <div class="paymentStatus" style="margin-left: 12px">Thanh toán qua thẻ ATM nội địa/Internet Banking</div>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Trạng thái:</td>
                                    <td>
                                    <?php
                                    $order_trans_status = $order->Trans_Status;
                                    if ($order_trans_status == 1 || $order_trans_status == 2 ||$order_trans_status == 3 || $order_trans_status== 4 || $order_trans_status == 5): ?>
                                            <div class="d-flex align-items-center">
                                                <span class="alert-icon">
                                                    <i class="anticon anticon-clock-circle" style="color:yellow"></i>
                                                </span>
                                                <div class="status">Đang xử lý</div>
                                            </div>
                                            <?php elseif ($order_trans_status == 6): ?>
                                            <div class="d-flex align-items-center">
                                                <span class="alert-icon">
                                                    <i class="anticon anticon-check-o"  style="color:green"></i>
                                                </span>
                                                <div class="status">Thành công</div>
                                            </div>
                                            <?php else: ?>
                                            <div class="d-flex align-items-center">
                                                <span class="alert-icon">
                                                    <i class="anticon anticon-close-o" style="color:red"></i>
                                                </span>
                                                <div class="status">Thất bại</div>
                                            </div>
                                            <?php endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Chi tiết hóa đơn</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Stt</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Đơn vị</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($detail_orderDetails as $key =>$order_details)
                                        <tr class="rowitem">
                                            <td>{{$i}}</td>
                                            <td>{{$order_details->ProID}}</td>
                                            <td>{{$order_details->Pro_ProName}}</td>
                                            <td>{{$order_details->Pro_Unit}}</td>
                                            <td class="price">{{$order_details->Price}}</td>
                                            <td>{{$order_details->Quantity}}</td>
                                            <td class="amount">{{$order_details->Price * $order_details->Quantity}}</td>
                                        </tr>
                                        <?php $i++; ?>
                                        @endforeach
                            </tbody>
                        </table>
                        @foreach ($detail_order as $key =>$order)
                        <table class="product-info-table m-t-20">
                            <tbody>
                                <tr>
                                    <td>Tạm tính:</td>
                                    <td id="subTotal" style="float: right">
                                        <span>{{$order->SubTotal}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phí vận chuyển:</td>
                                    <td id="fee" style="float: right">{{$order->Trans_Fee}}</td>
                                </tr>
                                <tr>
                                    <td>Giảm giá:</td>
                                    <td style="float: right">
                                        -
                                        <span id="discount">{{$order->SubTotal + $order->Trans_Fee - $order->OrderTotal}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tổng tiền:</td>
                                    <td class="text-dark font-weight-semibold" id="orderTotal1" style="float: right"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="product-images">
            <div class="card">
                <div class="card-body">
                    <div style="vertical-align:middle; text-align:center; width:100%">
                        <div id="case1" class="avatar avatar-icon avatar-geekblue">
                            <i class="anticon anticon-safety-certificate"></i>
                        </div>
                        <label id="line1" style="width: 60px; height: 12px; background-color:#b4e7f0; margin-top:auto;margin-bottom:auto; border-radius: 8px"></label>
                        <div id="case2" class="avatar avatar-icon avatar-magenta">
                            <i class="fas fa-dolly"></i>
                        </div>
                        <label id="line2" style="width: 60px; height: 12px; background-color:#b4e7f0; margin-top:auto;margin-bottom:auto; border-radius: 8px"></label>
                        <div id="case3" class="avatar avatar-icon avatar-gold">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <label id="line3" style="width: 60px; height: 12px; background-color:#b4e7f0; margin-top:auto;margin-bottom:auto; border-radius: 8px"></label>
                        <div id="case4" class="avatar avatar-icon avatar-lime">
                            <i class="fas fa-truck-loading"></i>
                        </div>
                        <label id="line4" style="width: 60px; height: 12px; background-color:#b4e7f0; margin-top:auto;margin-bottom:auto; border-radius: 8px"></label>
                        <div id="case5" class="avatar avatar-icon avatar-green">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <label id="line5" style="width: 60px; height: 12px; background-color:#b4e7f0; margin-top:auto;margin-bottom:auto; border-radius: 8px"></label>
                        <div id="case6" class="avatar avatar-icon avatar-cyan">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div id="case7" class="avatar avatar-icon avatar-volcano">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                    <div style="text-align: center; width: 100%; margin-top: 24px">
                        <span id="status1" class="badge badge-pill badge-geekblue" style="font-size: 20px">Đợi xác nhận</span>
                        <span id="status2" class="badge badge-pill badge-magenta" style="font-size: 20px">Đang chuẩn bị hàng</span>
                        <span id="status3" class="badge badge-pill badge-gold" style="font-size: 20px">Đang đóng gói</span>
                        <span id="status4" class="badge badge-pill badge-lime" style="font-size: 20px">Đã giao cho đơn vị vận chuyển</span>
                        <span id="status5" class="badge badge-pill badge-green" style="font-size: 20px">Đang vận chuyển</span>
                        <span id="status6" class="badge badge-pill badge-cyan" style="font-size: 20px">Đã giao</span>
                        <span id="status7" class="badge badge-pill badge-volcano" style="font-size: 20px">Đã hủy</span>
                    </div>
                    <hr />
                    <h4 class="card-title">Chi tiết vận chuyển</h4>
                    <div class="table-responsive">
                        <table class="product-info-table m-t-20">
                            <tbody>
                                <tr>
                                    <td>Mã vận chuyển:</td>
                                    <td class="text-dark font-weight-semibold">{{$order->TransID}}</td>
                                </tr>
                                <tr>
                                    <td>Loại hình vận chuyển:</td>
                                    <td>
                                    <?php
                                    $order_trans_type = $order->Trans_Type;
                                     if ($order_trans_type==1 ): ?>
                                            <span class="badge badge-pill badge-green">Giao tiết kiệm</span>
                                        <?php else: ?>
                                            <span class="badge badge-pill badge-orange">Giao hỏa tốc</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phí vận chuyển:</td>
                                    <td id="fee1">{{$order->Trans_Fee}}</td>
                                </tr>
                                <tr>
                                    <td>Đơn vị vận chuyển:</td>
                                    <td>{{$order->Trans_Transporter}}</td>
                                </tr>
                                <tr>
                                    <td>Họ tên người nhận:</td>
                                    <td>{{$order->Cus_LastName}} {{$order->Cus_FirstName}}</td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại:</td>
                                    <td>{{$order->Cus_Phone}}</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ giao:</td>
                                    <td>{{$order->Add_SpecificAddress}}, {{$order->Add_Ward}}, {{$order->Add_District}},
                                        {{$order->Add_City}}</td>
                                </tr>
                                <tr>
                                    <td>Ngày giao:</td>
                                    <td>{{$order->Trans_ShippingDate}}</td>
                                </tr>
                                <tr>
                                    <td>Trạng thái:</td>
                                    <td>
                                        <input type="hidden" id="trans_status" value="{{$order->Trans_Status}}">
                                        <?php
                                        $order_trans_status = $order->Trans_Status;
                                        if ($order_trans_status == 1): ?>
                                            <span class="badge badge-pill badge-primary" style="background-color: #2f54eb">Đợi xác nhận</span>
                                            <?php elseif ($order_trans_status == 2): ?>
                                            <span class="badge badge-pill badge-primary" style="background-color: #eb2f96">Đang chuẩn bị hàng</span>
                                            <?php elseif ($order_trans_status == 3): ?>
                                            <span class="badge badge-pill badge-primary" style="background-color: #ffc107">Đang đóng gói</span>
                                            <?php elseif ($order_trans_status== 4): ?>
                                            <span class="badge badge-pill badge-primary" style="background-color: #a0d911">Đã giao cho đơn vị vận chuyển</span>
                                            <?php elseif ($order_trans_status == 5): ?>
                                            <span class="badge badge-pill badge-primary" style="background-color: #52c41a">Đang vận chuyển</span>
                                            <?php elseif ($order_trans_status == 6): ?>
                                            <span class="badge badge-pill badge-primary" style="background-color: #00c9a7">Đã giao</span>
                                            <?php elseif ($order_trans_status == 7): ?>
                                            <span class="badge badge-pill badge-primary" style="background-color: #fa541c">Đã hủy</span>
                                            <?php endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href="{{URL::to('/index-order')}}" class="btn btn-success btn-tone m-r-5">Quay lại Danh sách</a>
    </div>
</div>

<script>
if ($("#trans_status").val() == 6 || $("#trans_status").val() == 7) {
    $("#update-btn").hide();
}

var a = $("#orderTotal").text();
a = Number(a).toLocaleString('en');
$("#orderTotal").text(a + ' đ');
$("#orderTotal1").text(a + ' đ');

var b = $("#discount").text();
b = Number(b).toLocaleString('en');
$("#discount").text(b + ' đ');

var c = $("#subTotal").text();
c = Number(c).toLocaleString('en');
$("#subTotal").text(c + ' đ');

var d = $("#fee").text();
d = Number(d).toLocaleString('en');
$("#fee").text(d + ' đ');
$("#fee1").text(d + ' đ');

for (var i = 0; i < $(".price").length; i++) {
    var e = $(".amount")[i].innerHTML;
    e = Number(e).toLocaleString('en');
    $(".amount")[i].innerHTML = e + ' đ';
    var f = $(".price")[i].innerHTML;
    f = Number(f).toLocaleString('en');
    $(".price")[i].innerHTML = f + ' đ';
}
$(".storeInfo").hide();
$(".cusInfo").hide();
//Nút Xem thông tin
$("#store-detail-btn").click(function() {
    var txt = $(".storeInfo").is(":visible") ? 'Xem thông tin' : 'Rút gọn';
    $(this).text(txt);
    $(".storeInfo").toggle();
});
$("#cus-detail-btn").click(function() {
    var txt = $(".cusInfo").is(":visible") ? 'Xem thông tin' : 'Rút gọn';
    $(this).text(txt);
    $(".cusInfo").toggle();
});

$(".avatar.avatar-icon").css({
    "font-size": "40px",
    "padding-top": "20px",
    "width": "80px",
    "height": "80px"
});


if ($("#trans_status").val() == 1) {
    $("#line1, #line2, #line3, #line4, #line5").css({
        "background-color": "#ddd"
    });
    $(".avatar-magenta, .avatar-gold, .avatar-lime, .avatar-green, .avatar-cyan").css({
        "background-color": "#f2f2f2",
        "color": "#ddd"
    });
    $("#case7").hide();
    $("#status2, #status3, #status4, #status5, #status6, #status7").hide();
} else if ($("#trans_status").val() == 2) {
    $("#line2, #line3, #line4, #line5").css({
        "background-color": "#ddd"
    });
    $(".avatar-gold, .avatar-lime, .avatar-green, .avatar-cyan").css({
        "background-color": "none",
        "color": "#ddd"
    });
    $("#case7").hide();
    $("#status1, #status3, #status4, #status5, #status6, #status7").hide();
} else if ($("#trans_status").val() == 3) {
    $("#line3, #line4, #line5").css({
        "background-color": "#ddd"
    });
    $(".avatar-lime, .avatar-green, .avatar-cyan").css({
        "background-color": "none",
        "color": "#ddd"
    });
    $("#case7").hide();
    $("#status1, #status2, #status4, #status5, #status6, #status7").hide();
} else if ($("#trans_status").val() == 4) {
    $("#line4, #line5").css({
        "background-color": "#ddd"
    });
    $(".avatar-green, .avatar-cyan").css({
        "background-color": "none",
        "color": "#ddd"
    });
    $("#case7").hide();
    $("#status1, #status2, #status3, #status5, #status6, #status7").hide();
} else if ($("#trans_status").val() == 5) {
    $("#line5").css({
        "background-color": "#ddd"
    });
    $(".avatar-cyan").css({
        "background-color": "none",
        "color": "#ddd"
    });
    $("#case7").hide();
    $("#status1, #status2, #status3, #status4, #status6, #status7").hide();
} else if ($("#trans_status").val() == 6) {
    $("#case7").hide();
    $("#status1, #status2, #status3, #status4, #status5, #status7").hide();
} else if ($("#trans_status").val() == 7) {
    $("#line1, #line2, #line3, #line4, #line5, #case1, #case2, #case3, #case4, #case5, #case6").hide();
    $("#status1, #status2, #status3, #status4, #status5, #status6").hide();
}
</script>
@endsection
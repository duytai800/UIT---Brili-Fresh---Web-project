<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="{{asset('public/client/assets/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/assets/css/main.css')}}">

    <link rel="stylesheet" href="{{asset('public/client/MyAccountAssets/ManageOrder/ManageOrder.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/MyAccountAssets/ManageOrder/ChiTietDonHang.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/asset/fonts/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/asset/base.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/homeheadermain.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/HomeFooter.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/MyAccountAssets/MyAccount/MyAccountMain.css')}}" />
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- Begin header -->
    @yield('home_header')
    <!-- End header -->
    <!-- Begin content -->
    <div class="container">
        <div class="row">
            <section class="directory mt-3">
                <nav class="navbar navbar-expand-xl navbar-light ">
                    <div class="container-fluid">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="#">Quản lý đơn hàng</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
                            </ol>
                        </nav>
                    </div>
                </nav>
            </section>

            @yield('sub_nav_my_account')

            <!-- End SlideBar -->
            @foreach($order_detail as $key => $order_detail)
            <div class="col-12 col-xl-9 container-right">
                <div class="right-content"></div>
                <div class="heading-right">Chi tiết đơn hàng</div>

                <div class="transfer-info">
                    <p>Đơn hàng <span id="order-id">{{$order_detail->OrderID}}</span></p>
                    <p>Đặt ngày <span id="order-date">{{$order_detail->OrderDate}}</span></p>
                    <p>Kiện hàng của bạn giao vào ngày <span id="shipping-date">{{$order_detail->ShippingDate}}</span></p>
                </div>

                <div class="sucess-order order-info mt-3">
                    <div class="header-order">
                        <span></span>
                        @if ($order_detail->Status == 1)

                        <span><i class="ti-truck"></i> Đang xử lý</span>

                        @elseif ($order_detail->Status == 2)

                        <span><i class="ti-truck"></i> Đang chuẩn bị hàng</span>

                        @elseif ($order_detail->Status == 3)

                        <span><i class="ti-truck"></i> Đang đóng gói</span>

                        @elseif ($order_detail->Status == 4)

                        <span><i class="ti-truck"></i> Đã giao cho đơn vị vận chuyển</span>

                        @elseif ($order_detail->Status == 5)

                        <span><i class="ti-truck"></i> Đang vận chuyển</span>

                        @elseif ($order_detail->Status == 6)

                        <span><i class="ti-truck"></i> Đã giao</span>

                        @else

                        <span><i class="ti-truck"></i> Đã hủy</span>

                        @endif
                    </div>

                    @foreach($order_detail_product as $key => $product_detail)

                    <div style="margin-top:10px"><i class="ti-home"></i> {{$product_detail->Source}}</div>
                    <div class="content-order">
                        <div class="img-product"><img src="{{URL::to('../public/upload/product/'. $product_detail->ImgData)}}" alt=""></div>

                        <div class="product-info">
                            <p class="name">{{$product_detail->ProName}}</p>
                            <p style="color: #757575;">Đơn vị: <span class="mass">{{$product_detail->Unit}}</span></p>
                        </div>
                        <div class="purchase-info unit-price">Đơn giá: <span>{{number_format($product_detail->price_detail)}} đ</span></div>
                        <div class="purchase-info quantity">Số lượng: <span>{{number_format($product_detail->quantity)}} </span></div>
                        <div class="purchase-info amount">Thành tiền: <span>{{number_format($product_detail->price_detail * $product_detail->quantity)}} đ</span></div>
                    </div>
                    @endforeach
                    <p>Tạm tính: <b><span class="total-order">{{number_format($order_detail->SubTotal)}} đ</span></b></p>
                </div>

                <!-- End -->
                <div class="the-end">
                    <div class="the-end__first">
                        <div class="heading-column-end">Địa chỉ nhận hàng</div>

                        <p id="address-order">{{$order_detail->SpecificAddress}}, {{$order_detail->Ward}}, {{$order_detail->District}}, {{$order_detail->City}}</p>

                    </div>
                    <div class="the-end__second">
                        <div class="heading-column-end">Tổng cộng</div>
                        <div class="info-payment">
                            <span>Tổng tiền hàng</span>
                            <span>{{number_format($order_detail->SubTotal)}} đ</span>
                        </div>

                        <div class="info-payment">
                            <span>Phí vận chuyển</span>
                            <span>{{number_format($order_detail->Fee)}} đ</span>
                        </div>

                        <div class="info-payment">
                            <span>Voucher tích lũy</span>
                            <span>{{number_format($order_detail->OrderTotal - $order_detail->SubTotal - $order_detail->Fee)}} đ</span>
                        </div>

                        <hr>
                        <div class="info-payment">
                            <span>Tổng số tiền</span>
                            <span>{{number_format($order_detail->OrderTotal)}} đ</span>
                        </div>

                        <div class="info-payment">
                            <span>Phương thức thanh toán</span>
                            @if ($order_detail->PayBy==1)
                            <span>Tiền mặt</span>
                            @elseif ($order_detail->PayBy==21)
                            <span>Ví Momo</span>
                            @elseif ($order_detail->PayBy==22)
                            <span>VNPAY</span>
                            @elseif ($order_detail->PayBy==23)
                            <span>ZaloPay</span>
                            @elseif ($order_detail->PayBy==24)
                            <span>VinID</span>
                            @elseif ($order_detail->PayBy==25)
                            <span>Ví Moca</span>
                            @elseif ($order_detail->PayBy==3)
                            <span>Thẻ quốc tế</span>
                            @else ($order_detail->PayBy==4)
                            <span>Internet banking</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @yield('home_footer')
    <script src="{{asset('public/client/DanhGiaSanPham.js')}}"></script>
    <script>
        $(document).ready(function() {
            $(".location_item_child_link").click(function() {
                console.log("thanh phuong")
                var id_selecting = $(".direction-detail").data("storeid")
                var id_selected = $(this).data("storeid")
                console.log(id_selected)

                $(".direction-detail").data("storeid", id_selected)
                $(this).data("storeid", id_selecting)

                $(".list_location").addClass("display_list_location")
                var text_is_selecting = $(".direction-detail").text()
                var text_slected = $(this).text()
                $(".direction-detail").text(text_slected)
                $(this).text(text_is_selecting)

                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{route('change_store')}}",
                    method: 'POST',
                    data: {
                        store_id: id_selected,
                        _token: _token
                    },
                    success: function(data) {
                        alert(data);
                    }

                });
            });

            $(".change-location-store").click(function() {
                console.log("thanh phuong")
                $(".list_location").removeClass("display_list_location")
            });
        });
    </script>
</body>

</html>
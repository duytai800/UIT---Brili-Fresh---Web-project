<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>


    <link href="{{asset('public/client/adminassets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/asset/fonts/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/asset/base.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/homeheadermain.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/HomeFooter.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/MyAccountAssets/MyAccount/MyAccountMain.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17egcferpgzkcm0j0feq1ycjuyawdz9kutv1ejvuaoz8pdnh/0nzxmu6bbxwaaxqoi9pqxnrwqlcdb027hgv9a==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yhknp1/awr+yx26cb1y0cjvqumvea2pfzt1c9lls4prq5notzfwbhbig+x9g9eyw/8m0/4oxnx8pxj6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="{{asset('public/client/MyAccountAssets/ManageOrder/ManageOrder.css')}}" />
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
                                <li class="breadcrumb-item active" id="ManageOrder" aria-current="page">Quản lý đơn hàng</li>
                            </ol>
                        </nav>
                    </div>
                </nav>
            </section>

            @yield('sub_nav_my_account')
            <!-- End SlideBar -->

            <div class="col-12 col-xl-9 container-right">
                <div class="heading-right">Quản lý đơn hàng</div>
                <div class="right-content">
                    <div id="subnav">
                        <ul class="subnav-order">
                            <li><a class="active" id="all" href="#">Tất cả đơn</a></li>
                            <li><a href="#" class="tab">Chờ thanh toán</a></li>
                            <li><a href="#" class="tab">Đã thanh toán</a></li>
                        </ul>
                    </div>

                    <div id="order-search">
                        <i class="ti-search"></i>
                        <input type="search" id="search-ord-input" placeholder="Tìm đơn hàng theo Mã đơn hàng, Nhà cung cấp hoặc Tên sản phẩm">
                        <input type="submit" id="search-ord-btn" value="Tìm đơn hàng">
                    </div>

                    @foreach ($customer_order as $key => $order)
                    <div class="processing-order order-info mt-3">
                        <div class="header-order">
                            <span>Mã đơn hàng: {{$order->OrderID}}</span>
                            <span>Thời gian đặt hàng: {{date("d/m/Y H:i:s", strtotime($order->OrderDate))}}</span>
                            @if ($order->Status == 1)
                            <span><i class="ti-timer"></i> Đã thanh toán</span>
                            @else
                            <span><i class="ti-timer"></i> Chờ thanh toán</span>
                            @endif
                        </div>


                        @foreach ($customer_order_detail as $key => $order_detail)
                        @if ($order_detail->OrderID==$order->OrderID)
                        <div style="margin-top:10px"><i class="ti-home"></i> {{$order_detail->Source}}</div>
                        <div class="content-order">
                            <div class="img-product"><img src="{{URL::to('../public/upload/product/'. $order_detail->ImgData)}}" alt=""></div>
                            <div class="product-info">
                                <p class="name">{{$order_detail->ProName}}</p>
                                <p style="color: #757575;"> Đơn vị: <span class="mass">{{$order_detail->Unit}}</span></p>
                            </div>
                            <div class="purchase-info unit-price">Đơn giá: <span>{{number_format($order_detail->price_detail)}} đ</span></div>
                            <div class="purchase-info quantity">Số lượng: <span>{{$order_detail->Quantity}}</span></div>
                            <div class="purchase-info amount">Thành tiền: <span>{{number_format($order_detail->Quantity * $order_detail->price_detail)}} đ</span></div>
                        </div>
                        @endif
                        @endforeach

                        <p>Tổng tiền: <b><span class="total-order">{{number_format($order->OrderTotal)}} đ</span></b></p>

                        <div class="footer-order">
                            <a class="btn-shared order-info-btn" href="{{URL::to('/account-info/order-detail/'. $order->OrderID )}}">Xem chi tiết</a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- End content -->
    @yield('home_footer')
    <script type="text/javascript" src="{{asset('public/client/MyAccountAssets/MyAccount/SubNavSide.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#search-ord-btn").on("click", function() {
                var value = $("#search-ord-input").val().toLowerCase();
                $(".processing-order").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $(".tab").on("click", function() {
                var value = $(this).text().toLowerCase();
                $(".processing-order").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $("#all").on("click", function() {
                var value = "";
                $(".processing-order").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
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
                        id_selected: id_selected,
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
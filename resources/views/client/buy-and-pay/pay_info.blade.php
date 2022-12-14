@{
Layout = null;
}
<html lang="en">

<head>
    <title>Thanh toán & Đặt hàng</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo.png">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17egcferpgzkcm0j0feq1ycjuyawdz9kutv1ejvuaoz8pdnh/0nzxmu6bbxwaaxqoi9pqxnrwqlcdb027hgv9a==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yhknp1/awr+yx26cb1y0cjvqumvea2pfzt1c9lls4prq5notzfwbhbig+x9g9eyw/8m0/4oxnx8pxj6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/asset/fonts/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/homeheadermain.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/HomeFooter.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/BuyAndPayAssets/PayInfo/PayInfo.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <form class="thanhtoanform">
        <!-- Header no login -->
        <div class="header">
            <header class="header">
                <nav class="header__navbar">
                    <div></div>
                    <div class=" d-flex align-items-center" style="height: 64px; width: inherit;justify-content: space-evenly;">
                        <img src="{{asset('public/client/HomeAssets/asset/image/logo.png')}}" alt="" class="header__navbar-logo" />
                        <h2 class="header__navbar-tittle"><span style="color: #118129; font-weight: 600;">Brili</span><span style="color: #14df41; font-weight: 600;">Fresh</span></h2>
                        <div class="location_container">
                            <div class="direction ms-3 me-3 d-flex">
                                <i class="ti-location-pin" style="font-size:20px !important;padding-right: 8px;padding-bottom: 16px;"></i>
                                <p class="direction-detail" style="margin-top: 5px;">Chọn cửa hàng: 17 Trần Khắc Chân... <a href="" class="">Thay đổi</a> </p>
                            </div>
                        </div>
                        <ul class="header__navbar-list">
                            <li class="header__navbar-item"><a href="#">Trang chủ</a></li>
                            <li class="header__navbar-item"><a href="#">Giới thiệu</a></li>
                            <li class="header__navbar-item">
                                <a href="#">Sản phẩm</a>
                                <ti class="arrow-list-item ti-angle-down"></ti>
                                <div class="row sub-nav">
                                    <ul class="nav-list-type-item">
                                        <li class="type-item"><a href="{{URL::to('/fish-and-meat')}}" style="color: gray !important;">Thịt cá</a></li>
                                        <li class="type-item"><a href="{{URL::to('/fruit')}}" style="color: gray !important;">Trái cây 4 mùa</a></li>
                                        <li class="type-item"><a href="{{URL::to('/vegetable')}}" style="color: gray !important;">Rau củ</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="header__navbar-item"><a href="#">Liên hệ</a></li>
                        </ul>
                        <ul class="header__navbar-list " style="margin-right: -52px;">
                            <li class="header__navbar-register">Đăng ký /</li>
                            <li class="header__navbar-login"> <a href="{{URL::to('/login')}}">Đăng nhập</a></li>
                        </ul>
                        <div class="line">
                        </div>
                        <a href="{{URL::to('/cart-info-check')}}">
                            <div class="header__cart " style="margin-left: -32px;">

                                <i class="ti-shopping-cart"></i>
                                <div class="header__cart-number">
                                    <p class="number-item">
                                        9
                                    </p>
                                </div>

                            </div>
                        </a>
                    </div>
                    <div style="width: 20px;"></div>
                </nav>
            </header>
        </div>
        <!-- Header no login -->

        <div class="content">
            <div class="content__title">
                <h3 class="content__headline">
                    <center>THANH TOÁN & ĐẶT HÀNG</center>
                </h3>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div id="left-column">
                            <div class="content__delivery">
                                <span><b>Chọn hình thức giao hàng</b></span>
                                <br>
                                <label id="delivery-method1" class="content__delivery-method">
                                    <input type="radio" class="content__delivery-method-button" name="delivery-method" id="delivery-method-button1" value="1" checked="checked">
                                    <label for="delivery-method-button1" class="content__delivery-method-name">Giao hàng tiết kiệm</label>
                                </label>
                                <label id="delivery-method2" class="content__delivery-method">
                                    <input type="radio" class="content__delivery-method-button" name="delivery-method" id="delivery-method-button2" value="2">
                                    <label for="delivery-method-button2" class="content__delivery-method-name">Giao hàng hỏa tốc</label>
                                </label>
                            </div>

                            <fieldset class="content__delivery-detail">
                                <legend id="deliveryLegend">
                                    <img id="deliveryIcon" src="./assets/icons/delivery.png">
                                    <label id="deliveryTime">Gói: Giao vào Thứ 3, 12/11</label>
                                </legend>

                                <div class="content__deliveryDetail">
                                    <b><label id="deliveryName">GIAO HÀNG TIẾT KIỆM</label></b>
                                    <div>
                                        <span id="deliveryFee">
                                            14,000 đ
                                        </span>
                                        <br>
                                        <span id="deliveryInfo">
                                            Được giao bởi BriliNOW Smart Logistics (giao từ Hồ Chí Minh)
                                        </span>
                                    </div>
                                </div>
                                <div class="content__deliveryDetail" id="products">
                                    <b><label id="deliveryName">CHI TIẾT ĐƠN HÀNG</label></b>
                                </div>
                            </fieldset>
                            <br>
                            <div class="content__payment">
                                <span><b>Chọn hình thức thanh toán</b></span>
                                <br>
                                <div class="content__payment-methods">
                                    <label class="content__payment-method">
                                        <input type="radio" name="payment-method" id="payment-method-button1" checked="checked">
                                        <img src="./assets/icons/tienmat.png">
                                        <label for="payment-method-button1" class="content__payment-name">Thanh toán tiền mặt khi nhận hàng</label>
                                    </label>
                                    <br>
                                    <label class="content__payment-method">
                                        <input type="radio" name="payment-method" id="payment-method-button2">
                                        <img src="./assets/icons/vidientu.png">
                                        <label for="payment-method-button2" class="content__payment-name">Thanh toán bằng ví điện tử</label>
                                        <br>
                                        <label id="E-wallet-message">Vui lòng chọn ví điện tử!</label>
                                        <div class="content__E-wallets">
                                            <label class="content__E-wallet">
                                                <input type="radio" class="content__E-wallet-button" name="E-wallet" id="E-wallet-button1">
                                                <img class="content__E-wallet-image" src="./assets/icons/ViMoMo.png">
                                                <label class="content__E-wallet-name" for="E-wallet-button1">Ví MoMo</label>
                                            </label>
                                            <label class="content__E-wallet">
                                                <input type="radio" class="content__E-wallet-button"" name=" E-wallet" id="E-wallet-button2">
                                                <img class="content__E-wallet-image" src="./assets/icons/VNPAY.png">
                                                <label class="content__E-wallet-name" for="E-wallet-button2">VNPAY</label>
                                            </label>
                                            <label class="content__E-wallet">
                                                <input type="radio" class="content__E-wallet-button" name="E-wallet" id="E-wallet-button3">
                                                <img class="content__E-wallet-image" src="./assets/icons/ZaloPay.png">
                                                <label class="content__E-wallet-name" for="E-wallet-button3">ZaloPay</label>
                                            </label>
                                            <label class="content__E-wallet">
                                                <input type="radio" class="content__E-wallet-button" name="E-wallet" id="E-wallet-button4">
                                                <img class="content__E-wallet-image" src="./assets/icons/VinID.png">
                                                <label class="content__E-wallet-name" for="E-wallet-button4">VinID</label>
                                            </label>
                                            <label class="content__E-wallet">
                                                <input type="radio" class="content__E-wallet-button" name="E-wallet" id="E-wallet-button5">
                                                <img class="content__E-wallet-image" src="./assets/icons/ViMoca.png">
                                                <label class="content__E-wallet-name" for="E-wallet-button5">Ví Moca</label>
                                            </label>

                                        </div>
                                    </label>
                                    <br>
                                    <label class="content__payment-method">
                                        <input type="radio" name="payment-method" id="payment-method-button3">
                                        <img src="./assets/icons/thequocte.png">
                                        <label for="payment-method-button3" class="content__payment-name">Thanh toán bằng thẻ quốc tế Visa, Master, JCB</label>
                                    </label>
                                    <br>
                                    <label class="content__payment-method">
                                        <input type="radio" name="payment-method" id="payment-method-button4">
                                        <img src="./assets/icons/theatm.png">
                                        <label for="payment-method-button4" class="content__payment-name">Thẻ ATM nội địa/Internet Banking (Hỗ trợ Internet Banking)</label>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div id="right-column">
                            <div class="content__frame">
                                <div class="content__description">
                                    <div>
                                        <a href="#" onclick="goBack()">Thay đổi</a>
                                    </div>
                                    <div><b>Giao tới</b></div>
                                    <b><span id="fullname"></span></b>
                                    <span>|</span>
                                    <b><span id="phonenum"></span></b>
                                    <div id="address">
                                        <span id="specificAddress"></span>
                                        <span id="specificAddress-comma">, </span>
                                        <span id="ward"></span>
                                        <span>, </span>
                                        <span id="district"></span>
                                        <span>, </span>
                                        <span id="city"></span>
                                        <span>, Việt Nam.</span>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <div class="content__frame">
                                <div class="content__description">
                                    <lable class="content__invoice-request">
                                        <input type="checkbox" id="invoice-request-checkbox">
                                        <label for="invoice-request-checkbox" id="invoice-request-name">Yêu cầu hóa đơn</label>
                                    </lable>

                                </div>
                            </div>
                            <br>
                            <div class="content__frame">
                                <div class="content__description">
                                    <div>
                                        <a href="./GioHang.html">Thay đổi</a>
                                    </div>
                                    <div><b>Đơn hàng</b></div>
                                    <div>
                                        <span class="content__attitude" id="numPro"></span>
                                        <button id="detail-button" type="button">Xem thông tin</button>
                                    </div>
                                    <hr class="content__line">
                                    <div>
                                        <span class="content__attitude">Tạm tính</span>
                                        <span class="content__value" id="subtotal"></span>
                                    </div>
                                    <br>
                                    <div>
                                        <span class="content__attitude">Phí vận chuyển</span>
                                        <span class="content__value" id="transort-fee">14000</span>
                                    </div>
                                    <br>
                                    <div>
                                        <span class="content__attitude">Giảm giá</span>
                                        <span class="content__value" id="discount"></span>
                                    </div>
                                    <br>
                                    <hr class="content__line">
                                    <table>
                                        <tr>
                                            <td>
                                                <span id="total-tittle">Tổng tiền</span>
                                            </td>
                                            <td id="total"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <span class="content__value" id="vat">(Đã bao gồm VAT nếu có)</span>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <div class="content__submit">
                                        <input type="submit" value="Đặt hàng" id="order-button">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="content__info">
                <span>Bằng việc tiến hành Đặt Mua, khách hàng đồng ý với các Điều Kiện Giao Dịch Chung được ban hành bởi BriliFresh:</span>
                <br>
                <span>Quy chế hoạt động | Chính sách giải quyết khiếu nại | Chính sách bảo hành | Chính sách bảo mật thanh toán | Chính sách bảo mật thông tin cá nhân</span>
                <br>
                <span>© 2019 - Bản quyền của Công Ty Cổ Phần BriliFresh - BriliFresh.vn</span>
            </div>
        </div>
        <!-- Footer -->
        <section class="footer mt-5 ">
            <div class="container-fluid container-footer">
                <div class="row brand-footer mt-2">
                    <!-- Footer -->
                    <div class="logo-name-footer me-1 my-lg-2">
                        <a class="navbar-brand" href="#">
                            <img id="logo" src="#" class="position-start"></img>
                            <span class="firstName-footer p-1">Brili<span class="lastName-footer">Fresh</span></span>
                        </a>
                    </div>
                    <!-- Section: Social media -->
                    <!-- Left -->
                    <!-- Section: Social media -->
                    <!-- Section: Links  -->
                    <section class="info-footer p-0">
                        <div class="container text-center text-md-start mt-0 p-0" style="background-color: #58b63a;">
                            <!-- Grid row -->
                            <div class="d-flex mt-3 mb-0" style="    align-items: center; text-align: initial;">
                                <!-- Grid column -->
                                <div class=" col-lg-3 col-xl-3 mx-auto mb-md-0 font-16 mt-4">
                                    <!-- Links -->

                                    <p><i class="fas fa-home me-3"></i> 319 C16 Lý Thường Kiệt, Phường 15, Quận 11, Tp.HCM</p>
                                    <p><i class="fas fa-phone me-3"></i> 1900 343 756</p>
                                    <p>
                                        <i class="fas fa-envelope me-3"></i>
                                        brilifresh@gmail.com
                                        thucphamsach@brili.media
                                    </p>
                                    <a href="" class="me-4 text-reset text-decoration-none css_text">
                                        <p>
                                            <i class="fab fa-facebook-f me-2"></i>
                                            facebook.com/brilifresh
                                        </p>
                                    </a>

                                </div>


                                <!-- Grid column -->
                                <!-- Grid column -->
                                <div class=" col-lg-2 col-xl-2 mx-auto mb-0 title-footer ms-5 ">
                                    <!-- Links -->
                                    <h6 class="text-uppercase fw-bold mb-4 font-24">
                                        Sản phẩm
                                    </h6>
                                    <p>
                                        <a href="#!" class="css_text a2 text-reset text-decoration-none font-16">Rau củ</a>
                                    </p>
                                    <p>
                                        <a href="#!" class="css_text a2 text-reset text-decoration-none font-16">Hải sản</a>
                                    </p>
                                    <p>
                                        <a href="#!" class="css_text a2 text-reset text-decoration-none font-16">Trái cây</a>
                                    </p>
                                    <p>
                                        <a href="#!" class="css_text a2 text-reset text-decoration-none font-16">Thịt trứng</a>
                                    </p>
                                </div>
                                <!-- Grid column -->
                                <!-- Grid column -->
                                <div class=" col-lg-2 col-xl-2 mx-auto mb-0 title-footer">
                                    <!-- Links -->
                                    <h6 class="text-uppercase fw-bold mb-4 font-24">
                                        Danh mục
                                    </h6>
                                    <p>
                                        <a href="#!" class="css_text a2 text-reset text-decoration-none  font-16">Trang chủ</a>
                                    </p>
                                    <p>
                                        <a href="#!" class="css_text a2 text-reset text-decoration-none  font-16">Giới thiệu</a>
                                    </p>
                                    <p>
                                        <a href="#!" class="css_text a2 text-reset text-decoration-none  font-16">Sản phẩm</a>
                                    </p>
                                    <p>
                                        <a href="#!" class="css_text a2 text-reset text-decoration-none  font-16">Kiến thức</a>
                                    </p>
                                </div>
                                <div class=" col-lg-4 col-xl-4 mx-auto mb-0 title-footer">
                                    <!-- Links -->
                                    <h6 class="text-uppercase fw-bold mb-4 font-24">
                                        Kết nối với chúng tôi
                                    </h6>
                                    <p>
                                        <a href="#!" class="a2 css_text text-reset text-decoration-none  font-16">
                                            <i class="fab fa-facebook-f me-4"></i>Kết nối qua Facebook
                                        </a>
                                    </p>
                                    <p>
                                        <a href="#!" class="a2 css_text text-reset text-decoration-none  font-16">
                                            <i class="fab fa-instagram me-3"></i>
                                            Kết nối qua Instagram
                                        </a>
                                    </p>
                                    <p>
                                        <a href="#!" class="a2 css_text text-reset text-decoration-none  font-16">
                                            <i class="fab fa-tiktok me-4"></i>
                                            Kết nối qua Tiktok
                                        </a>
                                    </p>

                                </div>

                                <!-- Grid column -->
                                <!-- Grid column -->
                                <!-- Grid column -->
                            </div>
                            <!-- Grid row -->
                        </div>
                    </section>


                    <!-- Footer -->
                </div>
            </div>
        </section>
        <!-- Footer -->
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script type="text/javascript" src="{{asset('public/client/BuyAndPayAssets/PayInfo/PayInfo.js')}}"></script>
</body>

</html>
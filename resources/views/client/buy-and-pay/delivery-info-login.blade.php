@{
Layout = null;
}
<html lang="en">

<head>
    <title>Thông tin nhận hàng</title>
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
    <link rel="stylesheet" href="{{asset('public/client/BuyAndPayAssets/delivery/deliveryInfoLogin.css')}}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <form action="" method="GET" class="thongtinnhanhangform">
        <!-- Header  login -->
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
                    <center>THÔNG TIN NHẬN HÀNG</center>
                </h3>
            </div>

            <div class="content__description">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" id="availableAddress"><b>Chọn địa chỉ có sẵn</b></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="content__address-list">
                            <span class="content__fullname">Đặng Minh Tuấn</span>
                            <span class="content__default"></span>
                            <br>
                            <span>Địa chỉ: </span><span class="content__address">
                                <span class="content__specificAddress">Tòa S3.05 Vinhomes Grand Park</span>
                                <span class="content__specificAddress-comma">, </span>
                                <span class="content__ward">Phường Long Thạnh Mỹ</span>
                                <span>, </span>
                                <span class="content__district">Quận 9</span>
                                <span>, </span>
                                <span class="content__city">Thành phố Hồ Chí Minh</span>
                                <span>, Việt Nam.</span>
                            </span>
                            <br>
                            <span>Điện thoại: </span><span class="content__phonenum">0949385911</span>
                            <br><br>
                            <div class="content__address-option">
                                <label class="content__address-change">
                                    <input type="radio" class="content__address-change-button" name="addressButton" id="addressButton1" checked>
                                    <label for="addressButton1" class="content__address-change-name">Giao đến địa chỉ này</label>
                                </label>
                                <button type="button" id="addressEditButton1" class="content__address-edit-button">
                                    <img src="./assets/icons/Edit.png">
                                    Sửa
                                </button>
                                <button type="button" class="content__address-remove-button">
                                    <img src="./assets/icons/Remove.png">
                                    Xóa
                                </button>
                            </div>
                        </div>
                        <div class="content__address-list">
                            <span class="content__fullname">Tuấn</span>
                            <span class="content__default"></span>
                            <br>
                            <span>Địa chỉ: </span><span class="content__address">
                                <span class="content__specificAddress">253 Hùng Vương</span>
                                <span class="content__specificAddress-comma">, </span>
                                <span class="content__ward">Phường An Mỹ</span>
                                <span>, </span>
                                <span class="content__district">Thành phố Tam Kỳ</span>
                                <span>, </span>
                                <span class="content__city">Tỉnh Quảng Nam</span>
                                <span>, Việt Nam.</span>
                            </span>

                            <br>
                            <span>Điện thoại: </span><span class="content__phonenum">0949385911</span>
                            <br><br>
                            <div class="content__address-option">
                                <label class="content__address-change">
                                    <input type="radio" class="content__address-change-button" name="addressButton" id="addressButton2">
                                    <label for="addressButton2" class="content__address-change-name">Giao đến địa chỉ này</label>
                                </label>
                                <button type="button" id="addressEditButton2" class="content__address-edit-button">
                                    <img src="./assets/icons/Edit.png">
                                    Sửa
                                </button>
                                <button type="button" class="content__address-default-button">
                                    <img src="./assets/icons/Default.png">
                                    Mặc định
                                </button>
                                <button type="button" class="content__address-remove-button">
                                    <img src="./assets/icons/Remove.png">
                                    Xóa
                                </button>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <table id="addresstableEdit" align="center">
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Họ tên</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <input id="fullnameEdit" type="text">
                                    <br>
                                    <label class="content__message" id="fullname-message-edit">Vui lòng nhập họ tên!</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Điện thoại di động</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <input id="phonenumEdit" type="text">
                                    <br>
                                    <label class="content__message" id="phonenum-message-edit">Vui lòng nhập số điện thoại!</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Tỉnh/Thành phố</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <select id="cityEdit">
                                        <option value="" selected>Chọn Tỉnh/Thành phố</option>
                                    </select>
                                    <br>
                                    <label class="content__message" id="city-message-edit">Vui lòng chọn Tỉnh/Thành phố!</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Quận/Huyện</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <select id="districtEdit">
                                        <option value="" selected>Chọn Quận/Huyện</option>
                                    </select>
                                    <br>
                                    <label class="content__message" id="district-message-edit">Vui lòng chọn Quận/Huyện!</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Phường/Xã</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <select id="wardEdit">
                                        <option value="" selected>Chọn Phường/Xã</option>
                                    </select>
                                    <br>
                                    <label class="content__message" id="ward-message-edit">Vui lòng chọn Phường/Xã!</label>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Địa chỉ</b></td>
                                <td><textarea id="specificAddressEdit" placeholder="Số nhà/Tên tòa/Tên đường/..."></textarea></td>
                            </tr>

                            <tr>
                                <td colspan="2" align="center"><input type="button" id="saveButton" value="Lưu"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" id="addAddress"><b>Thêm địa chỉ khác</b></button>
                        </div>
                    </div>
                    <div class="row">
                        <table id="addresstable" align="center">
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Họ tên</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <input id="fullname" type="text">
                                    <br>
                                    <label class="content__message" id="fullname-message">Vui lòng nhập họ tên!</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Điện thoại di động</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <input id="phonenum" type="text">
                                    <br>
                                    <label class="content__message" id="phonenum-message">Vui lòng nhập số điện thoại!</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Tỉnh/Thành phố</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <select id="city">
                                        <option value="" selected>Chọn Tỉnh/Thành phố</option>
                                    </select>
                                    <br>
                                    <label class="content__message" id="city-message">Vui lòng chọn Tỉnh/Thành phố!</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Quận/Huyện</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <select id="district">
                                        <option value="" selected>Chọn Quận/Huyện</option>
                                    </select>
                                    <br>
                                    <label class="content__message" id="district-message">Vui lòng chọn Quận/Huyện!</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Phường/Xã</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <select id="ward">
                                        <option value="" selected>Chọn Phường/Xã</option>
                                    </select>
                                    <br>
                                    <label class="content__message" id="ward-message">Vui lòng chọn Phường/Xã!</label>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Địa chỉ</b></td>
                                <td><textarea id="specificAddress" placeholder="Số nhà/Tên tòa/Tên đường/..."></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label>
                                        <input type="checkbox" id="setDefault">
                                        <label for="setDefault" id="setDefault-title">Đặt làm địa chỉ mặc định.</label>
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>


            <div class="content__continue">
                <input class="content__continue-button" type="submit" value="Tiếp tục">
            </div>

            <div class="content__info">
                <div id="space">
                    <br><br><br><br><br>
                </div>
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
    <script type="text/javascript" src="{{asset('public/client/BuyAndPayAssets/delivery/deliveryInfoLogin.js')}}"></script>
</body>

</html>
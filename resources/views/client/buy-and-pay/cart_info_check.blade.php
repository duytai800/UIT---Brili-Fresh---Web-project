<html lang="en">

<head>
    <title>Giỏ hàng</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo.png">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/asset/fonts/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/homeheadermain.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/HomeFooter.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/BuyAndPayAssets/CartInfoCheck/CartInfoCheck.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <form action="{{URL::to('/cart-info/')}}" method="post" class="giohangform">
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

        <!-- Content -->
        <div class="content">
            <div class="content__title">
                <h3 class="content__headline">
                    <center>GIỎ HÀNG</center>
                </h3>
            </div>

            <div class="content__description">
                <div class="content__header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1">
                                <input type="checkbox" class="content__select-all">
                            </div>
                            <div class="col-md-4">
                                <span style="margin-left: 20px"><b>Tất cả (<span id="numPro"></span> sản phẩm)</b></span>
                            </div>
                            <div class="col-md-2">Đơn giá</div>
                            <div class="col-md-2">Số lượng</div>
                            <div class="col-md-2">Thành tiền</div>
                            <div class="col-md-1">
                                <button type="button" class="content__remove-all">
                                    <img src="./assets/icons/trash.png" class="content__remove-img"></img>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content__empty">
                    <span class="content__empty-message" align="center">Không có sản phẩm nào trong giỏ.</span>
                </div>

                <div class="content__data">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-1">
                                <input type="checkbox" class="content__select">
                            </div>
                            <div class="col-md-4">
                                <div class="content__pro-info">
                                    <img class="content__pro-image" src="./assets/images/baroi500g.jpg"></img>
                                    <span class="content__pro-name">Ba rọi heo (Nhập khẩu) - 500g</span>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <span class="content__unit-price">80000</span>
                            </div>
                            <div class="col-md-2">
                                <div class="content__quantity-info">
                                    <span class="content__minus">-</span>
                                    <input class="content__quantity" type="text" value="1" />
                                    <span class="content__plus">+</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="content__amount"></span>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="content__remove">
                                    <img src="./assets/icons/trash.png" class="content__remove-img"></img>
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-1">
                                <input type="checkbox" class="content__select">
                            </div>
                            <div class="col-md-4">
                                <div class="content__pro-info">
                                    <img class="content__pro-image" src="./assets/images/DuahauruotdoLongAn-1kg.jpg"></img>
                                    <span class="content__pro-name">Dưa hấu ruột đỏ Long An - 1kg</span>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <span class="content__unit-price">38000</span>
                            </div>
                            <div class="col-md-2">
                                <div class="content__quantity-info">
                                    <span class="content__minus">-</span>
                                    <input class="content__quantity" type="text" value="1" />
                                    <span class="content__plus">+</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="content__amount"></span>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="content__remove">
                                    <img src="/assets/icons/trash.png" class="content__remove-img"></img>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="content__message">
                <label class="content__error-message">Vui lòng chọn sản phẩm!</label>
            </div>

            <div class="content__order">
                <input class="content__order-button" type="submit" value="TIẾN HÀNH ĐẶT HÀNG">
            </div>
        </div>
        <!-- Content -->

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
    <script type="text/javascript" src="{{asset('public/client/BuyAndPayAssets/CartInfoCheck/CartInfoCheck.js')}}"></script>
</body>

</html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('public/client/OverviewProductAssets/List/List_Base.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/OverviewProductAssets/Vegetable/List_Main_Vegetable.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/OverviewProductAssets/Vegetable/Vegetable_Header.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('public/client/OverviewProductAssets/asset/fonts/themify-icons/themify-icons.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</head>

<body>
    <!-- Header  login -->
    <section class="header scaled-header mx-lg-1 mx-sm-auto">
        <nav class="navbar navbar-expand-xl navbar-light">
            <div class="container-fluid mx-sm-auto">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="logo-name ms-auto my-lg-2">
                        <a class="navbar-brand" href="#">
                            <img id="logo" src="{{asset('public/client/OverviewProductAssets/images/newlogo.png')}}" class="position-start"></img>
                            <span class="firstName p-1">Brili<span class="lastName">Fresh</span></span>
                        </a>
                    </div>

                    <form class="d-flex align-item-center justify-content-center ms-auto header-form me-auto" style="margin: 0;">

                        <button class="btnHome inline-block" type="button">
                            <!-- <img id="home" src="~/OverviewProductAssets/images/Homebutton.png" class="imgHome me-auto mx-sm-auto"></img> -->
                        </button>
                        <div class="direction ms-3 me-3 d-flex">
                            <i class="fa-sharp fa-solid fa-location-dot ms-2"></i>
                            <p class="direction-detail mt-3 ms-3">Chọn cửa hàng: 17 Trần Khắc Chân... <a href="" class="">Thay đổi</a> </p>
                        </div>

                        <div class="search-container">
                            <input class="form-control ms-0 search-input" type="search" placeholder="Tìm kiếm thực phẩm" aria-label="Search">
                            </input>
                        </div>
                        <div class="search-button">
                            <button name="search" id="search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>

                    </form>
                    <div class="navbar-nav me-auto mb-lg-0 align-item-center p-1 nav-right">
                        <div class="nav-item col-11 mt-1 d-flex justify-content-between align-item-center">
                            <li class="header__navbar-name nav-link active">Võ Thanh Phương</li>
                            <li class="header__navbar-avt nav-link active"><img src="./imagess/all_product.png" alt="" id="avartar_user"></li>
                        </div>
                        <!-- <div class="vr mt-2"></div> -->
                        <div class="mt-2 " style="border-left:1px solid #8F8C8C;height:25px"></div>
                        <div class="d-flex nav-item mt-2 ms-3 align-item-center justify-content-center" style="margin-top: 0px !important;">
                            <div class="i_cart_shoping">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                        </div>
                        <div class="nav-item">
                            <div class="nav-item count_product align-item-right ms-2 mt-2">
                                <p class="bought_product pe-1">0</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </nav>
    </section>
    <!-- Header  login -->

    <!-- Content -->
    <div class="main container">
        <div class="header container"></div>
        <div class="container">
            <div class="sliderr">
                <img src="{{asset('public/client/OverviewProductAssets/images/slider3.png')}}" alt="" class="slider-img" />
            </div>
            <div class="location-bar" style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Sản phẩm</a></li>
                    <li class="breadcrumb-item"><a href="">Rau củ</a></li>
                    <li class="breadcrumb-item"><a href="">Rau lá</a></li>
                </ol>
            </div>
            <div class="products-content">
                <div class="row" style="width: 105%">
                    <div class="filter-products col-3">
                        <div class="filter-heading">
                            <p class="filter-heading-item">Danh mục sản phẩm</p>
                        </div>
                        <div class="filter-heading-icon">
                            <ti class="ti-angle-down ti-angle-down-icon"> </ti>
                        </div>
                        <div class="filter-heading-line"></div>
                        <div class="filter-heading-check">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="" />
                                <label class="form-check-label" for="flexCheckDefault"> Deal sốc </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="" checked />
                                <label class="form-check-label" for="flexCheckChecked"> Thịt mới về </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="" />
                                <label class="form-check-label" for="flexCheckDefault"> Sản phẩm của Brili </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="" checked />
                                <label class="form-check-label" for="flexCheckChecked"> Hàng nhập khẩu </label>
                            </div>
                        </div>
                        <div class="filter-heading-price">
                            <div class="filter-heading">
                                <p class="filter-heading-item">Giá</p>
                            </div>
                            <div class="filter-heading-icon-2">
                                <ti class="ti-angle-down ti-angle-down-icon"> </ti>
                            </div>

                            <div class="filter-heading-line"></div>
                            <div class="wrapper">
                                <div class="slider">
                                    <div class="progress"></div>
                                </div>
                                <div class="range-input">
                                    <input type="range" class="range-min" min="0" max="500000" value="110000" step="10000" />
                                    <input type="range" class="range-max" min="0" max="500000" value="390000" step="10000" />
                                </div>
                            </div>
                            <div class="price-input">
                                <div class="field">
                                    <input type="currency" class="input-min" value="110.000" disabled />
                                </div>
                                <div class="field">
                                    <input type="currency" class="input-max" value="390.000" disabled />
                                </div>
                            </div>
                            <div class="filter-info-price">
                                <p class="info-price">Giá: 0 - 500.000 VNĐ</p>
                            </div>
                        </div>
                        <div class="filter-check-price">
                            <div class="filter-info-price-check">
                                <p class="info-price-check">Sắp xếp theo</p>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="check-price" value="" id="" />
                                <label class="form-check-label" for="flexCheckDefault"> Giá tăng dần </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="check-price" value="" id="" checked />
                                <label class="form-check-label" for="flexCheckChecked"> Giá giảm dần </label>
                            </div>
                        </div>
                    </div>

                    <div class="list-products col-9 row d-flex">
                        <div class="product-item col-3">
                            <div class="product-item-img">
                                <a class="nav-link" href="{{URL::to('/vegetables/vegetables/detail-vegetables')}}">
                                    <img src="{{asset('public/client/ImageProduct/is_avth2s1v4qc.png')}}" alt="" class="product-item-img-child" />
                                </a>
                            </div>
                            <div class="product-item-tittle">
                                <p class="product-item-tittle-child">Thăn lưng bò mỹ (200g)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="product-item-price">
                                    <p class="product-item-price-child">99,000</p>
                                </div>
                                <div class="product-item-add">
                                    <button class="product-item-add-btn">+</button>
                                </div>
                            </div>
                            <div class="d-flex ">
                                <div class="product-item-price-dis">
                                    <p class="product-item-price-dis-child">199,000</p>
                                </div>
                                <div class="dis-rate">
                                    <p class="dis-rate-child">-20%</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-item col-3">
                            <div class="product-item-img">
                                <img src="~/ImageProduct/kiwi1.png" alt="" class="product-item-img-child" />
                            </div>
                            <div class="product-item-tittle">
                                <p class="product-item-tittle-child">Thăn lưng bò mỹ (200g)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="product-item-price">
                                    <p class="product-item-price-child">99,000</p>
                                </div>
                                <div class="product-item-add">
                                    <button class="product-item-add-btn">+</button>
                                </div>
                            </div>
                            <div class="d-flex ">
                                <div class="product-item-price-dis">
                                    <p class="product-item-price-dis-child">199,000</p>
                                </div>
                                <div class="dis-rate">
                                    <p class="dis-rate-child">-20%</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-item col-3">
                            <div class="product-item-img">
                                <img src="~/ImageProduct/kiwi1.png" alt="" class="product-item-img-child" />
                            </div>
                            <div class="product-item-tittle">
                                <p class="product-item-tittle-child">Thăn lưng bò mỹ (200g)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="product-item-price">
                                    <p class="product-item-price-child">99,000</p>
                                </div>
                                <div class="product-item-add">
                                    <button class="product-item-add-btn">+</button>
                                </div>
                            </div>
                            <div class="d-flex ">
                                <div class="product-item-price-dis">
                                    <p class="product-item-price-dis-child">199,000</p>
                                </div>
                                <div class="dis-rate">
                                    <p class="dis-rate-child">-20%</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-item col-3">
                            <div class="product-item-img">
                                <img src="~/ImageProduct/kiwi1.png" alt="" class="product-item-img-child" />
                            </div>
                            <div class="product-item-tittle">
                                <p class="product-item-tittle-child">Thăn lưng bò mỹ (200g)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="product-item-price">
                                    <p class="product-item-price-child">99,000</p>
                                </div>
                                <div class="product-item-add">
                                    <button class="product-item-add-btn">+</button>
                                </div>
                            </div>
                            <div class="d-flex ">
                                <div class="product-item-price-dis">
                                    <p class="product-item-price-dis-child">199,000</p>
                                </div>
                                <div class="dis-rate">
                                    <p class="dis-rate-child">-20%</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-item col-3">
                            <div class="product-item-img">
                                <img src="~/ImageProduct/kiwi1.png" alt="" class="product-item-img-child" />
                            </div>
                            <div class="product-item-tittle">
                                <p class="product-item-tittle-child">Thăn lưng bò mỹ (200g)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="product-item-price">
                                    <p class="product-item-price-child">99,000</p>
                                </div>
                                <div class="product-item-add">
                                    <button class="product-item-add-btn">+</button>
                                </div>
                            </div>
                            <div class="d-flex ">
                                <div class="product-item-price-dis">
                                    <p class="product-item-price-dis-child">199,000</p>
                                </div>
                                <div class="dis-rate">
                                    <p class="dis-rate-child">-20%</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-item col-3">
                            <div class="product-item-img">
                                <img src="~/ImageProduct/kiwi1.png" alt="" class="product-item-img-child" />
                            </div>
                            <div class="product-item-tittle">
                                <p class="product-item-tittle-child">Thăn lưng bò mỹ (200g)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="product-item-price">
                                    <p class="product-item-price-child">99,000</p>
                                </div>
                                <div class="product-item-add">
                                    <button class="product-item-add-btn">+</button>
                                </div>
                            </div>
                            <div class="d-flex ">
                                <div class="product-item-price-dis">
                                    <p class="product-item-price-dis-child">199,000</p>
                                </div>
                                <div class="dis-rate">
                                    <p class="dis-rate-child">-20%</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-item col-3">
                            <div class="product-item-img">
                                <img src="~/ImageProduct/kiwi1.png" alt="" class="product-item-img-child" />
                            </div>
                            <div class="product-item-tittle">
                                <p class="product-item-tittle-child">Thăn lưng bò mỹ (200g)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="product-item-price">
                                    <p class="product-item-price-child">99,000</p>
                                </div>
                                <div class="product-item-add">
                                    <button class="product-item-add-btn">+</button>
                                </div>
                            </div>
                            <div class="d-flex ">
                                <div class="product-item-price-dis">
                                    <p class="product-item-price-dis-child">199,000</p>
                                </div>
                                <div class="dis-rate">
                                    <p class="dis-rate-child">-20%</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-item col-3">
                            <div class="product-item-img">
                                <img src="~/ImageProduct/kiwi1.png" alt="" class="product-item-img-child" />
                            </div>
                            <div class="product-item-tittle">
                                <p class="product-item-tittle-child">Thăn lưng bò mỹ (200g)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="product-item-price">
                                    <p class="product-item-price-child">99,000</p>
                                </div>
                                <div class="product-item-add">
                                    <button class="product-item-add-btn">+</button>
                                </div>
                            </div>
                            <div class="d-flex ">
                                <div class="product-item-price-dis">
                                    <p class="product-item-price-dis-child">199,000</p>
                                </div>
                                <div class="dis-rate">
                                    <p class="dis-rate-child">-20%</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-item col-3">
                            <div class="product-item-img">
                                <img src="~/ImageProduct/kiwi1.png" alt="" class="product-item-img-child" />
                            </div>
                            <div class="product-item-tittle">
                                <p class="product-item-tittle-child">Thăn lưng bò mỹ (200g)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="product-item-price">
                                    <p class="product-item-price-child">99,000</p>
                                </div>
                                <div class="product-item-add">
                                    <button class="product-item-add-btn">+</button>
                                </div>
                            </div>
                            <div class="d-flex ">
                                <div class="product-item-price-dis">
                                    <p class="product-item-price-dis-child">199,000</p>
                                </div>
                                <div class="dis-rate">
                                    <p class="dis-rate-child">-20%</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-item col-3">
                            <div class="product-item-img">
                                <img src="~/ImageProduct/kiwi1.png" alt="" class="product-item-img-child" />
                            </div>
                            <div class="product-item-tittle">
                                <p class="product-item-tittle-child">Thăn lưng bò mỹ (200g)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="product-item-price">
                                    <p class="product-item-price-child">99,000</p>
                                </div>
                                <div class="product-item-add">
                                    <button class="product-item-add-btn">+</button>
                                </div>
                            </div>
                            <div class="d-flex ">
                                <div class="product-item-price-dis">
                                    <p class="product-item-price-dis-child">199,000</p>
                                </div>
                                <div class="dis-rate">
                                    <p class="dis-rate-child">-20%</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-item col-3">
                            <div class="product-item-img">
                                <img src="~/ImageProduct/kiwi1.png" alt="" class="product-item-img-child" />
                            </div>
                            <div class="product-item-tittle">
                                <p class="product-item-tittle-child">Thăn lưng bò mỹ (200g)</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="product-item-price">
                                    <p class="product-item-price-child">99,000</p>
                                </div>
                                <div class="product-item-add">
                                    <button class="product-item-add-btn">+</button>
                                </div>
                            </div>
                            <div class="d-flex ">
                                <div class="product-item-price-dis">
                                    <p class="product-item-price-dis-child">199,000</p>
                                </div>
                                <div class="dis-rate">
                                    <p class="dis-rate-child">-20%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="products-pagination d-flex justify-content-end">
                        <div class="pagination">
                            <a href="#">&laquo;</a>
                            <a href="#">1</a>
                            <a href="#" class="active">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                            <a href="#">...</a>
                            <a href="#">&raquo;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->

    <!-- Foooter-->
    <section class="footer mt-5 ">
        <div class="container-fluid container-footer">
            <div class="row brand-footer mt-2">
                <!-- Footer -->
                <div class="logo-name-footer me-1 my-lg-2">
                    <a class="navbar-brand" href="#">
                        <img id="logo" src="./asset/image/d2bt_ofot_150607 10.png" class="position-start"></img>
                        <span class="firstName-footer p-1">Brili<span class="lastName-footer">Fresh</span></span>
                    </a>
                </div>
                <!-- Section: Social media -->
                <!-- Left -->
                <!-- Section: Social media -->
                <!-- Section: Links  -->
                <section class="info-footer p-0">
                    <div class="container text-center text-md-start mt-0 p-0">
                        <!-- Grid row -->
                        <div class="d-flex mt-3 mb-0">
                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 font-16 mt-4">
                                <!-- Links -->

                                <p><i class="fas fa-home me-3"></i> 319 C16 Lý Thường Kiệt, Phường 15, Quận 11, Tp.HCM</p>
                                <p><i class="fas fa-phone me-3"></i> 1900 343 756</p>
                                <p>
                                    <i class="fas fa-envelope me-3"></i>
                                    brilifresh@gmail.com
                                    thucphamsach@brili.media
                                </p>
                                <a href="" class="me-4 text-reset text-decoration-none">
                                    <p>
                                        <i class="fab fa-facebook-f me-2"></i>
                                        facebook.com/brilifresh
                                    </p>
                                </a>

                            </div>


                            <!-- Grid column -->
                            <!-- Grid column -->
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-0 title-footer ms-5 ">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4 font-24">
                                    Sản phẩm
                                </h6>
                                <p>
                                    <a href="#!" class="text-reset text-decoration-none font-16">Rau củ</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset text-decoration-none font-16">Hải sản</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset text-decoration-none font-16">Trái cây</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset text-decoration-none font-16">Thịt trứng</a>
                                </p>
                            </div>
                            <!-- Grid column -->
                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-0 title-footer">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4 font-24">
                                    Danh mục
                                </h6>
                                <p>
                                    <a href="#!" class="text-reset text-decoration-none  font-16">Trang chủ</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset text-decoration-none  font-16">Giới thiệu</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset text-decoration-none  font-16">Sản phẩm</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset text-decoration-none  font-16">Kiến thức</a>
                                </p>
                            </div>
                            <div class="col-md-3 col-lg-4 col-xl-4 mx-auto mb-0 title-footer">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4 font-24">
                                    Kết nối với chúng tôi
                                </h6>
                                <p>
                                    <a href="#!" class="text-reset text-decoration-none  font-16">
                                        <i class="fab fa-facebook-f me-4"></i>Kết nối qua Facebook
                                    </a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset text-decoration-none  font-16">
                                        <i class="fab fa-instagram me-3"></i>
                                        Kết nối qua Instagram
                                    </a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset text-decoration-none  font-16">
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
    <!-- Foooter-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{asset('public/client/OverviewProductAssets/List/List.js')}}"></script>
</body>

</html>
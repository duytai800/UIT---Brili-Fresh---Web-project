<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('public/client/OverviewProductAssets/Vegetable/Vegetable.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/OverviewProductAssets/Vegetable/Vegetable_Header.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('public/client/OverviewProductAssets/Vegetable/Vegetable.js')}}">
    <script src="https://kit.fontawesome.com/03c302d752.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Header login  -->

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
    <!-- Header login  -->

    <!-- Content -->
    <section class="directory mt-3 scaled-body">
        <nav class="navbar navbar-expand-xl navbar-light ">
            <div class="container-fluid ms-2">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Trái cây 4 mùa</li>
                    </ol>
                </nav>
            </div>
        </nav>
    </section>
    <section class="category mx-auto mx-sm-auto my-auto scaled-body">
        <nav class="navbar navbar-expand-xl navbar-light ">
            <div class="container-fluid justify-content-center ms-5">
                <div class="d-flex justify-content-center mx-auto col-7">
                    <div class="col-3 col-category">
                        <div class="nav-item category-detail align-item-center text-center">
                            <a class="nav-link" href="{{URL::to('/vegetables/vegetables')}}">Rau lá
                            </a>
                            <div class="category-img category-img-kale ">
                            </div>

                        </div>
                    </div>
                    <div class="col-3 col-category mx-auto ">
                        <div class="nav-item category-detail align-item-center text-center">
                            <a class="nav-link" href="#">
                                Củ hạt
                            </a>
                            <div class="category-img category-img-carrot">
                            </div>
                        </div>

                    </div>
                    <div class="col-3 col-category mx-auto ">
                        <div class="nav-item category-detail align-item-center text-center">
                            <a class="nav-link" href="#">
                                Quả trái
                            </a>
                            <div class="category-img category-img-corn">
                            </div>
                        </div>

                    </div>
                    <div class="col-3 col-category mx-auto ">
                        <div class="nav-item category-detail align-item-center text-center">
                            <a class="nav-link" href="#">
                                Rau gia vị
                            </a>
                            <div class="category-img category-img-rosemary">
                            </div>
                        </div>

                    </div>
                    <div class="col-3 col-category mx-auto ">
                        <div class="nav-item category-detail align-item-center text-center">
                            <a class="nav-link" href="#">
                                Nấm
                            </a>
                            <div class="category-img category-img-mushroom">
                            </div>
                        </div>

                    </div>



                </div>
            </div>
        </nav>
        <div class="row d-flex justify-content-center align-item-center mt-5 mx-auto mx-sm-auto">
            <div class="col-6 ms-3">
                <a href="##" class="discount">
                    <div class="p-discount justify-content-center align-item-center">
                        <div class="txt-discount mx-3 d-flex justify-content-center align-item-center w-auto mx-auto p-0">
                            <div class="info-dis ps-5 pb-4">
                                <p class="mt-3 mb-auto">Nông trại BriliFresh</p>
                                <p class="my-auto">RAU CỦ SẠCH BÌNH ỔN GIÁ</p>
                                <div class="per-discount mx-auto mt-2 ">
                                    <p class="txt-per-discount">Giảm giá đến 30%</p>
                                </div>
                            </div>
                            <div class="ads-img ms-auto">
                            </div>
                        </div>

                    </div>
                </a>
            </div>

        </div>
    </section>


    <section class="items-discount scaled-body">
        <div class="container-fluid mt-5 p-0">
            <div class="justify-content-center text-align-center scale-container ">
                <div class=" mx-auto">
                    <div class="items-discount-bar d-flex align-items-center">
                        <p class="items-discount-title col-2 pt-3 ms-3">
                            Giá sốc hôm nay
                        </p>
                        <img src="{{asset('public/client/OverviewProductAssets/images/category/thunder1.png')}}" alt="thunder" class="flash-sale-icon">
                        <div class="col-3 count-down-sale d-flex mx-auto">
                            <div class="hours-countdown cd-bg mx-2">
                                <div class="countdown-num mx-auto">
                                    06
                                </div>
                            </div>
                            <div class="count-down-sale-split">:</div>
                            <div class="minute-countdown cd-bg mx-2">
                                <div class="countdown-num mx-auto ">
                                    06
                                </div>
                            </div>
                            <div class="count-down-sale-split">:</div>
                            <div class="second-countdown cd-bg mx-2">
                                <div class="countdown-num mx-auto ">
                                    06
                                </div>
                            </div>
                        </div>
                        <div class="more-items text-center align-item-center me-3">
                            <a href="#" class="p-more-item">Xem thêm <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="items-container mt-5 ">
            <div class="list-products col-12 row d-flex" style="justify-content: space-evenly; margin: 0px;">
                <div class="product-item col-2">
                    <div class="product-item-img">
                        <img src="~/OverviewProductAssets/images/items/bongcai.png" alt="" class="product-item-img-child" />
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
                <div class="product-item col-2">
                    <div class="product-item-img">
                        <img src="~/OverviewProductAssets/images/items/bongcai.png" alt="" class="product-item-img-child" />
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
                <div class="product-item col-2">
                    <div class="product-item-img">
                        <img src="~/OverviewProductAssets/images/items/bongcai.png" alt="" class="product-item-img-child" />
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
                <div class="product-item col-2">
                    <div class="product-item-img">
                        <img src="~/OverviewProductAssets/images/items/bongcai.png" alt="" class="product-item-img-child" />
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
                <div class="product-item col-2">
                    <div class="product-item-img">
                        <img src="~/OverviewProductAssets/images/items/bongcai.png" alt="" class="product-item-img-child" />
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
        </div>
    </section>
    <section class="items-recommended scaled-body">
        <div class="container-fluid mt-5 p-0">
            <div class="row justify-content-center text-align-center scale-container">
                <div class=" mx-auto">
                    <div class="items-recommended-bar d-flex align-items-center">
                        <p class="items-discount-title col-2 pt-3 ms-3">
                            Gợi ý cho bạn
                        </p>

                        <div class="more-items text-center align-item-center me-3">
                            <a href="#" class="p-more-item">Xem thêm <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="items-container mt-5 ">
            <div class="list-products col-12 row d-flex" style="justify-content: space-evenly; margin: 0px;">
                <div class="product-item col-2">
                    <div class="product-item-img">
                        <img src="~/OverviewProductAssets/images/items/bongcai.png" alt="" class="product-item-img-child" />
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
                <div class="product-item col-2">
                    <div class="product-item-img">
                        <img src="~/OverviewProductAssets/images/items/bongcai.png" alt="" class="product-item-img-child" />
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
                <div class="product-item col-2">
                    <div class="product-item-img">
                        <img src="~/OverviewProductAssets/images/items/bongcai.png" alt="" class="product-item-img-child" />
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
                <div class="product-item col-2">
                    <div class="product-item-img">
                        <img src="~/OverviewProductAssets/images/items/bongcai.png" alt="" class="product-item-img-child" />
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
                <div class="product-item col-2">
                    <div class="product-item-img">
                        <img src="~/OverviewProductAssets/images/items/bongcai.png" alt="" class="product-item-img-child" />
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
        </div>
    </section>
    <section class="items-today scaled-body">
        <div class="container-fluid mt-5 p-0">
            <div class="row justify-content-center text-align-center scale-container">
                <div class="">
                    <div class="items-today-bar d-flex align-items-center">
                        <p class="items-discount-title col-2 pt-3 ms-3">
                            Hôm nay ăn gì ?
                        </p>
                        <div class="more-items text-center align-item-center me-3">
                            <a href="#" class="p-more-item">Xem thêm <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="items-container mt-5 ">
            <div class="list-products col-12 row d-flex" style="justify-content: space-evenly; margin: 0px;">
                <div class="product-item col-2">
                    <div class="product-item-img">
                        <img src="~/OverviewProductAssets/images/items/bongcai.png" alt="" class="product-item-img-child" />
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
                <div class="product-item col-2">
                    <div class="product-item-img">
                        <img src="~/OverviewProductAssets/images/items/bongcai.png" alt="" class="product-item-img-child" />
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
                <div class="product-item col-2">
                    <div class="product-item-img">
                        <img src="~/OverviewProductAssets/images/items/bongcai.png" alt="" class="product-item-img-child" />
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
                <div class="product-item col-2">
                    <div class="product-item-img">
                        <img src="~/OverviewProductAssets/images/items/bongcai.png" alt="" class="product-item-img-child" />
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
                <div class="product-item col-2">
                    <div class="product-item-img">
                        <img src="~/OverviewProductAssets/images/items/bongcai.png" alt="" class="product-item-img-child" />
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
        </div>
    </section>
    <!-- Content -->

    <!-- Footer -->
    <section class="footer mt-5 ">
        <div class="container-fluid">
            <div class="row brand-footer mt-2">
                <!-- Footer -->
                <div class="logo-name-footer me-1 my-lg-2">
                    <a class="navbar-brand" href="#">
                        <img id="logo" src="~/OverviewProductAssets/images/newlogo.png" class="position-start"></img>
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
                        <div class="d-flex mt-4 mb-0">
                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 font-16">
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
                <!-- Section: Links  -->
                <!-- Copyright -->
                <!-- <div class="text-center p-4" >
                © 2021 Copyright:
                <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                </div> -->
                <!-- Copyright -->
                <!-- Footer -->
            </div>
        </div>
    </section>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{asset('public/client/OverviewProductAssets/Vegetable/Vegetable.js')}}"></script>
</body>

</html>
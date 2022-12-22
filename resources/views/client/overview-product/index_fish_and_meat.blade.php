<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('public/client/OverviewProductAssets/FishAndMeat/FishAndMeat.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/OverviewProductAssets/FishAndMeat/FishAndMeat_Header.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('public/client/OverviewProductAssets/FishAndMeat/FishAndMeat.js')}}">
    <script src="https://kit.fontawesome.com/03c302d752.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Header no login -->
    @yield('fish_and_meat_header')
    <!-- Header no login -->

    <!-- Content -->
    <section class="directory mt-3 scaled-body">
        <nav class="navbar navbar-expand-xl navbar-light ">
            <div class="container-fluid ms-2">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thịt cá</li>
                    </ol>
                </nav>
            </div>
        </nav>
    </section>
    <section class="category mx-auto mx-sm-auto my-auto scaled-body">
        <nav class="navbar navbar-expand-xl navbar-light ">
            <div class="container-fluid justify-content-center">
                <div class="d-flex justify-content-center mx-auto col-6">
                    <div class="col-3 col-category">
                        <div class="nav-item category-detail align-item-center text-center">
                            <a class="nav-link" href="#">Thịt heo
                            </a>
                            <div class="category-img category-img-pig ">
                            </div>

                        </div>
                    </div>
                    <div class="col-3 col-category mx-auto ">
                        <div class="nav-item category-detail align-item-center text-center">
                            <a class="nav-link" href="{{URL::to('/fish-and-meat/beef-goat')}}">Bò dê
                            </a>
                            <div class="category-img category-img-cow">
                            </div>
                        </div>

                    </div>
                    <div class="col-3 col-category mx-auto ">
                        <div class="nav-item category-detail align-item-center text-center">
                            <a class="nav-link" href="#">Gà vịt
                            </a>
                            <div class="category-img category-img-chicken">
                            </div>
                        </div>

                    </div>
                    <div class="col-3 col-category mx-auto ">
                        <div class="nav-item category-detail align-item-center text-center">
                            <a class="nav-link" href="#">Trứng
                            </a>
                            <div class="category-img category-img-egg">
                            </div>
                        </div>

                    </div>
                    <div class="col-3 col-category mx-auto text-center">
                        <div class="nav-item category-detail align-item-center text-center">
                            <a class="nav-link" href="#">
                                Hải sản
                            </a>
                            <div class="category-img category-img-fish">
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
                                <p class="mt-3 mb-auto">15h-17h</p>
                                <p class="my-auto">SET NGUYÊN LIỆU LẨU THÁI</p>
                                <div class="per-discount mx-auto mt-2 ">
                                    <p class="txt-per-discount">Giảm giá đến 30%</p>
                                </div>
                            </div>
                            <div class="ads-img">

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
                        <img src="{{asset('public/client/OverviewProductAssets/images/items/bongcai.png')}}" alt="" class="product-item-img-child" />
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
                        <img src="{{asset('public/client/OverviewProductAssets/images/items/bongcai.png')}}" alt="" class="product-item-img-child" />
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
                        <img src="{{asset('public/client/OverviewProductAssets/images/items/bongcai.png')}}" alt="" class="product-item-img-child" />
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
                        <img src="{{asset('public/client/OverviewProductAssets/images/items/bongcai.png')}}" alt="" class="product-item-img-child" />
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
                        <img src="{{asset('public/client/OverviewProductAssets/images/items/bongcai.png')}}" alt="" class="product-item-img-child" />
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
                        <img src="{{asset('public/client/OverviewProductAssets/images/items/bongcai.png')}}" alt="" class="product-item-img-child" />
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
                        <img src="{{asset('public/client/OverviewProductAssets/images/items/bongcai.png')}}" alt="" class="product-item-img-child" />
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
                        <img src="{{asset('public/client/OverviewProductAssets/images/items/bongcai.png')}}" alt="" class="product-item-img-child" />
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
                        <img src="{{asset('public/client/OverviewProductAssets/images/items/bongcai.png')}}" alt="" class="product-item-img-child" />
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
                        <img src="{{asset('public/client/OverviewProductAssets/images/items/bongcai.png')}}" alt="" class="product-item-img-child" />
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
                        <img src="{{asset('public/client/OverviewProductAssets/images/items/bongcai.png')}}" alt="" class="product-item-img-child" />
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
                        <img src="{{asset('public/client/OverviewProductAssets/images/items/bongcai.png')}}" alt="" class="product-item-img-child" />
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
                        <img src="{{asset('public/client/OverviewProductAssets/images/items/bongcai.png')}}" alt="" class="product-item-img-child" />
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
                        <img src="{{asset('public/client/OverviewProductAssets/images/items/bongcai.png')}}" alt="" class="product-item-img-child" />
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
                        <img src="{{asset('public/client/OverviewProductAssets/images/items/bongcai.png')}}" alt="" class="product-item-img-child" />
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
    @yield('home_footer')
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{asset('public/client/OverviewProductAssets/FishAndMeat/FishAndMeat.js')}}"></script>
    <script>
        $(document).ready(function() {
            $(".location_item_child_link").click(function() {
                console.log("thanh phuong")
                var id_selecting = $(".direction-detail").data("storeid")
                var id_selected = $(this).data("storeid")
                console.log (id_selected)

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
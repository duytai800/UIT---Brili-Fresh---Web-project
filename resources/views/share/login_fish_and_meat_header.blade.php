@extends('client.overview-product.index_fish_and_meat')
@section('fish_and_meat_header')
<section class="header scaled-header mx-lg-1 mx-sm-auto my-auto">
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
                    <a href="{{URL::to('/')}}"><button class="btnHome inline-block" type="button">

                            <!-- <img id="home" src="~/OverviewProductAssets/images/Homebutton.png" class="imgHome me-auto mx-sm-auto"></img> -->
                        </button></a>
                    <form>
                        {{ csrf_field() }}
                        <div class="location_container">
                            @foreach ($store_selected as $key => $store_selected)
                            <div class="direction change-location-store ms-3 me-3 d-flex">
                                <i class="ti-location-pin" style="font-size:20px !important;padding-right: 8px;padding-bottom: 16px;"></i>
                                <p class="direction-detail" data-storeid="{{$store_selected->StoreID}}" type="button" style="margin-top: 5px;">{{ $store_selected->SpecificAddress}}, {{$store_selected->Ward}}, {{$store_selected->District}}, {{$store_selected->City}}</p>
                            </div>
                            @endforeach
                            <div class="list_location display_list_location">
                                <div class="location_item">
                                    <ol class="location_item_list">
                                        @foreach ($store as $key => $store)
                                        <li type="button " class="location_item_child"><a class="location_item_child_link" type="button" data-storeid="{{$store->StoreID}}"> {{$store->SpecificAddress}}, {{$store->Ward}}, {{$store->District}}, {{$store->City}}</a></li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </form>
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

                        @foreach ($customer as $key => $customer)
                        <a href="{{URL::to('/account-info')}}" method="get">

                            <li class="header__navbar-name nav-link active">{{$customer->LastName}} {{$customer->FirstName}}</li>
                            <li class="header__navbar-avt nav-link active"><img src="{{asset('/public/client/avatar/'. $customer->Avatar )}}" alt="" id="avartar_user"></li>
                        </a>

                        @endforeach

                    </div>

                    <!-- <div class="vr mt-2"></div> -->
                    <div class="mt-2 " style="border-left:1px solid #8F8C8C;height:25px"></div>
                    <div class="d-flex nav-item mt-2 ms-3 align-item-center justify-content-center" style="margin-top: 0px !important;">
                        <div class="i_cart_shoping">
                            <a href="{{URL::to('/show-cart')}}" method="post">

                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>

                        </div>
                    </div>

                    <!-- <div class="nav-item">
                        <div class="nav-item count_product align-item-right ms-2 mt-2">
                            <p class="bought_product pe-1">0</p>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
    </nav>
</section>
@endsection
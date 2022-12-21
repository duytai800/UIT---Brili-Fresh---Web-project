@extends('welcome')
@section('home_header')
<header class="header">
    <nav class="header__navbar">
        <div></div>
        <div class=" d-flex align-items-center" style="height: 64px; width: inherit;justify-content: space-evenly;">
            <img src="{{asset('public/client/HomeAssets/asset/image/logo.png')}}" alt="" class="header__navbar-logo" />
            <h2 class="header__navbar-tittle"><span style="color: #118129; font-weight: 600;">Brili</span><span style="color: #14df41; font-weight: 600;">Fresh</span></h2>
            <div class="location_container">
 
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
                            <li class="type-item"><a href="{{URL::to('/vegetable')}}" style="color: gray !important;">Rau củ</a> </li>
                        </ul>
                    </div>
                </li>
                <li class="header__navbar-item"><a href="#">Liên hệ</a></li>
            </ul>
            <ul class="header__navbar-list " style="margin-right: -52px;">
                <a href="{{URL::to('/account-info')}}" method="get">

                    @foreach ($customer as $key => $customer)
                    <li class="header__navbar-name">{{$customer->LastName}} {{$customer->FirstName}} </li>
                    <li class="header__navbar-avt"><img src="{{asset('/public/client/avatar/'. $customer->Avatar )}}" alt="" id="avartar_user"></li>
                    @endforeach
                </a>
            </ul>
            <div class="line">
            </div>
            <a href="{{URL::to('/show-cart')}}" method="post">
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
@endsection
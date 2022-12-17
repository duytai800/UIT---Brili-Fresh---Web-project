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
        @yield('home_header')
        <!-- Header no login -->

        <!-- Content -->
        <div class="content">
            <div class="content__title">
                <h3 class="content__headline">
                    <center>GIỎ HÀNG</center>
                </h3>
            </div>

            @if(session()->has('delete_cart'))
            <div class="alert alert-success">
                {{ session()->get('delete_cart') }}
            </div>
            @elseif (session ()->has('delete_cart_fail'))
            <div class="alert alert-danger">
                {{ session()->get('delete_cart_fail') }}
            </div>
            @endif
            <div class="content__description">
                <div class="content__header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1">
                                <input type="checkbox" class="content__select-all">
                            </div>
                            <div class="col-md-4">
                                <span style="margin-left: 20px"><b>Tất cả ( <span id="numPro"></span> sản phẩm)</b></span>
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
                        @if (Session::get('cart'))
                        @foreach(Session::get('cart') as $key => $cart)
                        <div class="row">
                            <div class="col-sm-1">
                                <input type="checkbox" class="content__select">
                            </div>
                            <div class="col-md-4">
                                <div class="content__pro-info">
                                    <img class="content__pro-image" src="{{URL::to('../public/upload/product/'.$cart['product_image'])}}"></img>
                                    <span class="content__pro-name">{{$cart['product_name']}} ({{$cart['product_unit']}})</span>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <span class="content__unit-price">{{$cart['product_price']}}</span>
                            </div>
                            <div class="col-md-2">
                                <div class="content__quantity-info">
                                    <span class="content__minus">-</span>
                                    <input class="content__quantity" type="text" name="cart_quantity[{{$cart['session_id']}}]"value="1" />
                                    <span class="content__plus">+</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="content__amount"></span>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="content__remove">
                                    <a  href="{{URL::to('/delete-cart/'.$cart['session_id'])}}" >
                                        <img src="{{asset('./assets/icons/trash.png')}}" class="content__remove-img"></img>
                                    </a>
                                </button>
                            </div>
                        </div>
                        @endforeach
                        @endif
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
        @yield('home_footer')
        <!-- Footer -->


    </form>
    <script type="text/javascript" src="{{asset('public/client/BuyAndPayAssets/CartInfoCheck/CartInfoCheck.js')}}"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>

    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/asset/fonts/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/asset/base.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/homeheadermain.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/HomeFooter.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/MyAccountAssets/MyAccount/MyAccountMain.css')}}" />
    <link href="{{asset('public/client/myaccountassets/changepass/changepass.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17egcferpgzkcm0j0feq1ycjuyawdz9kutv1ejvuaoz8pdnh/0nzxmu6bbxwaaxqoi9pqxnrwqlcdb027hgv9a==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yhknp1/awr+yx26cb1y0cjvqumvea2pfzt1c9lls4prq5notzfwbhbig+x9g9eyw/8m0/4oxnx8pxj6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- Begin header -->
    @yield('home_header')
    <!-- End header -->
    <!-- Begin content -->
    <div class="container">
        <div class="row" id="AccountInfo">
            <section class="directory mt-3">
                <nav class="navbar navbar-expand-xl navbar-light ">
                    <div class="container-fluid">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="#">Thông tin tài khoản</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
                            </ol>
                        </nav>
                    </div>
                </nav>
            </section>

            @yield('sub_nav_my_account')
            <!-- End SlideBar -->

            <div class="col-12 col-xl-9 container-right">
                <div class="heading-right">Đổi mật khẩu</div>
                <form action="{{URL::to('/confirm-change-password')}}" method="post" class="form-change-password">
                    {{ csrf_field() }}

                    <div class="form-header">Đổi mật khẩu</div>
                    <div class="form-body">
                        <div class="input_field">
                            <label for="current-password"> Mật khẩu hiện tại </label>
                            <input name="CurrentPassword" type="password" id="current-password" />
                            <!-- <div><a  style="color:#0d6efd;">Quên mật khẩu?</a></div> -->
                        </div>
                        <div class="input_field">
                            <label for="new-password"> Mật khẩu mới </label>
                            <input name="NewPassword" type="password" id="new-password" />
                        </div>
                        <div class="input_field">
                            <label for="confirm-password"> Xác nhận mật khẩu </label>
                            <input type="password" name="confirm_password" id="confirm-password" />
                        </div>
                    </div>
                    @if(session()->has('delete_cart'))
                    <div class="alert alert-success">
                        {{ session()->get('delete_cart') }}
                    </div>
                    @elseif (session ()->has('error_change_password'))
                    <div class="alert alert-danger">
                        {{ session()->get('error_change_password') }}
                    </div>
                    @endif
                    <div class="form-footer">
                        <input type="submit" value="Xác nhận" id="btn-validate" formmethod="post">
                    </div>
                    <div asp-validation-summary="All" class="text-danger"></div>
                    <!-- <span class="text-danger">@TempData["msg"]</span> -->
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('public/client/lib/jquery/dist/jquery.min.js')}}"></script>
    @yield('home_footer')
    <script type="text/javascript" src="{{asset('public/client/MyAccountAssets/MyAccount/SubNavSide.js')}}"></script>



</body>

</html>
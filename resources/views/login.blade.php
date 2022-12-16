<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{asset('public/client/css/sign-in.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <main>
        <div class="box">

            <div class="inner-box" id="myDIV">

                <div class="forms-wrap">
                    <form action="{{URL::to('/process-role')}}" method="POST" class="sign-in-form">
                        {{csrf_field()}}
                        <div class="heading">
                            <h1 class="title">Xin chào!</h1>
                            <h2 class="sub-title">Đăng nhập để nhận nhiều ưu đãi!</h2>
                        </div>
                        <div class="actual-form">
                            <input name="admin_username" id="name" type="text" minlength="4" class="input-field" autocomplete="off" required placeholder="Nhập tên đăng nhập hoặc số điện thoại" />

                            <input name="admin_pass" id="pass" type="password" minlength="4" class="input-field" autocomplete="off" required placeholder="Mật khẩu" />
                            <br>
                            <?php

                            use Illuminate\Support\Facades\Session;

                            $message = Session::get('fail_message');
                            if ($message) {
                                echo '<span style= "color: red"; text-align: center; font-size: 14px; >' . $message . '</span>';
                                Session::put('fail_message', null);
                            }
                            ?>

                        </div>

                        <div class="btn-box">
                            <input type="submit" class="btn" value="Đăng nhập" />
                        </div>

                        <div class="forgetpass">
                            <h6 class="text">
                                <a href="#">Quên mật khẩu?</a>
                            </h6>
                        </div>

                        <div class="other-signin">
                            <p><span>Hoặc đăng nhập bằng</span></p>
                        </div>

                        <p class="social-text"></p>

                        <div class="social-media">
                            <a href="#" class="social-icon">
                                <i class="fa fa-facebook">&nbsp Facebook </i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fa fa-google">&nbsp Google </i>
                            </a>
                        </div>

                        <div class="dangky">
                            <h6>Bạn chưa có tài khoản?</h6>
                            <a href="#" class="toggle">Đăng ký ngay!</a>
                        </div>
                    </form>
                </div>
                <div class="carousel">
                    <span class="close">&nbsp</span>
                    <div class="images-wrapper">
                        <img src="{{asset('public/client/HomeAssets/Rectangle 47.png')}}" class="img-green" alt="" />
                        <img src="{{asset('public/client/HomeAssets/pngwing 7.png')}}" class="img-vegetables" alt="" />
                        <img src="{{asset('public/client/HomeAssets/BRILI.png')}}" class="img-logo" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
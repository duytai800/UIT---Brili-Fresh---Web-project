<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Đăng ký</title>
    <link rel="stylesheet" href="{{asset('public/client/css/new_signup.css')}}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body style="background: url(/Web-BriliFresh/public/client/HomeAssets/login_background.jpeg) no-repeat center center fixed;background-size: cover;">
    <main>
        <div class="box">
            <div class="inner-box" id="myDIV">
                <div class="forms-wrap">
                    <div class="sign-up-form">
                        <form>
                            {{csrf_field()}}
                            <div class="heading-signup">
                                <h1>Xin chào!</h1>
                                <h2>Đăng ký để nhận nhiều ưu đãi!</h2>
                            </div>

                            <!-- <div style="color:red">@TempData["msg"]</div> -->

                            <div class="actual-signup-form">
                                <div class="actual-signup-form">
                                    <div class="input-wrap-signup">
                                        <input id="LastName" type="text" class="input-field" autocomplete="off" placeholder="Họ">
                                        <div>
                                            <span asp-validation-for="LastName" class="text-danger"></span>
                                        </div>

                                    </div>
                                    <div class="input-wrap-signup">
                                        <!-- <input id="FirstName" id="pass" type="text" class="input-field" autocomplete="off" placeholder="Tên"> -->
                                        <input id="FirstName" type="text" class="input-field" autocomplete="off" placeholder="Tên">
                                        <div>
                                            <span asp-validation-for="FirstName" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="input-wrap-signup">
                                        <select name="gender" id="gender" class="input-field select-gender">
                                            <option selected disabled>Giới tính</option>
                                            <option value="1">Nam</option>
                                            <option value="2">Nữ</option>
                                            <option value="3">Khác</option>
                                        </select>
                                        <div>
                                            <span asp-validation-for="Gender" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="input-wrap-signup">
                                        <!-- <input id="Phone" id="pass" type="tel" minlength="4" class="input-field" autocomplete="off" placeholder="Số điện thoại"> -->
                                        <input id="Phone" type="tel" minlength="4" class="input-field" autocomplete="off" placeholder="Số điện thoại">
                                        <div>
                                            <span asp-validation-for="Phone" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="input-wrap-signup">
                                        <!-- <input id="Email" id="pass" type="email" class="input-field" autocomplete="off" placeholder="Email"> -->
                                        <input id="Email" type="email" class="input-field" autocomplete="off" placeholder="Email">
                                        <div>
                                            <span asp-validation-for="Email" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="input-wrap-signup">
                                        <input id="Username" type="text" class="input-field" autocomplete="off" placeholder="Tên đăng nhập">
                                        <div>
                                            <span asp-validation-for="Username" class="text-danger"></span>
                                        </div>

                                    </div>
                                    <div class="input-wrap-signup">
                                        <!-- <input id="Password" id="pass" type="password" class="input-field" autocomplete="off" placeholder="Mật khẩu"> -->
                                        <input id="Password" type="password" class="input-field" autocomplete="off" placeholder="Mật khẩu">
                                        <div>
                                            <span asp-validation-for="Password" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="input-wrap-signup">
                                        <!-- <input id="PasswordConfirm" id="pass" type="password" class="input-field" autocomplete="off" placeholder="Xác nhận mật khẩu"> -->
                                        <input id="PasswordConfirm" type="password" class="input-field" autocomplete="off" placeholder="Xác nhận mật khẩu">
                                        <div>
                                            <span asp-validation-for="PasswordConfirm" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="create-account-box">
                                        <button type="button" class="create-account-btn" data-id="1">Tạo tài khoản</button>
                                    </div>

                                </div>
                            </div>

                            <div class="sign-in-link">
                                <span> Bạn đã có tài khoản? </span>
                                <a href="{{URL::to('/login')}}">Đăng nhập ngay!</a>
                            </div>
                        </form>
                    </div>

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

    <script type>
        $(document).ready(function() {
            $('.create-account-btn').click(function() {
                //var id = $(this).data('id');
                var test = 1;
                var LastName = $('#LastName').val();
                var FirstName = $('#FirstName').val();
                var Gender = $('#gender').val();
                var Phone = $('#Phone').val();
                var Email = $('#Email').val();
                var Username = $('#Username').val();
                var Password = $('#Password').val();
                var PasswordConfirm = $('#PasswordConfirm').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{route('registration_validation')}}",
                    method: 'POST',
                    data: {
                        test: test,
                        // LastName: LastName,
                        // FirstName: FirstName,
                        // Gender: Gender,
                        // Phone: Phone,
                        // Email: Email,
                        // Username: Username,
                        // Password: Password,
                        // PasswordConfirm: PasswordConfirm,
                        // _token: _token
                    },
                    success: function(data) {
                        alert(data);
                        // swal({
                        //         title: "Đã thêm sản phẩm vào giỏ hàng",
                        //         text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                        //         showCancelButton: true,
                        //         cancelButtonText: "Xem tiếp",
                        //         confirmButtonClass: "btn-success",
                        //         confirmButtonText: "Đi đến giỏ hàng",
                        //         closeOnConfirm: false
                        //     },
                        //     function() {
                        //         window.location.href = "{{url('/show-cart')}}";
                        //     });

                    },
                    error: function(data) {
                        alert("fail");
                    }

                });
            });
        });

        var genderSelect = document.querySelector('.select-gender');
        genderSelect.addEventListener('change', function() {
            genderSelect.classList.add('js-change-color')
        })
    </script>
</body>

</html>
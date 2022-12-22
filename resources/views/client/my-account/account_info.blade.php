<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/asset/fonts/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/asset/base.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/homeheadermain.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/HomeFooter.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/MyAccountAssets/MyAccount/MyAccountMain.css')}}" />

    <link rel="stylesheet" href="{{asset('public/client/MyAccountAssets/MyAccount/AccountInfo.css')}}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17egcferpgzkcm0j0feq1ycjuyawdz9kutv1ejvuaoz8pdnh/0nzxmu6bbxwaaxqoi9pqxnrwqlcdb027hgv9a==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yhknp1/awr+yx26cb1y0cjvqumvea2pfzt1c9lls4prq5notzfwbhbig+x9g9eyw/8m0/4oxnx8pxj6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body>
    @yield('home_header')

    <!-- Begin content -->
    <div class="container">
        <div class="row">
            <section class="directory mt-3">
                <nav class="navbar navbar-expand-xl navbar-light ">
                    <div class="container-fluid">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                                <li class="breadcrumb-item active" id="AccountInfo" aria-current="page">Thông tin tài khoản</li>
                            </ol>
                        </nav>
                    </div>
                </nav>
            </section>

            @yield('sub_nav_my_account')
            <!-- End SlideBar -->

            <div class="col-12 col-xl-9 container-right">
                @foreach ($customer as $key => $customer)

                <div class="heading-right">Thông tin tài khoản</div>
                <form action="{{URL::to('/account-info/confirm-change-info')}}" method="post" name="update-info-cus" class="row form-info-cus" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-12 col-xl-7 container-fluid" style="padding: 24px 0 0 32px; background-color: #fff">
                        <div asp-validation-summary="ModelOnly" class="text-danger"></div>

                        <input type="hidden" asp-for="CusId" />
                        <input type="hidden" asp-for="RewardId" />
                        <input type="hidden" asp-for="UserId" />
                        <input type="hidden" asp-for="Email" />

                        <div class="input_field">
                            <label for="last-name"> Họ </label>
                            <input type="text" name="LastName" value="{{$customer->LastName}}" />
                        </div>
                        <div class="input_field">
                            <label for="first-name"> Tên </label>
                            <input type="text" name="FirstName" value="{{$customer->FirstName}}" />
                        </div>
                        <div class="input_field">
                            <label for="phone"> Số điện thoại </label>
                            <span name="phone">{{$customer->Phone}}</span>
                            <input type="hidden" name="Phone" />
                        </div>
                        <div class="input_field">
                            <label for="email"> Email </label>
                            <!-- <div class="email-data">
                                <span name="email">@Model.Email</span>
                                <a class="change-email-btn">Thay đổi</a>
                            </div> -->
                            <input type="email" name="Email" value="{{$customer->Email}}" />

                        </div>
                        <div class="input_field">
                            <label for="Username"> Giới tính </label>
                            @if ($customer->Gender == 1)

                            <div class="radio-group">
                                <input type="radio" name="gender" value="1" id="male" checked><label for="male">Nam</label>
                                <input type="radio" name="gender" value="2" id="female"><label for="female">Nữ</label>
                                <input type="radio" name="gender" value="3" id="other"><label for="other">Khác</label>
                            </div>

                            @elseif ($customer->Gender == 2)

                            <div class="radio-group">
                                <input type="radio" name="gender" value="1" id="male"><label for="male">Nam</label>
                                <input type="radio" name="gender" value="2" id="female" checked><label for="female">Nữ</label>
                                <input type="radio" name="gender" value="3" id="other"><label for="other">Khác</label>
                            </div>

                            @elseif ($customer->Gender == 3)

                            <div class="radio-group">
                                <input type="radio" name="gender" value="1" id="male"><label for="male">Nam</label>
                                <input type="radio" name="gender" value="2" id="female"><label for="female">Nữ</label>
                                <input type="radio" name="gender" value="3" id="other" checked><label for="other">Khác</label>
                            </div>

                            @endif
                        </div>
                        <div class="input_field">
                            <label for="password"> Mật khẩu </label>
                            <a class="change-pw-btn" href="{{URL::to('/account-info/change-password')}}">Đổi mật khẩu</a>
                        </div>
                        @if(session()->has('succes_change_info'))
                        <div class="alert alert-success">
                            {{ session()->get('succes_change_info') }}
                        </div>
                        @elseif (session ()->has('error_change_password'))
                        <div class="alert alert-danger">
                            {{ session()->get('error_change_password') }}
                        </div>
                        @endif
                        <input id="save-btn" class="btn-shared" name="save-btn" type="submit" value="Lưu" />

                    </div>

                    <div class="avatar-alt col-12 col-xl-5 container-fluid">
                        <div class="avatar-choice">
                            <img id="frame" src="{{asset('/public/client/avatar/'. $customer->Avatar )}}" alt="">
                        </div>
                        <label class="choose-img-btn btn-shared">
                            <span>Chọn ảnh</span>
                            <input type="file" name="Photo" accept="image/gif, image/jpeg, image/png" onchange="preview()">
                        </label>
                    </div>
                </form>
                @endforeach
            </div>

        </div>
    </div>
    @yield('home_footer')
    <script src="{{asset('public/client/lib/jquery/dist/jquery.min.js')}}"></script>
    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }

        function clearImage() {
            document.getElementById('formFile').value = null;
            frame.src = "";
        }
    </script>
    <script>
        $(document).ready(function() {
            $(".location_item_child_link").click(function() {
                console.log("thanh phuong")
                var id_selecting = $(".direction-detail").data("storeid")
                var id_selected = $(this).data("storeid")
                console.log(id_selected)

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
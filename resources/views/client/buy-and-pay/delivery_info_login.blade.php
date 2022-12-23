<html lang="en">

<head>
    <title>Thông tin nhận hàng</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo.png">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17egcferpgzkcm0j0feq1ycjuyawdz9kutv1ejvuaoz8pdnh/0nzxmu6bbxwaaxqoi9pqxnrwqlcdb027hgv9a==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yhknp1/awr+yx26cb1y0cjvqumvea2pfzt1c9lls4prq5notzfwbhbig+x9g9eyw/8m0/4oxnx8pxj6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/asset/fonts/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/homeheadermain.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/HomeFooter.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/BuyAndPayAssets/delivery/deliveryInfoLogin.css')}}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <form action="{{URL::to('/pay-info/')}}" method="get" class="thongtinnhanhangform">
        <!-- Header   -->
        @yield('home_header')
        <!-- Header -->

        <div class="content">
            <div class="content__title">
                <h3 class="content__headline">
                    <center>THÔNG TIN NHẬN HÀNG</center>
                </h3>
            </div>

            <div class="content__description">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" id="availableAddress"><b>Chọn địa chỉ có sẵn</b></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="content__address-list">
                            @foreach ($client_address_default as $key=>$client_address_default)
                            <input type="hidden" value="{{$client_address_default->AddID}}" class="client_address_delivery">

                            <span class="content__fullname">{{$client_address_default->LastName}} {{$client_address_default->FirstName}}</span>
                            <span class="content__default"></span>
                            <br>
                            <span>Địa chỉ: </span><span class="content__address">
                                <span class="content__specificAddress">{{$client_address_default->SpecificAddress}}</span>
                                <span class="content__specificAddress-comma">, </span>
                                <span class="content__ward">{{$client_address_default->Ward}}</span>
                                <span>, </span>
                                <span class="content__district">{{$client_address_default->District}}</span>
                                <span>, </span>
                                <span class="content__city">{{$client_address_default->City}}</span>
                                <span>, Việt Nam.</span>
                            </span>
                            <br>
                            <span>Điện thoại: </span><span class="content__phonenum">{{$client_address_default->Phone}}</span>
                            <br><br>
                            <div class="content__address-option">
                                <label class="content__address-change">
                                    <input type="radio" class="content__address-change-button" name="addressButton" id="addressButton1" checked>
                                    <label for="addressButton1" class="content__address-change-name">Giao đến địa chỉ này</label>
                                </label>
                                <!-- <button type="button" id="addressEditButton1" class="content__address-edit-button">
                                    <img src="{{asset('public/client/assets/icons/Edit.png')}}">
                                    Sửa
                                </button>
                                <button type="button" class="content__address-remove-button">
                                    <img src="{{asset('public/client/assets/icons/Remove.png')}}">
                                    Xóa
                                </button> -->
                            </div>
                            @endforeach
                        </div>
                        @foreach ($client_address as $key=>$client_address)
                        <div class="content__address-list">

                            <span class="content__fullname">{{$client_address->LastName}} {{$client_address->FirstName}}</span>
                            <span class="content__default"></span>
                            <br>
                            <span>Địa chỉ: </span><span class="content__address">
                                <span class="content__specificAddress">{{$client_address->SpecificAddress}}</span>
                                <span class="content__specificAddress-comma">, </span>
                                <span class="content__ward">{{$client_address->Ward}}</span>
                                <span>, </span>
                                <span class="content__district">{{$client_address->District}}</span>
                                <span>, </span>
                                <span class="content__city">{{$client_address->City}}</span>
                                <span>, Việt Nam.</span>
                            </span>

                            <br>
                            <span>Điện thoại: </span><span class="content__phonenum">{{$client_address->Phone}}</span>
                            <br><br>
                            <div class="content__address-option">
                                <!-- <label class="content__address-change">
                                    <input type="radio" class="content__address-change-button" name="addressButton" id="addressButton2">
                                    <label for="addressButton2" class="content__address-change-name">Giao đến địa chỉ này</label>
                                </label> -->
                                <label class="content__address-change">
                                    <input type="radio" class="content__address-change-button" name="addressButton" id="{{$client_address->AddID}}">
                                    <label for="{{$client_address->AddID}}" class="content__address-change-name">Giao đến địa chỉ này</label>
                                </label>
                                <!-- <button type="button" id="addressEditButton2" class="content__address-edit-button">
                                    <img src="{{asset('public/client/assets/icons/Edit.png')}}">
                                    Sửa
                                </button> -->
                                <!-- <button type="button" class="content__address-default-button">
                                    <img src="{{asset('public/client/assets/icons/Default.png')}}">
                                    Mặc định
                                </button>
                                <button type="button" class="content__address-remove-button">
                                    <img src="{{asset('public/client/assets/icons/Remove.png')}}">
                                    Xóa
                                </button> -->
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <table id="addresstableEdit" align="center">
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Họ tên</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <input id="fullnameEdit" type="text">
                                    <br>
                                    <label class="content__message" id="fullname-message-edit">Vui lòng nhập họ tên!</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Điện thoại di động</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <input id="phonenumEdit" type="text">
                                    <br>
                                    <label class="content__message" id="phonenum-message-edit">Vui lòng nhập số điện thoại!</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Tỉnh/Thành phố</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <select id="cityEdit">
                                        <option value="" selected>Chọn Tỉnh/Thành phố</option>
                                    </select>
                                    <br>
                                    <label class="content__message" id="city-message-edit">Vui lòng chọn Tỉnh/Thành phố!</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Quận/Huyện</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <select id="districtEdit">
                                        <option value="" selected>Chọn Quận/Huyện</option>
                                    </select>
                                    <br>
                                    <label class="content__message" id="district-message-edit">Vui lòng chọn Quận/Huyện!</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Phường/Xã</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <select id="wardEdit">
                                        <option value="" selected>Chọn Phường/Xã</option>
                                    </select>
                                    <br>
                                    <label class="content__message" id="ward-message-edit">Vui lòng chọn Phường/Xã!</label>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Địa chỉ</b></td>
                                <td><textarea id="specificAddressEdit" placeholder="Số nhà/Tên tòa/Tên đường/..."></textarea></td>
                            </tr>

                            <tr>
                                <td colspan="2" align="center"><input type="button" id="saveButton" value="Lưu"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" id="addAddress"><b>Thêm địa chỉ khác</b></button>
                        </div>
                    </div>
                    <div class="row">
                        <table id="addresstable" align="center">
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Họ tên</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <input id="fullname" type="text">
                                    <br>
                                    <label class="content__message" id="fullname-message">Vui lòng nhập họ tên!</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Điện thoại di động</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <input id="phonenum" type="text">
                                    <br>
                                    <label class="content__message" id="phonenum-message">Vui lòng nhập số điện thoại!</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Tỉnh/Thành phố</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <select id="city">
                                        <option value="" selected>Chọn Tỉnh/Thành phố</option>
                                    </select>
                                    <br>
                                    <label class="content__message" id="city-message">Vui lòng chọn Tỉnh/Thành phố!</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Quận/Huyện</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <select id="district">
                                        <option value="" selected>Chọn Quận/Huyện</option>
                                    </select>
                                    <br>
                                    <label class="content__message" id="district-message">Vui lòng chọn Quận/Huyện!</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="content__attitude">
                                        <b>Phường/Xã</b>
                                        <span class="content__required">(*)</span>
                                    </span>
                                </td>
                                <td>
                                    <select id="ward">
                                        <option value="" selected>Chọn Phường/Xã</option>
                                    </select>
                                    <br>
                                    <label class="content__message" id="ward-message">Vui lòng chọn Phường/Xã!</label>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Địa chỉ</b></td>
                                <td><textarea id="specificAddress" placeholder="Số nhà/Tên tòa/Tên đường/..."></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label>
                                        <input type="checkbox" id="setDefault">
                                        <label for="setDefault" id="setDefault-title">Đặt làm địa chỉ mặc định.</label>
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>


            <div class="content__continue">
                <a href="{{URL::to('/pay-info')}}" method="get">
                <input class="content__continue-button" type="submit" value="Tiếp tục">
                </a>
            </div>


            <div class="content__info">
                <div id="space">
                    <br><br><br><br><br>
                </div>
                <span>Bằng việc tiến hành Đặt Mua, khách hàng đồng ý với các Điều Kiện Giao Dịch Chung được ban hành bởi BriliFresh:</span>
                <br>
                <span>Quy chế hoạt động | Chính sách giải quyết khiếu nại | Chính sách bảo hành | Chính sách bảo mật thanh toán | Chính sách bảo mật thông tin cá nhân</span>
                <br>
                <span>© 2019 - Bản quyền của Công Ty Cổ Phần BriliFresh - BriliFresh.vn</span>
            </div>
        </div>
        <!-- Footer -->
        @yield('home_footer')
        <!-- Footer -->
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script type="text/javascript" src="{{asset('public/client/BuyAndPayAssets/delivery/deliveryInfoLogin.js')}}"></script>
</body>

</html>
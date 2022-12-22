<html lang="en">

<head>
    <title>Thông tin đơn hàng</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo.png">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17egcferpgzkcm0j0feq1ycjuyawdz9kutv1ejvuaoz8pdnh/0nzxmu6bbxwaaxqoi9pqxnrwqlcdb027hgv9a==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yhknp1/awr+yx26cb1y0cjvqumvea2pfzt1c9lls4prq5notzfwbhbig+x9g9eyw/8m0/4oxnx8pxj6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/asset/fonts/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/homeheadermain.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/HomeFooter.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/BuyAndPayAssets/CartInfo/CartInfo.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    {{ csrf_field() }}
    <!-- Header  -->
    @yield('home_header')
    <!-- Header -->

    <!-- Content -->
    <div class="content">
        <div class="content__title">
            <h3 class="content__headline">
                <center>THÔNG TIN ĐƠN HÀNG</center>
            </h3>
        </div>
        <div class="content__description">
            <div class="content__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-4">
                            <span style="margin-left: 20px"><b>Tất cả (<span id="numPro"></span> sản phẩm)</b></span>
                        </div>
                        <div class="col-md-2">Đơn giá</div>
                        <div class="col-md-2">Số lượng</div>
                        <div class="col-md-2">Thành tiền</div>
                    </div>
                </div>
            </div>
            <div class="content__data">
                <div id="products" class="container">
                </div>

            </div>
        </div>

        <div class="content__sumary">
            <div class="content__coupon">
                <span class="content__coupon-icon"><img id="couponicon" src="{{asset('public/client/assets/icons/coupon.png')}}"></span>
                <!-- <form action="{{URL::to('/check-coupon/')}}" method="get">
                    {{ csrf_field() }} -->
                <input class="content__coupon-text" name="coupon" type="text" placeholder="Nhập mã giảm giá">
                <input class="content__coupon-button" type="submit" value="Áp dụng" disabled>
                <!-- </form> -->
                <span class="content__coupon-message">Mã giảm giá không đúng hoặc đã hết hạn!</span>
            </div>
            <div class="content__cost">
                <div id="costinfo" class="container">
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3">
                            <br>
                            <span class="content__subtotal">Tạm tính</span>
                        </div>
                        <div class="col-md-3">
                            <br>
                            <span class="content__subtotal-value"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3">
                            <span class="content__discount">Giảm giá</span>
                        </div>
                        <div class="col-md-3">
                            <span class="content__discount-value">

                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <hr class="content-line">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <span class="content__total">Tổng tiền</span>
                            <span class="content__total-value"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <span class="content__vat">(Đã bao gồm VAT nếu có)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="content__continue">
        <a href="{{URL::to('/delivery-info')}}" method="get">
            <input class="content__continue-button" type="submit" value="Tiếp tục">
        </a>
    </div>

    <div class="content__info">
        <span>Bằng việc tiến hành Đặt Mua, khách hàng đồng ý với các Điều Kiện Giao Dịch Chung được ban hành bởi BriliFresh:</span>
        <br>
        <span>Quy chế hoạt động | Chính sách giải quyết khiếu nại | Chính sách bảo hành | Chính sách bảo mật thanh toán | Chính sách bảo mật thông tin cá nhân</span>
        <br>
        <span>© 2019 - Bản quyền của Công Ty Cổ Phần BriliFresh - BriliFresh.vn</span>
    </div>
    <!-- Content -->

    <!-- Footer -->
    @yield('home_footer')
    <!-- Footer -->

    <script>
        $(document).ready(function() {
            //Số lượng loại sản phẩm tất cả
            $numPro = sessionStorage.getItem("NUMPRO");
            $("#numPro").html($numPro);

            //Chèn dòng sản phẩm tùy theo số lượng loại sản phẩm đã chọn trước đó
            var $row = `<div class="row">
                            <div class="col-sm-1">
                                <span class="content__pro-no"></span>
                            </div>
                            <div class="col-md-4">
                                <div class="content__pro-info">
                                    <img class="content__pro-image" ></img>
                                    <span class="content__pro-name"></span>
                                </div>
                            </div>
                            <div class="col-md-2"><span class="content__unit-price"></span> </div>
                            <div class="col-md-2"><span class="content__quantity"></span></div>
                            <div class="col-md-2"><span class="content__amount"></span></div>
                        </div>`;
            for (var i = 0; i < $numPro; i++) {
                //Thêm một dòng sản phẩm
                $("#products").append($row);
                //Thứ tự của dòng sản phẩm
                $('.content__pro-no')[i].innerHTML = (i + 1);
            }

            //Lấy danh sách "Ảnh sản phẩm", "Tên sản phẩm", "Đơn giá", "Số lượng", "Thành tiền"
            var a = JSON.parse(sessionStorage.getItem("PROIMAGE"));
            var b = JSON.parse(sessionStorage.getItem("PRONAME"));
            var c = JSON.parse(sessionStorage.getItem("UNITPRICE"));
            var d = JSON.parse(sessionStorage.getItem("QUANTITY"));
            var e = JSON.parse(sessionStorage.getItem("AMOUNT"));
            //Chèn dữ liệu vào từng dòng sản phẩm
            for (var i = 0; i < $(".content__pro-name").length; i++) {
                $(".content__pro-image")[i].src = a[i];
                $(".content__pro-name")[i].innerHTML = b[i];
                $(".content__unit-price")[i].innerHTML = c[i];
                $(".content__quantity")[i].innerHTML = d[i];
                $(".content__amount")[i].innerHTML = e[i];
            }

            //Hiển thị "Tạm tính" và "Tổng tiền"
            var $subtotal = 0;
            var $discount = 0;
            var $total = 0;

            for (var i = 0; i < $(".content__amount").length; i++) {
                var $amount = $(".content__amount")[i].innerHTML;
                //Chuyển "Thành tiền" từ dạng tiền tệ sang dạng số
                $amount = $amount.replace(/\D/g, '');
                $amount = parseFloat($amount);
                $subtotal += $amount;
                $total = $subtotal;
            }
            //Chuyển "Tạm tính" từ dạng số sang dạng tiền tệ
            $(".content__subtotal-value").html(Number($subtotal).toLocaleString('en') + " ₫");
            //"Tổng tiền" bằng "Tạm tính" trong trường hợp không nhập mã giảm giá
            $(".content__total-value").html($(".content__subtotal-value").text());
            //var test = $test;

            //Trường hợp có nhập mã giảm giá
            $(".content__coupon-button").click(function() {
                var list_coupon = <?php echo json_encode($coupon->toArray())  ?>;
                var list_coupon_length = list_coupon.length;
                var index = -1;

                var input_coupon = $(".content__coupon-text").val();
                for (var i = 0; i < list_coupon_length; i++) {
                    if (list_coupon[i]['DisCode'] == input_coupon) {
                        index = i;
                    }
                }
                if (index > -1) {
                    var type_client = <?php echo json_encode($type_client->toArray())  ?>;
                    if (type_client === undefined || type_client.length == 0) {
                        $(".content__coupon-message").show();
                    } else {
                        if (type_client[0]['rewardid'] == list_coupon[index]['CusType']) {
                            var StartDate = list_coupon[index]['StartDate'];
                            var StartDate = new Date(list_coupon[index]['StartDate']);
                            var EndDate = new Date(list_coupon[index]['EndDate']);
                            var nowdate = new Date();
                            if (nowdate > StartDate && nowdate < EndDate) {
                                $(".content__coupon-message").hide();
                                //Bỏ ẩn
                                $(".content__discount").show();
                                $(".content__discount-value").show();
                                var discount_price = list_coupon[index]['DisRate'];

                                $(".content__discount-value").html(list_coupon[index]['DisRate']);
                                var $discountPercent = $(".content__discount-value").text();
                                //Tính số tiền được giảm
                                $discount = $subtotal * $discountPercent;
                                var MaxDis = list_coupon[index]['MaxDis'];
                                if ($discount > MaxDis) {
                                    $discount = MaxDis;
                                }

                                //Tính "Tổng tiền"
                                $total = $subtotal - $discount;
                                //Chuyển "Giảm giá" từ dạng số sang dạng tiền tệ
                                $(".content__discount-value").html("- " + Number($discount).toLocaleString('en') + " ₫");
                                //Chuyển "Tổng tiền" từ dạng số sang dạng tiền tệ
                                $(".content__total-value").html(Number($total).toLocaleString('en') + " ₫");

                                sessionStorage.setItem("DISID", list_coupon[index]['DisID']);
                            } else {
                                $(".content__coupon-message").show();
                            }
                        } else {
                            $(".content__coupon-message").show();
                        }
                    }
                } else {
                    $(".content__coupon-message").show();
                }
            });

            // Giao diện khi có nhập mã khuyến mãi
            $(".content__coupon-text").keyup(function(e) {
                //Phím Enter
                $(window).keydown(function(e) {
                    if (e.keyCode == 13) {
                        e.preventDefault();
                        $(".content__coupon-button").click();
                    }
                });

                if ($(".content__coupon-text").val() == "") {
                    $(".content__coupon-button").css("background-color", "#DBDADA");
                    $(".content__coupon-button").css("color", "#504a4a");
                    $(".content__coupon-button").attr("disabled", true);
                    $(".content__coupon-button").css("cursor", "auto");
                    $(".content__coupon-message").hide();
                } else {
                    $(".content__coupon-button").css("background-color", "#71D30F");
                    $(".content__coupon-button").css("color", "#FFFFFF");
                    $(".content__coupon-button").attr("disabled", false);
                    $(".content__coupon-button").css("cursor", "pointer");
                }
            });

            //Nút Tiếp tục
            $('.content__continue-button').click(function() {
                //Lưu "Tạm tính", "Giảm giá", "Tổng tiền"
                sessionStorage.setItem("SUBTOTAL", $subtotal);
                sessionStorage.setItem("DISCOUNT", $discount);
                sessionStorage.setItem("TOTAL", $total);
            })
        })
    </script>
    <!-- <script type="text/javascript" src="{{asset('public/client/BuyAndPayAssets/CartInfo/CartInfo.js')}}"></script> -->
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
                        id_selected: id_selected,
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
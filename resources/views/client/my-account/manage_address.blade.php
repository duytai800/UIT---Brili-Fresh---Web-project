
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sổ địa chỉ</title>

    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/asset/fonts/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/asset/base.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/homeheadermain.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/HomeAssets/HomeFooter.css')}}" />
    <link rel="stylesheet" href="{{asset('public/client/MyAccountAssets/MyAccount/MyAccountMain.css')}}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17egcferpgzkcm0j0feq1ycjuyawdz9kutv1ejvuaoz8pdnh/0nzxmu6bbxwaaxqoi9pqxnrwqlcdb027hgv9a==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yhknp1/awr+yx26cb1y0cjvqumvea2pfzt1c9lls4prq5notzfwbhbig+x9g9eyw/8m0/4oxnx8pxj6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="{{asset('public/client/MyAccountAssets/ManageAddress/ManageAddress.css')}}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Begin header -->
    @yield('home_header')
    <!-- End header -->

    <!-- Begin content -->
    <div class="container">
        <div class="row">
            <section class="directory mt-3">
                <nav class="navbar navbar-expand-xl navbar-light ">
                    <div class="container-fluid">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                                <li class="breadcrumb-item active" id="ManageAddress" aria-current="page">Sổ địa chỉ</li>
                            </ol>
                        </nav>
                    </div>
                </nav>
            </section>

            @yield('sub_nav_my_account')
            <!-- End SlideBar -->
            <!-- Start Content -->
            <div class="col-12 col-xl-9 container-right">
                <div class="heading-right">
                    Sổ địa chỉ
                    <button style="border: 1px solid #000" id="js-newaddress-btn" onclick="showEditAddress('Update')">+ Thêm địa chỉ</button>
                </div>

                @foreach ($customer_address as $key => $address )
                    <div class="address-card">
                        <div class="first-row">
                            <div class="left-first-row">
                                {{$address->SpecificAddress}}
                            </div>
                            <div class="right-first-row">
                                <a class="js-edit-address" onclick="showEditAddress( '{{$address->AddID}} ')">Cập nhật</a>
                                <a class="js-delete-address" onclick="showDeleteAddress('{{$address->AddID}} ')" >Xóa</a>
                            </div>
                        </div>

                        <div class="second-row">
                            <div class="left-second-row">
                                <div>{{$address->Ward}}, {{$address->District}}, {{$address->City}} </div>
                            </div>
                            @if ($address->Default == 1)
                                <span class="third-row">Mặc định</span>
                            @else
                             <button class="btn-shared right-second-row" >Chọn làm mặc định</button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End Content -->
        </div>
    </div>

    <!-- Begin Modal Edit Address-->
    <div class="modal js-modal-edit">
        <form method="post" class="modal-container js-modal-container">
            <div class="modal-close js-modalEdit-close">
                <i class="ti-close"></i>
            </div>

            <header class="modal-header"></header>
            <input value="" name="CusId" hidden>
            <div class="modal-body">
                <label class="modal-label" for="city">Tỉnh/Thành phố, Quận/Huyện, Phường/Xã</label>
                <select class="select-address" name="city-select" id="city" required>
                    <option value="" selected disabled>Chọn Tỉnh/Thành phố</option>
                </select>
                <select class="select-address" name="district-select" id="district" required>
                    <option value="" selected disabled>Chọn Quận/Huyện</option>
                </select>
                <select class="select-address" name="ward-select" id="ward" required>
                    <option value="" selected disabled>Chọn Phường/Xã</option>
                </select>

                <label class="modal-label" for="specific-address">Địa chỉ cụ thể</label>
                <textarea name="specific-address" id="specific-address" cols="30" rows="10" required></textarea>

                <input type="checkbox" name="address-default" id="address-default" value="1">
                <label id="modal-label-checkbox" for="address-default">Đặt làm địa chỉ mặc định</label>
            </div>

            <footer class="modal-footer">
                <input id="edit-address-btn" class="btn-modal" type="submit" value="Cập nhật">
            </footer>
        </form>
    </div>

    <!-- Begin Modal Delete Address-->
    <div class="modal js-modal-delete">
        <form action="" class="modal-container js-modal-container">
            <div class="modal-close js-modalDelete-close">
                <i class="ti-close"></i>
            </div>

            <header class="modal-header">
                Xóa địa chỉ
            </header>

            <div class="modal-body">
                <p>Bạn có chắc muốn xóa địa chỉ này?</p>
            </div>

            <footer class="modal-footer">
                <a id="delete-address-btn" class="btn-modal">Xác nhận</a>
            </footer>
        </form>
    </div>

    @yield('home_footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="{{asset('public/client/MyAccountAssets/ManageAddress/ManageAddress.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/client/MyAccountAssets/MyAccount/SubNavSide.js')}}"></script>
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

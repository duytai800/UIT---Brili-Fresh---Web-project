@extends('admin_layout')
@section('admin_content')
<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
        <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a href="{{URL::to('/index-store')}}" class="breadcrumb-item">Quản lý cửa hàng</a>
            <span class="breadcrumb-item active">Chỉnh sửa</span>
        </nav>
    </div>
</div>
@foreach($edit_store as $key =>$store)
<form action="{{URL::to('/update-store/'.$store->StoreID)}}" method="post">
    {{csrf_field()}}
    <h3>Chỉnh sửa thông tin cửa hàng</h3>
    <p class="text-dark font-weight-semibold">ID: {{$store->StoreID}}</p>
    <hr />
    <div class="form-group">
        <label for="city">Tỉnh/Thành</label>
        <input id="selected_city" name="selected_city" type="hidden" value="{{$store->City}}"/>
        <select id="city" class="form-control">
            <option value="" selected></option>
        </select>
        <span class="text-danger" id="city-message" style="display:none">Vui lòng chọn Tỉnh/Thành!</span>
    </div>
    <div class="form-group">
        <label for="district">Quận/Huyện</label>
        <input id="selected_district" name="selected_district" type="hidden" value="{{$store->District}}"/>
        <select id="district" class="form-control">
            <option value="" selected></option>
        </select>
        <span class="text-danger" id="district-message" style="display:none">Vui lòng chọn Quận/Huyện!</span>
    </div>
    <div class="form-group">
        <label for="ward">Phường/Xã</label>
        <input id="selected_ward" name="selected_ward" type="hidden" value="{{$store->Ward}}"/>
        <select id="ward" class="form-control">
            <option value="" selected></option>
        </select>
        <span class="text-danger" id="ward-message" style="display:none">Vui lòng chọn Phường/Xã!</span>
    </div>
    <div class="form-group">
        <label>Địa chỉ</label>
        <textarea class="form-control" id="specificAddress" name="specificAddress" placeholder="Số nhà/Tên đường/Tên tòa/...">{{$store->SpecificAddress}}</textarea>
    </div>
    <div>
        <button id="save-btn" type="submit" class="btn btn-primary">Lưu thông tin</button>
        <a href="{{URL::to('/index-store')}}" class="btn btn-success btn-tone m-r-5">Quay lại Danh sách</a>
    </div>
</form>
@endforeach


<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    $(document).ready(function () {
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function (result) {
            renderCity(result.data);
        });
        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Id);
            }
            citis.onchange = function () {
                district.length = 1;
                ward.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.Id === this.value);
                    for (const k of result[0].Districts) {
                        districts.options[districts.options.length] = new Option(k.Name, k.Id);
                    }
                }
                $('#city option[value=""]').text("Chọn Tỉnh/Thành phố");
                $('#district option[value=""]').text("Chọn Quận/Huyện");
                $('#ward option[value=""]').text("Chọn Phường/Xã");
                $("#city").prop('required', true);
                $("#district").prop('required', true);
                $("#ward").prop('required', true);
            };
            districts.onchange = function () {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;
                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Id);
                    }
                }
            };
        }
        $("#city").prop('required', false);
        $("#district").prop('required', false);
        $("#ward").prop('required', false);
        $('#city option[value=""]').text($("#selected_city").val());
        $('#district option[value=""]').text($("#selected_district").val());
        $('#ward option[value=""]').text($("#selected_ward").val());
       
        $("#save-btn").click(function () {
             
            if ($("#city").is(':invalid')) {
                $("#city-message").show();
            }
            if ($("#district").is(':invalid')) {
                $("#district-message").show();
            }
            if ($("#ward").is(':invalid')) {
                $("#ward-message").show();
            }

            var city = $("#city").find("option:selected").text();
            $("#selected_city").val(city);
            var district = $("#district").find("option:selected").text();
            $("#selected_district").val(district);
            var ward = $("#ward").find("option:selected").text();
            $("#selected_ward").val(ward);
        })
        //Bỏ thông báo yêu cầu chọn
        $("#city").change(function(){
            $("#city-message").hide();
            })
            $("#district").change(function(){
            $("#district-message").hide();
            })
            $("#ward").change(function(){
            $("#ward-message").hide();
        })
    })
</script>

@endsection
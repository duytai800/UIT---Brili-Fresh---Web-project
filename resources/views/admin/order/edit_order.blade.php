@extends('admin_layout')
@section('admin_content')


<div class="page-header">
    <h2 class="header-title">Brili Fresh</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="{{URL::to('/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Trang chủ</a>
            <a href="{{URL::to('/index-order')}}" class="breadcrumb-item">Quản lý đơn hàng</a>
            <span class="breadcrumb-item active">Chỉnh sửa</span>
        </nav>
    </div>
</div>
@foreach($edit_order as $key =>$order)
<div class="d-md-flex m-b-15 align-items-center justify-content-between">
    <div class="media align-items-center m-b-15">
        <div class="m-l-15">
            <h3>Cập nhật tình trạng đơn hàng</h3>
            <h4>ID: {{$order->TransID}}</p>
        </div>
    </div>
    <div class="m-b-15">
        <a href='/detail-order/{{$order->OrderID}}' class="btn btn-primary m-r-5">
            <i class="anticon anticon-info-circle"></i>
            <span>Xem chi tiết đơn hàng</span>
        </a>
    </div>
</div>

<hr />
<div class="row">
    <div style="display:table-cell; vertical-align:middle; text-align:center; width:100%" >
        <div id="case1" class="avatar avatar-icon avatar-geekblue">
            <i class="anticon anticon-safety-certificate"></i>
        </div>
        <label id="line1" style="width: 60px; height: 12px; background-color:#b4e7f0; margin-top:auto;margin-bottom:auto; border-radius: 8px"></label>
        <div id="case2" class="avatar avatar-icon avatar-magenta">
            <i class="fas fa-dolly"></i>
        </div>
        <label id="line2" style="width: 60px; height: 12px; background-color:#b4e7f0; margin-top:auto;margin-bottom:auto; border-radius: 8px"></label>
        <div id="case3" class="avatar avatar-icon avatar-gold">
            <i class="fas fa-box-open"></i>
        </div>
        <label id="line3" style="width: 60px; height: 12px; background-color:#b4e7f0; margin-top:auto;margin-bottom:auto; border-radius: 8px"></label>
        <div id="case4" class="avatar avatar-icon avatar-lime">
            <i class="fas fa-truck-loading"></i>
        </div>
        <label id="line4" style="width: 60px; height: 12px; background-color:#b4e7f0; margin-top:auto;margin-bottom:auto; border-radius: 8px"></label>
        <div id="case5" class="avatar avatar-icon avatar-green">
            <i class="fas fa-shipping-fast"></i>
        </div>
        <label id="line5" style="width: 60px; height: 12px; background-color:#b4e7f0; margin-top:auto;margin-bottom:auto; border-radius: 8px"></label>
        <div id="case6" class="avatar avatar-icon avatar-cyan">
            <i class="fas fa-check-circle"></i>
        </div>
        <div id="case7" class="avatar avatar-icon avatar-volcano">
            <i class="fas fa-times-circle"></i>
        </div>
    </div>
    <div style="text-align: center; width: 100%; margin-top: 24px">
        <span id="status1" class="badge badge-pill badge-geekblue" style="font-size: 20px">Đợi xác nhận</span>
        <span id="status2" class="badge badge-pill badge-magenta" style="font-size: 20px">Đang chuẩn bị hàng</span>
        <span id="status3" class="badge badge-pill badge-gold" style="font-size: 20px">Đang đóng gói</span>
        <span id="status4" class="badge badge-pill badge-lime" style="font-size: 20px">Đã giao cho đơn vị vận chuyển</span>
        <span id="status5" class="badge badge-pill badge-green" style="font-size: 20px">Đang vận chuyển</span>
        <span id="status6" class="badge badge-pill badge-cyan" style="font-size: 20px">Đã giao</span>
        <span id="status7" class="badge badge-pill badge-volcano" style="font-size: 20px">Đã hủy</span>
    </div>
</div>

<br />
<br />
<br />
<br />
<div>
    <form action="/update-order/{{$order->OrderID}}" method="post">
    {{csrf_field()}}
        <input  type="hidden" id="Trans_ShippingDate" name="Trans_ShippingDate" value="{{$order->Trans_ShippingDate}}" />
        <input  type="hidden" id="Status" name="Status" value="{{$order->Status}}" />
        <input  type="hidden" id="Trans_Status" name="Trans_Status" value="{{$order->Trans_Status}}" />
        <input  type="hidden" id="TransID" name="TransID" value="{{$order->TransID}}" />
        
        <input  type="hidden" id="Cus_RewardID" name="Cus_RewardID" value="{{$order->Cus_RewardID}}" />
        <input  type="hidden" id="Reward_Point" name="Reward_Point" value="{{$order->Reward_Point}}" />
        <input  type="hidden" id="Reward_CusType" name="Reward_CusType" value="{{$order->Reward_CusType}}" />
        <input  type="hidden" id="OrderTotal" name="OrderTotal" value="{{$order->OrderTotal}}" />
        <div class="d-md-flex m-b-15" style="float: right">
            <div class="m-b-15">
                <input type="submit" class="btn btn-success m-r-5" id="next-btn" />
            </div>
            <div class="m-b-15">
                <button  class="btn btn-danger btn-tone m-r-5" id="cancel-btn">
                    <i class="anticon anticon-close-circle"></i>
                    Hủy đơn hàng
                </button>
            </div>
        </div>
        <div style="float: right">
               <input id="Trans_Transporter" name="Trans_Transporter" style="margin-right: 20px; width: 300px; height: 40px" placeholder="Nhập tên đơn vị vận chuyển" value="{{$order->Trans_Transporter}}" disabled required />
          
        </div>
    </form>
</div>


<hr />
<div>
    <a href="{{URL::to('/index-order')}}" class="btn btn-success btn-tone m-r-5">Quay lại Danh sách</a>
</div>
@endforeach

<script>
    $("#Trans_Transporter").hide();
        $(".avatar.avatar-icon").css({ "font-size": "40px", "padding-top": "20px", "width":"80px", "height":"80px"});
        if ($("#Trans_Status").val() == 1) {
            $("#line1, #line2, #line3, #line4, #line5").css({ "background-color": "#ddd" });
            $(".avatar-magenta, .avatar-gold, .avatar-lime, .avatar-green, .avatar-cyan").css({ "background-color": "#f2f2f2", "color":"#ddd" });
            $("#case7").hide();
            $("#status2, #status3, #status4, #status5, #status6, #status7").hide();
            $("#next-btn").val("Xác nhận đơn hàng và chuyển tới chuẩn bị hàng");
        }
        
        else if ($("#Trans_Status").val() == 2) {
            $("#line2, #line3, #line4, #line5").css({ "background-color": "#ddd" });
            $(".avatar-gold, .avatar-lime, .avatar-green, .avatar-cyan").css({ "background-color": "none", "color": "#ddd" });
            $("#case7").hide();
            $("#status1, #status3, #status4, #status5, #status6, #status7").hide();
            $("#next-btn").val("Xác nhận đã chuẩn bị hàng và chuyển tới đóng gói");
        }
        else if ($("#Trans_Status").val() == 3) {
            $("#line3, #line4, #line5").css({ "background-color": "#ddd" });
            $(".avatar-lime, .avatar-green, .avatar-cyan").css({ "background-color": "none", "color": "#ddd" });
            $("#case7").hide();
            $("#status1, #status2, #status4, #status5, #status6, #status7").hide();
            $("#next-btn").val("Xác nhận đã đóng gói và chuyển tới giao cho đơn vị vận chuyển");
        }
        else if ($("#Trans_Status").val() == 4) {
            $("#line4, #line5").css({ "background-color": "#ddd" });
            $(".avatar-green, .avatar-cyan").css({ "background-color": "none", "color": "#ddd" });
            $("#case7").hide();
            $("#status1, #status2, #status3, #status5, #status6, #status7").hide();
            $("#next-btn").val("Xác nhận hàng hóa đang trên đường giao");
        }
        else if ($("#Trans_Status").val() == 5) {
            $("#line5").css({ "background-color": "#ddd" });
            $(".avatar-cyan").css({ "background-color": "none", "color": "#ddd" });
            $("#case7").hide();
            $("#status1, #status2, #status3, #status4, #status6, #status7").hide();
            if ($("#Status").val() == 0) {
                $("#next-btn").val("Xác nhận đã giao và nhận được tiền");
            } else {
                $("#next-btn").val("Xác nhận đã giao");
            }
        }
        else if ($("#Trans_Status").val() == 6) {
            $("#case7").hide();
            $("#next-btn, #cancel-btn").hide();
            $("#status1, #status2, #status3, #status4, #status5, #status7").hide();
        }
        else if ($("#Trans_Status").val() == 7) {
            $("#line1, #line2, #line3, #line4, #line5, #case1, #case2, #case3, #case4, #case5, #case6").hide();
            $("#next-btn, #cancel-btn").hide();
            $("#status1, #status2, #status3, #status4, #status5, #status6").hide();
        }
    $("#next-btn").click(function () {
        if ($("#Trans_Status").val() == 1) {
            $("#Trans_Status").val("2");
        }
        else if ($("#Trans_Status").val() == 2) {
            $("#Trans_Status").val("3");
        }
        else if ($("#Trans_Status").val() == 3) {
            $("#Trans_Transporter").prop('disabled', false);
            $("#Trans_Transporter").show();
            if ($("#Trans_Transporter").val()) {
                $("#Trans_Status").val("4");
            }
        }
        else if ($("#Trans_Status").val() == 4) {
            $("#Trans_Status").val("5");
        }
        else if ($("#Trans_Status").val() == 5) {
            $("#Trans_Status").val("6");
            $("#Status").val("1");
            var currentdate = new Date();
            var month = (currentdate.getMonth()+1)
            if (month < 10) {
                var month = "0"+month;
            }
            var date = currentdate.getDate();
            if (date < 10) {
                var date = "0"+date;
            }
            var hour = currentdate.getHours();
            if (hour < 10) {
                var hour = "0"+hour;
            }
            var minute = currentdate.getMinutes();
            if (minute < 10) {
                var minute = "0"+minute;
            }
            var second = currentdate.getSeconds();
            if (second  < 10) {
                var second = "0"+second ;
            }
            var datetime = currentdate.getFullYear()+"-"+month+"-"+date+" "+hour+":"+minute+":"+second;
          
            $("#Trans_ShippingDate").val(datetime);
        }
    })
    $("#cancel-btn").click(function (e) {
        let text = "Xác nhận hủy đơn hàng?"
        if (confirm(text)==true) {
            $("#Trans_Status").val("7");
        }
        else {
            e.preventDefault();
        }
    })
</script>
@endsection
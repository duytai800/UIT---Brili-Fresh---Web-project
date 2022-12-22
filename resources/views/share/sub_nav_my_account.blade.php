@section('sub_nav_my_account')
<div class="col-12 col-xl-3 container-left">
    <!-- SlideBar dùng chung tất cả các trang trong Tài khoản của tôi -->
    <div class="left-content">
        @foreach ($customer as $key => $customer)
        <div class="avatar">
            <img src="{{asset('/public/client/avatar/'. $customer->Avatar )}}" alt="">
            <div class="avatar-text">
                <span>Xin chào</span>
                <p id="user-name">{{$customer->LastName}} {{$customer->FirstName}}</p>
            </div>
        </div>

        <div class="sidebar">
            <a href="{{URL::to('/account-info')}}" id="AccountInfo_2"><i class="ti-user"></i><span>Thông tin tài khoản</a>
            <a href="{{URL::to('/account-info/manage-orders')}}" id="ManageOrder_2"><i class="ti-package"></i><span>Quản lý đơn hàng</a>
            <a href="{{URL::to('/account-info/manage-address')}}" id="ManageAddress_2"><i class="ti-location-pin"></i><span>Sổ địa chỉ</a>
            <a id="ManageFeedback_2"><i class="ti-star"></i><span>Đánh giá sản phẩm</a>
            <a href="{{URL::to('/logout')}}" id="ManageFeedback_2"><i class="ti-shift-right-alt"></i><span>Đăng xuất</a>
        </div>
        @endforeach
    </div>
</div>
@endsection
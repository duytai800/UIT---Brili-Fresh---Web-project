<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Admin Dashboard</title>

     <!-- Favicon -->
     <link rel="shortcut icon" href="{{asset('public/backend/images/logo/BRILI-FRESH.png')}}">

     <!-- page css -->
     <link href="{{asset('public/backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
     <link href="{{asset('public/backend/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
     <link href="{{asset('public/backend/bootstrap.min.css')}}" rel="stylesheet" />
     <link href="{{asset('public/backend/datepicker.css')}}" rel="stylesheet" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
     <script src="js/jquery-1.11.1.min.js"></script>

     <!-- Core css -->
     <link href="{{asset('public/backend/css/app.min.css')}}" rel="stylesheet">

     <!-- Core css -->
     @RenderSection("Scripts",false/*required*/)

</head>

<body>
     <div class="app">
          <div class="layout">
               <!-- Header START -->
               <div class="header">
                    <div class="logo logo-dark">
                         <a href="index.html">
                              <img src="{{asset('public/backend/images/logo/BRILI-75.png')}}" alt="Logo">
                              <img class="logo-fold" src="{asset('public/backend/images/logo/logo-fold.png')}}" alt="Logo">
                         </a>
                    </div>
                    <div class="logo logo-white">
                         <a href="index.html">
                              <img src="assets/images/logo/logo-white.png" alt="Logo">
                              <img class="logo-fold" src="assets/images/logo/logo-fold-white.png" alt="Logo">
                         </a>
                    </div>
                    <div class="nav-wrap">
                         <ul class="nav-left">
                              <li class="desktop-toggle">
                                   <a href="javascript:void(0);">
                                        <i class="anticon"></i>
                                   </a>
                              </li>
                              <li class="mobile-toggle">
                                   <a href="javascript:void(0);">
                                        <i class="anticon"></i>
                                   </a>
                              </li>
                              <li>
                                   <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                                        <i class="anticon anticon-search"></i>
                                   </a>
                              </li>
                         </ul>
                         <ul class="nav-right">
                              <li class="dropdown dropdown-animated scale-left">
                                   <a href="javascript:void(0);" data-toggle="dropdown">
                                        <i class="anticon anticon-bell notification-badge"></i>
                                   </a>
                                   <div class="dropdown-menu pop-notification">
                                        <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                                             <p class="text-dark font-weight-semibold m-b-0">
                                                  <i class="anticon anticon-bell"></i>
                                                  <span class="m-l-10">Notification</span>
                                             </p>
                                             <a class="btn-sm btn-default btn" href="javascript:void(0);">
                                                  <small>View All</small>
                                             </a>
                                        </div>
                                        <div class="relative">
                                             <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                                                  <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                                       <div class="d-flex">
                                                            <div class="avatar avatar-blue avatar-icon">
                                                                 <i class="anticon anticon-mail"></i>
                                                            </div>
                                                            <div class="m-l-15">
                                                                 <p class="m-b-0 text-dark">You received a new message
                                                                 </p>
                                                                 <p class="m-b-0"><small>8 min ago</small></p>
                                                            </div>
                                                       </div>
                                                  </a>
                                                  <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                                       <div class="d-flex">
                                                            <div class="avatar avatar-cyan avatar-icon">
                                                                 <i class="anticon anticon-user-add"></i>
                                                            </div>
                                                            <div class="m-l-15">
                                                                 <p class="m-b-0 text-dark">New user registered</p>
                                                                 <p class="m-b-0"><small>7 hours ago</small></p>
                                                            </div>
                                                       </div>
                                                  </a>
                                                  <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                                       <div class="d-flex">
                                                            <div class="avatar avatar-red avatar-icon">
                                                                 <i class="anticon anticon-user-add"></i>
                                                            </div>
                                                            <div class="m-l-15">
                                                                 <p class="m-b-0 text-dark">System Alert</p>
                                                                 <p class="m-b-0"><small>8 hours ago</small></p>
                                                            </div>
                                                       </div>
                                                  </a>
                                                  <a href="javascript:void(0);" class="dropdown-item d-block p-15 ">
                                                       <div class="d-flex">
                                                            <div class="avatar avatar-gold avatar-icon">
                                                                 <i class="anticon anticon-user-add"></i>
                                                            </div>
                                                            <div class="m-l-15">
                                                                 <p class="m-b-0 text-dark">You have a new update</p>
                                                                 <p class="m-b-0"><small>2 days ago</small></p>
                                                            </div>
                                                       </div>
                                                  </a>
                                             </div>
                                        </div>
                                   </div>
                              </li>
                              <li class="dropdown dropdown-animated scale-left">
                                   <div class="pointer" data-toggle="dropdown">
                                        <div class="avatar avatar-image  m-h-10 m-r-15">
                                             <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                        </div>
                                   </div>
                                   <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                        <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                             <div class="d-flex m-r-50">
                                                  <div class="avatar avatar-lg avatar-image">
                                                       <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                                  </div>
                                                  <div class="m-l-10">
                                                       <p class="m-b-0 text-dark font-weight-semibold">
                                                            <?php

                                                            use Illuminate\Support\Facades\Session;
                                                            use Illuminate\Support\Facades\DB;

                                                            $UserID = Session::get('UserID_employee');

                                                            if ($UserID) {
                                                                 $result = DB::table('employee')->where('UserID', $UserID)->first();
                                                                 echo $result->LastName;
                                                                 echo ' ';
                                                                 echo $result->FirstName;
                                                            }
                                                            ?>
                                                       </p>
                                                       <!-- <p class="m-b-0 opacity-07">UI/UX Desinger</p> -->
                                                  </div>
                                             </div>
                                        </div>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                             <div class="d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                                       <span class="m-l-10">Sửa thông tin</span>
                                                  </div>
                                                  <i class="anticon font-size-10 anticon-right"></i>
                                             </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                             <div class="d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                                       <span class="m-l-10">Account Setting</span>
                                                  </div>
                                                  <i class="anticon font-size-10 anticon-right"></i>
                                             </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                             <div class="d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <i class="anticon opacity-04 font-size-16 anticon-project"></i>
                                                       <span class="m-l-10">Projects</span>
                                                  </div>
                                                  <i class="anticon font-size-10 anticon-right"></i>
                                             </div>
                                        </a>
                                        <a href="{{URL::to('/logout')}}" class="dropdown-item d-block p-h-15 p-v-10">
                                             <div class="d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                                       <span class="m-l-10">Đăng xuất</span>
                                                  </div>
                                                  <i class="anticon font-size-10 anticon-right"></i>
                                             </div>
                                        </a>
                                   </div>
                              </li>
                         </ul>
                    </div>
               </div>
               <!-- Header END -->

               <!-- Side Nav START -->
               <div class="side-nav">
                    <div class="side-nav-inner">
                         <ul class="side-nav-menu scrollable">
                              <li class="nav-item dropdown open">
                                   <a class="dropdown-toggle" href="javascript:void(0);">
                                        <span class="icon-holder">
                                             <i class="anticon anticon-dashboard"></i>
                                        </span>
                                        <span class="title">Bảng điều khiển</span>
                                   </a>
                              </li>
                              <li class="nav-item dropdown">
                                   <a class="dropdown-toggle" href="javascript:void(0);">
                                        <span class="icon-holder">
                                        <i class="anticon anticon-hdd"></i>
                                        </span>
                                        <span class="title">Quản lý sản phẩm</span>
                                        <span class="arrow">
                                             <i class="arrow-icon"></i>
                                        </span>
                                   </a>
                                   <ul class="dropdown-menu">
                                        <li>
                                             <a href="{{URL::to('/all-products')}}">Danh sách sản phẩm</a>
                                        </li>
                                   </ul>
                              </li>
                              <li class="nav-item dropdown">
                                   <a  href="{{URL::to('/index-order')}}">
                                        <span class="icon-holder">
                                        <i class="anticon anticon-snippets"></i>
                                        </span>
                                        <span class="title">Quản lý đơn hàng</span>
                                   </a>
                              </li>
                              <li class="nav-item dropdown">
                                   <a class="dropdown-toggle" href="javascript:void(0);">
                                        <span class="icon-holder">
                                        <i class="anticon anticon-team"></i>
                                        </span>
                                        <span class="title">Quản lý khách hàng</span>
                                        <span class="arrow">
                                             <i class="arrow-icon"></i>
                                        </span>
                                   </a>
                                   <ul class="dropdown-menu">
                                        <li>
                                             <a href="{{URL::to('/all-customers')}}">Danh sách khách hàng</a>
                                        </li>

                                   </ul>
                              </li>
                              <li class="nav-item dropdown">
                                   <a class="dropdown-toggle" href="javascript:void(0);">
                                        <span class="icon-holder">
                                        <i class="anticon anticon-form"></i>
                                        </span>
                                        <span class="title">Quản lý nhân viên</span>
                                        <span class="arrow">
                                             <i class="arrow-icon"></i>
                                        </span>
                                   </a>
                                   <ul class="dropdown-menu">
                                        <li>
                                             <a href="{{URL::to('/all-employee')}}">Danh sách nhân viên</a>
                                        </li>
                                   </ul>
                              </li>
                              <li class="nav-item dropdown">
                                   <a class="dropdown-toggle" href="javascript:void(0);">
                                        <span class="icon-holder">
                                        <i class="anticon anticon-tool"></i>
                                        </span>
                                        <span class="title">Quản lý hệ thống</span>
                                        <span class="arrow">
                                             <i class="arrow-icon"></i>
                                        </span>
                                   </a>
                                   <ul class="dropdown-menu">
                                        <li>
                                             <a href="{{URL::to('/index-account')}}">Quản lý tài khoản</a>
                                        </li>
                                        <li>
                                             <a href="data-table.html">Data Table</a>
                                        </li>
                                   </ul>
                              </li>
                              <li class="nav-item dropdown">
                                   <a class="dropdown-toggle" href="{{URL::to('/index-statistic')}}">
                                        <span class="icon-holder">
                                        <i class="anticon anticon-pie-chart"></i>
                                        </span>
                                        <span class="title">Thống kê, báo cáo</span>
                                   </a>
                              </li>
                              <li class="nav-item dropdown">
                                   <a class="dropdown-toggle" href="{{URL::to('/index-store')}}">
                                        <span class="icon-holder">
                                        <i class="anticon anticon-shop"></i>
                                        </span>
                                        <span class="title">Quản lý cửa hàng</span>
                                   </a>
                              </li>
                              <li class="nav-item dropdown">
                                   <a class="dropdown-toggle" href="{{URL::to('/index-stock')}}">
                                        <span class="icon-holder">
                                        <i class="anticon anticon-appstore"></i>
                                        </span>
                                        <span class="title">Quản lý kho</span>
                                   </a>
                              </li>
                              <li class="nav-item dropdown">
                                   <a class="dropdown-toggle" href="javascript:void(0);">
                                        <span class="icon-holder">
                                        <i class="anticon anticon-gift"></i>
                                        </span>
                                        <span class="title">Quản lý khuyến mãi</span>
                                        <span class="arrow">
                                             <i class="arrow-icon"></i>
                                        </span>
                                   </a>
                                   <ul class="dropdown-menu">
                                        <li>
                                             <a href="{{URL::to('/all-discount-products')}}">Khuyến mãi sản phẩm</a>
                                        </li>
                                        <li>
                                             <a href="{{URL::to('/all-discount-types')}}">Khuyến mãi loại sản phẩm </a>
                                        </li>
                                        <li>
                                             <a href="{{URL::to('/all-discount-orders')}}">Khuyến mãi hoá đơn</a>
                                        </li>
                                        <li>
                                             <a href="{{URL::to('/all-discount-stores')}}">Khuyến mãi cửa hàng</a>
                                        </li>
                                   </ul>
                              </li>
                              <li class="nav-item dropdown">
                                   <a class="dropdown-toggle" href="javascript:void(0);">
                                        <span class="icon-holder">
                                             <i class="anticon anticon-lock"></i>
                                        </span>
                                        <span class="title">Authentication</span>
                                        <span class="arrow">
                                             <i class="arrow-icon"></i>
                                        </span>
                                   </a>
                                   <ul class="dropdown-menu">
                                        <li>
                                             <a href="login-1.html">Login 1</a>
                                        </li>
                                        <li>
                                             <a href="login-2.html">Login 2</a>
                                        </li>
                                        <li>
                                             <a href="login-3.html">Login 3</a>
                                        </li>
                                        <li>
                                             <a href="sign-up-1.html">Sign Up 1</a>
                                        </li>
                                        <li>
                                             <a href="sign-up-2.html">Sign Up 2</a>
                                        </li>
                                        <li>
                                             <a href="sign-up-3.html">Sign Up 3</a>
                                        </li>
                                        <li>
                                             <a href="error-1.html">Error 1</a>
                                        </li>
                                        <li>
                                             <a href="error-2.html">Error 2</a>
                                        </li>
                                   </ul>
                              </li>
                         </ul>
                    </div>
               </div>
               <!-- Side Nav END -->

               <!-- Page Container START -->
               <div class="page-container">
                    <!-- Content Wrapper START -->
                    <div class="main-content">
                         @yield('admin_content')
                    </div>
                    <!-- Content Wrapper END -->

                    <!-- Footer START -->
                    <footer class="footer">
                         <div class="footer-content">
                              <p class="m-b-0">Copyright © 2019 Brili Fresh. All rights reserved.</p>
                              <span>
                                   <a href="" class="text-gray m-r-15">Term &amp; Conditions</a>
                                   <a href="" class="text-gray">Privacy &amp; Policy</a>
                              </span>
                         </div>
                    </footer>
                    <!-- Footer END -->

               </div>
               <!-- Page Container END -->

          </div>
     </div>


     <!-- Core Vendors JS -->
     <script src="{{asset('public/backend/js/vendors.min.js')}}"></script>

     <!-- page js -->
     <script src="{{asset('public/backend/vendors/chartjs/Chart.min.js')}}"></script>
     <script src="{{asset('public/backend/vendors/datatables/jquery.dataTables.min.js')}}"></script>
     <script src="{{asset('public/backend/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
     <script src="{{asset('public/backend/js/pages/dashboard-e-commerce.js')}}"></script>
     <script src="{{asset('public/backend/js/pages/dashboard-default.js')}}"></script>
     <script src="{{asset('public/backend/js/pages/dashboard-crm.js')}}"></script>
     <script src="{{asset('public/backend/js/pages/e-commerce-order-list.js')}}"></script>
     <script src="{{asset('public/backend/js/jquery-1.11.1.min.js')}}"></script>
     <!-- Core JS -->
     <script src="{{asset('public/backend/js/app.min.js')}}"></script>

</body>

</html>
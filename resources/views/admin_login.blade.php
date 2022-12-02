<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang quản lý Brili Fresh</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('public/backend/images/logo/favion.png')}}">

    <!-- page css -->

    <!-- Core css -->
    <link href="{{asset('public/backend/css/app.min.css')}}" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('public/backend/images/others/login-3.png')">
        <!-- <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: {{asset('assets/images/others/login-3.png')}}"> -->

            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img class="img-fluid" alt="" src="{{asset('public/backend/images/logo/BRILI-75.png')}}">
                                        <h2 class="m-b-0">Đăng nhập </h2>
                                        
                                    </div>
                                    <form action="{{URL::to('/admin-dashboard')}}" method="POST">
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="userName">Tài khoản:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-user"></i>
                                                
                                                <input type="text" class="form-control" id="userName" name="admin_username"placeholder="Nhập tài khoản" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Mật khẩu:</label>
                                            <a class="float-right font-size-13 text-muted" href="">Quên mật khẩu?</a>
                                            <div class="input-affix m-b-10">
                                                <i class="prefix-icon anticon anticon-lock"></i>
                                                <input type="password" class="form-control" id="password" name="admin_pass"placeholder="Nhập mật khẩu" required>
                                            </div>
                                        </div>
                                        <?php   
                                            use Illuminate\Support\Facades\Session;
                                            $message = Session::get('fail_message');
                                            if ($message){
                                                echo '<span style= "color: red"; text-align: center; font-size: 14px; >'.$message.'</span>';
                                                Session::put('fail_message',null);
                                            }
                                        ?>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="font-size-13 text-muted">
                                                    Không có tài khoản? 
                                                    <a class="small" href="">Đăng ký!</a>
                                                </span>
                                                {{ csrf_field() }}
                                                <button class="btn btn-primary">Đăng nhập</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="{{asset('public/js/vendors.min.js')}}"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="{{asset('public/js/app.min.js')}}"></script>

</body>

</html>
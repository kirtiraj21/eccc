
<!doctype html>
<html lang="en">


<!-- Mirrored from www.wrraptheme.com/templates/hexabit/html/light/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2020 07:22:40 GMT -->
<head>
<title>YIKOOO</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="HexaBit Bootstrap 4x Admin Template">
<meta name="author" content="WrapTheme, www.thememakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="http://www.wrraptheme.com/templates/hexabit/html/assets/vendor/font-awesome/css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/')?>css/main.css">
<link rel="stylesheet" href="<?php echo base_url('assets/')?>css/color_skins.css">


<style>

.theme-orange .auth-main:before {
    background: transparent;
}
.theme-orange .auth-main:after {
    background: #62EB69;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}
.card {
    padding: 45px 30px;
    background: #fff;
    margin: 20% 0px;
    border: none;
    box-shadow: 0 3px 8px 0 rgba(0,0,0,0.1);
}
.form-control{
    padding: 10px 15px;
}
.btn-primary{
     background: #62eb69 !important;
    color: #fff !important;
    border-color: #62eb69 !important;
}
.auth-main {
    margin-top: 0;
}
</style>


</head>

<body class="theme-orange">
    <!-- WRAPPER -->
    <div id="wrapper" class="auth-main">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="header p-0">
                            <!--<img src="<?php echo base_url('assets/img/logo.png')?>" style="display: block;margin: auto;margin-bottom: 20px;">-->
                            <center><b class="lead" style="font-size: 25px;font-weight: 500; color:#62eb69; ">YIKOOO</b></center>
                            <center><p style="font-weight: 600;font-size: 18px;color: #0f3911;">Login</p></center>
                            
                        </div>
                        <div class="body">
                            <form class="form-auth-small" action="<?php echo base_url('admin/Login/log')?>" method="post">
                                <div class="form-group">
                                    <label for="signin-email" class="control-label">Email</label>
                                    <input type="email" class="form-control" id="signin-email" name="email" value="" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label">Password</label>
                                    <input type="password" class="form-control" id="signin-password" name="password" value="" placeholder="Password" required>
                                </div>
                                <!--<div class="form-group clearfix">-->
                                <!--    <label class="fancy-checkbox element-left">-->
                                <!--        <input type="checkbox">-->
                                <!--        <span>Remember me</span>-->
                                <!--    </label>								-->
                                <!--</div>-->
                               <button type="submit" type="submit" name="submit" value="login" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <div class="bottom">
                                    <!--<span class="helper-text m-b-10"><i class="fa fa-lock"></i><a href="page-forgot-password.html">Forgot password?</a></span>-->
                                    <!--<span>Don't have an account? <a href="page-register.html">Register</a></span>-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
  
<script src="<?php echo base_url('assets/')?>bundles/libscripts.bundle.js"></script>    
<script src="<?php echo base_url('assets/')?>bundles/vendorscripts.bundle.js"></script>

<script src="<?php echo base_url('assets/')?>bundles/mainscripts.bundle.js"></script>
</body>

<!-- Mirrored from www.wrraptheme.com/templates/hexabit/html/light/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2020 07:22:40 GMT -->
</html>

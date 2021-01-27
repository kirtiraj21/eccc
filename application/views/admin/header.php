<?php if(isset($this->session->userdata["farm_sess"]["user_id"])){   }else{ redirect('admin/Login') ; } ?>
<!doctype html>
<html lang="en">

<head>
<title>YIKOOO</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<link rel="icon" href="favicon.ico" type="<?php echo base_url()?>image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="http://www.wrraptheme.com/templates/hexabit/html/assets/vendor/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo base_url()?>assets/css/plugin.css"/>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-progressbar-3.3.4.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/chartist.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/chartist-plugin-tooltip.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/toastr.min.css">


<!-- MAIN CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/color_skins.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/dataTables.fixedheader.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/dataTables.fixedcolumns.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom.css">

<style>
    .theme-orange .navbar-fixed-top {
    background: #62EB69;
}
.theme-orange .sidebar-nav .metismenu>li.active>a {
    background: #62EB69;
    color: #fff;
    font-weight: 600;
}
.theme-orange #left-sidebar .navbar-brand span {
    color: #62EB69;
    font-size: 600;
}
.theme-orange #left-sidebar .user-account .user_div .user-photo {
    border-color: #E50019;
    border-radius: 0;
    border: none;
    width: 125px;
}
.theme-orange #left-sidebar .user-account .user_div {
    border-color: #e8e8e8;
    border: none;
    margin-bottom: 20px;
}
.theme-orange .page-loader-wrapper {
    background: #62EB69;
}
</style>
</head>
<body class="theme-orange">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30">
            <!--<img src="http://www.wrraptheme.com/templates/hexabit/html/assets/images/icon-light.svg" width="48" height="48" alt="HexaBit">-->
            </div>
        <p>Please wait...</p>        
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">

    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="index.html">
                        <img src="http://www.wrraptheme.com/templates/hexabit/html/assets/images/icon-light.svg" alt="HexaBit Logo" class="img-fluid logo">
                    </a>
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
                <a href="javascript:void(0);" class="icon-menu btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
            </div>
            
           

                                      

            <div class="navbar-right">           

                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <?php /* <li class="dropdown dropdown-animated scale-left">
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="icon-envelope"></i>
                                <span class="notification-dot"></span>
                            </a>
                            <ul class="dropdown-menu right_chat email">
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="http://www.wrraptheme.com/templates/hexabit/html/assets/images/xs/avatar4.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">James Wert <small class="float-right">Just now</small></span>
                                                <span class="message">Lorem ipsum Veniam aliquip culpa laboris minim tempor</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="http://www.wrraptheme.com/templates/hexabit/html/assets/images/xs/avatar1.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">Folisise Chosielie <small class="float-right">12min ago</small></span>
                                                <span class="message">There are many variations of Lorem Ipsum available, but the majority</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object " src="http://www.wrraptheme.com/templates/hexabit/html/assets/images/xs/avatar5.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">Ava Alexander <small class="float-right">38min ago</small></span>
                                                <span class="message">Many desktop publishing packages and web page editors</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media mb-0">
                                            <img class="media-object " src="http://www.wrraptheme.com/templates/hexabit/html/assets/images/xs/avatar2.jpg" alt="">
                                            <div class="media-body">
                                                <span class="name">Debra Stewart <small class="float-right">2hr ago</small></span>
                                                <span class="message">Contrary to popular belief, Lorem Ipsum is not simply random text</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-animated scale-left">
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="icon-bell"></i>
                                <span class="notification-dot"></span>
                            </a>
                            <ul class="dropdown-menu feeds_widget">
                                <li class="header">You have 5 new Notifications</li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="feeds-left"><i class="fa fa-thumbs-o-up text-success"></i></div>
                                        <div class="feeds-body">
                                            <h4 class="title text-success">7 New Feedback <small class="float-right text-muted">Today</small></h4>
                                            <small>It will give a smart finishing to your site</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="feeds-left"><i class="fa fa-user"></i></div>
                                        <div class="feeds-body">
                                            <h4 class="title">New User <small class="float-right text-muted">10:45</small></h4>
                                            <small>I feel great! Thanks team</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="feeds-left"><i class="fa fa-question-circle text-warning"></i></div>
                                        <div class="feeds-body">
                                            <h4 class="title text-warning">Server Warning <small class="float-right text-muted">10:50</small></h4>
                                            <small>Your connection is not private</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="feeds-left"><i class="fa fa-check text-danger"></i></div>
                                        <div class="feeds-body">
                                            <h4 class="title text-danger">Issue Fixed <small class="float-right text-muted">11:05</small></h4>
                                            <small>WE have fix all Design bug with Responsive</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="feeds-left"><i class="fa fa-shopping-basket"></i></div>
                                        <div class="feeds-body">
                                            <h4 class="title">7 New Orders <small class="float-right text-muted">11:35</small></h4>
                                            <small>You received a new oder from Tina.</small>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li> */ ?>
                         <li><div id="google_translate_element"></div></li>
                        <li><a href="<?php echo base_url('admin/Login/logout')?>" class="icon-menu"><i class="icon-power"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
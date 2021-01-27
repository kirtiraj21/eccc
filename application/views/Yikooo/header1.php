<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Meta -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta content="Anil z" name="author" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />


        <!-- SITE TITLE -->
        <title>YIKOOO</title>
        <!-- Favicon Icon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
        <!-- Animation CSS -->
        <link rel="stylesheet" href="assets/css/animate.css" />
        <!-- Latest Bootstrap min CSS -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet" />
        <!-- Icon Font CSS -->
        <link rel="stylesheet" href="assets/css/all.min.css" />
        <link rel="stylesheet" href="assets/css/ionicons.min.css" />
        <link rel="stylesheet" href="assets/css/themify-icons.css" />
        <link rel="stylesheet" href="assets/css/linearicons.css" />
        <link rel="stylesheet" href="assets/css/flaticon.css" />
        <link rel="stylesheet" href="assets/css/simple-line-icons.css" />
        <!--- owl carousel CSS-->
        <link rel="stylesheet" href="assets/owlcarousel/css/owl.carousel.min.css" />
        <link rel="stylesheet" href="assets/owlcarousel/css/owl.theme.css" />
        <link rel="stylesheet" href="assets/owlcarousel/css/owl.theme.default.min.css" />
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="assets/css/magnific-popup.css" />
        <!-- Slick CSS -->
        <link rel="stylesheet" href="assets/css/slick.css" />
        <link rel="stylesheet" href="assets/css/slick-theme.css" />
        <!-- Style CSS -->
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/custom.css" />
        <link rel="stylesheet" href="assets/css/responsive.css" />

    </head>

    <body>
        <!-- LOADER -->
        <div class="preloader">
            <div class="lds-ellipsis">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- END LOADER -->

    

        <!-- START HEADER -->
        <header class="header_wrap fixed-top header_with_topbar">
            <div class="bottom_header dark_skin main_menu_uppercase">
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                         
                         <div class="toggle-area text-right" id="align-left">
                            <i class="fa fa-align-left" aria-hidden="true"></i>
                        </div>
                        <div class="toggle-area text-right" id="arrow-left" style="display:none">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </div>
                         
                        <a class="navbar-brand" href="index.php">
                            <!-- <img class="logo_light" src="assets/img/logo.png" alt="logo" />
                            <img class="logo_dark" src="assets/img/logo.png" alt="logo" /> -->
                            <h3>YIKOOO</h3>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false">
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li>
                                    <a class="nav-link active" href="index.php">Home</a>
                                </li>
                                 <li><a class="nav-link nav_item" href="product.php">Dashboard</a></li>
                                <li><a class="nav-link nav_item" href="product.php">Products</a></li>
                            </ul>
                        </div>
                        <ul class="navbar-nav attr-nav align-items-center">
                            <!-- <li>
                                <a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-envelope"></i></a>
                            </li> -->
                            <li class="dropdown cart_dropdown">
                                <a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-envelope"></i><span class="cart_count">2</span></a>
                                <div class="cart_box dropdown-menu dropdown-menu-right">
                                    <ul class="cart_list">
                                        <li>
                                            <a href="#"><img class="roundPic" src="assets/images/cart_thamb1.jpg" alt="cart_thumb1" />Rahul</a>
                                            <span class="cart_quantity">
                                                Hi Rahul Where are you
                                            </span>
                                        </li>
                                        <li>
                                            <a href="#"><img class="roundPic" src="assets/images/cart_thamb2.jpg" alt="cart_thumb2" />Yogesh</a>
                                            <span class="cart_quantity">
                                                Hi Yogesh Where are you
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown cart_dropdown">
                                <a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">2</span>Cart</a>
                                <div class="cart_box dropdown-menu dropdown-menu-right">
                                    <ul class="cart_list">
                                        <li>
                                            <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                            <a href="#"><img src="assets/images/cart_thamb1.jpg" alt="cart_thumb1" />Variable product 001</a>
                                            <span class="cart_quantity">
                                                1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00
                                            </span>
                                        </li>
                                        <li>
                                            <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                            <a href="#"><img src="assets/images/cart_thamb2.jpg" alt="cart_thumb2" />Ornare sed consequat</a>
                                            <span class="cart_quantity">
                                                1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>81.00
                                            </span>
                                        </li>
                                    </ul>
                                    <div class="cart_footer">
                                        <p class="cart_total">
                                            <strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>159.00
                                        </p>
                                        <p class="cart_buttons"><a href="cart.php" class="btn btn-fill-line rounded-0 view-cart">View Cart</a><a href="checkout.php" class="btn btn-fill-out rounded-0 checkout">Checkout</a></p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!-- END HEADER -->
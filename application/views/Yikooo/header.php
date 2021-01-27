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
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/websiteassets/images/favicon.png" />
        <!-- Animation CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/css/animate.css" />
        <!-- Latest Bootstrap min CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/bootstrap/css/bootstrap.min.css" />
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet" />
        <!-- Icon Font CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/css/themify-icons.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/css/linearicons.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/css/flaticon.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/css/simple-line-icons.css">
        <!--- owl carousel CSS-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/owlcarousel/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/owlcarousel/css/owl.theme.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/owlcarousel/css/owl.theme.default.min.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/css/magnific-popup.css">
        <!-- jquery-ui CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/css/jquery-ui.css">
        <!-- Slick CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/css/slick.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/css/slick-theme.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/css/style.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/css/custom.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/websiteassets/css/responsive.css" />

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
                        <a class="navbar-brand" href="<?php echo base_url();?>">
                            <!--<h3>YIKOOO</h3>-->
                            <img class="logo_dark" src="<?php echo base_url('assets/websiteassets/img/');?>logo2.png" alt="logo" />
                            <!--<img class="logo_light" src="assets/img/logo.png" alt="logo" />-->
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false">
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            
                            <div class="head_search">
                                <input type="text" placeholder="Search" />
                                <i class="fas fa-search"></i>
                            </div>
                            
                            <ul class="navbar-nav">
                                <li> <img style="width: 19px; margin: 21px 6px;" src="<?php echo base_url('assets/websiteassets/img/'); ?>tracking_pic.png"> </li>
                                <li>
                                 <a class="nav-link <?php if($this->uri->segment(1)==''){echo 'active';} ?>" href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li><a class="nav-link nav_item <?php if($this->uri->segment(2)=='About'){echo 'active';} ?>" href="<?php echo base_url('website/About') ?>">About</a></li>
                                <!--<li><a class="nav-link nav_item <?php if($this->uri->segment(2)=='Shop'){echo 'active';} ?>" href="<?php echo base_url('Shop') ?>">Product</a></li>-->
                                <li><a class="nav-link nav_item <?php if($this->uri->segment(2)=='Contact'){echo 'active';} ?>" href="<?php echo base_url('website/Contact') ?>">Contact </a></li>
                                
                                <!--<li><a class="nav-link nav_item" href="<?php echo base_url('website/About') ?>">Register </a></li>-->
                                <?php if((empty($this->session->userdata('user_id')))){ ?>
                                <li><a class="nav-link nav_item <?php if($this->uri->segment(2)=='Login'){echo 'active';} ?>" href="<?php echo base_url('website/Login') ?>">Login </a></li>
                                <li><a href="javascript:;" class="nav-link nav_item pr10"> <i class="fab fa-facebook-f"></i> </a></li>
                                <li><a href="javascript:;" class="nav-link nav_item pl10"> <i class="fab fa-instagram"></i> </a></li>
                                <li><a style="background: #FFCDD2; color: #fff; padding: 8px 17px; border-radius: 5px; margin: 15px 0px; font-weight: 500;" class="nav-link nav_item " href="#">Be A Seller </a></li>
                                <?php }else{ 
                                ?>
                                <li><a class="nav-link nav_item <?php if($this->uri->segment(2)=='Account'){echo 'active';} ?>" href="<?php echo base_url('website/Account') ?>">Account </a></li>
                                 <ul class="navbar-nav attr-nav align-items-center">
                            <!-- <li>
                                <a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-envelope"></i></a>
                            </li> -->
                             <?php   
                            $user_id= $this->session->userdata('user_id');
                            $prodcart = $this->Home_model->wheredata(TBL_CART,'user_id',$user_id);
                            $notification = $this->Home_model->get_tbl_data(TBL_NOTIFICATION,array('user_id'=>$user_id,'seen_status'=>0));
                             ?>
                            <li class="dropdown cart_dropdown">
                                <a class="nav-link cart_trigger" href="<?php echo base_url('website/Notification'); ?>" ><i style="background: transparent; color: #000;" class="linearicons-envelope"></i><?php if(count($notification) !=0){ ?><span class="cart_count"><?php echo count($notification); ?></span><?php } ?></a>
                              
                            </li>
                           
                            <li class="dropdown cart_dropdown">
                                <a class="nav-link cart_trigger" href="<?php echo base_url('website/Cart'); ?>" ><i style="background: transparent; color: #000;" class="linearicons-cart"></i><span class="cart_count" id="cartcount"><?php echo count($prodcart); ?></span>Cart</a>
                                
                            </li>
                        </ul>
                                 <?php  } ?>
                            </ul>
                        </div>
                        <!-- <ul class="navbar-nav attr-nav align-items-center">
                            <li>
                                <a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                                <div class="search_wrap">
                                    <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                                    <form>
                                        <input type="text" placeholder="Search" class="form-control" id="search_input" />
                                        <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                                    </form>
                                </div>
                                <div class="search_overlay"></div>
                            </li>
                            <li class="dropdown cart_dropdown">
                                <a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">2</span></a>
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
                                        <p class="cart_buttons"><a href="#" class="btn btn-fill-line rounded-0 view-cart">View Cart</a><a href="#" class="btn btn-fill-out rounded-0 checkout">Checkout</a></p>
                                    </div>
                                </div>
                            </li>
                        </ul> -->
                    </nav>
                </div>
            </div>
        <!-- END HEADER -->
        
            <!--<div class="container">-->
                <div class="section cat_droupdown">
                        <nav class="navbar navbar-inverse">
                            <div class="navbar-collapse js-navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown mega-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bars"></i> Category </a>
                                        <ul class="dropdown-menu mega-dropdown-menu">
                                            <li>
                                                <div class="menus_inside">
                                                    <ul>
                                                        <?php
                                                        $category1 = $this->Home_model->wheredata(TBL_CATEGORY,'status',1);
                                                        foreach($category1 as $category1){
                                                            $subcategory1 = $this->Home_model->get_tbl_data(TBL_SUB_CATEGORY,array('status'=>1,'category_id'=>$category1->id));
                                                        ?>
                                                            <li class="myquelist">
                                                            <h4><a href='<?php echo base_url('Shop/'.base64_encode($category1->id));?>'><?php echo $category1->name; ?></a></h4>
                                                            <ul>
                                                                <?php if(!empty($subcategory1)){
                                                                       foreach($subcategory1 as $subcat){ ?>
                                                                         <li> <a href="<?php echo base_url('Shop/'.base64_encode($category1->id).'/'.base64_encode($subcat->id)); ?>"> <?php echo $subcat->name; ?> </a> </li>
                                                                 <?php }
                                                                     } ?>
                                                            </ul>
                                                        </li>
                                                       <?php  } ?>
                                                       
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
            <!--</div>-->
        </header>
        
        
<?php include('header.php');
$user_id = $this->session->userdata('user_id');?>

<style>
    .mygreen {
    color: #64c169 !important;
}
</style>

<!-- START SECTION BANNER -->
<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <!--<div class="container-fluid">-->
        <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
            <div class="carousel-inner">
                <?php $i=1; foreach($banner as $b){ ?>
                <div class="carousel-item <?php if($i==1){echo 'active';} ?> background_bg" data-img-src="https://www.microbasket.com/wp-content/uploads/2020/06/Nuts.png">
                    <div class="banner_slide_content">
                        <!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-7 col-9">
                                <div class="banner_content overflow-hidden">
                                    <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s"></h5>
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s"></h2>
                                    <!--<a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>-->
                                </div>
                            </div>
                        </div>
                        <!-- END CONTAINER-->
                    </div>
                </div>
                <?php $i++; } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><i class="ion-chevron-left"></i></a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><i class="ion-chevron-right"></i></a>
        </div>
    <!--</div>-->
</div>
<!-- END SECTION BANNER -->

<!-- END MAIN CONTENT -->
<div class="main_content">
    
    
    <div class="section" style="padding-bottom: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single_banner height190">
                        <img src="https://s21425.pcdn.co/wp-content/uploads/2020/10/set-pecan-pistachios-almond-peanut-cashew-pine-nuts-assorted-nuts-dried-fruits-different-bowls-side-view.jpg" alt="shop_banner_img1">
                    </div>
                    <div class="single_banner height190">
                        <img src="https://media.npr.org/assets/img/2019/09/23/peanutallergy-1_wide-501bf6c4e8b8f831d0886cb484adf7ff0b42c445.jpg" alt="shop_banner_img1">
                    </div>
                    <div class="single_banner height190">
                        <img src="https://s21425.pcdn.co/wp-content/uploads/2020/10/set-pecan-pistachios-almond-peanut-cashew-pine-nuts-assorted-nuts-dried-fruits-different-bowls-side-view.jpg" alt="shop_banner_img1">
                    </div>
                </div>
            </div>
        </div>
    </div>
        
        <!--Hot Selling-->
    <div class="section hot_selling_section sec_pading">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 ltext_head">
                    <div class="heading_s1 text-center">
                        <h2> Super Sale Products <i  class="fa fa-bars"></i> </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="super_sale ">
                        <?php if(!empty($view)){
                            $i=1; foreach($view as $prod){ 
                            $imge= $this->db->where('product_id',$prod->id)->get('product_img')->row();
                            $wish = $this->Home_model->get_single_row(TBL_WISHLIST,array('user_id'=>$user_id,'product_id'=>$prod->id));
                            $rate = $this->Home_model->get_average(TBL_REVIEW,$prod->id);
                            $reviews = $this->Home_model->wheredata(TBL_REVIEW,'product_id',$prod->id);
                        ?>
                        <div class="item" id="hidediv<?php echo $i; ?>">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="<?php echo base_url('Product-Detail/'.base64_encode($prod->id)); ?>">
                                            <img src="<?php echo base_url($imge->image);  ?>" alt="product_img2" />
                                        </a>
                                    </div>
                                    <div class="mytimers">
                                        <p id="demos<?php echo $i; ?>"></p>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="<?php echo base_url('Product-Detail/'.base64_encode($prod->id)); ?>"> <?php echo $prod->name; ?> </a></h6>
                                        <div class="product_price">
                                            <span class="price">$<?php echo $prod->price_after_discount; ?></span>
                                            <del>$<?php echo $prod->price; ?></del>
                                            <div class="on_sale">
                                                <span><?php echo $prod->discount; ?>% Off</span>
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating1">
                                            <fieldset id='demo3' class="rating my_stars">
                                                <input class="stars" type="radio" id="3star_a-5<?php echo $i; ?>" name="3rating<?php echo $i; ?>" value="5" <?php if($rate->average_rating ==5){echo 'checked';} ?>/>
                                                <label class="full" for="3star_a-5<?php echo $i; ?>" title="Awesome - 5 stars"></label>
                                                <input class="stars" type="radio" id="3star_a_5-half<?php echo $i; ?>" name="3rating<?php echo $i; ?>" value="4.5" <?php if($rate->average_rating ==4.5){echo 'checked';} ?> />
                                                <label class="half" for="3star_a_5-half<?php echo $i; ?>" title="Pretty good - 4.5 stars"></label>
                                                <input class="stars" type="radio" id="3star_a-4<?php echo $i; ?>" name="3rating<?php echo $i; ?>" value="4"  <?php if($rate->average_rating ==4){echo 'checked';} ?>/>
                                                <label class="full" for="3star_a-4<?php echo $i; ?>" title="Pretty good - 4 stars"></label>
                                                <input class="stars" type="radio" id="3star_a_4-half<?php echo $i; ?>" name="3rating<?php echo $i; ?>" value="3.5" <?php if($rate->average_rating ==3.5){echo 'checked';} ?>/>
                                                <label class="half" for="3star_a_4-half<?php echo $i; ?>" title="Meh - 3.5 stars"></label>
                                                <input class="stars" type="radio" id="3star_a-3<?php echo $i; ?>" name="3rating<?php echo $i; ?>" value="3"  <?php if($rate->average_rating ==3){echo 'checked';} ?>/>
                                                <label class="full" for="3star_a-3<?php echo $i; ?>" title="Meh - 3 stars"></label>
                                                <input class="stars" type="radio" id="3star_a_3-half<?php echo $i; ?>" name="3rating<?php echo $i; ?>" value="2.5"  <?php if($rate->average_rating ==2.5){echo 'checked';} ?>/>
                                                <label class="half" for="3star_a-3-half<?php echo $i; ?>" title="Kinda bad - 2.5 stars"></label>
                                                <input class="stars" type="radio" id="3star2<?php echo $i; ?>" name="3rating<?php echo $i; ?>" value="2"  <?php if($rate->average_rating ==2){echo 'checked';} ?>/>
                                                <label class="full" for="3star2<?php echo $i; ?>" title="Kinda bad - 2 stars"></label>
                                                <input class="stars" type="radio" id="3star2half<?php echo $i; ?>" name="3rating<?php echo $i; ?>" value="1.5"  <?php if($rate->average_rating ==1.5){echo 'checked';} ?>/>
                                                <label class="half" for="3star2half<?php echo $i; ?>" title="Meh - 1.5 stars"></label>
                                                <input class="stars" type="radio" id="3star1<?php echo $i; ?>" name="3rating<?php echo $i; ?>" value="1"  <?php if($rate->average_rating ==1){echo 'checked';} ?>/>
                                                <label class="full" for="3star1<?php echo $i; ?>" title="Sucks big time - 1 star"></label>
                                                <input class="stars" type="radio" id="3starhalf<?php echo $i; ?>" name="3rating<?php echo $i; ?>" value="0.5" <?php if($rate->average_rating ==0.5){echo 'checked';} ?>/>
                                                <label class="half" for="3starhalf<?php echo $i; ?>" title="Sucks big time - 0.5 stars"></label>
                                              </fieldset>
                                            <!--<div class="product_rate" style="width:80%">-->
                                                
                                            <!--    fghgfh-->
                                            <!--</div>-->
                                            <span class="rating_num">(<?php echo count($reviews);   ?>)</span>
                                        </div>
                                            
                                            <div class="product-stock">
                                                <span><?php if($prod->stock <=0){echo 'Out Of Stock';}else{echo 'In Stock';} ?></span>
                                                <span class="rating_num"><?php echo $prod->stock; ?></span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                            <script>
                // Set the date we're counting down to
             
                        var countDownDate<?php echo $i; ?> = new Date("<?php echo $prod->expiry_date; ?>").getTime();
                        
                        // Update the count down every 1 second
                        var x<?php echo $i; ?> = setInterval(function() {
                        
                          // Get today's date and time
                          var now<?php echo $i; ?> = new Date().getTime();
                        
                          // Find the distance between now and the count down date
                          var distance<?php echo $i; ?> = countDownDate<?php echo $i; ?> - now<?php echo $i; ?>;
                         
                          // Time calculations for days, hours, minutes and seconds
                          var days<?php echo $i; ?> = Math.floor(distance<?php echo $i; ?> / (1000 * 60 * 60 * 24));
                          var hours<?php echo $i; ?> = Math.floor((distance<?php echo $i; ?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                          var minutes<?php echo $i; ?> = Math.floor((distance<?php echo $i; ?> % (1000 * 60 * 60)) / (1000 * 60));
                          var seconds<?php echo $i; ?> = Math.floor((distance<?php echo $i; ?> % (1000 * 60)) / 1000);
                            
                          // Output the result in an element with id="demo"
                          
                          document.getElementById("demos<?php echo $i; ?>").innerHTML = days<?php echo $i; ?> + "d " + hours<?php echo $i; ?> + "h "
                          + minutes<?php echo $i; ?> + "m " + seconds<?php echo $i; ?> + "s ";
                            
                          // If the count down is over, write some text 
                          if (distance<?php echo $i; ?> < 0) {
                            clearInterval(x<?php echo $i; ?>);
                            document.getElementById("demos<?php echo $i; ?>").innerHTML = "EXPIRED";
                            $('#hidediv<?php echo $i; ?>').hide();
                          }
                        }, 1000);
                
</script>


                            <?php $i++; }
                            } ?>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hot Selling-->
    
    <div class="section sec_pading" style="padding-bottom: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 paddLR">
                    <div class="single_banner height190">
                        <img src="https://media.npr.org/assets/img/2019/09/23/peanutallergy-1_wide-501bf6c4e8b8f831d0886cb484adf7ff0b42c445.jpg" alt="shop_banner_img1">
                    </div>
                </div>
                <div class="col-md-6 paddLR">
                    <div class="single_banner height190">
                        <img src="https://s21425.pcdn.co/wp-content/uploads/2020/10/set-pecan-pistachios-almond-peanut-cashew-pine-nuts-assorted-nuts-dried-fruits-different-bowls-side-view.jpg" alt="shop_banner_img1">
                    </div>
                </div>
                <div class="col-md-6 paddLR">
                    <div class="single_banner height190">
                        <img src="https://s21425.pcdn.co/wp-content/uploads/2020/10/set-pecan-pistachios-almond-peanut-cashew-pine-nuts-assorted-nuts-dried-fruits-different-bowls-side-view.jpg" alt="shop_banner_img1">
                    </div>
                </div>
                <div class="col-md-6 paddLR">
                    <div class="single_banner height190">
                        <img src="https://media.npr.org/assets/img/2019/09/23/peanutallergy-1_wide-501bf6c4e8b8f831d0886cb484adf7ff0b42c445.jpg" alt="shop_banner_img1">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Super Sale -->
    <div class="section sec_pading">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 ltext_head">
                    <div class="heading_s1 text-center">
                        <h2>Hot Selling Products  <i  class="fa fa-bars"></i> </h2>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="super_sale mysale">
                        <?php if(!empty($supersale)){
                            $j=1; foreach($supersale as $prod){ 
                            $imge= $this->db->where('product_id',$prod->id)->get('product_img')->row();
                            $wish = $this->Home_model->get_single_row(TBL_WISHLIST,array('user_id'=>$user_id,'product_id'=>$prod->id));
                            $rate = $this->Home_model->get_average(TBL_REVIEW,$prod->id);
                            $reviews = $this->Home_model->wheredata(TBL_REVIEW,'product_id',$prod->id);
                        ?>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="<?php echo base_url('Product-Detail/'.base64_encode($prod->id)); ?>">
                                        <img src="<?php echo base_url($imge->image);  ?>" alt="product_img2" />
                                    </a>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="<?php echo base_url('Product-Detail/'.base64_encode($prod->id)); ?>"> <?php echo $prod->name;  ?> </a></h6>
                                    <div class="product_price">
                                        <span class="price">$<?php echo $prod->price_after_discount;  ?></span>
                                        <del>$<?php echo $prod->price;  ?></del>
                                        <div class="on_sale">
                                            <span><?php echo $prod->discount;  ?>% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating1">
                                            <fieldset id='demo2' class="rating my_stars">
                                                <input class="stars" type="radio" id="2star_a-5<?php echo $j; ?>" name="2rating<?php echo $j; ?>" value="5" <?php if($rate->average_rating ==5){echo 'checked';} ?>/>
                                                <label class="full" for="2star_a-5<?php echo $j; ?>" title="Awesome - 5 stars"></label>
                                                <input class="stars" type="radio" id="2star_a_5-half<?php echo $j; ?>" name="2rating<?php echo $j; ?>" value="4.5" <?php if($rate->average_rating ==4.5){echo 'checked';} ?> />
                                                <label class="half" for="2star_a_5-half<?php echo $j; ?>" title="Pretty good - 4.5 stars"></label>
                                                <input class="stars" type="radio" id="2star_a-4<?php echo $j; ?>" name="2rating<?php echo $j; ?>" value="4"  <?php if($rate->average_rating ==4){echo 'checked';} ?>/>
                                                <label class="full" for="2star_a-4<?php echo $j; ?>" title="Pretty good - 4 stars"></label>
                                                <input class="stars" type="radio" id="2star_a_4-half<?php echo $j; ?>" name="2rating<?php echo $j; ?>" value="3.5"<?php if($rate->average_rating ==3.5){echo 'checked';} ?> />
                                                <label class="half" for="2star_a_4-half<?php echo $j; ?>" title="Meh - 3.5 stars"></label>
                                                <input class="stars" type="radio" id="2star_a-3<?php echo $j; ?>" name="2rating<?php echo $j; ?>" value="3" <?php if($rate->average_rating ==3){echo 'checked';} ?>/>
                                                <label class="full" for="2star_a-3<?php echo $j; ?>" title="Meh - 3 stars"></label>
                                                <input class="stars" type="radio" id="2star_a_3-half<?php echo $j; ?>" name="2rating<?php echo $j; ?>" value="2.5" <?php if($rate->average_rating ==2.5){echo 'checked';} ?> />
                                                <label class="half" for="2star_a-3-half<?php echo $j; ?>" title="Kinda bad - 2.5 stars"></label>
                                                <input class="stars" type="radio" id="3star2<?php echo $j; ?>" name="3rating<?php echo $j; ?>" value="2"  <?php if($rate->average_rating ==2){echo 'checked';} ?>/>
                                                <label class="full" for="2star2<?php echo $j; ?>" title="Kinda bad - 2 stars"></label>
                                                <input class="stars" type="radio" id="2star2half<?php echo $j; ?>" name="2rating<?php echo $j; ?>" value="1.5" <?php if($rate->average_rating ==1.5){echo 'checked';} ?> />
                                                <label class="half" for="2star2half<?php echo $j; ?>" title="Meh - 1.5 stars"></label>
                                                <input class="stars" type="radio" id="2star1<?php echo $j; ?>" name="2rating<?php echo $j; ?>" value="1"  <?php if($rate->average_rating ==1){echo 'checked';} ?>/>
                                                <label class="full" for="2star1<?php echo $j; ?>" title="Sucks big time - 1 star"></label>
                                                <input class="stars" type="radio" id="2starhalf<?php echo $j; ?>" name="2rating<?php echo $j; ?>" value="0.5"<?php if($rate->average_rating ==0.5){echo 'checked';} ?> />
                                                <label class="half" for="2starhalf<?php echo $j; ?>" title="Sucks big time - 0.5 stars"></label>
                                            </fieldset>
                                            <span class="rating_num">(<?php echo count($reviews);   ?>)</span>
                                        </div>
                                        
                                        <div class="product-stock">
                                             <span><?php if($prod->stock <=0){echo 'Out Of Stock';}else{echo 'In Stock';} ?></span>
                                            <span class="rating_num"><?php echo $prod->stock;  ?></span>
                                        </div>
                                    </div>
                                    <div class="pr_desc">
                                       <?php echo $prod->description;  ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <?php $j++; } 
                        }
                        ?>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Super Sale -->
    
    
    <!-- START SECTION BANNER -->
    <? /*
    <div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap height160">
        <div class="container">
            <div id="carouselExampleControls2" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $i=1; foreach($banner as $b){ ?>
                    <div class="carousel-item <?php if($i==1){echo 'active';} ?> background_bg" data-img-src="https://www.microbasket.com/wp-content/uploads/2020/06/Nuts.png">
                        <div class="banner_slide_content">
                            <!-- STRART CONTAINER -->
                            <div class="row">
                                <div class="col-lg-7 col-9">
                                    <div class="banner_content overflow-hidden">
                                        <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s"></h5>
                                        <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s"></h2>
                                        <!--<a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>-->
                                    </div>
                                </div>
                            </div>
                            <!-- END CONTAINER-->
                        </div>
                    </div>
                    <?php $i++; } ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev"><i class="ion-chevron-left"></i></a>
                <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next"><i class="ion-chevron-right"></i></a>
            </div>
        </div>
    </div>
    */ ?>
    <!-- END SECTION BANNER -->
    
    <div class="section sec_pading" style="padding-bottom: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single_banner height190">
                        <img src="https://media.npr.org/assets/img/2019/09/23/peanutallergy-1_wide-501bf6c4e8b8f831d0886cb484adf7ff0b42c445.jpg" alt="shop_banner_img1">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
     <!-- START SECTION SHOP -->
    <div class="section sec_pading">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 ltext_head">
                    <div class="heading_s1 text-center">
                        <h2>New season Product <i  class="fa fa-bars"></i> </h2>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="super_sale myseason">
                        <?php if(!empty($newseason)){
                            $i=1; foreach($newseason as $prod){ 
                            $imge= $this->db->where('product_id',$prod->id)->get('product_img')->row();
                            $wish = $this->Home_model->get_single_row(TBL_WISHLIST,array('user_id'=>$user_id,'product_id'=>$prod->id));
                            $rate = $this->Home_model->get_average(TBL_REVIEW,$prod->id);
                            $reviews = $this->Home_model->wheredata(TBL_REVIEW,'product_id',$prod->id);
                        ?>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="<?php echo base_url('Product-Detail/'.base64_encode($prod->id)); ?>">
                                        <img src="<?php echo base_url($imge->image);  ?>" alt="product_img2" />
                                    </a>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="<?php echo base_url('Product-Detail/'.base64_encode($prod->id)); ?>"> <?php echo $prod->name;  ?> </a></h6>
                                    <div class="product_price">
                                        <span class="price">$<?php echo $prod->price_after_discount;  ?></span>
                                        <del>$<?php echo $prod->price;  ?></del>
                                        <div class="on_sale">
                                            <span><?php echo $prod->discount;  ?>% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating1">
                                            <fieldset id='demo1' class="rating my_stars">
                                                <input class="stars" type="radio" id="1star_a-5<?php echo $i; ?>" name="1rating<?php echo $i; ?>" value="5" <?php if($rate->average_rating ==5){echo 'checked';} ?>/>
                                                <label class="full" for="1star_a-5<?php echo $i; ?>" title="Awesome - 5 stars"></label>
                                                <input class="stars" type="radio" id="1star_a_5-half<?php echo $i; ?>" name="1rating<?php echo $i; ?>" value="4.5"  <?php if($rate->average_rating ==4.5){echo 'checked';} ?>/>
                                                <label class="half" for="1star_a_5-half<?php echo $i; ?>" title="Pretty good - 4.5 stars"></label>
                                                <input class="stars" type="radio" id="1star_a-4<?php echo $i; ?>" name="1rating<?php echo $i; ?>" value="4"  <?php if($rate->average_rating ==4){echo 'checked';} ?>/>
                                                <label class="full" for="1star_a-4<?php echo $i; ?>" title="Pretty good - 4 stars"></label>
                                                <input class="stars" type="radio" id="1star_a_4-half<?php echo $i; ?>" name="1rating<?php echo $i; ?>" value="3.5" <?php if($rate->average_rating ==3.5){echo 'checked';} ?>/>
                                                <label class="half" for="1star_a_4-half<?php echo $i; ?>" title="Meh - 3.5 stars"></label>
                                                <input class="stars" type="radio" id="1star_a-3<?php echo $i; ?>" name="1rating<?php echo $i; ?>" value="3" <?php if($rate->average_rating ==3){echo 'checked';} ?> />
                                                <label class="full" for="1star_a-3<?php echo $i; ?>" title="Meh - 3 stars"></label>
                                                <input class="stars" type="radio" id="1star_a_3-half<?php echo $i; ?>" name="1rating<?php echo $i; ?>" value="2.5"  <?php if($rate->average_rating ==2.5){echo 'checked';} ?>/>
                                                <label class="half" for="1star_a-3-half<?php echo $i; ?>" title="Kinda bad - 2.5 stars"></label>
                                                <input class="stars" type="radio" id="1star2<?php echo $i; ?>" name="1rating<?php echo $i; ?>" value="2"  <?php if($rate->average_rating ==2){echo 'checked';} ?>/>
                                                <label class="full" for="1star2<?php echo $i; ?>" title="Kinda bad - 2 stars"></label>
                                                <input class="stars" type="radio" id="1star2half<?php echo $i; ?>" name="1rating<?php echo $i; ?>" value="1.5"  <?php if($rate->average_rating ==1.5){echo 'checked';} ?>/>
                                                <label class="half" for="1star2half<?php echo $i; ?>" title="Meh - 1.5 stars"></label>
                                                <input class="stars" type="radio" id="1star1<?php echo $i; ?>" name="1rating<?php echo $i; ?>" value="1"  <?php if($rate->average_rating ==1){echo 'checked';} ?>/>
                                                <label class="full" for="1star1<?php echo $i; ?>" title="Sucks big time - 1 star"></label>
                                                <input class="stars" type="radio" id="1starhalf<?php echo $i; ?>" name="1rating<?php echo $i; ?>" value="0.5" <?php if($rate->average_rating ==0.5){echo 'checked';} ?>/>
                                                <label class="half" for="1starhalf<?php echo $i; ?>" title="Sucks big time - 0.5 stars"></label>
                                            </fieldset>
                                            <span class="rating_num">(<?php echo count($reviews);   ?>)</span>
                                        </div>
                                        
                                        <div class="product-stock">
                                            <span><?php if($prod->stock <=0){echo 'Out Of Stock';}else{echo 'In Stock';} ?></span>
                                            <span class="rating_num"><?php echo $prod->stock;  ?></span>
                                        </div>
                                    </div>
                                    <div class="pr_desc">
                                       <?php echo $prod->description;  ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <?php $i++; } 
                        }
                        ?>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
    <!-- END SECTION SHOP -->
    
    
    
    

    <!-- START SECTION SINGLE BANNER -->
    <div class="section bg_light_blue2 download_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h3> Download our App now! </h3>
                    <p> Keep your tickets in your pocket and share them easily to your friends & family via our app. Get the latest updates and notifications on our promotions too. What are you waiting for? Download now! </p>
                    <div class="download_btns">
                        <a href="javascript:;" class="mybtn"></a>
                        <a href="javascript:;" style="background-position: 0 -54px;" class="mybtn appBtns"></a>
                    </div>

                </div>
                <div class="col-md-5">
                    <img style="" src="<?php echo base_url('assets/websiteassets/img'); ?>/bgnew.png" alt="" >
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SINGLE BANNER -->

    
</div>
<!-- END MAIN CONTENT -->
<style>
    .sidediv{
        position: fixed;
        bottom: 10%;
        right: -420px;
        width: 380px;
        height: auto;
        background: #0B9712;
        box-shadow: 0px 0px 6px 0px #ddd;
        text-align: center;
        transition: right 0.5s ease;
        padding: 15px 10px;
        margin-bottom: 25px;
        z-index: 1;
    }
    .sidediv p{margin-bottom: 0 !important;}
    
    .rightenablefix {
     right: 0px;   
     transition: right 0.5s ease;
    }
    
    .sidediv{color: #fff; font-weight: 600;}
</style>

<div class="sidediv">
     
</div>
<?php include('footer.php'); ?>


<style>
.rating {
  border: none;
  float: left;
}

.rating>input {
  display: none;
}

.rating>label:before {
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating>.half:before {
  content: "\f089";
  position: absolute;
}

.rating>label {
  color: #ddd;
  float: right;
}

.rating>input:checked~label,
.rating:not(:checked)>label:hover,
.rating:not(:checked)>label:hover~label {
  color: #FFD700;
}


.rating>input:checked+label:hover,
.rating>input:checked~label:hover,
.rating>label:hover~input:checked~label,
.rating>input:checked~label:hover~label {
  color: #FFED85;
}

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
$('document').ready(function() {
  $('.toggleswitch').bootstrapToggle();
  $(".rating").click(function() {
    alert($(this).val());
    $(this).attr("checked");
  });
});
</script>


<script>
    function wishlist(product_id){
       
     
       //alert(product_id);
$.ajax({
        url: '<?php echo base_url();?>website/Product/wishlist',
        data: {product_id:product_id},
        type: 'post',
        success: function(data) {
          if(data == 0){
                  window.location.href = '<?php echo base_url();?>website/Login';
          }else if(data == 1){
                $('.sidediv').hide();
                 $('#wishmsg').show();
                 $('.sidediv').html('<p style="color:#fff;">Thank You , Item Added To  wishlist!!</p>')
                   $('.sidediv').show();
                  $('.sidediv').addClass('rightenablefix');
                   setTimeout(function() {
                    $('.sidediv').removeClass('rightenablefix');
                   $('.sidediv').fadeOut('slow');
                   }, 3000); 
          }else{
                $('.sidediv').hide();
              $('#wishmsg').show();
              $('.sidediv').html('<p style="color:#fff;">Thank You , Item Deleted From wishlist!!</p>')
               $('.sidediv').show();
                 $('.sidediv').addClass('rightenablefix');
                  setTimeout(function() {
                  $('.sidediv').removeClass('rightenablefix');
                   $('.sidediv').fadeOut('slow');
                   }, 3000);
          }
         

          }
          
                  
    });

    }
    
</script>

<script>
    $(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
});
</script>













<?php include('header.php'); ?>


<!-- END MAIN CONTENT -->
<div class="main_content content-bg">
    <div class="full-page-wrapper">
    <div class="container">
    <!-- START SECTION BANNER -->
  <?php include('sidebar.php'); ?>
    <section class="page-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                        
        <div class="profile-sec">
            <div class="container">
               
                <div class="row shop_container list" id="my-account-sec">
 <?php
                             
    if($this->session->flashdata('message') != ''){
        echo '<div class="alert alert-success text-center">'.$this->session->flashdata('message').'</div>';
    }elseif($this->session->flashdata('errmessage') != ''){
         echo '<div class="alert alert-danger text-center">'.$this->session->flashdata('errmessage').'</div>';
    } ?>
                <div class="col-lg-12">
                    <div class="profile-content">
                        <h4>My Wishlist  </h4>
                    </div>
                </div>


                    <!-- order history start here -->

                    <!-- 1st item history -->
             <?php foreach($wishlist as $wish){ 
              $img = $this->Home_model->get_single_row(TBL_PRODUCT_IMG,array('product_id'=>$wish->product_id));
              
              $prod = $this->Home_model->get_single_row(TBL_PRODUCT,array('id'=>$wish->product_id));
             ?>
                <!--<div class="col-lg-12">-->
                <!--   <div class="card card-order wish-card">-->
                <!--   <div class="row">-->

                <!--    <div class="col-lg-3">-->
                       
                <!--        <img src="<?php if($img->image != ''){echo base_url($img->image);}else{echo base_url."assets/websiteassets/img/download.jpeg";}  ?>" alt="product_img3">-->
                      
                <!--    </div>-->

                <!--    <div class="col-lg-7">-->
                    
                <!--    <div class="product_info">-->
                <!--        <h6 class="product_title">-->
                <!--            <a href="<?php echo base_url();?>Product-Detail/<?php echo base64_encode($prod->id); ?>"><?php echo $prod->name; ?></a>-->
                <!--        </h6>-->
                <!--        <?php echo $prod->description; ?>-->
                       
                <!--        <div class="product_price">-->
                <!--            <span class="price">$<?php echo $prod->price_after_discount; ?></span>-->
                <!--            <del>$<?php echo $prod->price; ?></del>-->
                <!--            <div class="on_sale">-->
                <!--                <span><?php echo $prod->discount; ?>% Off</span>-->
                <!--            </div>-->
                <!--        </div>-->

                <!--        <div class="product-wishlist">-->
                <!--        <div class="rating_wrap">-->
                        
                <!--       <div class="rating-area">-->
                <!--           <button class="ratingbtn">-->
                <!--             4.5 <i class="linearicons-star"></i> -->
                <!--           </button>-->
                <!--       </div>-->
                       
                <!--        <div class="product-stock">-->
                <!--        <span>In Stock</span>-->
                <!--        <span class="rating_num">(<?php echo $prod->stock; ?>)</span>-->
                <!--        </div>-->

                <!--        </div>-->
                <!--        </div>-->
                <!--        </div>-->

                <!--         col-lg-7 end -->
                <!--    </div>-->

                <!--    <div class="col-lg-2">-->
                <!--        <div class="wish-icon">-->
                <!--       <a onClick="return confirm('Are you sure you want to delete ')"  href="<?php echo base_url('website/Wishlist/wishlistdelete/'.base64_encode($wish->wishlist_id)); ?>" ><i class="fa fa-heart mygreen" id="heart " ></i></a> -->
                <!--        </div>-->
                <!--    </div>-->

                <!--    </div>-->
                <!--    </div>-->
                <!--  </div>-->
                  
                <div class="product">
                    <div class="product_img">
                        <a href="<?php echo base_url();?>Product-Detail/<?php echo base64_encode($prod->id); ?>">
                            <img src="<?php if($img->image != ''){echo base_url($img->image);}else{echo base_url."assets/websiteassets/img/download.jpeg";}  ?>" alt="product_img3">
                        </a>
                        <div class="product_action_box">
                            <ul class="list_none pr_action_btn">
                                <li><a href="product-detail.php"><i class="icon-magnifier-add"></i></a></li>
                                <li><a href="wishlist.php"><i class="icon-heart"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product_info">
                        <h6 class="product_title">
                            <a href="<?php echo base_url();?>Product-Detail/<?php echo base64_encode($prod->id); ?>"><?php echo $prod->name; ?></a>
                            <a onClick="return confirm('Are you sure you want to delete ')"  href="<?php echo base_url('website/Wishlist/wishlistdelete/'.base64_encode($wish->wishlist_id)); ?>" ><i style="float: right;" class="fa fa-heart mygreen"></i></a>
                        </h6>
                        <!--<div class="product_price">-->
                        <!--    <span class="price">$45.00</span>-->
                        <!--    <del>$55.25</del>-->
                        <!--    <div class="on_sale">-->
                        <!--        <span>35% Off</span>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="product_price">
                            <span class="price">$<?php echo $prod->price_after_discount; ?></span>
                            <del>$<?php echo $prod->price; ?></del>
                            <div class="on_sale">
                                <span><?php echo $prod->discount; ?>% Off</span>
                            </div>
                        </div>
                        <div class="rating_wrap">
                            <!--<div class="rating">-->
                            <!--    <div class="product_rate" style="width:80%">-->
                            <!--        fsdf-->
                            <!--    </div>-->
                            <!--</div>-->
                            <fieldset id='demo3' class="rating">
                                <input class="stars" type="radio" id="3star_a-5" name="3rating" value="5"  />
                                <label class="full" for="3star_a-5" title="Awesome - 5 stars"></label>
                                <input class="stars" type="radio" id="3star_a_5-half" name="3rating" value="4.5"  />
                                <label class="half" for="3star_a_5-half" title="Pretty good - 4.5 stars"></label>
                                <input class="stars" type="radio" id="3star_a-4" name="3rating" value="4"  />
                                <label class="full" for="3star_a-4" title="Pretty good - 4 stars"></label>
                                <input class="stars" type="radio" id="3star_a_4-half" name="3rating" value="3.5" />
                                <label class="half" for="3star_a_4-half" title="Meh - 3.5 stars"></label>
                                <input class="stars" type="radio" id="3star_a-3" name="3rating" value="3"  />
                                <label class="full" for="3star_a-3" title="Meh - 3 stars"></label>
                                <input class="stars" type="radio" id="3star_a_3-half" name="3rating" value="2.5"  />
                                <label class="half" for="3star_a-3-half" title="Kinda bad - 2.5 stars"></label>
                                <input class="stars" type="radio" id="3star2" name="3rating" value="2" />
                                <label class="full" for="3star2" title="Kinda bad - 2 stars"></label>
                                <input class="stars" type="radio" id="3star2half" name="3rating" value="1.5" />
                                <label class="half" for="3star2half" title="Meh - 1.5 stars"></label>
                                <input class="stars" type="radio" id="3star1" name="3rating" value="1"  />
                                <label class="full" for="3star1" title="Sucks big time - 1 star"></label>
                                <input class="stars" type="radio" id="3starhalf" name="3rating" value="0.5"/>
                                <label class="half" for="3starhalf" title="Sucks big time - 0.5 stars"></label>
                              </fieldset>
                            (<?php echo $prod->stock; ?>) </span>
                        </div>
                       
                        <!--<div class="list_product_action_box">-->
                        <!--    <ul class="list_none pr_action_btn">-->
                        <!--        <li class="add-to-cart"><a href="cart.php"><i class="icon-basket-loaded"></i> Add To Cart</a></li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                    </div>
                </div>


               <?php } ?>     
                

                <!-- item history end here -->

                </div>
                <!-- row end -->
                </div>
                <!-- container end -->
                </div>
                <!-- profile-sec end -->
                </div>
            </div>
            <!-- row end -->
        </div>
        <!-- container end -->
    </section>
    </div>
    </div>
    <!-- END SECTION BANNER -->
</div>
<!-- END MAIN CONTENT -->

<?php include('footer.php'); ?>

<style>
.rating {
  border: none;
  float: left;
}

.rating_wrap .rating{
    height: auto;
    height: auto;
    width: auto;
}

.rating::before{display: none;}

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

<script src="http://www.bootstraptoggle.com/js/bootstrap-toggle.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
$('document').ready(function() {
  $('.toggleswitch').bootstrapToggle();
  $("fieldset[id^='demo'] .stars").click(function() {
    alert($(this).val());
    $(this).attr("checked");
  });
});
</script>



<style>
    .mygreen{
        color: #64c169;
    }
</style>

<script>
   $(document).ready(function(){
    $('.wish-icon i').click(function(){
        $(this).toggleClass('mygreen');
    });
   });
</script>
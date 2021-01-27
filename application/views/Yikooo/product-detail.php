        
<?php include('header.php'); ?>

<style>
.star-rating {
      display:flex;
      flex-direction: row-reverse;
      font-size:1.5em;
      justify-content:space-around;
      padding:0 .2em;
      text-align:center;
      width:5em;
    }
    
    .star-rating input {
      display:none;
    }
    
    .star-rating label {
      color:#ccc;
      cursor:pointer;
    }
    
    .star-rating :checked ~ label {
      color:#f90;
    }
    
    .star-rating label:hover,
    .star-rating label:hover ~ label {
      color:#fc0;
    }
</style>

<!-- START SECTION BANNER -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Product-Detail</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Product Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BANNER -->
 <?php
                             
    if($this->session->flashdata('message') != ''){
        echo '<div class="alert alert-success text-center">'.$this->session->flashdata('message').'</div>';
    }elseif($this->session->flashdata('errmessage') != ''){
         echo '<div class="alert alert-danger text-center">'.$this->session->flashdata('errmessage').'</div>';
    } ?>
<!-- END MAIN CONTENT -->
<div class="main_content">
    <!-- START SECTION BANNER -->
    <div class="section product-details-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                  
                    <?php $img = $this->db->where('product_id',$product->prod_id)->get('product_img')->row(); ?>
                  <div class="product-image">
                        <div class="product_img_box">
                            <img id="product_img" src='<?php echo base_url($img->image); ?>' data-zoom-image="<?php echo base_url($img->image); ?>" alt="product_img1" />
                            <a href="#" class="product_img_zoom" title="Zoom">
                                <span class="linearicons-zoom-in"></span>
                            </a>
                        </div>
                       
                        <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                             <?php $imgarr = $this->db->where('product_id',$product->prod_id)->get('product_img')->result();
                         foreach($imgarr as $imgarr){
                        ?>
                            <div class="item">
                                <a href="#" class="product_gallery_item active" data-image="<?php echo base_url($imgarr->image); ?>" data-zoom-image="<?php echo base_url($imgarr->image); ?>">
                                    <img src="<?php echo base_url($imgarr->image); ?>" alt="product_small_img1" />
                                </a>
                            </div>
                            <?php } ?>
                            <!--<div class="item">-->
                            <!--    <a href="#" class="product_gallery_item" data-image="assets/img/product/product4.png" data-zoom-image="assets/images/product_zoom_img2.jpg">-->
                            <!--        <img src="assets/img/product/product4.png" alt="product_small_img2" />-->
                            <!--    </a>-->
                            <!--</div>-->
                            <!--<div class="item">-->
                            <!--    <a href="#" class="product_gallery_item" data-image="assets/img/product/product4.png" data-zoom-image="assets/images/product_zoom_img3.jpg">-->
                            <!--        <img src="assets/img/product/product4.png" alt="product_small_img3" />-->
                            <!--    </a>-->
                            <!--</div>-->
                            <!--<div class="item">-->
                            <!--    <a href="#" class="product_gallery_item" data-image="assets/img/product/product4.png" data-zoom-image="assets/img/product/product4.png">-->
                            <!--        <img src="assets/img/product/product4.png" alt="product_small_img4" />-->
                            <!--    </a>-->
                            <!--</div>-->
                            <!--<div class="item">-->
                            <!--    <a href="#" class="product_gallery_item" data-image="assets/img/product/product4.png" data-zoom-image="assets/img/product/product4.png">-->
                            <!--        <img src="assets/img/product/product4.png" alt="product_small_img2" />-->
                            <!--    </a>-->
                            <!--</div>-->
                            <!--<div class="item">-->
                            <!--    <a href="#" class="product_gallery_item" data-image="assets/img/product/product4.png" data-zoom-image="assets/img/product/product4.png">-->
                            <!--        <img src="assets/img/product/product4.png" alt="product_small_img3" />-->
                            <!--    </a>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="pr_detail">
                        <div class="product_description">
                            <h4 class="product_title"><a href="#"><?php echo $product->prod_name; ?></a></h4>
                            <div class="product_price">
                                <span class="price">$<?php echo $product->prod_discount_price; ?></span>
                                <del>$<?php echo $product->prod_price; ?></del>
                                <div class="on_sale">
                                    <span><?php echo $product->prod_discount; ?>% Off</span>
                                </div>
                            </div>
                            <?php $rate = $this->Home_model->get_average(TBL_REVIEW,$product->prod_id); 
                                  $reviews = $this->Home_model->wheredata(TBL_REVIEW,'product_id',$product->prod_id);
                            ?>
                            <div class="rating_wrap">
                                    <div class="rating1">
                                      <fieldset id='demo1' class="rating setstar">
                                                <input class="stars" type="radio" id="starone5" name="starrating" value="5" <?php if($rate->average_rating ==5){echo 'checked';} ?> />
                                                <label class="full" for="starone5" title="Awesome - 5 stars"></label>
                                                <input class="stars" type="radio" id="starone5-half" name="starrating" value="4.5" <?php if($rate->average_rating ==4.5){echo 'checked';} ?> />
                                                <label class="half" for="starone5-half" title="Pretty good - 4.5 stars"></label>
                                                <input class="stars" type="radio" id="starone4" name="starrating" value="4" <?php if($rate->average_rating ==4){echo 'checked';} ?> />
                                                <label class="full" for="starone4" title="Pretty good - 4 stars"></label>
                                                <input class="stars" type="radio" id="starone4-half" name="starrating" value="3.5"  <?php if($rate->average_rating ==3.5){echo 'checked';} ?>/>
                                                <label class="half" for="starone4-half" title="Meh - 3.5 stars"></label>
                                                <input class="stars" type="radio" id="starone3" name="starrating" value="3" <?php if($rate->average_rating ==3){echo 'checked';} ?> />
                                                <label class="full" for="starone3" title="Meh - 3 stars"></label>
                                                <input class="stars" type="radio" id="starone3-half" name="starrating" value="2.5" <?php if($rate->average_rating ==2.5){echo 'checked';} ?> />
                                                <label class="half" for="starone3-half" title="Kinda bad - 2.5 stars"></label>
                                                <input class="stars" type="radio" id="starone2" name="starrating" value="2" <?php if($rate->average_rating ==2){echo 'checked';} ?> />
                                                <label class="full" for="starone2" title="Kinda bad - 2 stars"></label>
                                                <input class="stars" type="radio" id="starone2-half" name="starrating" value="1.5" <?php if($rate->average_rating ==1.5){echo 'checked';} ?> />
                                                <label class="half" for="starone2-half" title="Meh - 1.5 stars"></label>
                                                <input class="stars" type="radio" id="starone1" name="starrating" value="1" <?php if($rate->average_rating ==1){echo 'checked';} ?> />
                                                <label class="full" for="starone1" title="Sucks big time - 1 star"></label>
                                                <input class="stars" type="radio" id="starone1-half" name="starrating" value="0.5" <?php if($rate->average_rating ==0.5){echo 'checked';} ?>/>
                                                <label class="half" for="starone1-half" title="Sucks big time - 0.5 stars"></label>
                                      </fieldset>
                                      <span class="rating_num">(<?php echo count($review); ?>)</span>
                                    </div>
                                    
                                </div>
                            <div class="pr_desc">
                                 <?php echo $product->prod_detail; ?>
                            </div>
                            <!--<div class="product_sort_info">-->
                            <!--    <ul>-->
                            <!--        <li><i class="linearicons-shield-check"></i> 1 Year AL Jazeera Brand Warranty</li>-->
                            <!--        <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>-->
                            <!--        <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>-->
                            <!--    </ul>-->
                            <!--</div>-->
                             <?php $colorarr = $this->db->where('product_id',$product->prod_id)->get('product_color')->result();
                              if(count($colorarr)!=0){?>
                             
                            <div class="pr_switch_wrap">
                                <span class="switch_lable">Color</span>
                                <div class="product_color_switch">
                               <?php     
                        $i=1; foreach($colorarr as $colorarr){
                        $c = $this->db->where('id',$colorarr->color)->get('color')->row();
                        ?>  
                                    <span  data-color="<?php echo $c->code; ?>" onclick="getcolor(<?php echo $c->id; ?>)" ></span>
                                    <!--<span data-color="#333333"></span>-->
                                    <!--<span data-color="#DA323F"></span>-->
                                    <?php $i++; } ?>
                                     <input id="color_input" value="" type="hidden">
                                </div>
                            </div>
                              <?php } $size = $this->db->where('product_id',$product->prod_id)->get('product_size')->result();
                             ;
                              if(count($size)!=0){?>
                            <div class="pr_switch_wrap">
                                <span class="switch_lable">Size</span>
                                <div class="product_size_switch">
                            <?php     
                        $i=1; foreach($size as $size){
                             $s = $this->db->where('id',$size->size)->get('size')->row();
                        ?> 
                                    <span  onclick="getval(<?php echo $s->id; ?>)"><?php echo $s->name; ?></span>
                                   
                                    <?php $i++; } ?>
                                    <input id="size_input" value="" type="hidden">
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <hr />
                        <div class="cart_extra">
                            <div class="cart-product-quantity">
                                <div class="quantity">
                                    <input type="button" value="-" class="minus">
                                    <input type="text" name="quantity" value="1" title="Qty"  class="qty" id="qty" size="4">
                                    <input type="button" value="+" class="plus">
                                </div>
                            </div>
                           
                        </div>
                        <hr />
                          <span id="errormsg"></span>
                            <?php  if($product->prod_stock == 0){?>
                                            <span style='color:red;'> Out Of Stock</span>
                                            <?php }else{ ?>
                            <div class="cart_btn">
                                <button class="btn btn-fill-out btn-addtocart" type="button" onclick="addtocart(<?php echo $product->prod_id;  ?>);"><i class="icon-basket-loaded"></i> Add to cart</button>
                             </div>
                             <?php } ?>
                        <ul class="product-meta">
                           
                            <li>Category: <a href="#"><?php echo $product->category_name; ?></a></li>
                            <!-- <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">printed</a> </li> -->
                        </ul>
                        
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="large_divider clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews (<?php echo count($review); ?>)</a>
                            </li>
                        </ul>
                        <div class="tab-content shop_info_tab">
                            <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                               <?php echo $product->prod_detail; ?>
                            </div>
                           
                            <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                <div class="comments">
                                    <h5 class="product_tab_title"><?php echo count($review); ?> Review For <span><?php echo $product->prod_name; ?></span></h5>
                                    <ul class="list_none comment_list mt-4">
                                        <?php foreach($review  as $review){
                                         $user= $this->Home_model->get_single_row(TBL_USER,array('user_id'=>$review->user_id));

                                        ?>
                                        <li>
                                            <div class="comment_img">
                                                <img src="<?php echo base_url($user->image); ?>" alt="user1"/>
                                            </div>
                                            <div class="comment_block">
                                                <div class="rating_wrap">
                                                    <div class="rating1">
                                                      <fieldset id='demo2' class="rating setstar">
                                                        <input class="stars" type="radio" id="startwo5" name="starrating2" value="5" <?php if($review->rating ==5){echo 'checked';} ?> />
                                                        <label class="full" for="startwo5" title="Awesome - 5 stars"></label>
                                                        <input class="stars" type="radio" id="startwo5-half" name="starrating2" value="4.5" <?php if($review->rating ==4.5){echo 'checked';} ?> />
                                                        <label class="half" for="startwo5-half" title="Pretty good - 4.5 stars"></label>
                                                        <input class="stars" type="radio" id="startwo4" name="starrating2" value="4" <?php if($review->rating ==4){echo 'checked';} ?> />
                                                        <label class="full" for="startwo4" title="Pretty good - 4 stars"></label>
                                                        <input class="stars" type="radio" id="startwo4-half" name="starrating2" value="3.5"  <?php if($review->rating ==3.5){echo 'checked';} ?>/>
                                                        <label class="half" for="startwo4-half" title="Meh - 3.5 stars"></label>
                                                        <input class="stars" type="radio" id="startwo3" name="starrating2" value="3" <?php if($review->rating ==3){echo 'checked';} ?> />
                                                        <label class="full" for="startwo3" title="Meh - 3 stars"></label>
                                                        <input class="stars" type="radio" id="startwo3-half" name="starrating2" value="2.5" <?php if($review->rating ==2.5){echo 'checked';} ?> />
                                                        <label class="half" for="startwo3-half" title="Kinda bad - 2.5 stars"></label>
                                                        <input class="stars" type="radio" id="startwo2" name="starrating2" value="2" <?php if($review->rating ==2){echo 'checked';} ?> />
                                                        <label class="full" for="startwo2" title="Kinda bad - 2 stars"></label>
                                                        <input class="stars" type="radio" id="startwo2-half" name="starrating2" value="1.5" <?php if($review->rating ==1.5){echo 'checked';} ?> />
                                                        <label class="half" for="startwo2-half" title="Meh - 1.5 stars"></label>
                                                        <input class="stars" type="radio" id="startwo1" name="starrating2" value="1" <?php if($review->rating ==1){echo 'checked';} ?> />
                                                        <label class="full" for="startwo1" title="Sucks big time - 1 star"></label>
                                                        <input class="stars" type="radio" id="startwo1-half" name="starrating2" value="0.5" <?php if($review->rating ==0.5){echo 'checked';} ?>/>
                                                        <label class="half" for="startwo1-half" title="Sucks big time - 0.5 stars"></label>
                                                      </fieldset>
                                                    </div>
                                                    <!--<span class="rating_num">(<?php echo $product->prod_stock; ?>)</span>-->
                                                </div>
                                                <p class="customer_meta">
                                                    <span class="review_author"><?php echo $user->name; ?></span>
                                                    <span class="comment-date"><?php echo $newDate = date("F j,Y", strtotime($review->created_on)); ?></span>
                                                </p>
                                                <div class="description">
                                                    <p><?php echo $review->review; ?></p>
                                                </div>
                                            </div>
                                        </li>
                                        <?php } ?>
                                        <!--<li>-->
                                        <!--    <div class="comment_img">-->
                                        <!--        <img src="assets/images/user2.jpg" alt="user2"/>-->
                                        <!--    </div>-->
                                        <!--    <div class="comment_block">-->
                                        <!--        <div class="rating_wrap">-->
                                        <!--            <div class="rating">-->
                                        <!--                <div class="product_rate" style="width:10%"></div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--        <p class="customer_meta">-->
                                        <!--            <span class="review_author">Grace Wong</span>-->
                                        <!--            <span class="comment-date">June 17, 2018</span>-->
                                        <!--        </p>-->
                                        <!--        <div class="description">-->
                                        <!--            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                    </ul>
                                </div>
                                <?php
                                 $urldirect=base64_decode($this->uri->segment(3));
                                if($urldirect == 'ratesuccess'){
                                ?>
                                <div class="review_form field_form">
                                    <h5>Add a review</h5>
                                    <form class="row mt-3" method="post" action="<?php echo base_url('website/Product/addreview'); ?>" enctype="multipart/form-data">
                                        <div class="form-group col-12">
                                            
                                            
                                        <div class="star-rating">
                                          <input type="radio" id="5-stars" name="rating" value="5" />
                                          <label for="5-stars" class="star">&#9733;</label>
                                          <input type="radio" id="4-stars" name="rating" value="4" />
                                          <label for="4-stars" class="star">&#9733;</label>
                                          <input type="radio" id="3-stars" name="rating" value="3" />
                                          <label for="3-stars" class="star">&#9733;</label>
                                          <input type="radio" id="2-stars" name="rating" value="2" />
                                          <label for="2-stars" class="star">&#9733;</label>
                                          <input type="radio" id="1-star" name="rating" value="1" />
                                          <label for="1-star" class="star">&#9733;</label>
                                        </div>
                                      <input type="hidden" value="<?php echo $product->prod_id; ?>" name="product_id"/>
                                            
                                            <!--<div class="star_rating">-->
                                            <!--    <span data-value="1"><i class="far fa-star"></i></span>-->
                                            <!--    <span data-value="2"><i class="far fa-star"></i></span> -->
                                            <!--    <span data-value="3"><i class="far fa-star"></i></span>-->
                                            <!--    <span data-value="4"><i class="far fa-star"></i></span>-->
                                            <!--    <span data-value="5"><i class="far fa-star"></i></span>-->
                                            <!--</div>-->
                                        </div>
                                        <div class="form-group col-12">
                                            <textarea required="required" placeholder="Your review *" class="form-control" name="review" rows="4"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input required="required" class="form-control" name="image[]" type="file" multiple>
                                         </div>
                                        <div class="form-group col-12">
                                            <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Submit Review</button>
                                        </div>
                                    </form>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="small_divider"></div>
                    <div class="divider"></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="heading_s1">
                        <h3>Releted Products</h3>
                    </div>
                    <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                        
                        
                        <?php $related = $this->db->where('category',$product->prod_category)->get('product')->result();
                        $i=1; foreach($related as $related){
                             $image = $this->db->where('product_id',$related->id)->get('product_img')->row();
                               $rate1 = $this->Home_model->get_average(TBL_REVIEW,$related->id); 
                                 
                        
                        ?> 
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="<?php echo base_url('Product-Detail/'.base64_encode($related->id)); ?>">
                                        <img src="<?php echo base_url($image->image); ?>" alt="product_img1">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <!--<li class="add-to-cart"><a href="cart.php"><i class="icon-basket-loaded"></i> Add to Cart</a></li>-->
                                            
                                            <li><a href="" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <!--<li><a href="wishlist.php"><i class="icon-heart"></i></a></li>-->
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="<?php echo base_url('Product-Detail/'.base64_encode($related->id)); ?>"><?php echo $related->name; ?></a></h6>
                                    <div class="product_price">
                                        <span class="price">$<?php echo $related->price_after_discount; ?></span>
                                        <del>$<?php echo $related->price; ?></del>
                                        <div class="on_sale">
                                            <span><?php echo $related->discount; ?>% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating removeStar" style="width: auto; overflow: visible;">
                                            <fieldset id='demo3' class="rating setstar">
                                                <input class="stars" type="radio" id="starthree5" name="starrating3" value="5" <?php if($rate1->average_rating ==5){echo 'checked';} ?> />
                                                <label class="full" for="starthree5" title="Awesome - 5 stars"></label>
                                                <input class="stars" type="radio" id="starthree5-half" name="starrating3" value="4.5" <?php if($rate1->average_rating ==4.5){echo 'checked';} ?> />
                                                <label class="half" for="starthree5-half" title="Pretty good - 4.5 stars"></label>
                                                <input class="stars" type="radio" id="starthree4" name="starrating3" value="4" <?php if($rate1->average_rating ==4){echo 'checked';} ?> />
                                                <label class="full" for="starthree4" title="Pretty good - 4 stars"></label>
                                                <input class="stars" type="radio" id="starthree4-half" name="starrating3" value="3.5"  <?php if($rate1->average_rating ==3.5){echo 'checked';} ?>/>
                                                <label class="half" for="starthree4-half" title="Meh - 3.5 stars"></label>
                                                <input class="stars" type="radio" id="starthree3" name="starrating3" value="3" <?php if($rate1->average_rating ==3){echo 'checked';} ?> />
                                                <label class="full" for="starthree3" title="Meh - 3 stars"></label>
                                                <input class="stars" type="radio" id="starthree3-half" name="starrating3" value="2.5" <?php if($rate1->average_rating ==2.5){echo 'checked';} ?> />
                                                <label class="half" for="starthree3-half" title="Kinda bad - 2.5 stars"></label>
                                                <input class="stars" type="radio" id="starthree2" name="starrating3" value="2" <?php if($rate1->average_rating ==2){echo 'checked';} ?> />
                                                <label class="full" for="starthree2" title="Kinda bad - 2 stars"></label>
                                                <input class="stars" type="radio" id="starthree2-half" name="starrating3" value="1.5" <?php if($rate1->average_rating ==1.5){echo 'checked';} ?> />
                                                <label class="half" for="starthree2-half" title="Meh - 1.5 stars"></label>
                                                <input class="stars" type="radio" id="starthree1" name="starrating3" value="1" <?php if($rate1->average_rating ==1){echo 'checked';} ?> />
                                                <label class="full" for="starthree1" title="Sucks big time - 1 star"></label>
                                                <input class="stars" type="radio" id="starthree1-half" name="starrating3" value="0.5" <?php if($rate1->average_rating ==0.5){echo 'checked';} ?>/>
                                                <label class="half" for="starthree1-half" title="Sucks big time - 0.5 stars"></label>
                                              </fieldset>
                                        </div>
                                        <div class="product-stock">
                                            <span>In Stock</span>
                                            <span class="rating_num">(<?php echo $related->stock; ?>)</span>
                                        </div>
                                    </div>
                                    <div class="pr_desc">
                                       <?php echo $related->description; ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <?php  } ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->
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
    .rating>label:before{margin: 1px !important;}
    .sidediv p{margin-bottom: 0 !important;}
    
    .rightenablefix {
     right: 0px;   
     transition: right 0.5s ease;
    }
    .removeStar:before{display: none;}
    .sidediv{color: #fff; font-weight: 600;}
    .setstar{height: auto !important; width: auto !important;}
    .setstar:before{display: none;}
</style>

<div class="sidediv">
     
</div>
<script>
  function addtocart(product_id){
     
     
    var size= $('#size_input').val();
    var color= $('#color_input').val();
    var qty= $('#qty').val();
    if(size == ''){
        $('#errormsg').html('<p style="color:red;"> Size is required please select size.</p>');
    }else if(color==''){
         $('#errormsg').html('<p style="color:red;"> Color is required please select color.</p>');
    }else{
       //alert(size);
$.ajax({
        url: '<?php echo base_url();?>website/Product/addtocart',
        data: {product_id:product_id,size:size,color:color,qty:qty},
        type: 'post',
        success: function(data) {
          if(data == 0){
                  window.location.href = '<?php echo base_url();?>website/Login';
          }else if(data.trim() !='updtqty'){
              $('#cartcount').html(data);
                  $('.sidediv').hide();
                 
                 $('.sidediv').html('<p style="color:#fff;">Thank You , Item Added To  Cart!!</p>')
                  $('.sidediv').show();
                  $('.sidediv').addClass('rightenablefix');
                  setTimeout(function() {
                    $('.sidediv').removeClass('rightenablefix');
                  $('.sidediv').fadeOut('slow');
                  }, 3000);
          }else{
              $('.sidediv').hide();
              
              $('.sidediv').html('<p style="color:#fff;">Thank You , Item Updated To Cart!!</p>')
              $('.sidediv').show();
                 $('.sidediv').addClass('rightenablefix');
                  setTimeout(function() {
                  $('.sidediv').removeClass('rightenablefix');
                  $('.sidediv').fadeOut('slow');
                  }, 3000);
          }
          setTimeout(function() {
             $('#wishmsg').fadeOut('slow');
          }, 3000);

          }
          
                  
    });

    }
 }  
    
    function getval(size_id){
        $('#size_input').val(size_id);
    }
    
    function getcolor(color_id){
        $('#color_input').val(color_id);
    }
    </script>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="http://www.bootstraptoggle.com/js/bootstrap-toggle.js"></script>
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



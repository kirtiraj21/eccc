 <!-- START SECTION HOT SELLING -->
     <? /*
    <div class="section hot_selling_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="heading_s1 text-center">
                        <h2>Hot Selling Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                
                <!--/// left item full ////-->
                 <?php $i=1; foreach($dataallprod as $prod){ 
                       $imge= $this->db->where('product_id',$prod->id)->get('product_img')->row();
                        $wish = $this->Home_model->get_single_row(TBL_WISHLIST,array('user_id'=>$user_id,'product_id'=>$prod->id));
                         $rate = $this->Home_model->get_average(TBL_REVIEW,$prod->id);
                         $reviews = $this->Home_model->wheredata(TBL_REVIEW,'product_id',$prod->id);
                 if($i == 1){
                 ?>
                    <div class="col-md-12 col-lg-4 mb-5">
                            <div class="product single-left-product">
                                <div class="product_img single-product-img">
                                    <a href="<?php echo base_url('Product-Detail/'.base64_encode($prod->id)); ?>">
                                        <img src="<?php echo base_url($imge->image); ?>" alt="product_img3">
                                    </a>
                                   
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="<?php echo base_url('Product-Detail/'.base64_encode($prod->id)); ?>"><?php echo $prod->name; ?></a> 
                                    <span class="wish_heart wish-icon" onclick="wishlist(<?php echo $prod->id;?>);"> <i class="fa fa-heart <?php  if(count($wish) > 0){echo 'mygreen';} ?>"></i> </span>
                                    </h6>
                                   
                                    <div class="product_price">
                                        <del>$<?php echo $prod->price; ?></del>
                                        <div class="on_sale">
                                            <span><?php echo $prod->discount; ?>% Off</span>
                                        </div>
                                    </div>
                                    
                                    <div class="rating_wrap">
                                        <div class="product-stock single-product">
                                            <span>In Stock</span>
                                            <span class="rating_num">(<?php echo $prod->stock; ?>)</span>
                                        </div>
                                    </div>
                                    
                                    <div class="product_price">
                                        <span class="price">$<?php echo $prod->price_after_discount; ?></span>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    <?php } $i++; } ?>
               
                
                <div class="col-md-12 col-lg-8">
                    <div class="row">
                        <?php $i=1; foreach($dataallprod as $data){ 
                             $imges= $this->db->where('product_id',$data->id)->get('product_img')->row();
                              $wish = $this->Home_model->get_single_row(TBL_WISHLIST,array('user_id'=>$user_id,'product_id'=>$data->id));
                              $rate = $this->Home_model->get_average(TBL_REVIEW,$data->id);
                              $reviews = $this->Home_model->wheredata(TBL_REVIEW,'product_id',$data->id);
                        if($i!=1){?>
                        
                        <div class="col-md-6 col-lg-6">
                             <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="<?php echo base_url('Product-Detail/'.base64_encode($data->id)); ?>">
                                        <img src="<?php echo base_url($imges->image); ?>" alt="product_img2">
                                    </a>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="<?php echo base_url('Product-Detail/'.base64_encode($data->id)); ?>"><?php echo $data->name; ?></a> 
                                     <span class="wish_heart wish-icon" onclick="wishlist(<?php echo $data->id;?>);"> <i class="fa fa-heart <?php  if(count($wish) > 0){echo 'mygreen';} ?>"></i> </span>
                                    </h6>
                                    <div class="product_price">
                                        <span class="price">$<?php echo $data->price_after_discount; ?></span>
                                        <del>$<?php echo $data->price; ?></del>
                                        <div class="on_sale">
                                            <span><?php echo $data->discount; ?>% Off</span>
                                        </div>
                                    </div>
                                   
                                   
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php } $i++; } ?>
                    </div>
                </div>
                
    <!--//////-->
            </div>
            
            <div class="row mt-5">
                  <!--/// right item full ////-->
                
                <div class="col-md-12 col-lg-8 order-two">
                    <div class="row">
                       <?php $j=1; foreach($dataallprod1 as $data1){ 
                             $imges1= $this->db->where('product_id',$data1->id)->get('product_img')->row();
                              $wish = $this->Home_model->get_single_row(TBL_WISHLIST,array('user_id'=>$user_id,'product_id'=>$data1->id));
                              $rate = $this->Home_model->get_average(TBL_REVIEW,$data1->id);
                              $reviews = $this->Home_model->wheredata(TBL_REVIEW,'product_id',$data1->id);
                        if($j!=5){?>
                        
                        <div class="col-md-6 col-lg-6">
                             <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="<?php echo base_url('Product-Detail/'.base64_encode($data1->id)); ?>">
                                        <img src="<?php echo base_url($imges1->image); ?>" alt="product_img2">
                                    </a>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="<?php echo base_url('Product-Detail/'.base64_encode($data1->id)); ?>"><?php echo $data1->name; ?></a> 
                                    <span class="wish_heart wish-icon" onclick="wishlist(<?php echo $data1->id;?>);"> <i class="fa fa-heart <?php  if(count($wish) > 0){echo 'mygreen';} ?>"></i> </span>
                                    </h6>
                                    <div class="product_price">
                                        <span class="price">$<?php echo $data1->price_after_discount; ?></span>
                                        <del>$<?php echo $data1->price; ?></del>
                                        <div class="on_sale">
                                            <span><?php echo $data1->discount; ?>% Off</span>
                                        </div>
                                    </div>
                                   
                                   
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php } $j++; } ?>
                        <!--<div class="col-md-6 col-lg-6">-->
                        <!--     <div class="item">-->
                        <!--    <div class="product">-->
                        <!--        <div class="product_img">-->
                        <!--            <a href="product-detail.php">-->
                        <!--                <img src="<?php echo base_url(); ?>assets/websiteassets/img/product/product2.png" alt="product_img2">-->
                        <!--            </a>-->
                        <!--        </div>-->
                        <!--        <div class="product_info">-->
                        <!--            <h6 class="product_title"><a href="product-detail.php">Men Sport Shoes</a> <span class="float-right"><a href="wishlist.php"><i class="icon-heart"></i></a></span> </h6>-->
                        <!--            <div class="product_price">-->
                        <!--                <span class="price">$55.00</span>-->
                        <!--                <del>$95.00</del>-->
                        <!--                <div class="on_sale">-->
                        <!--                    <span>25% Off</span>-->
                        <!--                </div>-->
                        <!--            </div>-->
                                   
                                   
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--</div>-->
                        <!--<div class="col-md-6 col-lg-6">-->
                        <!--     <div class="item">-->
                        <!--    <div class="product">-->
                        <!--        <div class="product_img">-->
                        <!--            <a href="product-detail.php">-->
                        <!--                <img src="<?php echo base_url(); ?>assets/websiteassets/img/product/product7.png" alt="product_img2">-->
                        <!--            </a>-->
                        <!--        </div>-->
                        <!--        <div class="product_info">-->
                        <!--            <h6 class="product_title"><a href="product-detail.php">Navy Blue Fit Jeans</a> <span class="float-right"><a href="wishlist.php"><i class="icon-heart"></i></a></span> </h6>-->
                        <!--            <div class="product_price">-->
                        <!--                <span class="price">$55.00</span>-->
                        <!--                <del>$95.00</del>-->
                        <!--                <div class="on_sale">-->
                        <!--                    <span>25% Off</span>-->
                        <!--                </div>-->
                        <!--            </div>-->
                                   
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--</div>-->
                        <!--<div class="col-md-6 col-lg-6">-->
                        <!--     <div class="item">-->
                        <!--    <div class="product">-->
                        <!--        <div class="product_img">-->
                        <!--            <a href="product-detail.php">-->
                        <!--                <img src="<?php echo base_url(); ?>assets/websiteassets/img/product/product8.png" alt="product_img2">-->
                        <!--            </a>-->
                                   
                        <!--        </div>-->
                        <!--        <div class="product_info">-->
                        <!--            <h6 class="product_title"><a href="product-detail.php">Men's Red Hot Cap</a> <span class="float-right"><a href="wishlist.php"><i class="icon-heart"></i></a></span> </h6>-->
                        <!--            <div class="product_price">-->
                        <!--                <span class="price">$55.00</span>-->
                        <!--                <del>$95.00</del>-->
                        <!--                <div class="on_sale">-->
                        <!--                    <span>25% Off</span>-->
                        <!--                </div>-->
                        <!--            </div>-->
                                   
                                   
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--</div>-->
                    </div>
                </div>
                
                  <?php $k=1; foreach($dataallprod1 as $prod1){ 
                      
                       $imge1= $this->db->where('product_id',$prod1->id)->get('product_img')->row();
                        $wish = $this->Home_model->get_single_row(TBL_WISHLIST,array('user_id'=>$user_id,'product_id'=>$prod1->id));
                         $rate = $this->Home_model->get_average(TBL_REVIEW,$prod1->id);
                         $reviews = $this->Home_model->wheredata(TBL_REVIEW,'product_id',$prod1->id);
                 if($k == 5){
                 ?>
                 <div class="col-md-12 col-lg-4 mb-5 order-one">
                            <div class="product single-left-product">
                                <div class="product_img single-product-img">
                                    <a href="<?php echo base_url('Product-Detail/'.base64_encode($prod1->id)); ?>">
                                        <img src="<?php echo base_url($imge1->image); ?>" alt="product_img3">
                                    </a>
                                   
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="<?php echo base_url('Product-Detail/'.base64_encode($prod1->id)); ?>"><?php echo $prod1->name; ?></a> 
                                    <!--<span class="float-right"><a href="wishlist.php"><i class="icon-heart"></i></a></span>-->
                                    <span class="wish_heart wish-icon" onclick="wishlist(<?php echo $prod1->id;?>);"> <i class="fa fa-heart <?php  if(count($wish) > 0){echo 'mygreen';} ?>"></i> </span>
                                    </h6>
                                   
                                    <div class="product_price">
                                        <del>$<?php echo $prod1->price; ?></del>
                                        <div class="on_sale">
                                            <span><?php echo $prod1->discount; ?>% Off</span>
                                        </div>
                                    </div>
                                    
                                    <div class="rating_wrap">
                                        <div class="product-stock single-product">
                                            <span>In Stock</span>
                                            <span class="rating_num">(<?php echo $prod1->stock; ?>)</span>
                                        </div>
                                    </div>
                                    
                                    <div class="product_price">
                                        <span class="price">$<?php echo $prod1->price_after_discount; ?></span>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                <?php } $k++; } ?>
    <!--//////-->
            </div>
            
            <div class="text-center" style="width: 100%;">
                <a href="<?php echo base_url('website/Product/');?>" class="btn btn-fill-out rounded-0">View More</a>
            </div>
            
        </div>
    </div>
    */ ?>
    <!-- END SECTION HOT SELLING -->
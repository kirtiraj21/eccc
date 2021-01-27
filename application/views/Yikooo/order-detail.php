
<?php include('header.php'); ?>


<!-- END MAIN CONTENT -->
<div class="main_content content-bg">
    <div class="full-page-wrapper">
    <div class="container">
    <!-- START SECTION BANNER -->
  <?php include('sidebar.php');?>

    <section class="page-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                        
        <div class="profile-sec">
            <div class="container">
                <form action="">
                <div class="row shop_container list" id="my-account-sec">

                <div class="col-lg-12">
                    <div class="profile-content">
                        <h4>Order Detail</h4>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="product">
                        
                        <div class="product_list">
                            <h3> Customer Details </h3>
                            <ul>
                                <li>
                                    <label> Order Id </label>
                                    <h6> <?php echo $order->order_id; ?> </h6>
                                </li>
                                <li>
                                    <label> Customer Name </label>
                                    <h6> <?php echo $user->name; ?>  </h6>
                                </li>
                                <li>
                                    <label> Customer Email </label>
                                    <h6> <?php echo$user->email; ?>  </h6>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    
                    <div class="product">
                        <?php  $shipping = $this->Home_model->get_single_row(TBL_SHIPPING_ADD,array('id'=>$order->address_id));  ?>
                        <div class="product_list">
                            <h3> Shipping Details </h3>
                            <ul>
                                <li>
                                    <label> Name </label>
                                    <h6> <?php echo $shipping->name; ?> </h6>
                                </li>
                                <li>
                                    <label> City </label>
                                    <h6> <?php echo $shipping->city; ?> </h6>
                                </li>
                                <li>
                                    <label> Country </label>
                                    <h6> <?php echo $shipping->country; ?> </h6>
                                </li>
                                <li>
                                    <label> Zip Code </label>
                                    <h6> <?php echo $shipping->zipcode; ?> </h6>
                                </li>
                                <li>
                                    <label> Address </label>
                                    <h6><?php echo $shipping->address; ?> </h6>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    
                    <div class="product">
                        
                        <div class="product_list">
                            <h3> Order Details </h3>
                            <ul>
                                <li>
                                    <label> Order Date & Time </label>
                                    <h6> <?php echo $order->created_on;?> </h6>
                                </li>
                            </ul>
                            
                            <table class="table" style="margin-top: 25px;">
                                <thead>
                                  <tr>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach($orderdetail as $detail){
                                     $img = $this->Home_model->get_single_row(TBL_PRODUCT_IMG,array('product_id'=>$detail->product_id));
                                     $prod = $this->Home_model->get_single_row(TBL_PRODUCT,array('id'=>$detail->product_id)); ?>
                                     
                                   <tr>
                                    <td>
                                   <a href="<?php echo base_url('Product-Detail/'.base64_encode($detail->product_id).'/'.base64_encode('ratesuccess')); ?>"><img style="width: 50px;" src="<?php echo base_url($img->image); ?>" alt="product"></a>
                                    </td>
                                    <td><?php echo $prod->name; ?></td>
                                    <td>$<?php echo $detail->price; ?></td>
                                    <td><?php echo $detail->qty; ?></td>
                                    <td>$<?php echo $detail->total_price; ?></td>
                                  </tr>
                                  <?php } ?>
                                  <!--<tr>-->
                                  <!--  <td>-->
                                  <!--     <img style="width: 50px;" src="https://mobidudes.com/Yikooo/upload/mainproduct/mens_lambswool_cardigan_in_charcoal_2_8.jpg" alt="product">-->
                                  <!--  </td>-->
                                  <!--  <td>Cardigan Winter Wear</td>-->
                                  <!--  <td>$1350</td>-->
                                  <!--  <td>4</td>-->
                                  <!--  <td>$5400</td>-->
                                  <!--</tr>-->
                                </tbody>
                            </table>
                            
                            <div class="table_foot">
                                <p> Sub Total : <span> $<?php echo $order->coupon_discount+$order->total_amount; ?> </span> </p>
                                <?php if($order->coupon_discount != ''){ ?>
                                <p> Discount (15%) : <span> $<?php echo $order->coupon_discount; ?> </span> </p>
                                <?php } ?>
                                <p> Grand Total : <span> $<?php echo $order->total_amount; ?> </span> </p>
                            </div>
                            
                            
                        </div>
                        
                    </div>
                    
                    <div class="product">
                        
                        <div class="product_list">
                            <h3> Order Status </h3>
                            <?php if($order->delivery_status == 0){ ?>
                            <p class="Rcolor" style="margin-bottom: 0;"> Ordered </p>
                            <?php }else{?>
                                <p class="Gcolor" style="margin-bottom: 0;"> Shipped </p>
                          <?php   } ?>
                        </div>
                        
                    </div>
                    
                    
                    <?php if($order->tracking_no !=''){ ?>
                    <div class="product">
                        
                        <div class="product_list">
                            <h3> Tracking Details </h3>
                       
                           <ul>
                                <li>
                                    <label> Tracking Number </label>
                                    <h6><?php echo $order->tracking_no;?> </h6>
                                </li>
                                <li>
                                    <label> Courier </label>
                                    <h6> <?php echo $order->courier;?> </h6>
                                </li>
                            </ul>
                        </div>
                     </div>
                    <?php } ?>
                    
                </div>

<style>

</style>
                
               

                </div>
                </form>
                </div>
	            </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>
    <!-- END SECTION BANNER -->
</div>
<!-- END MAIN CONTENT -->

<?php include('footer.php'); ?>





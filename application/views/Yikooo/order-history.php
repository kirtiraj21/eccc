
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
                        <h4>My Orders</h4>
                    </div>
                </div>


                    <!-- order history start here -->

                    <!-- 1st item history -->
           

                <!--<div class="col-lg-12">-->
                <!--   <div class="card card-order">-->
                <!--   <div class="row">-->
                <!--    <div class="col-lg-3">-->
                <!--        <a href="<?php echo base_url();?>Product-Detail/<?php echo base64_encode($prod->id); ?>/<?php echo base64_encode('ratesuccess'); ?>">-->
                <!--        <img src="<?php echo base_url($img->image); ?>" alt="product_img3">-->
                <!--        </a>-->
                <!--    </div>-->

                <!--    <div class="col-lg-9">-->
                <!--    <div class="product_info">-->
                <!--        <h6 class="product_title">-->
                <!--            <a href="<?php echo base_url();?>Product-Detail/<?php echo base64_encode($prod->id); ?>/<?php echo base64_encode('ratesuccess'); ?>"><?php echo $prod->name; ?></a>-->
                <!--        </h6>-->
                <!--        <p><?php echo $prod->description; ?> </p>-->
                       
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
                <!--        <span>Quantity</span>-->
                <!--        <span class="rating_num">(<?php echo $detail->qty; ?>)</span>-->
                <!--        </div>-->

                <!--        </div>-->
                <!--        </div>-->

                <!--        <ul class="progressbar">-->
                <!--                <li class="active">Ordered</li>-->
                <!--                <li class="<?php if($order->delivery_status == 1){echo "active";}  ?>" >Shipped</li>-->
                <!--        </ul>-->
                       

                <!--        </div>-->
                <!--    </div>-->

                   

                <!--    <div class="col-lg-12">-->
                <!--    <div class="card-header">-->

                <!--    <div class="row">-->
                <!--    <div class="col-lg-6 col-md-6">-->
                <!--    <div class="text-left">-->
                <!--    <span>Ordered On <strong><?php echo $newDate = date("D,M j Y", strtotime($order->created_on));  ?></strong></span>-->
                <!--    </div>-->
                <!--    </div>-->

                <!--    <div class="col-lg-6 col-md-6">-->
                <!--   <div class="text-right">-->
                <!--   <span>Order Total <strong>$<?php echo $detail->total_price;?></strong></span>-->
                <!--   </div>-->
                <!--    </div>-->
                <!--    </div>-->

                <!--    </div>-->
                <!--    </div>-->


                <!--    </div>-->
                <!--   </div>-->
                <!--</div>-->

               
                
                <?php foreach($order as $order){
               
            $orderdetail = $this->Home_model->wheredata(TBL_ORDER_DETAIL,'order_id',$order->order_id);
             
           ?>
                <div class="product">
                    <div class="orders_sec">
                        <ul>
                            <li> Order ID <span> <?php echo $order->order_id; ?> </span> </li>
                            <li> Items <span><?php echo count($orderdetail); ?></span> </li>
                            <li> Order Date <span> <?php echo date("Y-m-d", strtotime($order->created_on)); ?> </span> </li>
                            <li> Order Time <span> <?php echo date("h:i a", strtotime($order->created_on)); ?> </span> </li>
                            
                        </ul>
                        
                        <a href='<?php echo base_url('website/Account/myordersdetail/'.base64_encode($order->order_id)); ?>' ><button type="button" class="viewOrd"> View Detail </button></a>
                        
                    </div>
                </div>
                
                 <?php }
             ?>  
                
                <!--<div class="product">-->
                <!--    <div class="orders_sec">-->
                <!--        <ul>-->
                <!--            <li> Order ID <span> ORD1023654 </span> </li>-->
                <!--            <li> Items <span> 5</span> </li>-->
                <!--            <li> Order Date <span> 15-10-2020 </span> </li>-->
                <!--            <li> Order Time <span> 12:00 PM </span> </li>-->
                            
                <!--        </ul>-->
                        
                <!--        <button type="button" style="font-size: 16px; width: auto; height: auto; padding: 12px 30px; background-color: #62EB69; border: 1px solid #62EB69; color: #fff; border-radius: 4px; cursor: pointer;margin-top: 25px;"> View Detail </button>-->
                        
                <!--    </div>-->
                <!--</div>-->
                

<style>
.orders_sec {
    width: 100%;
    background: none;
    padding: 10px 0px;
}
.orders_sec ul{
    margin: 0px auto;
    padding: 0px;
    list-style: none;
    padding: 0px;
}
.orders_sec li {
    float: none;
    display: inline-block;
    width: 49%;
    padding: 12px 0px;
}
.orders_sec li span {
    font-weight: 600;
    color: #000;
    margin-left: 25px;
}
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





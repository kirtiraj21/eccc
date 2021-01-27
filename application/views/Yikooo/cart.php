        
<?php include('header.php'); ?>

<style>
    .product-name p{margin: 0;}
    .data_center{
        text-align: center;
        font-size: 18px;
        margin: 0;
        color: #333;
        letter-spacing: 1px;
    }
</style>

<!-- START SECTION BANNER -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Shop Cart</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Shop Cart</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BANNER -->

<!-- END MAIN CONTENT -->
<div class="main_content">
    <!-- START SECTION BANNER -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                             
    if($this->session->flashdata('message') != ''){
        echo '<div class="alert alert-success text-center">'.$this->session->flashdata('message').'</div>';
    }elseif($this->session->flashdata('errmessage') != ''){
         echo '<div class="alert alert-danger text-center">'.$this->session->flashdata('errmessage').'</div>';
    } 
    
    if(count($cart)!=0){?>  
     <span style="color:red;" id="errormessage"></span>
                    <div class="table-responsive shop_cart_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($cart as $cart){
                                    $img = $this->Home_model->get_single_row(TBL_PRODUCT_IMG,array('product_id'=>$cart->product_id));
                                     $sz = $this->Home_model->get_single_row(TBL_SIZE,array('id'=>$cart->size));
                                      $clr = $this->Home_model->get_single_row(TBL_COLOR,array('id'=>$cart->color));
                                     $prod = $this->Home_model->get_single_row(TBL_PRODUCT,array('id'=>$cart->product_id));
                                ?>
                                <tr style=" <?php if($prod->stock < $cart->qty){echo "background: #f9dede;"; } ?>">
                                    <td class="product-thumbnail"><a href="<?php  echo base_url('Product-Detail/'.base64_encode($cart->product_id));?>"><img src="<?php echo base_url($img->image); ?>" alt="product1"></a></td>
                                    <td class="product-name" data-title="Product"><a href="<?php  echo base_url('Product-Detail/'.base64_encode($cart->product_id));?>"> <?php if($sz!=''){ ?><p><span style="font-size: 12px">size : </span> <span><?php echo $sz->name;?></span></p><?php } if($clr!=''){?> <p><span style="font-size: 12px;">color : </span> <span style="background-color: <?php if($clr!=''){echo $clr->code;}?>; padding: 0 11px; margin-left: 10px; border-radius: 50%"></span></p> <?php }echo $prod->name; ?></a></td>
                                    <td class="product-price" data-title="Price">$<?php echo $cart->price_after_discount; ?></td>
                                    <td class="product-quantity" data-title="Quantity"><div class="quantity">
                                   <input onclick="updtqty(<?php echo $cart->id;?>,'less');" type="button" value="-" class="minus" >
                                    <input type="text" name="quantity" value="<?php echo $cart->qty; ?>" id="qty<?php echo $cart->id; ?>" title="Qty" class="qty" size="4">
                                  
                                  <input onclick="updtqty(<?php echo $cart->id;?>,'gain');" type="button" value="+" class="plus" >
                                  </div></td>
                                    <td class="product-subtotal" data-title="Total" id='total<?php echo $cart->id;?>'>$<?php echo $cart->total; ?></td>
                                    <td class="product-remove" data-title="Remove"><a onClick="return confirm('Are you sure you want to delete ')" href="<?php echo base_url('website/Cart/cartdelete/'.base64_encode($cart->id)) ?>"><i class="ti-close"></i></a></td>
                                </tr>
                                <?php } ?>
                               
                            </tbody>
                            <!--<tfoot>-->
                            <!--    <tr>-->
                            <!--        <td colspan="6" class="px-0">-->
                            <!--            <div class="row no-gutters align-items-center">-->

                            <!--                <div class="col-lg-4 col-md-6 mb-3 mb-md-0">-->
                            <!--                    <div class="coupon field_form input-group">-->
                            <!--                        <input type="text" value="" class="form-control form-control-sm" placeholder="Enter Coupon Code..">-->
                            <!--                        <div class="input-group-append">-->
                            <!--                            <button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>-->
                            <!--                        </div>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                                           
                            <!--            </div>-->
                            <!--        </td>-->
                            <!--    </tr>-->
                            <!--</tfoot>-->
                        </table>
                    </div>
                    <?php } else{echo "<div class='data_center'><img style='width: 80px; display: block; margin: auto; margin-bottom: 25px;' src='https://mobidudes.com/Yikooo/assets/img/cartempty.png'>Your Cart is Empty</div>";} ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-6"></div>
                <?php if(count($cart)!=0){ ?>
                <div class="col-md-6">
                    <div class="border p-3 p-md-4">
                        <div class="heading_s1 mb-3">
                            <h6>Cart Totals</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">Cart Subtotal</td>
                                        <td class="cart_total_amount" id='ordertotal'>$<?php echo $total->total_price; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Shipping</td>
                                        <td class="cart_total_amount">Free Shipping</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Total</td>
                                        <td class="cart_total_amount" id='grandtotal'><strong>$<?php echo $total->total_price;; ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="<?php echo base_url('website/Checkout'); ?>" class="btn btn-fill-out">Proceed To CheckOut</a>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->
</div>
<!-- END MAIN CONTENT -->
<script>
 function updtqty(cart_id,opr){
       
     var qty = $('#qty'+cart_id).val();
     
       //alert(cart_id); alert(qty); alert(opr);

      $.ajax({
        url: '<?php echo base_url();?>website/Cart/addtocart',
        data: {cart_id:cart_id,qty:qty,operation:opr},
        type: 'post',
        dataType:'json',
        success: function(data) {
            
          if(data.condition ==0){
             
                 $('#errormessage').text(data.message);
                  $('#qty'+cart_id).val(data.qty);
          }else{
             
              
               $('#qty'+cart_id).val(data.qty);
                $('#total'+cart_id).html(data.total);
                $('#ordertotal').html('$'+data.ordertotal);
                $('#grandtotal').html('$<strong>'+data.ordertotal+'</strong>');
          }   

          }
          
                  
    });
    }

</script>
<?php include('footer.php'); ?>
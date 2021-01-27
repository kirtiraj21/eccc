        
<?php include('header.php'); ?>

<!-- START SECTION BANNER -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Checkout</h1>
                </div>
            </div>
            <div class="col-md-6">
                <!--<ol class="breadcrumb justify-content-md-end">-->
                <!--    <li class="breadcrumb-item"><a href="#">Home</a></li>-->
                <!--    <li class="breadcrumb-item"><a href="#">Pages</a></li>-->
                <!--    <li class="breadcrumb-item active">Checkout</li>-->
                <!--</ol>-->
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
            
            <!--<div class="row">-->
            <!--    <div class="col-12">-->
            <!--        <div class="medium_divider"></div>-->
            <!--        <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>-->
            <!--        <div class="medium_divider"></div>-->
            <!--    </div>-->
            <!--</div>-->
             <form method="post" action="">
            <div class="row">
                
                <div class="col-md-6">
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="heading_s1">
                                <h4>Billing Details</h4>
                            </div>
                        </div>
                         <div class="col-md-8">
                        <div class="form-group mobile-align text-right">
                            
                            <a href="<?php $checkout='checkout'; echo base_url('website/Account/add_address/'.$checkout); ?>">
                            <button type="button" class="btn btn-fill-out rounded-0"> <i class="icon-plus"></i> Add a new address</button>
                            </a>
                        </div>
                    </div>
                    </div>
                    
                    
                   
                      
                       <div class="form-group">
                            <select name="add_id" class="form-control">
                                <?php foreach($add as $add){ ?>
                                <option value='<?php echo $add->id; ?>'><?php echo $add->name.' '.$add->address; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="hidden"  class="form-control" name="n_t" id="n_t" >
                        <input type="hidden"  class="form-control" name="d_off" id="d_off" >
                        <input type="hidden"  class="form-control" name="c_id" id="c_id">
                        <!--<div class="form-group">-->
                        <!--    <input type="text" required class="form-control" name="name" placeholder=" name *">-->
                        <!--</div>-->
                        <!--<div class="form-group">-->
                        <!--    <input type="text" required class="form-control" name="lname" placeholder="Last name *">-->
                        <!--</div>-->
                       
                       
                       <!--<div class="form-group">-->
                       <!--     <input class="form-control" required type="text" name="phone" placeholder="Phone *">-->
                       <!-- </div>-->
                       <!-- <div class="form-group">-->
                       <!--     <input class="form-control" required type="text" name="email" placeholder="Email address *">-->
                       <!-- </div>-->
                       
                       <!-- <div class="form-group">-->
                       <!--     <input type="text" class="form-control" name="address" required="" placeholder="Address *">-->
                       <!-- </div>-->
                         
                       <!-- <div class="form-group">-->
                       <!--     <input class="form-control" required type="text" name="city" placeholder="City / Town *">-->
                       <!-- </div>-->
                       <!-- <div class="form-group">-->
                       <!--     <input class="form-control" required type="text" name="country" placeholder=" County *">-->
                       <!-- </div>-->
                       <!-- <div class="form-group">-->
                       <!--     <input class="form-control" required type="text" name="zipcode" placeholder="Postcode / ZIP *">-->
                       <!-- </div>-->
                        
                      
                       
                       
                   
                </div>
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="heading_s1">
                             <h4>Orders Summary</h4>
                        </div>
                        <span style="color:red;" id="errormessage"></span>
                        <div class="coupon field_form input-group">
                            <input type="text" value="" id="c_name" class="form-control form-control-sm" placeholder="Enter Coupon Code..">
                            <div class="input-group-append">
                                <button class="btn btn-fill-out btn-sm" type="button" onclick='add_coupon();'>Apply Coupon</button>
                            </div>
                        </div>
                        <div class="table-responsive order_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($cartdata as $cart){
                                    $prod = $this->Home_model->get_single_row(TBL_PRODUCT,array('id'=>$cart->product_id));
                                    ?>
                                    <tr>
                                        <td><?php echo $prod->name; ?> <span class="product-qty">x <?php echo $cart->qty; ?></span></td>
                                        <td>$<?php echo $cart->total ;?></td>
                                    </tr>
                                    <?php } ?>
                                    <!--<tr>-->
                                    <!--    <td>Lether Gray Tuxedo <span class="product-qty">x 1</span></td>-->
                                    <!--    <td>$55.00</td>-->
                                    <!--</tr>-->
                                    <!--<tr>-->
                                    <!--    <td>woman full sliv dress <span class="product-qty">x 3</span></td>-->
                                    <!--    <td>$204.00</td>-->
                                    <!--</tr>-->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal">$<?php echo $total->total_price; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>Free Shipping</td>
                                    </tr>
                                     <tr style="display:none;" id="coupon_discount">
                                        <th>coupon discount</th>
                                        <td id='c_off'></td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td class="product-subtotal" id="grand_total">$<?php echo $total->total_price; ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                       
                        <button type="submit" name="submit" value="submit" class="btn btn-fill-out btn-block">Place Order</button>
                    </div>
                </div>
               
            </div>
             </form>
        </div>
    </div>
    <!-- END SECTION BANNER -->
</div>
<!-- END MAIN CONTENT -->

<?php include('footer.php'); ?>
<script>
 function add_coupon(){
       
     var c_name = $('#c_name').val();
     
     
      // alert(c_name); 
      if(c_name != ''){

      $.ajax({
        url: '<?php echo base_url();?>website/Checkout/add_coupon',
        data: {c_name:c_name},
        type: 'post',
        dataType:'json',
        success: function(data) {
            
          if(data.condition == 0){
             
                 $('#errormessage').text(data.message);
                  $('#coupon_discount').hide();
                  
          }else{
              
              $('#errormessage').text('');
             
              $('#coupon_discount').show();
               
              $('#c_off').html('- $'+data.c_off);
              $('#d_off').val(data.c_off);
              
              $('#n_t').val(data.grand_total);
              $('#c_id').val(data.coupon_id);
              
                
               $('#grand_total').html('$<strong>'+data.grand_total+'</strong>');
          }   

          }
          
                  
    });
    
    
    }
 else{
    $('#errormessage').text('Please fill coupon code in input field!Try Again.'); 
 }
 }

</script>


    <?php include('header.php');?>
    
    <?php include('menu.php');?>

    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2><?php echo $page; ?></h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home');?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                        <!--<li class="breadcrumb-item active">Jquery Datatable</li>-->
                    </ul>
                    <!--<a href="<?php echo base_url('admin/Brand/add');?>" class="btn btn-sm btn-primary" title="">Add new</a>-->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        
            <!--///// Customer details /////-->
                        
                        <div class="card-header order-header">
                            <h5>Customer Details</h5>
                        </div>
                        <?php $udata=$this->db->where('user_id',$vieworder->user_id)->get('users')->row(); ?> 
                        <div class="body order-body">
                               <div class="row">
                               <div class="col-lg-3">
                                   <label>Order Id</label>
                                   <p><?php echo $vieworder->order_id; ?></p>
                               </div>
                               
                               
                               
                               <div class="col-lg-3">
                                   <label>Customer Name</label>
                                   <p><?php echo $udata->name; ?></p>
                               </div>
                               
                               <div class="col-lg-4">
                                   <label>Customer Email</label>
                                   <p><?php echo $udata->email; ?></p>
                               </div>
                               
                               
                           </div>
                        </div>
                    
                        <!--///// shipping details /////-->
                        <?php $sdata=$this->db->where('id',$vieworder->address_id)->get('shipping_address')->row(); ?> 
                        <div class="mt-3">
                            
                        <div class="card-header order-header" style="border-top: 1px solid rgba(0,0,0,.125);">
                            <h5>Shipping Details</h5>
                        </div>
                        
                        <div class="body order-body">
                               <div class="row">
                               <div class="col-lg-3">
                                   <label>Name</label>
                                   <p><?php echo $sdata->name; ?></p>
                               </div>
                               
                               
                               
                               <div class="col-lg-3">
                                   <label>Address</label>
                                   <p><?php echo $sdata->address; ?></p>
                               </div>
                               
                               <div class="col-lg-2">
                                   <label>City</label>
                                   <p><?php echo $sdata->city; ?></p>
                               </div>
                               
                               <div class="col-lg-2">
                                   <label>Country</label>
                                   <p><?php echo $sdata->country; ?></p>
                               </div>
                               
                               <div class="col-lg-2">
                                   <label>Zip Code</label>
                                   <p><?php echo $sdata->zipcode; ?></p>
                               </div>
                           </div>
                        </div>
                            
                        </div>
                        
            
            <!--///// Order details /////-->
                        
            
                        <div class="mt-5">
                            
                            <div class="card-header order-header" style="border-top: 1px solid rgba(0,0,0,.125);">
                            <h5>Order Details</h5>
                        </div>
                        
                        <div class="body order-body">
                               <div class="row">
                               <div class="col-lg-3">
                                   <label>Order Date & Time</label>
                                   <p><?php echo $vieworder->created_on; ?></p>
                               </div>
                               
                               
                               
                               <!--<div class="col-lg-2">-->
                               <!--    <label>Order Time</label>-->
                               <!--    <p>07:00 PM</p>-->
                               <!--</div>-->
                           </div>
                        </div>
                            
                        </div>
                        
                        
                        <?php if($vieworder->tracking_no != ''){ ?>
                         <div class="mt-5">
                            
                            <div class="card-header order-header" style="border-top: 1px solid rgba(0,0,0,.125);">
                            <h5>Tracking details</h5>
                        </div>
                        
                        <div class="body order-body">
                               <div class="row">
                               <div class="col-lg-3">
                                   <labe>Tracking Number</label>
                                   <p><?php echo $vieworder->tracking_no; ?></p>
                               </div>
                               
                               
                               
                               <div class="col-lg-2">
                                   <label>Courier</label>
                                   <p><?php echo $vieworder->courier; ?></p>
                               </div>
                           </div>
                        </div>
                            
                        </div>
                        <?php  } ?>
                        <div class="body table-body mt-3">
                           <table class="table order-table">
                               <thead>
                                   
                                   <th>Product</th>
                                   <th>Product Name</th>
                                   <th>Price</th>
                                   <th>Quantity</th>
                                   <th>Total</th>
                               </thead>
                               <tbody>
                                   <?php foreach($view as $vw){ 
                                   $pdata=$this->db->where('id',$vw->product_id)->get('product')->row();
                                   $idata=$this->db->where('product_id',$vw->product_id)->get('product_img')->row();
                                   $bdata=$this->db->where('id',$pdata->brand)->get('brand')->row();
                                   $cdata=$this->db->where('id',$pdata->category)->get('category')->row();?>
                                   
                                   <tr>
                                       
                                       <td>
                                           <img src="<?php echo base_url($idata->image); ?>" alt="product">
                                       </td>
                                       <td>
                                           <p class="font-weight-bold"><?php echo $pdata->name;?></p>
                                           <?php if($bdata){ ?><p> <strong>Brand :</strong> <?php echo $bdata->name;?> </p><?php } ?>
                                           <p> <strong>Categories :</strong> <span style="color: #0e4410; font-weight: 600;"><?php echo $cdata->name;?></span> </p>
                                       </td>
                                       <td><p class="color-order">$<?php echo $vw->price;?></p></td>
                                       <td><?php echo $vw->qty;?></td>
                                       <td><p class="color-order">$<?php echo $vw->total_price;?></p></td>
                                      
                                   </tr>
                                   <?php } ?>
                                  
                               </tbody>
                           </table>
                        </div>
                        
                        <!--///// total area ////-->
                        
                        <div class="total-card">
                            
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><strong>Sub Total :</strong></td>
                                        <td><span>$<?php echo $vieworder->order_total; ?></span></td>
                                    </tr>
                                    <?php if($vieworder->coupon_discount != ''){ ?>
                                    <tr>
                                        <td><strong>Discount($) :</strong></td>
                                        <td><span> - <?php echo $vieworder->coupon_discount; ?></span></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td><strong>Grand Total :</strong></td>
                                        <td><span>$<?php echo $vieworder->total_amount; ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                      
                        </div>
                        
                        
                        <!--//// order status area /////-->
                        
                       
                        <div class="card-header order-header" style="border-top: 1px solid rgba(0,0,0,.125);">
                            <h5>Order Status</h5>
                        </div>
                        
                        <div class="body order-body">
                           
                            <div class="col-lg-6">
                                 <div class="stepbar">
                                     <div class="twoBtn"> 
                                         <span class="first_step myactive">1</span>
                                         <p>Ordered</p>
                                     </div>
                                   
                                    <div class="twoBtn">
                                        <!--<span class="second_step <?php // if($vieworder->delivery_status == 1){echo "active";} ?>">2</span>-->
                                        <span class="second_step <?php if($vieworder->delivery_status == 1){echo "myactive";} ?> ">2</span>
                                        <p>Shipped</p>
                                    </div>
                                    
                                </div>
                               </div>  
                               
                        <div class="left-status">
                         <?php echo validation_errors('<div style="color:red;">', '</div>'); ?>

                            <?php if($vieworder->delivery_status == 0){ ?>
                            <form method="post" action="<?php echo base_url('admin/Order/orderstatus/'.base64_encode($vieworder->order_id)); ?>">
                            <div class="row">
                                
                               <div class="col-lg-6">
                                   <div class="form-group">
                                        <label class="col-form-label">Change Status</label>
                                        <select class="form-control fill" name="o_status" id="change_status">
                                            <option selected="" disabled=""> -Select Status- </option>
                                            <option value="red"> Shipped </option>
                                           
                                        </select>
                                    </div>
                               </div>
                            
                            </div>
                            
                            <div class="row" >
                                <div class="col-lg-4 red box" style="">
                                    <div class="form-group">
                                        <label class="col-form-label">Tracking Number</label>
                                        <input type="text" class="form-control" placeholder="Tracking Number" name="track_id" />
                                    </div>
                                </div>
                                <div class="col-lg-4 red box" style="">
                                    <div class="form-group">
                                        <label class="col-form-label">Courier</label>
                                        <select class="form-control" name="courier">
                                            <?php foreach($courier as $courier){ ?>
                                            <option value='<?php echo $courier->name; ?>'><?php echo $courier->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 sbtbtn" style="">
                                    <div class="form-group">
                                        <label class="col-form-label" style="display: block; visibility: hidden;">Button</label>
                                        <button style="margin: 0;" type="submit" name="submit" value="save" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <?php  } ?> 

  <style>
    .twoBtn {
        display: inline-block;
        float: none;
        width: 35%;
        text-align: center;
    }
    .twoBtn p{
        text-align: center;
        
    }
    .first_step{margin: auto;}
    .stepbar::before {
        position: absolute;
        background: #55b776;
        width: 128px;
        height: 2px;
        content: "";
        right: 23%;
        top: 21px;
        z-index: 0;
    }
    .first_step {
        border-color: #7d7d7d;
        color: #7d7d7d;
    }
    .stepbar::before{
        background: #9ea09e;
    }
    .myactive {
        border-color: #61eb69 !important;
        color: #ffffff !important;
        background: #61eb69 !important;
    }
    .myactive::before{
        background: #61eb69 !important;
    }
</style>                          
                            
                            <div class="row">
                            
                               <!--<div class="col-lg-6">-->
                               <!--     <div class="change_Status">-->
                               <!--        <a href="<?php echo base_url(); ?>admin/Order/orderstatus/<?php echo base64_encode($vieworder->order_id);?>" style="color:#fff;"><button type="button" class="btn btn-sm btn-primary">Change Status</a>-->
                               <!--   </div>-->
                               <!--</div>-->
                               
                           </div>
                        </div>
                           
                           
                        </div>
                       
                        
                        <!--/////-->
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <?php include('footer.php');?>
    
    
     <script>
 
     $(document).ready(function(){
       
     $("#change_status").change(function(){
        //  $(".sbtbtn").show();
        $(this).find("option:selected").each(function(){
            $(".sbtbtn").show();
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
                $(".sbtbtn").show();
            }
        });
    }).change();
    
     });
 </script>
    

    <!--<script>-->
    <!--$(document).ready(function(){-->
    <!--    $('.change_Status button').click(function(){-->
    <!--    $('.second_step').addClass('active');-->
    <!--});-->
    <!--});-->
    <!--</script>-->

                           <!-- <div class="row">-->
                           <!--    <div class="col-lg-4">-->
                           <!--        <label>Order Id</label>-->
                           <!--        <p>Riz123</p>-->
                           <!--    </div>-->
                               
                           <!--    <div class="col-lg-4">-->
                           <!--        <label>Order item</label>-->
                           <!--        <p><img src="https://images-na.ssl-images-amazon.com/images/I/71D9ImsvEtL._UL1500_.jpg" alt="product"></p>-->
                           <!--    </div>-->
                               
                           <!--    <div class="col-lg-4">-->
                           <!--        <label>Item Detail</label>-->
                           <!--         <p class="font-weight-bold">Trending Sport Shoes for Men</p>-->
                           <!--         <p> <strong>Brand :</strong> Adidas </p>-->
                           <!--         <p> <strong>Categories :</strong> <span style="color: #1daf24;font-weight: 600;">Men's Wear</span> </p>-->
                           <!--    </div>-->
                               
                           <!--    <div class="col-lg-4">-->
                           <!--        <label>Customer Name</label>-->
                           <!--        <p>Rizwan Shah</p>-->
                           <!--    </div>-->
                               
                           <!--    <div class="col-lg-4">-->
                           <!--        <label>Customer Email</label>-->
                           <!--        <p>rizwan@test.com</p>-->
                           <!--    </div>-->
                               
                           <!--    <div class="col-lg-4">-->
                           <!--        <label>Price</label>-->
                           <!--        <p style="color: #1daf24;font-weight: 600;">$200.00</p>-->
                           <!--    </div>-->
                               
                           <!--    <div class="col-lg-4">-->
                           <!--        <label>Quantity</label>-->
                           <!--        <p>2</p>-->
                           <!--    </div>-->
                               
                           <!--    <div class="col-lg-4">-->
                           <!--        <label>Total</label>-->
                           <!--        <p style="color: #1daf24;font-weight: 600;">$200.00</p>-->
                           <!--    </div>-->
                               
                           <!--    <div class="col-lg-4">-->
                           <!--        <label>Date</label>-->
                           <!--        <p>2:00 GMT +7, 14 Aug 2020 </p>-->
                           <!--    </div>-->
                           <!--</div>-->
                           
                           
                           
                            <!--.order-body p{-->
                            <!--    margin: 5px 0;-->
                            <!--}-->
                            
                            <!--.order-body p img {-->
                            <!--    width: 100%;-->
                            <!--    max-width: 85px;-->
                            <!--}-->
                            
                            <!--.color-order{-->
                            <!--    color: #62EB69;-->
                            <!--    font-weight: 600;-->
                            <!--    margin: 0;-->
                            <!--}-->
                            
                            <!--.order-body .col-lg-4{-->
                            <!--    margin: 0px 0 30px;-->
                            <!--}-->
                            
                            <!--.order-body label{-->
                            <!--    margin: 0;-->
                            <!--    color: #000;-->
                            <!--    font-weight: 600;-->
                            <!--    font-size: 16px;-->
                            <!--}-->

   
        
<?php include('header.php'); 
if($category != ''){
$catid= $category->id;
}
$subcatid= base64_decode($this->uri->segment(3));
?>

<style>

</style>

<!-- START SECTION BANNER -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1><?php if($category!=''){echo $category->name;} ?></h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Product Categories</li>
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
                <div class="col-lg-9">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_left">
                                    <div class="custom_select">
                                        <select class="form-control form-control-sm" id="sel"  onchange="sorting();">
                                            <option value="order">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="product_header_right">
                                    <div class="products_view">
                                        <a href="javascript:Void(0);" class="shorting_icon grid"><i class="ti-view-grid"></i></a>
                                        <a href="javascript:Void(0);" class="shorting_icon list active"><i class="ti-layout-list-thumb"></i></a>
                                    </div>
                                    <div class="custom_select">
                                        <select class="form-control form-control-sm">
                                            <option value="">Showing</option>
                                            <option value="9">9</option>
                                            <option value="12">12</option>
                                            <option value="18">18</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="maxheihgt650" id="sort_prod">
                    <?php if(!empty($product)){ ?>
                    <div class="row shop_container list" >
                        <img src="<?php echo base_url('assets/websiteassets/images/ajaxload.gif'); ?>" style="display:none;" id="ajaxloadimg" alt="product_img2">
                        <sapn id="wishmsg"></sapn>
                        <?php foreach($product as $vw){ 
                         $img = $this->db->where('product_id',$vw->prod_id)->get('product_img')->row(); 
                         $user_id= $this->session->userdata('user_id');
                         $wish = $this->Home_model->get_single_row(TBL_WISHLIST,array('user_id'=>$user_id,'product_id'=>$vw->prod_id));
                         $rate = $this->Home_model->get_average(TBL_REVIEW,$vw->prod_id);
                         $reviews = $this->Home_model->wheredata(TBL_REVIEW,'product_id',$vw->prod_id);
                         //print_r($reviews);
                        ?>
                        <div class="col-md-4 col-6">
                            <div class="product">
                                <div class="product_img">
                                    <a href="<?php echo base_url('Product-Detail/'.base64_encode($vw->prod_id)) ?>">
                                        <img src="<?php echo base_url().$img->image; ?>" alt="product_img2">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li><a href="<?php echo base_url('Product-Detail/'.base64_encode($vw->prod_id)) ?>"><i class="icon-magnifier-add"></i></a></li>
                                            <!--<li><a href="wishlist.php"><i class="icon-heart"></i></a></li>-->
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="<?php echo base_url('Product-Detail/'.base64_encode($vw->prod_id)) ?>"><?php echo $vw->prod_name; ?></a>
                                    
                                    <!--<span class="wish_heart wish-icon" > <i class="fa fa-heart"></i> </span>-->
                                    <span class="wish_heart wish-icon" onclick="wishlist(<?php echo $vw->prod_id;?>);"> <i class="fa fa-heart <?php  if(count($wish) > 0){echo 'mygreen';} ?>"></i> </span>
                                    </h6>
                                   <div class="pr_desc">
                                        <?php  echo mb_strimwidth($vw->prod_detail, 0, 100, "...");   ?>
                                    </div>
                                    <div class="product_price">
                                        <span class="price">$<?php echo $vw->prod_discount_price; ?></span>
                                        <del>$<?php echo $vw->prod_price; ?></del>
                                        <div class="on_sale">
                                            <span><?php echo $vw->prod_discount; ?>% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating1">
                                            <fieldset id='demo3' class="rating">
                                                <input class="stars" type="radio" id="3star_a-5" name="3rating" value="5" <?php if($rate->average_rating ==5){echo 'checked';} ?> />
                                                <label class="full" for="3star_a-5" title="Awesome - 5 stars"></label>
                                                <input class="stars" type="radio" id="3star_a_5-half" name="3rating" value="4.5" <?php if($rate->average_rating ==4.5){echo 'checked';} ?> />
                                                <label class="half" for="3star_a_5-half" title="Pretty good - 4.5 stars"></label>
                                                <input class="stars" type="radio" id="3star_a-4" name="3rating" value="4" <?php if($rate->average_rating ==4){echo 'checked';} ?> />
                                                <label class="full" for="3star_a-4" title="Pretty good - 4 stars"></label>
                                                <input class="stars" type="radio" id="3star_a_4-half" name="3rating" value="3.5"  <?php if($rate->average_rating ==3.5){echo 'checked';} ?>/>
                                                <label class="half" for="3star_a_4-half" title="Meh - 3.5 stars"></label>
                                                <input class="stars" type="radio" id="3star_a-3" name="3rating" value="3" <?php if($rate->average_rating ==3){echo 'checked';} ?> />
                                                <label class="full" for="3star_a-3" title="Meh - 3 stars"></label>
                                                <input class="stars" type="radio" id="3star_a_3-half" name="3rating" value="2.5" <?php if($rate->average_rating ==2.5){echo 'checked';} ?> />
                                                <label class="half" for="3star_a-3-half" title="Kinda bad - 2.5 stars"></label>
                                                <input class="stars" type="radio" id="3star2" name="3rating" value="2" <?php if($rate->average_rating ==2){echo 'checked';} ?> />
                                                <label class="full" for="3star2" title="Kinda bad - 2 stars"></label>
                                                <input class="stars" type="radio" id="3star2half" name="3rating" value="1.5" <?php if($rate->average_rating ==1.5){echo 'checked';} ?> />
                                                <label class="half" for="3star2half" title="Meh - 1.5 stars"></label>
                                                <input class="stars" type="radio" id="3star1" name="3rating" value="1" <?php if($rate->average_rating ==1){echo 'checked';} ?> />
                                                <label class="full" for="3star1" title="Sucks big time - 1 star"></label>
                                                <input class="stars" type="radio" id="3starhalf" name="3rating" value="0.5" <?php if($rate->average_rating ==0.5){echo 'checked';} ?>/>
                                                <label class="half" for="3starhalf" title="Sucks big time - 0.5 stars"></label>
                                              </fieldset>
                                            <!--<div class="product_rate" style="width:80%">-->
                                                
                                            <!--    fghgfh-->
                                            <!--</div>-->
                                            <span class="rating_num">(<?php echo count($reviews);   ?>)</span>
                                        </div>
                                        
                                    </div>
                                    
                                   
                                    <div class="list_product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <?php  if($vw->prod_stock <= 0){?>
                                            <li><span style='color:red;'> Out Of Stock</span></li>
                                            <?php }else{ ?>
                                            <li class="add-to-cart" onclick="addtocart(<?php echo $vw->prod_id;?>);"><span><i class="icon-basket-loaded"></i> Add To Cart</span></li>
                                            <?php } ?>
                                           
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                       
                    </div>
                    <?php }else{?>
                        <img class="block_ceneter" src="<?php echo base_url('upload/no-product.png'); ?>">
                   <?php  } ?>
                    <div class="row">
                        <div class="col-12">
                           
                          
                               <!--<?php// echo $links; ?>-->
                          
                        </div>
                    </div>
                   </div>
                </div>
                <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <h5 class="widget_title">Categories</h5>
                            <ul class="widget_categories">
                                <?php if($subcategory != ''){
                                foreach($subcategory as $subcat){
                                    $pro = $this->Home_model->wheredata(TBL_PRODUCT,'sub_category',$subcat->id);
                             
                                ?>
                                <li>
                                <div class="custome-checkbox">
                                        <input class="form-check-input" onclick="sorting();" type="checkbox" name="subcat" id="Men<?php echo $subcat->id; ?>" value="<?php echo $subcat->id; ?>" <?php if($subcatid !=''){ if($subcatid == $subcat->id){echo 'checked';}} ?>>
                                        <label class="form-check-label" for="Men<?php echo $subcat->id; ?>"><span><?php echo $subcat->name; ?></span> <span class="categories_num">(<?php echo count($pro); ?>)</span></label>
                                </div>
                                </li>
                                <?php  }
                                }?>
                               
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Price</h5>
                            <div class="filter_price">
                                 <div id="price_filter" data-min="0" data-max="500" data-min-value="50" data-max-value="300" data-price-sign="$"></div>
                                 <div class="price_range">
                                     <!--//// filter price ///-->
                                     
                                     <fieldset class="filter-price">
                                        <div class="price-field">
                                          <input type="range" onchange='sorting();' name="minprice" min="100" max="5000" value="100" id="lower">
                                          <input type="range" onclick='sorting();' name="maxprice" min="100" max="5000" value="5000" id="upper">
                                        </div>
                                         <div class="price-wrap" style="display: block;">
                                          <!--<span class="price-title">Price</span>-->
                                          <div class="price-wrap-1" style="float: left; display: block;">
                                            <input id="one" >
                                            <label for="one">$</label>
                                          </div>
                                          <div class="price-wrap_line" style="display: inline;">-</div>
                                          <div class="price-wrap-2" style="float: right; display: block;">
                                            <input id="two" >
                                            <label for="two">$</label>
                                          </div>
                                        </div>
                                      </fieldset> 
                                     
                                     <!--/////-->
                                     
                                 </div>
                             </div>
                             </div>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Brand</h5> 
                            <ul class="list_brand">
                                <?php foreach($brand as $br){ ?>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" onclick="sorting();" type="checkbox" name="brand" id="Arrivals<?php echo $br->id; ?>" value="<?php echo $br->id; ?>">
                                        <label class="form-check-label" for="Arrivals<?php echo $br->id; ?>"><span><?php echo $br->name; ?></span></label>
                                    </div>
                                </li>
                                <?php }?>
                              
                            </ul>
                        </div>
                       
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->
</div>
<!-- END MAIN CONTENT -->

<style>
    .sidediv {
        position: fixed;
        bottom: 10%;
        font-size: 14px;
        right: -420px;
        width: auto;
        height: auto;
        background: #f59da4;
        box-shadow: 0px 0px 6px 0px #ddd;
        text-align: center;
        transition: right 0.5s ease;
        padding: 10px 15px;
        margin-bottom: 25px;
        z-index: 1;
        border-radius: 5px;
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
    .myAJ {
    position: relative;
    top: 37px;
    z-index: -999 !important;
    left: -14px;
    background: #dfe2e6;
}
</style>

<?php include('footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--<script>-->
<!--    $(document).ready(function(){-->
<!--        $('.sidediv').hide();-->
<!--       $(".add-to-cart span").click(function(){-->
<!--           $('.sidediv').show();-->
<!--           $('.sidediv').addClass('rightenablefix');-->
<!--           setTimeout(function() {-->
<!--             $('.sidediv').fadeOut('slow');-->
<!--          }, 3000); -->
<!--       }) -->
<!--    });-->
<!--</script>-->

 <script>
  
   function sorting(){
       
       var id=$("#sel").val();
       var min=$("#lower").val();
       var max=$("#upper").val();
       var cat= '<?php echo $catid; ?>';
       
        var array = []
var checkboxes = document.querySelectorAll('input[name=subcat]:checked')

for (var i = 0; i < checkboxes.length; i++) {
  array.push(checkboxes[i].value)
}
//alert(array);

 var brand = []
var brandcheckboc = document.querySelectorAll('input[name=brand]:checked')

for (var i = 0; i < brandcheckboc.length; i++) {
  brand.push(brandcheckboc[i].value)
}
       $('#ajaxloadimg').css('display','block');
$.ajax({
        url: '<?php echo base_url();?>website/Product/sorting',
        data: {value:id,subcategory:array,brand:brand,min:min,max:max,category:cat},
        type: 'post',
        success: function(data) {
          if(data==''){
              $('#ajaxloadimg').css('display','none');
                 $('#sort_prod').html('No Data Found!!');
          }else{
              $('#ajaxloadimg').css('display','none');
              
                       $('#sort_prod').html(data);
          }

          }
          
                  
    });

    }
    
    
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
    
    
     function addtocart(product_id){
       
     
       //alert(product_id);
$.ajax({
        url: '<?php echo base_url();?>website/Product/addtocart',
        data: {product_id:product_id},
        type: 'post',
        success: function(data) {
            //alert(data);
          if(data == 0){
                  window.location.href = '<?php echo base_url();?>website/Login';
          }else if(data.trim() == 'updtqty'){
                  $('.sidediv').hide();
                 $('#wishmsg').show();
                 $('.sidediv').html('<p style="color:#fff;">Thank You , Item Updated To  Cart!!</p>')
                   $('.sidediv').show();
                  $('.sidediv').addClass('rightenablefix');
                   setTimeout(function() {
                    $('.sidediv').removeClass('rightenablefix');
                   $('.sidediv').fadeOut('slow');
                   }, 3000);
          }else{
              $('#cartcount').html(data);
              $('.sidediv').hide();
              $('#wishmsg').show();
              $('.sidediv').html('<p style="color:#fff;">Thank You , Item Added To Cart!!</p>')
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
 
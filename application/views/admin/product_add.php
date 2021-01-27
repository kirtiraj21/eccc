
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->

    <?php include('header.php');?>
    
    <?php include('menu.php');?>
    
    <style>
        .remove-icon{
            position: relative;
            left: 130px;
            font-size: 20px;
            color: red;
            bottom: 50px;

        }
        .form-group{position: relative;}
    </style>

    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2><?php echo $page?></h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home')?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Product</li>
                        <li class="breadcrumb-item active"><?php echo $page?></li>
                    </ul>
                    
                </div>
            </div>
        </div>
        <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Please fill all fields</h2>
                             <?php echo validation_errors('<div style="color:red;">', '</div>'); ?>
                        </div>
                        <div class="body">
                            <form class="row" id="basic-form" method="post" action="" method="post" enctype="multipart/form-data">
                                 <div class="form-group col-md-6">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php if(!empty($records)){  echo $records->name; } ?>" required>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Category </label>
                                    <select name="category_id" class="form-control" onchange="getsubcat()" id="cat">
                                        
                                        <?php foreach($records_category as $records_category){ ?>
                                        <option value="<?php echo $records_category->id;  ?>" <?php if(!empty($records)){ if($records_category->id == $records->category ) {echo "selected";} } ?>><?php echo $records_category->name; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Sub Category </label>
                                    <select name="sub_category_id" class="form-control" id="subcat">
                                        <?php if(!empty($records)){
                                          foreach($subcategory as $subcatdata){
                                             if($records->sub_category ==0){ echo" <option value='' disabled selected> select category first</option>";
                                              }
                                             else{?>
                                             <option value='<?php echo $subcatdata->id; ?>' <?php if($subcatdata->id == $records->sub_category ) {echo "selected";}  ?>> <?php echo $subcatdata->name; ?></option>
                                             <?php 
                                             }   
                                           }
                                        }else{ ?>
                                        <option value='' disabled selected> select category first</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                 <div class="form-group col-md-12">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" required><?php if(!empty($records)){  echo $records->description; } ?></textarea>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Brand </label>
                                    <select name="brand_id" class="form-control"  >
                                        <option  disabled value=''>Select Brand</option>
                                         <option  value=''>None</option>
                                        <?php
                                        foreach($records_brand as $records_brand){
                                        ?>
                                        <option value="<?php echo $records_brand->id;  ?>" <?php if(!empty($records)){ if($records_brand->id==$records->brand){echo "selected";} } ?>><?php echo $records_brand->name; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Price($)</label>
                                    <input type="number" class="form-control" id="price" name="price" value="<?php if(!empty($records)){  echo $records->price; } ?>" required>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Color </label>
                                    <select name="color_id[]" class="form-control" multiple <?php if(empty($records)){  echo ''; } ?>>
                                        <!--<option selected disabled>Select Brand</option>-->
                                        <?php
                                        foreach($records_color as $records_color){
                                             $this->db->where('product_id',$records->id);
                                               $query=$this->db->get('product_color');
   	                                           $vw_color =  $query->result();
   	                                           $datac=array();
   	                                           foreach($vw_color as $colordata){
   	                                              $datac[] = $colordata->color;
   	                                           }
                                        ?>
                                        <option value="<?php echo $records_color->id;  ?>" <?php if(!empty($records)){ if(in_array($records_color->id,$datac) ) {echo "selected";} } ?>><?php echo $records_color->name; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                 <div class="form-group col-md-6">
                                    <label>Size</label>
                                    <select name="size_id[]" class="form-control" multiple <?php if(empty($records)){  echo ''; } ?>>
                                        
                                        <?php 
                                        
                                        
                                        foreach($records_size as $records_size){
                                            
                                               $this->db->where('product_id',$records->id);
                                               $query=$this->db->get('product_size');
   	                                           $vw_size =  $query->result();
   	                                           $datasize=array();
   	                                           foreach($vw_size as $sizedata){
   	                                               $datasize[] = $sizedata->size;
   	                                           }
   	                                           //print_r($datasize)
   	                                     ?>
                                            
                                        <option value="<?php echo $records_size->id;  ?>" <?php if(!empty($records)){ if (in_array($records_size->id,$datasize)){echo "SELECTED";} } ?>><?php echo $records_size->name; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                
                                 <div class="form-group col-md-6">
                                    <label>Discount(%)</label>
                                    <input type="number" class="form-control" id="discount"  name="discount" value="<?php if(!empty($records)){  echo $records->discount; } ?>" required>
                                </div>
                                
                                 <div class="form-group col-md-6">
                                    <label>Price After Discount($)</label>
                                    <input type="text" readonly  class="form-control" id="price_after_discount" name="price_after_discount" value="<?php if(!empty($records)){  echo $records->price_after_discount; } ?>" required>
                                </div>
                              
                                  <div class="form-group col-md-12">
                                    <label>Image <span style="margin-left: 15px; font-size: 12px; opacity: 0.7;"> 250px*200px ( HxW ) </span></label><br>
                                    <?php
                                   
                                    if(!empty($records)){
                                        $this->db->where('product_id',$records->id);
                                              $query=$this->db->get('product_img');
   	                                          $vw_iimg =  $query->result();
   	                                          foreach($vw_iimg as $img){
                                    ?>
                                    <a href="<?php echo base_url('admin/Product/delete_img/'.base64_encode($img->id).'/'.base64_encode($records->id)); ?>"><i style="position: absolute;">X</i></a>
                                    <img src="<?php echo base_url($img->image)?>" class="usrpic" width="100" height="100" style="margin-left:20px;">
                                      
                                    <?php  } ?>
                                    <input type="file" class="form-control" name="image[]" multiple >
                                    <?php }else{ ?>
                                    <input type="file" class="form-control" name="image[]" multiple  required>
                                    <?php } ?>
                                    
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" value="<?php if(!empty($records)){  echo $records->stock; } ?>" required>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label style="display: block;"> Super sale</label>
                                   <input type="checkbox" onclick='valueChanged();' class='hotsell' name="hot_selling" <?php if(!empty($records)){ if ($records->hot_selling ==1){echo "checked";} } ?> value="1" >
                                   <div class='expdate'  name='expiry_date' style="display: none;">
                                       <input type="datetime-local" name="expdate" class="form-control"  >
                                   </div>
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label style="display: block;">Hot Selling </label>
                                   <input type="checkbox" <?php if(!empty($records)){ if ($records->super_sale ==1){echo "checked";} } ?>  name="super_sale" value="1" >
                                 
                                </div>
                                
                                 <div class="form-group col-md-3">
                                    <label style="display: block;"> New Season </label>
                                   <input type="checkbox" <?php if(!empty($records)){ if ($records->new_season ==1){echo "checked";} } ?>  name="new_season" value="1" >
                                 
                                </div>
                                
                                 
                                 <div class="col-md-12">
                                    <button type="submit" name="submit" value="save" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
        <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"> </script>
    <script>
       CKEDITOR.replace( 'description' ); </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    
    
        $(document).ready(function(){
  $("#discount").keyup(function(){
   var price = $("#price").val();
   var discount = $("#discount").val();
     a = (price*discount)/100;
     b=price-a;
    $('#price_after_discount').val(b);
    
  });
  
  $("#price").keyup(function(){
   var price = $("#price").val();
   var discount = $("#discount").val();
     a = (price*discount)/100;
     b=price-a;
    $('#price_after_discount').val(b);
    
  });
 
});


  function getsubcat(){
      
      var cat= $('#cat').val();
     // alert(cat)
      $.ajax({
        url: '<?php echo base_url();?>admin/Product/getsubcat',
        data: {cat:cat},
        type: 'post',
       // dataType:'json',
        success: function(data) {
                if(data != 0){
                  $('#subcat').html(data);
                 }else{
                    $('#subcat').html('<option value="">No data</option>');
                }
        }
          
                  
    });
  }
  
   function valueChanged()
    {
        if($('.hotsell').is(":checked"))   
            $(".expdate").show();
        else
            $(".expdate").hide();
    }
    </script>
    
    <?php include('footer.php');?>

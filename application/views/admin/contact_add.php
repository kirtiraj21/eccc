
    <?php include('header.php');?>
    
    <?php include('menu.php');?>

    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2><?php echo $page?></h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home')?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Brand</li>
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
                             <?php
                             
    if($this->session->flashdata('message') != ''){
        echo '<div class="alert alert-success text-center">'.$this->session->flashdata('message').'</div>';
    }elseif($this->session->flashdata('errmessage') != ''){
         echo '<div class="alert alert-danger text-center">'.$this->session->flashdata('errmessage').'</div>';
    } ?>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" action="" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="<?php if(!empty($records)){  echo $records->email; }else{ echo set_value('email');} ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text"  name="address" class="form-control" value="<?php if(!empty($records)){  echo $records->address; }else{ echo set_value('address');} ?>"  <?php if(!empty($records)){  echo 'required'; } ?> >
                                </div>
                              
                              
                               <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" name="phone" class="form-control" id="bill_to_address_postal_code2" pattern="\d*" inputmode="numeric" value="<?php if(!empty($records)){  echo $records->phone; }else{ echo set_value('phone');} ?>" <?php if(!empty($records)){  echo 'required'; } ?> >
                                </div>
                                
                                <!-- <div class="form-group">-->
                                <!--    <label>Latitude</label> -->
                                <!--    <input type="text"  name="latitude" class="form-control" value="<?php if(!empty($records)){  echo $records->latitude; }else{ echo set_value('latitude');}?>" <?php if(!empty($records)){  echo 'required'; } ?> >-->
                                <!--</div>-->
                                <!--<div class="form-group">-->
                                <!--    <label>Longitude</label> -->
                                <!--    <input type="text"  name="longitude" class="form-control" value="<?php if(!empty($records)){  echo $records->longitude; }else{ echo set_value('longitude');} ?>" <?php if(!empty($records)){  echo 'required'; } ?> >-->
                                <!--</div>-->
                                <!--  <div class="form-group">
                                    <label>Image</label><br>
                                    <?php
                                    if(!empty($records)){
                                    ?>
                                    <img src="<?php echo base_url($records->image)?>" class="usrpic" width="100" height="100">
                                    <input type="file" class="form-control" name="image" >
                                    <?php }else{ ?>
                                    <input type="file" class="form-control" name="image"  required>
                                    <?php } ?>
                                    
                                </div>-->
                                <?php echo validation_errors('<div style="color:red;">', '</div>'); ?>
                                <button type="submit" name="submit" value="save" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <?php include('footer.php');?>
    
    <script>
        $(document).foundation({
  abide:{
    live_validate:false
  }
});

jQuery(function($){
     $('#bill_to_address_postal_code2').payment('restrictNumeric');
});
    </script>

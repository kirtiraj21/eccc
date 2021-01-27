
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
                        <li class="breadcrumb-item">Coupon</li>
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
                            <form id="basic-form" method="post" action="" method="post" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label>Coupon Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php if(!empty($records)){ echo $records->name; } ?>" required>
                                </div>
                                
                                 <div class="form-group">
                                    <label>Minimum Purchase</label>
                                    <input type="number" class="form-control" name="min_purchase" value="<?php if(!empty($records)){  echo $records->min_purchase; } ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Discount (%)</label>
                                    <input type="number" class="form-control" name="discount" value="<?php if(!empty($records)){  echo $records->discount; } ?>" required>
                                </div>
                              
                              
                              <div class="form-group">
                                    <label>Uses</label>
                                    <input type="number" class="form-control" name="uses" value="<?php if(!empty($records)){  echo $records->uses; } ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label>Expiry Date</label>
                                    
                                    <input type="date" class="form-control" min="<?php echo date('Y-m-d'); ?>" name="expdate" value="<?php if(!empty($records)){  echo $records->expiry_date; } ?>" required>
                                </div>
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

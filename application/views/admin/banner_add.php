
    <?php include('header.php');?>
    
    <?php include('menu.php');?>
<style>
    .error{
        color:red;
    }
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
                        <li class="breadcrumb-item"> Banner</li>
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
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" action=""  enctype="multipart/form-data">
                                 <div class="form-group">
                                <!--    <label>Banner Name</label>-->
                                <!--    <input type="text" class="form-control" name="name" value="<?php if(!empty($records)){  echo $records->name; }else{ echo set_value('name');} ?>" >-->
                                    

                                <!--</div>-->
                                <!--<div class="form-group">-->
                                <!--    <label>Banner Description</label>-->
                                <!--    <input type="text" class="form-control" name="description" value="<?php if(!empty($records)){  echo $records->description; }else{ echo set_value('description');} ?>" >-->
                                    

                                <!--</div>-->
                              
                                  <div class="form-group">
                                    <label>Image</label><br>
                                    <?php
                                    if(!empty($records)){
                                    ?>
                                    <img src="<?php echo base_url($records->image)?>" class="usrpic" width="100" height="100">
                                    <input type="file" class="form-control" name="image" >
                                    <?php }else{ ?>
                                    <input type="file" class="form-control" name="image"  required>
                                    <?php } ?>
                                    
                                </div>
                                <?php echo validation_errors('<div class="error">', '</div>'); ?>
                                <button type="submit" name="submit" value="save" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <?php include('footer.php');?>

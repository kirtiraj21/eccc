
    <?php include('header.php');?>
    
    <?php include('menu.php');?>

    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Add Patch</h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home')?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Patch</li>
                        <li class="breadcrumb-item active">Add Patch</li>
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
                            <form id="basic-form" method="post" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Select Farm</label>
                                    <select class="form-control" name="farm_id" required>
                                     <option value="">-Select Farm-</option>
                                    <?php
                                    if(!empty($farm)){
                                      foreach($farm as $fr){
                                       if(!empty($records) && $records->farm_id==$fr->id){ $sl="selected"; }else{ $sl=""; }      
                                    ?>
                                    <option value="<?php echo $fr->id?>" <?php echo $sl?>><?php echo $fr->name?></option>
                                    <?php }} ?>
                                    </select>
                                   
                                </div>
                                 <div class="form-group">
                                    <label>Patch Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php if(!empty($records)){  echo $records->name; } ?>" required>
                                </div>
                              
                                <button type="submit" name="submit" value="save" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <?php include('footer.php');?>

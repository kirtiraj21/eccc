
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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home')?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Sizes</li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
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
                                    <label>Size Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php if(!empty($records)){  echo $records->name; } ?>" required>
                                </div>
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

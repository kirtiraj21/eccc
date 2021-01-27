
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
                        <li class="breadcrumb-item">About</li>
                        <li class="breadcrumb-item active"><?php echo $page?></li>
                    </ul>
                    
                </div>
            </div>
        </div>
        <div class="container-fluid">
               <?php
                             
    if($this->session->flashdata('message') != ''){
        echo '<div class="alert alert-success text-center">'.$this->session->flashdata('message').'</div>';
    }elseif($this->session->flashdata('errmessage') != ''){
         echo '<div class="alert alert-danger text-center">'.$this->session->flashdata('errmessage').'</div>';
    } ?>
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Please fill all fields</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" action="" method="post" enctype="multipart/form-data">
                                <!-- <div class="form-group">-->
                                <!--    <label>Title</label>-->
                                <!--    <input type="text" class="form-control" name="title" value="<?php if(!empty($records)){  echo $records->title; } ?>" required>-->
                                <!--</div>-->
                                
                                
                                 <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" required><?php if(!empty($records)){  echo $records->description; } ?></textarea>
                                </div>
                              
                                
                                <button type="submit" name="submit" value="save" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"> </script>
    <script>
              
                CKEDITOR.replace( 'description' );
            </script>
    
    <?php include('footer.php');?>

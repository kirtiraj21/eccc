
    <?php include('header.php');?>
    
    <?php include('menu.php');?>

    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Add Detail</h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home')?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Patch</li>
                        <li class="breadcrumb-item active">Add Detail</li>
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
                                    <label>Property Name</label>
                                    <input type="text" class="form-control" name="property" value="<?php echo $this->db->get_where(TBL_FARM,['id'=>$records->farm_id])->row()->name?>" readonly required>
                                </div>
                                 <div class="form-group">
                                    <label>Patch Name</label>
                                    <input type="text" class="form-control" name="patch" value="<?php if(!empty($records)){  echo $records->name; } ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label>Farm</label>
                                    <input type="text" class="form-control" name="farm" value="<?php if(!empty($view)){  echo $view->farm; } ?>"  required>
                                </div>
                                 <div class="form-group">
                                    <label>Block Id</label>
                                    <input type="text" class="form-control" name="block_id" value="<?php if(!empty($view)){  echo $view->block_id; } ?>"  required>
                                </div>
                                 <div class="form-group">
                                    <label>Hactares</label>
                                    <input type="text" class="form-control" name="hactares" value="<?php if(!empty($view)){  echo $view->hactares; } ?>"  required>
                                </div>
                                 <div class="form-group">
                                    <label>Row</label>
                                    <input type="text" class="form-control" name="row" value="<?php if(!empty($view)){  echo $view->row; } ?>"  required>
                                </div>
                                 <div class="form-group">
                                    <label>Plant</label>
                                    <input type="text" class="form-control" name="plant" value="<?php if(!empty($view)){  echo $view->plant; } ?>"  required>
                                </div>
                                 <div class="form-group">
                                    <label>Trees</label>
                                    <input type="text" class="form-control" name="trees" value="<?php if(!empty($view)){  echo $view->trees; } ?>"  required>
                                </div>
                                 <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" class="form-control" name="type" value="<?php if(!empty($view)){  echo $view->type; } ?>"  required>
                                </div>
                                 <div class="form-group">
                                    <label>Variety</label>
                                    <input type="text" class="form-control" name="variety" value="<?php if(!empty($view)){  echo $view->variety; } ?>"  required>
                                </div>
                                 <div class="form-group">
                                    <label>Rootstock</label>
                                    <input type="text" class="form-control" name="rootstock" value="<?php if(!empty($view)){  echo $view->rootstock; } ?>"  required>
                                </div>
                                 <div class="form-group">
                                    <label>Year</label>
                                    <input type="text" class="form-control" name="year" value="<?php if(!empty($view)){  echo $view->year; } ?>"  required>
                                </div>
                                 <div class="form-group">
                                    <label>Rework</label>
                                    <input type="text" class="form-control" name="rework" value="<?php if(!empty($view)){  echo $view->rework; } ?>"  required>
                                </div>
                                 <div class="form-group">
                                    <label>Irrigation</label>
                                    <input type="text" class="form-control" name="irrigation" value="<?php if(!empty($view)){  echo $view->irrigation; } ?>"  required>
                                </div>
                                <?php if(!empty($view)){ ?>
                                <button type="submit" name="update" value="update" class="btn btn-primary">Update</button>
                                <?php }else{ ?>
                                <button type="submit" name="submit" value="save" class="btn btn-primary">Save</button>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <?php include('footer.php');?>

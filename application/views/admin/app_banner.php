

    <?php include('header.php');?>
    
    <?php include('menu.php');?>

    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>App banner</h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home');?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">App Banner</li>
                        <!--<li class="breadcrumb-item active">Jquery Datatable</li>-->
                    </ul>
                    <a href="<?php echo base_url('admin/App_banner/add');?>" class="btn btn-sm btn-primary" title="">Add new</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                       
                        <div class="body">
                           
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S. No</th>
                                            <th>Image</th>
                                            <!--<th> Name</th>-->
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(!empty($view)){
                                          $i=1;    
                                          foreach($view as $vw){    
                                        ?>
                                        <tr class="gradeA">
                                            <td><?php echo $i; ?></td>
                                            <td><img src="<?php echo base_url($vw->image)?>" class="img-thumbnail" style="width: 170px; height: 90px; object-fit: cover; display: block; margin: auto;"></td>
                                            <!--<td><?php echo $vw->name?></td>-->
                                            <td>
                                                 <a href="<?php echo base_url('admin/App_banner/edit/'.base64_encode($vw->id)); ?>"><button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></a>
                                               <a href="<?php echo base_url('admin/App_banner/delete/'.$vw->id); ?>"> <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Are you sure you want to Remove?');"><i class="icon-trash" aria-hidden="true"></i></a>
                                            </td>
                                            <!--<td class="actions">-->
                                                
                                                <?php /*
										       if($vw->status==0 || $vw->status==2){
										       ?>
										       <a href="<?php echo base_url('admin/Category/active/'.$vw->id); ?>"><button class="btn btn-primary" style="background-color: red !important;border-color: red !important;">Deactive</button></a>
										       <?php }else{ ?>
										       <a href="<?php echo base_url('admin/Category/block/'.$vw->id); ?>"><button class="btn btn-primary" style="background-color: green !important;border-color: green !important;">Active</button></a>
										       <?php } */ ?>
											
                                            <!--</td>-->
                                        </tr>
                                        <?php $i++; }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <?php include('footer.php');?>



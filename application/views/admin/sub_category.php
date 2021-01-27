

    <?php include('header.php');?>
    
    <?php include('menu.php');?>

    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Sub Category</h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home');?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Sub Category</li>
                        <!--<li class="breadcrumb-item active">Jquery Datatable</li>-->
                    </ul>
                    <a href="<?php echo base_url('admin/Sub_Category/add');?>" class="btn btn-sm btn-primary" title="">Add new</a>
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
                <div class="col-lg-12">
                    <div class="card">
                       
                        <div class="body">
                           
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S. No</th>
                                            <th>Category Name</th>
                                            <!--<th>Image</th>-->
                                            <th>Sub Category Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(!empty($view)){
                                          $i=1;    
                                          foreach($view as $vw){
                                            $rec = $this->Home_model->get_single_row(TBL_CATEGORY,array('id'=>$vw->category_id));
                                        ?>
                                        <tr class="gradeA">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $rec->name?></td>
                                            <!--<td><img src="<?php echo base_url($vw->image)?>" width="100" height="100"></td>-->
                                            <td><?php echo $vw->name?></td>
                                            <td>
                                                 <a href="<?php echo base_url('admin/Sub_Category/edit/'.base64_encode($vw->id)); ?>"><button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></a>
                                               <a href="<?php echo base_url('admin/Sub_Category/delete/'.$vw->id); ?>"> <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
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



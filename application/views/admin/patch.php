

    <?php include('header.php');?>
    
    <?php include('menu.php');?>

    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Patch</h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home');?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Patch</li>
                        <!--<li class="breadcrumb-item active">Jquery Datatable</li>-->
                    </ul>
                    <a href="<?php echo base_url('admin/Patch/add');?>" class="btn btn-sm btn-primary" title="">Add new</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                       
                        <div class="body">
                           
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S. No</th>
                                            <th>Property(Farm) Name</th>
                                            <th>Patch Name</th>
                                            <th>Add data</th>
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
                                            <td><?php echo $this->db->get_where(TBL_FARM,['id'=>$vw->farm_id])->row()->name?></td>
                                            <td><?php echo $vw->name?></td>
                                            <td><a href="<?php echo base_url('admin/Patch/adddetail/'.base64_encode($vw->id))?>"><button class="btn btn-primary">Add</button></a></td>
                                            <td>
                                                 <a href="<?php echo base_url('admin/Patch/edit/'.$vw->id); ?>"><button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></a>
                                               <a href="<?php echo base_url('admin/Patch/delete/'.$vw->id); ?>"> <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Are you sure you want to Remove?');"><i class="icon-trash" aria-hidden="true"></i></a>
                                            </td>
                                           
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



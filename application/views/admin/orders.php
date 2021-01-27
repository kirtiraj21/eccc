

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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home');?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                        <!--<li class="breadcrumb-item active">Jquery Datatable</li>-->
                    </ul>
                    <!--<a href="<?php echo base_url('admin/Brand/add');?>" class="btn btn-sm btn-primary" title="">Add new</a>-->
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
                            			<th>order Id</th>
                            			<th>Customer Name</th>
                            			<th>Customer Email</th>
                            			<th>Status</th>
                            			<th>Actions</th>
                            		</tr>
                                    </thead>
                                    <tbody>
                                       <?php $i=1; foreach($view as $vw){ 
                                       $udata=$this->db->where('user_id',$vw->user_id)->get('users')->row(); ?>
                                        <tr class="gradeA">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $vw->order_id; ?></td>
                                            <td><?php echo $udata->name; ?></td>
                                            <td><?php echo $udata->email;?></td>
                                            <td><p class="shipped" style="<?php if($vw->delivery_status == 0){echo 'color:red';}?>"><?php if($vw->delivery_status == 0){echo 'ORDERED';}else{echo 'SHIPPED';} ?></p></td>
                                            <td class="text-center">
                                                 <a href="<?php echo base_url(); ?>admin/Order/order_detail/<?php echo base64_encode($vw->order_id); ?>"><button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                data-toggle="tooltip" data-original-title="Detail"><i class="icon-eye" aria-hidden="true"></i></a>
                                            </td>
                                           
                                        </tr>
                                        <?php $i++; } ?>
                                        
                                        <!--<tr class="gradeA">-->
                                        <!--    <td>2</td>-->
                                        <!--    <td>krit123</td>-->
                                        <!--    <td>Kirtiraj Chauhan</td>-->
                                        <!--    <td>kirtiraj@test.com</td>-->
                                        <!--    <td><p class="shipped">Shipped</p></td>-->
                                        <!--    <td class="text-center">-->
                                        <!--        <a href="order_detail.php"><button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"-->
                                        <!--        data-toggle="tooltip" data-original-title="Detail"><i class="icon-eye" aria-hidden="true"></i></a>-->
                                               
                                        <!--    </td>-->
                                           
                                        <!--</tr>-->
                                     
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



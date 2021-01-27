
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">


    <?php include('header.php');?>
    
    <?php include('menu.php');?>

    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Farms</h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home');?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Farms</li>
                        <!--<li class="breadcrumb-item active">Jquery Datatable</li>-->
                    </ul>
                    <!--<a href="<?php echo base_url('admin/Farms/add');?>" class="btn btn-sm btn-primary" title="">Add new</a>-->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                       
                        <div class="body">
                           
                            <div class="table-responsive">
                                <table id="export" class="display nowrap table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S. No</th>
                                            <th>User Name</th>
                                            <th>Task Name</th>
                                            <th>Farm Name</th>
                                            <th>Patch Name</th>
                                            <th>Size</th>
                                            <th>Date / Time</th>
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
                                            <td><?php echo $this->db->get_where(TBL_USER,array('token'=>$vw->token))->row()->name;?></td>
                                             <td><?php echo $this->db->get_where('task',array('id'=>$vw->task_id))->row()->name;?></td>
                                              <td><?php echo $this->db->get_where(TBL_FARM,array('id'=>$vw->farm_id))->row()->name;?></td>
                                               <td><?php echo $this->db->get_where(TBL_PATCH,array('id'=>$vw->patch_id))->row()->name;?></td>
                                               <td><?php echo $this->db->get_where(TBL_SIZE,array('id'=>$vw->size_id))->row()->name;?></td>
                                            <!--<td>-->
                                            <!--     <a href="<?php echo base_url('admin/Farms/edit/'.$vw->id); ?>"><button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"-->
                                            <!--    data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></a>-->
                                            <!--   <a href="<?php echo base_url('admin/Farms/delete/'.$vw->id); ?>"> <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"-->
                                            <!--    data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Are you sure you want to Remove?');"><i class="icon-trash" aria-hidden="true"></i></a>-->
                                            <!--</td>-->
                                            <!--<td class="actions">-->
                                                
                                                <?php /*
										       if($vw->status==0 || $vw->status==2){
										       ?>
										       <a href="<?php echo base_url('admin/Farms/active/'.$vw->id); ?>"><button class="btn btn-primary" style="background-color: red !important;border-color: red !important;">Deactive</button></a>
										       <?php }else{ ?>
										       <a href="<?php echo base_url('admin/Farms/block/'.$vw->id); ?>"><button class="btn btn-primary" style="background-color: green !important;border-color: green !important;">Active</button></a>
										       <?php } */ ?>
											
                                            <!--</td>-->
                                             <td><?php echo $vw->created_on ?></td>
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
    
    
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    
    <style>
        .buttons-excel{background: #0e4e7e !important; color: #fff !important; font-weight: 500 !important; font-size: 16px !important; padding: 3px 15px !important; outline: none;}
        table.dataTable.display tbody tr.odd>.sorting_1, table.dataTable.order-column.stripe tbody tr.odd>.sorting_1{background: transparent;}
        table.dataTable tbody th, table.dataTable tbody td {padding: 13px 10px; font-size: 14px; text-align: left;}
        table.dataTable.nowrap th{font-size: 14px;}
        .table-bordered th {border-bottom: 2px solid #dee2e6 !important; padding: 16px 10px !important;}
    </style>

    <script>
        $(document).ready(function() {
            $('#export').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ]
            });
        });
    </script>


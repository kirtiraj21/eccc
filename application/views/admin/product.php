

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
                    <a href="<?php echo base_url('admin/Product/add');?>" class="btn btn-sm btn-primary" title="">Add new</a>
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
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Size</th>
                                            <th>Color</th>
                                            <th>Price</th>
                                             <th>Stock</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(!empty($view)){
                                          $i=1;    
                                          foreach($view as $vw){  
                                              $this->db->where('product_id',$vw->id);
                                              $query=$this->db->get('product_img');
   	                                          $vw_iimg =  $query->row();
   	                                          
   	                                        //   $this->db->where('product_id',$vw->id);
                                            //   $query=$this->db->get('product_brand');
   	                                        //   $vw_brand =  $query->result();
   	                                          
   	                                          
   	                                          $this->db->where('product_id',$vw->id);
                                              $query=$this->db->get('product_color');
   	                                          $vw_color =  $query->result();
   	                                          
   	                                          
   	                                          $this->db->where('id',$vw->category);
                                              $query=$this->db->get('category');
   	                                          $vw_category =  $query->row();
   	                                          
   	                                          
   	                                          $this->db->where('product_id',$vw->id);
                                              $query=$this->db->get('product_size');
   	                                          $vw_size =  $query->result();
   	                                          
   	                                          
   	                                          
                                        ?>
                                        <tr class="gradeA">
                                            <td><?php echo $i; ?></td>
                                            <td><?php if(!empty($vw_iimg)){ ?><img src="<?php echo base_url($vw_iimg->image)?>" width="100" height="100"></td><?php } ?>
                                            <td><?php echo $vw->name?></td>
                                            <td><?php echo $vw_category->name?></td>
                                            <td> <?php
                                             if($vw->brand !=''){
                                             $this->db->where('id',$vw->brand);
                                              $query=$this->db->get('brand');
   	                                          $vw_br =  $query->row();
                                               echo $vw_br->name;
                                             }
                                               ?>
                                              </td>
                                            <td>
                                            <?php
                                             foreach($vw_size as $vw_size){
                                             $this->db->where('id',$vw_size->size);
                                              $query=$this->db->get('size');
   	                                          $vw_ =  $query->row();
                                               echo $vw_->name.' , ';
                                               }
                                               ?>
                                               
                                            </td>
                                            
                                             <td>
                                            <?php
                                             foreach($vw_color as $vw_color){
                                             $this->db->where('id',$vw_color->color);
                                              $query=$this->db->get('color');
   	                                          $vw_ =  $query->row();
                                               echo $vw_->name.' , ';
                                               }
                                               ?>
                                               
                                            </td>
                                            <td><?php echo $vw->price?></td>
                                            <td><?php echo $vw->stock?></td>
                                            <td>
                                                 <a href="<?php echo base_url('admin/Product/edit/'.base64_encode($vw->id)); ?>"><button class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></a>
                                               <!--<a href="<?php echo base_url('admin/Product/delete/'.$vw->id); ?>"> <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"-->
                                               <!-- data-toggle="tooltip" data-original-title="Remove" onclick="return confirm('Are you sure you want to Remove?');"><i class="icon-trash" aria-hidden="true"></i></a>-->
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



        
        
<?php include('header.php'); ?>


<!-- END MAIN CONTENT -->
<div class="main_content content-bg">
    <div class="full-page-wrapper">
    <div class="container">
    <!-- START SECTION BANNER -->

    
   <?php include('sidebar.php');?>
    

    <section class="page-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                        
        <div class="profile-sec">
            <div class="container">
               
                <div class="row" id="my-account-sec">

                <div class="col-lg-12">
                    <div class="profile-content">
                        <h4>Manage Address</h4>
                    </div>
                </div>
                 <?php
                             
    if($this->session->flashdata('message') != ''){
        echo '<div class="alert alert-success text-center">'.$this->session->flashdata('message').'</div>';
    }elseif($this->session->flashdata('errmessage') != ''){
         echo '<div class="alert alert-danger text-center">'.$this->session->flashdata('errmessage').'</div>';
    } ?>

                  <div class="col-md-12">
                        <div class="form-group mobile-align text-right">
                            <a href="<?php echo base_url('website/Account/add_address'); ?>">
                            <button type="button" class="btn btn-fill-out rounded-0"> <i class="icon-plus"></i> Add a new address</button>
                            </a>
                        </div>
                    </div>
    
                    <!--<div class="col-md-12">-->
                    <!--    <div class="form-group">-->
                    <!--        <label for="">Address</label>-->
                    <!--        <input type="text" class="form-control" placeholder="Enter Address">-->
                    <!--    </div>-->
                    <!--</div>-->
               <?php foreach($add as $add){ ?>
                    <div class="col-md-12">
                        <div class="address-view">
                            <div class="row">
                                <div class="col-lg-8 col-sm-8">
                                <p><strong><?php echo $add->add_type; ?></strong></p>
                                <p><span><strong><?php echo $add->name; ?></strong></span> <span><strong><?php echo $add->phone; ?></strong></span></p>
                                <p><?php echo $add->address; ?> <span><?php echo $add->city; ?></span> <span><strong><?php echo $add->zipcode; ?></strong></span> <span><?php echo $add->country; ?></span></p>
                                </div>

                                <div class="col-lg-4 col-sm-4">
                                <div class="address-icon">
                                <a href="<?php echo base_url('website/Account/edit_address/'.base64_encode($add->id)); ?>"><button class="btn btn-fill-out rounded-0"><i class="ion-edit"></i></button></a>
                                <!--//<a onClick="return confirm('Are you sure you want to delete ')" href="<?php echo base_url('website/Account/delete_address/'.base64_encode($add->id)); ?>"><button class="btn btn-fill-out rounded-0"><i class="ion-android-delete"></i></button></a>-->
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
               
            </div>
	</div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>
    <!-- END SECTION BANNER -->
</div>
<!-- END MAIN CONTENT -->

<?php include('footer.php'); ?>




                       
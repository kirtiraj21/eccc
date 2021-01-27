        
<?php include('header.php'); 
error_reporting(0);
 $id =$this->session->userdata('user_id'); 
$user = $this->Home_model->get_single_row(TBL_USER,array('user_id'=>$id)); 
?>


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

                                    <div class="col-md-12">
                                        <div class="profile-content">
                                            <h4>My Profile</h4>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="profile-img edit-img">
                                            <img src="<?php if($user->image != ''){ echo base_url().$user->image;}else{ echo "https://bodyfuel.ng/bodyfuel_partnership/assets/front/images/dummyprofile.png";} ?>" alt="">
                                            </div>
                                        </div>
                        
                                        
                        
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <div class="email-sec">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                Name
                                                </div>
                                                <p class="color"><?php echo $user->name; ?></p>
                                                
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <div class="email-sec">
                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                    Email Id
                                                </div>
                                                <p class="color"><?php echo $user->email; ?></p>
                                            </div>
                        
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <div class="email-sec">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                Contact No.
                                                </div>
                                                <p class="color"><?php echo $user->phone; ?>
                                            </p></div>

                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <div class="edit-profile">
                                                <a href="<?php echo base_url('website/Account/edit_profile'); ?>" class="btn btn-fill-out rounded-0">Edit Profile</a>
                                                </div>
                                            </div>

                                        </div>
                                        </div>
                                    </div>
                                </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    </div>
    <!-- END SECTION BANNER -->
    </div>
</div>
<!-- END MAIN CONTENT -->

<?php include('footer.php'); ?>
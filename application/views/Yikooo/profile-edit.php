        
        
<?php include('header.php');
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
                <form action="" method="post" enctype="multipart/form-data">
                <div class="row" id="my-account-sec">

                <div class="col-lg-12">
                    <div class="profile-content">
                         <?php
                             
    if($this->session->flashdata('message') != ''){
        echo '<div class="alert alert-success text-center">'.$this->session->flashdata('message').'</div>';
    }elseif($this->session->flashdata('errmessage') != ''){
         echo '<div class="alert alert-danger text-center">'.$this->session->flashdata('errmessage').'</div>';
    } ?>
                        <h4>Personal Information</h4>
                        
                    </div>
                </div>
        
                    <div class="col-md-12">
                        <div class="profile-img mt-profile edit-img">
						<!-- User Profile Image -->
						<img class="profile-pic" src="<?php if($user->image != ''){ echo base_url().$user->image;}else{ echo "https://bodyfuel.ng/bodyfuel_partnership/assets/front/images/dummyprofile.png";} ?>" alt="">
						<!-- Default Image -->
						<!-- <i class="fa fa-user fa-5x"></i> -->
					</div>
					<div class="p-image"> <i class="fa fa-camera upload-button"></i>
						<input class="file-upload" type="file" name="image" accept="image/*">
					</div>
                    </div>
    
                    <div class="col-md-12">
    
                       <div class="row">
						<div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for=""> Name</label>
                                <input type="text" class="form-control"  name="name" value="<?php echo $user->name; ?>" placeholder="Enter  Name">
                            </div>
                        </div>
                        
      <!--                  <div class="col-lg-6 col-md-6">-->
      <!--                      <div class="form-group">-->
      <!--                          <label for="">Last Name</label>-->
      <!--                          <input type="text" class="form-control"  name="name" value="<?php echo $user->name; ?>" placeholder="Enter Last Name">-->
      <!--                      </div>-->
						<!--</div>-->
                           <div class="col-lg-6 col-md-6">
                           <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $user->email; ?>" placeholder="Enter Email Address">
                            </div>
                           </div>
    
                           <div class="col-lg-6 col-md-6">
                           <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address" value="<?php echo $user->address; ?>" placeholder="Enter Address">
                            </div>
                           </div>

                        <div class="col-lg-12 col-md-6">
                            <div class="edit-profile">
                                <?php echo validation_errors('<div style="color:red;">', '</div>'); ?>
                            <button class="btn btn-fill-out rounded-0" type="submit" name="submit" value="save" >Submit</button>
                            </div>
                        </div>

                       </div>
                    </div>
                </div>
                </form>
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

<script>
$(document).ready(function() {
var readURL = function(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('.profile-pic').attr('src', e.target.result);
}

reader.readAsDataURL(input.files[0]);
}
}


$(".file-upload").on('change', function(){
readURL(this);
});

$(".upload-button").on('click', function() {
$(".file-upload").click();
});
});
</script>





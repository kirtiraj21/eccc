 <?php include('header.php');?>
    
    <?php include('menu.php');?>
 <style>
    .help-block{
            width: 100%;
            margin-top: 6px;
            font-size: 15px;
            color:red;
            display: none;
        }
</style>
 <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Admin Profile</h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Home'); ?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Profile</li>
                        <li class="breadcrumb-item active">Admin Profile</li>
                    </ul>
                   
                </div>
            </div>
        </div>    
        
        <div class="container-fluid">           

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card profile-header">
                        <div class="body text-center">
                            <div class="profile-image mb-3"><img src="<?php echo base_url($view->admin_logo); ?>" class="rounded-circle" alt="" style="height: 120px;"></div>
                            <div>
                                <h4 class="mb-0"><strong><?php echo $view->username?></strong> </h4>
                                
                            </div>                          
                        </div>
                    </div>
                    
                </div>

                <div class="col-lg-12 col-md-12">
                    <div id="Settings">
                      <?php if($this->session->flashdata("message1")){  ?>
                          <div class="alert alert-icon-left alert-success alert-dismissible mb-2" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <?php echo  $this->session->flashdata("message1") ; ?>
                          </div>
                        <?php } ?> 
                          <?php if($this->session->flashdata("errmessage1")){ echo " err yha aaya"; exit;  ?>
                          <div class="alert alert-icon-left alert-success alert-dismissible mb-2" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <?php echo  $this->session->flashdata("errmessage1") ; ?>
                          </div>
                        <?php } ?>
                        <div class="card">
                            <div class="header bline">
                                <h2>Admin Information</h2>
                              
                            </div>
                            <div class="body">
                                 <form action="" method="post" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">                                                
                                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $view->username?>" required>
                                        </div>
                                    </div>
                                  <div class="col-lg-6 col-md-12">
                                        <div class="form-group">                                                
                                            <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $view->email?>" required>
                                        </div>
                                    </div>
                                    
                                      <div class="col-lg-6 col-md-12">
                                        <div class="form-group">                                                
                                            <input type="text" class="form-control" placeholder="Refferal Code" name="reff" value="<?php echo $view->refferal_code?>" required>
                                        </div>
                                    </div>
                                    <!--<div class="col-lg-6 col-md-12">-->
                                    <!--    <lable>Profile Picture</lable>-->
                                    <!--    <div class="form-group">                                                -->
                                    <!--        <input type="file" class="form-control" placeholder="image" name="image"  >-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="col-lg-6 col-md-12">
                                          <lable>Logo</lable>
                                        <div class="form-group">                                                
                                            <input type="file" class="form-control" placeholder="logo" name="logo"  >
                                        </div>
                                    </div>
                                </div>
                                <button type="type" class="btn btn-primary" name="submit" value="save">Update</button> &nbsp;&nbsp;
                                </form>
                            </div>
                        </div>
                        
                    </div>                   
                </div>
                <div class="col-lg-12 col-md-12">
                    <div id="Settings">
                        <?php if($this->session->flashdata("message")){  ?>
                          <div class="alert alert-icon-left alert-success alert-dismissible mb-2" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <?php echo  $this->session->flashdata("message") ; ?>
                          </div>
                        <?php } ?> 
                          <?php if($this->session->flashdata("errmessage")){ echo " err yha aaya"; exit;  ?>
                          <div class="alert alert-icon-left alert-success alert-dismissible mb-2" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <?php echo  $this->session->flashdata("errmessage") ; ?>
                          </div>
                        <?php } ?>
                        <div class="card">
                            <div class="header bline">
                                <h2>Change Password</h2>
                              
                            </div>
                            <form action="" method="post">
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">  
                                      
                                            <label for="userinput5">Old Password<span class="help-block text-danger-oldpass" style="">&nbsp;Field is required.</span></label>
                                            <input type="password" class="form-control" name="old_password" id="oldpass"  required/>
                                        </div>
                                    </div>
                                  <div class="col-lg-12 col-md-12">
                                        <div class="form-group">                                                
                                             <label>New password*<span class="help-block text-danger-newpass" style="">&nbsp;Field is required.</span><span class="help-block text-danger-passwordlength" id="text-danger" style="display: none;">&nbsp;Password should be minimum six character long.</span></label>
                                        <input type="password" class="form-control" name="password" id="newpass"  required />
                                        </div>
                                    </div>
                                      <div class="col-lg-12 col-md-12">
                                        <div class="form-group">                                                
                                        <label>Confirm password*<span class="help-block text-danger-cpassword" style="">&nbsp;Field is required.</span><span class="help-block text-danger-notmatch" id="text-danger" style="display: none;">&nbsp;Password and Confirm password not match.</span></label>
                                        <input type="password" class="form-control" name="cpassword" id="cpassword"  required />
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit" name="changepasswprd" value="save" onClick="return vonf(); ">Change</button> &nbsp;&nbsp;
                                
                            </div>
                            </form>
                        </div>
                        
                    </div>                   
                </div>
            </div>
        </div>
    </div>
           
    <?php include('footer.php');?>
    <script>
function vonf()
{
    
	var oldpass = $('#oldpass').val() ;
	var newpass = $('#newpass').val() ;
	var cpass = $('#cpassword').val() ;
	var flag=0;

		
				if(oldpass==''){
				$('#oldpass').css('border', '1px solid red');
				$('.text-danger-oldpass').show();
				flag++;
				}else{
				$('#oldpass').css('border', '');
				$('.text-danger-oldpass').hide();
				}
				if(cpass==''){
				$('#cpassword').css('border', '1px solid red');
				$('.text-danger-cpassword').show();
				flag++;
				}else{
				$('#cpassword').css('border', '');
				$('.text-danger-cpassword').hide();
				}
				if(newpass==''){
				$('#newpass').css('border', '1px solid red');
				$('.text-danger-newpass').show();
				flag++;
				}else{
					if(newpass.length < 6){
				   
				   $('.text-danger-newpass').hide();
				   $('#newpass').css('border', '');
				   $('.text-danger-passwordlength').show();
				   flag++;
				}else{ 
				if(newpass!=cpass){
				    $('#newpass').css('border', '1px solid red');
				    $('#cpassword').css('border', '1px solid red');
				    $('.text-danger-newpass').hide();
				    $('.text-danger-passwordlength').hide();
				    $('.text-danger-notmatch').show();
				    flag++;
				}else{
                    $('#newpass').css('border', '');
                    $('#cpassword').css('border', '');
                    $('.text-danger-newpass').hide();
                    $('.text-danger-notmatch').hide();
				}    
			
				}
				}
				
				
			 if(flag==0){
			
		}else{
			return false;
		}
	
}
</script>

<?php include('header.php');
 $urlcheck = $this->uri->segment(4);
?>


<!-- END MAIN CONTENT -->
<div class="main_content content-bg">
    <div class="full-page-wrapper">
    <div class="container">
    <!-- START SECTION BANNER -->
    <?php include('sidebar.php'); ?>

    <section class="page-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <?php
                             
    if($this->session->flashdata('message') != ''){
        echo '<div class="alert alert-success text-center">'.$this->session->flashdata('message').'</div>';
    }elseif($this->session->flashdata('errmessage') != ''){
         echo '<div class="alert alert-danger text-center">'.$this->session->flashdata('errmessage').'</div>';
    } ?>     
                        
        <div class="profile-sec">
            <div class="container">
                <form action="" method="post">
                <div class="row" id="my-account-sec">

                <div class="col-lg-12">
                    <div class="profile-content">
                        <h4>Add a new address</h4>
                    </div>
                </div>
                
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="<?php if(!empty($rec)){echo $rec->name;}else{echo set_value('name');}  ?>">
                            <input type="hidden" class="form-control" name="uid" placeholder="Name" value="<?php if(!empty($rec)){echo base64_encode($rec->user_id);}  ?>">
                            <input type="hidden" class="form-control" name="url" placeholder="Name" value="<?php echo $urlcheck;  ?>">
                        </div>
                    </div>
                    
                    
                  
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="number" class="form-control" name="phone" placeholder="Phone" value="<?php if(!empty($rec)){echo $rec->phone;}else{echo set_value('phone');}  ?>">
                        </div>
                    </div>
                    
                    
                     <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Address" name="address"><?php if(!empty($rec)){echo $rec->address;}{echo set_value('address');}  ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <span id="error" class="err"></span>
                        <div class="form-group">
                            <input type="text" class="form-control" name="city" placeholder="City" value="<?php if(!empty($rec)){echo $rec->city;}else{echo set_value('city');}  ?>"  onkeypress="return chkNum(event,'error')">
                             
                        </div>
                    </div>

                    <div class="col-md-6">
                        <span id="error1" class="err"></span>
                        <div class="form-group">
                            
                            <input type="text" class="form-control"  name="country" placeholder="Country" value="<?php if(!empty($rec)){echo $rec->country;}else{echo set_value('country');}  ?>" onkeypress="return chkNum1(event,'error1')">
                                                
                        </div>
                        

                    </div>
                   

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control"  name="zipcode" placeholder="Zipcode" value="<?php if(!empty($rec)){echo $rec->zipcode;}else{echo set_value('zipcode');}  ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                           <span class="pr-3">
                           <input type="radio" name="address_type" <?php if(!empty($rec) && $rec->add_type == 'Home'){echo "checked";} ?> id="home" value="Home">
                            <label for="home">Home</label>
                           </span>
                           
                           <span class="pr-3">
                           <input type="radio" name="address_type" id="work" <?php if(!empty($rec) && $rec->add_type == 'Work'){echo "checked";} ?>  value="Work">
                            <label for="work">Work</label>
                           </span>

                        </div>
                    </div>
                        
                    <div class="col-lg-12">
                             <?php echo validation_errors('<div style="color:red;">', '</div>'); ?>
                            <button type="submit" name="submit" value="save" class="btn btn-fill-out rounded-0">Save</button>
                    

                    <!--<a href="manage-address.php" >-->
                    <!--    <span class="pl-5">cancel</span>-->
                    <!--</a>-->
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
<style>
			.err{color:red}
		</style>
<?php include('footer.php'); ?>
<script>
			function chkNum(event,msg)
			{
				if(!(event.which>=48 && event.which<=57))
				{
				document.getElementById(msg).innerHTML="";
				return true;
				}
				else
				{
			
				document.getElementById(msg).innerHTML="Numbers not allow in this field!";
				return false;
				}
			}
			function chkNum1(event,msg1)
			{
				if(!(event.which>=48 && event.which<=57))
				{
				document.getElementById(msg1).innerHTML="";
				return true;
				}
				else
				{
			
				document.getElementById(msg1).innerHTML="Numbers not allow in this field!";
				return false;
				}
			}
		</script>





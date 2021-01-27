        
<?php include('header.php'); ?>



<!-- END MAIN CONTENT -->
<div class="main_content">
    <!-- START SECTION BANNER -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-6">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1 otp-heading">
                                <h3>Verification Code</h3>
                                <?php
                             
    if($this->session->flashdata('message') != ''){
        echo '<div class="alert alert-success text-center">'.$this->session->flashdata('message').'</div>';
    }elseif($this->session->flashdata('errmessage') != ''){
         echo '<div class="alert alert-danger text-center">'.$this->session->flashdata('errmessage').'</div>';
    } ?>
                                <p>Please Enter OTP received on your mobile number</p>
                            </div>
                            <form method="post" action="<?php echo base_url('website/Login/otp_verification'); ?>">
                                <div class="form-group">

                                <!-- ///// -->
                                <div class="otp-form">
                                    <input id="codeBox1" type="number" name = "code1" maxlength="1" onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)">
                                    <input id="codeBox2" type="number" name = "code2" maxlength="1" onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)">
                                    <input id="codeBox3" type="number" name = "code3" maxlength="1" onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)">
                                    <input id="codeBox4" type="number" name = "code4" maxlength="1" onkeyup="onKeyUpEvent(4, event)" onfocus="onFocusEvent(4)">
                                    <input type="hidden" name = "phone" value="<?php echo base64_decode($this->uri->segment(4));?>">
                             <?php echo validation_errors('<div style="color:red;">', '</div>'); ?>
                                </div>
                                <!-- ///// -->


                                   
                                </div>
                                <div class="form-group">
                                    <a href="profile.php">
                                    <button type="submit" class="btn btn-fill-out btn-block"  name="submit">Verify</button>
                                    </a>
                                    <div class="form-note text-center"><a href="profile.php">Resend OTP</a></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->
</div>
<!-- END MAIN CONTENT -->

<script>
    function getCodeBoxElement(index) {
  return document.getElementById('codeBox' + index);
}
function onKeyUpEvent(index, event) {
  const eventCode = event.which || event.keyCode;
  if (getCodeBoxElement(index).value.length === 1) {
	 if (index !== 4) {
		getCodeBoxElement(index+ 1).focus();
	 } else {
		getCodeBoxElement(index).blur();
		// Submit code
		console.log('submit code ');
	 }
  }
  if (eventCode === 8 && index !== 1) {
	 getCodeBoxElement(index - 1).focus();
  }
}
function onFocusEvent(index) {
  for (item = 1; item < index; item++) {
	 const currentElement = getCodeBoxElement(item);
	 if (!currentElement.value) {
		  currentElement.focus();
		  break;
	 }
  }
}
</script>

<?php include('footer.php'); ?>
        
<?php include('header.php'); ?>

<style>
    .country-input{
        position: relative;
    }
    .country-input select {
        position: absolute;
        border: none;
        background: transparent;
        top: 14px;
        margin-left: 18px;
        height: 25px;
        outline: none !important;
    }
    .country-input input{
        padding-left: 110px;
    }
</style>



<!-- END MAIN CONTENT -->
<div class="main_content">
    <!-- START SECTION BANNER -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-6">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1 text-center">
                                <h3>Login</h3>
                                 <?php
                             
                                    if($this->session->flashdata('message') != ''){
                                        echo '<div class="alert alert-success text-center">'.$this->session->flashdata('message').'</div>';
                                    }elseif($this->session->flashdata('errmessage') != ''){
                                         echo '<div class="alert alert-danger text-center">'.$this->session->flashdata('errmessage').'</div>';
                                 } ?>
                            </div>
                            <form method="post" action='<?php echo base_url('website/Login/phone_number_register');?>'>
                                <div class="form-group country-input">
                                   <select name="country_code">
                                       <option value="">Select </option>
                                        <?php foreach($country as $country){ ?>
                                        
                                       <option value="+<?php echo $country->phonecode; ?>"><?php echo $country->iso; ?> +<?php echo $country->phonecode; ?></option>
                                       <?php } ?>
                                   </select>
                                    <input type="text" required="" class="form-control" name="phone" placeholder="Enter Mobile Number">
                                    <?php echo validation_errors('<div style="color:red;">', '</div>'); ?>

                                </div>
                                <div class="form-group">
                                    
                                    <button type="submit" name="submit" class="btn btn-fill-out btn-block">Send OTP</button>
                                    
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

<?php include('footer.php'); ?>

<script>
    $("#jquery-intl-phone").intlTelInput({
 
    });
</script>
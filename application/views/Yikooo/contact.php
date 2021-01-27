        
<?php include('header.php'); ?>


<?php
                             
    if($this->session->flashdata('message') != ''){
        echo '<div class="alert alert-success text-center">'.$this->session->flashdata('message').'</div>';
    }elseif($this->session->flashdata('errmessage') != ''){
         echo '<div class="alert alert-danger text-center">'.$this->session->flashdata('errmessage').'</div>';
    } ?>
<!-- END MAIN CONTENT -->
<div class="main_content">
    <!-- START SECTION CONTACT -->
    <div class="section pb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="contact_wrap contact_style3">
                        <div class="contact_icon">
                            <i class="linearicons-map2"></i>
                        </div>
                        <div class="contact_text">
                            <span>Address</span>
                            <p><?php if($contact_info!=''){ echo $contact_info->address;}else{echo '--';} ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="contact_wrap contact_style3">
                        <div class="contact_icon">
                            <i class="linearicons-envelope-open"></i>
                        </div>
                        <div class="contact_text">
                            <span>Email Address</span>
                            <a href="mailto:info@sitename.com"><?php if($contact_info!=''){echo $contact_info->email;}else{echo '--';} ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="contact_wrap contact_style3">
                        <div class="contact_icon">
                            <i class="linearicons-tablet2"></i>
                        </div>
                        <div class="contact_text">
                            <span>Phone</span>
                            <p><?php  if($contact_info!=''){echo $contact_info->phone;}else{echo '--';}?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION CONTACT -->
 
    <!-- START SECTION CONTACT -->
    <div class="section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="heading_s1">
                        <h2>Get In touch</h2>
                    </div>
                    <!--<p class="leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>-->
                    <div class="field_form">
                        <form method="post"  action='<?php echo base_url('website/Contact/submitform'); ?>'>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input required placeholder="Name *" id="first-name" class="form-control" name="name" type="text">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <input required placeholder="Company Name *" id="company-name" class="form-control" name="companyname" type="text">
                                 </div>
                                <div class="form-group col-md-6">
                                    <input required placeholder="Mobile No. *" id="phone" class="form-control" name="phone">
                                </div>
                                <div class="form-group col-md-6">
                                    <input required placeholder="Email *" id="email" class="form-control" name="email" type="email">
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control">
                                        <option selected disabled> -Selection- </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input placeholder="Subject" id="subject" class="form-control" name="subject">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea required placeholder="Description *" id="description" class="form-control" name="message" rows="4"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <?php echo validation_errors('<div style="color:red;">', '</div><br>'); ?>
                                    <button type="submit" title="Submit Your Message!" class="btn btn-fill-out"  name="submit" value="Submit">Contact Us</button>
                                </div>
                                <div class="col-md-12">
                                    <div id="alert-msg" class="alert-msg text-center"></div>
                                </div>
                            </div>
                        </form>     
                    </div>
                </div>
                <div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
                    <div id="map" class="contact_map2" data-zoom="12" data-latitude="<?php if($contact_info!=''){ echo $contact_info->latitude;}else{echo '40.680';} ?>" data-longitude="<?php if($contact_info!=''){ echo $contact_info->longitude;}else{echo '-73.945';} ?>" data-icon="<?php echo base_url(); ?>assets/websiteassets/images/marker.png"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION CONTACT -->
</div>
<!-- END MAIN CONTENT -->

<?php include('footer.php'); ?>
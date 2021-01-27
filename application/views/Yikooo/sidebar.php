 <?php 
$id =$this->session->userdata('user_id'); 
$user  = $this->db->where(array('user_id'=>$id))->get('users')->row(); 


?>

<?php if((!empty($this->session->userdata('user_id')))){ ?>
    <div class="toggle-area text-right" id="align-left">
        <i class="fa fa-align-left" aria-hidden="true"></i>
    </div>
    <div class="toggle-area text-right" id="arrow-left" style="display:none">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>
    <?php } ?>

<section class="custom-design-area">
    
    
     
    
    <div class="user-area">
        <div class="row">
             <div class="col-lg-4">
                <img src="<?php if($user->image != ''){ echo base_url().$user->image;}else{ echo base_url().'assets/websiteassets/img/profile-vector.png';}?>" alt="">
             </div>
             
             <div class="col-lg-8">
                    <p>Hello,</p>
                 <h5><?php echo $user->name; ?></h5>
             </div>
        </div>
    </div>
<div class="sidebarmenu">
   
            <ul>
                <li>
                    <p><i class="fa fa-home" aria-hidden="true"></i>My Account <span class="float-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span></p>
                    
                    <div class="inner-ul" style="display: block;">
                        <ul>
                            <li><a href="<?php echo base_url('website/Account'); ?>">
                              <i class="fa fa-user" aria-hidden="true"></i>  Profile Information
                            </a></li>
                            <li><a href="<?php echo base_url('website/Account/address'); ?>">
                            <i class="fa fa-address-card" aria-hidden="true"></i>   Manage Address
                            </a></li>
                            
                        </ul>
                    </div>
                </li>

                <li>
                    <p><i class="fa fa-sticky-note" aria-hidden="true"></i>My Orders <span class="float-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span></p>

                    <div class="inner-ul" style="display: block;">
                        <ul>
                        <li><a href="<?php echo base_url('website/Account/myorders'); ?>">
                            <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                Order History
                            </a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="<?php echo base_url('website/Wishlist'); ?>">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                        Wish List
                        <span class="float-right"></span>
                    </a>
                </li>
            
                <li>
                    <a href="<?php echo base_url('website/Notification'); ?>">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                        Notification
                        <span class="float-right"></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('website/Login/logout'); ?>">
                    <i class="fa fa-user-times" aria-hidden="true"></i>
                        Logout
                        <span class="float-right"></span>
                    </a>
                </li>
            </ul>
        </div>
 </section>
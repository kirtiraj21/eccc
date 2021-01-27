<div id="left-sidebar" class="sidebar">
        <div class="navbar-brand text-center">
            <a href="<?php echo base_url('admin/Home/')?>">
                <!--<img src="http://www.wrraptheme.com/templates/hexabit/html/assets/images/icon-dark.svg" alt="HexaBit Logo" class="img-fluid logo">-->
                <span>YIKOOO</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm btn-default float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
        </div>
        <div class="sidebar-scroll">
            <?php 
            $this->db->select('*');
  	        $this->db->from('admin_user');
  	        $query=$this->db->get();
  	        $admn = $query->row();
  	        //print_r($admn);
  	        ?>
            <div class="user-account">
                <div class="user_div">
                    <img src="<?php echo base_url($admn->admin_logo)?>" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong><?php echo $admn->username;?></strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        <li><a href="<?php echo base_url('admin/Profile')?>"><i class="icon-user"></i>My Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('admin/Login/logout')?>"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>
            </div>  
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li <?php if($this->uri->segment(2)=="Home" && $this->uri->segment(3)==""){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Home')?>"><i class="icon-home"></i><span>Dashboard</span></a></li>
                    <li <?php if($this->uri->segment(2)=="Banner" || $this->uri->segment(2)=="Contact" || $this->uri->segment(2)=="About" || $this->uri->segment(2)=="Client"){ echo "class='active'"; } ?>>
                        <a href="#" class="has-arrow"><i class="icon-map"></i><span>CMS</span></a>
                        <ul>
                          <li <?php if($this->uri->segment(2)=="Banner" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Banner')?>"><i class="icon-bag"></i><span> Web Banner</span></a></li>
                          <li <?php if($this->uri->segment(2)=="Limited_time_banner" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Limited_time_banner/edit')?>"><i class="icon-bag"></i><span> Limited Time Banner</span></a></li>
                          <li <?php if($this->uri->segment(2)=="About" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/About/edit')?>"><i class="icon-bag"></i><span> About</span></a></li>
                          <li <?php if($this->uri->segment(2)=="Client" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Client')?>"><i class="icon-bag"></i><span> Client Say</span></a></li>
                          <li <?php if($this->uri->segment(2)=="Contact" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Contact')?>"><i class="icon-bag"></i><span> Contact</span></a></li>
                           
                                                       
                        </ul>
                    </li>
                    <li <?php if($this->uri->segment(2)=="App_banner" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/App_banner')?>"><i class="icon-screen-smartphone"></i><span>App Banner</span></a></li>
                    
                    <li <?php if($this->uri->segment(2)=="Category" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Category')?>"><i class="icon-notebook"></i><span>Category</span></a></li>
                    
                    <li <?php if($this->uri->segment(2)=="Sub_Category" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Sub_Category')?>"><i class="icon-notebook"></i><span>Sub Category</span></a></li>
                    
                    <li <?php if($this->uri->segment(2)=="Brand" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Brand')?>"><i class="icon-tag"></i><span>Brand</span></a></li>
                    <li <?php if($this->uri->segment(2)=="Size" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Size')?>"><i class="icon-vector"></i><span>Size</span></a></li>
                    <li <?php if($this->uri->segment(2)=="Color" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Color')?>"><i class="icon-list"></i><span>Color</span></a></li>

                    <li <?php if($this->uri->segment(2)=="Product" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Product')?>"><i class="icon-basket-loaded"></i><span>Product</span></a></li>
                     <li <?php if($this->uri->segment(2)=="Order" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Order')?>"><i class="icon-note"></i><span>Orders</span></a></li>
                     <li <?php if($this->uri->segment(2)=="Couriers" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Couriers')?>"><i class="icon-note"></i><span>Couriers</span></a></li>
                      <li <?php if($this->uri->segment(2)=="Coupon" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Coupon')?>"><i class="icon-note"></i><span>Coupon Code</span></a></li>
                       <li <?php if($this->uri->segment(2)=="Privacy" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Privacy/edit/'); ?>"><i class="icon-note"></i><span>Privacy</span></a></li>
                        <li <?php if($this->uri->segment(2)=="Help" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Help/edit/'); ?>"><i class="icon-note"></i><span>Help</span></a></li>
                         <li <?php if($this->uri->segment(2)=="Faq" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Faq')?>"><i class="icon-note"></i><span>Faq</span></a></li>

                   
                   <?php /* <li <?php if($this->uri->segment(2)=="News"){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/News')?>"><i class="icon-envelope"></i><span>News</span></a></li>
                      <li <?php if($this->uri->segment(2)=="Contact"){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Contact')?>"><i class="icon-envelope"></i><span>Contact</span></a></li>
                     <li <?php if($this->uri->segment(2)=="Report"){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Report')?>"><i class="icon-envelope"></i><span>Damage Report</span></a></li>
                        <li>
                        <a href="#Maps" class="has-arrow"><i class="icon-map"></i><span>Emergency Contact</span></a>
                        <ul>
                           <!--<li <?php if($this->uri->segment(2)=="Emergency" && $this->uri->segment(3)=="within"){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Emergency/within')?>">Within office hr</a></li>-->
                            <li <?php if($this->uri->segment(2)=="Emergency" && $this->uri->segment(3)=="outoff"){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Emergency/outoff')?>">Out of office hr</a></li>
                                                       
                        </ul>
                    </li>
                    <li <?php if($this->uri->segment(2)=="Magazine" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Magazine')?>"><i class="icon-envelope"></i><span>Magazine</span></a></li>
                     <li <?php if($this->uri->segment(2)=="Home" && $this->uri->segment(3)=="privacy" ){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Home/privacy')?>"><i class="icon-envelope"></i><span>Privacy</span></a></li>
                     <li <?php if($this->uri->segment(2)=="Home" && $this->uri->segment(3)=="imprint"){ echo "class='active'"; } ?>><a href="<?php echo base_url('admin/Home/imprint')?>"><i class="icon-envelope"></i><span>Imprint</span></a></li>
                     */ ?>
                    <!--<li><a href="app-chat.html"><i class="icon-bubbles"></i><span>Chat</span></a></li>-->
                    
                </ul>
            </nav>     
        </div>
    </div>
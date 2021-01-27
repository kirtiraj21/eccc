<!-- START FOOTER -->
<?php         $contactdata = $this->Home_model->get_single_row("contact_info",array());
 ?>
        <footer class="footer_dark">
            
            <div class="container">
                <div class="payment_type" style="border-bottom: 1px solid #dad5d5;">
                    <div class="container">
                        <h3> Payment Method </h3>
                        <ul>
                            <li>
                                <a href="javascript:;"> <span class="visa_pay"></span> </a>
                            </li>
                            <li>
                                <a href="javascript:;"> <span class="master_pay"></span> </a>
                            </li>
                            <li>
                                <a href="javascript:;"> <span class="express_pay"></span> </a>
                            </li>
                            <li>
                                <a href="javascript:;"> <span class="fpx_pay"></span> </a>
                            </li>
                            <li>
                                <a href="javascript:;"> <span class="ipay_pay"></span> </a>
                            </li>
                            <li>
                                <a href="javascript:;"> <span class="cashDel_pay"></span> </a>
                            </li>
                            <li>
                                <a href="javascript:;"> <span class="boast_pay"></span> </a>
                            </li>
                            <li>
                                <a href="javascript:;"> <span class="wallet_pay"></span> </a>
                            </li>
                            <li>
                                <a href="javascript:;"> <span class="grab_pay"></span> </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="payment_type">
                    <div class="container">
                        <h3> Delivery Services </h3>
                        <ul>
                            <li>
                                <a href="javascript:;"> <img src="https://laz-img-cdn.alicdn.com/tfs/TB1T_EMSkPoK1RjSZKbXXX1IXXa-311-118.png"> </a>
                            </li>
                            <li>
                                <a href="javascript:;"> <img src="https://laz-img-cdn.alicdn.com/tfs/TB1UhkVShYaK1RjSZFnXXa80pXa-770-298.png"> </a>
                            </li>
                            <li>
                                <a href="javascript:;"> <img src="https://laz-img-cdn.alicdn.com/tfs/TB1BMIzSgTqK1RjSZPhXXXfOFXa-294-46.png"> </a>
                            </li>
                            <li>
                                <a href="javascript:;"> <img src="https://laz-img-cdn.alicdn.com/tfs/TB1.lALSa6qK1RjSZFmXXX0PFXa-78-30.png"> </a>
                            </li>
                            <li>
                                <a href="javascript:;"> <img src="https://laz-img-cdn.alicdn.com/tfs/TB1GQ3fk_Zmx1VjSZFGXXax2XXa-108-30.png"> </a>
                            </li>
                            <li>
                                <a href="javascript:;"> <img src="https://laz-img-cdn.alicdn.com/tfs/TB1D4kVShYaK1RjSZFnXXa80pXa-310-85.png"> </a>
                            </li>
                            <li>
                                <a href="javascript:;"> <img src="https://laz-img-cdn.alicdn.com/tfs/TB18UEASgDqK1RjSZSyXXaxEVXa-846-409.png"> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="widget">
                                <div class="footer_logo">
                                    <a href="<?php echo base_url();?>">
                                        <!--<h3>YIKOOO</h3>-->
                                        <img src="<?php echo base_url('assets/websiteassets/img/');?>logo2.png" alt="logo" />
                                    </a>
                                </div>
                                <p> Copyright &copy; 2020 YIKOO. All Rights Reserved </p>
                            </div>
                            
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="widget footlist">
                                <h6 class="widget_title">Customer Care</h6>
                                <ul class="widget_links">
                                     <li><a href="javascript:;">FAQs</a></li>
                                    <li><a href="javascript:;">Terms And Conditions</a></li>
                                    <li><a href="javascript:;">Site User Terms</a></li>
                                    <li><a href="javascript:;">Returns And Refund Policy</a></li>
                                    <li><a href="javascript:;">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="widget">
                                <h6 class="widget_title">Contact Info</h6>
                                <ul class="contact_info contact_info_light">
                                    <?php if($contactdata != ''){ ?>
                                    <!--<li>-->
                                    <!--    <i class="ti-location-pin"></i>-->
                                    <!--    <p><?php // echo $contactdata->address; ?></p>-->
                                    <!--</li>-->
                                    <li>
                                        <i class="ti-email"></i>
                                        <a href="mailto:info@sitename.com"><?php echo $contactdata->email; ?></a>
                                    </li>
                                    <li>
                                        <i class="ti-mobile"></i>
                                        <p><?php echo $contactdata->phone; ?></p>
                                    </li>
                                    <?php }else{ echo "----";} ?>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <!--<div class="bottom_footer border-top-tran">-->
            <!--    <div class="container">-->
            <!--        <div class="row">-->
            <!--            <div class="col-md-12">-->
            <!--                <p class="mb-md-0 text-center text-md-center">Copyright © 2020 YIKOOO. All Rights Reserved</p>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        </footer>
        <!-- END FOOTER -->

        <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

        <!-- Latest jQuery --> 
        <script src="<?php echo base_url(); ?>assets/websiteassets/js/jquery-1.12.4.min.js"></script> 
        <!-- jquery-ui --> 
        <script src="<?php echo base_url(); ?>assets/websiteassets/js/jquery-ui.js"></script>
        <!-- popper min js -->
        <script src="<?php echo base_url(); ?>assets/websiteassets/js/popper.min.js"></script>
        <!-- Latest compiled and minified Bootstrap --> 
        <script src="<?php echo base_url(); ?>assets/websiteassets/bootstrap/js/bootstrap.min.js"></script> 
        <!-- owl-carousel min js  --> 
        <script src="<?php echo base_url(); ?>assets/websiteassets/owlcarousel/js/owl.carousel.min.js"></script> 
        <!-- magnific-popup min js  --> 
        <script src="<?php echo base_url(); ?>assets/websiteassets/js/magnific-popup.min.js"></script> 
        <!-- waypoints min js  --> 
        <script src="<?php echo base_url(); ?>assets/websiteassets/js/waypoints.min.js"></script> 
        <!-- parallax js  --> 
        <script src="<?php echo base_url(); ?>assets/websiteassets/js/parallax.js"></script> 
        <!-- countdown js  --> 
        <script src="<?php echo base_url(); ?>assets/websiteassets/js/jquery.countdown.min.js"></script> 
        <!-- imagesloaded js --> 
        <script src="<?php echo base_url(); ?>assets/websiteassets/js/imagesloaded.pkgd.min.js"></script>
        <!-- isotope min js --> 
        <script src="<?php echo base_url(); ?>assets/websiteassets/js/isotope.min.js"></script>
        <!-- jquery.dd.min js -->
        <script src="<?php echo base_url(); ?>assets/websiteassets/js/jquery.dd.min.js"></script>
        <!-- slick js -->
        <script src="<?php echo base_url(); ?>assets/websiteassets/js/slick.min.js"></script>
        <!-- elevatezoom js -->
        <script src="<?php echo base_url(); ?>assets/websiteassets/js/jquery.elevatezoom.js"></script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7TypZFTl4Z3gVtikNOdGSfNTpnmq-ahQ&amp;callback=initMap"></script>
        <!-- scripts js --> 
        <script src="<?php echo base_url(); ?>assets/websiteassets/js/scripts.js"></script>
        
        <script>
            $(document).ready(function(){
               $('#align-left').click(function(){
                   $('#align-left').hide();
                   $('#arrow-left').show();
                   $('.custom-design-area').addClass('disable');
               });
               $('#arrow-left').click(function(){
                   $('#align-left').show();
                   $('#arrow-left').hide();
                   $('.custom-design-area').removeClass('disable');
               }) 
            });
        </script>
        
        <script>
            $(document).ready(function(){
                $('.inner-ul').hide();
                 
               $('.sidebarmenu ul li p').click(function(){
                   $(this).next().slideToggle();
                   $(this).find('.float-right i').toggleClass('rizwan');
               });
               
            });
        </script>
        
        <script>
var lowerSlider = document.querySelector('#lower');
var  upperSlider = document.querySelector('#upper');

document.querySelector('#two').value=upperSlider.value;
document.querySelector('#one').value=lowerSlider.value;

var  lowerVal = parseInt(lowerSlider.value);
var upperVal = parseInt(upperSlider.value);

upperSlider.oninput = function () {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);

    if (upperVal < lowerVal + 4) {
        lowerSlider.value = upperVal - 4;
        if (lowerVal == lowerSlider.min) {
        upperSlider.value = 4;
        }
    }
    document.querySelector('#two').value=this.value
};

lowerSlider.oninput = function () {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);
    if (lowerVal > upperVal - 4) {
        upperSlider.value = lowerVal + 4;
        if (upperVal == upperSlider.max) {
            lowerSlider.value = parseInt(upperSlider.max) - 4;
        }
    }
    document.querySelector('#one').value=this.value
};
</script>

<style>
.mygreen{
color: #64c169;
}
</style>

<script>
$(document).ready(function(){
$('.wish-icon i').click(function(){
$(this).toggleClass('mygreen');
});
});
</script>
        
    </body>

</html>

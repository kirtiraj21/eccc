        
<?php include('header.php'); ?>

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
                    <div class="profile-content notification-detail">
                        <h4>Your Notification <span class="wishlist-items">(<?php echo count($notificationdata); ?>)</span> </h4>
                    </div>
                </div>

                <div class="col-lg-12">
                    
                       <div class="notification-area">
                <?php foreach($notificationdata as $noti){ ?>
                        <!-- 1st notification start -->
                    <div class="notification-panel">
                       <div class="row">
                       
                        <!-- notification col -->

                    <div class="col-lg-2 col-sm-2">
                        <div class="notification-img">
                        <img src="assets/img/notification-letter.png" alt="">
                        </div>
                    </div>

                    <div class="col-lg-8 col-sm-8">
                      <h6><?php echo $noti->message; ?></h6>
                      <p>
                      <strong><?php echo date("h:i a", strtotime($noti->created_on)); ?> &nbsp;</strong> on <strong> &nbsp; <?php echo date("d-m-Y", strtotime($noti->created_on)); ?></strong>
                      </p>
                    </div>
                      
                       <!-- end -->

                       <!-- cancel icon col -->
                    <div class="col-lg-2 col-sm-2">
                      <div class="cancel">
                       <a href="<?php echo base_url('website/Notification/delete/'.base64_encode($noti->noti_id)); ?>"><button class="btn btn-fill-out rounded-0">
                       <i class="fas fa-times"></i></button></a>
                       </div>
                    </div>
                      <!-- end -->

                       </div>
                       <!-- end 1st notification -->
                       </div> 

                     <?php }  ?> 
                  


                        <!-- end notification area -->
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

<!--<script>-->
<!--    $(document).ready(function(){-->
<!--        $(".cancel button").click(function(){-->
<!--            $(this).parent().parent().parent().parent().remove();-->
<!--        });-->
<!--    });-->
<!--</script>-->
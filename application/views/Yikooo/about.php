        
<?php include('header.php'); ?>



<!-- END MAIN CONTENT -->

<style>
    .data_center{
        text-align: center;
        font-size: 18px;
        margin: 0;
        color: #333;
        letter-spacing: 1px;
    }
</style>

<div class="main_content">
    <!-- START SECTION BANNER -->
    
    <div class="section">
        <div class="container">
            <?php if($about != ''){?>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about_img scene mb-4 mb-lg-0">
                        <img src="<?php echo base_url($about->image); ?>" alt="about_img">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="heading_s1 nobefore">
                        <h2 ><?php echo $about->title; ?></h2>
                    </div>
                    <?php echo $about->description; ?>
                </div>
            </div>
            <?php }else{echo "<div class='data_center'><img style='width: 80px; display: block; margin: auto; margin-bottom: 25px;' src='https://mobidudes.com/Yikooo/assets/img/nodata.png'>No Data Found</div>";} ?>
        </div>
    </div>
   
    <!-- END SECTION BANNER -->
</div>

<!-- END MAIN CONTENT -->

<?php include('footer.php'); ?>
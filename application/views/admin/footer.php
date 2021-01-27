</div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<!-- Javascript -->
<script src="<?php echo base_url()?>assets/bundles/libscripts.bundle.js"></script>    
<script src="<?php echo base_url()?>assets/bundles/vendorscripts.bundle.js"></script>

<script src="<?php echo base_url()?>assets/bundles/c3.bundle.js"></script>
<script src="<?php echo base_url()?>assets/bundles/chartist.bundle.js"></script>
<!--<script src="http://www.wrraptheme.com/templates/hexabit/html/assets/vendor/toastr/toastr.js"></script>-->

<script src="<?php echo base_url()?>assets/bundles/mainscripts.bundle.js"></script>
<script src="<?php echo base_url()?>assets/js/index.js"></script>

<link rel="stylesheet" href="<?php echo base_url()?>assets/css/dataTables.bootstrap4.min.css">
<script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/js/dataTables.bootstrap4.min.js"></script>

    
  
      
    

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<script src="https://rawgit.com/asiffermann/summernote-image-title/master/summernote-image-title.js"></script>

<script>
    $(document).ready(function() {
    $('#summernote').summernote({
        lang: 'fr-FR',
        imageTitle: {
          specificAltField: true,
        },
        popover: {
            image: [
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']],
                ['custom', ['imageTitle']],
            ],
        },
    });
    $('#summernote1').summernote({
        lang: 'fr-FR',
        imageTitle: {
          specificAltField: true,
        },
        popover: {
            image: [
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']],
                ['custom', ['imageTitle']],
            ],
        },
    });
    
     
    $(".form-control").attr("autocomplete", "off");
     
});


</script>	



</body>

</html>

<!-- Footer Starts -->
<footer class="main-footer">
    <!-- Footer Area Starts -->
    <div class="footer-area">
        <!-- Nested Container Starts -->
        <div class="container-fluid ">
            <div class="row">
                <!-- Hosptial Information Starts -->
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <h4>Address</h4>
                    <ul class="list-unstyled address-list">
                        <li class="clearfix address">
                            <i class="fa fa-home"></i>
                             Sivagiri Sree Narayana Medical Mission Hospital, Puthenchantha, Varkala, Thiruvananthapuram
                        </li>
                        <li class="clearfix">
                            <i class="fa fa-fax"></i>
                            040 2602248 |  0470 2602249 |  0470 2601228
                        </li>
                        <li class="clearfix">
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:ssnmmhospital@gmial.com">ssnmmhospital@gmial.com</a>
                        </li>
                    </ul>
                </div>
                <!-- Hosptial Information Ends -->

             <!-- Signup Newsleter Starts -->
                <div class="col-md-5 col-xs-12 newsletter-block">
                    <h4>Signup Newsletter</h4>
                    <form action="#" class="newsletter">
                        <div class="form-group">
                            <input type="text" id="s_name" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" id="s_email" class="form-control" placeholder="Enter your Email Address">
                        </div>
                    </form> 
                        <button id="send" class="btn btn-lg  btn-secondary ">Submit</button>

                </div>
                <!-- Signup Newsletter Ends -->
                <!-- Services Starts -->
                 <div class="col-md-2 col-sm-4 col-xs-12">
                    <h4>Social</h4>
                    <ul class="list-unstyled tweets-list">
                        <li>
                            <i class="fa fa-facebook"></i>
                             Follow us facebook
                            <a href="#"></a>
                        </li>
                        <li>
                            <!-- <i class="fa fa-twitter"></i>
                            <a href="#"></a> -->
                        </li>
                    </ul>
                </div>
                <!-- Twitter Ends -->

            </div>
        </div>
        <!-- Nested Container Ends -->
    </div>
    <!-- Footer Area Ends -->
    <!-- Copyright Starts -->
    <div class="copyright">
        <div class="container-fluid clearfix">
            <p class="pull-left">
                &copy; Copyright 2017. AlL Rights Reserved By <span>ssnmmh</span>
            </p>
            <ul class="list-unstyled list-inline pull-right">
                <li><a href="<?php echo site_url('home/404'); ?>">Terms Of Services</a></li>
                <li><a href="<?php echo site_url('home/404'); ?>">Privacy</a></li>
                <li><a href="<?php echo site_url('home/contact'); ?>">Contact Us</a></li>
            </ul>
        </div>
    </div>
    <!-- Copyright Ends -->
</footer>
<!-- Footer Ends -->

<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-migrate-1.2.1.min.js"></script>  
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/camera/js/jquery.mobile.customized.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/camera/js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/camera/js/camera.min.js"></script>  
<script src="<?php echo base_url(); ?>assets/js/plugins/shuffle/jquery.shuffle.modernizr.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/carousel.js"></script>
<script type="text/javascript">

    $(window).on('load', function () {         
    if( $.cookie('splashscreen') == null ) {
         var date = new Date();
         var minutes = 30;
         date.setTime(date.getTime() + (minutes * 60 * 1000));
        $.cookie("splashscreen", 1, { expires: date }); // cookie is valid for 30 minutes
        $('#preloader').show();
        $('#status').delay(3000).fadeOut('slow');//will first fade out the loading animation 
        $('#preloader').delay(3000).fadeOut('slow'); // will fade out the white DIV that covers the website. 
        }
        $('body').delay(350).css({'overflow': 'visible'});
    });



            // CAMERA SLIDER
    $("#camera_wrap_1").camera({
        alignment: 'center',
        autoAdvance: true,
        mobileAutoAdvance: true,
        barDirection: 'leftToRight',
        barPosition: 'bottom',
        loader: 'none',
        opacityOnGrid: false,
        cols: 12,
        height: '50%',
        playPause: false,
        pagination: false,
        imagePath: './assets/js/plugins/camera/images/'
    });

//news letter signup
        $("#send").click(function () {
            var base_url = "<?php echo base_url(); ?>";
            
        if( ($("#s_name").val() == '' ) || ($("#s_email").val() == '' ) ){
                $("#Modal").find(".modal-body" ).text("Give Name and Email");
                    $("#Modal").modal({show: true});
        }else{
            
            if(validateEmail($("#s_email").val())){
                $.ajax({
                type: "POST",
                url: base_url + "index.php/comments/newsLetter",
                data: {"name": $("#s_name").val(), "email": $("#s_email").val()},
                dataType: "json",
                success:
                        function (data) {
                            $("#Modal").find( ".modal-body" ).text(data.status +"for News Letter Signup");
                            $("#Modal").modal({show: true});
                        },
                error: function (data) {
                    $("#Modal").find( ".modal-body" ).text("News Letter Signup Failed");
                    $("#Modal").modal({show: true});
                }
            });
            }else{
              $("#Modal").find(".modal-body" ).text("Give a valid email address");
                    $("#Modal").modal({show: true});  
            }
        }

});  

/* jQuery Validate Emails with Regex */
function validateEmail(Email) {
    var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

    return $.trim(Email).match(pattern) ? true : false;
}


</script>




</body>
</html>
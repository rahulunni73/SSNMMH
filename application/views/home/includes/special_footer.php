<!-- Footer Starts -->
<footer class="main-footer">
    <!-- Footer Area Starts -->
    <div class="footer-area">
        <!-- Nested Container Starts -->
        <div class="container">
            <div class="row">
                <!-- Hosptial Information Starts -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <h4>Hosptial Information</h4>
                    <p>
                        Sivagiri Sree Narayana Medical Mission Hospital
                    </p>
                    <ul class="list-unstyled address-list">
                        <li class="clearfix address">
                            <i class="fa fa-home"></i>
                            Puthenchantha, Varkala,Thiruvananthapuram
                        </li>
                        <li class="clearfix">
                            <i class="fa fa-fax"></i>
                            040 2602248
                        </li>
                        <li class="clearfix">
                            <i class="fa fa-phone"></i>
                            0470 2602249
                        </li>
                        <li class="clearfix">
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:info@yourhospitalsite.com">ssnmmhospital@gmial.com</a>
                        </li>
                    </ul>
                </div>
                <!-- Hosptial Information Ends -->
                <!-- Services Starts -->
                <div class="col-md-2 col-sm-4 col-xs-12">
                    <h4>Services</h4>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fa fa-angle-right"></i> Pediatric Clinic</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> Diagnosis Clinic</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> Cardiac Clinic</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> Laboratory Analysis</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> Dental Clinic</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> Gynecological Clinic</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> Psychological</a></li>
                    </ul>
                </div>
                <!-- Services Ends -->
                <!-- Twitter Starts -->
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <h4>Twitter</h4>
                    <ul class="list-unstyled tweets-list">
                        <li>
                            <i class="fa fa-twitter"></i>
                            Our Hospitals Website Launched.
                            <a href="#">http://t.co/xyz12abc</a>
                        </li>
                        <li>
                            <i class="fa fa-twitter"></i>
                            Our Hospitals Twitter Page, please follow.
                            <a href="#">http://t.co/testlink</a>
                        </li>
                    </ul>
                </div>
                <!-- Twitter Ends -->
                <!-- Signup Newsletter Starts -->
                <div class="col-md-3 col-xs-12 newsletter-block">
                    <h4>Signup Newsletter</h4>
                    <form action="#" class="newsletter">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Enter your Email Address">
                        </div>
                        <button type="submit" class="btn btn-lg btn-block btn-secondary">Submit</button>
                    </form>
                </div>
                <!-- Signup Newsletter Ends -->
            </div>
        </div>
        <!-- Nested Container Ends -->
    </div>
    <!-- Footer Area Ends -->
    <!-- Copyright Starts -->
    <div class="copyright">
        <div class="container clearfix">
            <p class="pull-left">
                &copy; Copyright 2017. AlL Rights Reserved By <span>SSNMMH</span>
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
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/camera/js/camera.min.js"></script>	
<script src="<?php echo base_url(); ?>assets/js/plugins/shuffle/jquery.shuffle.modernizr.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script>
    $(function () {
        //news letter signup
        $("#send").click(function () {
            var base_url = "<?php echo base_url(); ?>";
            $.ajax({
                type: "POST",
                url: base_url + "index.php?/comments/newsLetterSignup",
                data: {name: $("#name").val(), email: $("#email").val()},
                dataType: "text",
                cache: false,
                success:
                        function (data) {
                            var test = JSON.parse(data);
                            alert(test.status);
                            $("#name").val('');
                            $("#email").val('');
                        },
                error: function (data) {
                    var test = JSON.parse(data);
                    alert(test.status);
                    $("#name").val('');
                    $("#email").val('');
                }
            });
            return false;
        });
    });
</script>
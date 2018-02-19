	
<!-- Main Banner Starts -->
<div class="main-banner seven">
    <div class="container">
        <h2><span><?php print_r($dept_name[0]->DEPT_NAME); ?></span></h2>
    </div>
</div>
<!-- Main Banner Ends -->
<!-- Breadcrumb Starts -->
<div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled list-inline">
            <li><a href="<?php echo site_url('home/index')?>">Home</a></li>
            <li class="active"><?php print_r($dept_name[0]->DEPT_NAME); ?></li>
        </ul>
    </div>
</div>		
<!-- Breadcrumb Ends -->

<!-- Main Container Starts -->
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12 col col-md-12">
                <h4 style="margin-bottom: 2px;padding-bottom: 2px;border-bottom: 2px solid #009bdb; border-bottom-width: 1px;border-bottom-style: solid; border-bottom-color: rgb(206, 206, 206);"><span class="btn btn-secondary text-uppercase"><?php echo '' ?>About</span></h4>
                <p>
                    <?php if( (count($dept_info)) > 0) {
                     print_r($dept_info[0]->DESCRIPTIONS);    
                    }?>
                </p>
            </div>
        </div>
<!--
        <!-- 1/2 Column Block Starts 
        <div class="row">
            <h4 style="margin-bottom: 2px;padding-bottom: 2px;border-bottom: 2px solid #009bdb; border-bottom-width: 1px;border-bottom-style: solid; border-bottom-color: rgb(206, 206, 206);"><span>TREATMENT</span></h4>
            <div class="col-sm-6 col-xs-12">
                <h4>1/2</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco quat. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                </p>
            </div>
            <div class="col-sm-6 col-xs-12">
                <h4>1/2</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco quat. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                </p>
            </div>
        </div> -->
        <!-- 1/2 Column Block Ends -->
    </div>

<?php
 if( (count($dept_info)) > 0) { ?>
    <div class="row">
        <!-- Meet Our Doctors Section Starts -->
        <section class="featured-doctors">
            <!-- Nested Container Starts -->
            <div class="container">
                <h2><span class="lite">Meet Our</span>Doctors</h2>
                <p></p>
                <div class="row">
                    <?php foreach ($dept_info as $rows) {?>
                        <!-- Doctor Bio #1 Starts -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="bio-box">
                                <div class="profile-img" style="padding-top: 10px;">
                                    <img style="margin: auto;border: 1px solid #000;" src='<?php echo $IMG_PATH.'doctors/'.$rows->IMG_PATH  ?>' alt="Doctor" class="img-responsive img-center-sm img-center-xs">
                                </div>
                                <div class="inner">
                                    <h5>Dr. <?php echo $rows->DOC_NAME ?></h5>
                                    <p class="designation"><?php echo $rows->QUALIFICATION?></p>
                                    <p style="text-align: center; color: green">OP DAYS : <?php $string = $rows->OPDAYS;print_r($string);?></p>
                                </div>							
                                <a href="doctor-profile.html" class="btn btn-transparent inverse text-uppercase">Book An Appointment</a>
                            </div>
                        </div>
                        <!-- Doctor Bio #1 Ends -->
                    <?php } ?>
                </div>
            </div>
            <!-- Nested Container Ends -->
        </section>
        <!-- Meet Our Doctors Section Ends -->
    </div>

<?php } ?>

</div>
<!-- Main Container Ends -->






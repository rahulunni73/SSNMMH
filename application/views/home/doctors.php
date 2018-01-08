<!-- Main Container Starts -->
<div class="container main-container">
    <!-- Doctors Desigination Filters Starts -->
    <ul id="doctors-filter" class="list-unstyled list-inline">
       
        <li><a class="active" href="#" data-group="all">All Department</a></li>
            <?php foreach ($dept_names as $rows) { ?>
                <li><a href="#" data-group="<?php echo $rows->DEPT_NAME; ?>"><?php echo $rows->DEPT_NAME; ?></a></li>
             <?php } ?>
    </ul>
    <!-- Doctors Desigination Filters Ends -->
    <!-- Doctors Bio List Starts -->
    <ul id="doctors-grid" class="row grid">
         <?php foreach ($doctors as $rows) {?>
        <!-- Doctor Bio #1 Starts -->
        <li class="col-md-4 col-sm-6 col-xs-12 doctors-grid" data-groups='["all", "<?php echo $rows->DEPARTMENT; ?>"]'>
            <div class="bio-box">
                <div class="profile-img">
                    <img style="margin: auto;border: 1px solid #000;" src="<?php echo $IMG_PATH.'doctors/'.$rows->IMG_PATH ?>" alt="Doctor" class="img-responsive img-center-sm img-center-xs">
                    <div class="overlay">
                        <ul class="list-unstyled list-inline sm-links">
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="inner">
                    <h4>Dr. <?php echo $rows->DOCTOR_NAME; ?></h4>
                    <p class="designation"><?php echo $rows->SPECIALIZATION; ?></p>
                   <p class="divider"><i class="fa fa-plus-square"></i></p>
                    <p>
                    </p>
                </div>							
                <a href="doctor-profile.html" class="btn btn-secondary text-uppercase">Book An Appointment</a>
            </div>
        </li>
         <?php } ?>
        <!-- Doctor Bio #1 Ends -->
    </ul>
    <!-- Doctors List Ends -->
</div>
<!-- Main Container Ends -->
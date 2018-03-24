<!-- Main Container Starts -->
<div class="container main-container">
    <!-- Doctors Desigination Filters Starts -->
    <ul id="doctors-filter" class="list-unstyled list-inline">
       
        <li><a class="active" href="#" data-group="all">All Department</a></li>
            <?php foreach ($dept_names as $rows) { ?>
                <li><a href="#" data-group="<?php echo $rows->DEPT_ID; ?>"><?php echo $rows->DEPT_NAME; ?></a></li>
             <?php } ?>
    </ul>
    <!-- Doctors Desigination Filters Ends -->


    <!-- Doctors Bio List Starts -->
    <ul id="doctors-grid" class="row grid">
         <?php foreach ($doctors as $rows) {?>
        <!-- Doctor Bio #1 Starts -->
        <li class="col-md-4 col-sm-6 col-xs-12 doctors-grid" data-groups='["all", "<?php echo $rows->DEPT_ID; ?>"]'>
            <div class="bio-box">
                <a href="<?php echo site_url('home/profile').'/'.$rows->DOCT_ID.'/'.$rows->DEPT_ID ;?>" id="dprofile_form">
                  <div class="profile-img">
                    <img style="margin: auto;border: 1px solid #000;" src="<?php echo $IMG_PATH.'doctors/'.$rows->IMG_PATH ?>" alt="Doctor" class="img-responsive img-center-sm img-center-xs">
                    <div class="overlay">
                        <!-- <ul class="list-unstyled list-inline sm-links">
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        </ul>-->
                    </div> 
                </div></a>
              
                <div class="inner">
                    <h4>Dr. <?php echo $rows->DOC_NAME; ?></h4>
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
<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

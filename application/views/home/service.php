    

	
	<div class="tabs-wrap">
			<!-- Nav Tabs Starts -->
				<!-- <ul class="nav nav-tabs">
					<li class="active">
						<a href="#tab-1" aria-controls="tab-1" data-toggle="tab">
							<div class="icon hidden-sm hidden-xs">
								<img src='<?php echo base_url();?>assets1/images/dept_icons/band-aid.png' alt="24x7 Ambulance">
							</div>
							<h5>First Aid</h5>
						</a>
					</li>
					<li>
						<a href="#tab-2" aria-controls="tab-2" data-toggle="tab">
							<div class="icon hidden-sm hidden-xs">
								<img src='<?php echo base_url();?>assets1/images/dept_icons/tooth.png' alt="24x7 Ambulance">
							</div>
							<h5>Dental Care</h5>
						</a>
					</li>
					<li>
						<a href="#tab-3" aria-controls="tab-3" data-toggle="tab">
							<div class="icon hidden-sm hidden-xs">
								<img src='<?php echo base_url();?>assets1/images/dept_icons/ambulance.png' alt="24x7 Ambulance">
							</div>
							<h5>24x7 Ambulance</h5>
						</a>
					</li>
					<li>
						<a href="#tab-4" aria-controls="tab-4" data-toggle="tab">
							<div class="icon hidden-sm hidden-xs">
								<img src='<?php echo base_url();?>assets1/images/dept_icons/stethoscope.png' alt="24x7 Ambulance">
							</div>
							<h5>Doctors</h5>
						</a>
					</li>
					<li>
						<a href="#tab-5" aria-controls="tab-5" data-toggle="tab">
							<div class="icon hidden-sm hidden-xs">
								<img src="<?php echo base_url();?>assets1/images/dept_icons/saline-bottle.png" alt="Medical Pharmacy">
							</div>
							<h5>Medical Pharmacy</h5>
						</a>
					</li>
					<li>
						<a href="#tab-6" aria-controls="tab-6" data-toggle="tab">
							<div class="icon hidden-sm hidden-xs">
								<img src="<?php echo base_url();?>assets1/images/dept_icons/path.png" alt="Lab">
							</div>
							<h5>Laboratory</h5>
						</a>
					</li>
				</ul> -->
			<!-- Nav Tabs Ends -->
			</div>




    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">
        <small>Services</small>
      </h1>

      <div class="row">

      	<?php foreach ($serv_details as $row) { ?>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="<?php echo $IMG_PATH.'services/'.$row->IMG_PATH ?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title" style="text-align: center;">
                <a href="#"><?php echo $row->SERVICE_NAME?></a>
              </h4>
              <p class="card-text"></p>
            </div>
          </div>
        </div>

 <?php }?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
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







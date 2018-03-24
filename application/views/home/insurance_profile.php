<?php
?>
	<!-- Main Banner Starts -->
		<div class="main-banner six">
			<div class="container">
				<h2><span>Insurance Profile</span></h2>
			</div>
		</div>
	<!-- Main Banner Ends -->
	<!-- Breadcrumb Starts -->
		<div class="breadcrumb">
			<div class="container">
				<ul class="list-unstyled list-inline">
					<li><a href="<?php echo site_url('home/index') ?>">Home</a></li>
					<li><a href="<?php echo site_url('home/insurance') ?>">Insurance</a></li>
					<li class="active">Profile</li>
				</ul>
			</div>
		</div>		
	<!-- Breadcrumb Ends -->
	<!-- Main Container Starts -->
		<div class="container main-container">
		<!-- Doctor Profile Starts -->
			<div class="row">
				<div class="col-sm-5 col-xs-12">
					<div class="profile-block">
						<div class="panel panel-profile">
							<div class="panel-heading">
								<img style="display: block;margin: auto;" src="<?php echo $IMG_PATH.'insurance/'.$insur_details[0]->IMG_PATH ?>" alt="Doctor Profile Image" class="img-responsive img-center-xs">
								<h3 class="panel-title"><?php echo $insur_details[0]->INSUR_NAME; ?></h3>
								<p class="caption"></p>
							</div>
							<div class="panel-body my_word_wrap">
								<ul class="list-unstyled">
									<li class="row">
										<span class="col-sm-4 col-xs-12"><strong></strong></span>
										<span class="col-sm-8 col-xs-12"></span>
									</li>
									<li class="row">
										<span class="col-sm-4 col-xs-12"><strong></strong></span>
										<span class="col-sm-8 col-xs-12"></span>
									</li>
									<li class="row">
										<span class="col-sm-4 col-xs-12"><strong></strong></span>
										<span class="col-sm-8 col-xs-12"></span>
									</li>
								</ul>
							</div>
							<!-- <div class="panel-footer text-center-md text-center-sm text-center-xs">
								<div class="row">
									<div class="col-lg-6 col-xs-12">
										<ul class="list-unstyled list-inline sm-links">
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-skype"></i></a></li>
										</ul>
									</div>
									<div class="col-lg-6 col-xs-12">
										<a href="#" class="btn btn-secondary text-uppercase">Book An Appointment</a>
									</div>
								</div>
							</div> -->
						</div>
					</div>
				</div>
				<div class="col-sm-7 col-xs-12">
					<div class="profile-details">
						<h3 class="main-heading2"><?php echo $insur_details[0]->INSUR_NAME; ?></h3>
						<h4>About</h4>
						<h5></h5>
						<p>
							<?php echo $insur_details[0]->INSUR_CONTENT; ?>
						</p>
					</div>
				</div>
			</div>
		<!-- Doctor Profile Ends -->
		<!-- Spacer Block Starts -->
			<div class="spacer-block"></div>
		<!-- Spacer Block Ends -->
		<!-- Related Best Doctors Starts -->
<!-- 			<h2 class="main-heading1 lite margin-bottom-5">Related</h2>
			<h2 class="main-heading2 nomargin-top">Best Doctors</h2> -->
			<ul id="doctors-grid" class="row">			
			<!-- Doctor Bio #1 Starts -->
				
<!--  <?php foreach ($doctorgroup as $rows) {?>
				<li class="col-md-4 col-sm-6 col-xs-12 doctors-grid">
					<div class="bio-box">
						<a style="text-decoration: none" href="<?php echo site_url('home/profile').'/'.$rows->DOCT_ID.'/'.$rows->DEPT_ID ;?>" id="dprofile_form">
						<div class="profile-img" >
							<img style="display: block;margin: auto;" src="<?php echo $IMG_PATH.'doctors/'.$rows->IMG_PATH ?>" alt="Doctor" class="img-responsive img-center-sm img-center-xs">
							<div class="overlay">
								<ul class="list-unstyled list-inline sm-links">
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-skype"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="inner">
							<h4>Dr. <?php echo $rows->DOC_NAME; ?></h4>
							<p class="designation"><?php echo $rows->SPECIALIZATION; ?></p>
							<p class="divider"><i class="fa fa-plus-square"></i></p>
							<!-- <p>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. It was popularised in the with the release of Letraset sheets Lorem Ipsum passages.
							</p> -->
						</div>							
						<a href="doctor-profile.html" class="btn btn-secondary text-uppercase">Book An Appointment</a>
				</a>		
					</div>
				</li>


<?php } ?> -->


			<!-- Doctor Bio #1 Ends -->
			</ul>
		<!-- Related Best Doctors Ends -->
		</div>
	<!-- Main Container Ends -->
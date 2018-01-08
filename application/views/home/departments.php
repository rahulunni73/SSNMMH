	
<!-- Main Banner Starts -->
<div class="main-banner seven">
    <div class="container">
        <h2><span>Departments</span></h2>
    </div>
</div>
<!-- Main Banner Ends -->
<!-- Breadcrumb Starts -->
<div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled list-inline">
            <li><a href="<?php echo site_url('home/index') ?>">Home</a></li>
            <li class="active">Departments</li>
        </ul>
    </div>
</div>		
<!-- Breadcrumb Ends -->

<!-- Main Container Starts -->
<div class="container main-container medical-services">

<section class="medical-services">
    <ul class="list-unstyled row text-center">
    <?php foreach ($dept_names as $rows) {?>
             <li class="col-md-3 col-sm-4 col-xs-6 no-padding">
                <a href="<?php echo site_url('home/deptartmentprof/'.$rows->DEPT_ID) ?>">
                    <div class="what-we-do-block">
                        <img src='<?php echo (base_url()."assets1/images/departments/".$rows->IMG_PATH) ?>' alt="">  
                        <div class="what-we-do-block-content">
                            <div class="icon">
                                <i> <img src="<?php echo base_url(); ?>assets/images/icons/general medicine.png" alt="critical care"></i></div>
                            <h5><?php echo $rows->DEPT_NAME ?></h5>
                        </div>                   
                    </div>
                </a>
            </li>
<?php } ?>

</ul>
    </section>
</div>
<!-- Main Container Ends -->


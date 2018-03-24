	
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
                                <i><img src="<?php echo (base_url()."assets1/images/dept_icons/".$rows->ICON_PATH) ?>" alt="icons-missing"></i></div>
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


<!-- Main Banner Starts -->
<div class="main-banner seven">
    <div class="container">
        <h2><span>Insurance</span></h2>
    </div>
</div>
<!-- Main Banner Ends -->
<!-- Breadcrumb Starts -->
<div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled list-inline">
            <li><a href="<?php echo site_url('home/index') ?>">Home</a></li>
            <li class="active">Insurance</li>
        </ul>
    </div>
</div>		
<!-- Breadcrumb Ends -->

<!-- Main Container Starts -->
<div class="container main-container medical-services">

<!--     <div class="row">

        <h4 style="text-align: center; text-transform: uppercase"><b>
                Insurance Companies Who Have Tie Up With Our Hospital</b>
        </h4>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon1.png" alt="" style="width:100%;">                            
        </div>                    
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon2.png" alt="" style="width:100%;">                            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon3.png" alt="" style="width:100%;">                            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon4.png" alt="" style="width:100%;">                            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon5.png" alt="" style="width:100%;">                            
        </div>                    
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon6.png" alt="" style="width:100%;">                            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon7.png" alt="" style="width:100%;">                            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon8.png" alt="" style="width:100%;">                            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon9.png" alt="" style="width:100%;">                            
        </div>                    
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon10.png" alt="" style="width:100%;">                            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon11.png" alt="" style="width:100%;">                            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon12.png" alt="" style="width:100%;">                            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon13.png" alt="" style="width:100%;">                            
        </div>                    
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon14.png" alt="" style="width:100%;">                            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon15.png" alt="" style="width:100%;">                            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon16.png" alt="" style="width:100%;">                            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon17.png" alt="" style="width:100%;">                            
        </div>                    
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon18.png" alt="" style="width:100%;">                            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon19.png" alt="" style="width:100%;">                            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon20.png" alt="" style="width:100%;">                            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon21.png" alt="" style="width:100%;">                            
        </div>                    
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon22.png" alt="" style="width:100%;">                            
        </div>
        <div class="col-md-2 col-sm-4 col-xs-4 margin_bottom_20">
            <img src="<?php echo $IMG_PATH1 . 'insurance/' ?>img_icon23.png" alt="" style="width:100%;">                            
        </div>

    </div>
 -->




<div class="row">
  

 <?php foreach ($insur_details as $rows) {?>
  <div class="col-sm-6 mycard-1" style="margin: 16px 0px; padding-right: 16px; ">
    <div class="card">
        <img class="card-img-top center-block" src="<?php echo $IMG_PATH1.'insurance/'.$rows->IMG_PATH ?>" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title"><?php echo $rows->INSUR_NAME ?></h5>
        <p class="card-text"></p>
        <div class="pull-right" style="margin: 8px 0px;">
            <a href="<?php echo site_url('home/insurance_profile').'/'.$rows->INSUR_ID;?>" class="btn btn-primary">Readmore</a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>



</div>



























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




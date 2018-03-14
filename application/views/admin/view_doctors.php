<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">View Doctors</li>
        </ol>
    </section>

<div class="container-fluid">
<div class='row'>
<?php foreach ($doct_short_info as $row) { ?>
       <!-- Card Projects -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-image">
                    <img class="img-responsive" src="<?php echo $IMG_PATH.'doctors/'.$row->IMG_PATH ?>"  alt="doctor image">
                    <!-- <span class="card-title">Dr. <?php echo $row->DOC_NAME?></span> -->
                </div>
                <div class="card-content">
                    <span class="card-title">Dr. <?php echo $row->DOC_NAME?></span>
                    <p><span class="card-subtitle"><?php echo $row->DEPT_NAME?></span></p>
                </div>
            </div>
        </div>
 <?php }?> 
</div>


    
</div>

    

<script>
</script>
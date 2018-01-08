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

    <div class="row" style="margin-top: 30px">

        <div class="col-lg-12">
            <!-- USERS LIST -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Members</h3>

                    <div class="box-tools pull-right">
                        <span class="label label-danger"><?php echo sizeof($doct_short_info)?> Doctors</span>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                        <?php foreach ($doct_short_info as $row) { ?>
                            <li>
                                <img src="<?php echo $IMG_PATH.'doctors/'.$row->IMG_PATH ?>" alt="User Image">
                                <a class="users-list-name" href="#">Dr. <?php echo $row->DOCTOR_NAME?></a>
                                <span class="users-list-date"><?php echo $row->DEPARTMENT?></span>
                            </li>
                        <?php }?>
                        </ul>
                        <!-- /.users-list -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!--/.box -->
            </div>
        </div>
    </div>
<script>
</script>
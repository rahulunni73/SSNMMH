<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Doctors</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 col-lg-6">
                <a class="users-list-name" href="<?php echo site_url('admin/dashboard/create_doctor'); ?>">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Create Doctors</span>
                            <span class="info-box-number">You can create new doctors</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12 col-lg-6">
                <a class="users-list-name" href="<?php echo site_url('admin/dashboard/update_doctor'); ?>">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-edit"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Edit Doctors</span>
                            <span class="info-box-number">You can update doctors details</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>    
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12 col-lg-6">
                <a class="users-list-name" href="<?php echo site_url('admin/dashboard/remove_doctor'); ?>">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-trash-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text" >Delete Doctors</span>
                            <span class="info-box-number">You can delete doctors</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12 col-lg-6">
                <a class="users-list-name" href="<?php echo site_url('admin/dashboard/view_doctors'); ?>">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-eye"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">View Doctors</span>
                            <span class="info-box-number">You can view all doctors</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </a>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
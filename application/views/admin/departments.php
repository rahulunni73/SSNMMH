<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Departments</li>
        </ol>
    </section>

    <div class="row" style="margin: 5px;">

        <div class="col-md-8">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Departments</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php
                $attributes = array('role' => 'form', 'id' => 'department_creation_form', 'class' => 'form-horizontal', 'method' => 'post');
                echo form_open_multipart('admin/create/addDepartment', $attributes);
                ?>
                <div class="box-body">

                    <div class="form-group">
                        <?php
                        $attributes2 = array(
                            'for' => 'dept_name',
                            'class' => 'col-sm-2 control-label'
                        );
                        echo form_label('Department', $this->input->post('dept_name'), $attributes2);
                        ?>
                        <div class="col-sm-10">
                            <?php
                            $data1 = array(
                                'name' => 'dept_name',
                                'type' => 'text',
                                'placeholder' => 'Department',
                                'class' => 'form-control'
                            );
                            echo form_input('dept_name', '', $data1);
                            ?>
                            <div style="color: red"><?php echo form_error('dept_name'); ?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php
                        $attributes9 = array(
                            'for' => 'dept_description',
                            'class' => 'col-sm-2 control-label'
                        );
                        echo form_label('Description', '', $attributes9);
                        ?>
                        <div class="col-sm-10">
                            <?php
                            $data4 = array(
                                'name' => 'dept_description',
                                'type' => 'numeric',
                                'placeholder' => 'Description',
                                'class' => 'form-control'
                            );
                            echo form_textarea('dept_description', $this->input->post('dept_description'), $data4);
                            ?>
                            <div style="color: red"><?php echo form_error('dept_description'); ?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="userfile" class="col-sm-2 control-label">Upload Image</label>
                        <div class="col-sm-10">
                            <input name="userfile" id="fileupload" type="file" multiple="true" onchange="readURL(this);">
                            <div style="color: red"><?php echo form_error('uploads'); ?></div>
                        </div>

                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right btn-microsoft">Create Department</button>

                </div>
                <!-- /.box-footer -->
                <?php
                echo form_close();
                ?>
            </div>
            <!-- /.box -->
        </div>

        <div class="col-lg-4" class="profile_pic_container">
            <div>
                <img  height=250px width=400px style=" border: 1px solid;" id="dept_img_preview" src="<?php echo base_url() . "assets1/dist/img/dept_dummy.png" ?>" alt="your image" />
            </div>
        </div>
    </div><!- Row ENds--->

    <div class="row">
        <div class="col-lg-12">
            <?php
            $test = $this->session->flashdata('status');
            if (isset($test)) {
                $status_message = $this->session->flashdata('status_message');
                if ($test === true) {
                    echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               $status_message</div>";
                } else {
                    echo "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               $status_message</div>";
                }
            }
            ?>
        </div>    

    </div>

<?php 
//if no records found do not show the department section
if ( sizeof($records) > 0 ) { ?>

    <div class="row" style="margin: 5px;">
        <div class="col-lg-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Departments</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box" id="deptList">
                        <?php foreach ($records as $rows) {?>
                            <li class="item">
                                <div class="product-img"><img src='<?php echo $IMG_PATH.'departments/'.$rows->IMG_PATH  ?>' alt="Product Image"></div>
                                <div class="product-info" style="text-transform: uppercase; font-size:medium">
                                    <a href="" class="product-title"><?php echo $rows->DEPT_NAME; ?></a>
                                    <span class="label pull-right"><a  onclick="return doconfirm()" type="button"  href="<?php echo base_url() . "index.php?/admin/delete/removeDepartment/$rows->DEPT_ID/$rows->IMG_PATH " ?>"  class="btn btn-block btn-danger">Remove</a></span>
                                    <span class="product-description"><?php echo $rows->DESCRIPTIONS;?></span>
                                </div>
                            </li>
                        <?php } ?>

                        <!-- /.item -->
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

<?php } ?>

</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url() . "assets1/bower_components/jquery/dist/jquery.min.js" ?>"></script>
<!-- Page script -->
<script>
                                        function doconfirm(input) {
                                            job = confirm("Are you sure to delete permanently?");
                                            if (job != true)
                                            {
                                                return false;
                                            }
                                        }

                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                                reader.onload = function (e) {
                                                    $('#dept_img_preview')
                                                            .attr('src', e.target.result)
                                                            .width(400)
                                                            .height(250);
                                                };
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }

</script>

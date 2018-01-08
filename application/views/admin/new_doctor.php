<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Create Doctors</li>
        </ol>
    </section>

    <div class="row">

        <div class="col-lg-10">
            <!-- Horizontal Form -->
            <div class=" box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Doctors</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php
                $attributes = array('role' => 'form', 'id' => 'doctor_creation_form', 'class' => 'form-horizontal', 'method' => 'post');
                echo form_open_multipart('admin/create/addDoctor', $attributes);
                ?>
                <div class="box-body">

                    <div class="form-group">
                        <?php
                        $attributes2 = array(
                            'for' => 'doct_name',
                            'class' => 'col-sm-2 control-label'
                        );
                        echo form_label('Doctor Name', $this->input->post('doct_name'), $attributes2);
                        ?>
                        <div class="col-sm-10">
                            <?php
                            $data1 = array(
                                'name' => 'doct_name',
                                'type' => 'text',
                                'placeholder' => 'Doctor Name',
                                'class' => 'form-control'
                            );
                            echo form_input('doct_name', '', $data1);
                            ?>
                            <div style="color: red"><?php echo form_error('doct_name'); ?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php
                        $attributes3 = array(
                            'for' => 'doct_qual',
                            'class' => 'col-sm-2 control-label'
                        );
                        echo form_label('Qualification', '', $attributes3);
                        ?>
                        <div class="col-sm-10"> 
                            <?php
                            $attributes4 = array(
                                'name' => 'doct_qual[]',
                                'multiple' => 'multiple',
                                'class' => 'form-control select2',
                                'data-placeholder' => 'Choose Qualification'
                            );
                            $options = array(
                                'MBBS' => 'MBBS',
                                'MD' => 'MD',
                                'DCH' => 'DCH',
                                'MD' => 'MD',
                                'MS' => 'MS',
                                'DNB' => 'DNB',
                                'MMAS' => 'MMAS',
                                'DTCD' => 'DTCD',
                                'MCH' => 'MCH',
                                'DM' => 'DM',
                                'DA' => 'DA',
                                'DPM' => 'DPM',
                                'FIPS' => 'FIPS',
                                'DGO' => 'DGO',
                                'MS(OBG)' => 'MS(OBG)',
                                'MNAMS' => 'MNAMS',
                                'D.ORTHO' => 'D.ORTHO'
                            );
                            echo form_dropdown('doct_qual[]', $options, $this->input->post('doct_qual'), $attributes4);
                            ?>
                            <div style="color: red"><?php echo form_error('doct_qual'); ?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php
                        $attributes5 = array(
                            'for' => 'doct_spec',
                            'class' => 'col-sm-2 control-label'
                        );
                        echo form_label('Specialization', '', $attributes5);
                        ?>
                        <div class="col-sm-10">
                            <?php
                            $data = array(
                                'name' => 'doct_spec',
                                'type' => 'text',
                                'placeholder' => 'Specialization',
                                'class' => 'form-control'
                            );
                            echo form_input('doct_spec', $this->input->post('doct_spec'), $data);
                            ?>
                            <div style="color: red"><?php echo form_error('doct_spec'); ?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php
                        $attributes6 = array(
                            'for' => 'doct_dept',
                            'class' => 'col-sm-2 control-label'
                        );
                        echo form_label('Department', '', $attributes6);
                        ?>
                        <div class="col-sm-10">
                            <?php
                            ///print_r($dept_names);
                            $data3 = array(
                                'name' => 'doct_dept',
                                'type' => 'text',
                                'placeholder' => 'Department',
                                'class' => 'form-control select2'
                            );
                            //echo form_input('doct_dept', $this->input->post('doct_dept'), $data3);
                            echo form_dropdown('doct_dept', $dept_names, '1', $data3);
                            
                            ?>
                            <div style="color: red"><?php echo form_error('doct_dept'); ?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php
                        $attributes7 = array(
                            'for' => 'op_day',
                            'class' => 'col-sm-2 control-label'
                        );
                        echo form_label('OP Days', '', $attributes7);
                        ?>
                        <div  class="col-sm-10"> 
                            <?php
                            $attributes8 = array(
                                'name' => 'op_day[]',
                                'multiple' => 'multiple',
                                'class' => 'form-control select2 ',
                                'data-placeholder' => 'Choose OP Days'
                            );
                            $options2 = array(
                                'MONDAY' => 'MONDAY',
                                'TUESDAY' => 'TUESDAY',
                                'WEDNESDAY' => 'WEDNESDAY',
                                'THURSDAY' => 'THURSDAY',
                                'FRIDAY' => 'FRIDAY',
                                'SATURDAY' => 'SATURDAY',
                                'SUNDAY' => 'SUNDAY'
                            );
                            echo form_dropdown('op_day[]', $options2, $this->input->post('op_day'), $attributes8);
                            ?>
                            <div style="color: red"><?php echo form_error('op_day'); ?></div>
                        </div>

                    </div>

                    <div class="form-group">
                        <?php
                        $attributes9 = array(
                            'for' => 'doct_cf',
                            'class' => 'col-sm-2 control-label'
                        );
                        echo form_label('Consulting Fee', '', $attributes9);
                        ?>
                        <div class="col-sm-10">
                            <?php
                            $data4 = array(
                                'name' => 'doct_cf',
                                'type' => 'numeric',
                                'placeholder' => 'Consulting Fee',
                                'class' => 'form-control'
                            );
                            echo form_input('doct_cf', $this->input->post('doct_cf'), $data4);
                            ?>
                            <div style="color: red"><?php echo form_error('doct_cf'); ?></div>
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
                <div class="">
                    <button type="submit" class="btn btn-info pull-right">Create</button>
                </div>
                <!-- /.box-footer -->
                <?php
                echo form_close();
                ?>
            </div>
            <!-- /.box -->
        </div>

        <div class="col-lg-2">
            <div style="padding-top: 50px; text-align: center">
                <img height=128 width=128 style=" border: 1px solid;" id="doct_img_preview" src="<?php echo base_url() . "assets1/dist/img/dummy.jpg" ?>" alt="your image" />
            </div>

        </div>

    </div><!- Row ENds--->
    <div class="row">

        <div class="col-lg-offset-2 col-lg-8 col-lg-offset-8" style="padding-top: 50px">
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


</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets1/bower_components/jquery/dist/jquery.min.js"></script>
<script>
                                $(function () {
                                    //Initialize Select2 Elements
                                    $('.select2').select2();
                                });

                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function (e) {
                                            $('#doct_img_preview')
                                                    .attr('src', e.target.result)
                                                    .width(128)
                                                    .height(128);
                                        };
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
</script>


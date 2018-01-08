<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Edit Doctors</li>
        </ol>
    </section>

    <div class="row" style="margin-top: 30px">
        <!--col 1-->
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    $attributes = array('role' => 'form', 'id' => 'doctor_edit_form', 'method' => 'post');
                    echo form_open_multipart('admin/update/update_doctor_details', $attributes);
                    ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Select Doctor</label>
                            <select name="doct_name" class="form-control select2" style="width: 100%;" id="doctorNameList" onchange="getInfo(this);">
                                <option></option>
                            </select>
                            <div style="color: red"><?php echo form_error('doct_name'); ?></div>
                             
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="box-body">
                        <div class="form-group">
                            <?php
                            $attributes3 = array(
                                'for' => 'doct_qual',
                                'class' => 'control-label'
                            );
                            echo form_label('Qualification', '', $attributes3);
                            ?>
                            <?php
                            $attributes4 = array(
                                'name' => 'doct_qual[]',
                                'multiple' => 'multiple',
                                'class' => 'form-control select2',
                                'id' => 'qualifi_list',
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
                            echo form_dropdown('doct_qual[]', $options, '', $attributes4);
                            ?>
                            <div style="color: red"><?php echo form_error('doct_qual'); ?></div>

                        </div>

                        <div class="form-group">
                            <?php
                            $attributes5 = array(
                                'for' => 'doct_spec',
                                'class' => 'control-label'
                            );
                            echo form_label('Specialization', '', $attributes5);
                            ?>

                            <?php
                            $data = array(
                                'name' => 'doct_spec',
                                'type' => 'text',
                                'placeholder' => 'Specialization',
                                'id' => 'doct_spec',
                                'class' => 'form-control'
                            );
                            echo form_input('doct_spec', '', $data);
                            ?>
                            <div style="color: red"><?php echo form_error('doct_spec'); ?></div>

                        </div>

                        <div class="form-group">
                            <?php
                            $attributes9 = array(
                                'for' => 'doct_cf',
                                'class' => 'control-label'
                            );
                            echo form_label('Consulting Fee', '', $attributes9);
                            ?>
                            <?php
                            $data4 = array(
                                'name' => 'doct_cf',
                                'type' => 'numeric',
                                'placeholder' => 'Consulting Fee',
                                'id' => 'doct_consf',
                                'class' => 'form-control'
                            );
                            echo form_input('doct_cf', '', $data4);
                            ?>
                            <div style="color: red"><?php echo form_error('doct_cf'); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box-body">
                        <div class="form-group">
                            <?php
                            $attributes7 = array(
                                'for' => 'op_day',
                                'class' => 'control-label'
                            );
                            echo form_label('OP Days', '', $attributes7);
                            ?>
                            <?php
                            $attributes8 = array(
                                'name' => 'op_day[]',
                                'multiple' => 'multiple',
                                'class' => 'form-control select2 ',
                                'id' => 'op_list',
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
                            echo form_dropdown('op_day[]', $options2, '', $attributes8);
                            ?>
                            <div style="color: red"><?php echo form_error('op_day'); ?></div>

                        </div>
                        <div class="form-group">
                            <?php
                            $attributes6 = array(
                                'for' => 'doct_dept',
                                'class' => 'control-label'
                            );
                            echo form_label('Department', '', $attributes6);
                            ?>
                            <?php
                            $data3 = array(
                                'name' => 'doct_dept',
                                'type' => 'text',
                                'placeholder' => 'Department',
                                'id' => 'doct_dept',
                                'class' => 'form-control'
                            );
                            echo form_input('doct_dept', '', $data3);
                            ?>
                            <div style="color: red"><?php echo form_error('doct_dept'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--col 2 -->   
        <div class="col-lg-2 ">
            <img  height=128 width=128 style=" border: 1px solid;" id="doct_img1" src="<?php echo base_url() . "assets1/dist/img/dummy.jpg" ?>" alt="your image" />
            <div class="form-group">
                <label for="userfile" class="control-label">Change Picture</label>
                <input name="userfile" id="fileupload" type="file" multiple="true" onchange="readURL(this);">
                <div style="color: red"><?php echo form_error('uploads'); ?></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12" style="text-align: center">
            <button type="submit" class="btn btn-info" style="background-color:  red">Update</button>
        </div>
        <input type="hidden" name="doc_id" id="dummy_id"/>
        <input type="hidden" id="image_path" name= 'image_path' />
        <?php
        echo form_close();
        ?>
    </div>

    <div class="row">

        <div class="col-lg-offset-2 col-lg-8 col-lg-offset-8" style="padding-top: 50px">
            <?php
            $test = $this->session->flashdata('status');
            $status_message = $this->session->flashdata('status_message');
            if ($test === true) {
                echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               $status_message</div>";
            }
            ?>
        </div>     
    </div>
</div>

<!-- /.box -->
<!-- jQuery 3 -->
<script src="<?php echo base_url() . "assets1/bower_components/jquery/dist/jquery.min.js" ?>"/></script>
<script src="<?php echo base_url() . "assets1/bower_components/select2/dist/js/select2.full.min.js" ?>"></script>
<script>
                    $(function () {
                        $('.select2').select2();
                        getDoctMaster();
                    });
                    var dummyData;
                    function getDoctMaster() {
                        $.ajax({
                            type: 'ajax',
                            url: '<?php echo base_url() . "index.php?/admin/retrive/getDoctorsDetails" ?>',
                            async: false,
                            dataType: "json",
                            success: function (data) {
                                dummyData = data;
                                var i;
                                var options = '';
                                for (i = 0; i < data.length; i++) {
                                    options += '<option>' + data[i].DOCTOR_NAME + '</option>';
                                }
                                $('#doctorNameList').append(options);
                            },
                            error: function () {
                                alert("could not retrive data now");
                            }
                        });
                    }

                    function getInfo(input) {
                        /*This function helps to fill up the remaining form fields with repect to the dotor name*/
                        var index = input.selectedIndex - 1;//Adjust doctor dropdown option index with json array index
                        document.getElementById("doct_img1").src = "<?php echo $IMG_PATH?>doctors/"+dummyData[index].IMG_PATH;
                        document.getElementById('image_path').value = "<?php echo $IMG_PATH?>doctors/"+dummyData[index].IMG_PATH;
                        document.getElementById("doct_spec").value = dummyData[index].SPECIALIZATION;
                        document.getElementById("doct_dept").value = dummyData[index].DEPARTMENT;
                        document.getElementById("doct_consf").value = dummyData[index].CONS_FEE;
                        document.getElementById("dummy_id").value = dummyData[index].DOCTOR_ID;

                        var dd = document.getElementById('qualifi_list');
                        var dd1 = document.getElementById('op_list');
                        var qualificationListArray = dummyData[index].QUALIFICATION;
                        var qList = qualificationListArray.split(",");
                        var opDaysList = dummyData[index].OPDAYS;
                        var opList = opDaysList.split(",");

                        dd.selectedIndex=0;
                        for (j = 0; j < dd.options.length; j++) {
                            if (qList.indexOf(dd.options[j].text) !== -1) {
                                dd.options[j].selected = true;
                            }
                        }
                        
                        dd1.selectedIndex=0;
                        for (j = 0; j < dd1.options.length; j++) {
                            if (opList.indexOf(dd1.options[j].text) !== -1) {
                                dd1.options[j].selected = true;
                            }
                        }
                        $('.select2').select2();
                    }
</script>
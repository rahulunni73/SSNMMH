<div class="content-wrapper">
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


    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Delete Doctor</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <?php
        $attributes = array('id' => 'doctor_deletion_form', 'method' => 'post');
        echo form_open_multipart('admin/delete/removeDoctor', $attributes);
        ?>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Doctor</label>
                        <select class="form-control select2" style="width: 100%;" name='doctList' id="doctList" onchange="getInfo(this);">
                        </select>
                        <input type="hidden" id="doctor_id" name= 'doctor_id' />
                    </div>
                    <div class="form-group">
                        <label>Department</label>
                        <select class="form-control select2"  disabled="true" style="width: 100%;" name='deptList' id="deptList">
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <img name= 'image_path' height=128 width=128  style="border: 1px solid;" id="doct_img" src="<?php echo base_url() . "assets1/dist/img/dummy.jpg" ?>" alt="" />
                </div>

            </div>
            <!-- /.row -->
            <input type="hidden" id="image_path" name= 'image_path' />
            <button  type='submit' class="btn btn-info" onClick="return doconfirm();">Delete</button>
        </div>
        <?php
        echo form_close();
        ?>
    </div>


    <div class="row">

        <div class="col-lg-offset-2 col-lg-8 col-lg-offset-8">
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
<!-- /.box -->



<!-- jQuery 3 -->
<script src="<?php echo base_url() . "assets1/bower_components/jquery/dist/jquery.min.js" ?>"></script>
<script src="<?php echo base_url() . "assets1/bower_components/select2/dist/js/select2.full.min.js" ?>"></script>
<!-- Page script -->
<script>
                var temp;
                $(function () {
                    //Initialize Select2 Elements
                    $('.select2').select2();
                    doctorList();
                    function doctorList() {
                        $.ajax({
                            type: 'ajax',
                            url: '<?php echo base_url() . "index.php?/admin/retrive/getDoctorsDetails" ?>',
                            async: false,
                            dataType: "json",
                            success: function (data) {
                                temp = data;
                                var options = '';
                                var options2 = '';
                                var i;
                                for (i = 0; i < data.length; i++)
                                {
                                    options += '<option>' + data[i].DOCTOR_NAME + '</option>';
                                    options2 += '<option>' + data[i].DEPARTMENT + '</option>';
                                }
                                $('#doctList').html(options);
                                $('#deptList').html(options2);
                                document.getElementById("doct_img").src = "<?php echo $IMG_PATH?>doctors/"+temp[0].IMG_PATH;//default the first index will be set
                                document.getElementById('image_path').value = "<?php echo $IMG_PATH?>doctors/"+temp[0].IMG_PATH;//default the first index will be set
                                document.getElementById('doctor_id').value = temp[0].DOCTOR_ID;
                            },
                            error: function () {
                                alert("Unable to retrieve data now");
                            }
                        });
                    }
                });

                //this function is to adjust department and img w.r.t  respective doctor name 
                function getInfo(input) {
                    var text = input.selectedIndex;
                    document.getElementById("doct_img").src = "<?php echo $IMG_PATH?>doctors/"+temp[text].IMG_PATH;
                    document.getElementById('image_path').value = "<?php echo $IMG_PATH?>doctors/"+temp[text].IMG_PATH;
                    document.getElementById('doctor_id').value = temp[text].DOCTOR_ID;
                    var dd = document.getElementById('deptList');
                    for (var i = 0; i < dd.options.length; i++) {
                        if (dd.options[i].text === temp[text].DEPARTMENT) {
                            dd.selectedIndex = i;
              
                            $('.select2').select2();
                            break;
                        }
                    }
                }

                function doconfirm()
                {
                    job = confirm("Are you sure to delete permanently?");
                    if (job !== true)
                    {
                        return false;
                    }
                }

</script>

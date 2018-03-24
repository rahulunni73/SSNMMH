
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



<div class="container-fluid">

<div class="row">

<div class="col-md-4 col-md-offset-4">

   <div style="margin-bottom: 16px;"><img  height=128 width=128 style=" border: 1px solid;" id="doctor_picture" 
   src="<?php echo base_url(). "assets1/dist/img/dummy.jpg" ?>" alt="your image" /></div>            

</div>

</div>

<?php
$form_attributes = array('role' => 'form', 'id' => 'doctor_edit_form', 'method' => 'post');
echo form_open_multipart('admin/doctors/addDoctor', $form_attributes);?>

<div class="row">
    <div class="col-md-12">

    <div class="form-group">
                            <?php
                            $doctor_name_attr = array(
                                'name' => 'doctor_name',
                                'type' => 'text',
                                'placeholder' => 'Doctor name* cannot be changed or modified in future',
                                'class' => 'form-control'
                            );
                            echo form_input('doctor_name', '', $doctor_name_attr);
                            ?>
                            <div style="color: red"><?php echo form_error('doctor_name'); ?></div>
                    

        <div class="row" style="margin-top: 14px;">
            
            <div class="col-md-6 col-sm-12">

                <div class="form-group">
                        <?php
                        $data = array(
                        'name' => 'specialization',
                        'placeholder' => 'Specialization',
                        'class' => 'form-control'
                        );
                    echo form_input('specialization', '', $data);?>
                    <div style="color: red"><?php echo form_error('doct_spec'); ?></div>
               </div>   
            </div> 

            <div class="col-md-6 col-sm-12">

                <div class="form-group">
                        <?php
                        $data = array(
                        'name' => 'department',
                        'placeholder' => 'Department',
                        'class' => 'form-control select2',
                        'id' => 'auto-department' 
                        );
                    echo form_dropdown('department', $dept_names,'0', $data);?>
                    <div style="color: red"><?php echo form_error('department'); ?></div>
               </div>    
            </div> 
        </div>


        <div class="row">

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <?php
                    $qualification_attributes = array(
                    'name' => 'qualification[]',
                    'multiple' => 'multiple',
                    'class' => 'form-control select2',
                    'data-placeholder' => 'Qualification'
                    );

                    $degrees = array(
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
                        echo form_dropdown('qualification[]', $degrees, '', $qualification_attributes);?>
                        <div style="color: red"><?php echo form_error('qualification[]'); ?></div>
                    </div>
            </div>
            <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                            <?php
                                $op_days_attributes = array(
                                'name' => 'opdays[]',
                                'multiple' => 'multiple',
                                'class' => 'form-control select2',
                                'data-placeholder' => 'Op Days'
                            );

                            $days = array(
                                'MON' => 'MONDAY',
                                'TUE' => 'TUESDAY',
                                'WED' => 'WEDNESDAY',
                                'THU' => 'THURSDAY',
                                'FRI' => 'FRIDAY',
                                'SAT' => 'SATURDAY',
                                'SUN' => 'SUNDAY'
                            );
                            echo form_dropdown('opdays[]', $days, '', $op_days_attributes);?>
                            <div style="color: red"><?php echo form_error('opdays[]'); ?></div>
                    </div>
            </div>     
        </div>

        <div class="row">
            
                <div class="col-md-6 col-sm-12">

                    <div class="form-group">
                            <?php
                            $doctor_fee_attribute = array(
                            'name' => 'consultation_fee',
                            'placeholder' => 'Consultation Fee',
                            'class' => 'form-control'
                            );
                        echo form_input('consultation_fee', '', $doctor_fee_attribute);?>
                        <div style="color: red"><?php echo form_error('consultation_fee'); ?></div>
                   </div>    
                </div> 

                <div class="col-md-6 col-sm-12">

                    <div class="form-group">
                    <input name="userfile" id="fileupload" type="file" multiple="true" onchange="showPreviewImage(this);">
                    <div style="color: red"><?php echo form_error('uploads'); ?></div>
                    </div> 
                </div> 

        </div>
    </div>

</div>

<div class="row">
    
    <div class="col-md-12 col-md-offset-4" style="margin-top: 16px;">
        <button id="update_btn" type="submit" class="btn btn-info" style="background-color:blue">Create</button>
    </div>

</div>


<?php echo form_close();?>

</div>

        <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Notice</h4>
              </div>
              <div class="modal-body">
                <p></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

<!-- /.box -->
<!-- jQuery 3 -->
<script src="<?php echo base_url() . "assets1/bower_components/jquery/dist/jquery.min.js" ?>"/></script>
<script src="<?php echo base_url() . "assets1/bower_components/select2/dist/js/select2.full.min.js" ?>"></script>
<script>

// A $( document ).ready() block.
$( document ).ready(function() {
    var flashdata = "<?php echo $this->session->flashdata('status') ?>"
    if(flashdata){
      var status_message = "<?php echo $this->session->flashdata('status_message');?>"
        $("#modal-info").find( ".modal-body" ).text(status_message);
        $("#modal-info").modal({show: true});
    }
});


$(function () {
    $('.select2').select2();
});

//show selected doctor image 
function showPreviewImage(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#doctor_picture')
            .attr('src', e.target.result)
            .width(128)
            .height(128);
            };
        reader.readAsDataURL(input.files[0]);
    }    
}
</script>
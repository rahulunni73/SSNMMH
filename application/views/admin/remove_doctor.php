 <?php $this->load->helper('custom_helper'); ?>
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

<div class="container-fluid">

<div class="row">
<div class="col-md-4 col-md-offset-4">

   <div style="margin-bottom: 16px;"><img height=128 width=128 style=" border: 1px solid;" id="doctor_picture" 
   src="<?php echo base_url(). "assets1/dist/img/dummy.jpg" ?>" alt="your image" /></div>            
</div>
</div>


<?php
$form_attributes = array('role' => 'form', 'id' => 'doctor_delete_form', 'method' => 'post');
echo form_open_multipart('admin/doctors/removeDoctor', $form_attributes);?>

<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
                <?php            
                $doctor_attribute = array(
                'name' => 'doctor_id',
                'onChange' => 'loadDoctorInformation()',
                'id' => 'doctor_dropdown',
                'class' => 'form-control select2'
                );
                echo my_form_dropdown($doctor_attribute, $doct_names,'', '', '');?>
                <div style="color: red"><?php echo form_error('doctor_id'); ?></div>
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
            <input type="hidden" id="image_path" name='image_path' /> 
</div>

<?php echo form_close();?>

<div class="row">    
    <div class="col-md-12 col-md-offset-4" style="margin-top: 16px;">
        <button onClick="openModalConfirmation()" data-toggle="modal"  disabled="true" id="delete_btn" type="submit" class="btn btn-info" style="background-color:blue;">Delete</button>
    </div>
</div>

        <div class="modal modal-danger fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmation</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure want to delete</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                <button id="form_submit" type="button" class="btn btn-outline">Yes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<!-- jQuery 3 -->
<script src="<?php echo base_url() . "assets1/bower_components/jquery/dist/jquery.min.js" ?>"></script>
<script src="<?php echo base_url() . "assets1/bower_components/select2/dist/js/select2.full.min.js" ?>"></script>
<!-- Page script -->
<script>

$(function () {
    $('.select2').select2();
});

var doctorInformation;
function loadDoctorInformation(){
   var doctID = $("select[name='doctor_id']").val();    
    $.ajax({
    type: "GET",
    url: "<?php echo base_url(); ?>index.php?/admin/doctors/getSingleDoctorDetails/"+doctID, 
        success: function (data) {
            doctorInformation=JSON.parse(data);
            fillUpdateForm();
        }});
}

/* This function fills up the remains fileds of the form with respect to the doctor selection */ 
function fillUpdateForm(){ 
    /*get directory path of doctors' images stored*/    
    var doctor_picture_directory_path = "<?php echo base_url() . "assets1/images/doctors/" ?>";
    $('#doctor_picture').attr("src",doctor_picture_directory_path+doctorInformation[0].IMG_PATH);
    $('#image_path').val(doctor_picture_directory_path+doctorInformation[0].IMG_PATH);
    $("select[name=department] option:contains(" + doctorInformation[0].DEPT_NAME + ")").prop('selected', true);
    $('#delete_btn').prop('disabled', false);
    $('#delete_btn').css("background-color","red");
    $('.select2').select2();
}

/*Open Modal for confirmation*/
function openModalConfirmation(){    
    $("#modal-danger").modal({
      show: true
    });
}

/*Form Submission happening after clicking modal yes button*/
$('#form_submit').click(function(){
    /* when the submit button in the modal is clicked, submit the form */
    $('#doctor_delete_form').submit();
});

</script>

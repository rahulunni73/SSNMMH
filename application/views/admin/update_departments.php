 <?php $this->load->helper('custom_helper'); ?>
<div class="content-wrapper">
  <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel
          </small>
        </h1>
        <ol class="breadcrumb">
          <li>
            <a href="<?php echo site_url('admin/dashboard'); ?>">
              <i class="fa fa-dashboard">
              </i>Home
            </a>
          </li>
          <li class="active">Departments
          </li>
        </ol>
  </section>
<div class="container-fluid">
    <div class="row content">
      <div class="col-sm-9">

    <?php $attributes = array('role' => 'form', 'id' => 'department_updation_form','method' => 'post');
        echo form_open_multipart('admin/departments/updateDepartmentsDetails', $attributes);?>    

        <div class="form-group">
                <?php            
                $dept_attribute = array(
                'name' => 'department',
                'class' => 'form-control select2',
                'onChange' => 'loadDoctorInformation()',
                'id' => 'department_dropdown',
                'class' => 'form-control select2'
                );
                echo my_form_dropdown($dept_attribute, $dept_names,'', '', '');?>
                <div style="color: red"><?php echo form_error('department'); ?></div>
        </div>
            <div class="form-group">
            <?php
              $desc_attributes = array(
              'name' => 'description',
              'type' => 'text',
              'id'=> 'dept_description',
              'placeholder' => 'Breif summary about the department',
              'class' => 'form-control',
              'rows' => 3
              );
            echo form_textarea('description', $this->input->post('description'),$desc_attributes);?>
              <div style="color: red">
                <?php echo form_error('description'); ?>
              </div>
              <div style="color: red"><?php echo form_error('description'); ?></div>
            </div>
            <div class="form-group">
                <input name="userfile" id="fileupload" type="file" class="file">
                <div class="input-group col-xs-12">
                  <span class="input-group-addon bg-gray-active"><i class="glyphicon glyphicon-picture"></i></span>
                  <input type="text" class="form-control" disabled placeholder="Department Image">
                  <span class="input-group-btn">
                    <button class="browse btn bg-purple-active" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                  </span>
                </div>
            </div>
            <div class="form-group">
                <input name="userfile1" id="fileupload" type="file" class="file">
                <div class="input-group col-xs-12">
                  <span class="input-group-addon bg-gray-active"><i class="glyphicon glyphicon-picture"></i></span>
                  <input type="text" class="form-control" disabled placeholder="Department Icon">
                  <span class="input-group-btn">
                    <button disabled="true" class="browse btn bg-purple-active" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                  </span>
                </div>
            </div>

<?php echo form_close();?> 
<div class="text-center" style="padding-top: 16px;">
    <button id="update_dept_btn" disabled="true" class="btn bg-orange-active">Update</button>
</div>

   

</div>

<div class="col-sm-3 sidenav">
      <div>
        <img width="100%" height="100%" style=" border: 1px solid #605ca8;" id="dept_img_preview" src="<?php echo base_url()."assets1/dist/img/dept_dummy.png" ?>" alt="department image" />
      </div>
      <div style="text-align: center;" >
        <h5 class="text-primary">
          <mark>Department Image
          </mark>
        </h5>
      </div>
      <div>
        <img width="100%" height="100%" style=" border: 1px solid #605ca8;" id="dept_img_prv" src="<?php echo base_url() . "assets1/dist/img/dept_dummy.png" ?>" alt="department image" />
      </div>
      <div style="text-align: center;">
        <h5 class="text-primary">
          <mark>Department Icon
          </mark>
        </h5>
      </div>
    </div>
    </div>
</div>

    <div  style="text-align: center;"><mark class="text-muted">Note* Departments name cannot be changed or modified </mark></div>
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

var departmentInformation;
function loadDoctorInformation(){
   var deptId = $("select[name='department").val();        
    console.log(deptId);
    $.ajax({
    type: "GET",
    url: "<?php echo base_url();?>index.php?/admin/retrive/getSingleDepartmentDetails/"+deptId, 
        success: function (data) {
            departmentInformation=JSON.parse(data);
            console.log(departmentInformation);
            fillUpdateForm();
        }
      });                          
}


function fillUpdateForm(){ 
/*This function fills up the relevent fileds of the form with respect to the doctor selection*/ 
    
    /*get directory path of doctors' images stored*/
    var dept_picture_directory_path = "<?php echo base_url() . "assets1/images/departments/" ?>";

    $('#dept_description').val(departmentInformation[0].DESCRIPTIONS);   
    $('#dept_img_preview').attr("src",dept_picture_directory_path+departmentInformation[0].IMG_PATH);
    $('#update_dept_btn').prop('disabled', false);
    $('#update_dept_btn').css("background-color","green");
    $('.select2').select2();
}

$(document).on('click', '.browse', function(){
  var file = $(this).parent().parent().parent().find('.file');
  file.trigger('click');
});

$(document).on('change', '.file', function(){
  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
  /*console.log($(this)[0].files[0].name);*/
    if ($(this)[0].files && $(this)[0].files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#dept_img_preview')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL($(this)[0].files[0]);
    }
});

/*Form Submission*/
$('#update_dept_btn').click(function(){
    $('#department_updation_form').submit();
});

</script>
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
          <li class="active">Insurance
          </li>
        </ol>
  </section>
<div class="container-fluid">
    <div class="row content">

      <div class="col-sm-9">
       
       <?php $attributes = array('role' => 'form', 'id' => 'insurance_form','method' => 'post');
        echo form_open_multipart('admin/insurance/addInsurance', $attributes);?>    

            <div class="form-group">
              <label>Name</label>
                  <?php
                $insur_attributes = array(
                'name' => 'insur_name',
                'type' => 'text',
                'placeholder' => 'Name',
                'class' => 'form-control'
                );
            echo form_input('insur_name','', $insur_attributes);?>
              <div style="color:red">
                <?php echo form_error('insur_name'); ?>
              </div>
            </div>

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">About Company 
                <small>Editor</small>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                                    
                    </textarea>
              
            </div>
              <div style="color:red">
                <?php echo form_error('editor1'); ?>
              </div>
          </div>
          <!-- /.box -->

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
  <?php echo form_close();?> 
        </div>

        <div class="col-sm-3 sidenav">
              <div>
                <img width="100%" height="100%" style=" border: 1px solid #605ca8;" id="insur_img_preview" src="<?php echo base_url()."assets1/dist/img/dept_dummy.png" ?>" alt="service image" />
              </div>
              <div style="text-align: center;" >
                <h5 class="text-primary">
                  <mark>Insurance Image
                  </mark>
                </h5>
              </div>
              <div class="text-center" style="padding-top: 16px;">
                  <button id="insurBtn"  class="btn bg-orange-active">Create</button>
              </div>
        </div>
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
</div>
<!--fluid content end-->


<!-- jQuery 3 -->
<script src="<?php echo base_url() . "assets1/bower_components/jquery/dist/jquery.min.js" ?>"/></script>
<script src="<?php echo base_url() . "assets1/bower_components/select2/dist/js/select2.full.min.js" ?>"></script>
<script src="<?php echo base_url() . "assets1/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"?>"></script>
<script src="<?php echo base_url() . "assets1/bower_components/ckeditor/ckeditor.js" ?>"></script>
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
            $('#insur_img_preview')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL($(this)[0].files[0]);
    }
});

/*Form Submission*/
$('#insurBtn').click(function(){
    $('#insurance_form').submit();
});

    // A $( document ).ready() block.
$( document ).ready(function() {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')

});

</script>
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
          <li class="active">Insurance
          </li>
        </ol>
  </section>

<div class="container-fluid">

  <div class="well well-sm">
        <strong>Display</strong>
        <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                class="glyphicon glyphicon-th"></span>Grid</a>
        </div>
    </div>
  
    <div id="products" class="row list-group">
      
      <?php foreach ($insur_details as $row) { ?>
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" style="width:250px; height: 175px;" src="<?php echo $IMG_PATH.'insurance/'.$row->IMG_PATH ?>" alt="" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        <?php echo $row->INSUR_NAME?></h4>
                    <p class="group inner list-group-item-text">
                        </p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-danger btn-flat" onClick="deleteConfirmation('<?php echo $row->INSUR_ID ?>','<?php echo $row->INSUR_NAME?>','<?php echo $row->IMG_PATH?>')">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php }?>

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
                <p></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                <button id="modal_submit" type="button" class="btn btn-outline">Yes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>



        <div class="modal modal-warning fade" id="modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Warning</h4>
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



        <div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Success</h4>
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
 $(document).ready(function() {
    $('#list').click(function(event) {
        event.preventDefault();
        $('#products .item').addClass('list-group-item');
    });
    $('#grid').click(function(event) {
        event.preventDefault();
        $('#products .item').removeClass('list-group-item');
        $('#products .item').addClass('grid-group-item');
    });
});


var insuranceId;
var insurance_pic;
var insurance_name;

function deleteConfirmation(insurId, insurName, insur_pic) {
    $(".modal-body").text("Are you sure want to delete " + insurName + "");
    $("#modal-danger").modal({
        show: true
    });
    insuranceId = insurId;
    insurance_pic = insur_pic;
    insurance_name = insurName;
}

$('#modal_submit').click(function() {
    /* when the submit button in the modal is clicked, submit the form */
    deleteInsurance();
});

function deleteInsurance() {
    var request = $.ajax({
        url: "<?php echo base_url(); ?>index.php?/admin/insurance/removeInsurance/" + insuranceId + '/' + insurance_pic,
        type: "POST"
    });

    request.done(function(msg) {
        $("#modal-danger").modal('hide');
        $("#modal-success").find( ".modal-body" ).text("The " + insurance_name + " insurance deleted succesfully");
        $("#modal-success").modal({
            show: true
        });
        setTimeout(function() { // wait for 5 secs(2)
            location.reload(); // then reload the page.(3)
        }, 3000);
    });

    request.fail(function(jqXHR, textStatus) {
    $("#modal-danger").modal('hide');
        $("#modal-warning").find( ".modal-body" ).text("Unable to delete" + insurance_name);
        $("#modal-warning").modal({
            show: true
        });
    });
} 
</script>
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
          <li class="active">Remove News
          </li>
        </ol>
  </section>

    <div class="container-fluid">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Venue</th>
                  <th>Date</th>
                  <th>Posted By</th>
                  <th>Remove</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($_news as $row) { ?>
                <tr>
                  <td><?php echo $row->NEWS_TITLE ?></td>
                  <td><?php echo $row->NEW_VENUE ?></td>
                  <td><?php echo $row->DATE ?></td>
                  <td><?php echo $row->POSTED_BY ?></td>
                  <td><a class="btn btn-danger btn-flat" onClick="deleteConfirmation('<?php echo $row->NEWS_ID ?>','<?php echo $row->NEWS_TITLE?>','<?php echo $row->IMG_PATH?>')">Delete</a></td>
                </tr>
                <?php }?>
                </tbody>
<!--                <tfoot>
                <tr>
                  <th>Title</th>
                  <th>Venue</th>
                  <th>Date</th>
                  <th>Posted By</th>
                  <th>Remove</th>
                </tr>
                </tfoot>-->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

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


var news_id;
var news_img;
var news_title;

function deleteConfirmation(newsId, newsName, news_pic) {
    news_id = newsId;
    news_img = news_pic;
    news_title = newsName;
    $(".modal-body").text("Are you sure want to delete " + newsName + " Service");
    $("#modal-danger").modal({
        show: true
    });

}

$('#modal_submit').click(function() {
    /* when the submit button in the modal is clicked*/
    deleteNewsItem();
});

function deleteNewsItem() {
    var request = $.ajax({
        url: "<?php echo base_url(); ?>index.php?/admin/news/removeNews/" + news_id + '/' + news_img,
        type: "POST"
    });

    request.done(function(msg) {
        $("#modal-danger").modal('hide');
        $("#modal-success").find( ".modal-body" ).text("The " + news_title + " news deleted succesfully");
        $("#modal-success").modal({
            show: true
        });
        setTimeout(function() { // wait for 5 secs(2)
            location.reload(); // then reload the page.(3)
        }, 3000);
    });

    request.fail(function(jqXHR, textStatus) {
    $("#modal-danger").modal('hide');
        $("#modal-warning").find( ".modal-body" ).text("Unable to delete" + news_title);
        $("#modal-warning").modal({
            show: true
        });
    });
} 




</script>
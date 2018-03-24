<link href="<?php echo base_url() . "assets1/bower_components/dropzone/dropzone.min.css"?>" rel="stylesheet">
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
          <li class="active">Gallery
          </li>
        </ol>
  </section>
<div class="container-fluid">
    <div id="my-dropzone" class="dropzone">
      <div class="dz-message">
        <h3>Drop files here</h3> or <strong>click</strong> to upload
      </div>
    </div>
  </div>


<script src="<?php echo base_url() . "assets1/bower_components/jquery/dist/jquery.min.js" ?>"></script>
<script src="<?php echo base_url() . "assets1/bower_components/dropzone/dropzone.min.js"?>"></script>
<script>
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#my-dropzone", {
      url: "<?php echo base_url(); ?>index.php?/admin/gallery/upload",
      acceptedFiles: "image/*",
      addRemoveLinks: true,
      removedfile: function(file) {
        var name = file.name;
        $.ajax({
          type: "post",
          url: "<?php echo base_url(); ?>index.php?/admin/gallery/remove",
          data: { file: name },
          dataType: 'html'
        });

        // remove the thumbnail
        var previewElement;
        return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
      },
      init: function() {
        var me = this;
        $.get("<?php echo base_url(); ?>index.php?/admin/gallery/list_files", function(data) {
          // if any files already in server show all here
          if (data.length > 0) {
            $.each(data, function(key, value) {
              var mockFile = value;
              me.emit("addedfile", mockFile);
              me.emit("thumbnail", mockFile, "<?php echo base_url(); ?>uploads/" + value.name);
              me.emit("complete", mockFile);
            });
          }
        });
      }
    });
  </script>
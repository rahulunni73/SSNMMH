<!-- Main Container Starts -->
<div class="container main-container">
    <!-- Contact Info Section Starts -->
    <div class="contact-info-box">
        <div class="row">
            <div class="col-md-5 col-xs-12 hidden-sm hidden-xs">
                <div class="box-img">
                    <img src="<?php echo base_url(); ?>assets/images/contact/contact-info-box-img1.png" alt="Image" />
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="info-box">
                    <h3>We'd love to hear from you</h3>
                    <div class="row">
                        <h4 class="col-sm-6 col-xs-12">Tel: 0470 2602248</h4>
                        <h4 class="col-sm-6 col-xs-12">Fax: 0470 2602249</h4>
                    </div>
                    <h4>Email: <a href="mailto:snmmhospital@gmail.com">ssnmmhospital@gmail.com</a></h4>
                </div>
            </div>
            <div class="col-md-1 col-xs-12 hidden-sm hidden-xs"></div>
        </div>
    </div>
    <!-- Contact Info Section Ends -->
    <!-- Contact Content Starts -->
    <div class="contact-content">
        <div class="row">
            <!-- Contact Form Starts -->
            <div class="col-sm-8 col-xs-12">
                <h3>Get in touch by filling the form below</h3>
                <div class="status alert alert-success contact-status"></div>
                <?php
                $attributes = array('name'=>'feedback-form','id' => 'feedback-form', 'class' => 'contact-form', 'method' => 'post');
                echo form_open('comments/pushFeedback', $attributes);
                ?>
                <div class="row">

                    <div class="col-md-6">
                        <?php
                        $attributes2 = array(
                            'for' => 'cus_name',
                        );
                        echo form_label('Name', $this->input->post('doct_name'), $attributes2);
                        ?>
                        <?php
                        $data1 = array(
                            'name' => 'cus_name',
                            'type' => 'text',
                            'placeholder' => 'Name',
                            'class' => 'form-control'
                        );
                        echo form_input('cus_name', '', $data1);
                        ?>
                        <div style="color: red"><?php echo form_error('cus_name'); ?></div>
                    </div>

                    <div class="col-md-6">
                        <?php
                        $attributes2 = array(
                            'for' => 'cus_email',
                        );
                        echo form_label('Email Address', $this->input->post('cus__name'), $attributes2);
                        ?>
                        <?php
                        $data1 = array(
                            'name' => 'cus_email',
                            'type' => 'email',
                            'placeholder' => 'Email',
                            'class' => 'form-control'
                        );
                        echo form_input('cus_email', '', $data1);
                        ?>
                        <div style="color: red"><?php echo form_error('cus_email'); ?></div>
                    </div>

                    <div class="col-md-6">
                        <?php
                        $attributes2 = array(
                            'for' => 'cus_phone',
                        );
                        echo form_label('Phone', $this->input->post('cus_phone'), $attributes2);
                        ?>
                        <?php
                        $data1 = array(
                            'name' => 'cus_phone',
                            'type' => 'numeric',
                            'placeholder' => 'Phone',
                            'class' => 'form-control'
                        );
                        echo form_input('cus_phone', '', $data1);
                        ?>
                        <div style="color: red"><?php echo form_error('cus_phone'); ?></div>
                    </div>

                    <div class="col-md-6">
                        <?php
                        $attributes2 = array(
                            'for' => 'cus_subject',
                        );
                        echo form_label('Subject', $this->input->post('cus_subject'), $attributes2);
                        ?>
                        <?php
                        $data1 = array(
                            'name' => 'cus_subject',
                            'type' => 'text',
                            'placeholder' => 'Subject',
                            'class' => 'form-control'
                        );
                        echo form_input('cus_subject', '', $data1);
                        ?>
                        <div style="color: red"><?php echo form_error('subject'); ?></div>
                    </div>

                    <div class="col-xs-12">
                        <?php
                        $attributes2 = array(
                            'for' => 'cus_comments',
                        );
                        echo form_label('comments', $this->input->post('cus_comments'), $attributes2);
                        ?>
                        <?php
                        $data1 = array(
                            'name' => 'cus_comments',
                            'type' => 'text',
                            'placeholder' => 'Comments',
                            'class' => 'form-control'
                        );
                        echo form_input('cus_comments', '', $data1);
                        ?>
                        <div style="color: red"><?php echo form_error('cus_comments'); ?></div>

                    </div>

                    <?php form_close(); ?>
                    

                    <div class="col-xs-12">
                        <button  name='feedbackBtn' id="feedbackBtn" class="btn btn-md  btn-secondary">Submit</button>
                    </div>

                </div>               
                


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
            <!-- Contact Form Ends -->





            <!-- Address Starts -->
            <div class="col-sm-4 col-xs-12">
                <!-- Box #1 Starts -->
                <div class="cblock-1">
                    <span class="icon-wrap"><i class="fa fa-car"></i></span>
                    <h4>Come and Visit</h4>
                    <ul class="list-unstyled">
                        <li>SSNMM Hospital</li>
                        <li>Puthenchantha, Varkala, Thiruvananthapuram</li>
                        <li>040 2602248</li>
                    </ul>
                </div>
                <!-- Box #1 Ends -->
                <!-- Box #2 Starts -->
                <div class="cblock-1">
                    <span class="icon-wrap red"><i class="fa fa-ambulance"></i></span>
                    <h4>Emergency Care?</h4>
                    <ul class="list-unstyled">
                        <li>If you're having a medical emergency,</li>
                        <li>do not wait to contact us.</li>
                        <li>Call 0470 2602248</li>
                        <li>or visit the closest emergency center.</li>
                    </ul>
                </div>
                <!-- Box #2 Ends -->
            </div>
            <!-- Address Ends -->
        </div>
    </div>
    <!-- Contact Content Ends -->
</div>
<!-- Main Container Ends -->
<!-- Google Map Starts -->
<div class="map"></div>
<!-- Google Map Ends -->

        <!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>>
      </div>
    </div>
  </div>
</div>




<script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB19NBJmGevwfkvRp7IRMbqw9pTPNzs7dg"></script>
<script>

/*Form Submission*/
$('#feedbackBtn').click(function(){
    $('#feedback-form').submit();
});

    $(function () {
    // GOOGLE MAP
    function initialize() {
    var myLatLng = {lat: 8.729151, lng: 76.733518};
            var map = new google.maps.Map(document.querySelector('.map'), {
            zoom: 16,
                    center: myLatLng
            });
            var marker = new google.maps.Marker({
            position: myLatLng,
                    map: map,
                    title: 'S.S.N.M.M.H.'
            });
            marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
});
</script>



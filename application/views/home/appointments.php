<!-- Main Container Starts -->
<div class="container main-container">

    <!-- Book Appointment Box Starts -->
<!--     <div class="book-appointment-box">
        <div class="row">
            <div class="col-md-5 col-xs-12 text-center-sm text-center-xs">
                <h4>Online Hassle Free Appointment Booking</h4>
                <h3><i class="fa fa-phone-square"></i>  0470 2602248</h3>
            </div>
            <div class="col-md-offset-4 col-md-3 col-xs-12 hidden-sm hidden-xs">
                <div class="box-img">
                    <img src="<?php echo base_url(); ?>assets/images/appointment-booking-img.png" alt="" />
                </div>
            </div>
        </div>
    </div> -->
    <!-- Book Appointment Box Ends -->

<div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
         <div class="form-check form-check-inline">
            <label> <input type="radio" name="form_selec" value="new" checked> <span class="label-text">New Registration</span>
            </label>
            <label><input type="radio" name="form_selec" value="old"> <span class="label-text">Old Registration</span>
            </label>
         </div>
      </div>
      <div class="col-md-4"></div>
</div>



<div id="newRegistration">
   <div class="row">
      <div class="col-md-12">
         <div class="form-group">
            <label for="pName">Name</label>
            <input type="text" class="form-control" id="pName" aria-describedby="emailHelp" placeholder="Patient Name">
         </div>
         <div class="form-group">
            <label for="pphone">Phone</label>
            <input type="numeric" class="form-control" id="pphone" placeholder="phone">
         </div>
         <div class="form-group">
            <label for="pEmail">Email</label>
            <input type="email" class="form-control" id="pEmail" placeholder="Email">
         </div>
         <div class="form-group">
            <label for="pPlace"> Place</label>
            <input type="text" class="form-control" id="pPlace" placeholder="Place">
         </div>
         <div class="row">
            <div class="col-md-12">
               <h5><span>Confirm your appointment via</span></h5>
            </div>
         </div>
         <div class="form-check form-check-inline">
            <label>
            <input type="radio" name="confirm_via" checked> <span class="label-text">Phone</span>
            </label>
            <label>
            <input type="radio" name="confirm_via"> <span class="label-text">Email</span>
            </label>
         </div>
         <div class="row" style="text-align:center;margin-top: 16px;margin-bottom: 16px;">
            <div class="col-md-12">
               <h5><span>Appointment Details</span></h5>
            </div>
         </div>
         <div class="form-group">
            <label for="exampleFormControlSelect1">Consultation Type</label>
            <select class="form-control" id="exampleFormControlSelect1">
               <option>Consultation</option>
               <option>HealthCheckup</option>
            </select>
         </div>
         <div class="form-group">
            <label for="exampleFormControlSelect1">Department</label>
            <select class="form-control" id="exampleFormControlSelect1">
               <option>Consultation</option>
               <option>HealthCheckup</option>
            </select>
         </div>
         <div class="form-group">
            <label for="exampleFormControlSelect1">Doctors</label>
            <select class="form-control" id="exampleFormControlSelect1">
               <option>Consultation</option>
               <option>HealthCheckup</option>
            </select>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <!-- Date input -->
                  <label class="control-label" for="date">Date</label>
                  <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="apptime">Prefered Time</label>
                  <select class="form-control" id="pptime">
                     <option>Morning</option>
                     <option>Evening</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="row" style="margin-top: 32px;margin-bottom:8px;">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
               <button id="send" class="btn btn-lg  btn-secondary ">Fix my appointment</button>
            </div>
            <div class="col-md-4"></div>
         </div>
      </div>
   </div>
</div>



<div id="oldRegistration">
   <div class="row">
      <div class="col-md-12">
         <div class="form-group">
            <label for="pMrn">MRN</label>
            <input type="numeric" class="form-control" id="pMrn" placeholder="Medical Record Number">
         </div>
         <div class="form-group">
            <label for="pName">Name</label>
            <input type="text" class="form-control" id="pName" aria-describedby="emailHelp" placeholder="Patient Name">
         </div>
         <div class="form-group">
            <label for="pphone">Phone</label>
            <input type="numeric" class="form-control" id="pphone" placeholder="phone">
         </div>
         <div class="form-group">
            <label for="pEmail">Email</label>
            <input type="email" class="form-control" id="pEmail" placeholder="Email">
         </div>
         <div class="row">
            <div class="col-md-12">
               <h5><span>Confirm your appointment via</span></h5>
            </div>
         </div>
         <div class="form-check form-check-inline">
            <label>
            <input type="radio" name="confirm_via" checked> <span class="label-text">Phone</span>
            </label>
            <label>
            <input type="radio" name="confirm_via"> <span class="label-text">Email</span>
            </label>
         </div>
         <div class="row" style="text-align:center;margin-top: 16px;margin-bottom: 16px;">
            <div class="col-md-12">
               <h5><span>Appointment Details</span></h5>
            </div>
         </div>
         <div class="form-group">
            <label for="exampleFormControlSelect1">Consultation Type</label>
            <select class="form-control" id="exampleFormControlSelect1">
               <option>Consultation</option>
               <option>HealthCheckup</option>
            </select>
         </div>
         <div class="form-group">
            <label for="exampleFormControlSelect1">Department</label>
            <select class="form-control" id="exampleFormControlSelect1">
               <option>Consultation</option>
               <option>HealthCheckup</option>
            </select>
         </div>
         <div class="form-group">
            <label for="exampleFormControlSelect1">Doctors</label>
            <select class="form-control" id="exampleFormControlSelect1">
               <option>Consultation</option>
               <option>HealthCheckup</option>
            </select>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <!-- Date input -->
                  <label class="control-label" for="date">Date</label>
                  <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="apptime">Prefered Time</label>
                  <select class="form-control" id="pptime">
                     <option>Morning</option>
                     <option>Evening</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="row" style="margin-top: 32px;margin-bottom:8px;">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
               <button id="send" class="btn btn-lg  btn-secondary ">Fix my appointment</button>
            </div>
            <div class="col-md-4"></div>
         </div>
      </div>
   </div>
</div>




</div>
<!-- Main Container Ends -->

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




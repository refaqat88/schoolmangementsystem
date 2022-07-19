@extends('layouts.master')
@section('title' , 'Certificates')
@section('content')
<div class="content">
   <div class="row">
      <div class="col-md-12">
         <form id="RegisterValidation" action="#" method="">
            <div class="card ">
               <div class="card-header">
                  <h4 class="card-title">Certificates</h4>
               </div>
               <div class="card-body">
                  <div class="row bor-sep">
                     <div class="col-lg-12 d-flex flex-row justify-content-between pl-0">
                        <div class="col-md-3 col-lg-3 col-sm-12">
                           <label class="col-lg-12">Certificate</label>
                           <select class="selectpicker " data-size="7"
                              data-style="btn btn-secondary btn-round" title="Choose Certificate"
                              required="true" name="certificate">
                              <option value="" disabled selected>Choose Certificate</option>
                              <option value="1">Leave Certificate</option>
                           </select>
                        </div>
                        <div id='individual' class=" col-md-3 col-lg-3 col-sm-12 form-group">
                           <label class="col-lg-12">Issue Date</label>
                           <input type="text" class="form-control datepicker" placeholder="Enter Month"
                              name="houseallow" number="true" number="true">
                        </div>
                        <div class='col-md-6 col-lg-6 col-sm-12'>
                           <button type="button" class="btn btn-outline-choice btn-round pull-right" data-toggle="collapse"
                              data-target="#leave_certificate">Generate</button>
                        </div>
                     </div>
                  </div>
               </div>
               <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
      </div>
      <!-- end row -->
      <div class="collapse col-md-12 card" id='leave_certificate'>
      <form id="RegisterValidation" action="#" method="">
      <div class="container-fluid mt-3">
      <div class="row mb-4">
      <div class="col-md-3">
      <img src="school_logo.png" alt="" width="150px" height="130px" style='border-style:none'>
      </div>
      <div class="col-md-9 m-auto">
      <h3 class='text-left font-weight-bolder'>GOVERNOR'S MODEL SCHOOL PARACHINAR</h3>
      <h4 class='text-center font-weight-bolder text-danger'>SCHOOL LEAVING CERTIFICATE</h4>
      </div>
      </div>
      <div class="row">
      <div class="col-md-6 text-center">
      <label for="" class='font-weight-bold mx-2'>Date of Admission: </label>
      <span class='font-weight-normal col-md-12 border-bottom'>19/02/2020</span>
      </div>
      <div class="col-md-6 text-center mb-3">
      <label for="" class='font-weight-bold mx-2'>Admission No.: </label>
      <span class='font-weight-normal col-md-12 border-bottom'> 21525</span>
      </div>
      <div class="col-md-12">
      <label for="" class='font-weight-bold mx-2'>This is certify that </label>
      <span class='font-weight-normal col-md-12 border-bottom'>_______________________________</span>
      </div>
      <div class="col-md-12">
      <label for="" class='font-weight-bold mx-2'>Date of Birth according to admission register is</label>
      <span class='font-weight-normal col-md-12 border-bottom'>_______________________________________</span>
      </div>
      <div class="col-md-12">
      <label for="" class='font-weight-bold mx-2'>Son/Daughter of</label>
      <span class='font-weight-normal col-md-12 border-bottom'>_______________________________</span>
      </div>
      <div class="col-md-6">
      <label for="" class='font-weight-bold mx-2'>in class</label>
      <span class='font-weight-normal col-md-12 border-bottom'>_______________________________</span>
      </div>
      <div class="col-md-6">
      <label for="" class='font-weight-bold mx-2'>and left on </label>
      <span class='font-weight-normal col-md-12 border-bottom'>_______________________________</span>
      </div>
      <div class="col-md-12">
      <label for="" class='font-weight-bold mx-2'>now studying/promoted to </label>
      <span class='font-weight-normal col-md-12 border-bottom'>_______________________________</span>
      </div>
      <div class="col-md-12">
      <label for="" class='font-weight-bold mx-2'>all the dues to the school have been paid upto</label>
      <span class='font-weight-normal col-md-12 border-bottom'>_______________________________</span>
      </div>
      <div class="col-md-12 mt-3">
      <label for="" class='font-weight-bold mx-2'>He/She </label>
      <span class='font-weight-normal col-md-12 border-bottom'>_______________________________</span>
      </div>
      <div class="col-md-12">
      <label for="" class='font-weight-bold mx-2'>Prepared by</label>
      <span class='font-weight-normal col-md-12 border-bottom'>_______________________________</span>
      </div>
      <div class="col-md-12">
      <label for="" class='font-weight-bold mx-2'>Date of issue </label>
      <span class='font-weight-normal col-md-12 border-bottom'>_______________________________</span>
      </div>
      <div class="col-md-12 text-right d-flex flex-column">
      <h4 for="" class='font-weight-bold mx-5'>Principal </h4>
      <h6 for="">(governor's School parachinar)</h6>
      <span class='font-weight-normal col-md-12 mt-4 border-bottom'>_______________________________</span>
      </div>
      </div>
      </div>
      </form>
      </div> 
   </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection()
@section('front_css')
<link rel="stylesheet" href="{{asset('custom.css')}}">
@endsection
@section('front_script')
<script src="{{asset('adminassets/validator/dist/jquery.validate.js')}}"></script>
<script src="{{asset('js/report_script.js')}}"></script>
<!--   Core JS Files   -->
<script src="../../assets/js/core/jquery.min.js"></script>
<script src="../../assets/js/core/popper.min.js"></script>
<script src="../../assets/js/core/bootstrap.min.js"></script>
<script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="../../assets/js/plugins/moment.min.js"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for Sweet Alert -->
<script src="../../assets/js/plugins/sweetalert2.min.js"></script>
<!-- Forms Validations Plugin -->
<script src="../../assets/js/plugins/jquery.validate.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="../../assets/js/plugins/bootstrap-selectpicker.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="../../assets/js/plugins/bootstrap-datetimepicker.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="../../assets/js/plugins/jquery.dataTables.min.js"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../../assets/js/plugins/bootstrap-tagsinput.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../assets/js/plugins/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../../assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="../../assets/js/plugins/fullcalendar/daygrid.min.js"></script>
<script src="../../assets/js/plugins/fullcalendar/timegrid.min.js"></script>
<script src="../../assets/js/plugins/fullcalendar/interaction.min.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="../../assets/js/plugins/jquery-jvectormap.js"></script>
<!--  Plugin for the Bootstrap Table -->
<script src="../../assets/js/plugins/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="../../../../buttons.github.io/buttons.js"></script>
<!-- Chart JS -->
<script src="../../assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../../assets/js/paper-dashboard.min1036.js?v=2.1.1" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/demo/demo.js"></script>
<!-- Sharrre libray -->
<script src="../../assets/demo/jquery.sharrre.js"></script>
@endsection()
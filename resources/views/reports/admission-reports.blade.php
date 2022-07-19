@extends('layouts.master')
@section('title', 'Admission Reports')
@section('content')
<style type="text/css">
   .error{ color: red; }
   .hide{ display: none; }
</style>
<div class="content">
   <div class="row">
      <div class="col-md-12">
         <form id="FormreportAdmission" action="{{ route('reportAdmissionAjax')}}" method="post">
            @csrf
            <div class="card ">
               <div class="card-header">
                  <h4 class="card-title">Admission & Withdrawal Reports</h4>
               </div>
               <div class="card-body">

                  <div class="row bor-sep">

                        <div class="col-sm-12 col-md-3 col-lg-3 select-wizard form-group ">
                            <label class="col-lg-12">Report Type</label>
                           <select class="selectpicker  " data-size="7" id="selectID"
                              data-style="btn btn-secondary btn-round" name="form_type" title="Choose Report"
                              required="true">
                              <option value="" disabled selected>Choose Report</option>
                              <option value='admission_form' data-admission_number="admission_number">Admission Form</option>
                              <option value='admission_record' data-from_date="from_date" data-to_date="to_date">Admission Record</option>
                           </select>
                           <div class="add-div-error error form_type"></div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 mt-1 form-group" id="admission_number_hide">
                           <div  class="hiden enterInput col ">
                              <label class="col-lg-12">Admission No</label>
                              <input type="text" class="form-control" placeholder="Enter ad.No"
                                 name="admission_number" value="">
                                  <div class="add-div-error error admission_number"></div>
                                  <p id="admission-hint"><strong>Note : </strong>Leave the textbox empty for a blank Admission Form</p>
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 mt-1 form-group hide" id="from_date_hide">
                           <div class="form-group">
                              <div class='input-group date' id='datetimepicker1'>
                                 <label class="col-lg-12">From Date</label>
                                 <input type='text' id="from_date" class="form-control datepicker" name="from_date" placeholder="YYYY-MM-DD" />
                                 <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                                 </span>
                              </div>
                              <div class="add-div-error error from_date"></div>
                           </div> 
                        </div>
                      <div class="col-sm-12 col-md-3 col-lg-3 mt-1 form-group hide" id="to_date_hide">
                           <div class="form-group">
                              <div class='input-group date' id='datetimepicker1'>
                                 <label class="col-lg-12">To Date</label>
                                 <input type='text' id="to_date" class="form-control datepicker" name="to_date" placeholder="YYYY-MM-DD" />
                                 <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                                 </span>
                              </div>
                              <div class="add-div-error error to_date"></div>
                           </div>
                        </div>
                        <div class="col-sm-12 mt-4 col-md-3  col-lg-3 form-group mr-0">
                           <button type="submit" class="btn btn-outline-choice btn-round pull-right" >Generate
                           </button>
                        </div>
                     </div>
                  </div>

                  <!--  end card  -->
            </div>
             <div class="col-md-12 " id="AdmissionPrintButton" style="display:none;">
                 <button class="btn btn-sm btn-round btn-outline-choice export mr-5 float-right ">Print</button>
             </div>
               <!-- end col-md-12 -->
         </form>
      </div>
      <!-- end row -->

    @include('load')



   
      </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="appear mt-3  card card-body" id='admission_form' >
            </div>
{{--            <div class="col-md-12 align-items-center text-center justify-content-center" id="AdmissionPrintButton" style="display:none;">--}}
{{--                <button class="btn btn-sm btn-round btn-outline-choice export mr-5 ">Print</button>--}}
{{--            </div>--}}
        </div>



   </div>
</div>
 

<!------    Admission Model   --->
 


@endsection()

@section('front_css')
    <link rel="stylesheet" href="{{asset('custom.css')}}">
@endsection
@section('front_script')
 <script src="{{asset('js/html2pdf/html2pdf.bundle.min.js')}}"></script>
 <script src="{{asset('js/report_script.js')}}"></script>

 
 


@endsection()
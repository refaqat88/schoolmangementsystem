@extends('layouts.master')
@section('title', 'Examination Reports')
@section('content')
<style type="text/css">
   .error{ color: red; }
   .hide{ display: none; }
</style>
<div class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">Exam Reports</h4>
            </div>
            <div class="card-body">
               <form id="FormExameReport" action="{{ route('reportAdmissionAjax')}}" method="post">
                  <div class="row bor-sep">

                     <div class="col-sm-12 col-lg-4 pl-0 form-group">
                        <label class="col-lg-12">Report Type</label>
                        <select id="report_type" name='report_type' class="col-lg-12 selectpicker "
                              data-size="7" data-style="btn btn-secondary btn-round"
                              title="Choose Report" required="true">
                           <option value="" disabled>Choose Report </option>
                           <option value="single_exam_report" data-session="session" data-exam="exam" data-class="class" data-section="section" data-student="student">Single Exam Report </option>
                           <option value="student_progress_report" data-session="session"  data-class="class" data-section="section" data-student="student">Student Progress Report </option>
                           <option value="class_progress_report" data-session="session" data-exam="exam" data-class="class" data-section="section">Class Progress Report </option>
                           <option value="school_progress_report" data-session="session" data-exam="exam">School Progress Report </option>
                        </select>
                        <div class="add-div-error error report_type"></div>
                      </div>

                     <div class="col-sm-12 col-lg-8 pull-right mt-4 mr-0" id="generate-btn">
                        <button type="submit" class="pull-right  btn btn-round btn-outline-choice" id="selBtn"
                        >Generate
                        </button>
                     </div>

                     <div class="col-sm-12 col-lg-2 form-group hide" id="session_hide">
                        <div class="hiden enterInput  single_Exam_report allClass_progress_report allSchool_progress_report">
                           <label>Session</label>
                           <select class="selectpicker session"  id="session"  name="session" data-size="5" data-live-search="true" data-style="btn btn-round btn-secondary" title="Select Session" >
                              @foreach($sessions as $session)
                                 <option value="{{$session->adm_Session}}">{{$session->adm_Session}}</option>
                              @endforeach
                           </select>
                           <div class="add-div-error error session"></div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-lg-2 form-group hide" id="exam_hide">
                        <div class="hiden enterInput  single_Exam_report allClass_progress_report allSchool_progress_report">
                           <label>Exam</label>
                           <select class="selectpicker"  id="exam"  name="exam" data-size="5" data-style="btn btn-round btn-secondary" title="Select Exam" >
                              <option value=""  disabled="disabled">Select Exam</option>
                              
                           </select>
                           <div class="add-div-error error exam"></div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-lg-2 form-group hide"   id="class_hide">
                        <div class="hiden enterInput">
                           <label>Class</label>
                           <select class="selectpicker cls_id" id="cls_id"  name="class" data-live-search="true" data-size="5" data-style="btn btn-round btn-secondary" title="Select Class" >
                              <option value=""  disabled="disabled">Select Class</option>
                              
                           </select>
                           <div class="add-div-error error class"></div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-lg-2 form-group hide"   id="section_hide">
                        <div class="hiden enterInput">
                           <label>Section</label>
                           <select class="selectpicker section_idr" id="section_idr"  name="class_section" data-size="5" data-style="btn btn-round btn-secondary" title="Select Section" >
                              <option value=""  disabled="disabled">Select Section</option>
                             
                           </select>
                           <div class="add-div-error error class_section"></div>
                        </div>
                     </div>
                     
                     <div class="col-sm-12 col-lg-2 form-group hide"   id="student_hide">
                        <div class="hiden enterInput">
                           <label>Student</label>
                           <select class="selectpicker student_id" id="student_id"  name="student" data-size="5" data-style="btn btn-round btn-secondary" title="Select Student" >
                              <option value=""  disabled="disabled">Select Section</option>
                           </select>
                           <div class="add-div-error error student"></div>
                        </div>
                     </div>

                     {{--<div class="col-sm-12 col-lg-2 form-group hide" id="admission_number_hide">
                        <div class="hiden enterInput  single_Exam_report progress_report">
                           <label>Admission No</label>
                           <input type="text"  id="admission_number" class="form-control" placeholder="Enter Ad.No" name="admission_number" >
                           <div class="add-div-error error admission_number"></div>
                        </div>
                     </div>
                     <div class="col-sm-12 col-lg-2 form-group hide" id="issue_date_hide">
                        <div class="hiden enterInput  allClass_progress_report allSchool_progress_report">
                           <label>Issue Date</label>
                           <input type="text" id="issue_date" class="form-control datepicker progress_report" placeholder="Enter Date" name="issue_date"  >
                            <div class="add-div-error error issue_date"></div>
                        </div>
                     </div>--}}
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   @include('load')
   <div id="exame_report_content">
   </div>
</div>
@endsection
@section('front_css')
<link rel="stylesheet" href="{{asset('custom.css')}}">
@endsection
@section('front_script')
<script src="{{asset('js/report_script.js')}}"></script>
@endsection
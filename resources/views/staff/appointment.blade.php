@extends('layouts.master')
@section('title', 'Appointment')
@section('content')
    <style>
        .error{color:red !important;}
    </style>
    <div class="content">
        <div class="col-md-12 mr-auto ml-auto">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card card-wizard" data-color="primary" id="wizardProfile">
{{--                    <div class="alert alert-success" id="success-message" style="display: none">--}}
{{--                        --}}{{--{{ session()->get('message') }}--}}
{{--                    </div>--}}
                    <form id="add-employee-form" action="{{url('appointment-info')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                        <div class="card-header text-center">
                            <h4 class="card-title">
                                Add New Staff
                            </h4>
                            <div class="wizard-navigation">
                                <ul>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#perinfo" data-toggle="tab" role="tab" aria-controls="perinfo" aria-selected="true">
                                            <i class="fa fa-info"></i>
                                            Personal Info
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#empinfo" data-toggle="tab" role="tab" aria-controls="empinfo" aria-selected="true">
                                            <i class="fa fa-book"></i>
                                            Employment Info
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#qualinfo" data-toggle="tab" role="tab" aria-controls="qualinfo" aria-selected="true">
                                            <i class="fa fa-university"></i>
                                            Qualification
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#expinfo" data-toggle="tab" role="tab" aria-controls="expinfo" aria-selected="true">
                                            <i class="fa fa-history"></i>
                                            Experience
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#cntinfo" data-toggle="tab" role="tab" aria-controls="cntinfo" aria-selected="true">
                                            <i class="fa fa-address-book-o"></i>
                                            Contact Info
                                        </a>
                                    </li>
                                  {{--  <li class="nav-item">
                                        <a class="nav-link" href="#logininfo" data-toggle="tab" role="tab" aria-controls="logininfo" aria-selected="true">
                                            <i class="fa fa-address-book-o"></i>
                                            User ID Info
                                        </a>
                                    </li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="perinfo">
                                    <div class="row bor-sep">
                                        <div class="col-sm-3 text-center">
                                            <h6 class="">Employee Info</h6>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Given Name</label>
                                            <input type="text" class="form-control" placeholder="" name="given_name" title="First & Middle Name">
                                        </div>
                                        <div class="form-group col-sm-3">

                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Father Name</label>
                                            <input type="text" class="form-control" placeholder="" name="father" >
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="picture-container">
                                                <div class="picture" style="width: 100px; height:100px">
                                                    <img src="{{asset('adminassets/img/default-avatar.png')}}" class="picture-src" id="employee_image_preview" title="" />
                                                    <input type="file" name="employee_image" id="employee_image">
                                                </div>
                                                <label class="">Choose Picture</label>
                                            </div>
                                        </div>
                                        <div class=" col-sm-3 select-wizard" >
                                            <label>Gender</label>
                                            <select class="selectpicker" name="gender" data-size="3" data-style="btn btn-secondary btn-round" title="Select Gender" >
                                                <option value="" disabled selected>Select Gender</option>
                                                @foreach($genders as $gender)
                                                    <option value="{{$gender->gnd_Id}}">{{$gender->gender}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class=" col-sm-3 select-wizard" >
                                            <label>Marital Status</label>
                                            <select class="selectpicker" name="marital_status" data-size="3" data-style="btn btn-secondary btn-round" title="Select Gender" data-live-search="true">
                                                <option value="" disabled selected>Marital Status</option>
                                                @foreach($marital_status as $m_status)
                                                    <option value="{{$m_status->pk_marital_id}}">{{$m_status->marital_status}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class=" col-sm-3 select-wizard">
                                            <label>Blood Group</label>
                                            <select class="selectpicker" name="blood_group"    data-size="3" data-style="btn btn-secondary btn-round" title="Select Blood Group" data-live-search="true">
                                                <option value="" disabled selected>Blood Group</option>
                                                @foreach($bloodgroups as $bgroup)
                                                    <option value="{{$bgroup->bg_Id}}">{{$bgroup->blood_group}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">

                                        </div>
                                        <div class="form-group col-sm-3 ">
                                            <label>National Identifier</label>
                                            <input class="form-control" type="text" placeholder="" id="staff_cnic" name="staff_cnic" number="true"/>
                                            <div class="add-div-error staff_cnic"></div>
                                            <div id="uname_response" ></div>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Date of Birth</label>
                                            <input type="text" class="form-control datepicker" placeholder="" name="date_of_birth" >
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label>Religion</label>
                                            <select class="selectpicker" id="religion" name="religion" data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select Religion" data-live-search="true"  data-hide-disabled="true">
                                                <option value="" disabled selected>Select religion</option>
                                                @foreach($religions as $religion)
                                                    <option value="{{$religion->relig_Id}}">{{$religion->religion}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">

                                        </div>
                                        <div class="col-sm-3 select-wizard">
                                            <label class="col-sm-12">Nationality</label>
                                            <select  class="selectpicker" data-size="3" name="nationality" id="emp-nationality" data-style="btn btn-secondary btn-round" data-container="" data-live-search="true" title="Select Nationality" data-hide-disabled="true"  data-virtual-scroll="false">
                                                <option value="" disabled>Choose Nationality</option>
                                                @foreach($nationalities as $nationality)
                                                    <option value="{{$nationality->nation_Id}}">{{$nationality->nationality}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class=" col-sm-3 select-wizard">
                                            <label class="col-sm-12" >Employee District</label>
                                            <select class="selectpicker"  id="employee_district" name="employee_district" data-container="" data-style="btn btn-secondary btn-round" data-size="3" data-style=" " title="Select district" data-live-search="true"  data-hide-disabled="true">
                                                <option value="" disabled >Select District</option>
                                                {{--@foreach($districts as $district)
                                                    <option value="{{$district->dom_Id}}">{{$district->dom_District}}</option>
                                                @endforeach--}}
                                            </select>
                                        </div>
                                        <div class=" col-sm-3 select-wizard">
                                            <label class="col-sm-12" >Cast</label>
                                            <select class="selectpicker"  id="staff_cast" name="staff_cast" data-container="" data-style="btn btn-secondary btn-round" data-size="3" data-style=" " title="Select Cast" data-live-search="true"  data-hide-disabled="true">
                                                <option value="" disabled >Select Cast</option>
                                                @foreach($casts as $cast)
                                                    <option value="{{$cast->cast_Id}}">{{$cast->cast}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-check pull-left">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="status" value="Active">
                                            <span class="form-check-sign"></span>
                                            Check if employee is inactive
                                        </label>
                                    </div>
                                </div>
                                <div class="tab-pane" id="empinfo">

                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Employment Dates</h6>
                                        <div class="form-group col-sm-3">
                                            <label>Personal No</label>
                                            <input type="text" class="form-control" value="{{$employment_number}}" placeholder="" name="staffpno"   readonly="true" >
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Hire Date</label>
                                            <input type="text" class="form-control datepicker" placeholder="" name="hire_date" >

                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Adjustment Date</label>
                                            <input type="text" class="form-control datepicker" placeholder="" name="adjustment_date" >
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Release Date</label>
                                            <input type="text" class="form-control datepicker" placeholder="Last date on payroll" name="releasedate" readonly="true" >
                                        </div>
                                    </div>
                                   {{-- <div class="row bor-hid">
                                        <div class="col-sm-12 pull-right">
                                            <button class="btn btn-secondary pull-right" data-toggle="modal" data-target="#myModal">
                                                Add Billing
                                            </button>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header justify-content-center">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="fa fa-remove"></i>
                                                    </button>
                                                    <h5 class="title title-up">New Payroll Schedule</h5>
                                                </div>
                                                <div class="modal-body row">
                                                    <div class="col-sm-4 ">
                                                        <div class="row">
                                                            <h6 class="col-sm-12">Billing Details</h6>
                                                            <div class="form-group col-sm-6 select-wizard">
                                                                <label>Bill Schedule</label>
                                                                <select class="selectpicker" data-size="3" data-style="btn btn-secondary" title="Select Billing Scgedule" data_live_search->
                                                                    <option value="" disabled selected>Select</option>
                                                                    <option value="1">Daily</option>
                                                                    <option value="2">Weekly</option>
                                                                    <option value="3">Monthly</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-6 select-wizard">
                                                                <label>Billing Type</label>
                                                                <select class="selectpicker" data-size="3" data-style="btn btn-secondary" title="Select Billing Scgedule" >
                                                                    <option value="" disabled selected>Select</option>
                                                                    <option value="1">Hourly</option>
                                                                    <option value="2">Daily</option>
                                                                    <option value="3">Monthly</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12">
                                                                <label>Billing Rate (in PKrs)</label>
                                                                <input type="text" class="form-control" placeholder="" name="houseallow"  number="true" number="true">
                                                            </div>
                                                            <div class="form-group col-sm-12">
                                                                <label>Annual Increment Rate (%age)</label>
                                                                <input type="text" class="form-control" placeholder="" name="houseallow"  number="true" number="true">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="divider"></div>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <h6 class="col-sm-12">Pay Details</h6>
                                                            <div class="form-group col-sm-4">
                                                                <label>Basic Pay</label>
                                                                <input type="text" class="form-control" placeholder="" name="basicpay"  number="true" number="true">
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label>Medical Allowance</label>
                                                                <input type="text" class="form-control" placeholder="" name="medallow"  number="true" number="true">
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label>House Allowance</label>
                                                                <input type="text" class="form-control" placeholder="" name="houseallow"  number="true" number="true">
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label>Utility Allowance</label>
                                                                <input type="text" class="form-control" placeholder="" name="utlityallow"  number="true" number="true">
                                                            </div>

                                                            <div class="form-group col-sm-4">
                                                                <label>Education Allowance</label>
                                                                <input type="text" class="form-control" placeholder="" name="eduallow"  number="true" number="true">
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label>Convenience Allowance</label>
                                                                <input type="text" class="form-control" placeholder="" name="convallow"  number="true" number="true">
                                                            </div>
                                                            <div class="form-group col-sm-4">
                                                                <label>Other Allowance</label>
                                                                <input type="text" class="form-control" placeholder="" name="bonus"  number="true" number="true">
                                                            </div>
                                                        </div>
                                                        <div class="pull-right col-sm-12">
                                                            <input type="checkbox" class="fancy-check pull-right" id="myId"/>
                                                            <label class="form-check-label pull-right" for="myId" ><span>Check if tax is exempted</span></label>
                                                        </div>
                                                        <!--<div class="col-sm-12 form-check pull-right">-->
                                                        <!--<label class="form-check-label">-->
                                                        <!--<input class="form-check-input pull-right" type="checkbox" name="optionCheckboxes" >-->
                                                        <!--<span class="form-check-sign pull-right"></span>-->
                                                        <!--Check if tax is exempted-->
                                                        <!--</label>-->
                                                        <!--</div>-->
                                                    </div>
                                                </div>
                                                <div class="row modal-body">
                                                    <h6 class="col-sm-12">Pension Details</h6>
                                                    <div class="form-group col-sm-4">
                                                        <label>GPF Personal Share (%age)</label>
                                                        <input type="text" class="form-control" placeholder="" name="deduction"  number="true" number="true">
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label>GPF Employer Share (%age)</label>
                                                        <input type="text" class="form-control" placeholder="" name="deduction"  number="true" number="true">
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label class="">Employee Pension Scheme (%age)</label>
                                                        <input type="text" class="form-control" placeholder="" name="netpay"  number="true" number="true">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="">
                                                        <button type="button" class="btn btn-success btn-link" data-dismiss="modal">Save</button>
                                                    </div>
                                                    <div class="divider"></div>
                                                    <div class="">
                                                        <button type="button" class="btn btn-danger btn-link">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
--}}
                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Employment Details</h6>
                                        <div class=" col-sm-3 select-wizard" >
                                            <label>Employment Status</label>
                                            <select class="selectpicker" name="employee_status" data-size="3" data-style="btn btn-secondary btn-round" title="Select status" data-live-search="true">
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="1">Full Time</option>
                                                <option value="2">Part Time</option>
                                            </select>
                                        </div>
                                        <div class=" col-sm-3 select-wizard" >
                                            <label>Contract Type</label>
                                            <select class="selectpicker" name="contract_type" data-size="3" data-style="btn btn-secondary btn-round" title="Select Contract type" data-live-search="true">
                                                <option value="" disabled selected>Select Contract Type</option>
                                                <option value="1">Permanent</option>
                                                <option value="2">Fixed Term</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Duration of Contract</label>
                                            <input type="text" class="form-control" placeholder="" name="staff_contract_duration" number="true">
                                        </div>
                                        <div class=" col-sm-3 select-wizard" >
                                            <label>Employee Type</label>


                                            <select class="selectpicker" name="emp_typ_Id" data-size="3" data-style="btn btn-secondary btn-round" title="Select Employee type" data-live-search="true">
                                              @foreach($employee_types as $EmployeeTypes)
                                                    <option value="{{$EmployeeTypes->emp_typ_Id}}"

                                                      

                                                      

                                                     >{{$EmployeeTypes->emp_Type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class=" col-sm-3 select-wizard">
                                            <label>Designation</label>
                                            
                                            <select class="selectpicker" name="desig_Id" data-size="3"
                                                    data-style="btn btn-secondary btn-round" title="Select Designation"
                                                    data-live-search="true">
                                                <option value="" disabled selected>Select Designation</option>
                                                @foreach($designations as $designation)
                                                    <option value="{{$designation->desig_Id}}">{{$designation->designation}}</option>
                                                @endforeach
                                            </select>


                                            
                                        </div>

                                         <div class="col-sm-3 select-wizard">
                                            <label>Role</label>
                                            <select class="selectpicker" name="roles" data-size="3"
                                                    data-style="btn btn-secondary btn-round" title="Select User"  data-size="3"
                                                    title="Select Role" data-live-search="true"
                                                    data-hide-disabled="true">
                                                <option value="" disabled selected>Select Role</option>
                                                @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Bank Details</h6>
                                        <div class="form-group col-sm-3">
                                            <label>Bank Name</label>
                                            <input type="text" class="form-control" placeholder="" name="bank_Name">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Branch Code</label>
                                            <input type="text" class="form-control" placeholder="" name="branch_Code">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Account Number</label>
                                            <input type="text" class="form-control" placeholder="" name="bank_acc_No">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Branch Address</label>
                                            <input type="text" class="form-control" placeholder="" name="branch_Address">
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="qualinfo">

                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Add Qualification</h6>
                                        <div class="form-group col-sm-2">
                                            <label>Qualification Type:</label>
                                        </div>
                                        <div class=" col-sm-3 select-wizard " >
                                            <select id="showqual" class="selectpicker" data-size="7" data-style="btn btn-secondary btn-round" title="Select type" >
                                                <option value="0" disabled selected>Select Type</option>
                                                <option value="1">Academics</option>
                                                <option value="2">Professional</option>
                                            </select>
                                        </div>
                                    </div>

                                     <div class="row show-acadqual-div" id="show-acad-qual" style="margin:1px">
                                         
                                         <div class="form-group col-sm-2">
                                             <label>Title</label>
                                             <input type="hidden"  name="type[]" value="1"> <input type="text" class="form-control" placeholder="" name="title" value="">
                                         </div>
                                         <div class="form-group col-sm-2">
                                             <label>Education Level</label>
                                             <select class="selectpicker" name="level_Id[]" id="Level_Id_show"  data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select Edu Level" data-live-search="true"  data-hide-disabled="true">


                                                 <option value="" disabled selected>Select Education Level</option>
                                                 @foreach($education_levels as $education_level)
                                                     <option value="{{$education_level->edu_level_Id}}" >{{$education_level->name}}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                         <div class="form-group col-sm-2">
                                             <label>Board/University</label>
                                             <select class="selectpicker" name="univ_Id[]" id="univ_Id_show"  data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select Board/University" data-live-search="true"  data-hide-disabled="true">


                                                 <option value="" disabled selected>Select Board/University</option>
                                                 @foreach($board as $boarda)
                                                     <option value="{{$boarda->pk_board_Id}}"  >{{$boarda->board_Name}}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                         <div class="form-group col-sm-2">
                                             <label>Subject</label>
                                            <select class="selectpicker" id="sub_Id_show" name="sub_Id[]"   data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select Subject" data-live-search="true"  data-hide-disabled="true">
                                     

                                             <option value="" disabled selected>Select Subject</option>
                                             @foreach($subjects as $subject)
                                                 <option value="{{$subject->sub_Id}}" 
                                                  >{{$subject->subject}}</option>
                                             @endforeach
                                             </select>
                                         </div>
                                         <div class="form-group col-sm-1">
                                             <label>Session</label>
                                             <input type="text" class="form-control " id="session_show" placeholder="" name="session[]" value="">
                                         </div>
                                         <div class="form-group col-sm-1">
                                             <label>Grade</label>
                                            <select class="selectpicker" id="grade_Id_show" name="grade_Id[]"   data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select Grade" data-live-search="true"  data-hide-disabled="true">
                                     

                                                 <option value="" disabled selected>Select Grade</option>
                                                 @foreach($grade_general as $grade_generals)
                                                     <option value="{{$grade_generals->id}}" 
                                                        >{{$grade_generals->name}}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                         <div class="form-group col-sm-1">
                                             <label>CGPA/%age</label>
                                             <input type="text" class="form-control" id="acdm_Gpa_show" placeholder="" name="acdm_Gpa[]" value="">
                                         </div>
                                         <div class=" col-sm-1">
                                             <label>Action</label>
                                             <button type="button"  class="btn btn-icon btn btn-outline-choice btn-round add-academic-btn" name="Add"  title="Add" value=""/>
                                             <i class="text-center fa fa-plus fa-lg"></i></button>
                                         </div>
                                     </div>




                                    <div class="row bor-sep showprofqualdiv" id="showprofqual" style="display: none">
                                        <h6 class="col-sm-12">Professional Qualification</h6>
                                         <div class="row appended_prof_qual_div" style="margin:1px">
                                           
                                            <div class="form-group col-sm-3">
                                                <label>Title</label>
                                                <input type="hidden"  name="type[]" value="2"> 
                                                <input type="text" class="form-control" placeholder="" name="title" value="">
                                            </div>

                                             <div class="form-group col-sm-3">
                                                 <label>Education Level</label>
                                                 <select class="selectpicker" name="level_Id[]" id="Level_Id_showp"  data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select Edu Level" data-live-search="true"  data-hide-disabled="true">


                                                     <option value="" disabled selected>Select Education Level</option>
                                                     @foreach($education_levels as $education_level)
                                                         <option value="{{$education_level->edu_level_Id}}" >{{$education_level->name}}</option>
                                                     @endforeach
                                                 </select>
                                             </div>
                                            <div class="form-group col-sm-3">
                                                <label>Board/University</label>
                                                <select class="selectpicker" name="univ_Id[]" id="univ_Id_showp"  data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select Board/University" data-live-search="true"  data-hide-disabled="true">


                                                    <option value="" disabled selected>Select Board/University</option>
                                                    @foreach($board as $boarda)
                                                        <option value="{{$boarda->pk_board_Id}}"  >{{$boarda->board_Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>Session</label>
                                                <input type="text" class="form-control " id="session_showp" placeholder="" name="session[]" value="">
                                            </div>
                                            <div class=" col-sm-1">
                                                <label>Action</label>
                                                <button type='submit'
                                                            class='btn-icon btn btn-outline-choice btn-round pull-center profession-qual-btn' name='Add'
                                                            title="Add" value=''/>
                                                    <i class="text-center fa fa-plus fa-lg"></i>
                                            </div>
                                         </div> 
                                    </div>
                                     

                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="card-title">Qualification Record List</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="toolbar">
                                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                    </div>


                                                    <table id="datatable" class=" table-hover custom_border dataTable" cellspacing="0" width="100%">
                                                        <thead class="table-secondary">
                                                        <tr>
                                                            
                                                            <th>Title</th>
                                                            <th>Board/University</th>
                                                            <th>Subject</th>
                                                            <th>Session</th>
                                                            <th>Grade</th>
                                                            <th>CGPA/%age</th>
                                                            <th class="w-25">File</th>
                                                            <th class="disabled-sorting text-center">Actions</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        </tbody>
                                                    </table>

                                                </div><!-- end content-->
                                            </div><!--  end card  -->
                                        </div> <!-- end col-md-12 -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="card-title">Professional Qualification Record List</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="toolbar">
                                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                    </div>


                                                    <table id="professional" class=" table-hover custom_border dataTable" cellspacing="0" width="100%">
                                                        <thead class="table-secondary">
                                                        <tr>
                                                            
                                                            <th>Title</th>
                                                            <th>Board/University</th>
                                                            <th>Session</th>
                                                            <th class="w-25">File</th>
                                                            <th class="disabled-sorting text-center">Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div><!-- end content-->
                                            </div><!--  end card  -->
                                        </div> <!-- end col-md-12 -->
                                    </div> <!-- end row -->

                                </div>
                                <div class="tab-pane" id="expinfo">
                                    <h5></h5>
                                    <div class="row bor-sep show-experience-div" id="show-experience">
                                        <h6 class="col-sm-12">Add Experience</h6>
                                        <div class="row appended-experience-div" style="margin:1px">
                                                 
                                            <div class="form-group col-sm-2">
                                                <label>Organization</label>
                                                <input type="text" class="form-control" id="prev_exper_Org"  placeholder="" name="prev_exper_Org" >
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>Position</label>

                                                <input type="text" class="form-control"  id="prev_exper_Position" placeholder="" name="prev_exper_Position" >
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>Role</label>
                                                <input type="text" class="form-control" id="prev_exper_Role"  placeholder="" name="prev_exper_Role">
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>From Date</label>
                                                <input type="text" class="form-control datepicker"  id="prev_Frmdate" placeholder="" name="prev_Frmdate" >
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label>To Date</label>
                                                <input type="text" class="form-control datepicker" id="prev_Todate"  placeholder="" name="prev_Todate" >
                                            </div>
                                            <div class="col-sm-1">
                                                <label>Action</label>
                                                <button type="button"
                                                        class="btn btn-icon btn btn-outline-choice btn-round add-experience-div-btn"
                                                        name="Add" title="Add" value="">
                                                <i class="fa fa-plus"></i></button>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="card-title">Experience Record List</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="toolbar">
                                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                    </div>
                                                    <table id="expertable" class="table table-hover custom_border dataTable" cellspacing="0" width="100%">
                                                        <thead class="table-secondary">
                                                            <tr>
                                                                
                                                                <th>Organisation</th>
                                                                <th>Position</th>
                                                                <th>Role</th>
                                                                <th>From Date</th>
                                                                <th>To Date</th>
                                                                <th class="w-25">File</th>
                                                                <th class="disabled-sorting text-center">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div><!-- end content-->
                                            </div><!--  end card  -->
                                        </div> <!-- end col-md-12 -->
                                    </div> <!-- end row -->
                                </div>
                                <div class="tab-pane" id="cntinfo">
                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Mailing Address</h6>
                                        <div class="form-group col-sm-12">
                                            <label>Street Address</label>
                                            <textarea  class="form-control" name="mailing_address" rows="1" cols="33" ></textarea>
                                        </div>
                                        <div class="add-div-error mailing_address"></div>
                                        <div class="form-group col-sm-3">
                                            <label>Country</label>
                                            <select class="selectpicker" name="country"    id="emp-country" data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select Country" data-live-search="true"  data-hide-disabled="true">
                                                <option value="" disabled selected>Select Country</option>
                                                @foreach($nationalities as $nationality)
                                                <option value="{{$nationality->nation_Id}}">{{$nationality->country}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label>State</label>
                                            <select class="selectpicker" name="state"    id="emp-state" data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select State" data-live-search="true"  data-hide-disabled="true">
                                                <option value="" disabled selected>Select State</option>
                                                {{--@foreach($districts as $district)--}}
                                                    {{--<option value="{{$district->dom_Id}}">{{$district->dom_District}}</option>--}}
                                                    {{--<option value="1">State Name</option>--}}
                                                {{--@endforeach--}}
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>District</label>
                                            <select class="selectpicker" name="district"    id="district" data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select District" data-live-search="true"  data-hide-disabled="true">
                                                <option value="" disabled selected>Select District</option>
                                                {{--@foreach($districts as $district)
                                                    <option value="{{$district->dom_Id}}">{{$district->dom_District}}</option>
                                                @endforeach--}}
                                            </select>
                                        </div>
                                        <div class="select-wizard col-sm-3">
                                            <label class="col-sm-12">City/Tehsil</label>
                                            <select class="selectpicker " id="employee_city" name="employee_city" data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select city" data-live-search="true"  data-hide-disabled="true">
                                                <option value="" disabled selected>Select city</option>
                                                {{--@foreach($cities as $city)
                                                    <option value="{{$city->pk_city_id}}">{{$city->city_name}}</option>
                                                @endforeach--}}
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Zipcode</label>
                                            <input type="text" class="form-control" placeholder="" name="zip_code" >
                                        </div>
                                    </div>
                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Permanent Address</h6>
                                        <div class="form-group col-sm-12">
                                            <label>Permanent Address</label>
                                            <textarea  class="form-control" name="permanent_address" rows="1" cols="33"></textarea>
                                        </div>
                                    </div>
                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Contact Information</h6>
                                        <div class="form-group col-sm-4">
                                            <label>Mobile Phone No</label>

                                            <input type="text" class="form-control" placeholder="+11" name="employee_mobile_phone" number="true" >
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label>Home Phone No</label>
                                            <input type="text" class="form-control" placeholder="+11" name="employee_home_phone" number="true" >
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Email Address</label>
                                            <input type="text" class="form-control" placeholder="" name="employee_email" email="true" >
                                        </div>
                                    </div>
                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Emergency Contact Information</h6>
                                        <div class="form-group col-sm-4">
                                            <label>Contact Name</label>
                                            <input type="text" class="form-control" placeholder="" name="emergency_contact_name" required="true" >
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Contact Phone</label>
                                            <input type="text" class="form-control" placeholder="+11" name="emergency_contact_phone" number="true" >
                                        </div>
                                        <div class=" col-sm-3 select-wizard">
                                            <label>Relation</label>
                                            <select class="selectpicker" name="relation" data-size="3" data-style="btn btn-secondary btn-round" title="Select Relation" data-live-search="true">
                                                <option value="" disabled selected>Select Relation</option>
                                                @foreach($ralationship as $ralation)
                                                    <option value="{{$ralation->pk_relat_Id}}">{{$ralation->relation_Name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label>Other Relation</label>
                                            <input type="text" class="form-control" placeholder="" name="other_relation">
                                        </div>
                                    </div>
                                </div>
                               {{-- <div class="tab-pane" id="logininfo">
                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Create User</h6>
                                        <div class=" col-sm-3 select-wizard">
                                            <label>User Type</label>
                                            <select class="selectpicker" name="user_type" data-size="3" data-style="btn btn-secondary" title="Select Blood Group" data-live-search="true">
                                                <option value="" disabled selected>Select Type</option>
                                                @foreach($designations as $designation)
                                                    <option value="{{$designation->designation}}">{{$designation->designation}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>User Id</label>
                                            <input type="text" class="form-control" placeholder="" name="user_id" required="true" >
                                        </div>
                                        <div class="form-group has-label col-sm-3">
                                            <label>
                                                Password
                                                *
                                            </label>
                                            <input class="form-control" name="password" id="registerPassword" type="password" required="true" />
                                        </div>
                                        <div class="form-group has-label col-sm-3">
                                            <label>
                                                Confirm Password
                                                *
                                            </label>
                                            <input class="form-control" name="password_confirmation" id="registerPasswordConfirmation" type="password" required="true" equalTo="#registerPassword" />
                                        </div>
                                        <div class="pull-right col-sm-12">
                                            <input type="checkbox" class="fancy-check pull-right" id="userId"/>
                                            <label class="form-check-label pull-right" for="userId" ><span>Check if user is inactive</span></label>
                                        </div>
                                    </div>

                                </div>--}}
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-round btn-choice btn-next btn-fill btn-rose btn-wd' name='next' value='Next' />
                              {{--  <input type='button' class='btn btn-outline-success btn-save btn-fill btn-rose btn-wd' name='next' value='Save & Exit' />--}}
                                <input type='submit' class='btn btn-round btn-finish  btn-secondary btn-fill btn-rose btn-wd add-employee-submit-btn' name='finish' value='Submit' />
                            </div>
                            <div class="pull-left">
                                <input type='button' class='btn btn-round btn-previous btn-fill btn-outline-choice btn-wd' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
    </div>
@endsection
@section('front_css')
   
@endsection
@section('front_script')
    <script src="{{asset('adminassets/validator/dist/jquery.validate.js')}}"></script>
    <script src="{{asset('js/employee_script.js')}}"></script>  
    <script>
        $('#showqual').on('change', function () {
            $("#show-acad-qual").css('display', (this.value == '1') ? 'flex' : 'none');
            $("#showprofqual").css('display', (this.value == '2') ? 'flex' : 'none');
        });
    </script>
  
    <script>
        $(function () {
            //Initialize Select2 Elements
            //$('select').select2();

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'yyy-mm-dd hh:mm A' }})
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges   : {
                        'Today'       : [moment(), moment()],
                        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate  : moment()
                },
                function (start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )


            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass   : 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
            })

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false
            })
        })

        /*employee image*/
        function EmployeereadURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#employee_image_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#employee_image").change(function() {
            EmployeereadURL(this);
        });

    </script>
@endsection

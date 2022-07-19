@extends('layouts.master')
@section('title', 'Teacher Class Register')
@section('content')
    <style>
        .add-div-error{
            color: red;
        }
        .edit-div-error{
            color: red;
        }
        .btn-round{ 

    padding-right: 22px; }
    </style>
 {{--   <style>
        span.imgCheckbox2 img {width: 100px; height: auto;}
    </style>--}}

    <div class="content">
        <div class="col-md-12 col-sm-12 col-lg-12 mr-auto ml-auto">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card card-wizard" data-color="primary" id="wizardProfile">
                    <form action="#" method="">
                        <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                        <div class="card-header text-center">
                            <h3 class="card-title">
                               Class Register
                            </h3>
                            <div class="wizard-navigation">
                                <ul>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#attendance" data-toggle="tab" role="tab" aria-controls="about" aria-selected="true">
                                            <i class="fa fa-book"></i>
                                            Mark Attendance
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#behaviour" data-toggle="tab" role="tab" aria-controls="account" aria-selected="true">
                                            <i class="fa fa-eye"></i>
                                            Mark Behaviour
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#achievement" data-toggle="tab" role="tab" aria-controls="address" aria-selected="true">
                                            <i class="fa fa-trophy"></i>
                                            Mark Achievement
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if($class_sections)
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="attendance">

                                        <div class="row border-bottom pb-2 border-secondary" style="margin-bottom: 15px;">
{{--                                            <div class="col-sm-1"> </div>--}}
                                            <div class="col-sm-12 col-lg-2 col-md-2">
                                                <button type="button" data-text="Present" data-id="P" class="btn-outline-choice  active btn btn-sm  pull-left btn-round btn-wd-cus left-icon-holder register-save" data-toggle="" data-target=""> <i class="fa fa-calendar-check-o"></i> Present </button>
                                                <input type="hidden" name="cls_Id" id="cls_Id" value="{{$class_sections->cls_Id}}">
                                                <input type="hidden" name="c_section_Id" value="{{$class_sections->c_section_Id}}" id="c_section_Id">
                                                <input type="hidden" id="students" value="">
                                                <input type="hidden" id="attendance_type" value="1">
                                                <input type="hidden" id="attendence_status" value="P">
                                                <input type="hidden" id="id" value="{{$id}}"> </div>
                                            <div class="col-sm-12 col-lg-2 col-md-2">
                                                <button type="button" data-id="A" class="btn-outline-choice btn btn-sm pull-left btn-round btn-wd-cus left-icon-holder register-save" data-toggle="" data-target="" data-text="Absent"> <i class="fa fa-calendar-times-o"></i> Absent </button>
                                            </div>
                                            <div class="col-sm-12 col-lg-2 col-md-2">
                                                <button type="button" data-id="L" class="btn-outline-choice btn btn-sm pull-left btn-round btn-wd-cus left-icon-holder register-save"> <i class="fa fa-clock-o"></i> Late </button>
                                            </div>
                                            <div class="col-sm-12 col-lg-2 col-md-2">
                                                <button type="button" data-id="H" class="btn-outline-choice btn btn-sm pull-left btn-round btn-wd-cus left-icon-holder register-save" data-text="Leave"> <i class="fa fa-leaf"></i> Leave </button>
                                            </div>
                                        </div>
                                    <div class="alert alert-success rounded p-1 bg-success text-white text-center" role="alert" id="snackbar" hidden>
                                        <h3>Attendence has been Marked Successfully!</h3> </div>
                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                </div>
                                                <div class="modal-body"> ... </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Understood</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row "> @if($attendance_of_class_section_students != Null) @php $studentList = []; @endphp @foreach($attendance_of_class_section_students as $student) @php $attuend =false; if(array_key_exists($student->id,$stlist)){ $studentList[$student->id]=$student->id; $attuend = true; } @endphp
                                        <div class="col-sm-12 col-lg-auto col-md-auto">
                                            <div id="attendance_{{$student->id}}" class="card-image  exampletwo col-cus-2 imgCheckbox2  author" data-id="{{$student->id}}">  <img class="card-img-top not-blur-img " src="{{$student->photo()}}" width="200px" height="120px" alt="Card image cap" />
                                                <div class="card-body pl-0">
                                                    <a href="">
                                                        <h6 class="title text-capitalize">{{preg_replace("/\s\s+/", " ", $student->name) }}  </h6> </a>
                                                    <p id="studentId{{$student->id}}" class="card-text text-muted  mb-1 "> @php $name = ""; if($attuend){ if($stlist[$student->id]['attendanc']=='P'){ $name = "Present"; }else if($stlist[$student->id]['attendanc']=='A'){ $name= "Absent"; } else if($stlist[$student->id]['attendanc']=='L'){ $name= "Late"; }else if($stlist[$student->id]['attendanc']=='H'){ $name = "Leave"; } } echo $name; @endphp </p>
                                                </div>
                                            </div>
                                        </div> @endforeach @endif
                                    </div>

                                </div>
                                <div class="tab-pane" id="behaviour">
                                    <div class="row border-bottom pb-2 border-secondary" style="margin-bottom: 15px">

                                        <div class="col-sm-12 col-lg-2 col-md-2">
                                            <button type="button" class="btn-outline-choice btn btn-sm pull-left btn-round btn-wd left-icon-holder" data-toggle="modal" data-target="#myModalparticipant"> <i class="fa fa-users"></i> Participant </button> @if($class_sections)
                                                <input type="hidden" name="cls_Id" id="cls_Id" value="{{$class_sections->cls_Id}}">
                                                <input type="hidden" name="c_section_Id" value="{{$class_sections->c_section_Id}}" id="c_section_Id">
                                                <input type="hidden" id="bstudents" value="{{$studentListBach}}">
                                                <input type="hidden" id="attendance_type" value="2"> @endif </div>
                                        <div class="modal fade" id="myModalparticipant" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header justify-content-center">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-remove"></i> </button>
                                                        <h5 class="title title-up"><a>Select details</a></h5> </div>
                                                    <div class="modal-body row">
                                                        <div class=" col-sm-6 select-wizard">
                                                            <label>Behaviour Type</label>
                                                            <select class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" name="behaviour_type" id="behaviour_type" title="Select Billing Scgedule">
                                                                <option value="" disabled selected>Select Behaviour</option>
                                                                <?php

                                                                $BehaviourType = config('constants.BehaviourType')
                                                                ?> @foreach($BehaviourType as $key=>$val)
                                                                    <option value="{{$key}}">{{$val}}</option> @endforeach </select>
                                                        </div>
                                                        <div class=" col-sm-6 select-wizard">
                                                            <label>Activities</label>
                                                            <select class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" id="activities_id" name="activities_id" title="Select Billing Scgedule">
                                                                <option value="" disabled selected>Select Activity</option>
                                                                <?php

                                                                $Activitiesss = config('constants.AchievementActivities')
                                                                ?> @foreach($Activitiesss as $key=>$val)
                                                                    <option value="{{$key}}">{{$val}}</option> @endforeach </select>
                                                        </div>
                                                        <div class=" col-sm-6 select-wizard">
                                                            <label>Location</label>
                                                            <select class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" name="location_id" id="location_id" title="Select Billing Scgedule">
                                                                <option value="" disabled selected>Select Location</option>
                                                                <?php

                                                                $Locationss = config('constants.Location')
                                                                ?> @foreach($Locationss as $key=>$val)
                                                                    <option value="{{$key}}">{{$val}}</option> @endforeach </select>
                                                        </div>
                                                        <div class=" col-sm-6 select-wizard">
                                                            <label>Status</label>
                                                            <select class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" name="status" id="status" title="Select Billing Scgedule">
                                                                <option value="" disabled selected>Select Status</option>
                                                                <?php

                                                                $Statusss = config('constants.Status')
                                                                ?> @foreach($Statusss as $key=>$val)
                                                                    <option value="{{$key}}">{{$val}}</option> @endforeach </select>
                                                        </div>
                                                        <div class=" col-12"></div>
                                                        <br>
                                                        <div class="form-group col-sm-12">
                                                            <label>Details</label>
                                                            <input type="text" class="form-control " placeholder="Teacher Comments" id="behaviour_comment" name="comments" value=""> </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="">
                                                            <button type="submit" class="btn btn-success btn-round btn-link saveba">Save</button>
                                                        </div>
                                                        <div class="divider"></div>
                                                        <div class="">
                                                            <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> @if($attendance_of_class_section_students != Null) @php $studentList = []; @endphp @foreach($attendance_of_class_section_students as $student) @php $attuend =false; if(array_key_exists($student->id,$stlist)){ $studentList[$student->id]=$student->id; $attuend = true; } @endphp
                                        <div class="col-sm-12 col-lg-auto col-md-auto">
                                            <div id="attendance{{$student->id}}" class="card-image exampletwo col-cus-2 imgCheckboxbah  author" data-id="{{$student->id}}">

                                             <img class="card-img-top not-blur-img " src="{{$student->photo()}}" width="200px" height="120px" alt="Card image cap" />
                                                <div class="card-body pl-0">
                                                    <a href="">
                                                        <h6 class="title text-capitalize">{{preg_replace("/\s\s+/", " ", $student->name) }}  </h6> </a>
                                                    <p id="studentId{{$student->id}}" class="card-text text-muted  mb-1 "> </p>
                                                </div>
                                            </div>
                                        </div> @endforeach @endif </div>

                                </div>
                                <div class="tab-pane" id="achievement">
                                    <div class="row border-bottom pb-2 border-secondary" style="margin-bottom: 15px">
                                        <div class="col-sm-12 col-lg-2 col-md-2">
                                            <button type="button" class="btn-outline-choice btn btn-sm pull-left btn-round btn-wd-cus left-icon-holder" data-toggle="modal" data-target="#myModalachieve"> <i class="fa fa-trophy"></i> Record </button>
                                            <input type="hidden" id="achievementstudentLists" value="{{$studentListach}}"  /> </div>
                                    </div>
                                    <div class="modal fade" id="myModalachieve" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header justify-content-center">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-remove"></i> </button>
                                                    <h5 class="title title-up"><a>Select details</a></h5> </div>
                                                <div class="modal-body row">
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>Achievement Type</label>
                                                        <select class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" name="achievement_type" title="Select Billing Scgedule" id="achievement_type">
                                                            <option value="" disabled selected>Achievement</option>
                                                            <?php

                                                            $Achievementsss = config('constants.Achievement')
                                                            ?> @foreach($Achievementsss as $key=>$val)
                                                                <option value="{{$key}}">{{$val}}</option> @endforeach </select>
                                                    </div>
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>Activities</label>
                                                        <select class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" name="activities_id" title="Select Billing Scgedule" id="activities_idachement">
                                                            <option value="" disabled selected>Activity</option>
                                                            <?php

                                                            $AchievementActivities = config('constants.AchievementActivities')
                                                            ?> @foreach($AchievementActivities as $key=>$val)
                                                                <option value="{{$key}}">{{$val}}</option> @endforeach </select>
                                                    </div>
                                                    <div class=" col-12"></div>
                                                    <br>
                                                    <div class="form-group col-sm-12 ">
                                                        <label class="col-12">Details</label>
                                                        <input type="text" class="form-control " placeholder="Teacher Comments" name="comments" value="" id="comments"> </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="">
                                                        <button type="submit" class="btn btn-success btn-round saveach">Save</button>
                                                    </div>
                                                    <div class="divider"></div>
                                                    <div class="">
                                                        <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> @if($attendance_of_class_section_students != Null) @php $studentList = []; @endphp @foreach($attendance_of_class_section_students as $student) @php $attuend =false; if(array_key_exists($student->id,$stlist)){ $studentList[$student->id]=$student->id; $attuend = true; } @endphp
                                        <div class="col-sm-12 col-lg-auto col-md-auto">
                                            <div id="attendanceatt{{$student->id}}" class="card-image exampletwo col-cus-2 imgCheckboxachvi  author" data-id="{{$student->id}}"> 
                                             <img class="card-img-top not-blur-img " src="{{$student->photo()}}" width="200px" height="120px" alt="Card image cap" />
                                                <div class="card-body pl-0">
                                                    <a href="">
                                                        <h6 class="title text-capitalize">{{preg_replace("/\s\s+/", " ", $student->name) }}  </h6> </a>
                                                </div>
                                            </div>
                                        </div> @endforeach @endif </div>

                                </div>
                            </div>@else

                            @endif
                        </div>
                        <div class="card-footer">
                            <div class="pull-right"> </div>
                            {{--<div class="row text-center">
                                <div class="col-sm-1 form-group typography-line">
                                    <p class="category">&nbsp;</p>
                                    <button class="col-sm-1 btn  btn-icon btn-round btn-outline-choice btn" id="select-all-setudent" style="margin-bottom: 8px!important;"> <i class="fa fa-check"></i> </button>
                                    <label class="">Select All</label>
                                </div>
                                <div class="col-sm-1 typography-line">
                                    <p class="category">&nbsp;</p>
                                    <button data-id="" class="col-sm-1 btn btn-icon btn-round btn-outline-choice btn register-save" style="margin-bottom: 8px!important;"> <i class="fa fa-save"></i> </button>
                                    <br>
                                    <label class="">Save</label>
                                </div>
                                <div class="col-sm-6 typography-line"> </div>
                            </div>--}}
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
    </div>



{{--    <div class="content">--}}
{{--        <div class=" row ">--}}
{{--            <div class="col-md-12 mr-auto ml-auto">--}}
{{--                <form id="TypeValidation" action="#" method="">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12 ml-auto mr-auto">--}}
{{--                            <div class="  card-subcategories card-choice">--}}
{{--                            @if($class_sections)--}}
{{--                                <div class="card-body ">--}}
{{--                                    <div class="row"> --}}
{{--                                        <div class="col-sm-12 pull-left">--}}
{{--                                        --}}
{{--                                            <ul class="nav  nav-pills nav-pills-choice nav-pills-icons " role="tablist">--}}
{{--                                                <li class="nav-item">--}}
{{--                                                    <a class="nav-link active" data-toggle="tab" href="#attendance" role="tablist">--}}
{{--                                                        <i class="now-ui-icons objects_umbrella-13"></i>--}}
{{--                                                        Attendance</a>--}}
{{--                                                </li>--}}
{{--                                                <li class="nav-item">--}}
{{--                                                    <a class="nav-link" data-toggle="tab" href="#behaviour" role="tablist">--}}
{{--                                                        <i class="now-ui-icons shopping_shop"></i>--}}
{{--                                                        Behaviour--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="nav-item">--}}
{{--                                                    <a class="nav-link" data-toggle="tab" href="#achievement" role="tablist">--}}
{{--                                                        <i class="now-ui-icons ui-2_settings-90"></i>--}}
{{--                                                        Achievement--}}
{{--                                                    </a>--}}
{{--                                                </li>       --}}
{{--                                            </ul>--}}
{{--                                            <div class="separator-line-cus"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    --}}
{{--                                    <div class="tab-content tab-space tab-subcategories">--}}
{{--                                        <div class="tab-pane active" id="attendance">--}}
{{--                                            <div class="row " style="margin-bottom: 15px;">--}}
{{--                                                <div class="col-sm-1"> </div>--}}
{{--                                                <div class="col-sm-2">--}}
{{--                                                    <button type="button" data-text="Present" data-id="P" class="btn-choice  active btn btn-sm  pull-left btn-round btn-wd-cus left-icon-holder register-save" data-toggle="" data-target=""> <i class="fa fa-calendar-check-o"></i> Present </button>--}}
{{--                                                    <input type="hidden" name="cls_Id" id="cls_Id" value="{{$class_sections->cls_Id}}">--}}
{{--                                                    <input type="hidden" name="c_section_Id" value="{{$class_sections->c_section_Id}}" id="c_section_Id">--}}
{{--                                                    <input type="hidden" id="students" value="">--}}
{{--                                                    <input type="hidden" id="attendance_type" value="1">--}}
{{--                                                    <input type="hidden" id="attendence_status" value="P">--}}
{{--                                                    <input type="hidden" id="id" value="{{$id}}"> </div>--}}
{{--                                                <div class="col-sm-2">--}}
{{--                                                    <button type="button" data-id="A" class="btn-choice btn btn-sm pull-left btn-round btn-wd-cus left-icon-holder register-save" data-toggle="" data-target="" data-text="Absent"> <i class="fa fa-calendar-times-o"></i> Absent </button>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-2">--}}
{{--                                                    <button type="button" data-id="L" class="btn-choice btn btn-sm pull-left btn-round btn-wd-cus left-icon-holder register-save"> <i class="fa fa-clock-o"></i> Late </button>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-2">--}}
{{--                                                    <button type="button" data-id="H" class="btn-choice btn btn-sm pull-left btn-round btn-wd-cus left-icon-holder register-save" data-text="Leave"> <i class="fa fa-leaf"></i> Leave </button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="alert alert-success rounded p-1 bg-success text-white text-center" role="alert" id="snackbar" hidden>--}}
{{--                                                <h3>Attendence has been Marked Successfully!</h3> </div>--}}
{{--                                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">--}}
{{--                                                <div class="modal-dialog">--}}
{{--                                                    <div class="modal-content">--}}
{{--                                                        <div class="modal-header">--}}
{{--                                                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>--}}
{{--                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="modal-body"> ... </div>--}}
{{--                                                        <div class="modal-footer">--}}
{{--                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                                                            <button type="button" class="btn btn-primary">Understood</button>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="row bg-white"> @if($attendance_of_class_section_students != Null) @php $studentList = []; @endphp @foreach($attendance_of_class_section_students as $student) @php $attuend =false; if(array_key_exists($student->id,$stlist)){ $studentList[$student->id]=$student->id; $attuend = true; } @endphp--}}
{{--                                                <div class="col-sm-2">--}}
{{--                                                    <div id="attendance_{{$student->id}}" class="card-image  exampletwo col-cus-2 imgCheckbox2  author" data-id="{{$student->id}}"> 
    <img class="card-img-top not-blur-img " src="{{$student->phot()}}" width="200px" height="120px" alt="Card image cap" />  --}}
{{--                                                        <div class="card-body pl-0">--}}
{{--                                                            <a href="">--}}
{{--                                                                <h6 class="title text-capitalize">{{preg_replace("/\s\s+/", " ", $student->name) }}  </h6> </a>--}}
{{--                                                            <p id="studentId{{$student->id}}" class="card-text text-muted  mb-1 "> @php $name = ""; if($attuend){ if($stlist[$student->id]['attendanc']=='P'){ $name = "Present"; }else if($stlist[$student->id]['attendanc']=='A'){ $name= "Absent"; } else if($stlist[$student->id]['attendanc']=='L'){ $name= "Late"; }else if($stlist[$student->id]['attendanc']=='H'){ $name = "Leave"; } } echo $name; @endphp </p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div> @endforeach @endif </div>--}}
{{--                                            <div class="card-footer">--}}
{{--                                                <div class="pull-right"> </div>--}}
{{--                                                <div class="row text-center">--}}
{{--                                                    <div class="col-sm-1 form-group typography-line">--}}
{{--                                                        <p class="category">&nbsp;</p>--}}
{{--                                                        <button class="col-sm-1 btn  btn-icon btn-round btn-choice btn" id="select-all-setudent" style="margin-bottom: 8px!important;"> <i class="fa fa-check"></i> </button>--}}
{{--                                                        <label class="">Select All</label>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-sm-1 typography-line">--}}
{{--                                                        <p class="category">&nbsp;</p>--}}
{{--                                                        <button data-id="" class="col-sm-1 btn btn-icon btn-round btn-choice btn register-save" style="margin-bottom: 8px!important;"> <i class="fa fa-save"></i> </button>--}}
{{--                                                        <br>--}}
{{--                                                        <label class="">Save</label>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-sm-6 typography-line"> </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="clearfix"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="tab-pane" id="behaviour">--}}
{{--                                            <div class="row " style="margin-bottom: 15px">--}}
{{--                                                <div class="col-sm-1"> </div>--}}
{{--                                                <div class="col-sm-2">--}}
{{--                                                    <button type="button" class="btn-choice btn btn-sm pull-left btn-round btn-wd left-icon-holder" data-toggle="modal" data-target="#myModalparticipant"> <i class="fa fa-users"></i> Participant </button> @if($class_sections)--}}
{{--                                                    <input type="hidden" name="cls_Id" id="cls_Id" value="{{$class_sections->cls_Id}}">--}}
{{--                                                    <input type="hidden" name="c_section_Id" value="{{$class_sections->c_section_Id}}" id="c_section_Id">--}}
{{--                                                    <input type="hidden" id="bstudents" value="{{$studentListBach}}">--}}
{{--                                                    <input type="hidden" id="attendance_type" value="2"> @endif </div>--}}
{{--                                                <div class="modal fade" id="myModalparticipant" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">--}}
{{--                                                    <div class="modal-dialog">--}}
{{--                                                        <div class="modal-content">--}}
{{--                                                            <div class="modal-header justify-content-center">--}}
{{--                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-remove"></i> </button>--}}
{{--                                                                <h5 class="title title-up"><a>Select details</a></h5> </div>--}}
{{--                                                            <div class="modal-body row">--}}
{{--                                                                <div class=" col-sm-6 select-wizard">--}}
{{--                                                                    <label>Behaviour Type</label>--}}
{{--                                                                    <select class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" name="behaviour_type" id="behaviour_type" title="Select Billing Scgedule">--}}
{{--                                                                        <option value="" disabled selected>Select Behaviour</option>--}}
{{--                                                                        <?php--}}

{{--                                                                                                        $BehaviourType = config('constants.BehaviourType')--}}
{{--                                                                                                        ?> @foreach($BehaviourType as $key=>$val)--}}
{{--                                                                            <option value="{{$key}}">{{$val}}</option> @endforeach </select>--}}
{{--                                                                </div>--}}
{{--                                                                <div class=" col-sm-6 select-wizard">--}}
{{--                                                                    <label>Activities</label>--}}
{{--                                                                    <select class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" id="activities_id" name="activities_id" title="Select Billing Scgedule">--}}
{{--                                                                        <option value="" disabled selected>Select Activity</option>--}}
{{--                                                                        <?php--}}

{{--                                                                                                        $Activitiesss = config('constants.AchievementActivities')--}}
{{--                                                                                                        ?> @foreach($Activitiesss as $key=>$val)--}}
{{--                                                                            <option value="{{$key}}">{{$val}}</option> @endforeach </select>--}}
{{--                                                                </div>--}}
{{--                                                                <div class=" col-sm-6 select-wizard">--}}
{{--                                                                    <label>Location</label>--}}
{{--                                                                    <select class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" name="location_id" id="location_id" title="Select Billing Scgedule">--}}
{{--                                                                        <option value="" disabled selected>Select Location</option>--}}
{{--                                                                        <?php--}}

{{--                                                                                                        $Locationss = config('constants.Location')--}}
{{--                                                                                                        ?> @foreach($Locationss as $key=>$val)--}}
{{--                                                                            <option value="{{$key}}">{{$val}}</option> @endforeach </select>--}}
{{--                                                                </div>--}}
{{--                                                                <div class=" col-sm-6 select-wizard">--}}
{{--                                                                    <label>Status</label>--}}
{{--                                                                    <select class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" name="status" id="status" title="Select Billing Scgedule">--}}
{{--                                                                        <option value="" disabled selected>Select Status</option>--}}
{{--                                                                        <?php--}}

{{--                                                                                                        $Statusss = config('constants.Status')--}}
{{--                                                                                                        ?> @foreach($Statusss as $key=>$val)--}}
{{--                                                                            <option value="{{$key}}">{{$val}}</option> @endforeach </select>--}}
{{--                                                                </div>--}}
{{--                                                                <div class=" col-12"></div>--}}
{{--                                                                <br>--}}
{{--                                                                <div class="form-group col-sm-12">--}}
{{--                                                                    <label>Details</label>--}}
{{--                                                                    <input type="text" class="form-control " placeholder="Teacher Comments" id="behaviour_comment" name="comments" value=""> </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="modal-footer">--}}
{{--                                                                <div class="">--}}
{{--                                                                    <button type="submit" class="btn btn-success btn-round btn-link saveba">Save</button>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="divider"></div>--}}
{{--                                                                <div class="">--}}
{{--                                                                    <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Cancel</button>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="row"> @if($attendance_of_class_section_students != Null) @php $studentList = []; @endphp @foreach($attendance_of_class_section_students as $student) @php $attuend =false; if(array_key_exists($student->id,$stlist)){ $studentList[$student->id]=$student->id; $attuend = true; } @endphp--}}
{{--                                                <div class="col-sm-2">--}}
{{--                                                    <div id="attendance{{$student->id}}" class="card-image exampletwo col-cus-2 imgCheckboxbah  author" data-id="{{$student->id}}"> 
    <img class="card-img-top not-blur-img " src="{{$student->photo()}}" width="200px" height="120px" alt="Card image cap" /> 
{{--                                                        <div class="card-body pl-0">--}}
{{--                                                            <a href="">--}}
{{--                                                                <h6 class="title text-capitalize">{{preg_replace("/\s\s+/", " ", $student->name) }}  </h6> </a>--}}
{{--                                                            <p id="studentId{{$student->id}}" class="card-text text-muted  mb-1 "> </p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div> @endforeach @endif </div>--}}
{{--                                            <div class="card-footer">--}}
{{--                                                <div class="pull-right"> </div>--}}
{{--                                                <div class="row text-center">--}}
{{--                                                    <div class="col-sm-1 form-group typography-line">--}}
{{--                                                        <p class="category">&nbsp;</p>--}}
{{--                                                        <button class="col-sm-1 btn  btn-icon btn-round btn-choice btn select_Badll" id="" style="margin-bottom: 8px!important;"> <i class="fa fa-check"></i> </button>--}}
{{--                                                        <label class="">Select All</label>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-sm-1 typography-line">--}}
{{--                                                        <p class="category">&nbsp;</p>--}}
{{--                                                        <button data-id="" class="col-sm-1 btn  btn-icon btn-round saveba btn-choice btn  " style="margin-bottom: 8px!important;"> <i class="fa fa-save"></i> </button>--}}
{{--                                                        <br>--}}
{{--                                                        <label class="">Save</label>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-sm-6 typography-line"> </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="clearfix"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="tab-pane" id="achievement">--}}
{{--                                            <div class="row" style="margin-bottom: 15px">--}}
{{--                                                <div class="col-sm-1"> </div>--}}
{{--                                                <div class="col-sm-2">--}}
{{--                                                    <button type="button" class="btn-choice btn btn-sm pull-left btn-round btn-wd-cus left-icon-holder" data-toggle="modal" data-target="#myModalachieve"> <i class="fa fa-trophy"></i> Record </button>--}} 
{{--                                            <div class="modal fade" id="myModalachieve" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">--}}
{{--                                                <div class="modal-dialog">--}}
{{--                                                    <div class="modal-content">--}}
{{--                                                        <div class="modal-header justify-content-center">--}}
{{--                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-remove"></i> </button>--}}
{{--                                                            <h5 class="title title-up"><a>Select details</a></h5> </div>--}}
{{--                                                        <div class="modal-body row">--}}
{{--                                                            <div class=" col-sm-6 select-wizard">--}}
{{--                                                                <label>Achievement Type</label>--}}
{{--                                                                <select class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" name="achievement_type" title="Select Billing Scgedule" id="achievement_type">--}}
{{--                                                                    <option value="" disabled selected>Achievement</option>--}}
{{--                                                                    <?php--}}

{{--                                                                                                        $Achievementsss = config('constants.Achievement')--}}
{{--                                                                                                        ?> @foreach($Achievementsss as $key=>$val)--}}
{{--                                                                        <option value="{{$key}}">{{$val}}</option> @endforeach </select>--}}
{{--                                                            </div>--}}
{{--                                                            <div class=" col-sm-6 select-wizard">--}}
{{--                                                                <label>Activities</label>--}}
{{--                                                                <select class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" name="activities_id" title="Select Billing Scgedule" id="activities_idachement">--}}
{{--                                                                    <option value="" disabled selected>Activity</option>--}}
{{--                                                                    <?php--}}

{{--                                                                                                        $AchievementActivities = config('constants.AchievementActivities')--}}
{{--                                                                                                        ?> @foreach($AchievementActivities as $key=>$val)--}}
{{--                                                                        <option value="{{$key}}">{{$val}}</option> @endforeach </select>--}}
{{--                                                            </div>--}}
{{--                                                            <div class=" col-12"></div>--}}
{{--                                                            <br>--}}
{{--                                                            <div class="form-group col-sm-12 ">--}}
{{--                                                                <label class="col-12">Details</label>--}}
{{--                                                                <input type="text" class="form-control " placeholder="Teacher Comments" name="comments" value="" id="comments"> </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="modal-footer">--}}
{{--                                                            <div class="">--}}
{{--                                                                <button type="submit" class="btn btn-success btn-round saveach">Save</button>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="divider"></div>--}}
{{--                                                            <div class="">--}}
{{--                                                                <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Cancel</button>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="row"> @if($attendance_of_class_section_students != Null) @php $studentList = []; @endphp @foreach($attendance_of_class_section_students as $student) @php $attuend =false; if(array_key_exists($student->id,$stlist)){ $studentList[$student->id]=$student->id; $attuend = true; } @endphp--}}
{{--                                                <div class="col-sm-2">--}}
{{--                                                    <div id="attendanceatt{{$student->id}}" class="card-image exampletwo col-cus-2 imgCheckboxachvi  author" data-id="{{$student->id}}"> <img class="card-img-top not-blur-img " src="{{$student->phot()}}" width="200px" height="120px" alt="Card image cap" /> 
{{--                                                        <div class="card-body pl-0">--}}
{{--                                                            <a href="">--}}
{{--                                                                <h6 class="title text-capitalize">{{preg_replace("/\s\s+/", " ", $student->name) }}  </h6> </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div> @endforeach @endif </div>--}}
{{--                                            <div class="card-footer">--}}
{{--                                                <div class="pull-right"> </div>--}}
{{--                                                <div class="row text-center">--}}
{{--                                                    <div class="col-sm-1 form-group typography-line">--}}
{{--                                                        <p class="category">&nbsp;</p>--}}
{{--                                                        <button class="col-sm-1 btn  btn-icon btn-round btn-choice btn select_achivement" id="" style="margin-bottom: 8px!important;"> <i class="fa fa-check"></i> </button>--}}
{{--                                                        <label class="">Select All</label>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-sm-1 typography-line">--}}
{{--                                                        <p class="category">&nbsp;</p>--}}
{{--                                                        <button data-id="" class="col-sm-1 btn  btn-icon btn-round saveach btn-choice btn  " style="margin-bottom: 8px!important;"> <i class="fa fa-save"></i> </button>--}}
{{--                                                        <br>--}}
{{--                                                        <label class="">Save</label>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-sm-6 typography-line"> </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="clearfix"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div> @else    --}}

{{--                                @endif --}}
{{--                                    --}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                </form>--}}


{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}
@endsection


@section('front_script')
    <script src="{{asset('js/teacher.js')}}"></script>

    
   
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <script src="{{asset('adminassets/js/imgCheckbox/jquery.imgcheckbox.js.download')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var f = $("header img").imgCheckbox({
                "styles": {
                    "span.imgCheckbox img": {
                        "border-radius": "6px"
                    },
                    "span.imgCheckbox.imgChked img": {
                        "transform": "scale(0.95)"
                    },
                    "span.imgCheckbox": {
                        "border": "1px solid #2ca01c;"
                    }
                },
                "checkMarkSize": "50px",
                "checkMarkImage": "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMCAtMzQ2LjM4NCkiPjxwYXRoIGQ9Ik0zMiAzNDYuMzg0YTMyIDMyIDAgMCAwLTMyIDMyIDMyIDMyIDAgMCAwIDMyIDMyIDMyIDMyIDAgMCAwIDMyLTMyIDMyIDMyIDAgMCAwLTMyLTMyem0yMS4yNTYgMTAuMzI3bC0yNC40NiA0MC44OTNMOS41IDM3NS4yMTNsMTcuNjkzIDkuNjA1IDI2LjA2LTI4LjEwN3oiIGZpbGw9IiNjODAwMDAiIGZpbGwtb3BhY2l0eT0iLjc4NCIvPjxwYXRoIGQ9Ik05LjUwMiAzNzUuMjEzbDE5LjI5NCAyMi4zOSAyNC40Ni00MC44OTMtMjYuMDYgMjguMTA3eiIgZmlsbD0iI2ZmZiIvPjwvZz48L3N2Zz4="
            });
            $(".exampleone img").imgCheckbox();
            $(".exampletwo img").imgCheckbox({
                "styles": {
                    "span.imgCheckbox.imgChked img": {
                        "filter": "blur(1px)",
                        "-webkit-filter": "blur(1px)",
                        "transform": "scale(0.9)"
                    }
                }
            });
            $(".exampleone").submit(function() {
                $("body").css({"opacity": 0}).animate({"opacity": 1}, "fast");
                $(".formoutput").text($(this).serialize());
                return false;
            })
            $(window).scroll(function() {
                if ($(this).scrollTop() > window.innerHeight -1){
                    $('#headermenu').addClass("scrollDown");
                }
                else{
                    $('#headermenu').removeClass("scrollDown");
                }
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            // Initialise Sweet Alert library
            demo.showSwal();
        });
    </script>

    <script src="{{asset('adminassets/js/imgCheckbox/skel.min.js.download')}}"></script>
    <script src="{{asset('adminassets/js/imgCheckbox/util.js.download')}}"></script>
 
    <script src="{{asset('adminassets/js/imgCheckbox/main.js.download')}}"></script>

    <script>
        $(document).ready(function() {
            // initialise Datetimepicker and Sliders
            demo.initDateTimePicker();
            if ($('.slider').length != 0) {
                demo.initSliders();
            }
        });
    </script>
    <script>
        var options = {
            content: function() {
                return $(this).parent().find('.popover-content').html();
            },
            html: true,
            placement: 'bottom',
        };
        var $popover = $('.container>.trigger').popover(options);

        // Open Popover
        var pax = [1,0];
        $('.container>.trigger').click(function(e) {
            e.stopPropagation();
            $('.popover-body input').each(function(i) {
                $(this).val(pax[i]);
            });
        });

        // Close Popover
        $(document).click(function(e) {
            if($(e.target).hasClass('dismiss')) {
                $('.container>.trigger').popover('hide');
            }
        });

        // On Close Store Values
        $popover.on('hide.bs.popover', function(e) {
            $('.popover-body input').each(function(i) {
                pax[i] = $(this).val();
            });
        });

        // Change Values on + & - Button Clicks
        $(document).on('click', '.number-spinner a', function() {
            var btn = $(this),
                input = btn.closest('.number-spinner').find('input'),
                oldValue = input.val().trim(),
                inputPax = $('#pax'),
                dataTotal = parseInt(inputPax.attr('data-total')),
                dataAdults = parseInt(inputPax.attr('data-adults')),
                dataChildren = parseInt(inputPax.attr('data-children'));

            if(btn.attr('data-dir') == 'up') {
                if(oldValue < input.attr('max')) {
                    oldValue++;

                    if(input.attr('id') === 'adult') {
                        dataAdults++
                        inputPax.attr('data-adults', dataAdults);
                        console.log('Adult added! The new adult total is: ' + dataAdults);
                    } else if(input.attr('id') === 'child') {
                        dataChildren++
                        inputPax.attr('data-children', dataChildren);
                        console.log('Child added! The new child total is: ' + dataChildren);
                    }
                }
            } else {
                if(oldValue > input.attr('min')) {
                    oldValue--;

                    if(input.attr('id') === 'adult') {
                        dataAdults--
                        inputPax.attr('data-adults', dataAdults);
                        console.log('Adult added! The new adult total is: ' + dataAdults);
                    } else if(input.attr('id') === 'child') {
                        dataChildren--
                        inputPax.attr('data-children', dataChildren);
                        console.log('Child added! The new child total is: ' + dataChildren);
                    }
                }
            }
            dataTotal = dataAdults + dataChildren;
            inputPax.attr('data-total', dataTotal);
            inputPax.attr('placeholder', 'Total: ' + dataTotal + ' • Adults: ' + dataAdults + ' • Children: ' + dataChildren);

            input.val(oldValue);
        });

        // Show Popover On Startup
        $('.container>.trigger').popover('show')

    </script>
    <script>
        $(function(){
            // Enables popover
            $("[data-toggle=popover]").popover();
        });

        $(document).ready(function() {
             
            @if($stlist)
                @foreach($studentList as $val)
                    
                    //$("#attendance_{{$val}} .imgCheckbox2").addClass('imgChked');
                        
                @endforeach
            @endif

        @if($bacar)
            @foreach($bacar as $key=>$val)
                
                //$("#attendance{{$key}} .imgCheckbox2").addClass('imgChked');
                    
            @endforeach
        @endif

        @if($achementar)
            @foreach($achementar as $key=>$val)
                //$("#attendanceatt{{$key}} .imgCheckbox2").addClass('imgChked');
            @endforeach
        @endif

        });
    </script>
@endsection
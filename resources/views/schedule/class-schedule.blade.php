@extends('layouts.master')
@section('title', 'Class schedule')
@section('content')
    <style>
        .add-div-error{
            color: red;
        }
    </style>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form id="RegisterValidation" action="#" method="">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Class Schedule</h4>
                        </div>
                        <div class="card-body">
                            <div class="row bor-sep">
                                <div class="form-group has-label col-sm-2">
                   <span>
                       List by
                       :
                   </span>
                                </div>
                                <form id="class-schedule-filter-form" method="" action=""> 
                                    <div class="form-group col-sm-3 select-wizard">
                                        <select class="selectpicker sel_filter_classSched" id="class-Sched-filter"  data-size="7" data-style="btn btn-secondary btn-round" title="Choose filter" >
                                            <option value="" disabled selected>Choose filter</option>
                                            <option value="class">Period</option>
                                            <option value="subject">Day</option>
                                        </select>
                                    </div>
                                </form>
                                <div class=" col-sm-7">
                                    @can('add-schedule')
                                    <button class="btn btn-secondary pull-right btn-round" data-toggle="modal" id="show-Class-Sched-modal-btn">
                                        Schedule class
                                    </button>
                                    @endcan
                                </div>
                                <!--<div class="category form-category">* Required fields</div>-->
                            </div>
                            <div class="modal fade" id="newclassSchedule" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-wide modal-xl">
                                    <div class="modal-content">
                                    <!-- <form action=""  id="add-class-schedule-form">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up">New class schedule</h5>
                                        </div>
                                        <div class="row modal-body">
                                            <h6 class="col-md-12">Schedule details</h6>
                                            <div class=" col-sm-3 select-wizard">
                                                <label>Class</label>
                                                <select class="selectpicker" name="class" data-size="7" data-style="btn btn-secondary btn-round" title="Choose Class" id="add-class-schedule-dropdown">
                                                    <option value=""  selected>Choose class</option>
                                                    @foreach($class_all_names as $class)
                                                    <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                    @endforeach
                                                </select>
                                               <div class="add-div-error class"></div>
                                            </div>
                                            <div class=" col-sm-3 select-wizard">
                                                <label>Section</label>
                                                <select class="selectpicker" name="class_section" data-size="7" data-style="btn btn-secondary btn-round" title="Select Section" id="select-class-section" >
                                                    <option value=""  selected>Choose Section</option>
{{--                                                    @foreach($class_sections as $class_sec)--}}
{{--                                                        <option value="{{$class_sec->c_section_Id}}">{{$class_sec->class_section_name}}</option>--}}
{{--                                                    @endforeach--}}

                                                </select>
                                                <div class="add-div-error class_section"></div>
                                            </div>

                                            <div class="form-group has-label col-sm-6">
                                                <label>
                                                </label>
                                                <button id="append-schdle" class="btn-icon btn btn-outline-choice btn-round pull-right "  type="button"  data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false" title="Add period">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="col-sm-12">
                                                <br>
                                                <hr>
                                            </div>
                                            <div class="col-md-12" id="modalrow">

                                            </div>

                                        </div>

                                        <!-- <div class="modal-footer">
                                            <div class="">
                                                <button type="submit" class="btn btn-round btn-success btn-link" id="add-class-schedule">Save</button>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="">
                                                <button type="button" class="btn btn-round btn-danger btn-link conf_msg">Cancel</button>
                                            </div>
                                        </div> -->
                                    </form> -->
                                    </div>
                                </div>
                            </div>
                            <!-- /////////////////////////// -->
                            <div class="modal fade" id="edit-classched-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-wide modal-xl">
                                    <div class="modal-content">
                                        
                                    <form action=""  id="edit-class-schedule-form">
                                        @csrf
                                        <input type="hidden" name="id" id="edit-classSched-id">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close closeScheduleEdit" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up">Change class schedule</h5>
                                        </div>
                                        <div class="row modal-body">
                                            <h6 class="col-md-12">Schedule details</h6>
                                            <div class=" col-sm-3 select-wizard">
                                                <label>Class</label>
                                                <select class="selectpicker edit-timetable-class" name="class" data-size="7" data-style="btn btn-secondary btn-round" title="Choose Class" >
                                                    <option value="" disabled selected>Choose class</option>
                                                    @foreach($class_all_names as $class)
                                                        <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="edit-div-error class"></div>
                                            </div>
                                            <div class=" col-sm-3 select-wizard">
                                                <label>Section</label>
                                                <select class="selectpicker edit-timetable-sec" name="classSection" data-size="7" data-style="btn btn-secondary btn-round" title="Choose Class" >
                                                    <option value="" disabled selected>Choose Section</option>
                                                    @foreach($class_sections as $class_sec)
                                                        <option value="{{$class_sec->c_section_Id}}">{{$class_sec->class_section_name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="edit-div-error classSection"></div>
                                            </div>
                                            <div class="form-group has-label col-sm-6">
                                                <label>
                                                </label>
                                                <button onclick="myFunction1()" class="btn-icon btn btn-outline-choice btn-round pull-right "  type="button"  data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false" title="Add period">
                                                    <i class="fa fa-plus"></i>
                                                </button>

                                            </div>
                                            <div class="col-sm-12">
                                                <br>
                                                <hr>
                                            </div>
                                            <div class="col-sm-12" id="edit-modalrow">
                                                <div class="row" id="edit-appendrow" >

                                                    <div class="col-sm-2 select-wizard">
                                                        <label class="col-sm-12">Days</label>
                                                        <select multiple class="selectpicker select-insert edit-timetable-days" name="days[]" data-size="5" id="number-multiple" data-style="btn btn-round btn-secondary" data-container="" data-live-search="false" title="Choose days" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                                            <option value="" disabled>Choose days</option>
                                                            <option value="Monday">Monday</option>
                                                            <option value="Tuesday">Tuesday</option>
                                                            <option value="Wednesday">Wednesday</option>
                                                            <option value="Thursday">Thursday</option>
                                                            <option value="Friday">Friday</option>
                                                            <option value="Saturday">Saturday</option>
                                                        </select>
                                                        <div class="edit-div-error days"></div>
                                                    </div>
                                                    <div class="form-group has-label col-sm-1">
                                                        <label>
                                                            Period
                                                        </label>
                                                        <select class="selectpicker select-insert edit-timetable-periods" data-size="7" name="periods[]" data-style="btn btn-secondary btn-round" title="Choose Period" >
                                                            <option value="" disabled selected>Choose Period</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="Break">Break</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                        </select>
                                                        <div class="edit-div-error periods"></div>
                                                    </div>
                                                    <div class="form-group col-sm-2">
                                                        <label>Start time</label>
                                                        <input type="time" class="form-control date-start-time" placeholder="" name="start_time[]" >
                                                        <div class="edit-div-error start_time"></div>
                                                    </div>
                                                    <div class="form-group has-label col-sm-2">
                                                        <label>
                                                            End time
                                                        </label>
                                                        <input type="time" class="form-control date-end-time" placeholder="" name="end_time[]" >
                                                        <div class="edit-div-error end_time"></div>
                                                    </div>
                                                    <div class="form-group has-label col-sm-2">
                                                        <label>
                                                            Subject
                                                        </label>
                                                        <select class="selectpicker select-insert edit-timetable-subject" name="subjects[]" data-size="7" data-style="btn btn-round btn-secondary" title="Select Blood Group" >
                                                            <option value="" disabled selected>Choose subject</option>
                                                            @foreach($subjects as $subject)
                                                                <option value="{{$subject->subject}}">{{$subject->subject}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="edit-div-error subjects"></div>
                                                    </div>
                                                    <div class="form-group has-label col-sm-2 teacher">
                                                        <label>
                                                            Teacher
                                                        </label>
                                                        <div class="select-insert">
                                                        <select class="selectpicker edit-timetable-teacher schedule-teacher" name="teachers[]" data-size="7" data-style="btn btn-round btn-secondary" title="Select Blood Group" >
                                                            <option value="" disabled selected>Choose teacher</option>
                                                            @foreach($teachers as $teacher)
                                                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="edit-div-error teachers"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <label class="action_text">Action</label>
                                                        <button class="btn-icon btn-link btn btn-round btn-danger edit-remove-class-schedule-row"  style="visibility: hidden"  title="Remove module" value="Remove Row"  type="button" id="" data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <div class="">
                                                <button type="submit" class="btn btn-round btn-success btn-link" id="update-class-schedule">Update</button>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="">
                                                <button type="button" class="btn btn-round btn-danger btn-link" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal fade " id="viewteacherclassshedule" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up">Weekly schedule</h5>
                                        </div>
                                        <div class=" modal-body">
                                            <div class="row">
                                                <div class="card-title">

                                                </div>
                                                <div class="card-body ">

                                                    <div class="nav-tabs-navigation nav-tabs-left">
                                                        <div class="nav-tabs-wrapper">
                                                            <ul class="nav nav-tabs m-tabs-line m-tabs-line--success m-tabs-line--2x " role="tablist">
                                                                <li class="nav-item ">
                                                                    <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#Monday" role="tab" aria-selected="true">
                                                                        Monday </a>
                                                                </li>
                                                                </li>
                                                                <li class="nav-item ">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#Tuesday" role="tab" aria-selected="false">
                                                                        Tuesday </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#Wednesday" role="tab" aria-selected="false">
                                                                        Wednesday </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#Thursday" role="tab" aria-selected="false">
                                                                        Thursday </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#Friday" role="tab" aria-selected="false">
                                                                        Friday </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#Saturday" role="tab" aria-selected="false">
                                                                        Saturday </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="tab-content">
                                                        <div class="tab-pane active show" id="Monday" role="tabpanel">
                                                            <table id="table-monday" class="table table-striped class_sched_table m-table m-table--head-bg-success m-table--border-dark">
                                                                <thead>
                                                                <tr class="table-metal">
                                                                    <th>days</th>
                                                                    <th>Period</th>
                                                                    <th>Subject</th>
                                                                    <th>Class</th>
                                                                    <th>Time</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="Tuesday" role="tabpanel">
                                                            <table id="table-tuesday" class="table class_sched_table table-striped m-table m-table--head-bg-success m-table--border-dark">
                                                                <thead>
                                                                <tr class="table-metal">
                                                                    <th>days</th>
                                                                    <th>Period</th>
                                                                    <th>Subject</th>
                                                                    <th>Class</th>
                                                                    <th>Time</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="Wednesday" role="tabpanel">
                                                            <table id="table-wednesday" class="table table-striped m-table m-table--head-bg-success m-table--border-dark">
                                                                <thead>
                                                                <tr class="table-metal">
                                                                    <th>Days</th>
                                                                    <th>Period</th>
                                                                    <th>Subject</th>
                                                                    <th>Class</th>
                                                                    <th>Time</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>URDU</td>
                                                                    <td>VII-A</td>
                                                                    <td>08:40 - 09:20</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>URDU</td>
                                                                    <td>VII-B</td>
                                                                    <td>09:20 - 10:00</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">3</th>
                                                                    <td>URDU</td>
                                                                    <td>V-A</td>
                                                                    <td>10:00 - 10:40</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">4</th>
                                                                    <td>URDU</td>
                                                                    <td>VIII-A</td>
                                                                    <td>11:40 - 12:20</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="Thursday" role="tabpanel">
                                                            <table id="table-thursday" class="table table-striped m-table m-table--head-bg-success m-table--border-dark">
                                                                <thead>
                                                                <tr class="table-metal">
                                                                    <th>Days</th>
                                                                    <th>Period</th>
                                                                    <th>Subject</th>
                                                                    <th>Class</th>
                                                                    <th>Time</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>URDU</td>
                                                                    <td>VI-A</td>
                                                                    <td>08:40 - 09:20</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">4</th>
                                                                    <td>URDU</td>
                                                                    <td>VIII-B</td>
                                                                    <td>09:20 - 10:00</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">5</th>
                                                                    <td>URDU</td>
                                                                    <td>VI-A</td>
                                                                    <td>10:00 - 10:40</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">7</th>
                                                                    <td>URDU</td>
                                                                    <td>IV-C</td>
                                                                    <td>11:40 - 12:20</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="Friday" role="tabpanel">
                                                            <table id="table-friday" class="table table-striped m-table m-table--head-bg-success m-table--border-dark">
                                                                <thead>
                                                                <tr class="table-metal">
                                                                    <th>Days</th>
                                                                    <th>Period</th>
                                                                    <th>Subject</th>
                                                                    <th>Class</th>
                                                                    <th>Time</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>URDU</td>
                                                                    <td>VI-A</td>
                                                                    <td>08:40 - 09:20</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>URDU</td>
                                                                    <td>VIII-B</td>
                                                                    <td>09:20 - 10:00</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">3</th>
                                                                    <td>URDU</td>
                                                                    <td>VI-A</td>
                                                                    <td>10:00 - 10:40</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">4</th>
                                                                    <td>URDU</td>
                                                                    <td>IV-C</td>
                                                                    <td>11:40 - 12:20</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="Saturday" role="tabpanel">
                                                            <table id="table-saturday" class="table table-striped m-table m-table--head-bg-success m-table--border-dark">
                                                                <thead>
                                                                <tr class="table-metal">
                                                                    <th>Days</th>
                                                                    <th>Period</th>
                                                                    <th>Subject</th>
                                                                    <th>Class</th>
                                                                    <th>Time</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>URDU</td>
                                                                    <td>VII-A</td>
                                                                    <td>08:40 - 09:20</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>URDU</td>
                                                                    <td>VII-B</td>
                                                                    <td>09:20 - 10:00</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">3</th>
                                                                    <td>URDU</td>
                                                                    <td>V-A</td>
                                                                    <td>10:00 - 10:40</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">4</th>
                                                                    <td>URDU</td>
                                                                    <td>VIII-A</td>
                                                                    <td>11:40 - 12:20</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <div class="">
                                                <button type="button" class="btn btn-round btn-danger btn-link" data-dismiss="modal" >Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="viewclassschedule" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up">Prep weekly schedule</h5>
                                        </div>
                                        <div class=" modal-body">
                                            <div class="row">
                                                <div class="card-title">

                                                </div>
                                                <div class="card-body ">

                                                    <div class="nav-tabs-navigation nav-tabs-left">
                                                        <div class="nav-tabs-wrapper">
                                                            <ul class="nav nav-tabs m-tabs-line m-tabs-line--success m-tabs-line--2x " role="tablist">
                                                                <li class="nav-item ">
                                                                    <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#period1" role="tab" aria-selected="true">
                                                                        Period 1 </a>
                                                                </li>
                                                                <li class="nav-item ">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#period2" role="tab" aria-selected="false">
                                                                        Period 2 </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#period3" role="tab" aria-selected="false">
                                                                        Period 3 </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#period4" role="tab" aria-selected="false">
                                                                        Period 4 </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#period5" role="tab" aria-selected="false">
                                                                        Period 5 </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#period6" role="tab" aria-selected="false">
                                                                        Period 6 </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#period7" role="tab" aria-selected="false">
                                                                        Period 7 </a>
                                                                </li>
                                                                <li class="nav-item m-tabs__item">
                                                                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#period8" role="tab" aria-selected="false">
                                                                        Period 8 </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="tab-content">
                                                        <div class="tab-pane active show" id="period1" role="tabpanel">
                                                            <table id="classPeroid1"  class="table table-striped m-table m-table--head-bg-success m-table--border-dark">
                                                                <thead>
                                                                <tr class="table-metal">
                                                                    <th>Day</th>
                                                                    <th>Period</th>
                                                                    <th>Subject</th>
                                                                    <th>Teacher</th>
                                                                    <th>Time</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
{{--                                                                <tr>--}}
{{--                                                                    <th scope="row">Monday</th>--}}
{{--                                                                    <td>URDU</td>--}}
{{--                                                                    <td>Ahmed</td>--}}
{{--                                                                    <td>08:10 - 08:50</td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <th scope="row">Tuesday</th>--}}
{{--                                                                    <td>URDU</td>--}}
{{--                                                                    <td>Ahmed</td>--}}
{{--                                                                    <td>08:10 - 08:50</td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <th scope="row">Wednesday</th>--}}
{{--                                                                    <td>URDU</td>--}}
{{--                                                                    <td>Ahmed</td>--}}
{{--                                                                    <td>08:10 - 08:50</td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <th scope="row">Thursday</th>--}}
{{--                                                                    <td>English</td>--}}
{{--                                                                    <td>Muhammad Ali</td>--}}
{{--                                                                    <td>08:10 - 08:50</td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <th scope="row">Friday</th>--}}
{{--                                                                    <td>English</td>--}}
{{--                                                                    <td>Muhammad Ali</td>--}}
{{--                                                                    <td>08:10 - 08:40</td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <th scope="row">Satuday</th>--}}
{{--                                                                    <td>English</td>--}}
{{--                                                                    <td>Muhammad Ali</td>--}}
{{--                                                                    <td>08:10 - 08:50</td>--}}
{{--                                                                </tr>--}}
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="period2" role="tabpanel">
                                                            <table id="classPeroid2" class="table table-striped m-table m-table--head-bg-success m-table--border-dark">
                                                                <thead>
                                                                <tr class="table-metal">
                                                                    <th>Day</th>
                                                                    <th>Period</th>
                                                                    <th>Subject</th>
                                                                    <th>Teacher</th>
                                                                    <th>Time</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="period3" role="tabpanel">
                                                            <table id="classPeroid3" class="table table-striped m-table m-table--head-bg-success m-table--border-dark">
                                                                <thead>
                                                                <tr class="table-metal">
                                                                    <th>Day</th>
                                                                    <th>Period</th>
                                                                    <th>Subject</th>
                                                                    <th>Teacher</th>
                                                                    <th>Time</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="period4" role="tabpanel">
                                                            <table id="classPeroid4" class="table table-striped m-table m-table--head-bg-success m-table--border-dark">
                                                                <thead>
                                                                <tr class="table-metal">
                                                                    <th>Day</th>
                                                                    <th>Period</th>
                                                                    <th>Subject</th>
                                                                    <th>Teacher</th>
                                                                    <th>Time</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="period5" role="tabpanel">
                                                            <table id="classPeroid5" class="table table-striped m-table m-table--head-bg-success m-table--border-dark">
                                                                <thead>
                                                                <tr class="table-metal">
                                                                    <th>Day</th>
                                                                    <th>Period</th>
                                                                    <th>Subject</th>
                                                                    <th>Teacher</th>
                                                                    <th>Time</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="period6" role="tabpanel">
                                                            <table id="classPeroid6" class="table table-striped m-table m-table--head-bg-success m-table--border-dark">
                                                                <thead>
                                                                <tr class="table-metal">
                                                                    <th>Day</th>
                                                                    <th>Period</th>
                                                                    <th>Subject</th>
                                                                    <th>Teacher</th>
                                                                    <th>Time</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="period7" role="tabpanel">
                                                            <table id="classPeroid7" class="table table-striped m-table m-table--head-bg-success m-table--border-dark">
                                                                <thead>
                                                                <tr class="table-metal">
                                                                    <th>Day</th>
                                                                    <th>Period</th>
                                                                    <th>Subject</th>
                                                                    <th>Teacher</th>
                                                                    <th>Time</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="period8" role="tabpanel">
                                                            <table id="classPeroid8" class="table table-striped m-table m-table--head-bg-success m-table--border-dark">
                                                                <thead>
                                                                <tr class="table-metal">
                                                                    <th>Day</th>
                                                                    <th>Period</th>
                                                                    <th>Subject</th>
                                                                    <th>Teacher</th>
                                                                    <th>Time</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <div class="">
                                                <button type="button" class="btn btn-round btn-danger btn-link" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="card-header">
                                            <h6 class="card-title">Schedule List</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="toolbar">
                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                            </div>
                                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Class</th>
                                                    <th>Section</th>
                                                    <th>Day</th>
                                                    <th>Period</th>
                                                    <th>Starts</th>
                                                    <th>Ends</th>
                                                    <th>Subject</th>
                                                    <th>Teacher</th>
                                                    <th class="disabled-sorting">Actions</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Class</th>
                                                    <th>Section</th>
                                                    <th>Day</th>
                                                    <th>Period</th>
                                                    <th>Starts</th>
                                                    <th>Ends</th>
                                                    <th>Subject</th>
                                                    <th>Teacher</th>
                                                    <th class="disabled-sorting">Actions</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
 

                                                   

                                                    @php
                                                        $i= 1 ;
                                                        
                                                    @endphp

                                                    @foreach($class_schedule as $schedule)

                                                        
                                                        @if($schedule->schedule->count())

                                                       
                                                       @php
                                                       $count = count($schedule->schedule);
                                                       $j=1;

                                                       $DAYS = '\n';
                                                       
                                                       $period='\n';
                                                       
                                                       $time_start = '\n';

                                                       $time_end = '\n';

                                                       $subjects = '\n';
                                                       
                                                       $teachers= '\n';

                                                       foreach($schedule->schedule as $scheduless){



                                                       $DAYS .= json_decode(json_encode($scheduless->day),TRUE);

                                                         

                                                        $period .=  json_decode($scheduless->period).".\n";
                                                        
                                                        $time_start .= $scheduless->time_start.".\n";
                                                        
                                                        $time_end .=  $scheduless->time_end.".\n";
                                                        
                                                        $subjects .= $scheduless->subject->subject.".\n";
                                                        
                                                        $teachers .= $scheduless->user->name.".\n";
                                                        

                                                        if($j<$count){
                                                            $DAYS .="";

                                                            $period .="";
                                                            $time_start .="";
                                                             //dd($time_start);
                                                            $time_end .="";
                                                            $subjects .="";
                                                            $teachers .="";
                                                            
                                                        }


                                                        $j++;
                                                        
                                                       }


                                                        @endphp

                                                        <tr>
                                                            <td>{{$schedule->c_section_Id}}</td>  
                                                            <td>{{$schedule->class->class}}</td>  
                                                            <td>{{$schedule->class_section_name}}</td>  
                                                            
                                                            <td>
                                                            {{$DAYS}}
                                                            </td>

                                                            <td>
                                                            {{$period}}
                                                            </td>


                                                            <td>
                                                            {{$time_start}}
                                                            </td>

                                                            <td>
                                                                {{$time_end}}
                                                            </td>
                                                            <td>
                                                            {{$subjects}}
                                                            </td>

                                                            <td>
                                                            {{$teachers}}
                                                            </td>
                                                            
                                     
                                                            
                                                            <td class="text-center">
                                                                <div class="form-inline">
                                                                    @can('view-schedule')
                                                                    <div class="">
                                                                        <a href="#">
                                                                            <button class="btn-link btn-cus-weight show-view-class_sched-btn"  type="button" data-id="{{$schedule->ttable_Id}}" data-toggle="modal" data-target="#viewteacherclassshedule" aria-haspopup="true" aria-expanded="false">
                                                                                View
                                                                            </button>
                                                                        </a>

                                                                    </div>
                                                                    @endcan
                                                                    @canany(['edit-schedule', 'delete-schedule'])
                                                                    <div class="nav-item btn-rotate dropdown pull-right ">
                                                                        <a class="nav-link dropdown-toggle pull-right" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                                            @can('edit-schedule')
                                                                            <a class="dropdown-item editClassSched" href="#" data-toggle="modal"  data-id="{{$schedule->ttable_Id}}" aria-haspopup="true" aria-expanded="false">Edit</a>
                                                                            @endcan
                                                                            @can('delete-schedule')
                                                                            <a class="dropdown-item" onclick="deleteClassSched({{$schedule->ttable_Id}});" data-id="" href="#">Delete</a>
                                                                            @endcan
                                                                        </div>
                                                                    </div>
                                                                    @endcanany
                                                                </div>
                                                            </td>
                                                        </tr>
                                                          
                                                         @endif
                                                    @endforeach

                                              
                                                </tbody>

                                            </table>
                                        </div><!-- end content-->
                                    </div><!--  end card  -->
                                </div> <!-- end col-md-12 -->
                            </div> <!-- end row -->

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>
    // $('#class_schedule-list').DataTable({
    //     "pagingType": "full_numbers",
    //     "lengthMenu": [
    //         [10, 25, 50, -1],
    //         [10, 25, 50, "All"]
    //     ],
    //     responsive: true,
    //     language: {
    //         search: "_INPUT_",
    //         searchPlaceholder: "Search",
    //     }
    // });
</script>
@endsection

@section('front_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('front_script')
    <script src="{{asset('js/schedule_script.js')}}"></script>
    <script>
        $('#daysselect').selectpicker();
    </script>
@endsection

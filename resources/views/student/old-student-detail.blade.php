@extends('layouts.master')
@section('title', 'Admission')
@section('content')
<div class="content row">
    <div class="col-sm-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-secondary  mb-3 widget-chart text-white card-sizes div-hover-cus" id="attendance" >
                    <div class="card-body icon-wrapper rounded-circle ">
                        <h6>Attendance</h6>
                        <div class="icon-wrapper-bg   vert-hor-center">
                            <i class="fa fa-calendar-check-o fa-lg float-right text-white "></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card bg-secondary  mb-3 widget-chart text-white card-sizes div-hover-cus" id="achievement">
                    <div class="card-body icon-wrapper rounded-circle">
                        <h6>Achievement</h6>
                        <div class="icon-wrapper-bg  vert-hor-center">
                            <i class="fa fa-thumbs-o-up fa-lg float-right text-white "></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card bg-secondary  mb-3 widget-chart text-white card-sizes div-hover-cus" id="exams">
                    <div class="card-body icon-wrapper rounded-circle ">
                        <h6>Examination</h6>
                        <div class="icon-wrapper-bg  vert-hor-center">
                            <i class="fa fa-star-half-o fa-lg float-right text-white "></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card bg-secondary  mb-3 widget-chart text-white card-sizes div-hover-cus" id="schedule">
                    <div class="card-body icon-wrapper rounded-circle">
                        <h6>Timetable</h6>
                        <div class="icon-wrapper-bg  vert-hor-center">
                            <i class="fa fa-calendar fa-lg float-right text-white "></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card bg-secondary  mb-3 widget-chart text-white card-sizes div-hover-cus">
                    <div class="card-body icon-wrapper rounded-circle ">
                        <h6>Homework</h6>
                        <div class="icon-wrapper-bg  vert-hor-center">
                            <i class="fa fa-clipboard fa-lg float-right text-white "></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card bg-secondary  mb-3 widget-chart text-white card-sizes div-hover-cus">
                    <div class="card-body icon-wrapper ">
                        <h6>Reports</h6>
                        <div class="icon-wrapper-bg  vert-hor-center">
                            <i class="fa fa-files-o fa-lg float-right text-white "></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card bg-secondary mb-3 widget-chart text-white card-sizes div-hover-cus">
                    <div class="card-body icon-wrapper rounded-circle ">
                        <h6>Payments</h6>
                        <div class="icon-wrapper-bg  vert-hor-center">
                            <i class="fa fa-money fa-lg float-right text-white "></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card bg-secondary  mb-3 widget-chart text-white card-sizes div-hover-cus">
                    <div class="card-body icon-wrapper rounded-circle">
                        <h6>Activities</h6>
                        <div class="icon-wrapper-bg  vert-hor-center">
                            <i class="fa fa-tasks fa-lg float-right text-white "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-10">
        <div class="row">
            <div class="col-sm-12 mx-auto" id="attendanceinfo" style="display: none">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul id="tabs" class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">Attendance report</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="my-tab-content" class="tab-content text-center">
                                    <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
                                        <div class="row bor-sep ">
                                            <h6>Attendance</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mx-auto" id="achievementinfo" style="display: none">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul id="tabs" class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">Achievements report</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="achtab" class="tab-content text-center">
                                    <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
                                        <div class="row bor-sep ">
                                            <h6>Achievements</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mx-auto" id="examsinfo" style="display: none">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="nav-tabs-navigation nav-tabs-left">
                                    <div class="nav-tabs-wrapper">
                                        <ul id="tabs" class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#viewsyllabus" role="tab" aria-expanded="false">View Syllabus</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab" href="#viewexamsresult" role="tab" aria-expanded="true">Results</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="my-tab-content" class="tab-content ">
                                    <div class="tab-pane " id="viewexamsresult" role="tabpanel" aria-expanded="true">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <form id="RegisterValidation" action="#" method="">
                                                    <div class=" ">
                                                        <div class="card-body">
                                                            <!--                                                            <div class="row bor-sep">-->
                                                            <!--                                                                <div class="form-group has-label col-sm-2">-->
                                                            <!--                   <span>-->
                                                            <!--                       List by-->
                                                            <!--                       :-->
                                                            <!--                   </span>-->
                                                            <!--                                                                </div>-->
                                                            <!--                                                                <div class="form-group col-sm-3 select-wizard">-->
                                                            <!--                                                                    <select class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" title="Select Section" required="true">-->
                                                            <!--                                                                        <option value="" disabled selected>Select exam</option>-->
                                                            <!--                                                                        <option value="1">1st checkpoint</option>-->
                                                            <!--                                                                        <option value="2">Mid termvo</option>-->
                                                            <!--                                                                        <option value="3">2nd checkpoint</option>-->
                                                            <!--                                                                    </select>-->
                                                            <!--                                                                </div>-->
                                                            <!--                                                            </div>-->
                                                            <div class="modal fade" style="overflow: scroll;  white-space: nowrap;" id="markexam" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" >
                                                                <div class="modal-dialog modal-full modal-sm">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header justify-content-center">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <i class="fa fa-remove"></i>
                                                                            </button>
                                                                            <h5 class="title title-up">Mark sheet</h5>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="toolbar">
                                                                                <div class="col-sm-12 float-right">
                                                                                    <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-print fa-lg"  title="Print" data-toggle=""></i></button>
                                                                                    <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-download fa-lg" title="Download" data-toggle=""></i></button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="" data-toggle="" data-target="#" aria-expanded="true">
                                                                                    <div class="m-portlet__head-caption">
                                                                                        <div class="m-portlet__head-title">

                                                                                            <p class="">Exam: <b> 1st Checkpoint</b></p>
                                                                                            <p>Date: 22-03-2021<b> to</b>  30-03-2021</p>
                                                                                            <p>Name: <b> Ahmed Ali</b> </p>
                                                                                            <p>Class: <b> Eight</b> - Green</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-sm-12">
                                                                                    <table class="table table-bordered table-hover table-full-width">
                                                                                        <tbody>
                                                                                        <tr class="table-active">
                                                                                            <th class="">S.#</th>
                                                                                            <th>Subject</th>
                                                                                            <th>Theory</th>
                                                                                            <th>Practical</th>
                                                                                            <th>Reading</th>
                                                                                            <th>Listening</th>
                                                                                            <th>Notebook</th>
                                                                                            <th>Total</th>
                                                                                            <th>Obtained</th>
                                                                                            <th>%age</th>
                                                                                            <th>Comments</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="">1</td>
                                                                                            <td>Math</td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="92" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="5" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="total_marks[77][140]" name="obtained_marks[77][140]" value="105" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="97" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>

                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="92.3" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>

                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="Outstanding" style=""></td>

                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>2</td>
                                                                                            <td>English</td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="23" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="20" style=""></td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="17" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="22" style=""></td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="4" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="total_marks[77][140]" name="obtained_marks[77][140]" value="105" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="86" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>

                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="81.9" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="Very good" style=""></td>

                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>3</td>
                                                                                            <td>Urdu</td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="total_marks[77][140]" name="obtained_marks[77][140]" value="105" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>

                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>4</td>
                                                                                            <td>Biology</td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="total_marks[77][140]" name="obtained_marks[77][140]" value="105" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>

                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>5</td>
                                                                                            <td>Chemistry</td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="total_marks[77][140]" name="obtained_marks[77][140]" value="105" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>

                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>6</td>
                                                                                            <td>Physics</td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="total_marks[77][140]" name="obtained_marks[77][140]" value="105" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>

                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td>7</td>
                                                                                            <td>Islamic studies</td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="total_marks[77][140]" name="obtained_marks[77][140]" value="105" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>

                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>8</td>
                                                                                            <td>Pakistan studies</td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="total_marks[77][140]" name="obtained_marks[77][140]" value="105" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <input type="text" class="form-control marks" id="obtained_marks[77][140]" name="obtained_marks[77][140]" value="" style=""> <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                            </td>
                                                                                            <td><input type="text" class="form-control comments" id="comments[77][140]" name="comments[77][140]" value="" style=""></td>

                                                                                        </tr>
                                                                                        </tbody></table>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <!--</div>-->
                                                                        <div class="modal-footer">
                                                                            <div class="">
                                                                                <button type="button" class="btn btn-danger btn-round btn-link">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="">
                                                                    <div class="card-header">
                                                                        <h6 class="card-title">Examinations List</h6>
                                                                    </div>
                                                                    <div class="toolbar">
                                                                        <div class="">
                                                                            <div class="form-group col-sm-2 select-wizard">
                                                                                <select class="selectpicker" data-size="7" data-style="btn btn-sm btn-outline-secondary btn-round" title="Filter" >
                                                                                    <option value="1">Weekly</option>
                                                                                    <option value="2">Monthly</option>
                                                                                    <option value="4">Terminals</option>
                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <table id="examinationstable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>S.No</th>
                                                                                <th>Exam name</th>
                                                                                <th>Exam Type</th>
                                                                                <th>Status</th>
                                                                                <th class="disabled-sorting text-center">Actions</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tfoot>
                                                                            <tr>
                                                                                <th>S.No</th>
                                                                                <th>Exam name</th>
                                                                                <th>Exam Type</th>>
                                                                                <th>Status</th>
                                                                                <th class="disabled-sorting text-center">Actions</th>
                                                                            </tr>
                                                                            </tfoot>
                                                                            <tbody>
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td>1st checkpoint</td>
                                                                                <td>Monthly assesment</td>
                                                                                <td>Marked</td>
                                                                                <td class="">
                                                                                    <div class="">
                                                                                        <div class="align-content-center">
                                                                                            <button class=" btn-link btn-cus-weight btn-block " type="button" id="" data-target="#markexam" data-toggle="modal" aria-haspopup="true" aria-expanded="false">
                                                                                                View marksheet
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td>Mid term</td>
                                                                                <td>terminal assesment</td>
                                                                                <td>Unmarked</td>
                                                                                <td class="">
                                                                                    <div class="">
                                                                                        <div class="align-content-center">
                                                                                            <button class=" btn-link btn-cus-weight btn-block " type="button" id="" data-target="#markexam" data-toggle="modal" aria-haspopup="true" aria-expanded="false">
                                                                                                View marksheet
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>

                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div><!-- end content-->
                                                                </div><!--  end card  -->
                                                            </div> <!-- end col-md-12 -->
                                                        </div> <!-- end row -->

                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane active" id="viewsyllabus" role="tabpanel" aria-expanded="false">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="">
                                                    <div class="">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="">
                                                                    <div class="card-header">
                                                                        <h6 class="card-title">Syllabus List</h6>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="toolbar">
                                                                            <div class="row">
                                                                                <div class="form-group col-sm-2 select-wizard">
                                                                                    <select class="selectpicker" data-size="7" data-style="btn btn-sm btn-outline-secondary btn-round" title="Filter" >
                                                                                        <option value="1">Scheduled</option>
                                                                                        <option value="2">Completed</option>
                                                                                        <option value="4">All</option>
                                                                                    </select>
                                                                                </div>

                                                                            </div>
                                                                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                                        </div>
                                                                        <table id="viewsyllabustable" class="table-desi table table-striped table-bordered" cellspacing="0" width="100%">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>S.No</th>
                                                                                <th>Exam name</th>
                                                                                <th>Class</th>
                                                                                <th>Subject</th>
                                                                                <th>File</th>


                                                                                <th class="disabled-sorting text-center">Actions</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tfoot>
                                                                            <tr>
                                                                                <th>S.No</th>
                                                                                <th>Exam name</th>
                                                                                <th>Class</th>
                                                                                <th>Subject</th>
                                                                                <th>File</th>

                                                                                <th class="disabled-sorting text-center">Actions</th>
                                                                            </tr>
                                                                            </tfoot>
                                                                            <tbody>
                                                                            <tr>

                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td class="">
                                                                                    <div class=" text-center">
                                                                                        <div class="align-content-center">
                                                                                            <button class=" btn-link btn-cus-weight btn-block " type="button" id="" data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">
                                                                                                View
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>

                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div><!-- end content-->
                                                                </div><!--  end card  -->
                                                            </div> <!-- end col-md-12 -->
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mx-auto" id="clsschinfo" style="display: none">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class=" card-body">
                                <div class="card-header">
                                    <h4>Class Seven Timetable</h4>
                                </div>
                                <div class="col-sm-10 float-right">
                                    <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-print fa-lg" title="Print" data-toggle=""></i></button>
                                    <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-download fa-lg" title="Download" data-toggle=""></i></button>
                                </div>
                                <table class="table table-bordered table-striped  m-table m-table--border-metal m-table--head-bg-metal">
                                    <thead class="text-center">
                                    <tr>
                                        <th style="width: 5%;">Period/Day</th>
                                        <th style="width: 19%;">Monday</th>
                                        <th style="width: 19%;">Tuesday</th>
                                        <th style="width: 19%;">Wednesday</th>
                                        <th style="width: 19%;">Thursday</th>
                                        <th style="width: 19%;">Friday</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong>1</strong></div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Zafar</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Muhammad Ali</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Sibtain</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Zafar</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Kashif</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong>2</strong></div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Sibtain</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Zafar</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Kashif</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Muhammad Ali</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Muhammad Ali</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong>3</strong></div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Muhammad Ali</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Sibtain</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Zafar</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Kashif</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Muhammad Ali</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong>4</strong></div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Muhammad Ali</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Sibtain</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Zafar</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Kashif</div>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Muhammad Ali</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong>5</strong></div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Muhammad Ali</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Sibtain</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Zafar</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Kashif</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Kashif</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong>6</strong></div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Muhammad Ali</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Sibtain</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Zafar</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Kashif</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Kashif</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong>7</strong></div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Muhammad Ali</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Sibtain</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Zafar</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center">08:00 - 08:40</div><div class="text-center mt-1"> <strong>URDU</strong></div><div class="text-center mt-1">Kashif</div>
                                        </td>
                                        <td class="font text-center"><div class="text-center"></div><div class="text-center mt-1"> <strong></strong></div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('front_script')
    <script>
        $(document).ready(function() {


            $('#facebook').sharrre({
                share: {
                    facebook: true
                },
                enableHover: false,
                enableTracking: false,
                enableCounter: false,
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('facebook');
                },
                template: '<i class="fab fa-facebook-f"></i> Facebook',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });

            $('#google').sharrre({
                share: {
                    googlePlus: true
                },
                enableCounter: false,
                enableHover: false,
                enableTracking: true,
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('googlePlus');
                },
                template: '<i class="fab fa-google-plus"></i> Google',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });

            $('#twitter').sharrre({
                share: {
                    twitter: true
                },
                enableHover: false,
                enableTracking: false,
                enableCounter: false,
                buttons: {
                    twitter: {
                        via: 'CreativeTim'
                    }
                },
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('twitter');
                },
                template: '<i class="fab fa-twitter"></i> Twitter',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });



            // Facebook Pixel Code Don't Delete
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window,
                document, 'script', '../../../../connect.facebook.net/en_US/fbevents.js');

            try {
                fbq('init', '111649226022273');
                fbq('track', "PageView");

            } catch (err) {
                console.log('Facebook Track Error:', err);
            }

        });
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
    </noscript>
    <script>
        $(document).ready(function() {

            $sidebar = $('.sidebar');
            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');
            sidebar_mini_active = false;

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            // if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
            //     if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
            //         $('.fixed-plugin .dropdown').addClass('show');
            //     }
            //
            // }

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-active-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('data-active-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-active-color', new_color);
                }
            });

            $('.fixed-plugin .background-color span').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });


            $('.switch-mini input').on("switchChange.bootstrapSwitch", function() {
                $body = $('body');

                $input = $(this);

                if (paperDashboard.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    paperDashboard.misc.sidebar_mini_active = false;
                } else {
                    $('body').addClass('sidebar-mini');
                    paperDashboard.misc.sidebar_mini_active = true;
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });

        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialise the wizard
            demo.initWizard();
            setTimeout(function() {
                $('.card.card-wizard').addClass('active');
            }, 600);
        });
    </script>
    <script>
        function setFormValidation(id) {
            $(id).validate({
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
                    $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
                },
                success: function(element) {
                    $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
                    $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
                },
                errorPlacement: function(error, element) {
                    $(element).closest('.form-group').append(error);
                },
            });
        }

        $(document).ready(function() {
            setFormValidation('#RegisterValidation');
            setFormValidation('#TypeValidation');
            setFormValidation('#LoginValidation');
            setFormValidation('#RangeValidation');
        });
    </script>
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
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>


    <script>
        $(document).ready(
            function() {
                $("#attendance").click(function() {
                    $("#attendanceinfo").show();
                    $("#achievementinfo").hide();
                    $("#clsschinfo").hide();
                    $("#examsinfo").hide();

                });
            });
    </script>

    <script>
        $(document).ready(
            function() {
                $("#achievement").click(function() {
                    $("#achievementinfo").show();
                    $("#attendanceinfo").hide()
                    $("#clsschinfo").hide();
                    $("#examsinfo").hide();


                });
            });
    </script>
    <script>
        $(document).ready(
            function() {
                $("#exams").click(function() {
                    $("#achievementinfo").hide();
                    $("#attendanceinfo").hide()
                    $("#clsschinfo").hide();
                    $("#examsinfo").show();


                });
            });
    </script>
    <script>
        $(document).ready(
            function() {
                $("#schedule").click(function() {
                    $("#achievementinfo").hide();
                    $("#attendanceinfo").hide()
                    $("#clsschinfo").show();
                    $("#examsinfo").hide();


                });
            });
    </script>
    <script>
        $(document).ready(function() {
            demo.initFullCalendar();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#examinationstable').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search",
                }

            });

            var table = $('#examinationstable').DataTable();

            // Edit record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function() {
                alert('You clicked on Like button');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#viewsyllabustable').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search",
                }

            });

            var table = $('#viewsyllabustable').DataTable();

            // Edit record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function() {
                alert('You clicked on Like button');
            });
        });
    </script>
@endsection

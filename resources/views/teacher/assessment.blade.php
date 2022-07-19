@extends('layouts.master')
@section('title', 'Teacher Assesment')
@section('content')
    <style>
        .add-div-error {
            color: red;
        }

        .edit-div-error {
            color: red;
        }
    </style>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="nav-tabs-navigation nav-tabs-left">
                            <div class="nav-tabs-wrapper">
                                <ul id="tabs" class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#setsyllabus" role="tab" aria-expanded="false">Set Syllabus</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#exampaper" role="tab" aria-expanded="false">Exam papers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " data-toggle="tab" href="#allexams" role="tab" aria-expanded="true">Mark exam</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="my-tab-content" class="tab-content ">
                            <div class="tab-pane " id="allexams" role="tabpanel" aria-expanded="true">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class=" ">
                                            <div class="card-header ">
                                                <h4 class="card-title">Examinations</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row bor-sep">
                                                    <div class="form-group has-label col-sm-12 col-lg-auto">
                                                       <span>
                                                           List by:
                                                       </span>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-lg-auto select-wizard">
                                                        <select class="selectpicker" data-size="7" id="filter_exam_mark_exam" name="filter_exam_mark_exam"
                                                                data-style="btn btn-secondary btn-sm btn-round"
                                                                title="Exam">
                                                            <option value="" selected>Select Exam
                                                            </option>
                                                            <option value="all">All</option>
                                                            @foreach($exam_names as $exam_name)
                                                                <option value="{{$exam_name->exam_Id}}">{{$exam_name->exam_Name}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    <div class="border-left"></div>
                                                    <div class="form-group col-sm-12 col-lg-auto select-wizard">
                                                        <select class="selectpicker filter_exam_mark" data-size="7" id="filter_exam_mark_class" name="filter_exam_mark_class" data-style="btn btn-secondary btn-sm btn-round" title="Select Class" required="true">
                                                            <option value="" disabled selected>Select class</option>
                                                            <option value="all">All</option>
                                                            @foreach($classes as $class)
                                                                <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="border-left"></div>
                                                    <div class="form-group col-sm-12 col-lg-auto select-wizard">
                                                            <select class="selectpicker filter_exam_mark" data-size="5" id="filter_exam_mark_class_section" name="filter_exam_mark_class_section" data-style="btn btn-sm btn-secondary btn-round"
                                                                    title="Class Section" required="true">
                                                                <option value="" disabled >Class Section</option>
                                                                <option value="all">All</option>
                                                                {{-- @foreach($class_sections as $class_section)
                                                                     <option value="{{$class_section->c_section_Id}}">{{$class_section->class_section_name}}</option>
                                                                 @endforeach--}}

                                                            </select>

                                                    </div>

                                                </div>
                                                <div class="modal fade" style="overflow: scroll;  white-space: nowrap;" id="markexam" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">Mark exam paper</h5>
                                                            </div>
                                                            <form id="marks_obtain" method="post" action="{{url('teacher/marks_obtain')}}">

                                                                @csrf

                                                                <input type="hidden" name="exam_Id" id="exam_Id" value="">
                                                                <input type="hidden" name="subject" id="subject_id" value="">
                                                                <input type="hidden" name="date" id="date" value="">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="" data-toggle="" data-target="#" aria-expanded="true">
                                                                            <div class="m-portlet__head-caption">
                                                                                <div class="m-portlet__head-title">

                                                                                    <div class="col-md-12">
                                                                                        <div class="col-md-3">
                                                                                            <label>Subject:</label><span id="show-subject"></span>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <label>Exam:</label><span id="show-exame"> </span>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <label>Total Mark:</label><span id="show-total"> </span>
                                                                                        </div>

                                                                                        <div class="col-md-3">
                                                                                            <label>Paper Date:</label><span id="show-paperdate"> </span>
                                                                                        </div>

                                                                                    </div>


                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div id="grade">


                                                                        </div>
                                                                        <div class="table-responsive col-sm-12">

                                                                            <table class="table table-hover custom_border" id="marks">
                                                                                <tbody></tbody>
                                                                            </table>

                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit" class="btn btn-secondary btn-sm btn-round btn-link">Save</button>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-danger btn-sm btn-round btn-link" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" style="overflow: scroll;  white-space: nowrap;" id="editmarkexam" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">Edit papers marks</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="" data-toggle="" data-target="#" aria-expanded="true">
                                                                        <div class="m-portlet__head-caption">
                                                                            <div class="m-portlet__head-title">
                                                                                <h3 class="m-portlet__head-text">
                                                                                    <i class=""></i> &nbsp; MATHEMATICS
                                                                                </h3>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="table-responsive col-sm-12">
                                                                        <table class="table table-bordered table-hover table-striped">
                                                                            <tbody>
                                                                            <tr>
                                                                                <th>Adm.#</th>
                                                                                <th>Name</th>
                                                                                <th>Theory</th>
                                                                                <th>Practical</th>
                                                                                <th>Reading</th>
                                                                                <th>Listening</th>
                                                                                <th>Notebook</th>
                                                                                <th>Obtained</th>
                                                                                <th>%age</th>
                                                                                <th>Comments</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>aps-336</td>
                                                                                <td>Ali imran</td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>aps-337</td>
                                                                                <td>Sadiq akber</td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>

                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>aps-336</td>
                                                                                <td>Ali imran</td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments" name="comments[77][140]" value="" style=""></td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>aps-337</td>
                                                                                <td>Sadiq akber</td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>aps-336</td>
                                                                                <td>Ali imran</td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marksobtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>aps-337</td>
                                                                                <td>Sadiq akber</td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" id="comments[77][140]"
                                                                                           name="comments[77][140]" value="" style=""></td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>

                                                                            </tr>

                                                                            <tr>
                                                                                <td>aps-336</td>
                                                                                <td>Ali imran</td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control marks obtained_marks[77][140]" name="obtained_marks[77][140]" value=""
                                                                                           style="">
                                                                                    <div class="text-danger" style="display:none">Invalid Marks</div>
                                                                                </td>
                                                                                <td><input type="text" class="form-control comments obtained_marks[77][140]" name="comments[77][140]" value="" style="">
                                                                                </td>

                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <!--</div>-->
                                                            <div class="modal-footer">
                                                                <div class="">
                                                                    <button type="submit" class="btn btn-secondary btn-sm btn-round btn-link" data-dismiss="modal">Save</button>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-danger btn-sm btn-round btn-link">Cancel</button>
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
                                                        <div class="card-body">
                                                            <div class="toolbar">
                                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                            </div>
                                                            <table id="diarytable" class="table table-hover custom_border" cellspacing="0" width="100%">
                                                                <thead class="table-secondary">
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Exam</th>
                                                                    <th>Class</th>
                                                                    <th>Section</th>
                                                                    <th>Subject</th>
                                                                    <th>Date</th>
                                                                    <th class="disabled-sorting">Actions</th>
                                                                </tr>
                                                                </thead>
                                                                <tfoot class="table-secondary">
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Exam</th>
                                                                    <th>Class</th>
                                                                    <th>Section</th>
                                                                    <th>Subject</th>
                                                                    <th>Date</th>


                                                                    <th class="disabled-sorting">Actions</th>
                                                                </tr>
                                                                </tfoot>
                                                                @if($assignsArray)


                                                                    <tbody>

                                                                    @php $i=1;  @endphp

                                                                    @foreach($assignsArray as $datasheet)

                                                                        <tr>
                                                                            <td>{{$i++}}</td>
                                                                            <td>{{$datasheet['exame']}}</td>

                                                                            <td>{{$datasheet['class']}}</td>

                                                                            <td>{{$datasheet['section']}}</td>
                                                                            <td>{{$datasheet['subject']}}</td>
                                                                            <td>{{$datasheet['date']}}</td>

                                                                            <td class="">
                                                                                <div class="form-inline">
                                                                                    <div class="">
                                                                                        <button data-id="{{$datasheet['exam_Id']}}"
                                                                                                data-class="{{$datasheet['class_id']}}"
                                                                                                data-subject="{{$datasheet['subject_id']}}"
                                                                                                data-classsection="{{ $datasheet['sc_sec_Id'] }}"
                                                                                                data-section="{{$datasheet['section_id']}}"
                                                                                                data-date="{{$datasheet['date']}}"
                                                                                                data-exam="{{$datasheet['exam_Id']}}" class=" btn-link btn-cus-weight  edit-makr-btn btn-block "
                                                                                                type="button">
                                                                                            Mark
                                                                                        </button>
                                                                                    </div>

                                                                                </div>

                                                                            </td>
                                                                        </tr>
                                                                    @endforeach


                                                                    </tbody>

                                                                @endif
                                                            </table>
                                                        </div><!-- end content-->
                                                    </div><!--  end card  -->
                                                </div> <!-- end col-md-12 -->
                                            </div> <!-- end row -->

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane active" id="setsyllabus" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class=" ">
                                            <div class="card-header ">
                                                <h4 class="card-title">Set syllabus</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row bor-sep">

                                                    <div class="col-sm-12 pull-right">
                                                        <button class="btn btn-secondary btn-round pull-right" data-toggle="modal" id="set-syllabus-btn">
                                                            Upload syllabus
                                                        </button>
                                                    </div>
                                                </div>
                                                {{--add set syllabus modal--}}
                                                <div class="modal fade" id="set-syllabus-modal" tabindex="-1"
                                                     role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-sm">
                                                        <form id="add-syllabus-form" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">Set exam syllabus</h5>
                                                                </div>
                                                                <div class="modal-body row">
                                                                    <div class="col-sm-12">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Exam</label>
                                                                                <select class="selectpicker" data-size="7" name="exam_name" id="exam-syllabus-dropdown"
                                                                                        data-style="btn btn-secondary"
                                                                                        title="Choose Exam">
                                                                                    <option value="" selected>
                                                                                        Choose exam
                                                                                    </option>
                                                                                    @foreach($exam_names as $exam_name)
                                                                                        <option value="{{$exam_name->exam_Id}}">{{$exam_name->exam_Name}}</option>
                                                                                    @endforeach

                                                                                </select>
                                                                                <div class="add-div-error exam_name"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Class</label>
                                                                                <select class="selectpicker syllabus_cls_id" data-size="7" name="class_name" id="exam-syllabus-class-dropdown"
                                                                                        data-style="btn btn-secondary"
                                                                                        title="Choose Class">
                                                                                    <option value="" selected>
                                                                                        Choose class
                                                                                    </option>
                                                                                    @foreach($classes as $class)
                                                                                        <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error class_name"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Subject</label>
                                                                                <select class="selectpicker" data-size="7" name="subject_name" id="exam-syllabus-subject"
                                                                                        data-style="btn btn-secondary"
                                                                                        title="Choose subject">
                                                                                    <option value="" selected>
                                                                                        Choose Subject
                                                                                    </option>
                                                                                    @foreach($subjects as $subject)
                                                                                        <option value="{{$subject->sub_Id}}">{{$subject->subject}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error subject_name"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12">

                                                                                <label class="form-control-label" for="">Upload
                                                                                    Document</label>

                                                                                <div class="custom-file">
                                                                                    <input type="file" name="exam_syllabus_file"
                                                                                           class="custom-file-input form-control"
                                                                                           id="input-document"
                                                                                           accept="image/*">
                                                                                    <label class="custom-file-label"
                                                                                           for="input-document">Select
                                                                                        scanned document</label>
                                                                                </div>
                                                                                <div class="add-div-error exam_syllabus_file"></div>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit"
                                                                                class="btn btn-secondary btn-sm btn-round btn-link" id="add-syllabus-save-btn">Save
                                                                        </button>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                                class="btn btn-danger btn-sm  btn-round btn-link" data-dismiss="modal">
                                                                            Cancel
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                {{--add set syllabus modal end --}}
                                                {{--edit set syllabus modal--}}
                                                <div class="modal fade" id="edit-set-syllabus-modal" tabindex="-1"
                                                     role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-sm">
                                                        <form id="edit-syllabus-form" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="id" id="edit-syllabus-id"/>
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">Edit Set exam syllabus</h5>
                                                                </div>
                                                                <div class="modal-body row">
                                                                    <div class="col-sm-12">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Exam</label>
                                                                                <select class="selectpicker" data-size="7" name="exam_name" id="edit-exam-syllabus-dropdown"
                                                                                        data-style="btn btn-secondary"
                                                                                        title="Choose examination">
                                                                                    <option value="" selected>
                                                                                        Choose exam
                                                                                    </option>
                                                                                    @foreach($exam_names as $exam_name)
                                                                                        <option value="{{$exam_name->exam_Id}}">{{$exam_name->exam_Name}}</option>
                                                                                    @endforeach

                                                                                </select>
                                                                                <div class="edit-div-error exam_name"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Class</label>
                                                                                <select class="selectpicker edit_syllabus_cls_id" data-size="7" name="class_name" id="edit-exam-syllabus-class-dropdown"
                                                                                        data-style="btn btn-secondary"
                                                                                        title="Choose school section">
                                                                                    <option value="" selected>
                                                                                        Choose class
                                                                                    </option>
                                                                                    @foreach($classes as $class)
                                                                                        <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="edit-div-error class_name"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Subject</label>
                                                                                <select class="selectpicker" data-size="7" name="subject_name" id="edit-syllabus-subject-name"
                                                                                        data-style="btn btn-secondary"
                                                                                        title="Choose subject">
                                                                                    <option value="" selected>
                                                                                        Choose Subject
                                                                                    </option>
                                                                                    @foreach($subjects as $subject)
                                                                                        <option value="{{$subject->sub_Id}}">{{$subject->subject}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="edit-div-error subject_name"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12">

                                                                                <label class="form-control-label" for="">Upload
                                                                                    Document</label>

                                                                                <div class="custom-file">
                                                                                    <input type="file" name="exam_syllabus_file"
                                                                                           class="custom-file-input form-control"
                                                                                           id="input-document"
                                                                                           accept="image/*">
                                                                                    <label class="custom-file-label"
                                                                                           for="input-document">Select
                                                                                        scanned document</label>
                                                                                </div>
                                                                                <div class="edit-div-error exam_syllabus_file"></div>
                                                                                <a href="" id="edit-exam-syllabus-file"></a>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit"
                                                                                class="btn btn-secondary btn-sm btn-round btn-link" id="update-syllabus-btn">Update
                                                                        </button>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                                class="btn btn-danger btn-sm btn-round btn-link" data-dismiss="modal">
                                                                            Cancel
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                {{--edit set syllabus modal end --}}
                                            </div>
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
                                                                        <select class="selectpicker filter_syllabus" id="filter_syllabus_exam" data-size="5" name="filter_syllabus_exam" data-style="btn btn-sm btn-secondary btn-round" title="Exam" required="true">
                                                                            <option value="" disabled>Exam</option>
                                                                            <option value="all" >All</option>

                                                                            @foreach($exam_names as $exam)
                                                                                <option value="{{$exam->exam_Id}}">{{$exam->exam_Name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group col-sm-2 select-wizard">
                                                                        <select class="selectpicker filter_syllabus" data-size="5" id="filter_syllabus_class" name="filter_syllabus_class" data-style="btn btn-sm btn-secondary btn-round"
                                                                                title="Class" required="true">
                                                                            <option value="" disabled >Class</option>
                                                                            <option value="all" >All</option>
                                                                            @foreach($classes as $class)
                                                                                <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                            </div>
                                                            @include('teacher.partials.syllabus_data')
                                                        </div><!-- end content-->
                                                    </div><!--  end card  -->
                                                </div> <!-- end col-md-12 -->
                                            </div> <!-- end row -->

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane" id="exampaper" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class=" ">
                                            <div class="card-header ">
                                                <h4 class="card-title">Exam papers</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row bor-sep">

                                                    <div class="col-sm-12 pull-right">
                                                        <button class="btn btn-secondary btn-round pull-right"
                                                                data-toggle="modal" id="set-exam-paper-btn">
                                                            Upload paper
                                                        </button>
                                                    </div>
                                                </div>
                                                {{--add set-exam-paper-modal--}}
                                                <div class="modal fade" id="set-exam-paper-modal" tabindex="-1"
                                                     role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-sm">
                                                        <form id="add-exam-paper-form">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">upload exam paper</h5>
                                                                </div>
                                                                <div class="modal-body row">
                                                                    <div class="col-sm-12">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Exam</label>
                                                                                <select class="selectpicker" data-size="7" name="exam_name" id="exam-paper-dropdown"
                                                                                        data-style="btn btn-secondary"
                                                                                        title="Choose examination">
                                                                                    <option value="" disabled selected>
                                                                                        Choose exam
                                                                                    </option>
                                                                                    @foreach($exam_names as $exam_name)
                                                                                        <option value="{{$exam_name->exam_Id}}">{{$exam_name->exam_Name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error exam_name"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Class</label>
                                                                                <select class="selectpicker exam-paper-class-dropdown" data-size="7" name="exam_class" id="exam-paper-class-dropdown"
                                                                                        data-style="btn btn-secondary"
                                                                                        title="Choose school section">
                                                                                    <option value="" disabled selected>
                                                                                        Choose class
                                                                                    </option>
                                                                                    @foreach($classes as $class)
                                                                                        <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error exam_class"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Subject</label>
                                                                                <select class="selectpicker" data-size="7" name="exam_subject" id="exam-paper-subject-dropdown"
                                                                                        data-style="btn btn-secondary"
                                                                                        title="Choose subject">
                                                                                    <option value="" disabled selected>
                                                                                        Choose Subject
                                                                                    </option>
                                                                                    @foreach($subjects as $subject)
                                                                                        <option value="{{$subject->sub_Id}}">{{$subject->subject}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error exam_subject"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12">

                                                                                <label class="form-control-label" for="">Upload
                                                                                    Document</label>
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="exam_paper_file"
                                                                                           class="custom-file-input form-control"
                                                                                           id="input-document"
                                                                                           accept="image/*">
                                                                                    <label class="custom-file-label"
                                                                                           for="input-document">Select
                                                                                        scanned document</label>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit"
                                                                                class="btn btn-secondary btn-sm btn-round btn-link" id="add-exam-paper-save-btn"
                                                                        >Save
                                                                        </button>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                                class="btn btn-danger btn-sm btn-round btn-link" data-dismiss="modal">
                                                                            Cancel
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                {{--add set-exam-paper-modal end--}}
                                                {{--edit set-exam-paper-modal--}}
                                                <div class="modal fade" id="edit-set-exam-paper-modal" tabindex="-1"
                                                     role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-sm">
                                                        <form id="edit-exam-paper-form">
                                                            @csrf
                                                            <input type="hidden" name="id" id="edit-exam-paper-id">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">edit upload exam paper</h5>
                                                                </div>
                                                                <div class="modal-body row">
                                                                    <div class="col-sm-12">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Exam</label>
                                                                                <select class="selectpicker" data-size="7" name="exam_name" id="edit-exam-paper-dropdown"
                                                                                        data-style="btn btn-secondary"
                                                                                        title="Choose examination">
                                                                                    <option value="" disabled selected>
                                                                                        Choose exam
                                                                                    </option>
                                                                                    @foreach($exam_names as $exam_name)
                                                                                        <option value="{{$exam_name->exam_Id}}">{{$exam_name->exam_Name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="edit-div-error exam_name"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Class</label>
                                                                                <select class="selectpicker .edit_paper_cls_id" data-size="7" name="exam_class" id="edit-exam-paper-class-dropdown"
                                                                                        data-style="btn btn-secondary"
                                                                                        title="Choose school section">
                                                                                    <option value="" disabled selected>
                                                                                        Choose class
                                                                                    </option>
                                                                                    @foreach($classes as $class)
                                                                                        <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="edit-div-error exam_class"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Subject</label>
                                                                                <select class="selectpicker" data-size="7" name="exam_subject" id="edit-exam-paper-subject"
                                                                                        data-style="btn btn-secondary"
                                                                                        title="Choose subject">
                                                                                    <option value="" disabled selected>
                                                                                        Choose Subject
                                                                                    </option>
                                                                                    @foreach($subjects as $subject)
                                                                                        <option value="{{$subject->sub_Id}}">{{$subject->subject}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="edit-div-error exam_subject"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12">

                                                                                <label class="form-control-label" for="">Upload
                                                                                    Document</label>
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="exam_paper_file"
                                                                                           class="custom-file-input form-control"
                                                                                           id="input-document"
                                                                                           accept="image/*">
                                                                                    <label class="custom-file-label"
                                                                                           for="input-document">Select
                                                                                        scanned document</label>
                                                                                </div>

                                                                                <a href="" id="edit-exam-paper-file" target="_blank"></a>


                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit"
                                                                                class="btn btn-secondary btn-sm btn-round btn-link" id="update-exam-paper-btn"
                                                                        >Update
                                                                        </button>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                                class="btn btn-danger btn-sm btn-round btn-link" data-dismiss="modal">
                                                                            Cancel
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                {{--edit set-exam-paper-modal end--}}
                                                <div class="modal fade" id="viewmaterial" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">Study material Details</h5>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-sm-3">
                                                                    <div class="row">

                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Class</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Class">
                                                                                <option value="" disabled selected>Select Class</option>
                                                                                <option value="1">Playgroup</option>
                                                                                <option value="2">Kindergarten</option>
                                                                                <option value="3">Preparatory</option>
                                                                                <option value="1">One</option>
                                                                                <option value="2">Two</option>
                                                                                <option value="3">Three</option>
                                                                                <option value="1">Four</option>
                                                                                <option value="2">Five</option>
                                                                                <option value="3">Six</option>
                                                                                <option value="1">Seven</option>
                                                                                <option value="2">Eight</option>
                                                                                <option value="3">Eleven</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Section</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Billing Scgedule">
                                                                                <option value="" disabled selected>Select Section</option>
                                                                                <option value="1">Alpha</option>
                                                                                <option value="2">Bravo</option>
                                                                                <option value="2">Charlie</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Subject</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Billing Scgedule">
                                                                                <option value="" disabled selected>Select Subject</option>
                                                                                <option value="1">English</option>
                                                                                <option value="2">Urdu</option>
                                                                                <option value="2">Math</option>
                                                                                <option value="2">Science</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="col-sm-9">
                                                                    <div class="row">

                                                                        <div class="form-group col-sm-4">
                                                                            <label>Topic</label>
                                                                            <input type="date" class="form-control" placeholder="" name="houseallow" number="true" number="true">
                                                                        </div>
                                                                        <div class="form-group col-sm-4">
                                                                            <label>Date</label>
                                                                            <input type="date" class="form-control" placeholder="" name="houseallow" number="true" number="true">
                                                                        </div>
                                                                        <div class=" col-sm-4 select-wizard">
                                                                            <label>Audience</label>
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Billing Scgedule">
                                                                                <option value="" disabled selected>Select Please</option>
                                                                                <option value="1">Whole Class</option>
                                                                                <option value="2">Individuals</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <label>Individuals</label>
                                                                            <select class="selectpicker" data-style="btn btn-secondary " multiple title="Choose Students" data-size="7">
                                                                                <option disabled> Choose Students</option>
                                                                                <option value="1">Ali</option>
                                                                                <option value="2">Basit</option>
                                                                                <option value="2">Kashif</option>
                                                                                <option value="1">Ahmed</option>
                                                                                <option value="2">Jaffar</option>
                                                                                <option value="3">Muneer</option>
                                                                                <option value="3">Saleem</option>
                                                                                <option value="3">Awais</option>
                                                                                <option value="1">Ahmed</option>
                                                                                <option value="2">Jaffar</option>
                                                                                <option value="3">Muneer</option>
                                                                                <option value="3">Saleem</option>
                                                                                <option value="3">Awais</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group col-sm-12">
                                                                            <label>Note</label>
                                                                            <textarea type="text" class="form-control" placeholder="" name="houseallow" number="true" number="true"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12">

                                                                            <label class="form-control-label" for="">Upload Document</label>
                                                                            <div class="custom-file">
                                                                                <input type="file" name="photo" class="custom-file-input form-control" id="input-document" accept="image/*">
                                                                                <label class="custom-file-label" for="input-document">Select File</label>
                                                                            </div>


                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <div class="">
                                                                    <button type="submit" class="btn btn-secondary btn-sm btn-round  btn-link" data-dismiss="modal">Save</button>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-danger btn-sm btn-round btn-link">Cancel</button>
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
                                                            <h6 class="card-title">Papers List</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="toolbar">
                                                                <div class="row">


                                                                    <div class="form-group col-sm-2 select-wizard">
                                                                        <select class="selectpicker filter_paper" data-size="5"  id="filter_paper_exam" name="filter_paper_exam" data-style="btn btn-sm btn-secondary btn-round" title="Exam" required="true">
                                                                            <option value="" disabled>Exam</option>
                                                                            <option value="all" >All</option>

                                                                            @foreach($exam_names as $exam)
                                                                                <option value="{{$exam->exam_Id}}">{{$exam->exam_Name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group col-sm-2 select-wizard">
                                                                        <select class="selectpicker filter_paper" data-size="5" id="filter_paper_class" name="filter_paper_class" data-style="btn btn-sm btn-secondary btn-round"
                                                                                title="Class" required="true">
                                                                            <option value="" disabled >Class</option>
                                                                            <option value="all" >All</option>
                                                                            @foreach($classes as $class)
                                                                                <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                            </div>
                                                            {{--partials view--}}
                                                            @include('teacher.partials.paper_data');
                                                            {{--partials view--}}

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
        </div>
    </div>
@endsection

@section('front_script')
    <script src="{{asset('js/teacher.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#materialtable').DataTable({
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

            var table = $('#materialtable').DataTable();

            // Edit record
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function () {
                alert('You clicked on Like button');
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#diarytable').DataTable({
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

            var table = $('#diarytable').DataTable();

            // Edit record
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function () {
                alert('You clicked on Like button');
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#checkdiarytable').DataTable({
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

            var table = $('#checkdiarytable').DataTable();

            // Edit record
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function () {
                alert('You clicked on Like button');
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#set-syllabus-table').DataTable({
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

            $('#set-paper-table').DataTable({
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

            var table = $('#checkdiarytable').DataTable();

            // Edit record
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function () {
                alert('You clicked on Like button');
            });
        });
    </script>






    <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>

    <script>
        function addRow(tableID) {

            var table = document.getElementById(tableID);

            var rowCount = table.rows.length;
            if (rowCount >= 21) { // +1 for header row.
                alert("There can be no more than 20 participants per session.");
                return;
            }
            var row = table.insertRow(rowCount);

            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "checkbox";
            element1.name = "chkbox[]";
            cell1.appendChild(element1);

            var cell2 = row.insertCell(1);
            cell2.innerHTML = rowCount;

            var cell3 = row.insertCell(2);
            var element2 = document.createElement("select");
            element2.type = "select";
            element2.name = "select[]";
            cell3.appendChild(element2);

            var cell4 = row.insertCell(3);
            var element3 = document.createElement("input");
            element3.type = "text";
            element3.name = "txtbox[]";
            cell4.appendChild(element3);

            var cell5 = row.insertCell(4);
            var element4 = document.createElement("input");
            element4.type = "text";
            element4.name = "txtbox[]";
            cell5.appendChild(element4);

        }

        function deleteRow(tableID) {
            try {
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;

                for (var i = 0; i < rowCount; i++) {
                    var row = table.rows[i];
                    var chkbox = row.cells[0].childNodes[0];
                    if (null != chkbox && true == chkbox.checked) {
                        table.deleteRow(i);
                        rowCount--;
                        i--;
                    }

                }
            } catch (e) {
                alert(e);
            }
        }
    </script>
@endsection
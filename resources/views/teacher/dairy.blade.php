@extends('layouts.master')
@section('title', 'Teacher Dairy')
@section('content')
    <style>
        .add-div-error{color:red!important;}
        .edit-div-error{color:red!important;}
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
                                        <a class="nav-link active" data-toggle="tab" href="#writediary" role="tab" aria-expanded="true">Diary</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#material" role="tab" aria-expanded="false">Study Material</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div id="my-tab-content" class="tab-content ">
                            <div class="tab-pane active" id="writediary" role="tabpanel" aria-expanded="true">
                                <div class="row">
                                    <div class="col-sm-12">

                                            <div class=" ">
                                                <div class="card-header ">
                                                    <h4 class="card-title">Diaries</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row bor-sep">

                                                        <div class="col-sm-12 pull-right">
                                                            <button class="btn btn-secondary pull-right btn-round" data-toggle="modal" id="write-new-diary-btn">
                                                                Write Diary
                                                            </button>
                                                        </div>
                                                    </div>
                                                    {{--add diary modal start--}}
                                                    <div class="modal fade" id="write-new-diary-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-sm">
                                                           <form id="write-diary-form" method="post" enctype="multipart/form-data">
                                                               <input type="hidden" id="edit-diary-id" name="id">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">Write New Diary</h5>
                                                                </div>
                                                                <div class="modal-body row">
                                                                    <div class="col-sm-3">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Class</label>
                                                                                <select class="selectpicker cls_id" id="cls_id" data-size="7" name="class" data-style="btn btn-secondary btn-round" title="Select Class" data-container="" data-size="5" data-live-search="true" data-hide-disabled="true">
                                                                                    <option value="" disabled selected>Select Class</option>
                                                                                    @foreach($classes as $class)
                                                                                        <option value="{{$class->cls_Id }}">{{$class->class }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error class"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Class Section</label>
                                                                                <select class="selectpicker section_id" id="section_id" data-size="7" name="class_section" data-style="btn btn-secondary btn-round" title="Select Class Section" data-container="" data-size="5" data-live-search="true" data-hide-disabled="true">
                                                                                    <option value="" disabled selected>Select Section</option>
                                                                                    @foreach($class_sections as $class_section)
                                                                                        <option value="{{$class_section->c_section_Id }}">{{$class_section->class_section_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error class_section"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Subject</label>
                                                                                <select class="selectpicker" data-size="7" id="subject_id" name="subject" data-style="btn btn-secondary btn-round" title="Select Subject" data-container="" data-size="5" data-live-search="true" data-hide-disabled="true">
                                                                                    <option value="" disabled selected>Select Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                        <option value="{{$subject->sub_Id }}">{{$subject->subject }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error subject"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="col-sm-9">
                                                                        <div class="row">


                                                                            <div class=" col-sm-4 select-wizard">
                                                                                <label>Diary Type</label>
                                                                                <select class="selectpicker" data-size="7" name="diary_type" id="diary-type-dropdown" data-style="btn btn-secondary btn-round" title="Select Diary Type" >
                                                                                    <option value="" disabled selected>Select Diary</option>
                                                                                    @foreach($diary_types as $diary_type)
                                                                                    <option value="{{$diary_type->pk_diary_type_Id}}">{{$diary_type->diary_type_Name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error diary_type"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                                <label>Due Date</label>
                                                                                <input type="text" class="form-control datepicker" placeholder="" id="due-date" name="due_date" >
                                                                                <div class="add-div-error due_date"></div>
                                                                            </div>
                                                                            <div class=" col-sm-4 select-wizard">
                                                                                <label>Audience</label>
                                                                                <select class="selectpicker" data-size="7" name="audience" data-style="btn btn-secondary btn-round" title="Select Audience" id="audience">
                                                                                    <option value="" disabled selected>Select Audience</option>
                                                                                    <option value="Whole Class">Whole Class</option>
                                                                                    <option value="Individuals">Individuals</option>
                                                                                </select>
                                                                                <div class="add-div-error audience"></div>
                                                                            </div>
                                                                            <div class="col-sm-12" id="student-dropdown-div" style="visibility:hidden !important;">
                                                                                <label>Individuals</label>
                                                                                <select class="selectpicker" data-style="btn btn-secondary btn-round" name="student[]" multiple title="Choose Students" data-container="" data-size="5" data-live-search="true" data-hide-disabled="true" id="diary-students-dropdown">
                                                                                    <option disabled> Choose Students</option>
                                                                                </select>
                                                                                <div class="add-div-error student"></div>
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <label>Status</label>
                                                                                <select class="selectpicker" data-style="btn btn-secondary btn-round" name="status"  title="Choose Status" data-container=""  id="diary-status-dropdown">
                                                                                    <option disabled> Choose Status</option>

                                                                                    @php

                                                                                        $dairyStatusstunde = config('constants.dairyStatusstunde');

                                                                                    @endphp
                                                                                    @foreach($dairyStatusstunde as $val)

                                                                                    <option value="{{$val}}">{{$val}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error status"></div>
                                                                            </div>

                                                                            <div class="form-group col-sm-12">
                                                                                <label>Note</label>
                                                                                <textarea type="text" class="form-control" placeholder="" id="diary-note" name="note"  ></textarea>
                                                                                <div class="add-div-error note"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12">

                                                                                <label class="form-control-label" for="">Upload Document</label>
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="photo" class="custom-file-input form-control" id="input-document1">
                                                                                    <label class="custom-file-label" for="input-document1">Select File</label>

                                                                                </div>
                                                                                <div class="add-div-error photo"></div>
                                                                                <a id="diary-file"></a>


                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit" class="btn btn-secondary btn-sm btn-round btn-link" id="write-diary-save-btn">Save</button>
                                                                        <button type="submit" class="btn btn-secondary tbn-sm btn-link btn-round" id="update-write-diary-btn">Update</button>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-danger btn-sm btn-round btn-link" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           </form>
                                                        </div>
                                                    </div>
                                                    {{--add diary modal end--}}
                                                    {{--edit diary modal start--}}
                                                    {{--<div class="modal fade" id="edit-new-diary-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-sm">
                                                           <form id="edit-write-diary-form" method="post" enctype="multipart/form-data">
                                                               @csrf
                                                            <input type="hidden" id="edit-diary-id" name="id">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">Edit Write New Diary</h5>
                                                                </div>
                                                                <div class="modal-body row">
                                                                    <div class="col-sm-3">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 select-wizard" >
                                                                                <label>Class</label>
                                                                                <select class="selectpicker cls_id" data-size="7" name="class" data-style="btn btn-secondary btn-round" title="Select Class" data-container="" data-size="5" data-live-search="true" data-hide-disabled="true" id="edit-diary-class-dropdown">
                                                                                    <option value="" disabled selected>Select Class</option>
                                                                                    @foreach($classes as $class)
                                                                                        <option value="{{$class->cls_Id }}">{{$class->class }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="edit-div-error class"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Class Section</label>
                                                                                <select class="selectpicker section_id" data-size="7" name="class_section" data-style="btn btn-secondary btn-round" title="Select Class Section" data-container="" data-size="5" data-live-search="true" data-hide-disabled="true" id="edit-diary-class-section-dropdown">
                                                                                    <option value="" disabled selected>Select Section</option>
                                                                                    @foreach($class_sections as $class_section)
                                                                                        <option value="{{$class_section->c_section_Id }}">{{$class_section->class_section_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="edit-div-error class_section"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Subject</label>
                                                                                <select class="selectpicker" data-size="7" name="subject" data-style="btn btn-secondary btn-round" title="Select Subject" data-container="" data-size="5" data-live-search="true" data-hide-disabled="true" id="edit-diary-subject-dropdown">
                                                                                    <option value="" disabled selected>Select Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                        <option value="{{$subject->sub_Id }}">{{$subject->subject }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="edit-div-error subject"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="col-sm-9">
                                                                        <div class="row">


                                                                            <div class=" col-sm-4 select-wizard">
                                                                                <label>Diary Type</label>
                                                                                <select class="selectpicker" data-size="7" name="diary_type" data-style="btn btn-secondary btn-round" title="Select Diary Type" id="edit-diary-type-dropdown">
                                                                                    <option value="" disabled selected>Select Diary</option>
                                                                                    @foreach($diary_types as $diary_type)
                                                                                    <option value="{{$diary_type->pk_diary_type_Id}}">{{$diary_type->diary_type_Name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="edit-div-error diary_type"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                                <label>Due Date</label>
                                                                                <input type="text" class="form-control datepicker" placeholder="" name="due_date" id="edit-due-date">
                                                                                <div class="edit-div-error due_date"></div>
                                                                            </div>
                                                                            <div class=" col-sm-4 select-wizard">
                                                                                <label>Audience</label>
                                                                                <select class="selectpicker" data-size="7" name="audience" data-style="btn btn-secondary btn-round" title="Select Audience" id="audience">
                                                                                    <option value="" disabled selected>Select Audience</option>
                                                                                    <option value="Whole Class">Whole Class</option>
                                                                                    <option value="Individuals">Individuals</option>
                                                                                </select>
                                                                                <div class="edit-div-error audience"></div>
                                                                            </div>
                                                                            <div class="col-sm-12" >
                                                                                <label>Individuals</label>
                                                                                <select class="selectpicker" data-style="btn btn-secondary btn-round edit-diary-students-dropdown" name="student[]" multiple title="Choose Students" data-container="" data-size="5" data-live-search="true" data-hide-disabled="true" id="edit-diary-students-dropdown">
                                                                                    <option disabled> Choose Students</option>
                                                                                </select>
                                                                                <div class="edit-div-error student"></div>
                                                                            </div>

                                                                            <div class="form-group col-sm-12">
                                                                                <label>Note</label>
                                                                                <textarea type="text" class="form-control" placeholder="" name="note" id="edit-diary-note"></textarea>
                                                                                <div class="edit-div-error note"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12">

                                                                                <label class="form-control-label" for="">Upload Document</label>
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="photo" class="custom-file-input form-control" id="input-document">
                                                                                    <label class="custom-file-label" for="input-document">Select File</label>

                                                                                </div>
                                                                                <a id="edit-diary-file"></a>
                                                                                <div class="edit-div-error photo"></div>


                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit" class="btn btn-success btn-link" id="write-diary-update-btn">Update</button>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           </form>
                                                        </div>
                                                    </div>
                                                    --}}{{--edit diary modal end--}}
                                                    {{--view diary modal start--}}
                                                    <div class="modal fade" id="view-diary-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">View Diary</h5>
                                                                </div>
                                                                <div class="modal-body row">
                                                                    <div class="col-sm-3">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Class</label>
                                                                                <p id="show-dairy-class"></p>
                                                                            </div>
                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Class Section</label>
                                                                                <p id="show-dairy-class-section"></p>
                                                                            </div>
                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Subject</label>
                                                                                <p id="show-dairy-subject"></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="col-sm-9">
                                                                        <div class="row">


                                                                            <div class=" col-sm-4 select-wizard">
                                                                                <label>Diary Type</label>
                                                                                <p id="show-dairy-diary-type"></p>
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                                <label>Due Date</label>
                                                                               <p id="show-dairy-due-date"></p>
                                                                            </div>
                                                                            <div class=" col-sm-4 select-wizard">
                                                                                <label>Audience</label>
                                                                                <p id="show-dairy-audience"></p>
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <label>Students</label>
                                                                                <table id="diary-student-table"
                                                                                class="table table-striped table-bordered"
                                                                                cellspacing="0" width="100%">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>S.No</th>
                                                                                    <th>Students</th>
                                                                                    <th>Status</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                </tbody>
                                                                                </table>


                                                                                <p class="show-diary-students"></p>
                                                                            </div>

                                                                            <div class="form-group col-sm-12">
                                                                                <label>Note</label>
                                                                                <p type="text" id="diary-note"></p>
                                                                            </div>
                                                                            <div class="form-group col-sm-12">

                                                                                <label class="form-control-label" for="">Diary File</label>
                                                                                <div class="custom-file">
                                                                                   <a href="" id="show-diary-file" target="_blank"></a>
                                                                                </div>


                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-danger btn-sm btn-link btn-round" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--view diary modal end--}}
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="card-header">
                                                                <h6 class="card-title">Diaries List</h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="toolbar">
                                                                    <div class="row">
                                                                        <div class="form-group col-sm-2 select-wizard">
                                                                            <select class="selectpicker filter_diary" id="filter_diary_class" data-size="5" name="filter_diary_class" data-style="btn btn-sm btn-secondary btn-round" title="Class" required="true">
                                                                                <option value="" disabled>Class</option>
                                                                                <option value="all">All</option>
                                                                                @foreach($classes as $class)
                                                                                    <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-sm-2 select-wizard">
                                                                            <select class="selectpicker filter_diary" data-size="5" id="filter_diary_class_section" name="filter_diary_class_section" data-style="btn btn-sm btn-secondary btn-round"
                                                                                    title="Class Section" required="true">
                                                                                <option value="" disabled >Class Section</option>
                                                                                <option value="all">All</option>
                                                                               {{-- @foreach($class_sections as $class_section)
                                                                                    <option value="{{$class_section->c_section_Id}}">{{$class_section->class_section_name}}</option>
                                                                                @endforeach--}}

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                                </div>
                                                                @include('teacher.partials.diary_data')
                                                            </div><!-- end content-->
                                                        </div><!--  end card  -->
                                                    </div> <!-- end col-md-12 -->
                                                </div> <!-- end row -->

                                            </div>

                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="material" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class=" ">
                                            <div class="card-header ">
                                                <h4 class="card-title">Study material</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row bor-sep">

                                                    <div class="col-sm-12 pull-right">
                                                        <button class="btn btn-secondary btn-round pull-right" data-toggle="modal" id="study-material-btn">
                                                            Upload Study Material
                                                        </button>
                                                    </div>
                                                </div>
                                                {{--add add-study-material-modal start--}}
                                                <div class="modal fade" id="add-material-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <form id="add-material-form" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" id="edit-study-id" name="id">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">UPLOAD STUDY MATERIAL</h5>
                                                                </div>
                                                                <div class="modal-body row">
                                                                    <div class="col-sm-3">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Class</label>
                                                                                <select class="selectpicker study_cls_id" id="study_cls_id" data-size="7" name="class" data-style="btn btn-secondary btn-round" title="Select Class" data-container="" data-size="5" data-live-search="true" data-hide-disabled="true">
                                                                                    <option value="" disabled selected>Select Class</option>
                                                                                    @foreach($classes as $class)
                                                                                        <option value="{{$class->cls_Id }}">{{$class->class }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error class"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Class Section</label>
                                                                                <select class="selectpicker study_class_section_id" id="study_class_section_id" data-size="7" name="class_section" data-style="btn btn-secondary btn-round" title="Select Class Section" data-container="" data-size="5" data-live-search="true" data-hide-disabled="true">
                                                                                    <option value="" disabled selected>Select Section</option>
                                                                                    @foreach($class_sections as $class_section)
                                                                                        <option value="{{$class_section->c_section_Id }}">{{$class_section->class_section_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error class_section"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 select-wizard">
                                                                                <label>Subject</label>
                                                                                <select class="selectpicker study_subject_id" id="study_subject_id" data-size="7" name="subject" data-style="btn btn-secondary btn-round" title="Select Subject" data-container="" data-size="5" data-live-search="true" data-hide-disabled="true">
                                                                                    <option value="" disabled selected>Select Subject</option>
                                                                                    @foreach($subjects as $subject)
                                                                                        <option value="{{$subject->sub_Id }}">{{$subject->subject }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error subject"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="col-sm-9">
                                                                        <div class="row">


                                                                            <div class=" col-sm-4 select-wizard">
                                                                                <label>Topic</label>
                                                                                <input type="text" class="form-control" placeholder="" id="study-topic"  name="topic" >
                                                                                <div class="add-div-error topic"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-4">
                                                                                <label>Due Date</label>
                                                                                <input type="text" class="form-control datepicker" id="study-due-date" placeholder="" name="due_date" >
                                                                                <div class="add-div-error due_date"></div>
                                                                            </div>
                                                                            <div class=" col-sm-4 select-wizard">
                                                                                <label>Audience</label>
                                                                                <select class="selectpicker" id="study_audience" data-size="7" name="audience" data-style="btn btn-secondary btn-round" title="Select Audience" >
                                                                                    <option value="" disabled selected>Select Audience</option>
                                                                                    <option value="Whole Class">Whole Class</option>
                                                                                    <option value="Individuals">Individuals</option>
                                                                                </select>
                                                                                <div class="add-div-error audience"></div>
                                                                            </div>
                                                                            <div class="col-sm-12" id="study-student-dropdown-div" style="visibility:hidden !important;">
                                                                                <label>Individuals</label>
                                                                                <select class="selectpicker" data-style="btn btn-secondary btn-round" name="student[]" multiple title="Choose Students" data-container="" data-size="5" data-live-search="true" data-hide-disabled="true" id="study-material-students-dropdown">
                                                                                    <option disabled> Choose Students</option>
                                                                                </select>
                                                                                <div class="add-div-error student"></div>
                                                                            </div>

                                                                            <div class="form-group col-sm-12">
                                                                                <label>Note</label>
                                                                                <textarea type="text" class="form-control" placeholder="" id="study-note" name="note"  ></textarea>
                                                                                <div class="add-div-error note"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12">

                                                                                <label class="form-control-label" for="">Upload Document</label>
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="photo" class="custom-file-input form-control" id="input-document1">
                                                                                    <label class="custom-file-label" for="input-document1">Select File</label>
                                                                                    <div class="add-div-error photo"></div>
                                                                                </div>

                                                                                <a id="study-file"></a>
                                                                                <div class="add-div-error photo"></div>


                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit" class="btn btn-secondary btn-sm btn-round btn-link" id="add-study-save-btn">Save</button>
                                                                        <button type="submit" class="btn btn-secondary btn-round btn-sm btn-link" id="study-update-btn">Update</button>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-sm btn-round btn-danger btn-link" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                {{--add add-study-material-modal end--}}
                                                {{--view study modal start--}}
                                                <div class="modal fade" id="view-study-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">View Study Material</h5>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-sm-3">
                                                                    <div class="row">

                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Class</label>
                                                                            <p id="show-study-class"></p>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Class Section</label>
                                                                            <p id="show-study-class-section"></p>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Subject</label>
                                                                            <p id="show-study-subject"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="col-sm-9">
                                                                    <div class="row">


                                                                        <div class=" col-sm-4 select-wizard">
                                                                            <label>Topic</label>
                                                                            <p id="show-study-topic"></p>
                                                                        </div>
                                                                        <div class="form-group col-sm-4">
                                                                            <label>Due Date</label>
                                                                            <p id="show-study-due-date"></p>
                                                                        </div>
                                                                        <div class=" col-sm-4 select-wizard">
                                                                            <label>Audience</label>
                                                                            <p id="show-study-audience"></p>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <label>Students</label>
                                                                            <table id="study-student-table"
                                                                                   class="table table-striped table-bordered"
                                                                                   cellspacing="0" width="100%">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>S.No</th>
                                                                                    <th>Students</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tfoot>
                                                                                <tr>
                                                                                    <th>S.No</th>
                                                                                    <th>Students</th>
                                                                                </tr>
                                                                                </tfoot>
                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>



                                                                        </div>

                                                                        <div class="form-group col-sm-12">
                                                                            <label>Note</label>
                                                                            <p type="text" id="study-note"></p>
                                                                        </div>
                                                                        <div class="form-group col-sm-12">

                                                                            <label class="form-control-label" for="">Diary File</label>
                                                                            <div class="custom-file">
                                                                                <a href="" id="show-study-file" target="_blank"></a>
                                                                            </div>


                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <!--</div>-->
                                                            <div class="modal-footer">
                                                                <div class="">
                                                                    <button type="button" class="btn btn-danger btn-sm btn-link btn-round" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--view study modal end--}}
{{--                                                --}}{{--edit study modal start--}}
{{--                                                <div class="modal fade" id="edit-study-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">--}}
{{--                                                    <div class="modal-dialog modal-xl modal-sm">--}}
{{--                                                        <form id="edit-study-form" method="post" enctype="multipart/form-data">--}}
{{--                                                            @csrf--}}
{{--                                                            <input type="hidden" id="edit-study-id" name="id">--}}
{{--                                                            <div class="modal-content">--}}
{{--                                                                <div class="modal-header justify-content-center">--}}
{{--                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                                        <i class="fa fa-remove"></i>--}}
{{--                                                                    </button>--}}
{{--                                                                    <h5 class="title title-up">Edit Study Material</h5>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="modal-body row">--}}
{{--                                                                    <div class="col-sm-3">--}}
{{--                                                                        <div class="row">--}}

{{--                                                                            <div class=" col-sm-12 select-wizard">--}}
{{--                                                                                <label>Class</label>--}}
{{--                                                                                <select class="selectpicker" data-size="7" name="class" data-style="btn btn-secondary btn-round" title="Select Class" data-container="" data-size="5" data-live-search="true" data-hide-disabled="true" id="edit-study-class-dropdown">--}}
{{--                                                                                    <option value="" disabled selected>Select Class</option>--}}
{{--                                                                                    @foreach($classes as $class)--}}
{{--                                                                                        <option value="{{$class->cls_Id }}">{{$class->class }}</option>--}}
{{--                                                                                    @endforeach--}}
{{--                                                                                </select>--}}
{{--                                                                                <div class="edit-div-error class"></div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class=" col-sm-12 select-wizard">--}}
{{--                                                                                <label>Class Section</label>--}}
{{--                                                                                <select class="selectpicker" data-size="7" name="class_section" data-style="btn btn-secondary btn-round" title="Select Class Section" data-container="" data-size="5" data-live-search="true" data-hide-disabled="true" id="edit-study-class-section-dropdown">--}}
{{--                                                                                    <option value="" disabled selected>Select Section</option>--}}
{{--                                                                                    @foreach($class_sections as $class_section)--}}
{{--                                                                                        <option value="{{$class_section->c_section_Id }}">{{$class_section->class_section_name }}</option>--}}
{{--                                                                                    @endforeach--}}
{{--                                                                                </select>--}}
{{--                                                                                <div class="edit-div-error class_section"></div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class=" col-sm-12 select-wizard">--}}
{{--                                                                                <label>Subject</label>--}}
{{--                                                                                <select class="selectpicker" data-size="7" name="subject" data-style="btn btn-secondary btn-round" title="Select Subject" data-container="" data-size="5" data-live-search="true" data-hide-disabled="true" id="edit-study-subject-dropdown">--}}
{{--                                                                                    <option value="" disabled selected>Select Subject</option>--}}
{{--                                                                                    @foreach($subjects as $subject)--}}
{{--                                                                                        <option value="{{$subject->sub_Id }}">{{$subject->subject }}</option>--}}
{{--                                                                                    @endforeach--}}
{{--                                                                                </select>--}}
{{--                                                                                <div class="edit-div-error subject"></div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="divider"></div>--}}
{{--                                                                    <div class="col-sm-9">--}}
{{--                                                                        <div class="row">--}}


{{--                                                                            <div class=" col-sm-4 select-wizard">--}}
{{--                                                                                <label>Topic</label>--}}
{{--                                                                                <input type="text" class="form-control" placeholder="" name="topic" id="edit-study-topic">--}}

{{--                                                                                <div class="edit-div-error topic"></div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="form-group col-sm-4">--}}
{{--                                                                                <label>Due Date</label>--}}
{{--                                                                                <input type="text" class="form-control datepicker" placeholder="" name="due_date" id="edit-study-due-date">--}}
{{--                                                                                <div class="edit-div-error due_date"></div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class=" col-sm-4 select-wizard">--}}
{{--                                                                                <label>Audience</label>--}}
{{--                                                                                <select class="selectpicker" data-size="7" name="audience" data-style="btn btn-secondary btn-round" title="Select Audience" id="edit-study-audience-dropdown">--}}
{{--                                                                                    <option value="" disabled selected>Select Audience</option>--}}
{{--                                                                                    <option value="Whole Class">Whole Class</option>--}}
{{--                                                                                    <option value="Individuals">Individuals</option>--}}
{{--                                                                                </select>--}}
{{--                                                                                <div class="edit-div-error audience"></div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="col-sm-12">--}}
{{--                                                                                <label>Individuals</label>--}}
{{--                                                                                <select class="selectpicker" data-style="btn btn-secondary btn-round edit-study-students-dropdown" name="student[]" multiple title="Choose Students" data-container="" data-size="5" data-live-search="true" data-hide-disabled="true" id="edit-study-students-dropdown">--}}
{{--                                                                                    <option disabled> Choose Students</option>--}}
{{--                                                                                </select>--}}
{{--                                                                                <div class="edit-div-error student"></div>--}}
{{--                                                                            </div>--}}

{{--                                                                            <div class="form-group col-sm-12">--}}
{{--                                                                                <label>Note</label>--}}
{{--                                                                                <textarea type="text" class="form-control" placeholder="" name="note" id="edit-study-note"></textarea>--}}
{{--                                                                                <div class="edit-div-error note"></div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="form-group col-sm-12">--}}

{{--                                                                                <label class="form-control-label" for="">Upload Document</label>--}}
{{--                                                                                <div class="custom-file">--}}
{{--                                                                                    <input type="file" name="photo" class="custom-file-input form-control" id="input-document4">--}}
{{--                                                                                    <label class="custom-file-label" for="input-document4">Select File</label>--}}

{{--                                                                                </div>--}}
{{--                                                                                <a id="edit-study-file"></a>--}}
{{--                                                                                <div class="edit-div-error photo"></div>--}}


{{--                                                                            </div>--}}
{{--                                                                        </div>--}}

{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                                <!--</div>-->--}}
{{--                                                                <div class="modal-footer">--}}
{{--                                                                    <div class="">--}}
{{--                                                                        <button type="submit" class="btn btn-success btn-link" id="study-update-btn">Update</button>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="divider"></div>--}}
{{--                                                                    <div class="">--}}
{{--                                                                        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </form>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                --}}{{--edit study modal end--}}
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="card-header">
                                                            <h6 class="card-title">Study material List</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="toolbar">
                                                                <div class="row">
                                                                    <div class="form-group col-sm-2 select-wizard">
                                                                        <select class="selectpicker filter_study" id="filter_study_class" data-size="5" name="filter_study_class" data-style="btn btn-sm btn-secondary btn-round" title="Class" required="true">
                                                                            <option value="" disabled>Class</option>
                                                                            <option value="all">All</option>
                                                                            @foreach($classes as $class)
                                                                                <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                 <div class="form-group col-sm-2 select-wizard">
                                                                     <select class="selectpicker filter_study" data-size="5" id="filter_study_class_section" name="filter_study_class_section" data-style="btn btn-sm btn-secondary btn-round"
                                                                             title="Class Section" required="true">
                                                                         <option value="" disabled >Class Section</option>
                                                                         <option value="all">All</option>
                                                                         {{--@foreach($class_sections as $class_section)
                                                                             <option value="{{$class_section->c_section_Id}}">{{$class_section->class_section_name}}</option>
                                                                         @endforeach--}}

                                                                     </select>
                                                                 </div>
                                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                                </div>
                                                            </div>
                                                            </div>
                                                          @include('teacher.partials.study_data')
                                                        </div><!-- end content-->
                                                    </div><!--  end card  -->
                                                </div> <!-- end col-md-12 -->
                                            </div> <!-- end row -->

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
        $(document).ready(function() {
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

            var table = $('#diarytable').DataTable();

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
        /* Formatting function for row details - modify as you need */
        function format ( d ) {
            // `d` is the original data object for the row
            return '<table cellpadding="0" cellspacing="0" border="0">'+
                '<tr>'+
                '<td>Full name:</td>'+
                '<td>'+d.name+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Fees:</td>'+
                '<td>'+d.fee+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Admission Date:</td>'+
                '<td>'+d.adm_date+'</td>'+
                '</tr>'+
                '</table>';
        }

        $(document).ready(function() {
            var table = $('#example').DataTable( {
                "ajax": "../../assets/ajax/data/user-data.txt",
                "columns": [
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ''
                    },
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "username" },
                    { "data": "subtype" },
                    { "data": "action" }
                ],
                "order": [[1, 'asc']]
            } );

            // Add event listener for opening and closing details
            $('#example tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            } );
        } );


    </script>
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
        function myFunction() {

            $(".close").attr('disabled', true);
            $(".add-btn").attr('disabled', true);
            $(".update-btn").attr('disabled', true);
        };
    </script>
    <script>
        $('#diary-students-dropdown').selectpicker();
        $('#study-material-students-dropdown').selectpicker();
    </script>
@endsection
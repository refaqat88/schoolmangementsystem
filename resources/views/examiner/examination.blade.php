@extends('layouts.master')
@section('title', 'Examination')
@section('content')
    

    <style>
        .add-div-error {
            color: red;
        }

        .edit-div-error {
            color: red;
        }

        .edit-exam-date-for-datesheet > option {
            display: none
        }

        .edit-exam-class-for-datesheet > option {
            display: none
        }

        .edit-exam-subject-for-datesheet > option {
            display: none
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
                                        <a class="nav-link active" data-toggle="tab" href="#allexams" role="tab"
                                           aria-expanded="true">{{ __('layout.Exams') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#setmarks" role="tab"
                                           aria-expanded="false">{{ __('layout.Set_marks') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" id="setgradestabs" href="#setgrades" role="tab"
                                           aria-expanded="false">{{ __('layout.Set_grades') }}
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#setsyllabus" role="tab"
                                           aria-expanded="false">{{ __('layout.Set_Syllabus') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#exampaper" role="tab"
                                           aria-expanded="false">{{ __('layout.Exam_papers') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#datesheet" role="tab"
                                           aria-expanded="false">{{ __('layout.Date_sheet') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#seatingplan" role="tab"
                                           aria-expanded="false">{{ __('layout.Seating_plan') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="my-tab-content" class="tab-content ">
                            <div class="tab-pane active" id="allexams" role="tabpanel" aria-expanded="true">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class=" ">
                                            <div class="card-header ">
                                                <h4 class="card-title">{{ __('layout.Examinations') }}</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row bor-sep">

                                                    <div class="col-sm-12 pull-right">
                                                        @can('add-examiner')
                                                            <button class="btn btn-secondary pull-right btn-round"
                                                                    id="schedule-exam-btn">
                                                                Schedule Exam {{ __('layout.Classes') }}
                                                            </button>
                                                        @endcan
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="schedule-exam" tabindex="-1" role="dialog"
                                                     aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">

                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">{{ __('layout.Schedule_New_Exam') }}</h5>
                                                            </div>
                                                            <form id="Shedule-Exam-Form" method="post">
                                                                @csrf
                                                                <div class="modal-body row">
                                                                    <div class="col-sm-12 col-lg-12 bor-sep">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 col-lg-3 select-wizard">
                                                                                <label>{{ __('layout.Exam_Type') }}</label>
                                                                                <select name="exam_Type"
                                                                                        class="selectpicker"
                                                                                        data-size="7"
                                                                                        data-style="btn btn-secondary btn-round"
                                                                                        title="{{ __('layout.Choose_type') }}">
                                                                                    <option value="" disabled selected>
                                                                                        {{ __('layout.Choose_type') }}
                                                                                    </option>
                                                                                    @foreach($exam_types as $exam_type)
                                                                                        <option value="{{$exam_type->exm_typ_Id}}">{{$exam_type->exm_typ_Name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error exam_Type"></div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-lg-3 select-wizard">
                                                                                <label class="col-sm-12">{{ __('layout.Section') }}</label>
                                                                                <select name="school_Section[]" multiple
                                                                                        class="selectpicker "
                                                                                        data-size="5"
                                                                                        id="number-multiple"
                                                                                        data-style="btn btn-secondary btn-round"
                                                                                        data-container=""
                                                                                        data-live-search="false"
                                                                                        title="{{ __('layout.Choose_section') }}"
                                                                                        data-hide-disabled="true"
                                                                                        data-actions-box="true"
                                                                                        data-virtual-scroll="false">
                                                                                    {{--<option value="" disabled>
                                                                                        {{ __('layout.Choose_section') }}
                                                                                    </option>--}}
                                                                                    @foreach($school_sections as $school_section)
                                                                                        <option value="{{$school_section->sc_sec_Id}}">{{$school_section->sc_sec_name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error school_Section"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
 
                                                                    <div class="col-sm-12 col-lg-12">
                                                                        <div class="row">
                                                                            <div class="form-group col-sm-12 col-lg-4">
                                                                                <label>{{ __('layout.Exam_name') }}</label>
                                                                                <input type="text" class="form-control"
                                                                                       placeholder="" name="exam_Name">
                                                                                <div class="add-div-error exam_Name"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-lg-4">
                                                                                <label>{{ __('layout.Start_date') }}</label>
                                                                                <input type="text"
                                                                                       class="form-control datepicker"
                                                                                       placeholder="" name="exam_Start">
                                                                                <div class="add-div-error exam_Start"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-lg-4">
                                                                                <label>{{ __('layout.End_date') }}</label>
                                                                                <input type="text"
                                                                                       class="form-control datepicker"
                                                                                       placeholder="" name="exam_End">
                                                                                <div class="add-div-error exam_End"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-lg-12">
                                                                                <label>{{ __('layout.Comments') }}</label>
                                                                                <textarea type="text"
                                                                                          class="form-control"
                                                                                          placeholder=""
                                                                                          name="exam_Comment"></textarea>
                                                                                <div class="add-div-error exam_Comment"></div>
                                                                            </div>

                                                                            <div class="col-sm-12 form-group form-check">
                                                                                <label class="form-check-label">
                                                                                    <input class="form-check-input" type="checkbox" name="exam_Status" value="Active">
                                                                                    <span class="form-check-sign"></span>
                                                                                    {{ __('layout.Check_if_you_want_to_Active') }}
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit"
                                                                                class="btn btn-success btn-round btn-link"
                                                                                id="add-schedule-exam-btn">{{ __('layout.Save') }}
                                                                        </button>

                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                                class="btn btn-danger btn-round btn-link" data-dismiss="modal"
                                                                                >{{ __('layout.Cancel') }}
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal fade" id="edit-schedule-exam-modal" tabindex="-1"
                                                     role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">{{ __('layout.Edit_Schedule_Exam') }}</h5>
                                                            </div>
                                                            <form method="post" id="Edit-Exam-Form">
                                                                @csrf
                                                                <input type="hidden" name="id" value=""
                                                                       id="edit-exam-id">

                                                                <div class="modal-body row">
                                                                    <div class="col-sm-12 col-lg-12 bor-sep">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 col-lg-4 select-wizard">
                                                                                <label>{{ __('layout.Exam_Type') }}</label>
                                                                                <select name="exam_Type" id="edit-exam-type"
                                                                                        class="selectpicker" data-size="7"
                                                                                        data-style="btn btn-secondary btn-round"
                                                                                        title="{{ __('layout.Choose_type') }}">
                                                                                    <option value="" disabled selected>
                                                                                        {{ __('layout.Choose_type') }}
                                                                                    </option>
                                                                                    @foreach($exam_types as $exam_type)
                                                                                        <option value="{{$exam_type->exm_typ_Id}}">{{$exam_type->exm_typ_Name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="edit-div-error exam_Type"></div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-lg-4 select-wizard">
                                                                                <label class="col-sm-12">{{ __('layout.Section') }}</label>
                                                                                <select name="school_Section[]"
                                                                                        id="edit-school-section" multiple
                                                                                        class="selectpicker " data-size="5"
                                                                                        data-style="btn btn-secondary btn-round"
                                                                                        data-container="" 
                                                                                        title="{{ __('layout.Choose_section') }}"
                                                                                         >
                                                                                    @foreach($school_sections as $school_section)
                                                                                        <option value="{{$school_section->sc_sec_Id}}">{{$school_section->sc_sec_name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="edit-div-error school_Section"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="col-sm-12 col-lg-12">
                                                                        <div class="row">
                                                                            <div class="form-group col-sm-12 col-lg-4">
                                                                                <label>{{ __('layout.Exam_name') }}</label>
                                                                                <input type="text" class="form-control"
                                                                                       placeholder="" name="exam_Name"
                                                                                       id="edit-exam-name">
                                                                                <div class="edit-div-error exam_Name"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-lg-4">
                                                                                <label>{{ __('layout.Start_date') }}</label>
                                                                                <input type="text"
                                                                                       class="form-control datepicker"
                                                                                       placeholder="" name="exam_Start"
                                                                                       id="edit-exam-start">
                                                                                <div class="edit-div-error exam_Start"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-lg-4">
                                                                                <label>{{ __('layout.End_date') }}</label>
                                                                                <input type="text"
                                                                                       class="form-control datepicker"
                                                                                       placeholder="" name="exam_End"
                                                                                       id="edit-exam_end">
                                                                                <div class="edit-div-error exam_End"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-lg-12">
                                                                                <label>{{ __('layout.Comments') }}</label>
                                                                                <textarea type="text" class="form-control"
                                                                                          placeholder="" name="exam_Comment"
                                                                                          id="edit-exam-Comment"></textarea>
                                                                                <div class="edit-div-error exam_Comment"></div>
                                                                            </div>
                                                                            <div class="col-sm-12 form-group form-check">
                                                                                <label class="form-check-label">
                                                                                    <input class="form-check-input" type="checkbox" id="edit-exam-Status" name="exam_Status" value="Active">
                                                                                    <span class="form-check-sign"></span>
                                                                                    {{ __('layout.Check_if_you_want_to_Active') }}
                                                                                </label>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit"
                                                                                class="btn btn-success btn-round btn-link" id="schedule-update-exam-btn">
                                                                            {{ __('layout.Update') }}
                                                                        </button>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                                class="btn btn-danger btn-round btn-link" data-dismiss="modal"
                                                                                data-dismiss="">{{ __('layout.Cancel') }}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="show-schedule-exam-modal" tabindex="-1" role="dialog"
                                                     aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">{{ __('layout.View_Exam') }}</h5>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-sm-12 col-lg-3">
                                                                    <div class="row">

                                                                        <div class=" col-sm-12 col-lg-12">
                                                                            <label>{{ __('layout.Exam_Type') }}</label>
                                                                            <p id="show-exam-type"></p>
                                                                        </div>
                                                                        <div class="col-sm-12 col-lg-12">
                                                                            <label class="col-sm-12">{{ __('layout.Section') }}</label>
                                                                            <p class="show-school-section">{{ __('layout.School_Section') }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="col-sm-12 col-lg-9">
                                                                    <div class="row">
                                                                        <div class="form-group col-sm-12 col-lg-4">
                                                                            <label>{{ __('layout.Exam_name') }}</label>
                                                                            <p id="show-exam-name"></p>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-lg-4">
                                                                            <label>{{ __('layout.Start_date') }}</label>
                                                                            <p id="show-exam-start-date"></p>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-lg-4">
                                                                            <label>{{ __('layout.End_date') }}</label>
                                                                            <p id="show-exam-end-date"></p>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-lg-8">
                                                                            <label>{{ __('layout.Comments') }}</label>
                                                                            <p id="show-exam-comment"></p>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-lg-4">
                                                                            <label>{{ __('layout.Status') }}</label>
                                                                            <p id="show-exam-status"></p>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <!--</div>-->
                                                            <div class="modal-footer">
                                                                 
                                                                <div class="">
                                                                    <button type="button"
                                                                            class="btn btn-danger btn-round btn-link"
                                                                            data-dismiss="modal">{{ __('layout.Close') }}
                                                                    </button>
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
                                                            <h6 class="card-title">{{ __('layout.Examinations_Record_List') }}</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="toolbar">

                                                                <div class="row">


                                                                    <div class="form-group col-sm-2 select-wizard">
                                                                        <select class="selectpicker filter_schedule_exam" id="filter_schedule_exam_name" data-size="5" name="filter_schedule_exam_name" data-style="btn btn-sm btn-secondary btn-round" title="Exam" required="true">
                                                                            <option value="" disabled>Exam</option>
                                                                            <option value="all">All</option>
                                                                            @foreach($exams as $exam)
                                                                                <option value="{{$exam->exam_Id}}">{{$exam->exam_Name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group col-sm-2 select-wizard">
                                                                        <select class="selectpicker filter_schedule_exam" data-size="5" id="filter_schedule_exam_type" name="filter_schedule_exam_type" data-style="btn btn-sm btn-secondary btn-round"
                                                                                title="Exam Type" required="true">
                                                                            <option value="" disabled >Exam Type</option>
                                                                            <option value="all">All</option>
                                                                            @foreach($exam_types as $exam_type)
                                                                                <option value="{{$exam_type->exm_typ_Id}}">{{$exam_type->exm_typ_Name}}</option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>


                                                                    {{--<div class="col-sm-12 float-right">
                                                                        <button
                                                                                class="btn btn-simple btn-tumblr btn-icon float-right "><i
                                                                                    class="fa fa-print"
                                                                                    title="{{ __('layout.Print') }}"
                                                                                    data-toggle=""></i></button>
                                                                        <button
                                                                                class="btn btn-simple btn-tumblr btn-icon float-right "><i
                                                                                    class="fa fa-file-excel-o"
                                                                                    title="{{ __('layout.Export_to_Excel') }}"
                                                                                    data-toggle=""></i></button>
                                                                    </div>--}}
                                                                </div>
                                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                            </div>

                                                           @include('examiner.partials.exam_data')
                                                        </div><!-- end content-->
                                                    </div><!--  end card  -->
                                                </div> <!-- end col-md-12 -->
                                            </div> <!-- end row -->

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="setmarks" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class=" ">
                                            <div class="card-header ">
                                                <h4 class="card-title"> {{ __('layout.Marks') }}</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row bor-sep">

                                                    <div class="col-sm-12 pull-right">
                                                        @can('add-examiner')
                                                            <button class="btn btn-secondary btn-round pull-right"
                                                                    data-toggle="modal" id="set-exam-marks-btm">
                                                                {{ __('layout.Set_marks') }}
                                                            </button>
                                                        @endcan
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="set-marks-modal" tabindex="-1" role="dialog"
                                                     aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <form id="add-Set-marks-form">
                                                        @csrf
                                                        <div class="modal-dialog modal-xl modal-sm">

                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">{{ __('layout.Set_exam_marks') }}</h5>
                                                                </div>
                                                                <div class="modal-body row">
                                                                    <div class=" col-sm-12">
                                                                         @php

                                                        $exam_Module = config('constants.exam_Module')

                                                        @endphp


                                                                    </div>
                                                                    <div class="col-sm-12 col-lg-12">
                                                                        <div class="row bor-sep ">

                                                                            <div class="form-group col-sm-12 col-lg-3  select-wizard">
                                                                                <label>{{ __('layout.Exam') }}</label>
                                                                                <select class="selectpicker" data-size="7" name="exam_type" id="exam-name-dropdown"
                                                                                        data-style="btn btn-round btn btn-secondary"
                                                                                        title="{{ __('layout.Choose_exam') }}">
                                                                                    <option value="" disabled selected>
                                                                                        {{ __('layout.Choose_exam') }}
                                                                                    </option>
                                                                                    @foreach($exams as $exam_name)
                                                                                        <option value="{{$exam_name->exam_Id}}">{{$exam_name->exam_Name}}</option>
                                                                                    @endforeach

                                                                                </select>
                                                                                <div class="add-div-error exam_type"></div>
                                                                            </div>

                                                                            <div class="form-group col-sm-12 col-lg-3 select-wizard">
                                                                                <label>{{ __('layout.School_Section') }}</label>
                                                                                <select class="selectpicker" data-size="7" name="school_section" id="school-section-dropdown"
                                                                                        data-style="btn btn-round btn btn-secondary"
                                                                                        title="{{ __('layout.Choose_Section') }}">
                                                                                    <option value="" disabled selected>
                                                                                        {{ __('layout.Choose_Section') }}
                                                                                    </option>
                                                                                    @foreach($school_sections as $school_section)
                                                                                        <option value="{{$school_section->sc_sec_Id}}">{{$school_section->sc_sec_name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error school_section"></div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-lg-3 form-group select-wizard">
                                                                                <label>{{ __('layout.Subject') }}</label>

                                                                                <select class="selectpicker set-subject-marks" data-size="7" data-modules="{{implode(',',$exam_Module)}}"  name="subject" id="set-subject-marks"
                                                                                        data-style="btn btn-round btn btn-secondary"
                                                                                        title="{{ __('layout.Choose_subject') }}">
                                                                                    <option value="" disabled selected>
                                                                                        {{ __('layout.Choose_Subject') }}
                                                                                    </option>
                                                                                    @foreach($subjects as $subject)
                                                                                        <option value="{{$subject->sub_Id}}">{{$subject->subject}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error subject"></div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <button type="button" class="btn btn-icon btn btn-outline-choice btn-round pull-right clone-setmarks-btn" data-modules="{{implode(',',$exam_Module)}}" name="Add" title="{{ __('layout.Add') }}"
                                                                                        value="">
                                                                                    <i class="text-center fa fa-plus fa-lg"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <br> <br>
{{--                                                                    <div class="divider"></div>--}}
                                                                    <div class="col-sm-12 col-lg-12">
                                                                        <table class="table table-hover custom_border setmarks-dataTable" id="setmarks-dataTable">
                                                                           <thead class="table-secondary">
                                                                            <tr class="text-secondary">
                                                                                <th>{{ __('layout.Module') }}</th>
                                                                                <th>{{ __('layout.Total_Marks') }}</th>
                                                                                <th>{{ __('layout.Passing_%age') }}</th>
                                                                                <th>{{ __('layout.Actions') }}</th>
                                                                            </tr>
                                                                           </thead>
                                                                            <tbody>
                                                                            <tr id="setmark-row" class="setmark-row">

                           
                                                                                <td>
                                                                                    <div class="select-wizard">
                                                                                        <select class="selectpicker" name="module[]"
                                                                                                data-size="7"
                                                                                                data-style="btn btn-round btn btn-secondary"
                                                                                                title="{{ __('layout.Choose_module') }}">
                                                                                            <option value="" disabled
                                                                                                    selected>{{ __('layout.Choose_module') }}
                                                                                            </option>
                                                                                            
                                                                                            <?php

                                                                                            $exam_Module = config('constants.exam_Module')
                                                                                             ?>
                                                                                             @foreach($exam_Module as $key=>$val)

                                                                                                <option value="{{$val}}">{{$val}}</option>
                                                                                            @endforeach

                                                                                        </select>
                                                                                        <div class="add-div-error module"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control"
                                                                                           name="total_marks[]"/>
                                                                                    <div class="add-div-error total_marks"></div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="percentage[]"
                                                                                           class="form-control"/>
                                                                                    <div class="add-div-error percentage"></div>
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <div class="form-inline pull-left">
                                                                                        <div class="">
                                                                                            
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                   
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>


                                                                        </table>
                                                                    </div>
                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit"
                                                                                class="btn btn-success btn-round btn-link" id="add-set-marks-btn"
                                                                        >{{ __('layout.Save') }}
                                                                        </button>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                                class="btn btn-danger btn-round btn-link" data-dismiss="modal">
                                                                            {{ __('layout.Cancel') }}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal fade" id="edit-set-marks-modal" tabindex="-1" role="dialog"
                                                     aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <form id="edit-Set-marks-form">
                                                        @csrf
                                                        <input type="hidden" name="id" id="edit-setmarks-id">
                                                        <div class="modal-dialog modal-xl modal-sm">

                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">{{ __('layout.Edit_Set_exam_marks') }}</h5>
                                                                </div>
                                                                <div class="modal-body row">
                                                                    <div class=" col-sm-12">
                                                                        <button type="button"   class="btn btn-icon btn btn-outline-choice btn-round pull-right edit-clone-setmarks-btn" name="Add"
                                                                                title="{{ __('layout.Add') }}" value="">
                                                                            <i class="text-center fa fa-plus fa-lg"></i></button>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="row">

                                                                            <div class="form-group col-sm-12 select-wizard">
                                                                                <label>{{ __('layout.Exam') }}</label>
                                                                                <select class="selectpicker" data-size="7" name="exam_type" id="edit-setmarks-exam-name"
                                                                                        data-style="btn btn-round btn btn-secondary"
                                                                                        title="{{ __('layout.Choose_exam') }}">
                                                                                    <option value="">{{ __('layout.Choose_exam') }}</option>
                                                                                    @foreach($exams as $exam_name)
                                                                                        <option value="{{$exam_name->exam_Id}}">{{$exam_name->exam_Name}}</option>
                                                                                    @endforeach

                                                                                </select>
                                                                                <div class="edit-div-error exam_type"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 select-wizard">
                                                                                <label>{{ __('layout.School_Section') }}</label>
                                                                                <select class="selectpicker" data-size="7" name="school_section" id="edit-setmarks-school_section"
                                                                                        data-style="btn btn-round btn btn-secondary"
                                                                                        title="{{ __('layout.Choose_Section') }}">
                                                                                    <option value="" disabled selected>
                                                                                        {{ __('layout.Choose_Section') }}
                                                                                    </option>
                                                                                    @foreach($school_sections as $school_section)
                                                                                        <option value="{{$school_section->sc_sec_Id}}">{{$school_section->sc_sec_name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="edit-div-error school_section"></div>
                                                                            </div>
                                                                            <div class="col-sm-12 select-wizard">
                                                                                <label>{{ __('layout.Subject') }}</label>
                                                                                <select class="selectpicker" data-size="7" name="subject" id="edit-setmarks-subject"
                                                                                        data-style="btn btn-round btn btn-secondary"
                                                                                        title="{{ __('layout.Choose_Subject') }}">
                                                                                    <option value="" disabled selected>
                                                                                        {{ __('layout.Choose_Subject') }}
                                                                                    </option>
                                                                                    @foreach($subjects as $subject)
                                                                                        <option value="{{$subject->sub_Id}}">{{$subject->subject}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="edit-div-error subject"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="col-md-9">
                                                                        <table class="table table-hover edit-setmarks-dataTable" id="edit-setmarks-dataTable">
                                                                            <thead class="text-secondary">
                                                                            <th>{{ __('layout.Module') }}</th>
                                                                            <th>{{ __('layout.Total_Marks') }}</th>
                                                                            <th>{{ __('layout.Passing_%age') }}</th>
                                                                            <th>{{ __('layout.Actions') }}</th>
                                                                            </thead>

                                                                            <tr id="setmark-row" class="setmark-row">

                                                                                  
                                                                                
                                                                                <td>
                                                                                    <div class="select-wizard">
                                                                                        <select class="selectpicker" name="module[]"
                                                                                                data-size="7"
                                                                                                data-style="btn btn-round btn btn-secondary"
                                                                                                title="choose module">
                                                                                            <option value="" disabled
                                                                                                    selected>{{ __('layout.Choose_module') }} 
                                                                                            </option>
                                                                                            <option value="Reading">{{ __('layout.Reading') }}
                                                                                            </option>
                                                                                            <option value="Writing">{{ __('layout.Writing') }}
                                                                                            </option>
                                                                                            <option value="Writing">{{ __('layout.Listending') }}
                                                                                            </option>
                                                                                            <option value="Speaking">{{ __('layout.Speaking') }}
                                                                                            </option>
                                                                                            <option value="Practical">{{ __('layout.Practical') }}
                                                                                            </option>
                                                                                            <option value="Theory">{{ __('layout.Theory') }}
                                                                                            </option>
                                                                                            <option value="Notebook
                                                                                            marks">{{ __('layout.Notebook_marks') }}
                                                                                            </option>
                                                                                            <option value="Behaviour">{{ __('layout.Behaviour') }}
                                                                                            </option>
                                                                                        </select>
                                                                                        <div class="edit-div-error module"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control"
                                                                                           name="total_marks[]"/>
                                                                                    <div class="edit-div-error total_marks"></div>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="percentage[]"
                                                                                           class="form-control"/>
                                                                                    <div class="edit-div-error percentage"></div>
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <div class="form-inline pull-left">
                                                                                        <div class="">
                                                                                            
                                                                                            <button class=" btn-icon btn-link btn btn-round btn-danger remove_setmarks-btn" id="remove-Setmarks-btn"
                                                                                                    style="visibility: hidden" title="{{ __('layout.Add_Row') }}" value="{{ __('layout.Add_Row') }}" type="button"
                                                                                                    data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">
                                                                                                <i class="fa fa-minus"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                   
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit"
                                                                                class="btn btn-secondary btn-sm btn-round btn-link" id="update-set-marks-btn"
                                                                        >{{ __('layout.Update') }}
                                                                        </button>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                                class="btn btn-danger btn-sm btn-round btn-link" data-dismiss="modal">
                                                                            {{ __('layout.Cancel') }}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal fade" id="show-set-marks-modal" tabindex="-1" role="dialog"
                                                     aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">

                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">{{ __('layout.Show_Set_exam_marks') }}</h5>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-sm-3">
                                                                    <div class="row">

                                                                        <div class="form-group col-sm-12 select-wizard">
                                                                            <label>{{ __('layout.Exam') }}</label>
                                                                            <p id="show-setmarks-exam-name"></p>

                                                                        </div>
                                                                        <div class="form-group col-sm-12 select-wizard">
                                                                            <label>{{ __('layout.School_Section') }}</label>
                                                                            <p id="show-setmarks-school_section"></p>

                                                                        </div>
                                                                        <div class="col-sm-12 select-wizard">
                                                                            <label>{{ __('layout.Subject') }}</label>
                                                                            <p id="show-setmarks-subject"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="col-md-9">
                                                                    <table class="table table-hover show-setmarks-dataTable" id="show-setmarks-dataTable">
                                                                        <thead class="text-secondary">
                                                                        <th>{{ __('layout.Module') }}</th>
                                                                        <th>{{ __('layout.Total_Marks') }}</th>
                                                                        <th>{{ __('layout.Passing_%age') }}</th>
                                                                        </thead>
                                                                        <tbody>

                                                                        
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <!--</div>-->
                                                            <div class="modal-footer">
                                                                <div class="">
                                                                    
                                                                </div>
                                                                
                                                                <div class="">
                                                                    <button type="button"
                                                                            class="btn btn-sm btn-danger btn-round btn-link" data-dismiss="modal">
                                                                        {{ __('layout.Close') }} 
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="card-header">
                                                            <h6 class="card-title">{{ __('layout.Marks_Record_List') }}</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="toolbar">
                                                                <div class="row">
                                                                    <div class="form-group col-sm-2 select-wizard">
                                                                        <select class="selectpicker filter_setmarks" data-size="5" id="setmark_exam_name" name="setmark_exam_name" data-style="btn btn-sm btn-secondary btn-round"
                                                                                title="{{ __('layout.Exam') }}" required="true">
                                                                            <option value="" disabled >{{ __('layout.Exam') }}</option>
                                                                            <option value="all">All</option>
                                                                            @foreach($exams as $exam)
                                                                                <option value="{{$exam->exam_Id}}">{{$exam->exam_Name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-sm-2 select-wizard">
                                                                        <select class="selectpicker filter_setmarks" data-size="5" id="setmark_school_section" name="setmark_school_section" data-style="btn btn-sm btn-secondary btn-round"
                                                                                title="{{ __('layout.School_Section') }}" required="true">
                                                                            <option value="" disabled >{{ __('layout.School_Section') }}</option>
                                                                            <option value="all">All</option>
                                                                            @foreach($school_sections as $school_section)
                                                                                <option value="{{$school_section->sc_sec_Id}}">{{$school_section->sc_sec_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                          {{--      <div class="row">
                                                                    <div class="col-sm-12 float-right">
                                                                        <button
                                                                                class="btn btn-simple btn-tumblr btn-icon float-right "><i
                                                                                    class="fa fa-print"
                                                                                    title="{{ __('layout.Print') }}"
                                                                                    data-toggle=""></i></button>
                                                                        <button
                                                                                class="btn btn-simple btn-tumblr btn-icon float-right "><i
                                                                                    class="fa fa-file-excel-o"
                                                                                    title="{{ __('layout.Export_to_Excel') }}"
                                                                                    data-toggle=""></i></button>
                                                                    </div>
                                                                </div>--}}
                                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                            </div>

                                                            @include('examiner.partials.setmarks_data')
                                                        </div><!-- end content-->
                                                    </div><!--  end card  -->
                                                </div> <!-- end col-md-12 -->
                                            </div> <!-- end row -->

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane" id="setgrades" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class=" ">
                                            <div class="card-header ">
                                                <h4 class="card-title">{{ __('layout.Grades') }}</h4>
                                            <div class="card-body">
                                                <div class="row bor-sep">

                                                    <div class="col-sm-12 pull-right">
                                                        @can('add-examiner')
                                                            <button class="btn btn-secondary btn-round pull-right"
                                                                    data-toggle="modal" id="set-grade-modal-btn">
                                                                {{ __('layout.Set_grades') }}
                                                            </button>
                                                        @endcan
                                                    </div>
                                                </div>
                                                {{--------------------------------add set-grades-modal start ------------------------------}}
                                                <div class="modal fade" id="set-grades-modal" tabindex="-1" role="dialog"
                                                     aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <form id="add-set-grade-form">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">{{ __('layout.Set_exam_grades') }}</h5>
                                                                </div>
                                                                <div class="modal-body ">
                                                                    <div class=" row bor-sep">

                                                                        <div class=" col-sm-12 col-lg-3 form-group select-wizard">
                                                                            <label>{{ __('layout.Exam') }}</label>
                                                                            <select class="selectpicker" data-size="7" name="exam_name" id="exam-grade-dropdown"
                                                                                    data-style="btn btn-secondary btn-round"
                                                                                    title="{{ __('layout.Choose_exam') }}">
                                                                                <option value="" disabled selected>
                                                                                    {{ __('layout.Choose_exam') }}
                                                                                </option>
                                                                                @foreach($exams as $exam_name)
                                                                                    <option value="{{$exam_name->exam_Id}}">{{$exam_name->exam_Name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <div class="add-div-error exam_name"></div>
                                                                        </div>
                                                                        <div class=" col-sm-12 col-lg-9">
                                                                            <button type="button" class="btn btn-icon btn btn-outline-choice btn-round pull-right clone-grade-btn" name="Add" title="Add{{ __('layout.Classes') }}"
                                                                                    value="">
                                                                                <i class="text-center fa fa-plus fa-lg"></i>
                                                                            </button>
                                                                        </div>

                                                                        <div class="col-sm-12 col-lg-3">
                                                                            <div class="row">


                                                                            </div>
                                                                        </div>

                                                                    </div>


{{--                                                                    <div class="divider"></div>--}}
                                                                    <div class="col-sm-12 col-lg-12">
                                                                        <table class="table table-hover custom_border markstable" id="markstable">
                                                                            <thead class="text-secondary table-secondary">

                                                                            <th>{{ __('layout.Grade') }}</th>
                                                                            <th>{{ __('layout.From_%age') }}</th>
                                                                            <th class="text-center">{{ __('layout.To_%age') }}</th>
                                                                            <th class="text-center">{{ __('layout.Comments') }}</th>
                                                                            <th class="text-center">{{ __('layout.Actions') }}</th>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr id="clone-grade-row">

                                                                                <td class="">
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                               class="form-control"
                                                                                               placeholder=""
                                                                                               name="exam_grade[]" required>
                                                                                        <div class="add-div-error exam_grade.0"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                               class="form-control"
                                                                                               placeholder=""
                                                                                               name="from_percentage[]" required>
                                                                                        <div class="add-div-error from_percentage.0"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                               class="form-control"
                                                                                               placeholder=""
                                                                                               name="to_percentage[]" required>
                                                                                        <div class="add-div-error to_percentage.0"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                               class="form-control"
                                                                                               placeholder=""
                                                                                               name="comment[]" required>
                                                                                        <div class="add-div-error comment.0"></div>

                                                                                    </div>
                                                                                </td>

                                                                                <td class="text-center">
                                                                                    <div class="form-inline pull-right">

                                                                                    
                                                                                    </div>

                                                                                    
                                                                                </td>
                                                                            </tr>

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit"
                                                                                class="btn btn-sm btn-sm btn-round btn-link" id="add-set-grade-modal-btn"
                                                                        >{{ __('layout.Save') }}
                                                                        </button>
                                                                    </div>
                                                                    <div class="divider"></div>

                                                                    <div class="">
                                                                        <button type="button"
                                                                                class="btn btn-sm btn-danger btn-round btn-link" data-dismiss="modal">
                                                                            {{ __('layout.Cancel') }}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                {{-------------------------------add set-grades-modal end ---------------------------------}}
                                                {{--------------------------------edit set-grades-modal start ------------------------------}}
                                                <div class="modal fade" id="edit-exam-grade-modal" tabindex="-1" role="dialog"
                                                     aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <form id="edit-set-grade-form">
                                                            <input type="hidden" name="id" id="edit-exam-grade-id">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">{{ __('layout.Edit_Set_exam_grades') }}</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class=" row bor-sep">

                                                                        <div class=" col-sm-12 col-lg-3 form-group select-wizard">
                                                                            <label>{{ __('layout.Exam') }}</label>
                                                                            <select class="selectpicker" data-size="7" name="exam_name" id="edit-grade_exam_name"
                                                                                    data-style="btn btn-secondary btn-round"
                                                                                    title="{{ __('layout.Choose_exam') }}">
                                                                                <option value="" disabled selected>
                                                                                    {{ __('layout.Choose_exam') }}
                                                                                </option>
                                                                                @foreach($exams as $exam_name)
                                                                                    <option value="{{$exam_name->exam_Id}}">{{$exam_name->exam_Name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <div class="edit-div-error exam_name"></div>
                                                                        </div>
                                                                        <div class=" col-sm-12 col-lg-9">
                                                                            <button type="button" class="btn btn-icon btn btn-outline-choice btn-round pull-right edit-clone-grade-btn" name="Add"
                                                                                    title="{{ __('layout.Add') }}"
                                                                                    value="">
                                                                                <i class="text-center fa fa-plus fa-lg"></i></button>
                                                                        </div>

                                                                    </div>


{{--                                                                    <div class="divider"></div>--}}
                                                                    <div class="col-sm-12 col-lg-12">
                                                                        <table class="table table-hover custom_border edit-exam-grade-table" id="edit-exam-grade-table">
                                                                            <thead class="text-secondary table-secondary">

                                                                            <th>{{ __('layout.Grade') }}</th>
                                                                            <th>{{ __('layout.From_%age') }}</th>
                                                                            <th class="text-center">{{ __('layout.To_%age') }}</th>
                                                                            <th class="text-center">{{ __('layout.Comments') }}</th>
                                                                            <th class="text-center">{{ __('layout.Actions') }}</th>
                                                                            </thead>
                                                                            <tbody>
                                                                            <tr id="clone-grade-row">

                                                                                <td class="">
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                               class="form-control"
                                                                                               placeholder=""
                                                                                               name="exam_grade[]" required>
                                                                                        <div class="edit-div-error exam_grade"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                               class="form-control"
                                                                                               placeholder=""
                                                                                               name="from_percentage[]" required>
                                                                                        <div class="edit-div-error from_percentage"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                               class="form-control"
                                                                                               placeholder=""
                                                                                               name="to_percentage[]" required>
                                                                                        <div class="add-div-error to_percentage"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                               class="form-control"
                                                                                               placeholder=""
                                                                                               name="comment[]" required>
                                                                                        <div class="add-div-error comment"></div>

                                                                                    </div>
                                                                                </td>

                                                                                <td class="text-center">
                                                                                    <div class="form-inline pull-right">

                                                                                       
                                                                                    </div>

                                                                                    <!--<a href="../../examples/pages/withdraw-student.html" class="btn btn-danger btn-link btn-icon btn-sm edit" title="withdraw"><i class="fa fa-times"></i></a>-->
                                                                                </td>
                                                                            </tr>

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="submit"
                                                                                class="btn btn-secondary btn-sm btn-round btn-link" id="edit-set-grade-modal-btn"
                                                                        >{{ __('layout.Update') }}
                                                                        </button>
                                                                    </div>
                                                                    <div class="divider"></div>

                                                                    <div class="">
                                                                        <button type="button"
                                                                                class="btn btn-sm btn-danger btn-round btn-link" data-dismiss="modal">
                                                                            {{ __('layout.Cancel') }}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                {{-------------------------------edit set-grades-modal end ---------------------------------}}
                                                {{--------------------------------show set-grades-modal start ------------------------------}}
                                                <div class="modal fade" id="show-exam-grade-modal" tabindex="-1" role="dialog"
                                                     aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">

                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">{{ __('layout.View_exam_grades') }}</h5>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-sm-12 col-lg-3">
                                                                    <div class="row">

                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>{{ __('layout.Exam') }}</label>
                                                                            <p id="show-exam-grade-name"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
{{--                                                                <div class="divider"></div>--}}
                                                                <div class="col-md-12 col-lg-12">
                                                                    <table class="table table-hover custom_border show-exams-grade-table" id="show-exams-grade-table">
                                                                        <thead class="text-secondary table-secondary">

                                                                        <th>{{ __('layout.Grade') }}</th>
                                                                        <th>{{ __('layout.From_%age') }}</th>
                                                                        <th class="text-center">{{ __('layout.To_%age') }}</th>
                                                                        <th class="text-center">{{ __('layout.Comments') }}</th>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr id="show-exam-grade-row">

                                                                            <td class="">
                                                                                <div class="form-group">
                                                                                    <p id="show-exam_grade"></p>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <p id="show-exam-grade-from-percentage"></p>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <div class="form-group">
                                                                                    <p id="show-exam-grade-to-percentage"></p>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <div class="form-group">
                                                                                    <p id="show-exam-grade-comment"></p>

                                                                                </div>
                                                                            </td>

                                                                            <td class="text-center">
                                                                                <div class="form-inline pull-right">

                                                                                   
                                                                                </div>

                                                                               
                                                                            </td>
                                                                        </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <!--</div>-->
                                                            <div class="modal-footer">
                                                                <div class="">
                                                                    <button type="button"
                                                                            class="btn btn-sm btn-danger btn-round btn-link" data-dismiss="modal">
                                                                        {{ __('layout.Close') }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--------------------------------show set-grades-modal start ------------------------------}}


                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="card-header">
                                                            <h6 class="card-title">{{ __('layout.Grades_Record_List') }}</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="toolbar">
                                                                <div class="row">
                                                                    <div class="form-group col-sm-2 select-wizard">
                                                                        <select class="selectpicker" data-size="5" id="grade_exam_name" name="grade_exam_name" data-style="btn btn-sm btn-secondary btn-round"
                                                                                title="{{ __('layout.Exam') }}" required="true">
                                                                            <option value="" disabled >{{ __('layout.Exam') }}</option>
                                                                            <option value="all" >All</option>

                                                                            @foreach($exams as $exam)
                                                                                <option value="{{$exam->exam_Id}}">{{$exam->exam_Name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                            </div>
                                                            @include('examiner.partials.grade_data')

                                                        </div><!-- end content-->
                                                    </div><!--  end card  -->
                                                </div> <!-- end col-md-12 -->
                                            </div> <!-- end row -->
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                            <div class="tab-pane" id="setsyllabus" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class=" ">
                                            <div class="card-header ">
                                                <h4 class="card-title">Syllabus</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row bor-sep">

                                                    <div class="col-sm-12 pull-right">
                                                        @can('add-examiner')
                                                            <button class="btn btn-secondary btn-round pull-right"
                                                                    data-toggle="modal" id="set-syllabus-btn">
                                                                Upload syllabus
                                                            </button>
                                                        @endcan
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
                                                                    <h5 class="title title-up">{{ __('layout.Set_exam_syllabus') }}</h5>
                                                                </div>
                                                                <div class="modal-body row">
                                                                    <div class="col-sm-12">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 col-lg-4 select-wizard">
                                                                                <label>{{ __('layout.Exam') }}</label>
                                                                                <select class="selectpicker" data-size="7" name="exam_name" id="exam-syllabus-dropdown"
                                                                                        data-style="btn btn-secondary btn-round"
                                                                                        title="{{ __('layout.Choose_exam') }}">
                                                                                    <option value="" selected>
                                                                                        {{ __('layout.Choose_exam') }}
                                                                                    </option>
                                                                                    @foreach($exams as $exam_name)
                                                                                        <option value="{{$exam_name->exam_Id}}">{{$exam_name->exam_Name}}</option>
                                                                                    @endforeach

                                                                                </select>
                                                                                <div class="add-div-error exam_name"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 col-lg-4 select-wizard">
                                                                                <label>{{ __('layout.Class') }}</label>
                                                                                <select class="selectpicker syllabus_cls_id" data-size="7" name="class_name" id="exam-syllabus-class-dropdown"
                                                                                        data-style="btn btn-secondary btn-round"
                                                                                        title="{{ __('layout.Choose_class') }}">
                                                                                    <option value="" selected>
                                                                                        {{ __('layout.Choose_class') }}
                                                                                    </option>
                                                                                    @foreach($classes as $class)
                                                                                        <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error class_name"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 col-lg-4 select-wizard">
                                                                                <label>{{ __('layout.Subject') }}</label>
                                                                                <select class="selectpicker" data-size="7" name="subject_name" id="exam-syllabus-subject"
                                                                                        data-style="btn btn-secondary btn-round"
                                                                                        title="{{ __('layout.Choose_Subject') }}">
                                                                                    <option value="" selected>
                                                                                        {{ __('layout.Choose_Subject') }}
                                                                                    </option>
                                                                                    @foreach($subjects as $subject)
                                                                                        <option value="{{$subject->sub_Id}}">{{$subject->subject}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error subject_name"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12">

                                                                                <label class="form-control-label" for="">{{ __('layout.Upload_Document') }}</label>

                                                                                <div class="custom-file">
                                                                                    <input type="file" name="exam_syllabus_file"
                                                                                           class="custom-file-input form-control"
                                                                                           id="input-document3"
                                                                                           accept="image/*">
                                                                                    <label class="custom-file-label"
                                                                                           for="input-document3">{{ __('layout.Select_scanned_document') }}</label>
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
                                                                                class="btn btn-secondary btn-sm btn-round btn-link" id="add-syllabus-save-btn">{{ __('layout.Save') }}
                                                                        </button>
                                                                    </div>
                                                                    <div class="divider"></div>

                                                                    <div class="">
                                                                        <button type="button"
                                                                                class="btn btn-sm btn-danger btn-round btn-link" data-dismiss="modal">
                                                                            {{ __('layout.Cancel') }}
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
                                                                    <h5 class="title title-up">{{ __('layout.Edit_Set_exam_syllabus') }}</h5>
                                                                </div>
                                                                <div class="modal-body row">
                                                                    <div class="col-sm-12">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 col-lg-4 select-wizard">
                                                                                <label>{{ __('layout.Exam') }}</label>
                                                                                <select class="selectpicker" data-size="7" name="exam_name" id="edit-exam-syllabus-dropdown"
                                                                                        data-style="btn btn-secondary btn-round"
                                                                                        title="{{ __('layout.Choose_exam') }}">
                                                                                    <option value="" selected>
                                                                                        {{ __('layout.Choose_exam') }}
                                                                                    </option>
                                                                                    @foreach($exams as $exam_name)
                                                                                        <option value="{{$exam_name->exam_Id}}">{{$exam_name->exam_Name}}</option>
                                                                                    @endforeach

                                                                                </select>
                                                                                <div class="edit-div-error exam_name"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 col-lg-4 select-wizard">
                                                                                <label>{{ __('layout.Class') }}</label>
                                                                                <select class="selectpicker edit-exam-syllabus-class-dropdown" data-size="7" name="class_name" id="edit-exam-syllabus-class-dropdown"
                                                                                        data-style="btn btn-secondary btn-round"
                                                                                        title="{{ __('layout.Choose_class') }}">
                                                                                    <option value="" selected>
                                                                                        {{ __('layout.Choose_class') }}
                                                                                    </option>
                                                                                    @foreach($classes as $class)
                                                                                        <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="edit-div-error class_name"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 col-lg-4 select-wizard">
                                                                                <label>{{ __('layout.Subject') }}</label>
                                                                                <select class="selectpicker edit-syllabus-subject-name" data-size="7" name="subject_name" id="edit-syllabus-subject-name"
                                                                                        data-style="btn btn-secondary btn-round"
                                                                                        title="{{ __('layout.Choose_subject') }}">
                                                                                    <option value="" selected>
                                                                                        {{ __('layout.Choose_subject') }}
                                                                                    </option>
                                                                                    @foreach($subjects as $subject)
                                                                                        <option value="{{$subject->sub_Id}}">{{$subject->subject}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="edit-div-error subject_name"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12">

                                                                                <label class="form-control-label" for="">{{ __('layout.Upload_Document') }}</label>

                                                                                <div class="custom-file">
                                                                                    <input type="file" name="exam_syllabus_file"
                                                                                           class="custom-file-input form-control"
                                                                                           id="input-document4"
                                                                                           accept="image/*">
                                                                                    <label class="custom-file-label"
                                                                                           for="input-document4"> {{ __('layout.Select_scanned_document') }}</label>
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
                                                                                class="btn btn-secondarybtn-sm btn-round btn-link" id="update-syllabus-btn">{{ __('layout.Update') }}
                                                                        </button>
                                                                    </div>
                                                                    <div class="divider"></div>

                                                                    <div class="">
                                                                        <button type="button"
                                                                                class="btn btn-sm btn-danger btn-round btn-link" data-dismiss="modal">
                                                                            {{ __('layout.Cancel') }}
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
                                                            <h6 class="card-title">{{ __('layout.Syllabus_Record_List') }}</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="toolbar">
                                                                <div class="row">


                                                                    <div class="form-group col-sm-2 select-wizard">
                                                                        <select class="selectpicker filter_syllabus" id="filter_syllabus_exam" data-size="5" name="filter_syllabus_exam" data-style="btn btn-sm btn-secondary btn-round" title="Exam" required="true">
                                                                            <option value="" disabled>Exam</option>
                                                                            <option value="all" >All</option>

                                                                            @foreach($exams as $exam)
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

                                                            @include('examiner.partials.syllabus_data')

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
                                                <h4 class="card-title">{{ __('layout.Exam_papers') }}</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row bor-sep">

                                                    <div class="col-sm-12 pull-right">
                                                        @can('add-examiner')
                                                            <button class="btn btn-secondary btn-round pull-right"
                                                                    data-toggle="modal" id="set-exam-paper-btn">
                                                                {{ __('layout.Upload_paper') }}
                                                            </button>
                                                        @endcan
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
                                                                    <h5 class="title title-up">{{ __('layout.upload_exam_paper') }}</h5>
                                                                </div>
                                                                <div class="modal-body row">
                                                                    <div class="col-sm-12">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 col-lg-4 select-wizard">
                                                                                <label>{{ __('layout.Exam') }}</label>
                                                                                <select class="selectpicker" data-size="7" name="exam_name" id="exam-paper-dropdown"
                                                                                        data-style="btn btn-secondary btn-round"
                                                                                        title="{{ __('layout.Choose_exam') }}">
                                                                                    <option value="" disabled selected>
                                                                                        {{ __('layout.Choose_exam') }}
                                                                                    </option>
                                                                                    @foreach($exams as $exam_name)
                                                                                        <option value="{{$exam_name->exam_Id}}">{{$exam_name->exam_Name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error exam_name"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12  col-lg-4 select-wizard">
                                                                                <label>{{ __('layout.Class') }}</label>
                                                                                <select class="selectpicker exam-paper-class-dropdown" data-size="7" name="exam_class" id="exam-paper-class-dropdown"
                                                                                        data-style="btn btn-secondary btn-round"
                                                                                        title="{{ __('layout.Choose_class') }}">
                                                                                    <option value="" disabled selected>
                                                                                        {{ __('layout.Choose_class') }}
                                                                                    </option>
                                                                                    @foreach($classes as $class)
                                                                                        <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error exam_class"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12  col-lg-4 select-wizard">
                                                                                <label>{{ __('layout.Subject') }}</label>
                                                                                <select class="selectpicker" data-size="7" name="exam_subject" id="exam-paper-subject-dropdown"
                                                                                        data-style="btn btn-secondary btn-round"
                                                                                        title="{{ __('layout.Choose_Subject') }}">
                                                                                    <option value="" disabled selected>
                                                                                        {{ __('layout.Choose_Subject') }}
                                                                                    </option>
                                                                                    @foreach($subjects as $subject)
                                                                                        <option value="{{$subject->sub_Id}}">{{$subject->subject}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error exam_subject"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12">

                                                                                <label class="form-control-label" for="">{{ __('layout.Upload_Document') }}</label>
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="exam_paper_file"
                                                                                           class="custom-file-input form-control"
                                                                                           id="input-document6"
                                                                                           accept="image/*">
                                                                                    <label class="custom-file-label"
                                                                                           for="input-document6">{{ __('layout.Select_scanned_document') }}</label>
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
                                                                        >{{ __('layout.Save') }}
                                                                        </button>
                                                                    </div>
                                                                    <div class="divider"></div>

                                                                    <div class="">
                                                                        <button type="button"
                                                                                class="btn btn-danger btn-sm btn-round btn-link" data-dismiss="modal">
                                                                            {{ __('layout.Cancel') }}
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
                                                                    <h5 class="title title-up">{{ __('layout.edit_upload_exam_paper') }}</h5>
                                                                </div>
                                                                <div class="modal-body row">
                                                                    <div class="col-sm-12">
                                                                        <div class="row">

                                                                            <div class=" col-sm-12 col-lg-4 select-wizard">
                                                                                <label>{{ __('layout.Exam') }}</label>
                                                                                <select class="selectpicker" data-size="7" name="exam_name" id="edit-exam-paper-dropdown"
                                                                                        data-style="btn btn-secondary btn-round"
                                                                                        title="{{ __('layout.Choose_exam') }}">
                                                                                    <option value="" disabled selected>
                                                                                        {{ __('layout.Choose_exam') }}
                                                                                    </option>
                                                                                    @foreach($exams as $exam_name)
                                                                                        <option value="{{$exam_name->exam_Id}}">{{$exam_name->exam_Name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error exam_name"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 col-lg-4  select-wizard">
                                                                                <label>{{ __('layout.Class') }}</label>
                                                                                <select class="selectpicker edit-exam-paper-class-dropdown" data-size="7" name="exam_class" id="edit-exam-paper-class-dropdown"
                                                                                        data-style="btn btn-secondary btn-round"
                                                                                        title="{{ __('layout.Choose_class') }}">
                                                                                    <option value="" disabled selected>
                                                                                        {{ __('layout.Choose_class') }}
                                                                                    </option>
                                                                                    @foreach($classes as $class)
                                                                                        <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error exam_class"></div>
                                                                            </div>
                                                                            <div class=" col-sm-12 col-lg-4 select-wizard">
                                                                                <label>{{ __('layout.Subject') }}</label>
                                                                                <select class="selectpicker" data-size="7" name="exam_subject" id="edit-exam-paper-subject"
                                                                                        data-style="btn btn-secondary btn-round"
                                                                                        title="{{ __('layout.Choose_subject') }}">
                                                                                    <option value="" disabled selected>
                                                                                        {{ __('layout.Choose_subject') }}
                                                                                    </option>
                                                                                    @foreach($subjects as $subject)
                                                                                        <option value="{{$subject->sub_Id}}">{{$subject->subject}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <div class="add-div-error exam_subject"></div>
                                                                            </div>
                                                                            <div class="form-group col-sm-12">

                                                                                <label class="form-control-label" for="">{{ __('layout.Upload_Document') }}</label>
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="exam_paper_file"
                                                                                           class="custom-file-input form-control"
                                                                                           id="input-document7"
                                                                                           accept="image/*">
                                                                                    <label class="custom-file-label"
                                                                                           for="input-document7">{{ __('layout.Select_scanned_document') }}</label>
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
                                                                        >{{ __('layout.Update') }}
                                                                        </button>
                                                                    </div>
                                                                    <div class="divider"></div>

                                                                    <div class="">
                                                                        <button type="button"
                                                                                class="btn btn-sm btn-danger btn-round btn-link" data-dismiss="modal">
                                                                            {{ __('layout.Cancel') }}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                {{--edit set-exam-paper-modal end--}}


                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="card-header">
                                                            <h6 class="card-title">{{ __('layout.Papers_Record_List') }}</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="toolbar">
                                                                <div class="row">


                                                                    <div class="form-group col-sm-2 select-wizard">
                                                                        <select class="selectpicker filter_paper" data-size="5"  id="filter_paper_exam" name="filter_paper_exam" data-style="btn btn-sm btn-secondary btn-round" title="Exam" required="true">
                                                                            <option value="" disabled>Exam</option>
                                                                            <option value="all" >All</option>

                                                                            @foreach($exams as $exam)
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
                                                            @include('examiner.partials.paper_data')
                                                        </div><!-- end content-->
                                                    </div><!--  end card  -->
                                                </div> <!-- end col-md-12 -->
                                            </div> <!-- end row -->

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane" id="datesheet" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class=" ">
                                            <div class="card-header ">
                                                <h4 class="card-title">{{ __('layout.Date_sheet') }}</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row bor-sep">

                                                    <div class="col-sm-12 pull-right">
                                                        @can('add-examiner')
                                                            <button class="btn btn-secondary btn-round pull-right"
                                                                    data-toggle="modal" id="show-datesheet-modal-btn">
                                                                {{ __('layout.Create') }}
                                                            </button>
                                                        @endcan
                                                    </div>
                                                </div>
                                                {{--Craete Date Sheet Modal--}}
                                                <div class="modal fade" id="create-datesheet-modal" tabindex="-1" role="dialog"
                                                     aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <form id="add-date-sheet-form">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">{{ __('layout.New_Date_sheet') }}</h5>
                                                                </div>
                                                                <div class=" modal-body">
                                                                    <div class="row bor-sep">
                                                                        <div class="col-sm-12 col-lg-3 select-wizard">
                                                                            <label class="col-sm-12">{{ __('layout.Exam') }}</label>
                                                                            <select class="selectpicker" name="exam" id="datesheet-exam-dropdownexam" data-container="" data-size="5"
                                                                                    data-style="btn btn-round btn-choice" title="{{ __('layout.Choose_Exam') }}" data-live-search="true" data-hide-disabled="true">
                                                                                <option value="" disabled selected>Choose Exam{{ __('layout.Choose_Exam') }}</option>
                                                                                @foreach($exams as $exam_name)
                                                                                    <option value="{{$exam_name->exam_Id}}">{{$exam_name->exam_Name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <div class="add-div-error exam"></div>
                                                                        </div>

                                                                        <div class="form-group has-label col-sm-12 col-lg-9">

                                                                            <button type="button" class="btn btn-icon btn btn-outline-choice btn-round pull-right"
                                                                                    id="append-datesheet-row-btn" name="Add" title=" {{ __('layout.Add_Exam_Paper') }}"
                                                                                    value="">
                                                                                <i class="text-center fa fa-plus fa-lg"></i></button>

                                                                        </div>

                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="">
                                                                            <div class="card-body">
                                                                                <div class="">
                                                                                    <table class="table table-hover custom_border" id="datesheet-table">
                                                                                        <thead class="text-secondary table-secondary">

                                                                                        <th class="text-center">
                                                                                            {{ __('layout.Date') }}
                                                                                        </th>
                                                                                        <th class="text-center">
                                                                                            {{ __('layout.Class') }}
                                                                                        </th>
                                                                                        <th class="text-center">
                                                                                            {{ __('layout.Subject') }}
                                                                                        </th>
                                                                                        <th class="text-center">
                                                                                            {{ __('layout.Start_Time') }}
                                                                                        </th>
                                                                                        <th class="text-center">
                                                                                            {{ __('layout.End_Time') }}
                                                                                        </th>
                                                                                        <th class="text-center">
                                                                                            {{ __('layout.Actions') }}
                                                                                        </th>

                                                                                        </thead>
                                                                                        <tbody id="date-sheet-modal-row">
                                                                                        <tr id="#datesheet-append-row_0" class="div_dateshette">
                                                                                            <td class="">
                                                                                                <div class="col-sm-12 select-wizard">
                                                                                                    <select class="selectpicker" name="date[]" id="exam-date-for-datesheet" data-container=""
                                                                                                            data-size="5" data-style="btn btn-round btn-secondary" title="{{ __('layout.Choose_Date') }}"
                                                                                                            data-live-search="true" data-hide-disabled="true">
                                                                                                        <option value="" disabled selected>{{ __('layout.Choose_Date') }}</option>
                                                                                                    </select>
                                                                                                    <div class="add-div-error date"></div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="col-sm-12 select-wizard">
                                                                                                    <select class="selectpicker cls_id" name="class[]" id="exam-class-for-datesheet" data-container=""
                                                                                                            data-size="7" data-style="btn btn-round btn-secondary" title="{{ __('layout.Choose_Class') }}"
                                                                                                            data-live-search="true" data-hide-disabled="true">
                                                                                                        <option value="" disabled selected>{{ __('layout.Choose_Class') }}</option>
                                                                                                    </select>
                                                                                                    <div class="add-div-error class"></div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-group has-label col-sm-12">
                                                                                                    <select class="selectpicker subject_id"  data-container="" id="subject_id" name="subject[]" data-size="7" data-style="btn btn-round btn-secondary"
                                                                                                            title="{{ __('layout.Choose_subject') }}" data-live-search="true" data-hide-disabled="true">
                                                                                                        <option value="" disabled selected>{{ __('layout.Choose_subject') }}</option>
                                                                                                        @foreach($subjects as $subject)
                                                                                                            <option value="{{$subject->subject}}">{{$subject->subject}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                    <div class="add-div-error subject"></div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td class="">
                                                                                                <div class="form-group col-sm-12">
                                                                                                    <input type="time" class="form-control" placeholder="" name="start_time[]" required="true">
                                                                                                </div>
                                                                                                <div class="add-div-error start_time"></div>
                                                                                            </td>
                                                                                            <td class="">
                                                                                                <div class="form-group col-sm-12">
                                                                                                    <input type="time" class="form-control" placeholder="" name="end_time[]" required="true">
                                                                                                </div>
                                                                                                <div class="add-div-error end_time"></div>
                                                                                            </td>

                                                                                            <td class="">
                                                                                                <button class=" btn-icon btn-link btn btn-round btn-danger remove-date-sheet-row"
                                                                                                        style="visibility: hidden" title="Remove module" value="Remove Row" type="button" id=""
                                                                                                        data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">
                                                                                                    <i class="fa fa-minus"></i>
                                                                                                </button>
                                                                                            </td>

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
                                                                        <button type="submit" id="add-datesheet-btn" class="btn btn-round btn-secondary btn-sm btn-link">{{ __('layout.Save') }}</button>
                                                                    </div>
                                                                    <div class="divider"></div>

                                                                    <div class="">
                                                                        <button type="button" class="btn btn-sm btn-round btn-danger btn-link" data-dismiss="modal">{{ __('layout.Cancel') }}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                {{--Create Date Sheet Modal end--}}
                                                {{--Edit Date Sheet Modal end--}}
                                                <div class="modal fade" id="edit-datesheet-modal" tabindex="-1" role="dialog"
                                                     aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <form id="edit-date-sheet-form">
                                                            <input type="hidden" name="id" id="edit-date-sheet-id">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">{{ __('layout.Edit_Date_sheet') }}</h5>
                                                                </div>
                                                                <div class=" modal-body">
                                                                    <div class="row bor-sep">
                                                                        <div class="col-sm-12 col-lg-3 select-wizard">
                                                                            <label class="col-sm-12">{{ __('layout.Exam') }}</label>
                                                                            <select class="selectpicker" name="exam" id="edit-datesheet-exam-dropdown" data-container="" data-size="5"
                                                                                    data-style="btn btn-round btn-choice" title="{{ __('layout.Select_exam') }}" data-live-search="true" data-hide-disabled="true">
                                                                                <option value="" disabled selected>{{ __('layout.Select_exam') }}</option>
                                                                                @foreach($exams as $exam_name)
                                                                                    <option value="{{$exam_name->exam_Id}}">{{$exam_name->exam_Name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <div class="edit-div-error exam"></div>
                                                                        </div>

                                                                        <div class="form-group has-label col-sm-12 col-lg-9">

                                                                            <button type="button" class="btn btn-icon btn btn-outline-choice btn-round pull-right" id="edit-append-datesheet-row-btn"
                                                                                    name="Add" title=" {{ __('layout.Add_Exam_Paper') }}"
                                                                                    value="">
                                                                                <i class="text-center fa fa-plus fa-lg"></i></button>

                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="">
                                                                            <div class="card-body">
                                                                                <div class="">
                                                                                    <table class="table table-hover custom_border " id="edit-date-sheet-table">
                                                                                        <thead class="text-secondary table-secondary">

                                                                                        <th class="text-center">
                                                                                            {{ __('layout.Date') }}
                                                                                        </th>
                                                                                        <th class="text-center">
                                                                                            {{ __('layout.Class') }}
                                                                                        </th>
                                                                                        <th class="text-center">
                                                                                            {{ __('layout.Subject') }}
                                                                                        </th>
                                                                                        <th class="text-center">
                                                                                            {{ __('layout.Start_Time') }}
                                                                                        </th>
                                                                                        <th class="text-center">
                                                                                            {{ __('layout.End_Time') }}
                                                                                        </th>
                                                                                        <th class="text-center">
                                                                                            {{ __('layout.Actions') }}
                                                                                        </th>

                                                                                        </thead>
                                                                                        <tbody id="edit-date-sheet-modal-row">
                                                                                        <tr id="edit-datesheet-append-row">
                                                                                            <td class="">
                                                                                                <div class="col-sm-12 select-wizard">
                                                                                                    <select class="selectpicker edit-exam-date-for-datesheet" name="date[]"
                                                                                                            id="edit-exam-date-for-datesheet" data-container="" data-size="5"
                                                                                                            data-style="btn btn-round btn-choice" title="{{ __('layout.Select_date') }}" data-live-search="true"
                                                                                                            data-hide-disabled="true">
                                                                                                        <option value="" disabled selected>{{ __('layout.Choose_Date') }}</option>

                                                                                                    </select>
                                                                                                    <div class="edit-div-error date"></div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="col-sm-12 select-wizard">
                                                                                                    <select class="selectpicker edit-exam-class-for-datesheet" name="class[]"
                                                                                                            id="edit-exam-class-for-datesheet" data-container="" data-size="7"
                                                                                                            data-style="btn btn-round btn-choice" title="{{ __('layout.Select_class') }}" data-live-search="true"
                                                                                                            data-hide-disabled="true">
                                                                                                        <option value="" disabled selected>{{ __('layout.Select_class') }}</option>
                                                                                                    </select>
                                                                                                    <div class="edit-div-error class"></div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="form-group has-label col-sm-12">
                                                                                                    <select class="selectpicker edit-exam-subject-for-datesheet" name="subject[]" data-size="7"
                                                                                                            data-style="btn btn-round btn-choice" title="{{ __('layout.Choose_subject') }}" data-live-search="true"
                                                                                                            data-hide-disabled="true">
                                                                                                        <option value="" disabled selected>{{ __('layout.Choose_subject') }}</option>
                                                                                                        @foreach($subjects as $subject)
                                                                                                            <option value="{{$subject->subject}}">{{$subject->subject}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                    <div class="edit-div-error subject"></div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td class="">
                                                                                                <div class="form-group col-sm-12">
                                                                                                    <input type="time" class="form-control date-sheet-start-time" placeholder="" name="start_time[]"
                                                                                                           required="true">
                                                                                                </div>
                                                                                                <div class="edit-div-error start_time"></div>
                                                                                            </td>
                                                                                            <td class="">
                                                                                                <div class="form-group col-sm-12">
                                                                                                    <input type="time" class="form-control date-sheet-end-time" placeholder="" name="end_time[]"
                                                                                                           required="true">
                                                                                                </div>
                                                                                                <div class="edit-div-error end_time"></div>
                                                                                            </td>

                                                                                            <td class="">
                                                                                                <button class=" btn-icon btn-link btn btn-round btn-danger remove-date-sheet-row" title="Remove module"
                                                                                                        value="Remove Row" type="button" data-toggle="modal" data-target="#" aria-haspopup="true"
                                                                                                        aria-expanded="false">
                                                                                                    <i class="fa fa-minus"></i>
                                                                                                </button>
                                                                                            </td>

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
                                                                        <button type="submit" id="update-datesheet-btn" class="btn btn-sm btn-round btn-success btn-link">{{ __('layout.Update') }}</button>
                                                                    </div>
                                                                    <div class="divider"></div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-sm btn-round btn-danger btn-link" data-dismiss="modal">{{ __('layout.Cancel') }}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                {{--Edit Date Sheet Modal End--}}
                                                {{--show Date Sheet Modal--}}
                                                <div class="modal fade" id="show-datesheet-modal" tabindex="-1" role="dialog"
                                                     aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-full modal-dialog modal-xl modal-responsive">

                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">{{ __('layout.Date_Sheet') }}</h5>
                                                                <p id="show-date-sheet-exam"></p>
                                                            </div>
                                                            <div class="modal-body row" id="date-sheet-content">

                                                                <div class="col-md-12">
                                                                    <table class="table table-bordered table-hover table-responsive show-date-sheet-table" id="show-date-sheet-table">


                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <!--</div>-->
                                                            <div class="modal-footer">
                                                                <div class="">
                                                                    <button type="button" class="btn btn-sm btn-secondary btn-round btn-link datesheet-pdf">{{ __('layout.Export_Datesheet') }}</button>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-sm btn-danger btn-round btn-link" data-dismiss="modal">{{ __('layout.Close') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{--show Date Sheet Modal End--}}
                                                <div class="modal fade" id="viewmaterial" tabindex="-1" role="dialog"
                                                     aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">{{ __('layout.Study_material_Details') }}</h5>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-sm-3">
                                                                    <div class="row">

                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>{{ __('layout.Class') }}</label>
                                                                            <select class="selectpicker" data-size="7"
                                                                                    data-style="btn btn-secondary"
                                                                                    title="{{ __('layout.Select_Class') }}">
                                                                                <option value="" disabled selected>
                                                                                    {{ __('layout.Select_Class') }}
                                                                                </option>
                                                                               
                                                                                 
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label> {{ __('layout.Section') }}</label>
                                                                            <select class="selectpicker" data-size="7"
                                                                                    data-style="btn btn-secondary"
                                                                                    title="{{ __('layout.Select_Section') }}">
                                                                                <option value="" disabled selected>
                                                                                    {{ __('layout.Select_Section') }}
                                                                                </option>
                                                                                
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Subject</label>
                                                                            <select class="selectpicker" data-size="7"
                                                                                    data-style="btn btn-secondary"
                                                                                    title="{{ __('layout.Select_Subject') }}">
                                                                                <option value="" disabled selected>
                                                                                    {{ __('layout.Select_Subject') }}
                                                                                </option>
                                                                                
                                                                                 
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="col-sm-9">
                                                                    <div class="row">

                                                                        <div class="form-group col-sm-4">
                                                                            <label>{{ __('layout.Topic') }}</label>
                                                                            <input type="date" class="form-control"
                                                                                   placeholder="" name="houseallow"
                                                                                   number="true" number="true">
                                                                        </div>
                                                                        <div class="form-group col-sm-4">
                                                                            <label>{{ __('layout.Date') }}</label>
                                                                            <input type="date" class="form-control"
                                                                                   placeholder="" name="houseallow"
                                                                                   number="true" number="true">
                                                                        </div>
                                                                        <div class=" col-sm-4 select-wizard">
                                                                            <label>{{ __('layout.Audience') }}</label>
                                                                            <select class="selectpicker" data-size="7"
                                                                                    data-style="btn btn-secondary"
                                                                                    title="Select Billing Scgedule{{ __('layout.Select_Billing_Scgedule') }}">
                                                                                <option value="" disabled selected>
                                                                                    {{ __('layout.Select_Billing_Scgedule') }}
                                                                                </option>
                                                                                <option value="1">Whole Class{{ __('layout.Choose_Students') }}</option>
                                                                                <option value="2">Individuals{{ __('layout.Choose_Students') }}</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <label>Individuals</label>
                                                                            <select class="selectpicker"
                                                                                    data-style="btn btn-secondary "
                                                                                    multiple title="{{ __('layout.Choose_Students') }}"
                                                                                    data-size="7">
                                                                                <option disabled> Choose Students{{ __('layout.Choose_Students') }}
                                                                                </option>
                                                                                
                                                                                 
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group col-sm-12">
                                                                            <label>{{ __('layout.Note') }}</label>
                                                                            <textarea type="text" class="form-control"
                                                                                      placeholder="" name="houseallow"
                                                                                      number="true"
                                                                                      number="true"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12">

                                                                            <label class="form-control-label" for="">{{ __('layout.Upload_Document') }}</label>
                                                                            <div class="custom-file">
                                                                                <input type="file" name="photo"
                                                                                       class="custom-file-input form-control"
                                                                                       id="input-document9"
                                                                                       accept="image/*">
                                                                                <label class="custom-file-label"
                                                                                       for="input-document9">{{ __('layout.Select_File') }}</label>
                                                                            </div>


                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <!--</div>-->
                                                            <div class="modal-footer">
                                                                <div class="">
                                                                    <button type="submit"
                                                                            class="btn btn-secondary btn-sm btn-round  btn-link"
                                                                            data-dismiss="modal">{{ __('layout.Save') }}
                                                                    </button>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="">
                                                                    <button type="button"
                                                                            class="btn btn-danger btn-sm btn-round btn-link" data-dismiss="modal">
                                                                        {{ __('layout.Cancel') }}
                                                                    </button>
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
                                                            <h6 class="card-title">{{ __('layout.Date_Sheets_Record_List') }}</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="toolbar">
                                                                <div class="row">
                                                                        <div class="form-group col-sm-2 select-wizard">
                                                                            <select class="selectpicker filter_datesheet" id="filter_datesheet_exam" data-size="5" name="filter_datesheet_exam" data-style="btn btn-sm btn-secondary btn-round" title="Exam" required="true">
                                                                                <option value="" disabled>Exam</option>
                                                                                <option value="all">All</option>
                                                                                @foreach($exams as $exam)
                                                                                    <option value="{{$exam->exam_Id}}">{{$exam->exam_Name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                       {{-- <div class="form-group col-sm-2 select-wizard">
                                                                            <select class="selectpicker filter_datesheet_exam" data-size="5" id="filter_schedule_exam_type" name="filter_schedule_exam_type" data-style="btn btn-sm btn-secondary btn-round"
                                                                                    title="Exam Type" required="true">
                                                                                <option value="" disabled >Exam Type</option>
                                                                                <option value="all">All</option>
                                                                                @foreach($exam_types as $exam_type)
                                                                                    <option value="{{$exam_type->exm_typ_Id}}">{{$exam_type->exm_typ_Name}}</option>
                                                                                @endforeach

                                                                            </select>
                                                                        </div>--}}
                                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                                    </div>
                                                                </div>
                                                            @include('examiner.partials.datesheet_data')
                                                        </div><!-- end content-->
                                                    </div><!--  end card  -->
                                                </div> <!-- end col-md-12 -->
                                            </div> <!-- end row -->

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane" id="seatingplan" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class=" ">
                                            <div class="card-header ">
                                                <h4 class="card-title">Seating plan</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row bor-sep">

                                                    <div class="col-sm-12 pull-right">
                                                        <button class="btn btn-secondary btn-round pull-right"
                                                                data-toggle="modal">
                                                            Create
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="createseatplan" tabindex="-1" role="dialog"
                                                     aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-sm">
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
                                                                            <select class="selectpicker" data-size="7"
                                                                                    data-style="btn btn-secondary"
                                                                                    title="Choose examination">
                                                                                <option value="" disabled selected>
                                                                                    Choose exam
                                                                                </option>
                                                                                <option value="1">1st Checkpoint
                                                                                </option>
                                                                                <option value="2">2nd Checkpoint
                                                                                </option>
                                                                                <option value="3">Mid term</option>
                                                                                <option value="1">3rd Checkpoint
                                                                                </option>
                                                                                <option value="2">4th Checkpoint
                                                                                </option>
                                                                                <option value="3">Final term</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Class</label>
                                                                            <select class="selectpicker" data-size="7"
                                                                                    data-style="btn btn-secondary"
                                                                                    title="Choose school section">
                                                                                <option value="" disabled selected>
                                                                                    Choose class
                                                                                </option>
                                                                                <option value="1">PG</option>
                                                                                <option value="2">KG</option>
                                                                                <option value="2">Prep</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Subject</label>
                                                                            <select class="selectpicker" data-size="7"
                                                                                    data-style="btn btn-secondary"
                                                                                    title="Choose subject">
                                                                                <option value="" disabled selected>
                                                                                    Choose Subject
                                                                                </option>
                                                                                <option value="1">English</option>
                                                                                <option value="2">Urdu</option>
                                                                                <option value="2">Math</option>
                                                                                <option value="2">Science</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-sm-12">

                                                                            <label class="form-control-label" for="">Upload
                                                                                Document</label>
                                                                            <div class="custom-file">
                                                                                <input type="file" name="photo"
                                                                                       class="custom-file-input form-control"
                                                                                       id="input-document10"
                                                                                       accept="image/*">
                                                                                <label class="custom-file-label"
                                                                                       for="input-document10">Select
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
                                                                            class="btn btn-secondary btn-sm btn-round btn-link"
                                                                            data-dismiss="modal">Save
                                                                    </button>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="">
                                                                    <button type="button"
                                                                            class="btn btn-danger btn-round btn-sm btn-link" data-dismiss="modal">
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="viewseatplan" tabindex="-1" role="dialog"
                                                     aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">Study material Details</h5>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-sm-3">
                                                                    <div class="row">

                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Class</label>
                                                                            <select class="selectpicker" data-size="7"
                                                                                    data-style="btn btn-secondary"
                                                                                    title="Select Class">
                                                                                <option value="" disabled selected>
                                                                                    Select Class
                                                                                </option>
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
                                                                            <select class="selectpicker" data-size="7"
                                                                                    data-style="btn btn-secondary"
                                                                                    title="Select Billing Scgedule">
                                                                                <option value="" disabled selected>
                                                                                    Select Section
                                                                                </option>
                                                                                <option value="1">Alpha</option>
                                                                                <option value="2">Bravo</option>
                                                                                <option value="2">Charlie</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class=" col-sm-12 select-wizard">
                                                                            <label>Subject</label>
                                                                            <select class="selectpicker" data-size="7"
                                                                                    data-style="btn btn-secondary"
                                                                                    title="Select Billing Scgedule">
                                                                                <option value="" disabled selected>
                                                                                    Select Subject
                                                                                </option>
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
                                                                            <input type="date" class="form-control"
                                                                                   placeholder="" name="houseallow"
                                                                                   number="true" number="true">
                                                                        </div>
                                                                        <div class="form-group col-sm-4">
                                                                            <label>Date</label>
                                                                            <input type="date" class="form-control"
                                                                                   placeholder="" name="houseallow"
                                                                                   number="true" number="true">
                                                                        </div>
                                                                        <div class=" col-sm-4 select-wizard">
                                                                            <label>Audience</label>
                                                                            <select class="selectpicker" data-size="7"
                                                                                    data-style="btn btn-secondary"
                                                                                    title="Select Billing Scgedule">
                                                                                <option value="" disabled selected>
                                                                                    Select Please
                                                                                </option>
                                                                                <option value="1">Whole Class</option>
                                                                                <option value="2">Individuals</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <label>Individuals</label>
                                                                            <select class="selectpicker"
                                                                                    data-style="btn btn-secondary "
                                                                                    multiple title="Choose Students"
                                                                                    data-size="7">
                                                                                <option disabled> Choose Students
                                                                                </option>
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
                                                                            <label>Note{{ __('layout.Exams') }}</label>
                                                                            <textarea type="text" class="form-control"
                                                                                      placeholder="" name="houseallow"
                                                                                      number="true"
                                                                                      number="true"></textarea>
                                                                        </div>
                                                                        <div class="form-group col-sm-12">

                                                                            <label class="form-control-label" for="">Upload
                                                                                Document{{ __('layout.Exams') }}</label>
                                                                            <div class="custom-file">
                                                                                <input type="file" name="photo"
                                                                                       class="custom-file-input form-control"
                                                                                       id="input-document12"
                                                                                       accept="image/*">
                                                                                <label class="custom-file-label"
                                                                                       for="input-document12">Select
                                                                                    File{{ __('layout.Exams') }}</label>
                                                                            </div>


                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <!--</div>-->
                                                            <div class="modal-footer">
                                                                <div class="">
                                                                    <button type="submit"
                                                                            class="btn btn-secondary btn-round btn-sm btn-link"
                                                                            data-dismiss="modal">Save{{ __('layout.Exams') }}
                                                                    </button>
                                                                </div>
                                                                <div class="divider"></div>
                                                                <div class="">
                                                                    <button type="button"
                                                                            class="btn btn-danger btn-round btn-link" data-dismiss="modal">
                                                                        Cancel{{ __('layout.Exams') }}
                                                                    </button>
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
        </div>
    </div>
@endsection

{{-------------------Sweet alert cdn ends-----------------}}

@section('front_script')
    <script src="{{asset('js/jspdf/jspdf.min.js')}}"></script>
    <script src="{{asset('js/jspdf/jspdf-autotable.js')}}"></script>
    <script src="{{asset('js/examiner.js')}}"></script>
  
    <script>
        $(document).ready(function () {


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
        /*$(document).ready(function () {
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
        });*/
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


           /* $('#set-syllabus-table').DataTable({
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

            });*/

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
        /* Formatting function for row details - modify as you need */
        function format(d) {
            // `d` is the original data object for the row
            return '<table cellpadding="0" cellspacing="0" border="0">' +
                '<tr>' +
                '<td>Full name:</td>' +
                '<td>' + d.name + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Fees:</td>' +
                '<td>' + d.fee + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Admission Date:</td>' +
                '<td>' + d.adm_date + '</td>' +
                '</tr>' +
                '</table>';
        }

        $(document).ready(function () {
            var table = $('#example').DataTable({
                "ajax": "../../assets/ajax/data/user-data.txt",
                "columns": [
                    {
                        "className": 'details-control',
                        "orderable": false,
                        "data": null,
                        "defaultContent": ''
                    },
                    {"data": "id"},
                    {"data": "name"},
                    {"data": "username"},
                    {"data": "subtype"},
                    {"data": "action"}
                ],
                "order": [[1, 'asc']]
            });

            // Add event listener for opening and closing details
            $('#example tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
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
    
    <script>
        $('#number-multiple').selectpicker();
    </script>
@endsection

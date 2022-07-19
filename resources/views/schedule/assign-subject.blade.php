@extends('layouts.master')
@section('title', 'Assign Subjects ')
@section('content')
    <style>
        .add-div-error{
            color: red;
        }
        .edit-div-error{
            color: red;
        }  
    </style>
<div class="content">   
    <div class="row">
        <div class="col-md-12">

                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">{{ __('layout.Assign_Subjects') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="col-sm-12 pull-right">
                               
                               @can('add-school')
                                <button class="btn btn-secondary btn-round pull-right" data-toggle="modal" id="show-class-section-btn">
                                    {{ __('layout.Assign') }}
                                </button>

                                @endcan
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">{{ __('layout.Assigned_Subjects_Record_List') }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="alert alert-success" id="success-message" style="display: none">
                                        {{--{{ session()->get('message') }}--}}
                                    </div>
                                    <table id="datatable" class="table table-hover custom_border" cellspacing="0" width="100%">
                                        <thead class="table-secondary">
                                        <tr>

                                            <th class="text-center w-10 ">{{ __('layout.SNo') }}</th>
                                            <th>{{ __('layout.Class_Name') }}</th>
                                            <th>{{ __('layout.Section') }}</th>
                                            <th>{{ __('layout.Subject') }}</th>
                                            <th>{{ __('layout.Teacher') }}</th>
                                            <th>{{ __('layout.Lectures') }}</th>

                                            <th class="disabled-sorting text-center">{{ __('layout.Actions') }}</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        
                                        @php $i=1;$class_sections = []; @endphp
                                        
                                        @foreach($AssignSubjects as $AssignSubject)
                                            @php //echo "<pre>"; print_r($class_section); exit; @endphp
                                        <tr>
                                            
                                            <td class="text-center">{{$i++}}</td>
                                        
                                            <td>{{$AssignSubject->class?$AssignSubject->class->class:''}}</td>
                                            
                                            <td>{{$AssignSubject->section?$AssignSubject->section->class_section_name:''}}</td>
                                            
                                            <td>{{$AssignSubject->subject?$AssignSubject->subject->subject:''}}</td>
                                            
                                            <td>{{$AssignSubject->teacher?$AssignSubject->teacher->name:''}}</td>


                                             <td>{{$AssignSubject->lecture_per_week}} (PW)</td>
                                            
                                            <td class="text-center">
                                                <div class="form-inline pull-right">
                                                    <div class="">
                                                        @can('view-school')
                                                            <button class=" btn-link btn-cus-weight show-view-class-section-btn"
                                                                type="button"
                                                                data-toggle="modal"
                                                                data-target="#viewclass"
                                                                id="show-view-class-section-btn"
                                                                aria-haspopup="true"
                                                                aria-expanded="false" data-id="{{ $AssignSubject->id  }}">
                                                                {{ __('layout.View') }}
                                                            </button>
                                                        @endcan
                                                    </div>
                                                    
                                                    <div
                                                        class="nav-item btn-rotate dropdown pull-right ">
                                                        <a class="nav-link dropdown-toggle pull-right"
                                                           href="javascript:void(0)" id="navbarDropdownMenuLink"
                                                           data-toggle="dropdown"
                                                           aria-haspopup="true"
                                                           aria-expanded="false" data-id="{{ $AssignSubject->id  }}">
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="navbarDropdownMenuLink">
                                                             
                                                                <a class="dropdown-item edit-assign-subject-btn"
                                                                   href="#" data-id="{{$AssignSubject->id}}">{{ __('layout.Edit') }}</a>
                                                           
                                                                
                                                            <a class="dropdown-item delete-assign-subject-btn"
                                                               href="#" data-id="{{$AssignSubject->id}}">{{ __('layout.Delete') }}</a>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- end content-->
                            </div><!--  end card  -->
                        </div> <!-- end col-md-12 -->
                    </div> <!-- end row -->
                </div>
            </div>
        </div>
        <div class="modal fade" id="class-section-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-remove"></i>
                        </button>
                        <h5 class="title title-up">{{ __('layout.Assign_Subjects') }}</h5>
                    </div>
                    <div class="modal-body row">
                        <form id="add-class-section-form">
                            <input type="hidden" name="id" id="id" value="">
                            @csrf
                            <div class="col-sm-12">
                                <div class="add-div-error" style="display:none">
                                    <div class="alert alert-danger alert-dismissible fade show"
                                            role="alert" id="add-alert-danger">
                                        <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <ul class="p-0 m-0" style="list-style: none;">
                                            <li></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-sm-12 col-lg-6 col-md-6 form-group">
                                        <label> {{ __('layout.Class') }}</label>
                                        <select class="selectpicker cls_id"  name="cls_id" data-size="5" id="cls_id" data-live-search="true" data-style="btn btn-secondary" title="{{ __('layout.Select_Class') }}" >
                                            <option value="" disabled selected>{{ __('layout.Select_Class') }}</option>

                                            @foreach($addClasses as $AddClasse)
                                                <option value="{{$AddClasse->cls_Id}}">{{$AddClasse->class}}</option>
                                            @endforeach
                                        </select>
                                        <div class="add-div-error cls_id"></div>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-6 col-md-6">
                                        <label>{{ __('layout.Section') }}</label>
                                            <select class="selectpicker section_id"  name="section_id"  id ="section_id"  data-size="5" data-live-search="true" data-style="btn btn-secondary" title="{{ __('layout.Select_Section') }}" >
                                            <option value="" disabled selected>{{ __('layout.Select_Section') }}</option>
                                        </select>
                                        <div class="add-div-error section_id"></div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6 col-md-6 form-group">
                                        <label>{{ __('layout.Subjects') }}</label>
                                            <select class="selectpicker subject_id" id="subject_id"  data-size="5"  name="subject_id"  data-live-search="true" data-style="btn btn-secondary" title="{{ __('layout.Select_Subjects') }}" >
                                            <option value="" disabled selected>{{ __('layout.Select_Subjects') }}</option>
                                        </select>
                                        <div class="add-div-error subject_id"></div>
                                    </div>
                                    <div class=" col-sm-12 col-lg-6 col-md-6 select-wizard form-group">
                                        <label>{{ __('layout.Teacher') }}</label>
                                        <select class="selectpicker " id="teacherselect" name="teacher_id" data-size="5" data-live-search="true" data-style="btn btn-secondary" title="{{ __('layout.Select_Teacher') }}" >
                                            <option value="" disabled selected>{{ __('layout.Select_Teacher') }}</option>
        
                                            @foreach($teachers as $teacher)
                                                <option value="{{$teacher->id }}">{{$teacher->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="add-div-error teacher_id"></div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6 col-md-6 form-group">
                                        <label> {{ __('layout.Lecture_per_week') }}</label>
                                            <input name="lecture_per_week"  id="lecture_per_week" class="form-control"  title="Lecture per week" type="number" />
                                        <div class="add-div-error lecture_per_week"></div>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label> {{ __('layout.Type') }}</label>
                                            <br>
                                        <input class="form-check-input" type="radio" name="type" value="Theory" checked="">
                                        <label style="margin-right:20px" class="form-check-label" for="Theory">{{ __('layout.Theory') }}</label>
                                        <input class="form-check-input" type="radio" name="type" value="Lab">
                                        <label class="form-check-label" for="Lab">{{ __('layout.Lab') }}</label>     
                                        <div class="add-div-error type"></div>
                                    </div>
                                </div>
                            </div>
                        </form>   
                    </div>
                <div class="modal-footer">
                    <div class="">
                        <button type="button" class="btn btn-round btn-success btn-link add-newclass-sec-btn add-btn" id="add-class-section-btn">{{ __('layout.Save') }}</button>
                    </div>
                    <div class="divider"></div>
                    <div class="">
                        <button type="button"  class="btn btn-round btn-danger btn-link" data-dismiss="modal">{{ __('layout.Cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


         <div class="modal fade" id="show-assign-subject" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-remove"></i>
                        </button>
                        <h5 class="title title-up">{{ __('layout.Assign_Subjects') }}</h5>
                    </div>
                    <div class="modal-body row">
                        <form id="show-class-section-form">
                            @csrf
                            <div class="col-sm-12">
                                <div class="add-div-error" style="display:none">
                                    <div class="alert alert-danger alert-dismissible fade show"
                                            role="alert" id="add-alert-danger">
                                        <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <ul class="p-0 m-0" style="list-style: none;">
                                            <li></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label> {{ __('layout.Class') }}:</label>
                                        <p id="class-name"></p>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>{{ __('layout.Section') }}:</label>
                                        <p id="sec-name"></p>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>{{ __('layout.Subjects') }}:</label>
                                        <p id="sub-name"></p>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>{{ __('layout.Teacher') }}:</label>
                                        <p id="teach-name"></p>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Type{{ __('layout.Type') }}:</label>
                                        <p id="lec-type"></p>
                                    </div>
                                </div>
                            </div>
                        </form>   
                    </div>
                <div class="modal-footer">
                    <div class="">
                        <button type="button" data-dismiss="modal" class="btn btn-round btn-danger btn-link">{{ __('layout.Close') }}</button>
                    </div>
                </div>
            </div>
            </div>
</div>
</div>
@endsection
@section('front_css')
    {{--<link href="{{asset('css/select2.min.css')}}" rel="stylesheet"/>--}}

@endsection
@section('front_script')

  {{-- <script src="{{asset('js/select2.js')}}"></script>--}}
    
    <script src="{{asset('js/assign_subjects.js')}}"></script>
    <script>
      /*  $('select').select2({width: '100%', placeholder: "Select an Option", allowClear: true, tags: true});
  */
    </script>
   

     
@endsection

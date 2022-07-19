@extends('layouts.master')
@section('title', 'Add Class Section')
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
                        <h4 class="card-title">{{ __('administrate.Classes_Sections') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="col-sm-12 pull-right">
                               
                               @can('add-school')

                                <button class="btn btn-secondary btn-round pull-right" data-toggle="modal" id="show-class-section-btn">
                                    {{ __('administrate.Add_Class_Section') }}
                                </button>

                                @endcan
                            </div>
                        </div>
                        {{--Start view Class section Modal--}}
                        {{--View Modal--}}
                        <div class="modal fade" id="view-class-section-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close btn-round" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up">{{ __('administrate.Class_Section') }}</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12 col-lg-7 bor-sep  ">
                                            <div class="row ">
                                                <h6 class="col-sm-12">{{ __('administrate.Section_Details') }}</h6>
                                                <div class="form-group col-sm-12 col-lg-6">
                                                    <label class="font-weight-bolder">{{ __('administrate.Class_Name') }}</label>
                                                    <p id="show-class-name">Seven</p><hr>
                                                </div>

                                                <div class="form-group col-sm-12 col-lg-6">
                                                    <label class="font-weight-bolder">{{ __('administrate.Section_Name') }}</label>
                                                    <p id="show-class-section-name">Alpha</p><hr>
                                                </div>
                                                <div class="form-group col-sm-12 col-lg-6">
                                                    <label class="font-weight-bolder">{{ __('administrate.Class_Teacher') }}</label>
                                                    <p id="show-class-teacher">Ahmed Ali</p><hr>
                                                </div>
                                                <div class="form-group col-sm-12  col-lg-6">
                                                    <label class="font-weight-bolder">{{ __('administrate.Strength') }}</label>
                                                    <p id="show-class-strength">32</p><hr>
                                                </div>
                                                <div class="form-group col-sm-12 col-lg-6 ">
                                                    <label class="font-weight-bolder">{{ __('administrate.Class_Representative') }}</label>
                                                    <p id="show-class-rep">Ali</p><hr>
                                                </div>
                                            </div>
                                          </div>
                                        <div class="col-sm-12 col-lg-4  bor-sep">

                                            <div class="col-sm-12 col-lg-12 float-right">
                                                <div class="row">
                                                    <h6 class="col-sm-12">{{ __('administrate.Students_List') }}</h6>
                                                    {{--<div class="card-header">

                                                    </div>--}}
                                                    <div class="card-content table cus-height-scroll"  >
                                                        <table class="table border-bottom show_lst_student">
                                                            <thead class="">
                                                            <tr>
                                                                <label></label>
                                                                <label></label>
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
                                            <button type="button" class="btn btn-sm btn-danger btn-link btn-round" data-dismiss="modal">{{ __('layout.Close') }}</button>
                                        </div>
                                    </div>
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
                                        <h5 class="title title-up">{{ __('administrate.Add_Class_Section') }}</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <form id="add-class-section-form">
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
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>{{ __('administrate.For_Class') }}</label>
                                                        <select class="selectpicker" id="sel_class" name="class_name" data-size="5" data-style="btn btn-round btn-secondary" title="Select Class" >
                                                            <option value="" disabled selected>{{ __('administrate.Select_Class') }}</option>
                                                            @foreach($nameofclasses as $nameofclass)
                                                                <option value="{{$nameofclass->cls_Id}}">{{$nameofclass->class}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="add-div-error class_name"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>{{ __('administrate.Section_Name') }}</label>
                                                        <input type="text" class="form-control" placeholder="" name="class_section_name"  number="true">
                                                        <div class="add-div-error class_section_name"></div>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                        <label>{{ __('administrate.Add_Students') }}</label>
                                                        <select class="selectpicker" id="sel_student" name="students[]" data-style="btn btn-secondary " multiple title="Choose Students" data-size="5">
                                                            <option disabled> {{ __('administrate.Choose_Students') }}</option>
                                                        </select>
                                                        <div class="add-div-error students"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>{{ __('administrate.No_of_Students_Added') }}</label>
                                                        <input type="text" class="form-control" placeholder="" id="add-no-of-student" name="no_of_student" readonly="true">
                                                        <div class="add-div-error no_of_student"></div>
                                                    </div>
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>{{ __('administrate.Assign_Class_Rep') }}</label>
                                                        <select class="selectpicker" id="representative" name="representative" data-size="5"  data-style="btn btn-secondary" title="Select Class Rep" >
                                                            <option value="" disabled selected>{{ __('administrate.Select_Representative') }}</option>
                                                        </select>
                                                        <div class="add-div-error representative"></div>
                                                    </div>
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>{{ __('administrate.Teacher') }}</label>
                                                        <select class="selectpicker" id="teacherselect" name="teacher" data-size="5" data-style="btn btn-secondary" title="Select Teacher" >
                                                            <option value="" disabled selected>{{ __('administrate.Select_Teacher') }}</option>
                                                            @foreach($teachers as $teacher)
                                                                <option value="{{$teacher->id }}">{{$teacher->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="add-div-error teacher"></div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="button" class="btn btn-sm btn-secondary btn-link btn-round add-newclass-sec-btn add-btn" id="add-class-section-btn">{{ __('layout.Save') }}</button>
                                        </div>
                                        <div class="divider"></div>

                                        <div class="">
                                            <button type="button"  class="btn btn-sm btn-danger btn-link btn-round" data-dismiss="modal">{{ __('layout.Cancel') }}</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--End View Modal--}}
                        {{--End view Class section Modal--}}

                        {{--add class section Modal--}}
{{--                        <div class="modal fade" id="class-section-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">--}}
{{--                            <div class="modal-dialog modal-lg modal-sm">--}}
{{--                                <div class="modal-content">--}}
{{--                                    <div class="modal-header justify-content-center">--}}
{{--                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <i class="fa fa-remove"></i>--}}
{{--                                        </button>--}}
{{--                                        <h5 class="title title-up">Add Class Section</h5>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-body row">--}}
{{--                                        <form id="add-class-section-form">--}}
{{--                                            @csrf--}}
{{--                                        <div class="col-sm-12">--}}
{{--                                            <div class="add-div-error" style="display:none">--}}
{{--                                                <div class="alert alert-danger alert-dismissible fade show"--}}
{{--                                                     role="alert" id="add-alert-danger">--}}
{{--                                                    <button type="button" class="close" data-dismiss="alert"--}}
{{--                                                            aria-label="Close">--}}
{{--                                                        <span aria-hidden="true">&times;</span>--}}
{{--                                                    </button>--}}
{{--                                                    <ul class="p-0 m-0" style="list-style: none;">--}}
{{--                                                        <li></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="row">--}}
{{--                                                <div class=" col-sm-6 select-wizard">--}}
{{--                                                    <label>For Class</label>--}}
{{--                                                    <select class="selectpicker" id="sel_class" name="class_name" data-size="5" data-style="btn btn-secondary" title="Select Class" >--}}
{{--                                                        <option value="" disabled selected>Select Class</option>--}}
{{--                                                        @foreach($nameofclasses as $nameofclass)--}}
{{--                                                        <option value="{{$nameofclass->cls_Id}}">{{$nameofclass->class}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                    <div class="add-div-error class_name"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group col-sm-6">--}}
{{--                                                    <label>Section Name</label>--}}
{{--                                                    <input type="text" class="form-control" placeholder="" name="class_section_name"  number="true" number="true">--}}
{{--                                                    <div class="add-div-error class_section_name"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-6">--}}
{{--                                                    <label>Add Students</label>--}}
{{--                                                    <select class="selectpicker" id="sel_student" name="students[]" data-style="btn btn-secondary btn-round" multiple title="Choose Students" data-size="5">--}}
{{--                                                        <option disabled> Choose Students</option>--}}
{{--                                                    </select>--}}
{{--                                                    <div class="add-div-error students"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group col-sm-6">--}}
{{--                                                    <label>No of Students Added</label>--}}
{{--                                                    <input type="text" class="form-control" placeholder="" id="add-no-of-student" name="no_of_student"  number="true">--}}
{{--                                                    <div class="add-div-error no_of_student"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class=" col-sm-6 select-wizard">--}}
{{--                                                    <label>Assign Class Rep</label>--}}
{{--                                                    <select class="selectpicker" id="representative" name="representative" data-size="5"  data-style="btn btn-secondary btn-round" title="Select Billing Scgedule" >--}}
{{--                                                        <option value="" disabled selected>Select Student</option>--}}
{{--                                                    </select>--}}
{{--                                                    <div class="add-div-error representative"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-6 select-wizard btn-round">--}}
{{--                                                    <label>Teacher</label>--}}
{{--                                                    <select class="selectpicker" name="teacher" data-size="5" data-style="btn btn-secondary btn-round" title="Select Class" >--}}
{{--                                                        <option value="" disabled selected>Select Teacher</option>--}}
{{--                                                        @foreach($teachers as $teacher)--}}
{{--                                                        <option value="{{$teacher->emp_Id }}">{{$teacher->emp_given_name}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                    <div class="add-div-error teacher"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-footer">--}}
{{--                                        <div class="">--}}
{{--                                            <button type="button" class="btn btn-round btn-success btn-link add-btn" id="add-class-section-btn">Save</button>--}}
{{--                                        </div>--}}
{{--                                        <div class="divider"></div>--}}
{{--                                        <div class="">--}}
{{--                                            <button type="button" data-dismiss="modal" class="btn btn-round btn-danger btn-link" onclick="myFunction()">Cancel</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        --}}{{--end class section Modal--}}
                        {{--edit class section Modal--}}
                        <div class="modal fade" id="edit-class-section-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up">{{ __('administrate.Edit_Class_Section') }}</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <form id="edit-class-section-form">
                                            @csrf
                                        <input type="hidden" name="id" id="class-section-id">
                                        <div class="col-sm-12">
                                            <div class="edit-div-error" style="display:none">
                                                <div class="alert alert-danger alert-dismissible fade show"
                                                     role="alert" id="edit-alert-danger">
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
                                                <div class=" col-sm-12 col-lg-6 select-wizard">
                                                    <label>{{ __('administrate.For_Class') }}</label>
                                                    <select class="selectpicker" id="sel_class" name="class_name" data-size="5" data-style="btn btn-secondary btn-round" title="Select Class" >
                                                       
                                                         
                                                    </select>
                                                    <div class="edit-div-error class_sect_selname"></div>
                                                </div>

                                                <div class="form-group col-sm-12 col-lg-6">
                                                    <label>{{ __('administrate.Section_Name') }}</label>
                                                    <input type="text" class="form-control" placeholder="" id="edit-class-section-name" name="class_section_name"  number="true" number="true">
                                                    <div class="edit-div-error class_section_name"></div>
                                                </div>
                                                <div class="col-sm-12 col-lg-6">
                                                    <label>{{ __('administrate.Add_Students') }}</label>
                                                    <!--edit_sel_student-->

                                                    <select class="selectpicker edit_sel_student" id="edit_sel_student" name="students[]" data-style="btn btn-secondary btn-round " multiple title="Choose Students" data-size="5">
                                                        <option disabled>{{ __('administrate.Choose_Students') }}</option>
                                                        
                                                        <option value=""></option>
                                                    </select>
                                                    <div class="edit-div-error students"></div>
                                                </div>
                                                <div class="form-group col-sm-12 col-lg-6">
                                                    <label>{{ __('administrate.No_of_Students_Added') }}</label>
                                                    <input type="text" class="form-control"  placeholder="" id="edit-no-of-student" name="no_of_student" readonly="true">
                                                    <div class="edit-div-error no_of_student"></div>
                                                </div>
                                                <div class="col-sm-12 col-lg-6 select-wizard">
                                                    <label>{{ __('administrate.Assign_Class_Rep') }}</label>
                                                    <select class="selectpicker" id="edit-representative" name="representative" data-size="5"  data-style="btn btn-secondary btn-round" title="Select Billing Scgedule" >
                                                        <option value="" disabled selected>{{ __('administrate.Select_Student') }}</option>
                                                    </select>
                                                    <div class="edit-div-error representative"></div>
                                                </div>
                                                <div class=" col-sm-12 col-lg-6 select-wizard">
                                                    <label>{{ __('administrate.Teacher') }}</label>
                                                    <select class="selectpicker" id="edit-teacher" name="teacher" data-size="5" data-style="btn btn-secondary btn-round" title="Select Class" >
                                                        
                                                    </select>
                                                    <div class="edit-div-error teacher"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="button" class="btn btn-sm btn-secondary btn-link btn-round update-btn" id="update-class-section-btn">{{ __('layout.Update') }}</button>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="">
                                            <button type="button" data-dismiss="modal" class="btn btn-sm btn-danger btn-link btn-round" data-dismiss="modal">{{ __('layout.Cancel') }}</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--end class section Modal--}}


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">{{ __('administrate.Classes_Sections_Record_List') }}</h6>
                                </div>
                                <div class="card-body">
                                     
                                    <div class="alert alert-success" id="success-message" style="display: none">
                                        {{--{{ session()->get('message') }}--}}
                                    </div>
                                    <table id="datatable" data-id="datatable" class="table table-hover custom_border" cellspacing="0" width="100%">
                                        <thead class="table-secondary">
                                        <tr>
                                            <th class="text-center" width="10%">{{ __('layout.SNo') }}</th>
                                            <th>{{ __('administrate.Class_Name') }}</th>
                                            <th>{{ __('administrate.Section') }}</th>
                                           <th>{{ __('administrate.Total_Students') }}</th>
                                            <th class="disabled-sorting">{{ __('administrate.Teacher') }}</th>
                                            <th class="disabled-sorting">{{ __('administrate.Class_Rep') }}</th>
                                            <th class="disabled-sorting text-center">{{ __('layout.Actions') }}</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @php $i=1; @endphp

                                        @foreach($class_sections as $class_section)
                                            @php //echo "<pre>"; print_r($class_section); exit; @endphp
                                        <tr>
                                            <td class="text-center">{{$i++}}</td>
                                            <td>{{$class_section->class?$class_section->class->class:''}}</td>
                                            <td>{{$class_section->class_section_name}}</td>
                                            <td>{{$class_section->no_of_student}}</td>
                                            <td>{{$class_section->teacher->name }}</td>
                                          <td>{{$class_section->classRep?$class_section->classRep->name:'N/A' }}</td>
                                            <td class="text-center">
                                                <div class="form-inline pull-right">
                                                    <div class="">
                                                        @can('view-school')
                                                        <button class=" btn-round  btn-sm btn text-info btn-link    btn-cus-weight show-view-class-section-btn"
                                                                type="button"
                                                                data-toggle="modal"
                                                                 data-target="#viewclass"
                                                                id="show-view-class-section-btn"
                                                                aria-haspopup="true"
                                                                aria-expanded="false" data-id="{{ $class_section->c_section_Id  }}">
                                                             {{ __('layout.View') }}
                                                        </button>
                                                        @endcan
                                                    </div>
                                                     @canany(['edit-school','delete-school'])

                                                    <div
                                                        class="nav-item btn-rotate dropdown pull-right ">
                                                        <a class="nav-link dropdown-toggle pull-right"
                                                           href="javascript:void(0)" id="navbarDropdownMenuLink"
                                                           data-toggle="dropdown"
                                                           aria-haspopup="true"
                                                           aria-expanded="false" data-id="{{ $class_section->c_section_Id  }}">
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="navbarDropdownMenuLink">
                                                             @can('edit-school')
                                                            <a class="dropdown-item edit-class-section-btn" href="javascript:void(0)"
                                                               data-toggle="modal"
                                                               {{-- data-target="#editclass"--}}
                                                               aria-haspopup="true"
                                                               aria-expanded="false" data-id="{{ $class_section->c_section_Id  }}" >{{ __('layout.Edit') }}</a>

                                                             @endcan

                                                             @can('delete-school')

                                                            <a class="dropdown-item delete-class-section-btn"
                                                            shref="#" data-id="{{$class_section->c_section_Id}}">{{ __('layout.Delete') }}</a>
                                                            @endcan

                                                        </div>
                                                    </div>
                                                    @endcanany
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
    </div>

@endsection
@section('front_css')
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet"/>
@endsection
@section('front_script')
    <script src="{{asset('js/select2.js')}}"></script>
    
    <script src="{{asset('js/class_section_script.js')}}"></script>
    <script>
        $('select').select2({width: '100%', placeholder: "Select an Option", allowClear: true, tags: true});
    </script>
   
      
@endsection

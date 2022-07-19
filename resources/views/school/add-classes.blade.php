@extends('layouts.master')
@section('title', 'Add Class')
@section('content')
<style>
    .add-div-error{
        color: red;
    }
    .edit-div-error{
        color: red;
    }
</style>
    {{--main Content--}}
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                

                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">{{ __('administrate.Classes') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            {{--View Modal--}}
                            <div class="modal fade" id="viewclass" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-sm">
                                    <div class="modal-content" id="medal">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up">{{ __('administrate.View_Class') }}</h5>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col-sm-12 col-lg-6 bor-sep">
                                                <div class="row">
                                                    <h6 class="col-sm-12">{{ __('administrate.Class_Details') }}</h6>
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">{{ __('administrate.Class_Name') }}</label>
                                                        <p id="show-class-name">Seven</p><hr>
                                                    </div>
                                                    <!--<div class="form-group col-sm-6 ">-->
                                                    <!--<label class="font-weight-bolder">Numeric Name</label>-->
                                                    <!--<p>VII</p><hr>-->
                                                    <!--</div>-->
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">{{ __('administrate.No_of_Periods') }} </label>
                                                        <p id="show-no-of-periods">34</p><hr>
                                                    </div>
                                                    <div class=" col-sm-6 select-wizard ">
                                                        <label class="font-weight-bolder">{{ __('administrate.School_Section') }}</label>
                                                        <p id="show-school-section">Middle School</p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-6 ">
                                                        <label class="font-weight-bolder">{{ __('administrate.Tuition_Fee') }}</label>
                                                        <p id="show-tuition-fee">&#8360; 2000</p><hr>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-5 bor-sep">
                                                <div class="row">
                                                    <h6 class="col-sm-12">{{ __('administrate.Subjects') }}</h6>
                                                    {{--<div class="card-header">

                                                    </div>--}}
                                                    <div class="card-content table cus-height-scroll"  >
                                                        <table class="table border-bottom subjects_table">
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

                                        <div class="modal-footer">
                                            {{-- <div class="">
                                                 <button type="submit" class="btn btn-success btn-link" data-dismiss="modal">{{ __('layout.Save') }}</button>
                                             </div>
                                             <div class="divider"></div>--}}
                                            <div class="">
                                                <button type="button" class="btn btn-round btn-danger btn-link btn-sm " data-dismiss="modal">{{ __('layout.Close') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--End View Modal--}}
                            {{--Add Class Modal--}}
                            <div class="col-lg-12 col-md-12 col-sm-12 pull-right">
                                @can('add-school')
                                    <button class=" btn btn-secondary btn-round pull-right " type="button" id="newclassbtn"
                                            data-toggle="modal" data-target="#newclass" aria-haspopup="true"
                                            aria-expanded="false">
                                        {{ __('administrate.New_class') }}
                                    </button>
                                @endcan
                            </div>
                            <div class="modal fade modalvisibillity" id="newclass" data-backdrop="static" tabindex="-1"
                                 role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" id="close" class="close btn-round conf_hide" data-dismiss="modal"
                                                    aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up">{{ __('administrate.Add_New_Class') }}</h5>
                                        </div>
                                        {{--Add class Error--}}

                                        {{--End Add class Error--}}
                                        <form id="add-new-class-form">
                                            <div class="modal-body row">
                                                <div class="col-sm-12">
                                                    <div class="add-div-error" style="display:none">
                                                        <div class="alert alert-danger alert-dismissible fade show"
                                                             role="alert" id="add-alert-danger">
                                                            <button type="button" class="close btn-round" data-dismiss="alert"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <ul class="p-0 m-0" style="list-style: none;">
                                                                <li></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <h6 class="col-sm-12">{{ __('administrate.Class_Details') }}</h6>
                                                        <div class="form-group col-sm-12 col-lg-6">
                                                            <label>{{ __('administrate.Class_Name') }}</label>
                                                            <input type="text"  name="class_name" class="form-control" placeholder=""
                                                                   name="houseallow">
                                                            <div class="add-div-error class_name"></div>

                                                        </div>
                                                        <div class="form-group col-sm-12 col-lg-6">
                                                            <label>{{ __('administrate.Numeric_Name') }}e</label>
                                                            <input type="text" class="form-control" name="numeric_name" placeholder=""
                                                                   name="houseallow" pattern="">
                                                            <div class="add-div-error numeric_name"></div>

                                                        </div>
                                                        <div class="form-group col-sm-12 col-lg-6">
                                                            <label>{{ __('administrate.No_of_Periods') }}</label>
                                                            <input type="number" class="form-control" name="no_of_period" placeholder=""
                                                                   name="noofperiod" number="true">
                                                            <div class="add-div-error no_of_period"></div>
                                                        </div>

                                                        <div class=" col-sm-12 col-lg-6 select-wizard">
                                                            <label>{{ __('administrate.School_Section') }}</label>
                                                            <select name="school_section" class="selectpicker" data-size="7"
                                                                    data-style="btn btn-secondary btn-round"
                                                                    title="Select school section">
                                                                <option value="" disabled selected>{{ __('administrate.Select_Section') }}
                                                                </option>
                                                                @foreach($school_sections as $school_section)
                                                                    <option value="{{$school_section->sc_sec_Id}}">{{$school_section->sc_sec_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="add-div-error school_section"></div>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-lg-6">
                                                            <label>{{ __('administrate.Tuition_Fee') }}(in &#8360;)</label>
                                                            <input type="text" name="tuition_fee" class="form-control" placeholder=""
                                                                   name="tuitionfee" number="true">
                                                            <div class="add-div-error tuition_fee"></div>
                                                        </div>

                                                        <div class="col-sm-12 col-lg-6">
                                                            <label>{{ __('administrate.Assign_Subjects') }}</label>
                                                            <select name="subject[]" class="selectpicker" id="subselect"
                                                                    data-style="btn btn-secondary btn-round" multiple
                                                                    title="{{ __('administrate.Choose_Subjects') }}" data-size="7">
                                                                <option disabled>  {{ __('administrate.Choose_Subjects') }}</option>
                                                                @foreach($subjects as $subject))
                                                                <option value="{{$subject->sub_Id}}">{{$subject->subject}} </option>
                                                                @endforeach
                                                            </select>
                                                            <div class="add-div-error subject"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="">
                                                    <button type="submit"
                                                            class="btn btn-secondary btn-link btn-sm btn-round add-btn" id="add-new-class-btn" >{{ __('layout.Save') }}
                                                    </button>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="">
                                                    <button type="button" class="btn btn-sm btn-danger btn-link btn-round " data-dismiss="modal">{{ __('layout.Cancel') }}
                                                    </button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{--End Class Modal--}}

                            {{--edit Class Modal--}}

                            <div class="modal fade" id="editclassmodal" data-backdrop="static" tabindex="-1"
                                 role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" id="close" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up">{{ __('administrate.Edit_Class') }}</h5>
                                        </div>
                                        <form id="edit-new-class-form">
                                            <div class="modal-body row">
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
                                                        <input type="hidden" name="id" id="edit-class-id">
                                                        <h6 class="col-sm-12">{{ __('administrate.Edit_Class_Details') }}</h6>
                                                        <div class="form-group col-sm-12 col-lg-6">
                                                            <label>{{ __('administrate.Class_Name') }}</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                   name="class_name" id="edit-class-name">
                                                            <div class="edit-div-error class_name"></div>

                                                        </div>
                                                        <div class="form-group col-sm-12 col-lg-6">
                                                            <label>{{ __('administrate.Numeric_Name') }}</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                   name="numeric_name" pattern="" id="edit-numeric-name">
                                                            <div class="edit-div-error numeric_name"></div>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-lg-6">
                                                            <label>{{ __('administrate.No_of_Periods') }}</label>
                                                            <input type="number" class="form-control" placeholder=""
                                                                   name="no_of_period" number="true" id="edit-no-of-period">
                                                            <div class="edit-div-error no_of_period"></div>
                                                        </div>

                                                        <div class=" col-sm-12 col-lg-6 select-wizard">
                                                            <label>{{ __('administrate.School_Section') }}</label>
                                                            <select class="selectpicker " data-size="7" name="school_section"
                                                                    data-style="btn btn-round btn-secondary"
                                                                    title="Select school section" id="edit-school-section">
                                                                <option value="" disabled selected>Select Section
                                                                </option>
                                                                @foreach($school_sections as $school_section)
                                                                    <option value="{{$school_section->sc_sec_Id}}">{{$school_section->sc_sec_name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="edit-div-error school_section"></div>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-lg-6">
                                                            <label>{{ __('administrate.Tuition_Fee') }} (in &#8360;)</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                   name="tuition_fee" number="true" id="edit-tuition-fee">
                                                            <div class="edit-div-error tuition_fee"></div>
                                                        </div>
                                                        <div class="col-sm-12 col-lg-6">
                                                            <label>{{ __('administrate.Assign_Subjects') }}</label>
                                                            <select class="selectpicker edit-subject" name="subject[]"
                                                                    data-style="btn btn-round btn-secondary " multiple
                                                                    title="{{ __('administrate.Choose_Subjects') }}" data-size="7" id="edit-subject">
                                                                <option disabled> {{ __('administrate.Choose_Subjects') }}</option>
                                                                @foreach($subjects as $subject))
                                                                <option value="{{$subject->sub_Id}}">{{$subject->subject}} </option>
                                                                @endforeach
                                                            </select>
                                                            <div class="edit-div-error subject"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="">
                                                    <button type="submit"
                                                            class="btn btn-sm btn-secondary btn-link btn-round " id="update-class-btn">{{ __('layout.Update') }}
                                                    </button>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="">
                                                    <button type="button" class="btn btn-danger btn-link btn-sm btn-round"
                                                            data-dismiss="modal">{{ __('layout.Cancel') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{--End Class Modal--}}
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title">{{ __('administrate.Classes_Record_List') }}</h6>
                                    </div>
                                     
                                    <div class="alert alert-success" id="success-message" style="display: none">
                                        {{--{{ session()->get('message') }}--}}
                                    </div>
                                    <table id="datatable" data-id="datatable" class="table table-hover custom_border"
                                           cellspacing="0" width="100%">
                                        <thead class="table-secondary">
                                        <tr>
                                            <th class="text-center w-10">{{ __('layout.SNo') }}</th>
                                            <th class="w-20">{{ __('administrate.Class_Name') }}</th>
                                            <th class="w-20">{{ __('administrate.Numeric_Name') }}</th>
                                            <th class="w-20">{{ __('administrate.No_of_Periods') }}</th>
                                            <th class="text-right w-15">{{ __('administrate.Tuition_Fee') }}</th>
                                            <th class="disabled-sorting text-center w-auto">{{ __('layout.Actions') }}</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @php $i=1; @endphp
                                        @foreach($classes as $class)
                                            <tr>
                                                <td class="text-center">{{$i++}}</td>
                                                <td>{{$class->class}}</td>
                                                <td>{{$class->numeric_name}}</td>
                                                <td>{{$class->no_of_period}}</td>
                                                <td class="text-right">&#8360; {{$class->tuition_fee}}</td>
                                                <td class="text-center">
                                                    <div class="form-inline pull-right">
                                                        <button class=" btn-round  btn-sm btn text-info btn-link    btn-cus-weight show-view-class-btn"
                                                                type="button"
                                                                data-toggle="modal"
                                                                {{-- data-target="#viewclass"--}}
                                                                id="show-view-class-btn"
                                                                aria-haspopup="true"
                                                                aria-expanded="false" data-id="{{ $class->cls_Id }}">
                                                             {{ __('layout.View') }}
                                                        </button>
                                                        @canany(['edit-school','delete-school'])
                                                            <div class="nav-item btn-rotate dropdown pull-right ">
                                                                <a class="nav-link dropdown-toggle pull-right"
                                                                   href="javascript:void(0)" id="navbarDropdownMenuLink"
                                                                   data-toggle="dropdown"
                                                                   aria-haspopup="true"
                                                                   aria-expanded="false" data-id="{{ $class->cls_Id }}">
                                                                </a>

                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                     aria-labelledby="navbarDropdownMenuLink">

                                                                    @can('edit-school')

                                                                        <a class="dropdown-item editclass" href="javascript:void(0)"
                                                                           data-toggle="modal"
                                                                           {{-- data-target="#editclass"--}}
                                                                           aria-haspopup="true"
                                                                           aria-expanded="false" data-id="{{ $class->cls_Id }}">{{ __('layout.Edit') }}</a>
                                                                    @endcan

                                                                    @can('delete-school')
                                                                        <a class="dropdown-item btn-sm delete-class-btn"
                                                                           href="#" data-id={{$class->cls_Id}}">{{ __('layout.Delete') }}</a>
                                                                                  @endcan

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

                                            </div>


 
{{--end main Content--}}
@endsection

@section('front_css')
@endsection



@section('front_script');
<script src="{{asset('js/addclass_script.js')}}"></script>
<script>
    $('select').select2({ width: '100%', placeholder: "Select an Option", allowClear: true, tags: true });
</script>
<script>
    function myFunction() {

        $(".close").attr('disabled' , true);
        $(".add-btn").attr('disabled' , true);
        $(".update-btn").attr('disabled' , true);
    };
</script>
 
<script>
    $('#subselect').selectpicker();
</script>

@endsection

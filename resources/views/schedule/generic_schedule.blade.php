@extends('layouts.master')
@section('title', 'Generate Time Table  ')
@section('content')
<style>
    .add-div-error{    color: red; }
    .edit-div-error{color: red;}
</style>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Auto Schedule</h4>
                </div>
                <div class="card-body">
                    <div class="row bor-sep">
                        <div class="col-sm-12 pull-right">
                           
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
                                                <div class=" col-sm-12 col-lg-3 form-group">
                                                    <label> Class</label>
                                                    <select class="selectpicker cls_id"  name="cls_id" data-size="5" id="cls_id" data-style="btn btn-round btn-secondary" title="Select Class" >
                                                        <option value="" disabled selected>Select Class</option>

                                                       
                                                        @foreach($addClasses as $AddClasse)
                                                            <option value="{{$AddClasse->cls_Id}}">{{$AddClasse->class}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="add-div-error cls_id"></div>
                                                </div>


                                                <div class="col-sm-12 col-lg-3 form-group">
                                                    <label>Section</label>
                                                     <select class="selectpicker section_id"  name="section_id"  id ="section_id"  data-size="5" data-style="btn btn-round btn-secondary" title="Select Section" >
                                                        <option value="" disabled selected>Select Section</option>

                                                       
                                                       
                                                    </select>
                                                    <div class="add-div-error section_id"></div>
                                                </div>



                                                <div class="form-group col-sm-12 col-lg-6">
                                                      
                                                    <button type="button" class="btn btn-secondary btn-round update-btn pull-right" id="generate_geneti">Generate
                                            </button>
                                                </div>

                                            </div>
                                        </div>

                                    </form> 

                           
                        </div>
                    </div>                        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title"></h6>
                                </div>
                                <div class="card-body">
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="alert alert-success" id="success-message" style="display: none">
                                        {{--{{ session()->get('message') }}--}}
                                    </div>

                                    <form method="post" action="" id="saveFormgeneraic">
                                        <div class="overflow-auto" id="schdule_container">
                                        </div>
                                    </form>    
                                </div><!-- end content-->
                            </div><!--  end card  -->
                        </div> <!-- end col-md-12 -->
                    </div> <!-- end row -->
                    <!-- schedule datatable  start row -->
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="">--}}
{{--                                <div class="card-header">--}}
{{--                                    <h6 class="card-title">Schedule List</h6>--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="toolbar">--}}
{{--                                        <!--        Here you can write extra buttons/actions for the toolbar              -->--}}
{{--                                    </div>--}}
{{--                                    <table id="schedule-table" class="table table-hover custom_border" cellspacing="0" width="100%">--}}
{{--                                        <thead class="table-secondary">--}}
{{--                                        <tr>--}}
{{--                                            <th class="text-center w-10">S.No</th>--}}
{{--                                            <th>Class</th>--}}
{{--                                            <th>Section</th>--}}

{{--                                            <th class="disabled-sorting w-15 text-center">Actions</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        @if($Classsched)--}}
{{--                                            @php--}}
{{--                                                $i= 1 ;--}}
{{--                                            @endphp--}}

{{--                                            @foreach($Classsched as $schedule)--}}
{{--                                                <tr>--}}
{{--                                                    <td class="text-center">{{$i++}}</td>--}}
{{--                                                    <td>{{$schedule->class?$schedule->class->class:''}}</td>--}}
{{--                                                    <td>{{$schedule->section?$schedule->section->class_section_name:''}}</td>--}}
{{--                                                    <td class="text-center">--}}
{{--                                                        <div class="form-inline pull-right">--}}
{{--                                                            @can('view-schedule')--}}
{{--                                                                <div class="">--}}
{{--                                                                    <a href="#">--}}
{{--                                                                        <button class="btn-round  btn-sm btn text-info btn-link    btn-cus-weight show-view-class_sched-btn" type="button" data-id="{{$schedule->id}}"--}}
{{--                                                                                data-toggle="modal" data-target="#viewteacherclassshedule" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                                            View--}}
{{--                                                                        </button>--}}
{{--                                                                    </a>--}}

{{--                                                                </div>--}}
{{--                                                            @endcan--}}
{{--                                                            @canany(['edit-schedule', 'delete-schedule'])--}}
{{--                                                                <div class="nav-item btn-rotate dropdown pull-right ">--}}
{{--                                                                    <a class="nav-link dropdown-toggle pull-right" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"--}}
{{--                                                                       aria-expanded="false">--}}
{{--                                                                    </a>--}}
{{--                                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                                                                        @can('edit-schedule')--}}
{{--                                                                            <a class="dropdown-item editClassSched" href="#" data-toggle="modal"--}}
{{--                                                                               data-class="{{$schedule->cls_Id}}"--}}
{{--                                                                               data-section="{{$schedule->c_section_Id}}"--}}
{{--                                                                               data-id="{{$schedule->id}}" aria-haspopup="true" aria-expanded="false">Edit</a>--}}
{{--                                                                        @endcan--}}
{{--                                                                        @can('delete-schedule')--}}
{{--                                                                            <a class="dropdown-item deleteClassSched " data-id="{{$schedule->id}}" href="#">Delete</a>--}}
{{--                                                                        @endcan--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            @endcanany--}}
{{--                                                        </div>--}}
{{--                                                    </td>--}}
{{--                                                <tr>--}}
{{--                                            @endforeach--}}

{{--                                        @endif--}}

{{--                                        </tbody>--}}

{{--                                    </table>--}}
{{--                                </div><!-- end content-->--}}
{{--                            </div><!--  end card  -->--}}
{{--                        </div> <!-- end col-md-12 -->--}}
{{--                    </div> <!-- end lstrow -->--}}
                </div>
             </div>
        </div>
    </div>
</div>
@endsection
@section('front_script')
    <script src="{{asset('js/generic_schedule.js')}}"></script>
@endsection

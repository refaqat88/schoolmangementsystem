@extends('layouts.master')
@section('title', 'Period')
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
                        <h4 class="card-title">{{ __('administrate.Period') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="col-sm-12 pull-right">
                                @can('add-school')

                                <button class="btn btn-secondary btn-round pull-right" data-toggle="modal"
                                        data-target="#SubjectModal" id="show-period-btn">
                                    {{ __('administrate.Add_New_Period') }}
                                </button>
                                @endcan

                            </div>
                        </div>
                        {{--add Subject Modal--}}
                        <div class="modal fade modalvisibillity" id="PeriodModal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">{{ __('administrate.Add_New_Period') }}</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">

                                            <form id="PeriodForm" method="post">
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
                                                
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-sm-3">
                                                        <label>{{ __('administrate.Period') }}</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                                name="period">
                                                        <div class="add-div-error period"></div>
                                                    </div>

                                                    <div class="form-group col-sm-3">
                                                        <label>{{ __('administrate.Order') }}</label>
                                                        <input type="number" class="form-control" placeholder="Order"
                                                                name="orders">
                                                        <div class="add-div-error orders"></div>
                                                    </div>

                                                    <div class="form-group col-sm-3">
                                                        <label>{{ __('administrate.Start_Time') }}</label>
                                                        <input type="time" class="form-control" placeholder=""
                                                                name="start_time">
                                                        <div class="add-div-error start_time"></div>
                                                    </div>
                                                    <div class="form-group col-sm-3">
                                                        <label>{{ __('administrate.End_Time') }}</label>
                                                        <input type="time" class="form-control" placeholder=""
                                                                name="end_time">
                                                        <div class="add-div-error end_time"></div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-secondary btn-link btn-round btn-sm add-new-subject-btn" id="add-period-Btn"> {{ __('layout.Save') }}
                                            </button>

                                        </div>
                                        <div class="divider"></div>
                                        <div class="">
                                            <button type="button"  class="btn btn-danger btn-round btn-sm btn-link" data-dismiss="modal">
                                                {{ __('layout.Cancel') }}
                                            </button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--end add Subject Modal--}}

                        {{--edit Subject Modal--}}
                        
                        <div class="modal fade" id="EditPeriodModal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">{{ __('administrate.Edit_Period') }}</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <form id="EditPeriodForm" action="" method="Post">

                                                @csrf
                                                <input type="hidden" name="id" id="edit_period_id">
                                                <div class="col-sm-12">


                                                    <div class="row">
                                                        <div class="form-group col-sm-3">
                                                            <label>{{ __('administrate.Period') }}</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="period" id="edit_period">
                                                            <div class="edit-div-error period"></div>

                                                        </div>


                                                        <div class="form-group col-sm-3">
                                                            <label>{{ __('administrate.Order') }}</label>
                                                            <input type="number" class="form-control" placeholder="Order"
                                                                    name="orders" id="orders">
                                                            <div class="add-div-error orders"></div>
                                                        </div>

                                                        <div class="form-group col-sm-3">
                                                            <label>{{ __('administrate.Start_Time') }}</label>
                                                            <input type="time" class="form-control" placeholder=""
                                                                name="start_time" id="edit_start_time">
                                                            <div class="edit-div-error start_time"></div>
                                                        </div>
                                                        <div class="form-group col-sm-3">
                                                            <label>{{ __('administrate.End_Time') }}</label>
                                                            <input type="time" class="form-control" placeholder=""
                                                                name="end_time" id="edit_end_time">
                                                            <div class="edit-div-error end_time"></div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-sm btn-secondary btn-link btn-round update-period-btn" id="update-period-btn">{{ __('layout.Update') }}
                                            </button>
                                        </div>
                                        <div class="divider"></div>

                                        <div class="">
                                            <button type="button" class="btn btn-sm btn-danger btn-link btn-round" data-dismiss="modal">
                                                 {{ __('layout.Cancel') }}
                                            </button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--end edit subject modal--}}

                        {{--show subject Modal--}}
                        <div class="modal fade modalvisibillity" id="ShowPeriodModal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">{{ __('administrate.Show_Period') }}</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="form-group col-sm-3">
                                                    <label>{{ __('administrate.Period') }}</label>
                                                    <p id="show_period"></p>
                                                </div>

                                                <div class="form-group col-sm-3">
                                                    <label>{{ __('administrate.Order') }}</label>
                                                    <p id="show_orders"></p>
                                                </div>

                                                <div class="form-group col-sm-3">
                                                    <label>{{ __('administrate.Start_Time') }}</label>
                                                    <p id="show_start_time"></p>
                                                </div>
                                                <div class="form-group col-sm-3">
                                                    <label>{{ __('administrate.End_Time') }}</label>
                                                    <p id="show_end_time"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="button" data-dismiss="modal" class="btn btn-sm btn-danger btn-link btn-round">
                                                {{ __('layout.Close') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--end Show subject modal--}}
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">{{ __('administrate.Periods_Record_List') }}</h6>
                                </div>
                                <div class="card-body">
                                     
                                    <table id="datatable" data-id="datatable"  class="table table-hover custom_border" cellspacing="0"
                                           width="100%">
                                        <thead class="table-secondary">
                                        <tr>
                                            <th class="text-center w-10" >{{ __('layout.SNo') }}</th>
                                            <th class="w-25">{{ __('administrate.Period') }}</th>
 
                                            <th class="w-auto">{{ __('administrate.Start_Time') }}</th>
                                            <th class="w-auto">{{ __('administrate.End_Time') }}</th>
                                            <th class="disabled-sorting text-center w-auto">{{ __('layout.Actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; ?>
                                        @foreach($periods as $period)
                                            <tr>
                                                <td class="text-center">{{$i++}}</td>
                                                <td>{{$period->period}}</td>
{{--                                                <td>{{$period->orders}}</td>--}}
                                                <td>{{$period->start_time}}</td>
                                                <td>{{$period->end_time}}</td>
                                                <td class="text-center w-15">
                                                    <div class="form-inline text-center">
                                                        <div class="">
                                                            <button class=" btn-round  btn-sm btn text-info btn-link    btn-cus-weight view-period-btn"
                                                                    type="button"
                                                                    data-toggle="modal"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false" data-id="{{ $period->id  }}">
                                                                {{ __('layout.View') }}
                                                            </button>
                                                        </div>
                                                        
                                                        @canany(['edit-school','delete-school'])
                                                        <div
                                                                class="nav-item btn-rotate dropdown pull-right ">
                                                            <a class="nav-link dropdown-toggle pull-right"
                                                               href="javascript:void(0)" id="navbarDropdownMenuLink"
                                                               data-toggle="dropdown"
                                                               aria-haspopup="true"
                                                               aria-expanded="false" data-id="{{ $period->id  }}">
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="navbarDropdownMenuLink">
                                                            
                                                                 @can('edit-school')
                                                                     
                                                                <a class="dropdown-item edit-period-btn" href="javascript:void(0)"
                                                                   data-toggle="modal"
                                                                   aria-haspopup="true"
                                                                   aria-expanded="false" data-id="{{ $period->id }}">{{ __('layout.Edit') }}</a>
                                                                @endcan
                                                                  @can('delete-school')  
                                                                <a class="dropdown-item delete-period-btn"
                                                                   href="#" data-id="{{$period->id }}">{{ __('layout.Delete') }}</a>
                                                                   @endcan
                                                            </div>
                                                        </div>

                                                        @endcanany

                                                    </div>
                                                </td>
                                                {{--<td class="text-center">
                                                    <a href="javascript:void(0)" title="View"
                                                       class="btn btn-info btn-link btn-icon btn-sm show"
                                                       id="show-subject" data-toggle="modal"
                                                       data-id="{{ $subject->sub_Id }}"><i class="fa fa-eye"></i></a>
                                                    --}}{{--<a href="{{url('edit-subject/'.$subject->sub_Id)}}"   title="Edit" class="btn btn-warning btn-link btn-icon btn-sm edit" id="EditSubject"><i class="fa fa-edit"></i></a>
                                                    --}}{{--
                                                    <a href="javascript:void(0)"
                                                       class="btn btn-warning btn-link btn-icon btn-sm edit"
                                                       id="edit-subject" data-toggle="modal"
                                                       data-id="{{ $subject->sub_Id }}"><i class="fa fa-edit"></i> </a>
                                                    <a href="{{url('delete-subject/'.$subject->sub_Id)}}" title="Delete"
                                                       class="btn btn-danger btn-link btn-icon btn-sm edit"
                                                       onclick="return confirm('Are you sure you want to delete this Subject?');"><i
                                                            class="fa fa-times"></i></a>

                                                </td>--}}
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

    @section('front_script')
    <script src="{{asset('adminassets/validator/dist/jquery.validate.js')}}">

    </script>
    
    <script src="{{asset('js/period_script.js')}}"></script>
    


 
 
@endsection

@extends('layouts.master')
@section('title', 'Add Subject')
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
                        <h4 class="card-title">{{ __('administrate.Subjects') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="col-sm-12 pull-right">
                                @can('add-school')

                                <button class="btn btn-secondary btn-round pull-right" data-toggle="modal"
                                        data-target="#SubjectModal" id="show-subject-btn">
                                    {{ __('administrate.Add_New_Subject') }}
                                </button>
                                @endcan

                            </div>
                        </div>
                        {{--add Subject Modal--}}
                        <div class="modal fade modalvisibillity" id="SubjectModal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">{{ __('administrate.Add_New_Subject') }}</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">

                                            <form id="SubjectForm" method="post">
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
                                                    <div class="form-group col-sm-6">
                                                        <label>{{ __('administrate.Name') }}</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                                name="name">
                                                        <div class="add-div-error name"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>{{ __('administrate.Code') }}</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                                name="code">
                                                        <div class="add-div-error code"></div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-round btn-secondary btn-link btn-sm add-new-subject-btn" id="add-subject-Btn">{{ __('layout.Save') }}
                                            </button>

                                        </div>
                                        <div class="divider"></div>

                                        <div class="">
                                            <button type="button"  class="btn btn-round btn-danger btn-link btn-sm" data-dismiss="modal">
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
                        
                        <div class="modal fade" id="EditSubjectModal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">{{ __('administrate.Edit_Subject') }}</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <form id="EditSubjectForm" action="" method="Post">

                                                @csrf
                                                <input type="hidden" name="id" id="sub_id">
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
                                                        <div class="form-group col-sm-6">
                                                            <label>{{ __('administrate.Name') }}</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="name" id="sub_name">
                                                            <div class="edit-div-error name"></div>

                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label>{{ __('administrate.Code') }}</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="code" id="sub_code">
                                                            <div class="edit-div-error code"></div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                               
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-round btn-secondary btn-link btn-sm update-subject-btn" id="update-Btn">{{ __('layout.Update') }}
                                            </button>
                                        </div>
                                        <div class="divider"></div>

                                        <div class="">
                                            <button type="button" class="btn btn-round btn-danger btn-link btn-sm" data-dismiss="modal">
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
                        <div class="modal fade modalvisibillity" id="ShowSubjectModal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">{{ __('administrate.View_Subject') }}</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>{{ __('administrate.Name') }}</label>
                                                    <p id="show_sub_name"></p>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>{{ __('administrate.Code') }}</label>
                                                    <p id="show_sub_code"></p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                               
                                    <div class="modal-footer">

                                        <div class="">
                                            <button type="button" data-dismiss="modal" class="btn btn-round btn-danger btn-link btn-sm">
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
{{--                            @if(session()->has('message'))--}}
{{--                                <div class="alert alert-success col-md-6" id="success-alert1">--}}
{{--                                    {{ session()->get('message') }}--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            <div class="alert alert-success" id="success-message" style="display: none">--}}
{{--                                --}}{{--{{ session()->get('message') }}--}}
{{--                            </div>--}}
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">{{ __('administrate.Subjects_Record_List') }}</h6>
                                </div>
                                <div class="card-body">
                                     
                                    <table  id="datatable" data-id="datatable"  class="table table-hover custom_border" cellspacing="0"
                                           width="100%">
                                        <thead class="table-secondary">
                                        <tr>
                                            <th class="text-center" width="10%">{{ __('layout.SNo') }}</th>
                                            <th>{{ __('administrate.Name') }}</th>
                                            <th>{{ __('administrate.Code') }}</th>
                                            <th class="disabled-sorting text-center w-15">{{ __('layout.Actions') }}</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php $i=1; ?>
                                        @foreach($subjects as $subject)
                                            <tr>
                                                <td class="text-center">{{$i++}}</td>
                                                <td>{{$subject->subject}}</td>
                                                <td>{{$subject->sub_Code}}</td>
                                                <td class="text-center">
                                                    <div class="form-inline pull-right">
                                                        <div class="">
                                                            <button class=" btn-round  btn-sm btn text-info btn-link    btn-cus-weight show-subject"
                                                                    type="button"
                                                                    data-toggle="modal"
                                                                    {{-- data-target="#viewclass"--}}
                                                                    id="show-subject"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false" data-id="{{ $subject->sub_Id  }}">
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
                                                               aria-expanded="false" data-id="{{ $subject->sub_Id }}">
                                                            </a>
                                                            <div
                                                                    class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="navbarDropdownMenuLink">
                                                            
                                                                 @can('edit-school')
                                                                     
                                                                <a class="dropdown-item edit-subject" href="javascript:void(0)"
                                                                   data-toggle="modal" id="edit-subject"
                                                                   {{-- data-target="#editclass"--}}
                                                                   aria-haspopup="true"
                                                                   aria-expanded="false" data-id="{{ $subject->sub_Id }}">{{ __('layout.Edit') }}</a>
                                                                @endcan
                                                                  @can('delete-school')  
                                                                <a class="dropdown-item delete-subject-btn"
                                                                   href="#" data-id="{{$subject->sub_Id}}">{{ __('layout.Delete') }}</a>
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

@section('front_script')
    <script src="{{asset('adminassets/validator/dist/jquery.validate.js')}}">
    </script>
    <script src="{{asset('js/subject_script.js')}}"></script>
   
@endsection

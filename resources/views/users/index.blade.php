@extends('layouts.master')
@section('title', 'Users')
@section('content')
<style>
    .ad {
        border-bottom: 1px solid #ddd;
        padding: 16px 0px 0 16px;
        margin-left: 3px;
    }
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
                            <h4 class="card-title">{{ __('layout.Users') }}</h4>
                        </div>
                        <div class="card-body">
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-12 pull-right">--}}
{{--                                    @can('add-user')--}}
{{--                                    <button class="btn btn-round btn-secondary pull-right" data-toggle="modal" id="show-user-btn">--}}
{{--                                        Add New User--}}
{{--                                    </button>--}}
{{--                                    @endcan--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="modal fade" id="user-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up" id="modal-title">{{ __('user.New_User_Details') }}
</h5>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col-sm-4">
                                                <div class="row">
                                                    <form id="user-form" action="" method="Post">
                                                        @csrf
                                                    <div class="form-group col-sm-12">
                                                        <label>{{ __('user.User_Type') }}</label>

                                                        <select class="selectpicker btn-round pl-0" data-size="7" name="roles[]" data-style="btn-round btn btn-secondary" title="Select User Type">
                                                            <option value="" disabled selected>{{ __('user.Select_Type') }}</option>
                                                            @foreach($roles as $role)
                                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="add-div-error roles"></div>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label>{{ __('user.Name') }}</label>
                                                        <input type="text" class="form-control" placeholder="" name="name" required="true"/>
                                                        <div class="add-div-error name"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>{{ __('user.Username') }}</label>
                                                        <input type="text" class="form-control" placeholder="" name="username" required="true"/>
                                                        <div class="add-div-error username"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6 select-wizard">
                                                        <label>{{ __('layout.Password') }} *</label>
                                                        <input class="form-control" name="password" id="userPassword" type="password" required="true" />
                                                        <div class="add-div-error password"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>{{ __('layout.Confirm_Password') }} *</label>
                                                        <input class="form-control" name="password_confirmation" id="userconfirmpassword" type="password" required="true" equalTo="#registerPassword" />
                                                        <div class="add-div-error password_confirmation"></div>
                                                    </div>
                                                    <div class="pull-right col-sm-6">


 
                                                    </div>

                                                    <div class="form-check  pull-right col-sm-6 checkbox-general">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" name="status">
                                                            <span class="form-check-sign"></span>
                                                           {{ __('layout.Check_if_user_is_inactive') }} 
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                       
                                        <div class="modal-footer">
                                            <div class="">
                                                <button type="submit" class="btn btn-round btn-success btn-link add-btn" id="save-btn">{{ __('layout.Save') }}</button>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="">
                                                <button type="button" class="btn btn-round btn-danger btn-link" data-dismiss="modal">{{ __('layout.Cancel') }}</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="edit-user-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-sm">
                                    <div class="modal-content">
                                        <form id="edit-user-form" action="" method="Post">
                                            @csrf
                                            <input type="hidden" name="id" id="edit-user-id">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up" id="modal-title">{{ __('layout.Edit_User_Details') }}</h5>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col-sm-4">
                                                <div class="row">

                                                    <div class="form-group col-sm-12">
                                                        <label class="col-sm-12 col-lg-12">{{ __('layout.User_Type') }}</label>
                                                        <select class="selectpicker btn-round pl-0 pr-0 col-lg-12 col-sm-12" data-size="7" name="roles[]" data-style="btn btn-secondary btn-round" title="{{ __('layout.Select_Type') }}" id="edit-user-type">
                                                            <option value="">{{ __('layout.Select_Type') }} Select Type</option>
                                                            @foreach($roles as $role)
                                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                                            @endforeach

                                                        </select>
                                                        <div class="edit-div-error user_type"></div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-lg-12">
                                                        <label>{{ __('layout.Name') }}</label>
                                                        <input type="text" class="form-control" placeholder="" name="name"  id="edit-name"/>
                                                        <div class="edit-div-error given_name"></div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>{{ __('layout.Username') }}</label>
                                                        <input type="text" class="form-control" placeholder="" name="username"  id="edit-username" />
                                                        <div class="edit-div-error username"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>{{ __('layout.Mobile') }}</label>
                                                        <input type="text" class="form-control" placeholder="" name="mobile"  id="edit-mobile" />
                                                        <div class="edit-div-error mobile"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6 select-wizard">
                                                        <label>{{ __('layout.Password') }} *</label>
                                                        <input class="form-control" name="password" id="edituserPassword" type="password"/>

                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>{{ __('layout.Confirm_Password') }} *</label>
                                                        <input class="form-control" name="password_confirmation" id="edituserconfirmpassword" type="password" />
                                                    </div>
                                                     
                                                </div>
                                                <div class="row">
                                                    <div class="form-check form-group col-sm-12 col-lg-6 checkbox-general ml-3">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" name="status" id="edit-status" />
                                                            <span class="form-check-sign"></span>
                                                            {{ __('layout.Check_if_user_is_inactive') }}
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>


                                        <div class="modal-footer">
                                            <div class="">
                                                <button type="submit" class="btn btn-round btn-success btn-link  btn-sm update-btn" id="edit-save-btn">{{ __('layout.Update') }}</button>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="">
                                                <button type="button" class="btn btn-round btn-danger btn-link btn-sm" data-dismiss="modal">{{ __('layout.Cancel') }}</button>
                                            </div>
                                           </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="show-user-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up" id="modal-title">{{ __('user.view_User_Detail') }}</h5>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="form-group col-sm-6 ">
                                                        <label>{{ __('user.User_Type') }}</label>
                                                        <p class="ad" id="show-user-type">No Value</p>
                                                    </div>
                                                    <div class="form-group col-sm-6 ">
                                                        <label>{{ __('user.Name') }}</label>
                                                        <p class="ad" id="show-name">No Value</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="col-sm-6  ex1">
                                                <div class="row">
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label> {{ __('layout.User_Name') }}</label>
                                                        <p class="ad" id="show-username">No Value</p>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>{{ __('layout.Status') }}</label>
                                                        <p class="ad" id="show-status">No Value</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="modal-footer">
                                            <div class="">
                                                <button type="submit" class="btn btn-round btn-secondary btn-sm btn-link" data-dismiss="modal" id="show-save-btn">{{ __('layout.Save') }}</button>
                                            </div>

                                            <div class="">
                                                <button type="button" class="btn btn-round btn-danger btn-link btn-sm" data-dismiss="modal">{{ __('layout.Close') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
{{--                                @if(session()->has('message'))--}}
{{--                                    <div class="alert alert-success" id="success-alert">--}}
{{--                                        {{ session()->get('message') }}--}}
{{--                                    </div>--}}
{{--                                @endif--}}
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title">{{ __('layout.Users_Record_List') }}</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="toolbar">
                                            <div class="form-group col-sm-2 select-wizard">
                                                <select class="selectpicker" data-size="5" id="user-filter" name="user_filter" data-style="btn btn-sm btn-secondary btn-round"
                                                        title="Filter" required="true">
                                                    <option value="" disabled >Select Class</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                         
                                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                                        </div>

                                        @include('users.partials.user_data')
                                    </div><!-- end content-->
                                </div><!--  end card  -->
                            </div> <!-- end col-md-12 -->
                        </div> <!-- end row -->

                    </div>

                    <!--<div class="card-footer text-right">-->
                    <!--<div class="form-check pull-left">-->
                    <!--<label class="form-check-label">-->
                    <!--<input class="form-check-input" type="checkbox" name="optionCheckboxes" required>-->
                    <!--<span class="form-check-sign"></span>-->
                    <!--Subscribe to newsletter-->
                    <!--</label>-->
                    <!--</div>-->
                    <!--<button type="submit" class="btn btn-primary">Register</button>-->
                    <!--</div>-->
            </div>

        </div>

    </div>

@endsection

@section('front_css')
    <link rel="stylesheet" href="{{asset('custom.css')}}">
@endsection
@section('front_script')

    <script src="{{asset('adminassets/validator/dist/jquery.validate.js')}}"></script>
    <script src="{{asset('js/user_script.js')}}"></script>
     

@endsection


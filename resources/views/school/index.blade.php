@extends('layouts.master')
@section('title', 'Add School')
@section('content')
<style>
    .edit-div-error{
        color: red;
    }
</style>
<div class="content">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card ">
                <div class="card-header ">
                    @foreach($schools as  $school)
                        <h4 class="card-title">{{$school->school_Name}}</h4>@endforeach
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="card-header">
                            <h6 class="card-title">{{ __('administrate.campas_list') }}</h6>
                        </div>
                        <div class="toolbar">
                           {{-- <div class="row">
                                <div class="col-sm-12 col-lg-12 col-md-12 float-right">
                                    <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-print" title="Print" data-toggle=""></i></button>
                                    <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-file-excel-o" title="Export to Excel" data-toggle=""></i></button>
                                </div>
                            </div>--}}
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        
                        <table id="datatable" data-id="datatable" class="table table-hover custom_border" cellspacing="0"
                               width="100%">
                            <thead class="table-secondary">
                            <tr>
                                <th class="text-center w-auto" >{{ __('layout.SNo') }}</th>
                                <th class="w-auto">{{ __('administrate.Campus_Name') }}</th>
                                <th class="w-auto">{{ __('administrate.SCHOOL_LOGO') }}</th>
                                <th class="w-auto">{{ __('administrate.Reg_No') }}</th>
                                <th class="w-auto">{{ __('administrate.Board') }}</th>
                                <th class="w-auto">{{ __('administrate.Principal') }}</th>
                                <th class="w-auto">{{ __('administrate.District') }}</th>
                                <th class="w-auto">{{ __('administrate.City') }}</th>
                                <th class="disabled-sorting text-center w-auto ">{{ __('layout.Actions') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i = 0 @endphp
                            @foreach($schools as  $school)
                                <tr>
                                    <td class="text-center">{{$i+1}}</td>
                                    <td>{{$school->school_Name}}</td>
                                    <td><img src="{{ asset('upload/school/'.$school->school_logo)}}" class="thumbnail" width="100px" alt=""></td>
                                    <td>{{$school->registration}}</td>
                                    <td>{{$school->board?$school->board->board_Name:''}} </td>
                                    <td>{{$school->principal_Name}}</td>
                                   <td>{{$school->domicile?$school->domicile->dom_District:''}}</td> 
                                    <td>{{$school->city?$school->city->city_name:''}} </td>
                                    <td class="text-center">
                                        <div class="form-inline pull-right">
                                            <div class="">
                                                @can('view-school')
                                                    <button class="btn-round  btn-sm btn text-info btn-link    btn-cus-weight show-view-class-btn"
                                                            type="button"
                                                            data-toggle="modal"
                                                            {{-- data-target="#viewclass"--}}
                                                            id="view-school-btn"
                                                            aria-haspopup="true"
                                                            aria-expanded="false"
                                                            data-id="{{ $school->pk_school_Id }}">
                                                        {{ __('layout.View') }}
                                                    </button>
                                                @endcan
                                            </div>

                                            @can('edit-school')
                                                <div  class="nav-item btn-rotate dropdown pull-right">
                                                    <a class="nav-link dropdown-toggle pull-right"
                                                       href="javascript:void(0)" id="navbarDropdownMenuLink"
                                                       data-toggle="dropdown"
                                                       aria-haspopup="true"
                                                       aria-expanded="false" data-id="{{ $school->pk_school_Id }}">
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="navbarDropdownMenuLink">
                                                        <a class="dropdown-item edit-school-btn btn-round"
                                                           href="javascript:void(0)"
                                                           data-toggle="modal"
                                                           aria-haspopup="true"
                                                           aria-expanded="false"
                                                           data-id="{{ $school->pk_school_Id }}">{{ __('layout.Edit') }}</a>
                                                    </div>
                                                </div>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div>
                   
                </div>
            </div>
        </div>
    </div>

 </div>      


 {{--Start Edit School Modal--}}
                    <div class="modal fade modalvisibillity" id="edit-School-modal" tabindex="-1" role="dialog"
                         aria-labelledby="ModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-xl modal-sm">
                            <form id="editschoolform" enctype="multipart/form-data">

                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close btn-round" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up">Edit School </h5>
                                    </div>

                                    <div class="modal-body ">
                                       

                                            <div class="row bor-sep">
                                                <h6 class="col-sm-12">Campus Details</h6>
                                                <input type="hidden" id="edit-school-id" name="id">
                                                <div class="form-group col-sm-12 col-lg-4">
                                                    <label>Campus Name</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                           id="edit-school-name" name="school_Name"/>
                                                    <div class="edit-div-error school_Name"></div>
                                                </div>


                                                    <div class="col-sm-4">
                                                        <div class="">
                                                            <label for="edit-school-logo">School Logo</label>
                                                            <input type="file" name="school_logo" id="edit-school-logo"  value="{{ $school->school_logo}}">
                                                            <div class="edit-div-error school_logo"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label></label>
                                                            <p><img src="" id="sch-logo-view"class="thumbnail" width="50px" height="auto" alt="School Logo">
                                                            </p>
                                                        </div>
                                                    </div>

                                                <div class="form-group col-sm-12 col-lg-4">
                                                    <label>{{ __('administrate.Principal_Name') }}</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                           id="edit-principal-name" name="principal_Name"/>
                                                    <div class="edit-div-error principal_Name"></div>
                                                </div>
                                                <div class="form-group col-sm-12 col-lg-4">
                                                    <label>{{ __('administrate.Affiliation_No') }}</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                           id="edit-affiliation" name="affiliation_No"/>
                                                    <div class="edit-div-error affiliation_No"></div>
                                                </div>
                                                <div class=" col-sm-12 col-lg-4 select-wizard">
                                                    <label>{{ __('administrate.Board') }}</label>
                                                    <select class="selectpicker" data-size="5"
                                                            data-style="btn btn-secondary"
                                                            title="Select Board"name="board" id="edit-board">
                                                        <option value="" disabled selected>Select Board</option>
                                                        @foreach($boards as $board)
                                                            <option
                                                                    value="{{$board->pk_board_Id}}">{{$board->board_Name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="edit-div-error board"></div>
                                                </div>
                                                <div class="form-group col-sm-12 col-lg-4">
                                                    <label>{{ __('administrate.Registration_No') }}</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                           id="edit-registration" name="registration">
                                                    <div class="edit-div-error registration"></div>
                                                </div>
                                                <div class="form-group col-sm-12 col-lg-4">
                                                    <label>{{ __('administrate.Registration_Authority') }}</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                           id="edit-registered-with" name="registered_with">
                                                    <div class="edit-div-error registered_with"></div>
                                                </div>

                                            </div>
                                            <div class="row bor-sep">
                                                <h6 class="col-sm-12">{{ __('administrate.Contact_Details') }}</h6>
                                                <div class="form-group col-sm-12 col-lg-4">
                                                    <label>{{ __('administrate.Primary_Contact_No') }}</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                           id="edit-primary-contact" name="primary_Contact">
                                                    <div class="edit-div-error primary_Contact"></div>
                                                </div>
                                                <div class="form-group col-sm-12 col-lg-4">
                                                    <label>{{ __('administrate.Secondary_Contact_No') }}</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                           id="edit-secondary-contact"  name="secondary_Contact">
                                                    <div class="edit-div-error secondary_Contact"></div>
                                                </div>
                                                <div class="form-group col-sm-12 col-lg-4">
                                                    <label>Email Address</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                           id="edit-email" name="email">
                                                    <div class="edit-div-error email"></div>
                                                </div>
                                                <div class="form-group col-sm-12 col-lg-4">
                                                    <label>Website</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                           id="edit-website" name="website" >
                                                    <div class="edit-div-error website"></div>
                                                </div>

                                                <div class=" col-sm-12 col-lg-4 select-wizard">
                                                    <label>District</label>
                                                    <select class="selectpicker" data-size="7"
                                                            data-style="btn btn-secondary"
                                                            title="Select Billing Scgedule" name="district" id="edit-district">
                                                        <option value="" disabled selected>Select District</option>
                                                        @foreach($districts as $district)
                                                            <option
                                                                    value="{{$district->dom_Id}}">{{$district->dom_District}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="edit-div-error district"></div>
                                                </div>
                                                <div class=" col-sm-12 col-lg-4 select-wizard">
                                                    <label>City</label>
                                                    <select class="selectpicker" data-size="7"
                                                            data-style="btn btn-secondary"
                                                            title="Select Billing Scgedule" name="city" id="edit-city">
                                                        <option value="" disabled selected>Select City</option>
                                                        @foreach($cities as $city)
                                                            <option
                                                                    value="{{$city->pk_city_id}}">{{$city->city_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="edit-div-error city"></div>
                                                </div>

                                                <div class="select-wizard col-sm-12">
                                                    <label> {{ __('administrate.Street_Address') }}</label>
                                                    <textarea type="text" class="form-control" placeholder=""
                                                              id="edit-school-address" name="school_address"></textarea>
                                                    <div class="edit-div-error school_address"></div>
                                                </div>

                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="button" class="btn btn-sm btn-secondary btn-link btn-round  update-btn"
                                                    id="update-school-btn">{{ __('layout.Update') }}
                                            </button>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="">
                                            <button type="button"
                                                    class="btn btn-sm btn-danger btn-link btn-round " data-dismiss="modal">{{ __('layout.Cancel') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                       </div>

                    </div>

{{--view School Modal--}}
<div class="modal fade" id="view-school-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl modal-sm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-remove"></i>
                </button>
                <h5 class="title title-up">School Details</h5>
            </div>
            <div class="modal-body ">
                <div class="row bor-sep">
                    <h6 class="col-sm-12 col-lg-12">Campus Details</h6>
                    <div class="col-sm-12 col-lg-4 form-group">
                        <label class="font-weight-bolder">Campus Name</label>
                        <p id="show-school-name"></p>
                        <hr>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <h6 class="col-sm-12 col-lg-12">School Logo</h6>
                            <p><img src="" id="show-logo-view" class="thumbnail font-weight-bolder" width="50px" height="auto" alt="School Logo">
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4 form-group">
                        <label class="font-weight-bolder">Principal Name</label>
                        <p id="show-principal-name"></p>
                        <hr>
                    </div>
                    <div class="col-sm-12 col-lg-4 form-group">
                        <label class="font-weight-bolder">Affiliation No</label>
                        <p id="show-affiliation-no">Affiliation No</p>
                        <hr>
                    </div>
                    <div class="col-sm-12 col-lg-4 form-group">
                        <label class="font-weight-bolder">Board</label>
                        <p id="show-board">Board</p>
                        <hr>
                    </div>
                    <div class="col-sm-12 col-lg-4 form-group">
                        <label class="font-weight-bolder">Registration</label>
                        <p id="show-registration">Registration</p>
                        <hr>
                    </div>
                    <div class="col-sm-12 col-lg-4 form-group">
                        <label class="font-weight-bolder">Registered With</label>
                        <p id="show-registered-with">Registered With</p>
                        <hr>
                    </div>
                </div>


                <div class="row bor-sep">
                    <h6 class="col-sm-12">Contact Details</h6>
                    <div class="col-sm-12 col-lg-3 form-group">
                        <label class="font-weight-bolder">Primary Contact</label>
                        <p id="show-primary-contact">Primary Contact</p>
                        <hr>
                    </div>
                    <div class="col-sm-12 col-lg-3 form-group">
                        <label class="font-weight-bolder">Secondary Contact</label>
                        <p id="show-secondary-contact">Secondary Contact</p>
                        <hr>
                    </div>
                    <div class="col-sm-12 col-lg-3 form-group">
                        <label class="font-weight-bolder">Email</label>
                        <p id="show-email">Email</p>
                        <hr>
                    </div>
                    <div class="col-sm-12 col-lg-3 form-group">
                        <label class="font-weight-bolder">Website</label>
                        <p id="show-website">Website</p>
                        <hr>
                    </div>
                    <div class="col-sm-12 col-lg-3 form-group">
                        <label class="font-weight-bolder">District</label>
                        <p id="show-district">District</p>
                        <hr>
                    </div>
                    <div class="col-sm-12 col-lg-3 form-group">
                        <label class="font-weight-bolder">City</label>
                        <p id="show-city">City</p>
                        <hr>
                    </div>
                    <div class="col-sm-12 col-lg-3 form-group">
                        <label class="font-weight-bolder">Address</label>
                        <p id="show-address">Address</p>
                        <hr>
                    </div>

                </div>
                 
            </div>

            <div class="modal-footer">
                <div class="">
                    <button type="button" class="btn btn-sm btn-danger btn-link btn-round" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{--End view Schhool Modal--}}

@endsection


@section('front_css')
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet"/>
@endsection

@section('front_script')
    <script src="{{asset('js/select2.js')}}"></script>

    <script src="{{asset('js/school_script.js')}}"></script>

@endsection

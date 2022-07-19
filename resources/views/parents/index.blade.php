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
                            <h4 class="card-title">Parents</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 pull-right">
                                    
                                </div>
                            </div>
                           
                            <div class="modal fade" id="edit-user-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up" id="modal-title">User Details</h5>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col-sm-4">
                                                <div class="row">
                                                    <form id="edit-user-form" action="" method="Post">
                                                        @csrf
                                                        <input type="hidden" name="id" id="edit-user-id">
                                                    <div class="form-group col-sm-12">
                                                        <label>User Type</label>
                                                        <select class="selectpicker btn-round pl-0" data-size="7" name="roles[]" data-style="btn btn-secondary btn-round" title="Select User Type" id="edit-user-type">
                                                            <option value="">Select Type</option>
                                                            @foreach($roles as $role)
                                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                                            @endforeach

                                                        </select>
                                                        <div class="edit-div-error user_type"></div>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" placeholder="" name="name"  id="edit-name"/>
                                                        <div class="edit-div-error given_name"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="divider "></div>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" placeholder="" name="username"  id="edit-username" />
                                                        <div class="edit-div-error username"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6 select-wizard">
                                                        <label>Password *</label>
                                                        <input class="form-control" name="password" id="edituserPassword" type="password"/>

                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Confirm Password *</label>
                                                        <input class="form-control" name="password_confirmation" id="edituserconfirmpassword" type="password" />
                                                    </div>
                                                    <div class="pull-right col-sm-6">

                                                       {{-- <label class="form-check-label pull-right"><span>Check if user is inactive</span></label>
                                                        <input type="checkbox" class="form-control fancy-check pull-right" name="status" id="edit-status"/>--}}
                                                    </div>

                                                    <div class="form-check  pull-left col-sm-6 checkbox-general">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" name="status" id="edit-status" />
                                                            <span class="form-check-sign"></span>
                                                            Check if user is inactive
                                                        </label>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!--<div class="modal-body row">-->
                                        <!--<div class="col-sm-6">-->
                                        <!--<div class="row">-->
                                        <!--<h6 class="col-sm-12">New Class Details</h6>-->
                                        <!--<div class="form-group col-sm-6">-->
                                        <!--<label>Class Name</label>-->
                                        <!--<input type="text" class="form-control" placeholder="" name="houseallow"  number="true" number="true">-->
                                        <!--</div>-->
                                        <!--<div class="form-group col-sm-6">-->
                                        <!--<label>Numeric Name</label>-->
                                        <!--<input type="text" class="form-control" placeholder="" name="houseallow"  number="true" number="true">-->
                                        <!--</div>-->
                                        <!--<div class="form-group col-sm-6">-->
                                        <!--<label>No of Periods</label>-->
                                        <!--<input type="text" class="form-control" placeholder="" name="houseallow"  number="true" number="true">-->
                                        <!--</div>-->
                                        <!--<div class=" col-sm-6 select-wizard">-->
                                        <!--<label>Assign Teacher</label>-->
                                        <!--<select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Billing Scgedule" >-->
                                        <!--<option value="" disabled selected>Select Teacher</option>-->
                                        <!--<option value="1">Ahmed</option>-->
                                        <!--<option value="2">Jaffar</option>-->
                                        <!--<option value="3">Muneer</option>-->
                                        <!--<option value="3">Saleem</option>-->
                                        <!--<option value="3">Awais</option>-->
                                        <!--<option value="1">Ahmed</option>-->
                                        <!--<option value="2">Jaffar</option>-->
                                        <!--<option value="3">Muneer</option>-->
                                        <!--<option value="3">Saleem</option>-->
                                        <!--<option value="3">Awais</option>-->
                                        <!--</select>-->
                                        <!--</div>-->
                                        <!--<div class=" col-sm-6 select-wizard">-->
                                        <!--<label>School Section</label>-->
                                        <!--<select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Billing Scgedule" >-->
                                        <!--<option value="" disabled selected>Select Section</option>-->
                                        <!--<option value="1">Pre School</option>-->
                                        <!--<option value="2">Primary School</option>-->
                                        <!--<option value="2">Middle School</option>-->
                                        <!--<option value="2">High School</option>-->
                                        <!--</select>-->
                                        <!--</div>-->
                                        <!--<div class="form-group col-sm-6">-->
                                        <!--<label>Tuition Fee</label>-->
                                        <!--<input type="text" class="form-control" placeholder="" name="houseallow"  number="true" number="true">-->
                                        <!--</div>-->
                                        <!--<div class="col-sm-12">-->
                                        <!--<label>Assign Subjects</label>-->
                                        <!--<select class="selectpicker" data-style="btn btn-secondary " multiple title="Choose Subjects" data-size="7">-->
                                        <!--<option disabled> Choose Subjects</option>-->
                                        <!--<option value="2">English </option>-->
                                        <!--<option value="3">Urdu</option>-->
                                        <!--<option value="4">Math</option>-->
                                        <!--<option value="5">History</option>-->
                                        <!--<option value="6">G.Science </option>-->
                                        <!--<option value="7">Drawingt</option>-->
                                        <!--<option value="8">S.Studies </option>-->
                                        <!--<option value="9">Pak Studies</option>-->
                                        <!--<option value="10">Geography</option>-->
                                        <!--<option value="11">Bio</option>-->
                                        <!--<option value="12">Chemistry </option>-->
                                        <!--<option value="13">Physics</option>-->
                                        <!--<option value="14">Computer Studies </option>-->
                                        <!--<option value="15">Islamiat</option>-->
                                        <!--<option value="16">Arabic</option>-->
                                        <!--</select>-->
                                        <!--</div>-->
                                        <!--</div>-->
                                        <!--</div>-->
                                        <!--<div class="divider"></div>-->
                                        <!--<div class="col-sm-6">-->
                                        <!--<div class="row">-->
                                        <!--<h6 class="col-sm-12">Add Section</h6>-->
                                        <!--<div class=" col-sm-6 select-wizard">-->
                                        <!--<label>For Class</label>-->
                                        <!--<select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Class" >-->
                                        <!--<option value="" disabled selected>Select Class</option>-->
                                        <!--<option value="1">Playgroup</option>-->
                                        <!--<option value="2">Kindergarten</option>-->
                                        <!--<option value="3">Preparatory</option>-->
                                        <!--<option value="1">One</option>-->
                                        <!--<option value="2">Two</option>-->
                                        <!--<option value="3">Three</option>-->
                                        <!--<option value="1">Four</option>-->
                                        <!--<option value="2">Five</option>-->
                                        <!--<option value="3">Six</option>-->
                                        <!--<option value="1">Seven</option>-->
                                        <!--<option value="2">Eight</option>-->
                                        <!--<option value="3">Eleven</option>-->
                                        <!--</select>-->
                                        <!--</div>-->
                                        <!--<div class="form-group col-sm-6">-->
                                        <!--<label>Section Name</label>-->
                                        <!--<input type="text" class="form-control" placeholder="" name="houseallow"  number="true" number="true" required="true">-->
                                        <!--</div>-->
                                        <!--<div class="col-sm-12">-->
                                        <!--<label>Add Students</label>-->
                                        <!--<select class="selectpicker" data-style="btn btn-secondary " multiple title="Choose Students" data-size="7">-->
                                        <!--<option disabled> Choose Students</option>-->
                                        <!--<option value="1">Ali</option>-->
                                        <!--<option value="2">Basit</option>-->
                                        <!--<option value="2">Kashif</option>-->
                                        <!--<option value="1">Ahmed</option>-->
                                        <!--<option value="2">Jaffar</option>-->
                                        <!--<option value="3">Muneer</option>-->
                                        <!--<option value="3">Saleem</option>-->
                                        <!--<option value="3">Awais</option>-->
                                        <!--<option value="1">Ahmed</option>-->
                                        <!--<option value="2">Jaffar</option>-->
                                        <!--<option value="3">Muneer</option>-->
                                        <!--<option value="3">Saleem</option>-->
                                        <!--<option value="3">Awais</option>-->
                                        <!--</select>-->
                                        <!--</div>-->
                                        <!--<div class="form-group col-sm-6">-->
                                        <!--<label>No of Students Added</label>-->
                                        <!--<input type="text" class="form-control" placeholder="" name="houseallow"  number="true" number="true">-->
                                        <!--</div>-->
                                        <!--<div class=" col-sm-6 select-wizard">-->
                                        <!--<label>Assign Class Rep</label>-->
                                        <!--<select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Billing Scgedule" >-->
                                        <!--<option value="" disabled selected>Select Student</option>-->
                                        <!--<option value="1">Ali</option>-->
                                        <!--<option value="2">Basit</option>-->
                                        <!--<option value="2">Kashif</option>-->
                                        <!--</select>-->
                                        <!--</div>-->
                                        <!--</div>-->
                                        <!--</div>-->
                                        <!--</div>-->
                                        <!--<div class="row modal-body">-->
                                        <!--<h6 class="col-sm-12">Pension Details</h6>-->
                                        <!--<div class="form-group col-sm-3">-->
                                        <!--<label>GPF Employer Share (%age)</label>-->
                                        <!--<input type="text" class="form-control" placeholder="" name="deduction"  number="true" number="true">-->
                                        <!--</div>-->
                                        <!--<div class="form-group col-sm-3">-->
                                        <!--<label class="">Employee Pension Scheme (%age)</label>-->
                                        <!--<input type="text" class="form-control" placeholder="" name="netpay"  number="true" number="true">-->
                                        <!--</div>-->
                                        <!--<div class="form-group col-sm-3">-->
                                        <!--<label class="">Graduity Balance</label>-->
                                        <!--<input type="text" class="form-control" placeholder="" name="netpay"  number="true" number="true">-->
                                        <!--</div>-->
                                        <!--<div class="form-group col-sm-3">-->
                                        <!--<label class="">Total Pension Benefits</label>-->
                                        <!--<input type="text" class="form-control" placeholder="" name="netpay"  number="true" number="true">-->
                                        <!--</div>-->
                                        <!--</div>-->
                                        <div class="modal-footer">
                                            <div class="">
                                                <button type="submit" class="btn btn-round btn-success btn-link update-btn" id="edit-save-btn">Update</button>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="">
                                                <button type="button" class="btn btn-round btn-danger btn-link conf_msg" data-dismiss="" onclick="myFunction()">Cancel</button>
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
                                            <h5 class="title title-up" id="modal-title">view User Detail </h5>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="form-group col-sm-6 ">
                                                        <label>User Type</label>
                                                        <p class="ad" id="show-user-type">No Value</p>
                                                    </div>
                                                    <div class="form-group col-sm-6 ">
                                                        <label>Name</label>
                                                        <p class="ad" id="show-name">No Value</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="col-sm-6  ex1">
                                                <div class="row">
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>User Name</label>
                                                        <p class="ad" id="show-username">No Value</p>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Status</label>
                                                        <p class="ad" id="show-status">No Value</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="modal-footer">
                                            <div class="">
                                                <button type="submit" class="btn btn-round btn-success btn-link" data-dismiss="modal" id="show-save-btn">Save</button>
                                            </div>
                                            <div class="">
                                                <button type="button" class="btn btn-round btn-danger btn-link" data-dismiss="modal">Close</button>
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
                                        <h6 class="card-title">Parents Record List</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="toolbar">
                                            <div class="form-group col-sm-2 select-wizard">
{{--                                                <select class="selectpicker" data-size="5" name="class_name" data-style="btn btn-sm btn-secondary btn-round"--}}
{{--                                                        title="Filter" required="true">--}}
{{--                                                    <option value="" disabled >Select Class</option>--}}
{{--                                                    @foreach($classes as $class)--}}
{{--                                                        <option value="{{$class->cls_Id}}">{{$class->class}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 float-right">
                                                    <button
                                                            class="btn btn-simple btn-tumblr btn-icon float-right "><i
                                                                class="fa fa-print"
                                                                title="Print"
                                                                data-toggle=""></i></button>
                                                    <button
                                                            class="btn btn-simple btn-tumblr btn-icon float-right "><i
                                                                class="fa fa-file-excel-o"
                                                                title="Export to Excel"
                                                                data-toggle=""></i></button>
                                                </div>
                                            </div>
                                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                                        </div>

                                        <table id="datatable" data-id="datatable" class="table table-hover custom_border" cellspacing="0" width="100%">
                                            <thead class="table-secondary">
                                            <tr>
                                                <th class=" text-center w-10" >S.No</th>
                                                <th class="w-25">Given Name</th>
                                                <th class="w-15">Cnic No</th>
{{--                                                <th class="w-15">Gender</th>--}}
{{--                                                <th class="w-15">Role</th>--}}
                                                <th class="w-10">Status</th>
                                                <th class="w-10 disabled-sorting text-center">Actions</th>
                                            </tr>
                                            </thead>
{{--                                            <tfoot class="table-secondary">--}}
{{--                                            <tr>--}}
{{--                                                <th>S.No</th>--}}
{{--                                                <th>Given Name</th>--}}
{{--                                                <th>Username</th>--}}
{{--                                                <th>Gender</th>--}}
{{--                                                <th>User Type</th>--}}
{{--                                                <th>Status</th>--}}
{{--                                                <th class="disabled-sorting text-center">Actions</th>--}}
{{--                                            </tr>--}}
{{--                                            </tfoot>--}}
                                            <tbody>
                                            @php $i=1; @endphp
                                            @foreach($parents as $parent)

                                            <tr>
                                                <td class="text-center">{{$i++}}</td>
                                                <td>{{$parent->name}}</td>
                                                <td>{{$parent->username}}</td>
{{--                                                <td>{{$parent->guardianInfo?$parent->guardianInfo->gender->gender:''}}</td>--}}

{{--                                                <td>@if(!empty($parent->getRoleNames()))--}}
{{--                                                    @foreach($parent->getRoleNames() as $v)--}}
{{--                                                        {{ $v }}--}}
{{--                                                    @endforeach--}}
{{--                                                @endif</td>--}}
                                                <td>{{$parent->status}}</td>
                                                <td class="text-center">
                                                    <div class="col">
                                                        
                                                         
                                                        <div class="dropdown  text-center">
                                                            <button style="" class="dropdown-toggle btn-round  btn-sm btn text-info btn-link btn-cus-weight" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Manage
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownMenuButton">
                                                                <div class="dropdown-header">Manage user</div>
                                                                
                                                              
                                                                <a class="dropdown-item show-parent" data-id="{{ $parent->id }}">View Profile</a>
                                                                
                                                              
                                                               
                                                                <a class="dropdown-item edit-parent" data-id="{{ $parent->id }}">Edit User</a>
                                                               


                                                               
                                                                <a class="dropdown-item reset-password-user" data-id="{{ $parent->id }}">Reset Password</a>
                                                                 

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

{{--Show Parent modal--}}
<div class="modal fade " id="show-parent-modal" data-backdrop="static" tabindex="-1" role="dialog"
     aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered">
            <div class="row">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-remove"></i>
                        </button>
                        <h5 class="title title-up" id="Guardian-Modal-Title">Parent Details</h5>
                    </div>
                    <div class="modal-body row">

                        <div class="col-sm-3">
                            <div class="col-sm-12 text-center">
                                <h6 class="">Parent Information</h6><br>
                            </div>
                            <div class="picture-container">
                                <div class="picture">
                                    <img src="{{asset('adminassets/img/default-avatar.png')}}" class="picture-src"
                                         id="show-parent-picture" title="" width="120px" height="auto"/>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="col-sm-9 ">
                            <div class="row ">

                                <div class="form-group col-sm-4">
                                    <label>Full Name</label>
                                   <p id="show-full-name"></p>
                                </div>
                                <div class="col-sm-4 select-wizard">
                                    <label>Gender</label>
                                    <p id="show-gender"></p>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>National Identifier</label>
                                    <p id="show-cnic"></p>
                                </div>
                                <div class=" col-sm-4 select-wizard">
                                    <label>Relation</label>
                                    <p id="show-relation"></p>

                                </div>

                                <div class="form-group col-sm-4">
                                    <label>Marital Status</label>
                                    <p id="show-marital_status"></p>
                                </div>

                                 


                                <div class=" col-sm-4 select-wizard">
                                    <label>Occupation</label>
                                    <p id="show-occupation"></p>
                                </div>
                                <div class=" col-sm-4 select-wizard">
                                    <label>Designation</label>
                                    <p id="show-designation"></p>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Employer</label>
                                    <p id="show-employer"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="modal-footer">
                        <div class="">
                            <button type="button" class="btn btn-sm btn-danger btn-link btn-round" data-dismiss="modal" >Close</button>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>
{{--end Parent modal--}}

{{--edit guardian modal--}}
<div class="modal fade " id="edit-parent-modal" data-backdrop="static" tabindex="-1" role="dialog"
     aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered">

        <form enctype="multipart/form-data" id="edit-parent-form">
            <input type="hidden" name="id" id="edit-parent-id">
            @csrf
            <div class="row">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-remove"></i>
                        </button>
                        <h5 class="title title-up">Parent Details</h5>
                    </div>
                    <div class="modal-body row">

                        <div class="col-sm-3">
                            <div class="col-sm-12 text-center">
                                <h6 class="">Parent Information</h6><br>
                            </div>
                            <div class="picture-container">
                                <div class="picture">
                                    <img src="{{asset('adminassets/img/default-avatar.png')}}" class="picture-src"
                                         id="father-picture-preview" title="" width="120px" height="auto"/>
                                    <input type="file" id="father-picture" name="user_image">
                                    <div class="edit-div-error user_image"></div>
                                </div>
                                <label class="">Choose Guardian Picture</label>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="col-sm-9 ">
                            <div class="row ">

                                <div class="form-group col-sm-4">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" placeholder="" id="edit-parent-fullname" name="full_name"
                                           required>
                                    <div class="edit-div-error full_name"></div>
                                </div>
                                <div class="col-sm-4 select-wizard">
                                    <label>Gender</label>
                                    <select class="selectpicker" name="gender" data-size="3" id="edit-parent-gender"
                                            data-style="btn btn-secondary" title="Select Gender" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->gnd_Id}}">{{$gender->gender}}</option>
                                        @endforeach
                                    </select>
                                    <div class="edit-div-error gender"></div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>National Identifier</label>
                                    <input type="text" class="form-control" placeholder="" name="cnic" id="edit-parent-cnic"
                                           number="true" required>
                                    <div class="edit-div-error cnic"></div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" placeholder="" name="mobile" id="edit-parent-mobile"
                                           number="true" required>
                                    <div class="edit-div-error mobile"></div>
                                </div>
                                <div class=" col-sm-4 select-wizard">
                                    <label>Relation</label>
                                    <select class="selectpicker " name="relation" id="edit-parent-relation"
                                            data-container="" data-size="3" required data-style="btn btn-secondary"
                                            title="Select relation" data-live-search="true" data-hide-disabled="true">
                                        <option value="" disabled>Select Relation</option>
                                        @foreach($ralationship as $ralation)
                                            <option value="{{$ralation->pk_relat_Id}}">{{$ralation->relation_Name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="edit-div-error relation"></div>
                                </div>


                                 <div class="input-field col-sm-4">
                                <label>Marital Status</label>
                                <select class="selectpicker" name="marital_status" data-size="3" id="pnt_marital_Status"
                                        data-style="btn btn-secondary btn-round" title="Marital Status">
                                    <option value="" disabled selected>Marital Status</option>
                                    @foreach($marital_statuses as $marital_status)
                                        @if($marital_status->marital_status !='Single')
                                        <option value="{{$marital_status->marital_status}}">{{$marital_status->marital_status}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="add-mother-div-error marital_status"></div>
                                 </div>
                                <div class="input-field col-sm-4" id="working_status_div">
                                <label>Working Status</label>
                                <select class="selectpicker mother_working_status" name="working_status" data-size="3" id="working_status"
                                        data-style="btn btn-secondary btn-round" title="Marital Status">
                                    <option value="" disabled selected>Marital Status</option>
                                    <option value="Working Woman"> Working Woman</option>
                                    <option value="House Wife"> House Wife</option>
                                </select>
                                <div class="add-mother-div-error working_status"></div>
                                 </div>

                                <div class="form-group col-sm-4 Working-div">
                                    <label>Office Phone</label>
                                    <input type="text" class="form-control" placeholder="" name="pnt_off_Ph" id="pnt_off_Ph"
                                           required>
                                </div>

                                <div class="form-group col-sm-4 Working-div">
                                    <label>Home Phone</label>
                                    <input type="text" class="form-control" placeholder="" name="pnt_home_Ph" id="pnt_home_Ph"
                                           required>

                                </div>
                                <div class=" col-sm-4 select-wizard Working-div">
                                    <label>Occupation</label>
                                    <select class="selectpicker " name="occupation" id="edit-parent-occupation"
                                            data-container="" data-size="3" required data-style="btn btn-secondary"
                                            title="Select Occupation" data-live-search="true" data-hide-disabled="true">
                                        <option value="" disabled>Select Occupation</option>
                                        @foreach($occupations as $occupation)
                                            <option value="{{$occupation->occup_Id}}">{{$occupation->occup_Name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="edit-div-error occupation"></div>
                                </div>
                                <div class=" col-sm-4 select-wizard Working-div">
                                    <label>Designation</label>
                                    <select class="selectpicker " name="designation" id="edit-parent-designation"
                                            data-container="" data-size="3" required data-style="btn btn-secondary"
                                            title="Select Designation" data-live-search="true" data-hide-disabled="true">
                                        <option value="" disabled>Select Designation</option>
                                        @foreach($designations as $designation)
                                            <option value="{{$designation->desig_Id}}">{{$designation->designation}}</option>
                                        @endforeach
                                    </select>
                                    <div class="edit-div-error designation"></div>
                                </div>
                                <div class="form-group col-sm-4 Working-div">
                                    <label>Employer</label>
                                    <input type="text" class="form-control" placeholder="" name="employer" id="edit-parent-employer"
                                           required>
                                    <div class="edit-div-error employer"></div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <div class="form-check  pull-left checkbox-general mt-4">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="Active" name="status" id="edit-parent-status" />
                                            <span class="form-check-sign"></span>
                                            Check if user is inactive
                                        </label>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="">
                            <button type="button" class="btn btn-secondary btn-sm btn-link btn-round save-guardian-modal-btn add-btn"
                                    id="save-parent-btn">Update
                            </button>
                        </div>
                        <div class="divider"></div>
                        <div class="">
                            <button type="button" class="btn btn-sm btn-danger btn-link btn-round" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
{{--edit guardian modal--}}

@endsection

@section('front_css')
    <link rel="stylesheet" href="{{asset('custom.css')}}">
@endsection
@section('front_script')

    <script src="{{asset('adminassets/validator/dist/jquery.validate.js')}}"></script>
    <script src="{{asset('js/user_script.js')}}"></script>
 
     
@endsection


@extends('layouts.master')
@section('title', 'Library')
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
                    <span>
                        <h4>Library</h4>
                    </span>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            {{--View Library Modal--}}
                            <div class="modal fade" id="view-library-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-sm">
                                    <div class="modal-content" id="medal">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up">View Library Details</h5>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="form-group col-sm-4">
                                                        <label class="font-weight-bolder">Library Entity</label>
                                                        <p id="show-library-enity">Library Entity</p><hr>
                                                    </div>

                                                    <div class="form-group col-sm-4">
                                                        <label class="font-weight-bolder">Stationary Category</label>
                                                        <p id="show-stationary-category"></p><hr>
                                                    </div>
                                                    <div class=" col-sm-4 select-wizard">
                                                        <label class="font-weight-bolder">Floor</label>
                                                        <p id="show-library-floor"></p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-4">
                                                        <label class="font-weight-bolder">Condition</label>
                                                        <p id="show-condition"></p><hr>
                                                    </div>
                                                    <div class=" col-sm-4 select-wizard ">
                                                        <label class="font-weight-bolder">Author</label>
                                                        <p id="show-author-name"></p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-4 ">
                                                        <label class="font-weight-bolder">Publisher</label>
                                                        <p id="show-publisher"></p><hr>
                                                    </div>
                                                    <div class=" col-sm-4 select-wizard ">
                                                        <label class="font-weight-bolder">Supplier</label>
                                                        <p id="show-supplier"></p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-4 ">
                                                        <label class="font-weight-bolder">Edition</label>
                                                        <p id="show-edition"></p><hr>
                                                    </div>
                                                    <div class=" col-sm-4 select-wizard ">
                                                        <label class="font-weight-bolder">Student</label>
                                                        <p id="show-student"></p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-4 ">
                                                        <label class="font-weight-bolder">Teacher</label>
                                                        <p id="show-teacher"></p><hr>
                                                    </div>
                                                    <div class=" col-sm-4 select-wizard ">
                                                        <label class="font-weight-bolder">Alert Type</label>
                                                        <p id="show-alert-type"></p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-4 ">
                                                        <label class="font-weight-bolder">Issue Date</label>
                                                        <p id="show-issue-date"></p><hr>
                                                    </div>
                                                    <div class="form-group col-sm-4 ">
                                                        <label class="font-weight-bolder">Return Date</label>
                                                        <p id="show-return-date"></p><hr>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <div class="">
                                                <button type="button" class="btn btn-round btn-danger btn-link btn-round" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--End View Modal--}}
                            {{--Add Library Modal--}}
                            <div class="col-lg-12 col-md-12 col-sm-12 pull-right">
                                <div class=" form-group ">
                                    @can('add-library')
                                    <button class=" btn btn-secondary btn-round pull-right " type="button" id="add-library-modal-btn"
                                            data-toggle="modal"  aria-haspopup="true"
                                            aria-expanded="false">
                                        New Library
                                    </button>
                                    @endcan
                                    <div class="modal fade modalvisibillity" id="add-library-modal" data-backdrop="static" tabindex="-1"
                                         role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header justify-content-center">
                                                    <button type="button" id="close" class="close btn-round conf_hide" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <i class="fa fa-remove"></i>
                                                    </button>
                                                    <h5 class="title title-up">Add New Library</h5>
                                                </div>
                                                {{--Add class Error--}}

                                                {{--End Add class Error--}}
                                                <form id="add-new-library-form">
                                                <div class="modal-body row">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <h6 class="col-sm-12">New Library Details</h6>
                                                            <div class=" col-sm-6 select-wizard">
                                                                <label>Library Entity</label>
                                                                <select name="library_enitity" class="selectpicker" data-size="7"
                                                                        data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                        title="Select Library Entity">
                                                                    <option value="" disabled selected>Select Library Entity
                                                                    </option>
                                                                   @foreach($library_entities as $library_entity)
                                                                    <option value="{{$library_entity->lent_Code}}">{{$library_entity->gent_Name}}</option>
                                                                   @endforeach
                                                                </select>
                                                                <div class="add-div-error library_enitity"></div>
                                                            </div>
                                                            <div class=" col-sm-6 select-wizard">
                                                                <label>Category</label>
                                                                <select name="category" class="selectpicker" data-size="7"
                                                                        data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                        title="Select Category">
                                                                    <option value="" disabled selected>Select Category
                                                                    </option>
                                                                   @foreach($library_categories as $library_category)
                                                                    <option value="{{$library_category->stat_categ_Id}}">{{$library_category->stat_categ_Name}}</option>
                                                                   @endforeach
                                                                </select>
                                                                <div class="add-div-error category"></div>
                                                            </div>
                                                            <div class=" col-sm-6 select-wizard">
                                                                <label>Floor</label>
                                                                <select name="floor" class="selectpicker" data-size="7"
                                                                        data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                        title="Select Floor">
                                                                    <option value="" disabled selected>Select Floor
                                                                    </option>
                                                                    @foreach($library_floors as $library_floor)
                                                                        <option value="{{$library_floor->floor_Id}}">{{$library_floor->floor_Name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="add-div-error floor"></div>
                                                            </div>
                                                            <div class=" col-sm-6 select-wizard">
                                                                <label>Condition</label>
                                                                <select name="condition" class="selectpicker" data-size="7"
                                                                        data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                        title="Select Condition">
                                                                    <option value="" disabled selected>Select Condition
                                                                    </option>
                                                                    <option value="Damaged">Damaged</option>
                                                                    <option value="Lost">Lost</option>
                                                                    <option value="Ok">Ok</option>
                                                                </select>
                                                                <div class="add-div-error condition"></div>
                                                            </div>
                                                            <div class=" col-sm-6 select-wizard">
                                                                <label>Author</label>
                                                                <select name="author" class="selectpicker" data-size="7"
                                                                        data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                        title="Select Author">
                                                                    <option value="" disabled selected>Select Author</option>
                                                                    @foreach($authors as $author)
                                                                        <option value="{{$author->auth_Id}}">{{$author->auth_Name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="add-div-error author"></div>
                                                            </div>
                                                            <div class=" col-sm-6 select-wizard">
                                                                <label>Publisher</label>
                                                                <select name="publisher" class="selectpicker" data-size="7"
                                                                        data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                        title="Select publisher">
                                                                    <option value="" disabled selected>Select Publisher</option>
                                                                    @foreach($publishers as $publisher)
                                                                    <option value="{{$publisher->pub_Id}}">{{$publisher->pub_Name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="add-div-error publisher"></div>
                                                            </div>
                                                            <div class=" col-sm-6 select-wizard">
                                                                <label>Supplier</label>
                                                                <select name="supplier" class="selectpicker" data-size="7"
                                                                        data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                        title="Select Supplier">
                                                                    <option value="" disabled selected>Select Supplier</option>
                                                                    @foreach($suppliers as $supplier)
                                                                        <option value="{{$supplier->supp_Id}}">{{$supplier->supp_Name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="add-div-error supplier"></div>
                                                            </div>
                                                            <div class=" col-sm-6 select-wizard">
                                                                <label>Edition</label>
                                                                <select name="edition" class="selectpicker" data-size="7"
                                                                        data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                        title="Select Edition">
                                                                    <option value="" disabled selected>Select Edition
                                                                    </option>
                                                                    @foreach($stationary_editions as $stationary_edition)
                                                                        <option value="{{$stationary_edition->edition_Id}}">{{$stationary_edition->edition_N0}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="add-div-error edition"></div>
                                                            </div>
                                                            <div class=" col-sm-6 select-wizard">
                                                                <label>Student</label>
                                                                <select name="student" class="selectpicker" data-size="7"
                                                                        data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                        title="Select Student">
                                                                    <option value="" disabled selected>Select Student
                                                                    </option>
                                                                    @foreach($students as $student)
                                                                        <option value="{{$student->std_Id}}">{{$student->std_Fname}} {{$student->std_Mname}} {{$student->std_Lname}}</option>
                                                                    @endforeach

                                                                </select>
                                                                <div class="add-div-error student"></div>
                                                            </div>
                                                            <div class=" col-sm-6 select-wizard">
                                                                <label>Teacher</label>
                                                                <select name="teacher" class="selectpicker" data-size="7"
                                                                        data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                        title="Select Teacher">
                                                                    <option value="" disabled selected>Select Teacher
                                                                    </option>
                                                                    @foreach($employees as $employee)
                                                                        <option value="{{$employee->emp_Id}}">{{$employee->emp_given_name}} </option>
                                                                    @endforeach

                                                                </select>
                                                                <div class="add-div-error teacher"></div>
                                                            </div>
                                                            <div class=" col-sm-6 select-wizard">
                                                                <label>Alert Type</label>
                                                                <select name="alert_type" class="selectpicker" data-size="2"
                                                                        data-style="btn btn-secondary btn-round"
                                                                        title="Select Alert Type">
                                                                    <option value="" disabled selected>Select Alert Type
                                                                    </option>
                                                                    <option value="1">1</option>
                                                                    <option value="0">0</option>
                                                                </select>
                                                                <div class="add-div-error alert_type"></div>
                                                            </div>
                                                            <div class=" col-sm-6 select-wizard">
                                                                <label>Issue Date</label>
                                                                <input type="text" class="form-control datepicker" placeholder="" name="issue_date">
                                                                <div class="add-div-error issue_date"></div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label>Return Date</label>
                                                                <input type="text" name="return_date" class="form-control datepicker" placeholder=""
                                                                       >
                                                                <div class="add-div-error return_date"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="">
                                                        <button type="submit"
                                                                class="btn btn-success btn-link btn-round add-btn" id="add-library-btn" >Save
                                                        </button>
                                                    </div>
                                                    <div class="divider"></div>
                                                    <div class="">
                                                        <button type="button" class="btn btn-danger btn-link btn-round" data-dismiss="modal">Cancel
                                                        </button>
                                                    </div>

                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{--End Class Modal--}}

                            {{--edit Class Modal--}}
                            <div class="col-lg-12 col-md-12 col-sm-12 pull-right">
                                <div class=" form-group ">
                                      <div class="modal fade modalvisibillity" id="edit-library-modal" data-backdrop="static" tabindex="-1"
                                         role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header justify-content-center">
                                                    <button type="button" id="close" class="close btn-round conf_hide" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <i class="fa fa-remove"></i>
                                                    </button>
                                                    <h5 class="title title-up">Edit New Library</h5>
                                                </div>
                                                {{--Add class Error--}}

                                                {{--End Add class Error--}}
                                                <form id="edit-new-library-form">
                                                    <input type="hidden" name="id" id="edit-libriry-id">
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
                                                                <h6 class="col-sm-12">Edit New Library Details</h6>
                                                                <div class=" col-sm-3 select-wizard">
                                                                    <label>Library Entity</label>
                                                                    <select name="library_enitity" class="selectpicker" data-size="7" id="edit-library-entity"
                                                                            data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                            title="Select Library Entity">
                                                                        <option value="" disabled selected>Select Library Entity
                                                                        </option>
                                                                        @foreach($library_entities as $library_entity)
                                                                            <option value="{{$library_entity->lent_Code}}">{{$library_entity->gent_Name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="edit-div-error library_enitity"></div>
                                                                </div>
                                                                <div class=" col-sm-3 select-wizard">
                                                                    <label>Category</label>
                                                                    <select name="category" class="selectpicker" data-size="7" id="edit-category"
                                                                            data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                            title="Select Category">
                                                                        <option value="" disabled selected>Select Category
                                                                        </option>
                                                                        @foreach($library_categories as $library_category)
                                                                            <option value="{{$library_category->stat_categ_Id}}">{{$library_category->stat_categ_Name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="edit-div-error category"></div>
                                                                </div>
                                                                <div class=" col-sm-3 select-wizard">
                                                                    <label>Floor</label>
                                                                    <select name="floor" class="selectpicker" data-size="7" id="edit-floor"
                                                                            data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                            title="Select Floor">
                                                                        <option value="" disabled selected>Select Floor</option>
                                                                        @foreach($library_floors as $library_floor)
                                                                            <option value="{{$library_floor->floor_Id}}">{{$library_floor->floor_Name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="edit-div-error floor"></div>
                                                                </div>
                                                                <div class=" col-sm-3 select-wizard">
                                                                    <label>Condition</label>
                                                                    <select name="condition" class="selectpicker" data-size="7" id="edit-condition" data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                            title="Select Condition">
                                                                        <option value="" disabled selected>Select Condition
                                                                        </option>
                                                                        <option value="Damaged">Damaged</option>
                                                                        <option value="Lost">Lost</option>
                                                                        <option value="Ok">Ok</option>
                                                                    </select>
                                                                    <div class="edit-div-error condition"></div>
                                                                </div>
                                                                <div class=" col-sm-6 select-wizard">
                                                                    <label>Author</label>
                                                                    <select name="author" class="selectpicker" data-size="7" id="edit-author"
                                                                            data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                            title="Select Author">
                                                                        <option value="" disabled selected>Select Author</option>
                                                                        @foreach($authors as $author)
                                                                            <option value="{{$author->auth_Id}}">{{$author->auth_Name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="edit-div-error author"></div>
                                                                </div>
                                                                <div class=" col-sm-6 select-wizard">
                                                                    <label>Publisher</label>
                                                                    <select name="publisher" class="selectpicker" data-size="7" id="edit-publisher"
                                                                            data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                            title="Select publisher">
                                                                        <option value="" disabled selected>Select Publisher</option>
                                                                        @foreach($publishers as $publisher)
                                                                            <option value="{{$publisher->pub_Id}}">{{$publisher->pub_Name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="edit-div-error publisher"></div>
                                                                </div>
                                                                <div class=" col-sm-6 select-wizard">
                                                                    <label>Supplier</label>
                                                                    <select name="supplier" class="selectpicker" data-size="7" id="edit-supplier"
                                                                            data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                            title="Select Supplier">
                                                                        <option value="" disabled selected>Select Supplier</option>
                                                                        @foreach($suppliers as $supplier)
                                                                            <option value="{{$supplier->supp_Id}}">{{$supplier->supp_Name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="edit-div-error supplier"></div>
                                                                </div>
                                                                <div class=" col-sm-6 select-wizard">
                                                                    <label>Edition</label>
                                                                    <select name="edition" class="selectpicker" data-size="7" id="edit-edition"
                                                                            data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                            title="Select Edition">
                                                                        <option value="" disabled selected>Select Edition
                                                                        </option>
                                                                        @foreach($stationary_editions as $stationary_edition)
                                                                            <option value="{{$stationary_edition->edition_Id}}">{{$stationary_edition->edition_N0}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="edit-div-error edition"></div>
                                                                </div>
                                                                <div class=" col-sm-6 select-wizard">
                                                                    <label>Student</label>
                                                                    <select name="student" class="selectpicker" data-size="7" id="edit-student"
                                                                            data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                            title="Select Student">
                                                                        <option value="" disabled selected>Select Student
                                                                        </option>
                                                                        @foreach($students as $student)
                                                                            <option value="{{$student->std_Id}}">{{$student->std_Fname}} {{$student->std_Mname}} {{$student->std_Lname}}</option>
                                                                        @endforeach

                                                                    </select>
                                                                    <div class="edit-div-error student"></div>
                                                                </div>
                                                                <div class=" col-sm-6 select-wizard">
                                                                    <label>Teacher</label>
                                                                    <select name="teacher" class="selectpicker" data-size="7" id="edit-teacher"
                                                                            data-style="btn btn-secondary btn-round" data-live-search="true" data-hide-disabled="true"
                                                                            title="Select Teacher">
                                                                        <option value="" disabled selected>Select Teacher
                                                                        </option>
                                                                        @foreach($employees as $employee)
                                                                            <option value="{{$employee->emp_Id}}">{{$employee->emp_given_name}} </option>
                                                                        @endforeach

                                                                    </select>
                                                                    <div class="edit-div-error teacher"></div>
                                                                </div>
                                                                <div class=" col-sm-6 select-wizard">
                                                                    <label>Alert Type</label>
                                                                    <select name="alert_type" class="selectpicker" data-size="2" id="edit-alert-type"
                                                                            data-style="btn btn-secondary btn-round"
                                                                            title="Select Alert Type">
                                                                        <option value="" disabled selected>Select Alert Type
                                                                        </option>
                                                                        <option value="1">1</option>
                                                                        <option value="0">0</option>
                                                                    </select>
                                                                    <div class="edit-div-error alert_type"></div>
                                                                </div>
                                                                <div class=" col-sm-6 select-wizard">
                                                                    <label>Issue Date</label>
                                                                    <input type="text" class="form-control datepicker" id="edit-issue-date" placeholder="" name="issue_date">
                                                                    <div class="edit-div-error issue_date"></div>
                                                                </div>
                                                                <div class="form-group col-sm-6">
                                                                    <label>Return Date</label>
                                                                    <input type="text" name="return_date" id="edit-return-date"  class="form-control datepicker" placeholder=""
                                                                    >
                                                                    <div class="edit-div-error return_date"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="">
                                                            <button type="submit" class="btn btn-success btn-link btn-round add-btn" id="update-library-btn" >Update
                                                            </button>
                                                        </div>
                                                        <div class="divider"></div>
                                                        <div class="">
                                                            <button type="button" class="btn btn-danger btn-link btn-round" data-dismiss="modal">Cancel
                                                            </button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{--End Class Modal--}}
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <div class="card-header">
                                                        <h6 class="card-title">Library Record List</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="toolbar">
                                                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                        </div>
                                                        {{--start success message--}}
{{--                                                        <div class="alert alert-success" id="success-message" style="display: none">--}}
{{--                                                            --}}{{--{{ session()->get('message') }}--}}
{{--                                                        </div>--}}
                                                        {{--end success message--}}
                                                        <table id="datatable" class="table table-striped table-bordered"
                                                               cellspacing="0" width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Category</th>
                                                                <th>Auther</th>
                                                                <th>Publisher</th>
                                                                <th>Edition</th>
                                                                <th>Floor</th>
                                                                <th>Condition</th>
                                                                <th>Issue Date</th>
                                                                <th>Return Date</th>
                                                                <th class="disabled-sorting">Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Category</th>
                                                                <th>Auther</th>
                                                                <th>Publisher</th>
                                                                <th>Edition</th>
                                                                <th>Floor</th>
                                                                <th>Condition</th>
                                                                <th>Issue Date</th>
                                                                <th>Return Date</th>
                                                                <th class="disabled-sorting">Actions</th>
                                                            </tr>
                                                            </tfoot>
                                                            <tbody>
                                                            @php $i=1; @endphp
                                                            @foreach($libraries as $library)
                                                            <tr>
                                                                <td>{{$i++}}</td>
                                                                <td>{{$library->stat_categ_Name}}</td>
                                                                <td>{{$library->auth_Name}}</td>
                                                                <td>{{$library->pub_Name}}</td>
                                                                <td>{{$library->edition_N0}}</td>
                                                                <td>{{$library->floor_Name}}</td>
                                                                <td>{{$library->stat_ret_Condition}}</td>
                                                                <td>{{$library->stat_iss_Date}}</td>
                                                                <td>{{$library->stat_ret_Date}}</td>
                                                                <td class="text-center">
                                                                    <div class="form-inline">
                                                                        @can('view-library')
                                                                        <div class="">
                                                                            <button class=" btn-link btn-cus-weight show-library-btn"
                                                                                    type="button"
                                                                                    data-toggle="modal"
                                                                                   {{-- data-target="#viewclass"--}}
                                                                                    id="show-view-class-btn"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false" data-id="{{$library->library_Id}}">
                                                                                View
                                                                            </button>
                                                                        </div>
                                                                        @endcan
                                                                        @canany(['edit-library','delete-library'])

                                                                        <div class="dropdown ">

                                                                        </div>
                                                                        <div class="nav-item btn-rotate dropdown pull-right ">
                                                                            <a class="nav-link dropdown-toggle pull-right"
                                                                               href="javascript:void(0)" id="navbarDropdownMenuLink"
                                                                               data-toggle="dropdown"
                                                                               aria-haspopup="true"
                                                                               aria-expanded="false" data-id="{{$library->library_Id}}">
                                                                            </a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-right"
                                                                                aria-labelledby="navbarDropdownMenuLink">
                                                                                @can('edit-library')
                                                                                <a class="dropdown-item edit-library-btn" href="javascript:void(0)"
                                                                                   data-toggle="modal"
                                                                                  {{-- data-target="#editclass"--}}
                                                                                   aria-haspopup="true"
                                                                                   aria-expanded="false" data-id="{{$library->library_Id}}">Edit</a>
                                                                                @endcan
                                                                                @can('delete-library')
                                                                                <a class="dropdown-item btn-sm delete-library-btn"
                                                                                   href="#" data-id="{{$library->library_Id}}">Delete</a>
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


                        </div> <!-- end col-md-12 -->
                    </div> <!-- end row -->

                </div>

            </div>

        </div>
    </div>
    {{--end main Content--}}
@endsection

@section('front_css')
@endsection
@section('front_script');
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('js/library_script.js')}}"></script>

 
@endsection

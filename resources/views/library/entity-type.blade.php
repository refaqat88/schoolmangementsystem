@extends('layouts.master')
@section('title', 'Add Entity Type')
@section('content')
    <style>
        .add-div-error {
            color: red;
        }

        .edit-div-error {
            color: red;
        }
    </style>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Entity Type</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="col-sm-12 pull-right">
                                @can('add-library')
                                    <button class="btn btn-secondary btn-round pull-right" data-toggle="modal"
                                            id="show-entitytype-modal-btn">
                                        Add New Entity Type
                                    </button>
                                @endcan
                            </div>
                        </div>
                        {{--add entity type Modal--}}
                        <div class="modal fade modalvisibillity" id="add-entitytype-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Add New Entitytype</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">

                                            <form id="add-entitytype-form" method="post">
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
                                                    <div class=" col-sm-12 select-wizard">
                                                        <label>Select Entity Type</label>
                                                        <select name="entitytypeName" class="selectpicker" data-size="7"
                                                                data-style="btn btn-secondary btn-round"
                                                                title="Select Entity Type">
                                                            <option value="" disabled selected>Select-entity
                                                            </option>
                                                            <option value="General">General</option>
                                                            <option value="Library">Library</option>
                                                        </select>
                                                        <div class="add-div-error entitytypeName"></div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-round btn-link add-new-supplier-btn" id="add-entitytype-btn">Save
                                            </button>

                                        </div>
                                        <div class="divider"></div>
                                        <div class="">
                                            <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--end add Entity type Modal--}}

                        {{--edit Entity type Modal--}}

                        <div class="modal fade" id="edit-entitytype-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Edit Entity Type</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <form id="edit-entitytype-form" action="" method="Post">

                                                @csrf
                                                <input type="hidden" name="id" id="entity_id">
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
                                                        <div class=" col-sm-12 select-wizard">
                                                            <label>Select Entity Type</label>
                                                            <select name="entitytypeName" id="ent_type_name" class="selectpicker" data-size="7"
                                                                    data-style="btn btn-secondary btn-round"
                                                                    title="Select Entity Type">
                                                                <option value="" disabled selected>Select-entity
                                                                </option>
                                                                <option value="General">General</option>
                                                                <option value="Library">Library</option>
                                                            </select>
                                                            <div class="add-div-error entitytypeName"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
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
                                            <button type="submit" class="btn btn-round btn-success btn-link update-entitytype-btn" id="update-entitytype-btn">Update
                                            </button>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="">
                                            <button type="button" class="btn btn-round btn-danger btn-link" data-dismiss="modal">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--end edit Entity type modal--}}

                        {{--show entity Modal--}}
                        <div class="modal fade modalvisibillity" id="show-entity-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Show Entity Type</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>Entity Type Name</label>
                                                    <p id="show_ent_name"></p>
                                                </div>

                                                <!-- <div class="form-group col-sm-6">
                                                    <label>Theory Marks</label>
                                                    <p id="show_theory_marks"></p>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Practical Marks</label>
                                                    <p id="show_practical_marks"></p>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label>Total Marks</label>
                                                    <p id="show_total_marks"></p>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Passing Marks</label>
                                                    <p id="show_passing_marks"></p>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
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
                                            <button type="submit" class="btn btn-success btn-link" id="show-ent-save-btn">Save
                                            </button>
                                        </div>
                                        <div class="">
                                            <button type="button" data-dismiss="modal" class="btn btn-round btn-danger btn-link">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--end Show Supplier modal--}}
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
                                    <h6 class="card-title">Entity Types Record List</h6>
                                </div>
                                <div class="card-body">
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0"
                                           width="100%">
                                        <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Entity Type</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Entity Type</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($entityTypes as $entityType)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$entityType->ent_typ_Name}}</td>
                                                <td class="text-center">
                                                    <div class="form-inline">
                                                        @can('view-library')
                                                            <div class="">
                                                                <button class=" btn-link btn-cus-weight show-entitytype-btn"
                                                                        type="button"
                                                                        {{-- data-target="#viewclass"--}}
                                                                        id="show-entitytype-btn"
                                                                        aria-haspopup="true"
                                                                        aria-expanded="false" data-id="{{ $entityType->ent_typ_Id  }}">
                                                                    View
                                                                </button>
                                                            </div>
                                                        @endcan
                                                        @canany(['edit-library','delete-library'])
                                                            <div class="nav-item btn-rotate dropdown pull-right ">
                                                                <a class="nav-link dropdown-toggle pull-right"
                                                                   href="javascript:void(0)" id="navbarDropdownMenuLink"
                                                                   data-toggle="dropdown"
                                                                   aria-haspopup="true"
                                                                   aria-expanded="false" data-id="{{ $entityType->ent_typ_Id }}">
                                                                </a>
                                                                <div
                                                                        class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="navbarDropdownMenuLink">
                                                                    @can('edit-library')
                                                                    <a class="dropdown-item edit-entitytype-btn" href="javascript:void(0)"
                                                                       data-toggle="modal"
                                                                       aria-haspopup="true"
                                                                       aria-expanded="false" data-id="{{ $entityType->ent_typ_Id }}">Edit</a>
                                                                    @endcan
                                                                        @can('delete-library')
                                                                    <a class="dropdown-item delete-entitytype-btn"
                                                                       href="#" data-id="{{ $entityType->ent_typ_Id }}">Delete</a>
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

@section('front_script')
    <script src="{{asset('adminassets/validator/dist/jquery.validate.js')}}">

    </script>
    <script src="{{asset('js/entity_type_script.js')}}"></script>

@endsection

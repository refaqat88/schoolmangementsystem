@extends('layouts.master')
@section('title', 'Add Publisher')
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
                        <h4 class="card-title">Publishers</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="col-sm-12 pull-right">
                                @can('add-library')
                                <button class="btn btn-secondary btn-round pull-right" data-toggle="modal"
                                         id="show-publisher-btn">
                                    Add New Publisher
                                </button>
                                @endcan
                            </div>
                        </div>
                        {{--add Publisher Modal--}}
                        <div class="modal fade modalvisibillity" id="add-publisher-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Add New Publisher</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <form id="publisher-form">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Publisher Name</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                                name="publisherName">
                                                        <div class="add-div-error publisherName"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Publisher Contact</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="publisherContact">
                                                        <div class="add-div-error publisherContact"></div>
                                                    </div>
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>Select Status</label>
                                                        <select name="status" class="selectpicker" data-size="7"
                                                                data-style="btn btn-secondary btn-round"
                                                                title="Select Billing Scgedule">
                                                            <option value="" disabled selected>Select Status
                                                            </option>
                                                            <option value="active">Active</option>
                                                            <option value="Inactive">Inactive</option>
                                                        </select>
                                                        <div class="add-div-error status"></div>
                                                    </div>

                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-round btn-link add-new-publisher-btn" id="add-publisher-btn">Save
                                            </button>

                                        </div>
                                        <div class="divider"></div>
                                        <div class="">
                                            <button type="button"  class="btn btn-danger btn-round btn-link" data-dismiss="modal">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--end add Publisher Modal--}}

                        {{--edit Publisher Modal--}}
                        
                        <div class="modal fade" id="edit-publisher-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Edit Publisher</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <form id="edit-publisher-form" action="" method="Post">

                                                @csrf
                                                <input type="hidden" name="id" id="pub_id">
                                                <div class="col-sm-12">

                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label>Name</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="publisherName" id="pub_name">
                                                            <div class="edit-div-error publisherName"></div>

                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label>Contact</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                   name="publisherContact" id="pub_cont">
                                                            <div class="edit-div-error publisherContact"></div>
                                                        </div>
                                                        <div class=" col-sm-6 select-wizard">
                                                            <label>Select Status</label>
                                                            <select name="status" id="pub_status" class="selectpicker" data-size="7"
                                                                    data-style="btn btn-secondary btn-round"
                                                                    title="Select Status">
                                                                <option value="" disabled selected>Select-Status
                                                                </option>
                                                                <option value="Active">Active</option>
                                                                <option value="Inactive">Inactive</option>
                                                            </select>
                                                            <div class="edit-div-error status"></div>
                                                        </div>

                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-round btn-success btn-link update-publisher-btn" id="update-publisher-btn">Update
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
                        {{--end edit publisher modal--}}

                        {{--show publisher Modal--}}
                        <div class="modal fade modalvisibillity" id="show-publisher-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Show Publisher</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label>Name</label>
                                                    <p id="show-publisher-name"></p><hr>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label>Contact</label>
                                                    <p id="show-publisher-cont"></p><hr>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label>Status</label>
                                                    <p id="show-publisher-status"></p><hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-link" id="Show-pub-Btn">Save
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
                        {{--end Show publisher modal--}}
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">Publisher Record List</h6>
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
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php $i=1; ?>
                                        @foreach($publishers as $publisher)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$publisher->pub_Name}}</td>
                                                <td>{{$publisher->pub_Contact}}</td>
                                                <td class="text-center">
                                                    <div class="form-inline">
                                                        <div class="">
                                                            @can('view-library')
                                                            <button class=" btn-link btn-cus-weight show-publisher"
                                                                    type="button"
                                                                    data-toggle="modal"
                                                                    id="show-publisher"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false" data-id="{{ $publisher->pub_Id}}">
                                                                View
                                                            </button>
                                                            @endcan
                                                        </div>
                                                        @canany(['edit-library','delete-library'])
                                                        <div class="nav-item btn-rotate dropdown pull-right">
                                                            <a class="nav-link dropdown-toggle pull-right"
                                                               href="javascript:void(0)" id="navbarDropdownMenuLink"
                                                               data-toggle="dropdown"
                                                               aria-haspopup="true"
                                                               aria-expanded="false" data-id="{{ $publisher->pub_Id }}">
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="navbarDropdownMenuLink">
                                                                @can('edit-library')
                                                                <a class="dropdown-item edit-publisher" href="javascript:void(0)"
                                                                   data-toggle="modal" id="edit-stationary"
                                                                   aria-haspopup="true"
                                                                   aria-expanded="false" data-id="{{ $publisher->pub_Id }}">Edit</a>
                                                                @endcan
                                                               @can('delete-library')
                                                                    <a class="dropdown-item delete-publish-btn"
                                                                   href="#" data-id="{{$publisher->pub_Id}}">Delete</a>
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
    
<script src="{{asset('adminassets/validator/dist/jquery.validate.js')}}"></script>
<script src="{{asset('js/publisher_script.js')}}"></script> 
@endsection

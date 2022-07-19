@extends('layouts.master')
@section('title', 'Add Floor')
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
                        <h4 class="card-title">Library Floor</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="col-sm-12 pull-right">
                                @can('add-library')
                                    <button class="btn btn-secondary btn-round pull-right" data-toggle="modal"
                                            id="show-floor-btn">
                                        Add New Floor
                                    </button>
                                @endcan
                            </div>
                        </div>
                        {{--add LibrarbyFloor Modal--}}
                        <div class="modal fade modalvisibillity" id="add-floor-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Add New Floor</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">

                                            <form id="add-floor-form" method="post">
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
                                                        <label>Floor Name</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="floorName">
                                                        <div class="add-div-error floorName"></div>
                                                    </div>
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>Shelf Id</label>
                                                        <select name="shelfId" class="selectpicker" data-size="7"
                                                                data-style="btn btn-secondary btn-round"
                                                                title="Select Shelf Id ">
                                                            <option value="" disabled selected>Select-shelfId
                                                            </option>
                                                            @foreach($shelves as $shelf)
                                                                <option value="{{$shelf->shelf_Id}}">{{$shelf->shelf_No}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="add-div-error shelfId"></div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-round btn-link add-new-floor-btn" id="add-floor-btn">Save
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
                        {{--end add library floor Modal--}}

                        {{--edit library floor Modal--}}

                        <div class="modal fade" id="edit-floor-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Edit Library Floor</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <form id="edit-floor-form" action="" method="Post">

                                                @csrf
                                                <input type="hidden" name="id" id="floor_id">
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
                                                            <label>Floor Name</label>
                                                            <input type="text" id="floor_name" class="form-control" placeholder=""
                                                                   name="floor_name">
                                                            <div class="add-div-error floor_name"></div>
                                                        </div>
                                                        <div class=" col-sm-6 select-wizard">
                                                            <label>Shelf Id</label>
                                                            <select name="shelfid" id="floor_shelfid" class="selectpicker" data-size="7"
                                                                    data-style="btn btn-secondary btn-round"
                                                                    title="Select Floor">
                                                                <option value="" disabled selected>Select-Floor
                                                                </option>
                                                                @foreach($shelves as $shelf)
                                                                    <option value="{{$shelf->shelf_Id}}">{{$shelf->shelf_No}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="add-div-error shelfid"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-round btn-success btn-link update-floor-btn" id="update-floor-btn">Update
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
                        {{--end edit Library Floor modal--}}

                        {{--show Library Floor Modal--}}
                        <div class="modal fade modalvisibillity" id="show-floor-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Show Library Floor</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>Floor Name</label>
                                                    <p id="show_floor_name"></p>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Shelf Id</label>
                                                    <p id="show_floor_shelfid"></p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-link" id="show-floor-Btn">Save
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
                        {{--end Show library floor modal--}}
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">Library Floor Record List</h6>
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
                                            <th>Floor Name</th>
                                            <th>Shelf Id</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Floor Name</th>
                                            <th>Shelf Id</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($libraries as $library)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$library->floor_Name}}</td>
                                                <td>{{$library->shelf_Id}}</td>
                                                <td class="text-center">
                                                    <div class="form-inline">
                                                        @can('view-library')
                                                            <div class="">
                                                                <button class=" btn-link btn-cus-weight show-floor"
                                                                        type="button"
                                                                        data-toggle="modal"
                                                                        {{-- data-target="#viewclass"--}}
                                                                        id="show-floor"
                                                                        aria-haspopup="true"
                                                                        aria-expanded="false" data-id="{{ $library->floor_Id  }}">
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
                                                                   aria-expanded="false" data-id="{{ $library->floor_Id }}">
                                                                </a>
                                                                <div
                                                                        class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="navbarDropdownMenuLink">
                                                                    @can('edit-library')
                                                                        <a class="dropdown-item edit-floor" href="javascript:void(0)"
                                                                           data-toggle="modal" id="edit-floor"
                                                                           {{-- data-target="#editclass"--}}
                                                                           aria-haspopup="true"
                                                                           aria-expanded="false" data-id="{{ $library->floor_Id }}">Edit</a>
                                                                    @endcan
                                                                    @can('delete-library')
                                                                        <a class="dropdown-item delete-floor-btn"
                                                                           href="#" data-id="{{$library->floor_Id}}">Delete</a>
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
    <script src="{{asset('js/floor_script.js')}}"></script>
@endsection

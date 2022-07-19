@extends('layouts.master')
@section('title', 'Library Shelf')
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
                        <h4 class="card-title">Library Shelf</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="col-sm-12 pull-right">
                                @can('add-library')
                                <button class="btn btn-secondary btn-round pull-right" data-toggle="modal"
                                        id="show-shelf-modal-btn">
                                    Add New Library Shelf
                                </button>
                                @endcan
                            </div>
                        </div>
                        {{--add Rack Modal--}}
                        <div class="modal fade modalvisibillity" id="add-shelf-Modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <form id="add-shelf-form">
                                    @csrf
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Add New Library Shelf</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Shelf No</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                                name="shelf_No">
                                                        <div class="add-div-error shelf_No"></div>
                                                    </div>
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>Rack No</label>
                                                        <select name="rack_No" class="selectpicker" data-size="7"
                                                                data-style="btn btn-secondary btn-round"
                                                                title="Select Rack No" data-live-search="true"
                                                                data-hide-disabled="true">
                                                            <option value="" disabled selected>Select Rack No
                                                            </option>
                                                            @foreach($rackes as $rack)
                                                                <option value="{{$rack->rack_Id}}">{{$rack->rack_No}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="add-div-error rack_No"></div>
                                                    </div>

                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-round btn-link" id="add-shelf-save-btn">Save
                                            </button>

                                        </div>
                                        <div class="divider"></div>
                                        <div class="">
                                            <button type="button"  class="btn btn-danger btn-round btn-link" data-dismiss="modal">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                </form>
                            </div>
                        </div>
                        {{--end add Shelf Modal--}}

                        {{--edit Shelf Modal--}}
                        
                        <div class="modal fade" id="edit-shelf-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <form id="edit-shelf-form" action="" method="Post">
                                    @csrf
                                    <input type="hidden" name="id" id="edit-shelf-id">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Edit Library Shelf</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">

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
                                                            <label>Shelf No</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="shelf_No" id="edit-shelf-no">
                                                            <div class="edit-div-error shelf_No"></div>

                                                        </div>

                                                        <div class=" col-sm-6 select-wizard">
                                                            <label>Rack No</label>
                                                            <select name="rack_No" class="selectpicker" data-size="7" id="edit-rack-id"
                                                                    data-style="btn btn-secondary btn-round"
                                                                    title="Select Rack No" data-live-search="true"
                                                                    data-hide-disabled="true">
                                                                <option value="" disabled selected>Select Rack No
                                                                </option>
                                                                @foreach($rackes as $rack)
                                                                    <option value="{{$rack->rack_Id}}">{{$rack->rack_No}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="add-div-error rack_No"></div>
                                                        </div>

                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-round btn-success btn-link update-author-btn" id="update-shelf-btn">Update
                                            </button>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="">
                                            <button type="button" class="btn btn-round btn-danger btn-link" data-dismiss="modal">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                </form>
                            </div>
                        </div>
                        {{--end edit Shelf modal--}}

                        {{--show Shelf Modal--}}
                        <div class="modal fade modalvisibillity" id="show-shelf-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Show Library Shelf</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>Rack No</label>
                                                    <p id="show-shelf-no"></p><hr>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Rack No</label>
                                                    <p id="show-rack-no"></p><hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="button" data-dismiss="modal" class="btn btn-round btn-danger btn-link">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--end Show Shelf modal--}}
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">Library Shelf Record List</h6>
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
                                            <th>Shelf Number</th>
                                            <th>Rack Number</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Shelf Number</th>
                                            <th>Rack Number</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php $i=1; ?>
                                        @foreach($shelves as $shelf)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$shelf->shelf_No}}</td>
                                                <td>{{$shelf->rack?$shelf->rack->rack_No:''}}</td>
                                                <td class="text-center">
                                                    <div class="form-inline">
                                                        <div class="">
                                                            @can('view-library')
                                                            <button class=" btn-link btn-cus-weight show-shelf-btn"
                                                                    type="button"
                                                                    data-toggle="modal"
                                                                    {{-- data-target="#viewclass"--}}
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false" data-id="{{ $shelf->shelf_Id  }}">
                                                                View
                                                            </button>
                                                            @endcan
                                                        </div>
                                                        @canany(['edit-library','delete-library'])
                                                        <div class="nav-item btn-rotate dropdown pull-right ">
                                                            <a class="nav-link dropdown-toggle pull-right"
                                                               href="javascript:void(0)" id="navbarDropdownMenuLink"
                                                               data-toggle="dropdown"
                                                               aria-haspopup="true"
                                                               aria-expanded="false" data-id="{{ $shelf->shelf_Id }}">
                                                            </a>
                                                            <div  class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                                @can('edit-library')
                                                                <a class="dropdown-item edit-shelf-btn"
                                                                   data-toggle="modal"
                                                                   {{-- data-target="#editclass"--}}
                                                                   aria-haspopup="true"
                                                                   aria-expanded="false" data-id="{{ $shelf->shelf_Id }}">Edit</a>
                                                                @endcan
                                                                @can('delete-library')
                                                                    <a class="dropdown-item delete-shelf-btn"
                                                                       data-id="{{$shelf->shelf_Id}}">Delete</a>
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
    <script src="{{asset('adminassets/validator/dist/jquery.validate.js')}}"> </script>
    <script src="{{asset('js/shelf_script.js')}}"></script>
 

@endsection

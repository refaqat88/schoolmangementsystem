@extends('layouts.master')
  

@section('title', 'Add Stationery')
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
                        <h4 class="card-title">Stationeries</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="col-sm-12 pull-right">
                                @can('add-library')
                                <button class="btn btn-secondary btn-round pull-right" data-toggle="modal"
                                        data-target="#StationaryModal" id="show-stationary-btn">
                                    Add New Stationery
                                </button>
                               @endcan
                            </div>
                        </div>
                        {{--add Subject Modal--}}
                        <div class="modal fade modalvisibillity" id="StationaryModal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Add New Stationery</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <form id="StationaryForm">
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
                                                    <div class="form-group col-sm-12">
                                                        <label>Stationary Name</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                                name="stationaryName">
                                                        <div class="add-div-error stationaryName"></div>
                                                    </div>

                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-round btn-link add-new-subject-btn" id="add-Stationary-Btn">Save
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
                        {{--end add Subject Modal--}}

                        {{--edit Subject Modal--}}
                        
                        <div class="modal fade" id="EditStationaryModal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Edit Stationary</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <form id="EditStationaryForm" action="" method="Post">

                                                @csrf
                                                <input type="hidden" name="id" id="stat_id">
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
                                                        <div class="form-group col-sm-12">
                                                            <label>Name</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="stationaryName" id="stat_name">
                                                            <div class="edit-div-error stationaryName"></div>

                                                        </div>

                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-round btn-success btn-link update-subject-btn" id="update-Btn">Update
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
                        {{--end edit subject modal--}}

                        {{--show subject Modal--}}
                        <div class="modal fade modalvisibillity" id="ShowStationaryModal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Show Stationary</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label>Name</label>
                                                    <p id="show-stat-name"></p><hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-link" id="Show-Stat-Btn">Save
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
                        {{--end Show subject modal--}}
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">Library Categories  List</h6>
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
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php $i=1; ?>


                                        
                                        @foreach($stationaryCategory as $stationaryCateg)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$stationaryCateg->stat_categ_Name}}</td>
                                                <td class="text-center">
                                                    <div class="form-inline">
                                                        <div class="">
                                                            @can('view-library')
                                                            <button class=" btn-link btn-cus-weight show-stationary"
                                                                    type="button"
                                                                    data-toggle="modal"
                                                                    id="show-stationary"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false" data-id="{{ $stationaryCateg->stat_categ_Id  }}">
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
                                                               aria-expanded="false" data-id="{{ $stationaryCateg->stat_categ_Id }}">
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="navbarDropdownMenuLink">
                                                                @can('edit-library')
                                                                <a class="dropdown-item edit-stationary" href="javascript:void(0)"
                                                                   data-toggle="modal" id="edit-stationary"
                                                                   aria-haspopup="true"
                                                                   aria-expanded="false" data-id="{{ $stationaryCateg->stat_categ_Id }}">Edit</a>
                                                                @endcan
                                                                @can('delete-library')
                                                                <a class="dropdown-item delete-station-btn"
                                                                   href="#" data-id="{{$stationaryCateg->stat_categ_Id}}">Delete</a>
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
    <script src="{{asset('js/stationary_script.js')}}"></script>
     
@endsection

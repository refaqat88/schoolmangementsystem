@extends('layouts.master')
@section('title', 'Library Entity')
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
                        <h4 class="card-title">Library Entity</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="col-sm-12 pull-right">
                                @can('add-library')
                                    <button class="btn btn-secondary btn-round pull-right" data-toggle="modal"
                                            id="show-library-entity-btn">
                                        Add New Library Entity
                                    </button>
                                @endcan
                            </div>
                        </div>
                        {{--add Library Entity Modal--}}
                        <div class="modal fade modalvisibillity" id="add-library-entity-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Add New Library Entity</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">

                                            <form id="add-library-entity-form" method="post">
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
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>Publisher</label>
                                                        <select name="publisher" class="selectpicker" data-size="7"
                                                                data-style="btn btn-secondary btn-round"
                                                                title="Select Publisher">
                                                            <option value="" disabled selected>Select Publisher</option>
                                                            @foreach($publishers as $publisher)
                                                                <option value="{{$publisher->pub_Id}}">{{$publisher->pub_Name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="add-div-error publisher"></div>
                                                    </div>
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>Author</label>
                                                        <select name="author" class="selectpicker" data-size="7"
                                                                data-style="btn btn-secondary btn-round"
                                                                title="Select Author">
                                                            <option value="" disabled selected>Select Author</option>
                                                            @foreach($authers as $auther)
                                                                <option value="{{$auther->auth_Id}}">{{$auther->auth_Name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="add-div-error author"></div>
                                                    </div>
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>Edition</label>
                                                        <select name="edition" class="selectpicker" data-size="7"
                                                                data-style="btn btn-secondary btn-round"
                                                                title="Select Edition">
                                                            <option value="" disabled selected>Select Edition</option>
                                                            @foreach($editions as $edition)
                                                                <option value="{{$edition->edition_Id}}">{{$edition->edition_N0}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="add-div-error edition"></div>
                                                    </div>
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>General Entity</label>
                                                        <select name="general_entity" class="selectpicker" data-size="7"
                                                                data-style="btn btn-secondary btn-round"
                                                                title="Select General Entity">
                                                            <option value="" disabled selected>Select General Entity</option>
                                                            @foreach($general_entities as $general_entity)
                                                                <option value="{{$general_entity->gent_Code}}">{{$general_entity->gent_Name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="add-div-error general_entity"></div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-round btn-link" id="add-library-entity-btn">Save
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
                        {{--end add Library Entity Modal--}}

                        {{--edit Library Entity Modal--}}

                        <div class="modal fade" id="edit-library-entity-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <form id="edit-library-entity-form" action="" method="Post">

                                    @csrf
                                    <input type="hidden" name="id" id="library-entity-id">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up" id="Model-Title">Edit Library Entity</h5>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col-sm-12">

                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class=" col-sm-6 select-wizard">
                                                            <label>Publisher</label>
                                                            <select name="publisher" class="selectpicker" data-size="7" id="edit-publisher"
                                                                    data-style="btn btn-secondary btn-round"
                                                                    title="Select Publisher">
                                                                <option value="" disabled selected>Select Publisher</option>
                                                                @foreach($publishers as $publisher)
                                                                    <option value="{{$publisher->pub_Id}}">{{$publisher->pub_Name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="edit-div-error publisher"></div>
                                                        </div>
                                                        <div class=" col-sm-6 select-wizard">
                                                            <label>Author</label>
                                                            <select name="author" class="selectpicker" data-size="7" id="edit-author"
                                                                    data-style="btn btn-secondary btn-round"
                                                                    title="Select Author">
                                                                <option value="" disabled selected>Select Author</option>
                                                                @foreach($authers as $auther)
                                                                    <option value="{{$auther->auth_Id}}">{{$auther->auth_Name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="edit-div-error author"></div>
                                                        </div>
                                                        <div class=" col-sm-6 select-wizard">
                                                            <label>Edition</label>
                                                            <select name="edition" class="selectpicker" data-size="7" id="edit-edition"
                                                                    data-style="btn btn-secondary btn-round"
                                                                    title="Select Edition">
                                                                <option value="" disabled selected>Select Edition</option>
                                                                @foreach($editions as $edition)
                                                                    <option value="{{$edition->edition_Id}}">{{$edition->edition_N0}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="edit-div-error edition"></div>
                                                        </div>
                                                        <div class=" col-sm-6 select-wizard">
                                                            <label>General Entity</label>
                                                            <select name="general_entity" class="selectpicker" data-size="7" id="edit-general-entity"
                                                                    data-style="btn btn-secondary btn-round"
                                                                    title="Select General Entity">
                                                                <option value="" disabled selected>Select General Entity</option>
                                                                @foreach($general_entities as $general_entity)
                                                                    <option value="{{$general_entity->gent_Code}}">{{$general_entity->gent_Name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="edit-div-error general_entity"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <div class="">
                                                <button type="submit" class="btn btn-round btn-success btn-link" id="update-library_entity-btn">Update
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
                        {{--end edit Library Entity modal--}}

                        {{--show library Enitity Modal--}}
                        <div class="modal fade modalvisibillity" id="show-library-entity-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Show Library Entity</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>Publisher</label>
                                                    <p id="show-publisher"></p>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Author</label>
                                                    <p id="show-author"></p>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Edition</label>
                                                    <p id="show-edition"></p>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>General Entity</label>
                                                    <p id="show-general-entity"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="button" data-dismiss="modal" class="btn btn-round btn-danger btn-link">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--end Show library Enitity modal--}}
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">Library Entity Record List</h6>
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
                                            <th>Publisher</th>
                                            <th>Author</th>
                                            <th>Edition</th>
                                            <th>General Entity</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Publisher</th>
                                            <th>Author</th>
                                            <th>Edition</th>
                                            <th>General Entity</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($library_entities as $library_entity)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$library_entity->pub_Name}}</td>
                                                <td>{{$library_entity->auth_Name}}</td>
                                                <td>{{$library_entity->edition_N0}}</td>
                                                <td>{{$library_entity->gent_Name}}</td>
                                                <td class="text-center">
                                                    <div class="form-inline">
                                                        <div class="">
                                                            @can('view-library')
                                                                <button class="btn-link btn-cus-weight show-library-entity"
                                                                        type="button"
                                                                        data-toggle="modal"
                                                                        aria-haspopup="true"
                                                                        aria-expanded="false" data-id="{{ $library_entity->lent_Code  }}">
                                                                    View
                                                                </button>
                                                            @endcan
                                                        </div>
                                                        @canany(['edit-library','delete-library'])
                                                            <div class="nav-item btn-rotate dropdown pull-right">
                                                                <a class="nav-link dropdown-toggle pull-right"
                                                                   href="javascript:void(0)"
                                                                   data-toggle="dropdown"
                                                                   aria-haspopup="true"
                                                                   aria-expanded="false" data-id="{{ $library_entity->lent_Code }}">
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                     aria-labelledby="navbarDropdownMenuLink">
                                                                    @can('edit-library')
                                                                        <a class="dropdown-item edit-library-entity" href="javascript:void(0)"
                                                                           data-toggle="modal"
                                                                           aria-haspopup="true"
                                                                           aria-expanded="false" data-id="{{ $library_entity->lent_Code }}">Edit</a>
                                                                    @endcan
                                                                    @can('delete-library')
                                                                        <a class="dropdown-item delete-library-entity-btn"
                                                                           href="javascript:void(0)" data-id="{{$library_entity->lent_Code}}">Delete</a>
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
    <script src="{{asset('js/library_entity_script.js')}}"></script>
     
    
@endsection

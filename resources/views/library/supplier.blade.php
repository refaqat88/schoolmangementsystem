@extends('layouts.master')
@section('title', 'Add Supplier')
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
                        <h4 class="card-title">Suppliers</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="col-sm-12 pull-right">
                                @can('add-library')
                                    <button class="btn btn-secondary btn-round pull-right" data-toggle="modal"
                                            id="show-supplier-btn">
                                        Add New Supplier
                                    </button>
                                @endcan
                            </div>
                        </div>
                        {{--add supplier Modal--}}
                        <div class="modal fade modalvisibillity" id="add-supplier-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Add New Supplier</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">

                                            <form id="add-supplier-form" method="post">
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
                                                        <label>Supplier Name</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="supplier_Name">
                                                        <div class="add-div-error supplier_Name"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Supplier Contact</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="supplier_Contact">
                                                        <div class="add-div-error supplier_Contact"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Supplier address</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="supplier_Address">
                                                        <div class="add-div-error supplier_Address"></div>
                                                    </div>
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>Select Status</label>
                                                        <select name="status" class="selectpicker" data-size="7"
                                                                data-style="btn btn-secondary btn-round"
                                                                title="Select Status">
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
                                            <button type="submit" class="btn btn-success btn-round btn-link add-new-supplier-btn" id="add-supplier-btn">Save
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
                        {{--end add supplier Modal--}}

                        {{--edit Supplier Modal--}}

                        <div class="modal fade" id="edit-supplier-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">

                            <div class="modal-dialog modal-lg modal-sm">
                                <form id="edit-supplier-form" action="" method="Post">

                                    @csrf
                                    <input type="hidden" name="id" id="supp_id">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up" id="Model-Title">Edit Supplier</h5>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col-sm-12">

                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label>Supplier Name</label>
                                                            <input type="text" id="supp_name" class="form-control" placeholder=""
                                                                   name="supplier_Name">
                                                            <div class="edit-div-error supplier_Name"></div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label>Supplier Contact</label>
                                                            <input type="text" id="supp_cont" class="form-control" placeholder=""
                                                                   name="supplier_Contact">
                                                            <div class="edit-div-error supplier_Contact"></div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label>Supplier address</label>
                                                            <input type="text" id="supp_add" class="form-control" placeholder=""
                                                                   name="supplier_Address">
                                                            <div class="edit-div-error supplier_Address"></div>
                                                        </div>
                                                        <div class=" col-sm-6 select-wizard">
                                                            <label>Select Status</label>
                                                            <select name="status" id="supp_status" class="selectpicker" data-size="7"
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
                                                <button type="submit" class="btn btn-round btn-success btn-link update-supplier-btn" id="update-supplier-btn">Update
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
                        {{--end edit supplier modal--}}

                        {{--show Supplier Modal--}}
                        <div class="modal fade modalvisibillity" id="show-supplier-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Show Supplier</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>Name</label>
                                                    <p id="show_supp_name"></p>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Contact</label>
                                                    <p id="show_supp_cont"></p>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Address</label>
                                                    <p id="show_supp_add"></p>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Status</label>
                                                    <p id="show_supp_stat"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-link" id="show-supp-btn">Save
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

                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">Suppliers Record List</h6>
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
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($suppliers as $supplier)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$supplier->supp_Name}}</td>
                                                <td>{{$supplier->supp_Contact}}</td>
                                                <td>{{$supplier->supp_Contact}}</td>
                                                <td>{{$supplier->supp_Add}}</td>
                                                <td>{{$supplier->supp_Status}}</td>
                                                <td class="text-center">
                                                    <div class="form-inline">
                                                        <div class="">
                                                            @can('view-library')
                                                            <button class=" btn-link btn-cus-weight show-supplier"
                                                                    type="button"
                                                                    data-toggle="modal"
                                                                    id="show-supplier"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false" data-id="{{ $supplier->supp_Id  }}">
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
                                                               aria-expanded="false" data-id="{{ $supplier->supp_Id }}">
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="navbarDropdownMenuLink">
                                                                @can('edit-library')
                                                                <a class="dropdown-item edit-supplier" href="javascript:void(0)"
                                                                   data-toggle="modal" id="edit-supplier"
                                                                   aria-haspopup="true"
                                                                   aria-expanded="false" data-id="{{ $supplier->supp_Id }}">Edit</a>
                                                                @endcan
                                                                @can('delete-library')
                                                                <a class="dropdown-item delete-supplier-btn"
                                                                   href="#" data-id="{{$supplier->supp_Id}}">Delete</a>
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
    <script src="{{asset('js/supplier_script.js')}}"></script>
     
      
@endsection

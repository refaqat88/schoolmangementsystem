@extends('layouts.master')
@section('title', 'Library Genral Entity')
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
                        <h4 class="card-title">Library General Entity</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="col-sm-12 pull-right">
                                @can('add-library')
                                <button class="btn btn-secondary btn-round pull-right" data-toggle="modal"
                                        id="show-general-entity-modal-btn">
                                    Add General Entity
                                </button>
                                @endcan
                            </div>
                        </div>
                        {{--add General Entity Modal--}}
                        <div class="modal fade modalvisibillity" id="add-general-entity-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-md">
                                <form id="add-general-entity-form">
                                    @csrf
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Add New General Entity</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Entity Name</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                                name="entity_Name">
                                                        <div class="add-div-error entity_Name"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Single Price</label>
                                                        <input type="text" class="form-control" placeholder="" id="add-single-price"
                                                                name="single_price">
                                                        <div class="add-div-error single_price"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Quantity</label>
                                                        <input type="number" min="1"  class="form-control" placeholder="" id="add-quantity"
                                                                name="quantity" value="1">
                                                        <div class="add-div-error quantity"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Discount</label>
                                                        <input type="text" class="form-control" placeholder="" id="add-discount"
                                                                name="discount" value="0">
                                                        <div class="add-div-error discount"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Total Price</label>
                                                        <input type="text" class="form-control" placeholder="" id="add-total-price"
                                                                name="total_price">
                                                        <div class="add-div-error total_price"></div>
                                                    </div>
                                                    <div class=" col-sm-6 select-wizard">
                                                        <label>Supplier</label>
                                                        <select name="supplier" class="selectpicker" data-size="7"
                                                                data-style="btn btn-secondary btn-round"
                                                                title="Select Supplier" data-live-search="true"
                                                                data-hide-disabled="true">
                                                            <option value="" disabled selected>Select Supplier</option>
                                                            @foreach($suppliers as $supplier)
                                                                <option value="{{$supplier->supp_Id}}">{{$supplier->supp_Name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="add-div-error supplier"></div>
                                                    </div>

                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-round btn-link" id="add-general-entity-save-btn">Save
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
                        {{--end add General Entity Modal--}}

                        {{--edit Shelf Modal Start--}}
                        <div class="modal fade" id="edit-general-entity-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-md">
                                <form id="edit-general-entity-form" action="" method="Post">
                                    @csrf
                                    <input type="hidden" name="id" id="edit-general-entity-id">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Edit General Entity</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">

                                                <div class="col-sm-12">

                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label>Entity Name</label>
                                                            <input type="text" class="form-control" placeholder="" id="edit-entity-name"
                                                                   name="entity_Name">
                                                            <div class="edit-div-error entity_Name"></div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label>Single Price</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                   name="single_price" id="edit-single-price">
                                                            <div class="edit-div-error single_price"></div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label>Quantity</label>
                                                            <input type="number" min="1" class="form-control" placeholder=""
                                                                   name="quantity" id="edit-quantity" value="1">
                                                            <div class="edit-div-error quantity"></div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label>Discount</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                   name="discount" id="edit-discount" value="0">
                                                            <div class="edit-div-error discount"></div>
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label>Total Price</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                   name="total_price" id="edit-total-price">
                                                            <div class="edit-div-error total_price"></div>
                                                        </div>
                                                        <div class=" col-sm-6 select-wizard">
                                                            <label>Supplier</label>
                                                            <select name="supplier" class="selectpicker" data-size="7" id="edit-supplier"
                                                                    data-style="btn btn-secondary btn-round"
                                                                    title="Select Supplier" data-live-search="true"
                                                                    data-hide-disabled="true">
                                                                <option value="" disabled selected>Select Supplier</option>
                                                                @foreach($suppliers as $supplier)
                                                                    <option value="{{$supplier->supp_Id}}">{{$supplier->supp_Name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="edit-div-error rack_No"></div>
                                                        </div>

                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-round btn-success btn-link" id="update-general-entity-btn">Update
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
                        {{--end edit General Entity modal--}}

                        {{--show General Entity Modal--}}
                        <div class="modal fade modalvisibillity" id="show-general-entity-modal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-md">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Show General Entity</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>Entity Name</label>
                                                    <p id="show-entity-name"></p><hr>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Single Price</label>
                                                    <p id="show-single-price"></p><hr>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Quantity</label>
                                                    <p id="show-quantity"></p><hr>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Discount</label>
                                                    <p id="show-discount"></p><hr>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Supplier</label>
                                                    <p id="show-supplier"></p><hr>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Total Price</label>
                                                    <p id="show-total-price"></p><hr>
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
                        {{--end Show General Entity modal--}}
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
                                            <th>Entity Name</th>
                                            <th>Single Price</th>
                                            <th>Quantity</th>
                                            <th>Discount</th>
                                            <th>Total Price</th>
                                            <th>Supplier</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Entity Name</th>
                                            <th>Single Price</th>
                                            <th>Quantity</th>
                                            <th>Discount</th>
                                            <th>Total Price</th>
                                            <th>Supplier</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php $i=1; ?>
                                        @foreach($general_entities as $general_entity)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$general_entity->gent_Name}}</td>
                                                <td>{{$general_entity->gent_single_Price}}</td>
                                                <td>{{$general_entity->gent_Quantity}}</td>
                                                <td>{{$general_entity->gent_Discount}}</td>
                                                <td>{{$general_entity->gent_tot_Price}}</td>
                                                <td>{{$general_entity->supp_Name}}</td>

                                                <td class="text-center">
                                                    <div class="form-inline">
                                                        <div class="">
                                                            @can('view-library')
                                                            <button class=" btn-link btn-cus-weight show-general-entity-btn"
                                                                    type="button"
                                                                    data-toggle="modal"
                                                                    {{-- data-target="#viewclass"--}}
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false" data-id="{{ $general_entity->gent_Code  }}">
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
                                                               aria-expanded="false" data-id="{{ $general_entity->gent_Code }}">
                                                            </a>
                                                            <div  class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                                @can('edit-library')
                                                                <a class="dropdown-item edit-general-entity-btn"
                                                                   data-toggle="modal"
                                                                   aria-haspopup="true"
                                                                   aria-expanded="false" data-id="{{ $general_entity->gent_Code }}">Edit</a>
                                                                @endcan
                                                                @can('delete-library')
                                                                <a class="dropdown-item delete-general-entity-btn"
                                                                    data-id="{{$general_entity->gent_Code}}">Delete</a>
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
    <script src="{{asset('js/general_entity_script.js')}}"></script>


@endsection

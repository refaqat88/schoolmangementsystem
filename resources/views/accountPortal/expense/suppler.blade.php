 @extends('layouts.master')
 @section('title', 'Supplers')
 
 @section('content') 
        
    <div class="content">

        <div class="row">

            <div class="col-md-12">
                <form id="RegisterValidation" action="#" method="">
                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-title">Suppliers</h4>
                        </div>
                        <div class="card-body">
                            <div class="row bor-sep">

                                <div class="col-sm-12 col-lg-12 pull-right">
                                    <button type="button" class="btn btn-secondary btn-round float-right" data-toggle="modal" data-target="#addsuppmodal">Add New</button>
                                </div>
                            </div>


                            @include('accountPortal.expense.partails.add_supplier')
                            


                            <div class="row">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="">
                                        <div class="card-header">
                                            <h6 class="card-title">Suppliers List</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="toolbar">
                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                            </div>
                                            <table id="datatable" class="custom_border table-hover" cellspacing="0" width="100%">
                                                <thead class="table-secondary">
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>
                                                        Name</th>
                                                    <th>Phone</th>
                                                    <th class="text-right">Open Balance</th>
                                                    <th class="disabled-sorting text-center">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>sup-2021-011</td>
                                                    <td>
                                                        <a href="../../examples/pages/expenses.html" class="text-info"  data-toggle="" data-target="" >Suppler/Company-1</a>
                                                    </td>
                                                    <td>09123456789</td>
                                                    <td class="text-right">&#8360 22,250.00</td>
                                                    <td class="text-center">
                                                        <div class=" ">
                                                            <div class="dropdown">
                                                                <button class="dropdown-toggle btn-link  btn-round  btn-sm btn text-info  btn-cus-weight  btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Manage
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#" >Make Payment</a>
                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#" >Print Statement</a>
                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#" >Create Bill</a>
                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#" >Create Expense</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div><!-- end content-->
                                  
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
 
@endsection

@section('front_script')

@endsection
  @extends('layouts.master')
 @section('title', 'Expense')
 
 @section('content') 
  
  
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <form id="RegisterValidation" action="#" method="">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title text-muted font-weight-bold">Supplier-1</h4>
                            </div>
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="dropdown col-sm-12 col-lg-4 float-right">
                                            <button class="dropdown-toggle btn btn-secondary btn-round float-right"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                New Transaction
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                 aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#generatebill">Bill</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#generateexpense">Expense</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#paychequemodal">Cheque</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#createpurchaseorder">Purchase Order</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#expensestatement">Statement</a>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 pull-right">
                                            <br>
                                            <h5 class="pull-right"><b>PRs 2,250.00</b></h5>
                                        </div>
                                        <div class="col-sm-12 pull-right">

                                            <p class="pull-right text-warning"><b>Open</b></p>
                                        </div>
                                        <div class="col-sm-12 pull-right">
                                            <br>
                                            <h5 class="pull-right"><b>PRs 0.00</b></h5>
                                        </div>
                                        <div class="col-sm-12 pull-right">

                                            <p class="pull-right text-danger"><b>Overdue</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="nav-tabs-navigation nav-tabs-left">
                                        <div class="nav-tabs-wrapper">
                                            <ul id="tabs" class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#tottranstab"
                                                       role="tab" aria-expanded="true">Transaction List</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#billdetailstab"
                                                       role="tab" aria-expanded="false">Supplier/Company Details</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div id="my-tab-content" class="tab-content ">
                                        <div class="tab-pane active" id="tottranstab" role="tabpanel"
                                             aria-expanded="true">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h6 class="card-title">transaction list</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="toolbar">
                                                                <div class="form-group col-sm-2 select-wizard">
                                                                    <select class="selectpicker" data-size="7"
                                                                            data-style="btn btn-sm btn-outline-secondary btn-round"
                                                                            title="Filter">
                                                                        <option value="1">Bill</option>
                                                                        <option value="2">Expense</option>
                                                                        <option value="3">Cheque</option>
                                                                        <option value="2">Purchase Order</option>
                                                                        <option value="3">Cheque</option>
                                                                    </select>
                                                                </div>
                                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                            </div>

                                                            <table id="transactionsdatatable"
                                                                   class="custom_border  table-hover table  "
                                                                   cellspacing="0" width="100%">
                                                                <thead class="table-secondary">
                                                                <tr>
                                                                    <th class="text-center" width="5%"><input type="checkbox" class=""  title="Select all" name="select_all" value="1" id="example-select-all"></th>
                                                                    <th class="w-10">Date</th>
                                                                    <th class="w-15">
                                                                        Type</th>
                                                                    <th width="5%">No.</th>
                                                                    <th class="w-15">Payee</th>
                                                                    <th class="w-15">Category</th>
                                                                    <th class="text-right w-25">Total</th>
                                                                    <th class="w-10">Status</th>
                                                                    <th class="disabled-sorting text-center w-10">
                                                                        Actions</th>
                                                                </tr>
                                                                </thead>

                                                                <tbody>
                                                                <tr>
                                                                    <th class="text-center " width="5%"><input type="checkbox" class=""  title="Select all" name="select_all" value="1" id="example-select-all"></th>
                                                                    <td>01/08/2020</td>
                                                                    <td>
                                                                        Pay Bill</td>
                                                                    <td>3001</td>
                                                                    <td>Suppler-1</td>
                                                                    <td class="">
                                                                        <div class="col-sm-12">

                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-link text-info btn-sm btn-secondary" title="Choose Category" required="true">                                            <option selected>Term</option>
                                                                                <option value="0" selected disabled>Choose Category</option>
                                                                                <option value="1">Payroll Expense</option>
                                                                                <option value="2">Purchases</option>
                                                                                <option value="2">Rental/lease Payments</option>
                                                                                <option value="2">Repair & Maintenance</option>
                                                                                <option value="2">Shipping & Delivery Expense</option>
                                                                                <option value="2">Stationary & Printing Expense</option>
                                                                                <option value="2">Travel Expense</option>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-right">&#8360 22,600</td>
                                                                    <td class="text-muted text-info font-weight-bold">Open</td>
                                                                    <td class="text-center">
                                                                        <div class=" ">
                                                                            <div class="dropdown">
                                                                                <button
                                                                                        class="dropdown-toggle btn-link  btn-round  btn-sm btn text-info  btn-cus-weight  "
                                                                                        type="button"
                                                                                        id="dropdownMenuButton"
                                                                                        data-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="false">
                                                                                    Manage
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                                     aria-labelledby="navbarDropdownMenuLink">
                                                                                    <a class="dropdown-item"
                                                                                       data-toggle="modal"
                                                                                       data-target="#editguardian">Make
                                                                                        payment</a>
                                                                                    <a class="dropdown-item"
                                                                                       data-toggle="modal"
                                                                                       data-target="#">Print</a>
                                                                                    <a class="dropdown-item"
                                                                                       data-toggle="modal"
                                                                                       data-target="#editguardian">Send
                                                                                        reminder</a>
                                                                                    <a class="dropdown-item"
                                                                                       data-toggle="modal"
                                                                                       data-target="#editguardian">View/Edit</a>
                                                                                    <a class="dropdown-item"
                                                                                       data-toggle="modal"
                                                                                       data-target="#editguardian">Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                </tbody>
                                                            </table>











                                                        </div><!-- end content-->
                                                    </div><!--  end card  -->
                                                </div> <!-- end col-md-12 -->
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="billdetailstab" role="tabpanel"
                                             aria-expanded="false">
                                            <div class="toolbar row">
                                                <div class="col">
                                                    <div class="col-sm-12">
                                                        <button
                                                                class="btn btn-simple btn-tumblr btn-icon float-right "><i
                                                                class="fa fa-print"
                                                                title="Print"
                                                                data-toggle="modal" data-target=""></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h6 class="card-title"> Supplier / Company Information</h6>
                                                    </div>
                                                    <div class="card-body table-full-width ">
                                                        <div class="table-condensed">
                                                            <table class="table border-bottom " width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th class="w-50"></th>
                                                                    <th class="w-50"></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <th>Supplier No</th>
                                                                    <td>120</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Full Name</th>
                                                                    <td>Supplier-1</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>company Name</th>
                                                                    <td>Afaq Publishers</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Opening Balance</th>
                                                                    <td>0.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Account Number</th>
                                                                    <td>023132109312</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h6 class="card-title"> Contact Information</h6>
                                                    </div>
                                                    <div class="card-body table-full-width ">
                                                        <div class="table-condensed">
                                                            <table class="table border-bottom " width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th class="w-50"></th>
                                                                    <th class="w-50"></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <th>Street Address</th>
                                                                    <td>Plot no.19 School Road</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>City</th>
                                                                    <td>Parachinar</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>District</th>
                                                                    <td>Kurram</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Website</th>
                                                                    <td>www.afaqpub.com</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Zip</th>
                                                                    <td>26000</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Phone Number</th>
                                                                    <td>0926 132 1093</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Mobile Number</th>
                                                                    <td>0926 132 1093</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td>supp1@mail.com</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end col-md-12 -->
                            </div> <!-- end row -->

                        </div>


                    </form>
                </div>
            </div>


            @include('accountPortal.expense.partails.purchase');

            @include('accountPortal.expense.partails.bill');

            @include('accountPortal.expense.partails.cheque');
            
            @include('accountPortal.expense.partails.statement');

            @include('accountPortal.expense.partails.expense');


           
        </div>

 
@endsection

@section('front_script')
             
@endsection

<div class="modal fade nopadd" id="makepayment" tabindex="-1" role="dialog"
    aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-xl modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <i class="fa fa-remove"></i>
                </button>
                <h5 class="title title-up">Payroll Payment</h5>
            </div>
            <form id="pay_reciev_form" action="#" method="post">
                <input type="hidden" name="id" id="id">
                <div class="modal-body row">
                    <div class="col-md-12">
                        
                            <div class="card ">
                                <div class="card-header ">
                                    <h6 class="card-title">Receive Payment</h6>
                                </div>
                                <div class="card-body">

                                    <div class="row bor-sep">
                                        <div class="col-sm-9">
                                          
                                                <div class="form-row">
                                                    <div class="row col-12">
                                                        <div class="col-sm-3">
                                                            <label>Employe Name</label>
                                                            <h5 class="text-muted" id="name">
                                                            </h5>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <label>Payment Method</label>
                                                            <select class="selectpicker"
                                                                data-size="7"
                                                                data-style="btn btn-sm btn-secondary"
                                                                title="Select Section"
                                                                required="true" name="accounts" id="acc_type_Id">
                                                                <?php
                                                                   $deposite_account = config('constants.deposite_account')
                                                                ?>
                                                                @foreach($deposite_account as $key=>$val)
                                                                    <option value="{{$key}}">{{$val}}</option>
                                                                                                        
                                                                @endforeach
                                                            </select>
                                                            <div class="add-div-error accounts errorsss"></div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <label>Payment Date</label>
                                                            <input type="date"
                                                                class="form-control" name="next_pay_date"
                                                                placeholder="" id="next_pay_date">
                                                                <div class="add-div-error next_pay_date errorsss"></div>
                                                        </div>
                                                        
                                                        <div class="col-sm-3">
                                                            <label>Amount To Pay</label>
                                                            <input type="text" name="amount" class="form-control amountPayable" placeholder="" value="" number="true">
                                                            <div class="add-div-error amount errorsss"></div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                           
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="float-right"><small>Amount
                                                            Received</small></p>
                                                </div>
                                                <div class="col-sm-12">
                                                    <h5 class="float-right"><b>&#8360 <span id="paymentamount">0</span></b>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="card-title">Transaction List</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="toolbar">
                                                    <div class="row">
                                                        <div
                                                            class="form-group col-sm-2 select-wizard">
                                                            <!-- <select class="selectpicker"
                                                                data-size="7"
                                                                data-style="btn btn-sm btn-outline-secondary btn-round"
                                                                title="Filter">
                                                                <option value="1">
                                                                    Outstanding</option>
                                                                <option value="2">Credit
                                                                </option>
                                                                <option value="3">Debit
                                                                </option>
                                                                <option value="4">All
                                                                </option>
                                                            </select> -->
                                                        </div>
                                                        <div class="col-sm-10 float-right">
                                                            <button
                                                                class="btn btn-simple btn-tumblr btn-icon float-right "><i
                                                                    class="fa fa-print"
                                                                    title="Print"
                                                                    data-toggle=""></i></button>
                                                            <button
                                                                class="btn btn-simple btn-tumblr btn-icon float-right "><i
                                                                    class="fa fa-file-excel-o"
                                                                    title="Export to Excel"
                                                                    data-toggle=""></i></button>
                                                        </div>
                                                    </div>
                                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                </div>




                                                <table id="payemptable"
                                                    class="custom_border table table-hover"
                                                    cellspacing="0" width="100%">
                                                    <thead class="table-secondary">
                                                        <tr>
                                                            <th><input type="checkbox"
                                                                    name="select_all"
                                                                    value="1"
                                                                    id="example-select-all">
                                                            </th>
                                                            <th>Description</th>
                                                            <th>Invoice Date</th>
                                                            <th>Due Date</th>
                                                            <th>Original Amount</th>
                                                            <th>Open Balannce</th>
                                                            <th>Payment</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         

                                                         
                                                    </tbody>

                                                </table>
                                                
                                                <div class="container">
                                                    <br>
                                                    <table class="col-12">
                                                        <tr>
                                                            <td class="col-sm-8"></td>
                                                            <td><b>Amount To Apply</b></td>
                                                            <td><b>&#8360 0.00</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="col-sm-8"></td>
                                                            <td><b>Amount To Credit</b></td>
                                                            <td><b>&#8360 0.00</b></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div><!-- end content-->
                                        </div><!--  end card  -->
                                    </div> <!-- end col-md-12 -->
                                </div> <!-- end row -->

                            </div>
                        


                            
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="">
                        <button type="submit" class="btn btn-round  btn-secondary "
                            >Save</button>
                    </div>
                    <div class="">
                        <button type="button" data-dismiss="modal"
                            class="btn   btn-round btn-danger ">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade nopadd" id="feeinvoice" tabindex="-1" role="dialog"
    aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-full modal-dialog">
        
        <form id="feeinvoiceform" action="#" method="">

            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up">Pay Bill</h5>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12"> 
                        
                            <input type="hidden" id="id" name="id" />
                            <div class="card ">
                                <div class="card-header ">
                                    <h6 class="card-title">Bill no. <span class="invoice_num">  </span>
                                    </h6>
                                </div>
                                <div class="card-body">

                                    <div class="row bor-sep">
                                        <div class="col-sm-9">

                                            <div class="form-row">
                                                <div class="col-sm-4">
                                                    <label>P NO </label>
                                                    <h6 class="text-muted" class="invoice_num" id="personal_No"></h6>
                                                </div>
                                            
                                                <div class="col-sm-4">
                                                    <label>Employee name</label>
                                                    <h5 class="text-muted" id="name"></h5>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>Designation</label>
                                                    <h5 class="text-muted" id="designation"></h5>
                                                </div>

                                            
                                                <div class="col-sm-4">
                                                    <label>Starting date</label>
                                                    <input type="date" class="form-control"
                                                        placeholder="" id="issue_date" name="issue_date">
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>Ending date</label>
                                                    <input type="date" class="form-control"
                                                        placeholder="" id="due_Date" >
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>Pay date</label>
                                                    <input type="date" name="next_pay_date" id="next_pay_date" class="form-control"
                                                        placeholder="">
                                                </div>
                                                
                                    

                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="float-right "><small>
                                                            Balance Due</small></p>
                                                </div>
                                                <div class="col-sm-12">
                                                    <h5 class="float-right"><b>&#8360 <span class="dueamount"></span></b></h5>
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
                                                        <div class="col-sm-12 float-right">
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
                                                </div>
                                                <h6 >Payments</h6>
                                                
                                                <div id="generateTable">
                                                    
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
                        <button type="button"   data-dismiss="modal"
                            class="btn   btn-round btn-danger ">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
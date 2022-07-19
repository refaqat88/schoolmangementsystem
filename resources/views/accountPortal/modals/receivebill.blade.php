<!------------------ Recieve Fee  --------------------------->
<div class="modal fade nopadd" id="feepayment" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-full modal-dialog modal-xl">
    <form action="{{url('payment/recieve')}}" id="fee_reciev_form" method="post" enctype="multipart">
      <input type="hidden" name="std_Id" value="" id="std_Id">
      <div class="modal-content">
        <div class="modal-header justify-content-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-remove"></i>
          </button>
          <h5 class="title title-up">Fee Payment</h5>
        </div>
        <div class="modal-body row">
          <div class="col-md-12">
               <div class="card ">
                <div class="card-header ">
                  <h6 class="card-title">Receive Payment</h6>
                </div>
                <div class="card-body">
                  <div class="row bor-sep">
                    <div class="col-sm-10">
                        <div class="form-row">
                          <div class="row col-12">
                            <div class="col-sm-3">
                              <label>Student Name</label>
                              <h5 class="text-muted" id="stundet_name"></h5>
                            </div>

                            <div class="col-sm-3">
                              <label>Payment Date</label>
                              <input type="date" name="tr_Date" id="tr_Date" class="form-control" value="" placeholder="Payment Date">
                            </div>

                           
                            <div class="col-sm-3">
                              <label>Payment Mode</label>
                              <select name="payment_Mode" id="payment_Mode" class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" title="Choose payment method">
                                  
                                <option value="" disabled selected>Choose payment method</option>                  
                                @foreach($PaymentType as $key=>$val)
                                    
                                @php
                                $payment = $val->acc_Name;
                                if($val->acc_Name=='Cash on Hand'){
                                  $payment = 'Cash';
                                }
                                if($val->acc_Name=='Cash at Bank'){
                                   $payment = 'Bank';
                                }
                                @endphp
                                <option value="{{$val->acc_Id}}">{{$payment}}</option>
                                @endforeach
                              </select>
                            </div>


                            <div class="col-sm-3">
                              <label>Deposit To</label>
                              <select class="selectpicker" data-size="7" data-style="btn btn-sm btn-secondary" title="Select Section" required="true" name="acc_Id" id="acc_Id" >
                                <option selected>deposit to</option>
                                


                              </select>
                            </div>
                            
                            
                          </div>
                          <div class="row col-12">
                            
                            <div class="col-sm-3">
                              <label>Receipt No</label>
                              <input type="text" name="receipt_no" readonly class="form-control" placeholder="" value="10023" id="receipt_no">
                            </div>

                            <div class="col-sm-3">
                              <label>Amount To pay</label>
                              <input type="text" name="amount" class="form-control amountPayable" placeholder=""   value="">

                              <div class="add-div-error amount errorsss"></div>

                            </div>

                          </div>

                        </div>
                     
                    </div>

                    <div class="col-sm-2">
                      <div class="row">
                        <div class="col-sm-12">
                          <p class="float-right"><small>Amount Received</small></p>
                        </div>
                        <div class="col-sm-12">
                          <h5 class="float-right"><b>PRs <span class="receivedAmount">0.00</span></b></h5>
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
                            <div class="form-group col-sm-2 select-wizard">
                              <select class="selectpicker" data-size="7" data-style="btn btn-sm btn-outline-secondary btn-round" title="Filter" >
                                <option value="1">Outstanding</option>
                                <option value="2">Credit</option>
                                <option value="3">Debit</option>
                                <option value="4">All</option>
                              </select>
                            </div>
                            <div class="col-sm-10 float-right">
                              <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-print" title="Print" data-toggle=""></i></button>
                              <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-file-excel-o" title="Export to Excel" data-toggle=""></i></button>
                            </div>
                          </div>
                           
                        </div>
                        <table id="recpaydatatable" class="table custom_border table-hover" cellspacing="0" width="100%">
                           
                        </table>
                      </div><!-- end content-->
                    </div><!--  end card  -->
                  </div> <!-- end col-md-12 -->
                </div> <!-- end row -->
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="">
            <button type="submit" class="btn btn-round  btn-secondary paymentssave " >Save</button>
          </div>
          <div class="">
            <button type="button" data-dismiss="modal" class="btn   btn-round btn-danger ">Cancel</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
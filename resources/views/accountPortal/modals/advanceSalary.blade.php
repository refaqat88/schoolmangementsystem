  <div class="modal fade nopadd" id="advanceinvoice" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-full modal-dialog modal-xl">
      <div class="modal-content">
        <form id="advancesalaryForm" action="#" method="{{route('scheduleadvanceSalarySave')}}" method="post">
            <input type="hidden" name="emp_id" id="emp_id">
        <div class="modal-header justify-content-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-remove"></i>
          </button>
          <h5 class="title title-up">Advance Salary</h5>
        </div>
        <div class="modal-body row">
          <div class="col-sm-12 col-lg-12">
            
               
              <input type="hidden" name="schedule_id" id="schedule_id" value="">
              <div class="card ">
                <div class="card-header ">
                  <h6 class="card-title">Invoice no. <span></span></h6>
                </div>
                <div class="card-body">

                  <div class="row bor-sep">
                    <div class="col-sm-9">

                      <div class="form-row">
                        <div class="col-sm-3">
                          <label>Student name</label>
                          <h5 class="text-muted" id="student_name"></h5>
                        </div>
                         
                        <div class='col-lg-2 col-sm-12 form-group'>
                            <label>Advance Amount </label>
                            <input type="text" class="form-control" placeholder="" name="advance_amount" id="advance_amount" number="true"  value="">
                            <div class="add-div-error advance_amount errorsss"></div>

                        </div>
                        <div class='col-lg-2 col-sm-12 form-group'>
                            <label>Installments </label>
                            <input type="number" class="form-control" value="1" placeholder="" name="Installments" id="Installments" number="true" value="">
                            <div class="add-div-error Installments errorsss"></div>
                        </div>
                        

                        <div class='col-lg-2 col-sm-12 form-group'>
                            <label>Amount per period </label>
                            <input type="text" data-id="advance" class="form-control deduction_total" placeholder="" id="amount_per_pay_peroid" readonly  name="amount_per_pay_peroid" number="true"  value="">
                            <div class="add-div-error amount_per_pay_peroid errorsss"></div>

                        </div>

                         <div class="form-group col-sm-12 col-lg-2 select-wizard">
                            <label>Deposit Account</label>
                            <select class="selectpicker" name="acc_Id" id="acc_Id"  data-size="7" data-style="btn btn-secondary" title="Deposit Account">
                            <?php
                              $deposite_account = config('constants.deposite_account')                           
                            ?>
                           
                           @foreach($deposite_account as $key=>$val)

                            <option value="{{$key}}">{{$val}}</option>
                                                                
                          @endforeach

                          </select>
                          <div class="add-div-error acc_Id errorsss"></div>
                          </div>




                         
                        
                      </div>
                    </div>

                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h6 class="card-title">Advance Salary List</h6>
                      </div>
                      <div class="card-body">
                        <div class="toolbar">
                          <div class="row">
                            <div class="col-sm-12 float-right">
                              <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-print" title="Print" data-toggle=""></i></button>
                              <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-file-excel-o" title="Export to Excel" data-toggle=""></i></button>
                            </div>
                          </div>
                          
                        </div>
                        <table class="custom_border  table-hover mb-5" cellspacing="0" width="100%" id="advanceSalaryList">
                          
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
            <button type="submit" class="btn btn-round  btn-secondary ">Save</button>
          </div>
          <div class="">
            <button type="button"   data-dismiss="modal" class="btn   btn-round btn-danger ">Cancel</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
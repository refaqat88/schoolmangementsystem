<div class="modal fade nopadd" id="feestatement" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-full modal-dialog">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-remove"></i>
        </button>
        <h5 class="title title-up">Create Statements</h5>
      </div>
      <div class="modal-body row">
        <div class="col-md-12">
          <form id="Formfeestatements" action="#" method="">
            <input type="hidden" name="std_Id" id="std_Id" value="">
            <div class="card ">
              <div class="card-header ">
              </div>
              <div class="card-body">

                   
              <div class="row bor-sep">
                <div class="col-sm-9">
                   
                    <div class="form-row">
                     
                      <div class="row col-12">
                        
                        <div class="col-sm-4">
                          <label>Report type</label>
                          <select class="form-control report_type" name="report_type" id="report_type">
                            <option value="1" selected="selected">Open Items (Last 365 days)</option>
                            <option value="2">Balance Forward</option>
                            <option value="3">Transaction Statement</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="col-sm-4">
                        <label>Statement date</label>
                        <input type="date" id="statement_date"  name="statement_date" value="" class="form-control" >
                      </div>
                    </div>
                    <div class="row" id="date_range">
                      <div class="col-sm-4">
                        <br>
                        <label>Start date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" >
                      </div>
                      <div class="col-sm-4">
                        <br>
                        <label>End date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" >
                      </div>
                    </div>

                    <div class="row applyTransarow ">
                        <button type="button" data-id="" id="applybtn" class="btn mt-3 mb-3 btn-round  btn-secondary  feestatement "> Apply</button>
                    </div>

                   
                </div>

                <div class="col-sm-3" id="statement_date_balance">
                  <div class="row">
                    <div class="col-sm-12">
                      <p class="float-right"><small>TOTAL BALANCE</small></p>
                    </div>
                    <div class="col-sm-12">
                      <h5 class="float-right">PRs <span class="Open"></span></h5>
                    </div>
                  </div>
                </div>
              </div>
              </div>


              <div class="row" id="contentFormInvoive">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h6 class="card-title">Recipients List</h6>
                    </div>


                    <div class="card-body">
                      <div class="toolbar">
                        <div class="row">
                          <div class="col-sm-12 float-right">
                           
                           <button class="fee-statemnt-trans-btn btn mb-3 btn-outline-choice btn-round col-sm-12 col-lg-3 btn-sm pull-left"  aria-expanded="false">
                          Transactions (<span class="count"></span>)
                        </button>

                          </div>
                        </div>
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                      </div>
                      <table class="table table-hover custom_border" cellspacing="0" width="100%">
                        <thead class="table-secondary">
                        <tr>
                          <th class="text-center"><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                          <th>RECIPIENTS</th>
                        
                          <th class="text-right">BALANCE</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td class="text-center"><input type="checkbox" name="select_all" value="1" id="example-select-current"></td>
                          <td><span class="name"></span></td>
                          <td class="text-right">PRs <span class="Open"></span></td>
                        </tr>

                        </tbody>

                      </table>

                    </div><!-- end content-->
                  </div><!--  end card  -->
                </div> <!-- end col-md-12 -->
              </div> <!-- end row -->

            </div>
          
            <div class="modal-footer">
              <div class="">
                <button type="button" class="btn btn-round  btn-secondary " data-dismiss="modal">Save</button>
              </div>
              <div class="">
                <button type="button" class="btn   btn-round btn-danger ">Cancel</button>
              </div>
            </div>
          </form>
        </div>
       
      </div>
    </div>
  </div>       
</div>


<div class="modal fade nopadd" id="print-feestatement" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
    aria-hidden="true">
    <div class="modal-full modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-remove"></i>
                </button>
                <button class="pull-right btn btn-secondary btn-round btn-sm" id="print-fee-state"><i class="fa fa-print"></i></button>
                <h5 class="title title-up">Print Statements</h5>
            </div>
            <div class="modal-body row print_fee_statement">

            </div>
        </div>
    </div>
</div>


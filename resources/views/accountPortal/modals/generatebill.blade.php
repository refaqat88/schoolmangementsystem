  <div class="modal fade nopadd" id="feeinvoice" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-full modal-dialog modal-xl">
      <div class="modal-content">
        <form id="feeinvoiceform" action="#" method="{{route('schedulefeeGenerateSave')}}" method="post">
            <input type="hidden" name="std_Id" id="std_Id">
        <div class="modal-header justify-content-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-remove"></i>
          </button>
          <h5 class="title title-up">Fee Invoice</h5>
        </div>
        <div class="modal-body row">
          <div class="col-sm-12 col-lg-12">
            
               
              <input type="hidden" name="schedule_id" id="schedule_id" value="">
              <div class="card ">
                <div class="card-header ">
                  <h6 class="card-title">Invoice no. <span>1003</span></h6>
                </div>
                <div class="card-body">

                  <div class="row bor-sep">
                    <div class="col-sm-9">

                      <div class="form-row">
                        <div class="col-sm-4">
                          <label>Student name</label>
                          <h5 class="text-muted" id="student_name"></h5>
                        </div>
                        <div class="col-sm-2">
                          <label>Term</label>
                          <select class="selectpicker" id="feeTerm" data-size="7" data-style="btn btn-sm btn-secondary" title="Select Section" required="true">                                            <option selected>Term</option>
                            <?php $Term = config('constants.Term') ?>
                             @foreach($Term as $key=>$val)
                              <option value="{{$key}}">{{$val}}</option>
                            @endforeach

                          </select>
                        </div>
                        <div class="col-sm-3">
                          <label>Invoice date</label>
                          <input type="date" class="form-control" id="feeissue_date" placeholder="" name="month">
                        </div>
                        <div class="col-sm-3">
                          <label>Due date</label>
                          <input type="date" id="feedue_Date" class="form-control" placeholder="">
                        </div>

                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="row">
                        <div class="col-sm-12">
                          <p class="float-right "><small>Balance Due</small></p>
                        </div>
                        <div class="col-sm-12">
                          <h5 class="float-right"><b>&#8360; <span class="feebalance_bydue"></span></b></h5>
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
                              <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-print" title="Print" data-toggle=""></i></button>
                              <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-file-excel-o" title="Export to Excel" data-toggle=""></i></button>
                            </div>
                          </div>
                          
                        </div>
                        <table class="custom_border  table-hover mb-5" cellspacing="0" width="100%" id="genrate_bill_tbale">
                          
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
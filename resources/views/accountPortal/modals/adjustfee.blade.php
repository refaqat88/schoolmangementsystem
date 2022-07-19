<!------------------ Adust Fee  --------------------------->
<div class="modal fade nopadd" id="adjustfees" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-full modal-dialog">
    <form method="post" id="formadjustfees"> 


      <input type="hidden" name="std_Id" id="adjustfeesstd_Id" value="">
      <input type="hidden" name="total_amount" id="total_amount" value="">
      <input type="hidden" name="transaction" id="transaction" value="">

      <div class="modal-content">
        <div class="modal-header justify-content-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-remove"></i>
          </button> 
          <h5 class="title title-up">Adjust Fee</h5>
        </div>
        <div class="modal-body row">
            <div class="col-md-12">
            
              <div class="card ">
                <div class="card-header ">
                  <h6 class="card-title">Fee Adjustment</h6>
                </div>
                <div class="card-body">

                  <div class="row bor-sep">
                    <div class="col-sm-9">
                         <div class="add-div-error total_amount errorsss"></div>
                        <div class="form-row">
                          <div class="row col-12">
                            <div class="col-sm-4">
                              <label>Student Name</label>
                              <h5 class="text-muted" id="stundet_name"></h5>
                              <input type="hidden"  id="student_id" name="std_Id"/>
                              <input type="hidden"  id="counter" name="counter" value="0" />
                            </div>

                            <div class="col-sm-3">
                              <label>Date</label>
                              <input type="date" class="form-control" name="date" id="date" placeholder="">
                               <div class="add-div-error date errorsss"></div>
                            </div>
                            <div class="col-sm-3">
                              <label>Reference No</label>
                              <input type="text" name="receipt_no" id="receipt_no" class="form-control" placeholder="" readonly value="">
                               <div class="add-div-error receipt_no errorsss"></div>
                            </div>
                          </div>

                        </div>
                      
                    </div>

                    <div class="col-sm-3">
                      <div class="row">
                        <div class="col-sm-12">
                          <p class="float-right"><small>Amount to Adjust</small></p>
                        </div>
                        <div class="col-sm-12">
                          <h5 class="float-right"><b>PRs <span class="total">0</span></b></h5>
                        </div>
                      </div>
                    </div>
                  </div>

                  
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h6 class="card-title">Adjusted Transaction List</h6>
                      </div>
                      <div class="card-body">
                        <div class="toolbar">
                          <div class="row">
                            <div class="col-sm-12 float-right">
                              <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-print" title="Print" data-toggle=""></i></button>
                              <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-file-excel-o" title="Export to Excel" data-toggle=""></i></button>
                            </div>
                          </div>
                          <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                       


                        <table id="feeadjusttable" class="custom_border table-hover" cellspacing="0" width="100%">
                          
                        
                             
                          <tr>
                           
                            <td></td>
                           
                            <td><a href="#"></a> </td>
                            <td class="text-right"></td>
                            <td class="text-center">
                              <button class="btn btn-simple btn-success btn-icon linkpending" onclick="javascript::void(0)"><i class="fa fa-chain " title="Link invoice"  name="next"></i></button>
                            </td>

                          </tr>


                          </tbody>
                        </table>
                        <div class="container">
                          <table class="col-12">
                            <tr>
                              <td class="col-sm-8"></td>
                              <td class="text-right"><b>Total adjustment</b></td>
                              <td class="col-sm-1"></td>
                              <td><b> PRs <span class="total">0</span></b></td>
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
              <button type="submit" class="btn btn-round  btn-secondary ">Save</button>
            </div>
            <div class="">
                <button type="button" class="btn btn-danger btn-round" data-dismiss="modal" data-target="adjustfees">Cancel</button>
            </div>
          </div>
        </div>
     </form> 
  </div>
</div>

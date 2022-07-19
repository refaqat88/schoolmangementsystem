<div class="  col-md-12 card" id=''>
              <form id="RegisterValidation" action="#" method="">
                <div class="card">
                  <div class="card-header">
                    <div class="container-fluid bg-light p-4">

                      <div class='row d-flex flex-row'>

                        <div class='col-md-6 align-self-center text-center atop'>

                          <h5 class='top_heading' style='font-size:200%;'>{{ number_format($data['recieved'])}}-/Rupees</h5>
                          <h6 class='sub_heading'>TOTAL FEE COLLECTION</h6>

                        </div>

                        <div class='col-md-3 align-self-center text-center'>

                         <div class="row">
                           <div style="border-left: 1px solid blue;" class="col-md-6">
                            <h5 class='top_heading'>{{$data['total_bill']}}</h5>
                            <h6 class='sub_heading'>Total Bill</h6>
                            </div>
                            <div class="col-md-6">
                              <h5 class='top_heading'>{{$data['partial']}}</h5>
                              <h6 class='sub_heading'>Partail bill</h6>
                            </div>
                          </div>

                          <div class="row">

                            <div style="border-left: 1px solid blue;" class="col-md-6">
                              <h5 class='top_heading'>{{$data['openbill']}}</h5>
                              <h6 class='sub_heading'>unpaid bill</h6>
                            </div>

                            <div class="col-md-6">
                              <h5 class='top_heading'>{{$data['paid']}}</h5>
                              <h6 class='sub_heading'>paid Bill</h6>
                            </div>

                            </div>

                        </div>





                      </div>

                    </div>


                  </div>



                  <div class="container-fluid m-4">
                    <div class="row d-flex flex-row align-items-center">
                        <div class="col-md-4 d-flex flex-row ">
                            <h6 class='mt-2 sub_heading'>Class:</h6>
                            <h5 class='mx-2 top_heading'>{{$data['class']->class}}</h5>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <h6 class="mt-2 sub_heading">Fee Month:</h6>
                            <h5 class='mx-2 top_heading'>{{date('F')}}</h5>
                        </div>
                        <div class="col-md-4 d-flex flex-row">
                            <button class="pull-right btn btn-secondary btn-round btn-sm" onclick="printThis('classwiseStdFeeReport','<h3>Class Wise Monthly Report</h3>')"><i class="fa fa-print"></i></button>
                        </div>
                    </div>
                  </div>






                  <div class="card-body">
                    <div class="toolbar">
                      <div class="row">
                        <div class="form-group col-sm-2 select-wizard">
                          <select class="selectpicker" data-size="7"
                            data-style="btn btn-sm btn-outline-secondary btn-round" title="Filter">
                            <option value="1">All</option>
                            <option value="2">Paid</option>
                            <option value="3">Unpaid</option>

                          </select>
                        </div>
                        <!-- <div class="col-sm-10 float-right">
                          <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-print"
                              title="Print" data-toggle=""></i></button>
                          <button class="btn btn-simple btn-tumblr btn-icon float-right "><i
                              class="fa fa-file-excel-o" title="Export to Excel" data-toggle=""></i></button>
                        </div> -->
                      </div>

                    </div>
                    <table id="paystatementdatatable" class="table custom_border table-hover classwiseStdFeeReport" cellspacing="0"
                      width="100%">
                      <thead>
                        <tr>
                          <th>Std No</th>
                          <th>Student</th>
                         <!--  <th>Tution Fee</th>
                          <th>M.T.F</th>
                          <th>F.A.F</th>
                          <th>New Admission</th>
                          <th>F.C</th> -->
                          <th>Total</th>
                          <th>Status</th>
                          <th>Date</th>
                          <th>Reciever/Remarks</th>
                        </tr>
                      </thead>
                      <tbody id='individual_body'>

                      @if($data['transactions'])
                      @foreach($data['transactions'] as $transaction)
                      <tr>
                          <td>{{$transaction['id']}}</td>
                          <td>{{$transaction['student']}}</td>
                          <!-- <td>Tution Fee</td>
                          <td>M.T.F</td>
                          <td>F.A.F</td>
                          <td>New Admission</td>
                          <td>F.C</td> -->
                          <td>{{ number_format($transaction['total'])}}</td>
                          <td>{{ $transaction['status']}}</td>
                          <td>{{$transaction['date']}}</td>
                          <td>Reciever/Remarks</td>
                      </tr>
                      @endforeach
                      @endif
                      </tbody>
                      <tfoot>
                        <tr class="text-right">
                          <th colspan="5" style='border:none;'>TOTAL</th>
                          <th class='total' style='border:none;'>{{ number_format($data['total'])}}</th>
                        </tr>
                        <tr class="text-right" style='border: none;'>
                          <th colspan="5" style='border:none;'>Recieved</th>
                          <th class='total' style='border:none;'>{{ number_format($data['recieved'])}}</th>
                        </tr>
                        <tr class="text-right">
                          <th colspan="5" style='border:none;'>Balance Due</th>
                          <th class='total' style='border:none;'>{{ number_format($data['due'])}}</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </form>
            </div>

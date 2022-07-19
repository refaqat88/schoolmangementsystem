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
                                      <option value="1">Invoice</option>
                                      <option value="2">Payment</option>
                                      <option value="3">Adjustment</option>
                                  </select>
                              </div>
                              <!--        Here you can write extra buttons/actions for the toolbar              -->
                          </div>

                          <table id="transactionsdatatable"
                                 class="custom_border  table-hover  "
                                 cellspacing="0" width="100%">
                              <thead class="table-secondary">
                              <tr>
                                  <th>Date</th>
                                  <th>
                                      Type</th>
                                  <th>No.</th>
                                  <th>Pay period</th>
                                  <th class="text-right">Amount paid</th>
                                  <th class="text-right">Tot payable</th>
                                  <th>Status</th>
                                  <th class="disabled-sorting text-center">
                                      Actions</th>
                              </tr>
                              </thead>

                              <tbody>
                              
                              @if($transactions)
                                
                              @foreach($transactions as $transaction)
                              @php


                              $amountPaid =$transaction->cr_Amt-$transaction->bl_Amt;
                              

                              $payable = $transaction->cr_Amt-$transaction->dr_Amt;


                              if ($transaction->tr_Type==2&&$transaction->tr_Status=='Partial'){

                                 $payable= number_format($transaction->cr_Amt+$transaction->bl_Amt);
                                  $amountPaid = $transaction->cr_Amt ;
                              
                              }else if ($transaction->tr_Type==2&&$transaction->tr_Status=='Close'){
                                   
                                 $payable= $transaction->dr_Amt +$transaction->bl_Amt;
                                  $amountPaid = $transaction->dr_Amt ;
                              
                              } 
                              @endphp

                                <tr> 
                                    
                                    <td>{{date('d-m-Y' , strtotime($transaction->tr_Date))}}</td>
                                    
                                    <td>{{$transaction->Type($transaction->tr_Type) }}</td>
                                    
                                    <td>{{$transaction->tr_Id}}</td>

                                    <td>{{$transaction->schedule_pay?date('d-m-Y', strtotime($transaction->schedule_pay->issue_date)):'' }}  to {{$transaction->schedule_pay?date('d-m-Y',strtotime($transaction->schedule_pay->due_Date)):'' }}</td>
                                    
                                    <td class="text-right">&#8360 {{ number_format($amountPaid);}}</td>

                                    <td class="text-right">&#8360 {{$payable;}}</td>

                                    <td class="text-muted text-info font-weight-bold">{{$transaction->tr_Status}}</td>
                                    
                                    <td class="text-center">
                                        <div class=" ">
                                            <div class="dropdown">
                                                <button
                                                        class="dropdown-toggle btn btn-link  btn-sm "
                                                        type="button"
                                                        id="dropdownMenuButton"
                                                        data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Manage
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                     aria-labelledby="navbarDropdownMenuLink">
                                                    @php if ($transaction->tr_Type==1&&($transaction->tr_Status=='Partial' || $transaction->tr_Status=='Open')){
                                                   @endphp

                                                    <a class="makepayment dropdown-item" data-transaction="{{$transaction->tr_Id}}" data-id="{{$transaction->emp_Id}}"> Make payment</a>
                                                    
                                                    @php } @endphp
                                                    <a data-transaction="{{$transaction->tr_Id}}" class="dropdown-item paybillprint"
                                                        data-id="{{$transaction->emp_Id}}"
                                                       >Print</a>
                                                    
                                                    <a class="dropdown-item"
                                                       data-toggle="modal"
                                                       data-target="#editguardian">Send
                                                        reminder
                                                    </a>
                                                    @php if ($transaction->tr_Type==1&&($transaction->tr_Status=='Open')){ @endphp
                                                        <a class="dropdown-item  viewschedulepayroll" data-schedule="{{$transaction->schedule_id}}"  data-id="{{$transaction->std_Id}}"   data-transaction="{{$transaction->tr_Id}}"> Edit Bill</a>   
                                                    @php } @endphp

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                              @endforeach


                                @endif
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
                      <h6 class="card-title"> Employment Information</h6>
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
                                      <th>Personal No</th>
                                      <td>{{$emplolye->employeeInfo?($emplolye->employeeInfo->employmentInfo)?$emplolye->employeeInfo->employmentInfo->personal_No:'':''}}</td>
                                  </tr>
                                  <tr>
                                      <th>Hire Date</th>
                                      <td>{{$emplolye->employeeInfo?($emplolye->employeeInfo->employmentInfo)?$emplolye->employeeInfo->employmentInfo->appt_Date:'':''}}</td>
                                  </tr>
                                  <tr>
                                      <th>Adjustment Date</th>
                                      <td>{{$emplolye->employeeInfo?($emplolye->employeeInfo->employmentInfo)?$emplolye->employeeInfo->employmentInfo->adjust_Date:'':''}}</td>
                                  </tr>
                                  <tr>
                                      <th>Employment Status</th>
                                      <td>{{$emplolye->employeeInfo?($emplolye->employeeInfo->employmentInfo)?$emplolye->employeeInfo->employmentInfo->empt_Status:'':''}}</td>
                                  </tr>
                                  <tr>
                                      <th>Contract Type</th>
                                      <td>{{$emplolye->employeeInfo?($emplolye->employeeInfo->employmentInfo)?$emplolye->employeeInfo->employmentInfo->contract_Type:'':''}}</td>
                                  </tr>
                                  <tr>
                                      <th>Contract Duration</th>
                                      <td>{{$emplolye->employeeInfo?($emplolye->employeeInfo->employmentInfo)?$emplolye->employeeInfo->employmentInfo->contract_Duration:'':''}} (years)</td>
                                  </tr>
                                  <tr>
                                      <th>Employee Type  </th>
                                      <td>{{$emplolye->employeeInfo?($emplolye->employeeInfo->employmentType)?$emplolye->employeeInfo->employmentType->emp_Type:'':''}}</td>
                                  </tr>
                                  <tr>
                                      <th>Designation</th>
                                      <td>{{$emplolye->employeeInfo?($emplolye->employeeInfo->designation)?$emplolye->employeeInfo->designation->designation:'':''}} </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="card">
                  <div class="card-header">
                      <h6 class="card-title"> Billing Information</h6>
                  </div>
                  <div class="card-body table-full-width ">
                      <div class="table-condensed">
                          <table class="table border-bottom "   width="100%">
                              <thead>
                              <tr>
                                  <th class="w-50"></th>
                                  <th class="w-50"></th>
                              </tr>
                              </thead>
                              <tbody>
                                
                                  
                                  <tr>
                                      <th>Billing Rate</th>
                                      <td>&#8360; {{$schedulePay?number_format($schedulePay->working_hours):''}}</td>
                                  </tr>
                                   
                                  <tr>
                                      <th>Basic Pay</th>
                                      <td>&#8360; {{$schedulePay?number_format($schedulePay->basic_pay):''}}</td>
                                  </tr>
                                    
                                  <tr>
                                      <th>Gross Pay</th>
                                      <td>&#8360; {{$schedulePay?number_format($schedulePay->allowancesub):''}}</td>
                                  </tr>
                                  
                                  <tr style="border-bottom: 1px lightgray !important;">
                                      <th >Income Tax</th>

                                      @php
                                      $valincome=0;
                                      if($schedulePay){

                                        if($schedulePay->deductions){
                                           // dd($schedulePay->deductions);
                                            foreach($schedulePay->deductions as $key=>$vals){

                                                if($vals['title']=='Taxe'){
                                                    $valincome = $schedulePay->deductions[0]['taxe']['amount'];
                                                } 

                                            }

                                        }
                                      }

                                      @endphp
                                      <td class="text-warning">&#8360; {{ number_format($valincome)}}</td>
                                  </tr>

                                  <tr>
                                      <th>PF Contribution</th>
                                      <td class="text-warning">&#8360; 0</td>
                                  </tr>
                                  <tr>
                                      <th>Net Pay</th>
                                      <td class="text-muted text-info font-weight-bold">&#8360; {{$schedulePay?number_format($schedulePay->netamount):''}}</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="card">
                  <div class="card-header">
                      <h6 class="card-title">Pension Information</h6>
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
                                      <th>YTD PF Balance</th>
                                      <td>&#8360; 24,200</td>
                                  </tr>
                                  <tr>
                                      <th>YTD Gratuity Balance</th>
                                      <td>&#8360; 9,100</td>
                                  </tr>
                                  <tr>
                                      <th>YTD Total Balance</th>
                                      <td class="text-muted text-info font-weight-bold">&#8360; 33,300</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
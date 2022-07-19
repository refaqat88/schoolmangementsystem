  
  <div id="my-tab-content" class="tab-content ">
    <div class="tab-pane active" id="tottranstab" role="tabpanel" aria-expanded="true">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title">Transaction list</h6>
            </div>
            <div class="card-body">
              <div class="toolbar">
                <div class="form-group col-sm-2 select-wizard">
                  <select class="selectpicker" data-size="7" data-style="btn btn-sm btn-outline-secondary btn-round" title="Filter" >
                    <option value="1">Invoice</option>
                    <option value="2">Payment</option>
                    <option value="3">Adjustment</option>
                  </select>
                </div>
                <!--Here you can write extra buttons/actions for the toolbar-->
              </div> 
              <table id="transactionsdatatable" data-id="transactionsdatatable" class=" table-hover custom_border" cellspacing="0" width="100%">
                <thead class="table-secondary">
                <tr>
                  <th class="disabled-sorting">Date</th>
                  <th class="disabled-sorting">
                    Type</th>
                  <th>No.</th>
                  <th class="disabled-sorting">Due date</th>
                  <th class="text-right disabled-sorting">Balance due</th>
                  <th class="text-right disabled-sorting">Total</th>
                  <th class="disabled-sorting">Status</th>
                  <th class="disabled-sorting text-center">Actions</th>
                </tr>
                </thead>

                <tbody>

                @if($transactions)

                
                @foreach($transactions as $transaction)


                @php

                $fdate = $transaction->schedule->issue_date;
                $tdate = $transaction->schedule->due_Date;             
                $datetime1 = strtotime($fdate); 
                $datetime2 = strtotime($tdate); 
                $days = (int)(($datetime2 - $datetime1)/86400);  
              

                
                $Transactionsar = [];
                $today = date("Y-m-d");
                
                $Transactionsar['due_Date'] =date( 'Y-m-d' , strtotime($transaction->tr_Date));
                 
                $Transactionsar['due_Date']= strtotime("+".$days." day", strtotime($Transactionsar['due_Date']));

                $Transactionsar['due_Date'] =  date("d-m-Y", $Transactionsar['due_Date']);

                $currentDate = strtotime($today);

                $due  =strtotime($Transactionsar['due_Date']); 

                if ($transaction->tr_Type==2&&$transaction->tr_Status=='Close'){

                   $Transactionsar['amount']= $transaction->cr_Amt;
                   $Transactionsar['balance']= $transaction->bl_Amt ;
                              
                }else  if ($transaction->tr_Type==1){

                   $Transactionsar['balance']= $transaction->bl_Amt;
                   $Transactionsar['amount']= $transaction->dr_Amt ;
                              
                }
                else  if ($transaction->tr_Type==3){

                   $Transactionsar['balance']= $transaction->bl_Amt;
                   $Transactionsar['amount']= $transaction->cr_Amt ;
                              
                }

                 else{

                    $Transactionsar['amount'] =$transaction->schedule->fine_due_Date+$transaction->bl_Amt;

                    $Transactionsar['balance'] =$transaction->schedule->payable_after_due_date;
                }




                $total = $transaction->dr_Amt;


                @endphp
                <tr>
                  <td>{{date('d-m-Y' , strtotime($transaction->tr_Date))}}</td>
                  <td>{{$transaction->Type($transaction->tr_Type) }}</td>
                  <td>{{$transaction->tr_Id}}</td>
                  <td>

                    {{$Transactionsar['due_Date']}}</td>
                  <td class="text-right">&#8360 {{number_format($Transactionsar['balance']) }}</td>
                  <td class="text-right">&#8360 {{number_format($Transactionsar['amount'])}}</td>
                  <td class="text-muted text-success-cus font-weight-bold">{{$transaction->tr_Status}}</td>
                  <td class="text-center">
                    <div class=" ">
                      <div class="dropdown">
                        <button class="dropdown-toggle btn btn-link  btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Manage
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                          
                          @php if ($transaction->tr_Type==1&&($transaction->tr_Status=='Partial' || $transaction->tr_Status=='Open')){ @endphp
                          <a class="dropdown-item receivebill " data-transaction="{{$transaction->tr_Id}}" data-id="{{$transaction->std_Id}}"  >Receive payment</a>
                          
                          <a class="dropdown-item printFessBill" data-transaction="{{$transaction->tr_Id}}" data-id="{{$transaction->std_Id}}"  >Print</a>  
                          
                          <a class="dropdown-item adjust_fee" data-id="{{$transaction->std_Id}}"  data-transaction="{{$transaction->tr_Id}}"   >Void (Adjust)</a>                             
                          @php } @endphp

                           @php if ($transaction->tr_Type==1&&($transaction->tr_Status=='Open')){ @endphp
                            <a class="dropdown-item  viewschedulefee" data-schedule="{{$transaction->schedule_id}}"  data-id="{{$transaction->std_Id}}"   data-transaction="{{$transaction->tr_Id}}" >Edit Bill</a>   
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
   

    @include('accountPortal.partial.student_billinginfo')

</div>

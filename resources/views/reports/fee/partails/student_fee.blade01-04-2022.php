  <div class="hiden appear col-md-12 card" id='student_record'>
                <form id="RegisterValidation" action="#" method="">
                  <div class="container-fluid">

                    <h4 class='text-center'>{{$data['student']['name']}} Fee Record</h4>
                    <div class="col-md-12">


                      <table class="table table-bordered text-center">
  
                        <thead>
                          <th>MONTHS</th>
                           @if($data['Account_types_income'])
              
                          @foreach($data['Account_types_income'] as $valA)
                          <th>{{$valA->acc_Name}}</th>
                      
                          @endforeach
                          @endif 
                          <th>Total</th>
                          <th>Receipt No</th>
                          <th>Date</th>
                         <!--  <th>Cashier</th>
                          <th>Remarks</th> -->
                        </thead>

                        <tbody>
                         @php
                        $Months = config('constants.Months');
                        @endphp 
                        @if($Months)
                           
                        @foreach($Months as $key=>$val)  
                          
                          <tr>
                            <th>{{$val}}</th>
                            @if($data['Account_types_income'])
                            
                            @foreach($data['Account_types_income'] as $valA)
                            
                            <td>
                            
                            @php
                            if(isset($data['transactionslist'][$key][$valA->acc_Id])){
                               echo  number_format($data['transactionslist'][$key][$valA->acc_Id]['dr_Amt']);              
                            }
                            @endphp
                            </td>

                            @endforeach
                            @endif

                            
                            <td>@php
                            if(isset($data['transactionslist'][$key][$data['student']['id']]['dr_Amt'])){
                               echo  number_format($data['transactionslist'][$key][$data['student']['id']]['dr_Amt']);              
                            }
                            @endphp</td>
                            <td> 
                              @php 
                              if(isset($data['transactionslist'][$key][$data['student']['id']]['receipt_no'])){
                               echo  number_format($data['transactionslist'][$key][$data['student']['id']]['receipt_no']['tr_Id']);              
                              }
                              @endphp
                          </td>
                            <td>
                              @php 
                              if(isset($data['transactionslist'][$key][$data['student']['id']]['receipt_no'])){
                               echo  date('Y-m-d', strtotime($data['transactionslist'][$key][$data['student']['id']]['receipt_no']['tr_Date']));              
                              }
                              @endphp
                            </td>
                            <!-- <td>0.00</td>
                            <td>0.00</td> -->

                          </tr>

                        @endforeach
                        @endif

 

                        </tbody>
                      </table>




                    </div>


                  </div>


                </form>
              </div>

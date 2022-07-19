<div class="col-md-12 card" id='feeCard_table'>
    <form id="RegisterValidation" action="#" method="">
                 <div class="container-fluid">

                  @php
                  if($data['student']==''){
                    
                     echo '<div class="col-md-4">No Data</div>';
                     
                  }else{


                  @endphp
                   <h4 class='text-center'>{{$data['school']->school_Name}}</h4>

                   <div class="container mt-3 mb-3">
                     <div class="row mx-md-auto bor-sep">
                       <div class="col-md-6">
                         <label class='font-weight-bold' class='font-weight-bold'>Student Name: </label>
                         <span class='border-bottom mx-2'>{{$data['student']['name']}}</span>

                       </div>
                       <div class="col-md-6">
                         <label class='font-weight-bold'>Father Name: </label>
                         <span class='border-bottom mx-2'> @php
                            if($data['gardFather']){
                              echo $data['gardFather']['name'];
                            }
                            
                            @endphp</span>

                       </div>
                       <div class="col-md-6">
                         <label class='font-weight-bold'>Roll No: </label>
                         <span class='border-bottom mx-2'> @php
                         $roll_number = '';
                         if($data['student']->studentinfo){
                            
                            $roll_number = $data['student']->studentinfo->role_number;  
                             
                          }
                            

                         @endphp
                         {{$roll_number}}
                       </span>

                       </div>
                       <div class="col-md-6">
                         <label class='font-weight-bold'>Admission No: </label>
                         @php
                         $admission_number = '';
                         if($data['student']->studentinfo){
                            if($data['student']->studentinfo->admission){
                              $admission_number = $data['student']->studentinfo->admission->adm_Number;  
                            }
                          }
                            

                         @endphp
                         <span class='border-bottom mx-2'>{{$admission_number}}</span>

                       </div>



                       <div class="col-md-6">
                         <label class='font-weight-bold'>Class: </label>
                         <span class='border-bottom mx-2'>{{$data['class']->class}} @php
                                                                                    

                                                                                   $section = '';
                                                                                   if($data['student']->studentinfo){
                                                                                      if($data['student']->studentinfo->section){
                                                                                        $section = '('.$data['student']->studentinfo->section->class_section_name.')';  
                                                                                      }
                                                                                    }
                                                                                    echo $section;

                                                                                    @endphp</span>

                       </div>


                       <div class="col-md-6">
                         <label class='font-weight-bold'>Monthly Fee: </label>
                         <span class='border-bottom mx-2'> @php
                                                            $tution = '';
                                                            if(!empty($data['tutionarray'])){
                                                              $tution  = $data['tutionarray'];
                                                            }
                                                             
                                                            echo number_format($tution);
                                                            @endphp
                          </span>

                       </div>
                     </div>






                   </div>


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
                          <!--  <td>0.00</td>
                           <td>0.00</td> -->

                         </tr>
                          @endforeach
                          @endif

                       </tbody>
                     </table>




                   </div>

                   @php } @endphp


                 </div>
    </form>
</div>
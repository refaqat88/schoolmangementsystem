@php
$Months = config('constants.Months');
@endphp 
                          
<div class="col-md-12 card" id='fee_slip'>
   <form id="RegisterValidation" action="#" method="">
     <div class="container-fluid p-5">
       <div class="row">
        
        @php

        if($data['student']==''){
          echo '<div class="col-md-4">No Data</div>';
        }else{

        @endphp


        @php 
        $reciept =[0=>'Student' , 1=>"Bank" , 2=>"Bank"]
        @endphp
         @for($i=0;$i<=2;$i++)
         <div class="col-md-4">
           <div class="card card_size" style='border:1px solid black;'>
             <div class="card-header">
               <div class="col-md-12 text-center lh-1 mb-2">
                 <h6 class="fw-bold">Fee Slip</h6> <span class="fw-normal">Fee slip for the month of  <span
                     id='date' class="font-weight-bold">{{ substr($Months[$data['month']],0,3)}}</span></span>
               </div>
               <div class="row bor m-0 p-1">
                 <div class="col-sm-8 ">
                   <table class="table-no-bordered table-full-width   ">

                     <tbody style="line-height: 17px!important;">
                       <tr>
                         <th class="w-50">
                           <p class="font-weight-bold small ">Adm No.
                           </p>
                         </th>
                         <td class="w-50">
                           <p class="">@php
                                       $admission_number = '';
                                       if($data['student']->studentinfo){
                                          if($data['student']->studentinfo->admission){
                                            $admission_number = $data['student']->studentinfo->admission->adm_Number;  
                                          }
                                        }
                                        echo $admission_number;
                                        @endphp
                           </p>
                         </td>
                       </tr>
                       <tr>
                         <th>
                           <p class="font-weight-bold small ">Student Name:
                           </p>
                         </th>
                         <td>
                           <p class="">{{$data['student']['name']}}
                           </p>
                         </td>
                       </tr>
                       <tr>
                         <th>
                           <p class="font-weight-bold small ">Father Name:
                           </p>
                         </th>
                         <td>
                           <p class="">
                            @php
                            if($data['gardFather']){
                              echo $data['gardFather']['name'];
                            }
                            
                            @endphp
                           </p>
                         </td>
                       </tr>
                       <tr>
                         <th>
                           <p class="font-weight-bold small ">Class:
                           </p>
                         </th>
                         <td>
                           <p class="">{{$data['class']->class}} @php
                                                                                    

                                                                                   $section = '';
                                                                                   if($data['student']->studentinfo){
                                                                                      if($data['student']->studentinfo->section){
                                                                                        $section = '('.$data['student']->studentinfo->section->class_section_name.')';  
                                                                                      }
                                                                                    }
                                                                                    echo $section;

                                                                                    @endphp
                           </p>
                         </td>
                       </tr>
                     </tbody>

                   </table>
                 </div>


                 <div class="col-sm-4  col-lg-4  justify-content-end" style="font-size:80%">

                   <table class="  table-full-width">

                     <tbody class="w-100">
                       <tr>

                         <th>Issue Date</th>

                       </tr>
                       <tr>
                         <td>{{ date("Y/m/d",strtotime($data['Fee_schedule']['issue_date']))}}</td>
                       </tr>
                       <tr>
                         <th>Due Date</th>
                       </tr>
                       <tr>
                         <td>{{ date("Y/m/d",strtotime($data['Fee_schedule']['due_Date']))}}</td>
                       </tr>
                     </tbody>
                   </table>
                 </div>


               </div>
               <div class="card-body">
                 <h6 class="card-title">Fee Bill Detail</h6>


                 <table class="table table-bordered" style="line-height: 5px!important;">
                   <thead class="table-secondary">
                     <tr>
                       <th>Particulars</th>
                       <th class="text-right">Amount (in &#8360;)</th>

                     </tr>
                   </thead>



                   <tbody>
                     
                    @if($data['Account_types_income'])
                            
                    @foreach($data['Account_types_income'] as $valA)
 
                     <tr>
                       <th>{{$valA->acc_Name}}</th>
                       <td class="text-right">@php 
                                              if(isset($data['transactionslist'][$valA->acc_Id])){
                                                echo  number_format($data['transactionslist'][$valA->acc_Id]['dr_Amt']);              
                                              }
                                              @endphp
                                            </td>
                     </tr>
                    @endforeach
                    @endif


                     <tr>
                       <th>Payable within due date</th>
                       <td class="text-right">&#8360; {{ number_format($data['Fee_schedule']['payable_by_due_date'])}}</td>

                     </tr>
                     <tr>
                       <th>Payable after due date</th>
                       <td class="text-right"> &#8360; {{ number_format($data['Fee_schedule']['payable_after_due_date'])}} </td>

                     </tr>
                   </tbody>





                 </table>



               </div>
               <div class=" card-footer">
                 <h6 class="text-left font-weight-light ">Address: <span class='font-weight-bold'> {{$data['school']->domicile?$data['school']->domicile->dom_District:''}}  {{$data['school']->city?$data['school']->city->city_name:''}} {{$data['school']->school_Add?$data['school']->school_Add:''}} </span></h6>

                 <h6 class="text-left font-weight-light">Note: <span class='font-weight-bold'> This Challan
                     Form
                     vaild is valid up to 5 days after due date</span></h6>

                 <div class="d-flex flex-column float-right mt-3">
                   <h5>{{$reciept[$i]}} Copy</h5>
                   <h3>-------------</h3>
                 </div>
               </div>
             </div>



           </div>
         </div>
         @endfor

         @php }  @endphp
          
       </div>
     </div> 

   </form>
</div>

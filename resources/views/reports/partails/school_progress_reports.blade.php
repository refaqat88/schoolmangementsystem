<div class="hiden appear col-md-12" id='allSchool_progress_report'>          
         <div class="container-fluid card p-5">
            <h3 class='text-center m-0'>{{$school->school_Name}}</h3>
            <h5 class='text-center'>General List</h5>
            <div class="container mt-3 mb-3">
               <div class="row mx-md-auto">
                  <div class="col-md-4">
                     <b>Branch: </b>
                     <span class='border-bottom mx-2'></span>
                  </div>
                  <div class="col-md-4">
                     <b>Exam:</b>
                     <span class='border-bottom mx-2'>{{$data['exam']->exam_Name}}</span>
                  </div>
                  <div class="col-md-4">
                     <b>Date:</b>
                     <span class='border-bottom mx-2'>{{date('d/m/Y',strtotime($data['exam']->exam_Start))}} - {{date('d/m/Y',strtotime($data['exam']->exam_End))}}</span>
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <table class="table table-bordered text-center">
                  <thead>
                     <tr>
                        <th>Sr.No</th>
                        <th colspan='2'>Class</th>
                        <th>Total Students</th>
                        <th>Passed Students</th>
                        <th>Failed Students</th>
                        <th>Pass %</th>
                         
                     </tr>
                  </thead>
                  <tbody>
                     @php

                     $totalschool = 0;
                     $passschool = 0;
                     $failschool = 0;
                      
                     @endphp
                     
                     @if($data['classes'])
                     
                     @foreach($data['classes'] as $va)

                     @php


                     

                     @endphp


                     <tr>
                        <td>1</td>
                        <td colspan="2">{{$va['name']}}</td>
                        <td>{{sizeOf($va['student'])}}

                           @php

                           $totalschool = sizeOf($va['student'])+$totalschool;

                           @endphp
                           </td>
                        <td>@php
                           $countpass = 0;
                           if(isset($va['student'])){
                               
                              foreach($data['classes'][$va->cls_Id]['student'] as $valss){
                                
                                
                                 
                                 if(!empty($data['examSub'][$va->cls_Id][$valss->id]['grade']) and $data['examSub'][$va->cls_Id][$valss->id]['grade']!='F'){
                                 
                                    $countpass = $countpass+1;
                                    $passschool = $passschool+1;

                                 }

                              }
                           }

                           @endphp {{$countpass}}</td>
                        <td>@php
                           $countfail = 0;
                           if(isset($va['student'])){
                              foreach($data['classes'][$va->cls_Id]['student'] as $valss){
                                 if(isset($data['examSub'][$va->cls_Id][$valss->id]['grade']) and $data['examSub'][$va->cls_Id][$valss->id]['grade']=='F'){
                                    
                                    $countfail = $countfail+1;
                                    $failschool = $failschool+1;
                                 }

                              }
                           }

                           @endphp {{$countfail}}</td>
                        <td>
                           @php
                           $total = 0;
                           $passpercemt = 0;
                           if(isset($va['student'])){
                              $total = sizeOf($va['student']);
                              if ($total > 0){
                               $passpercemt = ($countpass/$total)*100;
                              }


                           }
                           @endphp

                        {{$passpercemt}}%</td>
                          
                     </tr>
                     @endforeach
                     @endif
                  </tbody>
               </table>
            </div>
            <div class="container mt-3 mb-3">
               <div class="row mx-md-auto d-flex justify-content-between">
                  <div class="col-md-3 border border-1 p-2">
                     <b class='font-weight-bold'>Total Students: </b>
                     <span class='border-bottom mx-2'>{{$totalschool}}</span>
                  </div>
                  <div class="col-md-3 border border-1 p-2">
                     <b class='font-weight-bold' class='font-weight-bold'>Passed Students: </b>
                     <span class='border-bottom mx-2'>{{$passschool}}</span>
                  </div>
                  <div class="col-md-3 border border-1 p-2">
                     <b class='font-weight-bold' class='font-weight-bold'>Failed Students: </b>
                     <span class='border-bottom mx-2'>{{$failschool}}</span>
                  </div>
                  <div class="col-md-2 border border-1 p-2">
                     <b class='font-weight-bold' class='font-weight-bold'>Pass %: </b>
                     <span class='border-bottom mx-2'>@php
                                                         $total = sizeOf($va['student']);
                                                          if ($total > 0){
                                                          $passpercemt = ($passschool/$totalschool)*100;
                                                         }


                                                      @endphp
                                                      {{$passpercemt}}
                                                   </span>
                  </div>
               </div>
               <div class="row mt-5 float-right">
                  <div class="col-md-3 d-flex flex-row">
                     <b class='font-weight-bold float-left'>Principal: </b>
                     <span>______________________</span>
                  </div>
               </div>
            </div>
         </div>    
      </div>
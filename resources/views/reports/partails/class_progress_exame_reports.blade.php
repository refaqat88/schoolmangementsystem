 <div class="hiden appear col-md-12" id='allClass_progress_report'>
         <div class="container-fluid card p-5">
             <div class="row text-center m-0">
             <div class="col-md-2"> <img src="{{ $school->photo()}}" alt="" width="120px" height="120px" style='border-style:none'>
             </div>

             <div class="col-md-10 mb-2">
               <h3 class='text-center font-weight-bolder mb-1' id="schName">{{$school->school_Name}}</h3>
               <h5 class='text-center' Class="school-add"> Class <span class="sch-district">Progress Report Card</span></h5>
            </div>
             </div>

            @if (!$data['datasheet']->isEmpty())
            <div class="container mt-3 mb-3">
               <div class="row mx-md-auto">
                  <div class="col-md-4">
                     <b>Class</b>
                     <span class='border-bottom mx-2'>{{$data['class']->class}}-{{$data['section']->class_section_name}}</span>
                  </div>
                  <div class="col-md-4">
                     <b>Exam:</b>
                     <span class='border-bottom mx-2'>{{$data['exam']->exam_Name}}</span>
                  </div>
                  <div class="col-md-4">
                     <b>Date:</b>
                     <span class='border-bottom mx-2'>{{$data['exam']->exam_Start . ' to '.$data['exam']->exam_End}}</span>
                  </div>
               </div>
            </div>
            <div class="col-md-12">

               <table class="table table-bordered text-center">
                  <thead>
                     <tr>
                        <th>Sr.No</th>
                        <th>Adm.No</th>
                        <th colspan='2'>Student Name</th>
                        <th colspan='2'>Father Name</th>
                        @if(isset($data['subjects']))




                        @foreach($data['subjects'] as $subject)



                           @if(isset($subject["name"]))
                              <th>{{ $subject["name"] }}</th>
                              @endif
                        @endforeach
                        @endif
                        <th>T.M</th>
                        <th>M.O</th>
                        <th>%</th>
                        <th>Position</th>
                     </tr>
                  </thead>
                  <tbody>
                  @php $i=1;
                   $failstundet = 0;
                   $passstundet = 0;
                   $studentarray=[];
                   $studentarraysort = [];

                   $stundetresult = [];
                  @endphp

                  @if (!$data['student']->isEmpty())


                  @foreach($data['student'] as $student)
                     @php

                     $stundetresult[$student->id] = $student;

                      $marks = 0;


                        $studentObtaim= 0;
                             @endphp


                     <tr>
                        <td>{{$i++}}</td>
                        <td>{{$student->studentinfo?$student->studentinfo->admission->adm_Number:''}}</td>
                        <td colspan='2'>{{$student->name}}</td>
                        <td colspan='2'>{{$student->studentinfo?$student->studentinfo->father($student->studentinfo->father_id)->name:''}}</td>

                        @if(isset($data['subjects']))
                        @php $position[] = ''; @endphp
                        @foreach($data['subjects'] as $subject)

                              @php


                                    if(isset($subject["marklese"]) and $subject["marklese"]!=0){
                                    $marks = $subject["marklese"]+$marks;





                                     }

                              @endphp

                           @if(isset($subject["id"]))
                           <td>

                           @php
                           if($data['studentmark'][$student->id][$subject["id"]]['marks']){
                              $studentObtaim =$data['studentmark'][$student->id][$subject["id"]]['marks']+$studentObtaim;
                              echo $data['studentmark'][$student->id][$subject["id"]]['marks'];
                           }else{
                              echo 'Not Marked';
                           }

                           @endphp



                           </td>
                        @endif
                                 @endforeach
                        @endif
                        <td>{{$marks}} </td>
                        <td>
                           {{$studentObtaim}}
                           @php

                              $studentarray[$student->id]=$studentObtaim;
                           @endphp
                        </td>
                        <td>
                           @php

                             if ($marks !=0 and $marks !='' and $studentObtaim !=0 and $studentObtaim !=''){
                              $percentage = ($studentObtaim / $marks) * 100;
                             }else{
                             $percentage = '';
                             }


                             if($percentage!='' and $percentage!=0){
                             $Percentagenumber = number_format($percentage, 2, '.', "");
                             echo $Percentagenumber." %";
                             }else{
                             echo "";
                             }

                           @endphp </td>

                        <td>

                          @foreach ($data['grade'] as $grade)
                           
                           @if($percentage >= $grade->grade_st_Per && $percentage <= $grade->grade_end_Per)

                              @php
                              if($grade->grade_Name=="F"){
                              $stundetresult[$student->id]['grade'] = 'F';   
                              $failstundet = $failstundet+1;
                              }else{
                              $passstundet = $passstundet+1;
                              $stundetresult[$student->id]['grade'] = 'P';

                              }
                              @endphp

                                 {{ $grade->comment}}


                           @endif
                           @endforeach



                        </td>
                     </tr>
                     @endforeach

                  @php

                     arsort($studentarray);
                     //dd($studentarray);

                     $first = [];
                     $second = [];
                     $thard = [];


                     $list = $data['student']->toArray();
                     $i=1;
                      
                     $i=1;
                     $newarrya = []; 
                     
                     if($studentarray){
                        foreach($studentarray as $vary){
                           $newarrya[]=$vary;
                        }
                     }
                   

                     $firsts =  max($studentarray);  
                      
                     if(sizeof($newarrya)>=2){ $seconds =$newarrya[sizeof($newarrya)-1]; }else{ $seconds=[];}
                     if(sizeof($newarrya)>=3){ $thirds =$newarrya[sizeof($newarrya)-2]; }else{ $thirds=[];}
                     


                     foreach ($studentarray as $key=>$studentarrays){

                           
                           if($studentarray[$key]!='' and $firsts==$studentarrays && $stundetresult[$key]['grade']=='P' ){
                              $first[$key]['id'] = $key;  
                              $first[$key]['name'] = $stundetresult[$key]->name;
                              $first[$key]['roll'] = $stundetresult[$key]->studentinfo->role_number;

                           }


                           if($studentarray[$key]!='' and $seconds==$studentarrays && $stundetresult[$key]['grade']=='P' ){
                              $second[$key]['id'] = $key;  
                              $second[$key]['name'] = $stundetresult[$key]->name;
                              $second[$key]['roll'] = $stundetresult[$key]->studentinfo->role_number;

                           }

                           if($studentarray[$key]!='' and $thirds==$studentarrays && $stundetresult[$key]['grade']=='P' ){

                              $thard[$key]['id'] = $key;  
                              $thard[$key]['name'] = $stundetresult[$key]->name;
                              $thard[$key]['roll'] = $stundetresult[$key]->studentinfo->role_number;

                           }

                           
                           $i++;
                           

                        }
                      
                     
                         


                  @endphp


                  @else

                     <tr>
                        <td colspan="9">No Student exists !</td>
                     </tr>

                     @endif
                  </tbody>
               </table>
            </div>
            <div class="container mt-3 mb-3">
               <div class="row mx-md-auto d-flex justify-content-between">
                  <div class="col-md-3 border border-1 p-2">
                     <b class='font-weight-bold'>Total Students: </b>
                     <span class='border-bottom mx-2'>{{sizeof($data['student'])}}</span>
                  </div>
                  <div class="col-md-3 border border-1 p-2">
                     <b class='font-weight-bold' class='font-weight-bold'>Passed Students: </b>
                     <span class='border-bottom mx-2'>{{$passstundet}}</span>
                  </div>
                  <div class="col-md-3 border border-1 p-2">
                     <b class='font-weight-bold' class='font-weight-bold'>Failed Students: </b>
                     <span class='border-bottom mx-2'>{{$failstundet}}</span>
                  </div>
                  <div class="col-md-2 border border-1 p-2">
                     <b class='font-weight-bold' class='font-weight-bold'>Pass %:
                     @php
                       
                        $val = 0;
                       if(isset($passstundet) and $passstundet>0){

                         $val= ($passstundet / sizeof($data['student']) * 100);

                              if($val!='' and $val!=0){
                              echo    number_format($val,2);
                              }else{
                              echo "1";
                              }


                       }
                        
                               
                     @endphp
                     </b>
                     <span class='border-bottom mx-2'></span>
                  </div>
               </div>
               <div class="row mx-md-auto mt-2 d-flex justify-content-between">
                  <div class="col-md-3 border border-1 p-2">

                     <b class='font-weight-bold float-left' style="min-width: 181px;">1st: @php  if(isset($first) and $first!=''){
                           $i=1;
                        foreach($first as $fkey=>$fval){

                            echo $fval['name']?$fval['name']:'';

                            if(sizeOf($first)!=$i){
                              echo ' and ';
                            }
                            $i++;
                        }

                       

                        } @endphp</b>
                     <span class='float-right'>
                        @php
                         if(isset($first) and $first!=''){
                           $i=1;
                        foreach($first as $fkey=>$fval){

                            echo $fval['roll']?$fval['roll']:'';

                            if(sizeOf($first) !=$i){
                              echo ' and ';
                            }
                            $i++;
                        }

                       

                        }  


                        @endphp
                     </span>
                     <b class='float-right'>Roll No:</b>

                  </div>


                  <div class="col-md-3 border border-1 p-2" >
                     <b class='font-weight-bold float-left' style="min-width: 186px;">2nd:@php  if(isset($second) and $second!=''){
                           $i=1;
                        foreach($second as $fkey=>$fval){

                            echo $fval['name']?$fval['name']:'';

                            if(sizeOf($second)!=$i){
                              echo ' and ';
                            }
                            $i++;
                        }

                       

                        } @endphp</b>

                         <span class='float-right'>
                        @php
                         if(isset($second) and $second!=''){
                           $i=1;
                        foreach($second as $fkey=>$fval){

                            echo $fval['roll']?$fval['roll']:'';

                            if(sizeOf($second) !=$i){
                              echo ' and ';
                            }
                            $i++;
                        }

                       

                        }  


                        @endphp
                     </span>

                     <b class='float-right'>Roll No: </b>
                  </div>

                  <div class="col-md-3 border border-1 p-2">
                     <b class='font-weight-bold float-left' style="min-width: 186px;" >3rd:@php  if(isset($thard) and $thard!=''){
                           $i=1;
                        foreach($thard as $fkey=>$fval){

                            echo $fval['name']?$fval['name']:'';

                            if(sizeOf($thard)!=$i){
                              echo ' and ';
                            }
                            $i++;
                        }

                       

                        } @endphp</b>
                     <span class='float-right'> 

                           @php  if(isset($thard) and $thard!=''){
                           $i=1;
                        foreach($thard as $fkey=>$fval){

                            echo $fval['roll']?$fval['roll']:'';

                            if(sizeOf($thard)!=$i){
                              echo ' and ';
                            }
                            $i++;
                        }

                       

                        } @endphp


                        </span>
                     <b class='float-right'>Roll No: </b>
                  </div>


                  
               </div>
               <div class="row mx-md-auto mt-2 d-flex justify-content-between">
                  <div class="col-md-4 border border-1 p-2">
                     <b class='float-left'>Class Teacher:</b>
                     <span class='float-right'></span>
                  </div>
                  <div class="col-md-4 border border-1 p-2">
                     <b class='font-weight-bold float-left'>Exam Controller:</b>
                     <span class='float-right'> </span>
                  </div>
                  <div class="col-md-3 border border-1 p-2">
                     <b class='font-weight-bold float-left'>Principal: </b>
                     <span class='float-right'></span>
                  </div>
               </div>
            </div>
            @else
               <div class="row ">
                  <div class="col-md-12"> No Date sheet for exam exists !
                  </div>
               </div>
            @endif


         </div>
      </div>
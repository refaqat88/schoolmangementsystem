<div class="hiden appear col-md-12" id='progress_report'>
   @if($data['student'] !='')
         <div class="container-fluid card p-5">
            <div class="col-md-12 mb-2">
               <h3 class='text-center font-weight-bolder mb-1' id="schName">{{$school->school_Name}}</h3>
               <h5 class='text-center' Class="school-add"> PROGRESS REPORT </h5>
            </div>
            <div class="row text-center m-0">
               <div class="col-md-4"> <img src="{{ $school->photo()}}" alt="" width="120px" height="120px" style='border-style:none'> </div>
               <div class="col-md-4">

               </div>
               <div class="col-md-4"> <img src="{{$data['student']->photo()}}" alt="" class='img-fluid' width="120px" height="120px" style='border-style:none;' id="std-image"> </div>
            </div>
               <div class="container mt-3 mb-3">
                  <div class="row mx-md-auto bor-sep">
                     <div class="col-md-6">
                        <label class='font-weight-bold' class='font-weight-bold'>Student Name:</label>
                        <span class='border-bottom mx-2'>{{$data['student']->name}}</span>
                     </div>
                     <div class="col-md-6">
                        <label class='font-weight-bold'>Father Name: </label>
                        <span class='border-bottom mx-2'>{{ $data['student']['father']->name}}</span>
                     </div>
                     <div class="col-md-6">
                       <label class='font-weight-bold'>Roll No: </label>
                        <span class='border-bottom mx-2'>{{$data['student']->studentInfo?$data['student']->studentInfo->role_number:''}}</span>
                     </div>
                     <div class="col-md-6">
                        <label class='font-weight-bold'>Admission No: </label>
                        <span class='border-bottom mx-2'>{{$data['student']->studentInfo->admission?$data['student']->studentInfo->admission->adm_Number:''}}</span>
                     </div>
                     <div class="col-md-6">
                        <label class='font-weight-bold'>Class: </label>
                        <span class='border-bottom mx-2'> {{$data['class']->class}} ({{$data['section']->class_section_name}})</span>
                     </div>
                     <div class="col-md-6">
                        <label class='font-weight-bold'>Session: </label>
                        <span class='border-bottom mx-2'>{{$data['student']->studentInfo->admission?$data['student']->studentInfo->admission->adm_Session:''}}</span>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">

                  <table class="table-bordered text-center">
                     <thead>

                        <tr>
                           <th colspan='2'>Subject</th>
                           @foreach($data['exam'] as $exam)
                           <th colspan='2'>{{$exam->exam_Name}}</th>
                           @endforeach
                        </tr>
                        @php $length = count($data['exam']);  @endphp
                        <tr style='font-size:80%;padding:2px;'>

                        <th colspan='2'></th>
                           @for($i=1; $i<=$length; $i++)


                              <th>Max Marks</th>
                              <th>Marks Obtain</th>
                              

                        @endfor
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                        @php
                           //dd($data['subjects']);
                         $totalmarks = 0;
                         $obtainmarks = 0;
                        $percentage = 0;
                        @endphp

                        @foreach($data['subjects'] as $val)

                           <tr>
                              <th colspan="2">{{$val->subject}}</th>


                              @foreach($data['exam'] as $exam)

                              <td>
                                 @php
                                  
                                 if(isset($data['subjectslist'][$val->sub_Id][$exam->top]['marks']))
                                 {
                                    echo $data['subjectslist'][$val->sub_Id][$exam->top]['marks'];
                                    $totalmarks = $data['subjectslist'][$val->sub_Id][$exam->top]['marks'] + $totalmarks;

                                 }else{
                                    echo '0';
                                 }

                                 @endphp

                              </td>
                              <td>@php

                                 if(isset($data['subjectslist'][$val->sub_Id][$exam->top]['markcount']))
                                 {
                                    echo $data['subjectslist'][$val->sub_Id][$exam->top]['markcount'];
                                    $obtainmarks = $data['subjectslist'][$val->sub_Id][$exam->top]['markcount'] + $obtainmarks;

                                 }else{
                                    echo '0';
                                 }

                                 @endphp</td>

                              @endforeach
                           </tr>


                        @endforeach

                        @php

                        $array = [  'total'=>'Total',
                                    'percentage'=>'Percentage',
                                    'grade'=>'Grade',
                                    ];

                        @endphp



                           @foreach($array as $valKey=>$valarr)


                              <tr>
                              <th colspan="2">{{$valarr}}</th>

                              @php
                              $j=1;
                              @endphp
                              @foreach($data['exam'] as $exam)




                                    @php





                                  echo '<td colspan="2">';
                                  if(isset($data[$exam->exam_Id][$valKey][2]) and $data[$exam->exam_Id][$valKey][2]!='')
                                 {
                                     echo $data[$exam->exam_Id][$valKey][2];

                                 }else{
                                    echo '0';
                                 }
                                 echo '</td>';
                                 

                                 @endphp
                                


                                 @php
                                 $j++;
                                         @endphp
                              @endforeach

                              </tr>

                           @endforeach





                        <tr>
                           <th colspan="2">Remark/Teacher Sign</th>
                           <td colspan="2"></td>
                           <td colspan="2"></td>
                        </tr>
                        <tr>
                           <th colspan="2">Date</th>
                           <td colspan="2"></td>
                           <td colspan="2"></td>
                        </tr>
                        <tr>
                           <th colspan="2">Principal</th>
                           <td colspan="2"></td>
                           <td colspan="2"></td>
                        </tr>
                        <tr>
                           <th colspan="2">Parents/Guardian</th>
                           <td colspan="2"></td>
                           <td colspan="2"></td>
                        </tr>


                     </tbody>
                  </table>

               </div>
         </div>
    @else
      <div class="container-fluid card p-5">
         <div class="col-md-12 mb-2">
            <h5 class='text-center' Class="school-add"> No Record Exist </h5>
         </div>
      </div>
   @endif
      </div>
     
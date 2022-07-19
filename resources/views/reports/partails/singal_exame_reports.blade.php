<div class="hiden appear col-md-12" id='single_Exam_report'>
       @if($data['subjects'])
         <div class="container-fluid card p-5">
            <div class="col-md-12 mb-2">
               <h3 class='text-center font-weight-bolder mb-1' id="schName">{{$school->school_Name}}</h3>
               <h5 class='text-center' Class="school-add"><span class="sch-district">Detail Marks Sheet</span></h5>
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
                     <label class='font-weight-bold' class='font-weight-bold'>Student Name:
                     </label>
                     <span class='border-bottom mx-2'>{{$data['student']->name}}</span>
                  </div>
                  <div class="col-md-6">
                     <label class='font-weight-bold'>Father Name: </label>
                     <span class='border-bottom mx-2'>
                        @if($data['student']['father'])
                           {{ $data['student']['father']->name}}
                        @endif
                        </span>
                  </div>
                  <div class="col-md-6">
                     <label class='font-weight-bold'>Roll No: </label>
                     <span class='border-bottom mx-2'>{{$data['student']->studentInfo?$data['student']->studentInfo->role_number:''}}</span>
                  </div>
                  <div class="col-md-6">
                     <label class='font-weight-bold'>Class: </label>
                     <span class='border-bottom mx-2'>{{$data['class']->class}} ({{$data['section']->class_section_name}})</span>
                  </div>
                  <div class="col-md-6">
                     <label class='font-weight-bold'> Exam: </label>
                     <span class='border-bottom mx-2'>{{$data['exam']->exam_Name}}</span>
                  </div>
                  <div class="col-md-6">
                     <label class='font-weight-bold'> Date: </label>
                     <span class='border-bottom mx-2'>{{ $data['exam']->exam_Start }}-{{ $data['exam']->exam_End }}
                        {{--{{$data['student']->studentInfo->admission?$data['student']->studentInfo->admission->adm_Session:''}}--}}
                     </span>
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <table class="table table-bordered text-center">
                  <thead>
                     <tr>
                        <th colspan='3'>Subject</th>
                        <th colspan='1'>Max Marks</th>
                        <th colspan='1'>Marks Obtain</th>
                     </tr>
                  </thead>


                  <tbody>

                  @foreach($data['subjects'] as $val)

                     <tr>
                        <th colspan="3">{{$val['name']}}</th>
                        <td>{{$val['marklese']}}</td>
                        <td>{{$val['obtainmarks']}}</td>

                     </tr>
                    @endforeach

                  </tbody>
               </table>
            </div>
            <div class='col-md-12'>
               <div class="row mx-md-auto mt-2 d-flex justify-content-between">
                  <div class="col-md-3 border border-1 p-2">
                     <b class='font-weight-bold float-left'>Grade: </b>
                     <span class='float-right'>{{$data['grade']}}</span>
                  </div>
                  <div class="col-md-3  p-2">
                     {{--<b class='font-weight-bold float-left'>Position: </b>
                     <span class='float-right'>12</span>--}}
                  </div>
                  <div class="col-md-3 border border-1 p-2">
                     <b class='font-weight-bold float-left'>Percentage: </b>
                     @php $Percentagenumber = number_format($data['percentage'], 2, '.', ""); @endphp
                     <span class='float-right'>{{$Percentagenumber}}%</span>
                  </div>
               </div>
               <div class="row mx-md-auto mt-5 d-flex justify-content-between">
                  <div class="col-md-4">
                     <b class='float-left'>Class Teacher:</b>
                     <span class='float-right'>______________</span>
                  </div>
                  <div class="col-md-4">
                     <b class='font-weight-bold float-left'>Parents:</b>
                     <span class='float-right'>______________</span>
                  </div>
                  <div class="col-md-3">
                     <b class='font-weight-bold float-left'>Principal: </b>
                     <span class='float-right'>______________</span>
                  </div>
               </div>
            </div>

         </div>

            @else
               <div class="row ">
                  <div class="col-md-12"> No Subject exist for this Exam !
                  </div>
               </div>
            @endif

      </div>
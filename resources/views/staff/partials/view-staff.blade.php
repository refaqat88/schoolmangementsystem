  
<div class="container-fluid">
    
    <div class="row text-center m-0">
        <div class="col-md-4"> <img src="{{ $school->photo()}}" alt="" width="120px" height="120px" style='border-style:none'> </div>
        <div class="col-md-4">
            <h3 class='text-center font-weight-bolder mb-1' id="schName">{{ $school ? $school->school_Name : ''}}</h3>
            <h5 class='text-center' Class="school-add"> {{ $school ? $school->domicile->dom_District : '' }} <span class="sch-district"></span></h5> 
        </div>
        <div class="col-md-4 pull-right"> 
            <img src="{{$employee_data->photo()}}" alt="" class='img-fluid' width="150px" height="350px" style='border-style:none;' id="std-image"> 
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-12 text-left">
            <h6>EMPLOYEE INFORMATION</h6> </div>
        <div class="row bor-sep col-md-12">
            <div class="col-md-4 flex-row d-inline-flex ">
                <p><b>Name:</b> </p>
                <p class="col-md-8 border-bottom" > {{ $employee_data->name}} </p>
            </div>
            <div class="col-md-3 flex-row d-inline-flex ">
                <p><b>DOB:</b> </p>
                <p class="col-md-8 border-bottom" > {{ $employee_data->employeeInfo ? $employee_data->employeeInfo->emp_Dob : '' }}</p>
            </div>
            <div class="col-md-3 flex-row d-inline-flex">
                <p><b>Blood Group:</b> </p>
                <p class="col-md-6 border-bottom" > {{ $employee_data->employeeInfo ? $employee_data->employeeInfo->bloodGroup->blood_group : '' }}</p>
            </div>
            <div class="col-md-3 flex-row d-inline-flex">
                <p><b>Nationality:</b> </p>
                <p class="col-md-8 border-bottom" > {{ $employee_data->employeeInfo ? $employee_data->employeeInfo->nationality->nationality : '' }}</p>
            </div>
          
            <div class="col-md-3 flex-row d-inline-flex">
                <p><b>Cast:</b> </p>
                 @php    
                     $cast= '';
                    if($employee_data->employeeInfo){
                       
                        if($employee_data->employeeInfo->cast){
                            $cast =$employee_data->employeeInfo->cast->cast;
                        } 
                    }

                    @endphp 


                <p class="col-md-8 border-bottom" > {{ $cast }} </p>
            </div>
            <div class="col-md-3 flex-row d-inline-flex">
                <p><b>Religion:</b>
                 @php    
                     $religion= '';
                    if($employee_data->employeeInfo){
                       
                        if($employee_data->employeeInfo->religion){
                            $religion =$employee_data->employeeInfo->religion->religion;
                        } 
                    }

                    @endphp 
                     </p>
                <p class="col-md-8 border-bottom" > {{ $religion }} </p>
            </div>
        </div>
    </div>
    <div class="row mt-5 mr-2">
        <div class="col-md-12 text-left">
            <h6>Mailing Address</h6> 
        </div>
        <div class="row bor-sep col-md-12">
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Street Address:</b> </p>
                <p class="col-md-8 border-bottom"> {{ $employee_data->employeeInfo ? $employee_data->employeeInfo->employeeContact->emp_mail_Add : ''}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex ">
                <p><b>Country:</b> </p>
                <p class="col-md-8 border-bottom"> {{ $employee_data->employeeInfo ? $employee_data->employeeInfo->country->country : '' }}</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>State:</b> </p>
                <p class="col-md-8 border-bottom"> {{ $employee_data->employeeInfo ? $employee_data->employeeInfo->state->state_name : '' }}</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Domicile:</b> </p>
                <p class="col-md-8 border-bottom" > 


                    @php    
                     $domicile= '';
                    if($employee_data->employeeInfo){
                       
                        if($employee_data->employeeInfo->domicile){
                            $domicile =$employee_data->employeeInfo->domicile->dom_District;
                        } 
                    }

                    @endphp 

                    {{ $domicile}}</p>
            </div>
            <div class="col-md-3 flex-row d-inline-flex">
                <p><b>City/Tehsil :</b> </p>
                <p class="col-md-8 border-bottom" > 

                    @php    
                       $city= '';
                    if($employee_data->employeeInfo){
                     
                        if($employee_data->employeeInfo->employeeContact->emp_City){
                            $city =$employee_data->employeeInfo->employeeContact->city->city_name;
                        } 
                    }
                    @endphp 

                    {{$city}}</p>
            </div>
            <div class="col-md-3 flex-row d-inline-flex">
                <p><b>Zipcode :</b> </p>
                <p class="col-md-8 border-bottom" >

                   @php  
                    $zip_Code= '';  
                    if($employee_data->employeeInfo){
                       
                        if($employee_data->employeeInfo->employeeContact){
                            $zip_Code =$employee_data->employeeInfo->employeeContact->zip_Code;
                        } 
                    }
                    @endphp 
                      

                 {{ $zip_Code }}</p>
            </div>
        </div>
    </div>

    <div class="row mt-5 mr-2">
        <div class="col-md-12 text-left">
            <h6>EMPLOYMENT DETAILS</h6> </div>
        <div class="row bor-sep col-md-12">
            <div class="col-md-4 flex-row d-inline-flex ">
                <p><b>Employment Status:</b> </p>
                <p class="col-md-8 border-bottom"> {{ $employee_data->employeeInfo ? $employee_data->employeeInfo->employmentInfo->empt_Status : ''}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex ">
                <p><b>Contract Type :</b> </p>
                <p class="col-md-8 border-bottom" > {{ $employee_data->employeeInfo ? $employee_data->employeeInfo->employmentInfo->contract_Type : '' }}</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Duration Of Contract :</b> </p>
                <p class="col-md-8 border-bottom" > {{ $employee_data->employeeInfo ? $employee_data->employeeInfo->employmentInfo->contract_Duration : '' }}</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Employee Type :</b> </p>
                <p class="col-md-8 border-bottom" >
                    @php  
                    $emp_Type= '';  
                    if($employee_data->employeeInfo){
                       
                        if($employee_data->employeeInfo->employmentType){
                            $emp_Type =$employee_data->employeeInfo->employmentType->emp_Type;
                        } 
                    }
                    @endphp 
                      
                           
                 {{ $emp_Type}}</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Designation:</b> </p>
                <p class="col-md-8 border-bottom" >
                    @php  
                    $designation= '';  
                    if($employee_data->employeeInfo){
                       
                        if($employee_data->employeeInfo->designation){
                            $designation =$employee_data->employeeInfo->designation->designation;
                        } 
                    }
                    @endphp 

                    {{$designation}}</p>
            </div>
        </div>
    </div>
    <div class="row mt-5 mr-2">
        <div class="col-md-12 text-left">
            <h6>Permanent Address</h6> 
        </div>
        <div class="row bor-sep col-md-12">
            <div class="col-md-12 flex-row d-inline-flex ">
                <p><b>Permanent Address:</b> </p>
                <p class="col-md-4 border-bottom"> 

                     @php  
                    $emp_pmt_Add= '';  
                    if($employee_data->employeeInfo){
                       
                        if($employee_data->employeeInfo->employeeContact){
                            $emp_pmt_Add =$employee_data->employeeInfo->employeeContact->emp_pmt_Add;
                        } 
                    }
                    @endphp 

                    {{ $emp_pmt_Add}} </p>
            </div>
        </div>
    </div>
    @php 
        $i = 1;
    @endphp
    <div class="row mt-1 mr-2">
        <div class="col-md-12 text-left">
            <h6>QUALIFICATION RECORD LIST:</h6> </div>
        <div class="row bor-sep col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Board/University</th>
                    <th scope="col">Session</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Grade</th>
                    <th scope="col">CGPA</th>
                    <th scope="col">File</th>
                  </tr>
                </thead>
                <tbody class="col-md-12">
                    @foreach ($employee_data->academic as $acedemicData)
                        @php //dd($acedemicData); @endphp
                        @if($acedemicData->type == 1)
                        <tr>
                            <td>{{ $i++}}</td>
                            <td>{{ $acedemicData? $acedemicData->title: '' }}</td>
                            <td>{{ $acedemicData->board? $acedemicData->board->board_Name: '' }}</td>
                            <td>{{ $acedemicData? $acedemicData->session: '' }}</td>
                            <td>{{ $acedemicData? $acedemicData->subject->subject: '' }}</td>
                            <td>{{ $acedemicData->grade  ? $acedemicData->grade->name: '' }}</td>
                            <td>{{ $acedemicData  ? $acedemicData->acdm_Gpa: '' }}</td>
                            <td><a href="{{asset('upload/user/degree/'.$acedemicData->degree_file)}}" target="_blank">{{$acedemicData->degree_file}}</a></td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>

    <div class="row mt-1 mr-2">
        <div class="col-md-12 text-left">
            <h6>POFESSIONAL RECORD LIST:</h6> </div>
        <div class="row bor-sep col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Board/University</th>
                    <th scope="col">Session</th>
                    <th scope="col">File</th>
                  </tr>
                </thead>
                <tbody class="col-md-12">
                @php
                    $j = 1;
                @endphp

                    @foreach ($employee_data->academic as $acedemicData)
                        @if($acedemicData->type == '2')
                            <tr>
                                <td>{{ $j++}}</td>
                                <td>{{ $acedemicData  ? $acedemicData->title : '' }}</td>
                                <td>{{ $acedemicData->board? $acedemicData->board->board_Name : '' }}</td>
                                <td>{{ $acedemicData  ? $acedemicData->session : '' }}</td>
                                <td><a href="{{asset('upload/user/degree/'. $acedemicData->degree_file)}}" target="_blank">{{$acedemicData->degree_file}}</a></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
    @php 
        $i = 1;
    @endphp
    <div class="row mt-1 mr-2">
        <div class="col-md-12 text-left">
            <h6>EXPERIENCE RECORD LIST:</h6> </div>
        <div class="row bor-sep col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Organisation</th>
                    <th scope="col">Position</th>
                    <th scope="col">Role</th>
                    <th scope="col">From Date</th>	
                    <th scope="col">To Date</th>
                    <th scope="col">File</th>
                  </tr>
                </thead>
                <tbody class="col-md-12">
                    @foreach ($employee_data->experiences as $empExperience)
                        <tr>
                            <td>{{ $i++}}</td>
                            <td>{{ $empExperience  ? $empExperience->prev_exper_Org : '' }}</td>
                            <td>{{ $empExperience  ? $empExperience->prev_exper_Position : '' }}</td>
                            <td>{{ $empExperience  ? $empExperience->prev_exper_Role : '' }}</td>
                            <td>{{ $empExperience  ? $empExperience->prev_Frmdate : '' }}</td>
                            <td>{{ $empExperience  ? $empExperience->prev_Todate : '' }}</td>
                            <td><a href="{{asset('upload/user/experience/'.$empExperience->exp_file)}}" target="_blank">{{$empExperience  ? $empExperience->exp_file: ''}}</a></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
    <div class="row mt-5 mr-2">
        <div class="col-md-12 text-left">
            <h6>Contact Information</h6> </div>
        <div class="row bor-sep col-md-12">
            <div class="col-md-4 flex-row d-inline-flex ">
                <p><b>Mobile No:</b> </p>
                <p class="col-md-8 border-bottom"> {{ $employee_data->employeeInfo ? $employee_data->employeeInfo->employeeContact->emp_mob_Ph : ''}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex ">
                <p><b>Home Phone#:</b> </p>
                <p class="col-md-8 border-bottom"> {{ $employee_data->employeeInfo ? $employee_data->employeeInfo->employeeContact->emp_home_Ph : ''}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex ">
                <p><b>Email Address:</b> </p>
                <p class="col-md-8 border-bottom"> {{ $employee_data->employeeInfo ? $employee_data->employeeInfo->employeeContact->emp_Email : ''}} </p>
            </div>
        </div>
    </div>

    {{-- @php
    $serialized_academic_array = $employee_data->employeeInfo?$employee_data->employeeInfo->academic:'';
    dd($serialized_academic_array);

    @endphp --}}



    <div class="row mt-5 mr-2">
        <div class="col-md-12 text-left">
            <h6>Emergency Contact Information</h6> 
        </div>
        <div class="row bor-sep col-md-12">
            <div class="col-md-4 flex-row d-inline-flex ">
                <p><b>Contact Name:</b> </p>
                <p class="col-md-8 border-bottom"> {{ $employee_data->employeeInfo ? $employee_data->employeeInfo->emergencyContact->emer_cont_Name : ''}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex ">
                <p><b>Contact Phone:</b> </p>
                <p class="col-md-8 border-bottom"> {{ $employee_data->employeeInfo ? $employee_data->employeeInfo->emergencyContact->emer_cont_No : ''}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex ">
                <p><b>Relation:</b> </p>
                <p class="col-md-8 border-bottom"> {{ $employee_data->employeeInfo ? $employee_data->employeeInfo->emergencyContact->relations->relation_Name : ''}} </p>
            </div>
        </div>
    </div>
</div>


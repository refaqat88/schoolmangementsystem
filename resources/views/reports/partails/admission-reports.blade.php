
<div class="container-fluid">
    <div class="col-md-12 mb-2">
        <h3 class='text-center font-weight-bolder mb-1' id="schName">{{$school->school_Name}}</h3>
        <h5 class='text-center' Class="school-add"> District <span class="sch-district">{{$school->domicile?$school->domicile->dom_District:''}}</span></h5>
    </div>
    <div class="row text-center m-0">
        <div class="col-md-4"> <img src="{{ $school->photo()}}" alt="" width="120px" height="120px" style='border-style:none'> </div>
        <div class="col-md-4">
            <h4 class="font-weight-bold">Admission Form</h4> </div>
        <div class="col-md-4"> <img src="{{$student->photo()}}" alt="" class='img-fluid' width="150px" height="350px" style='border-style:none;' id="std-image"> </div>
        <div class="col-md-4 mt-5 text-right">
            <p id="cls-Id"><b>Class:</b> {{$student->studentinfo?$student->studentinfo->class->class:''}}</p>
        </div>
        <div class="col-md-4">
            <p><b>Note: </b> Fill in with <b class="text-uppercase">Block</b> letters.</p>
        </div>
        <div class="col-md-4 mt-5 flex-row flex d-inline-flex">
            <p for="" class='mx-3 text-left font-weight-bold'>Shift:</p>
            <input type="checkbox" name="select_all" value="1" id="example-select-all">
            <label class="font-weight-normal mx-2">Morning</label>
            <input type="checkbox" name="select_all" value="1" id="example-select-all">
            <label class='font-weight-normal mx-2 '>Night</label>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-left">
            <h6>STUDENT INFORMATION</h6> </div>
        <div class="row bor-sep">
            <div class="col-md-4 flex-row d-inline-flex ">
                <p><b>Name:</b></p>
                <p class="col-md-8 border-bottom" id="std-name"> {{ $student->name}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex ">
                <p><b>Form B:</b> </p>
                <p class="col-md-8 border-bottom" id="std-name"> {{ $student->username}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex ">
                <p><b>DOB:</b> </p>
                <p class="col-md-8 border-bottom" id="std-dob"> {{$student->studentinfo?date('m-d-Y',strtotime($student->studentinfo->std_Dob)):''}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Age:</b> </p>
                <p class="col-md-8 border-bottom"> {{$student->studentinfo?$student->studentinfo->age():''}} (years) </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Blood Group:</b> </p>
                <p class="col-md-8 border-bottom" id="std-bldgroup">{{$student->studentinfo?$student->studentinfo->blood->blood_group:'' }} </p>
            </div>

            <div class="col-md-3 flex-row d-inline-flex">
                <p><b>Nationality:</b> </p>
                <p class="col-md-8 border-bottom" id="std-country"> {{$student->studentinfo?$student->studentinfo->nationality->nationality:'' }}</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Domicile:</b> </p>
                <p class="col-md-8 border-bottom" id="std-domicile">{{$student->studentinfo?$student->studentinfo->domicile->dom_District:'' }} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Cast:</b> </p>
                <p class="col-md-8 border-bottom" id="std-cast"> {{$student->studentinfo?$student->studentinfo->cast->cast:'' }}</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Disablity:</b> </p>
                <p class="col-md-8 border-bottom" id="std-disability">
                    {{$student->studentinfo?$student->studentinfo->disable->disable_status:'' }}
                    @php
                        $disba = $student->studentinfo?$student->studentinfo->disable->disable_status:'';
                        $disbas = $student->studentinfo?$student->studentinfo->stddisable:'';
                    @endphp
                    @if($disba=='Yes' and $disbas!='')

                        {{$disbas}}

                    @endif
                </p>
            </div>
            <div class="col-md-12 flex-row d-inline-flex">
                <p><b>Student Category:</b> </p>
                <p class="col-md-8 border-bottom" id="std-category"> {{$student->studentinfo?$student->studentinfo->studentCategory->student_category_name:'' }}</p>
            </div>
            <div class="col-md-12 flex-row d-inline-flex">
                <p><b>Address:</b> </p> <p class='font-weight-normal col-md-9 border-bottom' id="std-address">{{$student->studentinfo?$student->studentinfo->contact->pnt_mail_Add:''}}</p> </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-left">
            <h6>Father/Guardian INFORMATION</h6> </div>
        <div class="row bor-sep">
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Name:</b> </p>
                <p class="col-md-8 border-bottom" id="std-parent-name"> {{$father?$father->name:''}}</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Gender:</b> </p>
                <p class="col-md-8 border-bottom" id="std-parent-gender">{{$father?$father->guardianInfo->gender->gender:''}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>NIC No:</b> </p>
                <p class="col-md-8 border-bottom" id="std-nic">{{$father?$father->username:''}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Relation:</b> </p>
                <p class="col-md-6 border-bottom" id="std-relation">{{$father?$father->guardianInfo->relationship->relation_Name:''}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Occupation:</b> </p>
                @php

                    $occup_Name = '';
                    if($father){

                       if($father->guardianInfo){

                            if($father->guardianInfo->occupation){

                                $occup_Name = $father->guardianInfo->occupation->occup_Name;

                            }


                       }



                    }


                @endphp
                <p class="col-md-8 border-bottom" id="std-parent-occp"> {{$occup_Name}}</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Designation:</b> </p>
                @php

                    $designation = '';
                    if($father){

                       if($father->guardianInfo){

                            if($father->guardianInfo->designation){

                                $designation = $father->guardianInfo->designation->designation;

                            }


                       }



                    }


                @endphp

                <p class="col-md-8 border-bottom" id="std-parent-designation">{{$designation}}  </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Employer:</b> </p>

                @php

                    $prnt_employer_name = '';
                    if($father){

                       if($father->guardianInfo){



                             $prnt_employer_name = $father->guardianInfo->prnt_employer_name;




                       }



                    }


                @endphp

                <p class="col-md-8 border-bottom" id="std-parent-employer"> {{$prnt_employer_name}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Mobile No:</b> </p>
                @php

                    $pnt_home_Ph = '';
                    $pnt_mob_Ph = '';
                    $pnt_off_Ph = '';
                    $pnt_Email = '';
                    if($father){
                       if($student->studentinfo){

                            if($student->studentinfo->contact){
                                $pnt_home_Ph = $student->studentinfo->contact->pnt_home_Ph;
                                $pnt_mob_Ph = $student->studentinfo->contact->pnt_mob_Ph;
                                $pnt_off_Ph = $student->studentinfo->contact->pnt_off_Ph;
                                $pnt_Email = $student->studentinfo->contact->pnt_Email;
                            }


                       }



                    }


                @endphp

                <p class="col-md-8 border-bottom" id="std-mother-mobile-phone"> {{$pnt_mob_Ph}}</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Home PH:</b> </p>


                <p class="col-md-8 border-bottom" id="std-mother-home-phone">{{$pnt_home_Ph}}</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Office PH:</b> </p>


                <p class="col-md-8 border-bottom" id="std-mother-office-phone"> {{$pnt_off_Ph}}</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Email:</b> </p>




                <p class="col-md-8 border-bottom" id="std-prnt-email"> {{$pnt_Email}} </p>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-left">
            <h6>Mother INFORMATION</h6> </div>
        <div class="row bor-sep">
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Mother Name:</b> </p>
                <p class="col-md-8 border-bottom" id="std-mother-name"> {{$mother?$mother->name:''}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>NIC No:</b> </p>
                <p class="col-md-8 border-bottom" id="std-mother-nic"> {{$mother?$mother->username:''}}</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Marital Status:</b> </p>
                @php

                    $maritalStatus = '';
                    if($mother){

                       if($mother->guardianInfo){


                          if($mother->guardianInfo->pnt_marital_Status){

                              $maritalStatus = $mother->guardianInfo->pnt_marital_Status;

                          }




                       }



                    }


                @endphp

                <p class="col-md-6 border-bottom" id="std-mother-maritalstatus"> {{$maritalStatus}}</p>
            </div>

            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Occupation:</b> </p>

                @php

                    $occup_Name = '';
                    if($mother){

                       if($mother->guardianInfo){
                            if($mother->guardianInfo->occupation){

                                $occup_Name = $mother->guardianInfo->occupation->occup_Name;
                            }



                       }



                    }


                @endphp

                <p class="col-md-8 border-bottom" id="std-mother-occup">{{$occup_Name}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Designation:</b> </p>

                @php

                    $designationw = '';
                    if($mother){

                       if($mother->guardianInfo){
                            if($mother->guardianInfo->designation){

                                $designationw = $mother->guardianInfo->designation->designation;
                            }



                       }



                    }


                @endphp

                <p class="col-md-8 border-bottom" id="std-mother-desig">{{$designationw}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Employer:</b> </p>
                @php

                    $prnt_employer_name = '';
                    if($mother){

                       if($mother->guardianInfo){


                           $prnt_employer_name = $father->guardianInfo->prnt_employer_name;



                       }



                    }


                @endphp

                <p class="col-md-6 border-bottom" id="std-mother-employer">{{$prnt_employer_name}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Mobile No:</b> </p>
                @php

                    $mother_home_phone = '';
                    $mother_office_phone = '';
                    $mother_email = '';
                    $mother_mobile = '';
                    if($mother){
                       if($student->studentinfo){

                            if($student->studentinfo->contact){
                                $mother_home_phone = $student->studentinfo->contact->mother_home_phone;
                                $mother_office_phone = $student->studentinfo->contact->mother_office_phone;
                                $mother_mobile = $student->studentinfo->contact->mother_mobile;
                                $mother_email = $student->studentinfo->contact->mother_email;
                            }


                       }



                    }


                @endphp


                <p class="col-md-8 border-bottom" id="std-mother-mobile-phone"> {{$student->studentinfo?$student->studentinfo->contact->mother_mobile:''}}</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Home PH:</b> </p>


                <p class="col-md-8 border-bottom" id="std-mother-home-phone">{{$mother_home_phone}}</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Office PH:</b> </p>



                <p class="col-md-8 border-bottom" id="std-mother-office-phone"> {{$mother_office_phone}}</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Email:</b> </p>




                <p class="col-md-8 border-bottom" id="std-mother-email">{{$mother_email}} </p>
            </div>
        </div>
    </div>

    @if(!empty($lastSchool))

        <div class="row mt-5 ">
            <div class="col-lg-12 col-sm-12 text-left">
                <h6>PREVIOUS SCHOOL INFORMATION</h6> </div>
            <div class="bor-sep row w-100">
                <div class="col-md-4 flex-row d-inline-flex">
                    <p><b>School Name:</b> </p>
                    <p class="col-md-8 border-bottom" id="std-lastschool-name">{{$lastSchool->lsch_Name}} </p>
                </div>
                <div class="col-md-4 flex-row d-inline-flex">
                    <p><b>Contact No:</b> </p>
                    <p class="col-md-8 border-bottom" id="std-lastschool-cont-no"> {{$lastSchool->lsch_contact_No}}</p>
                </div>
                <div class="col-md-4 flex-row d-inline-flex">
                    <p><b>Leaving Date:</b> </p>
                    <p class="col-md-8 border-bottom" id="std-lastschool-dateofleave">{{date("d-m-Y",  strtotime($lastSchool->lsch_lv_Date))}} </p>
                </div>
                <div class="col-md-4 flex-row d-inline-flex">
                    <p><b>Class Passed:</b> </p>
                    <p class="col-md-8 border-bottom" id="std-class-passed"> {{$lastSchool->class?$lastSchool->class->class:''}}</p>
                </div>
            </div>
        </div>
    @endif
    <div class="row mt-5">
        <div class="col-md-12 text-left">
            <h6>Contact Information</h6>
        </div>
        <div class="row bor-sep col-md-12">
            <div class="col-sm-12 col-md-12 col-lg-12 flex-row d-inline-flex">
                <p class="font-weight-normal"><b>Mailing address:</b> </p>
                <p class="col-sm-12 col-md-9 col-lg-9 border-bottom">{{ $student->studentInfo ? $student->studentInfo->contact->pnt_mail_Add : ''}} </p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 flex-row d-inline-flex">
                <p class="font-weight-normal"><b>Permanent address:</b></p>
                <p class="col-sm-12 col-md-9 col-lg-9 border-bottom">{{ $student->studentInfo ? $student->studentInfo->contact->pnt_pmt_Add : ''}} </p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 flex-row d-inline-flex ">
                <p class="font-weight-normal"><b>District:</b> </p>
                <p class="col-sm-12 col-md-8 col-lg-8 border-bottom">{{ $student->studentInfo ? $student->studentInfo->contact->domicile->dom_District : ''}} </p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 flex-row d-inline-flex ">
                <p class="font-weight-normal"><b>City:</b> </p>
                <p class="col-sm-12 col-md-8 col-lg-8 border-bottom">{{ $student->studentInfo ? $student->studentInfo->contact->city->city_name : ''}} </p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 flex-row d-inline-flex ">
                <p class="font-weight-normal"><b>Zip:</b> </p>
                <p class="col-sm-12 col-md-8 col-lg-8 border-bottom">{{ $student->studentInfo ? $student->studentInfo->contact->zip_No : ''}} </p>
            </div>
        </div>
    </div>

    {{-- @php
    $serialized_academic_array = $employee_data->employeeInfo?$employee_data->employeeInfo->academic:'';
    dd($serialized_academic_array);

    @endphp --}}



    <div class="row mt-5">
        <div class="col-md-12 text-left">
            <h6>Emergency Contact Information</h6>
        </div>
        <div class="row bor-sep col-md-12">
            <div class="col-md-4 flex-row d-inline-flex ">
                <p class="font-weight-normal"><b>Name:</b> </p>
                <p class="col-md-8 border-bottom"> {{ $student->studentInfo ? $student->studentInfo->contact_emergency->emer_cont_Name : ''}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex ">
                <p class="font-weight-normal"><b>Phone:</b> </p>
                <p class="col-md-8 border-bottom"> {{ $student->studentInfo ? $student->studentInfo->contact_emergency->emer_cont_No : ''}} </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex ">
                <p class="font-weight-normal"><b>Relation:</b> </p>
                <p class="col-md-8 border-bottom"> {{ $student->studentInfo ? $student->studentInfo->contact_emergency->relations->relation_Name : ''}} </p>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-left">
            <h6>FOR OFFICE USE ONLY</h6> </div>
        <div class="row bor-sep">
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Admission No:</b> </p>
                <p class="col-md-8 border-bottom" id="std-add-no"> {{$student?$student->studentinfo->admission->adm_Number:''}}</p>
            </div>
            <div class="col-md-6 flex-row d-inline-flex">
                <p><b>Admission Date:</b> </p>
                <p class="col-md-6 border-bottom" id="adm-date">{{$student?$student->studentinfo->admission->adm_Date:''}}</p>
            </div>
            <div class="col-md-12">
                <label for="" class='font-weight-bold mx-2'> Mr./Ms: </label> <span class='font-weight-normal col-md-12 border-bottom' id="std-mr-name"> {{$student?$student->name:''}} </span>
                <label for="" class='font-weight-bold mx-2'>S/D/O: </label> <span class='font-weight-normal col-md-12 border-bottom' id="std-mr-fath">{{$father?$father->name:''}}  </span>
                <label for="" class='font-weight-bold mx-2'>is recomended for admission in </label> <span class='font-weight-normal col-md-12 border-bottom std-cls'>{{$student->studentinfo?$student->studentinfo->class->class:''}}  </span> </div>
            <div class="col-md-6 mt-5 text-center">
                <label for="" class='font-weight-bold mx-2'>Clerk's Signature </label> <span>____________________</span></div>
            <div class="col-md-6 mt-5 text-center">
                <label for="" class='font-weight-bold mx-2'>Director's Signature </label> <span>__________________</span> </div>
        </div>
    </div>
</div>


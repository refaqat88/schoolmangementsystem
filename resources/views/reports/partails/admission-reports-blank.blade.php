
<form id="RegisterValidation" action="#" method="" >
     

     <div class="container-fluid">
    <div class="col-md-12 mb-2">
        <h3 class='text-center font-weight-bolder mb-1' id="schName">{{$school->school_Name}}</h3>
        <h5 class='text-center' Class="school-add"> District <span class="sch-district">{{$school->domicile?$school->domicile->dom_District:''}}</span></h5>
    </div>
    <div class="row text-center m-0">
        <div class="col-md-4"> <img src="{{ $school->photo()}}" alt="" width="120px" height="120px" style='border-style:none'> </div>
        <div class="col-md-4">
            <h4 class="font-weight-bold">Admission Form</h4> </div>
        <div class="col-md-4"> <img src="{{asset('upload/user/no-image.png')}}" alt="" class='img-fluid' width="150px" height="350px" style='border-style:none;' id="std-image"> </div>
        <div class="col-md-4 mt-5 text-right">
            <p id="cls-Id"><b>Class:</b> </p>
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
                <p><b>Name:</b> </p>
                <p class="col-md-8 border-bottom" id="std-name">  </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex ">
                <p><b>Form B:</b> </p>
                <p class="col-md-8 border-bottom" id="std-form-b"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex ">
                <p><b>DOB:</b> </p>
                <p class="col-md-8 border-bottom" id="std-dob"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Age:</b></p>
                <p class="col-md-8 border-bottom">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(years)</p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Blood Group:</b> </p>
                <p class="col-md-8 border-bottom" id="std-bldgroup"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Nationality:</b> </p>
                <p class="col-md-8 border-bottom" id="std-country"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Domicile:</b> </p>
                <p class="col-md-8 border-bottom" id="std-domicile"> </p>
            </div>
            <div class="col-md-3 flex-row d-inline-flex">
                <p><b>Cast:</b> </p>
                <p class="col-md-8 border-bottom" id="std-cast"> </p>
            </div>
            <div class="col-md-3 flex-row d-inline-flex">
                <p><b>Disablity:</b> </p>
                <p class="col-md-8 border-bottom" id="std-disability">
                </p>
            </div>
            <div class="col-md-12 flex-row d-inline-flex">
                <p><b>Student Category:</b> </p>
                <p class="col-md-8 border-bottom" id="std-category"> </p>
            </div>
            <div class="col-md-12 flex-row d-inline-flex">
                <p><b>Address:</b> </p> <p class='font-weight-normal col-md-9 border-bottom' id="std-address"></p>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-left">
            <h6>Father/Guardian INFORMATION</h6> </div>
        <div class="row bor-sep">
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Name:</b> </p>
                <p class="col-md-8 border-bottom" id="std-parent-name"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Gender:</b> </p>
                <p class="col-md-8 border-bottom" id="std-parent-gender"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>NIC No:</b> </p>
                <p class="col-md-8 border-bottom" id="std-nic"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Relation:</b> </p>
                <p class="col-md-6 border-bottom" id="std-relation"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Occupation:</b> </p>
                <p class="col-md-8 border-bottom" id="std-parent-occp"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Designation:</b> </p>
                <p class="col-md-8 border-bottom" id="std-parent-designation"></p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Employer:</b> </p>
                <p class="col-md-8 border-bottom" id="std-parent-employer"> </p>
            </div>
             <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Mobile No:</b> </p>
                <p class="col-md-8 border-bottom" id="std-mother-mobile-phone"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Home PH:</b> </p>
                <p class="col-md-8 border-bottom" id="std-mother-home-phone"></p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Office PH:</b> </p>
                <p class="col-md-8 border-bottom" id="std-mother-office-phone"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Email:</b> </p>
                <p class="col-md-8 border-bottom" id="std-prnt-email">  </p>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-left">
            <h6>Mother INFORMATION</h6> </div>
        <div class="row bor-sep">
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Mother Name:</b> </p>
                <p class="col-md-8 border-bottom" id="std-mother-name"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>NIC No:</b> </p>
                <p class="col-md-8 border-bottom" id="std-mother-nic"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Marital Status:</b> </p>
                <p class="col-md-6 border-bottom" id="std-mother-maritalstatus"> </p>
            </div>
             
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Occupation:</b> </p>
                <p class="col-md-8 border-bottom" id="std-mother-occup"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Designation:</b> </p>
                <p class="col-md-8 border-bottom" id="std-mother-desig"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Employer:</b> </p>
                <p class="col-md-6 border-bottom" id="std-mother-employer"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Mobile No:</b> </p>
                <p class="col-md-8 border-bottom" id="std-mother-mobile-phone"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Home PH:</b> </p>
                <p class="col-md-8 border-bottom" id="std-mother-home-phone"></p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Office PH:</b> </p>
                <p class="col-md-8 border-bottom" id="std-mother-office-phone"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Email:</b> </p>
                <p class="col-md-8 border-bottom" id="std-mother-email"> </p>
            </div>
        </div>
    </div>



    <div class="row mt-5 ">
        <div class="col-lg-12 col-sm-12 text-left">
            <h6>PREVIOUS SCHOOL INFORMATION</h6> </div>
        <div class="bor-sep row w-100">
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>School Name:</b> </p>
                <p class="col-md-8 border-bottom" id="std-lastschool-name"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Contact No:</b> </p>
                <p class="col-md-8 border-bottom" id="std-lastschool-cont-no"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Leaving Date:</b> </p>
                <p class="col-md-8 border-bottom" id="std-lastschool-dateofleave"> </p>
            </div>
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Class Passed:</b> </p>
                <p class="col-md-8 border-bottom" id="std-class-passed"> </p>
            </div>
        </div>
    </div>

    <div class="row mt-5">
             <div class="col-md-12 text-left">
                 <h6>Contact Information</h6> </div>
             <div class="row bor-sep w-100">
                 <div class="col-sm-12 col-md-12 col-lg-12 flex-row d-inline-flex">
                     <p class="font-weight-normal"><b>Mailing address:</b> </p>
                     <p class="col-sm-12 col-md-9 col-lg-9 border-bottom"> </p>
                 </div>
                 <div class="col-sm-12 col-md-12 col-lg-12 flex-row d-inline-flex">
                     <p class="font-weight-normal"><b>Permanent address:</b></p>
                     <p class="col-sm-12 col-md-9 col-lg-9 border-bottom"> </p>
                 </div>
                 <div class="col-sm-12 col-md-4 col-lg-4 flex-row d-inline-flex ">
                     <p class="font-weight-normal"><b>District:</b> </p>
                     <p class="col-sm-12 col-md-8 col-lg-8 border-bottom"> </p>
                 </div>
                 <div class="col-sm-12 col-md-4 col-lg-4 flex-row d-inline-flex ">
                     <p class="font-weight-normal"><b>City:</b> </p>
                     <p class="col-sm-12 col-md-8 col-lg-8 border-bottom"> </p>
                 </div>
                 <div class="col-sm-12 col-md-4 col-lg-4 flex-row d-inline-flex ">
                     <p class="font-weight-normal"><b>Zip:</b> </p>
                     <p class="col-sm-12 col-md-8 col-lg-8 border-bottom"> </p>
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
         <div class="row bor-sep w-100">
             <div class="col-md-4 flex-row d-inline-flex ">
                 <p class="font-weight-normal"><b>Name:</b> </p>
                 <p class="col-md-8 border-bottom">  </p>
             </div>
             <div class="col-md-4 flex-row d-inline-flex ">
                 <p class="font-weight-normal"><b>Phone:</b> </p>
                 <p class="col-md-8 border-bottom"> </p>
             </div>
             <div class="col-md-4 flex-row d-inline-flex ">
                 <p class="font-weight-normal"><b>Relation:</b> </p>
                 <p class="col-md-8 border-bottom">  </p>
             </div>
         </div>
     </div>
    <div class="row mt-5">
        <div class="col-md-12 text-left">
            <h6>FOR OFFICE USE ONLY</h6> </div>
        <div class="row bor-sep w-100">
            <div class="col-md-4 flex-row d-inline-flex">
                <p><b>Admission No:</b> </p>
                <p class="col-md-8 border-bottom" id="std-add-no"> </p>
            </div>
            <div class="col-md-6 flex-row d-inline-flex">
                <p><b>Admission Date:</b> </p>
                <p class="col-md-6 border-bottom" id="adm-date"></p>
            </div>
            <div class="col-md-12">
                <label for="" class='font-weight-bold mx-2'> Mr./Ms: </label> <span class='font-weight-normal col-md-12 border-bottom' id="std-mr-name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </span>
                <label for="" class='font-weight-bold mx-2'>S/D/O: </label> <span class='font-weight-normal col-md-12 border-bottom' id="std-mr-fath">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </span>
                <label for="" class='font-weight-bold mx-2'>is recomended for admission in </label> <span class='font-weight-normal col-md-12 border-bottom std-cls'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </span>
            </div>
            <div class="col-md-6 mt-5 text-center">
                <label for="" class='font-weight-bold mx-2'>Clerk's Signature </label> <span>____________________</span></div>
            <div class="col-md-6 mt-5 text-center">
                <label for="" class='font-weight-bold mx-2'>Director's Signature </label> <span>__________________</span> </div>
        </div>
    </div>
</div>


   </form>
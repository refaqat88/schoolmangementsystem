@extends('layouts.master')
@section('title', 'Admission')
@section('content')
    <style>
        .error{color:red !important;}
        .add-div-error{color:red !important;}
        .add-mother-div-error{color:red !important;}
    </style>
    <div class="content">

        <div class="col-md-12 mr-auto ml-auto">
            <!--      Wizard container        -->
            <div class="wizard-container wizard-cus">
                <div class="card card-wizard" data-color="primary" id="wizardProfile">
                    <form id="admission-form" action="#" method="" enctype="multipart/form-data">
                        <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                        <div class="card-header text-center">
                            <h4 class="card-title">
                                Add New Student
                            </h4>
                            <div class="wizard-navigation">
                                <ul>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#admit" data-toggle="tab" role="tab" aria-controls="admit" aria-selected="true">
                                            <i class="fa fa-wpforms"></i>
                                            <span class="text-hide-cus">Admission Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#stdinfo" data-toggle="tab" role="tab" aria-controls="stdinfo" aria-selected="true">
                                            <i class="fa fa-info"></i>
                                            <span class="text-hide-cus">Basic Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#pntinfo" data-toggle="tab" role="tab" aria-controls="pntinfo" aria-selected="true">
                                            <i class="fa fa-user-md"></i>
                                            <span class="text-hide-cus">Parent Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#stdacdm" data-toggle="tab" role="tab" aria-controls="stdacdm" aria-selected="true">
                                            <i class="fa fa-university"></i>
                                            <span class="text-hide-cus">Academics Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#pntcontact" data-toggle="tab" role="tab" aria-controls="pntcontact" aria-selected="true">
                                            <i class="fa fa-address-book-o"></i>
                                            <span class="text-hide-cus">Contact Info</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger" id="success-message" style="display: none">

                            </div>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="admit">
  
                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Admission Information</h6>
                                        <div class="form-group col-sm-3">
                                            <label>Admission No</label>
                                            <input type="text" class="form-control" placeholder="" value="{{$admission_no}}" name="adm_Number"  readonly="true">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Date</label>
                                            <input type="text" class="form-control datepicker" value="" placeholder="" name="adm_Date" id="adm_Date" >

                                            

                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Session</label>
                                            <input type="text" class="form-control" placeholder="" name="adm_Session" id="adm_Session">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Registration No</label>
                                            <input type="text" class="form-control" placeholder="" name="reg_no">
                                            
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Nadra B.Form No</label>
                                            <input type="text" class="form-control" placeholder="" id="student-b-form" name="nadra_b"  number="true">
                                            <div id="uname_response" ></div>
                                            <div class="add-div-error nadra_b"></div>
                                        </div>
                                        <div class="col-sm-3 select-wizard">
                                            <label class="col-sm-12">Class</label>
                                            <select class="selectpicker" id="class" name="cls_Id" data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select class" data-live-search="true"  data-hide-disabled="true">
                                                <option value="" disabled selected>Applied For Class</option>
                                                @foreach($classes as $class)
                                                    <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-check pull-left">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="status" value="Active">
                                            <span class="form-check-sign"></span>
                                            Check if Student is inactive
                                        </label>
                                    </div>
                                 
                                </div>
                                <div class="tab-pane" id="stdinfo">
                                    <div class="row bor-sep">

                                        <div class="col-sm-3">
                                            <div class="col-sm-12 text-center">
                                                <h6 class="">Student Information</h6>
                                            </div><br>
                                            <div class="col-sm-12">
                                                <div class="picture-container">
                                                    <div class="picture">
                                                        <img src="{{asset('adminassets/img/default-avatar.png')}}" class="picture-src" id="wizardPicturePreview" title="" />
                                                        <input type="file" name="user_image" id="wizard-picture">
                                                    </div>
                                                    <label class="">Choose Pupil Picture</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="row">

                                                <div class="form-group col-sm-8">
                                                    <label>Full Name</label>
                                                    <input type="text" class="form-control" placeholder="" name="name" >
                                                </div>
                                                
                                                <div class="col-sm-4 select-wizard" >
                                                    <label>Gender</label>
                                                    <select class="selectpicker" name="gnd_Id" data-size="3" data-style="btn btn-secondary btn-round" title="Select Gender" >
                                                        <option value="" disabled selected>Select Gender</option>
                                                        @foreach($genders as $gender)
                                                            <option value="{{$gender->gnd_Id}}">{{$gender->gender}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Date of Birth</label>
                                                    <input type="text" class="form-control datepicker" onchange="calculateAge();" id="std-date-of-birth" placeholder="" name="std_Dob" >
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Age</label>
                                                    <input type="text" class="form-control" placeholder="" id="std-age" name="std_Age" number="true" readonly="true">
                                                </div>
                                                <div class="col-sm-4 select-wizard">
                                                    <label>Blood Group</label>
                                                    <select class="selectpicker" id="bgroup" name="bg_Id" data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select bloodgroup" data-live-search="true"  data-hide-disabled="true">
                                                        <option value="" disabled selected>Select bloodgroup</option>
                                                        @foreach($bloodgroups as $bgroup)
                                                            <option value="{{$bgroup->bg_Id}}">{{$bgroup->blood_group}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Religion</label>
                                                    <select class="selectpicker" id="relig_Id" name="relig_Id" data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select bloodgroup" data-live-search="true"  data-hide-disabled="true">
                                                        <option value="" disabled selected>Select religion</option>
                                                        @foreach($religions as $religion)
                                                            <option value="{{$religion->relig_Id}}">{{$religion->religion}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-sm-4 select-wizard">
                                                    <label class="col-sm-12">Nationality</label>
                                                    <select  class="selectpicker " data-size="3" name="nation_Id" id="nationality" data-style="btn btn-secondary btn-round" data-container="" data-live-search="true" title="Select Nationality" data-hide-disabled="true"  data-virtual-scroll="false">
                                                        <option value="" disabled>Choose Nationality</option>
                                                        @foreach($nationalities as $nationality)
                                                            <option value="{{$nationality->nation_Id}}">{{$nationality->nationality}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Domicile</label>
                                                    <select class="selectpicker" name="dom_Id"    id="dom" data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select domicile" data-live-search="true"  data-hide-disabled="true">
                                                        <option value="" disabled selected>Select domicile</option>
                                                        @foreach($districts as $district)
                                                            <option value="{{$district->dom_Id}}">{{$district->dom_District}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 select-wizard">
                                                    <label class="col-sm-12">Cast</label>
                                                    <select class="selectpicker " data-size="3" id="cast" name="cast_Id" data-style="btn btn-secondary btn-round" data-container="" data-live-search="true" title="Select Cast" data-hide-disabled="true"  data-virtual-scroll="false">
                                                        <option value="" disabled>Choose Cast</option>
                                                        @foreach($casts as $cast)
                                                            <option value="{{$cast->cast_Id}}">{{$cast->cast}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>Student Category</label>
                                                    <select class="selectpicker" data-size="3" name="std_cat_Id" data-style="btn btn-secondary btn-round" title="Select Category">
                                                        <option value="" disabled selected>Select Category</option>
                                                        @foreach($student_categories as $student_category)
                                                            <option value="{{$student_category->std_cat_Id}}">{{$student_category->student_category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label>Select If Disable</label>
                                                    <select class="selectpicker disability-dropdown" name="disable_Id"  data-size="3" data-style="btn btn-secondary btn-round" title="Select If Disable" >
                                                        <option value="" disabled selected>Please Select</option>
                                                        @foreach($disabilities as $disability)
                                                            <option value="{{$disability->disable_Id}}">{{$disability->disable_status}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Disability</label>
                                                    <input type="text" class="form-control" id="disability-input" placeholder="Enter disability" name="stddisable">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="pntinfo">
                                    <div class="row bor-sep">
                                        <div class="col-sm-3">
                                            <div class="col-sm-12 text-center">
                                                <h6 class="">Guardian Information</h6>
                                            </div><br>
                                            <div class="col-sm-12">
                                                <div class="picture-container">

                                                    <div class="picture">
                                                        <img src="{{asset('adminassets/img/default-avatar.png')}}" class="picture-src" id="grdPicturePreview" title="" />
                                                    </div>
                                                    <label class="">Guardian Picture</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="select-wizard form-group " >
                                                <label class="col-sm-12">Guardian</label>
                                                <select class="selectpicker col-sm-12 guardian-dropdown" name="guardian" id="guardian-dropdown" data-size="3" data-style="btn btn-round btn-secondary" title="Select Guardian" data-live-search="true" >
                                                    <option value="" disabled selected>Select Guardian</option>
                                                    @foreach($gardains as $guardian)
                                                        @if($guardian->guardianInfo->gender->gender=='Male')
                                                            <option value="{{$guardian->id}}" data-name="{{$guardian->name}}"

                                                                    data-name="{{$guardian->name}}"
                                                                    data-phone="{{$guardian->phone}}"
                                                                    data-email="{{$guardian->email}}"

                                                                    data-photo="{{$guardian->photo()}}"
                                                                    data-pnt_home_Ph="{{$guardian->guardianInfo?$guardian->guardianInfo->pnt_home_Ph:''}}"
                                                                    data-pnt_off_Ph="{{$guardian->guardianInfo?$guardian->guardianInfo->pnt_off_Ph:''}}"

                                                                    >{{$guardian->name}}</option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="col-sm-12 pull-right">
                                                <br>
                                                <button class="btn btn-round btn-outline-choice pull-right" data-toggle="modal" id="show-guardian-modal-btn">
                                                    Add Guardian
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="col-sm-12 text-center">
                                                <h6 class="">Mother Information</h6>
                                            </div><br>
                                            <div class="col-sm-12">
                                                <div class="picture-container">
                                                    <div class="picture">
                                                        <img src="{{asset('adminassets/img/default-avatar.png')}}" class="picture-src" id="grdMotherPreview" title="" />
                                                    </div>
                                                    <label class="">Mother Picture</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="select-wizard form-group " >
                                                <label class="col-sm-12">Mother</label>
                                                <div class="guardian-father-div"></div>
                                                <select class="selectpicker col-sm-12" id="guardian-mother-dropdown" name="mother" data-container="" data-size="3" data-style="btn btn-secondary" title="Select Mother" data-live-search="true"  data-hide-disabled="true">
                                                    <option value="" disabled selected>Select Mother</option>
                                                    @foreach($gardains as $guardian)
                                                        @if($guardian->guardianInfo->gender->gender=='Female')
                                                            <option value="{{$guardian->id}}" data-name="{{$guardian->name}}"

                                                                    data-name="{{$guardian->name}}"
                                                                    data-phone="{{$guardian->phone}}"
                                                                    data-email="{{$guardian->email}}"

                                                                    data-photo="{{$guardian->photo()}}"
                                                                    data-pnt_home_Ph="{{$guardian->guardianInfo?$guardian->guardianInfo->pnt_home_Ph:''}}"
                                                                    data-pnt_off_Ph="{{$guardian->guardianInfo?$guardian->guardianInfo->pnt_off_Ph:''}}">{{$guardian->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-sm-12 pull-right">
                                                <br>
                                                <button class="btn btn-round btn-outline-choice pull-right" data-toggle="modal" id="mymother-modal-btn">
                                                    Add Mother
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="stdacdm">

                                    <div class="row bor-sep">
                                        <div class="col-sm-12 form-group form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" id="previous_shcool_check" name="last_school_checked" value="1">
                                                <span class="form-check-sign"></span>
                                                Check if no previous school info
                                            </label>
                                        </div>

                                        <h6 class="col-sm-12">Previous School Information</h6>
                                        <div class="form-group col-sm-3">
                                            <label>Prevouse School Name</label>
                                            <input type="text" class="form-control previous-school-disabled" placeholder="" name="lsch_Name" >
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Previous School Contact No</label>
                                            <input type="text" class="form-control previous-school-disabled" placeholder="" name="lsch_contact_No" number="true">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Date of Leaving</label>
                                            <input type="text" class="form-control previous-school-disabled datepicker" placeholder="" name="lsch_lv_Date" >
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label>Select Class Passed</label>
                                            <select class="selectpicker previous-school-disabled" id="previous_school_class_passed" name="lsch_class_Passed" data-container="" data-size="3" data-style="btn btn-round btn-secondary" title="Select class" data-live-search="true"  data-hide-disabled="true">
                                                <option value="" >Select Class Passed</option>
                                                @foreach($classes as $class)
                                                    <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Enter Remarks</label>
                                            <textarea class="form-control previous-school-disabled" name="lsch_Comments" rows="1" cols="33"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="form-control-label" for="">Upload Document</label>
                                            <div class="custom-file">
                                                <input type="file" name="lsch_slc_img" class="custom-file-input form-control previous-school-disabled" id="input-document" accept="image/*">
                                                <label class="custom-file-label" for="input-document">Select scanned document</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="pntcontact">
                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Address</h6>
                                        <div class="form-group col-sm-12">
                                            <label>Mailing Address</label>
                                            <textarea  class="form-control" name="pnt_mail_Add" rows="1" cols="33" required="true"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Permanent Address</label>
                                            <textarea  class="form-control" name="pnt_pmt_Add" rows="1" cols="33" required="true"></textarea>
                                        </div>
                                        <div class=" col-sm-4 select-wizard">
                                            <label class="col-sm-12" >District</label>
                                            <select class="selectpicker"  id="parent_district" name="pnt_District" data-container="" data-style="btn btn-round btn-secondary" data-size="3" data-style=" " title="Select district" data-live-search="true"  data-hide-disabled="true" required="true">
                                                <option value="" disabled >Select District</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->dom_Id}}">{{$district->dom_District}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="select-wizard col-sm-4">
                                            <label class="col-sm-12">City</label>
                                            <select class="selectpicker " id="parent_city" name="pnt_City" data-container="" data-size="3" data-style="btn btn-round btn-secondary" title="Select city" data-live-search="true"  data-hide-disabled="true" required="true">
                                                <option value="" disabled selected>Select city</option>
                                                @foreach($cities as $city)
                                                    <option value="{{$city->pk_city_id}}">{{$city->city_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Zip</label>
                                            <input type="text" class="form-control" placeholder="" name="zip_No" >
                                        </div>
                                    </div>
                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Guardian Contact Information</h6>
                                        <div class="form-group col-sm-3">
                                            <label>Mobile Phone No</label>
                                            <input type="text" class="form-control" placeholder="" number="true" id="pnt_mob_Ph2" name="pnt_mob_Ph" required="true" >
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Office Phone No</label>
                                            <input type="text" class="form-control" placeholder="" id="pnt_off_Ph" name="pnt_off_Ph" number="true" >
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Home Phone No</label>
                                            <input type="text" class="form-control" placeholder="" id="pnt_home_Ph" name="pnt_home_Ph" number="true" >
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Email Address</label>
                                            <input type="text" class="form-control" placeholder="" id="pnt_Email" name="pnt_Email"  email="true" >
                                        </div>
                                    </div>
                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Mother Contact Information</h6>
                                        <div class="form-group col-sm-3">
                                            <label>Mobile Phone No</label>
                                            <input type="text" class="form-control" placeholder="" id="mother_mobile" name="mother_mobile"  number="true" >
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Office Phone No</label>
                                            <input type="text" class="form-control" placeholder="" id="mother_office_phone" name="mother_office_phone" number="true" >
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Home Phone No</label>
                                            <input type="text" class="form-control" placeholder="" id="mother_home_phone" name="mother_home_phone"  number="true" >
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Email Address</label>
                                            <input type="text" class="form-control" placeholder="" id="mother_email" name="mother_email"  email="true" >
                                        </div>
                                    </div>
                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Emergency Contact Information</h6>
                                        <div class="form-group col-sm-4">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" placeholder="" name="emer_cont_Name" required="true">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Contact No</label>
                                            <input type="text" class="form-control" placeholder="" name="emer_cont_No" number="true" required="true">
                                        </div>
                                        <div class="select-wizard col-sm-4">
                                            <label col-sm-12>Relationship with Student</label>
                                            <select class="selectpicker " id="relation_with_student" name="fk_emer_relat_Id" data-container="" data-size="3" data-style="btn btn-round btn-secondary" title="Select relation" data-live-search="true"  data-hide-disabled="true" required="true">
                                                <option value="" disabled >Choose relation</option>
                                                @foreach($ralationship as $ralation)
                                                    <option value="{{$ralation->pk_relat_Id}}">{{$ralation->relation_Name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-choice btn-next btn-fill btn-rose btn-wd btn-round'  name='next' value='Next' />
                                {{--<input type='button' class='btn btn-outline-success btn-save btn-fill btn-rose btn-round btn-wd' name='next' value='Save & Exit' />
                               --}}
                                <input type='submit' class='btn btn-finish  btn-secondary btn-fill btn-rose btn-wd btn-round admission-btn-next admission-btn-save-exit-submit' name='finish' value='Submit' />
                            </div>
                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-round btn-fill btn-outline-choice btn-wd' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
    </div>
@endsection

{{--add father modal--}}
<div class="modal fade " id="add-guardian-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered">

        <form enctype="multipart/form-data" id="add-guardian-form">
            @csrf
            <div class="row">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-remove"></i>
                        </button>
                        <h5 class="title title-up">New Guardian Details</h5>
                    </div>
                    <div class="modal-body row">

                        <div class="col-sm-3">
                            <div class="col-sm-12 text-center">
                                <h6 class="">Guardian Information</h6><br>
                            </div>
                            <div class="picture-container">
                                <div class="picture">
                                    <img src="{{asset('adminassets/img/default-avatar.png')}}" class="picture-src" id="father-picture-preview" title=""  width="120px" height="auto"/>
                                    <input type="file" id="father-picture" name="guardian_image">
                                    <div class="add-div-error guardian_image"></div>
                                </div>
                                <label class="">Choose Guardian Picture</label>

                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="col-sm-9 ">
                            <div class="add-div-error" style="display:none">
                                <div class="alert alert-danger alert-dismissible fade show"
                                     role="alert" id="add-alert-danger">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <ul class="p-0 m-0" style="list-style: none;">
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row ">

                                <div class="form-group col-sm-4">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" placeholder="" name="full_name">
                                    <div class="add-div-error full_name"></div>
                                </div>

                                <div class="col-sm-4 select-wizard" >
                                    <label>Gender</label>
                                    <select class="selectpicker" name="gender" data-size="3" data-style="btn btn-secondary btn-round" title="Select Gender" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->gnd_Id}}">{{$gender->gender}}</option>
                                        @endforeach
                                    </select>
                                    <div class="add-div-error gender"></div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>CNIC</label>
                                    <input type="text" class="form-control" placeholder="" name="cnic"  number="true" required>
                                    <div class="add-div-error cnic"></div>
                                </div>
                                <div class=" col-sm-4 select-wizard">
                                    <label>Relation</label>
                                    <select class="selectpicker " name="relation" id="guardrelation" data-container="" data-size="3" required data-style="btn btn-round btn-secondary" title="Select relation" data-live-search="true"  data-hide-disabled="true">
                                        <option value="" disabled >Select Relation</option>
                                        @foreach($ralationship as $ralation)
                                            <option value="{{$ralation->pk_relat_Id}}">{{$ralation->relation_Name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="add-div-error relation"></div>
                                </div>

                                <div class=" col-sm-4 select-wizard">
                                    <label>Occupation</label>
                                    <select class="selectpicker " name="occupation" id="guard-occupation" data-container="" data-size="3" required data-style="btn btn-round btn-secondary" title="Select Occupation" data-live-search="true"  data-hide-disabled="true">
                                        <option value="" disabled >Select Occupation</option>
                                        @foreach($occupations as $occupation)
                                            <option value="{{$occupation->occup_Id}}">{{$occupation->occup_Name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="add-div-error occupation"></div>
                                </div>
                                <div class=" col-sm-4 select-wizard">
                                    <label>Designation</label>
                                    <select class="selectpicker " name="designation" id="guardian-designation"
                                            data-container="" data-size="3" required data-style="btn btn-secondary btn-round"
                                            title="Select Designation" data-live-search="true" data-hide-disabled="true">
                                        <option value="" disabled>Select Designation</option>
                                        @foreach($designations as $designation)
                                            <option value="{{$designation->desig_Id}}">{{$designation->designation}}</option>
                                        @endforeach
                                    </select>
                                    <div class="add-div-error designation"></div>
                                </div>
                                <div class="input-field col-sm-4">
                                    <label>Marital Status</label>
                                    <select class="selectpicker" name="marital_status" data-size="3" data-style="btn btn-secondary btn-round" title="Marital Status" >
                                        <option value="" disabled selected>Marital Status</option>
                                        @foreach($marital_statuses as $marital_status)
                                            @if($marital_status->marital_status !='Single')
                                                <option value="{{$marital_status->marital_status}}">{{$marital_status->marital_status}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="add-div-error marital_status"></div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Employer</label>
                                    <input type="text" class="form-control" placeholder="" name="employer" required>
                                    <div class="add-div-error employer"></div>
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" placeholder="" name="pnt_Ph"
                                           required>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Office Phone</label>
                                    <input type="text" class="form-control" placeholder="" name="pnt_off_Ph"
                                           required>
                                </div>

                                <div class="form-group col-sm-4">
                                    <label>Home Phone</label>
                                    <input type="text" class="form-control" placeholder="" name="pnt_home_Ph"
                                           required>

                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="" name="email"
                                           required>
                                    <div class="add-div-error email"></div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="">
                            <button type="button" class="btn btn-success btn-link save-guardian-modal-btn  btn-round add-btn"  id="save-guardian-modal-btn">Save</button>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal" >Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
{{--end add father modal--}}

{{--end add Mother modal--}}
<div class="modal fade " id="mymother-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl  modal-dialog-centered">
        <form enctype="multipart/form-data" id="add-mother-form">
            @csrf
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-remove"></i>
                </button>
                <h5 class="title title-up">New Mother Details</h5>
            </div>
            <div class="modal-body row">
                <div class="col-sm-3">
                    <div class="col-sm-12 text-center">
                        <h6 class="">Mother Information</h6><br>

                    </div>
                    <div class="col-sm-12">
                        <div class="picture-container">
                            <div class="picture">
                                <img src="{{asset('adminassets/img/default-avatar.png')}}" class="picture-src" id="mother-picture-preview" title="" width="100px" height="auto" />
                                <input type="file" name="mother_image" id="mother-picture">
                            </div>
                            <label class="">Choose Mother Picture</label>
                            <div class="add-mother-div-error mother_image"></div>
                        </div>
                    </div>
                </div>

                <div class="divider"></div>
                <div class="col-sm-9">
{{--                    <div class="add-mother-div-error" style="display:none">--}}
{{--                        <div class="alert alert-danger alert-dismissible fade show"--}}
{{--                             role="alert" id="add-mother-alert-danger">--}}
{{--                            <button type="button" class="close" data-dismiss="alert"--}}
{{--                                    aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                            <ul class="p-0 m-0" style="list-style: none;">--}}
{{--                                <li></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label>Full Name</label>
                            <input type="text" class="form-control" placeholder="" name="full_name">
                            <div class="add-mother-div-error full_name"></div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>CNIC</label>
                            <input type="text" class="form-control" placeholder="" name="cnic"  number="true">
                            <div class="add-mother-div-error cnic"></div>
                        </div>
                        <div class="col-sm-4 select-wizard" >
                            <label>Gender</label>
                            <select class="selectpicker" name="gender" data-size="3" data-style="btn btn-secondary btn-round" title="Select Gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                @foreach($genders as $gender)
                                    @if($gender->gender =='Female')
                                        @php  $female =  $gender->gnd_Id;
                                        @endphp
                                    <option value="{{$gender->gnd_Id}}" @if($gender->gnd_Id == $female) selected @endif>{{$gender->gender}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="add-mother-div-error gender"></div>
                        </div>
                        <div class="input-field col-sm-4">
                            <label>Marital Status</label>
                            <select class="selectpicker" name="marital_status" data-size="3" data-style="btn btn-secondary btn-round" title="Marital Status" >
                                <option value="" disabled selected>Marital Status</option>
                                @foreach($marital_statuses as $marital_status)
                                    @if($marital_status->marital_status !='Single')
                                    <option value="{{$marital_status->marital_status}}">{{$marital_status->marital_status}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="add-mother-div-error marital_status"></div>
                        </div>
                        <div class="select-wizard col-sm-4">
                            <label>Working Status</label>
                            <select class="selectpicker mother_working_status" name="working_status"  data-size="3" data-style="btn btn-round btn-secondary" title="Working Status" >
                                <option value="Working Woman"> Working Woman </option>
                                <option value="House Wife"> House Wife </option>
                            </select>
                            <div class="add-mother-div-error working_status"></div>
                        </div>
                        <div class=" col-sm-4 select-wizard">
                            <label>Relation</label>
                            <select class="selectpicker " name="relation" id="guardrelation" data-container="" data-size="3" required data-style="btn btn-round btn-secondary" title="Select relation" data-live-search="true"  data-hide-disabled="true">
                                <option value="" disabled >Select Relation</option>
                                @foreach($ralationship as $ralation)
                                    @if($ralation->relation_Name =='Mother')
                                        @php  $mother =  $ralation->pk_relat_Id;
                                        @endphp
                                    <option value="{{$ralation->pk_relat_Id}}" @if($ralation->pk_relat_Id==$mother) selected @endif >{{$ralation->relation_Name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="add-mother-div-error relation"></div>
                        </div>
                        <div class="col-sm-4 select-wizard Working-div">
                            <label>Occupation</label>
                            <select class="selectpicker " name="occupation" id="mother-occupation" data-container="" data-size="3" required data-style="btn btn-round btn-secondary" title="Select Occupation" data-live-search="true"  data-hide-disabled="true">
                                <option value="" disabled >Select Occupation</option>
                                @foreach($occupations as $occupation)
                                    <option value="{{$occupation->occup_Id}}">{{$occupation->occup_Name}}</option>
                                @endforeach
                            </select>
                            <div class="add-mother-div-error occupation"></div>
                        </div>
                        <div class=" col-sm-4 select-wizard Working-div">
                            <label>Designation</label>
                            <select class="selectpicker " name="designation" id="mother-designation" data-container="" data-size="3" required data-style="btn btn-round btn-secondary" title="Select Designation" data-live-search="true"  data-hide-disabled="true">
                                <option value="" disabled >Select Designation</option>
                                @foreach($designations as $designation)
                                    <option value="{{$designation->desig_Id}}">{{$designation->designation}}</option>
                                @endforeach
                            </select>
                            <div class="add-mother-div-error designation"></div>
                        </div>
                        <div class="form-group col-sm-4 Working-div">
                            <label>Employer</label>
                            <input type="text" class="form-control" placeholder="" name="employer" >
                            <div class="add-mother-div-error employer"></div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Mobile</label>
                            <input type="text" class="form-control" placeholder="" name="mother_Ph"
                                   required>
                        </div>
                        <div class="form-group col-sm-4 Working-div">
                            <label>Office Phone</label>
                            <input type="text" class="form-control" placeholder="" name="mother_off_Ph"
                                   required>
                        </div>

                        <div class="form-group col-sm-4 Working-div">
                            <label>Home Phone</label>
                            <input type="text" class="form-control" placeholder="" name="mother_home_Ph"
                                   required>

                        </div>
                        <div class="form-group col-sm-4">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="" name="email"
                                   required>
                            <div class="add-div-error email"></div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="modal-footer">
                <div class="">
                    <button type="button" class="btn btn-success btn-link btn-round add-mother-save-btn add-btn"  id="add-mother-save-btn">Save</button>
                </div>
                <div class="">
                    <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal" >Cancel</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
{{--end add mother modal--}}

@section('front_script')
    <script src="{{asset('js/select2.js')}}"></script>
    <script src="{{asset('adminassets/validator/dist/jquery.validate.js')}}"></script>
    <script src="{{asset('js/admission_script.js')}}"></script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        /*Mother image preview*/
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#mother-picture-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#mother-picture").change(function() {
            readURL(this);
        });
        /*Father image preview*/
        function FatherreadURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#father-picture-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#father-picture").change(function() {
            FatherreadURL(this);
        });

    </script>
    
@endsection

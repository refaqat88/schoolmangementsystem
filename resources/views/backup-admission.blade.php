@extends('layouts.master')
@section('title', 'Admission')
@section('content')
    <div class="content">

        <div class="col-md-12 mr-auto ml-auto">
            <!--      Wizard container        -->
            <div class="wizard-container wizard-cus">
                <div class="card card-wizard" data-color="primary" id="wizardProfile">
                    <form id="TypeValidation" action="#" method="">
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
                                            Admission Info
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#stdinfo" data-toggle="tab" role="tab" aria-controls="stdinfo" aria-selected="true">
                                            <i class="fa fa-info"></i>
                                            Basic Info
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#pntinfo" data-toggle="tab" role="tab" aria-controls="pntinfo" aria-selected="true">
                                            <i class="fa fa-user-md"></i>
                                            Parent Info
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#stdacdm" data-toggle="tab" role="tab" aria-controls="stdacdm" aria-selected="true">
                                            <i class="fa fa-university"></i>
                                            Academics Info
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#pntcontact" data-toggle="tab" role="tab" aria-controls="pntcontact" aria-selected="true">
                                            <i class="fa fa-address-book-o"></i>
                                            Contact Info
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="admit">

                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Admission Information</h6>
                                        <div class="form-group col-sm-3">
                                            <label>Admission No</label>
                                            <input type="text" class="form-control" placeholder="" name="admno" number="true" readonly="true">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Date</label>
                                            <input type="text" class="form-control datepicker" value="" placeholder="" name="admdate" >

                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Session</label>
                                            <input type="text" class="form-control" date="true" placeholder="" name="admsession">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Registration No</label>
                                            <input type="text" class="form-control" placeholder="" name="regno">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Nadra B.Form No</label>
                                            <input type="text" class="form-control" placeholder="" name="nadrab"  number="true">
                                        </div>
                                        <div class="col-sm-3 select-wizard">
                                            <label class="col-sm-12">Class</label>
                                            <select class="selectpicker" id="class" data-container="" data-size="3" data-style="btn btn-secondary" title="Select class" data-live-search="true"  data-hide-disabled="true">
                                                <option value="" disabled selected>Applied For Class</option>
                                                @foreach($classes as $class)
                                                <option value="{{$class->cls_Id}}">{{$class->class}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!--<div class="row">-->
                                        <!--<div class="col-sm-12">-->
                                        <!--<label class="col-form-label ">Student Status</label>-->
                                        <!--<div class="form-check form-check-inline pull-right">-->
                                        <!--<label class="form-check-label">-->
                                        <!--<input class="form-check-input" type="checkbox" >-->
                                        <!--<span class="form-check-sign"></span>-->
                                        <!--Active-->
                                        <!--</label>-->
                                        <!--</div>-->
                                        <!--<div class="form-check form-check-inline pull-right">-->
                                        <!--<label class="form-check-label">-->
                                        <!--<input class="form-check-input" type="checkbox">-->
                                        <!--<span class="form-check-sign"></span>-->
                                        <!--Inactive-->
                                        <!--</label>-->
                                        <!--</div>-->
                                        <!--</div>-->
                                        <!--</div>-->
                                    </div>
                                    <!--<div class="row">-->
                                    <!--<div class="col-sm-10">-->
                                    <!--<label class="col-form-label pull-right">Switch to change pupil's status</label>-->
                                    <!--</div>-->
                                    <!--<div class="col-sm-2 checkbox-radios">-->
                                    <!--<div class="form-check-radio">-->
                                    <!--<label class="form-check-label">-->
                                    <!--<input class="form-check-input" type="radio" name="exampleRadioz" id="exampleRadios11" value="option1" required="true">-->
                                    <!--Active-->
                                    <!--<span class="form-check-sign"></span>-->
                                    <!--</label>-->
                                    <!--</div>-->
                                    <!--<div class="form-check-radio">-->
                                    <!--<label class="form-check-label">-->
                                    <!--<input class="form-check-input" type="radio" name="exampleRadioz" id="exampleRadios12" value="option2" checked="">-->
                                    <!--Inactive-->
                                    <!--<span class="form-check-sign"></span>-->
                                    <!--</label>-->
                                    <!--</div>-->
                                    <!--</div>-->
                                    <!--</div>_-->
                                    <!--<div class="form-check pull-left">-->
                                    <!--<label class="form-check-label">-->
                                    <!--<input class="form-check-input" type="checkbox" name="optionCheckboxes" >-->
                                    <!--<span class="form-check-sign"></span>-->
                                    <!--Check if student is inactive-->
                                    <!--</label>-->
                                    <!--</div>-->
                                    <div class=" pull-left">
                                        <input type="checkbox" class=" fancy-check" id="myId"/>
                                        <label class="form-check-label" for="myId" ><span>Check if student is inactive</span></label>
                                    </div>

                                    <!--<div class="form-check pull-right">-->
                                    <!--<label class="form-check-label">-->
                                    <!--&lt;!&ndash;<input class="form-check-input" type="checkbox" name="optionCheckboxes">&ndash;&gt;-->
                                    <!--<input class="bootstrap-switch" type="checkbox" data-toggle="switch" data-off-color="choice" data-on-color="choice" data-on-label="ON" data-off-label="OFF" required="true">-->
                                    <!--Switch to make student status active-->
                                    <!--</label>-->
                                    <!--</div>-->
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
                                                        <input type="file" id="wizard-picture">
                                                    </div>
                                                    <label class="">Choose Pupil Picture</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="row">

                                                <div class="form-group col-sm-4">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" placeholder="" name="stdfname" >
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Middle Name</label>
                                                    <input type="text" class="form-control" placeholder="" name="stdmname">

                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" placeholder="" name="stdlname" >
                                                </div>
                                                <div class="col-sm-4 select-wizard" >
                                                    <label>Gender</label>
                                                    <select class="selectpicker" name="gender" data-size="3" data-style="btn btn-secondary" title="Select Gender" >
                                                        <option value="" disabled selected>Select Gender</option>
                                                        @foreach($genders as $gender)
                                                        <option value="{{$gender->gnd_Id}}">{{$gender->gender}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Date of Birth</label>
                                                    <input type="text" class="form-control datepicker" placeholder="" name="date_of_birth" >
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Age</label>
                                                    <input type="text" class="form-control" placeholder="" name="age" number="true" readonly="true">
                                                </div>
                                                <div class="col-sm-4 select-wizard">
                                                    <label>Blood Group</label>
                                                    <select class="selectpicker" id="bgroup" name="blood_group" data-container="" data-size="3" data-style="btn btn-secondary" title="Select bloodgroup" data-live-search="true"  data-hide-disabled="true">
                                                        <option value="" disabled selected>Select bloodgroup</option>
                                                       @foreach($bloodgroups as $bgroup)
                                                        <option value="{{$bgroup->bg_Id}}">{{$bgroup->blood_group}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Religion</label>
                                                    <select class="selectpicker" id="religion" name="religion" data-container="" data-size="3" data-style="btn btn-secondary" title="Select bloodgroup" data-live-search="true"  data-hide-disabled="true">
                                                        <option value="" disabled selected>Select religion</option>
                                                        @foreach($religions as $religion)
                                                        <option value="{{$religion->relig_Id}}">{{$religion->religion}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-sm-4 select-wizard">
                                                    <label class="col-sm-12">Nationality</label>
                                                    <select multiple class="selectpicker " data-size="3" name="nationality" id="nationality" data-style="btn btn-secondary" data-container="" data-live-search="true" title="Select Nationality" data-hide-disabled="true"  data-virtual-scroll="false">
                                                        <option value="" disabled>Choose Nationality</option>
                                                        @foreach($nationalities as $nationality)
                                                        <option value="{{$nationality->nation_Id}}">{{$nationality->nationality}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Domicile</label>
                                                    <select class="selectpicker" id="dom" data-container="" data-size="3" data-style="btn btn-secondary" title="Select domicile" data-live-search="true"  data-hide-disabled="true">
                                                        <option value="" disabled selected>Select domicile</option>
                                                        @foreach($districts as $district)
                                                        <option value="{{$district->dom_Id}}">{{$district->dom_District}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 select-wizard">
                                                    <label class="col-sm-12">Cast</label>
                                                    <select class="selectpicker " data-size="3" id="cast" name="cast" data-style="btn btn-secondary" data-container="" data-live-search="true" title="Select Cast" data-hide-disabled="true"  data-virtual-scroll="false">
                                                        <option value="" disabled>Choose Cast</option>
                                                        @foreach($casts as $cast)
                                                            <option value="{{$cast->cast_Id}}">{{$cast->cast}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>Category</label>
                                                    <select class="selectpicker" data-size="3" name="student_category" data-style="btn btn-secondary" title="Select Category">
                                                        <option value="" disabled selected>Select Category</option>
                                                        @foreach($student_categories as $student_category)
                                                            <option value="{{$student_category->std_cat_Id}}">{{$student_category->student_category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label>Select If Disable</label>
                                                    <select class="selectpicker " data-size="3" data-style="btn btn-secondary" title="Select If Disable" >
                                                        <option value="" disabled selected>Please Select</option>
                                                        @foreach($disabilities as $disability)
                                                            <option value="{{$disability->disable_Id}}">{{$disability->disable_status}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label>Disability</label>
                                                    <input type="text" class="form-control" placeholder="Enter disability" name="stddisable">
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
                                                <select class="selectpicker col-sm-12" name="guardian" data-size="3" data-style="btn btn-secondary" title="Select Guardian" data-live-search="true" >
                                                    <option value="" disabled selected>Select Guardian</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                    <option value="2">Ali</option>
                                                    <option value="1">Ahmed</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-12 pull-right">
                                                <br>
                                                <button class="btn btn-round btn-outline-choice pull-right" data-toggle="modal" data-target="#myfather">
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
                                                        <img src="{{asset('adminassets/img/default-avatar.png')}}" class="picture-src" id="grdPicturePreview" title="" />
                                                    </div>
                                                    <label class="">Mother Picture</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="select-wizard form-group " >
                                                <label class="col-sm-12">Mother</label>
                                                <select class="selectpicker col-sm-12" id="mother" name="mother" data-container="" data-size="3" data-style="btn btn-secondary" title="Select Mother" data-live-search="true"  data-hide-disabled="true">
                                                    <option value="" disabled selected>Select Mother</option>
                                                    <option value="1">Ayesha</option>
                                                    <option value="2">Saima</option>
                                                    <option value="3">Laiba</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-12 pull-right">
                                                <br>
                                                <button class="btn btn-round btn-outline-choice pull-right" data-toggle="modal" data-target="#mymother">
                                                    Add Mother
                                                </button>
                                            </div>
                                        </div>

                                        <div class="modal fade " id="myfather" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl  modal-dialog-centered">
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
                                                                    <img src="{{asset('adminassets/img/default-avatar.png')}}" class="picture-src" id="grdPicturePreview" title="" />
                                                                    <input type="file" id="grd-picture">
                                                                </div>
                                                                <label class="">Choose Guardian Picture</label>
                                                            </div>
                                                        </div>
                                                        <div class="divider"></div>
                                                        <div class="col-sm-9 ">
                                                            <div class="row ">

                                                                <div class="form-group col-sm-4">
                                                                    <label>First Name</label>
                                                                    <input type="text" class="form-control" placeholder="" name="grdfname" >
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <label>Middle Name</label>
                                                                    <input type="text" class="form-control" placeholder="" name="grdmname">
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <label>Last Name</label>
                                                                    <input type="text" class="form-control" placeholder="" name="grdlname" >
                                                                </div>

                                                                <div class="col-sm-4 select-wizard" >
                                                                    <label>Gender</label>
                                                                    <select class="selectpicker" data-size="3" data-style="btn btn-secondary" title="Select Gender" >
                                                                        <option value="" disabled selected>Select Gender</option>
                                                                        @foreach($genders as $gender)
                                                                            <option value="{{$gender->gnd_Id}}">{{$gender->gender}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <label>National Identifier</label>
                                                                    <input type="text" class="form-control" placeholder="" name="grdnic"  number="true">
                                                                </div>
                                                                <div class=" col-sm-4 select-wizard">
                                                                    <label>Relation</label>
                                                                    <select class="selectpicker " id="guardrelat" data-container="" data-size="3" data-style="btn btn-secondary" title="Select relation" data-live-search="true"  data-hide-disabled="true">
                                                                        <option value="" disabled >Select Relation</option>
                                                                        @foreach($ralationship as $ralation)
                                                                        <option value="{{$ralation->pk_relat_Id}}">{{$ralation->relation_Name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-sm-4">
                                                                    <label>Occupation</label>
                                                                    <input type="text" class="form-control" placeholder="" name="grdoccu" >
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <label>Designation</label>
                                                                    <input type="text" class="form-control" placeholder="" name="grddesig" >
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <label>Employer</label>
                                                                    <input type="text" class="form-control" placeholder="" name"grdemp" >
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <div class="">
                                                            <button type="button" class="btn btn-success btn-link" data-dismiss="modal">Save</button>
                                                        </div>
                                                        <div class="divider"></div>
                                                        <div class="">
                                                            <button type="button" class="btn btn-danger btn-link">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade " id="mymother" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl  modal-dialog-centered">
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
                                                                        <img src="{{asset('adminassets/img/default-avatar.png')}}" class="picture-src" id="mtrPicturePreview" title="" />
                                                                        <input type="file" id="mtr-picture">
                                                                    </div>
                                                                    <label class="">Choose Mother Picture</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="divider"></div>
                                                        <div class="col-sm-9">
                                                            <div class="row">
                                                                <div class="form-group col-sm-4">
                                                                    <label>First Name</label>
                                                                    <input type="text" class="form-control" placeholder="" name="mtrfname"
                                                                    >
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <label>Middle Name</label>
                                                                    <input type="text" class="form-control" placeholder="" name="mtrmname">
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <label>Last Name</label>
                                                                    <input type="text" class="form-control" placeholder="" name="mtrlname" >
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <label>National Identifier</label>
                                                                    <input type="text" class="form-control" placeholder="" name="mtrnic"  number="true">
                                                                </div>
                                                                <div class="input-field col-sm-4">
                                                                    <label>Marital Status</label>
                                                                    <select class="selectpicker" data-size="3" data-style="btn btn-secondary" title="If Living Separated" >
                                                                        <option value="" disabled selected>If Living Separated</option>
                                                                        <option value="1">Divorced</option>
                                                                        <option value="2">Separated</option>
                                                                        <option value="2">Widow</option>
                                                                    </select>
                                                                </div>
                                                                <div class="select-wizard col-sm-4">
                                                                    <label>Working Status</label>
                                                                    <select class="selectpicker" data-size="3" data-style="btn btn-secondary" title="Select Status" >
                                                                        <option value="1"> Working Woman </option>
                                                                        <option value="2"> House Wife </option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-sm-4">
                                                                    <label>Occupation</label>
                                                                    <input type="text" class="form-control" placeholder="" name="mtroccu" >
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <label>Designation</label>
                                                                    <input type="text" class="form-control" placeholder="" name="mtrdesig">
                                                                </div>
                                                                <div class="form-group col-sm-4">
                                                                    <label>Employer</label>
                                                                    <input type="text" class="form-control" placeholder="" name="mtremp" >
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="modal-footer">
                                                        <div class="">
                                                            <button type="button" class="btn btn-success btn-link" data-dismiss="modal">Save</button>
                                                        </div>
                                                        <div class="divider"></div>
                                                        <div class="">
                                                            <button type="button" class="btn btn-danger btn-link">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="stdacdm">

                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Previous School Information</h6>
                                        <!--<div class="col-sm-3 text-center">-->
                                        <!---->
                                        <!--</div>-->
                                        <div class="form-group col-sm-3">
                                            <label>Prevouse School Name</label>
                                            <input type="text" class="form-control" placeholder="" name="stdfname" >
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Previous School Contact No</label>
                                            <input type="text" class="form-control" placeholder="" name="stdmname" number="true">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Date of Leaving</label>
                                            <input type="text" class="form-control datepicker" placeholder="" name="stdlname" >
                                        </div>
                                        <!--<div class="col-sm-3">-->
                                        <!--<div class="picture-container">-->
                                        <!--<div class="picture">-->
                                        <!--<img src="../../assets/img/default-avatar.png" class="picture-src" id="slcPicturePreview" title="" />-->
                                        <!--<input type="file" id="slc-picture">-->
                                        <!--</div>-->
                                        <!--<label class="">Upload SLC</label>-->
                                        <!--</div>-->
                                        <!--</div>-->
                                        <div class="form-group col-sm-3">
                                            <label>Enter Class Passed</label>
                                            <input type="text" class="form-control" placeholder="" name="pnic" >
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Enter Remarks</label>
                                            <textarea id="" class="form-control" name="commentslc" rows="1" cols="33"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12">

                                            <label class="form-control-label" for="">Upload Document</label>
                                            <div class="custom-file">
                                                <input type="file" name="photo" class="custom-file-input form-control" id="input-document" accept="image/*">
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
                                            <textarea id="" class="form-control" name="commentslc" rows="1" cols="33"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Permanent Address</label>
                                            <textarea id="" class="form-control" name="commentslc" rows="1" cols="33"></textarea>
                                        </div>
                                        <div class=" col-sm-4 select-wizard">
                                            <label class="col-sm-12" >District</label>
                                            <select class="selectpicker"  id="district" data-container="" data-style="btn btn-secondary" data-size="3" data-style=" " title="Select district" data-live-search="true"  data-hide-disabled="true">
                                                <option value="" disabled >Select District</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->dom_Id}}">{{$district->dom_District}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="select-wizard col-sm-4">
                                            <label class="col-sm-12">City</label>
                                            <select class="selectpicker " id="city" data-container="" data-size="3" data-style="btn btn-secondary" title="Select city" data-live-search="true"  data-hide-disabled="true">
                                                <option value="" disabled selected>Select city</option>
                                                @foreach($cities as $city)
                                                    <option value="{{$city->pk_city_id}}">{{$city->city_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Zip</label>
                                            <input type="text" class="form-control" placeholder="" name="pnic" >
                                        </div>
                                    </div>
                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Guardian Contact Information</h6>
                                        <div class="form-group col-sm-3">
                                            <label>Mobile Phone No</label>
                                            <input type="text" class="form-control" placeholder="" number="true" name="grdmob" >
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Office Phone No</label>
                                            <input type="text" class="form-control" placeholder="" name="grdoffph" number="true" >
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Home Phone No</label>
                                            <input type="text" class="form-control" placeholder="" name="grdhph" number="true">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Email Address</label>
                                            <input type="text" class="form-control" placeholder="" name="grdemail"  email="true">
                                        </div>
                                    </div>
                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Mother Contact Information</h6>
                                        <div class="form-group col-sm-3">
                                            <label>Mobile Phone No</label>
                                            <input type="text" class="form-control" placeholder="" name="mtrmon"  number="true">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Office Phone No</label>
                                            <input type="text" class="form-control" placeholder="" name="mtroffph" number="true" >
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Home Phone No</label>
                                            <input type="text" class="form-control" placeholder="" name="mtrhph"  number="true">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label>Email Address</label>
                                            <input type="text" class="form-control" placeholder="" name="mtremail"  email="true">
                                        </div>
                                    </div>
                                    <div class="row bor-sep">
                                        <h6 class="col-sm-12">Emergency Contact Information</h6>
                                        <div class="form-group col-sm-4">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" placeholder="" name="stdemername" >
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Contact No</label>
                                            <input type="text" class="form-control" placeholder="" name="stdemerph" number="true" >
                                        </div>
                                        <div class="select-wizard col-sm-4">
                                            <label col-sm-12>Relationship with Student</label>
                                            <select class="selectpicker " id="city" data-container="" data-size="3" data-style="btn btn-secondary" title="Select relation" data-live-search="true"  data-hide-disabled="true">
                                                <option value="" disabled >Choose relation</option>
                                                <option value="1">Mother</option>
                                                <option value="2">Father</option>
                                                <option value="3">Aunt</option>
                                                <option value="1">Uncle</option>
                                                <option value="2">Sister</option>
                                                <option value="3">Brother</option>
                                                <option value="1">Grandmother</option>
                                                <option value="2">Grandfather</option>
                                                <option value="3">Caretaker</option>
                                                <option value="1">Other</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-choice btn-next btn-fill btn-rose btn-wd btn-round' name='next' value='Next' />
                                <input type='button' class='btn btn-outline-success btn-save btn-fill btn-rose btn-round btn-wd' name='next' value='Save & Exit' />
                                <input type='submit' class='btn btn-finish  btn-secondary btn-fill btn-rose btn-wd btn-round' name='finish' value='Submit' />
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
@section('front_script')
    <script>
        $(document).ready(function() {


            $('#facebook').sharrre({
                share: {
                    facebook: true
                },
                enableHover: false,
                enableTracking: false,
                enableCounter: false,
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('facebook');
                },
                template: '<i class="fab fa-facebook-f"></i> Facebook',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });

            $('#google').sharrre({
                share: {
                    googlePlus: true
                },
                enableCounter: false,
                enableHover: false,
                enableTracking: true,
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('googlePlus');
                },
                template: '<i class="fab fa-google-plus"></i> Google',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });

            $('#twitter').sharrre({
                share: {
                    twitter: true
                },
                enableHover: false,
                enableTracking: false,
                enableCounter: false,
                buttons: {
                    twitter: {
                        via: 'CreativeTim'
                    }
                },
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('twitter');
                },
                template: '<i class="fab fa-twitter"></i> Twitter',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });



            // Facebook Pixel Code Don't Delete
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window,
                document, 'script', '../../../../connect.facebook.net/en_US/fbevents.js');

            try {
                fbq('init', '111649226022273');
                fbq('track', "PageView");

            } catch (err) {
                console.log('Facebook Track Error:', err);
            }

        });
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
    </noscript>
    <script>
        $(document).ready(function() {

            $sidebar = $('.sidebar');
            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');
            sidebar_mini_active = false;

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            // if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
            //     if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
            //         $('.fixed-plugin .dropdown').addClass('show');
            //     }
            //
            // }

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-active-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('data-active-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-active-color', new_color);
                }
            });

            $('.fixed-plugin .background-color span').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });


            $('.switch-mini input').on("switchChange.bootstrapSwitch", function() {
                $body = $('body');

                $input = $(this);

                if (paperDashboard.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    paperDashboard.misc.sidebar_mini_active = false;
                } else {
                    $('body').addClass('sidebar-mini');
                    paperDashboard.misc.sidebar_mini_active = true;
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });

        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialise the wizard
            demo.initWizard();
            setTimeout(function() {
                $('.card.card-wizard').addClass('active');
            }, 600);
        });
    </script>
    <script>
        function setFormValidation(id) {
            $(id).validate({
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
                    $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
                },
                success: function(element) {
                    $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
                    $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
                },
                errorPlacement: function(error, element) {
                    $(element).closest('.form-group').append(error);
                },
            });
        }

        $(document).ready(function() {
            setFormValidation('#RegisterValidation');
            setFormValidation('#TypeValidation');
            setFormValidation('#LoginValidation');
            setFormValidation('#RangeValidation');
        });
    </script>
    <script>
        $(document).ready(function() {
            // initialise Datetimepicker and Sliders
            demo.initDateTimePicker();
            if ($('.slider').length != 0) {
                demo.initSliders();
            }
        });
    </script>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection

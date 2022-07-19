@extends('layouts.master')
@section('title', 'Teacher Profile')
@section('content')
 
<div class="content">

    
        <div class="row">
            <div class="col-md-3 border-right card ml-5">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    
 
                        <img class="rounded-circle mt-5" width="200px" height="200px" src="{{$user->photo()}}" alt="Default User">
                 
                    <span class="font-weight-bold mt-4 profile-username"><h6>{{$user->name}}</h6></span>
                    <span class="text-black-50"><a href="mailto:{{$user->email}}" class="size-50">{{$user->email}}</a></span>
                    <span> </span>
                </div>
            </div>
            <div class="col-md-8 card">
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                    <strong>Success!</strong> Profile updated successfully!
                    </div>
                @endif
                <div class="card-header">
                    <h5 class="title">Edit Profile</h5> </div>
                <div class="card-body">
                    <form action="{{url('teacher/portal/profile-update')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" @error ('username') is-invalid @enderror  placeholder="" value="{{$user->username}}" name="username" title="User Name">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $error->message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-lg-6 ">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="Name" value="{{$user->name}}">
                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{  $message  }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-lg-6 ">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password"  class="form-control @error('password') is-invalid @enderror" name="password" placeholder="" value="">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6 ">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation"  class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="" value="">
                                    @error ('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 ">
                                <div class="form-group">
                                    <label>Marital Status @php
                                            $marstatus =$user->employeeInfo?$user->employeeInfo->emp_marital_Status:'';
                                            echo $marstatus;

                                            @endphp</label>
                                    <div class="dropdown bootstrap-select">
                                        <select class="selectpicker @error('marital_status') is-invalid @enderror" name="marital_status"  data-size="3" data-style="btn btn-secondary btn-round" title="Select marital status" data-live-search="true" tabindex="-98">
                                            <option>Marital Status 

                                            @php
                                            $marstatus =$user->employeeInfo?$user->employeeInfo->emp_marital_Status:'';
                                            echo $marstatus;

                                            @endphp
                                        </option>
                                            @foreach ($maritalStatus as $key => $value)
                                                <option value="{{$value->marital_status}}" {{($value->marital_status === $marstatus) ? "selected" : "" }}>
                                                     {{$value->marital_status}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error ('marital_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6 ">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{$user->email}}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Mailing Address</label>
                                    <textarea type="text" name="user_mail_address" class="form-control @error('user_mail_address') is-invalid @enderror">{{ $user->employeeInfo ? $user->employeeInfo->employeeContact->emp_mail_Add : '' }}</textarea>
                                    @error('user_mail_address')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <label>User Image</label>
                                <input type="file" class="form-control" placeholder="" value="" name="user_image" title="User Image">
                                 
                            </div>
                        </div>
                        <div class="row">
                            <h6 class="col-sm-12 mt-4">Emergency Contact Information</h6>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control @error('emerContPerson') is-invalid @enderror"  placeholder="contact name" name="emerContPerson" value="{{ $user->employeeInfo ? $user->employeeInfo->emergencyContact->emer_cont_Name : '' }}">
                                    @error('emerContPerson')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control @error('emer_contact') is-invalid @enderror" name="emer_contact" placeholder="phone" value="{{ $user->employeeInfo ? $user->employeeInfo->emergencyContact->emer_cont_No : '' }}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>Relation</label>
                                    @php
                                    $selecrelation =$user->employeeInfo ? $user->employeeInfo->emergencyContact->fk_emer_relat_Id :'';
                                    
                                    @endphp

                                    <div class="dropdown bootstrap-select">
                                        <select class="selectpicker @error('relation') is-invalid @enderror" name="relation" data-size="3" data-style="btn btn-secondary btn-round" title="Select emergency contact relation" data-live-search="true" tabindex="-98">
                                            <option value="">Choose Relation</option>
                                            @foreach ($relationship as $value)
                                                <option value="{{ $value->pk_relat_Id }}" {{ ($value->pk_relat_Id == $selecrelation) ? 'selected' :'' }} >
                                                    {{ $value->relation_Name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('relation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-3">
                                <input type='submit' class='btn btn-secondary btn-round pull-right' name='finish' value='Update' />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   
     
@endsection

@section('front_script')
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
        window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
        });
        }, 2000);
    </script>
@endsection
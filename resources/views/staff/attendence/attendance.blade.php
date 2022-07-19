@extends('layouts.master')
@section('title', 'Teacher Class Attendance')
@section('content')
@section('front_css')
<style>
    /* The container */
    .attendance-radio-lable {
    display: inline;
    position: relative;
    padding-left: 20px;
    margin-bottom: 10px;
    color: black !important;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }

    /* Hide the browser's default radio button */
    .attendance-radio-lable input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark {
    position: absolute;
    top: -3px;
    left: 0;
    height: 18px;
    width: 18px;
    background-color: #eee;
    border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .attendance-radio-lable:hover input ~ .checkmark {
    background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .attendance-radio-lable input:checked ~ .checkmark {
    background-color: #2196F3;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
    content: "";
    position: absolute;
    display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .attendance-radio-lable input:checked ~ .checkmark:after {
    display: block;
    }

    /* Style the indicator (dot/circle) */
    .attendance-radio-lable .checkmark:after {
        top: 5px;
        left: 6px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }

</style>

@endsection
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="alert success-message"></div>
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">View Attendance</h4>
                        </div>
                        <form id="employee-attend-form">
                        <div class="card-body">
                            <div class="row justify-content-center bor-sep">
                                @csrf()
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group row">
                                        <div class="col-lg-2 col-sm-4">
                                            <label ><b>Attendance Date :</b></label>
                                        </div>
                                        <div class='date col-sm-8 col-lg-4 filter_staff' id='datetimepicker1'>
                                            <input type='text' class="form-control filter_staff school_start" id="attend-date" name="attend"  value="{{ date('Y-m-d')  }}"  data-end="{{ $school_timing->end_time; }}"  data-start="{{ $school_timing->start_time; }}"/>
                                            <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                        <div class="col-sm-8 col-lg-4 mt-1">
                                            <select class="selectpicker filter_staff" id="employee_type" data-size="5" name="employee_type" data-style="btn btn-sm btn-secondary btn-round" title="Employee Type" required="true" tabindex="-98"><option class="bs-title-option" value=""></option>
                                                <option value="" disabled="">Employee Type</option>
                                                <option value="all">All</option>
                                                <option value="1">Teaching</option>
                                                <option value="2">None Teaching</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="card-title">Attendance List</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="toolbar">
                                            </div>

                                                @include("staff.attendence.partail.attendence")

                                                <div class="">
                                                    <button type="button" class="btn btn-sm btn-outline-choice btn-round pull-right mt-1 mb-1" id="emp-attend-save">Save</button>
                                                </div>
                                        </div><!-- end content-->
                                    </div><!--  end card  -->
                                </div> <!-- end col-md-12 -->
                            </div> <!-- end row -->
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>

@endsection

@section('front_script')
    <script src="{{asset('jspdf/js/jspdf.min.js')}}"></script>
    <script src="{{asset('js/jspdf-autotable')}}"></script>
    <script src="{{asset('js/attendence.js')}}"></script>

@endsection

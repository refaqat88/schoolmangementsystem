@extends('layouts.master')
@section('title', 'Teacher Dashboard')
@section('content')

<style type="text/css">
    .minheight{ min-height: 80px;}

    .modal { overflow: auto !important;   }
    .salary-slip{ margin: 15px; }
    .empDetail { width: 100%; text-align: left; border: 2px solid black; border-collapse: collapse; table-layout: fixed; }
    .head { margin: 10px; margin-bottom: 50px; width: 100%; }
    .companyName { text-align: right; font-size: 25px; font-weight: bold; }
    .salaryMonth {  text-align: center; }
    .table-border-bottom { border-bottom: 1px solid; }
    .table-border-right { border-right: 1px solid;}
    .myBackground { padding-top: 10px; text-align: left; border: 1px solid black; height: 40px; }
    .myAlign { text-align: center; border-right: 1px solid black; }
    .myTotalBackground { padding-top: 10px; text-align: left; background-color: #EBF1DE; border-spacing: 0px;}
    .align-4 { width: 25%; float: left; }
    .tail { margin-top: 35px; }
    .align-2 { margin-top: 25px; width: 50%; float: left;}
    .border-center { text-align: center; }
    .border-center th, .border-center td { border: 1px solid black; }
    th, td { padding-left: 6px; }
    .add-div-error{ color: red; }
    .labels{ display: inline-block; padding-top: 3px; position: absolute; top: 10px; cursor: pointer; }

</style>
<div class="content">
<div class="row">
<div class="col-md-4">
    <div class="card card-user">
        <div class="image">
        </div>
        <div class="card-body">
            <div class="author">
              
                <img class="avatar border-gray" src="{{ $user->photo()}}" height="34px" width="43px" alt="...">
                
                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                <div class="col content-center">
                    <a href="{{ url('profile-edit')}}" class="btn btn-simple btn-secondary btn-icon content-center"><i class="fa fa-lg fa-edit" title="Edit" data-toggle=""></i></a>
                </div>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b class="fa fa-mobile-phone pull-left"> Mobile</b> <a class="pull-right" href="tel:{{ $user->phone }}"> {{ $user->phone }}   </a>
                    </li>
                    <li class="list-group-item">
                        <b class="fa fa-envelope-o pull-left"> Email</b> <a class="pull-right" href="mailto::{{ $user->email }}">   {{ $user->email }}    </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"> Personal Information</h5>
        </div>
        <div class="card-body table-full-width table-hover">
            <div class="table-condensed">
                <table class="table table-hover" width="100%">
                    <tbody>
                    <tr>
                        <th>Father Name</th>
                        <td> {{ $user->employeeInfo?$user->employeeInfo->emp_fat_Name:'' }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td> {{ $user->employeeInfo?$user->employeeInfo->gender->gender:'' }}</td>
                    </tr>
                    <tr>
                        <th>Marital Status</th>
                        <td>
                        {{ $user->employeeInfo?$user->employeeInfo->emp_marital_Status :'' }}
                        </td>
                    </tr>
                    <tr>
                        <th>Blood Group</th>
                        <td>{{ $user->employeeInfo?$user->employeeInfo->bloodGroup->blood_group :'' }}</td>
                    </tr>
                    <tr>
                        <th>National Identifier</th>
                        <td> {{ $user->employeeInfo?$user->employeeInfo->emp_Cnic :'' }}</td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td>{{ $user->employeeInfo?$user->employeeInfo->emp_Dob :'' }}</td>
                    </tr>
                    <tr>
                        <th>Religion</th>
                        <td>{{ $user->employeeInfo?$user->employeeInfo->religion->religion :'' }}</td>
                    </tr>
                    <tr>
                        <th>Nationality</th>
                        <td>{{ $user->employeeInfo?$user->employeeInfo->nationality->nationality :'' }}</td>
                    </tr>

                    <tr>
                        <th>Country</th>
                        <td>
                            @php
                                if(isset($user->employeeInfo->country)){
                                    echo $user->employeeInfo->country->country;

                                } 
                            @endphp

                            </td>
                    </tr>



                    <tr>
                        <th>State</th>
                        <td>
                            @php
                                if(isset($user->employeeInfo->state)){
                                    echo $user->employeeInfo->state->state_name;

                                } 
                            @endphp

                            </td>
                    </tr>


                    <tr>
                        <th>City</th>
                        <td>
                            @php
                                if(isset($user->employeeInfo->employeeContact)){
                                    echo ($user->employeeInfo->employeeContact->city)?$user->employeeInfo->employeeContact->city->city_name:'';

                                } 
                            @endphp

                            </td>
                    </tr>
                    <tr>
                        <th>Emergency Contact Name</th>
                        <td>
                            @php
                                if(isset($user->employeeInfo->emergencyContact)){
                                    echo $user->employeeInfo->emergencyContact->emer_cont_Name;

                                } 
                            @endphp

                             </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8">
<div class="card">
<div class="card-body">
<div class="nav-tabs-navigation nav-tabs-left">
    <div class="nav-tabs-wrapper">
        <ul id="tabs" class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">Timetable</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#teacher-attendance" role="tab" aria-expanded="false">Attendance</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-expanded="false">Salary</a>
            </li>
        </ul>
    </div>
</div>
<div id="my-tab-content" class="tab-content ">
<div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
    <div class=" card-body">
        <div class="teacher_time_table"><div class="text-right">
            <a href="#" class="btn btn-secondary" data-id="tableteachertimetable" id="printTeacherTimetable">
                <span class="fa fa-print" ></span>
            </a>
        </div>
        <table class="table table-bordered table-striped  m-table m-table--border-metal m-table--head-bg-metal" id="tableteachertimetable">
            <thead class="text-center">
            <tr>
                
                @foreach($days as $day)
                <th style="width: 16%;">{{$day->name}}</th>
                @endforeach
                
            </tr>
            </thead>
            <tbody>

             @php $j=1; @endphp    
            @foreach($periods as $period) 


                @php $i=1; @endphp
             
                 @foreach($days as $day) 


                    @php
                    $startdate = '';
                    $subject = '';
                    $enddate = '';
                    $class_name = '';
                    $secton_name = '';
                    

                    if(isset($timatable[$j][$i])){
                        $startdate = date("h:i", strtotime($timatable[$j][$i]['time_start']));
                        $enddate = date("h:i", strtotime($timatable[$j][$i]['time_end']));
                        $class_name = $timatable[$j][$i]['class_name'];
                        $secton_name = $timatable[$j][$i]['section_name'];

                        $subject = $timatable[$j][$i]['subject'];
                    }

                    @endphp


                <td class="font text-center" >
                    
                    @if($subject!='')

                        <div class="text-center">
                        {{$startdate.' - '.$enddate}}
                        </div>
                        <div class="text-center mt-1"> 
                            <strong>{{$subject}}</strong>
                        </div>
                        <div class="text-center mt-1">
                           {{$class_name}} - {{$secton_name}} 
                        </div>
                    @else
                    <div class="minheight"  ></div>
                    @endif
                </td>

                @php $i++; @endphp
                 @endforeach
                 

            </tr>
              @php $j++; @endphp  
            @endforeach
             
            </tbody>
        </table>
        </div>
    </div>
</div>
<div class="tab-pane" id="teacher-attendance" role="tabpanel" aria-expanded="false">
                                <?php
                                $maxDays = date('t');

                                ?>

                                <div style="width:100%;overflow:auto; max-height:550px;">
                                    <table class="table table-striped" style="width:100%">
                                        <thead class="table-bordered position-static">
                                            <tr>
                                                <th>Day</th>
                                                <th>Check-In</th>
                                                <th>Check-Out</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @for ($i = 1; $i <= $maxDays; $i++)
                                                @php
                                                    $int = $i;

                                                    if (strlen($i) == 1) {
                                                        $int = '0' . $i;
                                                    }
                                                    $date = date('Y-m-' . $int);

                                                @endphp

                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>
                                                        {{ isset($monthadd[$date]) && $date == $monthadd[$date]['date'] && $monthadd[$date]['in_time'] != '00:00:00' ? $monthadd[$date]['in_time']: '' }}
                                                    </td>
                                                    <td>
                                                        {{ isset($monthadd[$date]) && $date == $monthadd[$date]['date'] && $monthadd[$date]['in_time'] != '00:00:00'? $monthadd[$date]['out_time']: '' }}
                                                    </td>
                                                    <td>
                                                        <span class="{{ isset($monthadd[$date]  ) && $date == $monthadd[$date]['date'] &&  $monthadd[$date]['status'] !=''? $monthadd[$date]['status'][1] : '-' }}">{{ isset($monthadd[$date]) && $date == $monthadd[$date]['date'] &&   $monthadd[$date]['status'] !='' ? $monthadd[$date]['status'][0] : '-' }}</span>
                                                    </td>

                                                    {{--<td>
                                                        <span class="{{ isset($monthadd[$date]) && $date == $monthadd[$date]['date'] ? $monthadd[$date]['status'][1] : '-' }}">{{ isset($monthadd[$date]) && $date == $monthadd[$date]['date'] ? $monthadd[$date]['status'][0] : '-' }}</span>
                                                    </td>--}}
                                                </tr>
                                            @endfor
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Day</th>
                                                <th>Check-In</th>
                                                <th>Check-Out</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
<div class="tab-pane" id="messages" role="tabpanel" aria-expanded="false">

    <div class="content" id="loadContent">

        <div class="card-body">
            {{--<div class="toolbar">
                <div class="form-group col-sm-2 select-wizard">
                    <select class="selectpicker" data-size="7"
                        data-style="btn btn-sm btn-outline-secondary btn-round"
                        title="Filter">
                        <option value="1">Invoice</option>
                        <option value="2">Payment</option>
                        <option value="3">Adjustment</option>
                    </select>
                </div>
                <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>--}}

            <table id="transactionsdatatable"
                   class="custom_border  table-hover  "
                   cellspacing="0" width="100%">
                <thead class="table-secondary">
                <tr>
                    <th>Date</th>
                    <th>
                        Type</th>
                    <th>No.</th>
                    <th>Pay period</th>
                    <th class="text-right">Amount paid</th>
                    <th class="text-right">Tot payable</th>
                    <th>Status</th>
                    <th class="disabled-sorting text-center">
                        Actions</th>
                </tr>
                </thead>

                <tbody>

                @if($transactions)

                    @foreach($transactions as $transaction)
                        @php


                            $amountPaid =$transaction->dr_Amt;

                           /* if($transaction->tr_Status=='Partail'){

                                $amountPaid =$transaction->dr_Amt;

                            }*/


                            $payable = $transaction->cr_Amt-$transaction->dr_Amt;
                            if ($transaction->tr_Type==2&&$transaction->tr_Status=='Partial'){

                               $payable= number_format($transaction->cr_Amt+$transaction->bl_Amt);
                                $amountPaid = $transaction->cr_Amt ;

                            }else if ($transaction->tr_Type==2&&$transaction->tr_Status=='Close'){

                               $payable= $transaction->dr_Amt+$transaction->bl_Amt;
                                $amountPaid = $transaction->dr_Amt ;

                            }
                        @endphp

                        <tr>
                            <td>{{date('d-m-Y' , strtotime($transaction->tr_Date))}}</td>
                            <td>{{$transaction->Type($transaction->tr_Type) }}</td>
                            <td>{{$transaction->tr_Id}}</td>
                            <td>{{$transaction->schedule_pay?date('d-m-Y', strtotime($transaction->schedule_pay->issue_date)):'' }}  to {{$transaction->schedule_pay?date('d-m-Y',strtotime($transaction->schedule_pay->due_Date)):'' }}</td>
                            <td class="text-right">&#8360 {{ number_format($amountPaid)}}</td>


                            <td class="text-right">&#8360 {{$payable}}</td>

                            <td class="text-muted text-info font-weight-bold">{{$transaction->tr_Status}}</td>
                            <td class="text-center">
                                <div class=" ">

                                        <button
                                                class=" btn btn-link  btn-sm paybillprint"
                                                type="button"
                                                id="dropdownMenuButton" data-transaction="{{$transaction->tr_Id}}"

                                                aria-expanded="false">
                                            Print
                                        </button>


                                </div>
                            </td>
                        </tr>
                    @endforeach


                @endif
                </tbody>
            </table>

        </div><!-- end content-->

    </div> <!-- end content -->

        @include('teacher.modals.print_payroll')

    {{--  Payrol schedule Model --}}

    <form id="FormpaySchedule" method="POST" action="{{url('add/Pay/statement')}}"  enctype="multipart/form-data">

        @include('teacher.modals.pay_schedule')





        <div class="mt-3  modal fade" id="overtime" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm ">

                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-id="overtime" >
                            <i class="fa fa-remove"></i>
                        </button>
                        <h5 class="title title-up">Add Overtime Pay</h5>
                    </div>
                    <div class="modal-body ">
                        <div class='row'>
                            <div class='col-lg-4 col-sm-12 form-group'>
                                <label>Overtime Rate (in PRs) / Hour</label>
                                <input type="number"  class="form-control" placeholder="" name="overtime_rate" id="overtime_rate" number="true"
                                       number="true" required>
                            </div>
                            <div class='col-lg-4 col-sm-12 form-group'>
                                <label>Working Hours / Day</label>
                                <input type="number" class="form-control" placeholder="" name="overtime_hours" id="overtime_hours" number="true"
                                       number="true" required>
                            </div>
                            <div class='col-lg-4 col-sm-12 form-group'>
                                <label>No of Days</label>
                                <input type="number" class="form-control" placeholder="" name="overtime_days"   id="overtime_days"  number="true"    required>
                            </div>
                            <input type="hidden" class="total_income" name="overtime_total"  id="overtime_total"   data-id="overtime">
                        </div>

                    </div>

                    <!--</div>-->
                    <div class="modal-footer">
                        <div class="">
                            <button type="submit" class="btn btn-success  btn-link model_close_save_overtime"  >Save</button>
                        </div>
                        <div class="">
                            <button type="button" data-dismiss="modal"  class="btn btn-danger   btn-link">Cancel</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade mt-3" id="vacation" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm">
                <div id="allowances_vacation">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <button type="button" class="close" data-id="vacation" aria-label="Close">
                                <i class="fa fa-remove"></i>
                            </button>
                            <h5 class="title title-up">Add Vacation Pay</h5>
                        </div>
                        <div class="modal-body ">
                            <div class='row'>
                                <div class='col-lg-4 col-sm-12 form-group'>
                                    <label>Pay Rate (in PRs) / Day</label>
                                    <input type="number" class="form-control calculate_vacation" placeholder="" id="vacation_Pay_Rate" name="vacation_Pay_Rate" number="true"
                                           number="true">
                                </div>
                                <div class='col-lg-4 col-sm-12 form-group'>
                                    <label>No of Days</label>
                                    <input type="number" class="form-control calculate_vacation" placeholder="" name="vacation_No_of_Days" id="vacation_No_of_Days" number="true"
                                           number="true">
                                </div>
                                <div class='col-lg-4 col-sm-12 form-group'>
                                    <label>Amount </label>
                                    <input type="text" class="form-control total_income" readonly placeholder="" id="vacation_total" data-id="vacation" name="vacation_total" number="true"/>

                                </div>

                            </div>

                        </div>

                        <!--</div>-->
                        <div class="modal-footer">
                            <div class="">
                                <button type="submit" class="btn btn-success model_close_save_vacation  btn-link">Save</button>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-danger  btn-link"  data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="mt-3 modal fade" id="bonus" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm">
                <div id="allowances_bonus">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <button type="button" class="close" data-id="bonus" >
                                <i class="fa fa-remove"></i>
                            </button>
                            <h5 class="title title-up">Add Bonus</h5>
                        </div>
                        <div class="modal-body ">
                            <div class='row'>
                                <div class='col-lg-6 col-sm-12'>
                                    <label>Choose Value</label>
                                    <select class="selectpicker" data-size="7" name="bonus_type" id="bonus_type"  data-style="btn btn-secondary"
                                            title="Select Billing Scgedule">
                                        <option value="" disabled >Select</option>
                                        <option value="1" selected>% of Base Pay</option>
                                        <option value="2">Amount</option>
                                    </select>
                                </div>
                                <div class='col-lg-6 col-sm-12 form-group'>
                                    <label>Amount </label>

                                    <input type="text" class="form-control" placeholder="" name="bonus_amout" id="bonus_amout" number="true"
                                           number="true">

                                    <input type="hidden" class="form-control total_income"  placeholder="" id="bonus_total" data-id="bonus" name="bonus_total" number="true"/>

                                </div>

                            </div>

                        </div>

                        <!--</div>-->
                        <div class="modal-footer">
                            <div class="">
                                <button type="submit" class="btn btn-success  btn-link model_close_save_bonus" data-id="bonus">Save</button>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-danger  btn-link"  data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 modal fade" id="commission" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm">
                <div id="allowances_commission">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <button type="button" class="close" data-id="commission">
                                <i class="fa fa-remove"></i>
                            </button>
                            <h5 class="title title-up">Add Commission</h5>
                        </div>
                        <div class="modal-body ">
                            <div class='row'>
                                <div class='col-lg-6 col-sm-12'>
                                    <label>Choose Value</label>
                                    <select class="selectpicker"  name="commission_type" id="commission_type"  data-size="7" data-style="btn btn-secondary"
                                            title="Select Billing Scgedule">
                                        <option value="" disabled >Select</option>
                                        <option value="1" selected>% of Base Pay</option>
                                        <option value="2">Amount</option>
                                    </select>
                                </div>
                                <div class='col-lg-6 col-sm-12 form-group'>
                                    <label>Amount </label>
                                    <input type="text" class="form-control" placeholder="" name="commission_amout" id="commission_amout" number="true" >


                                    <input type="hidden" class="form-control total_income" id="commission_total" data-id="commission" name="commission_total" />

                                </div>

                            </div>

                        </div>

                        <!--</div>-->
                        <div class="modal-footer">
                            <div class="">
                                <button type="submit" class="btn btn-success  btn-link model_close_save_commission" data-id="commission" >Save</button>
                            </div>
                            <div class="">
                                <button type="button" data-dismiss="modal" class="btn btn-danger  btn-link">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 modal fade" id="medical" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm">
                <div id="allowances_medical">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <button type="button" class="close" data-id="medical" >
                                <i class="fa fa-remove"></i>
                            </button>
                            <h5 class="title title-up">Add Medical Allowance</h5>
                        </div>
                        <div class="modal-body ">
                            <div class='row'>
                                <div class='col-lg-6 col-sm-12'>
                                    <label>Choose Value</label>
                                    <select class="selectpicker" data-size="7" name="medical_type" id="medical_type" data-style="btn btn-secondary"
                                            title="Select Billing Scgedule">
                                        <option value="" disabled >Select</option>
                                        <option value="1" selected>% of Base Pay</option>
                                        <option value="2">Amount</option>
                                    </select>
                                </div>
                                <div class='col-lg-6 col-sm-12 form-group'>
                                    <label>per pay period </label>

                                    <input type="text" class="form-control" placeholder="" name="medical_amout" id="medical_amout" number="true" >


                                    <input type="hidden" class="form-control total_income" id="medical_total" data-id="medical" name="medical_total" />

                                </div>

                            </div>

                        </div>

                        <!--</div>-->
                        <div class="modal-footer">
                            <div class="">
                                <button type="submit" class="btn btn-success  btn-link model_close_save_medical"  data-id="medical" >Save</button>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-danger  btn-link"  data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 modal fade" id="house" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm">
                <div id="allowances_house">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <button type="button" class="close" data-id="house">
                                <i class="fa fa-remove"></i>
                            </button>
                            <h5 class="title title-up">Add House Allowance</h5>
                        </div>
                        <div class="modal-body ">
                            <div class='row'>
                                <div class='col-lg-6 col-sm-12'>
                                    <label>Choose Value</label>
                                    <select class="selectpicker" name="house_type" id="house_type" data-size="7" data-style="btn btn-secondary"
                                            title="Select Billing Scgedule">
                                        <option value="" disabled >Select</option>
                                        <option value="1" selected>% of Base Pay</option>
                                        <option value="2">Amount</option>
                                    </select>
                                </div>
                                <div class='col-lg-6 col-sm-12 form-group'>
                                    <label>per pay period </label>

                                    <input type="text" class="form-control" placeholder="" name="house_amout" id="house_amout" number="true" >


                                    <input type="hidden" class="form-control total_income" id="house_total" data-id="house" name="house_total" />

                                </div>

                            </div>

                        </div>

                        <!--</div>-->
                        <div class="modal-footer">
                            <div class="">
                                <button type="submit" class="btn btn-success  btn-link model_close_save_house"  data-id="house" >Save</button>

                            </div>
                            <div class="">
                                <button type="button" class="btn btn-danger  btn-link" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 modal fade" id="convayance" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm">
                <div id="allowances_convayance">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <button type="button" class="close" data-id="convayance">
                                <i class="fa fa-remove"></i>
                            </button>
                            <h5 class="title title-up">Add Conveyance Allowance</h5>
                        </div>
                        <div class="modal-body ">
                            <div class='row'>
                                <div class='col-lg-6 col-sm-12'>
                                    <label>Choose Value</label>
                                    <select class="selectpicker" name="convayance_type" id="convayance_type" data-size="7" data-style="btn btn-secondary"
                                            title="Select Billing Scgedule">
                                        <option value="" disabled >Select</option>
                                        <option value="1" selected>% of Base Pay</option>
                                        <option value="2">Amount</option>
                                    </select>
                                </div>
                                <div class='col-lg-6 col-sm-12 form-group'>
                                    <label>per pay period </label>

                                    <input type="text" class="form-control" placeholder="" name="convayance_amout" id="convayance_amout" number="true" >

                                    <input type="hidden" class="form-control total_income" id="convayance_total" data-id="convayance" name="convayance_total" />
                                </div>

                            </div>

                        </div>

                        <!--</div>-->
                        <div class="modal-footer">
                            <div class="">
                                <button type="submit" class="btn btn-success  btn-link model_close_save_convayance" data-id="convayance">Save</button>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-danger  btn-link" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 modal fade" id="education" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm">
                <div id="allowances_education">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <button type="button" class="close" data-id="education">
                                <i class="fa fa-remove"></i>
                            </button>
                            <h5 class="title title-up">Add Education Allowance</h5>
                        </div>
                        <div class="modal-body ">
                            <div class='row'>
                                <div class='col-lg-6 col-sm-12'>
                                    <label>Choose Value</label>
                                    <select class="selectpicker" name="education_type" id="education_type" data-size="7" data-style="btn btn-secondary"
                                            title="Select Billing Scgedule">
                                        <option value="" disabled >Select</option>
                                        <option value="1" selected>% of Base Pay</option>
                                        <option value="2">Amount</option>
                                    </select>
                                </div>
                                <div class='col-lg-6 col-sm-12 form-group'>
                                    <label>per pay period </label>

                                    <input type="text" class="form-control" placeholder="" name="education_amout" id="education_amout" number="true" >

                                    <input type="hidden" class="form-control total_income" id="education_total" data-id="education" name="education_total" />


                                </div>

                            </div>

                        </div>

                        <!--</div>-->
                        <div class="modal-footer">
                            <div class="">
                                <button type="submit" class="btn btn-success  btn-link model_close_save_education" data-id="education">Save</button>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-danger  btn-link" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-3 modal fade" id="utility" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm">
                <div id="allowances_utility">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <button type="button" class="close" data-id="utility" >
                                <i class="fa fa-remove"></i>
                            </button>
                            <h5 class="title title-up">Add Utility Allowance</h5>
                        </div>
                        <div class="modal-body ">
                            <div class='row'>
                                <div class='col-lg-6 col-sm-12'>
                                    <label>Choose Value</label>
                                    <select class="selectpicker" data-size="7" data-style="btn btn-secondary"
                                            title="Select Billing Scgedule"  name="utility_type" id="utility_type">
                                        <option value="" disabled >Select</option>
                                        <option value="1" selected>% of Base Pay</option>
                                        <option value="2">Amount</option>
                                    </select>
                                </div>
                                <div class='col-lg-6 col-sm-12 form-group'>
                                    <label>per pay period </label>
                                    <input type="text" class="form-control" placeholder="" name="utility_amout" id="utility_amout" number="true" >

                                    <input type="hidden" class="form-control total_income" id="utility_total" data-id="utility" name="utility_total" />

                                </div>

                            </div>

                        </div>

                        <!--</div>-->
                        <div class="modal-footer">
                            <div class="">
                                <button type="submit" class="btn btn-success  btn-link model_close_save_utility"  >Save</button>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-danger  btn-link" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 modal fade" id="arear" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm">

                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-id="arear">
                            <i class="fa fa-remove"></i>
                        </button>
                        <h5 class="title title-up">Add Arrears</h5>
                    </div>
                    <div class="modal-body ">
                        <div class='row'>
                            <div class='col-lg-12 col-sm-12 form-group'>
                                <label>Arrears Amount </label>
                                <input type="text" class="form-control total_income" placeholder="" name="arear_total"  data-id="arear" id="arear_total" number="true">
                            </div>

                        </div>

                    </div>

                    <!--</div>-->
                    <div class="modal-footer">
                        <div class="">
                            <button type="submit" class="btn btn-success model_close_save_arear  btn-link" data-id="arear" >Save</button>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-danger  btn-link" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class=" mt-3 modal fade" id="dearall" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm">
                <div id="allowances_dearall">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <button type="button" class="close" data-id="dearall">
                                <i class="fa fa-remove"></i>
                            </button>
                            <h5 class="title title-up">Add Dearness Allowance</h5>
                        </div>
                        <div class="modal-body ">
                            <div class='row'>
                                <div class='col-lg-6 col-sm-12'>
                                    <label>Choose Value</label>
                                    <select class="selectpicker"  name="dearall_type" id="dearall_type" data-size="7" data-style="btn btn-secondary"
                                            title="Select Billing Scgedule">
                                        <option value="" disabled >Select</option>
                                        <option value="1" selected>% of Base Pay</option>
                                        <option value="2">Amount</option>
                                    </select>
                                </div>
                                <div class='col-lg-6 col-sm-12 form-group'>
                                    <label>per pay period </label>

                                    <input type="text" class="form-control" placeholder="" name="dearall_amout" id="dearall_amout" number="true" >
                                    <input type="hidden" class="form-control total_income" id="dearall_total" data-id="dearall" name="dearall_total" />
                                </div>

                            </div>

                        </div>

                        <!--</div>-->
                        <div class="modal-footer">
                            <div class="">
                                <button type="submit" class="btn btn-success  btn-link model_close_save_dearall" data-id="dearall" >Save</button>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-danger  btn-link" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="mt-3 modal fade" id="advance" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm">
                <div id="allowances_advance">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <button type="button" class="close" data-id="advance">
                                <i class="fa fa-remove"></i>
                            </button>
                            <h5 class="title title-up">Grant advance salary</h5>
                        </div>


                        <div class="modal-body ">
                            <div class="row">
                                <div class='col-lg-4 col-sm-12 form-group'>

                                    <select id="schedule_advanc" name="schedule_advanc" class="selectpicker">


                                    </select>

                                    <div class="add-div-error schedule_advancerrorsss"></div>
                                </div>


                            </div>
                            <div class='row'>

                                <input type="hidden" name="advance_id" id="advance_id" value="">
                                <div class='col-lg-4 col-sm-12 form-group'>
                                    <label>Advance Amount </label>
                                    <input type="text" class="form-control" placeholder="" name="advance_amount"  id="sadvance_amount" number="true"  readonly  value="">
                                </div>
                                <div class='col-lg-4 col-sm-12 form-group'>
                                    <label>No of Installments </label>
                                    <input type="text" class="form-control"  placeholder="" name="Installments" id="sInstallments"  value=""  readonly>
                                </div>
                                <div class='col-lg-4 col-sm-12 form-group'>
                                    <label>Amount per pay period </label>

                                    <input type="text" data-id="advance" class="form-control deduction_total" placeholder="" id="samount_per_pay_peroid"  name="amount_per_pay_peroid" readonly number="true"  value="">


                                    <input type="hidden" name="advance_total" id="sadvance_total" value="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="">
                                <button type="submit" class="btn btn-success  btn-link deductions_advance_salary_close" >Save</button>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-danger  btn-link" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <div class="mt-3 modal fade" id="taxe" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm">
                <div id="allowances_taxe">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <button type="button" class="close" data-id="taxe">
                                <i class="fa fa-remove"></i>
                            </button>
                            <h5 class="title title-up">Add Income Tax</h5>
                        </div>
                        <div class="modal-body ">
                            <div class='row'>
                                <div class='col-lg-6 col-sm-12'>
                                    <label>Choose Value</label>
                                    <select class="selectpicker" data-size="7" data-style="btn btn-secondary"
                                            title="Select Billing Scgedule" name="taxe_type" id="taxe_type">
                                        <option value="" disabled >Select</option>
                                        <option value="1" selected>% of Base Pay</option>
                                        <option value="2">Amount</option>
                                    </select>
                                </div>
                                <div class='col-lg-6 col-sm-12 form-group'>
                                    <label>per pay period </label>

                                    <input type="text" class="form-control" placeholder="" name="taxe_amout" id="taxe_amout" number="true" >

                                    <input type="hidden" class="form-control deduction_total" id="taxe_total" data-id="taxe" name="taxe_total" />

                                </div>

                            </div>

                        </div>

                        <!--</div>-->
                        <div class="modal-footer">
                            <div class="">
                                <button type="submit" class="btn btn-success  btn-link model_close_save_taxe" data-id="taxe" >Save</button>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-danger  btn-link" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 modal fade" id="providant" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-id="providant">
                            <i class="fa fa-remove"></i>
                        </button>
                        <h5 class="title title-up">Add General Provident Fund</h5>
                    </div>
                    <div class="modal-body ">
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="">Employee Share</h6>
                                <div class='row'>
                                    <div class='col-lg-6 col-sm-12'>
                                        <label>Choose Value</label>
                                        <select class="selectpicker" data-size="7" data-style="btn btn-secondary"
                                                title="Select Billing Scgedule">
                                            <option value="" disabled >Select</option>
                                            <option value="1" selected>% of Base Pay</option>
                                            <option value="2">Amount</option>
                                        </select>
                                    </div>
                                    <div class='col-lg-6 col-sm-12 form-group'>
                                        <label>per pay period</label>
                                        <input type="text" class="form-control" placeholder="" name="houseallow" number="true"
                                               number="true">
                                    </div>

                                </div>
                            </div>
                            <!--                                              <div class="divider-auto"></div>-->
                            <div class="col-sm-6">
                                <h6 class="">Employer Share</h6>
                                <div class='row'>
                                    <div class='col-lg-6 col-sm-12'>
                                        <label>Choose Value</label>
                                        <select class="selectpicker" data-size="7" data-style="btn btn-secondary"
                                                title="Select Billing Scgedule">
                                            <option value="" disabled >Select</option>
                                            <option value="1" selected>% of Base Pay</option>
                                            <option value="2">Amount</option>
                                        </select>
                                    </div>
                                    <div class='col-lg-6 col-sm-12 form-group'>
                                        <label>per pay period</label>
                                        <input type="text" class="form-control" placeholder="" name="houseallow" number="true"
                                               number="true">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--</div>-->
                    <div class="modal-footer">
                        <div class="">
                            <button type="submit" class="btn btn-success  btn-link" data-dismiss="modal">Save</button>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-danger  btn-link">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="mt-3 modal fade" id="gratuity" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-id="gratuity">
                            <i class="fa fa-remove"></i>
                        </button>
                        <h5 class="title title-up">Add Gratuity</h5>
                    </div>
                    <div class="modal-body ">
                        <div class='row'>

                            <div class='col-lg-3 col-sm-12 form-group'>
                                <label>Gross pay (in PRs)</label>
                                <input type="text" class="form-control" placeholder="30,000" name="houseallow" number="true"
                                       number="true">
                            </div>
                            <div class='col-lg-3 col-sm-12 form-group'>
                                <label>pay per day (in PRs)</label>
                                <input type="text" class="form-control" placeholder="1,153" name="houseallow" number="true"
                                       number="true">
                            </div>
                            <div class='col-lg-3 col-sm-12 form-group'>
                                <label>Years of service </label>
                                <input type="text" class="form-control" placeholder="7" name="houseallow" number="true"
                                       number="true">
                            </div>
                            <div class='col-lg-3 col-sm-12 form-group'>
                                <label>YTD Gratuity (in PRs)</label>
                                <input type="text" class="form-control" placeholder="242,307" name="houseallow" number="true"
                                       number="true">
                            </div><br>

                        </div>
                        <div class="">
                            <div class="col-sm-12 form-check col-lg-12  ">
                                <label class="form-check-label ">
                                    <input class="form-check-input  " type="checkbox" name="optionCheckboxes" data-toggle="modal"
                                           data-target="#">
                                    <span class="form-check-sign "></span>
                                    Check if status is inactive
                                </label>
                            </div>
                        </div>

                    </div>

                    <!--</div>-->
                    <div class="modal-footer">
                        <div class="">
                            <button type="submit" class="btn btn-success  btn-link" data-dismiss="modal">Save</button>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-danger  btn-link">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>




    <!-- end extra pay allowances -->







    {{--  Adjust Payrol  Model --}}
{{--    @include('accountPortal.modals.payadjusts_payment')--}}

    {{--  Generate Payrol schedule Model --}}
{{--    @include('accountPortal.modals.paygenerate_schedule')--}}

    {{--  paymake Payment Payrol schedule Model --}}
{{--    @include('accountPortal.modals.paymake_payment')--}}

    {{--  Statement  Payrol  Model --}}

   {{-- @include('accountPortal.modals.emp_statements')--}}

    {{--  Advance Salary   Payrol  Model --}}
{{--    @include('accountPortal.modals.advanceSalary')--}}


</div>
</div>
</div>
</div>
</div>

<div class="col-xl-9 col-lg-8 card">
</div>
</div>

</div>

@endsection


@section('front_script')
    <script src="{{asset('js/teacher.js')}}"></script>
    <script type="text/javascript">
      
        $(document).ready( function(){

            $("#printTeacherTimetable").click(function(){
                
                var $this = $(this);
                var id = $this.data('id');
               
                printDiv(id);



            })

        })

       function printDiv(divName) {
             var divToPrint=document.getElementById(divName);
             newWin= window.open("");
             newWin.document.write(divToPrint.outerHTML);
             newWin.print();
             newWin.close();
          } 

    </script>

@endsection




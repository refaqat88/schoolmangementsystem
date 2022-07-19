@extends('layouts.master')
@section('title', 'Withdraw Student')
@section('content')
<style type="text/css">
    .add-div-error{ color: red; }

</style>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form id="Withdrawal" action="{{url('withdrawl-student')}}" method="Post">
                    @csrf
                    <input type="hidden" name="std_id" value="{{$student->id}}">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Withdraw Student</h4>
                        </div>
                        <div class="card-body">
                            <div class="row bor-sep">
                                <h6 class="col-sm-12">Withdrawal Information</h6>
                                <div class="form-group col-sm-4">
                                    @php
                                    $adm_Session='';
                                    $adm_Number='';
                                    if($student->studentinfo){
                                        if($student->studentinfo->admission){
                                            $adm_Number= $student->studentinfo->admission->adm_Number;
                                            $adm_Session= $student->studentinfo->admission->adm_Session;
                                        }
                                    }

                                    @endphp
                                    <label>Admission No</label>
                                    <input type="text" class="form-control" placeholder="" value="{{$adm_Number}}" name="admno" readonly="true">
                                      <div class="add-div-error admno errorsss"></div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Date</label>
                                    <input type="text" class="form-control datepicker" placeholder="" value="" name="withdraw_date" required="true">
                                   <div class="add-div-error withdraw_date errorsss"></div>

                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Session</label>
                                    <input type="text" class="form-control" placeholder="" value="{{$adm_Session}}" name="adm_session" readonly="true" >
                                    <div class="add-div-error adm_session errorsss"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Remarks</label>
                                    <textarea id="" class="form-control" name="remarks" rows="1" cols="33" required="true"></textarea>
                                    <div class="add-div-error remarks errorsss"></div>
                                </div>
                                 
                            </div>
                            <div class="card-footer text-right">
                                <div class="form-check pull-left">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="Active" @if($student->status=='Active') checked @endif name="optionCheckboxes">
                                        <span class="form-check-sign"></span>
                                        Uncheck if student is active
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-round btn-secondary btn-danger">Withdraw</button>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="card-title">Students Record List</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="toolbar">
                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                            </div>
                                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Admission.No</th>
                                                    <th>Full Name</th>
                                                    <th>Security Refundable</th>
                                                    <th>Dues</th>
                                                    <th>Security Payable</th>
                                                    <th class="disabled-sorting text-center">Actions</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>Admission.No</th>
                                                    <th>Full Name</th>
                                                    <th>Security Refundable</th>
                                                    <th>Dues</th>
                                                    <th>Security Payable</th>
                                                    <th class="disabled-sorting text-center">Actions</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <tr>
                                                    @php
                                                    $amount = 0;
                                                     $due = $student->openBalance($student->id);
                                                    @endphp 
                                                    <td>    {{$adm_Number}}</td>
                                                    <td>    {{$student->name}}</td>
                                                    <td>    {{$acocuntsdata? number_format($acocuntsdata['amount']):''}}</td>
                                                    <td>    {{  $due!=0? number_format($due):'0'}}</td>
                                                    <td>    @php
                                                            $amounst=0; 
                                                            if($acocuntsdata){
                                                                
                                                                $security=$acocuntsdata?$acocuntsdata['amount']:'';
                                                                $amount = $security-$due;
                                                                $amounst = $due-$security;
                                                                echo $amount>0? number_format($amount):0;
                                                            }else{
                                                                $amount = 0;
                                                                echo $amount;
                                                            }
                                                        @endphp
                                                    </td>
                                                    <input type="hidden" name="total" value="{{$acocuntsdata?$amounst:0}}" />
                                                    <td class="text-center">
                                                        <div class="form-check ">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="mark" @if($amounst==0) checked @endif name="mark">
                                                                <span class="form-check-sign"></span>
                                                                 
                                                            </label>
                                                             <div class="add-div-error mark errorsss"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div><!-- end content-->
                                    </div><!--  end card  -->
                                </div> <!-- end col-md-12 -->
                            </div> <!-- end row -->

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@section('front_script')
    <script src="{{asset('js/select2.js')}}"></script>
     
    <script src="{{asset('js/admission_script.js')}}"></script>
  
     
@endsection

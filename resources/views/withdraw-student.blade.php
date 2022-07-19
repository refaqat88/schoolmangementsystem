@extends('layouts.master')
@section('title', 'Withdraw Student')
@section('content')
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
                                    <label>Admission No</label>
                                    <input type="text" class="form-control" placeholder="" value="{{$student->studentinfo?$student->studentinfo->admission->adm_Number:''}}" name="adm_Number" readonly="true">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Date</label>
                                    <input type="text" class="form-control datepicker" placeholder="" value="{{$student->studentinfo?$student->studentinfo->admission->adm_Date:''}}" name="adm_Date" required="true">

                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Session</label>
                                    <input type="text" class="form-control" placeholder="" value="{{$student->studentinfo?$student->studentinfo->admission->adm_Session:''}}" name="adm_session" readonly="true" >
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Remarks</label>
                                    <textarea id="" class="form-control" name="commentslc" rows="1" cols="33" required="true"></textarea>
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
                                                    <td>{{$student->studentinfo?$student->studentinfo->admission->adm_Number:''}}</td>
                                                    <td>{{$student->name}}</td>
                                                    <td>{{$acocuntsdata?$acocuntsdata['amount']:''}}</td>
                                                    <td>{{$student->openBalance($student->id)}}</td>
                                                    <td>@php 
                                                        if($acocuntsdata){
                                                        $due = $student->openBalance($student->id);
                                                        $security=$acocuntsdata?$acocuntsdata['amount']:'';
                                                        echo abs($due-$security);
                                                        }else{
                                                            echo '0';
                                                        }
                                                        @endphp
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" title="Clear Dues" class="btn btn-success btn-link btn-icon btn-sm"><i class="fa fa-check"></i></a>
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

@extends('layouts.master') @section('title', 'Students') @section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <form id="RegisterValidation"  action="{{url('students')}}" method="">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Students</h4> </div>
                    <div class="card-body">
                        <div class="row bor-sep">

                            <div class="col-sm-12 col-lg-12 pull-right">
                                <a type="button" class="btn btn-secondary btn-round float-right"  href="{{url('admission')}}">Add New</a>
                            </div>
                        </div>
                         

                        <div class="row">
                            <div class="col-md-12">  @if(session()->has('message')) 
                                <div class="alert alert-danger"> {{ session()->get('message') }}  
                                 </div> @endif 
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title">Students Record List</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="toolbar">
                                             
                                             <div class="row col-sm-12">
{{--                                                 <label class="font-weight-bold">Filter by: </label>--}}
                                                <div class="col-sm-12 col-lg-auto col-md-auto">
                                                    <select class="selectpicker filter_students" id="student_Session" data-size="5" name="session_no" data-style="btn btn-sm btn-secondary btn-round" title="session" required="true">
                                                        <option value="" disabled>Session</option>
                                                        <option value="all" >All</option>
                                                        @foreach($sessions as $session)
                                                            <option value="{{$session->adm_Session}}">{{ $session->adm_Session }}</option> 
                                                        @endforeach 
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-lg-auto col-md-auto ">
                                                    <select class="selectpicker filter_students" id="student_Class" data-size="5" name="class_name" data-style="btn btn-sm btn-secondary btn-round" title="class" required="true">
                                                        <option value="" disabled>Class</option>
                                                        <option value="all" >All</option>
                                                        @foreach($classes as $class)
                                                            <option value="{{$class->cls_Id}}">{{$class->class}}</option> 
                                                        @endforeach 
                                                    </select>
                                                </div>

                                                <div class="col-sm-12 col-lg-auto col-md-auto">
                                                    <select class="selectpicker filter_students" id="student_shift" data-size="5" name="class_shift" data-style="btn btn-sm btn-secondary btn-round" title="shift" required="true">
                                                        <option value="" disabled>Shift</option>
                                                        <option value="all" >All</option>
                                                        <option value="morning" >Morning</option>
                                                        <option value="evening" >Evening</option>
                                                    </select>
                                                </div>
                                            </div>

                                            
                                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                                        </div>
                                        <div class="row ml-2">
                                            <div class="container-fluid" id="student-record-list" hidden>
                                                <div class="col-md-12 mb-2">
                                                    <h3 class='text-center font-weight-bolder mb-1' id="schName">Governor Model School</h3>
                                                    <h5 class='text-center' Class="school-add"> District <span class="sch-district"></span></h5>  
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-4"> 
                                                        <img src="{{url('upload/school/logo/'.$school->school_logo)}}" alt="" width="120px" height="120px" style='border-style:none'> 
                                                    </div>
                                                    <div class="col-md-4 text-center">
                                                        <h4 class="font-weight-bold">Student Records List</h4>
                                                    </div>
                                                
                                                    <div class="col-md-4 flex-row flex d-inline-flex">
                                                        <p for="" class='mx-3 text-left font-weight-bold'>Shift:</p>
                                                        <input type="checkbox" name="select_all" value="1" id="example-select-all">
                                                        <label class="font-weight-normal mx-2">Morning</label>
                                                        <input type="checkbox" name="select_all" value="1" id="example-select-all">
                                                        <label class='font-weight-normal mx-2 '>Night</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>
                                        
                                        @include('partials.student_data')
                                        </div>
                                        <!-- end content-->
                                    </div>
                                    <!--  end card  -->
                                </div>
                                <!-- end col-md-12 -->
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
            </form>
            </div>
        </div>


    </div> 


    <div class="modal fade nopadd" data-backdrop="static" id="admission_form" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">   
        <div class="modal-full modal-dialog modal-xl">
            <div class="modal-content" >
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-remove"></i> </button>
                </div>
                <div class="modal-body row" id="viewStudentdata">
                </div>
            </div>
        </div>

    </div>  
    

    @endsection 

    @section('front_script')
    
     <script src="{{asset('js/students_portal.js')}}"></script>

  
     
    @endsection
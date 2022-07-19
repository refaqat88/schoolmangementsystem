@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                    <div class="alert success-message">
                    </div>

                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Staff</h4>
                        </div>
                        <div class="card-body">
                            <div class="row bor-sep">

                                <div class="col-sm-12 col-lg-12 pull-right">
                                    <a type="button" class="btn btn-secondary btn-round float-right"  href="{{url('appointment')}}">Add New</a>
                                </div>
                            </div>
                            <form id="RegisterValidation" action="{{url('employee-filter')}}" method="post">
                                @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="card-title">Staff Record List</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="toolbar">

                                                <div class="row col-sm-12">

                                                    <div class="form-group col-sm-2 select-wizard">
                                                        <select class="selectpicker filter_staff" data-size="5" id="employee_status" data-style="btn btn-sm btn-secondary btn-round"
                                                                title="Status" required="true">
                                                            <option value="" disabled >Status</option>
                                                            <option value="all">All</option>
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive">Inactive</option>

                                                        </select>
                                                    </div>

                                                    <div class="form-group col-sm-2 select-wizard">
                                                        <select class="selectpicker filter_staff" id="employee_type" data-size="5" name="employee_type" data-style="btn btn-sm btn-secondary btn-round" title="Employee Type" required="true">
                                                            <option value="" disabled>Employee Type</option>
                                                            <option value="all">All</option>
                                                            @foreach($employeeTypes as $emptype)

                                                            <option value="{{$emptype->emp_typ_Id}}" >{{$emptype->emp_Type}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>



                                                </div>





                                                <div class="row">
                                                    {{--<div class="col-sm-12 float-right">
                                                        <button
                                                                class="btn btn-simple btn-tumblr btn-icon float-right"><i
                                                                    class="fa fa-print"
                                                                    title="Print"
                                                                    data-toggle=""></i></button>
                                                        <button
                                                                class="btn btn-simple btn-tumblr btn-icon float-right"><i
                                                                    class="fa fa-file-excel-o"
                                                                    title="Export to Excel"
                                                                    data-toggle=""></i></button>
                                                    </div>--}}
                                                </div>
                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                            </div>

                                            @include('staff.partials.staff_data')

                                        </div><!-- end content-->
                                    </div><!--  end card  -->
                                </div> <!-- end col-md-12 -->
                            </div> <!-- end row -->
                            </form>

                        </div>

                         
                    </div>

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
    <script src="{{asset('js/employee_script.js')}}"></script>
    
    
     
@endsection

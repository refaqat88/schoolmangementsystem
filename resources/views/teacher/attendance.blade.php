@extends('layouts.master')
@section('title', 'Teacher Class Attendance')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="alert success-message"></div>
                <form id="RegisterValidation" action="" method="post">
                    @csrf
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">View Attendance</h4>
                        </div>
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 class="card-title">Attendance List</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="toolbar">
                                            </div>
                                            @include("teacher.partials.attendence") 
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
    {{--show Attendance Modal--}}
    <div class="modal fade" id="show-attendance-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-sm">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-remove"></i> </button>
                    <h5 class="title title-up">Attendance Sheet</h5> </div>
                <div class="modal-body row" id="date-sheet-content">
                    <div class="col-sm-12">
                        <div class="nav-tabs-navigation nav-tabs-left">
                            <div class="nav-tabs-wrapper">
                                <ul id="tabs" class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#std-attend" role="tab" aria-expanded="true">Attendence</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#std-achieve" role="tab" aria-expanded="false">Achievement</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#std-behav" role="tab" aria-expanded="false">Behaviour</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label><b>Date:</b></label><span id="show-attendance-date"></span>
                            </div>
                            <div class="col-sm-4">
                                <label><b>Class:</b></label><span id="show-attendance-class"></span> </div>
                            <div class="col-sm-4">
                                <b><b></b>Section:</b></label><span id="show-attendance-section"></span>
                            </div>
                        </div>
                        <br>
                        <div id="my-tab-content" class="tab-content ">
                            <div class="tab-pane active" id="std-attend" role="tabpanel" aria-expanded="true">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div id="attenceContainer">
                                            <h6>Attendence</h6>
                                            <table class="table table-bordered table-hover" id="show-attendance-table">
                                                <thead class="text-secondary">
                                                    <th>Student</th>
                                                    <th>Attendance</th>
                                                </thead>
                                                <tbody>
                                                    <tr id="show-attendance-row">
                                                        <th>Student</th>
                                                        <th>Attendance</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="std-achieve" role="tabpanel" aria-expanded="true">
                                <div class="row">
                                    <div class="col-sm-12"> 
                                        <div id="achieveContainer">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="std-behav" role="tabpanel" aria-expanded="true">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="bavContainer">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--</div>-->
                <div class="modal-footer">
                    {{--<div class="">
                        <button type="button" class="btn btn-secondary btn-round btn-link attendance-pdf">Export Attendance Sheet</button>
                    </div>--}}
                   {{-- <div class="divider"></div>--}}
                    <div class="">
                        <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--show Attendance Modal End--}}
    {{--show Date Wise Attendance Modal--}}
    <div class="modal fade" id="show-datewise-attendance-modal" tabindex="-1" role="dialog"
         aria-labelledby="ModalLabel" aria-hidden="true" style="overflow-y: auto; overflow-x: auto;">
        <div class="modal-dialog modal-lg modal-sm">

            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up">Attendance Sheet Date Wise</h5>

                </div>
                <div class="modal-body row"   id="datewise-atttendance-sheet-content">
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <label>From Date:</label><span id="show-datewise-attendance-date"></span>
                        </div>
                        <div class="col-md-3">
                            <label>To Date:</label><span id="show-datewise-attendance-to-date"></span>
                        </div>
                        <div class="col-md-3">
                            <label>Class:</label><span id="show-datewise-attendance-class"></span>
                        </div>
                        <div class="col-md-3">
                            <label>Section:</label><span id="show-datewise-attendance-section"></span>
                        </div>

                        <table class="table table-bordered table-hover"  id="show-datewise-attendance-table">

                            <thead class="text-secondary">
                            <th>Roll#</th>
                            <th>Student</th>
                            <th>Attendance</th>
                            </thead>
                            <tbody>
                            <tr id="show-attendance-row">

                                <th>Roll#</th>
                                <th>Student</th>
                                <th>Attendance</th>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <!--</div>-->
                <div class="modal-footer">
                    <div class="">
                        <button type="button" class="btn btn-secondary btn-round btn-link datewise-attendance-pdf" >Export Attendance Sheet</button>
                    </div>
                    <div class="divider"></div>
                    <div class="">
                        <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--show Date Wise Attendance Modal End--}}
    {{--Select Date Wise Attendance Modal Start--}}
    <div class="modal fade" id="edit-attendance-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up"><a>Select Date Wise Attendance</a></h5>
                </div>
                <form id="date-wise-attendance-form">
                 @csrf
                 <input type="hidden" name="id" id="edit-attendance-id">

                <div class="modal-body row">
                    <div class="form-group col-sm-6">
                        <label>From Date</label>
                        <select class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" name="from_date" title="Select From Date" >
                            <option value="" disabled selected>Select From Date</option>
                            @foreach($attendance_from_dates as $attendance_from_date)
                            <option value="{{$attendance_from_date->date_register}}">{{$attendance_from_date->date_register}}</option>
                            @endforeach
                        </select>
                        <div class="add-div-error from_date"></div>
                    </div>
                    <div class=" col-sm-6 select-wizard">
                        <label>To Date</label>
                        <select class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" name="to_date" title="Select to Date" >
                            <option value="" disabled selected>Select to Date</option>
                            @foreach($attendance_from_dates as $attendance_from_date)
                                <option value="{{$attendance_from_date->date_register}}">{{$attendance_from_date->date_register}}</option>
                            @endforeach
                        </select>
                        <div class="add-div-error to_date"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="">
                        <button type="submit" class="btn btn-success btn-round btn-link" id="date-wise-attendance-submit-btn" data-dismiss="modal">Submit</button>                                        </div>
                    <div class="divider"></div>
                    <div class="">
                        <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{--Select Date Wise Attendance Modal End--}}
@endsection

@section('front_script')
    <script src="{{asset('jspdf/js/jspdf.min.js')}}"></script>
    <script src="{{asset('js/jspdf-autotable')}}"></script>
    <script src="{{asset('js/teacher.js')}}"></script>
      
    <script>
        $(document).ready(function() {

            $('#date_register').selectpicker();

            $('#attendance-table').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search",
                }

            });

            var table = $('#attendance-table').DataTable();

            // Edit record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function() {
                alert('You clicked on Like button');
            });


            

        });
    </script>
    <script>
        function myFunction() {

            $(".close").attr('disabled' , true);
            $(".add-new-class-btn").attr('disabled' , true);
        };
    </script>
@endsection

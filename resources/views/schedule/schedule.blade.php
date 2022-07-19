@extends('layouts.master')
@section('title', 'Class schedule')
@section('content')
    <style>
        .add-div-error {
            color: red;
        }
    </style>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form id="RegisterValidation" action="#" method="">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Class Schedule</h4>
                        </div>
                        <div class="card-body">
                            <div class="row bor-sep">
                                <div class="form-group has-label col-sm-2">
                                    {{-- <span>
                                         List by
                                         :
                                     </span>--}}
                                </div>
                                <form id="class-schedule-filter-form" method="" action="">
                                    <div class="form-group col-sm-3 select-wizard">
                                        {{--<select class="selectpicker sel_filter_classSched" id="class-Sched-filter"  data-size="7" data-style="btn btn-secondary btn-round" title="Choose filter" >
                                            <option value="" disabled selected>Choose filter</option>
                                            <option value="class">Period</option>
                                            <option value="subject">Day</option>
                                        </select>--}}
                                    </div>
                                </form>
                                <div class=" col-sm-7">
                                    @can('add-schedule')
                                        <button class="btn btn-secondary pull-right btn-round" data-toggle="modal" id="show-Class-Sched-modal-btn">
                                            Schedule class
                                        </button>
                                    @endcan
                                </div>
                                <!--<div class="category form-category">* Required fields</div>-->
                            </div>
                            <div class="modal fade" id="newclassSchedule" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-wide modal-xl">
                                    <div class="modal-content">
                                        <form action="" id="add-class-schedule-form">
                                            <div class="modal-header justify-content-center">

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i class="fa fa-remove"></i>
                                                </button>




                                                <h5 class="title title-up">class schedule</h5>
                                            </div>

                                            <div class="row modal-body">
                                                <h6 class="col-md-12">Schedule details</h6>
                                                <div class=" col-sm-3 select-wizard">
                                                    <label>Class</label>
                                                    <select class="selectpicker cls_id" name="cls_id" data-size="5" id="cls_id" data-style="btn btn-secondary btn-round" title="Select Class">
                                                        <option value="" disabled selected>Select Class</option>


                                                        @foreach($addClasses as $AddClasse)
                                                            <option value="{{$AddClasse->cls_Id}}">{{$AddClasse->class}}</option>
                                                        @endforeach
                                                    </select>

                                                    <div class="add-div-error class"></div>
                                                </div>
                                                <div class=" col-sm-3 select-wizard">
                                                    <label>Section</label>
                                                    <select class="selectpicker section_id" name="section_id" id="section_id" data-size="5" data-style="btn btn-secondary btn-round" title="Select Section">
                                                        <option value="" disabled selected>Select Section</option>

                                                    </select>

                                                    <div class="add-div-error section_id"></div>
                                                </div>


                                                <div class="col-sm-12">
                                                    <br>
                                                    <hr>
                                                </div>
                                                <div class="col-md-12" id="modalrow">

                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <div class="">
                                                    <button type="submit" class="btn btn-round btn-success btn-link" id="add-class-schedule">Save</button>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="">
                                                    <button type="button" class="btn btn-round btn-danger btn-link" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /////////////////////////// -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <div class="card-header">
                                            <h6 class="card-title">Schedule List</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="toolbar">
                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                            </div>
                                            <table id="schedule-table" class="table table-hover custom_border" cellspacing="0" width="100%">
                                                <thead class="table-secondary">
                                                <tr>
                                                    <th class="text-center w-10">S.No</th>
                                                    <th>Class</th>
                                                    <th>Section</th>

                                                    <th class="disabled-sorting w-15 text-center">Actions</th>
                                                </tr>
                                                </thead>
{{--                                                <tfoot>--}}
{{--                                                <tr>--}}
{{--                                                    <th>S.No</th>--}}
{{--                                                    <th>Class</th>--}}
{{--                                                    <th>Section</th>--}}
{{--                                                    <th class="disabled-sorting">Actions</th>--}}
{{--                                                </tr>--}}
{{--                                                </tfoot>--}}
                                                <tbody>
                                                @if($Classsched)
                                                    @php
                                                        $i= 1 ;
                                                    @endphp

                                                    @foreach($Classsched as $schedule)
                                                        <tr>
                                                        <td class="text-center">{{$i++}}</td>
                                                        <td>{{$schedule->class?$schedule->class->class:''}}</td>
                                                        <td>{{$schedule->section?$schedule->section->class_section_name:''}}</td>
                                                        <td class="text-center">
                                                            <div class="form-inline pull-right">
                                                                @can('view-schedule')
                                                                    <div class="">
                                                                        <a href="#">
                                                                            <button class="btn-round  btn-sm btn text-info btn-link    btn-cus-weight show-view-class_sched-btn" type="button" data-id="{{$schedule->id}}"
                                                                                    data-toggle="modal" data-target="#viewteacherclassshedule" aria-haspopup="true" aria-expanded="false">
                                                                                View
                                                                            </button>
                                                                        </a>

                                                                    </div>
                                                                @endcan
                                                                @canany(['edit-schedule', 'delete-schedule'])
                                                                    <div class="nav-item btn-rotate dropdown pull-right ">
                                                                        <a class="nav-link dropdown-toggle pull-right" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                                           aria-expanded="false">
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                                            @can('edit-schedule')
                                                                                <a class="dropdown-item editClassSched" href="#" data-toggle="modal"
                                                                                   data-class="{{$schedule->cls_Id}}"
                                                                                   data-section="{{$schedule->c_section_Id}}"
                                                                                   data-id="{{$schedule->id}}" aria-haspopup="true" aria-expanded="false">Edit</a>
                                                                            @endcan
                                                                            @can('delete-schedule')
                                                                                <a class="dropdown-item deleteClassSched " data-id="{{$schedule->id}}" href="#">Delete</a>
                                                                            @endcan
                                                                        </div>
                                                                    </div>
                                                                @endcanany
                                                            </div>
                                                        </td>
                                                        <tr>
                                                    @endforeach

                                                @endif

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


    <div class="modal fade " id="viewteacherclassshedule" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-sm">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up">Weekly schedule</h5>
                </div>
                <div class="row modal-body">

                    <div class=" col-sm-3 select-wizard">
                        <label>Class</label>
                        <h6 class="class_name"></h6>

                    </div>
                    <div class=" col-sm-3 select-wizard">
                        <label>Section</label>
                        <h6 class="section_name"></h6>


                    </div>
                    <div id="modalrows" class="col-md-12">
                    </div>


                </div>

                <div class="modal-footer">
                    <div class="">
                        <button type="button" class="btn btn-round btn-danger btn-link" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
@endsection

@section('front_css')
    {{--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>--}}
@endsection

@section('front_script')

    <script src="{{asset('js/schedule_script.js')}}"></script>


    <script>

        $(document).ready(function () {
            $('#datatable').DataTable({
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

            var table = $('#datatable').DataTable();

            // Edit record
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function () {
                alert('You clicked on Like button');
            });
        });

        $('#daysselect').selectpicker();

    </script>
@endsection

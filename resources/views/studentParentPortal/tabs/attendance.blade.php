

    @include('studentParentPortal.tabs.tabsidebar')

    <div class="col-sm-9">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="shedule-class">
                        <h4>Class {{$user->studentinfo->class?$user->studentinfo->class->class:''}} Section {{$user->studentinfo->section?$user->studentinfo->section->class_section_name:''}}</h4>
                    </div>


                    <div class="card-body">
                        <div class="nav-tabs-navigation nav-tabs-left">
                            <div class="nav-tabs-wrapper">
                                <ul id="tabs" class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#Attendance" role="tab" aria-expanded="false">Attendance</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link " data-toggle="tab" href="#Achcievement" role="tab" aria-expanded="true">Achcievement </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#behaviour" role="tab" aria-expanded="false">Behaviour</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div id="my-tab-content" class="tab-content">
                            <div class="tab-pane active" id="Attendance" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="">

                                                            <div class="card-body">
                                                                <div class="toolbar">
                                                                    <div class="row">
                                                                        <div class="form-group col-sm-2 select-wizard">
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-sm btn-outline-secondary btn-round" title="Filter" >
                                                                                <option value="1">Scheduled</option>
                                                                                <option value="2">Completed</option>
                                                                                <option value="4">All</option>
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                                </div>
                                                                <table id="attendance-table" class="table-desi table table-hover custom_border" cellspacing="0" width="100%">
                                                                    <thead class="table-secondary">
                                                                    <tr>
                                                                        {{--                                                                        <th>#</th>--}}
                                                                        <th class="text-center">Date</th>
                                                                        <th>Name</th>
                                                                        <th>Attendance</th>

                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                        @php $i=1; @endphp
                                                                        @foreach($studentrocrd as $key=>$attendance)
                                                                            <tr>
                                                                                {{--                                                                                <td class="font text-center"> {{$i++}}--}}
                                                                                {{--                                                                                </td>--}}
                                                                                <td class="font text-center"><div class="text-center">{{$key}}</div>
                                                                                </td>
                                                                                <td class="font "><div class="">{{$user->name}} </div>
                                                                                </td>
                                                                                <td class="font "><div class="">
                                                                                @php

                                                                                if(isset($studentrocrd[$key][$user->id])){
                                                                                    echo $studentrocrd[$key][$user->id];
                                                                                }else{
                                                                                echo 'A';
                                                                                }
                                                                                @endphp</div>
                                                                                </td>

                                                                            </tr>
                                                                        @endforeach

                                                                    </tbody>
                                                                </table>
                                                            </div><!-- end content-->
                                                        </div><!--  end card  -->
                                                    </div> <!-- end col-md-12 -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>



                            <div class="tab-pane " id="behaviour" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="">

                                                            <div class="card-body">

                                                                <table id="behaviour-table" class="table-desi table table-hover custom_border" cellspacing="0" width="100%">
                                                                    <thead class="table-secondary">
                                                                    <tr>
                                                                        <th class="w-10 text-center">#</th>
                                                                        <th class="w-15 ">Date</th>
                                                                        <th class="w-20 ">Name</th>
                                                                        <th class="w-25 ">Comment</th>
                                                                        <th class="disabled-sorting text-center w-15" >Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @if($behaviours !="")
                                                                        @php $i=1; @endphp
                                                                        @foreach($behaviours as $behaviour)
                                                                            <tr>
                                                                                <td class="font text-center">{{$i++}}
                                                                                </td>
                                                                                <td class="font "><div class="">{{$behaviour->date}}</div>
                                                                                </td>
                                                                                <td class="font "><div class="">{{$behaviour->user->name}}</div>
                                                                                </td>
                                                                                <td class="font "><div class="">{{$behaviour->comments}}</div>
                                                                                </td>
                                                                                <td class="font text-center">
                                                                                    <div class="text-center">
                                                                                        <button class="btn-link btn-cus-weight show-behr-btn"
                                                                                                type="button"
                                                                                                data-toggle="modal"
                                                                                                {{-- data-target="#viewclass"--}}

                                                                                                data-name="{{$behaviour->user->name}}"

                                                                                                data-class="{{$behaviour->class?$behaviour->class->class:''}}"
                                                                                                data-section="{{$behaviour->section?$behaviour->section->class_section_name:''}}"


                                                                                                data-std_Id="{{$behaviour->std_Id}}"

                                                                                                aria-haspopup="true"
                                                                                                aria-expanded="false"  data-id="{{$behaviour->date}}">
                                                                                            View
                                                                                        </button>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif
                                                                    </tbody>
                                                                </table>
                                                            </div><!-- end content-->
                                                        </div><!--  end card  -->
                                                    </div> <!-- end col-md-12 -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane " id="Achcievement" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="">

                                                            <div class="card-body">
                                                                <div class="toolbar">
                                                                    <div class="row">
                                                                        <div class="form-group col-sm-2 select-wizard">
                                                                            <select class="selectpicker" data-size="7" data-style="btn btn-sm btn-outline-secondary btn-round" title="Filter" >
                                                                                <option value="1">Scheduled</option>
                                                                                <option value="2">Completed</option>
                                                                                <option value="4">All</option>
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                                </div>
                                                                <table id="achievement-table" class="table-desi table table-hover custom_border" cellspacing="0" width="100%">
                                                                    <thead class="table-secondary">
                                                                    <tr>
                                                                        <th class="w-10 text-center">#</th>
                                                                        <th class="w-15 ">Date</th>
                                                                        <th class="w-20 ">Name</th>
                                                                        <th class="w-25 ">Comment</th>
                                                                        <th class="disabled-sorting text-center w-15" >Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @if($achievements !="")
                                                                        @php $i=1; @endphp
                                                                        @foreach($achievements as $achievement)
                                                                            <tr>
                                                                                <td class="font text-center">{{$i++}}
                                                                                </td>
                                                                                <td class="font "><div class="">{{$achievement->date}}</div>
                                                                                </td>
                                                                                <td class="font "><div class="">{{$achievement->user->name}}</div>
                                                                                </td>
                                                                                <td class="font "><div class="">{{$achievement->comments}}</div>
                                                                                </td>
                                                                                <td class="font text-center">
                                                                                    <div class="text-center">
                                                                                        <button class="btn-link btn-cus-weight show-achievement-btn"
                                                                                                type="button"
                                                                                                data-toggle="modal"
                                                                                                {{-- data-target="#viewclass"--}}
                                                                                                aria-haspopup="true"
                                                                                                data-name="{{$achievement->user->name}}"

                                                                                                data-class="{{$achievement->class?$achievement->class->class:''}}"
                                                                                                data-section="{{$achievement->section?$achievement->section->class_section_name:''}}"


                                                                                                data-std_Id="{{$achievement->std_Id}}"
                                                                                                aria-expanded="false" data-id="{{$achievement->date}}">
                                                                                            View
                                                                                        </button>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif
                                                                    </tbody>
                                                                </table>
                                                            </div><!-- end content-->
                                                        </div><!--  end card  -->
                                                    </div> <!-- end col-md-12 -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>







{{--show Attendance Modal--}}
<div class="modal fade" id="show-attendance-modal" tabindex="-1" role="dialog"
     aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">

        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fa fa-remove"></i>
                </button>
                <h5 class="title title-up">Attendance Sheet</h5>

            </div>
            <div class="modal-body row" id="attendance-content">

                <div class="col-md-12">
                    <div class="col-md-4 col-sm-12 col-lg-4">
                        <label>Date:</label><span id="show-attendance-date"></span>
                    </div>
                    <div class="col-md-4">
                        <label>Class:</label><span id="show-attendance-class"></span>
                    </div>
                    <div class="col-md-4">
                        <label>Section:</label><span id="show-attendance-section"></span>
                    </div>



                    <table class="table table-bordered table-hover"  id="show-attendance-table">

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
                    <div id="bavContainer"></div>
                </div>
            </div>

            <!--</div>-->
            <div class="modal-footer">
                <div class="">
                    <button type="button" class="btn btn-secondary btn-round btn-link export-attendance-pdf" >Export Attendance Sheet</button>
                </div>
                <div class="divider"></div>
                <div class="">
                    <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{--show Attendance Modal End--}}

{{--show Achievement Modal--}}
    <div class="modal fade" id="show-achievement-modal" tabindex="-1" role="dialog"
     aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">

        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <i class="fa fa-remove"></i>
                </button>
                <h5 class="title title-up">Achievement Sheet</h5>

            </div>
            <div class="modal-body row" id="achievement-content">

                <div class="col-md-12">
                    <div class="col-md-12">
                        <label>Date:</label><span id="show-achievement-date"></span> <label>Class:</label><span id="show-achievement-class"></span> <label>Section:</label><span id="show-achievement-section"></span>
                    </div>

                    <div id="acvContainer"></div>
                </div>

            </div>

            <!--</div>-->
            <div class="modal-footer">
                <div class="">
                    <button type="button" class="btn btn-secondary btn-round btn-link export-achievement-pdf" >Export Achievement</button>
                </div>
                <div class="divider"></div>
                <div class="">
                    <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="show-behe-modal" tabindex="-1" role="dialog"
         aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-sm">

            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up">Behaviour</h5>

                </div>
                <div class="modal-body row" id="behaviour-content">

                    <div class="col-md-12">
                        <div class="col-md-12">
                            <label>Date:</label><span id="show-behe-date"></span> <label>Class:</label><span id="show-behe-class"></span> <label>Section:</label><span id="show-behe-section"></span>
                        </div>

                        <div id="behContainer"></div>
                    </div>

                </div>

                <!--</div>-->
                <div class="modal-footer">
                    <div class="">
                        <button type="button" class="btn btn-secondary btn-round btn-link export-achievement-pdf" >Export Achievement</button>
                    </div>
                    <div class="divider"></div>
                    <div class="">
                        <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    $('#attendance-table').DataTable();

    $('#behaviour-table').DataTable({
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

    $('#achievement-table').DataTable({
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



</script>

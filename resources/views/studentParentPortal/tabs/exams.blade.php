
    @include('studentParentPortal.tabs.tabsidebar')
 
    <div class="col-sm-9">
        <div class="row" >
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="nav-tabs-navigation nav-tabs-left">
                            <div class="nav-tabs-wrapper">
                                <ul id="tabs" class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#viewsyllabus" role="tab" aria-expanded="false">Syllabus</a>
                                    </li>
                                    {{--<li class="nav-item">
                                       <a class="nav-link" data-toggle="tab" href="#viewspaper" role="tab" aria-expanded="false">Papers</a>
                                    </li>--}}
                                    <li class="nav-item">
                                        <a class="nav-link " data-toggle="tab" href="#viewexamsresult" role="tab" aria-expanded="true">Results</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="my-tab-content" class="tab-content ">
                            <div class="tab-pane " id="viewexamsresult" role="tabpanel" aria-expanded="true">
                                <div class="row" >
                                    <div class="col-sm-12">
                                        <form id="RegisterValidation" action="#" method="">
                                            <div class=" ">
                                                <div class="card-body">
                                                  </div>
                                                    <div class="modal fade" style="overflow: scroll;  white-space: nowrap;" id="markexam" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" >
                                                        <div class="modal-dialog modal-full modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header justify-content-center">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i class="fa fa-remove"></i>
                                                                    </button>
                                                                    <h5 class="title title-up">Mark sheet</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="toolbar">
                                                                       {{-- <div class="col-sm-12 float-right">
                                                                            <button class="btn btn-simple btn-tumblr btn-icon float-right export-marksheet-pdf"><i class="fa fa-print fa-lg"  title="Print" data-toggle=""></i></button>
                                                                            <button class="btn btn-simple btn-tumblr btn-icon float-right "><i class="fa fa-download fa-lg" title="Export" data-toggle=""></i></button>
                                                                        </div>--}}
                                                                    </div>
                                                                    <div class="row" id="markssheet_print_div">
                                                                        <div class="" data-toggle="" data-target="#" aria-expanded="true">
                                                                            <div class="m-portlet__head-caption">
                                                                                <div class="m-portlet__head-title">

                                                                                    <p class="">Exam:<span id="exam_name"> <b> </b></span></p>
                                                                                    <p>Date: <span id="examFrom"></span><b> to</b> <span id="examTo"> </span></p>
                                                                                    <p>Name: <span id="name"> </span> </p>
                                                                                    <p>Class: <span id="class"><b></b> </span>- <span id="section"></span></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" col-sm-12">
                                                                            <table class="table custom_border table-bordered table-hover table-full-width" id="stundet-markssheet" style="width: 100%">


                                                                            </table>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <!--</div>-->
                                                                <div class="modal-footer">
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-danger btn-round btn-link" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="card-header">
                                                                <h6 class="card-title">Examinations List</h6>
                                                            </div>
                                                            <div class="toolbar">
                                                                <div class="">
                                                                    <div class="form-group col-sm-2 select-wizard">
                                                                        <select class="selectpicker" data-size="7" data-style="btn btn-sm btn-outline-secondary btn-round" title="Filter" >
                                                                            <option value="1">Weekly</option>
                                                                            <option value="2">Monthly</option>
                                                                            <option value="4">Terminals</option>
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                            </div>
                                                            <div class="card-body">
                                                                <table id="examinationstable" class="table table-hover custom_border" cellspacing="0" width="100%">
                                                                    <thead class="table-secondary">
                                                                        <tr>
                                                                            <th>S.No</th>
                                                                            <th>Exam name</th>
                                                                            <th>Exam Type</th>
                                                                            <th>Status</th>
                                                                            <th class="disabled-sorting text-center">Actions</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @php 
                                                                        $i=1;
                                                                    //s$user->stunderif->class
                                                                    @endphp
                                                                    @foreach($examlist as $examlists)
                                                                    <tr>
                                                                        <td>{{$i++}}</td>
                                                                        <td>{{$examlists->exam_Name}}</td>
                                                                        <td>{{$examlists->type?$examlists->type->exm_typ_Name:''}}</td>
                                                                        <td>Marked</td>
                                                                        <td class="">
                                                                            <div class="">
                                                                                <div class="align-content-center">
                                                                                    <button  data-exam="{{$examlists->exam_Id}}" data-sc_sec_Id="{{$user->studentinfo?$user->studentinfo->class->sc_sec_Id:''}}" data-id="{{$user->id}}" class=" btn-link btn-cus-weight show_student_marks " aria-haspopup="true" aria-expanded="false" type="button" >
                                                                                        View marksheet
                                                                                    </button>
                                                                                </div>
                                                                            </div>

                                                                        </td>
                                                                    </tr>
                                                                     @endforeach


                                                                    </tbody>
                                                                </table>
                                                            </div><!-- end content-->
                                                        </div><!--  end card  -->
                                                    </div> <!-- end col-md-12 -->
                                                </div> <!-- end row -->

                                            </div>
                                        </form>
                                    </div>
                                </div>


                            <div class="tab-pane active" id="viewsyllabus" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="card-header">
                                                                <h6 class="card-title">Syllabus List</h6>
                                                            </div>
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
                                                                <table id="viewsyllabustable" class="table-desi table table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>S.No</th>
                                                                        <th>Exam name</th>
                                                                        <th>Class</th>
                                                                        <th>Subject</th>
                                                                        <th>File</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tfoot>
                                                                    <tr>
                                                                        <th>S.No</th>
                                                                        <th>Exam name</th>
                                                                        <th>Class</th>
                                                                        <th>Subject</th>
                                                                        <th>File</th>
                                                                    </tr>
                                                                    </tfoot>
                                                                    <tbody>
                                                                    @php $i= 1; @endphp
                                                                    @if($examsyllabuses !='')
                                                                    @foreach($examsyllabuses as $syllabus)
                                                                    <tr>

                                                                        <td>{{$i++}}</td>
                                                                        <td>{{$syllabus->exams?$syllabus->exams->exam_Name:''}}</td>
                                                                        <td>{{$syllabus->class?$syllabus->class->class:''}}</td>
                                                                        <td>{{$syllabus->subject?$syllabus->subject->subject:''}}</td>
                                                                        <td><a href="{{asset('upload/syllabus/'.$syllabus->syllabus_docs)}}" target="_blank">{{$syllabus->syllabus_docs}}</a></td>
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
                            <div class="tab-pane" id="viewspaper" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="card-header">
                                                                <h6 class="card-title">Paper List</h6>
                                                            </div>
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
                                                                <table id="viewspapertable" class="table-desi table table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>S.No</th>
                                                                        <th>Exam name</th>
                                                                        <th>Class</th>
                                                                        <th>Subject</th>
                                                                        <th>File</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tfoot>
                                                                    <tr>
                                                                        <th>S.No</th>
                                                                        <th>Exam name</th>
                                                                        <th>Class</th>
                                                                        <th>Subject</th>
                                                                        <th>File</th>
                                                                    </tr>
                                                                    </tfoot>
                                                                    <tbody>
                                                                    @php $i= 1; @endphp
                                                                    @if($papers !='')
                                                                    @foreach($papers as $paper)
                                                                    <tr>

                                                                        <td>{{$i++}}</td>
                                                                        <td>{{$paper->exams?$paper->exams->exam_Name:''}}</td>
                                                                        <td>{{$paper->class?$paper->class->class:''}}</td>
                                                                        <td>{{$paper->subject?$paper->subject->subject:''}}</td>
                                                                        <td><a href="{{asset('upload/paper/'.$paper->paper_File)}}" target="_blank">{{$paper->paper_File}}</a></td>
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

<script>
    $('#viewsyllabustable').DataTable({
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
 $('#viewspapertable').DataTable({
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
$('#examinationstable').DataTable({
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
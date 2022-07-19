
    @include('studentParentPortal.tabs.tabsidebar')
  
    <div class="col-sm-9">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="nav-tabs-navigation nav-tabs-left">
                            <div class="nav-tabs-wrapper">
                                <ul id="tabs" class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#viewdiary" role="tab" aria-expanded="false">Diary</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#viewstudy" role="tab" aria-expanded="false">Study Material</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="my-tab-content" class="tab-content ">
                            <div class="tab-pane active" id="viewdiary" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="card-header">
                                                                <h6 class="card-title">Diary List</h6>
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
                                                                <table id="diary-table" class="table-desi table table-hover custom_border" cellspacing="0" width="100%">
                                                                    <thead class="table-secondary">
                                                                    <tr>
                                                                        <th class="w-10">#</th>
                                                                        <th class="w-10">Type</th>
                                                                        <th class="w-auto">Class</th>
                                                                        <th class="w-auto">Section</th>
                                                                        <th class="w-auto">Subject</th>
                                                                        <th class="w-10">File</th>
                                                                        <th class="w-15 text-center">Due Date</th>
                                                                        <th class="w-15 disabled-sorting text-center">Actions</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    @if($diaries !='')
                                                                        @php $i=1; @endphp
                                                                        @foreach($diaries as $diary)
                                                                            <tr>
                                                                                <td class="w-10 font text-center"><div class="text-center">{{$i++}}</div>
                                                                                </td>
                                                                                <td class="font text-center"><div class="text-center">{{$diary->diaryType?$diary->diaryType->diary_type_Name:''}}</div>
                                                                                </td>
                                                                                <td class="font text-center"><div class="text-center">{{$diary->class?$diary->class->class:''}}</div>
                                                                                </td>
                                                                                <td class="font text-center"><div class="text-center">{{$diary->classsection?$diary->classsection->class_section_name:''}}</div>
                                                                                </td>
                                                                                <td class="font text-center"><div class="text-center">{{$diary->subject?$diary->subject->subject:''}}</div>
                                                                                </td>
                                                                                <td class="font text-center"><div class="text-center"><a target="_blank" href="{{asset('upload/diary/'.$diary->diary_File)}}">{{$diary->diary_File}}</a></div>
                                                                                </td>
                                                                                <td class="font text-center"><div class="text-center">{{$diary->due_Date}}</div>
                                                                                </td>
                                                                                <td class="text-center disabled-sorting">
                                                                                    <div class="col-lg-6 text-center  col-md-6 col-sm-1">



                                                                                            <div class="dropdown text-center">
                                                                                                <button style="" class="dropdown-toggle text-left btn-link  btn-round  btn-sm btn text-info  btn-cus-weight"  id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                    Manage
                                                                                                </button>
                                                                                                <div class="dropdown-menu dropdown-menu-right">


                                                                                                        <a class="dropdown-item show-diary-btn"  data-id="{{$diary->pk_diary_Id}}" data-student="{{ $user->id }}">View </a>





                                                                                                        <a class="dropdown-item sign-diary-btn"   data-id="{{$diary->pk_diary_Id}}" data-status="{{$diary->diary_Status}}" data-student="{{ $user->id }}"> {{$diary->diary_Status=='Acknowledge'?' Unmark':'Mark'}} Acknowledge</a>




                                                                                                      {{--  <a class="dropdown-item" data-id="{{$diary->pk_diary_Id}}" data-student="{{ $user->id }}" >Reply Diary</a>
--}}

                                                                                                </div>
                                                                                            </div>




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
                            <div class="tab-pane" id="viewstudy" role="tabpanel" aria-expanded="false">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="card-header">
                                                                <h6 class="card-title">Study Materials List</h6>
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
                                                                <table id="study-table" class="table-desi table table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead>
                                                                    <tr>
                                                                        <th style="width: 5%;">#</th>
                                                                        <th style="width: 5%;">Topic</th>
                                                                        <th style="width: 5%;">Class</th>
                                                                        <th style="width: 5%;">Section</th>
                                                                        <th style="width: 5%;">Subject</th>
                                                                        <th style="width: 5%;">File</th>
                                                                        <th style="width: 5%;">Date</th>
                                                                        <th class="disabled-sorting">Actions</th>

                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    @if($study_materials !='')
                                                                        @php $i=1; @endphp
                                                                        @foreach($study_materials as $study_material)
                                                                            <tr>
                                                                                <td class="font text-center"><div class="text-center">{{$i++}}</div>
                                                                                </td>
                                                                                <td class="font "><div class="">{{$study_material->topic}}</div>
                                                                                </td>
                                                                                <td class="font "><div class="">{{$study_material->class?$study_material->class->class:''}}</div>
                                                                                </td>
                                                                                <td class="font "><div class="">{{$study_material->classsection?$study_material->classsection->class_section_name:''}}</div>
                                                                                </td>
                                                                                <td class="font "><div class="">{{$study_material->subject?$study_material->subject->subject:''}}</div>
                                                                                </td>
                                                                                <td class="font "><div class=""><a  href="{{asset('upload/study/'.$study_material->study_File)}}" target="_blank">{{$study_material->study_File}}</a></div>
                                                                                </td>
                                                                                <td class="font "><div class="">{{$study_material->due_Date}}</div>
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <div class="form-inline">
                                                                                        <div class="">
                                                                                            <button class=" btn btn-secondary btn-round btn-sm btn-link btn-cus-weight text-info btn-block view-study-btn" type="button" data-id="{{$study_material->pk_study_material_Id}}" data-student="{{ $user->id }}"  data-toggle="modal"  aria-haspopup="true" aria-expanded="false">
                                                                                                View
                                                                                            </button>
                                                                                        </div>

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

{{--view diary modal start--}}
<div class="modal fade" id="view-diary-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-sm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-remove"></i>
                </button>
                <h5 class="title title-up">View Diary</h5>
            </div>
            <div class="modal-body row">
                <div class="col-sm-3">
                    <div class="row">

                        <div class=" col-sm-12 select-wizard">
                            <label>Class</label>
                            <p id="show-dairy-class"></p>
                        </div>
                        <div class=" col-sm-12 select-wizard">
                            <label>Class Section</label>
                            <p id="show-dairy-class-section"></p>
                        </div>
                        <div class=" col-sm-12 select-wizard">
                            <label>Subject</label>
                            <p id="show-dairy-subject"></p>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="col-sm-9">
                    <div class="row">


                        <div class=" col-sm-4 select-wizard">
                            <label>Diary Type</label>
                            <p id="show-dairy-diary-type"></p>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Due Date</label>
                            <p id="show-dairy-due-date"></p>
                        </div>
                        <div class=" col-sm-4 select-wizard">
                            <label>Audience</label>
                            <p id="show-dairy-audience"></p>
                        </div>
                        <div class="col-sm-12">
                            <label>Students</label>
                            <table id="diary-student-table"
                                   class="table table-striped table-bordered"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Students</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>Students</th>
                                    <th>Status</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>


                            <p class="show-diary-students"></p>
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Note</label>
                            <p type="text" id="diary-note"></p>
                        </div>
                        <div class="form-group col-sm-12">

                            <label class="form-control-label" for="">Diary File</label>
                            <div class="custom-file">
                                <a href="" id="show-diary-file" target="_blank"></a>
                            </div>


                        </div>
                    </div>

                </div>
            </div>

            <!--</div>-->
            <div class="modal-footer">
                <div class="">
                    <button type="button" class="btn btn-danger btn-sm btn-link btn-round" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{--view diary modal end--}}
{{--view study modal start--}}
<div class="modal fade" id="view-study-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-sm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-remove"></i>
                </button>
                <h5 class="title title-up">View Study Material</h5>
            </div>
            <div class="modal-body row">
                <div class="col-sm-3">
                    <div class="row">

                        <div class=" col-sm-12 select-wizard">
                            <label>Class</label>
                            <p id="show-study-class"></p>
                        </div>
                        <div class=" col-sm-12 select-wizard">
                            <label>Class Section</label>
                            <p id="show-study-class-section"></p>
                        </div>
                        <div class=" col-sm-12 select-wizard">
                            <label>Subject</label>
                            <p id="show-study-subject"></p>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="col-sm-9">
                    <div class="row">


                        <div class=" col-sm-4 select-wizard">
                            <label>Topic</label>
                            <p id="show-study-topic"></p>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Due Date</label>
                            <p id="show-study-due-date"></p>
                        </div>
                        <div class=" col-sm-4 select-wizard">
                            <label>Audience</label>
                            <p id="show-study-audience"></p>
                        </div>
                        <div class="col-sm-12">
                            <label>Students</label>
                            <table id="study-student-table"
                                   class="table table-striped table-bordered"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Students</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>Students</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>



                        </div>

                        <div class="form-group col-sm-12">
                            <label>Note</label>
                            <p type="text" id="study-note"></p>
                        </div>
                        <div class="form-group col-sm-12">

                            <label class="form-control-label" for="">Study File</label>
                            <div class="custom-file">
                                <a href="" id="show-study-file" target="_blank"></a>
                            </div>


                        </div>
                    </div>

                </div>
            </div>

            <!--</div>-->
            <div class="modal-footer">
                <div class="">
                    <button type="button" class="btn btn-danger btn-sm btn-link btn-round" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{--view study modal end--}}
<script>
    $('#study-table').DataTable({
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
    $('#diary-table').DataTable({
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


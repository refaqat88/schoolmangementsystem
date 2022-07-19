<table id="set-syllabus-table" class="table-desi table table-hover custom_border set-syllabus-table"
       cellspacing="0" width="100%">
    <thead class="table-secondary">
    <tr>
        <th>S.No</th>
        <th>Exam name</th>
        <th>Class</th>
        <th>Subject</th>
        <th>File</th>
        <th class="disabled-sorting">Actions
        </th>
    </tr>
    </thead>
    <tfoot class="table-secondary">
    <tr>
        <th>S.No</th>
        <th>Exam name</th>
        <th>Class</th>
        <th>Subject</th>
        <th>File</th>

        <th class="disabled-sorting">Actions
        </th>
    </tr>
    </tfoot>

    <tbody>
    @php $i=1; @endphp
    @foreach($syllabuses as $syllabus)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$syllabus->exams?$syllabus->exams->exam_Name:''}}</td>
            <td>{{$syllabus->class?$syllabus->class->class:''}}</td>
            <td>{{$syllabus->subject?$syllabus->subject->subject:''}}</td>
            <td><a href="{{asset('upload/syllabus/'.$syllabus->syllabus_docs)}}" target="_blank">{{$syllabus->syllabus_docs}}</a>
            </td>
            <td class="">
                <div class="form-inline">
                    {{--<div class="">
                        <button class=" btn-link btn-cus-weight btn-block "
                                type="button" id=""
                                data-toggle="modal"
                                data-target="#viewsyllabus"
                                aria-haspopup="true"
                                aria-expanded="false">
                            View
                        </button>
                    </div>--}}
                    <div class="nav-item btn-rotate dropdown ">
                        <a class="nav-link dropdown-toggle"
                           href="" id="navbarDropdownMenuLink"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">Manage
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"
                             aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item edit-syllabus-btn" href="javascript:void(0)" data-id="{{$syllabus->syllabus_Id}}">Edit</a>
                            <a class="dropdown-item delete-syllabus-btn" href="javascript:void(0)" data-id="{{$syllabus->syllabus_Id}}">Delete</a>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

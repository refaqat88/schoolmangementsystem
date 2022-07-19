<table id="set-syllabus-table" data-id="set-syllabus-table"
       class="table-desi table table-striped table-bordered set-syllabus-table"
       cellspacing="0" width="100%">
    <thead>
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
    <tfoot>
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
                    @canany(['edit-examiner', 'delete-examiner'])
                    <div class="nav-item btn-rotate dropdown ">
                        <a class="nav-link dropdown-toggle"
                           href="" id="navbarDropdownMenuLink"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">Manage
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"
                             aria-labelledby="navbarDropdownMenuLink">
                            @can('edit-examiner')
                            <a class="dropdown-item edit-syllabus-btn" href="#" data-id="{{$syllabus->syllabus_Id}}">Edit</a>
                            @endcan
                            @can('delete-examiner')
                            <a class="dropdown-item delete-syllabus-btn" href="#" data-id="{{$syllabus->syllabus_Id}}">Delete</a>
                            @endcan
                        </div>
                    </div>
                    @endcanany
                </div>

            </td>
        </tr>
@endforeach
    </tbody>
</table>
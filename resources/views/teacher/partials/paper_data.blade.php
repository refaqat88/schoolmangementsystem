<table id="set-paper-table" class="table-desi table table-hover custom_border" cellspacing="0" width="100%">
    <thead class="table-secondary">
    <tr>
        <th>S.No</th>
        <th>Exam name</th>
        <th>Class</th>
        <th>Subject</th>
        <th>Paper File</th>
        <th class="disabled-sorting">Actions</th>
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
    @foreach($exam_papers as $exam_paper)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$exam_paper->exams?$exam_paper->exams->exam_Name:''}}</td>
            <td>{{$exam_paper->class?$exam_paper->class->class:''}}</td>
            <td>{{$exam_paper->subject?$exam_paper->subject->subject:''}}</td>
            <td><a href="{{asset('upload/paper/'.$exam_paper->paper_File)}}" target="_blank">{{$exam_paper->paper_File}}</a></td>
            <td class="">
                <div class="form-inline">
                    {{--<div class="">
                        <button class=" btn-link btn-cus-weight btn-block "
                                type="button" data-id="{{$exam_paper->exampaper_Id}}"
                                data-toggle="modal"
                                data-target="#viewpaper"
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
                            <a class="dropdown-item edit-exam-paper-btn" data-id="{{$exam_paper->exampaper_Id}}" href="javascript:void(0)">Edit</a>
                            <a class="dropdown-item delete-exam-paper-btn" data-id="{{$exam_paper->exampaper_Id}}" href="javascript:void(0)">Delete</a>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

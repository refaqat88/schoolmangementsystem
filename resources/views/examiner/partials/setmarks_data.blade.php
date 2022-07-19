<table id="set-marks-table" data-id="set-marks-table"
       class="table-desi table table-striped table-bordered"
       cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>S.No</th>
        <th>Exam name</th>
        <th>Section</th>
        <th>Subject</th>
        <th class="disabled-sorting">Actions</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>S.No</th>
        <th>Exam type</th>
        <th>Section</th>
        <th>Subject</th>
        <th class="disabled-sorting">Actions</th>
    </tr>
    </tfoot>
    <tbody>
        @php $i=1; @endphp
        @foreach($setMartsubject as $setsubjectmark)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$setsubjectmark->exams?$setsubjectmark->exams->exam_Name:''}}</td>
            <td>{{$setsubjectmark->schoolSection?$setsubjectmark->schoolSection->sc_sec_name:''}}</td>
            <td>{{$setsubjectmark->subject?$setsubjectmark->subject->subject:''}}</td>
            <td class="">
                <div class="form-inline">
                    @can('view-examiner')
                        <div class="">
                            <button class=" btn-link btn-cus-weight btn-block show-setmarks-btn" data-examname="{{$setsubjectmark->exams?$setsubjectmark->exams->exam_Name:''}}" data-subjectname="{{$setsubjectmark->subject?$setsubjectmark->subject->subject:''}}" data-schoolsectionname="{{$setsubjectmark->schoolSection?$setsubjectmark->schoolSection->sc_sec_name:''}}" data-exam="{{$setsubjectmark->exam_Id}}" data-schoolsection="{{$setsubjectmark->sc_sec_Id}}"
                                data-subject="{{$setsubjectmark->sub_Id}}"
                                    type="button"
                                    data-toggle="modal"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                View
                            </button>
                        </div>
                    @endcan
                    @canany(['edit-examiner', 'delete-examiner'])
                        <div class="nav-item btn-rotate dropdown ">
                            <a class="nav-link dropdown-toggle"
                               href=""
                               data-toggle="dropdown"
                               aria-haspopup="true"
                               aria-expanded="false">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                @can('edit-examiner')
                                    <a class="dropdown-item edit-setmarks-btn" href="#" data-id="{{$setsubjectmark->submarks_Id}}">Edit</a>
                                @endcan
                                @can('delete-examiner')
                                    <a data-exam="{{$setsubjectmark->exam_Id}}" data-schoolsection="{{$setsubjectmark->sc_sec_Id}}"
                                data-subject="{{$setsubjectmark->sub_Id}}"  class="dropdown-item delete-setmarks-btn" href="#" data-id="{{$setsubjectmark->submarks_Id}}">Delete</a>
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
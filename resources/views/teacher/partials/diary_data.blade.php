<table id="diarytable" class="table table-hover custom_border" cellspacing="0" width="100%">
    <thead class="table-secondary">
    <tr>
        <th>S.No</th>
        <th>Diary type</th>
        <th>Subject</th>
        <th>Class</th>
        <th>Class Section</th>
        <th>Audience</th>
        <th>Status</th>
        <th>Due date</th>

        <th class="disabled-sorting">Actions</th>
    </tr>
    </thead>
    <tfoot class="table-secondary">
    <tr>
        <th>S.No</th>
        <th>Diary type</th>
        <th>Subject</th>
        <th>Class</th>
        <th>Class Section</th>
        <th>Audience</th>
        <th>Status</th>
        <th>Due date</th>
        <th class="disabled-sorting">Actions</th>
    </tr>
    </tfoot>
    <tbody>
    @if($diaries != '')
    @php $i =1; @endphp
    @foreach($diaries as $diary)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$diary->diaryType?$diary->diaryType->diary_type_Name:''}}</td>
            <td>{{$diary->subject?$diary->subject->subject:''}}</td>
            <td>{{$diary->class?$diary->class->class:''}}</td>
            <td>{{$diary->classsection?$diary->classsection->class_section_name:''}}</td>
            <td>{{$diary->audience}}</td>
            <td>{{$diary->diary_Status}}</td>
            <td>{{$diary->due_Date}}</td>
            <td class="">
                <div class="form-inline">
                    <div class="">
                        <button class=" btn-link btn-cus-weight btn-block show-diary-btn" type="button" data-id="{{$diary->pk_diary_Id}}"  data-toggle="modal" aria-haspopup="true" aria-expanded="false">
                            View
                        </button>
                    </div>
                    <div class="nav-item btn-rotate dropdown ">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Check diary</a>
                            <a class="dropdown-item edit-diary-btn" data-toggle="modal" data-id="{{$diary->pk_diary_Id}}">Edit</a>
                            <a class="dropdown-item delete-diary-btn"  data-id="{{$diary->pk_diary_Id}}">Delete</a>
                        </div>
                    </div>
                </div>

            </td>
        </tr>

    @endforeach
    @endif
    </tbody>
</table>
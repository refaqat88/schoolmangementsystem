<table id="set-grades-table" data-id="set-grades-table"
       class="table-desi table table-striped table-bordered"
       cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>S.No</th>
        <th>Exam name</th>
        <th>Grade</th>
        <th>From %age</th>
        <th>To %age</th>
        <th>Comments</th>
        <th>Status</th>
        <th class="disabled-sorting">Actions
        </th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>S.No</th>
        <th>Exam name</th>
        <th>Grade</th>
        <th>From %age</th>
        <th>To %age</th>
        <th>Comments</th>
        <th>Status</th>
        <th class="disabled-sorting">Actions
        </th>
    </tr>
    </tfoot>
    <tbody>
    @php
        $j=1;

    @endphp
    @foreach($examgrades as $examgrade)


    @php


        $array = [];

        $i=0;
     foreach($examgrade->grade as $val){

        $array[$i]['grade_Name']=$val->grade_Name;
        $array[$i]['grade_st_Per']=$val->grade_st_Per;
        $array[$i]['grade_end_Per']=$val->grade_end_Per;
        $array[$i]['comment']=$val->comment;
    $i++;


    }

    @endphp

<tr>

    <td>{{$j++}}</td>
    <td>{{$examgrade->exam_Name}}</td>
    <td>@foreach($array as $exam_grade){{  $exam_grade['grade_Name'] }}<br>@endforeach</td>
    <td>@foreach($array as $exam_grade){{$exam_grade['grade_st_Per']}}<br>@endforeach</td>
    <td>@foreach($array as $exam_grade){{$exam_grade['grade_end_Per']}}<br>@endforeach</td>
    <td>@foreach($array as $exam_grade){{$exam_grade['comment']}}<br>@endforeach</td>
    <td>@foreach($array as $exam_grade){{  $exam_grade['grade_Name']=='Fail' || $exam_grade['grade_Name']=='F'?'Fail':'Pass' }}<br>@endforeach</td>
    <td class="">
        <div class="form-inline">'
            @can('view-examiner')
                <div class="">
                <button class="btn-link btn-cus-weight btn-block show-exam-grade-btn" type="button" data-id="{{$examgrade->exam_Id}}" data-toggle="modal"  aria-haspopup="true" aria-expanded="false">
                    View
                </button>
            </div>
            @endcan
            @canany(['edit-examiner', 'delete-examiner'])
            <div class="nav-item btn-rotate dropdown ">
                <a class="nav-link dropdown-toggle"
                   href="" id="navbarDropdownMenuLink"
                   data-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false">
                </a>
                <div class="dropdown-menu dropdown-menu-right"
                     aria-labelledby="navbarDropdownMenuLink">
                    @can('edit-examiner')
                    <a class="dropdown-item edit-set-exam-grade-btn" data-id="{{$examgrade->exam_Id}}" href="javascript:void(0)">Edit</a>
                    @endcan
                    @can('delete-examiner')
                    <a class="dropdown-item delete-set-exam-grade-btn" data-id="{{$examgrade->exam_Id}}" href="javascript: void(0)">Delete</a>
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
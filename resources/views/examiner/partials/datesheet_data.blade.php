<table class="table-desi table table-striped table-bordered" cellspacing="0" width="100%" id="set-datesheet-table" data-id="set-datesheet-table">
    <thead>
    <tr>
        <th>S.No</th>
        <th>Exam name</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th class="disabled-sorting">Actions
        </th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>S.No</th>
        <th>Exam name</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th class="disabled-sorting">Actions
        </th>
    </tr>
    </tfoot>
    <tbody>
    @php $i=1; @endphp

    @foreach($datesheets as $datesheet)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$datesheet->exam_Name}}</td>
            <td>{{$datesheet->exam_Start}}</td>
            <td>{{$datesheet->exam_End}}</td>
            <td>
                <div class="form-inline">
                    @can('view-examiner')
                    <div class="">
                        <button class="btn-link btn-cus-weight btn-block show-date-sheet-btn"
                                type="button" data-id="{{$datesheet->exam_Id}}"
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
                           href="" id="navbarDropdownMenuLink"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"
                             aria-labelledby="navbarDropdownMenuLink">
                            @can('edit-examiner')
                            <a class="dropdown-item edit-date-sheet-btn" data-id="{{$datesheet->exam_Id}}" href="#">Edit</a>
                            @endcan
                            @can('delete-examiner')
                            <a class="dropdown-item delete-date-sheet-btn" data-id="{{$datesheet->exam_Id}}" href="#">Delete</a>
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

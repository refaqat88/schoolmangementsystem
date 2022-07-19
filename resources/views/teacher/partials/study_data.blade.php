<table id="materialtable" class="table-desi table table-hover custom_border" cellspacing="0" width="100%">
    <thead class="table-secondary">
    <tr>
        <th>S.No</th>
        <th>Topic</th>
        <th>Subject</th>
        <th>Class</th>
        <th>Section</th>
        <th>Audience</th>
        <th>File</th>
        <th>Date</th>
        <th class="disabled-sorting">Actions</th>
    </tr>
    </thead>
    <tfoot class="table-secondary">
    <tr>
        <th>S.No</th>
        <th>Topic</th>
        <th>Subject</th>
        <th>Class</th>
        <th>Section</th>
        <th>Audience</th>
        <th>File</th>
        <th>Date</th>
        <th class="disabled-sorting">Actions</th>
    </tr>
    </tfoot>
    <tbody>
    @php $i=1; @endphp
    @foreach($study_materials as $study_material)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$study_material->topic}}</td>
            <td>{{$study_material->subject?$study_material->subject->subject:''}}</td>
            <td>{{$study_material->class?$study_material->class->class:''}}</td>
            <td>{{$study_material->classsection?$study_material->classsection->class_section_name:''}}</td>
            <td>{{$study_material->audience}}</td>
            <td><a href="{{asset('upload/study/'.$study_material->study_File)}}" target="_blank">{{$study_material->study_File}}</a></td>
            <td>{{$study_material->due_Date}}</td>
            <td class="">
                <div class="form-inline">
                    <div class="">
                        <button class=" btn-link btn-cus-weight btn-block view-study-btn" type="button" data-id="{{$study_material->pk_study_material_Id}}"  data-toggle="modal"  aria-haspopup="true" aria-expanded="false">
                            View
                        </button>
                    </div>
                    <div class="nav-item btn-rotate dropdown ">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item edit-study-btn" data-id="{{$study_material->pk_study_material_Id}}"  data-toggle="modal" aria-haspopup="true" aria-expanded="false">Edit</a>
                            <a class="dropdown-item delete-study-btn" data-id="{{$study_material->pk_study_material_Id}}" >Delete</a>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
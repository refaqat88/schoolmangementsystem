<table id="exam_table" data-id="exam_table" class="table table-hover custom_border" cellspacing="0" width="100%">
    <thead class="table-secondary">
    <tr>
        <th>{{ __('layout.S.No') }}</th>
        <th>{{ __('layout.Exam_name') }}</th>
        <th>{{ __('layout.Exam_Type') }}</th>
        <th>{{ __('layout.Sections') }}</th>
        <th>{{ __('layout.Start_date') }}</th>
        <th>{{ __('layout.End_date') }}</th>
        <th>{{ __('layout.Status') }}</th>
        <th class="disabled-sorting">{{ __('layout.Actions') }}
        </th>
    </tr>
    </thead>
    <tfoot class="table-secondary">
    <tr>
        <th>{{ __('layout.S.No') }}</th>
        <th>{{ __('layout.Exam_name') }}</th>
        <th>{{ __('layout.Exam_Type') }}</th>
        <th>{{ __('layout.Sections') }}</th>
        <th>{{ __('layout.Start_date') }}</th>
        <th>{{ __('layout.End_date') }}</th>
        <th>{{ __('layout.Status') }}</th>
        <th class="disabled-sorting">{{ __('layout.Actions') }}
        </th>
    </tr>
    </tfoot>
    <tbody>
    @php $i=1;
    @endphp


    @foreach($exams as $exam)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$exam->exam_Name}}</td>
            <td>{{$exam->type?$exam->type->exm_typ_Name:''}}</td>
            @php $sections =  $exam->exaSection($exam->exam_Id);

            @endphp
            <td> @foreach($sections as  $sc)
                    {{ $sc->schoolSection?$sc->schoolSection->sc_sec_name:'' }} <br>
                @endforeach
            </td>


            <td>{{$exam->exam_Start}}</td>
            <td>{{$exam->exam_End}}</td>
            <td>{{$exam->exam_Status}}</td>
            <td class="">
                <div class="form-inline">
                    <div class="">
                        @can('view-examiner')
                            <button class=" btn-round  btn-sm btn text-info btn-link    btn-cus-weight btn-block show-exam-btn"
                                    type="button" id=""
                                    data-id="{{ $exam->exam_Id  }}"
                                    data-target="#viewexams"
                                    data-toggle="modal"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                {{ __('layout.View') }}
                            </button>
                        @endcan
                    </div>
                    @canany(['edit-examiner', 'delete-examiner'])
                        <div class="nav-item btn-rotate dropdown ">

                            <a class="nav-link dropdown-toggle"
                               href=""
                               id="navbarDropdownMenuLink"
                               data-id="{{ $exam->exam_Id  }}"
                               data-toggle="dropdown"
                               aria-haspopup="true"
                               aria-expanded="false">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"
                                 aria-labelledby="navbarDropdownMenuLink">
                                @can('edit-examiner')
                                    <a class="dropdown-item edit-schedule-exam-btn"
                                       href="#" data-toggle="modal"
                                       data-id="{{ $exam->exam_Id  }}"
                                       aria-haspopup="true"
                                       aria-expanded="false">{{ __('layout.Edit') }}</a>
                                @endcan
                                @can('delete-examiner')
                                    <a class="dropdown-item delete-schedule-exam-btn" data-id="{{ $exam->exam_Id  }}">{{ __('layout.Delete') }}</a>
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

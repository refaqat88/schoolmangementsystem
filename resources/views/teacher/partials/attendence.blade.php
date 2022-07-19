<table id="attendance-table" class="table table-hover custom_border" cellspacing="0" width="100%">
                                                <thead class="table-secondary">
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Class</th>
                                                    <th>Section</th>
                                                    <th>Date</th>
                                                    <th class="disabled-sorting">Actions</th>
                                                </tr>
                                                </thead>
                                                <tfoot class="table-secondary">
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Class</th>
                                                    <th>Section</th>
                                                    <th>Date</th>
                                                    <th class="disabled-sorting">Actions</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                @php $i=1; @endphp
                                                @if($attendances !='')
                                                @foreach($attendances as $attendance)

                                                    @php //dd($attendance); @endphp
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$attendance->class?$attendance->class->class:''}}</td>
                                                        <td>{{$attendance->section?$attendance->section->class_section_name:''}}</td>
                                                        <td>{{$attendance->date_register}}</td>

                                                        <td class="text-center">
                                                            <div class="form-inline">
                                                                <div class="">
                                                                    <button class="btn-link btn-cus-weight show-attendance-btn"
                                                                            type="button"
                                                                            data-toggle="modal"
                                                                            {{-- data-target="#viewclass"--}}
                                                                            aria-haspopup="true"
                                                                            aria-expanded="false" data-id="{{$attendance->date_register}}" data-class="{{$attendance->cls_Id}}" data-section="{{$attendance->c_section_Id}}">
                                                                        View
                                                                    </button>
                                                                </div>
                                                                <div
                                                                        class="nav-item btn-rotate dropdown pull-right ">
                                                                    <a class="nav-link dropdown-toggle pull-right"
                                                                       href="javascript:void(0)" id="navbarDropdownMenuLink"
                                                                       data-toggle="dropdown"
                                                                       aria-haspopup="true"
                                                                       aria-expanded="false" data-id="{{$attendance->register_date}}">
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                            aria-labelledby="navbarDropdownMenuLink">
                                                                        <a class="dropdown-item edit-attendance-btn" href="{{url('teacher/class-register/'.$attendance->date_register)}}">Edit</a>
                                                                        
                                                                     <!--    <a class="dropdown-item delete-attendence-btn"
                                                               href="javascript::void(0)" data-id="{{$attendance->date_register}}">Delete</a> -->

                                                                         
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @endif
                                                </tbody>
                                            </table>
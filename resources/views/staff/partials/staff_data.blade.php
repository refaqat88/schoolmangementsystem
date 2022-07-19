<table id="datatable" data-id="datatable" class="table-hover custom_border" cellspacing="0" width="100%">
    <thead class="table-secondary">
    <tr>
        <th class="text-center" width="5%">S.No</th>
        <th class="text-center w-auto" >Per.No</th>
        <th class="w-10">Cnic</th>
        <th class="w-auto">Full Name</th>

        <th class="w-auto disabled-sorting">Contact No</th>
        <th class="w-10 disabled-sorting">Designation</th>
        <th class="w-10 disabled-sorting">Status</th>
        <th class="w-auto disabled-sorting text-center">Actions</th>
    </tr>
    </thead>

    <tbody>
    @php $i=1; @endphp
    @foreach($users as $employee)
        @php
            $personl = '';
            $designation = '';
            if($employee->employeeInfo){

             if($employee->employeeInfo->employmentInfo){

                 $personl = $employee->employeeInfo->employmentInfo->personal_No;

             }

             if($employee->employeeInfo->designation){

                 $designation = $employee->employeeInfo->designation->designation;


            }


            }

            $emp_mob_Ph='';
            if($employee->employeeInfo){

                 if($employee->employeeInfo->employeeContact){
                    $emp_mob_Ph = $employee->employeeInfo->employeeContact->emp_mob_Ph;
                 }

            }

        @endphp
        <tr>
            <td class="text-center">{{$i++}}</td>
            <td>{{$personl}}</td>
            <td>{{$employee->username}} </td>
            <td>{{$employee->name}}</td>
            <td>{{$emp_mob_Ph}}</td>
            <td>{{ $designation}}</td>
            {{--<td>@if(!empty($employee->getRoleNames()))
        @foreach($employee->getRoleNames() as $v)
            {{ $v }}
        @endforeach--}}
            </td>
            <td>{{$employee->status}} </td>
            <td class="text-center">
                <div class="form-inline">
                    <div class="">
                        <button class=" btn-round  btn-sm btn text-info btn-link    btn-cus-weight show-view-staff"
                                type="button"
                                data-toggle="modal"
                                {{-- data-target="#viewclass"--}}
                                id="show-subject"
                                aria-haspopup="true"
                                aria-expanded="false" data-id="{{ $employee->id  }}">
                            View
                        </button>
                    </div>
                    @canany(['withdraw-staff', 'edit-staff'])
                        <div
                                class="nav-item btn-rotate dropdown pull-right ">
                            <a class="nav-link dropdown-toggle pull-right"
                               href="javascript:void(0)" id="navbarDropdownMenuLink"
                               data-toggle="dropdown"
                               aria-haspopup="true"
                               aria-expanded="false" data-id="{{ $employee->id  }}">
                            </a>
                            <div
                                    class="dropdown-menu dropdown-menu-right"
                                    aria-labelledby="navbarDropdownMenuLink">
                                @can('edit-staff')
                                    <a class="dropdown-item edit-subject" href="{{url('edit-appointment-info/'.$employee->id)}}"
                                       {{-- data-target="#editclass"--}}
                                       aria-haspopup="true"
                                       aria-expanded="false" data-id="{{ $employee->emp_Id  }}">Edit</a>

                                @endcan
                                @can('withdraw-staff')
                                    <a class="dropdown-item chnge_status"
                                       href="{{url('change-employee-status/'.$employee->id )}}">Change Status</a>
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

<table id="attendance-table" class="table table-hover custom_border" cellspacing="0" width="100%">
    <thead class="table-secondary">
        <tr>
            <th class="w-5">S.No</th>
            <th class="w-15">Name</th>
            <th class="w-20">TimeIn</th>
            <th class="w-20">TimeOut</th>
            <th class="w-40">Actions</th>
        </tr>
    </thead>
    <tfoot class="table-secondary">
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>TimeIn</th>
            <th>TimeOut</th>
            <th>Actions</th>

        </tr>
    </tfoot>
    <tbody>
        @php $i=1; @endphp
        @if ($empolyeAttendence != '')
            @foreach ($empolyeAttendence as $attendence)

                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                        {{ $attendence->name }}
                    </td>

                    <td>

                       <input type="hidden" name="mark[{{ $attendence->id }}]" value="{{ $attendence->Attendance?$attendence->Attendance->id:0 }}"/>
                        <div class='col-sm-10'>
                            <div class="form-group">
                                <div class='input-group time' id='datetimepicker3'>
                                    <input type='text' name="in_time[{{ $attendence->id }}]" value="{{ ($attendence->Attendance && $attendence->Attendance->in_time!="00:00:00")? date("h:i A" ,strtotime($attendence->Attendance->in_time)): '' }}"
                                        class="form-control start_time datetimepicker3 rounded" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </td>
                    <td>

                        <div class='col-sm-10'>
                            <div class="form-group">
                                <div class='input-group time' id='datetimepicker3'>
                                    <input type='text' name="out_time[{{ $attendence->id }}]" value="{{ ($attendence->Attendance && $attendence->Attendance->out_time!="00:00:00")? date("h:i A" ,strtotime($attendence->Attendance->out_time)): '' }}"
                                    class="form-control end_time datetimepicker3 rounded" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="attendstatusradio">

                        <label class="attendance-radio-lable">Present
                            <input type="radio" class="attendstatus" name="status[{{$attendence->id}}]" value="P" {{ ($attendence->Attendance && $attendence->Attendance->status == "P") ? 'checked="checked"': ''  }} >
                            <span class="checkmark"></span>
                        </label>
                        <label class="attendance-radio-lable">Absent
                            <input type="radio" class="attendstatus" name="status[{{$attendence->id}}]" {{ (empty($attendence->Attendance)) ? 'checked': ''  }} name="status[{{$attendence->id}}]" value="A" {{ ($attendence->Attendance && $attendence->Attendance->status == "A") ? 'checked': ''  }}>
                            <span class="checkmark"></span>
                        </label>
                        <label class="attendance-radio-lable">Late
                            <input type="radio" class="attendstatus" name="status[{{$attendence->id}}]" value="L"  {{ ($attendence->Attendance && $attendence->Attendance->status == "L") ? 'checked="checked"': ''  }}>
                            <span class="checkmark"></span>
                        </label>
                        <label class="attendance-radio-lable">Half Day
                            <input type="radio" class="attendstatus" name="status[{{$attendence->id}}]" value="HD" {{ ($attendence->Attendance && $attendence->Attendance->status == "HD") ? 'checked="checked"': ''  }}>
                            <span class="checkmark"></span>
                        </label>
                        <label class="attendance-radio-lable">Leave
                            <input type="radio" class="attendstatus" name="status[{{$attendence->id}}]" value="H" {{ ($attendence->Attendance && $attendence->Attendance->status == "H") ? 'checked="checked"': ''  }}>
                            <span class="checkmark"></span>
                        </label>

                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>




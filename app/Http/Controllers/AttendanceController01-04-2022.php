<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Role;
use App\Models\User;
use App\Models\School;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->date);
        if ($request->date) {
            $date  = $request->date;
        } else {

            $date = date('Y-m-d');
        }
        $school_timing = School::select('start_time', 'end_time')->first();
        $empolyeAttendence = User::whereHas('roles', function ($q) {
            $q->whereNotIn(
                'name',
                ['parents', 'Student',  'Super Admin']
            )->where('status', 'active');
        })->with(['Attendance' => function ($query) use ($date) {
            $query->where('date', $date);
            $query->Orwhere('date', null);
        }])->get();

        if ($request->date) {

            return view('staff.attendence.partail.attendence', compact('empolyeAttendence'))->render();
        }


        return view('staff.attendence.attendance', compact('empolyeAttendence','school_timing'));
    }

    public function SaveEmpAttendance(Request $request)
    {

        $input = $request->all();
        //dd($input);
        $Attendance = [];

        foreach ($input['mark'] as $key => $value) {

            if (!empty($input['in_time'][$key])) {
                $in_time = $input['in_time'][$key];


                $out_time = $input['out_time'][$key];
            } else {
                $in_time = '';
                $out_time = '';
            }

            //dd($attend);
            $array = [
                'out_time' => $in_time,
                'in_time' => $out_time,
                'employee_id' => $key,
                'date' => $input['attend'],
                'status' => $input['status'][$key],
            ];

            if ($input['mark'][$key] != 0) {

                Attendance::where('id', $input['mark'][$key])->update($array);
            } else {
                Attendance::Create($array);
            }
        }
        exit;


        return response()->json(['message' => 'Successfully Added!']);
    }
}

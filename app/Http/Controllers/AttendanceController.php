<?php

// namespace App\Http\Controllers;

// use App\Models\Attendance;
// use App\Models\Role;
// use App\Models\User;
// use Illuminate\Http\Request;

// class AttendanceController extends Controller
// {
//     public function index(Request $request)
//     {
//         // dd($request->date);
//         if ($request->date) {
//             $date  = $request->date;
//         } else {

//             $date = date('Y-m-d');
//         }

//         $empolyeAttendence = User::whereHas('roles', function ($q) {
//             $q->whereNotIn(
//                 'name',
//                 ['Admin', 'Student', 'Super Admin']
//             )->where('status', 'active');
//         })->with(['Attendance' => function ($query) use ($date) {
//             $query->where('date', $date);
//             $query->Orwhere('date', null);
//         }])->get();

//         if ($request->date) {

//             return view('staff.attendence.partail.attendence', compact('empolyeAttendence'))->render();
//         }


//         return view('staff.attendence.attendance', compact('empolyeAttendence'));
//     }

//     public function SaveEmpAttendance(Request $request)
//     {

//         $input = $request->all();
//         // dd($input);
//         $Attendance = [];

//         foreach ($input['mark'] as $key => $value) {

//             if (!empty($input['in_time'][$key])) {
//                 $in_time = $input['in_time'][$key];


//                 $out_time = $input['out_time'][$key];
//             } else {
//                 $in_time = '';
//                 $out_time = '';
//             }

//             //dd($attend);
//             $array = [
//                 'out_time' => $in_time,
//                 'in_time' => $out_time,
//                 'employee_id' => $key,
//                 'date' => $input['attend'],
//                 'status' => $input['status'][$key],
//             ];

//             if ($input['mark'][$key] != 0) {

//                 Attendance::where('id', $input['mark'][$key])->update($array);
//             } else {
//                 Attendance::Create($array);
//             }
//         }
//         exit;


//         return response()->json(['message' => 'Successfully Added!']);
//     }
// }

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Role;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {

        if ($request->date) {
            $date  = $request->date;
        } else {

            $date = date('Y-m-d');
        }

        if(!empty($request->type) && $request->type == 'all'){
            $request->type = '';

        }
        $school_timing = School::select('start_time', 'end_time')->first();
        $empolyeAttendence = User::whereHas('roles', function ($q) {
            $q->whereNotIn(
                'name',
                ['parents', 'Student',  'Super Admin']
            )->where('status', 'active');
        })->wherehas('employeeInfo', function ($q2) use ($request) {
            if(!empty($request->type)){
                $q2->where('emp_typ_Id', $request->type);
            }

        })->with(['Attendance' => function ($query) use ($date) {
            $query->where('date', $date);
            $query->Orwhere('date', null);
        }])->get();
        if ($request->date || $request->type) {

            return view('staff.attendence.partail.attendence', compact('empolyeAttendence'))->render();
        }


        return view('staff.attendence.attendance', compact('empolyeAttendence', 'school_timing'));
    }

    public function SaveEmpAttendance(Request $request)
    {

        $input = $request->all();
        // dd($input);
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
                'out_time' => $out_time,
                'in_time' => $in_time,
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

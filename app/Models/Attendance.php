<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = "attendence";
    public $timestamps = false;
    use HasFactory;


    protected $fillable = [


        'employee_id',
        'in_time',
        'out_time',
        'date',
        'status',
        'no_of_hours_worked',

        'comments'

    ];

    public function user(){
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }

    public function employee(){
        return $this->hasOne(EmployeeInfo::class , 'employee_id', 'emp_Id');
    }


    public function getAttendeneceState($status){

        switch ($status) {
            case 'A':
                return ['Absent', 'badge badge-pill badge-danger'];
                break;
            case 'P':
                return ['Present', 'badge badge-pill badge-success'];
                break;
            case 'H':
                return ["Leave", "badge badge-pill badge-secondary"];
                break;
            case 'L':
                return ["Late", "badge badge-pill badge-warning"];
                break;
          }
    }


    public function EmployeeAttendance($date , $status){
        return Attendance::where('date', $date)->where('status', $status)->sum();
    }

}

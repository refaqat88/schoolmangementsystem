<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassschedDays extends Model
{
    protected $table = "classsched_days";
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'classsched_id',
        'day',
        'peroid',
        'time_start',
        'time_end',
        'emp_Id',
        'subject_id'
    ];


    public function schudle_list()
    {
   
        return $this->belongsTo(Classsched::class,'classsched_id','id');
    }

    public function teachers()
    {

        return $this->belongsTo(User::class,'emp_Id','id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'sub_Id');
    }

    public function days()
    {
        return $this->belongsTo(Day::class, 'day', 'id');
    }











}

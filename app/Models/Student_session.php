<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_session extends Model
{
    protected $table = "student_sessions";
    public $timestamps = false;     
    
    protected $fillable = [
                          

   
        'session_id',
        'student_id',
        'class_id',
        'section_id',
        'optional_subject',
        'created_at',
        'updated_at',
        'roll'

    ];

    use HasFactory;


    public function class()
    {

        // added
        return $this->belongsTo(AddClasses::class, 'class_id', 'cls_Id');
    }


}

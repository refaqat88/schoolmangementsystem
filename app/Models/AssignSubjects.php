<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubjects extends Model
{
    protected $table = "assign_subjects";
    public $timestamps = false;
   

       protected $fillable = [
        'subject_id',
        'cls_id',
        'section_id',
        'teacher_id',
        'lecture_per_week',
        'subject_name',
        'type'
    ];


    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'sub_Id');
    }


     public function section()
    {
        return $this->belongsTo(ClassSection::class, 'section_id', 'c_section_Id');
    }

    public function class()
    {
        return $this->belongsTo(AddClasses::class, 'cls_id', 'cls_Id');
    }


     public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

 












    



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    protected $table = "syllabus";
    public $timestamps = false;
    protected $primaryKey = 'syllabus_Id';
    use HasFactory;

    public function class()
    {
        return $this->belongsTo(AddClasses::class, 'cls_Id', 'cls_Id');
    }

    public function exams()
    {
        return $this->belongsTo(Exam::class, 'exam_Id', 'exam_Id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'sub_Id', 'sub_Id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamPaper extends Model
{
    protected $table = "exam_paper";
    public $timestamps = false;
    protected $primaryKey = 'exampaper_Id';
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

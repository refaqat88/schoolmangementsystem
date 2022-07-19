<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSubjectMark extends Model
{
    protected $table = "setsubjectmarks";
    public $timestamps = false;
    protected $primaryKey = 'submarks_Id';
    use HasFactory;


    public function exams()
    {
        return $this->belongsTo(Exam::class, 'exam_Id', 'exam_Id');
    }

    public function setmarks()
    {
        return $this->hasOne(Exam::class,'exam_Id','exam_Id');
    }

    public function schoolSection()
    {
        return $this->belongsTo(Section::class, 'sc_sec_Id', 'sc_sec_Id');
    }
    


    public function subject()
    {
        return $this->belongsTo(Subject::class, 'sub_Id', 'sub_Id');
    }






}

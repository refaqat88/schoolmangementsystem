<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datesheet extends Model
{
    protected $table = "datesheet";
    public $timestamps = false;
    protected $primaryKey = 'dsheet_Id';
    use HasFactory;

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_Id', 'exam_Id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'sub_Id', 'sub_Id');
    }


    public function class()
    {
        return $this->belongsTo(AddClasses::class, 'cls_Id', 'cls_Id');
    }



    public function section()
    {
        return $this->belongsTo(ClassSection::class, 'c_section_Id', 'c_section_Id');
    }
    


    public function teacherExam()
    {
        return $this->belongsTo(Exam::class, 'exam_Id', 'exam_Id');
    }

   





}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Exam extends Model
{
    protected $table = "exams";
    public $timestamps = false;
    protected $primaryKey = 'exam_Id';
    use HasFactory;

    public function grade()
    {
        return $this->hasMany(Grade::class, 'exam_Id', 'exam_Id');
    }


    public function datesheets()
    {
        return $this->hasMany(Datesheet::class, 'exam_Id', 'exam_Id')->orderBy('cls_Id');
    }


    public function type()
    {
        return $this->belongsTo(ExamType::class, 'exm_typ_Id', 'exm_typ_Id');
    }



     public function schoolSection()
    {
        return $this->belongsTo(Section::class, 'sc_sec_Id', 'sc_sec_Id');
    }

    public function exaSection($section)
    {
        return Exam::where('top',$section)->get();
    }


}

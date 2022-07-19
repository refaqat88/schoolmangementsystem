<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyMaterial extends Model
{
    protected $table = "study_material";
    public $timestamps = false;
    protected $primaryKey = 'pk_study_material_Id';
    use HasFactory;

    public function class()
    {
        return $this->belongsTo(AddClasses::class, 'fk_cls_Id', 'cls_Id');
    }
    public function classsection()
    {
        return $this->belongsTo(ClassSection::class, 'fk_c_section_Id', 'c_section_Id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'fk_sub_Id', 'sub_Id');
    }

    public function diaryofStudent($diary_id)
    {
        return StudyMaterial::where('top',$diary_id)->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $table = "diary";
    public $timestamps = false;
    protected $primaryKey = 'pk_diary_Id';
    use HasFactory;


    public function diaryType()
    {
        return $this->belongsTo(DiaryType::class, 'fk_diary_type_Id', 'pk_diary_type_Id');
    }
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
        return Diary::where('top',$diary_id)->get();
    }

}

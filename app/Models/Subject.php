<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subject";
    public $timestamps = false;
    protected $primaryKey = 'sub_Id';
    use HasFactory;


    public function subjectmarks()
    {
        return $this->hasMany(ExamSubjectMark::class, 'sub_Id', 'sub_Id');
    }


}

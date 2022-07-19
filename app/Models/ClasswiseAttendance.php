<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClasswiseAttendance extends Model
{
    protected $table = "classwise_attendace";
    public $timestamps = false;
    protected $primaryKey = 'cls_att_Id';
    use HasFactory;


    public function class()
    {
        return $this->belongsTo(AddClasses::class, 'cls_Id', 'cls_Id');
    }



    public function section()
    {
        return $this->belongsTo(ClassSection::class, 'c_section_Id', 'c_section_Id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'std_Id', 'id');
    }


}

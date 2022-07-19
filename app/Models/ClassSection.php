<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSection extends Model
{
    protected $table = "class_section";
    public $timestamps = false;
    protected $primaryKey = 'c_section_Id';
    use HasFactory;


    public function classRep()
    {
        return $this->belongsTo(User::class, 'crep_Id', 'id');
    }

    public function class()
    {
        return $this->belongsTo(AddClasses::class, 'cls_Id', 'cls_Id');
    }
    


    public function schedule()
    {
        return $this->hasMany(Classsched::class, 'c_section_Id', 'c_section_Id');
    }


     public function teacher()
    {
        return $this->belongsTo(User::class, 'emp_Id', 'id');
    }



    public function student()
    {
        return $this->belongsTo(StudentInfo::class, 'user_Id', 'id');
    }


    



}

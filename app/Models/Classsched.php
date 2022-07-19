<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classsched extends Model
{
    protected $table = "classsched";
    public $timestamps = false;
    protected $primaryKey  = "id";
    
    protected $fillable = [
        'id',
         'cls_Id',
         'c_section_Id',
         'session'
    ];



    public function user()
    {
        return $this->belongsTo(User::class, 'emp_Id', 'id');
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

     public function listTeds()
    {
        return $this->hasMany(ClassschedDays::class, 'classsched_id', 'id');
    }





}

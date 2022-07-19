<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentContact extends Model
{
    protected $table = "student_contact";
    public $timestamps = false;
    protected $primaryKey = 'pnt_cnt_Id';
    use HasFactory;

    public function domicile()
    {

        // added 
        return $this->belongsTo(Domicile::class, 'pnt_District', 'dom_Id');
    }
    public function city()
    {

        // added
        return $this->belongsTo(City::class, 'pnt_City', 'pk_city_id');
    }



}

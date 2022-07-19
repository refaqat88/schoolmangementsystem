<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeContact extends Model
{
    protected $table = "employee_contact";
    public $timestamps = false;
    protected $primaryKey = 'emp_cnt_Id';
    use HasFactory;


      protected $fillable = [
        'emp_mob_Ph',
        'emp_home_Ph',
        'emp_Email',
        'emp_mail_Add' ,
        'emp_pmt_Add' ,
        'emp_City' ,
        'emp_District' ,
        'zip_Code' ,

    ];


     public function city()
    {
        return $this->belongsTo(City::class, 'emp_City', 'pk_city_id');
    }
    
 

}

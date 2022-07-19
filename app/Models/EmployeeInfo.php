<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeInfo extends Model
{
    protected $table = "employee_info";
    public $timestamps = false;
    protected $primaryKey = 'emp_Id';
    use HasFactory;

    protected $fillable = [
        'emp_fat_Name',
        'gnd_Id',
        'emp_marital_Status',
        'bg_Id',
        'emp_Cnic',
        'emp_Dob',
        'relig_Id',
        'nation_Id',
        'country_Id',
        'state_Id',
        'dom_Id',
        'cast_Id',
        'emp_Status',
        'emp_typ_Id',
        'emer_cnt_Id',
        'empt_Id',
        'emp_cnt_Id',
        'desig_Id',
        'user_id'


    ];



    
    public function employmentInfo()
    {
        return $this->hasOne(EmploymentInfo::class, 'empt_Id', 'empt_Id');
    }

    public function employeeContact()
    {
        return $this->hasOne(EmployeeContact::class, 'emp_cnt_Id', 'emp_cnt_Id');
    }


    public function emergencyContact()
    {
        return $this->hasOne(EmergencyContact::class, 'emer_cnt_Id', 'emer_cnt_Id');
    }

    public function employmentType()
    {
        return $this->hasOne(EmployeeType::class, 'emp_typ_Id', 'emp_typ_Id');
    }

    public function state()
    {
        return $this->hasOne(State::class, 'state_Id', 'state_Id');
    }

    public function designation()
    {
        return $this->hasOne(Designation::class, 'desig_Id', 'desig_Id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gnd_Id', 'gnd_Id');
    }
    public function bloodGroup()
    {
        return $this->belongsTo(BloodGroup::class, 'bg_Id', 'bg_Id');
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class, 'relig_Id', 'relig_Id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nation_Id', 'nation_Id');
    }



    public function country()
    {
        return $this->belongsTo(Nationality::class, 'country_Id', 'nation_Id');
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_Id', 'pk_city_id');
    }

    public function domicile()
    {
        return $this->belongsTo(Domicile::class, 'dom_Id', 'dom_Id');
    }
    public function cast()
    {
        return $this->belongsTo(Cast::class, 'cast_Id', 'cast_Id');
    }


}

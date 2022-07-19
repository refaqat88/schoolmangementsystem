<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeType extends Model
{
    protected $table = "employee_type";
    public $timestamps = false;
    protected $primaryKey = 'emp_typ_Id';
    use HasFactory;
}

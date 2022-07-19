<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance_type extends Model
{
    protected $table = "attendance_type";
    public $timestamps = false;
    protected $primaryKey = 'att_typ_Id ';
    use HasFactory;
}

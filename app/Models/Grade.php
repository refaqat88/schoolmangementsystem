<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = "grade";
    public $timestamps = false;
    //protected $primaryKey = 'exam_Id ';
    use HasFactory;


}

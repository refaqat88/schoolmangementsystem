<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade_general extends Model
{
    protected $table = "grade_general";
    public $timestamps = false;
    //protected $primaryKey = 'exam_Id ';
    use HasFactory;


}

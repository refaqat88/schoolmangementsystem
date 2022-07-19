<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCategory extends Model
{
    protected $table = "student_category";
    public $timestamps = false;
    protected $primaryKey = 'std_cat_Id';
    use HasFactory;
}

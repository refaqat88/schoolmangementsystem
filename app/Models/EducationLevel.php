<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    protected $table = "education_level";
    public $timestamps = false;
    protected $primaryKey = 'edu_level_Id';
    use HasFactory;
}

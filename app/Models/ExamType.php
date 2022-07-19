<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    protected $table = "exam_type";
    public $timestamps = false;
    protected $primaryKey = 'exm_typ_Id';
    use HasFactory;
}

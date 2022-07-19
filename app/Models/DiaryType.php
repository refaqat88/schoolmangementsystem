<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryType extends Model
{
    protected $table = "diary_type";
    public $timestamps = false;
    protected $primaryKey = 'pk_diary_type_Id ';
    use HasFactory;
}

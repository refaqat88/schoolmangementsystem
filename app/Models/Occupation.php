<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $table = "occupation";
    public $timestamps = false;
    protected $primaryKey = 'occup_Id';
    use HasFactory;
}

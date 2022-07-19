<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $table = "days";
    public $timestamps = false;
    //protected $primaryKey = 'id';
    use HasFactory;
}

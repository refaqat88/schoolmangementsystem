<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    protected $table = "cast";
    public $timestamps = false;
    protected $primaryKey = 'cast_Id';
    use HasFactory;
}

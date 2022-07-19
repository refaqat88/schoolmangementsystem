<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $table = "religion";
    public $timestamps = false;
    protected $primaryKey = 'relig_Id';
    use HasFactory;
}

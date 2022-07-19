<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disability extends Model
{
    protected $table = "disable";
    public $timestamps = false;
    protected $primaryKey = 'disable_Id';
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "cities";
    public $timestamps = false;
    protected $primaryKey = 'pk_city_id';
    use HasFactory;
}

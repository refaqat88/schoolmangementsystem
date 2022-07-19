<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table = "periods";
    public $timestamps = false;
    //protected $primaryKey = 'id';
    use HasFactory;
}

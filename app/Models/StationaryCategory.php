<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationaryCategory extends Model
{
    protected $table = "stationary_category";
    public $timestamps = false;
    protected $primaryKey = 'stat_categ_Id';
    use HasFactory;
}

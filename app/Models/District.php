<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = "domicile";
    public $timestamps = false;
    protected $primaryKey = 'dom_Id';
    use HasFactory;
}

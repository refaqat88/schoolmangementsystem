<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "supplier";
    public $timestamps = false;
    protected $primaryKey = 'supp_Id';
    use HasFactory;
}

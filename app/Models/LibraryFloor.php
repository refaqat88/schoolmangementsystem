<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryFloor extends Model
{
    protected $table = "library_floor";
    public $timestamps = false;
    protected $primaryKey = 'floor_Id';
    use HasFactory;
}

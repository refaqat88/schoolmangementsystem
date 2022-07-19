<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table = "library_info";
    public $timestamps = false;
    protected $primaryKey = 'library_Id';
    use HasFactory;
}

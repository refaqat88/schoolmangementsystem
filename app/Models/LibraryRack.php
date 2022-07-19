<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryRack extends Model
{
    protected $table = "library_rack";
    public $timestamps = false;
    protected $primaryKey = 'rack_Id';
    use HasFactory;
}

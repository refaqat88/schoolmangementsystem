<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryEntity extends Model
{
    protected $table = "library_entity";
    public $timestamps = false;
    protected $primaryKey = 'lent_Code';
    use HasFactory;
}

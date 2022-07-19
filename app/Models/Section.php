<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = "school_section";
    public $timestamps = false;
    protected $primaryKey = 'sc_sec_Id';
    use HasFactory;
}

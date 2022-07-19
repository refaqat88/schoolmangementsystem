<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralEntity extends Model
{
    protected $table = "general_entity";
    public $timestamps = false;
    protected $primaryKey = 'lent_Code';
    use HasFactory;
}

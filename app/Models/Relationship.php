<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $table = "relationship";
    public $timestamps = false;
    protected $primaryKey = 'pk_relat_Id';
    use HasFactory;
}

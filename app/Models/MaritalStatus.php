<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model
{
    protected $table = "marital_status";
    public $timestamps = false;
    protected $primaryKey = 'pk_marital_id';
    use HasFactory;
}

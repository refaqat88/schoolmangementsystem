<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = "publisher";
    public $timestamps = false;
    protected $primaryKey = 'pub_Id';
    use HasFactory;
}

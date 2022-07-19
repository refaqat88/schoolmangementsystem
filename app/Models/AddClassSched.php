<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddClassSched extends Model
{
    protected $table = "classsched";
    public $timestamps = false;
    protected $primaryKey = 'ttable_Id';
    use HasFactory;


}

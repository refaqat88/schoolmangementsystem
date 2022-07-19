<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationaryEdition extends Model
{
    protected $table = "stationary_edition";
    public $timestamps = false;
    protected $primaryKey = 'edition_Id';
    use HasFactory;
}

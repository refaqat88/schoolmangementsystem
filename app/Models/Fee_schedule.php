<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee_schedule extends Model
{
    protected $table = "fee_schedule";
    public $timestamps = false;
    protected $primaryKey = 'fee_sch_Id';
    use HasFactory;
 

}

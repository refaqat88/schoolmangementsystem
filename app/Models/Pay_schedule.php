<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay_schedule extends Model
{
    protected $table = "pay_schedule";
    public $timestamps = false;
    protected $primaryKey = 'pay_sch_Id';
    use HasFactory;
 

}

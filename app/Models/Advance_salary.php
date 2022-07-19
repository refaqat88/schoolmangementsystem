<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advance_salary extends Model
{
    protected $table = "advance_salary";
    public $timestamps = false; 
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'advance_amount',
        'Installments',
        'amount_per_pay_peroid',
        'status'

    ];


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawlStudent extends Model
{
    protected $table = "withdrawl_student";
    public $timestamps = false;
    protected $primaryKey = 'with_Id';
    protected $fillable = ['Std_Id'];
    use HasFactory;
}

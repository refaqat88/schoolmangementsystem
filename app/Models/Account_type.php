<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account_type extends Model
{
    protected $table = "account_type";
    public $timestamps = false;
    protected $primaryKey = 'acc_type_Id';
    use HasFactory;



}

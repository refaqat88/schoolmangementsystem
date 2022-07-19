<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $table = "bank_account";
    public $timestamps = false;
    protected $primaryKey = 'bank_acc_Id ';
    use HasFactory;
    protected $fillable = [
        'bank_acc_Id ',
        'bank_acc_No',
        'bank_Name',
        'branch_Code',
        'branch_Address',
        'user_id'
    ];


}

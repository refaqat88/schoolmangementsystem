<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chartofaccounts extends Model
{
    protected $table = "chartofaccounts";
    public $timestamps = false;
    protected $primaryKey = 'acc_Id';
    use HasFactory;

    protected $fillable = [
        'acc_Id',
        'acc_type_Id',  
        'acc_Name',
        'acc_Code',
        'acc_Balance',
        'acc_Date',
        'acc_parent',
        'created_at',
        'description',
        'level'


    ];

    
   public function account()
    {
        return $this->belongsTo(Account_type::class, 'acc_type_Id', 'acc_type_Id');
    }


    public function parent()
    {
        return $this->belongsTo(Chartofaccounts::class, 'acc_parent', 'acc_Id');
    }


    public function ParentRecord()
    {
         return self::where('acc_Id', $this->acc_parent)->first();
    }




}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = "transactions";
    public $timestamps = false;
    protected $primaryKey = 'tr_Id';
    use HasFactory;
      protected $fillable = [
        'tr_Id',
        'tr_Type',
        'tr_Date',
        'acc_Id',
        'dr_Amt',
        'cr_Amt',
        'bl_Amt',
        'tr_Status',
        'std_Id',
        'emp_Id',
        'supp_Id',
        'month',
        'schedule_id',
        'Vtype',
        'char_id',
        'Narration'
    ];



    public function Type($value)
    { 
        if($value=='1'){ $tr_Type = 'Bill' ; } else if($value=='3'){ $tr_Type = 'Adjustment' ; } else {$tr_Type= 'Payments';};
        return $tr_Type;
    }

 
    

    public function User()
    {
        return $this->belongsTo(User::class, 'acc_Id', 'id');
    }



    public function Student()
    {
        return $this->belongsTo(User::class, 'std_Id', 'id');
    }


     public function schedule()
    {
        return $this->belongsTo(Fee_schedule::class, 'schedule_id', 'fee_sch_Id');
    }


     public function schedule_pay()
    {
        return $this->belongsTo(Pay_schedule::class, 'schedule_id', 'pay_sch_Id');
    }


    public function accounts()
    {
        return $this->belongsTo(Chartofaccounts::class, 'acc_Id', 'acc_Id');
    }


  


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    protected $table = "emergency_contact";
    public $timestamps = false;
    protected $primaryKey = 'emer_cnt_Id';
    use HasFactory;

     protected $fillable = [
        'emer_cont_Name',
        'emer_cont_No',
        'fk_emer_relat_Id',
        'other_relation' 


    ];

    public function relations()
    {
        return $this->belongsTo(Relationship::class, 'fk_emer_relat_Id', 'pk_relat_Id');
    }

     
}

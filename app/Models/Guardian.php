<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $table = "parent_info";
    public $timestamps = false;
    protected $primaryKey = 'pnt_Id';
    use HasFactory;

    public function gender(){
        return $this->belongsTo(Gender::class,'gnd_Id','gnd_Id');
    }
    public function occupation(){
        return $this->belongsTo(Occupation::class,'occup_Id','occup_Id');
    }
    public function designation(){
        return $this->belongsTo(Designation::class,'desig_Id','desig_Id');
    }
    public function relationship(){
        return $this->belongsTo(Relationship::class,'fk_relat_Id','pk_relat_Id');
    }
    public function maritalStatus(){
        return $this->belongsTo(MaritalStatus::class,'pnt_marital_Status','pk_marital_id');
    }


}

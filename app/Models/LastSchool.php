<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastSchool extends Model
{
    protected $table = "last_school";
    public $timestamps = false;
    protected $primaryKey = 'lsch_Id';
    use HasFactory;
    protected $fillable = [
        'lsch_Name',
        'lsch_contact_No',
        'lsch_lv_Date',
        'lsch_class_Passed',
        'lsch_Comments',
        'lsch_slc_img'
    ];



    public function class()
    {
        return $this->belongsTo(AddClasses::class, 'lsch_class_Passed', 'cls_Id');
    }
}

<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AddClasses extends Model
{
    protected $table = "class";
    public $timestamps = false;
    protected $primaryKey = 'cls_Id';
    use HasFactory;

    public function schoolSection(){
        return $this->belongsTo(UserType::class, 'user_type', 'user_type_Id');
    }


     public function section(){
        return $this->belongsTo(UserType::class, 'user_type', 'user_type_Id');
    }

    public function getSubject(){
        $subjects = Subject::whereIn('sub_Id',explode(',',$this->subject))->get();
        return $subjects;
    }






}

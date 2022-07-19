<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guardian;
use Carbon\Carbon;
class StudentInfo extends Model
{
    protected $table = "student_info";
    public $timestamps = false;
    protected $primaryKey = 'std_Id';
    use HasFactory;
    protected $fillable = [
        'cls_Id',
        'section_id'
      
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function admission(){
        return $this->belongsTo(Admission::class, 'adm_No', 'adm_No');
    }
    public function lastSchool(){
        return $this->belongsTo(LastSchool::class, 'lsch_Id', 'lsch_Id');
    }
    public function blood(){
        return $this->belongsTo(BloodGroup::class, 'bg_Id', 'bg_Id');
    }
    public function religion(){
        return $this->belongsTo(Religion::class, 'relig_Id', 'relig_Id');
    }
    public function studentCategory(){
        return $this->belongsTo(StudentCategory::class, 'std_cat_Id', 'std_cat_Id');
    }
    public function nationality(){
        return $this->belongsTo(Nationality::class, 'nation_Id', 'nation_Id');
    }
    public function cast(){
        return $this->belongsTo(Cast::class, 'cast_Id', 'cast_Id');
    }
    public function disable(){
        return $this->belongsTo(Disable::class, 'disable_Id', 'disable_Id');
    }
    public function domicile(){
        return $this->belongsTo(Domicile::class, 'dom_Id', 'dom_Id');
    }
    public function father($id=null){       
        if(!empty($id)){
            return User::where('id',$id)->first();
        }else{
            return false ;
        }
    }
    public function contact(){
        return $this->belongsTo(StudentContact::class, 'fk_pnt_cnt_Id', 'pnt_cnt_Id');
    }
    public function contact_emergency(){
        return $this->belongsTo(EmergencyContact::class, 'emer_cnt_Id', 'emer_cnt_Id');
    }
    public function age(){
        return Carbon::parse($this->attributes['std_Dob'])->age;
    }
    public function parenInfo($id){
       return Guardian::where('pnt_Id',$id)->first();
    }
    public function mother(){
        return $this->belongsTo(User::class, 'mother_id', 'id');
    }
    public function class(){
        return $this->belongsTo(AddClasses::class, 'cls_Id', 'cls_Id');
    }
    public function section(){
        return $this->belongsTo(ClassSection::class, 'section_id', 'c_section_Id');
    }
    
}

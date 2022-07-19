<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Holiday; 
use App\Models\Transactions; 

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //public $timestamps = false;

     
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'username',
        'user_image',
        'status',
        'phone',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];



    
    public function photo()
    {
       
        if (file_exists( public_path('/upload/user/').$this->user_image) && $this->user_image!='') {
            
            return asset('upload/user/'.$this->user_image);
        } else {
            return asset('upload/user/no-image.png');
        }
    
    }   


 


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Get the user that owns the phone.
     */
    public function userType()
    {
        return $this->belongsTo(UserType::class, 'user_type', 'user_type_Id');
    }
    


    /**
     * Get the user that owns the phone.
     */
    public function withDraw()
    {
        return $this->belongsTo(WithdrawlStudent::class, 'id', 'std_Id');
    }
    


    public function employeeInfo()
    {
        return $this->hasOne(EmployeeInfo::class, 'user_Id', 'id');
    }

    public function classEnrollements()
    {
        return $this->hasOne(ClassSection::class, 'emp_Id', 'id');
    }
 

     public function studentinfo()
    {
        return $this->hasOne(StudentInfo::class, 'user_id', 'id');
    }


     public function student_sessions()
    {
        return $this->hasOne(Student_session::class, 'student_id', 'id');
    }


    public function student_session($session)
    {

        return $this->hasOne(Student_session::class, 'student_id', 'id')->where('session_id',$session)->first();
    }

    /*
    
    public function children()
    {
        return $this->hasMany(StudentInfo::class, '_id', 'id');
    }
    
    */


    public function assignSubject()
    {
        return $this->hasMany(AssignSubjects::class, 'teacher_id', 'id');
    }



    public function academic()
    {
        return $this->hasMany(AcademicQualification::class, 'user_id', 'id');
    }

    public function bankaccount()
    {
        return $this->hasOne(BankAccount::class, 'user_id', 'id');
    }

     public function experiences()
    {
        return $this->hasMany(PreviousExperience::class, 'user_id', 'id');
    }


    public function guardianInfo()
    {
        return $this->hasOne(Guardian::class,'user_id','id');
    }


     public function schedule()
    {
        $where = array('emp_Id' => $this->id,'pay_month'=>date('Y-m-')."01");
        $schedulepay = Pay_schedule::where($where)->first();

        return $schedulepay;
    }


    public function Attendance()
    {
       
        return  $this->hasOne(Attendance::class ,'employee_id', 'id');

    }

    


    function openBalance($std_Id){
        return Transactions::where('std_Id',$std_Id)->where('char_id',1)
                             ->where('tr_Type',1)->where(function ($query) {
                                    $query->where('tr_Status', '=', 'Open')
                                    ->orWhere('tr_Status', '=',  'Partial');
                                })
                             ->sum('bl_Amt');
    }



    function balancedue(){

        return Transactions::where('emp_Id',$this->id)
                            ->where('tr_Type',1)
                            ->where('char_id',1)
                            ->where(function ($query) {
                                $query->where('tr_Status', '=', 'Open')
                                        ->orWhere('tr_Status', '=',  'Partial');
                            })->sum('bl_Amt');
    }
    

   
   function getBalanceStudent(){
        return Transactions::where('std_Id',$this->id)->
                        where('tr_Type',1)->where(function ($query) {
                            $query->where('tr_Status', '=', 'Open')
                            ->orWhere('tr_Status', '=',  'Partial');
                        })->sum('bl_Amt');
    }

    
}

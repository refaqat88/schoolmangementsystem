<?php
namespace App\Http\Controllers;
use App\Models\AcademicQualification;
use App\Models\Admission;
use App\Models\BankAccount;
use App\Models\EducationLevel;
use App\Models\EmergencyContact;
use App\Models\EmployeeType;
use App\Models\EmploymentInfo;
use App\Models\MaritalStatus;
use App\Models\PreviousExperience;
use App\Models\ProfessionalQualification;
use App\Models\EmployeeContact;
use App\Models\LastSchool;
use App\Models\Designation;
use App\Models\Chartofaccounts;

use App\Models\Subject;
/*use App\Models\Disability;
use App\Models\Guardian;*/

use App\Models\Occupation;
use App\Models\Relationship;
use App\Models\School;

use App\Models\Role;
use App\Models\Board;
use App\Models\State;
use App\Models\Grade;
use App\Models\Grade_general;
use App\Models\StudentCategory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Religion;
use App\Models\StudentInfo;
use App\Models\EmployeeInfo;
/*use App\Models\AddClasses;*/

use App\Models\Gender;
use App\Models\BloodGroup;
use App\Models\Nationality;
use App\Models\District;
use App\Models\City;
use App\Models\Cast;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Redirect, Response;

class EmployeeController extends Controller
{

    function __construct()
    {

        $this->middleware('permission:view-staff|add-staff|edit-staff|withdraw-staff', ['only' => ['index','show']]);


        $this->middleware('permission:add-staff', ['only' => ['create','appointmentInfo']]);
        $this->middleware('permission:edit-staff', ['only' => ['EditAppointmentInfo','UpdateAppointmentInfo']]);
        $this->middleware('permission:withdraw-staff', ['only' => ['destroy']]);
    }


    public function getState($id)
    {
        //dd($id);
        $states = DB::table("state")->where("nation_Id",$id)->pluck("state_name","state_Id");
        //dd($states);
        return json_encode($states);
    }
    public function getDistrict($id)
    {
        $district = DB::table("domicile")->where("nation_Id",$id)->pluck("dom_District","dom_Id");
        return json_encode($district);
    }
    public function getDesignation($id)
    {
        $designation = DB::table("designation")->where(["emp_typ_Id"=>$id,"desig_Status"=>'Active'])->pluck("designation","desig_Id");
        return json_encode($designation);
    }
    public function getBoardUniversity($id)
    {
        $boards = DB::table("boards")->where('education_level', $id)->get();
        //dd($boards);
        return json_encode($boards);
    }
    public function getDistrictByState($id)
    {
        $district = DB::table("domicile")->where("state_Id",$id)->pluck("dom_District","dom_Id");
        return json_encode($district);
    }
    public function getCityByDistrict($id)
    {
        $district = DB::table("cities")->where("dom_Id",$id)->pluck("city_name","pk_city_id","zip_code");
        return json_encode($district);
    }
    public function getZipCode($id)
    {

        $district = DB::table("cities")->where("pk_city_id",$id)->pluck("zip_code");

        return json_encode($district);
    }

    public function getEmployee($id)
    {

        $studentData = StudentInfo::where('cls_Id', $id)->get();
        return $studentData;

    }

    /*  public function getstudentbysection($id){

             $studentData = StudentInfo::where('c_section_Id' ,$id)->get();
             return $studentData;

      }*/

    public function index(Request $request)
    { 
        $employeeTypes = EmployeeType::all();

        if ($request->employee_type || $request->status){

            if($request->status=='all'){
                $status = ['Active', 'Inactive'];

            }else{
                $status = [$request->status];

            }
            //dd($status);
            if($request->employee_type=='all'){
                $request->employee_type='';
            }

            $users = User::whereHas('roles', function ($q)  {
                        $q->whereNotIn( 'name' , [ 'Student', 'Super Admin','parents']);
                    })
                    ->whereHas('employeeInfo', function ($q3) use($request) {
                        if(!empty($request->employee_type)){
                            $q3->where('emp_typ_Id', $request->employee_type);
                        }
                    })
                    ->whereIn('status',$status)
                    ->orderBy('id','desc')->get();



            /*$users = User::whereHas('roles', function ($q) {
                $q->whereNotIn('name' , [ 'Student', 'Super Admin','parents']);
            })->whereHas('employeeInfo', function ($q) ->orwhere('emp_typ_Id',$request->employee_type)->orderBy('id','desc')->get();*/
            return view('staff.partials.staff_data', compact('users'))->render();
        }else{
        $users = User::whereHas('roles', function ($q) {
          $q->whereNotIn('name' , ['Student', 'Super Admin','parents']);
        })->orderBy('id','desc')->get();
        }
        return view('staff.index', compact('users','employeeTypes'));


    }


    public function CnicCheck(Request $request){
        $result = User::where('username',$request->username)->count();
        //dd($result);

        $response = "<span style='color: green;'>CNIC available.</span>";
        if($result){
            $count = $result;
            if($count > 0){
                $response = "<span style='color: red;'>CNIC already exist.</span>";
            }

        }

        echo $response;
        die;

    }


    public function EmployeeFilter(Request $request)
    {
        $query  = $request->search;
        if ($query == 'All'){
            $employees = DB::table('employee_info')
                ->leftjoin('employee_contact', 'employee_info.emp_cnt_Id', '=', 'employee_contact.emp_cnt_Id')
                ->leftjoin('gender', 'employee_info.gnd_Id', '=', 'gender.gnd_Id')
                ->leftjoin('nationality', 'employee_info.nation_Id', '=', 'nationality.nation_Id')
                ->leftjoin('domicile', 'employee_info.dom_Id', '=', 'domicile.dom_Id')
                ->leftjoin('cast', 'employee_info.cast_Id', '=', 'cast.cast_Id')
                ->leftjoin('blood_group', 'employee_info.bg_Id', '=', 'blood_group.bg_Id')
                ->leftjoin('religion', 'employee_info.relig_Id', '=', 'religion.relig_Id')
                ->leftjoin('emergency_contact', 'employee_info.emer_cnt_Id', '=', 'emergency_contact.emer_cnt_Id')
                ->leftjoin('employment_info', 'employee_info.empt_Id', '=', 'employment_info.empt_Id')
                ->get();
        }else{
            $employees = DB::table('employee_info')
                ->leftjoin('employee_contact', 'employee_info.emp_cnt_Id', '=', 'employee_contact.emp_cnt_Id')
                ->leftjoin('gender', 'employee_info.gnd_Id', '=', 'gender.gnd_Id')
                ->leftjoin('nationality', 'employee_info.nation_Id', '=', 'nationality.nation_Id')
                ->leftjoin('domicile', 'employee_info.dom_Id', '=', 'domicile.dom_Id')
                ->leftjoin('cast', 'employee_info.cast_Id', '=', 'cast.cast_Id')
                ->leftjoin('blood_group', 'employee_info.bg_Id', '=', 'blood_group.bg_Id')
                ->leftjoin('religion', 'employee_info.relig_Id', '=', 'religion.relig_Id')
                ->leftjoin('emergency_contact', 'employee_info.emer_cnt_Id', '=', 'emergency_contact.emer_cnt_Id')
                ->leftjoin('employment_info', 'employee_info.empt_Id', '=', 'employment_info.empt_Id')
                ->where('employee_info.emp_Status', '=', $query)
                ->get();
        }
        return view('staff.staff', compact('employees'));

    }
    public function create()
    {
        $users = User::all();
        $genders = Gender::all();
        //dd($genders);
        $marital_status = MaritalStatus::all();
        $bloodgroups = BloodGroup::all();
        $employee_types = EmployeeType::all();
        $designations = Designation::all();
        $ralationship = Relationship::all();
        $states = State::all();
        $districts = District::all();
        $cities = City::all();
        $religions = Religion::all();
        $nationalities = Nationality::all();
        $education_levels = EducationLevel::all();
        $casts = Cast::all();
        $roles = Role::whereNotIn('name' , ['Student', 'Super Admin'])->get();
        $board = Board::all(); 
        $subjects = Subject::all();
        $grade_general = Grade_general::all();
        $admission_no = School::select('school_abbreviation')->first();

        $i = DB::table('employment_info')->orderBy('empt_Id', 'DESC')->first();
            if (!empty($i)) {
                $adminId = $i->empt_Id;
            } else {
            
             $adminId = 0;
        }
    
        $employment_number = 'HR-'.$admission_no->school_abbreviation . "-" . date('y') . "-" . ($adminId + 1);
        //dd($employment_number);

        return view('staff.appointment', compact('marital_status', 'genders', 'bloodgroups', 'employee_types', 'designations', 'ralationship', 'districts', 'cities', 'religions', 'nationalities', 'casts','states','users','roles','employment_number','board','subjects','grade_general','education_levels'));
    }

    public function appointmentInfo(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'staff_cnic' => 'required|unique:users,username',
        ]);

        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()]);
        }else {
            $user = User::where('username', $request->staff_cnic)->first();
            if (!$user) {
                if ($request->file('employee_image')) {
                    $employee_image = $request->file('employee_image');
                    $new_employee_image = "emp" . time() . '.' . $employee_image->getClientOriginalExtension();
                    $employee_image->move(public_path('upload/user'), $new_employee_image);
                    //echo "<pre>"; print_r($new_student_image); exit;
                    $input["user_image"] = $new_employee_image;
                }

                $input['password'] = Hash::make($request->staff_cnic);
                $input['name'] = $request->given_name;
                $input['username'] = $request->staff_cnic;
                $input['emp_Img'] = $new_employee_image;
                $input['mobile'] = $request->employee_mobile_phone;
                $input['email'] = $request->employee_email;

                $input['status'] = ($request->status == 'Active') ? 'Active' : 'Inactive';


                /* Get Role */
                //$role = Role::where('name','Student')->first();
                $user = User::create($input);


            $user->assignRole($request->roles);
            }
            $data = [];

            if(!empty($request->bank_Name) || !empty($request->bank_acc_No) || !empty($request->branch_Code)){

                $account = BankAccount::where('user_id',$user->id)->first();

                    $bank = array(
                        "bank_Name" => $request->bank_Name,
                        "bank_acc_No" => $request->bank_acc_No,
                        "branch_Code" => $request->branch_Code,
                        "branch_Address" => $request->branch_Address,
                        "user_id" => $user->id
                    );

                    if (!$account){
                        BankAccount::create($bank);
                    }else{
                        BankAccount::where('user_id',$user->id)->update($bank);
                    }

            }

             
            if(!empty($request->prev_exper_Org)){
                foreach($request->prev_exper_Org as $key=>$val){
                     
                    $experiance = array(    "prev_exper_Org" => $request->prev_exper_Org[$key],
                                            "prev_exper_Position" => $request->prev_exper_Position[$key], 
                                            "prev_exper_Role" => $request->prev_exper_Role[$key], 
                                            "prev_Frmdate" => $request->prev_Frmdate[$key], 
                                            "prev_Todate" => $request->prev_Todate[$key],
                                            "user_id" => $user->id
                            );

                    if(isset($request->file('exp_file')[$key])) {

                        if ($experience_File = $request->file('exp_file')[$key]) {

                            $name1 = time() . '.' . $experience_File->getClientOriginalName();
                            $experience_File->move(public_path('upload/user/experience/'), $name1);

                            $experiance['exp_file'] = $name1;


                        }
                    }
                    //dd($experiance);

                        PreviousExperience::create($experiance);

                }
            }
            if(!empty($request->title3)){

                foreach($request->title3 as $key=>$val){
                    //echo $val;

                   $acedmic = array(       "title" => $request->title3[$key],
                                           "univ_Id" => $request->univ_Id3[$key], 
                                           "sub_Id" => isset($request->sub_Id3[$key])?$request->sub_Id3[$key]:'', 
                                           "session" => $request->session3[$key], 
                                           "grade_Id" => isset($request->grade_Id3[$key])?$request->grade_Id3[$key]:'',
                                           "acdm_Gpa" => isset($request->acdm_Gpa3[$key])?$request->acdm_Gpa3[$key]:'',
                                           "type" => $request->type3[$key],
                                           "user_id" => $user->id
                   );


                    if(isset($request->file('degree3')[$key])) {

                        if ($files = $request->file('degree3')[$key]) {

                            $name = time() . '.' . $files->getClientOriginalName();
                            $files->move(public_path('upload/user/degree/'), $name);

                            $acedmic['degree_file'] = $name;


                        }
                    }

                    //dd($acedmic);

                      AcademicQualification::create($acedmic);

                }
            }  
             

            $EmployeInfoexist = EmployeeInfo::where('user_Id', $user->id)->first();


            if (!empty($EmployeInfoexist->emer_cnt_Id)) {
                $e_id = $EmployeInfoexist->emer_cnt_Id;
            } else {

                $e_id = null;

            }


            if (!empty($EmployeInfoexist->emp_cnt_Id)) {
                $emp_cnt_Id = $EmployeInfoexist->emp_cnt_Id;

            } else {

                $emp_cnt_Id = null;
            }


            if (!empty($EmployeInfoexist->empt_Id)) {
                $empt_Id = $EmployeInfoexist->empt_Id;

            } else {

                $empt_Id = null;
            }


            $employee_info_array = [

                'emp_fat_Name' => $request->father,
                'gnd_Id' => $request->gender,
                'emp_marital_Status' => $request->marital_status,
                'bg_Id' => $request->blood_group,
                'emp_Cnic' => $request->staff_cnic,
                'emp_Dob' => $request->date_of_birth,
                'relig_Id' => $request->religion,
                'nation_Id' => $request->nationality,
                'desig_Id' => $request->desig_Id,
                'country_Id' => $request->country,
                'city_Id' => $request->employee_city,
                'state_Id' => $request->state,
                'dom_Id' => $request->employee_district,
                'cast_Id' => $request->staff_cast,
                'emp_Status' => ($request->employee_status) ? 'Active' : 'Inactive',
                'emp_typ_Id' => $request->emp_typ_Id,
                'emer_cnt_Id' => $e_id,
                'empt_Id' => $empt_Id,
                'emp_cnt_Id' => $emp_cnt_Id,
                'user_id' => $user->id

            ];


            if ($EmployeInfoexist == null)//if doesn't exist: create
            {




                $EmployeInfoexist = EmployeeInfo::create($employee_info_array);



            } else {


                $EmployeInfoexist->update($employee_info_array);


            }

            //dd($EmployeInfoexist);


            $employee_emergency_array = [
                'emer_cont_Name' => $request->emergency_contact_name,
                'emer_cont_No' => $request->emergency_contact_phone,
                'fk_emer_relat_Id' => $request->relation,
                'other_relation' => $request->other_relation
            ];


            if ($EmployeInfoexist->emer_cnt_Id == null)//if doesn't exist: create
            {

                $EmergencyContact = EmergencyContact::create($employee_emergency_array);

                $EmployeInfoexist->update(['emer_cnt_Id' => $EmergencyContact->emer_cnt_Id]);


            } else {

                EmergencyContact::where('emer_cnt_Id', $EmployeInfoexist->emer_cnt_Id)->update($employee_emergency_array);
            }


            /*Emergency Contact Table*/


            $employee_contact_array = [
                'emp_mob_Ph' => $request->employee_mobile_phone,
                'emp_home_Ph' => $request->employee_home_phone,
                'emp_Email' => $request->employee_email,
                'emp_mail_Add' => $request->mailing_address,
                'emp_pmt_Add' => $request->permanent_address,
                'emp_City' => $request->employee_city,
                'emp_District' => $request->district,
                'zip_Code' => $request->zip_code,
            ];


            if ($EmployeInfoexist->emp_cnt_Id == null)//if doesn't exist: create
            {

                $EmployeeContact = EmployeeContact::create($employee_contact_array);
                $EmployeInfoexist->update(['emp_cnt_Id' => $EmployeeContact->emp_cnt_Id]);


            } else {
                EmployeeContact::where('emp_cnt_Id', $EmployeInfoexist->emp_cnt_Id)->update($employee_contact_array);
            }


            $employee_personal_no = School::select('school_abbreviation')->first();

            $i = DB::table('employment_info')->orderBy('empt_Id', 'DESC')->first();
            if (!empty($i)) {
                $adminId = $i->empt_Id;
            } else {
                $adminId = 0;
            }

            $employee_personal_no = 'HR-' . $employee_personal_no->school_abbreviation . "-" . date('y') . "-" . ($adminId + 1);
            //dd($employee_personal_no);
            /* Employment Table */

            $employment_info_table = [

                'appt_Date' => $request->hire_date,
                'personal_No' => $employee_personal_no,
                'adjust_Date' => $request->adjustment_date,
                'empt_Status' => $request->employee_status,
                'contract_Type' => $request->contract_type,
                'contract_Duration' => $request->staff_contract_duration,

            ];


            if ($EmployeInfoexist->empt_Id == null)//if doesn't exist: create
            {

                $EmploymentInfo = EmploymentInfo::create($employment_info_table);
                $EmployeInfoexist->update(['empt_Id' => $EmploymentInfo->empt_Id]);

            } else {
                EmploymentInfo::where('empt_Id', $EmployeInfoexist->empt_Id)->update($employment_info_table);
            }


        }
    }



    public function viewStaffView($id){
        $employee_data = User::where('id', $id)->first();
        if(!$employee_data)
             $employee_data['message'] = 'No record Founded';
        $school = School::first();
        return view('staff.partials.view-staff', compact('employee_data', 'school'))->render();
         
    }


    public function EditAppointmentInfo($id)
    {
        $genders          =  Gender::all();
        $grade_general    =  Grade_general::all();
        $marital_status   =  MaritalStatus::all();
        $bloodgroups      =  BloodGroup::all();
        $employee_types   =  EmployeeType::all();
        $designations     =  Designation::all();
        $ralationship     =  Relationship::all();
        $districts        =  District::all();
        $Employee_Type    =  EmployeeType::all();
        $cities           =  City::all();
        $states           =  State::all();   
        $religions        =  Religion::all();
        $nationalities    =  Nationality::all();
        $casts            =  Cast::all();
        $board            =  Board::all(); 
        $subjects         =  Subject::all();
        $education_levels = EducationLevel::all();
        $roles            =  Role::whereNotIn('name' , ['Student', 'Super Admin'])->get();
        $user             =  User::findOrFail($id);  
        
        $user->role=$user->roles->first()->id;        
        return view('staff.edit-appointment-info', compact('employee_types', 'genders', 'marital_status', 'bloodgroups', 'religions', 'nationalities', 'districts', 'cities', 'casts', 'ralationship', 'designations','states','roles','user','board','subjects','grade_general','education_levels'));
    }

    public function UpdateAppointmentInfo(Request $request)
    {
        //dd($request->employee_status);
        $data = [];
        $serialized_academic_array = serialize($data); 
        $data1 = [];
        $serialized_professional_array = serialize($data1);
        $data_exp= [];
        $EmployeInfoexist =  EmployeeInfo::where('user_Id', $request->user_id)->first();

        if(!empty($EmployeInfoexist->emer_cnt_Id))
        {
            $e_id = $EmployeInfoexist->emer_cnt_Id;
        }else{

        $e_id = null;

        }

        if(!empty($EmployeInfoexist->emp_cnt_Id)){
               $emp_cnt_Id = $EmployeInfoexist->emp_cnt_Id;

        }else{

            $emp_cnt_Id = null;
        }


        if(!empty($EmployeInfoexist->empt_Id)){
               $empt_Id = $EmployeInfoexist->empt_Id;

        }else{

            $empt_Id = null;
        }


        $employee_personal_no = School::select('school_abbreviation')->first();

            $i = DB::table('employment_info')->orderBy('empt_Id', 'DESC')->first();
        if (!empty($i)) {
                $adminId = $i->empt_Id;
         } else {
                $adminId = 0;
        }

        $employee_personal_no = 'HR-' . $employee_personal_no->school_abbreviation . "-" . date('y') . "-" . ($adminId + 1);



        $employee_info_array = [        
                'emp_fat_Name'          => $request->father,
                'gnd_Id'                => $request->gender,
                'emp_marital_Status'    => $request->marital_status,
                'bg_Id'                 => $request->blood_group,
                'emp_Cnic'              => $request->staff_cnic,
                'emp_Dob'               => date('Y-m-d' , strtotime($request->date_of_birth)),
                'relig_Id'              => $request->religion,
                'nation_Id'             => $request->nationality,
                'desig_Id'              => $request->desig_Id,
                'country_Id'            => $request->country,
                'state_Id'              => $request->state,
                'city_Id'               => $request->employee_city,
                'dom_Id'                => $request->employee_district,
                'cast_Id'               => $request->staff_cast, 
                'emp_typ_Id'            => $request->emp_typ_Id,
                'emer_cnt_Id'           => $e_id,
                'empt_Id'               => $empt_Id,
                'emp_cnt_Id'            => $emp_cnt_Id,
                'user_id'               =>  $request->user_id

            ];

        if($EmployeInfoexist == null)//if doesn't exist: create
        {
            $EmployeInfoexist = EmployeeInfo::create($employee_info_array); 
        }
        else 
        {
            $EmployeInfoexist->update($employee_info_array);        
        }
        


        $user = User::findOrFail($request->user_id);


        if(!empty($request->prev_exper_Org)){

            foreach($request->prev_exper_Org as $key=>$val){
                 
                $experiance = array(    "prev_exper_Org" => $request->prev_exper_Org[$key],
                                        "prev_exper_Position" => $request->prev_exper_Position[$key], 
                                        "prev_exper_Role" => $request->prev_exper_Role[$key], 
                                        "prev_Frmdate" => $request->prev_Frmdate[$key], 
                                        "prev_Todate" => $request->prev_Todate[$key],
                                        "user_id" => $user->id
                        );
                if(isset($request->file('exp_file')[$key])) {

                    if ($experience_File = $request->file('exp_file')[$key]) {

                        $name1 = time() . '.' . $experience_File->getClientOriginalName();
                        $experience_File->move(public_path('upload/user/experience/'), $name1);

                        $experiance['exp_file'] = $name1;


                    }
                }
                if( isset($request->prev_exper_Id[$key]) and $request->prev_exper_Id[$key]!=''){

                    PreviousExperience::where('prev_exper_Id', $request->prev_exper_Id[$key])->update($experiance); 
                }else{
                    PreviousExperience::create($experiance);
                }
            }

        }

        if(!empty($request->bank_Name) || !empty($request->bank_acc_No) || !empty($request->branch_Code)){

            $account = BankAccount::where('user_id',$user->id)->first();

            $bank = array(
                "bank_Name" => $request->bank_Name,
                "bank_acc_No" => $request->bank_acc_No,
                "branch_Code" => $request->branch_Code,
                "branch_Address" => $request->branch_Address,
                "user_id" => $user->id
            );

            if (!$account){
                BankAccount::create($bank);
            }else{
                BankAccount::where('user_id',$user->id)->update($bank);
            }



        }
         if(!empty($request->title3)){
             foreach($request->title3 as $key=>$val){

                $acedmic = array(       "title" => $request->title3[$key],
                                        "univ_Id" => $request->univ_Id3[$key], 
                                        "sub_Id" => isset($request->sub_Id3[$key])?$request->sub_Id3[$key]:'', 
                                        "session" => $request->session3[$key], 
                                        "grade_Id" => isset($request->grade_Id3[$key])?$request->grade_Id3[$key]:'',
                                        "acdm_Gpa" => isset($request->acdm_Gpa3[$key])?$request->acdm_Gpa3[$key]:'',
                                        "type" => $request->type3[$key],
                                        "user_id" => $user->id
                );

                if(isset($request->file('degree3')[$key])) {

                    if ($files = $request->file('degree3')[$key]) {

                        $name = time() . '.' . $files->getClientOriginalName();
                        $files->move(public_path('upload/user/degree/'), $name);

                        $acedmic['degree_file'] = $name;


                    }
                }

                if(isset($request->acdm_qual_Id3[$key]) and $request->acdm_qual_Id3[$key]!=''){

                   AcademicQualification::where('acdm_qual_Id', $request->acdm_qual_Id3[$key])->update($acedmic); 
                }else{

                   AcademicQualification::create($acedmic);

                }

             }
         }  
        $employee_emergency_array = [
            'emer_cont_Name' => $request->emergency_contact_name,
            'emer_cont_No' => $request->emergency_contact_phone,
            'fk_emer_relat_Id' => $request->relation,
            'other_relation' => $request->other_relation
        ];
        if($EmployeInfoexist->emer_cnt_Id == null)//if doesn't exist: create
        {

            $EmergencyContact = EmergencyContact::create($employee_emergency_array);

            $EmployeInfoexist->update(['emer_cnt_Id'=>$EmergencyContact->emer_cnt_Id]);

            

            
        }
        else 
        {
            
               EmergencyContact::where('emer_cnt_Id', $EmployeInfoexist->emer_cnt_Id)->update($employee_emergency_array);
        }
        /*Emergency Contact Table*/
        $employee_contact_array = [
            'emp_mob_Ph' => $request->employee_mobile_phone,
            'emp_home_Ph' => $request->employee_home_phone,
            'emp_Email' => $request->employee_email,
            'emp_mail_Add' => $request->mailing_address,
            'emp_pmt_Add' => $request->permanent_address,
            'emp_City' => $request->employee_city,
            'emp_District' => $request->district,
            'zip_Code' => $request->zip_code,
        ];


        if($EmployeInfoexist->emp_cnt_Id == null)//if doesn't exist: create
        { 

            $EmployeeContact = EmployeeContact::create($employee_contact_array); 
            $EmployeInfoexist->update(['emp_cnt_Id'=>$EmployeeContact->emp_cnt_Id]);
        }
        else 
        {
            EmployeeContact::where('emp_cnt_Id', $EmployeInfoexist->emp_cnt_Id)->update($employee_contact_array);
        }
        /* Employment Table */
        $employment_info_table = [
            'personal_No' => $employee_personal_no,
            'appt_Date' => date("Y-m-d" ,  strtotime($request->hire_date)),
            'adjust_Date' => date("Y-m-d" ,  strtotime($request->adjustment_date)),
            'empt_Status' => $request->employee_status,
            'contract_Type' => $request->contract_type,
            'contract_Duration' => $request->staff_contract_duration,
        ];

        if($EmployeInfoexist->empt_Id == null)//if doesn't exist: create
        {
            
            $EmploymentInfo = EmploymentInfo::create($employment_info_table);
            $EmployeInfoexist->update(['empt_Id'=>$EmploymentInfo->empt_Id]); 
            
        }
        else 
        {

            EmploymentInfo::where('empt_Id', $EmployeInfoexist->empt_Id)->update($employment_info_table); 
        }
        

        if ($request->file('employee_image')) {
            $employee_image = $request->file('employee_image');
            $new_employee_image = "emp" . time() . '.' . $employee_image->getClientOriginalExtension();
            $employee_image->move(public_path('upload/user'), $new_employee_image);
            //echo "<pre>"; print_r($new_student_image); exit;
            $user["user_image"] = $new_employee_image;
        }


        $user->name = $request->name;
        $user->phone = $request->employee_mobile_phone;
        $user->email = $request->employee_email;
        $user->username = $request->staff_cnic;
        $user->status = $request->status?'Active':'Inactive';
        $user->update();
        DB::table('model_has_roles')->where('model_id',$request->user_id)->delete();
        $user->assignRole($request->input('roles'));
        return response()->json(['message' => 'Successfully Updated!']);
    }
    public function ChangeEmployeeStatus(Request $request)
    {

        $staff = User::where('id', $request->id)->first();

        if ($staff->status == 'Active') {
            $staff_status_array = [
                'status' => 'Inactive'
            ];
        }else {
            $staff_status_array = [
                'status' => 'Active'
            ];
            
        }

        $student_status = User::where('id', $request->id)->update($staff_status_array);

        return redirect()->back()->with('message', 'Successfully Change Status!');
    }


}
<?php
namespace App\Http\Controllers;
use App\Models\Admission;
use App\Models\EmergencyContact;
use App\Models\MaritalStatus;
use App\Models\StudentContact;
use App\Models\LastSchool;
use App\Models\Designation;
use App\Models\Disability;
use App\Models\Guardian;
use App\Models\Occupation;
use App\Models\Relationship;
use App\Models\School;
use App\Models\StudentCategory;
use Illuminate\Http\Request;
use App\Models\Religion;
use App\Models\StudentInfo;
use App\Models\AddClasses;
use App\Models\ClassSection;
use App\Models\Gender;
use App\Models\BloodGroup;
use App\Models\Nationality;
use App\Models\District;
use App\Models\City;
use App\Models\Cast;
use App\Models\Student_session;
use App\Models\WithdrawlStudent;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Transactions;

use App\Models\User;
use App\Models\Fee_schedule;
use App\Models\Chartofaccounts;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Redirect, Response;
class StudentController extends Controller
{
    function __construct()
    {         
         $this->middleware('permission:view-students|add-admission|edit-student|withdraw-admission', ['only' => ['index','show']]);
         $this->middleware('permission:add-admission', ['only' => ['create','store']]);
         $this->middleware('permission:edit-student', ['only' => ['edit','update']]);
         $this->middleware('permission:withdraw-admission', ['only' => ['destroy']]);
    }

    public function getstudent($id)
    {
       $studentData = User::whereHas('roles', function ($q) {
            $q->where('name','Student');
        })->whereHas('studentinfo', function ($q2) use ($id) {
            $q2->where('cls_Id', $id);
            $q2->where('section_id', null);
        })->get();
        $studentInfo= [];
        $i= 0 ; 
        foreach($studentData as $val){
            $studentInfo[$i]['name']= $val->name;
            $studentInfo[$i]['id']= $val->id;
            $i++;
        }
        return $studentInfo;

    }


    public function getStudentsByFilter(Request $request){
        $class = '';
        $student_Session = '';
        if(!empty($request->student_Class) and $request->student_Class!='all'){    
            $class = $request->student_Class;  
        }
        if(!empty($request->student_Session)  and $request->student_Session!='all'){    
            $student_Session = $request->student_Session;  

        } 
        $students = User::whereHas('roles', function ($q) {
            $q->where('name','Student');
        })->whereHas('studentinfo', function ($q2) use ($class,$student_Session) {
            if(!empty($class)){
               $q2->where('cls_Id', $class);
            }
             if(!empty($student_Session)){ 
                $q2->whereHas('admission',function ($q2w) use ($student_Session) {
                        if(!empty($student_Session)){
                           $q2w->where('adm_Session', $student_Session);
                        }
                    });
            }
        })->whereDoesntHave('withDraw')->get(); 
        $school = School::first();
        $classes = AddClasses::all();
        $sessions = Admission::pluck('adm_Session')->all();
        $class_sections = ClassSection::all();
        if($request->type!=''){
            return view('partials.student_data', compact('students'))->render();
        }
        return view('students', compact('students','classes', 'class_sections','school','sessions'));
    }

    public function getCityByDistrict($id)
    {
        $district = DB::table("cities")->where("dom_Id",$id)->pluck("city_name","pk_city_id","zip_code");
        return json_encode($district);
    }
    public function getDistrictByNationality($id)
    {
        $district = DB::table("domicile")->where("nation_Id",$id)->pluck("dom_District","dom_Id");
        return json_encode($district);
    }

    public function StudentCnicCheck(Request $request){
        $result = User::where('username',$request->username)->count();
        $response = "<span style='color: green;'>B-form available.</span>";
        if($result){
            $count = $result;
            if($count > 0){
                $response = "<span style='color: red;'>B-form already exist.</span>";
            }

        }
        echo $response;
        die;

    }

    public function index()
    {

        $school = School::first();
        $classes = AddClasses::all();
        $sessions = Admission::select('adm_Session')->distinct()->get();
        $class_sections = ClassSection::all();
        $students = User::whereHas('roles', function ($q) {
            $q->where('name','Student');
        })->get();

        return view('students', compact('students','classes', 'class_sections','school','sessions'));
    }

    public function create()
    {
        $classes = AddClasses::all();
        $genders = Gender::all();
        $bloodgroups = BloodGroup::all();
        $religions = Religion::all();
        $nationalities = Nationality::all();
        $districts = District::all();
        $cities = City::all();
        $casts = Cast::all();
        $student_categories = StudentCategory::all();
        $disabilities = Disability::all();
        $ralationship = Relationship::all();
        $occupations = Occupation::all();
        $designations = Designation::all();
        $marital_statuses = MaritalStatus::all();
        $gardains = User::whereHas('roles', function ($q) {
            $q->where('name','parents');
        })->whereHas('guardianInfo')->get();
        $admission_no = School::select('school_abbreviation')->first();
        $i = DB::table('admission')->orderBy('adm_No', 'DESC')->first();
        if (!empty($i)) {
                $adminId = $i->adm_No;
        } else {
                $adminId = 0;
        }
        $admission_no = 'ADM-'.$admission_no->school_abbreviation . "-" . date('Y') . "-" . ($adminId + 1);
        return view('student.admission', compact('classes', 'genders', 'bloodgroups', 'religions', 'nationalities', 'districts', 'cities', 'casts', 'student_categories', 'disabilities', 'ralationship', 'designations', 'occupations', 'gardains','marital_statuses','admission_no'));
    }

    public function admissionInfo(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'nadra_b' => 'required|unique:users,username',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else {
            $user = User::where('username',$request->nadra_b)->first();
            if (!$user){
                $user = new user();
                $user->name = $request->name;
                $user->username = $request->nadra_b;
                $user->password = Hash::make($request->nadra_b);
                $user->status = ($request->status == 'Active') ? 'Active' : 'Inactive';
                if ($request->file('user_image')) {
                    $student_image = $request->file('user_image');
                    $user->user_image = "user" . time() . '.' . $student_image->getClientOriginalExtension();
                    $student_image->move(public_path('upload/user'), $user->user_image);

                }
                $user->save();

                $user = User::find($user->id);
                DB::table('model_has_roles')->where('model_id', $user->id)->delete();
                $roles = Role::where('name', 'Student')->first();
                $user->assignRole($roles->id);


            $admission_no = School::select('school_abbreviation')->first();
            $i = DB::table('admission')->orderBy('adm_No', 'DESC')->first();

            if (!empty($i)) {
                $adminId = $i->adm_No;
                //dd($adminId);
            } else {
                $adminId = 0;
            }

            $admission_no = 'ADM-'.$admission_no->school_abbreviation . "-" . date('Y') . "-" . ($adminId + 1);
            $user = User::findOrFail($user->id);
            $studentInfo = $user->studentinfo ? $user->studentinfo : '';
            $LastSchool = $user->studentinfo ? $user->studentinfo->lastSchool : '';
            
            if ($LastSchool == null) {
                $LastSchool = new LastSchool();
            } 
            
            $LastSchool->lsch_Name = $request->lsch_Name;
            $LastSchool->lsch_contact_No = $request->lsch_contact_No;
            $LastSchool->lsch_lv_Date = $request->lsch_lv_Date;
            $LastSchool->lsch_class_Passed = $request->lsch_class_Passed;
            $LastSchool->lsch_Comments = $request->lsch_Comments;
            if ($request->file('lsch_slc_img')) {
                $school_image = $request->file('lsch_slc_img');
                $new_school_image = "document" . time() . '.' . $school_image->getClientOriginalExtension();
                $school_image->move(public_path('upload/school'), $LastSchool->lsch_slc_img);
                $LastSchool->lsch_slc_img = $new_school_image;
            
            }


            if ($LastSchool AND $LastSchool->lsch_Id == '' AND  (!isset($request->last_school_checked))) {
                $LastSchool->save();
                

            }


            if(isset($LastSchool) and $LastSchool->lsch_Id!=''){
                $lastschoo =$LastSchool->lsch_Id;
            }else{
                $lastschoo =0;
            }



            $admission = $user->studentinfo ? $user->studentinfo->admission : '';
            if ($admission == null) {
                $admission = new Admission();
            }
            $admission->adm_Number = $admission_no;
            $admission->adm_Date = $request->adm_Date;
            $admission->adm_Session = $request->adm_Session;
            $admission->reg_no = $request->reg_no;
            $admission->nadra_b = $request->nadra_b;
            if ($admission AND $admission->adm_No == '') {
                $admission->save();
            } else {
                $admission->update();
            }
            $contact_emergency = $user->studentinfo ? $user->studentinfo->contact_emergency : '';
            if ($contact_emergency == null) {
                $contact_emergency = new EmergencyContact();
            }
            $contact_emergency->emer_cont_Name = $request->emer_cont_Name;
            $contact_emergency->emer_cont_No = $request->emer_cont_No;
            $contact_emergency->fk_emer_relat_Id = $request->fk_emer_relat_Id;
            if ($contact_emergency AND $contact_emergency->emer_cnt_Id == '') {
                $contact_emergency->save();
            } else {
                $contact_emergency->update();
            }


            $contact = $user->studentinfo ? $user->studentinfo->contact : '';
            if ($contact == null) {
                $contact = new StudentContact();
            }
            $contact->pnt_mail_Add = $request->pnt_mail_Add;
            $contact->pnt_pmt_Add = $request->pnt_pmt_Add;
            $contact->pnt_District = $request->pnt_District;
            $contact->pnt_City = $request->pnt_City;
            $contact->zip_No = $request->zip_No;
            $contact->pnt_mob_Ph = $request->pnt_mob_Ph;
            $contact->pnt_off_Ph = $request->pnt_off_Ph;
            $contact->pnt_home_Ph = $request->pnt_home_Ph;
            $contact->pnt_Email = $request->pnt_Email;
            $contact->mother_mobile = $request->mother_mobile;
            $contact->mother_office_phone = $request->mother_office_phone;
            $contact->mother_home_phone = $request->mother_home_phone;
            $contact->mother_email = $request->mother_email;
            if ($contact AND $contact->pnt_cnt_Id == '') {
                $contact->save();
            } else {
                $contact->update();
            }
            $studentInfo = $user->studentinfo ? $user->studentinfo : '';
            if ($studentInfo == null) {
                $studentInfo = new StudentInfo();
            }
            $studentInfo->adm_No = $admission->adm_No;
            $studentInfo->cls_Id = $request->cls_Id;
            $studentInfo->gnd_Id = $request->gnd_Id;
            $studentInfo->std_Dob = $request->std_Dob;
            $studentInfo->bg_Id = $request->bg_Id;
            $studentInfo->relig_Id = $request->relig_Id;
            $studentInfo->nation_Id = $request->nation_Id;
            $studentInfo->dom_Id = $request->dom_Id;
            $studentInfo->std_Age = $request->std_Age;
            $studentInfo->cast_Id = $request->cast_Id;
            $studentInfo->disable_Id = $request->disable_Id;
            $studentInfo->stddisable = $request->stddisable;           
            $studentInfo->std_cat_Id = $request->std_cat_Id;
            $studentInfo->lsch_Id = $lastschoo;
            $studentInfo->fk_pnt_cnt_Id = $contact->pnt_cnt_Id;
            $studentInfo->emer_cnt_Id = $contact_emergency->emer_cnt_Id;
            $studentInfo->father_id = $request->guardian;
            $studentInfo->mother_id = $request->mother;
            $studentInfo->last_school_checked = $request->last_school_checked?1:0;
            $studentInfo->user_id = $user->id;


            /*
                    session
            */
            $adm_Session = explode("-",$request->adm_Session);
            $Student_session =Student_session::where('student_id',$user->id)->where('session_id',$adm_Session[0])->first();

             if($Student_session==null)
            {
                $Student_session = new Student_session();
            }

            $Student_session->session_id=$adm_Session[0];
            $Student_session->student_id=$user->id;
            $Student_session->class_id=$request->cls_Id;
            
            if($Student_session AND  $Student_session->id==''){
                $Student_session->save();
            }else{
                $Student_session->update();
            }


 
            if ($studentInfo AND $studentInfo->std_Id == '') {
                $studentInfo->save();
                return response()->json(['message' => 'Successfully Added!']);
            } else {
                $studentInfo->update();
                return response()->json(['message' => 'Successfully Added!']);
            }
        }
      }
    }

    public function EditAdmissionInfo($id)
    {
        $classes = AddClasses::all();
        $genders = Gender::all();
        $bloodgroups = BloodGroup::all();
        $religions = Religion::all();
        $nationalities = Nationality::all();
        $districts = District::all();
        $cities = City::all();
        $casts = Cast::all();
        $student_categories = StudentCategory::all();
        $disabilities = Disability::all();
        $ralationship = Relationship::all();
        $occupations = Occupation::all();
        $designations = Designation::all();
        $marital_statuses = MaritalStatus::all();
        $student = User::findOrFail($id);
        //dd($student->studentinfo);
        $studentInfo = $student->studentinfo?$student->studentinfo:'';
        $gardFather = $student->studentinfo?$student->studentinfo->father($student->studentinfo->father_id):'';
        $gardmother = $student->studentinfo?$student->studentinfo->mother:'';
        $gardains = User::whereHas('roles', function ($q) {
            $q->where('name','parents');
        })->whereHas('guardianInfo')->get();
        $LastSchoolstudent ='';
        if($studentInfo){
           $LastSchoolstudent=  $student->studentinfo->LastSchool?$student->studentinfo->LastSchool:'';
        }
         if($studentInfo){
            $studentParent = explode(",", $studentInfo->parent_ids);
        }else{
            $studentParent = '';
            
        }
        return view('student.edit-admission-info', compact('student', 'studentParent', 'classes', 'genders', 'bloodgroups', 'religions', 'nationalities', 'districts', 'cities', 'casts', 'student_categories', 'disabilities', 'ralationship', 'designations', 'occupations', 'gardains','marital_statuses','LastSchoolstudent','gardFather','gardmother'));
    }

    public function UpdateAdmissionInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nadra_b' => 'unique:users,username,' . $request->id

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else {
            $user = User::findOrFail($request->id);
            $studentInfo = $user->studentinfo?$user->studentinfo:'';


            if(isset($request->last_school_checked)){

                $LastSchool = $user->studentinfo?$user->studentinfo->lastSchool:'';

                if($LastSchool){
                    $LastSchool->delete();
                }


            }else {
                $LastSchool = $user->studentinfo ? $user->studentinfo->lastSchool : '';


                if ($LastSchool == null) {
                    $LastSchool = new LastSchool();
                }
                if ($request->file('lsch_slc_img')) {
                    $LastSchool->lsch_slc_img = $request->file('lsch_slc_img');
                    $new_school_image = "document" . time() . '.' . $LastSchool->lsch_slc_img->getClientOriginalExtension();
                    $LastSchool->lsch_slc_img->move(public_path('upload/school'), $LastSchool->lsch_slc_img);
                    $LastSchool->lsch_slc_img = $new_school_image;
                }
                $LastSchool->lsch_Name = $request->lsch_Name;
                $LastSchool->lsch_contact_No = $request->lsch_contact_No;
                $LastSchool->lsch_lv_Date = $request->lsch_lv_Date;
                $LastSchool->lsch_class_Passed = $request->lsch_class_Passed;
                $LastSchool->lsch_Comments = $request->lsch_Comments;


                if ($LastSchool AND $LastSchool->lsch_Id == '') {


                    $LastSchool->save();


                }else{
                    $LastSchool->update();
                }
                if (isset($LastSchool) and $LastSchool->lsch_Id != '') {
                    $lastschoo = $LastSchool->lsch_Id;
                } else {
                    $lastschoo = 0;
                }
            }

            $admission = $user->studentinfo?$user->studentinfo->admission:'';
            if($admission==null){
                $admission = new Admission();
            }
            if($request->adm_Number==''){
                $admission_no = School::select('school_abbreviation')->first();
                $i = DB::table('admission')->orderBy('adm_No', 'DESC')->first();
                if (!empty($i)) {
                    $adminId = $i->adm_No;
                } else {
                    $adminId = 0;
                }
                $admission_no = 'ADM-'.$admission_no->school_abbreviation . "-" . date('Y') . "-" . ($adminId + 1);
                $admission->adm_Number = $admission_no;

            }else{
                $admission->adm_Number = $request->adm_Number;
            }
            $admission->adm_Date = $request->adm_Date;
            $admission->adm_Session = $request->adm_Session;
            $admission->reg_no = $request->reg_no;
            $admission->nadra_b = $request->nadra_b;
            if($admission AND  $admission->adm_No==''){
                $admission->save();
            }else{
                $admission->update();
            }
            $contact_emergency = $user->studentinfo?$user->studentinfo->contact_emergency:'';
            if($contact_emergency==null){
                $contact_emergency = new EmergencyContact();
            }
            $contact_emergency->emer_cont_Name = $request->emer_cont_Name;
            $contact_emergency->emer_cont_No = $request->emer_cont_No;
            $contact_emergency->fk_emer_relat_Id = $request->fk_emer_relat_Id;
            if($contact_emergency AND  $contact_emergency->emer_cnt_Id==''){
                $contact_emergency->save();
            }else{
                $contact_emergency->update();
            }
            $contact = $user->studentinfo?$user->studentinfo->contact:'';
            if($contact==null){
                $contact = new StudentContact();
            }
            $contact->pnt_mail_Add = $request->pnt_mail_Add;
            $contact->pnt_pmt_Add = $request->pnt_pmt_Add;
            $contact->pnt_District = $request->pnt_District;
            $contact->pnt_City = $request->pnt_City;
            $contact->zip_No = $request->zip_No;
            $contact->pnt_mob_Ph = $request->pnt_mob_Ph;
            $contact->pnt_off_Ph = $request->pnt_off_Ph;
            $contact->pnt_home_Ph = $request->pnt_home_Ph;
            $contact->pnt_Email = $request->pnt_Email;
            $contact->mother_mobile = $request->mother_mobile;
            $contact->mother_office_phone = $request->mother_office_phone;
            $contact->mother_home_phone = $request->mother_home_phone;
            $contact->mother_email = $request->mother_email;
            if($contact AND  $contact->pnt_cnt_Id==''){
                $contact->save();
            }else{
                $contact->update();
            }
            $parentarray = [$request->guardian, $request->mother];
            $parent_ids = implode(",", $parentarray);
            if ($request->file('user_image')) {
                $student_image = $request->file('user_image');
                $user->user_image = "user" . time() . '.' . $student_image->getClientOriginalExtension();
                $student_image->move(public_path('upload/user'),$user->user_image);
            }
            $studentInfo = $user->studentinfo?$user->studentinfo:'';
            if($studentInfo==null)
            {
                $studentInfo = new StudentInfo();
            }
            $studentInfo->adm_No = $admission->adm_No;
            $studentInfo->cls_Id = $request->cls_Id;
            $studentInfo->gnd_Id = $request->gnd_Id;
            $studentInfo->std_Dob = $request->std_Dob;
            $studentInfo->bg_Id = $request->bg_Id;
            $studentInfo->relig_Id = $request->relig_Id;
            $studentInfo->nation_Id = $request->nation_Id;
            $studentInfo->dom_Id = $request->dom_Id;
            $studentInfo->std_Age = $request->std_Age;
            $studentInfo->cast_Id = $request->cast_Id;
            $studentInfo->disable_Id = $request->disable_Id;
            $studentInfo->stddisable = $request->stddisable;           
            $studentInfo->std_cat_Id = $request->std_cat_Id;
            $studentInfo->lsch_Id = $LastSchool?$LastSchool->lsch_Id:1;
            $studentInfo->fk_pnt_cnt_Id = $contact->pnt_cnt_Id;
            $studentInfo->emer_cnt_Id = $contact_emergency->emer_cnt_Id;
            $studentInfo->father_id = $request->guardian;
            $studentInfo->mother_id =  $request->mother;
            $studentInfo->last_school_checked = $request->last_school_checked?1:0;
            $studentInfo->user_id = $user->id;
            if($studentInfo AND  $studentInfo->std_Id==''){
                $studentInfo->save();
            }else{
                $studentInfo->update();
            }
            $user->name = $request->name;
            $user->status = ($request->status == 'Active') ? 'Active' : 'Inactive';
            $user->update();
            
            $user = User::find($request->id);
            DB::table('model_has_roles')->where('model_id',$request->std_id)->delete();
            $roles = Role::where('name','Student')->first();
            $user->assignRole($roles->id);

            /*
                    session
            */
            $adm_Session = explode("-",$request->adm_Session);
            $Student_session =Student_session::where('student_id',$user->id)->where('session_id',$adm_Session[0])->first();

             if($Student_session==null)
            {
                $Student_session = new Student_session();
            }

            $Student_session->session_id=$adm_Session[0];
            $Student_session->student_id=$user->id;
            $Student_session->class_id=$request->cls_Id;
            
            if($Student_session AND  $Student_session->id==''){
                $Student_session->save();
            }else{
                $Student_session->update();
            }


              


        }
    }

    public function WithdrawlStudent($id){
        $student = User::whereHas('roles', function ($q) {
               $q->where('name','Student');
        })
        ->whereHas('studentinfo')
        ->whereDoesntHave('withDraw')
        ->where('id',$id)
        ->first();  
        if($student==null){
          return  redirect('students')->with('message', ' Record not Found!');

        } 
        $where = array('std_Id' => $student->id,'fee_month'=>date('Y-m-')."01");
        $schedulefee = Fee_schedule::where($where)->first();
        $accounts = [];
        if($schedulefee){
            $schedulefee->issue_date = date('m/d/Y',strtotime($schedulefee->issue_date));   
            $accounts = json_decode($schedulefee->accounts);
        }
        $acocuntsdata=[];
        if(sizeof($accounts)>0){
            $i=0;   
            foreach($accounts as $key=>$val){
                $vals = (array) $val;
                if($i>0){

                    $othraccount = [];
                    $othraccount['id'] = $vals["'id'"];
                    $acconname = Chartofaccounts::where('acc_Id',$othraccount['id'])->first();
                      
                    if($acconname->acc_Name=='Security fee'){
                        $othraccount['id'] = $vals["'id'"];
                        $othraccount['bill_Freq'] = $vals["'bill_Freq'"];
                        $othraccount['amount'] = $vals["'amount'"];
                        $acconname = Chartofaccounts::where('acc_Id',$othraccount['id'])->first();
                        $othraccount['name'] = $acconname->acc_Name;                             
                        $acocuntsdata= $othraccount; 
                    }
                    
                }
                $i++;

            }
        }
        return view('student.withdraw-student', compact('student','acocuntsdata'));
    }

    public function viewStdAdm($id){
        $student = User::whereHas('roles', function ($q) {
            $q->where('name','Student');
        })->whereHas('studentinfo', function ($q2) use ($id) {
            $q2->where('id', $id);
        })->first();
        $school = School::first();
        $father='';
        $mother='';
        $lastSchool= '';
        if($student){
           $studentinfos=$student->studentinfo?$student->studentinfo->father_id:''; 
           if($studentinfos){
                $father = $student->studentinfo?$student->studentinfo->father($studentinfos):'';
                $mother = $student->studentinfo?$student->studentinfo->mother:''; 
            }
            if($student->studentinfo){
                if($student->studentinfo->lastSchool){
                    $lastSchool = $student->studentinfo->lastSchool;
                }
            } 
             
        }
        else{
            $studentData['messgahe'] = 'No record Founded';
        } 
        return view('student.partails.view_student',compact('student','school','father','lastSchool','mother'))->render();
    }
    public function WithdrawlStudentPost(Request $request){
        $array_re[] = '';
        $array_re =[
            'admno' => 'required',
            'withdraw_date' => 'required',
            'withdraw_date' => 'required',
            'adm_session' => 'required',
            'remarks' => 'required',
        ];
        if($request->total !=''  and $request->total > 0 ){
            $array_re["mark"] = "required";   
        }
        $validator =   Validator::make($request->all(),$array_re);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        
        }else{ 
            $withdrawl = WithdrawlStudent::firstOrNew(array('std_Id' => $request->std_id));
            $withdrawl->std_Id = $request->std_id;
            $withdrawl->withdrawl_Date = date('Y-m-d');
            $withdrawl->with_Remark = $request->remarks;
            $withdrawl->save();
            $accont_transtion = '';
            $accountName = Chartofaccounts::where('acc_Name','Account Receivables (AR)')->first();  
            $AccountReceiable = array(
                      'std_Id'            => $request->std_id,
                      'tr_Type'           => 2,
                      'tr_Date'           =>  date('Y-m-d h:i:s'),
                      'schedule_id'       => 0,
                      'acc_Id'            => $accountName->acc_Id,
                      'Narration'         => 'Fees ajustment  for student '.$request->std_id,
                      'dr_Amt'            =>  0,
                      'cr_Amt'            => intval(str_replace(',', '',  $request->total))  ,
                      'bl_Amt'            => 0,
                      'tr_Status'         => 'Close',
                      'Vtype'             => 'Fees ajustment'
                       
            );
            Transactions::create($AccountReceiable);
            $Account =Chartofaccounts::where('acc_Name','Bad Debts')->first();
            $bedDebits = array(
                      'std_Id'            => $request->std_id,
                      'tr_Type'           => 2,
                      'tr_Date'           =>  date('Y-m-d h:i:s'),
                      'schedule_id'       => 0,
                      'acc_Id'            => $Account->acc_Id,
                      'Narration'         => 'Fees ajustment  for student '.$request->std_id,
                      'dr_Amt'            =>  intval(str_replace(',', '',  $request->total)) ,
                      'cr_Amt'            =>  0,
                      'bl_Amt'            =>  0,
                      'tr_Status'         => 'Close',
                      'Vtype'             => 'Fees ajustment'
                       
            );
            Transactions::create($bedDebits);
            $Transactions =  Transactions::where('std_Id',$request->std_id)->where('char_id',1)->where('tr_Type',1)->where('tr_Status', '!=', 'Close')->get();

            foreach($Transactions as $key=>$val){  
                $Transactionsss = Transactions::where('tr_Id',$val->tr_Id)->first();
                $balance= $Transactionsss->bl_Amt;
                $Transactionsss->bl_Amt = 0;
                $Transactionsss->tr_Status = 'Close';
                $Transactionsss->save();  
                $ajustments = array(
                                  'std_Id'            =>     $request->std_id,
                                  'tr_Type'           =>     3,
                                  'char_id'           =>     1,
                                  'tr_Date'           =>     date('Y-m-d h:i:s'),
                                  'schedule_id'       =>     $Transactionsss->schedule_id,
                                  'acc_Id'            =>     $request->std_id,
                                  'Narration'         =>     'Fees ajustment  for student '.$request->std_id,
                                  'dr_Amt'            =>     0,
                                  'cr_Amt'            =>     intval(str_replace(',', '', $balance)) ,
                                  'bl_Amt'            =>     0,  
                                  'tr_Status'         =>     'Close',
                                  'Vtype'             =>     'Fees ajustment'
                        
                            );
                Transactions::create($ajustments);                        
            }
            $student_status_array = [
                    'status' => ($request->optionCheckboxes == 'Active') ? 'Inactive' : 'Inactive'
            ];
            $student_status = User::where('id',$request->std_id)->update($student_status_array);
            $withdrawl = WithdrawlStudent::firstOrNew(array('std_Id' => $request->std_id));
            $withdrawl->std_Id = $request->std_id;
            $withdrawl->withdrawl_Date = date('Y-m-d');
            $withdrawl->with_Remark = $request->remarks;
            $withdrawl->save();
            return response()->json(['message' => 'Successfully withdraw!']);
        }
       
    }
    public function ChangeStudentStatus(Request $request){
        $student = StudentInfo::where('std_Id',$request->id)->first();
        if ($student->std_Status == 'Active')
        {
            $student_status_array = [
                'std_Status' => 'Inactive'
            ];
        }elseif($student->std_Status == 'Inactive'){
            $student_status_array = [
                'std_Status' => 'Active'
            ];
        }
        $student_status = StudentInfo::where('std_Id',$request->id)->update($student_status_array);
        return redirect()->back()->with('message', 'Successfully Change Status!');
    }
}
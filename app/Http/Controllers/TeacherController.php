<?php

namespace App\Http\Controllers;

use App\Models\AddClasses;
use App\Models\AddClassSched;
use App\Models\City;
use App\Models\ClassSection;
use App\Models\ClasswiseAttendance;
use App\Models\EmployeeContact;
use App\Models\Nationality;
use App\Models\Gender;
use App\Models\MaritalStatus;
use App\Models\BloodGroup;
use App\Models\Cast;
use App\Models\EmergencyContact;
use App\Models\Pay_schedule;
use App\Models\Relationship;
use App\Models\Religion;
use App\Models\Attendance_type;
use App\Models\Diary;
use App\Models\DiaryType;
use App\Models\EmployeeInfo;
use App\Models\Exam;
use App\Models\ExamPaper;
use App\Models\School;
use App\Models\StudentInfo;
use App\Models\StudyMaterial;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\Syllabus;
use App\Models\Datesheet;
use App\Models\Classwisebehaviour;
use App\Models\Classwiseachievement;
use App\Models\ExamSubjectMark;
use App\Models\Marks_Obtain;
use App\Models\Transactions;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Redirect,Response;
use File;
use Auth;
class TeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {





        $teacherData = DB::table('classsched')
            ->select('classsched.*','class.class','class_section.class_section_name', 'class.class')
            ->leftJoin('class', 'class.cls_Id', '=', 'classsched.cls_Id')
            ->leftJoin('employee_info', 'classsched.emp_Id', '=', 'employee_info.emp_Id')
            ->leftJoin('class_section', 'classsched.c_section_Id', '=', 'class_section.c_section_Id')
            ->get();



//        $where = array('emp_Id' =>  $userData['id']);
        $employee_info = DB::table('employee_info')
            ->select('employee_info.*','employee_contact.*', 'emergency_contact.emer_cnt_Id','emergency_contact.emer_cont_Name','emergency_contact.emer_cont_No',
                'blood_group.blood_group', 'gender.gender', 'cities.city_name', 'nationality.*','domicile.*','religion.religion')
            ->join('employee_contact', 'employee_contact.emp_cnt_Id', '=', 'employee_info.emp_cnt_Id')
            ->leftjoin('emergency_contact', 'emergency_contact.emer_cnt_Id', '=','employee_info.emer_cnt_Id')
//            ->leftjoin('relationship', 'relationship.pk_relat_Id', '=','employee_info.pk_relat_Id')
            ->leftjoin('blood_group', 'blood_group.bg_Id', '=','employee_info.bg_Id')
            ->leftjoin('gender', 'gender.gnd_Id', '=','employee_info.gnd_Id')
            ->leftjoin('cities', 'cities.pk_city_id', '=','employee_info.city_id')
            ->leftjoin('nationality', 'nationality.nation_Id', '=','employee_info.nation_Id')
            ->leftjoin('domicile', 'domicile.dom_Id', '=','employee_info.dom_Id')
            ->leftjoin('religion', 'religion.relig_Id', '=','employee_info.relig_Id')
            ->where('employee_info.user_Id', Session::get('userData')['id'])->first();
//        dd($employee_info);



        return view('teacher.dashboard',compact('teacherData', 'employee_info'));
    }
    /*-------------------------------------Pay Bill Print----------------------------------*/
    public function PayBillPrint(Request $request){



        $emp = User::findOrFail(Auth::user()->id);
        $Transactions = Transactions::where('tr_Id',$request->transaction)->first();

        $schedulePay = (object)[];



        $schedulePay->month =$Transactions->schedule_pay?$Transactions->schedule_pay->pay_month:'';



        $where = array('emp_Id' => Auth::user()->id,'pay_month'=>$schedulePay->month);

        $schedulePay =Pay_schedule::where($where)->first();

        $emp->designation =  ($emp->employeeInfo)?$emp->employeeInfo->designation->designation:'';

        $emp->personal_No =  ($emp->employeeInfo)?$emp->employeeInfo->employmentInfo->personal_No:'';

        if($schedulePay){

            $schedulePay->invoice_num = Transactions::count();
            $schedulePay->issue_date = date('m/d/Y',strtotime($schedulePay->issue_date));
            $schedulePay->basic_pay = $schedulePay->basic_pay;
            $allowances = (array) json_decode($schedulePay->allowances);
            $deductions = (array) json_decode($schedulePay->deductions);
            $allowancesdetail =[];
            $deductionsdetail =[];
            $allowancesSub= 0;
            $deductionsSub= 0;

            if($schedulePay->basic_pay!=''){
                $array = [];
                $array['title'] = 'Basic pay';
                $array['amount'] = $schedulePay->basic_pay;
                $allowancesSub= $this->truncate_number($array['amount']);
                $allowancesdetail[] = $array;

            }

            if(sizeof($allowances)>0){


                foreach($allowances as $key=>$val){
                    $array = [];
                    if($key==$val){
                        $array['title'] = ucfirst($val);
                        $somenumber =$allowances[$val."_total"];
                        $array['amount']  = $this->truncate_number($allowances[$val."_total"]);
                        $allowancesSubww= $this->truncate_number($array['amount']);
                        $allowancesSub = $allowancesSubww+$allowancesSub;
                        $allowancesdetail[]=$array;
                    }
                }

            }

            if(sizeof($deductions)>0){
                foreach($deductions as $key=>$val){
                    $array = [];

                    if($key===$val){
                        $array['title'] = ucfirst($val);
                        $array['amount'] = $this->truncate_number($deductions[$val."_total"]);
                        $deductionsSubww= $this->truncate_number($array['amount']);
                        $deductionsSub = $deductionsSubww+$deductionsSub;
                        $deductionsdetail[]=$array;
                    }
                }
            }
            $emp->name                  = $emp->name;
            $schedulePay->allowances    = $allowancesdetail;
            $schedulePay->allowancesub  = $allowancesSub;
            $schedulePay->deductions    = $deductionsdetail;
            $schedulePay->deductionsSub = $deductionsSub;
            $schedulePay->netamount     = $this->truncate_number($allowancesSub-$deductionsSub);
            $schedulePay->balancedue    = 0;
            if( !empty ($emp->balancedue($emp->id)) ){
                $schedulePay->balancedue = $this->truncate_number($emp->balancedue($emp->id));
            }

        }else{
            $schedulePay = (object)[];
            $emp->name = $emp->name;
        }
        $school                     =       School::select('school_Name')->first();
        $data['school']                =       $school->school_Name;
        $data['emp']                =       $emp;
        $data['schedulePay']        =       $schedulePay;
        return Response::json($data);

    }

    function truncate_number($number, $precision = 2) {

        // Zero causes issues, and no need to truncate
        if (0 == (int)$number) {
            return $number;
        }

        // Are we negative?
        $negative = $number / abs($number);

        // Cast the number to a positive to solve rounding
        $number = abs($number);

        // Calculate precision number for dividing / multiplying
        $precision = pow(10, $precision);

        // Run the math, re-applying the negative value to ensure
        // returns correctly negative / positive
        return floor( $number * $precision ) / $precision * $negative;
    }

    /*-------------------------------------diary Code----------------------------------*/

    public function Dairy(Request $request)
    {
        //dd($request->name);
        $classes = AddClasses::all();
        $class_sections = ClassSection::all();
        $diary_types = DiaryType::all();
        $subjects = Subject::all();
        $diaries = Diary::where('user_id',auth::id())->where('top',0)->get();
        $study_materials = StudyMaterial::where('user_id',auth::id())->where('top',0)->get();

        if ($request->name=='diary'){
            $diaries = Diary::where('user_id',auth::id())->where('top',0)->get();
            return view('teacher.partials.diary_data', compact('classes', 'class_sections','subjects','diary_types','diaries','study_materials'))->render();

        }else if($request->class || $request->class_section){

            if ($request->class=='all'){
                $request->class = '';
            }
            if ($request->class_section=='all'){
                $request->class_section = '';
            }
             $query = Diary::query();
             $query  = $query->where('user_id',auth::id());
             $query  = $query->where('top',0);
            if (!empty($request->class) and $request->class != 'all') {
               $query  = $query->where('fk_cls_Id',$request->class);
            }
            if (!empty($request->class_section) and $request->class_section != 'all') {
               $query  = $query->where('fk_c_section_Id',$request->class_section);
            }

             $diaries = $query->get();
             return view('teacher.partials.diary_data', compact('classes', 'class_sections','subjects','diary_types','diaries','study_materials'))->render();

        }


        if ($request->name=='study') {
            $study_materials = StudyMaterial::where('user_id',auth::id())->where('top',0)->get();
            return view('teacher.partials.study_data', compact('classes', 'class_sections', 'subjects', 'diary_types', 'diaries', 'study_materials'))->render();

        }else if($request->study_class || $request->study_class_section){

                if ($request->study_class=='all'){
                    $request->study_class = '';
                }
                if ($request->study_class_section=='all'){
                    $request->study_class_section = '';
                }
                $query1 = StudyMaterial::query();
                $query1  = $query1->where('user_id',auth::id());
                $query1 = $query1->where('top',0);
                if (!empty($request->study_class) and $request->study_class != 'all') {
                    $query1  = $query1->where('fk_cls_Id',$request->study_class);
                }
                if (!empty($request->study_class_section) and $request->study_class_section != 'all') {
                    $query1  = $query1->where('fk_c_section_Id',$request->study_class_section);
                }

                $study_materials = $query1->get();
                return view('teacher.partials.study_data', compact('classes', 'class_sections', 'subjects', 'diary_types', 'diaries', 'study_materials'))->render();

            }

                //$study_materials = StudyMaterial::where('user_id',auth::id())->where('top',0)->get();






        return view('teacher.dairy', compact('classes', 'class_sections','subjects','diary_types','diaries','study_materials'));
    }



    public function EditDiary(Request $request)
    {
    
        $diary = Diary::findorFail($request->id);
        $diary->selectedStudentIds = $diary->diaryofStudent($diary->pk_diary_Id);
        $class_id = $diary->fk_cls_Id;
        $section_Id = $diary->fk_c_section_Id;

        $studentofDairy = [];
        foreach ($diary->selectedStudentIds as $val){
            $studentofDairy[$val->fk_std_Id] =  $val->fk_std_Id;
        }

        $studentData = User::whereHas('roles', function ($q) {
            $q->where('name','Student');
        })->whereHas('studentinfo', function ($q2) use($class_id,$section_Id) {
            $q2->where('cls_Id', $class_id);
            $q2->where('section_id', $section_Id);
        })->whereDoesntHave('withDraw')->get();

        $studentInfo= [];

        $i= 0 ;
        $datastundet = [];





        foreach($studentData as $key=>$val){
            $k = 0;
            $datastundet[$val->id]['name']= $val->name;
            $datastundet[$val->id]['selected']= '';
            if (in_array($val->id, $studentofDairy))
            {
                $datastundet[$val->id]['selected']= 'true';
            }


            $i++;
        }
        $diary->studentInfo = $studentInfo;
        $diary->datastundet = $datastundet;

        return Response::json($diary);

    }

    public function ShowDiary(Request $request)
    {
         
        $diary = Diary::findorFail($request->id);
        //dd($diary);
        $diary->selectedStudentIds = $diary->diaryofStudent($diary->pk_diary_Id);
        //dd($diary->selectedStudentIds->fk_std_Id);
        $studentofDairy = [];
        foreach ($diary->selectedStudentIds as $val){
            $studentofDairy[] =  $val->fk_std_Id;
        }
        $diary->diaryType =  $diary->diaryType?$diary->diaryType->diary_type_Name:'';
        $diary->className =      $diary->class?$diary->class->class:'';
        $diary->classSection =    $diary->classsection?$diary->classsection->class_section_name:'';
        $diary->subjectName =    $diary->subject?$diary->subject->subject:'';
        $class_id = $diary->fk_cls_Id;
        $section_Id = $diary->fk_c_section_Id;
        //$studentsofdiary = explode(",",$studentofDairy);

        $studentData = User::whereHas('roles', function ($q) {
            $q->where('name','Student');
        })->whereHas('studentinfo', function ($q2) use($class_id,$section_Id) {
            $q2->where('cls_Id', $class_id);
            $q2->where('section_id', $section_Id);
        })->whereIn('id', $studentofDairy)->whereDoesntHave('withDraw')->get();

        $studentInfo= [];

        $i= 0 ;
        foreach($studentData as $val){
            $k = 0;
            foreach($diary->selectedStudentIds as $d) {
                //echo "<pre>";print_r($d);
                //$studentofDairy[]['id']  = $v->id;
                //$studentInfo[$k]['id']= $d['id'];*/
                $studentInfo[$k]['status']= $d->diary_Status;
                $studentInfo[$i]['name']= $val->name;
                $studentInfo[$i]['id']= $val->id;
                $k++;
           }
            $i++;


        }
        //echo "<pre>";  print_r($studentInfo);
        $diary->studentInfo = $studentInfo;
        return Response::json($diary);

    }

    public function AddWriteDiary(Request $request){
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'class' => 'required',
            'class_section' => 'required',
            'subject' => 'required',
            'diary_type' => 'required',
            //'due_date' => 'required',
            'audience' => 'required',
            //'note' => 'required',
            'status' => 'required',
        ]);



        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            $diary = new Diary();

            if ($request->hasFile('photo')) {

                $image = $request->file('photo');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('upload/diary/'), $filename);
                $diary['diary_File'] = $filename;
            }

            $diary->fk_cls_Id = $request->get('class');
            $diary->fk_c_section_Id = $request->get('class_section');
            $diary->fk_sub_Id = $request->get('subject');
            $diary->fk_diary_type_Id  = $request->get('diary_type');
            $diary->due_Date = $request->get('due_date');
            $diary->audience = $request->get('audience');
            $diary->diary_Status = $request->get('status');
            $diary->diary_Note = $request->get('note');
            $diary->user_id = Auth::id();
            //$diary->diary_File = $filename?$filename:'';
            $diary->top = 0;

            $diary->save();
            $top = $diary->pk_diary_Id;

            foreach($request->post('student') as $val){

                $diary = new Diary();
                $diary->fk_cls_Id = $request->get('class');
                $diary->fk_c_section_Id = $request->get('class_section');
                $diary->fk_sub_Id = $request->get('subject');
                $diary->fk_diary_type_Id  = $request->get('diary_type');
                $diary->due_Date = $request->get('due_date');
                $diary->audience = $request->get('audience');
                $diary->fk_std_Id = $val;
                $diary->diary_Status = 'Not Acknowledge';
                $diary->diary_Note = $request->get('note');
                $diary->user_id = Auth::id();
                //$diary->diary_File = $filename?$filename:'';
                $diary->top = $top;
                //if($val !=''){
                    $diary->save();
                //}



            }


            return response()->json(['message' => 'Successfully Added!']);

        }



    }



    public function DeleteDiary($id)
    {
        $diary_file = Diary::where('pk_diary_Id', $id)->first();


        if (\File::exists(public_path('upload/diary/' . $diary_file->diary_File))) {
            File::delete(public_path('upload/diary/' . $diary_file->diary_File));
        }

        $where = array('pk_diary_Id' => $id);
        Diary::where($where)->delete();
        Diary::where('top', $id)->delete();
        return response()->json(['message' => 'Successfully Deleted!']);

    }
    /*--------------------------------------diary Code---------------------------------*/
    /*--------------------------------------study material code start-------------------------*/
    public function AddStudyMaterial(Request $request){
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'class' => 'required',
            'class_section' => 'required',
            'subject' => 'required',
            'topic' => 'required',
            'due_date' => 'required',
            'audience' => 'required',
            'note' => 'required',
        ]);



        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            $study = new StudyMaterial();

            if ($request->file('photo')) {

                //dd($request->file('exam_syllabus_file'));

                $image = $request->file('photo');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('upload/study/'), $filename);
            }


            $study->fk_cls_Id = $request->get('class');
            $study->fk_c_section_Id = $request->get('class_section');
            $study->fk_sub_Id = $request->get('subject');
            $study->topic  = $request->get('topic');
            $study->due_Date = $request->get('due_date');
            $study->audience = $request->get('audience');
            //$diaryStudyMaterial->student = implode(",",$request->get('student'));
            $study->study_Note = $request->get('note');
            $study->user_id = Auth::id();
            $study->study_File = $filename?$filename:'';
            $study->top = 0;

            $study->save();

            $top = $study->pk_study_material_Id;

            foreach($request->post('student') as $val){
                $study = new StudyMaterial();
                $study->fk_cls_Id = $request->get('class');
                $study->fk_c_section_Id = $request->get('class_section');
                $study->fk_sub_Id = $request->get('subject');
                $study->topic  = $request->get('topic');
                $study->due_Date = $request->get('due_date');
                $study->audience = $request->get('audience');
                $study->fk_std_Id = $val;
                //$study->diary_Status = $request->get('status');
                $study->study_Note = $request->get('note');
                $study->user_id = Auth::id();
                $study->study_File = $filename?$filename:'';
                $study->top = $top;

                $study->save();


            }

            return response()->json(['message' => 'Successfully Added!']);

        }



    }
    public function ShowStudyMaterial($id)
    {

        $study_material = StudyMaterial::findorFail($id);
        //dd($diary);
        $study_material->selectedStudentIds = $study_material->diaryofStudent($study_material->pk_study_material_Id);
        //dd($diary->selectedStudentIds->fk_std_Id);
        $studentofStudy = [];
        foreach ($study_material->selectedStudentIds as $val){
            $studentofStudy[] =  $val->fk_std_Id;
        }

        $study_material->className =      $study_material->class?$study_material->class->class:'';
        $study_material->classSection =    $study_material->classsection?$study_material->classsection->class_section_name:'';
        $study_material->subjectName =    $study_material->subject?$study_material->subject->subject:'';
        //$studentsofdiary = explode(",",$study_material->student);
        $class_id = $study_material->fk_cls_Id;
        $section_Id = $study_material->fk_c_section_Id;

        $studentData = User::whereHas('roles', function ($q) {
            $q->where('name','Student');
        })->whereHas('studentinfo', function ($q2) use($class_id,$section_Id) {
            $q2->where('cls_Id', $class_id);
            $q2->where('section_id', $section_Id);
        })->whereIn('id', $studentofStudy)->whereDoesntHave('withDraw')->get();

        $studentInfo= [];

        $i= 0 ;
        foreach($studentData as $val){
            $studentInfo[$i]['name']= $val->name;
            $studentInfo[$i]['id']= $val->id;
            $i++;
        }
        $study_material->studentInfo = $studentInfo;
        return Response::json($study_material);

    }

    public function EditStudyMaterial($id)
    {
        $study_material = StudyMaterial::findorFail($id);
        //dd($diary);
        $study_material->selectedStudentIds = $study_material->diaryofStudent($study_material->pk_study_material_Id);
        //dd($diary->selectedStudentIds->fk_std_Id);
        $studentofStudy = [];
        foreach ($study_material->selectedStudentIds as $val){
            $studentofStudy[] =  $val->fk_std_Id;
        }

        $study_material->className =      $study_material->class?$study_material->class->class:'';
        $study_material->classSection =    $study_material->classsection?$study_material->classsection->class_section_name:'';
        $study_material->subjectName =    $study_material->subject?$study_material->subject->subject:'';
        //$studentsofdiary = explode(",",$study_material->student);
        $class_id = $study_material->fk_cls_Id;
        $section_Id = $study_material->fk_c_section_Id;

        $studentData = User::whereHas('roles', function ($q) {
            $q->where('name','Student');
        })->whereHas('studentinfo', function ($q2) use($class_id,$section_Id) {
            $q2->where('cls_Id', $class_id);
            $q2->where('section_id', $section_Id);
        })->whereIn('id', $studentofStudy)->whereDoesntHave('withDraw')->get();

        $studentInfo= [];

        $i= 0 ;
        foreach($studentData as $val){
            $studentInfo[$i]['name']= $val->name;
            $studentInfo[$i]['id']= $val->id;
            $i++;
        }
        $study_material->studentInfo = $studentInfo;
        return Response::json($study_material);

    }
    public function UpdateWriteDiary(Request $request){
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'class' => 'required',
            'class_section' => 'required',
            'subject' => 'required',
            'diary_type' => 'required',
            //'due_date' => 'required',
            'audience' => 'required',
            //'note' => 'required',
            'status' => 'required',
        ]);



        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {



            $diary = [
                'fk_cls_Id' => $request->get('class'),
                'fk_c_section_Id' => $request->get('class_section'),
                'fk_sub_Id' => $request->get('subject'),
                'fk_diary_type_Id'  => $request->get('diary_type'),
                'due_Date' => $request->get('due_date'),
                'audience' => $request->get('audience'),
                'diary_Note' => $request->get('note'),
                'diary_Status' => $request->get('status'),
                'user_id' => Auth::id(),

            ];

            if ($request->file('photo')) {

                $diary_file = Diary::where('pk_diary_Id', $request->id)->first();
                //dd($syllabus_file);
                if (\File::exists(public_path('upload/diary/' . $diary_file->diary_File))) {
                    File::delete(public_path('upload/diary/' . $diary_file->diary_File));
                }

                $image = $request->file('photo');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('upload/diary/'), $filename);
                $diary['diary_File'] = $filename;
            }
            //dd($diary);

            Diary::where('pk_diary_Id', $request->id)->update($diary);


            $allsection  = Diary::where('top',$request->id)->get();
            $daistop = [];
            foreach($allsection as $vval){
                $daistop[] = $vval->fk_std_Id;

            }
            $daistudent = [];


            foreach($request->post('student') as $vval){
                $daistudent[] = $vval;
            }


            $diff = array_diff($daistop, $daistudent);


            $diary_file_updated = Diary::where('pk_diary_Id', $request->id)->first();
            $top = $request->id;

            foreach($request->post('student') as $val){


                $sec = Diary::where(['top' =>$request->id ,'fk_std_Id'=>$val])->first();

                if (empty($sec)) {
                    $sec = new Diary();
                }



                $sec->fk_cls_Id = $request->get('class');
                $sec->fk_c_section_Id = $request->get('class_section');
                $sec->fk_sub_Id = $request->get('subject');
                $sec->fk_diary_type_Id  = $request->get('diary_type');
                $sec->due_Date = $request->get('due_date');
                $sec->audience = $request->get('audience');
                $sec->fk_std_Id = $val;
                $sec->diary_Note = $request->get('note');
                $sec->user_id = Auth::id();
                $sec->diary_File = $diary_file_updated->diary_File;
                $sec->top = $top;
                $sec->top =$request->id;

                if ($sec AND $sec->pk_diary_Id != '') {
                    $sec->update();
                }
                else{
                    $sec->diary_Status = 'Not Acknowledge';
                    $sec->save();
                }
            }

            if(!empty($diff)){
                foreach ( $diff as $val){
                    Diary::where(['fk_std_Id' => $val,'top'=>$request->id])->delete();

                }
            }




            return response()->json(['message' => 'Successfully Updated!']);

        }



    }
    public function UpdateStudyMaterial(Request $request){
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'class' => 'required',
            'class_section' => 'required',
            'subject' => 'required',
            'topic' => 'required',
            'due_date' => 'required',
            'audience' => 'required',
            'note' => 'required',
        ]);



        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            $studyarray = [
                'fk_cls_Id' => $request->get('class'),
                'fk_c_section_Id' => $request->get('class_section'),
                'fk_sub_Id' => $request->get('subject'),
                'topic'  => $request->get('topic'),
                'due_Date' => $request->get('due_date'),
                'audience' => $request->get('audience'),
                //'student' => implode(",",$request->get('student')),
                'study_Note' => $request->get('note'),
                'user_id' => Auth::id(),

            ];

            if ($request->file('photo')) {

                $study_file = StudyMaterial::where('pk_study_material_Id', $request->id)->first();
                //dd($syllabus_file);
                if (\File::exists(public_path('upload/study/' . $study_file->study_File))) {
                    File::delete(public_path('upload/study/' . $study_file->study_File));
                }

                $image = $request->file('photo');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('upload/study/'), $filename);
                $studyarray['study_File'] = $filename;
            }
            //dd($studyarray);

            StudyMaterial::where('pk_study_material_Id', $request->id)->update($studyarray);

            $allsection  = StudyMaterial::where('top',$request->id)->get();
            $daistop = [];
            foreach($allsection as $vval){
                $daistop[] = $vval->fk_std_Id;

            }
            $daistudent = [];


            foreach($request->post('student') as $vval){
                $daistudent[] = $vval;
            }


            $diff = array_diff($daistop, $daistudent);


            $diary_file_updated = StudyMaterial::where('pk_study_material_Id', $request->id)->first();
            $top = $request->id;

            foreach($request->post('student') as $val){


                $sec = StudyMaterial::where(['top' =>$request->id ,'fk_std_Id'=>$val])->first();

                if (empty($sec)) {
                    $sec = new StudyMaterial();
                }



                $sec->fk_cls_Id = $request->get('class');
                $sec->fk_c_section_Id = $request->get('class_section');
                $sec->fk_sub_Id = $request->get('subject');
                $sec->topic  = $request->get('topic');
                $sec->due_Date = $request->get('due_date');
                $sec->audience = $request->get('audience');
                $sec->fk_std_Id = $val;
                $sec->study_Note = $request->get('note');
                $sec->user_id = Auth::id();
                $sec->study_File = $diary_file_updated->study_File;
                $sec->top = $top;
                $sec->top =$request->id;

                if ($sec AND $sec->pk_study_material_Id != '') {
                    $sec->update();
                }
                else{
                    $sec->study_Status = 'Not Acknowledge';
                    $sec->save();
                }
            }

            if(!empty($diff)){
                foreach ( $diff as $val){
                    StudyMaterial::where(['fk_std_Id' => $val,'top'=>$request->id])->delete();

                }
            }


            return response()->json(['message' => 'Successfully Updated!']);

        }



    }
    public function DeleteStudyMaterial($id)
    {
        $study_file = StudyMaterial::where('pk_study_material_Id', $id)->first();
        if (\File::exists(public_path('upload/study/' . $study_file->study_File))) {
            File::delete(public_path('upload/study/' . $study_file->study_File));
        }

        $where = array('pk_study_material_Id' => $id);
        StudyMaterial::where($where)->delete();
        StudyMaterial::where('top', $id)->delete();
        return response()->json(['message' => 'Successfully Deleted!']);


    }

    /*--------------------------------------study material code end-------------------------*/
    public function ClassRegister(Request $request)
    {

        $user = User::findOrFail(Auth::id());
        $class_sections = '';
        $attendance_types =Attendance_type::all();



        if($user!=Null)
        {

            $class_sections = ClassSection::where('emp_Id',$user->id)->first();

        } 

        if ($class_sections != Null)
        {

            $attendance_of_class_section_students = User::whereHas('studentinfo', function ($q2) use ($class_sections) {
                $q2->where('cls_Id', $class_sections->cls_Id);
                $q2->where('section_id', $class_sections->c_section_Id);

            })->whereDoesntHave('withDraw')->get();



            $query = ClasswiseAttendance::where('cls_Id',$class_sections->cls_Id)->where('c_section_Id',$class_sections->c_section_Id);

            $currentAttendInfo = '';

            if($request->id){

                $query->where('date_register',$request->id);

            }else{

                $query->where('date_register',date('Y-m-d'));
            }



            $attendance= $query->get();

            $stlist = [];



            $bac = Classwisebehaviour::where('cls_Id',$class_sections->cls_Id)->where('c_section_Id',$class_sections->c_section_Id);

            $id = '';

            if($request->id){

                $bac->where('date',$request->id);
                $id=$request->id;

            }else{

                $bac->where('date',date('Y-m-d'));
            }


            $bac= $bac->get();


            $bacar= [];

            $studentListBach ='';


            if($bac){

                $i=1;
                foreach($bac as $bacs ){

                    $studentListBach .=$bacs->std_Id;


                    if(sizeof($bac)!=$i){
                        $studentListBach .=',';

                    }
                    $i++;



                    $bacar[$bacs->std_Id]['id']=$bacs->std_Id;


                }

            }



            /*
            Achemenet
            */

            $ach = Classwiseachievement::where('cls_Id',$class_sections->cls_Id)->where('c_section_Id',$class_sections->c_section_Id);

            $idach = '';

            if($request->id){

                $ach->where('date',$request->id);
                $idach=$request->id;

            }else{

                $ach->where('date',date('Y-m-d'));
            }


            $achss= $ach->get();


            $achementar= [];

            $studentListach ='';


            if($achss){

                $i=1;

                foreach($achss as $achs ){

                    $studentListach .=$achs->std_Id;


                    if(sizeof($achss)!=$i){
                        $studentListach .=',';

                    }
                    $i++;



                    $achementar[$achs->std_Id]['id']=$achs->std_Id;


                }

            }




            foreach($attendance as $attendanc ){

                $stlist[$attendanc->std_Id]['id']=$attendanc->std_Id;
                $stlist[$attendanc->std_Id]['attendanc']=$attendanc->attendance;


            }
            //dd($stlist);


        }else{
            $attendance = '';
            $attendance_of_class_section_students = '';
            $class_sections = '';

        }


        return view('teacher.classregister',compact('attendance_of_class_section_students','class_sections','attendance_types','class_sections','stlist','currentAttendInfo','bacar','id','studentListBach','achementar','studentListach'));




    }
    public function Attendance(Request $request)
    {



        $user = User::findOrFail(Auth::id());
        $class_sections = '';
        if($user!=Null)
        {
            $class_sections = ClassSection::where('emp_Id',$user->id)->first();
        }

        $attendance_from_dates = [];
        if($request->date_register){
            $datas = $request->date_register;

            $attendances = ClasswiseAttendance::where('cls_Id',$class_sections->cls_Id)->where('c_section_Id',$class_sections->c_section_Id)->where('date_register',$request->date_register)->groupBy('date_register')->orderby('cls_att_Id','desc')->get();


        } else{

            $datas ='';
            $attendances = ClasswiseAttendance::where('cls_Id',$class_sections->cls_Id)->where('c_section_Id',$class_sections->c_section_Id)->groupBy('date_register')->orderby('cls_att_Id','desc')->get();

        }

        return view('teacher.attendance', compact('attendances','attendance_from_dates','datas'))   ;

    }



    /* Delete atteance*/

    function deleteAttendance($id){

        $currentAttendInfo= ClasswiseAttendance::where('date_register',$id)->first();

        $attendance= ClasswiseAttendance::where('cls_Id',$currentAttendInfo->cls_Id)->where('c_section_Id',$currentAttendInfo->c_section_Id)->where('date_register',$currentAttendInfo->date_register)->delete();

        $currentAttendInfobs= Classwisebehaviour::where('date',$id)->first();

        $be= Classwisebehaviour::where('cls_Id',$currentAttendInfobs->cls_Id)->where('date',$currentAttendInfobs->date)->where('c_section_Id',$currentAttendInfobs->c_section_Id)->delete();

        $currentAttendInfobsss= Classwiseachievement::where('date',$id)->first();

        Classwiseachievement::where('cls_Id',$currentAttendInfobsss->cls_Id)->where('date',$currentAttendInfobsss->date)->where('c_section_Id',$currentAttendInfobsss->c_section_Id)->delete();


        echo '1';



    }

    public function ShowAttendance(Request $request)
    {

        $currentAttendInfo= ClasswiseAttendance::where('date_register',$request->attendance_date)->first();


        $attendance= ClasswiseAttendance::where('cls_Id',$request->class_id)->where('c_section_Id',$request->class_section_id)->where('date_register',$request->attendance_date)->get();

        $data = [];

        $attendance_of_class_section_students = User::whereHas('studentinfo', function ($q2) use ($request) {

           // ->where('cls_Id',$request->class_id)->where('c_section_Id',$request->class_section_id)
            $q2->where('cls_Id', $request->class_id);
            $q2->where('section_id', $request->class_section_id);

        })->get();

        $stlist = [];







        foreach($attendance as $attendanc ){

            $stlist[$attendanc->std_Id]['id']=$attendanc->std_Id;
            $stlist[$attendanc->std_Id]['attendanc']=$attendanc->attendance;
            $stlist[$attendanc->std_Id]['name']=$attendanc->user?$attendanc->user->name:'';


        }


        foreach($attendance_of_class_section_students as $studen){



            if(!isset($stlist[$studen->id])){
                $stlist[$studen->id]['id']=$studen->id;
                $stlist[$studen->id]['attendanc']="A";
                $stlist[$studen->id]['name']=$studen->name;

            }



        }


        $Behav= Classwisebehaviour::where('cls_Id',$currentAttendInfo->cls_Id)->where('c_section_Id',$currentAttendInfo->c_section_Id)->where('date',$currentAttendInfo->date_register)->get();

        $BehavArray = [];



        if($Behav){

            $configBehaviourType = config('constants.BehaviourType');
            $configActivities = config('constants.Activities');
            $configLocation = config('constants.Location');
            $configStatus = config('constants.Status');


            foreach($Behav as $back){

                $array = [];
                $array['name']=  $stlist[$back->std_Id]['name'];
                $array['behaviour_type']=  $back->behaviour_type?$configBehaviourType[$back->behaviour_type]:'';
                $array['activities']= $back->activities_id?$configActivities[$back->activities_id]:'';
                $array['location']=  $back->location_id?$configLocation[$back->location_id]:'';
                $array['status']=  $configStatus[$back->status];
                $array['comments']=  $back->comments?$back->comments:'';
                $BehavArray[] = $array;

            }

        }


        /*
                Acheimenet
        */

        $achievementRes= Classwiseachievement::where('cls_Id',$currentAttendInfo->cls_Id)->where('c_section_Id',$currentAttendInfo->c_section_Id)->where('date',$currentAttendInfo->date_register)->get();

        $achievementarray = [];



        if($achievementRes){

            $configAchievement = config('constants.Achievement');
            $configAchievementActivities = config('constants.AchievementActivities');



            foreach($achievementRes as $achievementRe){

                $array = [];
                $array['name']=  $stlist[$achievementRe->std_Id]['name'];
                $array['achievement_type']=  $achievementRe->achievement_type?$configAchievement[$achievementRe->achievement_type]:'';
                $array['activities']=  $achievementRe->activities_id?$configAchievementActivities[$achievementRe->activities_id]:'';
                $array['comments']=  $achievementRe->comments?$achievementRe->comments:'';
                $achievementarray[] = $array;

            }

        }

        $data['attedence'] = $stlist;
        $data['behavArray'] = $BehavArray;
        $data['achievement'] = $achievementarray;
        $data['class'] = $currentAttendInfo->class?$currentAttendInfo->class->class:'';
        $data['section'] = $currentAttendInfo->section?$currentAttendInfo->section->class_section_name:'';
        $data['date_register'] = $currentAttendInfo->date_register;

        return Response::json($data);


    }




    public function EditAttendance($id)
    {


    }

    public function AttendanceDateWise(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from_date' => 'required',
            'to_date' => 'required',
        ]);



        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            $date1 = $request->from_date;
            $date2 = $request->to_date;

            //$myModel = MyModel::find(1);
            //$myModel->whereBetween('created_at', [$date1, $date2]);
            //DB::connection()->enableQueryLog();
            $attendances = DB::table('classwise_attendace')
                ->join('class', 'classwise_attendace.cls_Id', 'class.cls_Id')
                ->join('class_section', 'classwise_attendace.c_section_Id', 'class_section.c_section_Id')->whereBetween('classwise_attendace.date_register', [$date1, $date2])->orderBy('classwise_attendace.date_register', 'asc')->get();
            //$attendance_sheet[] ='';
            if ($attendances) {

                foreach ($attendances as $key => $item) {
                    $attendance_sheet[] = unserialize($item->attendance);

                }
                $attendance_sheet = $attendance_sheet;
            }
        }

        return Response::json(['attendances' => $attendances,'attendance_sheet'=>$attendance_sheet]);

    }




    public function AddClassBehavoir(Request $request){


        $student =explode(",", $request->student);

        $validator = Validator::make($request->all(), [
            'cls_Id'         => 'required',
            'c_section_Id'   => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {


            $data = [];


            $stundetsId = explode(",",$request->student);


            if($request->id!=''){


                $query =Classwisebehaviour::where('date',$request->id)->where('cls_Id',$request->cls_Id)->where('c_section_Id',$request->c_section_Id);
                $datass = $request->id;
            }else{

                $query = Classwisebehaviour::where('date',date('Y-m-d'))->where('cls_Id',$request->cls_Id)->where('c_section_Id',$request->c_section_Id);
                $datass = date('Y-m-d');


            }

            $query->delete();

            foreach($stundetsId as $student){
                $register = new Classwisebehaviour;
                $register->cls_Id = $request->cls_Id;
                $register->c_section_Id = $request->c_section_Id;
                $register->att_typ_Id = 2;
                $register->std_Id =$student;
                $register->behaviour_type = $request->behaviour_type;
                $register->activities_id = $request->activities_id;
                $register->location_id = $request->location_id;
                $register->date = $datass;
                $register->status =  $request->status;
                $register->comments =  $request->comments;
                $register->save();
                $data[$student]['id'] = $student;
            }
            return  response::json($data);


        }


    }


    public function AddClassachievement(Request $request){

        $student =explode(",", $request->student);
        $validator = Validator::make($request->all(), [
            'cls_Id'         => 'required',
            'c_section_Id'   => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            $data = [];
            $stundetsId = explode(",",$request->student);
            if($request->id!='')
            {

                $query =Classwiseachievement::where('date',$request->id)->where('cls_Id',$request->cls_Id)->where('c_section_Id',$request->c_section_Id);
                $datass = $request->id;
            }else{

                $query = Classwiseachievement::where('date',date('Y-m-d'))->where('cls_Id',$request->cls_Id)->where('c_section_Id',$request->c_section_Id);
                $datass = date('Y-m-d');


            }

            $query->delete();

            foreach($stundetsId as $student){
                $register = new Classwiseachievement;
                $register->cls_Id = $request->cls_Id;
                $register->c_section_Id = $request->c_section_Id;
                $register->att_typ_Id = 3;
                $register->std_Id =$student;
                $register->achievement_type = $request->achievement_type;
                $register->activities_id = $request->activities_id;
                $register->date = $datass;
                $register->comments =  $request->comments;
                $register->save();

            }

            return  response::json($data);


        }


    }




    /*
        
        Profile Update 
        
    */

    public function TeacherProfileUpdate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'phone'    => 'required',
            'email'    => 'required',
            'marital_status' => 'required',
            'user_mail_address' => 'required',
            'emerContPerson' => 'required',
            
        ]);

        if ($validator->fails()) {

            return back()->withErrors($validator);

        }else {

            if($request->password!='' and $request->password_confirmation!=''  and ( $request->password !=$request->password_confirmation)){
                $error = array('password_confirmation' => 'Confirmation password doesnot match password');

                return back()->withErrors($error);
            }
            elseif($request->password_confirmation!=''){
                $validator = Validator::make($request->all(), [
                    'password_confirmation' => 'required'
                ]);
                return back()->withErrors($validator);
            }

            $user = User::findOrFail(Auth::user()->id);
            


            /*  user Table Update*/
            $form_data = array(
                'username' => $request->username,
                'email' => $request->email,
                'name' => $request->name,
            );

            if ($request->hasFile('user_image')) {
                $user_image = $request->file('user_image');
                $new_user_image = "user" . time() . '.' . $user_image->getClientOriginalExtension();
                $user_image->move(public_path('upload/user'), $new_user_image);
                $form_data['user_image'] = $new_user_image;
            }
            

            if ($request->password and $request->password_confirmation !='') {
                $form_data['password'] = Hash::make($request->get('password'));
            
            } 


            $user->update($form_data);


            $data2 = array(
                'emp_marital_Status' => $request->marital_status
            );

            EmployeeInfo::where('user_Id', $user->id)->update($data2);


            $data3 = array(
                'emer_cont_Name' => $request->emerContPerson,
                'emer_cont_No' => $request->phone,
                'fk_emer_relat_Id' => $request->relation,
            );
            $data4 = array(
                'emp_mail_Add'  =>$request->user_mail_address
            );

            EmergencyContact::where('emer_cnt_Id', $user->employeeInfo ? $user->employeeInfo->emer_cnt_Id :'')->update($data3);
            EmployeeContact::where('emp_cnt_Id', $user->employeeInfo ? $user->employeeInfo->emp_cnt_Id : '')->update($data4);
            $request->flash();

            return Redirect::to('/home')->withSuccess('Successfully Updated!');

        }

    }



    public function AddClassRegister(Request $request){


        $student =explode(",", $request->student);

        $validator = Validator::make($request->all(), [
            'cls_Id'         => 'required',
            'c_section_Id'   => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {


            $data = [];


            $stundetsId = explode(",",$request->student);


            if($request->id!=''){

                $currentAttendInfo= ClasswiseAttendance::where('date_register',$request->id)->first();


                $query =ClasswiseAttendance::where('date_register',$currentAttendInfo->date_register)->where('cls_Id',$request->cls_Id)->where('c_section_Id',$request->c_section_Id);
                $datass = $currentAttendInfo->date_register;
            }else{
                $query = ClasswiseAttendance::where('date_register',date('Y-m-d'))->where('cls_Id',$request->cls_Id)->where('c_section_Id',$request->c_section_Id);
                $datass =date('Y-m-d');

            }
            foreach($stundetsId as $student){

                $query = $query->where('std_Id',$student)->delete();


                $register = new ClasswiseAttendance;
                $register->cls_Id = $request->cls_Id;
                $register->c_section_Id = $request->c_section_Id;
                $register->att_typ_Id = $request->attendance_type;
                $register->std_Id =$student;
                $register->attendance = $request->attendance;
                $register->date_register = $datass;
                $register->save();

                $data[$student]['id'] = $student;
                $data['idss'] = $register->cls_att_Id;
                $data[$student]['attendence_stutus']= $request->attendance;


            }



            return  response::json($data);


        }
        //dd($dateRegister->date_register);


    }


    public function ExamMakr(Request $request)
    {


        $data  = [];
        $ObtaiMarks =  Marks_Obtain::where('exam_Id',$request->exam)->where('subject_id',$request->subject)->where('date',$request->date)->get();
        $marskStunde = [];
        if($ObtaiMarks->isNotEmpty()){
            foreach ($ObtaiMarks as $key => $value) {
                $marskStunde[$value->sub_Id] = $value;
                // code...
            }
        } 
        $NoOfStudents = User::whereHas('studentinfo', function ($q2) use ($request) {
             
            $q2->where('cls_Id', $request->class);
            $q2->where('section_id', $request->section);

        })->whereDoesntHave('withDraw')->get();
       
        $studentList = [];

        if($NoOfStudents){
            foreach($NoOfStudents as $key=>$val){
                $student = array();
                $student['id'] = $val->id;
                $student['name'] = $val->name;
                $student['admission'] = $val->studentinfo->admission?$val->studentinfo->admission->adm_Number:'';
                $student['role_number'] = $val->studentinfo?$val->studentinfo->role_number:'';
                if(isset($marskStunde[$val['id']])){
                    $student['ObtaiMarks'] = $marskStunde[$val['id']];
                }
                $studentList[$val['id']] =$student;
            };
        }

        $ExamSubjectMark = ExamSubjectMark::where(['exam_id'=>$request->exam, 'sc_sec_Id' =>$request->sc_sec_Id,'sub_Id' => $request->subject])->orderby('submarks_Id','asc')->get();
        $data['stundets'] = $studentList;
        $data['exam'] = $request->exam;
        $data['subject'] = $request->subject;
        $data['paperDate'] = $request->date;
        $data['ExamSubjectMark'] = $ExamSubjectMark;

        $data['exame_grade'] = Grade::where('exam_Id',$request->exam)->get();

        $data['subjects'] = Subject::where('sub_Id',$request->subject)->first();
        $data['exame_name'] = Exam::where('exam_Id',$request->exam)->first();
        return response::json($data);
    }


    public function marksobtain(Request $request)
    {




        $input = $request->all();



        if(sizeof($input['marks'])>0){


            $array = array();

            Marks_Obtain::where('exam_Id',$input['exam_Id'])->where('subject_id',$input['subject'])->where('date',$input['date'])->delete();

            foreach($input['marks'] as $key=>$val){

                $array = $val;



                $Marks_Obtain = new Marks_Obtain();



                foreach($array as $keyss=>$vssal){

                    $Marks_Obtain->$keyss = $vssal;


                }

                $Marks_Obtain->comment= $input['comments'][$key];
                $Marks_Obtain->exam_Id= $input['exam_Id'];
                $Marks_Obtain->subject_id= $input['subject'];
                $Marks_Obtain->date= $input['date'];
                $Marks_Obtain->sub_Id= $key;


                $Marks_Obtain->save();




            }


        }




    }



    public function Assessment(Request $request)
    {
        $exam_names = Exam::where('top',0)->where('exam_Status','Active')->get();
        //$classes = AddClasses::all();
        $subjects = Subject::all();
        $syllabuses = Syllabus::all();
        $exam_papers = ExamPaper::all();
        $classes = AddClasses::all();
        $user = User::findOrFail(Auth::id());
        $aasingsubs =$user->assignSubject?$user->assignSubject:'';

        $assignsArray = [];
        if($aasingsubs){
            $i=1;
            foreach($aasingsubs as $aasingsub)
            {
                
                $dashe = Datesheet::where('sub_Id',$aasingsub->subject_id)->orderBy('date','desc')->first();

                if($dashe){
                    $suject['exame']= $dashe->teacherExam?$dashe->teacherExam->exam_Name:'';
                    $suject['class']= $dashe->class?$dashe->class->class:'';
                    $suject['sc_sec_Id']= $dashe->class?$dashe->class->sc_sec_Id:'';
                   
                    $suject['subject']= $aasingsub->subject?$aasingsub->subject->subject:'';
                    $suject['date']= $dashe->date;
                    $suject['dsheet_Id']= $dashe->dsheet_Id;
                    $suject['exam_Id']= $dashe->exam_Id;
                    $suject['class_id']= $aasingsub->cls_id;
                    $suject['section_id']= $aasingsub->section_id;
                    $suject['section']= $aasingsub->section?$aasingsub->section->class_section_name:'';
                    $suject['subject_id']= $aasingsub->subject_id;
                    $assignsArray[$aasingsub->subject_id] =$suject;
                }
            }


        } 


        




        
        if ($request->name == 'syllabus') {

            return view('teacher.partials.syllabus_data', compact('syllabuses'))->render();

        }else{
            if ($request->syllabus_exam || $request->syllabus_class) {

                if ($request->syllabus_exam == 'all') {
                    $request->syllabus_exam = '';
                }
                if ($request->syllabus_class == 'all') {
                    $request->syllabus_class = '';
                }

                $query = Syllabus::query();

                if (!empty($request->syllabus_exam) and $request->syllabus_exam != 'all') {
                    $query = $query->where('exam_Id', $request->syllabus_exam);
                }
                if (!empty($request->syllabus_class) and $request->syllabus_class != 'all') {
                    $query = $query->where('cls_Id', $request->syllabus_class);
                }

                $syllabuses = $query->get();

                return view('teacher.partials.syllabus_data', compact('syllabuses'))->render();

            } else {
                $syllabuses = Syllabus::all();
            }
        }
        if ($request->name == 'paper') {

            return view('teacher.partials.paper_data', compact('exam_papers'))->render();

        }else{
            if ($request->paper_exam || $request->paper_class) {

                if ($request->paper_exam == 'all') {
                    $request->paper_exam = '';
                }
                if ($request->paper_class == 'all') {
                    $request->paper_class = '';
                }

                $query = ExamPaper::query();

                if (!empty($request->paper_exam) and $request->paper_exam != 'all') {
                    $query = $query->where('exam_Id', $request->paper_exam);
                }
                if (!empty($request->paper_class) and $request->paper_class != 'all') {
                    $query = $query->where('cls_Id', $request->paper_class);
                }

                $exam_papers = $query->get();


                return view('teacher.partials.paper_data', compact('exam_papers'))->render();
            } else {
                $exam_papers = ExamPaper::all();
            }

        }















        return view('teacher.assessment',compact('syllabuses','exam_papers','exam_names','classes','subjects','assignsArray'));
    }

    public function GetSyllabusClassSection($id)
    {

        $school_section_ajax = DB::table("exams")->where("top",$id)->get();
        //dd($school_section_ajax);
        $data[] = '';
        foreach ($school_section_ajax as $school_section) {

            $data[] = $school_section->sc_sec_Id;

        }


        $class_by_school_section_ajax = DB::table("class")->whereIn("sc_sec_Id", $data)->get();
        //dd($class_by_school_section_ajax);
        return json_encode($class_by_school_section_ajax);
    }

    /*--------------------------------set syllabus code start-------------------------*/
    public function CreateExamSyllabus(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'exam_name' => 'required',
            'class_name' => 'required',
            'subject_name' => 'required',


        ]);

        if ($request->file('exam_syllabus_file')) {

            //dd($request->file('exam_syllabus_file'));

            $image = $request->file('exam_syllabus_file');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('upload/syllabus/'), $filename);
        }

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            $exam_Syllabus = new Syllabus();
            $exam_Syllabus->exam_Id = $request->get('exam_name');
            $exam_Syllabus->cls_Id = $request->get('class_name');
            $exam_Syllabus->sub_Id = $request->get('subject_name');
            $exam_Syllabus->syllabus_docs = $filename;
            //dd($exam_Syllabus);
            $exam_Syllabus->save();
            return response()->json(['message' => 'Successfully Added!']);

        }


    }

    public function EditExamSyllabus($id)
    {
        $syllabus = Syllabus::findorFail($id);
        return Response::json($syllabus);

    }

    public function UpdateExamSyllabus(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'exam_name' => 'required',
            'class_name' => 'required',
            'subject_name' => 'required',


        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            $form_data = array(
                'exam_Id' => $request->get('exam_name'),
                'cls_Id' => $request->get('class_name'),
                'sub_Id' => $request->get('subject_name'),

            );
            if ($request->file('exam_syllabus_file')) {

                $syllabus_file = Syllabus::where('syllabus_Id', $request->id)->first();
                //dd($syllabus_file);
                if (\File::exists(public_path('upload/syllabus/' . $syllabus_file->syllabus_docs))) {
                    File::delete(public_path('upload/syllabus/' . $syllabus_file->syllabus_docs));
                }

                $image = $request->file('exam_syllabus_file');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('upload/syllabus/'), $filename);
                $form_data['syllabus_docs'] = $filename;
            }
            //dd($form_data);


            Syllabus::where('syllabus_Id', $request->id)->update($form_data);
            $request->flash();
            return response()->json(['message' => 'Successfully Updated!']);
        }
    }

    public function DeleteExamSyllabus($id)
    {

        $syllabus_file = Syllabus::where('syllabus_Id', $id)->first();
        //dd($syllabus_file);
        if (\File::exists(public_path('upload/syllabus/' . $syllabus_file->syllabus_docs))) {
            File::delete(public_path('upload/syllabus/' . $syllabus_file->syllabus_docs));
        }

        $where = array('syllabus_Id' => $id);
        Syllabus::where($where)->delete();
        return response()->json(['message' => 'Successfully Deleted!']);


    }

    /*--------------------------------set Exam Paper code start-------------------------*/
    public function CreateExamPaper(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'exam_name' => 'required',
            'exam_class' => 'required',
            'exam_subject' => 'required',


        ]);


        if ($request->file('exam_paper_file')) {

            //dd($request->file('exam_syllabus_file'));

            $image = $request->file('exam_paper_file');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('upload/paper/'), $filename);
        }

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            $exam_Syllabus = new ExamPaper();
            $exam_Syllabus->exam_Id = $request->get('exam_name');
            $exam_Syllabus->cls_Id = $request->get('exam_class');
            $exam_Syllabus->sub_Id = $request->get('exam_subject');
            $exam_Syllabus->paper_File = $filename;
            //dd($exam_Syllabus);
            $exam_Syllabus->save();
            return response()->json(['message' => 'Successfully Added!']);

        }


    }

    public function EditExamPaper($id)
    {

        $examPaper = ExamPaper::findorFail($id);

        return Response::json($examPaper);

    }

    public function UpdateExamPaper(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'exam_name' => 'required',
            'exam_class' => 'required',
            'exam_subject' => 'required',


        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            $form_data = array(
                'exam_Id' => $request->get('exam_name'),
                'cls_Id' => $request->get('exam_class'),
                'sub_Id' => $request->get('exam_subject'),

            );
            if ($request->file('exam_paper_file')) {

                $exam_paper_file = ExamPaper::where('exampaper_Id', $request->id)->first();
                //dd($syllabus_file);
                if (\File::exists(public_path('upload/paper/' . $exam_paper_file->paper_File))) {
                    File::delete(public_path('upload/paper/' . $exam_paper_file->paper_File));
                }

                $image = $request->file('exam_paper_file');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('upload/paper/'), $filename);
                $form_data['paper_File'] = $filename;
            }
            //dd($form_data);


            ExamPaper::where('exampaper_Id', $request->id)->update($form_data);
            $request->flash();
            return response()->json(['message' => 'Successfully Updated!']);
        }
    }

    public function DeleteExamPaper($id)
    {

        $exam_paper_file = ExamPaper::where('exampaper_Id', $id)->first();
        //dd($syllabus_file);
        if (\File::exists(public_path('upload/paper/' . $exam_paper_file->paper_File))) {
            File::delete(public_path('upload/paper/' . $exam_paper_file->paper_File));
        }

        $where = array('exampaper_Id' => $id);
        ExamPaper::where($where)->delete();
        return response()->json(['message' => 'Successfully Deleted!']);


    }

    /*--------------------------------set Exam Paper code end-------------------------*/

    public function TeacherProfile()
    {
//        dd(session()->all());
        $userdata = Session::get('userData')['id'];

        $teacher = DB::table('employee_info')
            ->leftjoin('employee_contact', 'employee_info.emp_cnt_Id', '=', 'employee_contact.emp_cnt_Id')
            ->leftjoin('gender', 'employee_info.gnd_Id', '=', 'gender.gnd_Id')
            ->leftJoin('users', 'users.id', '=', 'employee_info.emp_id')
            ->leftjoin('nationality', 'employee_info.nation_Id', '=', 'nationality.nation_Id')
            ->leftjoin('domicile', 'employee_info.dom_Id', '=', 'domicile.dom_Id')
            ->leftjoin('cast', 'employee_info.cast_Id', '=', 'cast.cast_Id')
            ->leftjoin('blood_group', 'employee_info.bg_Id', '=', 'blood_group.bg_Id')
            ->leftjoin('religion', 'employee_info.relig_Id', '=', 'religion.relig_Id')
            ->leftjoin('emergency_contact', 'employee_info.emer_cnt_Id', '=', 'emergency_contact.emer_cnt_Id')
            ->leftjoin('employment_info', 'employee_info.empt_Id', '=', 'employment_info.empt_Id')
            ->where('employee_info.user_Id', $userdata)->first();
        //$last_query = end($queries);
        //dd($last_query);
        return view('teacher.profile',compact('teacher'));
    }

    public function editProfile(){
        //DB::enableQueryLog();
        $nationalities= Nationality::all();
        $gender = Gender::all();
        $maritalstatus = MaritalStatus::all();
        $bloodgroup = BloodGroup::all();
        $relationship = Relationship::all();
        $emergencyContact = EmergencyContact::all();
        $cast = Cast::all();
        $cities = DB::table('cities')->get();
        $religion = Religion::all();



        $teacherprofile = DB::table('employee_info')
            ->leftjoin('employee_contact', 'employee_info.emp_cnt_Id', '=', 'employee_contact.emp_cnt_Id')
            ->leftjoin('gender', 'employee_info.gnd_Id', '=', 'gender.gnd_Id')
            ->rightJoin('users', 'users.id', '=', 'employee_info.user_Id')
            ->leftjoin('nationality', 'employee_info.nation_Id', '=', 'nationality.nation_Id')
            ->leftjoin('domicile', 'employee_info.dom_Id', '=', 'domicile.dom_Id')
            ->leftjoin('cast', 'employee_info.cast_Id', '=', 'cast.cast_Id')
            ->leftjoin('blood_group', 'employee_info.bg_Id', '=', 'blood_group.bg_Id')
            ->leftjoin('religion', 'employee_info.relig_Id', '=', 'religion.relig_Id')
            ->leftjoin('emergency_contact', 'employee_info.emer_cnt_Id', '=', 'emergency_contact.emer_cnt_Id')
            ->leftjoin('employment_info', 'employee_info.empt_Id', '=', 'employment_info.empt_Id')
//
            ->where('employee_info.user_Id', Session::get('userData')['id'])->first();
//        dd($teacherprofile);
        return view('teacher.profile-edit',compact('teacherprofile','gender', 'bloodgroup', 'nationalities', 'maritalstatus', 'relationship', 'cast','cities', 'religion', 'emergencyContact'));
    }

    public function ProfileUpdate(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'user_image' => 'image|mimes:jpeg,png,jpg,png|max:1024',
            'email' => 'required|email',
            'phone' => 'required',
            'fath_name' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'blood_group' => 'required',
            'nationality' => 'required',
            'dob' => 'required',
            'religion' => 'required',
            'cast' => 'required',
            'city' => 'required',
            'emer_cont_name' => 'required',
            'emer_contact' => 'required',
            'emer_contact_rel' => 'required'
        ]);

        $form_data1 = array(
//            'name'      => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        );

        $form_data2 = array(
            'emp_fat_Name'=> $request->fath_name,
            'emp_marital_Status'=> $request->marital_status,
            'bg_Id' => $request->blood_group,
            'nation_Id' => $request->nationality,
            'emp_Dob' => $request->dob,
            'relig_Id' => $request->religion,
            'cast_Id' => $request->cast,
            'city_Id' => $request->city,
            'gnd_Id' => $request->gender
        );

        $emer_table = array(
            'emer_cont_Name' => $request->emer_cont_name,
            'emer_cont_No' => $request->emer_contact,
            'fk_emer_relat_Id' => $request->emer_contact_rel,
        );
        $employee_Cnt = array(
            'emp_Email' => $request->email,
            'emp_mob_Ph' => $request->phone
        );

        if ($request->hasFile('user_image')) {
            $user_image = $request->file('user_image');
            $new_user_image = "user" . time() . '.' . $user_image->getClientOriginalExtension();
            $user_image->move(public_path('upload/user'), $new_user_image);
            $form_data1['user_image'] = $new_user_image;
        }
//        dd('hellooo now  i am here ??');

        User::where('id',Session::get('userData')['id'])->update($form_data1);
        EmployeeInfo::where('emp_Id', $request->employee_info_table)->update($form_data2);
        EmergencyContact::where('emer_cnt_Id', $request->emer_cnt_table)->update($emer_table);
        EmployeeContact::where('emp_cnt_Id', $request->emp_cnt_table)->update($employee_Cnt);
        $request->flash();
        return redirect()->back()->with('message', 'Successfully Updated!');

    }
}
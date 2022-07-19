<?php

namespace App\Http\Controllers;
use App\Models\Admission;
use App\Models\ClassSection;
use App\Models\Datesheet;
use App\Models\ExamSubjectMark;
use App\Models\Grade;
use App\Models\Marks_Obtain;
use App\Models\Subject;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\School;
use DB;
use Carbon\Carbon;

use App\Models\Transactions;
use App\Models\Fee_schedule;
use App\Models\AddClasses;
use App\Models\Chartofaccounts;
use App\Models\Exam;
use DateTime;
class ReportsController extends Controller
{

    // admission Reports
    public function admissionReports()
    {
        $school = School::first();
        return view('reports.admission-reports',compact('school'));
    }
    
    // admission render
    public function reportAdmissionAjax(Request $request){

        $array_re[] = '';
        $array_re =[
            'form_type' => 'required',
        ];
        if($request->form_type =='admission_record'  and $request->from_date=='' || $request->to_date==''){
            $array_re["from_date"] = "required";
            $array_re["to_date"] = "required";
        }

        /*$validator = Validator::make($request->all(), [
            'form_type' => 'required',
            /*'admission_number' => 'required',
            'issue_date' => 'required',*/
             
        //]);*/
        $validator =   Validator::make($request->all(),$array_re);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        
        }else{


            $school = School::first();
            if($request->form_type=='admission_form'){

               $adm_Number = $request->admission_number;

                $student = User::whereHas('roles', function ($q) {
                    $q->where('name','Student');
                })->whereHas('studentinfo', function ($q2) use ($adm_Number) {

                    if(!empty($adm_Number)){
                        $q2->whereHas('admission',function ($q2w) use ($adm_Number) {
                            if(!empty($adm_Number)){
                                $q2w->where('adm_Number', $adm_Number);
                            }
                        });
                    }
                })->whereDoesntHave('withDraw')->first();

               if($student){

               $studentinfos=$student->studentinfo?$student->studentinfo->father_id:'';
               if($studentinfos){
                $father = $student->studentinfo?$student->studentinfo->father($studentinfos):'';
                $mother = $student->studentinfo?$student->studentinfo->mother:'';
                }else{
                    $father='';
                    $mother = '';
                }

                  ///da
                $lastSchool= '';
                 if($student->studentinfo){

                    if($student->studentinfo->lastSchool){
                        $lastSchool = $student->studentinfo->lastSchool;
                    }

                 }

                 $flG= false;
                 if($adm_Number=='' ){
                     return view('reports.partails.admission-reports-blank',compact('school'))->render();

                 }else{
                     return view('reports.partails.admission-reports',compact('student','flG','school','father','mother','lastSchool'))->render();

                 }



                }else{
                   return view('reports.partails.admission-reports-blank',compact('school'))->render();

               }

            }else{

                $total_student = User::whereHas('roles', function ($q) {
                    $q->where('name','Student');
                })->whereDoesntHave('withDraw')->count();
                //dd($total_student);

                $active_student = User::whereHas('roles', function ($q) {
                    $q->where('name','Student');
                    $q->where('status','Active');
                })->whereDoesntHave('withDraw')->count();
                //dd($active_student);
                $none_active_student = User::whereHas('roles', function ($q) {
                    $q->where('name','Student');
                    $q->where('status','Inactive');
                })->whereDoesntHave('withDraw')->count();
                //dd($none_active_student);

               //$adm_Number = $request->admission_number;
               $from_date = $request->from_date;
               $to_date = $request->to_date;


                    $students = User::whereHas('roles', function ($q) {
                        $q->where('name','Student');

                    })->whereHas('studentinfo', function ($q2) use ($from_date,$to_date) {
                            $q2->whereHas('admission',function ($q2w) use ($from_date,$to_date) {

                                    $q2w->whereBetween('adm_Date',[$from_date,$to_date]);

                            });

                    })->get();

                }


               if($students){

                 return view('reports.partails.admission-records',compact('students','total_student','active_student','none_active_student'))->render();
                }


            }


    }
    
    

    public function certificateReports()
    {
        return view('reports.certificates');
    }

    public function examinationReports()
    {
        $classes = AddClasses::all();
        $sessions = Admission::select('adm_Session')->distinct()->get();
        // $sections = ClassSection::all();
        // $exams = Exam::where('top',0)->get();
        return view('reports.examination-reports',compact('classes','sessions'));

    }

    public function examinationReportsAjax(Request $request){
        $school = School::first();
        $input = $request->all();
        //dd($input);
        $array_re[] = '';
        $array_re =[            
            'report_type' => 'required',
        ];

        if($request->report_type =='single_exam_report'  and $input['session']==''  ||  $input['exam']==''|| $input['class']==''|| $input['class_section']==''|| $input['student']==''){

            $array_re["session"] = "required";
            $array_re["exam"] = "required";
            $array_re["class"] = "required";
            $array_re["class_section"] = "required";
            $array_re["student"] = "required";
        }
        if($request->report_type == 'student_progress_report'){
            $array_re["session"] = "required";
            $array_re["class"] = "required";
            $array_re["class_section"] = "required";
            $array_re["student"] = "required";
        }

        if($request->report_type =='class_progress_report'){
            $array_re["session"] = "required";
            $array_re["class"] = "required";
            $array_re["class_section"] = "required";
            $array_re["exam"] = "required";
        }
        if($request->report_type =='school_progress_report'){
            $array_re["session"] = "required";
            $array_re["exam"] = "required";
        }
        $validator =   Validator::make($request->all(),$array_re);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        
        }else{

            $report_type = $request->report_type;
            

            if($report_type=='single_exam_report'){

                $student = User::findorFail($request->student);
                //dd($student);
                
                $class = AddClasses::where('cls_id', $input['class'])->first();
                $data['section'] = ClassSection::where('c_section_Id', $input['class_section'])->first();
                $data['class'] =$class;

                //dd($class);
                $data['exam'] = Exam::where('exam_Id',$input['exam'])->where('top',0)->first();
                
                //dd($data['exam']->exam_Id);

                $data['student'] = $student;
                //dd($data['student']);
                $father = $student->studentinfo?$student->studentinfo->father($student->studentinfo->father_id):'';

                $data['student']['father']=$father;
                 
                $datasheet = Datesheet::where('exam_Id',$input['exam'])->where('cls_Id',$class->cls_Id)->get();
                $data['datasheet'] = $datasheet;
               
                $totalMarks = 0;
                $ObtainMarks = 0;
                $data['subjects'] =[];
                foreach ($datasheet as $val){
                    //echo $val;
                    $data['subjects'][$val->sub_Id]['name']=$val->subject?$val->subject->subject:'';
                    $data['subjects'][$val->sub_Id]['marklese']=0;
                    if($val->subject){
                        //dd($val->subject);

                        if($val->subject->subjectmarks){

                            //$totalMarks+= $val->subject->subjectmarks->sum('set_Total');
                            $data['subjects'][$val->sub_Id]['marklese'] = ExamSubjectMark::where('exam_Id',$input['exam'])->where('sub_Id',$val->sub_Id)->sum('set_Total');
                            //$data['subjects'][$val->sub_Id]['marklese'] = $val->subject->subjectmarks->sum('set_Total');
                            //dd($data['subjects'][$data['exam']->exam_Id][$val->sub_Id]['marklese']);
                        }



                            $data['subjects'][$val->sub_Id]['obtainmarks'] = Marks_Obtain::where('exam_Id',$input['exam'])->where('subject_id',$val->sub_Id)->where('sub_Id',$student->id)->first();
                         if ($data['subjects'][$val->sub_Id]['obtainmarks']) {
                             $totalMarks+= $data['subjects'][$val->sub_Id]['marklese'];

                         }
                            $consexam_Module= config('constants.exam_Module');
                            $ocunt = 0;
                            foreach ($consexam_Module as $key=>$val2){
                                if(isset($data['subjects'][$val->sub_Id]['obtainmarks']->$val2) and $data['subjects'][$val->sub_Id]['obtainmarks']->$val2!='') {
                                    $ocunt = (int)$data['subjects'][$val->sub_Id]['obtainmarks']->$val2 + $ocunt;

                                }


                            }

                            if($ocunt==0){
                                $data['subjects'][$val->sub_Id]['obtainmarks']=' Not marked';
                            }else{
                                $data['subjects'][$val->sub_Id]['obtainmarks'] = $ocunt;
                                $ObtainMarks += $ocunt;
                                //dd($ObtainMarks);
                            }






                    }

                    $data['subjects'][$val->sub_Id]['name']=$val->subject?$val->subject->subject:'';

                }
                $data['percentage'] = 0;
                $data['grade'] = '';
                if ($ObtainMarks != 0){
                    $data['percentage'] = ($ObtainMarks / $totalMarks) * 100;
                    $grades = Grade::where('exam_Id',$input['exam'])->get();
                    foreach ($grades as $grade){
                        if ($data['percentage'] >= $grade->grade_st_Per && $data['percentage'] <= $grade->grade_end_Per){
                            $data['grade'] = $grade->grade_Name;
                        }
                    }
                }

                return view('reports.partails.singal_exame_reports', compact('data','school'))->render();


            }
            else if($report_type=='student_progress_report'){

                $student =  User::findorFail($request->student);

                if($student) {
                    $data['class'] = AddClasses::where('cls_id', $input['class'])->first();
                    $data['subjectslist'] = [];

                    $data['section'] = ClassSection::where('c_section_Id', $input['class_section'])->first();

                    if ($data['class']) {

                        $data['subjects'] = $data['class']->getSubject();

                        
                        $data['exam'] = Exam::where('sc_sec_Id', $data['class']->sc_sec_Id)->get();
                        $data['examtotal'] = [];
                        $exammarks = 0;
                        $setSubjectmark=0;                        
                        $j=1;
                        $k=1;
                        $exammarks = 0;
                        foreach ($data['exam']  as $vaMarE) {
                           
                            $exammarks = 0;
                            $obtaainMarks = 0;
                            $exam = Exam::where('exam_Id', $vaMarE->top)->first();
                          

                            foreach ($data['subjects'] as $vaMarS) {
                                


                                if($vaMarS->sub_Id){

                                 //dd($exam);



                                
                                $data['subjectslist'][$vaMarS->sub_Id][$exam->exam_Id]['marks'] = ExamSubjectMark::where('exam_Id', $exam->exam_Id)->where('sub_Id', $vaMarS->sub_Id)->sum('set_Total');


                                  //dd($data['subjectslist'][$vaMarS->sub_Id][$exam->exam_Id]['marks']);

                                $makrs = $data['subjectslist'][$vaMarS->sub_Id][$exam->exam_Id]['marks'];
                                

                                $data['subjectslist'][$vaMarS->sub_Id][$exam->exam_Id]['marks_obtain'] = Marks_Obtain::where('exam_Id', $exam->exam_Id)->where('subject_id', $vaMarS->sub_Id)->where('sub_Id', $student->id)->first();



                                if ($makrs!= '') {
                                    $makrs = (int)$makrs;
                                    //  echo $makrs;
                                    // $exammarks = (int)$exammarks;

                                    $exammarks=$exammarks+$makrs;
                                }


                                $obtainocunt = 0;
                                $consexam_Module = config('constants.exam_Module');
                                $ocunt = 0;

                                 foreach ($consexam_Module as $key => $val2) {


                                    if (isset($data['subjectslist'][$vaMarS->sub_Id][$exam->exam_Id]['marks_obtain']->$val2) and $data['subjectslist'][$vaMarS->sub_Id][$exam->exam_Id]['marks_obtain']->$val2 != '') {
                                            $ocunt = (int)$data['subjectslist'][$vaMarS->sub_Id][$exam->exam_Id]['marks_obtain']->$val2 + $ocunt;


                                    }


                                }


                                $data['subjectslist'][$vaMarS->sub_Id][$exam->exam_Id]['markcount'] = $ocunt;

                                if ($data['subjectslist'][$vaMarS->sub_Id][$exam->exam_Id]['markcount']!= '') {
                                    $ocunt = (int)$data['subjectslist'][$vaMarS->sub_Id][$exam->exam_Id]['markcount'];
                                    //  echo $makrs;
                                    // $exammarks = (int)$exammarks;

                                    $obtaainMarks=$obtaainMarks+$ocunt;
                                }
                            }


                                // $j++;
                                // $k++;
                            }
                             //dd($data['subjectslist']);

                            $percentage = 0;
                            $grade = '';

                            if ($obtaainMarks != 0){
                                $percentage = round(($obtaainMarks / $exammarks) * 100);
                                $grades = Grade::where('exam_Id',$exam->exam_Id)->get();

                                foreach ($grades as $grade){
                                     

                                    if ($percentage >= $grade->grade_st_Per && $percentage <= $grade->grade_end_Per){
                                        $grade = $grade->grade_Name;
                                         
                                        break;
                                    }
                                    

                                }
                            }
                            $data[$vaMarE->exam_Id]['total'][1] =$exammarks; 
                            $data[$vaMarE->exam_Id]['total'][2] =$obtaainMarks; 
                            $data[$vaMarE->exam_Id]['percentage'][2] =number_format($percentage,2); 
                            $data[$vaMarE->exam_Id]['grade'][2] =$grade; 

                        }

                     

                        


                    }


                    $data['student'] = $student;
                    $father = $student->studentinfo ? $student->studentinfo->father($student->studentinfo->father_id) : '';

                    $data['student']['father'] = $father;
                    //$data['student']['admission'] = Admission::select('adm_Number')->where('adm_Number', $input['admission_number'])->first();
                    /*         $totalMarks = 0;
                            $ObtainMarks = 0;


                            $data['percentage'] = 0;
                            $grades = Grade::where('exam_Id',$input['exam'])->get();
                            foreach ($grades as $grade){
                                if ($data['percentage'] >= $grade->grade_st_Per && $data['percentage'] <= $grade->grade_end_Per){
                                    $data['grade'] = $grade->grade_Name;
                                }
                            }*/
                }else{
                    $data['student'] = '';
                }
                return view('reports.partails.student_progress_reports',compact('data','school'))->render();





            }
            else if($report_type=='class_progress_report'){
                
                $year = explode('-', $request->session);

                $admission_no = School::select('school_abbreviation')->first();
                $admission_no = 'ADM-'.$admission_no->school_abbreviation . "-" . $year[0] . "-";
                

                $students     = $data['students'] = User::whereHas('roles', function ($q) {
                                $q->where('name','Student');
                                })->whereHas('studentinfo', function ($q2) use ($admission_no) {
                                 
                                if(!empty($admission_no)){ 
                                    $q2->whereHas('admission',function ($q2w) use ($admission_no) {
                                            
                                            $q2w->where('adm_Number', 'like', '%' . $admission_no . '%');
                                            
                                        });
                                }
                                
                                })->whereDoesntHave('withDraw')->get();


                $data['class'] = AddClasses::where('cls_Id',$input['class'])->first();
                

                $data['section'] = ClassSection::where('c_section_Id',$input['class_section'])->first();

                $data['exam'] = Exam::where('exam_Id',$input['exam'])->where('top',0)->first();
                
                $data['student'] = $students;

                //$father = $student->studentinfo?$student->studentinfo->father($student->studentinfo->father_id):'';
                //dd($father);
                //$data['student']['father']=$father;
                $datasheet = Datesheet::where('exam_Id',$input['exam'])->where('cls_Id',$input['class'])->get();
                $totalMarks = 0;
                $ObtainMarks = 0;

                $data['datasheet']=$datasheet;

                foreach ($datasheet as $val){

                    $data['subjects'][$val->sub_Id]['name']=$val->subject?$val->subject->subject:'';
                    $data['subjects'][$val->sub_Id]['id']=$val->subject?$val->subject->sub_Id:'';

                    if($val->subject->subjectmarks){
                        //$totalMarks+= $val->subject->subjectmarks->sum('set_Total');
                        $data['subjects'][$val->sub_Id]['marklese'] = ExamSubjectMark::where('exam_Id',$input['exam'])->where('sub_Id',$val->sub_Id)->sum('set_Total');

                    }else{

                        $data['subjects'][$val->sub_Id]['marklese']=0;
                    }

                    if($data['subjects']){



                        foreach ($students as $val){


                            foreach ($data['subjects'] as $subject){

                                if(!empty($subject['id'])) {
                                    $data['studentmark'][$val->id][$subject['id']] = Marks_Obtain::where('exam_Id',$input['exam'])->where('subject_id', $subject['id'])
                                        ->where('sub_Id', $val->id)
                                        ->where('exam_Id', $data['exam']->exam_Id)->first();

                                    $consexam_Module = config('constants.exam_Module');
                                    $ocunt = 0;
                                    foreach ($consexam_Module as $key => $val2) {
                                        if (isset($data['studentmark'][$val->id][$subject['id']]->$val2) and $data['studentmark'][$val->id][$subject['id']]->$val2 != '') {
                                            $ocunt = (int)$data['studentmark'][$val->id][$subject['id']]->$val2 + $ocunt;

                                        }


                                    }

                                    if ($ocunt == 0) {
                                        $data['subjects'][$val->sub_Id]['obtainmarks'] = 'Not marked';
                                    } else {
                                        $data['studentmark'][$val->id][$subject['id']]['marks'] = $ocunt;
                                        $ObtainMarks += $ocunt;
                                        //dd($ObtainMarks);

                                    }


                                }
                            }



                        }







                    }

                }

 
                $data['grade'] = Grade::where('exam_Id',$input['exam'])->get();
                return view('reports.partails.class_progress_exame_reports', compact('data','school'))->render();


            }
            else if($report_type=='school_progress_report'){

                $datasheet = Datesheet::where('exam_Id',$request->exam)->get();
                $exam = Exam::where('exam_Id',$request->exam)->first();
                $classes = [];
                $year = explode('-', $request->session);
                $admission_no = School::select('school_abbreviation')->first();
                $admission_no = 'ADM-'.$admission_no->school_abbreviation . "-" . $year[0] . "-";
                $grades = Grade::where('exam_Id',$request->exam)->get();
                $examSub = [];
                foreach($datasheet as $key=>$val){

                    $classes[$val->cls_Id]=$val;
                    if(!isset($classes[$val->cls_Id]['student'])){
                        $class=$val->cls_Id;
                        $students = User::whereHas('roles', function ($q) {
                                        $q->where('name','Student');
                                    })->whereHas('student_sessions', function ($q2w) use ($year,$class) {
                                        $q2w->where('session_id', $year[0]);
                                        $q2w->where('class_id', $class);
                                    })->whereDoesntHave('withDraw')->get();
                          $classes[$val->cls_Id]['student']=$students ;  
                          //dd($year[0]);          

                    }else{
                         $classes[$val->cls_Id]['student']=$students ;
                    }


                    $classes[$val->cls_Id]['teacher']= $students ;



                    if(!isset($examSub[$val->cls_Id][$val->sub_Id])){
                        $class = AddClasses::where('cls_Id',$val->cls_Id)->first();                        
                        $totalmark= ExamSubjectMark::where('exam_Id',$request->exam)->where('sc_sec_Id',$class->sc_sec_Id)->where('sub_Id',$val->sub_Id)->sum('set_Total');
                        $set_pass_Per= ExamSubjectMark::where('exam_Id',$request->exam)->where('sc_sec_Id',$class->sc_sec_Id)->where('sub_Id',$val->sub_Id)->sum('set_pass_Per');                          
                       

                        foreach($classes[$val->cls_Id]['student'] as $valmark){
                            $obtaainMarks = Marks_Obtain::where('exam_Id',$request->exam)->where('subject_id',$val->sub_Id)->where('sub_Id',$valmark->id)->first();
                            $consexam_Module= config('constants.exam_Module');
                            $ocunt = 0;
                            foreach ($consexam_Module as $key=>$val2){
                                if(isset($obtaainMarks->$val2) and $obtaainMarks->$val2!='') {
                                    $ocunt = (int)$obtaainMarks->$val2 + $ocunt;

                                }


                            }

                            if(isset($examSub[$val->cls_Id][$valmark->id]['marks'])){
                               $examSub[$val->cls_Id][$valmark->id]['marks'] =$examSub[$val->cls_Id][$valmark->id]['marks']+$ocunt;
                            }else{
                                $examSub[$val->cls_Id][$valmark->id]['marks'] =$ocunt;
                            }

                            if(!isset($examSub[$val->cls_Id][$valmark->id]['grade'])){
                                $percentage = 0;
                                $gradess = '';
                                if ($examSub[$val->cls_Id][$valmark->id]['marks'] != 0){
                                    $percentage = ($examSub[$val->cls_Id][$valmark->id]['marks']/ $totalmark) * 100;
                                    foreach ($grades as $grade){
                                        if ($percentage >= $grade->grade_st_Per && $percentage <= $grade->grade_end_Per){
                                            $gradess = $grade->grade_Name;
                                           
                                        }

                                    }
                                }
                                $examSub[$val->cls_Id][$valmark->id]['grade'] =$gradess;
                            }else{

                                $examSub[$val->cls_Id][$valmark->id]['marks'] =$ocunt;
                                $percentage = 0;
                                $gradess = '';
                                if ($examSub[$val->cls_Id][$valmark->id]['marks'] != 0){
                                    $percentage = ($examSub[$val->cls_Id][$valmark->id]['marks']/ $totalmark) * 100;
                                     
                                    foreach ($grades as $grade){
                                        if ($percentage >= $grade->grade_st_Per && $percentage <= $grade->grade_end_Per){
                                            $grade = $grade->grade_Name;
                                        }
                                    }
                                }
                                $examSub[$val->cls_Id][$valmark->id]['grade'] =$gradess;                            
                            }                           
                        }
                    } 
                    $classes[$val->cls_Id]['name']=$val->class?$val->class->class:'';
                }


                if(isset($examSub)){
                    foreach ($examSub as $keys => $values) {
                        // code...
                    }
                }
                $data = [];
                $data['classes']=$classes;
                $data['exam']=$exam;
                $data['examSub']=$examSub;
                return view('reports.partails.school_progress_reports',compact('data','school'))->render();
            }

        }

    }

    public function feeReports(Request $request)
    {
        $data = [];
        $data['classes'] = AddClasses::all();
        return view('reports.fee.fee-reports',compact('data'));

    }

    public function feeReportsajax(Request $request)
    {

        
        $array_re =[
            'report_type' => 'required',
             
        ];

        
        if($request->report_type == 'student_fee_slip'){
            $array_re["adm_No"] = "required";
            $array_re["class"] = "required";
             
        }else if($request->report_type == 'student_fee_card'){
            $array_re["adm_No"] = "required";
            $array_re["class"] = "required";
             
        }else if($request->report_type == 'student_fee'){
            $array_re["adm_No"] = "required";
            $array_re["class"] = "required";
             
        }else if($request->report_type == 'class_wise_monthly_fee'){
             
            $array_re["class"] = "required";
             
        } 



        $validator =   Validator::make($request->all(),$array_re);

 
        
        if ($validator->fails() ) {
            return response()->json(['errors' => $validator->errors()]);
        
        }else{
           
           $data=[];


            if($request->report_type=='school_annual_fee'){
                $data['classes'] =AddClasses::all();
                $transactions = Transactions::whereYear('tr_Date','=',date('Y'))->where('char_id',1)->whereNotNull('std_Id')->get();
                foreach($transactions as $transaction){
                    $class= '';
                    if(isset($transaction->Student)){
                        $classes = $transaction->Student->student_session(date('Y'));
                        $class = $classes?$classes->class_id:'';
                    } 
                    $mont = explode("-",$transaction->month);
                    if(!isset($data[$mont[1]][$class])){
                       $data[$mont[1]][$class]=$transaction->dr_Amt;                         
                    }else{
                        $data[$mont[1]][$class]=$transaction->dr_Amt+$data[$mont[1]][$class];
                    }                   
                } 
                return view('reports.fee.partails.school_annual_fee',compact('data'))->render();
            }else if($request->report_type=='school_monthly_fee'){

                $data['school'] = School::first();
                $transactions = Transactions::whereMonth('tr_Date','=',date('m'))->where('char_id',1)->where('tr_Type',1)->whereNotNull('std_Id')->get();
                
                $recieved           = 0; 
                $total              = 0; 
                $due                = 0;
                $partial            = 0; 
                $paid               = 0;                
                $transactionslist   = [];
                $total_bill         = 0;
                $openbill           = 0;
                foreach ($transactions as $key => $value) {
                    $total_bill++;
                    $transactioniner= [];
                    if(isset($value->Student)){
                        $classes = $value->Student->student_session(date('Y'));
                        if($classes){
                            $transactioniner['class'] = $classes->class?$classes->class->class:''; 
                        }
                    }
                    if($value->tr_Status=='Partial'){
                        $partial++;
                    }
                    if($value->tr_Status=='Close'){
                        $paid++;
                    }
                    if($value->tr_Status=='Open'){
                        $openbill++;
                    }

                    $transactioniner['total']   = $value->dr_Amt;
                    $total                      = $transactioniner['total']+$total;
                    $transactioniner['recive']  = $value->dr_Amt-$value->bl_Amt;
                    $recieved                   = $transactioniner['recive']+$recieved;
                    $transactioniner['due']     = $value->bl_Amt;
                    $due                        = $transactioniner['due']+$due;
                    $transactioniner['date']    = date('Y-m-d',strtotime($value->tr_Date));
                    $transactioniner['s_no']    = $value->tr_Id;
                    $transactionslist[]         = $transactioniner;
                                        
                }
                $data['transactions']=$transactionslist;
                $data['recieved']=$recieved;
                $data['total']=$total;
                $data['due']=$due;
                $data['paid']=$paid;
                $data['partial']=$partial;
                $data['total_bill']=$total_bill;
                $data['openbill']=$openbill;
                return view('reports.fee.partails.school_monthly_fee' , compact('data'))->render();

            }else if($request->report_type=='class_wise_monthly_fee'){
                $class = $request->class;               
                $data['class'] = AddClasses::where('cls_Id',$class)->first();
                $transactions = Transactions::whereHas('User', function ($q) use ($class)  { 
                                    $q->whereHas('studentinfo',function ($q2) use ($class) {
                                        $q2->where('cls_Id',$class);
                                    });
                                })
                                ->whereNotNull('std_Id')
                                ->where('char_id',1)
                                ->where('tr_Type',1)
                                ->whereMonth('tr_Date','=',date('m'))
                                ->get(); 
                $data['school'] = School::first();
                $recieved           = 0; 
                $total              = 0; 
                $due                = 0; 
                $partial            = 0; 
                $paid               = 0;                
                $total_bill         = 0; 
                $openbill           = 0;
                $transactionslist   = [];
                foreach ($transactions as $key => $value) {
                    $total_bill++;
                    $transactioniner= [];
                    if(isset($value->Student)){
                        $classes = $value->Student->student_session(date('Y'));
                        if($classes){
                            $transactioniner['class'] = $classes->class?$classes->class->class:''; 
                        }
                    }
                    if($value->tr_Status=='Partial'){
                        $partial++;
                    }
                    if($value->tr_Status=='Close'){
                        $paid++;
                    }
                    if($value->tr_Status=='Open'){
                        $openbill++;
                    }
                    $transactioniner['total']       =       $value->dr_Amt;
                    $transactioniner['status']      =       $value->tr_Status;
                    $total                          =       $transactioniner['total']+$total;
                    $transactioniner['recive']      =       $value->dr_Amt-$value->bl_Amt;
                    $recieved                       =       $transactioniner['recive']+$recieved;
                    $transactioniner['due']         =       $value->bl_Amt;
                    $due                            =       $transactioniner['due']+$due;
                    $transactioniner['date']        =       date('Y-m-d',strtotime($value->tr_Date));
                    $transactioniner['id']          =       $value->Student?$value->Student->id:'';
                    $transactioniner['student']     =       $value->Student?$value->Student->name:'';
                    $transactionslist[]             =       $transactioniner;                                        
                }

                $data['transactions']=$transactionslist;
                $data['recieved']=$recieved;
                $data['total']=$total;
                $data['due']=$due;
                $data['paid']=$paid;
                $data['partial']=$partial;
                $data['total_bill']=$total_bill;
                $data['openbill']=$openbill;
                return view('reports.fee.partails.class_wise_monthly_fee',compact('data'))->render();
            


            }else if($request->report_type=='student_fee'){

                $class = $request->class;
                $admission_no = $request->adm_No;
                $Account_typesFees   = Chartofaccounts::where('acc_Name','Fees earned')->first();
                $Account_types_income   = Chartofaccounts::where('acc_parent',$Account_typesFees->acc_Id)->get();


                $data['student'] = User::whereHas('roles', function ($q) {
                    $q->where('name','Student');
                })->whereHas('studentinfo', function ($q2) use ($admission_no) {

                    if(!empty($admission_no)){
                        $q2->whereHas('admission',function ($q2w) use ($admission_no) {
                            if(!empty($admission_no)){
                                $q2w->where('adm_Number', $admission_no);
                            }
                        });
                    }
                })->first();


                $transactions = Transactions::whereHas('Student', function ($q) use ($class,$admission_no)  { 
                                     
                                                        $q->whereHas('studentinfo', function ($q2) use ($class,$admission_no) {
                                                        
                                                            if(!empty($class)){
                                                                $q2->where('cls_Id', $class);
                                                            }
                                                             if(!empty($admission_no)){ 
                                                                $q2->whereHas('admission',function ($q2w) use ($admission_no) {
                                                                        if(!empty($admission_no)){
                                                                           $q2w->where('adm_Number', $admission_no);
                                                                        }
                                                                    });
                                                            }       
                                                        });
                                                })

                                ->whereNotNull('std_Id')
                            
                                ->where('tr_Type',1)
                                ->whereMonth('tr_Date','=',date('m'))
                                ->get(); 
                    
                    $transactionslist = [];          
                    
                    if($transactions){

                        foreach ($transactions as $key => $value) {
                            

                            $month  = date('m', strtotime($value->tr_Date));

                            if($value->char_id==1 and $value->tr_Type==1){

                                if(isset($value[$month][$value->acc_Id]['cr_Amt'])){

                                    $transactionslist[$month][$value->acc_Id]['dr_Amt']=$value->dr_Amt+$transactionslist[$month][$value->acc_Id]['dr_Amt']; 
                                    
                                }else{
                                    $transactionslist[$month][$value->acc_Id]['dr_Amt']=$value->dr_Amt; 
                                }

                                $transactionslist[$month][$value->acc_Id]['receipt_no']= $value;


                            }else{


                                if(isset($value[$month][$value->acc_Id]['cr_Amt'])){

                                    $transactionslist[$month][$value->acc_Id]['cr_Amt']=$value->cr_Amt+$transactionslist[$month][$value->acc_Id]['cr_Amt']; 
                                    
                                }else{
                                    $transactionslist[$month][$value->acc_Id]['cr_Amt']=$value->cr_Amt; 
                                }

                                if(isset($value[$month][$value->acc_Id]['dr_Amt'])){

                                    $transactionslist[$month][$value->acc_Id]['dr_Amt']=$value->cr_Amt+$transactionslist[$month][$value->acc_Id]['dr_Amt']; 
                                    
                                }else{
                                    $transactionslist[$month][$value->acc_Id]['dr_Amt']=$value->cr_Amt; 
                                }
                            }




                        }
                             


 

                          
                    }    

                    $data['transactionslist']=$transactionslist;
                    $data['Account_types_income']=$Account_types_income;

                     
                return view('reports.fee.partails.student_fee',compact('data'))->render();


            } else if($request->report_type=='student_fee_card'){

                $class = $request->class;
                $admission_no = $request->adm_No;
                $Account_typesFees   = Chartofaccounts::where('acc_Name','Fees earned')->first();
                $Account_types_income   = Chartofaccounts::where('acc_parent',$Account_typesFees->acc_Id)->get();
                $data['student'] = User::whereHas('roles', function ($q) {
                    $q->where('name','Student');
                })->whereHas('studentinfo', function ($q2) use ($admission_no) {

                    if(!empty($admission_no)){
                        $q2->whereHas('admission',function ($q2w) use ($admission_no) {
                            if(!empty($admission_no)){
                                $q2w->where('adm_Number', $admission_no);
                            }
                        });
                    }
                })->first();

                $gardFather = '';
                if($data['student']){
                    $gardFather = $data['student']->studentinfo?$data['student']->studentinfo->father($data['student']->studentinfo->father_id):'';
                }
                $transactions = Transactions::whereHas('Student', function ($q) use ($class,$admission_no)  { 
                                     
                                                        $q->whereHas('studentinfo', function ($q2) use ($class,$admission_no) {
                                                        
                                                            if(!empty($class)){
                                                                $q2->where('cls_Id', $class);
                                                            }
                                                             if(!empty($admission_no)){ 
                                                                $q2->whereHas('admission',function ($q2w) use ($admission_no) {
                                                                        if(!empty($admission_no)){
                                                                           $q2w->where('adm_Number', $admission_no);
                                                                        }
                                                                    });
                                                            }       
                                                        });
                                                })

                                ->whereNotNull('std_Id')
                            
                                ->where('tr_Type',1)
                                ->whereMonth('tr_Date','=',date('m'))
                                ->get(); 
                    
                $transactionslist = [];          
                    
                if($transactions){
                    foreach ($transactions as $key => $value) {
                        

                        $month  = date('m', strtotime($value->tr_Date));

                        if($value->char_id==1 and $value->tr_Type==1){

                            if(isset($value[$month][$value->acc_Id]['cr_Amt'])){

                                $transactionslist[$month][$value->acc_Id]['dr_Amt']=$value->dr_Amt+$transactionslist[$month][$value->acc_Id]['dr_Amt']; 
                                
                            }else{
                                $transactionslist[$month][$value->acc_Id]['dr_Amt']=$value->dr_Amt; 
                            }

                            $transactionslist[$month][$value->acc_Id]['receipt_no']= $value;


                        }else{


                            if(isset($value[$month][$value->acc_Id]['cr_Amt'])){

                                $transactionslist[$month][$value->acc_Id]['cr_Amt']=$value->cr_Amt+$transactionslist[$month][$value->acc_Id]['cr_Amt']; 
                                
                            }else{
                                $transactionslist[$month][$value->acc_Id]['cr_Amt']=$value->cr_Amt; 
                            }

                            if(isset($value[$month][$value->acc_Id]['dr_Amt'])){

                                $transactionslist[$month][$value->acc_Id]['dr_Amt']=$value->cr_Amt+$transactionslist[$month][$value->acc_Id]['dr_Amt']; 
                                
                            }else{
                                $transactionslist[$month][$value->acc_Id]['dr_Amt']=$value->cr_Amt; 
                            }
                        }
                    }                                       
                }

                $data['transactionslist']=$transactionslist;
                $data['Account_types_income']=$Account_types_income;
                $data['school'] =   School::first();
                $data['class'] =   AddClasses::where('cls_Id',$request->class)->first();
                $issdate =date("Y-m");
                $issdatearr = explode("-",$issdate);
                $Fee_schedule = '';
                if($data['student']){
                    $Fee_schedule = Fee_schedule::where('std_Id',$data['student']->id)
                                        ->whereYear('fee_month', '=', $issdatearr[0])
                                        ->whereMonth('fee_month', '=', $issdatearr[1])
                                        ->first();
                }

                $data['tutionarray'] = [];                        
                if($Fee_schedule){
                    $accounts = json_decode($Fee_schedule->accounts);

                     if($accounts){
                        $i=0;
                         foreach($accounts as $key=>$val){
                            $vals = (array) $val;
                            if($i==0){
                                 $data['tutionarray'] = $vals["'amount'"];
                            }
                            $i++;
                         } 


                     } 
                }                        
                $data['gardFather']=$gardFather;
                return view('reports.fee.partails.student_fee_card' , compact('data'))->render();

            }else if($request->report_type=='student_fee_slip'){
                $class = $request->class;
                $admission_no = $request->adm_No;
                $data['class'] =   AddClasses::where('cls_Id',$request->class)->first();
                $month = $request->month;
                $data['student'] = User::whereHas('roles', function ($q) {
                    $q->where('name','Student');
                })->whereHas('studentinfo', function ($q2) use ($admission_no) {

                    if(!empty($admission_no)){
                        $q2->whereHas('admission',function ($q2w) use ($admission_no) {
                            if(!empty($admission_no)){
                                $q2w->where('adm_Number', $admission_no);
                            }
                        });
                    }
                })->first();

                $issdate =date("Y-").$request->month;
                $issdatearr = explode("-",$issdate);
                $Fee_schedule = [];
                if($data['student']){
                    $Fee_schedule = Fee_schedule::where('std_Id',$data['student']->id)
                                        ->whereYear('fee_month', '=', $issdatearr[0])
                                        ->whereMonth('fee_month', '=', $issdatearr[1])
                                        ->first();
                }



                $gardFather = '';
                if($data['student']){
                    $gardFather = $data['student']->studentinfo?$data['student']->studentinfo->father($data['student']->studentinfo->father_id):'';
                }
                $Account_typesFees   = Chartofaccounts::where('acc_Name','Fees earned')->first();
                $Account_types_income   = Chartofaccounts::where('acc_parent',$Account_typesFees->acc_Id)->get();
                $transactions = '';
                if($data['student']){ 
                    $transactions = Transactions::whereHas('Student', function ($q) use ($class,$admission_no)  { 
                                                        $q->whereHas('studentinfo', function ($q2) use ($class,$admission_no) {
                                                            if(!empty($class)){
                                                                $q2->where('cls_Id', $class);
                                                            }
                                                             if(!empty($admission_no)){ 
                                                                $q2->whereHas('admission',function ($q2w) use ($admission_no) {
                                                                        if(!empty($admission_no)){
                                                                           $q2w->where('adm_Number', $admission_no);
                                                                        }
                                                                    });
                                                            }       
                                                        });
                                                })
                                ->where('std_Id',$data['student']->id)
                                ->where('tr_Type',1)
                                ->whereMonth('tr_Date','=',$month)
                                ->get();
                }
                               
                    
                $transactionslist = [];          
                    
                if($transactions){
                    foreach ($transactions as $key => $value) {
                        
                        if($value->char_id==1 and $value->tr_Type==1){

                            if(isset($value[$value->acc_Id]['cr_Amt'])){
                                $transactionslist[$value->acc_Id]['dr_Amt']=$value->dr_Amt+$transactionslist[$value->acc_Id]['dr_Amt']; 
                            }else{
                                $transactionslist[$value->acc_Id]['dr_Amt']=$value->dr_Amt; 
                            }
                            $transactionslist[$value->acc_Id]['receipt_no']= $value;
                        }else{
                            if(isset($value[$value->acc_Id]['cr_Amt'])){
                                $transactionslist[$value->acc_Id]['cr_Amt']=$value->cr_Amt+$transactionslist[$value->acc_Id]['cr_Amt'];            
                            }else{
                                $transactionslist[$value->acc_Id]['cr_Amt']=$value->cr_Amt; 
                            }
                            if(isset($value[$value->acc_Id]['dr_Amt'])){
                                $transactionslist[$value->acc_Id]['dr_Amt']=$value->cr_Amt+$transactionslist[$value->acc_Id]['dr_Amt'];                                
                            }else{
                                $transactionslist[$value->acc_Id]['dr_Amt']=$value->cr_Amt; 
                            }
                        }
                    }                                       
                }

                $data['school'] =   School::first();
                $data['Fee_schedule']           =   $Fee_schedule;
                $data['gardFather']             =   $gardFather;
                $data['Account_types_income']   =   $Account_types_income;
                $data['transactionslist']       =   $transactionslist;
                $data['month'] = $request->month;
                return view('reports.fee.partails.student_fee_slip',compact('data'))->render();
            }
 
           
        }
    }

    

    public function accountReports(Request $request)
    {
 
        $array_re =[
            'report_type' => 'required',
            'session' => 'required',
        ];

        $validator =   Validator::make($request->all(),$array_re);
        
        if ($validator->fails() and $request->session) {
            return response()->json(['errors' => $validator->errors()]);
        
        }else{
           

            if($request->report_type=='incomeEXpenditure_table'){

                $Account_typesFees   = Chartofaccounts::where('acc_Name','Fees earned')->first();
                $Account_types_income   = Chartofaccounts::where('acc_parent',$Account_typesFees->acc_Id)->get();
                $transactions = Transactions::whereYear('tr_Date','=',$request->session)->get();
                $transactionslist = array(array(),  array());
                $payrollExpenence =Chartofaccounts::where('acc_Name','Payroll Expenses')->first();
                $accountName = Chartofaccounts::where('acc_Name','Account Receivables (AR)')->first();  

                if($transactions){
                    
                    foreach($transactions as $transaction){    
                        $month  = date('m', strtotime($transaction->tr_Date));
                        
                        if(isset($payrollExpenence) and $transaction->acc_Id==$payrollExpenence->acc_Id){

                            if(isset($transactionslist[$month][$transaction->acc_Id]['dr_Amt'])){

                                $transactionslist[$month][$transaction->acc_Id]['dr_Amt']=$transaction->dr_Amt+$transactionslist[$month][$transaction->acc_Id]['dr_Amt']; 

                            }else{
                                $transactionslist[$month][$transaction->acc_Id]['dr_Amt']=$transaction->dr_Amt; 
                            }

                           
                        } else if($transaction->acc_Id==$accountName->acc_Id){

                            
                             if(isset($transactionslist[$month][$transaction->acc_Id]['dr_Amt'])){

                                $transactionslist[$month][$transaction->acc_Id]['dr_Amt']=$transaction->dr_Amt+$transactionslist[$month][$transaction->acc_Id]['dr_Amt']; 

                            }else{
                                $transactionslist[$month][$transaction->acc_Id]['dr_Amt']=$transaction->dr_Amt; 
                            }

                            if(isset($transactionslist[$month][$transaction->acc_Id]['cr_Amt'])){

                                $transactionslist[$month][$transaction->acc_Id]['cr_Amt']=$transaction->cr_Amt+$transactionslist[$month][$transaction->acc_Id]['cr_Amt']; 
                                
                            }else{
                                $transactionslist[$month][$transaction->acc_Id]['cr_Amt']=$transaction->cr_Amt; 
                            }



                        }else if(isset($transactionslist[$month][$transaction->acc_Id]['sum'])){

                            $transactionslist[$month][$transaction->acc_Id]['sum']=$transaction->cr_Amt+$transactionslist[$month][$transaction->acc_Id]['sum']; 
                        }else{
                            $transactionslist[$month][$transaction->acc_Id]['sum']=$transaction->cr_Amt; 
                        }



                    }
                     


                } 

                return view('reports.accounts.partails.incomeEXpenditure_table',compact('Account_types_income','transactions','transactionslist','payrollExpenence','accountName'))->render();
            }else if($request->report_type=='account_list'){

                return view('reports.accounts.partails.account_list')->render();
            }
            else if($request->report_type=='trial_balance'){

                return view('reports.accounts.partails.trial_balance')->render();
            }else if($request->report_type=='balance_sheet'){

                return view('reports.accounts.partails.balance_sheet')->render();
            }else if($request->report_type=='transaction'){
                $date = date('Y-m-d');
                
                $transactions = Transactions::whereDate('tr_Date', '=', $date)->where('char_id',1)->get();
              


                return view('reports.accounts.partails.transaction',compact('transactions'))->render();
            }else if($request->report_type=='profit_loss'){

                $transactions = Transactions::whereYear('tr_Date','=',$request->session)->get();
                $transactionslist = array(array(),  array());
                $payrollExpenence =Chartofaccounts::where('acc_Name','Payroll Expenses')->first();
                $accountName = Chartofaccounts::where('acc_Name','Account Receivables (AR)')->first();  
                
                if($transactions){
                
                    foreach($transactions as $transaction){    
                        $month  = date('m', strtotime($transaction->tr_Date));
                        
                        if(isset($payrollExpenence) and $transaction->acc_Id==$payrollExpenence->acc_Id){

                            if(isset($transactionslist[$transaction->acc_Id]['dr_Amt'])){

                                $transactionslist[$transaction->acc_Id]['dr_Amt']=$transaction->dr_Amt+$transactionslist[$transaction->acc_Id]['dr_Amt']; 

                            }else{
                                $transactionslist[$transaction->acc_Id]['dr_Amt']=$transaction->dr_Amt; 
                            }

                           
                        }else if($transaction->acc_Id==$accountName->acc_Id){

                            
                             if(isset($transactionslist[$transaction->acc_Id]['dr_Amt'])){

                                $transactionslist[$transaction->acc_Id]['dr_Amt']=$transaction->dr_Amt+$transactionslist[$transaction->acc_Id]['dr_Amt']; 

                            }else{
                                $transactionslist[$transaction->acc_Id]['dr_Amt']=$transaction->dr_Amt; 
                            }

                            if(isset($transactionslist[$transaction->acc_Id]['cr_Amt'])){

                                $transactionslist[$transaction->acc_Id]['cr_Amt']=$transaction->cr_Amt+$transactionslist[$transaction->acc_Id]['cr_Amt']; 
                                
                            }else{
                                $transactionslist[$transaction->acc_Id]['cr_Amt']=$transaction->cr_Amt; 
                            }



                        }
                        




                    }
                     

                } 

                return view('reports.accounts.partails.profit_loss',compact('transactions','transactionslist','payrollExpenence','accountName','payrollExpenence'))->render();
            }else if($request->report_type=='journal'){

                    $transactions = Transactions::whereYear('tr_Date','=',$request->session)->where('char_id',1)->get();
                   
 

                return view('reports.accounts.partails.journal' , compact('transactions'))->render();
            }


            $sessions = Transactions::select(DB::raw('YEAR(tr_Date) as year'))->distinct()->get();

            return view('reports.accounts.accounts-reports' , compact('sessions'));
        }
    }


    // public function accountReports()
    // {
    //     return view('reports.account-reports');
    // }


}

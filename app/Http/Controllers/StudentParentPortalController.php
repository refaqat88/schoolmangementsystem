<?php

namespace App\Http\Controllers;

use App\Models\AssignSubjects;
use App\Models\Classsched;
use App\Models\Classwiseachievement;
use App\Models\ClasswiseAttendance;
use App\Models\Classwisebehaviour;
use App\Models\Day;
use App\Models\Diary;
use App\Models\Exam;
use App\Models\ExamPaper;
use App\Models\ExamSubjectMark;
use App\Models\Period;
use App\Models\Datesheet;
use App\Models\Marks_Obtain;

use App\Models\School;
use App\Models\Section;
use App\Models\StudyMaterial;
use App\Models\Syllabus;
use Illuminate\Http\Request;
use App\Models\StudentInfo;
use App\Models\AddClasses;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Redirect, Response;
use Auth;
use Carbon\Carbon;

class StudentParentPortalController extends Controller
{
    function __construct()
    {


    }

    public function parentstudentsportal(Request $request)
    {
        $achievements = '';
        $examlist  = [];
        $examstundent = '';
        $attendances = '';
        $behaviours = '';
        $scheduleList = '';
        $diaries ='';
        $study_materials ='';
        $examsyllabuses = '';
        $papers = '';
        $examname = '';
        $P ='';
        $A ='';
        $L = '';
        $LV= '';
        $request->stundet_id;
        $user = User::findOrFail($request->stundet_id);
        $class_id = $user->studentinfo?$user->studentinfo->cls_Id:'';
        $schoolclass_id = $user->studentinfo->class?$user->studentinfo->class->sc_sec_Id:'';

        $section_id = $user->studentinfo?$user->studentinfo->section_id:'';
        $studentrocrd = [];

        if($request->tabsType =='statistics'){
            $P = ClasswiseAttendance::where('std_Id',$request->stundet_id)->whereMonth('date_register', Carbon::now()->month)->where('attendance', "P")->count();
            $L = ClasswiseAttendance::where('std_Id',$request->stundet_id)->whereMonth('date_register', Carbon::now()->month)->where('attendance', "L")->count();
            $A = ClasswiseAttendance::where('std_Id',$request->stundet_id)->whereMonth('date_register', Carbon::now()->month)->where('attendance', "A")->count();
            $LV = ClasswiseAttendance::where('std_Id',$request->stundet_id)->whereMonth('date_register', Carbon::now()->month)->where('attendance', "H")->count();

        }
        if ($request->tabsType =='attendance'){
            $achievements = Classwiseachievement::where('std_Id', $request->stundet_id)->orderBy('date', 'desc')->get();
            $behaviours = Classwisebehaviour::where('std_Id', $request->stundet_id)->orderBy('date', 'desc')->get();
            $attendances= ClasswiseAttendance::where('cls_Id',$class_id)->where('c_section_Id',$section_id)->orderBy('date_register','desc')->get();
 
            foreach ($attendances as $attendance){

                if($attendance->std_Id==$user->id && !isset($studentrocrd[$attendance->date_register][$user->id])){
                    $studentrocrd[$attendance->date_register][$user->id] = $attendance->attendance;
                }else{
                    $studentrocrd[$attendance->date_register][$attendance->std_Id] ="A";
                }


            }
        }
        
        if ($request->tabsType =='homework'){
           $diaries = Diary::where('fk_std_Id', array($user->id))->orderBy('due_Date','desc')->get();
           $study_materials = StudyMaterial::where('fk_std_Id', array($user->id))->get();
        }
        /*if ($request->tabsType =='achievement') {

            $achievements = Classwiseachievement::where('std_Id', $request->stundet_id)->orderBy('date', 'desc')->get();
        }*/
        if ($request->tabsType =='exams') {
            $examsyllabuses = Syllabus::where('cls_Id', $class_id)->orderBy('syllabus_Id', 'desc')->get();
            $papers = ExamPaper::where('cls_Id', $class_id)->orderBy('exampaper_Id', 'desc')->get();
            $classofStudent = AddClasses::where('cls_Id',$class_id)->first();
            $c_section_id =  explode(",",$classofStudent->sc_sec_Id);
            $examstundent =Exam::where('sc_sec_Id',$schoolclass_id)->where('exam_Status','Active')->get();
            
            foreach ($examstundent as $val){
                $examlist[] = Exam::where('exam_Id',$val->top)->first();
            }

        }
        if ($request->tabsType =='schedule') {
            $classS = AddClasses::where('cls_Id',$class_id)->first();
            //dd($classS);
            $idsArr = explode(',',$classS->subject);

            $periods = Period::all();
            $days = Day::all();
            $scheduleList = [];
            $scheduleList['periods'] = $periods;
            $scheduleList['days'] = $days;
            $subjects_list = AssignSubjects::where(['cls_id'=>$class_id,'section_id'=>$section_id,'subject_id'=>$idsArr])->get();
            $teachers = [];
            $i=0;

            foreach($subjects_list as $teacher)
            {
                //dd($teacher->teacher->name);

                $teachers[$i]['name'] = $teacher->teacher->name;
                $teachers[$i]['id'] = $teacher->teacher->id;
                $i++;

            }

            $scheduleList['subjects'] = $subjects_list;
            $scheduleList['teachers'] = $teachers;
            $scheduleList['class'] = $class_id;
            $scheduleList['section'] = $section_id;
            $AddClassSched = Classsched::where(['cls_Id'=>$class_id, 'c_section_Id'=>$section_id])->first();

            $schudle_day = [];

            $mylist = [];


            if($AddClassSched)
            {



                $schudle_day =   $AddClassSched->listTeds;
                $mylist = [];
                $araay = [];



                foreach($periods as $val2){



                    foreach($days as $daysval){

                        foreach ($schudle_day as $key => $value) {

                            if($daysval->id==$value->day and $val2->id==$value->peroid){

                                $mylist[$val2->id][$daysval->id] =$value;

                                if($value->teachers){
                                    $mylist[$val2->id][$daysval->id]['teacher'] = $value->teachers->name;
                                }else{
                                    $mylist[$val2->id][$daysval->id]['teacher'] = '';
                                }


                                // code...
                            }
                        }



                        if(empty($mylist[$val2->id][$daysval->id])){
                            $mylist[$val2->id][$daysval->id]='';

                        }




                    }

                }






            }else{

                $schudle_day = [];
            }



            $scheduleList['list']  =$mylist;
            //dd($scheduleList['list']);



        }
       $tabsType =  $request->tabsType;
        return view('studentParentPortal.tabs.' . $request->tabsType, compact('behaviours','attendances','studentrocrd','achievements','examlist','scheduleList','diaries','study_materials','examsyllabuses','examname','papers','user','tabsType','examstundent','P','A','L','LV'))->render();

    }


    public function studentExamMarks(Request $request)
    {
        
        $data = []; 
        $data['user'] = User::findOrFail($request->id);
        $data['class'] = $data['user']->studentinfo ? $data['user']->studentinfo->class->class : '';
        $class_id = $data['user']->studentinfo ? $data['user']->studentinfo->cls_Id : '';
        $data['section'] = $data['user']->studentinfo ? $data['user']->studentinfo->section->class_section_name : '';
        $data['exam'] = Exam::where('exam_Id', $request->exam_Id)->first();
        $datesheets = Datesheet::where('exam_Id', $request->exam_Id)->where('cls_Id', $class_id)->get();
        $exam_Module = config('constants.exam_Module');
        $data['exam_Module']=$exam_Module;
        $data['datasheet']=[];
        
        if ($datesheets){
            
            foreach ($datesheets as $datesheet){
                $array = [];
                $array['subject'] = $datesheet->subject? $datesheet->subject->subject:'';
                
                $array['sub_Id'] = $datesheet->sub_Id;


                $ObtaiMarks =  Marks_Obtain::where('exam_Id',$request->exam_Id)->where('subject_id',$datesheet->sub_Id)->where('sub_Id',$request->id)->first();

 

                $ExamSubjectMark = ExamSubjectMark::where(['exam_id'=>$request->exam_Id, 'sc_sec_id' =>$request->sc_sec_id,'sub_Id' => $datesheet->sub_Id])->orderby('submarks_Id','asc')->sum('set_Total');
                $array['subject_marks']=$ExamSubjectMark;

                foreach( $exam_Module as $keyd=>$vald){
                    if($ObtaiMarks){
                        $array['marks'][$array['sub_Id']][]=$ObtaiMarks->$vald;
                    }else{
                        $array['marks'][$array['sub_Id']][]='';
                    }
                }

                $data['datasheet'][] = $array;

                if($ObtaiMarks){
                    $data['subjectmark'][$array['sub_Id']] =$ObtaiMarks;
                }else{
                    $data['subjectmark'][$array['sub_Id']] ='';

                }

            }



        }
        return Response::json($data);


    }
    public function ShowStudentDiary(Request $request)
    {


        //$diaryofStudent = DB::table('diary')->where('pk_diary_Id', $request->id)->where('',$request->student)->first();
        $diary = Diary::where('pk_diary_Id', $request->id)->where('fk_std_Id',$request->student)->first();
        //dd($diary);

        $diary->diaryType =  $diary->diaryType?$diary->diaryType->diary_type_Name:'';
        $diary->className =      $diary->class?$diary->class->class:'';
        $diary->classSection =    $diary->classsection?$diary->classsection->class_section_name:'';
        $diary->subjectName =    $diary->subject?$diary->subject->subject:'';

        $class_id = $diary->fk_cls_Id;
        $section_Id = $diary->fk_c_section_Id;
        //$studentsofdiary = explode(",",$diary->student);

        $studentData = User::whereHas('roles', function ($q) {
            $q->where('name','Student');
        })->whereHas('studentinfo', function ($q2) use($class_id,$section_Id) {
            $q2->where('cls_Id', $class_id);
            $q2->where('section_id', $section_Id);
        })->where('id', $request->student)->get();

        $studentInfo= [];

        $i= 0 ;
        foreach($studentData as $val){
            if ($val->id==$request->student){
                $studentInfo[$i]['name']    = $val->name;
                $studentInfo[$i]['status']  =   $diary->diary_Status;
                $studentInfo[$i]['id']  = $val->id;

            }
            $i++;
        }
        $diary->studentInfo = $studentInfo;
        return Response::json($diary);

    }

    public function SignStudentDiary(Request $request)
    {

        //dd($request->all());
        if ($request->get('status')=='Acknowledge'){
            $status = 'Not Acknowledge';
        }else if ($request->get('status')=='Not Acknowledge') {
            $status = 'Acknowledge';
        }

        $diary = [

            'diary_Status' => $status,
        ];
        Diary::where('pk_diary_Id', $request->id)->where('fk_std_Id', $request->student)->update($diary);
        return response()->json(['message' => 'Successfully Updated!']);

    }

    public function ShowStudentStudyMaterial(Request $request)
    {
        //$study_material =  DB::table('study_material')->where('pk_study_material_Id', $request->id)->whereRaw('FIND_IN_SET('.$request->student.',student)')->first();

        //DB::table('study_material')->where('pk_study_material_Id', $request->id)->whereRaw('FIND_IN_SET('.$request->student.',student)')->first();
        //dd($study_material);
        $study_material = StudyMaterial::where('pk_study_material_Id', $request->id)->where('fk_std_Id',$request->student)->first();
            //StudyMaterial::where('pk_study_material_Id', $study_material->pk_study_material_Id)->first();
        //dd($study_material);
        ///$study_material = StudyMaterial::findorFail($id);

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
        })->where('id', $request->student)->get();

        $studentInfo= [];

        $i= 0 ;
        foreach($studentData as $val){
            if ($val->id==$request->student) {
                $studentInfo[$i]['name'] = $val->name;
                $studentInfo[$i]['id'] = $val->id;
            }
            $i++;
        }
        $study_material->studentInfo = $studentInfo;
        return Response::json($study_material);

    }

    public function ShowStudentAttendance($id,$student_id)
    {
        //dd($student_id);
        $currentAttendInfo= ClasswiseAttendance::where('date_register',$id)->where('std_Id',$student_id)->first();


        $attendance= ClasswiseAttendance::where('cls_Id',$currentAttendInfo->cls_Id)->where('c_section_Id',$currentAttendInfo->c_section_Id)->where('std_Id',$currentAttendInfo->std_Id)->where('date_register',$currentAttendInfo->date_register)->get();
        //dd($attendance);
        $data = [];

        $attendance_of_class_section_students = User::whereHas('studentinfo', function ($q2) use ($currentAttendInfo) {
            $q2->where('cls_Id', $currentAttendInfo->cls_Id);
            $q2->where('section_id', $currentAttendInfo->c_section_Id);
            $q2->where('id', $currentAttendInfo->std_Id);

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

//
//        $Behav= Classwisebehaviour::where('cls_Id',$currentAttendInfo->cls_Id)->where('c_section_Id',$currentAttendInfo->c_section_Id)->where('date',$currentAttendInfo->date_register)->get();
//
//        $BehavArray = [];
//
//
//
//        if($Behav){
//
//            $configBehaviourType = config('constants.BehaviourType');
//            $configActivities = config('constants.Activities');
//            $configLocation = config('constants.Location');
//            $configStatus = config('constants.Status');
//
//
//            foreach($Behav as $back){
//
//                $array = [];
//                $array['name']=  $stlist[$back->std_Id]['name'];
//                $array['behaviour_type']=  $back->behaviour_type?$configBehaviourType[$back->behaviour_type]:'';
//                $array['activities']= $back->activities_id?$configActivities[$back->activities_id]:'';
//                $array['location']=  $back->location_id?$configLocation[$back->location_id]:'';
//                $array['status']=  $configStatus[$back->status];
//                $array['comments']=  $back->comments?$back->comments:'';
//                $BehavArray[] = $array;
//
//            }
//
//        }
//
//
//        /*
//                Acheimenet
//        */
//
//        $achievementRes= Classwiseachievement::where('cls_Id',$currentAttendInfo->cls_Id)->where('c_section_Id',$currentAttendInfo->c_section_Id)->where('date',$currentAttendInfo->date_register)->get();
//
//        $achievementarray = [];
//
//
//
//        if($achievementRes){
//
//            $configAchievement = config('constants.Achievement');
//            $configAchievementActivities = config('constants.AchievementActivities');
//
//
//
//            foreach($achievementRes as $achievementRe){
//
//                $array = [];
//                $array['name']=  $stlist[$achievementRe->std_Id]['name'];
//                $array['achievement_type']=  $achievementRe->achievement_type?$configAchievement[$achievementRe->achievement_type]:'';
//                $array['activities']=  $achievementRe->activities_id?$configAchievementActivities[$achievementRe->activities_id]:'';
//                $array['comments']=  $achievementRe->comments?$achievementRe->comments:'';
//                $achievementarray[] = $array;
//
//            }
//
//        }

        $data['attedence'] = $stlist;
//        $data['behavArray'] = $BehavArray;
//        $data['achievement'] = $achievementarray;
        $data['class'] = $currentAttendInfo->class?$currentAttendInfo->class->class:'';
        $data['section'] = $currentAttendInfo->section?$currentAttendInfo->section->class_section_name:'';
        $data['date_register'] = $currentAttendInfo->date_register;

        return Response::json($data);


    }
    public function ShowStudentAchievement (Request $request)
    {

       $currentAttendInfo= Classwiseachievement::where('date',$request->date)->where('std_Id',$request->std_Id)->first();

        $configAchievement = config('constants.Achievement');
        $configAchievementActivities = config('constants.AchievementActivities');

        $array = [];

        $array['achievement_type']=  $currentAttendInfo->achievement_type?$configAchievement[$currentAttendInfo->achievement_type]:'';
        $array['activities']=  $currentAttendInfo->activities_id?$configAchievementActivities[$currentAttendInfo->activities_id]:'';
        $array['comments']=  $currentAttendInfo->comments;


        return Response::json($array);


    }

    public function ShowStudentbehaviour (Request $request)
    {

        $currentAttendInfo= Classwisebehaviour::where('date',$request->date)->where('std_Id',$request->std_Id)->first();

        $configBehaviourType = config('constants.BehaviourType');
        $configActivities = config('constants.Activities');
        $configLocation = config('constants.Location');
        $configStatus = config('constants.Status');

        $array = [];

        $array['behaviour_type']=  $currentAttendInfo->behaviour_type?$configBehaviourType[$currentAttendInfo->behaviour_type]:'';
        $array['activities']= $currentAttendInfo->activities_id?$configActivities[$currentAttendInfo->activities_id]:'';
        $array['location']=  $currentAttendInfo->location_id?$configLocation[$currentAttendInfo->location_id]:'';
        $array['status']=  $configStatus[$currentAttendInfo->status];
        $array['comments']=  $currentAttendInfo->comments?$currentAttendInfo->comments:'';



        return Response::json($array);


    }


    Public function SchoolDetails(){

        $school = School::first();
        $user = User::findOrFail(Auth::user()->id);
        $role = $user->roles->first();
        $childrens = '';
        if ($role->name=='parents'){
            $parent_id = $user->guardianInfo?$user->guardianInfo->user_id:'';
            $students = StudentInfo::orWhere('father_id',$parent_id)->orWhere('mother_id',$parent_id)->get();
            $studentarray = [];
            foreach($students as $stud) {
                $studentarray[] = $stud->user_id;
            }
            $childrens = User::whereIn('id',$studentarray)->get();
            //dd($childrens);

        }
       //dd($school);
       return view('student.school-detail',compact('school', 'user','childrens','role'));
   }
   Public function StudentDetails(){

       return view('student.student-detail');
   }

}
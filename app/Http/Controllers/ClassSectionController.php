<?php

namespace App\Http\Controllers;

use App\Models\AssignSubjects;
use App\Models\ClassSection;
use App\Models\AddClasses;
use App\Models\EmployeeInfo;
use App\Models\User;
use App\Models\StudentInfo;
use App\Models\Subject;
use App\Models\Student_session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Redirect, Response;
use Illuminate\Support\Facades\Validator;


class ClassSectionController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:view-school', ['only' => ['index','show']]);


        $this->middleware('permission:add-admission', ['only' => ['create','store']]);

        $this->middleware('permission:edit-school', ['only' => ['edit','update']]);

        $this->middleware('permission:delete-school', ['only' => ['delete']]);
    }


    public function index()
    {
        
        $class_sections = ClassSection::all(); 
        
        $nameofclasses = AddClasses::all();
        
        $teachers = User::whereHas('roles', function ($q) {
            $q->where('name','Teacher');
        })->doesnthave('classEnrollements')->orderBy('id','desc')->get();
 
        return view('school.class-section', compact('nameofclasses', 'class_sections', 'teachers'));
    }


    public function create(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'class_name' => 'required',
            'class_section_name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'teacher' => 'required',
            
        ]);

        $students = $request->input('students')?implode(",", $request->input('students')):'';
        //dd($students);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

           
            $class_section = new ClassSection();
            $class_section->cls_Id = $request->get('class_name');
            $class_section->class_section_name = $request->get('class_section_name');
            $class_section->students = $students;
            $class_section->no_of_student = $request->get('no_of_student');
            $class_section->emp_Id = $request->get('teacher');
            $class_section->crep_Id = $request->get('representative');
            $class_section->save();
            //dd($class_section->c_section_Id);

            if($request['students']){
                foreach($request['students'] as $val){
                    
                    $form_data = array(
                        'section_id' => $class_section->c_section_Id,
                    );
                    
                    StudentInfo::where('user_id', $val)->update($form_data);


                    $sessions = date('Y');
                    $Student_session =Student_session::where('student_id',$val)->where('session_id',$sessions)->first();

                     if($Student_session==null)
                    {
                        $Student_session = new Student_session();
                    }

                
                    $Student_session->session_id=$sessions;
                    $Student_session->student_id=$val;
                    $Student_session->class_id=$request->class_name;
                    $Student_session->section_id=$class_section->c_section_Id;
                    
                    if($Student_session AND  $Student_session->id==''){
                        $Student_session->save();
                    }else{
                        $Student_session->update();
                    }


                }
            }

            return response()->json(['message' => 'Successfully Added!']);

        }
    }


    public function show($id)
    {


        $class_sections = ClassSection::where('c_section_Id',$id)->first();
        $class_sections->students = User::select('id','name')->whereIn('id',explode(',',$class_sections->students))->get();
        //dd($class_sections->students);
        $class_sections->teachers = $class_sections->teacher?$class_sections->teacher->name:'N/A'; 
        $class_sections->classs = $class_sections->class?$class_sections->class->class:'N/A'; 
        $class_sections->classreps = $class_sections->classRep?$class_sections->classRep->name:'N/A';



        // $where = array('c_section_Id' => $id);

        // $class_section = DB::table('class_section')
        //     ->select('class_section.class_section_name','class_section.no_of_student','class.class', 'employee_info.emp_given_name','student_info.std_Fname','student_info.std_Mname','student_info.std_Lname')
        //     ->leftjoin('class', 'class_section.cls_Id', '=', 'class.cls_Id')
        //     ->leftjoin('employee_info', 'class_section.emp_Id', '=', 'employee_info.emp_Id')
        //     ->leftjoin('student_info', 'class_section.crep_Id', '=', 'student_info.std_Id')
        //     ->where($where)->first();


        //dd($class_section);
        return Response::json($class_sections);

    }


    public function edit($id)
    {
        
        $where = array('c_section_Id' => $id);
        
        $class_sections = ClassSection::where($where)->first();
        //dd($class_sections);
        
        $class_section = [];
        
        $class_section['data'] = $class_sections;
           
        $class_sections->studentbyids = explode(',', $class_sections->students);
        
        // $class_section['list'] = StudentInfo::where('cls_Id', $class_sections->cls_Id)->where('section_id',$id)->get();  

        $class_id = $class_sections->cls_Id;
        
        
        
        $class_section['list']  = User::whereHas('roles', function ($q) {
            $q->where('name','Student');
        })->whereHas('studentinfo', function ($q2) use ($class_id,$id) {
            $q2->where('cls_Id', $class_id);
            $q2->where('section_id', $id);
            
        })->orderBy('name','asc')->get();

        //dd($class_section['list']);
         
        $studentInfolist = [];

        $i=0;

        foreach($class_section['list'] as $val){
        
            $studentInfolist[$i]['name']= $val->name;
           
            $studentInfolist[$i]['id']= $val->id;
           
            $i++;
        
        }


        $studentData = User::whereHas('roles', function ($q) {
            $q->where('name','Student');
        })->whereHas('studentinfo', function ($q2) use ($class_id,$id) {
            $q2->where('cls_Id', $class_id);
            
            $q2->where(function($query) use ($id) {
                                        $query->where('section_id',$id)
                                        ->orWhere('section_id',null);
            });
        })->get();


      
        
        $studentInfo= [];

        $i= 0 ; 
        
        foreach($studentData as $val){
        
            $studentInfo[$i]['name']= $val->name;
           
            $studentInfo[$i]['id']= $val->id;
           
            $i++;
        
        }


        $class_section['list_student']= $studentInfo;
        
        $class_section['list']= $studentInfolist;

        $class_section['classes'] = AddClasses::all();

        $class_section['teacher'] =  $class_sections->teacher;

        $teachers = User::whereHas('roles', function ($q) {
            $q->where('name','Teacher');
        })->doesnthave('classEnrollements')->Orwhere('id',$class_sections->teacher->id)->orderBy('id','desc')->get();


        $class_section['teacherlist'] =  $teachers;



        return Response::json($class_section);
    }


    public function update(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'class_name' => 'required',
            'class_section_name' => 'required',
             
            'teacher' => 'required',
             
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            
            if(!empty($request['students'])){
               $students =implode(",", $request['students']);
            }else{
                $students="";
            }

            $form_data = array(
                'cls_Id' => $request->class_name,
                'class_section_name' => $request->class_section_name,
                'students' => $students,
                'no_of_student' => $request->no_of_student,
                'emp_Id' => $request->teacher,
                'crep_Id' => $request->representative,
            );
            //dd($form_data);


            ClassSection::where('c_section_Id', $request->id)->update($form_data);

             $form_data = array(
                        'section_id' =>null
                    );

            StudentInfo::where(['cls_Id' => $request->class_name,'section_id'=>$request->id])->update($form_data); 
            

            if($request['students']){

                //dd($request['students']);
                
                $i=1;
                foreach($request['students'] as $val){
                    
                    $form_data = array(
                        'section_id' => $request->id,
                        'role_number' => $i
                    );


                    $sessions = date('Y');
                    $Student_session =Student_session::where('student_id',$val)->where('session_id',$sessions)->first();

                     if($Student_session==null)
                    {
                        $Student_session = new Student_session();
                    }

                
                    $Student_session->session_id=$sessions;
                    $Student_session->student_id=$val;
                    $Student_session->class_id=$request->class_name;
                    $Student_session->section_id=$request->id;
                    
                    if($Student_session AND  $Student_session->id==''){
                        $Student_session->save();
                    }else{
                        $Student_session->update();
                    }

                    
                    StudentInfo::where('user_id', $val)->update($form_data);
                $i++;
                }
            }

            $request->flash();
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function delete($id)
    {
        ClassSection::where('c_section_Id', $id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }


    /*

    
        get Class Section 

    */


     public function getClassSectin($id){


         $class_sections = ClassSection::where('cls_Id',$id)->get(); 

         return $class_sections;



     }  


    /*

    
        Get Class Section 

    
    */

     public function getSubjects($class_id,$section_id=''){

        $classS = AddClasses::where('cls_Id',$class_id)->first(); 

        $idsArr = explode(',',$classS->subject); 
        
        $subjects_list = Subject::whereIn('sub_Id',$idsArr)->get();
        //dd($subjects_list);
        return $subjects_list;

    }
    public function getClassSubjects($class_id,$section_id=''){

        $classS = AddClasses::where('cls_Id',$class_id)->first();

        $idsArr = explode(',',$classS->subject);

        $subjects_list = Subject::whereIn('sub_Id',$idsArr)->get();
        //dd($subjects_list);
        return $subjects_list;

    }

    public function getSubjectsByTeacher($class_id,$section_id){

        //DB::enableQueryLog();
        $subjects_list = AssignSubjects::where(['cls_Id'=> $class_id,'section_id'=> $section_id,'teacher_id'=> Auth::id()])->get();

        $subject = [];
        $i=0;
        foreach ($subjects_list as $val){

            $subject[$i]['name'] = $val->subject->subject;
            $subject[$i]['id'] = $val->subject_id;
            $i++;
        }

        return $subject;

    }

    public function getDiaryStudentByClass($class_id,$section_id)
    {

        $school_section_ajax = ClassSection::where(["cls_Id" => $class_id,"c_section_Id" => $section_id] )->first();

        $studentData = User::whereHas('roles', function ($q) {
            $q->where('name','Student');
        })->whereHas('studentinfo', function ($q2) use($class_id,$section_id) {
            $q2->where('cls_Id', $class_id);
            $q2->where('section_id', $section_id);

        })->whereDoesntHave('withDraw')->get();


        //dd($studentData);
        $studentInfo= [];

        $i= 0 ;
        foreach($studentData as $val){
            $studentInfo[$i]['name']= $val->name;
            $studentInfo[$i]['id']= $val->id;
            $i++;
        }


        return $studentData;

    }




      
}
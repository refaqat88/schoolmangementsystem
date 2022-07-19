<?php

namespace App\Http\Controllers;

use App\Models\AddClasses;
use App\Models\Datesheet;
use App\Models\EmployeeInfo;
use App\Models\ExamPaper;


use App\Models\ExamSubjectMark;
use App\Models\ExamType;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Exam;
use App\Models\Subject;
use App\Models\Syllabus;
use App\Models\School;
use App\Models\User;
use Carbon\Traits\Date;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\For_;
use Redirect, Response;
use File;


class ExaminerController extends Controller
{

    function __construct()
    {

        $this->middleware('permission:view-examiner', ['only' => ['index', 'show']]);


        $this->middleware('permission:add-examiner', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-examiner', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-examiner', ['only' => ['destroy']]);
    }
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

        return view('examiner.dashboard');
    }



     public function GetstudentBySession(Request $request)
    {

        $class_section = $request->section_id;
        $class = $request->class_id;

        $year = [];
         if ($request->session) {
            $year = explode('-', $request->session);
        }


        $data = [];

        $admission_no = School::select('school_abbreviation')->first();

        $admission_no = 'ADM-' . $admission_no->school_abbreviation . "-" . $year[0] . "-";

       
        $data['students'] = User::whereHas('roles', function ($q) {
            $q->where('name', 'Student');
        })

        ->whereHas('student_sessions',function ($q3) use ($class,$class_section) {

            $q3->where('class_id', $class);
            $q3->where('section_id', $class_section);

        }) 
        
        ->whereHas('studentinfo', function ($q2) use ($admission_no) {

            if (!empty($admission_no)) {

                $q2->whereHas('admission', function ($q2w) use ($admission_no) {

                    $q2w->where('adm_Number', 'like', '%' . $admission_no . '%');


                });
            }
        })->whereDoesntHave('withDraw')->get();
       
        //dd($exams);


        return $data;
    }



    public function GetExamBySession($year)
    {

        /// $year = [date('Y'),date('Y')+1];
        //dd($year);
        if ($year) {
            $year = explode('-', $year);
        }


        $data = [];

        $admission_no = School::select('school_abbreviation')->first();

        $admission_no = 'ADM-' . $admission_no->school_abbreviation . "-" . $year[0] . "-";

        $data['exam'] = Exam::whereYear('exam_Start', $year[0],)
            //->orwhereYear('exam_End',$year[1])
            ->where('top', 0)->get();

        $data['students'] = User::whereHas('roles', function ($q) {
            $q->where('name', 'Student');
        })->whereHas('studentinfo', function ($q2) use ($admission_no) {

            if (!empty($admission_no)) {
                $q2->whereHas('admission', function ($q2w) use ($admission_no) {

                    $q2w->where('adm_Number', 'like', '%' . $admission_no . '%');

                });
            }
        })->whereDoesntHave('withDraw')->get();

        //dd($exams);


        return $data;
    }



    public function GetClassByExam(Request $request)
    {
        $Exam = Exam::where('top',$request->id)->get();
         
        $data = [];
        if($Exam){
            
            $myClass= [];
            foreach ($Exam as $key => $value) {
                $adclass = AddClasses::where('sc_sec_Id',$value->sc_sec_Id)->first();
                if($adclass){
                    $myClass[] =  $adclass;
                }
                // code...
            }

          $data['class'] = $myClass;

           
        }
        return $data;
    }


    public function Examination(Request $request)
    {


        ///$syllabus = $request->ajax('syllabus');

        $school_sections = Section::all();
        $exam_types = ExamType::all();

        $classes = AddClasses::all();
        $subjects = Subject::all();


        if ($request->name == 'marks') {
            $setsubjectmarks = ExamSubjectMark::all();
            $array = [];
            $setMartsubject = [];
            foreach ($setsubjectmarks as $val) {
                if (!isset($array[$val->exam_Id][$val->sc_sec_Id][$val->sub_Id])) {
                    $array[$val->exam_Id][$val->sc_sec_Id][$val->sub_Id] = $val;
                    $setMartsubject[$val->submarks_Id] = $val;
                }
            }

            return view('examiner.partials.setmarks_data', compact('setMartsubject'))->render();

        } else {

            if ($request->exam_name || $request->school_section) {
                if ($request->exam_name=='all'){
                    $request->exam_name = '';
                }
                if ($request->school_section=='all'){
                    $request->school_section = '';
                }
                $query = ExamSubjectMark::query();

                if (!empty($request->exam_name) and $request->exam_name != 'all') {
                    $query = $query->where('exam_Id', $request->exam_name);
                }
                if (!empty($request->school_section) and $request->school_section != 'all') {
                    $query = $query->where('sc_sec_Id', $request->school_section);
                }

                $setsubjectmarks = $query->get();
                //$setsubjectmarks = ExamSubjectMark::where('exam_Id', $request->exam_name)->where('sc_sec_Id', $request->school_section)->get();
                $array = [];
                $setMartsubject = [];


                foreach ($setsubjectmarks as $val) {


                    if (!isset($array[$val->exam_Id][$val->sc_sec_Id][$val->sub_Id])) {

                        $array[$val->exam_Id][$val->sc_sec_Id][$val->sub_Id] = $val;
                        $setMartsubject[$val->submarks_Id] = $val;

                    }


                }
                return view('examiner.partials.setmarks_data', compact('setMartsubject'))->render();
            } else {
                $setsubjectmarks = ExamSubjectMark::all();
                $array = [];
                $setMartsubject = [];


                foreach ($setsubjectmarks as $val) {


                    if (!isset($array[$val->exam_Id][$val->sc_sec_Id][$val->sub_Id])) {

                        $array[$val->exam_Id][$val->sc_sec_Id][$val->sub_Id] = $val;
                        $setMartsubject[$val->submarks_Id] = $val;

                    }


                }
            }


        }


        if ($request->name == 'grade') {

            $examgrades = Exam::whereHas('grade')->get();

            return view('examiner.partials.grade_data', compact('examgrades'))->render();

        } else {
            if ($request->grade_exam_name) {

                if (!empty($request->grade_exam_name) and $request->grade_exam_name == 'all') {
                    $request->grade_exam_name = '';
                }
                $examgrades = Exam::whereHas('grade', function ($q) use ($request) {

                    if (!empty($request->grade_exam_name)) {
                        $q->where('exam_Id', $request->grade_exam_name);
                    }



                })->get();
                return view('examiner.partials.grade_data', compact('examgrades'))->render();
            } else {
                $examgrades = Exam::whereHas('grade')->get();
            }


        }


        if ($request->name == 'syllabus') {
            $syllabuses = Syllabus::all();

            //dd($syllabuses);
            return view('examiner.partials.syllabus_data', compact('syllabuses'))->render();

        } else {


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


                return view('examiner.partials.syllabus_data', compact('syllabuses'))->render();
            } else {
                $syllabuses = Syllabus::all();
            }
        }

        if ($request->name == 'paper') {
            $exam_papers = ExamPaper::all();
            return view('examiner.partials.paper_data', compact('exam_papers'))->render();
            //dd($exam_papers);
        } else {

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


                return view('examiner.partials.paper_data', compact('exam_papers'))->render();
            } else {
                $exam_papers = ExamPaper::all();
            }

        }

        if ($request->schedule_exam_name || $request->type) {

            if ($request->schedule_exam_name=='all'){
              $request->schedule_exam_name = '';
            }
            if ($request->type=='all'){
              $request->type = '';
            }
            $query = Exam::query();
            $query->where(['top' => 0, 'exam_Status' => 'Active']);
            if (!empty($request->schedule_exam_name) and $request->schedule_exam_name != 'all') {
                $query = $query->where('exam_Id', $request->schedule_exam_name);
            }

            if (!empty($request->type) and $request->type != 'all') {
                $query = $query->where('exm_typ_Id', $request->type);
            }

            $exams = $query->get();

            return view('examiner.partials.exam_data', compact('exams'))->render();
        } else {
            $exams = Exam::where('top', 0)->where('exam_Status', 'Active')->get();
        }


        if ($request->name == 'datesheet') {
            $datesheets = Exam::whereHas('datesheets')->get();
            return view('examiner.partials.datesheet_data', compact('datesheets'))->render();

        } else {
            //dd($request->datesheet_exam);
            if ($request->datesheet_exam){

                if ($request->datesheet_exam=='all'){
                    $request->datesheet_exam = '';
                }

                $query = Exam::query();
                $query->where(['top' => 0, 'exam_Status' => 'Active']);

                $query->whereHas('datesheets');
                if (!empty($request->datesheet_exam) and $request->datesheet_exam != 'all') {
                    $query = $query->where('exam_Id', $request->datesheet_exam);
                }
                $datesheets = $query->get();
                //dd($datesheets);
                return view('examiner.partials.datesheet_data', compact('datesheets'))->render();
            }else{
                $datesheets = Exam::whereHas('datesheets')->get();
            }




        }

        return view('examiner.examination', compact('school_sections', 'exams', 'exam_types', 'subjects', 'setsubjectmarks', 'examgrades', 'classes', 'syllabuses', 'exam_papers', 'datesheets', 'setMartsubject'));
    }

    public function CreateExam(Request $request)
    {
        //dd($request->exam_Status);
        $validator = Validator::make($request->all(), [
            'exam_Type' => 'required',
            'school_Section' => 'required',
            'exam_Name' => 'required',
            'exam_Start' => 'required',
            'exam_End' => 'required',
            'exam_Comment' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            //$schoolsection = implode(",", implode($request->school_Section));
            //dd($schoolsection);

            $exam = new Exam();
            $exam->exm_typ_Id = $request->get('exam_Type');

            $exam->exam_Name = $request->get('exam_Name');
            $exam->exam_Start = $request->get('exam_Start');
            $exam->exam_End = $request->get('exam_End');
            $exam->exam_Comment = $request->get('exam_Comment');
            $exam->exam_Status = $request->has('exam_Status') ? "Active" : 'Inactive';
            $exam->top = 0;
            $exam->save();
            $top = $exam->exam_Id;

            foreach ($request->post('school_Section') as $val) {


                $exam = new Exam();
                $exam->exm_typ_Id = $request->get('exam_Type');

                $exam->exam_Name = $request->get('exam_Name');
                $exam->exam_Start = $request->get('exam_Start');
                $exam->exam_End = $request->get('exam_End');
                $exam->sc_sec_Id = $val;
                $exam->exam_Comment = $request->get('exam_Comment');
                $exam->exam_Status = $request->has('exam_Status') ? "Active" : 'Inactive';
                $exam->top = $top;
                $exam->save();
            }

        }

        return response()->json(['message' => 'Successfully Added!']);


    }

    public function GetSyllabusClassSection($id)
    {
        //$exam = DB::table("exams")->where("exam_Id", $id)->pluck("exam_Id")->first();
        $school_section_ajax = DB::table("exams")->where("top", $id)->get();

        //$school_section_ajax = explode(",", $school_section_ajax);

        $data = [];
        foreach ($school_section_ajax as $school_section) {

            $data[] = $school_section->sc_sec_Id;

        }
        //echo "<pre>"; print_r($data);
        $class_by_school_section_ajax = DB::table("class")->whereIn("sc_sec_Id", $data)->get();

        return json_encode($class_by_school_section_ajax);
    }

    public function GetSubjectBySection($id)
    {
        $school_classes = AddClasses::where('sc_sec_Id', $id)->get();
        $data[] = '';
        $data1[] = '';
        $subjectarray = [];
        foreach ($school_classes as $class) {

            $subjectlist = explode(",", $class->subject);

            foreach ($subjectlist as $cal) {


                $subjectarray[$cal] = $cal;


            }
            //echo "<pre>"; print_r($class->cls_Id);


        }

        //dd($subjectarray);


        $subject_by_school_section_ajax = Subject::whereIn("sub_Id", $subjectarray)->get();
        //dd($subject_by_school_section_ajax);
        return json_encode($subject_by_school_section_ajax);
    }

    public function GetSchoolSection($id)
    {
        $school_section_ajax = Exam::where("exam_Id", $id)->first();

        $sections = $school_section_ajax->exaSection($school_section_ajax->exam_Id);
        $secaray = [];
        foreach ($sections as $key => $sc) {
            $secaray[$sc->schoolSection->sc_sec_Id] = $sc->schoolSection ? $sc->schoolSection->sc_sec_name : '';
        }


        $school_section_ajax->school_section_ajax = $secaray;


        return json_encode($school_section_ajax);
    }

    public function getSetmarksData($subject_Id, $exam_Id, $section_Id)
    {
        $setmarks = ExamSubjectMark::where(['exam_id' => $exam_Id, 'sc_sec_Id' => $section_Id, 'sub_Id' => $subject_Id])->get();
        //dd($setmarks);
        return json_encode($setmarks);
    }

    public function CreateSetMarks(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'exam_type' => 'required',
            'school_section' => 'required',
            'subject' => 'required',
            'module' => 'required',
            'total_marks' => 'required',
            'percentage' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            ExamSubjectMark::where(['exam_id' => $request->exam_type, 'sc_sec_Id' => $request->school_section, 'sub_Id' => $request->subject])->delete();
            $i = 0;
            foreach ($request->module as $key => $value) {

                $exam_setmarks = new ExamSubjectMark();
                $exam_setmarks->exam_Id = $request->exam_type;
                $exam_setmarks->sc_sec_Id = $request->school_section;
                $exam_setmarks->sub_Id = $request->subject;
                $exam_setmarks->exam_Module = $request->module[$i];
                $exam_setmarks->set_Total = $request->total_marks[$i];
                $exam_setmarks->set_pass_Per = $request->percentage[$i];


                if ($request->module[$i]) {
                    $exam_setmarks->save();
                }
                $i++;
            }

            return response()->json(['message' => 'Successfully Added!']);

        }

    }

    public function UpdateSetMarks(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'exam_type' => 'required',
            'school_section' => 'required',
            'subject' => 'required',
            'module' => 'required',
            'total_marks' => 'required',
            'percentage' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            $count = count($request->module);
            if ($count > 0) {
                $data[] = array("module" => $request->module[0], "theory" => $request->total_marks[0], "percentage" => $request->percentage[0]);
            }

            if ($count > 1) {
                $data[] = array("module" => $request->module[1], "theory" => $request->total_marks[1], "percentage" => $request->percentage[1]);
            }
            if ($count > 2) {
                $data[] = array("module" => $request->module[2], "theory" => $request->total_marks[2], "percentage" => $request->percentage[2]);
            }

            if ($count > 3) {
                $data[] = array("module" => $request->module[3], "theory" => $request->total_marks[3], "percentage" => $request->percentage[3]);
            }
            if ($count > 4) {
                $data[] = array("module" => $request->module[4], "theory" => $request->total_marks[4], "percentage" => $request->percentage[4]);
            }

            if ($count > 5) {
                $data[] = array("module" => $request->module[5], "theory" => $request->total_marks[5], "percentage" => $request->percentage[5]);
            }

            $serialized_setmarks_array = serialize($data);

            //dd($serialized_setmarks_array);
            $exam_setmarks = [
                'exam_Id' => $request->get('exam_type'),
                'sc_sec_Id' => $request->get('school_section'),
                'sub_Id' => $request->get('subject'),
                'set_marks' => $serialized_setmarks_array,
            ];
            ExamSubjectMark::where('submarks_Id', $request->id)->update($exam_setmarks);
            return response()->json(['message' => 'Successfully Updated!']);
            //return redirect('add-subject')->with('message', 'Successfully Added!');
        }


        // return redirect('add-subject')->with('message', 'Successfully Added!');;
        ///
        //return redirect()->back()->with('message', 'Successfully Added!');


    }

    public function UpdateExam(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'exam_Type' => 'required',
            'school_Section' => 'required',
            'exam_Name' => 'required',
            'exam_Start' => 'required',
            'exam_End' => 'required',
            'exam_Comment' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            $form_data = array(
                'exm_typ_Id' => $request->get('exam_Type'),
                'exam_Name' => $request->get('exam_Name'),
                'exam_Start' => $request->get('exam_Start'),
                'exam_End' => $request->get('exam_End'),
                'exam_Comment' => $request->get('exam_Comment'),
                'exam_Status' => $request->get('exam_Status') ? "Active" : 'Inactive',
            );
            Exam::where('exam_Id', $request->id)->update($form_data);


            $top = $request->id;

            foreach ($request->post('school_Section') as $val) {


                $sec = Exam::where(['top' => $request->id, 'sc_sec_Id' => $val])->first();

                if (empty($sec)) {
                    $sec = new Exam();
                }

                $sec->exm_typ_Id = $request->get('exam_Type');
                $sec->exam_Name = $request->get('exam_Name');
                $sec->exam_Start = $request->get('exam_Start');
                $sec->exam_End = $request->get('exam_End');
                $sec->sc_sec_Id = $val;
                $sec->exam_Comment = $request->get('exam_Comment');
                $sec->exam_Status = $request->get('exam_Status') ? "Active" : 'Inactive';
                $sec->top = $request->id;

                if ($sec AND $sec->exam_Id != '') {
                    $sec->update();
                } else {

                    $sec->save();
                }
            }


            $request->flash();
            return response()->json(['message' => 'Successfully Updated!']);
        }
    }


    public function EditExam($id)
    {


        $where = array('exam_Id' => $id);

        $exam = Exam::where($where)->first();

        $exam->selectedSchoolSectionIds = $exam->exaSection($exam->exam_Id);

        return Response::json($exam);

    }

    public function DeleteExam($id)
    {
        $where = array('exam_Id' => $id);
        $top = array('top' => $id);
        Exam::where($where)->delete();
        Exam::where($top)->delete();

        return response()->json(['message' => 'Successfully Deleted!']);
    }

    public function EditSetMarks($id)
    {
        $EditSetMarks = ExamSubjectMark::findorFail($id);

        return Response::json($EditSetMarks);

    }


    public function ShowSetMarks(Request $request)
    {


        $setsubjectmarks = ExamSubjectMark::where('exam_Id', $request->exam_Id)->where('sc_sec_Id', $request->sc_sec_Id)->where('sub_Id', $request->sub_Id)->get();

        $data = [];

        $data['list_mark'] = $setsubjectmarks;
        $data['examname'] = $request->examname;
        $data['schoolsectionname'] = $request->schoolsectionname;
        $data['subjectname'] = $request->subjectname;

        return Response::json($data);

    }

    public function DeleteSetMarks(Request $request)
    {
        $setsubjectmarks = ExamSubjectMark::where('exam_Id', $request->exam_Id)->where('sc_sec_Id', $request->sc_sec_Id)->where('sub_Id', $request->sub_Id)->delete();

        return response()->json(['message' => 'Successfully Deleted!']);
    }


    public function ShowExam($id)
    {

        $where = array('exam_Id' => $id);

        $exam = Exam::where($where)->first();

        $exam->Examtype = $exam->type ? $exam->type->exm_typ_Name : '';

        $exam->selectedSchoolSectionIds = $exam->exaSection($exam->exam_Id);
        $section_id[] = '';
        foreach ($exam->selectedSchoolSectionIds as $val) {
            $section_id[] = $val->sc_sec_Id;
        }

        $exam->section = Section::whereIn('sc_sec_Id', $section_id)->get();

        return Response::json($exam);

    }


    /*--------------------------------set grades code-------------------------*/
    public function CreateSetGrades(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'exam_name' => 'required',
            'exam_grade' => 'required',
            'from_percentage' => 'required',
            'to_percentage' => 'required',
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            $exam = Grade::where('exam_Id', $request->get('exam_name'))->delete();
            $i = 0;
            foreach ($request->exam_grade as $key => $value) {

                $exam_set_grades = new Grade();

                $exam_set_grades->exam_Id = $request->get('exam_name');
                $exam_set_grades->grade_Name = $request->exam_grade[$i];
                $exam_set_grades->grade_st_Per = $request->from_percentage[$i];
                $exam_set_grades->grade_end_Per = $request->to_percentage[$i];
                $exam_set_grades->comment = $request->comment[$i];
                if ($request->exam_grade[$i]) {
                    $exam_set_grades->save();
                }
                $i++;


            }

            return response()->json(['message' => 'Successfully Added!']);

        }


    }


    public function UpdateSetGrades(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'exam_name' => 'required',
            'exam_grade' => 'required',
            'from_percentage' => 'required',
            'to_percentage' => 'required',
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            $exam = Grade::where('exam_Id', $request->id)->delete();
            $i = 0;
            foreach ($request->exam_grade as $key => $value) {
                $exam_set_grades = new Grade();
                $exam_set_grades->exam_Id = $request->get('exam_name');
                $exam_set_grades->grade_Name = $request->exam_grade[$i];
                $exam_set_grades->grade_st_Per = $request->from_percentage[$i];
                $exam_set_grades->grade_end_Per = $request->to_percentage[$i];
                $exam_set_grades->comment = $request->comment[$i];
                $exam_set_grades->save();
                $i++;

            }
            return response()->json(['message' => 'Successfully Updated!']);

        }

    }

    public function CheckExamGrades($id)
    {
        $exams = Exam::findorFail($id);
        $exams->setgrade = $exams->grade ? $exams->grade : '';
        return Response::json($exams);
    }

    public function ShowSetGrades($id)
    {

        $exams = Exam::findorFail($id);
        $exams->setgrade = $exams->grade ? $exams->grade : '';
        return Response::json($exams);

    }

    public function EditSetGrades($id)
    {
        $exams = Exam::findorFail($id);
        $exams->setgrade = $exams->grade ? $exams->grade : '';
        return Response::json($exams);

    }

    public function DeleteSetGrades($id)
    {

        Grade::where('exam_Id', $id)->delete();
        return response()->json(['message' => 'Successfully Deleted!']);
    }
    /*--------------------------------set grades code-------------------------*/

    /*--------------------------------set syllabus code start-------------------------*/
    public function CreateExamSyllabus(Request $request)
    {
        //dd($request->file());
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

        $where = array('syllabus_Id' => $id);
        $syllabus = Syllabus::where($where)->first();

        $school_section_ajax = DB::table("exams")->where("top", $syllabus->exam_Id)->get();

        //$school_section_ajax = explode(",", $school_section_ajax);

        $data = [];
        foreach ($school_section_ajax as $school_section) {

            $data[] = $school_section->sc_sec_Id;

        }
        //echo "<pre>"; print_r($data);
        $syllabus->classes = DB::table("class")->whereIn("sc_sec_Id", $data)->get();
        //$syllabus = DB::table('syllabus')
        //sz->join('exams', 'syllabus.exam_Id', '=', 'exams.exam_id')->where($where)->first();

        //$exam->selectedSchoolSectionIds = explode(',',$exam->school_section);

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

        $where = array('exampaper_Id' => $id);
        $examPaper = ExamPaper::where($where)->first();
        //DB::table('syllabus')
        //->join('exams', 'syllabus.exam_Id', '=', 'exams.exam_id')->where($where)->first();

        //$exam->selectedSchoolSectionIds = explode(',',$exam->school_section);

        return Response::json($examPaper);

    }

    public function UpdateExamPaper(Request $request)
    {
        //dd($request->all());
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


    /*------------------------------Date sheet code start----------------------------------*/
    function getDatesFromRange($start, $end)
    {
        $dates = array($start);
        while (end($dates) < $end) {
            $dates[] = date('Y-m-d', strtotime(end($dates) . ' +1 day'));
        }
        return $dates;
    }


    public function GetExamDates($id)
    {
        $exam_date_ajax = DB::table("exams")->where("exam_Id", $id)->first();

        $period = $this->getDatesFromRange($exam_date_ajax->exam_Start, $exam_date_ajax->exam_End);

        $exam_date_ajax->period = $period;
        return json_encode($exam_date_ajax);
    }

    public function getDatesheetData($id)
    {

        $datesheet = Datesheet::where('exam_Id', $id)->get();
        $exam_Id = '';
        $data = [];
        $class = AddClasses::all();
        $classs_array = [];
        if ($datesheet != null) {

            foreach ($datesheet as $key => $exam) {
                $classs_array[$exam->cls_Id] = $exam->cls_Id;
            }

            foreach ($classs_array as $key => $valsss) {

                $clasFirstr = AddClasses::where('cls_Id', $valsss)->first();
                $classs_array[$valsss] = Subject::whereIn('sub_Id', explode(",", $clasFirstr->subject))->get();

            }
        }


        if ($datesheet != null) {
            foreach ($datesheet as $key => $exam) {

                foreach ($class as $valClass) {


                    if ($exam->cls_Id == $valClass->cls_Id) {

                        $data[$exam->date][$exam->cls_Id][$exam->sub_Id] = $valClass->cls_Id;

                    }


                }


            }

        }


        $exam = Exam::where("exam_Id", $id)->first();

        $dataRange = $this->getDatesFromRange($exam->exam_Start, $exam->exam_End);
        $school_section_ajax = DB::table("exams")->where("top", $id)->get();
        $data = [];
        foreach ($school_section_ajax as $school_section) {

            $data[] = $school_section->sc_sec_Id;

        }
        //dd($data);
        $class_by_school_section_ajax = DB::table("class")->whereIn("sc_sec_Id", $data)->get();

        $data['classes'] = $class_by_school_section_ajax;
        //$data['classes'] = AddClasses::all();


        $data['subject'] = $classs_array;


        $data['date'] = $dataRange;
        $data['datesheet'] = $datesheet;

        //dd($data);
        return Response::json($data);
    }

    public function CreateDatSheet(Request $request)
    {

        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'exam' => 'required',
            'date' => 'required',
            'class' => 'required',
            'subject' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            Datesheet::where('exam_Id', $request->exam)->delete();
            $i = 0;
            foreach ($request->date as $key => $value) {

                $datesheet = new Datesheet();

                $datesheet->exam_Id = $request->exam;
                $datesheet->date = $request->date[$i];
                $datesheet->cls_Id = $request->class[$i];
                $datesheet->sub_Id = $request->subject[$i];
                $datesheet->start_time = $request->start_time[$i];
                $datesheet->end_time = $request->end_time[$i];


                if ($request->date[$i]) {
                    $datesheet->save();
                }
                $i++;


            }

            return response()->json(['message' => 'Successfully Added!']);

        }

    }

    public function ShowDateSheet($id)
    {

        //dd($id);
        $class = AddClasses::all();
        $classArray = [];
        $i = 0;
        foreach ($class as $val) {
            $classArray[$i]['cls_Id'] = $val->cls_Id;
            $classArray[$i]['name'] = $val->class;
            $i++;

        }

        $datesheet = Datesheet::where('exam_Id', $id)->get();
        //dd($datesheet);
        $datesheets = [];


        foreach ($datesheet as $vals) {

            if (!isset($datesheets[$vals->date][$vals->cls_Id][$vals->sub_Id])) {
                $datesheets[$vals->date][$vals->cls_Id][$vals->sub_Id] = $vals->subject ? $vals->subject->subject . '/' . $vals->start_time . '/' . $vals->end_time : '';
            } else {
                $datesheets[$vals->date][$vals->cls_Id][$vals->sub_Id] = '';
            }
            //echo "<pre>"; print_r($datesheets[$vals->date][$val->cls_Id][$vals->sub_Id]);
        }
        $data = [];
        $data['datesheet'] = $datesheets;
        $data['class'] = $classArray;
        return Response::json($data);

    }

    public function EditDateSheet($id)
    {

        $where = array('dsheet_Id' => $id);
        $examsheet = Datesheet::where($where)->first();
        $serialized_datesheet_array = $examsheet->date_sheet;
        $unserialized_datesheet_array = unserialize($serialized_datesheet_array);
        $examsheet->unserialized_datesheet_array = $unserialized_datesheet_array;

        return Response::json($examsheet);

    }

    public function UpdateDateSheet(Request $request)
    {
        //dd($request->all());
        //$count = count($request->date);
        //dd($count);
        $validator = Validator::make($request->all(), [
            'exam' => 'required',
            'date' => 'required',
            'class' => 'required',
            'subject' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            //$count = count($request->date);
            $i = 0;
            $count = count($request->date);
            //$count = $count-1;
            while ($i < $count) {

                $data[] = array("date" => $request->date[$i], "class" => $request->class[$i], "subject" => $request->subject[$i], "start_time" => $request->start_time[$i], "end_time" => $request->end_time[$i]);
                $i++;
            }
            //dd($data);
            /*    if ($count > 0) {
                     $data[] = array("date" => $request->date[0], "class" => $request->class[0], "subject" => $request->subject[0], "start_time" => $request->start_time[0], "end_time" => $request->end_time[0]);
                 }
                 if ($count > 1) {
                     $data[] = array("date" => $request->date[1], "class" => $request->class[1], "subject" => $request->subject[1], "start_time" => $request->start_time[1], "end_time" => $request->end_time[1]);
                 }
                 if ($count > 2) {
                     $data[] = array("date" => $request->date[2], "class" => $request->class[2], "subject" => $request->subject[2], "start_time" => $request->start_time[2], "end_time" => $request->end_time[2]);
                 }
                 if ($count > 3) {
                     $data[] = array("date" => $request->date[3], "class" => $request->class[3], "subject" => $request->subject[3], "start_time" => $request->start_time[3], "end_time" => $request->end_time[3]);
                 }
                 if ($count > 4) {
                     $data[] = array("date" => $request->date[4], "class" => $request->class[4], "subject" => $request->subject[4], "start_time" => $request->start_time[4], "end_time" => $request->end_time[4]);
                 }
                 if ($count > 5) {
                     $data[] = array("date" => $request->date[5], "class" => $request->class[5], "subject" => $request->subject[5], "start_time" => $request->start_time[5], "end_time" => $request->end_time[5]);
                 }
                 if ($count > 6) {
                     $data[] = array("date" => $request->date[6], "class" => $request->class[6], "subject" => $request->subject[6], "start_time" => $request->start_time[6], "end_time" => $request->end_time[6]);
                 }
                 if ($count > 7) {
                     $data[] = array("date" => $request->date[7], "class" => $request->class[7], "subject" => $request->subject[7], "start_time" => $request->start_time[7], "end_time" => $request->end_time[7]);
                 }
                 if ($count > 8) {
                     $data[] = array("date" => $request->date[8], "class" => $request->class[8], "subject" => $request->subject[8], "start_time" => $request->start_time[8], "end_time" => $request->end_time[8]);
                 }
                 if ($count > 9) {
                     $data[] = array("date" => $request->date[9], "class" => $request->class[9], "subject" => $request->subject[9], "start_time" => $request->start_time[9], "end_time" => $request->end_time[9]);
                 }
                 if ($count > 10) {
                     $data[] = array("date" => $request->date[10], "class" => $request->class[10], "subject" => $request->subject[10], "start_time" => $request->start_time[10], "end_time" => $request->end_time[10]);
                 }*/

            $serialized_datesheet_array = serialize($data);

            $datesheet_array = [
                'exam_Id' => $request->exam,
                'date_sheet' => $serialized_datesheet_array,
            ];

            Datesheet::where('dsheet_Id', $request->id)->update($datesheet_array);
            $request->flash();
            return response()->json(['message' => 'Successfully Updated!']);
            //return redirect('add-subject')->with('message', 'Successfully Added!');
        }

    }

    public function DeleteDateSheet($id)
    {
        $where = array('exam_Id' => $id);
        Datesheet::where($where)->delete();
        return response()->json(['message' => 'Successfully Deleted!']);
    }

    /*------------------------------Date sheet code end----------------------------------*/

    public function ExaminerProfile()
    {
        //dd(session()->all()
    }

    public function editProfile()
    {

    }

    public function ProfileUpdate(Request $request)
    {


    }
}

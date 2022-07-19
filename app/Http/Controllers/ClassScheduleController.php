<?php

namespace App\Http\Controllers;


use App\Models\Classsched;
use App\Models\ClassSection;
use App\Models\Period;
use App\Models\Subject;
use App\Models\AddClasses;
use App\Models\employeeinfo;
use App\Models\Section;
use App\Models\AddClassSched;

use App\Models\AssignSubjects;
use App\Models\User;
use App\Models\Day;
use App\Models\ClassschedDays;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class ClassScheduleController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:view-schedule|add-schedule|edit-schedule|delete-schedule', ['only' => ['index','show']]);


        $this->middleware('permission:add-schedule', ['only' => ['store']]);
        $this->middleware('permission:edit-schedule', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-schedule', ['only' => ['delete']]);
    }

    public function ClassSectionByClass($id){
        $where = array('cls_Id' => $id);
        $ClassScheduleSection = DB::table('class_section')
                        ->where($where)->get();
        //dd($ClassScheduleSection);

        return Response::json($ClassScheduleSection);
    }

    public function TeacherAvailabilityCheck(Request $request){


        $class_schedule = ClassschedDays::  where('emp_Id',$request->id)
                                            ->where('day',$request->days)
                                            ->where('time_start','<=', $request->start)
                                            ->where('time_end','>=', $request->end)
                                            ->get();




        $data = [];
        if($class_schedule->count()) {

            $data['visibility'] = 'Busy';

        }

        return Response::json($data);
    }

    public function ClassScheduleCheckBySection(Request $request){
        //dd($request->all());
        $ClassScheduleSection = Classsched::where(['cls_Id' => $request->class,'c_section_Id' => $request->section])->get();
        //dd($ClassScheduleSection);
        $ClassSubject = AddClasses::where('cls_Id', $request->class)->first();


        $subject = Subject::whereIn('sub_Id', explode("," , $ClassSubject->subject))->get();

        $scheduledata = [];
        $scheduledata['subject'] = $subject;
        //$scheduledata['periods'] = $ClassSubject->no_of_period;
        $scheduledata['periods'] = Period::take(intval($ClassSubject->no_of_period))->orderBy('id', 'ASC')->get();
        //dd($scheduledata['periods']);
        $scheduledata['schedule'] = $ClassScheduleSection;
        $scheduledata['employee'] =  User::whereHas('roles', function ($q) {
            $q->where('name' , 'Teacher');
        })->orderBy('id','desc')->get();

        return Response::json($scheduledata);
    }



    public function index(Request $request)
    {

//        $teachers = DB::table('users')->where('user_type', 'teacher')
//            ->select('users.*', 'employee_info.emp_Id')
//            ->leftjoin('employee_info', 'users.id', '=', 'employee_info.user_Id')
//            ->get();
//        dd($teachers);

        $teachers = User::whereHas('userType', function ($q) {
            $q->where('user_type_Name','Teacher');
        })->orderBy('id','desc')->get();

        $subjects = Subject::all();
        $class_sections = ClassSection::all();
        $class_all_names = AddClasses::all();
        $filter_by = $request->name;

        if ($request->name == 'class') {
//            dd('you are here in partial class view');
//            $where = 'cls_Id' !== null;
            $class_schedule = DB::table('classsched')
                ->select('classsched.ttable_Id', 'classsched.timetable', 'class.class', 'class_section.class_section_name', 'class.class')
                ->leftJoin('class', 'classsched.cls_Id', '=', 'class.cls_Id')
                ->leftJoin('class_section', 'classsched.c_section_Id', '=', 'class_section.c_section_Id')
                ->get();


            return view('partials.class_schedule_data', compact('teachers', 'subjects', 'class_all_names', 'class_sections', 'class_schedule', 'filter_by'))->render();


        } elseif ($request->name == 'subject') {

            $class_schedule = DB::table('classsched')
                ->select('classsched.ttable_Id', 'classsched.timetable', 'class.class', 'class_section.class_section_name', 'class.class')
                ->leftJoin('class', 'classsched.cls_Id', '=', 'class.cls_Id')
                ->leftJoin('class_section', 'classsched.c_section_Id', '=', 'class_section.c_section_Id')
                ->get();

            return view('partials.subject_schedule_data', compact( 'teachers','subjects', 'class_all_names', 'class_sections', 'class_schedule', 'filter_by'))->render();
        } else {

                
            $class_schedule = ClassSection::all();
                 
            return view('schedule.class-schedule', compact( 'teachers', 'subjects', 'class_all_names', 'class_sections', 'class_schedule', 'filter_by'));

        }
    }


    public function genericSchedule(Request $request)
    {

        $addClasses = AddClasses::all();

        
        return view('schedule.generic_schedule' , compact('addClasses'));
        
    }

    public function genericScheduleajax($class_id,$section_id)
    {

        $weekTimeTable = $this->generate_time_table($class_id,$section_id);
        $classSchedre = Classsched::where(['cls_Id'=>$class_id, 'c_section_Id'=>$section_id])->first(); 
        $periods = Period::where('orders','!=' , 0)->get();
        $weekDays = Day::all()->toArray();
        $weekDaysCount = sizeOf($weekDays);
        $weekDaysCount = $weekDaysCount-1;
        $periodscount = $periods->count();
        $periodscount = $periodscount-1;
        $lunch = "LUNCH";
        //dd($weekTimeTable);
        if($weekTimeTable and $classSchedre==null){        

            echo "
            <input type='hidden' name='class' value='".$class_id."'/>
            <input type='hidden' name='section' value='".$section_id."'/>
            <table  class='table table-bordered table-striped'>";
          
            echo "<tr class='danger text-center'>
              <th class='text-center'>Period</th> ";
              $k=0;
              foreach($weekDays as $day){

                    echo "<th class='text-center'>".$day['name']."</th>";           
                $k++;
            }
            echo "</tr>";
            
             
               $ks=1;
           
           foreach($periods as $periodK=>$peval){

            // for($i = 0; $i <= $weekDaysCount; $i++){
                echo "<tr>";
                echo "<td  class='danger table-light text-center' >".$ks."</td>";
                   

               foreach($weekDays as $dask=>$dval){
                   //echo "<pre>"; print_r($dval);

                    $classname = "N/A";
                    $teacher_name = "N/A";
                    $subject_id = "";
                    $teacher_id = "";
                    if(!empty($weekTimeTable[$dask][$periodK]['subject_name'])){
                         $classname =  $weekTimeTable[$dask][$periodK]['subject_name'];
                         $subject_id =  $weekTimeTable[$dask][$periodK]['subject_id'];
                         $teacher_id =  $weekTimeTable[$dask][$periodK]['teacher_id'];


                    }
                     if(!empty($weekTimeTable[$dask][$periodK]['teacher_id'])){
                      $teachers = User::findOrFail($weekTimeTable[$dask][$periodK]['teacher_id']);
                      $teacher_name = $teachers?$teachers->name:'';
                         $teacher_id = $teachers?$teachers->id:'';
                    }


                     echo "<td class='table-light'>

                        <input type='hidden' value='".$subject_id."' name='subject_id[".$peval->id."][".$dval['id']."]'/>
                        
                        <input type='hidden' value='".$teacher_id."' name='emp_Id[".$peval->id."][".$dval['id']."]'/>

                     <div class='row'>
                        <div class='col-xl-12'>
                            <label> Starts</label>
                            <input type='time' class='form-control' readonly id='school-name' value='".$peval->start_time."' name='time_start[".$peval->id."][".$dval['id']."]'/>
                        </div>

                        <div class='col-md-12'>
                            <label> Ends</label>
                            <input type='time' readonly  value='".$peval->end_time."' name='time_end[".$peval->id."][".$dval['id']."]' class='form-control' id='school-name' placeholder='End time'>
                            
                        </div>

                        <div class='col-md-12'>
                            <label></label>
                            <div>".$classname."</div>
                            <div>".$teacher_name."</div>
                            
                        </div>

 

                      </div>  
                    </td>";      
                
               // $das++;
                }
                echo "</tr>";
                 $ks++;
               

              }


              echo "</table> 

              <div class='form-group col-sm-12 col-lg-12'>
                    <button type='submit' class='btn btn-secondary btn-round  update-btn pull-right' id='save_geneti'>Save</button></div>";
      
          }else if(!empty($classSchedre)){
            echo "<div style='text-size=28'><b>Schedule  aready exits</b></div>";
          }
          else{
            echo "<div style='text-size=28'><b>Not enough data for selected Class and Section.</b></div>";
          }
      
     





    }

    public function generate_time_table($courseid, $s){

        $assignsubject = AssignSubjects::where(['cls_id'=>$courseid , 'section_id'=>$s])->get()->toArray();

        $subjects = array();
        $k=0;

        $periods = Period::where('orders','!=' , 0)->get();
        $weekDays = Day::all()->toArray();
        $weekDaysCount = sizeOf($weekDays);
        $weekDaysCount = $weekDaysCount-1;
        $periodscount = $periods->count();
        $periodscount = $periodscount-1;



        if($assignsubject)
        {
    
            
            
            foreach ($assignsubject as $key => $row) {
                 array_push($subjects, $row);
            }
            
            $weekTimeTable = array();
        
             for($i = 0; $i <= $weekDaysCount; $i++){
        
                $dayTimeTable = array();
                shuffle($subjects);
                $pointer = 0;
        
                for($j = 0; $j <= $periodscount; $j++){
        
                    try{
                        while($subjects[$pointer]['lecture_per_week'] === 0){
                            $pointer++;
                        }
        
                        if($subjects[$pointer]['type'] === "Lab"){
                            if($j === 1 || $j === 2 || $j === 4){
                                array_push($dayTimeTable, $subjects[$pointer]);
                                array_push($dayTimeTable, $subjects[$pointer]);
                                $subjects[$pointer]['lecture_per_week']--;
                                if($pointer === count($subjects) - 1){
                                    $pointer = 0;
                                }
                                else{
                                    $pointer++;
                                }
                                $j++;
                            }
                            else{
                                if($pointer === count($subjects) - 1){
                                    $pointer = 0;
                                }
                                else{
                                    $pointer++;
                                }
                            }
                        }
                        else if($subjects[$pointer]['type'] == "Theory"){
                            array_push($dayTimeTable, $subjects[$pointer]);
                            $subjects[$pointer]['lecture_per_week']--;
                            if($pointer === count($subjects) - 1){
                                $pointer = 0;
                            }
                            else{
                                $pointer++;
                            }
                        }
                    }
                    catch(\Exception $e){
                        array_push($dayTimeTable, "Empty");
                    }
                }
        
                array_push($weekTimeTable, $dayTimeTable);
            }

            return $weekTimeTable;
        }
        else{
            return false;
        }
}


    

    




    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'class' => 'required',
            'class_section' => 'required',
            'day' => 'required',
            'period' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'sub_Id' => 'required',
            'emp_Id' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()]);
        }else {

            $deleteSchedule = AddClassSched::where(['cls_Id'=>$request->class, 'c_section_Id'=>$request->class_section])->delete();
           $i=0;
           foreach ($request->sub_Id as $key => $value) {
                    
            $classSched = new AddClassSched();

            $classSched->cls_Id = $request->class;
            $classSched->c_section_Id = $request->class_section;
            $classSched->sub_Id = $request->sub_Id[$i];
            $classSched->period = $request->period[$i];
            $classSched->day = json_encode($request->day[$i]);
            $classSched->time_start = $request->time_start[$i];
            $classSched->time_end = $request->time_end[$i];
            $classSched->emp_Id = $request->emp_Id[$i];
           
            $classSched->save();
           $i++;


           }
        
            return response()->json(['message' => 'Successfully Added!']);
            //return redirect('add-subject')->with('message', 'Successfully Added!');
            // }
        }

    }


    public function show($id)
    {
//        dd($id);
        $where = array('ttable_Id' => $id);

        $showClassSchedule = DB::table('classsched')
            ->select('classsched.ttable_Id', 'classsched.timetable','class.class','class_section.class_section_name', 'class.class')
            ->leftJoin('class', 'classsched.cls_Id', '=', 'class.cls_Id')
//            ->leftJoin('employee_info', 'classsched.emp_Id', '=', 'employee_info.emp_Id')
            ->leftJoin('class_section', 'classsched.c_section_Id', '=', 'class_section.c_section_Id')
            ->where($where)->get();
        $serialized_array  = $showClassSchedule->timetable;
        $unserialized_array = unserialize($serialized_array);
        $showClassSchedule->unserialized_array = $unserialized_array;
//        dd('kfdfdkffdf',$showClassSchedule);
//          return Response::json($class_sched);
        return Response::json($showClassSchedule);

    }

    public function showViewClass($id)
    {
        $where = array('ttable_Id' => $id);
        $showClassSchedule = DB::table('classsched')
            ->select('classsched.ttable_Id', 'classsched.timetable','class.class','class_section.class_section_name', 'class.class')
            ->leftJoin('class', 'classsched.cls_Id', '=', 'class.cls_Id')
//            ->leftJoin('employee_info', 'classsched.emp_Id', '=', 'employee_info.emp_Id')
            ->leftJoin('class_section', 'classsched.c_section_Id', '=', 'class_section.c_section_Id')
            ->where($where)->first();

        $serialized_array  = $showClassSchedule->timetable;
        $unserialized_array = unserialize($serialized_array);
        $showClassSchedule->unserialized_array = $unserialized_array;
//        dd($showClassSchedule);
        return Response::json($showClassSchedule);

    }


    public function edit($id)
    {
        $where = array('ttable_Id' => $id);
        $edit_class_sched = DB::table('classsched')
            ->select('classsched.*', 'classsched.timetable','class.class','class_section.class_section_name')
            ->leftJoin('class', 'classsched.cls_Id', '=', 'class.cls_Id')
//            ->leftJoin('employee_info', 'classsched.emp_Id', '=', 'employee_info.emp_Id')
            ->leftJoin('class_section', 'classsched.c_section_Id', '=', 'class_section.c_section_Id')
            ->where($where)->first();
        $serialized_array  = $edit_class_sched->timetable;
        $unserialized_array = unserialize($serialized_array);
        $edit_class_sched->unserialized_array = $unserialized_array;
//        dd($edit_class_sched);
        return Response::json($edit_class_sched);
//            Response::json($edit_class_sched);
    }


    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'class' => 'required',
            'classSection' => 'required',
            'days' => 'required',
            'periods' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'subjects' => 'required',
            'teachers' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()]);
        }else {

            $count = count($request->periods);


            if ($count > 0) {
                $data[] = array("days" => $request->days[0], "periods" => $request->periods[0], "start_time" => $request->start_time[0], "end_time" => $request->end_time[0], "subjects" => $request->subjects[0], "teachers" => $request->teachers[0]);
            }
            if ($count > 1) {
                $data[] = array("days" => $request->days[1], "periods" => $request->periods[1], "start_time" => $request->start_time[1], "end_time" => $request->end_time[1], "subjects" => $request->subjects[1], "teachers" => $request->teachers[1]);
            }
            if ($count > 2) {
                $data[] = array("days" => $request->days[2], "periods" => $request->periods[2], "start_time" => $request->start_time[2], "end_time" => $request->end_time[2], "subjects" => $request->subjects[2], "teachers" => $request->teachers[2]);
            }
            if ($count > 3) {
                $data[] = array("days" => $request->days[3], "periods" => $request->periods[3], "start_time" => $request->start_time[3], "end_time" => $request->end_time[3], "subjects" => $request->subjects[3], "teachers" => $request->teachers[3]);
            }
            if ($count > 4) {
                $data[] = array("days" => $request->days[4], "periods" => $request->periods[4], "start_time" => $request->start_time[4], "end_time" => $request->end_time[4], "subjects" => $request->subjects[4], "teachers" => $request->teachers[4]);
            }
            if ($count > 5) {
                $data[] = array("days" => $request->days[5], "periods" => $request->periods[5], "start_time" => $request->start_time[5], "end_time" => $request->end_time[5], "subjects" => $request->subjects[5], "teachers" => $request->teachers[5]);
            }
            if ($count > 6) {
                $data[] = array("days" => $request->days[6], "periods" => $request->periods[6], "start_time" => $request->start_time[6], "end_time" => $request->end_time[6], "subjects" => $request->subjects[6], "teachers" => $request->teachers[6]);
            }
            if ($count > 7) {
                $data[] = array("days" => $request->days[7], "periods" => $request->periods[7], "start_time" => $request->start_time[7], "end_time" => $request->end_time[7], "subjects" => $request->subjects[7], "teachers" => $request->teachers[7]);
            }
            if ($count > 8) {
                $data[] = array("days" => $request->days[8], "periods" => $request->periods[8], "start_time" => $request->start_time[8], "end_time" => $request->end_time[8], "subjects" => $request->subjects[8], "teachers" => $request->teachers[8]);
            }
            if ($count > 9) {
                $data[] = array("days" => $request->days[9], "periods" => $request->periods[9], "start_time" => $request->start_time[9], "end_time" => $request->end_time[9], "subjects" => $request->subjects[9], "teachers" => $request->teachers[9]);
            }
            if ($count > 10) {
                $data[] = array("days" => $request->days[10], "periods" => $request->periods[10], "start_time" => $request->start_time[10], "end_time" => $request->end_time[10], "subjects" => $request->subjects[10], "teachers" => $request->teachers[10]);
            }


            $serialized_timetable_array = serialize($data);
            $classSched = [
                'cls_Id' => $request->class,
                'c_section_Id' => $request->classSection,
                'timetable' => $serialized_timetable_array,
            ];


            DB::table('classsched')->where('ttable_Id', $request->id)->update($classSched);
            return redirect('http://localhost/scims/public/class-schedule');

        }

    }


    public function delete($id)
    {

        DB::table('classsched')->where('ttable_Id', $id)->delete();
        return redirect('http://localhost/scims/public/class-schedule');
//        return redirect('add-class')->with('message', 'Successfully Deleted!');
    }

    public  function ClassSchedule(){

        return view('class-schedule');
    }
}

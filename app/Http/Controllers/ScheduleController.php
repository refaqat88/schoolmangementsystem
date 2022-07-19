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

class ScheduleController extends Controller
{
    function __construct()
    {

        $this->middleware('permission:view-schedule|add-schedule|edit-schedule|delete-schedule', ['only' => ['index','show']]);


        $this->middleware('permission:add-schedule', ['only' => ['store']]);
        $this->middleware('permission:edit-schedule', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-schedule', ['only' => ['delete']]);
    }




    public function index(Request $request)
    {

        $addClasses = AddClasses::all();
        $Classsched  = Classsched::all();              
        return view('schedule.schedule', compact('Classsched','addClasses'));
        
    }


    public function genericSchedule(Request $request)
    {

        $addClasses = AddClasses::all();

        
        return view('schedule.generic_schedule' , compact('addClasses'));
        
    }

    public function scheduleList(Request $request)
    {
        $classS = AddClasses::where('cls_Id',$request->class)->first(); 
        $idsArr = explode(',',$classS->subject); 
        $periods = Period::where('orders','!=' , 0)->get();
        $days = Day::all();
        $scheduleList = [];
        $scheduleList['periods'] = $periods;
        $scheduleList['days'] = $days; 
        $subjects_list = AssignSubjects::where(['cls_id'=>$request->class,'section_id'=>$request->section])->get(); 

        $teachers = [];
        $i=0;
        


        foreach($subjects_list as $teacher)
        {

            $teachers[$i]['name'] = $teacher->teacher->name;
            $teachers[$i]['id'] = $teacher->teacher->id;
            $i++;

        }

        $scheduleList['subjects'] = $subjects_list;
        $scheduleList['teachers'] = $teachers;
        $scheduleList['class'] = $request->class;
        $scheduleList['section'] = $request->section;
        $AddClassSched = Classsched::where(['cls_Id'=>$request->class, 'c_section_Id'=>$request->section])->first();

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




        echo json_encode($scheduleList);
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
          
        $classSchedre = Classsched::where(['cls_Id'=>$request->cls_id, 'c_section_Id'=>$request->section_id])->first();

     

        $dataq= [
                'cls_Id' => $request->class,
                'c_section_Id' =>$request->section,
                
                ];


       

        if ($classSchedre === null) {

            $classSched = Classsched::create($dataq); 

        }

        if ($classSchedre) {
            
            $classSched = $classSchedre;
             ClassschedDays::where('classsched_id',$classSched->id)->delete(); 

        }    


    
         
        $i=0;

        $input  = $request->all();
        $periods =Period::where('orders','!=' , 0)->get()->toArray();
        $days = Day::all()->toArray();
        

        
        foreach ($periods as $key => $value) {
                       
           foreach ($days as $key2 => $value2) {
               $data = [
                'day' => $value2['id'],
                'peroid' =>$value['id'],
                'time_start' => $input['time_start'][$value['id']][$value2['id']],
                'time_end' => $input['time_end'][$value['id']][$value2['id']],
                'emp_Id' => $input['emp_Id'][$value['id']][$value2['id']],
                'subject_id' => $input['subject_id'][$value['id']][$value2['id']],
                'classsched_id'=>$classSched->id
                
                ];
                
                if($input['subject_id'][$value['id']][$value2['id']]!='')
                {  
                    ClassschedDays::create($data); 
                }
                


            
           }  
            
        }
    
        return response()->json(['message' => 'Successfully Added!']);
            
       

    }


    public function show(Request $request)
    {



        $periods = Period::where('orders','!=' , 0)->get();
        $days = Day::all();
        $scheduleList = [];
        $scheduleList['periods'] = $periods;
        $scheduleList['days'] = $days;  
        $AddClassSched = Classsched::where('id',$request->ttable_Id)->first();
       
        $scheduleList['class'] = $AddClassSched->class->class;
        $scheduleList['section'] = $AddClassSched->section->class_section_name;
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
                             if($value->subject){
                                $mylist[$val2->id][$daysval->id]['subjects'] = $value->subject->subject;
                             }else{
                                 $mylist[$val2->id][$daysval->id]['subjects'] = '';
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



        echo json_encode($scheduleList);



    }

    
 


    public function delete($id)
    {

        
          ClassschedDays::where('classsched_id', $id)->delete();
        Classsched::where('id', $id)->delete();
        
       // ClassschedDays::where('ttable_Id', $id)->delete();
 
        return redirect('schedule');



    }

    public  function ClassSchedule(){

        return view('class-schedule');
    }
}

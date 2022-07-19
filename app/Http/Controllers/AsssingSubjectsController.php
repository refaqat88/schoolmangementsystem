<?php

namespace App\Http\Controllers;


use App\Models\AddClasses;
use App\Models\AssignSubjects;
use App\Models\User;
use App\Models\Subject;
use App\Models\ClassSection;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect,Response;
class AsssingSubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\F
     */
    public function index()
    {
       $AssignSubjects = AssignSubjects::all();
       
       $addClasses = AddClasses::all();
       
       $teachers = User::whereHas('roles', function ($q) {
            $q->where('name','Teacher');
        })->orderBy('id','desc')->get();
       


        return view('schedule.assign-subject', compact('AssignSubjects','addClasses','teachers'));

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create(Request $request)
    {
       

       
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'subject_id' => 'required',
            'cls_id' => 'required',
            'section_id' => 'required',
            'teacher_id' => 'required',
            'lecture_per_week' => 'required',
            'type' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            $section_id = Subject::where('sub_Id',$request->subject_id)->first();
            
            $input = $request->all();
            //dd($input);

            $sssignSubjects = AssignSubjects::where(
                    [
                        'cls_Id'=>$input['cls_id'] ,
                        'section_id'=>$input['section_id'] , 
                        'subject_id' =>$input['subject_id']
                 ]
             )->first();
             
            if($sssignSubjects ==null){
                $input['subject_name']=$section_id->subject;
                 
                AssignSubjects::create($input);

                return response()->json(['message' => 'Successfully Added!']);

    
            }else{
                $error = [];

                return response()->json(['subject' =>'Subject is already assigned']);

            }
            
        }

        
    }



   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $assigSubject = AssignSubjects::findorFail($id);

        $assigSubject->className = $assigSubject->class->class;
        $assigSubject->sectionName = $assigSubject->section->class_section_name;
        $assigSubject->subjectName = $assigSubject->subject->subject;
        $assigSubject->techerName = $assigSubject->teacher->name;

        return Response::json($assigSubject);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $assignSubject = AssignSubjects::findorFail($request->id);
 
        $assignSubject['classes'] = AddClasses::all();
        $assignSubject['sections'] = ClassSection::all();
        $assignSubject['subjects'] = Subject::all();

        $teachers = User::whereHas('roles', function ($q) {
                $q->where('name','Teacher');
            })->orderBy('id','desc')->get();


        $assignSubject['teachers'] = $teachers;
         

        return Response::json($assignSubject);



        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

      
        $validator = Validator::make($request->all(), [
            'subject_id' => 'required',
            'cls_id' => 'required',
            'section_id' => 'required',
            'teacher_id' => 'required',
            'lecture_per_week' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {

            $input =  $request->except('_token');


            $sssignSubjects = AssignSubjects::where('subject_id' , $input['subject_id'])->first();
//            dd($sssignSubjects->subject_name);
            if($sssignSubjects != null){
                $input['subject_name'] = $sssignSubjects->subject_name;
            }

            AssignSubjects::where('id', $input['id'])->update($input);
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);

        }




        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AssignSubjects::where('id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}

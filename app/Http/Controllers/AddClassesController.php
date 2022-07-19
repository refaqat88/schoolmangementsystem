<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\AddClasses;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class AddClassesController extends Controller
{

    function __construct()
    {    
        $this->middleware('permission:view-school|add-school|edit-school|delete-school', ['only' => ['index','show']]);


        $this->middleware('permission:add-admission', ['only' => ['create','store']]);
        
        $this->middleware('permission:edit-school', ['only' => ['edit','update']]);

        $this->middleware('permission:delete-school', ['only' => ['delete']]);
    }



    public function index()
    {

        $school_sections = Section::all();
        $subjects = Subject::all();
        $classes = AddClasses::all();

        return view('school.add-classes', compact('classes', 'school_sections','subjects'));
    }


    public function getClass(){


        $class_sections = AddClasses::all(); 

        return $class_sections;



    }  



    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'class_name' => 'required|unique:class,class|regex:/^[a-zA-ZÑñ\s]+$/',
            'numeric_name' => 'required|numeric|min:1|max:20',
            'no_of_period' => 'required|integer',
            'school_section' => 'required',
            'tuition_fee' => 'required|integer',
            'subject' => 'required',
        ]);

        if ($validator->fails()) {
            
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $subject = new AddClasses();
            $subject->class = $request->get('class_name');
            $subject->numeric_name = $request->get('numeric_name');
            $subject->no_of_period = $request->get('no_of_period');
            $subject->sc_sec_Id = $request->get('school_section');
            $subject->tuition_fee = $request->get('tuition_fee');
            $subject->subject = implode(",",$request['subject']);
            $subject->save();
            return response()->json(['message' => 'Successfully Added!']);
            //return redirect('add-subject')->with('message', 'Successfully Added!');
        }

    }


    public function show($id)
    {

        $where = array('cls_Id' => $id);
        //$class = AddClasses::where($where)->first();
        $class = DB::table('class')
                        ->join('school_section','class.sc_sec_Id','=','school_section.sc_sec_Id')
                        ->where($where)->first();
        //dd($class->subject);
        $subjects = DB::table('subject')
            ->whereIn('sub_Id',explode(',',$class->subject))->get();

        $class->subjects = $subjects;

        return Response::json($class);

    }


    public function edit($id)
    {
        $where = array('cls_Id' => $id);
        $class = AddClasses::where($where)->first();

        $class->selectedSubjectIds = explode(',',$class->subject);

        return Response::json($class);
    }


    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'class_name' => 'required',
            'numeric_name' => 'required',
            'no_of_period' => 'required',
            'school_section' => 'required',
            'tuition_fee' => 'required',
            'subject' => 'required',

        ]);
        if ($validator->fails()) {
        /* return response()->json(['errors' => $validator->errors()->all()]);*/
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $form_data = array(
                'class'      => $request->class_name,
                'numeric_name'       => $request->numeric_name,
                'no_of_period' => $request->no_of_period,
                'sc_sec_Id' => $request->school_section,
                'tuition_fee' => $request->tuition_fee,
                'subject' => implode(",",$request['subject']),
            );
            //dd($form_data);


            AddClasses::where('cls_Id', $request->id)->update($form_data);
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function delete($id)
    {
       //dd($id);
        AddClasses::where('cls_Id',$id)->delete();
        return redirect('add-class');
//        return redirect('add-class')->with('message', 'Successfully Deleted!');
    }
}
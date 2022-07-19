<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class AddSubjectController extends Controller
{

  
    function __construct()
    {


        $this->middleware('permission:view-school', ['only' => ['index','show']]);


        $this->middleware('permission:add-admission', ['only' => ['add-subject']]);
         
        $this->middleware('permission:edit-school', ['only' => ['EditSubject','UpdateSubject']]);

        $this->middleware('permission:delete-school', ['only' => ['DeleteSubject']]);
    
    }


    public function index()
    {

        
        $subjects = Subject::all();
        return view('school.add-subject', compact('subjects'));
    }


    public function CreateSubject(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:subject,subject|regex:/^[a-zA-ZÑñ\s]+$/',
            'code' => 'required',

        ],
        [
        'name.required' => 'Name is required!',
         'name.regex' => 'Name must be alphabetic only !',
        ]

        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $subject = new Subject();
            $subject->subject = $request->get('name');
            $subject->sub_Code = $request->get('code');
            $subject->save();
            //return redirect('add-subject')->with('message', 'Successfully Added!');
        }


        // return redirect('add-subject')->with('message', 'Successfully Added!');;
        ///
        //return redirect()->back()->with('message', 'Successfully Added!');


    }


    public function ShowSubject($id)
    {

        $where = array('sub_Id' => $id);
        $subject = Subject::where($where)->first();
        return Response::json($subject);

    }


    public function EditSubject($id)
    {
        $where = array('sub_Id' => $id);
        $subject = Subject::where($where)->first();
        return Response::json($subject);
    }


    public function UpdateSubject(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $form_data = array(
                'subject'      => $request->name,
                'sub_Code'       => $request->code,
            );
            //dd($form_data);


            Subject::where('sub_Id', $request->id)->update($form_data);
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function DeleteSubject($id)
    {

        Subject::where('sub_Id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}
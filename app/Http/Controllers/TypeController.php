<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.add-subject', compact('subjects'));
    }


    public function CreateSubject(Request $request)
    {
        /*   $validator = Validator::make($request->all(), [
               'name' => 'required',
               'code' => 'required',
               'theory_marks' => 'required',
               'practical_marks' => 'required',
               'total_marks' => 'required',
               'passing_marks' => 'required',
           ]);

           if ($validator->fails()) {
               return response()->json(['errors' => $validator->errors()->all()]);
           }*/
        $subject = new UserType();
        $subject->subject = $request->get('name');
        $subject->role_id = $request->get('role_id');
        $subject->save();

        //return redirect('add-subject');
        //return response()->json(['success' => 'Data is successfully added']);
        return redirect()->back()->with('message', 'Successfully Added!');


    }


    public function ShowSubject($id)
    {

        $where = array('sub_Id' => $id);
        $subject = UserType::where($where)->first();
        return Response::json($subject);

    }


    public function EditSubject($id)
    {
        $where = array('sub_Id' => $id);
        $subject = UserType::where($where)->first();
        return Response::json($subject);
    }


    public function UpdateSubject(Request $request)
    {
        //dd($request->all());
        $form_data = array(
            'subject'      => $request->name,
            'sub_Code'       => $request->code,
            'sub_th_Mks' => $request->theory_marks,
            'sub_prac_Mks' => $request->practical_marks,
            'sub_tot_Mks' => $request->total_marks,
            'sub_pass_Mks' => $request->passing_marks,
        );
        //dd($form_data);


        UserType::where('sub_Id', $request->id)->update($form_data);
        $request->flash();
        return redirect()->back()->with('message', 'Successfully Updated!');

    }


    public function DeleteSubject($id)
    {
        UserType::where('sub_Id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}

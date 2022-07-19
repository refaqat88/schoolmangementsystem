<?php

namespace App\Http\Controllers;
use App\Models\Grade_general;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;

class AdminGeneralGrade extends Controller
{

    public function index()
    {
        $grades = Grade_general::all();

        return view('admin.generalgrade.index', compact('grades'));
    }

    public function create()
    {
        return view('admin.generalgrade.create');
    }
    public function store(Request $request)
    {
        //dd($request->nationality);
        $request->validate([
            'grade_name'  => 'required|unique:boards,board_Name',
        ]);

        $grade = new Grade_general();

        $grade->name = $request->grade_name;
        $grade->save();

        if($grade){
            return redirect('admin/general-grade')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $grade = Grade_general::findOrFail($id);
        return view('admin.generalgrade.edit', compact('grade'));
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'grade_name'  => 'required',
        ]);

        $update = [

            'name' => $request->grade_name,


        ];

        Grade_general::where('id',$request->id)->update($update);

        return redirect('admin/general-grade')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $grade_general = Grade_general::where('id',$id);
        $grade_general->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

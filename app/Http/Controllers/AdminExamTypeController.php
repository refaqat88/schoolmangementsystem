<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\ExamType;
//use Illuminate\Support\Facades\Validator;

class AdminExamTypeController extends Controller
{

    public function index()
    {
        $exam_types = ExamType::all();

        return view('admin.exam-type.index', compact('exam_types'));
    }

    public function create()
    {
        return view('admin.exam-type.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'exam_type_Name'  => 'required|unique:exam_type,exm_typ_Name',
            'exam_Status'  => 'required',
        ]);

        $exam_type = new ExamType;

        $exam_type->exm_typ_Name = $request->exam_type_Name;
        $exam_type->exm_typ_Status = $request->exam_Status;
        $exam_type->save();

        if($exam_type){
            return redirect('admin/exam-type')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
         $exam_type = DB::table('exam_type')->where('exm_typ_Id', $id)->first();
         return view('admin.exam-type.edit', compact('exam_type'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'exam_type_Name'  => 'required',
            'exam_Status'  => 'required',
        ]);

        $update = [
            'exm_typ_Name' => $request->exam_type_Name,
            'exm_typ_Status' => $request->exam_Status,
        ];

        ExamType::where('exm_typ_Id',$request->id)->update($update);

        return redirect('admin/exam-type')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $religion = ExamType::where('exm_typ_Id',$id);
        $religion->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

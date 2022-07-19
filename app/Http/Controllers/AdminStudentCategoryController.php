<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\StudentCategory;
//use Illuminate\Support\Facades\Validator;

class AdminStudentCategoryController extends Controller
{

    public function index()
    {
        $student_categories = StudentCategory::all();

        return view('admin.student-category.index', compact('student_categories'));
    }

    public function create()
    {
        return view('admin.student-category.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'student_category_name'  => 'required|unique:App\Models\StudentCategory,student_category_name',
        ]);

        $student_category = new StudentCategory;

        $student_category->student_category_name = $request->student_category_name;
        $student_category->save();

        if($student_category){
            return redirect('admin/student/category')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $student_category = StudentCategory::findOrFail($id);
        return view('admin.student-category.edit', compact('student_category'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'student_category_name'  => 'required',
        ]);

        $update = [

            'student_category_name' => $request->student_category_name,


        ];

        StudentCategory::where('std_cat_Id',$request->id)->update($update);

        return redirect('admin/student/category')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $student_category = StudentCategory::where('std_cat_Id',$id);
        $student_category->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

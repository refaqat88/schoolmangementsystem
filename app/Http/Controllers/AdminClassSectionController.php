<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\ClassSection;
use Validator;
//use Illuminate\Support\Facades\Validator;

class AdminClassSectionController extends Controller
{

    public function index()
    {

        $class_sections = ClassSection::all();

        return view('admin.class-section.index', compact('class_sections'));
    }

    public function create()
    {
        return view('admin.class-section.create');
    }
    public function store(Request $request)
    {
        //dd($request->nationality);
        $request->validate([
            'class_section_name'  => 'required|min:1|max:10|unique:class_section',
        ]);

        $class_section = new ClassSection();

        $class_section->class_section_name = $request->class_section_name;
        $class_section->save();

        if($class_section){
            return redirect('admin/class-section')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $class_section = ClassSection::findOrFail($id);
        return view('admin.class-section.edit', compact('class_section'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'class_section_name'  => 'required',
        ]);

        $update = [

            'class_section_name' => $request->class_section_name,


        ];

        ClassSection::where('c_section_Id',$request->id)->update($update);

        return redirect('admin/class-section')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $class_section = ClassSection::where('c_section_Id',$id);
        $class_section->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\Section;

class AdminSectionController extends Controller
{

    public function index()
    {
        $sections = Section::all();

        return view('admin.section.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.section.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
       $request->validate([
            'section_name'  => 'required',
        ]);

        $school_section = new Section;

        $school_section->sc_sec_name = $request->section_name;
        $school_section->save();

        if($school_section){
            return redirect('admin/section')->with('message', 'Successfully added');
        }
        else{
            $request->flash();
            return redirect()->back()-with('error');
        }
    }

    public function edit($id)
    {
        $section = Section::where('sc_sec_Id',$id)->first();
        //echo "<pre >"; print_r($section); exit;
        return view('admin.section.edit', compact('section'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'section_name'  => 'required',
        ]);

        $update = [
            'sc_sec_name' => $request->section_name,
        ];

        Section::where('sc_sec_Id',$request->id)->update($update);

        return redirect('admin/section')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {
        $section = Section::where('sc_sec_Id',$id);
        $section->delete();
        return redirect()->back()->with('message', 'Successfully deleted');
    }
}

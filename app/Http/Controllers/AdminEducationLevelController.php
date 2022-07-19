<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\EducationLevel;
//use Illuminate\Support\Facades\Validator;

class AdminEducationLevelController extends Controller
{

    public function index()
    {
        $education_levels = EducationLevel::all();

        return view('admin.education_level.index', compact('education_levels'));
    }

    public function create()
    {
        return view('admin.education_level.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name'  => 'required|unique:education_level,name',
        ]);

        $education_level = new EducationLevel();

        $education_level->name = $request->name;
        $education_level->save();

        if($education_level){
            return redirect('admin/education-level')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $education_level  = EducationLevel::findOrFail($id);
        return view('admin.education_level.edit', compact('education_level'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name'  => 'required',
        ]);

        $update = [
            'name' => $request->name,
        ];

        EducationLevel::where('edu_level_Id',$request->id)->update($update);

        return redirect('admin/education-level')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $education_level = EducationLevel::where('edu_level_Id',$id);
        $education_level->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

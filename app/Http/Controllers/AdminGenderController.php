<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\Gender;
//use Illuminate\Support\Facades\Validator;

class AdminGenderController extends Controller
{

    public function index()
    {
        $genders = Gender::all();

        return view('admin.gender.index', compact('genders'));
    }

    public function create()
    {
        return view('admin.gender.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'gender'  => 'required|unique:gender',
        ]);

        $gender = new Gender;

        $gender->gender = $request->gender;
        $gender->save();

        if($gender){
            return redirect('admin/gender')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $gender = Gender::findOrFail($id);
        return view('admin.gender.edit', compact('gender'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'gender'  => 'required',
        ]);

        $update = [
            'gender' => $request->gender,
        ];

        Gender::where('gnd_Id',$request->id)->update($update);

        return redirect('admin/gender')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $religion = Gender::where('gnd_Id',$id);
        $religion->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Occupation;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;

class AdminOccupationController extends Controller
{

    public function index()
    {
        $occupations = Occupation::all();

        return view('admin.occupation.index', compact('occupations'));
    }

    public function create()
    {
        return view('admin.occupation.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'occupation'  => 'required|unique:occupation,occup_Name',
        ]);

        $occupation = new Occupation();

        $occupation->occup_Name = $request->occupation;
        $occupation->save();

        if($occupation){
            return redirect('admin/occupation')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $occupation  = Occupation::findOrFail($id);
        return view('admin.occupation.edit', compact('occupation'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'occupation'  => 'required',
        ]);

        $update = [
            'occup_Name' => $request->occupation,
        ];

        Occupation::where('occup_Id',$request->id)->update($update);

        return redirect('admin/occupation')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $university = Occupation::where('occup_Id',$id);
        $university->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

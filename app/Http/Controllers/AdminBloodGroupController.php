<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\BloodGroup;
//use Illuminate\Support\Facades\Validator;

class AdminBloodGroupController extends Controller
{

    public function index()
    {
        $blood_groups = BloodGroup::all();

        return view('admin.bloodgroup.index', compact('blood_groups'));
    }

    public function create()
    {
        return view('admin.bloodgroup.create');
    }
    public function store(Request $request)
    {
        //dd($request->nationality);
        $request->validate([
            'blood_group'  => 'required|unique:blood_group',
        ]);

        $bg = new BloodGroup;

        $bg->blood_group = $request->blood_group;
        $bg->save();

        if($bg){
            return redirect('admin/blood-group')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $blood_group = BloodGroup::findOrFail($id);
        return view('admin.bloodgroup.edit', compact('blood_group'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'blood_group'  => 'required',
        ]);

        $update = [

            'blood_group' => $request->blood_group,


        ];

        BloodGroup::where('bg_Id',$request->id)->update($update);

        return redirect('admin/blood-group')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $bg = BloodGroup::where('bg_Id',$id);
        $bg->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

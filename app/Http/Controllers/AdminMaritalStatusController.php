<?php

namespace App\Http\Controllers;
use App\Models\MaritalStatus;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;

class AdminMaritalStatusController extends Controller
{

    public function index()
    {
        $marital_status = MaritalStatus::all();

        return view('admin.marital-status.index', compact('marital_status'));
    }

    public function create()
    {
        return view('admin.marital-status.create');
    }
    public function store(Request $request)
    {
        //dd($request->nationality);
        $request->validate([
            'marital_status'  => 'required|unique:marital_status',
        ]);

        $marital_status = new MaritalStatus();

        $marital_status->marital_status = $request->marital_status;
        $marital_status->save();

        if($marital_status){
            return redirect('admin/marital-status')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $marital_status = MaritalStatus::findOrFail($id);
        return view('admin.marital-status.edit', compact('marital_status'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'marital_status'  => 'required',
        ]);

        $update = [

            'marital_status' => $request->marital_status,


        ];

        MaritalStatus::where('pk_marital_id',$request->id)->update($update);

        return redirect('admin/marital-status')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $national = MaritalStatus::where('pk_marital_id',$id);
        $national->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

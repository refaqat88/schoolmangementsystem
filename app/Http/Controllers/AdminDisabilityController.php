<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\Disability;
//use Illuminate\Support\Facades\Validator;

class AdminDisabilityController extends Controller
{

    public function index()
    {
        $disabilities = Disability::all();

        return view('admin.disability.index', compact('disabilities'));
    }

    public function create()
    {
        return view('admin.disability.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'disable_status'  => 'required',
        ]);

        $disability = new Disability();

        $disability->disable_status = $request->disable_status;
        $disability->disability = $request->disability;
        $disability->save();

        if($disability){
            return redirect('admin/disability')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $disability  = Disability::findOrFail($id);
        return view('admin.disability.edit', compact('disability'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'disable_status'  => 'required',
        ]);

        $update = [

            'disable_status' => $request->disable_status,
            'disability' => $request->disability,


        ];

        Disability::where('disable_Id',$request->id)->update($update);

        return redirect('admin/disability')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $disability = Disability::where('disable_Id',$id);
        $disability->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

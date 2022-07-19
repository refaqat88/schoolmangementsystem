<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\Religion;
//use Illuminate\Support\Facades\Validator;

class AdminReligionController extends Controller
{

    public function index()
    {
        $religions = Religion::all();

        return view('admin.religion.index', compact('religions'));
    }

    public function create()
    {
        return view('admin.religion.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'religion'  => 'required|unique:religion',
        ]);

        $religion = new Religion;

        $religion->religion = $request->religion;
        $religion->save();

        if($religion){
            return redirect('admin/religion')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $religion = Religion::findOrFail($id);
        return view('admin.religion.edit', compact('religion'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'religion'  => 'required|unique:religion',
        ]);

        $update = [
            'religion' => $request->religion,
        ];

        Religion::where('relig_Id',$request->id)->update($update);

        return redirect('admin/religion')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $religion = Religion::where('relig_Id',$id);
        $religion->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

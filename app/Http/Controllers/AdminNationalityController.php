<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\Nationality;
//use Illuminate\Support\Facades\Validator;

class AdminNationalityController extends Controller
{

    public function index()
    {
        $nationalities = Nationality::all();

        return view('admin.nationality.index', compact('nationalities'));
    }

    public function create()
    {
        return view('admin.nationality.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nationality'  => 'required|unique:nationality',
            'country'  => 'required|required|unique:nationality,country',
        ]);

        $nation = new Nationality;
        $nation->nationality = $request->nationality;
        $nation->country = $request->country;
        //dd($nation);
        $nation->save();

        if($nation){
            return redirect('admin/nationality')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $national = Nationality::findOrFail($id);
        return view('admin.nationality.edit', compact('national'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nationality'  => 'required',
            'country'  => 'required',
        ]);

        $update = [

            'nationality' => $request->nationality,
            'country' => $request->country,


        ];

        Nationality::where('nation_Id',$request->id)->update($update);

        return redirect('admin/nationality')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $national = Nationality::where('nation_Id',$id);
        $national->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

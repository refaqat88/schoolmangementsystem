<?php

namespace App\Http\Controllers;
use App\Models\Nationality;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\State;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Validator;

class AdminDistrictController extends Controller
{

    public function index()
    {
        //$districts = District::all();
        $districts = DB::table('domicile')
            ->join('state', 'domicile.state_Id', '=', 'state.state_Id')
            ->join('nationality', 'nationality.nation_Id', '=', 'domicile.nation_Id')
            ->get();

        return view('admin.district.index', compact('districts'));
    }

    public function create()
    {
        $states = State::all();
        $nationalities = Nationality::all();
        return view('admin.district.create', compact('states','nationalities'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'district'  => 'required|unique:App\Models\District,dom_District',
            'nationality' => 'required',
            'state' => 'required',
        ]);

        $district = new District();

        $district->dom_District = $request->district;
        $district->nation_Id = $request->nationality;
        $district->state_Id = $request->state;

        $district->save();

        if($district){
            return redirect('admin/district')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $states = State::all();
        $nationalities = Nationality::all();
        $district = DB::table('domicile')
        ->join('state', 'domicile.state_Id', '=', 'state.state_Id')
        ->join('nationality', 'nationality.nation_Id', '=', 'domicile.nation_Id')->where('dom_Id',$id)->first();
        //dd($district);
        //$district = District::findOrFail($id);
        return view('admin.district.edit', compact('district', 'states','nationalities'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'district'  => 'required',
            'state' => 'required',
            'state' => 'required',
        ]);

        $update = [
            'dom_District' => $request->district,
            'state_Id' => $request->state,
            'nation_Id' => $request->nationality,
        ];

        District::where('dom_Id',$request->id)->update($update);

        return redirect('admin/district')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $religion = District::where('dom_Id',$id);
        $religion->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

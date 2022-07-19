<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Nationality;
//use Illuminate\Support\Facades\Validator;

class AdminStateController extends Controller
{
    /*for ajx dependent dropdown*/
    public function getStates($id)
    {
        //dd($id);
        $states = DB::table("state")->where("nation_Id",$id)->pluck("state_name","state_Id");
        //dd($states);
        return json_encode($states);
    }

    public function index()
    {
        $states = DB::table('state')
            ->join('nationality', 'state.nation_Id', '=', 'nationality.nation_Id')
            ->get();
        return view('admin.state.index', compact('states'));
    }

    public function create()
    {
       $nationalities = Nationality::all();
        return view('admin.state.create', compact('nationalities'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'state'  => 'required|unique:App\Models\State,state_name',
            'nationality' => 'required',
        ]);

        $state = new State();

        $state->state_name = $request->state;
        $state->nation_Id = $request->nationality;
        $state->save();

        if($state){
            return redirect('admin/state')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $state = State::findOrFail($id);
        $nationalities = Nationality::all();
        //$states = DB::table('state')
           // ->where('state_Id', 'state.nation_Id', '=', 'nationality.nation_Id')
            //->get();
        return view('admin.state.edit', compact('state', 'nationalities'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'state'  => 'required',
            'nationality' => 'required',
        ]);

        $update = [
            'state_name' => $request->state,
            'nation_Id' => $request->nationality,
        ];
        //dd($update);

        State::where('state_Id',$request->id)->update($update);

        return redirect('admin/state')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $religion = State::where('state_Id',$id);
        $religion->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

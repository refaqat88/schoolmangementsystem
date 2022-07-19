<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\District;
Use DB;
//use Illuminate\Support\Facades\Validator;

class AdminCityController extends Controller
{

    public function index()
    {
        $cities = DB::table('cities')
            ->join('domicile', 'cities.dom_id', '=', 'domicile.dom_Id')
            ->get();

        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        $districts  = District::all();
        return view('admin.cities.create', compact('districts'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'district'  => 'required',
            'city_name'  => 'required|unique:cities',
            'zip_code'  => 'required',
        ]);

        $cities = new City();

        $cities->dom_id = $request->district;
        $cities->city_name = $request->city_name;
        $cities->zip_code = $request->zip_code;
        $cities->save();

        if($cities){
            return redirect('admin/cities')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {

        $city  = City::findOrFail($id);
        $districts  = District::all();
        return view('admin.cities.edit', compact('city', 'districts'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'district'  => 'required',
            'city_name'  => 'required',
            'zip_code'  => 'required',
        ]);
        $update = [

            'dom_id' => $request->district,
            'city_name' => $request->city_name,
            'zip_code' => $request->zip_code,


        ];

        City::where('pk_city_id',$request->id)->update($update);

        return redirect('admin/cities')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $national = City::where('pk_city_id',$id);
        $national->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

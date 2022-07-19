<?php

namespace App\Http\Controllers;

use App\Models\StationaryCategory;
use App\Models\Subject;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class StationaryCategoryController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:view-library', ['only' => ['index','ShowStationary']]);
        $this->middleware('permission:add-library', ['only' => ['AddStationary']]);
        $this->middleware('permission:edit-library', ['only' => ['EditStationary','UpdateStationary']]);
        $this->middleware('permission:delete-library', ['only' => ['DeleteStationary']]);
    }

    public function index()
    {
       
        $stationaryCategory = StationaryCategory::all();
        return view('library.stationary-category', compact('stationaryCategory'));
    }


    public function AddStationary(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'stationaryName' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $stationary = new StationaryCategory();
            $stationary->stat_categ_Name = $request->get('stationaryName');
            $stationary->save();
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);
        }


        // return redirect('add-subject')->with('message', 'Successfully Added!');;
        ///
        //return redirect()->back()->with('message', 'Successfully Added!');


    }


    public function ShowStationary($id)
    {
        $where = array('stat_categ_Id' => $id);
        $Stationary = StationaryCategory::where($where)->first();
        return Response::json($Stationary);

    }


    public function EditStationary($id)
    {
        $where = array('stat_categ_Id' => $id);
        $stationary = StationaryCategory::where($where)->first();
        return Response::json($stationary);
    }


    public function UpdateStationary(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'stationaryName' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $form_data = array(
                'stat_categ_Name'      => $request->stationaryName,
            );
            //dd($form_data);


            StationaryCategory::where('stat_categ_Id', $request->id)->update($form_data);
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function DeleteStationary($id)
    {

        StationaryCategory::where('stat_categ_Id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}

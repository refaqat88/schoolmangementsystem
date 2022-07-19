<?php

namespace App\Http\Controllers;

use App\Models\LibraryRack;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class LibraryRackController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:view-library', ['only' => ['index','ShowRack']]);


        $this->middleware('permission:add-library', ['only' => ['AddRack']]);
        $this->middleware('permission:edit-library', ['only' => ['EditRack','UpdateRack']]);
        $this->middleware('permission:delete-library', ['only' => ['DeleteRack']]);
    }

    public function index()
    {

        $racks = LibraryRack::all();
        return view('library.library-rack', compact('racks'));
    }


    public function AddRack(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'rack_No' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $rack = new LibraryRack();
            $rack->rack_No = $request->get('rack_No');
            $rack->save();
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);
        }


        // return redirect('add-subject')->with('message', 'Successfully Added!');;
        ///
        //return redirect()->back()->with('message', 'Successfully Added!');


    }


    public function ShowRack($id)
    {

        $where = array('rack_Id' => $id);
        $rack = LibraryRack::where($where)->first();
        return Response::json($rack);

    }


    public function EditRack($id)
    {
        //dd($id);
        $where = array('rack_Id' => $id);
        $rack = LibraryRack::where($where)->first();
        return Response::json($rack);
    }


    public function UpdateRack(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'rack_No' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $form_data = array(
                'rack_No'      => $request->rack_No,
            );
            //dd($form_data);


            LibraryRack::where('rack_Id', $request->id)->update($form_data);
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function DeleteRack($id)
    {

        LibraryRack::where('rack_Id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}

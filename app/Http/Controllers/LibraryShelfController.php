<?php

namespace App\Http\Controllers;

use App\Models\LibraryRack;
use App\Models\LibraryShelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class LibraryShelfController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:view-library', ['only' => ['index','ShowShelf']]);
        $this->middleware('permission:add-library', ['only' => ['AddShelf']]);
        $this->middleware('permission:edit-library', ['only' => ['EditShelf','UpdateShelf']]);
        $this->middleware('permission:delete-library', ['only' => ['DeleteShelf']]);
    }

    public function index()
    {
        $rackes = LibraryRack::all();
        
        $shelves = LibraryShelf::all();

        return view('library.library-shelf', compact('shelves','rackes'));
    }


    public function AddShelf(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'shelf_No' => 'required',
            'rack_No' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $rack = new LibraryShelf();
            $rack->shelf_No = $request->get('shelf_No');
            $rack->rack_Id = $request->get('rack_No');
            $rack->save();
            $request->flash();
            return response()->json(['message' => 'Successfully Added!']);
        }

    }


    public function ShowShelf($id)
    {

        $parameter = array('shelf_Id' => $id);
        $shelf = LibraryShelf::where($parameter)->first();
        $shelf->rack_No = $shelf->rack?$shelf->rack->rack_No:'';
        return Response::json($shelf);

    }


    public function EditShelf($id)
    {
        //dd($id);
        $where = array('shelf_Id' => $id);
        $shelf = LibraryShelf::where($where)->first();
        return Response::json($shelf);
    }


    public function UpdateShelf(Request $request)
    {
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'shelf_No' => 'required',
            'rack_No' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $form_data = array(
                'shelf_No'     => $request->shelf_No,
                'rack_Id'      => $request->rack_No,
            );

            LibraryShelf::where('shelf_Id', $request->id)->update($form_data);
            $request->flash();
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function DeleteShelf($id)
    {

        LibraryShelf::where('shelf_Id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}

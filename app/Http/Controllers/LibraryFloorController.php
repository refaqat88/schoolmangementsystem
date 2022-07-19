<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Models\LibraryFloor;
use App\Models\LibraryShelf;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class LibraryFloorController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:view-library', ['only' => ['index','ShowFloor']]);


        $this->middleware('permission:add-library', ['only' => ['AddFloor']]);
        $this->middleware('permission:edit-library', ['only' => ['EditFloor','UpdateFloor']]);
        $this->middleware('permission:delete-library', ['only' => ['DeleteFloor']]);
    }

    public function index()
    {
  
        $shelves = LibraryShelf::all();
        $libraries = LibraryFloor::all();
        
        return view('library.library-floor', compact('libraries', 'shelves'));
    }


    public function AddFloor(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'floorName' => 'required',
            'shelfId' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $libraryfloor = new LibraryFloor();
            $libraryfloor->floor_Name = $request->get('floorName');
            $libraryfloor->shelf_Id = $request->get('shelfId');

            $libraryfloor->save();
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function ShowFloor($id)
    {
        $where = array('floor_Id' => $id);
        $floor = LibraryFloor::where($where)->first();
        return Response::json($floor);

    }


    public function EditFloor($id)
    {

        $where = array('floor_Id' => $id);
        $floor = LibraryFloor::where($where)->first();
        return Response::json($floor);
    }


    public function UpdateFloor(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'floor_name' => 'required',
            'shelfid' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $form_data = array(
                'floor_Name'      => $request->floor_name,
                'shelf_Id' => $request->shelfid
            );
            //dd($form_data);

            LibraryFloor::where('floor_Id', $request->id)->update($form_data);
            $request->flash();
            return response()->json(['message' => 'Successfully Updated!']);
        }
    }


    public function DeleteFloor($id)
    {
        LibraryFloor::where('floor_Id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}

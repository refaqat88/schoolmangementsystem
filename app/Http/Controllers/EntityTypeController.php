<?php

namespace App\Http\Controllers;

use App\Models\EntityType;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class EntityTypeController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:view-library', ['only' => ['index','ShowEntityType']]);


        $this->middleware('permission:add-library', ['only' => ['AddEntityType']]);
        $this->middleware('permission:edit-library', ['only' => ['EditEntityType','UpdateEntityType']]);
        $this->middleware('permission:delete-library', ['only' => ['DeleteEntityType']]);
    }

    public function index()
    {

        $entityTypes = EntityType::all();
        return view('library.entity-type', compact('entityTypes'));
    }


    public function AddEntityType(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'entitytypeName' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $entitytype = new EntityType();
            $entitytype->ent_typ_Name = $request->get('entitytypeName');
            $entitytype->save();
            $request->flash();
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function ShowEntityType($id)
    {
        $where = array('ent_typ_Id' => $id);
        $entityTypes = EntityType::where($where)->first();
        return Response::json($entityTypes);

    }


    public function EditEntityType($id)
    {

        $where = array('ent_typ_Id' => $id);
        $entityTypes = EntityType::where($where)->first();
        return Response::json($entityTypes);
    }


    public function UpdateEntityType(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'entitytypeName' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $form_data = array(
                'ent_typ_Name'      => $request->entitytypeName,
            );

            EntityType::where('ent_typ_Id', $request->id)->update($form_data);
            $request->flash();
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function DeleteEntityType($id)
    {

        EntityType::where('ent_typ_Id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}

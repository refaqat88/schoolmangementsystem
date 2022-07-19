<?php

namespace App\Http\Controllers;


use App\Models\GeneralEntity;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class GeneralEntityController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:view-library', ['only' => ['index','ShowGeneralEntity']]);
        $this->middleware('permission:add-library', ['only' => ['AddGeneralEntity']]);
        $this->middleware('permission:edit-library', ['only' => ['EditGeneralEntity','UpdateGeneralEntity']]);
        $this->middleware('permission:delete-library', ['only' => ['DeleteGeneralEntity']]);
    }

    public function index()
    {
        $suppliers = Supplier::all();
        $general_entities = DB::table('general_entity')
                  ->join('supplier','general_entity.supp_Id','=','supplier.supp_Id')->get();
        //dd($general_entities);
        return view('library.general-entity', compact('general_entities','suppliers'));
    }


    public function AddGeneralEntity(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'entity_Name' => 'required',
            'single_price' => 'required',
            'quantity' => 'required',
            'discount' => 'required',
            'total_price' => 'required',
            'supplier' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $rack = new GeneralEntity();
            $rack->gent_Name = $request->get('entity_Name');
            $rack->gent_single_Price = $request->get('single_price');
            $rack->gent_Quantity = $request->get('quantity');
            $rack->gent_Discount = $request->get('discount');
            $rack->gent_tot_Price = $request->get('total_price');
            $rack->supp_Id = $request->get('supplier');
            $rack->save();
            $request->flash();
            return response()->json(['message' => 'Successfully Added!']);
        }

    }


    public function ShowGeneralEntity($id)
    {

        $where = array('gent_Code' => $id);
        $general_entity = DB::table('general_entity')
            ->join('supplier','general_entity.supp_Id','=','supplier.supp_Id')->where($where)->first();

        return Response::json($general_entity);

    }


    public function EditGeneralEntity($id)
    {
        //dd($id);
        $where = array('gent_Code' => $id);
        $shelf = GeneralEntity::where($where)->first();
        return Response::json($shelf);
    }


    public function UpdateGeneralEntity(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'entity_Name' => 'required',
            'single_price' => 'required',
            'quantity' => 'required',
            'discount' => 'required',
            'total_price' => 'required',
            'supplier' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $form_data = array(
            'gent_Name' => $request->entity_Name,
            'gent_single_Price' => $request->single_price,
            'gent_Quantity' => $request->quantity,
            'gent_Discount' => $request->discount,
            'gent_tot_Price' => $request->total_price,
            'supp_Id' => $request->supplier,
            );

            GeneralEntity::where('gent_Code', $request->id)->update($form_data);
            $request->flash();
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function DeleteGeneralEntity($id)
    {

        GeneralEntity::where('gent_Code',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}

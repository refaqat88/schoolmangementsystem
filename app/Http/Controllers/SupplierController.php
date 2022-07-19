<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:view-library', ['only' => ['index','ShowSupplier']]);
        $this->middleware('permission:add-library', ['only' => ['AddSupplier']]);
        $this->middleware('permission:edit-library', ['only' => ['EditSupplier','UpdateStationary']]);
        $this->middleware('permission:delete-library', ['only' => ['DeleteSupplier']]);
    }


    public function index()
    {
        //echo "dsffffffffffffffffffffffff"; exit;
        $suppliers = Supplier::all();
        return view('library.supplier', compact('suppliers'));
    }


    public function AddSupplier(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'supplier_Name' => 'required',
            'supplier_Contact' => 'required',
            'supplier_Address' => 'required',
            'status' => 'required'


        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $supplier = new Supplier();
            $supplier->supp_Name = $request->get('supplier_Name');
            $supplier->supp_Contact = $request->get('supplier_Contact');
            $supplier->supp_Add = $request->get('supplier_Address');
            $supplier->supp_Status = $request->get('status');

            $supplier->save();
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function ShowSupplier($id)
    {
        $where = array('supp_Id' => $id);
        $supplier = Supplier::where($where)->first();
        return Response::json($supplier);

    }


    public function EditSupplier($id)
    {

        $where = array('supp_Id' => $id);
        $suppliers = Supplier::where($where)->first();
        return Response::json($suppliers);
    }


    public function UpdateSupplier(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'supplier_Name' => 'required',
            'supplier_Contact' => 'required',
            'supplier_Address' => 'required',
            'status' => 'required'


        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $form_data = array(
                'supp_Name'      => $request->supplier_Name,
                'supp_Contact' => $request->supplier_Contact,
                'supp_Add' => $request->supplier_Address,
                'supp_Status' => $request->status
            );
            Supplier::where('supp_Id', $request->id)->update($form_data);
            $request->flash();
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function DeleteSupplier($id)
    {

        Supplier::where('supp_Id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}

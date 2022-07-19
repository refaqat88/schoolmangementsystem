<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class PublisherController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:view-library', ['only' => ['index','ShowPublisher']]);
        $this->middleware('permission:add-library', ['only' => ['AddPublisher']]);
        $this->middleware('permission:edit-library', ['only' => ['EditPublisher','UpdatePublisher']]);
        $this->middleware('permission:delete-library', ['only' => ['DeletePublisher']]);
    }

    public function index()
    {

        $publishers = Publisher::all();
        return view('library.publisher', compact('publishers'));
    }


    public function AddPublisher(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'publisherName' => 'required',
            'publisherContact' => 'required|integer',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $publisher = new Publisher();
            $publisher->pub_Name = $request->get('publisherName');
            $publisher->pub_Contact = $request->get('publisherContact');
            $publisher->pub_Status = $request->get('status');
            $publisher->save();
            $request->flash();
            return response()->json(['message' => 'Successfully Added!']);
        }


        // return redirect('add-subject')->with('message', 'Successfully Added!');;
        ///
        //return redirect()->back()->with('message', 'Successfully Added!');


    }


    public function ShowPublisher($id)
    {
        $where = array('pub_Id' => $id);
        $publisher = Publisher::where($where)->first();
        return Response::json($publisher);

    }


    public function EditPublisher($id)
    {
        $where = array('pub_Id' => $id);
        $publisher = Publisher::where($where)->first();
//        dd($publisher);
        return Response::json($publisher);
    }


    public function UpdatePublisher(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'publisherName' => 'required',
            'publisherContact' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $form_data = array(
                'pub_Name'      => $request->publisherName,
                'pub_Contact' => $request->publisherContact,
                'pub_Status' => $request->status
            );
            //dd($form_data);


            Publisher::where('pub_Id', $request->id)->update($form_data);
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function DeletePublisher($id)
    {
        Publisher::where('pub_Id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}

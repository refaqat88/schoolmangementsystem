<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:view-library', ['only' => ['index','ShowAuthor']]);
        $this->middleware('permission:add-library', ['only' => ['AddAuthor']]);
        $this->middleware('permission:edit-library', ['only' => ['EditAuthor','UpdateAuthor']]);
        $this->middleware('permission:delete-library', ['only' => ['DeleteAuthor']]);
    }

    public function index()
    {
        $authors = Author::all();
        return view('library.author', compact('authors'));
    }


    public function AddAuthor(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'authorName' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $author = new Author();
            $author->auth_Name = $request->get('authorName');
            $author->save();
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);
        }


        // return redirect('add-subject')->with('message', 'Successfully Added!');;
        ///
        //return redirect()->back()->with('message', 'Successfully Added!');


    }


    public function ShowAuthor($id)
    {
        $where = array('auth_Id' => $id);
        $Author = Author::where($where)->first();
        return Response::json($Author);

    }


    public function EditAuthor($id)
    {
        $where = array('auth_Id' => $id);
        $author = Author::where($where)->first();
        return Response::json($author);
    }


    public function UpdateAuthor(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'authorName' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $form_data = array(
                'auth_Name'      => $request->authorName,
            );
            //dd($form_data);


            Author::where('auth_Id', $request->id)->update($form_data);
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function DeleteAuthor($id)
    {

        Author::where('auth_Id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}

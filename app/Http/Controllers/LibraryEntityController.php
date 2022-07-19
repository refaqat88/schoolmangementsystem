<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\GeneralEntity;
use App\Models\LibraryEntity;
use App\Models\Publisher;
use App\Models\StationaryEdition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class LibraryEntityController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:view-library', ['only' => ['index','ShowLibraryEntity']]);


        $this->middleware('permission:add-library', ['only' => ['AddLibraryEntity']]);
        $this->middleware('permission:edit-library', ['only' => ['EditLibraryEntity','UpdateLibraryEntity']]);
        $this->middleware('permission:delete-library', ['only' => ['DeleteLibraryEntity']]);
    }


    public function index()
    {
        $general_entities = GeneralEntity::all();
        $editions = StationaryEdition:: all();
        $publishers = Publisher::all();
        $authers = Author::all();


        $library_entities = DB::table('library_entity')
                              ->join('publisher', 'library_entity.pub_Id','=','publisher.pub_Id')
                              ->join('author', 'library_entity.auth_Id','=','author.auth_Id')
                              ->join('stationary_edition', 'library_entity.edition_Id','=','stationary_edition.edition_Id')
                              ->join('general_entity', 'library_entity.gent_Code','=','general_entity.gent_Code')
                              ->get();


                              
        //dd($library_entities);
        return view('library.library-entity', compact('library_entities','general_entities','editions','publishers','authers'));
    }


    public function AddLibraryEntity(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'author' => 'required',
            'publisher' => 'required',
            'edition' => 'required',
            'general_entity' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $libraryEntity = new LibraryEntity();
            $libraryEntity->auth_Id = $request->get('author');
            $libraryEntity->pub_Id = $request->get('publisher');
            $libraryEntity->edition_Id = $request->get('edition');
            $libraryEntity->gent_Code = $request->get('general_entity');

            $libraryEntity->save();
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);
        }


        // return redirect('add-subject')->with('message', 'Successfully Added!');;
        ///
        //return redirect()->back()->with('message', 'Successfully Added!');


    }


    public function ShowLibraryEntity($id)
    {
        $where = array('lent_Code' => $id);
        $floor = $library_entities = DB::table('library_entity')
            ->join('publisher', 'library_entity.pub_Id','=','publisher.pub_Id')
            ->join('author', 'library_entity.auth_Id','=','author.auth_Id')
            ->join('stationary_edition', 'library_entity.edition_Id','=','stationary_edition.edition_Id')
            ->join('general_entity', 'library_entity.gent_Code','=','general_entity.gent_Code')
            ->where($where)->first();
        return Response::json($floor);

    }


    public function EditLibraryEntity($id)
    {

        $where = array('lent_Code' => $id);
        $library_entity = LibraryEntity::where($where)->first();
        return Response::json($library_entity);
    }


    public function UpdateLibraryEntity(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'author' => 'required',
            'publisher' => 'required',
            'edition' => 'required',
            'general_entity' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $form_data = array(
                'auth_Id' => $request->get('author'),
                'pub_Id' => $request->get('publisher'),
                'edition_Id' => $request->get('edition'),
                'gent_Code' => $request->get('general_entity'),
            );
            //dd($form_data);

            LibraryEntity::where('lent_Code', $request->id)->update($form_data);
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);
        }
    }


    public function DeleteLibraryEntity($id)
    {
        LibraryEntity::where('lent_Code',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}

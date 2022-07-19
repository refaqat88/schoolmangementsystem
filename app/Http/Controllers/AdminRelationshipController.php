<?php

namespace App\Http\Controllers;
use App\Models\Relationship;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;

class AdminRelationshipController extends Controller
{

    public function index()
    {
        $relationships = Relationship::all();

        return view('admin.relationship.index', compact('relationships'));
    }

    public function create()
    {
        return view('admin.relationship.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'relationship'  => 'required|unique:relationship,relation_Name',
        ]);

        $relationship = new Relationship();

        $relationship->relation_Name = $request->relationship;
        $relationship->save();

        if($relationship){
            return redirect('admin/relationship')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $relationship = Relationship::findOrFail($id);
        return view('admin.relationship.edit', compact('relationship'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'relationship'  => 'required',
        ]);

        $update = [

            'relation_Name' => $request->relationship,


        ];

        Relationship::where('pk_relat_Id',$request->id)->update($update);

        return redirect('admin/relationship')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $national = Relationship::where('pk_relat_Id',$id);
        $national->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

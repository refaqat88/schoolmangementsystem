<?php

namespace App\Http\Controllers;
use App\Models\Cast;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;

class AdminCastController extends Controller
{

    public function index()
    {
        $casts = Cast::all();

        return view('admin.cast.index', compact('casts'));
    }

    public function create()
    {
        return view('admin.cast.create');
    }
    public function store(Request $request)
    {
        //dd($request->nationality);
        $request->validate([
            'cast'  => 'required|unique:cast',
        ]);

        $cast = new Cast();

        $cast->cast = $request->cast;
        $cast->save();

        if($cast){
            return redirect('admin/cast')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $cast = Cast::findOrFail($id);
        return view('admin.cast.edit', compact('cast'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'cast'  => 'required',
        ]);

        $update = [

            'cast' => $request->cast,


        ];

        Cast::where('cast_Id',$request->id)->update($update);

        return redirect('admin/cast')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $national = Cast::where('cast_Id',$id);
        $national->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

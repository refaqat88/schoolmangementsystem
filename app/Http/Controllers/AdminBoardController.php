<?php

namespace App\Http\Controllers;
use App\Models\Board;
use App\Models\EducationLevel;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;

class AdminBoardController extends Controller
{

    public function index()
    {
        $boards = Board::all();
        return view('admin.board.index', compact('boards'));
    }

    public function create()
    {
        $education_levels = EducationLevel::all();
        return view('admin.board.create', compact('education_levels'));
    }
    public function store(Request $request)
    {
        //dd($request->nationality);
        $request->validate([
            'board_Name'  => 'required|unique:boards,board_Name',
            'education_level'  => 'required',
        ]);

        $board = new Board();

        $board->board_Name = $request->board_Name;
        $board->education_level = $request->education_level;
        $board->save();

        if($board){
            return redirect('admin/board-university')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $board = Board::findOrFail($id);
        $education_levels = EducationLevel::all();
        return view('admin.board.edit', compact('board','education_levels'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'board_Name'  => 'required',
            'education_level'  => 'required',
        ]);

        $update = [

            'board_Name' => $request->board_Name,
            'education_level' => $request->education_level,


        ];

        Board::where('pk_board_Id',$request->id)->update($update);

        return redirect('admin/board-university')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $national = Board::where('pk_board_Id',$id);
        $national->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

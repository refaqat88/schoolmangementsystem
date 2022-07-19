<?php

namespace App\Http\Controllers;
use App\Models\EmployeeType;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\Designation;
Use DB;
//use Illuminate\Support\Facades\Validator;

class AdminDesignationController extends Controller
{

    public function index()
    {
        $designations = Designation::all();
        //dd($designations);

        return view('admin.designation.index', compact('designations'));
    }

    public function create()
    {
        $employee_types = EmployeeType::all();
        return view('admin.designation.create',compact('employee_types'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'designation'  => 'required|unique:designation',
            'employee_type' => 'required',
            'status'  => 'required',
        ]);

        $designation = new Designation;

        $designation->designation = $request->designation;
        $designation->emp_typ_Id = $request->employee_type;
        $designation->desig_Status = $request->status;
        $designation->save();

        if($designation){
            return redirect('admin/designation')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {
        $employee_types = EmployeeType::all();
        $designation  = Designation::findOrFail($id);
        return view('admin.designation.edit', compact('designation','employee_types'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'designation'  => 'required',
            'employee_type' => 'required',
            'status'  => 'required',
        ]);

        $update = [

            'designation' => $request->designation,
            'emp_typ_Id' => $request->employee_type,
            'desig_Status' => $request->status,


        ];

        Designation::where('desig_Id',$request->id)->update($update);

        return redirect('admin/designation')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $national = Designation::where('desig_Id',$id);
        $national->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;
use App\Models\Designation;
use App\Models\EmployeeType;
Use DB;
//use Illuminate\Support\Facades\Validator;

class AdminEmployeeTypeController extends Controller
{

    public function index()
    {
        $employee_types  = EmployeeType::all();

        return view('admin.employee-type.index', compact('employee_types'));
    }

    public function create()
    {
        //$designations  = Designation::all();
        return view('admin.employee-type.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'employee_type'  => 'required',
        ]);

        $emp_type = new EmployeeType();


        $emp_type->emp_Type = $request->employee_type;
        $emp_type->save();

        if($emp_type){
            return redirect('admin/employee-type')->with('message', 'Successfully added');
        }else{
            $request->flash();
            return redirect()->back()-with('error');
        }


    }

    public function edit($id)
    {

        $employee_type  = EmployeeType::findOrFail($id);
        //$designations  = Designation::all();
        return view('admin.employee-type.edit', compact('designations', 'employee_type'));
    }
    public function update(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'employee_type'  => 'required',
        ]);
        $update = [

            'emp_Type' => $request->employee_type,
        ];

        EmployeeType::where('emp_typ_Id',$request->id)->update($update);

        return redirect('admin/employee-type')->with('message', 'Successfully Updated');

    }

    public function delete($id)
    {

        $national = EmployeeType::where('emp_typ_Id',$id);
        $national->delete();
        return redirect()->back()->with('message', 'Successfully deleted');

    }
}

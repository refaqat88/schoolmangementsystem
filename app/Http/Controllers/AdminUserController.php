<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Redirect,Response;
//use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{

    public function UserType()
    {
        $user_types = UserType::all();
        //dd($user_types);
        return view('admin.user.type.index', compact('user_types'));
    }
    public function CreateUserTypeView()
    {
        return view('admin.user.type.create');
    }

    public function CreateUserType(Request $request)
    {
     $request->validate([
                'user_type_Name'  => 'required|unique:user_type',
     ]);

        $user_type = new UserType();
        $user_type->user_type_Name = $request->get('user_type_Name');
        $user_type->save();
        return redirect('admin/user-type')->with('message', 'Successfully Added!');


    }

    public function ShowUserType($id)
    {

        $where = array('id' => $id);
        $user = UserType::where($where)->first();
        return Response::json($user);

    }


    public function EditUserType($id)
    {
        $where = array('user_type_Id' => $id);
        $user_type = UserType::where($where)->first();
        //dd($user_type);
        return view('admin.user.type.edit', compact('user_type'));
    }

    public function UpdateUserType(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'user_type_Name'  => 'required',
        ]);

        $form_data = array(
            'user_type_Name'      => $request->user_type_Name,
        );
        //dd($form_data);
        UserType::where('user_type_Id', $request->id)->update($form_data);
        //$request->flash();
        return redirect('admin/user-type')->with('message', 'Successfully Updated!');

    }

    public function DeleteUserType($id)
    {
        UserType::where('user_type_Id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}

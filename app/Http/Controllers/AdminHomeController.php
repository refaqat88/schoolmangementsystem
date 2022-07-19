<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Redirect,Response;


class AdminHomeController extends Controller
{

    public function index()
    {

        
        return view('admin.dashboard');
    }

    public function profileView()
    {
        $adminprofile = User::findOrFail(Auth::user()->id);
//        dd(Session::get('userData'));
//        dd($adminprofile);
        return view('admin/users.profile', compact('adminprofile'));
    }

    public function ProfileEdit()
    {
        $adminprofile =User::findOrFail(Auth::user()->id);
//        dd($adminprofile);
        return view('admin/users.profile-edit', compact('adminprofile'));
    }

    public function ProfileUpdate(Request $request)
    {
        

        $request->validate([
            'name'    => 'required',
            'email'    => 'required',
            'confirmpassword' => 'same:password',
            'user_image' => 'image|mimes:jpeg,png,jpg,png|max:1024',
        ]);

        
        
        $form_data = array(
            'name'      => $request->name,
            'email' => $request->email,
        );




        if ($request->password !=''){
            $form_data['password'] = Hash::make($request->get('password'));
            //dd($form_data['password']);
        }
        if ($request->hasFile('user_image')) {
            $user_image = $request->file('user_image');
            $new_user_image = "user" . time() . '.' . $user_image->getClientOriginalExtension();
            $user_image->move(public_path('upload/user'), $new_user_image);
            $form_data['user_image'] = $new_user_image;
        }
//        dd($form_data);
        User::where('id',Auth::user()->id)->update($form_data);
        $request->flash();
        return redirect()->back()->with('message', 'Successfully Updated!');
    }

}

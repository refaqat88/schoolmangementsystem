<?php

namespace App\Http\Controllers;
use App\Models\EmergencyContact;
use App\Models\EmployeeInfo;
use App\Models\Guardian;
use App\Models\MaritalStatus;
use App\Models\Nationality;
use App\Models\Relationship;
use App\Models\UserType;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;
use Redirect,Response; 
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use File;

//use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
class UserController extends Controller
{

      function __construct()
    {

        $this->middleware('permission:view-users|add-user|edit-user', ['only' => ['index','show']]);


        $this->middleware('permission:add-user', ['only' => ['CreateUser']]);
        $this->middleware('permission:edit-user', ['only' => ['EditUser','UpdateUser']]);
        // $this->middleware('permission:delete-schedule', ['only' => ['delete']]);
    }


    public function index(Request $request)
    {

        $roles = Role::where('name','!=', 'super admin')->get();
        if ($request->role){
            //dd($request->role);
            $users = User::whereHas('roles', function ($q) use ($request) {
            $q->where('id' , $request->role);
        })->orderBy('id','desc')->get();
        return view('users.partials.user_data', compact('users'))->render();
    }else{

        $users = User::whereHas('roles', function ($q) {

            $q->whereNotIn(
                'name', ['Super Admin']);

        })->get();
        }
        //$users = User::all();
        //$roles = Role::where('name','!=', 'super admin')->get();
        return view('users.index', compact('users','roles'));

    }
     public function userslist(Request $request)
    {
     $data = User::orderBy('id','DESC')->get();
        return view('admin.users.index',compact('data'));
            //->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function ProfileView()
    {    

        $user = User::findOrFail(Auth::user()->id);
        $role = $user->roles->first();
        // Teacher
        
        if($role->name=='Teacher'){

            $adminprofile = User::where('id',Auth::id())->first();
            return view('teacher.profile', compact('user'));
        }


    }
    public function ProfileEdit()
    {
        
        $relationship = Relationship::all();
        $country = Nationality::all();
        $maritalStatus = MaritalStatus::all();
        $user = User::where('id',  Auth::user()->id)->first();
        $user_role = $user->roles->first();
        
        if($user_role->name=='Teacher'){

            return view('teacher.profile_edit', compact('user','country','relationship', 'maritalStatus'));
        }else{
        
            return view('profile-edit', compact('user', 'user_role'));


        }
    }
    public function ProfileUpdate(Request $request)
    {
        $user = User::where('id',  Auth::user()->id)->first();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone'    => 'required',
            'email'    => 'required',
            'password' => 'confirmed',

        ]);

        if ($validator->fails()) {
            return redirect('profile-edit')
                ->withInput()
                ->withErrors($validator);
        }else {
 
            $form_data = array(
                'username' => $request->username,
                'email' => $request->email,
                'name' => $request->name,
                'phone' => $request->phone,
            );
            if ($request->password !='' && $request->password_confirmation !='' && $request->password ==$request->password_confirmation){
                $form_data['password'] = Hash::make($request->password);
            }
            if ($request->hasFile('user_image')) {

                if(File::exists(public_path('upload/user/'.$user->user_image))){
                    File::delete(public_path('upload/user/'.$user->user_image));
                }
                $user_image = $request->file('user_image');
                $new_user_image = "user" . time() . '.' . $user_image->getClientOriginalExtension();
                $user_image->move(public_path('upload/user'), $new_user_image);
                $form_data['user_image'] = $new_user_image;
            }

            User::where('id', Auth::user()->id)->update($form_data);
            $request->flash();
            return redirect()->back()->withSuccess('Successfully Updated!');

        }

    }

    public function ResetUserPaassword(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        //dd($user->username);
        $form_data = array();

        $form_data = array(
            'password'      => Hash::make($user->username)
        );

        //dd($form_data);
        User::where('id',  $request->id)->update($form_data);
        $request->flash();
        return redirect()->back()->with('message', 'Successfully Updated!');

    }


    public function LoginPage(){

        return view('login');
    }

    public function Login(Request $request){
   
        $request->validate([
            'username'    => 'required',
            'password' => 'required'
        ]);
   
        $username = $request->get('username');
        $password = $request->get('password');
        $language = $request->get('language');


         

        if (Auth::attempt(['username' => $username, 'password' => $password, 'status' => 'Active'])) {
 
            $role = auth()->user()->roles->first();


            if($role->name=='Super Admin'){
                
               return  redirect('/admin/home');
               exit;
             
            }
          
           app()->setlocale($language); //echo  $language;exit;
           session()->put('locale', $language);
            
           return  redirect('/home');


        }else{
            $request->flashExcept('password');
             return back()->with('error', 'User is not found or Account is not active');
        }

    }


    public function CreateUser(Request $request)
    {

        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'roles' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'password_confirmation' => 'same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
           
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $input['status'] = ($request->get('status'))? 'Active' : 'Inactive';
            $user = User::create($input);
            $user->assignRole($request->input('roles'));
            return response()->json(['message' => 'Successfully Added!']);
        }



    }


    public function ShowUser($id)
    {

        $where = array('id' => $id);
        $user = User::where($where)->first();
        $user->type = $user->roles->pluck('name','name')->first();
        //dd($user->type);
        return Response::json($user);

    }

    public function ShowParent($id)
    {

        $where = array('id' => $id);
        $user = User::where($where)->first();
        //dd($user->guardianInfo);
        $user->genderName = $user->guardianInfo->gender?$user->guardianInfo->gender->gender:'';
        //dd($user->genderName);
        $user->occupationName = $user->guardianInfo->occupation?$user->guardianInfo->occupation->occup_Name:'';
        $user->designationName = $user->guardianInfo->designation?$user->guardianInfo->designation->designation:'';
        $user->relationshipName = $user->guardianInfo->relationship?$user->guardianInfo->relationship->relation_Name:'';
        $user->employerName = $user->guardianInfo?$user->guardianInfo->prnt_employer_name:'';
        $user->pnt_marital_Status = $user->guardianInfo?$user->guardianInfo->pnt_marital_Status:'';
        //dd($user->pnt_marital_Status);
        return Response::json($user);

    }


     public function EditUserAdmin($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('admin.users.edit',compact('user','roles','userRole'));
    }


     public function UpdatuserAdmin(Request $request, $id)
    
    {
      //  dd('da');
      $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
         DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));

    
        return redirect()->route('admin.user.index')
                        ->with('success','User updated successfully');
    }

    

    public function EditUser($id)
    {
        
        $user = User::findOrFail($id);
        $user->user_type = $user->roles->pluck('id')->first();
        
        return Response::json($user);
    }
    public function EditParent($id)
    {

        $user = User::findOrFail($id);
        //dd($user->guardianInfo);
        $user->gnd_Id = $user->guardianInfo->gender?$user->guardianInfo->gender->gnd_Id:'';
        $user->gender = $user->guardianInfo->gender?$user->guardianInfo->gender->gender:'';
        $user->occup_Id = $user->guardianInfo->occup_Id?$user->guardianInfo->occup_Id:'';
        $user->desig_Id = $user->guardianInfo->desig_Id?$user->guardianInfo->desig_Id:'';
        $user->fk_relat_Id = $user->guardianInfo->fk_relat_Id?$user->guardianInfo->fk_relat_Id:'';
        $user->employer = $user->guardianInfo?$user->guardianInfo->prnt_employer_name:'';
        $user->employer = $user->guardianInfo?$user->guardianInfo->prnt_employer_name:'';
        $user->pnt_marital_Status = $user->guardianInfo?$user->guardianInfo->pnt_marital_Status:'';
        $user->working_status = $user->guardianInfo?$user->guardianInfo->working_status:'';
        $user->pnt_off_Ph = $user->guardianInfo?$user->guardianInfo->pnt_off_Ph:'';
        $user->pnt_home_Ph = $user->guardianInfo?$user->guardianInfo->pnt_home_Ph:'';
 /*       $user->gnd_Id = $user->guardianInfo->gender?$user->guardianInfo->gender->gnd_Id:'';
        $user->occup_Id = $user->guardianInfo->occupation?$user->guardianInfo->occupation->occup_Id:'';
        $user->desig_Id = $user->guardianInfo->designation?$user->guardianInfo->designation->desig_Id:'';
        $user->fk_relat_Id = $user->guardianInfo->relationship?$user->guardianInfo->relationship->fk_relat_Id:'';
        $user->employer = $user->guardianInfo?$user->guardianInfo->prnt_employer_name:'';*/

        //$user->user_type = $user->roles->pluck('id')->first();

        return Response::json($user);
    }


    public function UpdateUser(Request $request)
    {
        //dd($request->all());
        $id = $request->id;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'roles' => 'required',
            'username' => 'required',
            'mobile' => 'required',
        ]);



        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()]);

        }else {


            $input = $request->all();

            if(!empty($input['password'])){ 
                $input['password'] = Hash::make($input['password']);
            }else{
                $input = Arr::except($input,array('password'));    
            }

            if(!empty($input['status'])){
                $input['status'] = 'active';
            }else{
                $input['status'] = 'Inactive';
            }
        
            $user = User::find($id);
            $input['phone'] = $input['mobile'];
            $user->update($input);

            DB::table('model_has_roles')->where('model_id',$id)->delete();

            $user->assignRole($request->input('roles'));

            return response()->json(['message' => 'Successfully Updated!']);
        }


        //dd($form_data);



    //return redirect()->back()->with('message', 'Successfully Updated!');

    }

    public function UpdateParent(Request $request)
    {

        //dd($request->all());

        $id = $request->id;
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'mobile' => 'required',
            'cnic' => 'required',
            'relation' => 'required',
            'gender' => 'required',
           /* 'occupation' => 'required',
            'designation' => 'required',
            'employer' => 'required',*/

        ]);



        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()]);

        }else {


            $user = [
                     'name' => $request->full_name,
                     'username' => $request->cnic,
                     'phone' => $request->mobile,
                     'status' => $request->status?'Active':'Inactive',

                ];
            $parentinfo = [
                     'fk_relat_Id' => $request->relation,
                     'occup_Id' => $request->occupation,
                     'gnd_Id' => $request->gender,
                     'desig_Id' => $request->designation,
                     'prnt_employer_name' => $request->employer,
                     'pnt_off_Ph'  => $request->pnt_off_Ph,
                     'pnt_home_Ph'  => $request->pnt_home_Ph,

                ];
            if ($request->marital_status){
                $parentinfo['pnt_marital_Status'] = $request->marital_status;
            }if ($request->working_status){
                $parentinfo['working_status'] = $request->working_status;

            }

            if ($request->hasFile('user_image')) {
                $user_image = $request->file('user_image');
                $new_user_image = "user" . time() . '.' . $user_image->getClientOriginalExtension();
                $user_image->move(public_path('upload/user'), $new_user_image);
                $user['user_image'] = $new_user_image;

            }

            User::where('id',$id)->update($user);
            Guardian::where('user_id',$id)->update($parentinfo);

            return response()->json(['message' => 'Successfully Updated!']);
        }


       
    }


    public function Logout()
    {
        session()->flush(); 
        return Redirect('login');
    }
    public function DeleteUser($id)
    {
        User::where('id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}

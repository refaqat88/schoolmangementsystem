<?php

namespace App\Http\Controllers;
use App\Models\Designation;
use App\Models\Gender;
use App\Models\Guardian;
use App\Models\Occupation;
use App\Models\Relationship;
use App\Models\MaritalStatus;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class GuardianController extends Controller
{
    public function index()
    {
        $parents = User::whereHas('roles', function ($q) {
            $q->where('name','parents');
        })->get();
        $genders = Gender::all();
        $ralationship = Relationship::all();
        $occupations = Occupation::all();
        $designations = Designation::all();
        $marital_statuses = MaritalStatus::all();
      
        $roles = Role::where('name','=', 'parents')->get();
        return view('parents.index', compact('parents','roles','genders','ralationship','occupations','designations','marital_statuses'));

    }

    public function getGuardianFatherPicture($id){

        $guadianimageData =  User::where('id', $id)->first();

        return $guadianimageData;

    }
    public function getGuardianMotherPicture($id){

        //$gender = Gender::where('gender','Male')->first();
        $guadianMotherimageData = User::where('id', $id)->first();

        return $guadianMotherimageData;

    }
    public function getGuardianFather(){
        $gender = Gender::where('gender','Male')->first();
        $guadianfatherData = User::whereHas('roles', function ($q) {
            $q->where('name','parents');
        })->whereHas('guardianInfo', function ($q2) use($gender) {
            $q2->where('gnd_Id', $gender->gnd_Id);
        })->orderBy('id','Desc')->first();

        //dd($guadianfatherData);
            //DB::table('parent_info')->orderBy('pnt_Id', 'desc')->join('gender','parent_info.gnd_Id','=','gender.gnd_Id')->where('gender.gender', '==', 'Male')->first();
        //$guadianfatherData = Guardian::orderBy('pnt_Id', 'desc')->where('gnd_Id', '=', 1)->first();
        //dd($guadianfatherData);
        return $guadianfatherData;

    }
    public function getGuardianMother(){

        $gender = Gender::where('gender','Female')->first();
        $guadianMotherData = User::whereHas('roles', function ($q) {
            $q->where('name','parents');
        })->whereHas('guardianInfo', function ($q2) use($gender) {
            $q2->where('gnd_Id', $gender->gnd_Id);
        })->orderBy('id','Desc')->first();

        //$guadianMotherData = DB::table('parent_info')->orderBy('pnt_Id', 'desc')->join('gender','parent_info.gnd_Id','=','gender.gnd_Id')->where('gender.gender', '!=', 'Male')->first();

        //$guadianMotherData = Guardian::orderBy('pnt_Id', 'desc')->where('gnd_Id', '!=', 1)->first();
        //dd($guadianMotherData);
        return $guadianMotherData;

    }

   public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'gender' => 'required',
            'cnic' => 'required|unique:users,username|integer',
            'relation' => 'required',
            'occupation' => 'required',
            'designation' => 'required',
            'marital_status' => 'required',
            'employer' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'guardian_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
             $user_image ='';



            $user = new user();
            $user->name = $request->full_name;
            $user->username = $request->cnic;
            $user->phone = $request->pnt_Ph;
            $user->email = $request->email;
            $user->password = Hash::make($request->get('cnic'));
            $user->status = 'Active';



            if ($request->file('guardian_image')) {
                $parent_image = $request->file('guardian_image');
                $user_image = "user" . time() . '.' . $parent_image->getClientOriginalExtension();
                $parent_image->move(public_path('upload/user/'),$user_image);
                $user->user_image = $user_image;
            }

            
            $user->save();

            $users = User::find($user->id);
               
            DB::table('model_has_roles')->where('model_id',$users->id)->delete();
            $roles = Role::where('name','parents')->first();
            $users->assignRole($roles->id);

            $subject = new Guardian();
            $subject->pnt_Cnic  = $request->cnic;
            $subject->gnd_Id  = $request->gender;
            $subject->occup_Id = $request->occupation;
            $subject->desig_Id  = $request->designation;
            $subject->fk_relat_Id = $request->relation;
            $subject->fk_relat_Id = $request->relation;
            $subject->pnt_off_Ph = $request->pnt_off_Ph;
            $subject->pnt_home_Ph = $request->pnt_home_Ph;


            $subject->pnt_marital_Status  = $request->get('marital_status');
                $subject->prnt_employer_name  = $request->employer;
                $subject->user_id  = $users->id;

                $subject->save();
            $users->photo = $user->photo();
            $users->pnt_off_Ph = $subject->pnt_off_Ph;
            $users->pnt_home_Ph = $subject->pnt_home_Ph;
            $users->photo = $user->photo();
                return response()->json(['message' => 'Successfully Added!','data'=>$users]);



        }

    }

    public function motherInfo(Request $request)
    {
        //dd($request->mother_image);
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'cnic' => 'required|unique:users,username|integer',
            'marital_status' => 'required',
            'working_status' => 'required',
            'gender' => 'required',
            'relation' => 'required',
            'employer' => 'nullable|regex:/^[a-zA-ZÑñ\s]+$/',
            'mother_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

       /*     $user = User::where('username',$request->cnic)->first();
            if(!$user){*/
            $user = new user();
            $user->name = $request->full_name;
            $user->phone = $request->mother_Ph;
            $user->username = $request->cnic;
            $user->password = Hash::make($request->get('cnic'));
            $user->email = $request->email;
            $user->status = 'Active';
            if ($request->file('mother_image')) {
                $parent_image = $request->file('mother_image');
                $user_image1 = "user" . time() . '.' . $parent_image->getClientOriginalExtension();
                $parent_image->move(public_path('upload/user/'),$user_image1);
                $user->user_image = $user_image1;
            }
            $user->save();
            //dd($user);



                $users = User::find($user->id);

                DB::table('model_has_roles')->where('model_id',$user->id)->delete();
                $roles = Role::where('name','parents')->first();
                $user->assignRole($roles->id);
                $subject = new Guardian();
                $subject->pnt_Cnic  = $request->get('cnic');
                $subject->gnd_Id  = $request->get('gender');
                $subject->occup_Id = $request->get('occupation');
                $subject->desig_Id  = $request->get('designation');
                $subject->working_status  = $request->get('working_status');
                $subject->fk_relat_Id = $request->get('relation');
                $subject->prnt_employer_name  = $request->get('employer');
                $subject->pnt_marital_Status  = $request->get('marital_status');
                $subject->pnt_off_Ph = $request->mother_off_Ph;
                $subject->pnt_home_Ph = $request->mother_home_Ph;
                //$subject->user_id  = $user->id;
                $subject->user_id  = $users->id;

                $subject->save();

            $users->photo = $user->photo();
            $users->pnt_off_Ph = $subject->pnt_off_Ph;
            $users->pnt_home_Ph = $subject->pnt_home_Ph;
            $users->photo = $user->photo();
           // }
            return response()->json(['message' => 'Successfully Added!','data'=>$users]);
            //return redirect('add-subject')->with('message', 'Successfully Added!');
        }

    }

}

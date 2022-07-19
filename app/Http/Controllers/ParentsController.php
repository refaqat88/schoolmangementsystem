<?php

namespace App\Http\Controllers;
use App\Models\Designation;
use App\Models\Gender;
use App\Models\Occupation;
use App\Models\Relationship;
use App\Models\UserType;
use Illuminate\Support\Facades\Session;
use App\Models\Guardian;
use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Null_;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
//use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
class ParentsController extends Controller
{

      function __construct()
    {


        
        // $this->middleware('permission:delete-schedule', ['only' => ['delete']]);
    }


    public function index()
    {
        $parents = User::whereHas('roles', function ($q) {
            $q->where('name','parents');
        })->get();
        $genders = Gender::all();
        $ralationship = Relationship::all();
        $occupations = Occupation::all();
        $designations = Designation::all();

        $roles = Role::where('name','=', 'parents')->get();
        return view('parents.index', compact('parents','roles','genders','ralationship','occupations','designations'));

    }



}

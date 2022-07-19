<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\EmployeeInfo;
use App\Models\Library;
use App\Models\LibraryEntity;
use App\Models\LibraryFloor;
use App\Models\Publisher;
use App\Models\StationaryCategory;
use App\Models\StationaryEdition;
use App\Models\StudentInfo;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class LibraryController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:view-library', ['only' => ['index','show']]);


        $this->middleware('permission:add-library', ['only' => ['store']]);
        $this->middleware('permission:edit-library', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-library', ['only' => ['delete']]);
    }

    public function dashboard(){
        return view('library.dashboard');
    }
    public function index()
    {

        $library_entities = DB::table('library_entity')
                            ->join('general_entity','library_entity.gent_Code','=','general_entity.gent_Code')->get();
        //dd($library_entities);
        $library_categories = StationaryCategory::all();
        $library_floors = LibraryFloor::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        $suppliers = Supplier::all();
        $stationary_editions = StationaryEdition::all();
        $employees =EmployeeInfo::where('emp_Status', 'Active')->get();
        //dd($employees);
        $students =StudentInfo::where('std_Status', 'Active')->get();
         // dd($students);
// $subjects = Subject::all();
//        $classes = AddClasses::all();
       $libraries = DB::table('library_info')
                    ->join('library_floor', 'library_info.floor_Id','=','library_floor.floor_Id')
                    ->join('publisher', 'library_info.pub_Id','=','publisher.pub_Id')
                    ->join('supplier', 'library_info.supp_Id','=','supplier.supp_Id')
                    ->join('stationary_edition', 'library_info.edition_Id','=','stationary_edition.edition_Id')
                    ->join('author', 'library_info.auth_Id','=','author.auth_Id')
                    ->join('library_entity', 'library_info.lent_Code','=','library_entity.lent_Code')
                    ->join('stationary_category', 'library_info.stat_categ_Id','=','stationary_category.stat_categ_Id')
                    ->get();
       //dd($libraries);
       return view('library.library',compact('libraries','library_categories','library_floors','authors','publishers','suppliers','stationary_editions','employees','students','library_entities'));
    }


    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'library_enitity' => 'required',
              'category' => 'required',
              'floor' => 'required',
              'condition' => 'required',
              'author' => 'required',
              'publisher' => 'required',
              'supplier' => 'required',
              'edition' => 'required',
              'alert_type' => 'required',
              'issue_date' => 'required',
              'return_date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $library = new Library();
            $library->lent_Code  = $request->get('library_enitity');
            $library->stat_categ_Id  = $request->get('category');
            $library->floor_Id  = $request->get('floor');
            $library->stat_ret_Condition = $request->get('condition');
            $library->auth_Id  = $request->get('author');
            $library->pub_Id  = $request->get('publisher');
            $library->supp_Id   = $request->get('supplier');
            $library->edition_Id  = $request->get('edition');
            $library->std_Id  = $request->get('student');
            $library->emp_Id  = $request->get('teacher');
            $library->stat_alert_Type = $request->get('alert_type');
            $library->stat_iss_Date = $request->get('issue_date');
            $library->stat_ret_Date = $request->get('return_date');
            $library->save();

            return response()->json(['message' => 'Successfully Added!']);
            //return redirect('add-subject')->with('message', 'Successfully Added!');
        }

    }


    public function show($id)
    {

        $library = DB::table('library_info')
            ->join('library_floor', 'library_info.floor_Id','=','library_floor.floor_Id')
            ->join('publisher', 'library_info.pub_Id','=','publisher.pub_Id')
            ->join('supplier', 'library_info.supp_Id','=','supplier.supp_Id')
            ->join('stationary_edition', 'library_info.edition_Id','=','stationary_edition.edition_Id')
            ->join('author', 'library_info.auth_Id','=','author.auth_Id')
            ->join('library_entity', 'library_info.lent_Code','=','library_entity.lent_Code')
            ->join('stationary_category', 'library_info.stat_categ_Id','=','stationary_category.stat_categ_Id')
            ->leftjoin('student_info', 'library_info.std_Id','=','student_info.std_Id')
            ->leftjoin('employee_info', 'library_info.emp_Id','=','employee_info.emp_Id')
            ->where('library_Id',$id)->first();
        //dd($library);

        $library_entities = DB::table('library_entity')
            ->join('general_entity','library_entity.gent_Code','=','general_entity.gent_Code')->where('library_entity.lent_Code',$library->lent_Code)->first();

        //dd($library_entities);
        $library->gent_Name = $library_entities->gent_Name;
        //        $subjects = DB::table('subject')
//            ->whereIn('sub_Id',explode(',',$class->subject))->get();
//
//        $class->subjects = $subjects;

        return Response::json($library);

    }


    public function edit($id)
    {

        $library = DB::table('library_info')
            ->join('library_floor', 'library_info.floor_Id','=','library_floor.floor_Id')
            ->join('publisher', 'library_info.pub_Id','=','publisher.pub_Id')
            ->join('supplier', 'library_info.supp_Id','=','supplier.supp_Id')
            ->join('stationary_edition', 'library_info.edition_Id','=','stationary_edition.edition_Id')
            ->join('author', 'library_info.auth_Id','=','author.auth_Id')
            ->join('library_entity', 'library_info.lent_Code','=','library_entity.lent_Code')
            ->join('stationary_category', 'library_info.stat_categ_Id','=','stationary_category.stat_categ_Id')
            ->leftjoin('student_info', 'library_info.std_Id','=','student_info.std_Id')
            ->leftjoin('employee_info', 'library_info.emp_Id','=','employee_info.emp_Id')
            ->where('library_Id',$id)->first();

        $library_entities = DB::table('library_entity')
            ->join('general_entity','library_entity.gent_Code','=','general_entity.gent_Code')->where('library_entity.lent_Code',$library->lent_Code)->first();

        //dd($library_entities);
        $library->lent_Code = $library_entities->lent_Code;


        //$class->selectedSubjectIds = explode(',',$class->subject);

        return Response::json($library);
    }


    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'library_enitity' => 'required',
            'category' => 'required',
            'floor' => 'required',
            'condition' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'supplier' => 'required',
            'edition' => 'required',
            'alert_type' => 'required',
            'issue_date' => 'required',
            'return_date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{


            $form_data = array(
                //$library = new Library();
            'lent_Code'  => $request->get('library_enitity'),
            'stat_categ_Id'  => $request->get('category'),
            'floor_Id'  => $request->get('floor'),
            'stat_ret_Condition' => $request->get('condition'),
            'auth_Id'  => $request->get('author'),
            'pub_Id'  => $request->get('publisher'),
            'supp_Id'   => $request->get('supplier'),
            'edition_Id'  => $request->get('edition'),
            'std_Id'  => $request->get('student'),
            'emp_Id'  => $request->get('teacher'),
            'stat_alert_Type' => $request->get('alert_type'),
            'stat_iss_Date' => $request->get('issue_date'),
            'stat_ret_Date' => $request->get('return_date'),
            );
            //dd($form_data);


            Library::where('library_Id', $request->id)->update($form_data);
            $request->flash();
            //return redirect('add-subject')->with('message', 'Successfully Updated!');
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function delete($id)
    {
       //dd($id);
        Library::where('library_Id',$id)->delete();
        return redirect('library');
//        return redirect('add-class')->with('message', 'Successfully Deleted!');
    }
}

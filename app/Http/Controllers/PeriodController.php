<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;

class PeriodController extends Controller
{


    function __construct()
    {


        $this->middleware('permission:view-school', ['only' => ['index','show']]);


        $this->middleware('permission:add-school', ['only' => ['store']]);
         
        $this->middleware('permission:edit-school', ['only' => ['edit','update']]);

        $this->middleware('permission:delete-school', ['only' => ['delete']]);
    
    }


    public function index()
    {
        $periods = Period::all();
        return view('school.period', compact('periods'));
    }


    public function store(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'period' => 'required|unique:periods,period',
            'start_time' => 'required',
            'end_time' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $subject = new Period();
            $subject->period = $request->get('period');
            $subject->orders = $request->get('orders');
            $subject->start_time = $request->get('start_time');
            $subject->end_time = $request->get('end_time');
            $subject->save();
            return response()->json(['message' => 'Successfully Added!']);
        }
  }


    public function show($id)
    {

        $where = array('id' => $id);
        $period = Period::where($where)->first();
        return Response::json($period);

    }


    public function edit($id)
    {
        $where = array('id' => $id);
        $period = Period::where($where)->first();
        return Response::json($period);
    }


    public function update(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'period' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $form_data = array(
                'period'      => $request->period,
                'start_time'  => $request->start_time,
                'orders'  => $request->orders,
                'end_time'    => $request->end_time,
            );

            Period::where('id', $request->id)->update($form_data);
            $request->flash();
            return response()->json(['message' => 'Successfully Updated!']);
        }

    }


    public function delete($id)
    {

        Period::where('id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted!');
    }
}

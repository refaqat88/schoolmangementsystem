<?php
namespace App\Http\Controllers;
use App\Models\Account_type;
use App\Models\Chartofaccounts;
use App\Models\School;
use App\Models\User;
use App\Models\Fee_schedule;
use App\Models\Pay_schedule;
use App\Models\Transactions;
use App\Models\Advance_salary;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class PayRollController extends Controller
{
 
    function __construct()
    {    
        
    }


    public function income(Request $request)    {

        $students = User::whereHas('roles', function ($q) {
            $q->where('name','Student');
        })->get();

        
        if($request->type=='transaction')
        {  
            return view('accountPortal.partial.income', compact('students'))->render();
        }


        return view('accountPortal.income' , compact('students'));
    }

 
    /*
        Payrol 
    */
   public function payroll(Request $request){
        $query = User::query();


       $query = $query->whereHas('roles', function ($q) {
                $q->whereNotIn('name' , [ 'Admin','Student', 'Super Admin','parents']);
            });

         

        $query= $query->orderBy('id','desc');



        $PaymentType   = Chartofaccounts::where('acc_Name','Cash on Hand')->OrWhere('acc_Name','Cash at bank')->get();
     
        $accountsdata   = BankAccount::where('user_id',1)->get();
        $status = '';
        
        if($request->type=='transaction')
        { 

            if(isset($request->status) and $request->status!=''){
                $query = $query->where('status', $request->status);
 
            }

            $employes = $query->get();
             
            return view('accountPortal.partial.payroll', compact('employes','PaymentType','accountsdata'))->render();
        }


        $employes = $query->get();
         
        return view('accountPortal.payroll' ,  compact('employes','PaymentType','accountsdata'));

    }


    public function payrolDetail(Request $request,$id)
    {
        
        $employe_get_arrays = config('constants.employe_get_array'); 
        $emplolye = User::whereHas('roles', function ($q)  use ($employe_get_arrays)   {
                $q->whereNotIn('name' , $employe_get_arrays);
        })->where('id',$id)->first();


        $transactions  = transactions::where(['emp_Id'=>$id,'acc_Id'=>$id,'char_id'=>1])->get();
        $schedulePay = '';
        $where = array('emp_Id' => $id);

        $issdate =date("Y-m");
        $issdatearr = explode("-",$issdate);
        $schedulePay = Pay_schedule:: where('emp_Id',$request->id)
                                     ->whereYear('pay_month', '=', $issdatearr[0])
                                     ->whereMonth('pay_month', '=', $issdatearr[1])
                                     ->first();

         if($schedulePay){
            $schedulePay->invoice_num = Transactions::count();
            $schedulePay->issue_date = date('m/d/Y',strtotime($schedulePay->issue_date));
            $schedulePay->basic_pay = $schedulePay->basic_pay;
            $allowances = (array) json_decode($schedulePay->allowances);
            $deductions = (array) json_decode($schedulePay->deductions);
            $allowancesdetail =[];    
            $deductionsdetail =[]; 
            $allowancesSub= 0;
            $deductionsSub= 0;
            if($schedulePay->basic_pay!=''){
                $array = [];
                $array['title'] = 'Basic pay';
                $array['amount'] = $schedulePay->basic_pay;
                $allowancesSub= $this->truncate_number($array['amount']);
                $allowancesdetail[] = $array;

            }
 
            if(sizeof($allowances)>0){


                foreach($allowances as $key=>$val){
                    $array = [];
                    if($key==$val){
                        $array['title'] = ucfirst($val);
                        $somenumber =$allowances[$val."_total"];
                        $array['amount']  = $this->truncate_number($allowances[$val."_total"]);
                        $allowancesSubww= $this->truncate_number($array['amount']);
                        $allowancesSub = $allowancesSubww+$allowancesSub;
                        $allowancesdetail[]=$array;
                    }    
                }

            }

            if(sizeof($deductions)>0){
                foreach($deductions as $key=>$val){
                    $array = [];

                    if($key===$val){
                        $array['title'] = ucfirst($val);
                        $array['amount'] = $this->truncate_number($deductions[$val."_total"]);
                        $array[$key]['amount'] = $this->truncate_number($deductions[$val."_total"]);
                        $deductionsSubww= $this->truncate_number($array['amount']);
                        $deductionsSub = $deductionsSubww+$deductionsSub;
                        $deductionsdetail[]=$array;
                    }    
                }                
            }
           
            $schedulePay->allowances    = $allowancesdetail;
            $schedulePay->allowancesub  = $allowancesSub;
            $schedulePay->deductions    = $deductionsdetail;
            $schedulePay->deductionsSub = $deductionsSub;
            $schedulePay->netamount     = $this->truncate_number($allowancesSub-$deductionsSub);

         }                            

        $PaymentType   = Chartofaccounts::where('acc_Name','Cash on Hand')->OrWhere('acc_Name','Cash at bank')->get();
        $accountsdata   = BankAccount::where('user_id',$id)->get();
      
       
        //dd($schedulePay);
        if($request->type=='transaction'){  
             return view('accountPortal.partial.payroll_detail_ajax', compact('transactions','emplolye','schedulePay','PaymentType','accountsdata'))->render();
        }

        return view('accountPortal.pay_emp',compact('emplolye','transactions','schedulePay','PaymentType','accountsdata'));

    }



     public function accountDropdown(Request $request){

        $issdate =date("Y-m");
        $issdatearr = explode("-",$issdate);
        $data['Fee_schedule'] = Pay_schedule::where('emp_Id',$request->sid)
                                ->whereYear('pay_month', '=', $issdatearr[0])
                                ->whereMonth('pay_month', '=', $issdatearr[1])
                                ->first();

        $data['depostaccount'] = Chartofaccounts::where('acc_parent',$request->id)->get();
        return Response::json($data);
                
    }



    public function schedulepayShow(Request $request){ 
        
        $employe_get_arrays = config('constants.employe_get_array');
        
        $emplolye = User::whereHas('roles', function ($q)  use ($employe_get_arrays)   {
                $q->whereNotIn('name' , $employe_get_arrays);
        })->where('id',$request->id)->first();
  

        $issdate =date("Y-m");
        $issdatearr = explode("-",$issdate);
        $schedulepay = Pay_schedule::where('emp_Id',$request->id)
                                          ->whereYear('pay_month', '=', $issdatearr[0])
                                          ->whereMonth('pay_month', '=', $issdatearr[1])
                                     ->first();

        if(isset($request->schedule) and $request->schedule!='')
        {
              
        $schedulepay = Pay_schedule::where('pay_sch_Id',$request->schedule)->first();
                                          

        }
        $Advance_salary = Advance_salary::where('emp_id',$request->id)->get();

        $schedulepay2 = [];
        if($schedulepay){
           $schedulepay->issue_date = date('m/d/Y',strtotime($schedulepay->issue_date));
           $schedulepay->due_Date = date('m/d/Y',strtotime($schedulepay->due_Date));
           $schedulepay->next_pay_date = date('m/d/Y',strtotime($schedulepay->next_pay_date));
           $schedulepay2= $schedulepay;
           $schedulepay2['allowances']= $schedulepay->allowances;

        }
        $data                                   =  [];
        $data['empploye']                       =  $emplolye;        
        $data['schedulepay']                    =  $schedulepay2;        
        $data['Advance_salary']                 =  $Advance_salary;        
        $data['empploye']['designation']        =  ($emplolye->employeeInfo)?$emplolye->employeeInfo->designation->designation:'';
        $data['empploye']['personal_No']        =  ($emplolye->employeeInfo)?$emplolye->employeeInfo->employmentInfo->personal_No:'';
        $data['empploye']['appt_Date']          =  ($emplolye->employeeInfo)?$emplolye->employeeInfo->employmentInfo->appt_Date:'';
        $data['empploye']['cnic']               =  ($emplolye->employeeInfo)?$emplolye->employeeInfo->emp_Cnic:'' ;
        return Response::json($data);
    }
    


    public function addPayStatement(Request $request){
        


        $array_re =[                 
                    'bill_Freq' => 'required', 
                    'issue_date' => 'required', 
                    'due_Date' => 'required', 
                    'acc_Id' => 'required', 
                    'payment_Mode' => 'required', 
                    'basic_pay' => 'required',                                   
                    'next_pay_date' => 'required',                                   
                    ];

        $messages =   [
                'bill_Freq.required'           => 'The billing frequency  field is required',
                'issue_date.required'          => 'The issue date field is required',
                'due_Date.required'            => 'The end of the pay period  field is required',
                'next_pay_date.required'       => 'The  next pay day  field is required',
                'acc_Id.required'              => 'The  deposit account field is required',
                'payment_Mode.required'        => 'The payment mode  field is required',

                'basic_pay.required'           => 'The  basic pay  field is required'
                 ];
        $validator =   Validator::make($request->all(),$array_re,$messages);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $issdate =date("Y-m", strtotime($request->issue_date));
            $issdatearr = explode("-",$issdate);
            $Pay_schedule = Pay_schedule::where('emp_Id',$request->id)
                                          ->whereYear('pay_month', '=', $issdatearr[0])
                                          ->whereMonth('pay_month', '=', $issdatearr[1])
                            ->first();
             
            if($Pay_schedule==null){
                 $Pay_schedule = new Pay_schedule();
            }            
            $Pay_schedule->emp_Id = $request->get('id');
            $Pay_schedule->acc_Id = $request->get('acc_Id');                     
            
            $Pay_schedule->payment_Mode = $request->get('payment_Mode');     

            $Pay_schedule->bill_Freq = $request->get('bill_Freq');                     
            $allowances = [];
            $deductions = [];            

            
            if(!empty($request->get('allowances'))){
                foreach($request->get('allowances') as $key=>$val){
                    $valss = '';
                    if(!empty($request['allowances']['overtime'])){             
                       $accountName = Chartofaccounts::where('acc_Name','Over Time')->first();  
                       $overtime =array( 'overtime_rate'=>$request['overtime_rate'],
                                        'overtime_hours'=>$request['overtime_hours'],
                                        'overtime_total'=>$request['overtime_total'],
                                        'overtime'=>'overtime',
                                        'overtime_account'=>$accountName->acc_Id,
                                        'overtime_days'=>$request['overtime_days']
                                ); 

                       $allowances = array_merge($allowances,$overtime);
                    } 


                    if(!empty($request['allowances']['vacation'])){             
                       
                    $accountName = Chartofaccounts::where('acc_Name','Vacation Pay')->first();  


                    $vacation =array('vacation_Pay_Rate'=>$request['vacation_Pay_Rate'],
                                    'vacation_No_of_Days'=>$request['vacation_No_of_Days'],
                                    'vacation_total'=>$request['vacation_total'],
                                    'vacation'=>'vacation', 
                                    'vacation_account'=>$accountName->acc_Id );

                      $allowances = array_merge($allowances,$vacation);

                    }


                    if(!empty($request['allowances']['bonus'])){             
                       
                       $accountName = Chartofaccounts::where('acc_Name','Bonus')->first();  
                       $vacation =array('bonus_type'=>$request['bonus_type'],
                                        'bonus_amout'=>$request['bonus_amout'],
                                        'bonus_total'=>$request['bonus_total'],
                                        'bonus'=>'bonus',
                                        'bonus_account'=>$accountName->acc_Id ); 
                        $allowances = array_merge($allowances,$vacation);
                    }    

                     if(!empty($request['allowances']['commission'])){ 
                     $accountName = Chartofaccounts::where('acc_Name','Commission')->first();  

                
                      $commission =array('commission_type'=>$request['commission_type'],
                                         'commission_amout'=>$request['commission_amout'],
                                         'commission_total'=>$request['commission_total'],
                                         'commission'=>'commission',
                                         'commission_account'=>$accountName->acc_Id ); 

                      $allowances = array_merge($allowances,$commission);

                    }
                    if(!empty($request['allowances']['medical'])){  
                      $accountName = Chartofaccounts::where('acc_Name','Medical Allowance')->first();  
               
                      $medical =array(  'medical_type'=>$request['medical_type'],
                                        'medical_amout'=>$request['medical_amout'],
                                        'medical_total'=>$request['medical_total'],
                                        'medical'=>'medical',
                                        'medical_account'=>$accountName->acc_Id ); 

                      $allowances = array_merge($allowances,$medical);

                    } 

                    if(!empty($request['allowances']['house'])){ 
                    
                        $accountName = Chartofaccounts::where('acc_Name','House Allowance')->first();  
                        $house =array('house_type'=>$request['house_type'],
                                    'house_amout'=>$request['house_amout'],
                                    'house_total'=>$request['house_total'],
                                    'house'=>'house',
                                    'house_account'=>$accountName->acc_Id ); 

                      $allowances = array_merge($allowances,$house);

                    }  



                    if(!empty($request['allowances']['convayance'])){ 

                      $accountName = Chartofaccounts::where('acc_Name','Conveyance Allowance')->first();  
              
                      $convayance =array('convayance_type'=>$request['convayance_type'],
                                    'convayance_amout'=>$request['convayance_amout'],
                                    'convayance_total'=>$request['convayance_total'],
                                    'convayance'=>'convayance',
                                    'convayance_account'=>$accountName->acc_Id ); 

                      $allowances = array_merge($allowances,$convayance);

                    }

                     if(!empty($request['allowances']['utility'])){ 
                     $accountName = Chartofaccounts::where('acc_Name','Utility Allowance')->first();  
                
                      $convayance =array('utility_type'=>$request['utility_type'],
                                    'utility_amout'=>$request['utility_amout'],
                                    'utility_total'=>$request['utility_total'],
                                    'utility'=>'utility',
                                    'utility_account'=>$accountName->acc_Id ); 

                      $allowances = array_merge($allowances,$convayance);

                    }


                    if(!empty($request['allowances']['education'])){
                        $accountName = Chartofaccounts::where('acc_Name','Education Allowance')->first();  


                      $education =array(    'education_type'=>$request['education_type'],
                                            'education_amout'=>$request['education_amout'],
                                            'education_total'=>$request['education_total'],
                                            'education'=>'education',
                                         'education_account'=>$accountName->acc_Id); 

                      $allowances = array_merge($allowances,$education);

                    }


                    

                    if(!empty($request['allowances']['arear'])){  

                      $accountName = Chartofaccounts::where('acc_Name','Arrears')->first();  
               
                      $arear =array('arear_total'=>$request['arear_total'],
                                    
                                    'arear'=>'arear', 
                                    'arear_account'=>$accountName->acc_Id ); 

                      $allowances = array_merge($allowances,$arear);

                    }  
                    
                    if(!empty($request['allowances']['dearall'])){
                     $accountName = Chartofaccounts::where('acc_Name','Dearness Allowance')->first();  
                 
                      $dearall =array('dearall_type'=>$request['dearall_type'],
                                    'dearall_amout'=>$request['dearall_amout'],
                                    'dearall_total'=>$request['dearall_total'],
                                    'dearall'=>'dearall', 
                                    'dearall_account'=>$accountName->acc_Id ); 

                      $allowances = array_merge($allowances,$dearall);

                    }      
                }
            }

            if(!empty($request->get('deductions'))){

            
                if(!empty($request['deductions'])){   

                    foreach($request->get('deductions') as $key=>$val){

                     if(!empty($request['deductions']['advance'])){   

                            $accountName = Chartofaccounts::where('acc_Name','Advance Salary')->first();  
                           
                            $advance =       array(  'advance_amount'         =>  $request['advance_amount'],
                                                        'Installments'           =>  $request['Installments'],
                                                        'amount_per_pay_peroid'  =>  $request['amount_per_pay_peroid'],
                                                        'advance_total'          =>  $request['advance_total'],
                                                        'advance'                =>  'advance',
                                                        'advance_id'                =>  $request->advance_id,
                                                        'advance_account'=>$accountName->acc_Id ); 


                          $deductions = array_merge($deductions,$advance);

                        }

                        if(!empty($request['deductions']['taxe'])){  
                            $accountName = Chartofaccounts::where('acc_Name','Income Tax Payable')->first();  
                            $taxe = array('taxe_type'         =>  $request['taxe_type'],
                                                'taxe_amout'           =>  $request['taxe_amout'],
                                                'taxe_total'  =>  $request['taxe_total'],
                                                'taxe'                   =>  'taxe',
                                                'taxe_account'=>$accountName->acc_Id
                                        ); 
                          $deductions = array_merge($deductions,$taxe);
                        }


                    }
                }
            }

            $Pay_schedule->allowances = json_encode($allowances);
            $Pay_schedule->deductions = json_encode($deductions);
            $Pay_schedule->issue_date =  date('Y-m-d',strtotime($request->get('issue_date')));
            $Pay_schedule->due_Date = date('Y-m-d',strtotime($request->get('due_Date')));
            $Pay_schedule->next_pay_date = date('Y-m-d',strtotime($request->get('next_pay_date')));
            $Pay_schedule->basic_pay =$request->get('basic_pay');
            $Pay_schedule->billing_rate =$request->get('billing_rate');
            $Pay_schedule->working_hours =$request->get('working_hours');
            $Pay_schedule->no_of_days =$request->get('no_of_days');
            $Pay_schedule->incr_rate =$request->get('incr_rate');
            $Pay_schedule->pay_month =$issdatearr[0].'-'.$issdatearr[1].'-01';
            $Pay_schedule->pay_total =$request->get('pay_total');
            $Pay_schedule->account =$request->get('account')?$request->get('account'):'';



            if($Pay_schedule->pay_sch_Id!=''){
                $Pay_schedule->pay_sch_Id = $Pay_schedule->pay_sch_Id;
                $Pay_schedule->update();
            }else{
                $Pay_schedule->save();
            } 


            if(isset($request->schedule_id) and $request->schedule_id!=''){

                
                $request->month=$request->get('issue_date');

                $this->schedulepayGenerateSave($request);
                 return response()->json(['message' => 'Bill Updated Successfully !']); 

               
            } 


            return response()->json(['message' => 'Successfully Added!']); 
        }        
    }
    



   
    function truncate_number($number, $precision = 2) {

    // Zero causes issues, and no need to truncate
    if (0 == (int)$number) {
        return $number;
    }

    // Are we negative?
    $negative = $number / abs($number);

    // Cast the number to a positive to solve rounding
    $number = abs($number);

    // Calculate precision number for dividing / multiplying
    $precision = pow(10, $precision);

    // Run the math, re-applying the negative value to ensure
    // returns correctly negative / positive
    return floor( $number * $precision ) / $precision * $negative;
}


    function advanceSalaryTransaction(Request $request)
    {
        


        $array_re =[                 
                    'schedule_advanc' => 'required'
                                                     
                ];
        $validator =   Validator::make($request->all(),$array_re);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

              return response()->json(['message' =>'sa'] );

        }


        

    }



    /*
        Employe Statement
        

    */

    public function empStatement(Request $request){

        $emp = User::findOrFail($request->emp_id);
        $mailing_add = $emp->employeeInfo?$emp->employeeInfo->employeeContact:'';
        $emp->contact = $mailing_add;
        $data['emp'] =$emp;

        /* Open Item*/
        if($request->report_type==1){

            $date = strtotime($request->statement_date.' -1 year');
            $datef = date('Y-m-d',$date);
            $startDate = Carbon::createFromFormat('Y-m-d',$datef)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d',  $request->statement_date)->endOfDay();
            $data['Transactions'] = Transactions::where('emp_Id',$emp->id)
                                                  ->where('acc_Id',$emp->id)
                                                  ->where('tr_Type',1)
                                                  ->where('char_id',1)
                                                  ->whereBetween('tr_Date', [$startDate, $endDate])
                                                  ->get();
            $data['tr_type'] = 1;



        }else if($request->report_type==2){

              /* Balance  Forward*/

            $startDate = Carbon::createFromFormat('Y-m-d',$request->start_date)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d',  $request->end_date)->endOfDay();


            $data['Transactions'] = Transactions::where('emp_Id',$emp->id)
                                                  ->where('acc_Id',$emp->id)
                                                  ->where('char_id',1)
                                                  ->whereBetween('tr_Date', [$startDate, $endDate])
                                                  ->get();

            $data['tr_type'] = 2;

        }else if($request->report_type==3){

              /* Balance  Forward*/
              /* Balance  Forward*/
            $startDate = Carbon::createFromFormat('Y-m-d',$request->start_date)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d',  $request->end_date)->endOfDay();



            $data['Transactions'] = Transactions::where('emp_Id',$emp->id)
                                    ->where('acc_Id',$emp->id)
                                    ->where('tr_Type',1)
                                    ->where('char_id',1)
                                    ->whereBetween('tr_Date', [$startDate, $endDate])
                                    ->get();
            $data['tr_type'] = 3;
        }

        $dats= date("Y-m-d");
        $data['date'] =date('m/d/Y',strtotime($dats));
        return Response::json($data);
    }



 
    /* Employee pay bill print  start*/
    
    public function PayBillPrint(Request $request){

        

        $emp = User::findOrFail($request->id);
        

        $Transactions = Transactions::where('tr_Id',$request->transaction)->first();
        
        $schedulePay = (object)[];
        
 

        $schedulePay->month =$Transactions->schedule_pay?$Transactions->schedule_pay->pay_month:'';

        

        $where = array('emp_Id' => $request->id,'pay_month'=>$schedulePay->month);

        $schedulePay =Pay_schedule::where($where)->first();

        $emp->designation =  ($emp->employeeInfo)?$emp->employeeInfo->designation->designation:'';

        $emp->personal_No =  ($emp->employeeInfo)?$emp->employeeInfo->employmentInfo->personal_No:'';

        if($schedulePay){

            $schedulePay->invoice_num = Transactions::count();
            $schedulePay->issue_date = date('m/d/Y',strtotime($schedulePay->issue_date));
            $schedulePay->basic_pay = $schedulePay->basic_pay;
            $allowances = (array) json_decode($schedulePay->allowances);
            $deductions = (array) json_decode($schedulePay->deductions);
            $allowancesdetail =[];
            $deductionsdetail =[];
            $allowancesSub= 0;
            $deductionsSub= 0;

            if($schedulePay->basic_pay!=''){
                $array = [];
                $array['title'] = 'Basic pay';
                $array['amount'] = $schedulePay->basic_pay;
                $allowancesSub= $this->truncate_number($array['amount']);
                $allowancesdetail[] = $array;

            }

            if(sizeof($allowances)>0){


                foreach($allowances as $key=>$val){
                    $array = [];
                    if($key==$val){
                        $array['title'] = ucfirst($val);
                        $somenumber =$allowances[$val."_total"];
                        $array['amount']  = $this->truncate_number($allowances[$val."_total"]);
                        $allowancesSubww= $this->truncate_number($array['amount']);
                        $allowancesSub = $allowancesSubww+$allowancesSub;
                        $allowancesdetail[]=$array;
                    }
                }

            }

            if(sizeof($deductions)>0){
                foreach($deductions as $key=>$val){
                    $array = [];

                    if($key===$val){
                        $array['title'] = ucfirst($val);
                        $array['amount'] = $this->truncate_number($deductions[$val."_total"]);
                        $deductionsSubww= $this->truncate_number($array['amount']);
                        $deductionsSub = $deductionsSubww+$deductionsSub;
                        $deductionsdetail[]=$array;
                    }
                }
            }
            $emp->name                  = $emp->name;
            $schedulePay->allowances    = $allowancesdetail;
            $schedulePay->allowancesub  = $allowancesSub;
            $schedulePay->deductions    = $deductionsdetail;
            $schedulePay->deductionsSub = $deductionsSub;
            $schedulePay->netamount     = $this->truncate_number($allowancesSub-$deductionsSub);
            $schedulePay->balancedue    = 0;
            if( !empty ($emp->balancedue($emp->id)) ){
                $schedulePay->balancedue = $this->truncate_number($emp->balancedue($emp->id));
            }

        }else{
           $schedulePay = (object)[];
           $emp->name = $emp->name;
        }
        $school                     =       School::select('school_Name')->first();
        $data['school']                =       $school->school_Name;
        $data['emp']                =       $emp;
        $data['schedulePay']        =       $schedulePay;
        return Response::json($data);

    }

    /* Employee pay pay bill print */




    public function schedulepayGenerateSave(Request $request)
    {
        
        
        $emp =  User::where('id',$request->id)->first();

        
        $issdate =date("Y-m" ,strtotime($request->issue_date));
        $issdatearr = explode("-",$issdate);

        $schedulepay = Pay_schedule::where('emp_Id',$emp->id)
                                          ->whereYear('pay_month', '=', $issdatearr[0])
                                          ->whereMonth('pay_month', '=', $issdatearr[1])
                                     ->first();


        
        $amount = 0;
        if($schedulepay)
        {

            $allowances =       (array) json_decode($schedulepay->allowances);
            $deductions =       (array) json_decode($schedulepay->deductions);
            $allowancesdetail =     [];    
            $deductionsdetail =     []; 
            $allowancesSub= 0;
            $deductionsSub= 0;

            $issue_date= date('Y-m-d',strtotime($request->issue_date));

        
            $Transactions =  Transactions::where('emp_Id',$request->id)->where('acc_Id',$request->id)->where('month',$issue_date)->where('tr_Type',1)->first();


            if($Transactions){
                return response()->json(['message' => 'Bill already added', 'errors'=>'da']);
            }else{
                $Transactions = new Transactions(); 
            }
            

            if($schedulepay->basic_pay!=''){
                $array = [];
                $accountName = Chartofaccounts::where('acc_Name','Basic salary')->first();  
                $array['title'] = 'Basic pay';
                $array['amount'] = $schedulepay->basic_pay;
                $array['acount'] = $schedulepay->acc_Id;
              
                /* Transaction  To Payroll */
                
                $Transactions = new Transactions(); 
                $Transactions->Vtype ='Generated Salary';
                $Transactions->Narration ='Salary For Employee Id'.$request->id;
                $Transactions->acc_Id = $accountName->acc_Id;
                $Transactions->emp_Id = $request->id;
                $Transactions->dr_Amt = $this->truncate_number($array['amount']);
                $Transactions->bl_Amt = 0;
                $Transactions->cr_Amt = 0;
                $Transactions->tr_Status = 'Open';
                $Transactions->tr_Type = 1;
                $Transactions->schedule_id =$schedulepay->pay_sch_Id;
                $Transactions->save(); 


                $accountName->acc_Balance =$accountName->acc_Balance+$array['amount'];
                $accountName->update();


                $allowancesSub= $this->truncate_number($array['amount']);
                $allowancesdetail[] = $array;
            }
 
            if(sizeof($allowances)>0){
                foreach($allowances as $key=>$val){
                    $array = [];
                    if($key===$val){
                        $array['title'] = ucfirst($val);
                        $somenumber =$allowances[$val."_total"];
                        
                        $array['amount']  = $this->truncate_number($allowances[$val."_total"]);
                        $allowancesSubww= $this->truncate_number($array['amount']);
                        
                        $account =$allowances[$val."_account"];

                        $accountName = Chartofaccounts::where('acc_Id',$account)->first();  
                        
                        /* Transaction  To Payroll */
                
                        $Transactions = new Transactions(); 
                        $Transactions->Vtype ='Generated Salary';
                        $Transactions->Narration ='Salary For Employee Id'.$request->id;
                        $Transactions->acc_Id = $accountName->acc_Id;
                        $Transactions->emp_Id = $request->id;
                        $Transactions->dr_Amt =$this->truncate_number($array['amount']);
                        $Transactions->bl_Amt = 0;
                        $Transactions->cr_Amt = 0;
                        $Transactions->tr_Status = 'Open';
                        $Transactions->tr_Type = 1;
                        $Transactions->schedule_id =$schedulepay->pay_sch_Id;
                        $Transactions->save(); 
                        
                        $accountName->acc_Balance =$accountName->acc_Balance+$array['amount'];
                        $accountName->update();

                        $allowancesSub = $allowancesSubww+$allowancesSub;
                        $allowancesdetail[]=$array;
                    }    
                }                
            }



            if(sizeof($deductions)>0){
                foreach($deductions as $key=>$val){
                    $array = [];
                    


                    if($key===$val){
                        

                        $array['title'] = ucfirst($key);                          
                        $array['amount'] = $this->truncate_number($deductions[$key."_total"]);
                        $deductionsSubww= $this->truncate_number($array['amount']);
                        $deductionsSub = $deductionsSubww+$deductionsSub;
                        $deductionsdetail[]=$array;
                        $account =$deductions[$val."_account"];
                        $accountName = Chartofaccounts::where('acc_Id',$account)->first();  
                        


                        if($key=='advance'){
                            
                            
                            $accountdata = [];
                            $accountdata = json_decode($schedulepay->deductions, true);
                            $accountdata['advance_amount'] =$accountdata['advance_amount']-$accountdata['amount_per_pay_peroid'] ;
                            $accountdata['Installments'] =$accountdata['Installments'];
                        
                            $schedulepay->deductions = json_encode($accountdata);
                            $schedulepay->update();
                            
                            if($accountdata['advance_amount']==0){

                                
                                $advanceSaray = Advance_salary::where('id',$accountdata['advance_id'])->first();
                                $advanceSaray->status = 1;
                                $advanceSaray->update();


                                foreach($accountdata as $key=>$val){

                                  

                                    if($key==='taxe'){

                                        $accountName = Chartofaccounts::where('acc_Name','Income Tax Payable')->first();  
                                        $deductions = array('taxe_type'         => $accountdata[$key.'_type'],
                                                            'taxe_amout'           =>  $accountdata[$key.'_amout'],
                                                            'taxe_total'  =>  $accountdata[$key.'_total'],
                                                            'taxe'                   =>  'taxe',
                                                            'taxe_account'=>$accountName->acc_Id
                                                    ); 
                                       $schedulepay->deductions = json_encode($deductions);
                                       $schedulepay->update();
                            


                                    }


                                }
                            }


                            $advanceSaray = Advance_salary::where('id',$accountdata['advance_id'])->first();

                            $advanceSaray->advance_amount = $accountdata['advance_amount'];
                            $advanceSaray->Installments = $accountdata['Installments']-1;
                            $advanceSaray->update();


                            $Transactions = new Transactions(); 
                            $Transactions->Vtype ='Generated Salary';
                            $Transactions->Narration ='Salary For Employee Id'.$request->id;
                            $Transactions->acc_Id = $accountName->acc_Id;
                            $Transactions->emp_Id = $request->id;
                            $Transactions->dr_Amt = 0;
                            $Transactions->bl_Amt = 0;
                            $Transactions->cr_Amt = $this->truncate_number($array['amount']);
                            $Transactions->tr_Status = 'Open';
                            $Transactions->tr_Type = 1;
                            $Transactions->schedule_id =$schedulepay->pay_sch_Id;
                            $Transactions->save(); 

                            
                            /*

                              cash   Bank will be credit

                            */

                        
                            $accountName->acc_Balance =$accountName->acc_Balance-$array['amount'];
                               
                        }else{


                            $Transactions = new Transactions(); 
                            $Transactions->Vtype ='Generated Salary';
                            $Transactions->Narration ='Salary For Employee Id'.$request->id;
                            $Transactions->acc_Id = $accountName->acc_Id;
                            $Transactions->emp_Id = $request->id;
                            $Transactions->dr_Amt = 0;
                            $Transactions->bl_Amt = 0; 
                            $Transactions->cr_Amt = $this->truncate_number($array['amount']);
                            $Transactions->tr_Status = 'Open';
                            $Transactions->tr_Type = 1;
                            $Transactions->schedule_id =$schedulepay->pay_sch_Id;
                            $Transactions->save(); 


                             $accountName->acc_Balance =$accountName->acc_Balance+$array['amount'];
                        
                        }
                       

                        $accountName->update();





                    }


                }                
            }
 

            $netpay = $this->truncate_number($allowancesSub-$deductionsSub);
            /*  Account Payable Expense */
            $AccountCountPayable =Chartofaccounts::where('acc_Code',4101)->first();

            $AccountCountPayable->acc_Balance =$AccountCountPayable->acc_Balance+$netpay;
            $AccountCountPayable->update();

            $Transactions = new Transactions(); 
            $Transactions->Vtype ='Generated Salary';
            $Transactions->Narration ='Salary For Employee Id'.$request->id;
            $Transactions->acc_Id = $AccountCountPayable->acc_Id;
            $Transactions->emp_Id = $request->id;
            $Transactions->dr_Amt = 0;
            $Transactions->bl_Amt = 0;
            $Transactions->cr_Amt = $this->truncate_number($netpay);
            $Transactions->tr_Status = 'Open';
            $Transactions->tr_Type = 1;
            $Transactions->schedule_id =$schedulepay->pay_sch_Id;
            $Transactions->save(); 

             /*  Payroll Expense */

            $payrollExpenence =Chartofaccounts::where('acc_Code',2300)->first();
            $payrollExpenence->acc_Balance =$payrollExpenence->acc_Balance+$netpay;
            $payrollExpenence->update();
            

            $Transactions = new Transactions(); 
            $Transactions->Vtype ='Generated Salary';
            $Transactions->Narration ='Salary For Employee Id'.$request->id;
            $Transactions->acc_Id = $payrollExpenence->acc_Id;
            $Transactions->emp_Id = $request->id;
            $Transactions->dr_Amt = $this->truncate_number($netpay);
            $Transactions->bl_Amt = 0;
            $Transactions->cr_Amt = 0;
            $Transactions->tr_Status = 'Close';
            $Transactions->tr_Type = 1;
            $Transactions->schedule_id =$schedulepay->pay_sch_Id;
            $Transactions->save(); 


            /*
                Emplpye Account
            */
            $Transactions = new Transactions(); 
            $Transactions->Vtype ='Generated Salary';
            $Transactions->Narration ='Salary For Employee Id'.$request->id;
            $Transactions->acc_Id = $schedulepay->emp_Id;
            $Transactions->emp_Id = $schedulepay->emp_Id;
            $Transactions->char_id = 1;
            $Transactions->dr_Amt = 0;
            $Transactions->bl_Amt = $this->truncate_number($netpay);
            $Transactions->cr_Amt = $this->truncate_number($netpay);
            $Transactions->tr_Status = 'Open';
            $Transactions->tr_Type = 1;
            $Transactions->month = $issue_date;
            $Transactions->schedule_id =$schedulepay->pay_sch_Id;
            $Transactions->save(); 

            // if($Transactions->tr_Id!='')
            // {
            //     $Transactions->tr_Id = $Transactions->tr_Id;
            //     $Transactions->update();
            
            // }else{
            //     //$Transactions->save();
            // }  
            return response()->json(['message' => 'Bill generated ']);
        }
        return response()->json(['message' => 'No bill exit ', 'errors'=>'da']);
    }




    // public function schedulePayGenerateAuto(Request $request)
    // {

        
    //     $month= date('Y-m-').'01'; 

    //     $employes = User::whereHas('roles', function ($q) {
    //             $q->whereNotIn('name' , [ 'Admin','Student', 'Super Admin','parents']);
    //         })->orderBy('id','desc')->get();

    //     foreach($employes as $VAL)


    //     $schedulepay =  Pay_schedule::where('emp_Id',$request->id)->where('pay_month',$month)->first();

    //     $amount = 0;
    //     if($schedulepay)
    //     {

    //         $allowances = (array) json_decode($schedulepay->allowances);
    //         $deductions = (array) json_decode($schedulepay->deductions);
    //         $allowancesdetail =[];    
    //         $deductionsdetail =[]; 
    //         $allowancesSub= 0;
    //         $deductionsSub= 0;
    //         if($schedulepay->basic_pay!=''){
    //             $array = [];
    //             $array['title'] = 'Basic pay';
    //             $array['amount'] = $schedulepay->basic_pay;
    //             $allowancesSub= $this->truncate_number($array['amount']);
    //             $allowancesdetail[] = $array;
    //         }
 
    //         if(sizeof($allowances)>0){
    //             foreach($allowances as $key=>$val){
    //                 $array = [];
    //                 if($key==$val){
    //                     $array['title'] = ucfirst($val);
    //                     $somenumber =$allowances[$val."_total"];
    //                     $array['amount']  = $this->truncate_number($allowances[$val."_total"]);
    //                     $allowancesSubww= $this->truncate_number($array['amount']);
    //                     $allowancesSub = $allowancesSubww+$allowancesSub;
    //                     $allowancesdetail[]=$array;
    //                 }    
    //             }                
    //         }

    //         if(sizeof($deductions)>0){
    //             foreach($deductions as $key=>$val){
    //                 $array = [];
    //                 if($key==$val){
    //                     $array['title'] = ucfirst($val);
    //                     $array['amount'] = $this->truncate_number($deductions[$val."_total"]);
    //                     $deductionsSubww= $this->truncate_number($array['amount']);
    //                     $deductionsSub = $deductionsSubww+$deductionsSub;
    //                     $deductionsdetail[]=$array;
    //                 }    
    //             }                
    //         }


    //         $Transactions =  Transactions::where('emp_Id',$request->id)->where('month',$month)->where('tr_Type',1)->first();
    //         if($Transactions){
    //             return response()->json(['message' => 'Bill already added', 'errors'=>'da']);
    //         }else{
    //             $Transactions = new Transactions(); 
    //         }
 


    //         $Transactions->Vtype ='Generated Salary';
    //         $Transactions->Narration ='Salary For Employee Id'.$request->id;
    //         $Transactions->acc_Id = $schedulepay->acc_Id;
    //         $Transactions->emp_Id = $schedulepay->emp_Id;
    //         $Transactions->dr_Amt = 0;
    //         $Transactions->bl_Amt = $this->truncate_number($allowancesSub-$deductionsSub);
    //         $Transactions->schedule_id = $request->schedule_id;
    //         $Transactions->cr_Amt = $this->truncate_number($allowancesSub-$deductionsSub);
    //         $Transactions->tr_Status = 'Open';
    //         $Transactions->month = $month;
    //         $Transactions->tr_Type = 1;
    //         $Transactions->schedule_id =$schedulepay->pay_sch_Id;
    //         if($Transactions->tr_Id!='')
    //         {
    //             $Transactions->tr_Id = $Transactions->tr_Id;
    //             $Transactions->update();
            
    //         }else{
    //             $Transactions->save();
    //         }  
    //         return response()->json(['message' => 'Bill generated ']);
    //     }
    //     return response()->json(['message' => 'No bill exit ', 'errors'=>'da']);
    // }




     public function scheduleadvanceSalary(Request $request){
        
        $emp = User::findOrFail($request->id);
        $data = []; 
        $data['emp'] =     $emp;
        
        $data['Advance_salary'] =Advance_salary::where('emp_id',$request->id)->where('status',0)->get();


        return Response::json($data);
        
    }

     public function scheduleadvanceSalarySave(Request $request) {
        

        $array_re =[
                    'advance_amount' => 'required',    
                    'Installments' => 'required',    
                    'amount_per_pay_peroid' => 'required',    
                    'acc_Id' => 'required',    
        ];
        $validator =   Validator::make($request->all(),$array_re);

        if ($validator->fails()) {
            
            return response()->json(['errors' => $validator->errors()]);
        
        }else{
            
            $Advance_salary = new Advance_salary(); 
            $Advance_salary->emp_id =$request->emp_id;
            $Advance_salary->advance_amount =$request->advance_amount;
            $Advance_salary->Installments = $request->Installments;
            $Advance_salary->amount_per_pay_peroid =$request->amount_per_pay_peroid;
            $Advance_salary->total_amount =$request->advance_amount ;
            $Advance_salary->save();

 
             

            /*
                Account recievele
            */
            $Transactions = new Transactions(); 
            $Transactions->Vtype ='Advance Salary';
            $Transactions->Narration ='Advance Salary For Employee Id'.$request->emp_id;
            $Transactions->acc_Id = $request->acc_Id;
            $Transactions->emp_Id = $request->emp_id;
            $Transactions->dr_Amt = 0;
            $Transactions->bl_Amt = 0;
            $Transactions->schedule_id = 0;
            $Transactions->cr_Amt = $this->truncate_number($request->advance_amount);
            $Transactions->tr_Status = 'Open';
            $Transactions->tr_Type = 2; 
            $Transactions->save();

            

            /*
                Account payable
            */

            $accountName = Chartofaccounts::where('acc_Name','Advance Salary')->first();  

            $Transactions = new Transactions(); 
            $Transactions->Vtype ='Advance Salary';
            $Transactions->Narration ='Advance Salary For Employee Id'.$request->emp_id;
            $Transactions->acc_Id = $accountName->acc_Id;
            $Transactions->emp_Id = $request->emp_id;
            $Transactions->dr_Amt = $this->truncate_number($request->advance_amount);
            $Transactions->bl_Amt = 0;
            $Transactions->schedule_id = 0;
            $Transactions->cr_Amt = 0;
            $Transactions->tr_Status = 'Open';
            $Transactions->tr_Type = 2; 
            $Transactions->save();
            return response()->json(['message' => 'Advance salary added ']);

        }
        
        
    }




     public function schedulePayGenerate(Request $request){
        
        $emp = User::findOrFail($request->id);


        $issdate =date("Y-m");
        $issdatearr = explode("-",$issdate);
        $schedulePay = Pay_schedule::where('emp_Id',$emp->id)
                                          ->whereYear('pay_month', '=', $issdatearr[0])
                                          ->whereMonth('pay_month', '=', $issdatearr[1])
                                     ->first();
        
        
        $emp->designation =  ($emp->employeeInfo)?$emp->employeeInfo->designation->designation:'';
        $emp->personal_No =  ($emp->employeeInfo)?$emp->employeeInfo->employmentInfo->personal_No:'';

        if($schedulePay){

            $schedulePay->invoice_num = Transactions::count();
            $schedulePay->issue_date = date('m/d/Y',strtotime($schedulePay->issue_date));
            $schedulePay->basic_pay = $schedulePay->basic_pay;
            $allowances = (array) json_decode($schedulePay->allowances);
            $deductions = (array) json_decode($schedulePay->deductions);
            $allowancesdetail =[];    
            $deductionsdetail =[]; 
            $allowancesSub= 0;
            $deductionsSub= 0;

            if($schedulePay->basic_pay!=''){
                $array = [];
                $array['title'] = 'Basic pay';
                $array['amount'] = $schedulePay->basic_pay;
                $allowancesSub= $this->truncate_number($array['amount']);
                $allowancesdetail[] = $array;

            }
 
            if(sizeof($allowances)>0){


                foreach($allowances as $key=>$val){
                    $array = [];
                    if($key==$val){
                        $array['title'] = ucfirst($val);
                        $somenumber =$allowances[$val."_total"];
                        $array['amount']  = $this->truncate_number($allowances[$val."_total"]);
                        $allowancesSubww= $this->truncate_number($array['amount']);
                        $allowancesSub = $allowancesSubww+$allowancesSub;
                        $allowancesdetail[]=$array;
                    }    
                }

            }

            if(sizeof($deductions)>0){
                foreach($deductions as $key=>$val){
                    $array = [];

                    if($key===$val){
                        $array['title'] = ucfirst($val);
                        $array['amount'] = $this->truncate_number($deductions[$val."_total"]);
                        $deductionsSubww= $this->truncate_number($array['amount']);
                        $deductionsSub = $deductionsSubww+$deductionsSub;
                        $deductionsdetail[]=$array;
                    }    
                }                
            }
            $emp->name                  = $emp->name;
            $schedulePay->allowances    = $allowancesdetail;
            $schedulePay->allowancesub  = $allowancesSub;
            $schedulePay->deductions    = $deductionsdetail;
            $schedulePay->deductionsSub = $deductionsSub;
            $schedulePay->netamount     = $this->truncate_number($allowancesSub-$deductionsSub);
            $schedulePay->balancedue    = 0;
             
           $schedulePay->balancedue = $emp->balancedue();
             

        }else{
           $schedulePay = (object)[];
           $emp->name = $emp->name;
        }
         $data['emp']                =       $emp;
        $data['schedulePay']        =       $schedulePay;
        return Response::json($data);
        
    }


    public function paymentRecieve(Request $request)
    {


        $array_re =[
                    'amount' => 'required',    
        ];
        $validator =   Validator::make($request->all(),$array_re);

        if ($validator->fails()) {
            
            return response()->json(['errors' => $validator->errors()]);
        
        }else{
 
    
           
            

         if($request->payments) {


            
             $month = date("Y-m-d" , strtotime($request->month));
            
             $schedulePay =Pay_schedule::where('emp_Id',$request->id)->first();

            
             $accountpayble = array(
                      'emp_Id'            => $request->id,
                      'tr_Type'           => 2,
                      'tr_Date'           =>  date('Y-m-d h:i:s' , strtotime($request->next_pay_date)),
                      'schedule_id'       => $schedulePay->pay_sch_Id,
                      'acc_Id'            => 3103,
                      'Narration'         => 'salary payment for '.$request->id,
                      'dr_Amt'            => intval(str_replace(',', '', $request->amount)),
                      'cr_Amt'            => 0 ,
                      'bl_Amt'            => 0,
                      'tr_Status'         => 'Close',
                      'Vtype'         => 'Generated Salary'
                       
            );

            
            Transactions::create($accountpayble);
            $payment = array(
                      'emp_Id'            => $request->id,
                      'tr_Type'           => 2,
                      'tr_Date'           =>  date('Y-m-d h:i:s' , strtotime($request->next_pay_date)),
                      'schedule_id'       => $schedulePay->pay_sch_Id,
                      'acc_Id'            => $request->accounts,
                      'Narration'         => 'salary payment for '.$request->id,
                      'dr_Amt'            => 0,
                      'cr_Amt'            => intval(str_replace(',', '', $request->amount)),
                      'bl_Amt'            => 0,
                      'tr_Status'         => 'Close',
                      'Vtype'             => 'Salary paid'
                       
            );
            Transactions::create($payment);

            foreach($request->payments as $key=>$val){  
                
                if($val!=0){                   

                    if($request->tr_Status[$key] == 'Close'){
                        
                        $Transactionsss = Transactions::where('tr_Id',$key)->first();
                        $Transactionsss->bl_Amt = 0;
                        $Transactionsss->tr_Status = 'Close';
                        $Transactionsss->save();
                        /*
                                Account Payable*/
                        
                        $employeaccount = array(
                          'emp_Id'           => $request->id,
                          'char_id'           => 1,
                          'tr_Type'           => 2,
                          'tr_Date'           =>  date('Y-m-d h:i:s' , strtotime($request->next_pay_date)),
                          'schedule_id'       => $request->schedule_id[$key],
                          'acc_Id'            => $request->id,
                          'Narration'         => 'salary payment for empploye id  '.$request->id,
                          'dr_Amt'            => intval(str_replace(',', '', $val)),
                          'cr_Amt'            => 0,
                          'bl_Amt'            => 0,
                          'tr_Status'         => 'Close',
                          'Vtype'         => 'salaray payment',
                           
                        );

                        Transactions::create($employeaccount);
                                 
 
                }

                if($request->tr_Status[$key] == 'Partail'){
                   
                    $Transactionsss = Transactions::where('tr_Id',$key)->first();
                    $Transactionsss->tr_Status = 'Partial';
                    $Transactionsss->bl_Amt = $request->balance[$key]-$val;
                    $Transactionsss->save();

                    $expense = array(
                      'emp_Id'           => $request->id,
                      'tr_Type'           => 2,
                      'char_id'           => 1,
                      'schedule_id'       => $request->schedule_id[$key],
                      'acc_Id'            => $request->id,
                      'Narration'         => 'salary payment for '.$request->id,
                      'dr_Amt'            => intval(str_replace(',', '', $val)),
                      'cr_Amt'            => 0,
                      'bl_Amt'            => $request->balance[$key]-$val,
                      'tr_Status'         => 'Close',
                      'Vtype'         => 'payment Salary ',
                       
                    );

                 Transactions::create($expense);

                    



                }

                    

                }

                
            }
            return response()->json(['message' => 'Successfully Added!','types'=>'success']); 

        }else{
            return response()->json(['message' => 'No Bill Exists','types'=>'warning']); 

        }

            
            
        }

    }




     public function schedulefeemakepayments(Request $request){
        
        $emp = User::findOrFail($request->id);
        $where = array('tr_Status'=>'Open');

        $query = Transactions::query();

        if(!empty($request->transaction)){
            $query = $query->where('tr_Id', $request->transaction);
        }

        $query->where('emp_Id',$request->id);
        $query->where('acc_Id',$request->id);
        $query->where('tr_Type',1);
        $query->where('char_id',1);

        $query->where('tr_Status', '!=', 'Close');

        $Transactions = $query->get();
        $Pay_schedule = Pay_schedule::where('emp_Id' ,$request->id)->first();
        $accounts = [];
        $TransactionsData = [];
        $balanace = 0;
        if($Transactions){
            foreach ($Transactions as $key => $value) {
 
                $balanace = $this->truncate_number($value->cr_Amt)-$this->truncate_number($value->dr_Amt);
                
                if($value->tr_Status=='Partial' && $value->tr_Type==1){

                    $balanace = $this->truncate_number($value->bl_Amt);
                    
                }

                $Transactionsar = [];
                $Transactionsar['tr_Id'] =$value->tr_Id;
                $Transactionsar['schedule_id'] =$value->schedule_id;
                $today = date("Y-m-d");
                $currentDate = strtotime($today); 
                $Transactionsar['cr_Amt']  = $value->cr_Amt;
                $Transactionsar['bl_Amt']  = $balanace;
                $Transactionsar['tr_Status'] = $value->tr_Status; 
                $Transactionsar['tr_Date'] =date( 'd/m/Y' , strtotime($value->tr_Date));
                $Transactionsar['issue_date'] =date( 'd/m/Y' , strtotime($value->schedule_pay?$value->schedule_pay->issue_date:''));
                $TransactionsData[]=$Transactionsar;          
            }            
        }
        $data = [];
        $data['Pay_schedule'] = $Pay_schedule;
        $data['transactions'] = $TransactionsData;
        $data['Transactions_latest'] =Transactions::orderBy('tr_Id','desc')->first();
        $data['emp'] =$emp;
          
        return Response::json($data);
    }





}

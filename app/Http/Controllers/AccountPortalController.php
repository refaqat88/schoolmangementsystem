<?php

namespace App\Http\Controllers;
use App\Models\Account_type;
use App\Models\Chartofaccounts;
use App\Models\User;
use App\Models\Fee_schedule;
use App\Models\Transactions;
use App\Models\School;
use App\Models\BankAccount;
use App\Models\AddClasses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;
use Redirect,Response;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class AccountPortalController extends Controller
{

    function __construct()
    {    
        
    }

    public function income(Request $request)    {
        $classes = AddClasses::all();
        $classes = AddClasses::all();        
        $class = '';
        $section = '';
        if(isset($request->student_class) and $request->student_class!=''){
            $class = $request->student_class;
        }

        if(isset($request->student_class) and $request->student_class!=''){
            $class = $request->student_class;
        }

        if(isset($request->student_section) and $request->student_section!=''){
            $section = $request->student_section;
        }
        
        $students = User::whereHas('roles', function ($q) {
            $q->where('name','Student');
        })->whereHas('studentinfo', function ($q2) use ($class,$section) {
            if(!empty($class)){
               $q2->where('cls_Id', $class);
            }
            if(!empty($section)){
               $q2->where('section_id', $section);
            }          
        })->whereDoesntHave('withDraw')->get(); 
        
        $PaymentType   = Chartofaccounts::where('acc_Name','Cash on Hand')->OrWhere('acc_Name','Cash at bank')->get();
      

        if($request->type=='transaction')
        {  
            return view('accountPortal.partial.income', compact('students'))->render();
        }


        return view('accountPortal.income' , compact('students','classes','PaymentType'));
    }

    public function addChartedAccount(Request $request)
    {
        $array_re =[            
            'acc_Name' => 'required',
        ];
        if(isset($request->isparent) and $request->isparent!=''){

            $array_re = array_merge($array_re, array("acc_parent"=>"required"));
        }
        $validator =   Validator::make($request->all(),$array_re);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
            $Chartofaccounts = new Chartofaccounts();
            $code = '';
            if(isset($request->acc_parent) and $request->acc_parent!=''){
              $Chartofaccounts->acc_parent = $request->get('acc_parent');
              $code = $request->acc_Code+1;
              $selectors = Chartofaccounts::where('acc_parent',$request->acc_parent)->orderby('acc_Id','desc')->first(); 
              if($selectors!=''){
                  $code = $selectors->acc_Code+1; 
               }
            }else{
               $code = $request->acc_Code+100;
               $selectors = Chartofaccounts::where('acc_type_Id',$request->acc_type_Id)->orderby('acc_Id','desc')->first(); 
               if($selectors!=''){
                 $code = $selectors->acc_Code+100; 
               }
            } 
            $Chartofaccounts->acc_type_Id = $request->get('acc_type_Id');
            $Chartofaccounts->acc_Name = $request->get('acc_Name');
            $Chartofaccounts->acc_Code = $code;
            $Chartofaccounts->acc_Balance = $request->get('acc_Balance');
            $Chartofaccounts->acc_Date = $request->get('acc_Date');
            $Chartofaccounts->description = $request->get('description');
            if($request->acc_Id and $request->acc_Id!='')
            {
                $Chartofaccounts = Chartofaccounts::findOrFail($request->acc_Id);
                $Chartofaccounts->acc_Name = $request->get('acc_Name');
                $Chartofaccounts->acc_Balance = $request->get('acc_Balance');
                $Chartofaccounts->acc_Date = $request->get('acc_Date');
                $Chartofaccounts->description = $request->get('description');
                $Chartofaccounts->update();
            }else{
                $Chartofaccounts->save();
            }
            if($request->acc_Id and $request->acc_Id!=''){
                return response()->json(['message' => 'Successfully Updatd!']); 
            }else{
                return response()->json(['message' => 'Successfully Added!']); 
            }         
        }         
    }
    public function incomeDetail(Request $request,$id)
    {
        $student = User::whereHas('roles', function ($q) {
            $q->where('name','Student');
        })->whereDoesntHave('withDraw')->where('id',$id)->first();

        $gardFather = $student->studentinfo?$student->studentinfo->father($student->studentinfo->father_id):'';
        
        $Account_typesFees   = Chartofaccounts::where('acc_Name','Fees earned')->first();
        $Account_types_income   = Chartofaccounts::where('acc_parent',$Account_typesFees->acc_Id)->get();
        $transactions  = transactions::where(['std_Id'=>$id , 'acc_Id'=>$id , 'char_id'=>1])->get();
        $schedulefee = '';


        $issdate        =   date("Y-m");
        $issdatearr     =   explode("-",$issdate);
        $schedulefee    =   Fee_schedule::where('std_Id' , $id)
                                      ->whereYear('fee_month', '=', $issdatearr[0])
                                      ->whereMonth('fee_month', '=', $issdatearr[1])
                             ->first();



        if($schedulefee){
          $schedulefee->issue_date = date('m/d/Y',strtotime($schedulefee->issue_date));
          $accounts = json_decode($schedulefee->accounts);
          $accounts = (array)$accounts;
          $otherCharges = [];
          $accountdetail =[]; 
          $accountsde = '';
          $otherAccount = [];
          $acocuntsdata = [];
          $otherdata = [];
           if(sizeof($accounts)>0){
                $i=0;   
                foreach($accounts as $key=>$val){
                    $vals = (array) $val;
                    if($i==0){
                        $otherdataaa = [];
                        $otherdataaa['id'] = $vals["'id'"];
                        $otherdataaa['bill_Freq'] = $vals["'bill_Freq'"];
                        $otherdataaa['amount'] = $vals["'amount'"];
                        $otherdataaass = Chartofaccounts::where('acc_Id',$otherdataaa['id'])->first();
                        $otherdataaa['name'] = $otherdataaass->acc_Name;
                        $otherdata = $otherdataaa; 
                    }
                    if($i>0){
                        $othraccount = [];
                        $othraccount['id'] = $vals["'id'"];
                        $othraccount['bill_Freq'] = $vals["'bill_Freq'"];
                        $othraccount['amount'] = $vals["'amount'"];
                        $acconname = Chartofaccounts::where('acc_Id',$othraccount['id'])->first();
                        $othraccount['name'] = $acconname->acc_Name;
                        $acocuntsdata[] = $othraccount; 
                    }
                    $i++;  
                }    
            } 
            $fdate = $schedulefee->issue_date;
            $tdate = $schedulefee->due_Date;             
            $datetime1 = strtotime($fdate); 
            $datetime2 = strtotime($tdate); 
            $days = (int)(($datetime2 - $datetime1)/86400);  
            $schedulefee->term = $days;
            $schedulefee->tution_account = $accountdetail;
            $schedulefee->otherCharges = $otherCharges;
            $schedulefee->acocuntsdata = $acocuntsdata;
            /* deposite Account */
            $schedulefee->otherdata = $otherdata;
            $acconname = Chartofaccounts::where('acc_Id',$schedulefee->acc_Id)->first();
            $schedulefee->accountS ='';
            if($acconname){
                 $s= $acconname->acc_Name;
             
                 $schedulefee->accountS =  $s;  

            }
                 
            $schedulefee->accountsde = $accountsde;

            $schedulefee->deposite_account   = Chartofaccounts::Where('acc_Id',$schedulefee->payment_Mode)->first();

        }



        $BankAccounts   = BankAccount::where('user_id',$id)->get();
        $PaymentType   = Chartofaccounts::where('acc_Name','Cash on Hand')->OrWhere('acc_Name','Cash at bank')->get();
      
        
        if($request->type=='transaction'){  
            
            return view('accountPortal.partial.transaction', compact('transactions','student','gardFather','Account_typesFees','schedulefee','PaymentType','BankAccounts'))->render();

        }
        return view('accountPortal.incomedetail',compact('student','gardFather','Account_typesFees','Account_types_income','transactions','schedulefee','PaymentType','BankAccounts'));
    }



    public function accountDropdown(Request $request){
        $issdate =date("Y-m");
        $issdatearr = explode("-",$issdate);
        $data['Fee_schedule'] = Fee_schedule::where('std_Id',$request->sid)
                                ->whereYear('fee_month', '=', $issdatearr[0])
                                ->whereMonth('fee_month', '=', $issdatearr[1])
                                ->first();

        $data['depostaccount'] = Chartofaccounts::where('acc_parent',$request->id)->get();
        return Response::json($data);                
    }

    public function chartOfAccount(Request $request){
        $Account_types   = Account_type::all();
        $Chartofaccounts = Chartofaccounts::all();
        if($request->type=='Chartofaccounts'){
             return view('accountPortal.partial.chartOfAccount', compact('Chartofaccounts'))->render();
        }
        $acc_parents = Chartofaccounts::all();
        return view('accountPortal.chartOfAccount' , compact('Account_types','Chartofaccounts','acc_parents'));
    }

    public function addAccountStatement(Request $request){
        $array_re =[                 
                    'st_Date' => 'required', 
                    'term' => 'required', 
                    'fine_due_Date' => 'required', 
                    'payment_Mode' => 'required', 
                    'acc_Id' => 'required',                                   
                ];

        $validator =   Validator::make($request->all(),$array_re);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
           
            $issdate =date("Y-m", strtotime($request->st_Date));
            $issdatearr = explode("-",$issdate);
            $Fee_schedule = Fee_schedule::where('std_Id',$request->std_Id)
                                          ->whereYear('fee_month', '=', $issdatearr[0])
                                          ->whereMonth('fee_month', '=', $issdatearr[1])
                            ->first();

            if($Fee_schedule==null){
                 $Fee_schedule = new Fee_schedule();
            } 


            $Fee_schedule->std_Id = $request->get('std_Id');
            $Fee_schedule->acc_Id = $request->get('acc_Id');                     
            $accounts = [];
            foreach($request->get('accounts') as $key=>$val){
                $valss = '';
                if(!empty($request['optionCheckboxes'.$key])){             
                  $valss =$request['optionCheckboxes'.$key];  
                }     
                if($valss=='on'){ 
                    $accounts [] =$val;
                }
            }
            $Fee_schedule->accounts = json_encode($accounts);
            $Fee_schedule->issue_date =  date('Y-m-d',strtotime($request->get('st_Date')));
            $Fee_schedule->fine_due_Date = $request->get('fine_due_Date');
            $Fee_schedule->payable_by_due_date = $request->get('Payable_by_due_date');
            $Fee_schedule->payable_after_due_date = $request->get('total_Payable_after_due_date');
            $Fee_schedule->payment_Mode = $request->get('payment_Mode');
            $date = date('Y-m-d' , strtotime($request->st_Date));
            $Fee_schedule->due_Date =Carbon::parse($date)->addDays($request->get('term'));
            $Fee_schedule->fee_month =date("Y-m-d", strtotime($request->st_Date));
            
            if($Fee_schedule->fee_sch_Id!=''){
                $Fee_schedule->fee_sch_Id = $Fee_schedule->fee_sch_Id;
                $Fee_schedule->update();
            }else{
                $Fee_schedule->save();
            }




            if(isset($request->schedule_id) and $request->schedule_id!=''){

                 Transactions::where('schedule_id',$request->schedule_id)->delete();
                
                $request->month=$request->get('st_Date');

                $this->schedulefeeGenerateSave($request);
                 return response()->json(['message' => 'Bill Updated Successfully !']); 

               
            }   


            return response()->json(['message' => 'Successfully Added!']); 
        }        
    }


    public function schedulefeeShow(Request $request){ 

        
        $issdate =date("Y-m");
        $issdatearr = explode("-",$issdate);
        $schedulefee = Fee_schedule::where('std_Id' , $request->std_Id)
                                      ->whereYear('fee_month', '=', $issdatearr[0])
                                      ->whereMonth('fee_month', '=', $issdatearr[1])
          ->first();
        if(isset($request->schedule) and $request->schedule!='')
        {
            $schedulefee = Fee_schedule::where('fee_sch_Id',$request->schedule)->first();
        }
        if($schedulefee){
           $schedulefee->issue_date = date('m/d/Y',strtotime($schedulefee->issue_date));
           $accounts = json_decode($schedulefee->accounts);
           $accounts = (array)$accounts;
           $otherCharges = [];
           $accountdetail =[]; 
           $otherdata =[]; 
           $acocuntsdata =[]; 
            if(sizeof($accounts)>0){
                $i=0;   
                foreach($accounts as $key=>$val){
                    $vals = (array) $val;
                    if($i==0){
                        $otherdataaa = [];
                        $otherdataaa['id'] = $vals["'id'"];
                        $otherdataaa['bill_Freq'] = $vals["'bill_Freq'"];
                        $otherdataaa['amount'] = $vals["'amount'"];
                        $otherdataaass = Chartofaccounts::where('acc_Id',$otherdataaa['id'])->first();
                        $otherdataaa['name'] = $otherdataaass->acc_Name;
                        $otherdata = $otherdataaa; 
                    }
                    if($i>0){
                        $othraccount = [];
                        $othraccount['id'] = $vals["'id'"];
                        $othraccount['bill_Freq'] = $vals["'bill_Freq'"];
                        $othraccount['amount'] = $vals["'amount'"];
                        $acconname = Chartofaccounts::where('acc_Id',$othraccount['id'])->first();
                        $othraccount['name'] = $acconname->acc_Name;                             
                        $acocuntsdata[] = $othraccount; 
                    }
                    $i++;       
                }    
            }
            $fdate                       =   $schedulefee->issue_date;
            $tdate                       =   $schedulefee->due_Date;                       
            $datetime1                   =   strtotime($fdate);     
            $datetime2                   =   strtotime($tdate);     
            $days                        =   (int)(($datetime2 - $datetime1)/86400);     
            $schedulefee->term           =   $days; 
            $schedulefee->tution_account =   $otherdata;  
            $schedulefee->otherCharges   =   json_encode($acocuntsdata);    
        }else{
              $schedulefee['datestart'] =date('m/01/Y');

        }
        return Response::json($schedulefee);
    }

    public function schedulefeeGenerate(Request $request){
        $student = User::findOrFail($request->std_Id);
        $where = array('std_Id' => $request->std_Id);
        $schedulefee = Fee_schedule::where($where)->first();
        $open  = $student->getBalanceStudent();  
        if($schedulefee){
            $schedulefee->issue_date = date('m/d/Y',strtotime($schedulefee->issue_date));
            $accounts = json_decode($schedulefee->accounts);
            $accounts = (array)$accounts;
            $accountdetail =[]; 
            if(sizeof($accounts)>0){
                foreach($accounts as $key=>$val){
                    $array = [];
                    $valex =  (array) $val;
                    $array['id'] = $valex["'id'"];
                    $array['amount'] = $valex["'amount'"];
                    $array['bill_Freq'] = $valex["'bill_Freq'"];
                    $accountCharted =Chartofaccounts::where('acc_Id',$valex["'id'"])->first();
                    $array['name'] = $accountCharted->acc_Name;
                    $accountdetail[]=$array; 
                }                
            }
            $fdate = $schedulefee->issue_date;
            $tdate = $schedulefee->due_Date;             
            $datetime1 = strtotime($fdate); 
            $datetime2 = strtotime($tdate); 
            $days = (int)(($datetime2 - $datetime1)/86400);
            $schedulefee->term = $days;
            $schedulefee->student = $student->name;
            $schedulefee->student_accounts = json_encode($accountdetail);
            $schedulefee->open = $open;
        }else{
           $schedulefee = (object)[];
           $schedulefee->open = $open;
           $schedulefee->student = $student->name;
        }
        return Response::json($schedulefee);
    }

    /*  Recieve Bill  */
    public function schedulefeeReceiveBill(Request $request){
        $student = User::findOrFail($request->std_Id);
        $where = array('tr_Status'=>'Open');
        $query = Transactions::query();
        if(!empty($request->transaction)){
            $query = $query->where('tr_Id', $request->transaction);
        }
        $query->where('std_Id',$request->std_Id);
        $query->where('tr_Type',1);
        $query->where('char_id',1);
        $query->where('tr_Status', '!=', 'Close');
        $Transactions = $query->get();                           
        $issdate =date("Y-m");
        $issdatearr = explode("-",$issdate); 
        $Fee_schedule = Fee_schedule::where('std_Id',$request->std_Id)
                                          ->whereYear('fee_month', '=', $issdatearr[0])
                                          ->whereMonth('fee_month', '=', $issdatearr[1])
                                    ->first();  

        $accounts = [];
        if($Fee_schedule){
            $accounts = json_decode($Fee_schedule->accounts);
        } 
        $accounts = (array)$accounts;
        $otherCharges = [];
        $accountdetail =[]; 
        $otherdata =[]; 
        $acocuntsdata =[];  
        if(sizeof($accounts)>0){
            $i=0;   
            foreach($accounts as $key=>$val){           
                $vals = (array) $val;
                if($i==0){
                    $otherdataaa = [];
                    $otherdataaa['id'] = $vals["'id'"];
                    $otherdataaa['bill_Freq'] = $vals["'bill_Freq'"];
                    $otherdataaa['amount'] = $vals["'amount'"];
                    $otherdataaass = Chartofaccounts::where('acc_Id',$otherdataaa['id'])->first();
                    $otherdataaa['name'] = $otherdataaass->acc_Name;
                    $otherdata = $otherdataaa; 
                }
                $i++;
            }    
        } 
        $TransactionsData = [];
        if($Transactions){
            foreach ($Transactions as $key => $value) {
                $Transactionsar = [];
                $Transactionsar['tr_Id'] =$value->tr_Id;
                $Transactionsar['schedule_id'] =$value->schedule_id;
                
                $fdate = $value->schedule->issue_date;
                $tdate = $value->schedule->due_Date;             
                $datetime1 = strtotime($fdate); 
                $datetime2 = strtotime($tdate); 
                $days = (int)(($datetime2 - $datetime1)/86400);  
                $Transactionsar['due_Date'] =date( 'Y-m-d' , strtotime($value->tr_Date));
                $Transactionsar['due_Date']= strtotime("+".$days." day", strtotime($Transactionsar['due_Date']));
                $Transactionsar['due_Date'] =  date("d-m-Y", $Transactionsar['due_Date']);
                $today = date("Y-m-d");
                $currentDate = strtotime($today);
                if ($value->tr_Type==1 and $value->tr_Status=='Partial'){
                    $Transactionsar['balance'] =$value->bl_Amt;
                    $Transactionsar['amount'] =$value->dr_Amt;

                 }else if ($value->tr_Type==1){

                   $Transactionsar['balance']= $value->bl_Amt;
                   $Transactionsar['amount']= $value->dr_Amt ;
                              
                }else if($currentDate >=  $due){   
                    $Transactionsar['balance'] =$value->bl_Amt;
                    $Transactionsar['amount'] =$value->schedule->payable_by_due_date;
                }else{
                    $Transactionsar['amount'] =$value->schedule->fine_due_Date+$value->bl_Amt;
                    $Transactionsar['balance'] =$value->schedule->payable_after_due_date;
                }
                $Transactionsar['issue_date'] =date( 'd/m/Y' , strtotime($value->schedule->issue_date));
                $Transactionsar['tr_Date'] =date( 'd/m/Y' , strtotime($value->tr_Date));
                $TransactionsData[]=$Transactionsar;          
            }            
        }
        $data = [];
        $data['transactions'] =$TransactionsData;
        $data['Transactions_latest'] =Transactions::orderBy('tr_Id','desc')->first();
        $data['student'] =$student;
        if($Fee_schedule){
            $Fee_schedule->tution_account = $otherdata;            
        }else{
            $data['Fee_schedule'] ='';  
        }
        $dats= date("Y-m-d");
        $data['date'] =date('m/d/Y',strtotime($dats)); 
        $data['Fee_schedule'] =$Fee_schedule; 
        $data['Fee_schedule'] =$Fee_schedule; 
        return Response::json($data);
    }

    /*  Recieve Bill  */
     
 
    public function freeStatement(Request $request){

        $student = User::findOrFail($request->std_Id);
        $mailing_add = $student->studentinfo?$student->studentinfo->contact:'';

        $student->contact = $mailing_add;
        $data['student'] =$student;

        /* Open Item*/
        if($request->report_type==1){
            $date = strtotime($request->statement_date.' -1 year');
            $datef = date('Y-m-d',$date);
            $startDate = Carbon::createFromFormat('Y-m-d',$datef)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d',  $request->statement_date)->endOfDay();

            $data['Transactions'] = Transactions::where('std_Id',$request->std_Id)
                                    ->where('acc_Id',$request->std_Id)
                                    ->where('char_id',1)
                                    ->where('tr_Type',1)
                                    ->whereBetween('tr_Date', [$startDate, $endDate])
                                    ->get();
             $data['type'] = 1;
        }else if($request->report_type==2){
            $startDate = Carbon::createFromFormat('Y-m-d',$request->start_date)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d',  $request->end_date)->endOfDay();
            $data['Transactions'] = Transactions::where('std_Id',$request->std_Id)
                                    ->where('acc_Id',$request->std_Id)
                                    ->where('char_id',1)
                                    ->whereBetween('tr_Date', [$startDate, $endDate])
                                    ->get();
                                     $data['type'] = 2;
            // dd($data['Transactions']);

        }else if($request->report_type==3){

            $startDate = Carbon::createFromFormat('Y-m-d',$request->start_date)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d',  $request->end_date)->endOfDay();
            $data['Transactions'] = Transactions::where('std_Id',$request->std_Id)
                                    ->where('acc_Id',$request->std_Id)
                                    ->where('tr_Type',1)
                                    ->where('char_id',1)
                                    ->whereBetween('tr_Date', [$startDate, $endDate])
                                    ->get();
                                     $data['type'] = 3;

        }

        $dats= date("Y-m-d");
        $data['date'] =date('m/d/Y',strtotime($dats));
        return Response::json($data);
    }

    /*  Fees Statments  */
    public function scheduleAdjustFee(Request $request){
        $student = User::findOrFail($request->std_Id);
        $data['Transactions_latest'] =Transactions::orderBy('tr_Id','desc')->first();
        $data['student'] =$student; 
        $date['date'] = date('d-m-Y');
        return Response::json($data);
    }

    public function PrintFeeBill(Request $request){

            $transaction = transactions::where('tr_Id',$request->tran_Id)->first();
            if($transaction){
                $data=[];
                $data['transaction'] = $transaction;
                $student = User::findorFail($request->std_Id);
                $student->studentAdissionNo = $student->studentinfo ? $student->studentinfo->admission->adm_Number : '';
                $student->School = School::all();
                $student->father = $student->studentinfo ? $student->studentinfo->father($student->studentinfo->father_id) :  '';
                $student->class = $student->studentinfo ? $student->studentinfo->class->class: '';
                $data['studentData'] = $student;
                $where = array('std_Id' => $request->std_Id);
                $schedulefee = Fee_schedule::where($where)->first();
                $open  = $student->getBalanceStudent() ;
                $accounts = json_decode($schedulefee->accounts);
                $accounts = (array)$accounts;
                $accountdetail =[];
                if(sizeof($accounts)>0){
                    foreach($accounts as $key=>$val){
                        $array = [];
                        $valex =  (array) $val;
                        $array['id'] = $valex["'id'"];
                        $array['amount'] = $valex["'amount'"];
                        $array['bill_Freq'] = $valex["'bill_Freq'"];
                        $accountCharted =Chartofaccounts::where('acc_Id',$valex["'id'"])->first();
                        $array['name'] = $accountCharted->acc_Name;
                        $accountdetail[]=$array;
                    }
                }
                $fdate = $schedulefee->issue_date;
                $tdate = $schedulefee->due_Date;
                $datetime1 = strtotime($fdate);
                $datetime2 = strtotime($tdate);
                $days = (int)(($datetime2 - $datetime1)/86400);
                $schedulefee->term = $days;
                $schedulefee->student = $student->name;
                $schedulefee->student_accounts = json_encode($accountdetail);
                $schedulefee->open = $open;
                $data['schedulefee'] = $schedulefee;
                return Response::json($data);

            }else{
                return response()->json(['error' => 'Fee bill doesnot exist','type'=> 'warning']);
            }

        }


    /*  Link pending invoice  Bill  */

    public function linkPending(Request $request){
        $student = User::findOrFail($request->std_Id);
        if(isset($request->transaction) and $request->transaction!=''){
        $Transactions = Transactions::where('tr_Id',$request->transaction)->get();
        }else{
        $Transactions = Transactions::where('std_Id',$request->std_Id)->where('char_id',1)
                            ->where('tr_Type',1)-> where(
                                function ($query) {
                                    $query->where('tr_Status', '=', 'Open')
                                    ->orWhere('tr_Status', '=',  'Partial');
                        })->get();
        }
        $TransactionsData = [];
        if($Transactions){
            foreach ($Transactions as $key => $value) {
                $Transactionsar = [];
                $Transactionsar['tr_Id'] =$value->tr_Id;
                $Transactionsar['schedule_id'] =$value->schedule_id;
                $Transactionsar['type'] =$value->Type($value->tr_Type);
                $Transactionsar['due_Date'] =date( 'd/m/Y' , strtotime($value->schedule->due_Date));
                $Transactionsar['tr_Status'] =$value->tr_Status;       
                $fdate = $value->schedule->issue_date;
                $tdate = $value->schedule->due_Date;             
                $datetime1 = strtotime($fdate); 
                $datetime2 = strtotime($tdate); 
                $days = (int)(($datetime2 - $datetime1)/86400);  
                $Transactionsar['due_Date'] =date( 'Y-m-d' , strtotime($value->tr_Date));
                $Transactionsar['due_Date']= strtotime("+".$days." day", strtotime($Transactionsar['due_Date']));
                $Transactionsar['due_Date'] =  date("d-m-Y", $Transactionsar['due_Date']);
                $today = date("Y-m-d");
                $currentDate = strtotime($today);
                $due  =strtotime($Transactionsar['due_Date']); 
                if ($value->tr_Type==1 and $value->tr_Status=='Partial'){
                    $Transactionsar['balance'] =$value->bl_Amt;
                    $Transactionsar['amount'] =$value->dr_Amt;

                 }else if ($value->tr_Type==1){

                    $Transactionsar['balance']= $value->bl_Amt;
                    $Transactionsar['amount']= $value->dr_Amt ;
                              
                }else if($currentDate  >= $due)
                {   
                    $Transactionsar['balance'] =$value->bl_Amt;
                    $Transactionsar['amount'] =$value->schedule->payable_by_due_date;

                }else{
                
                    $Transactionsar['amount'] =$value->schedule->fine_due_Date+$value->bl_Amt;
                    $Transactionsar['balance'] =$value->schedule->payable_after_due_date;

                }

                $Transactionsar['issue_date']   =   date( 'd/m/Y' , strtotime($value->schedule->issue_date));
                $Transactionsar['tr_Date']      =   date( 'd/m/Y' , strtotime($value->tr_Date));
                $TransactionsData[]             =   $Transactionsar;
                    
            }
        }
        $data['transactions'] =$TransactionsData;
        return Response::json($data);
    }
    
    public function linkPendingSubmit(Request $request){
        $array_re =[
                    'receipt_no' => 'required',    
                    'total_amount' => 'required',                
                    'date' => 'required',    
        ];
        $user = User::where('id',$request->std_Id)->first();
        $validator =   Validator::make($request->all(),$array_re);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        
        }else{

            $accont_transtion = '';
            $accountName = Chartofaccounts::where('acc_Name','Account Receivables (AR)')->first();  
            $AccountReceiable = array(
                      'std_Id'            => $request->std_Id,
                      'tr_Type'           => 2,
                      'tr_Date'           =>  date('Y-m-d h:i:s' , strtotime($request->date)),
                      'schedule_id'       => 0,
                      'acc_Id'            => $accountName->acc_Id,
                      'Narration'         => 'Fees ajustment  for student '.$request->std_Id,
                      'dr_Amt'            =>  0,
                      'cr_Amt'            => intval(str_replace(',', '',  $request->total_amount))  ,
                      'bl_Amt'            => 0,
                      'tr_Status'         => 'Close',
                      'Vtype'             => 'Fees ajustment'
                       
            );
            Transactions::create($AccountReceiable);
            $Account =Chartofaccounts::where('acc_Name','Bad Debts')->first();
            $bedDebits = array(
                      'std_Id'            => $request->std_Id,
                      'tr_Type'           => 2,
                      'tr_Date'           =>  date('Y-m-d h:i:s' , strtotime($request->date)),
                      'schedule_id'       => 0,
                      'acc_Id'            => $Account->acc_Id,
                      'Narration'         => 'Fees ajustment  for student '.$request->std_Id,
                      'dr_Amt'            =>  intval(str_replace(',', '',  $request->total_amount)) ,
                      'cr_Amt'            =>  0,
                      'bl_Amt'            =>  0,
                      'tr_Status'         => 'Close',
                      'Vtype'         => 'Fees ajustment'
                       
            );
            Transactions::create($bedDebits);
            $Account->acc_Balance =$request->total_amount+$Account->acc_Balance;
            $Account->update();
            foreach($request->no as $key=>$val){  
                $Transactionsss = Transactions::where('tr_Id',$val)->first();
                $Transactionsss->bl_Amt = 0;
                $Transactionsss->tr_Status = 'Close';
                $Transactionsss->save();  
                $ajustments = array(
                                  'std_Id'            => $request->std_Id,
                                  'tr_Type'           => 3,
                                  'char_id'           => 1,
                                  'tr_Date'           => date('Y-m-d h:i:s' , strtotime($request->date)),
                                  'schedule_id'       => $Transactionsss->schedule_id,
                                  'acc_Id'            => $request->std_Id,
                                  'Narration'         => 'Fees ajustment  for student '.$request->std_Id,
                                  'dr_Amt'            => 0,
                                  'cr_Amt'            => intval(str_replace(',', '', $request->amount[$key])) ,
                                  'bl_Amt'            => 0,
                                  'char_id'           => $request->std_Id,  
                                  'tr_Status'         => 'Close',
                                  'Vtype'             => 'Fees ajustment'
                        
                            );
                Transactions::create($ajustments);                        
            }
            return response()->json(['message' => 'Successfully Added!','balance'=>$user->getBalanceStudent()]); 
            
        }

    }

    public function paymentRecieve(Request $request){

        $array_re =[
                    'amount' => 'required',    
        ];        
        $user = User::where('id',$request->std_Id)->first();
        $validator =   Validator::make($request->all(),$array_re);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{
             

            if($request->payments) {
             
                $schedulePay =Fee_schedule::where('std_Id',$request->std_Id)->first();
                /*
                   Account Receiable
                */
                $accountName = Chartofaccounts::where('acc_Name','Account Receivables (AR)')->first();  

                $AccountReceiable = array(
                          'std_Id'            => $request->std_Id,
                          'tr_Type'           => 2,
                          'tr_Date'           =>  date('Y-m-d h:i:s' , strtotime($request->tr_Date)),
                          'schedule_id'       => $schedulePay->fee_sch_Id,
                          'acc_Id'            => $accountName->acc_Id,
                          'Narration'         => 'Fees payment for student '.$request->std_Id,
                          'dr_Amt'            => 0 ,
                          'cr_Amt'            => intval(str_replace(',', '', $request->amount)),
                          'bl_Amt'            => 0,
                          'tr_Status'         => 'Close',
                          'Vtype'         => 'Fees payment'
                           
                );
                Transactions::create($AccountReceiable);
               
                /*
                    Deposite account  
                */

                $deposte = array(
                          'std_Id'            => $request->std_Id,
                          'tr_Type'           => 2,
                          'tr_Date'           =>  date('Y-m-d h:i:s' , strtotime($request->tr_Date)),
                          'schedule_id'       => $schedulePay->fee_sch_Id,
                          'acc_Id'            => $request->acc_Id,
                          'Narration'         => 'Fees payment for student '.$request->std_Id,
                          'dr_Amt'            => intval(str_replace(',', '', $request->amount)),
                          'cr_Amt'            => 0 ,
                          'bl_Amt'            => 0,
                          'tr_Status'         => 'Close',
                          'Vtype'         => 'Fees payment'
                           
                );
                Transactions::create($deposte);

                foreach($request->payments as $key=>$val){  
                    
                    if($val!=0){

                        if($request->tr_Status[$key] == 'Close'){
                           
                            $Transactionsss = Transactions::where('tr_Id',$key)->first();
                            $Transactionsss->bl_Amt = 0;
                            $Transactionsss->tr_Status = 'Close';
                            $Transactionsss->save();
                            $usertransaction = array(
                                     'std_Id'            => $request->std_Id,
                                     'char_id'           => 1,
                                     'tr_Type'           => 2,
                                     'acc_Id'            => $request->std_Id,
                                     'tr_Date'           =>  date('Y-m-d h:i:s' , strtotime($request->tr_Date)),
                                     'schedule_id'       => $request->schedule_id[$key],
                                     'Narration'         => 'Fees payment for student '.$request->std_Id,
                                     'dr_Amt'            => 0,
                                     'cr_Amt'            => intval(str_replace(',', '', $val)),
                                     'bl_Amt'            => 0,
                                     'tr_Status'         => 'Close',
                                     'Vtype'         => 'Fees payment'
                                      
                           ); 

                           Transactions::create($usertransaction);

                        }

                        if($request->tr_Status[$key] == 'Partail'){
                            

                            $Transactionsss = Transactions::where('tr_Id',$key)->first();
                            $Transactionsss->bl_Amt = $request->balance[$key]-$request->payments[$key];
                            $Transactionsss->tr_Status = 'Partial';
                            $Transactionsss->save();

                            $usertransaction = array(
                                      'std_Id'            => $request->std_Id,
                                      'char_id'           => 1,
                                      'tr_Type'           => 2,
                                      'tr_Date'           =>  date('Y-m-d h:i:s' , strtotime($request->tr_Date)),
                                      'schedule_id'       => $request->schedule_id[$key],
                                      'acc_Id'            => $request->std_Id,
                                      'Narration'         => 'Fees payment for student '.$request->std_Id,
                                      'dr_Amt'            => 0,
                                      'cr_Amt'            => intval(str_replace(',', '', $val)),
                                      'bl_Amt'            => $request->balance[$key]-$request->payments[$key],
                                      'tr_Status'         => 'Close',
                                      'Vtype'         => 'Fees payment'
                                       
                            );

                            Transactions::create($usertransaction);



                        }

                        

                    }

                    
                }

                $balance =$user->getBalanceStudent();
 
                return response()->json(['message' => 'Successfully Added!','types'=>'success','balance' => $balance ]); 

        }else{
              $balance =$user->getBalanceStudent();
            return response()->json(['message' => 'No Bill Exists','types'=>'warning','balance' => $balance]); 

        }

            
            
        }

    }





    function truncate_number($number, $precision = 2) {
        if (0 == (int)$number) {
            return $number;
        }
        $negative = $number / abs($number);
        $number = abs($number);
        $precision = pow(10, $precision);

        return floor( $number * $precision ) / $precision * $negative;
    }

    public function schedulefeeGenerateSave(Request $request)
    {  
        $issdate =date("Y-m" ,strtotime($request->month));
        $issdatearr = explode("-",$issdate);
        $schedulefee = Fee_schedule::where('std_Id',$request->std_Id)
                                          ->whereYear('fee_month', '=', $issdatearr[0])
                                          ->whereMonth('fee_month', '=', $issdatearr[1])
                                     ->first();     
        $user =  User::where('id',$request->std_Id)->first();
        $month = date("Y-m-d", strtotime($request->month));
        $amount = 0 ;
        $balance =$user->getBalanceStudent();
        if($schedulefee)
        {

            $accounts = json_decode($schedulefee->accounts);
            $accounts = (array)$accounts;
            $accountdetail =[]; 
            $Transactions =  Transactions::where('std_Id',$user->id)->where('char_id',1)->where('month',$month)->where('tr_Type',1)->first();            
            if($Transactions){
                return response()->json(['message' => 'Bill already added','types'=>'warning', 'errors'=>'da','balance'=>$balance]);
            }else{
                $Transactions = new Transactions();
                if(sizeof($accounts)>0){
                    foreach($accounts as $key=>$val){
                        $array = [];
                        $valex =  (array) $val;
                        $array['id'] = $valex["'id'"];
                        $array['amount'] = $valex["'amount'"];
                        $array['bill_Freq'] = $valex["'bill_Freq'"];        
                        $accountCharted =Chartofaccounts::where('acc_Id',$valex["'id'"])->first();
                        $array['name'] = $accountCharted->acc_Name;
                        $accountdetail[]=$array; 
                        /* Tranascation  to all accounts */
                        $Transactions = new Transactions(); 
                        $Transactions->Vtype ='Fee Generated';
                        $Transactions->Narration ='Fees generated form student id '.$request->std_Id;
                        $Transactions->acc_Id = $valex["'id'"];
                        $Transactions->std_Id = $user->id;
                        $Transactions->dr_Amt = 0;
                        $Transactions->bl_Amt = 0;
                        $Transactions->tr_Date =  date('Y-m-d h:i:s' , strtotime($request->month));
                        $Transactions->cr_Amt = $this->truncate_number($array['amount']);
                        $Transactions->tr_Status = 'Open';
                        $Transactions->tr_Type = 1;
                        $Transactions->schedule_id =$schedulefee->fee_sch_Id;
                        $Transactions->save(); 
                        if($array['name'] !="Discount Allowed"){
                            $amount = $amount+$valex["'amount'"];
                        }
                    }                
                }

                $accont_transtion = '';


                /*  Transaction to account recieveble  */ 
                $accountName = Chartofaccounts::where('acc_Name','Account Receivables (AR)')->first();  
                $Transactions = new Transactions(); 
                $Transactions->Vtype ='Fee Generated';
                $Transactions->Narration ='Fees generated form student id '.$request->std_Id;
                $Transactions->acc_Id = $accountName->acc_Id;
                $Transactions->std_Id = $user->id;
                $Transactions->dr_Amt = $this->truncate_number($amount);
                $Transactions->bl_Amt = 0;
                $Transactions->tr_Date =  date('Y-m-d h:i:s' , strtotime($request->month));
                $Transactions->cr_Amt = 0;
                $Transactions->tr_Status = 'Open';
                $Transactions->tr_Type = 1;
                $Transactions->schedule_id =$schedulefee->fee_sch_Id;
                $Transactions->save(); 
                /*  Transaction to account recieveble  */
                $Transactions = new Transactions(); 
                $Transactions->Vtype ='Fee Generated';
                $Transactions->Narration ='Fees generated form student id '.$request->std_Id;
                $Transactions->acc_Id = $request->std_Id;
                $Transactions->std_Id = $request->std_Id;
                $Transactions->char_id = 1;
                $Transactions->dr_Amt = $this->truncate_number($amount);
                $Transactions->bl_Amt = $this->truncate_number($amount);
                $Transactions->cr_Amt = 0;
                $Transactions->month = $month;
                $Transactions->tr_Status = 'Open';
                $Transactions->tr_Type = 1;
                $Transactions->tr_Date =  date('Y-m-d h:i:s' , strtotime($request->month));
                $Transactions->schedule_id =$schedulefee->fee_sch_Id;
                $Transactions->save();
                $balance =$user->getBalanceStudent();
                return response()->json(['message' => 'Bill generated ', 'errors'=>'da' ,'types'=>'success' ,'balance'=>$balance]);
            }

        }
        return response()->json(['message' => 'No bill exit ', 'errors'=>'da']);
    }

    /* Remove accounts ,   Total amount paid in transaction,

        Problem In Adjustment

    */
    public function chartOfAccountDelete(Request $request)
    {

        $where = array('acc_Id' => $request->acc_Id);
        Chartofaccounts::where($where)->delete();
        return response()->json(['message' => 'Successfully Deleted!']);
    }


    /*
        Show Charted Of account
    */


    public function chartOfAccountShow(Request $request)
    {

        $where = array('acc_Id' => $request->acc_Id);
        $Chartofaccounts= Chartofaccounts::where($where)->first();
        $Chartofaccounts->acc_Type=$Chartofaccounts->account?$Chartofaccounts->account->acc_Type:'' ;
        
        if($Chartofaccounts->acc_parent!=0){
            $Chartofaccounts->acc_parent=$Chartofaccounts->parent?$Chartofaccounts->parent->acc_Name:'' ;

        }
        $Chartofaccounts->acc_Type=$Chartofaccounts->account?$Chartofaccounts->account->acc_Type:'' ;

        return Response::json($Chartofaccounts);

    }


    /*
        Show Chart Of account
    */
    public function chartOfAccountEdit(Request $request){
        $where = array('acc_Id' => $request->acc_Id);
        $Chartofaccounts= Chartofaccounts::where($where)->first();
        $Chartofaccounts->description2=$Chartofaccounts->account?$Chartofaccounts->account->acc_Desc:'' ;       
        return Response::json($Chartofaccounts);
    } 

  

    

    public function payroll(){
        return view('accountPortal.payroll');
    }

    // PayRoll
    public function generatepayroll(Request $request){
          
        return Response::json(['success'=>'success']);
    } 


}

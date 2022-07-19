<?php

namespace App\Http\Controllers;

use App\Models\AddClasses;
use App\Models\Admission;
use App\Models\EmployeeInfo;
use App\Models\Event;
use App\Models\Guardian;
use App\Models\Pay_schedule;
use App\Models\Role;
use App\Models\School;
use App\Models\StudentInfo;
use App\Models\Attendance;
use App\Models\ClasswiseAttendance;
use App\Models\User;
use App\Models\Day;
use App\Models\Period;
use Illuminate\Http\Request;
use App\Models\ClassschedDays;
use App\Models\Gender;
use App\Models\Transactions;
use App\Models\WithdrawlStudent;
use Auth;
use Carbon\Carbon;
use Cron\DayOfWeekField;
use PHPUnit\TextUI\XmlConfiguration\Group;
use Symfony\Component\VarDumper\Cloner\Data;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $school = School::first();

        $activeStaffCount = '';
        $activeStudentCount = '';
        $events = '';
        $presentEmpPercentage = '';
        $absentEmpPercentage = '';
        $date = date('Y-m-d');
        // dd($date);

        $classes = AddClasses::all();
        $classeswiseAtt_Data = [];
        $classWiseStrength = [];
        $classwiseExaminationData = [];
        foreach($classes as $class){

            $presentStundent = ClasswiseAttendance::where('cls_Id', $class->cls_Id)->where('date_register', $date)->where('attendance', "P")->count();
            $absentStundent = ClasswiseAttendance::where('cls_Id', $class->cls_Id)->where('date_register', $date)->where('attendance', "A")->count();
            $lateStundent = ClasswiseAttendance::where('cls_Id', $class->cls_Id)->where('date_register', $date)->where('attendance', "L")->count();
            $leavedayStundent = ClasswiseAttendance::where('cls_Id', $class->cls_Id)->where('date_register', $date)->where('attendance', "H")->count();
            $classeswiseAtt_Data[$class->class]['present'] = $presentStundent;
            $classeswiseAtt_Data[$class->class]['absent'] = $absentStundent;
            $classeswiseAtt_Data[$class->class]['late'] = $lateStundent;
            $classeswiseAtt_Data[$class->class]['leave'] = $leavedayStundent;

            //student strength count classwise
            $classWiseStrength[$class->class] = StudentInfo::where('cls_Id', $class->cls_Id)->count();

            // classwise student Examination result
            $student_data = StudentInfo::select('std_Id')->where('cls_Id', $class->cls_Id)->first();



        }

        $totalActiveEmployees = User::whereHas('roles', function ($q) {
            $q->whereNotIn(
                'name',
                ['parents', 'Student', 'Super Admin']
            );
        })->where('status', 'active')->count();


        $male = Gender::where('gender', 'Male')->first();
        $female = Gender::where('gender', 'Female')->first();

        $total_male_employee = User::whereHas('roles', function ($q) {
            $q->whereNotIn(
                'name',
                ['parents', 'Student', 'Super Admin']
            );
        })->whereHas('employeeInfo', function ($q3) use ($male) {
            $q3->where('gnd_Id', $male->gnd_Id);
        })->where('status', 'active')->count();


        $total_female_employee = User::whereHas('roles', function ($q) {
            $q->whereNotIn(
                'name',
                ['parents', 'Student', 'Super Admin']
            );
        })->whereHas('employeeInfo', function ($q3) use ($female) {
            $q3->where('gnd_Id', $female->gnd_Id);
        })->where('status', 'active')->count();

        $presentStaff = Attendance::where('date', $date)->where('status', "P")->count();
        $lateStff = Attendance::where('date', $date)->where('status', "L")->count();
        $A_Stff = Attendance::where('date', $date)->where('status', "A")->count();
        $leaveStff = Attendance::where('date', $date)->where('status', "H")->count();
        $halfday_Stff = Attendance::where('date', $date)->where('status',"HD")->count();

        if($presentStaff == 0 && $lateStff== 0 && $A_Stff == 0 && $leaveStff == 0){
            $absentStaff = $A_Stff;
        }else{
            $absent_stf_count = $presentStaff + $lateStff + $leaveStff;
            $absentStaff =  $totalActiveEmployees - $absent_stf_count;
        }

        // dd($absentEmpPercentage);
        $totalActiveStudents = User::whereHas('roles', function ($q) {
            $q->whereIn(
                'name',
                ['Student']
            );
        })->where('status', 'active')->count();


        $total_male_std = User::whereHas('roles', function ($q) {
            $q->whereIn(
                'name',
                ['Student']
            );
        })->whereHas('studentinfo', function ($q3) use ($male) {
            $q3->where('gnd_Id', $male->gnd_Id);
        })->where('status', 'active')->count();

        $total_female_std = User::whereHas('roles', function ($q) {
            $q->whereIn(
                'name',
                ['Student']
            );
        })->whereHas('studentinfo', function ($q3) use ($female) {
            $q3->where('gnd_Id', $female->gnd_Id);
        })->where('status', 'active')->count();

        $presentStudent = ClasswiseAttendance::where('date_register', $date)->where('attendance', "P")->count();
        $lateStudent = ClasswiseAttendance::where('date_register', $date)->where('attendance', "L")->count();
        $A_Student = ClasswiseAttendance::where('date_register', $date)->where('attendance', "P")->count();
        $leaveday_Std = ClasswiseAttendance::where('date_register', $date)->where('attendance', "H")->count();


        if($presentStudent == 0 && $lateStudent== 0 && $A_Student == 0 && $leaveday_Std == 0){
            $absentStudent = $A_Student;
        }else{

            $absent_std_count =  $presentStudent + $lateStudent + $leaveday_Std;
            $absentStudent =  $totalActiveStudents - $absent_std_count;
        }


        $currentYear = date("Y-m-d"); // 2020
        $previousYear = date("Y-01-01",strtotime ('-6 year' , strtotime ($currentYear))) ;

        $stdEnroledData = Admission::whereBetween('adm_Date', [$previousYear, $currentYear])->get();
        $stdWithdrawlStd = WithdrawlStudent::whereBetween('withdrawl_Date', [$previousYear, $currentYear])->get();

        // dd($stdWithdrawlStd);

        $total_std_enrolled = [];
        $total_std_withdrawal = [];

        //dd(strtotime($previousYear));


        $Year = date('Y' ,strtotime($previousYear));

        for ($i=$Year; $i<=date('Y'); $i++) {
            $total_std_withdrawal[$i]=0;
            $total_std_enrolled[$i]=0;
        }


        foreach($stdWithdrawlStd as $yearly_withdrawl_std){
            $enr_year = date('Y', strtotime($yearly_withdrawl_std->withdrawl_Date));
            if(isset($total_std_withdrawal[$enr_year])){
                $total_std_withdrawal[$enr_year]=1+$total_std_withdrawal[$enr_year];
            }else{
                $total_std_withdrawal[$enr_year]=1;
            }

        }


        foreach($stdEnroledData as $yearly_enrolled_std){
            $enr_year = date('Y', strtotime($yearly_enrolled_std->adm_Date));

            if(!empty($total_std_enrolled[$enr_year])){
                $total_std_enrolled[$enr_year] = $total_std_enrolled[$enr_year] + 1;
            }else{
                if(!empty($yearly_enrolled_std)){
                    $total_std_enrolled[$enr_year] = 1;
                }else{
                    $total_std_enrolled[$enr_year] = 0;
                }
            }
        }

        $events = Event::orderBy('id', 'Desc')->get();
        $user = User::findOrFail(Auth::user()->id);
        $role = $user->roles->first();
        $childrens = '';

        if ($role->name == 'parents') {

            $parent_id = $user->guardianInfo ? $user->guardianInfo->user_id : '';


            $childrens = User::whereHas('roles', function ($q) {
                $q->where('name', 'Student');
            })->whereHas('studentinfo', function ($q2) use ($user) {

                $q2->where('mother_id', $user->id);
                $q2->orwhere('father_id', $user->id);
            })->whereDoesntHave('withDraw')->get();
        }
        $days = Day::all();
        $periods = Period::all();


        if ($role->name == 'Teacher') {




            $Attendances = Attendance::where('employee_id', Auth::user()->id, function ($q) {
                $q->whereIn('date', Carbon::now()->month);
            })->get();

            $ClassschedDays = ClassschedDays::where('emp_Id', Auth::user()->id)->get();
            $timatable = [];
            if ($ClassschedDays) {
                foreach ($ClassschedDays as $key => $value) {
                    $value->subject = $value->subject ? $value->subject->subject : '';
                    $value->class_name = $value->schudle_list->class ? $value->schudle_list->class->class : '';
                    $value->section_name = $value->schudle_list->class ? $value->schudle_list->section->class_section_name : '';
                    $timatable[$value->peroid][$value->day] = $value;
                }
            }

            $monthadd = [];
            foreach ($Attendances as $key => $val) {

                $monthadd[$val->date]['date'] = $val->date;
                $monthadd[$val->date]['in_time'] = $val->in_time;
                $monthadd[$val->date]['out_time'] = $val->out_time;
                $monthadd[$val->date]['status'] = $val->getAttendeneceState($val->status);
            }



            $transactions  = transactions::where(['tr_Type'=>1,'emp_Id'=>Auth::user()->id,'acc_Id'=>Auth::user()->id,'char_id'=>1])->get();
            $schedulePay = '';
            $where = array('emp_Id' => Auth::user()->id);

            $issdate =date("Y-m");
            $issdatearr = explode("-",$issdate);
            $schedulePay = Pay_schedule:: where('emp_Id',Auth::user()->id)
                ->whereYear('pay_month', '=', $issdatearr[0])
                ->whereMonth('pay_month', '=', $issdatearr[1])
                ->first();





            //return view('accountPortal.pay_emp',compact('emplolye','transactions','schedulePay'));


            return view('teacher.dashboard', compact('user', 'days', 'periods', 'monthadd','timatable','transactions'));
        }

        if ($role->name == 'Admin') {
            $transactionslist=  $this->SchIncomDetails();


            return view('admin-dashboard.admin-dashboard', compact('presentStudent', 'lateStudent', 'leaveday_Std', 'absentStudent', 'totalActiveStudents',
                'total_female_std', 'total_male_std', 'totalActiveEmployees', 'presentStaff', 'absentStaff', 'lateStff','leaveStff', 'halfday_Stff',
                'events','total_female_employee', 'total_male_employee',
                'classeswiseAtt_Data','total_std_enrolled','total_std_withdrawal','classWiseStrength','transactionslist'));
        }


        if ($role->name == 'Student' || $role->name == 'parents') {

            $presentday = ClasswiseAttendance::where('date_register', date('m'))->where('std_Id', Auth::user()->id)->where('attendance', "P")->count();
            $lateday = ClasswiseAttendance::where('date_register', date('m'))->where('std_Id', Auth::user()->id)->where('attendance', "L")->count();
            $absentday = ClasswiseAttendance::where('date_register', date('m'))->where('std_Id', Auth::user()->id)->where('attendance', "P")->count();
            $leaveday = ClasswiseAttendance::where('date_register', date('m'))->where('std_Id', Auth::user()->id)->where('attendance', "H")->count();

            $stdOpenBalance = $user->openBalance($user->id);
            // dd($stdOpenBalance);
            return view('studentParentPortal.student-detail', compact('user', 'childrens', 'role', 'school','presentday','lateday','leaveday','absentday','stdOpenBalance'));
        }

        if($role->name == 'Examiner'){
            return view('examiner.dashboard');
        }
        /*elseif ($role->name=='parents'){
            //dd($role->name);
            return view('student.dashboard',compact('user','childrens','role'));
        }*/ else {

            $stdFeesDetails   = Transactions::where('char_id',1)
                ->whereYear('tr_Date','=',date('Y'))
                ->where('tr_Type',1)->where('tr_Status','')->get();

            // dd($stdFeesDetails);
            $transactionslist =  $this->SchIncomDetails();
            return view('accountPortal.accountant-dashboard', compact('transactionslist'));

        }
    }

    public function SchIncomDetails(){
        $transactionslists = [];
        $reweekly   = Transactions::where('char_id',1)

            ->where('tr_Type',1)->whereBetween('tr_Date', [
                Carbon::parse('last monday')->startOfDay(),
                Carbon::parse('next friday')->endOfDay(),
            ]) ->whereNotNull('std_Id')->get();
        $transactionslist = [];
        $income = [];
        if($reweekly){

            $income['Mon'] =0;
            $income['Tue'] =0;
            $income['Wen'] =0;
            $income['Thr'] =0;
            $income['Fri'] =0;
            $income['Sat'] =0;
            $income['Sun'] =0;
            foreach ($reweekly as $value){
                $days  = date('D', strtotime($value->tr_Date));

                if(isset($income[$days])){
                    $income[$days]=$value->dr_Amt+$income[$days];
                }else{
                    $income[$days]=$value->dr_Amt;
                }

            }

        }
        $transactionslist['weekly']['income']=$income;
        $exoend   = Transactions::where('char_id',1)
            ->whereNotNull('emp_Id')
            ->where('tr_Type',1)->whereBetween('tr_Date', [
                Carbon::parse('last monday')->startOfDay(),
                Carbon::parse('next friday')->endOfDay(),
            ])->get();

        $expendarray = [];
        if($exoend){

            $expendarray['Mon'] =0;
            $expendarray['Tue'] =0;
            $expendarray['Wen'] =0;
            $expendarray['Thr'] =0;
            $expendarray['Fri'] =0;
            $expendarray['Sat'] =0;
            $expendarray['Sun'] =0;


            foreach ($exoend as $value){
                $days  = date('D', strtotime($value->tr_Date));

                if(isset($value[$days])){
                    $expendarray[$days]=$value->cr_Amt+$expendarray[$days];
                }else{
                    $expendarray[$days]=$value->cr_Amt;
                }

            }

        }

        $transactionslist['weekly']['expense']=$expendarray;


        /*
            Income  and Expense Monthly
        */
        $MontlyResult   = Transactions::where('char_id',1)
            ->whereYear('tr_Date','=',date('Y'))
            ->where('tr_Type',1)->get();

        $income = [];
        $expendarray = [];
        if($MontlyResult){
            $Months = config('constants.Months');

            foreach ($Months as $key => $value) {
                $income[$key] = 0 ;
                $expendarray[$key] = 0 ;
            }
            foreach ($MontlyResult as $value){
                $Month  = date('m', strtotime($value->tr_Date));
                if(!empty($value->std_Id)){
                    if(isset($income[$Month])){
                        $income[$Month]=$value->dr_Amt+$income[$Month];
                    }else{
                        $income[$Month]=$value->dr_Amt;
                    }
                }

                if(!empty($value->emp_Id)){
                    if(isset($value[$Month])){
                        $expendarray[$Month]=$value->cr_Amt+$expendarray[$Month];
                    }else{
                        $expendarray[$Month]=$value->cr_Amt;
                    }
                }
            }
        }
        $transactionslist['monthly']['income']=$income;
        $transactionslist['monthly']['expense']=$expendarray;


        /*
            Income  and Expense Yearly
        */
        $MontlyResult   = Transactions::where('char_id',1)
            ->whereYear('tr_Date','=',date('Y'))
            ->where('tr_Type',1)->get();

        $income = [];
        $expendarray = [];
        if($MontlyResult){

            $year = date("Y",strtotime("-10 year"));



            for ($i=$year; $i<=date('Y'); $i++) {

                $income[$i]=0;
                $expendarray[$i]=0;

            }

            foreach ($MontlyResult as $value){
                $year  = date('Y', strtotime($value->tr_Date));
                if(!empty($value->std_Id)){
                    if(isset($income[$year])){
                        $income[$year]=$value->dr_Amt+$income[$year];
                    }else{
                        $income[$year]=$value->dr_Amt;
                    }
                }

                if(!empty($value->emp_Id)){
                    if(isset($value[$year])){
                        $expendarray[$year]=$value->cr_Amt+$expendarray[$year];
                    }else{
                        $expendarray[$year]=$value->cr_Amt;
                    }
                }
            }
        }

        $transactionslist['yearly']['income']=$income;
        $transactionslist['yearly']['expense']=$expendarray;
        return $transactionslist;
        //    dd($transactionslist['weekly']['expense']);

    }
}

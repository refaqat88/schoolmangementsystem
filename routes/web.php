<?php
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminReligionController;
use App\Http\Controllers\AdminGenderController;
use App\Http\Controllers\AdminSectionController;
use App\Http\Controllers\AdminBloodGroupController;
use App\Http\Controllers\AdminDesignationController;
use App\Http\Controllers\AdminCastController;
use App\Http\Controllers\AdminStudentCategoryController;
use App\Http\Controllers\AdminMaritalStatusController;
use App\Http\Controllers\AdminNationalityController;
use App\Http\Controllers\AdminStateController;
use App\Http\Controllers\AdminDistrictController;
use App\Http\Controllers\AdminCityController;
use App\Http\Controllers\AdminDisabilityController;
use App\Http\Controllers\AdminClassSectionController;
use App\Http\Controllers\AdminSchoolController;
use App\Http\Controllers\AdminBoardController;
use App\Http\Controllers\AdminEmployeeTypeController;
use App\Http\Controllers\AdminEducationLevelController;
use App\Http\Controllers\AdminOccupationController; 
use App\Http\Controllers\AdminRelationshipController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminExamTypeController;
use App\Http\Controllers\AddClassesController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\StudentParentPortalController;
use App\Http\Controllers\ClassSectionController;
use App\Http\Controllers\AddSubjectController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ExaminerController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\StationaryCategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LibraryRackController;
use App\Http\Controllers\LibraryShelfController;
use App\Http\Controllers\GeneralEntityController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\LibraryFloorController;
use App\Http\Controllers\EntityTypeController;
use App\Http\Controllers\LibraryEntityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AsssingSubjectsController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AccountPortalController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\AdminGeneralGrade; 
use App\Http\Controllers\PayRollController; 
use App\Http\Controllers\AttendanceController; 
use App\Http\Controllers\ExpenseController; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*###################################       admin routes start      #################################################*/
Route::prefix('admin')->group(function () {
    Route::get('/', [UserController::class, 'LoginPage']);
    Route::get('login', [UserController::class, 'LoginPage'])->name('login');
    /*Route::get('/', [AdminAuthController::class, 'AdminLoginPage']);
    Route::post('login', [AdminAuthController::class, 'AdminLogin']);
    Route::get('logout', [AdminAuthController::class, 'Logout']);*/
    //Route::post('login', 'UserController@ShowUserLoginPage');
    /*Route::post('logout', 'UserController@LogoutUser');
    Route::get('logout', 'UserController@LogoutUser');
    Route::get('register', 'UserController@ShowUserRegistrationPage');
    Route::post('register', 'UserController@UserResgisteration');
    Route::get('forgot-password', 'UserController@ForgotPasswordView');
    Route::post('reset_password_without_token', 'UserController@validatePasswordRequest');
    Route::post('reset_password_with_token', 'UserController@resetPassword');
    Route::get('reset_password/{id}', 'UserController@showUpdatePasswordView');
    Route::post('update_password', 'UserController@updatePassword');
    Route::get('password/reset/{token}', 'UserController@validateToken');
    Route::get('reset-password-view/{token?}{email?}', 'UserController@ShowUpdatePasswordView');
    Route::post('update-password', 'UserController@UpdatePassword');*/
    //Auth::routes();
    //Route::get('dashboard', 'DashboardController@index')->name('home');

});
Route::prefix('admin')->middleware(['validAdmin'])->group(function () {
    /*Home*/
    Route::get('home', [AdminHomeController::class, 'index']);
    Route::get('profile', [AdminHomeController::class, 'profileView']);
    Route::get('profile/edit', [AdminHomeController::class, 'ProfileEdit']);
    Route::post('profile/update', [AdminHomeController::class, 'ProfileUpdate']);


    /*user Type*/

    Route::resource('roles', RoleController::class);
    Route::get('users', [UserController::class, 'userslist'])->name('admin.user.index');

    Route::get('users/edit/{id}', [UserController::class, 'EditUserAdmin'])->name('admin.user.edit');
    Route::patch('users/update/{id}', [UserController::class, 'UpdatuserAdmin'])->name('admin.user.update');


    Route::get('user-type', [AdminUserController::class, 'UserType']);
    Route::get('user-type/add-view', [AdminUserController::class, 'CreateUserTypeView']);
    Route::post('user-type/add', [AdminUserController::class, 'CreateUserType']);
    Route::get('user-type/edit/{id}', [AdminUserController::class, 'EditUserType']);
    Route::post('user-type/update', [AdminUserController::class, 'UpdateUserType']);
    Route::get('user-type/delete/{id}', [AdminUserController::class, 'DeleteUserType']);
    /*Nationality*/
    Route::get('nationality', [AdminNationalityController::class, 'index']);
    Route::get('nationality/add-view', [AdminNationalityController::class, 'create']);
    Route::post('nationality/add', [AdminNationalityController::class, 'store']);
    Route::get('nationality/edit/{id}', [AdminNationalityController::class, 'edit']);
    Route::post('nationality/update', [AdminNationalityController::class, 'update']);
    Route::get('nationality/delete/{id}', [AdminNationalityController::class, 'delete']);
    /*state*/
    Route::get('getstates/{id}', [AdminStateController::class, 'getStates']); //for ajax dropdown
    Route::get('state', [AdminStateController::class, 'index']);
    Route::get('state/add-view', [AdminStateController::class, 'create']);
    Route::post('state/add', [AdminStateController::class, 'store']);
    Route::get('state/edit/{id}', [AdminStateController::class, 'edit']);
    Route::post('state/update', [AdminStateController::class, 'update']);
    Route::get('state/delete/{id}', [AdminStateController::class, 'delete']);
    /*district*/
    Route::get('district', [AdminDistrictController::class, 'index']);
    Route::get('district/add-view', [AdminDistrictController::class, 'create']);
    Route::post('district/add', [AdminDistrictController::class, 'store']);
    Route::get('district/edit/{id}', [AdminDistrictController::class, 'edit']);
    Route::post('district/update', [AdminDistrictController::class, 'update']);
    Route::get('district/delete/{id}', [AdminDistrictController::class, 'delete']);
    /*cities*/
    Route::get('cities', [AdminCityController::class, 'index']);
    Route::get('cities/add-view', [AdminCityController::class, 'create']);
    Route::post('cities/add', [AdminCityController::class, 'store']);
    Route::get('cities/edit/{id}', [AdminCityController::class, 'edit']);
    Route::post('cities/update', [AdminCityController::class, 'update']);
    Route::get('cities/delete/{id}', [AdminCityController::class, 'delete']);

    /*Religion*/
    Route::get('religion', [AdminReligionController::class, 'index']);
    Route::get('religion/add-view', [AdminReligionController::class, 'create']);
    Route::post('religion/add', [AdminReligionController::class, 'store']);
    Route::get('religion/edit/{id}', [AdminReligionController::class, 'edit']);
    Route::post('religion/update', [AdminReligionController::class, 'update']);
    Route::get('religion/delete/{id}', [AdminReligionController::class, 'delete']);
    /*Gender*/
    Route::get('gender', [AdminGenderController::class, 'index']);
    Route::get('gender/add-view', [AdminGenderController::class, 'create']);
    Route::post('gender/add', [AdminGenderController::class, 'store']);
    Route::get('gender/edit/{id}', [AdminGenderController::class, 'edit']);
    Route::post('gender/update', [AdminGenderController::class, 'update']);
    Route::get('gender/delete/{id}', [AdminGenderController::class, 'delete']);
    /*Section*/
    Route::get('section', [AdminSectionController::class, 'index']);
    Route::get('section/add-view', [AdminSectionController::class, 'create']);
    Route::post('section/add', [AdminSectionController::class, 'store']);
    Route::get('section/edit/{id}', [AdminSectionController::class, 'edit']);
    Route::post('section/update', [AdminSectionController::class, 'update']);
    Route::get('section/delete/{id}', [AdminSectionController::class, 'delete']);
    /*Blood-Group*/
    Route::get('blood-group', [AdminBloodGroupController::class, 'index']);
    Route::get('blood-group/add-view', [AdminBloodGroupController::class, 'create']);
    Route::post('blood-group/add', [AdminBloodGroupController::class, 'store']);
    Route::get('blood-group/edit/{id}', [AdminBloodGroupController::class, 'edit']);
    Route::post('blood-group/update', [AdminBloodGroupController::class, 'update']);
    Route::get('blood-group/delete/{id}', [AdminBloodGroupController::class, 'delete']);
    /*Designation*/
    Route::get('designation', [AdminDesignationController::class, 'index']);
    Route::get('designation/add-view', [AdminDesignationController::class, 'create']);
    Route::post('designation/add', [AdminDesignationController::class, 'store']);
    Route::get('designation/edit/{id}', [AdminDesignationController::class, 'edit']);
    Route::post('designation/update', [AdminDesignationController::class, 'update']);
    Route::get('designation/delete/{id}', [AdminDesignationController::class, 'delete']);
    /*Cast*/
    Route::get('cast', [AdminCastController::class, 'index']);
    Route::get('cast/add-view', [AdminCastController::class, 'create']);
    Route::post('cast/add', [AdminCastController::class, 'store']);
    Route::get('cast/edit/{id}', [AdminCastController::class, 'edit']);
    Route::post('cast/update', [AdminCastController::class, 'update']);
    Route::get('cast/delete/{id}', [AdminCastController::class, 'delete']);

    /*student category*/
    Route::get('student/category', [AdminStudentCategoryController::class, 'index']);
    Route::get('student/category/add-view', [AdminStudentCategoryController::class, 'create']);
    Route::post('student/category/add', [AdminStudentCategoryController::class, 'store']);
    Route::get('student/category/edit/{id}', [AdminStudentCategoryController::class, 'edit']);
    Route::post('student/category/update', [AdminStudentCategoryController::class, 'update']);
    Route::get('student/category/delete/{id}', [AdminStudentCategoryController::class, 'delete']);
    /*marital status*/
    Route::get('marital-status', [AdminMaritalStatusController::class, 'index']);
    Route::get('marital-status/add-view', [AdminMaritalStatusController::class, 'create']);
    Route::post('marital-status/add', [AdminMaritalStatusController::class, 'store']);
    Route::get('marital-status/edit/{id}', [AdminMaritalStatusController::class, 'edit']);
    Route::post('marital-status/update', [AdminMaritalStatusController::class, 'update']);
    Route::get('marital-status/delete/{id}', [AdminMaritalStatusController::class, 'delete']);

    /*disability*/
    Route::get('disability', [AdminDisabilityController::class, 'index']);
    Route::get('disability/add-view', [AdminDisabilityController::class, 'create']);
    Route::post('disability/add', [AdminDisabilityController::class, 'store']);
    Route::get('disability/edit/{id}', [AdminDisabilityController::class, 'edit']);
    Route::post('disability/update', [AdminDisabilityController::class, 'update']);
    Route::get('disability/delete/{id}', [AdminDisabilityController::class, 'delete']);

    /*Class Section*/
    Route::get('class-section', [AdminClassSectionController::class, 'index']);
    Route::get('class-section/add-view', [AdminClassSectionController::class, 'create']);
    Route::post('class-section/add', [AdminClassSectionController::class, 'store']);
    Route::get('class-section/edit/{id}', [AdminClassSectionController::class, 'edit']);
    Route::post('class-section/update', [AdminClassSectionController::class, 'update']);
    Route::get('class-section/delete/{id}', [AdminClassSectionController::class, 'delete']);
    /*school*/
    Route::get('school', [AdminSchoolController::class, 'index']);
    Route::get('school/add-view', [AdminSchoolController::class, 'create']);
    Route::post('school/add', [AdminSchoolController::class, 'store']);
    Route::get('school/edit/{id}', [AdminSchoolController::class, 'edit']);
    Route::post('school/update', [AdminSchoolController::class, 'update']);
    Route::get('school/delete/{id}', [AdminSchoolController::class, 'delete']);
    /*Board*/
    Route::get('board-university', [AdminBoardController::class, 'index']);
    Route::get('board-university/add-view', [AdminBoardController::class, 'create']);
    Route::post('board-university/add', [AdminBoardController::class, 'store']);
    Route::get('board-university/edit/{id}', [AdminBoardController::class, 'edit']);
    Route::post('board-university/update', [AdminBoardController::class, 'update']);
    Route::get('board-university/delete/{id}', [AdminBoardController::class, 'delete']);

    /*Employee Type*/
    Route::get('employee-type', [AdminEmployeeTypeController::class, 'index']);
    Route::get('employee-type/add-view', [AdminEmployeeTypeController::class, 'create']);
    Route::post('employee-type/add', [AdminEmployeeTypeController::class, 'store']);
    Route::get('employee-type/edit/{id}', [AdminEmployeeTypeController::class, 'edit']);
    Route::post('employee-type/update', [AdminEmployeeTypeController::class, 'update']);
    Route::get('employee-type/delete/{id}', [AdminEmployeeTypeController::class, 'delete']);
    /*EducationLevel*/
    Route::get('education-level', [AdminEducationLevelController::class, 'index']);
    Route::get('education-level/add-view', [AdminEducationLevelController::class, 'create']);
    Route::post('education-level/add', [AdminEducationLevelController::class, 'store']);
    Route::get('education-level/edit/{id}', [AdminEducationLevelController::class, 'edit']);
    Route::post('education-level/update', [AdminEducationLevelController::class, 'update']);
    Route::get('education-level/delete/{id}', [AdminEducationLevelController::class, 'delete']);
    /*Occupation*/
    Route::get('occupation', [AdminOccupationController::class, 'index']);
    Route::get('occupation/add-view', [AdminOccupationController::class, 'create']);
    Route::post('occupation/add', [AdminOccupationController::class, 'store']);
    Route::get('occupation/edit/{id}', [AdminOccupationController::class, 'edit']);
    Route::post('occupation/update', [AdminOccupationController::class, 'update']);
    Route::get('occupation/delete/{id}', [AdminOccupationController::class, 'delete']);
    /*Occupation*/
    Route::get('relationship', [AdminRelationshipController::class, 'index']);
    Route::get('relationship/add-view', [AdminRelationshipController::class, 'create']);
    Route::post('relationship/add', [AdminRelationshipController::class, 'store']);
    Route::get('relationship/edit/{id}', [AdminRelationshipController::class, 'edit']);
    Route::post('relationship/update', [AdminRelationshipController::class, 'update']);
    Route::get('relationship/delete/{id}', [AdminRelationshipController::class, 'delete']);

    /*Exam Type*/
    Route::get('exam-type', [AdminExamTypeController::class, 'index']);
    Route::get('exam-type/add-view', [AdminExamTypeController::class, 'create']);
    Route::post('exam-type/add', [AdminExamTypeController::class, 'store']);
    Route::get('exam-type/edit/{id}', [AdminExamTypeController::class, 'edit']);
    Route::post('exam-type/update', [AdminExamTypeController::class, 'update']);
    Route::get('exam-type/delete/{id}', [AdminExamTypeController::class, 'delete']);

   /*General Grade*/
    Route::get('general-grade', [AdminGeneralGrade::class, 'index']);
    Route::get('general-grade/add-view', [AdminGeneralGrade::class, 'create']);
    Route::post('general-grade/add', [AdminGeneralGrade::class, 'store']);
    Route::get('general-grade/edit/{id}', [AdminGeneralGrade::class, 'edit']);
    Route::post('general-grade/update', [AdminGeneralGrade::class, 'update']);
    Route::get('general-grade/delete/{id}', [AdminGeneralGrade::class, 'delete']);



});
/*########################################       Admin Routs end     #########################################*/


/*#########################################      Front End Routes Starts     #################################*/
/*login User*/

    //Clear Config cache:
    Route::get('config-cache', function() {
        $exitCode = Artisan::call('config:cache');
        return '<h1>Clear Config cleared</h1>';
    });
    Route::get('cache-clear', function() {
        $exitCode = Artisan::call('cache:clear');
        return '<h1>cache:cleared</h1>';
    });
    Route::get('config-clear', function() {
        $exitCode = Artisan::call('config:clear');
        return '<h1>config:cleared</h1>';
    });
    Route::get('route-clear', function() {
        $exitCode = Artisan::call('route:clear');
        return '<h1>route:cleared</h1>';
    });
    Route::get('view-clear', function() {
        $exitCode = Artisan::call('view:clear');
        return '<h1>view:cleared</h1>';
    });

Route::get('/', [UserController::class, 'LoginPage']);
Route::get('login', [UserController::class, 'LoginPage'])->name('login');
Route::post('login', [UserController::class, 'Login']);
Route::post('logout', [UserController::class, 'Logout']);
Route::get('logout', [UserController::class, 'Logout']);





/*Subject Subject*/

/*GuardianController*/
Route::get('parent-dashboard', [GuardianController::class, 'index']);
Route::get('parents', [GuardianController::class, 'index']);
Route::post('add-guardian', [GuardianController::class, 'store']);
Route::post('add-mother', [GuardianController::class, 'motherInfo']);
Route::get('get-guardian-father', [GuardianController::class, 'getGuardianFather']);
Route::get('get-guardian-father-image/{id}', [GuardianController::class, 'getGuardianFatherPicture']);
Route::get('get-guardian-mother-image/{id}', [GuardianController::class, 'getGuardianMotherPicture']);
Route::get('get-guardian-mother', [GuardianController::class, 'getGuardianMother']);
/*GuardianController*/




/*class student*/







//rout for class  ends


Route::get('users-type', function () {
    return view('add-users');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('home', [HomeController::class, 'index']);
    Route::get('employee/attendance/{date?}/{type?}', [AttendanceController::class, 'index']); //for teacher attendance
    Route::post('employee/attendance', [AttendanceController::class, 'SaveEmpAttendance']); //for teacher attendance 
    /*student Portal*/



    /*Parent controller*/

    /*student Section*/
    Route::get('school-details', [StudentController::class, 'SchoolDetails']);
    Route::get('student-dtails', [StudentController::class, 'SchoolDetails']);

    Route::post('getstudent-by-filter', [StudentController::class, 'getStudentsByFilter']); /*for class filter ajax*/
    Route::get('students', [StudentController::class, 'index']);
    Route::post('student-username-availability', [StudentController::class, 'StudentCnicCheck']); /*check username by ajax*/
    Route::get('admission', [StudentController::class, 'create']);
    Route::get('edit-admission-info/{id}', [StudentController::class, 'EditAdmissionInfo']);
    Route::get('withdrawl-student/{id}', [StudentController::class, 'WithdrawlStudent']);
    Route::post('withdrawl-student', [StudentController::class, 'WithdrawlStudentPost']);

    Route::get('get-student/{id}', [StudentController::class, 'getstudent']); /*for ajax*/
    Route::get('get-student-city-by-district/{id}', [StudentController::class, 'getCityByDistrict']); /*get city by district ajax*/
    Route::get('get-nationality-district/{id}', [StudentController::class, 'getDistrictByNationality']); /*get get District By Nationality ajax*/
    Route::post('admission-info', [StudentController::class, 'admissionInfo']);
    Route::post('update-admission-info', [StudentController::class, 'UpdateAdmissionInfo']);
    Route::get('change-student/{id}', [StudentController::class, 'ChangeStudentStatus']);
    /* Staff section */
    Route::get('staff', [EmployeeController::class, 'index']);
    Route::post('getstaff-by-filter', [EmployeeController::class, 'index']);
    Route::post('username-availability', [EmployeeController::class, 'CnicCheck']); /*check username by ajax*/
    Route::get('edit-appointment-info/{id}', [EmployeeController::class, 'EditAppointmentInfo']);
    Route::post('update-appointment-info', [EmployeeController::class, 'UpdateAppointmentInfo']);
    Route::get('appointment', [EmployeeController::class, 'create']);
    Route::post('appointment-info', [EmployeeController::class, 'appointmentInfo']);
    Route::get('getstate/{id}', [EmployeeController::class, 'getState']);                        /*get state by nationality ajax*/
    Route::get('get-district-by-state/{id}', [EmployeeController::class, 'getDistrictByState']); /*get district by state ajax*/
    Route::get('get-city-by-district/{id}', [EmployeeController::class, 'getCityByDistrict']);   /*get city by district ajax*/
    Route::get('getzipcode/{id}', [EmployeeController::class, 'getZipCode']);                    /*get city by district ajax*/
    Route::get('getdistrict/{id}', [EmployeeController::class, 'getDistrict']);                  /*for ajax nationality and district in employee*/
    Route::get('getdesignation/{id}', [EmployeeController::class, 'getDesignation']);            /*for ajax designation in employee*/
    Route::get('get-board-university/{id}', [EmployeeController::class, 'getBoardUniversity']);  /*for ajax board and university on level id*/
    Route::post('employee-filter', [EmployeeController::class, 'EmployeeFilter']);
    Route::get('change-employee-status/{id}', [EmployeeController::class, 'ChangeEmployeeStatus']);
    Route::get('view-staff-details/{id}', [EmployeeController::class, 'viewStaffView']);         /*for ajax*/
    Route::get('view-student-admission/{id}', [StudentController::class, 'viewStdAdm']);         /*for ajax*/
    /* Class schedule  section */
    Route::post('add-class-schedule-check', [ClassScheduleController::class, 'ClassScheduleCheckBySection']); /*ajax drop down */
    Route::post('teacher-availability-check', [ClassScheduleController::class, 'TeacherAvailabilityCheck']); /*schedule Teacher Availability Check*/
    Route::get('class-section-by-class/{id}', [ClassScheduleController::class, 'ClassSectionByClass']); 
    /*ajax drop down */
    Route::get('class-schedule/{name?}', [ClassScheduleController::class, 'index']);

    /* Schdule Section New  */

    Route::get('schedule', [ScheduleController::class, 'index'])->name('classSchedule');
    Route::post('schedule/list', [ScheduleController::class, 'scheduleList'])->name('schedule_ajax');
    Route::post('schedule/list/ajax', [ScheduleController::class, 'store'])->name('schedulelist_ajax');
    
    Route::get('schedule/delete/{id}', [ScheduleController::class, 'delete'])->name('scheduledelete');


    Route::post('schedule/show/ajax', [ScheduleController::class, 'show'])->name('scheduleshow_ajax');



    /* End Schdule Section New  */


    Route::post('class-schedule', [ClassScheduleController::class, 'store']);
    Route::get('show-class-schedule/{id}', [ClassScheduleController::class, 'show']);
    Route::get('delete-class-schedule/{id}', [ClassScheduleController::class, 'delete']);
    Route::get('edit-class-schedule/{id}', [ClassScheduleController::class, 'edit']);
    Route::post('update-class-schedule', [ClassScheduleController::class, 'update']);
    Route::get('show-viewClass-schedule/{id}', [ClassScheduleController::class, 'showViewClass']);

    /*--------------------------------Examiner Routes Start---------------------------*/
    /*Examiner*/
    //Route::get('examiner/dashboard', [ExaminerController::class, 'index']);
    Route::get('examiner/examination/{name?}', [ExaminerController::class, 'Examination']);
    Route::Post('get-exam-by-filter', [ExaminerController::class, 'Examination']);

    Route::get('get-exam-by-session/{id}', [ExaminerController::class, 'GetExamBySession']);
    
    Route::post('get-class-by-exam', [ExaminerController::class, 'GetClassByExam']);
    
    Route::post('GetstudentBySession', [ExaminerController::class, 'GetstudentBySession']);



    /*schedule exam*/
    Route::post('examiner/add-schedule-exam', [ExaminerController::class, 'CreateExam']);
    Route::get('examiner/edit-schedule-exam/{id}', [ExaminerController::class, 'EditExam']);
    Route::get('examiner/show-schedule-exam/{id}', [ExaminerController::class, 'ShowExam']);
    Route::post('examiner/update-schedule-exam', [ExaminerController::class, 'UpdateExam']);
    Route::get('examiner/delete-schedule-exam/{id}', [ExaminerController::class, 'DeleteExam']);


    /*set exam marks*/
    Route::get('examiner/get-school-section/{id}', [ExaminerController::class, 'GetSchoolSection']); // get school section by ajax on exam id
    Route::get('examiner/get-subject-by-section/{id}', [ExaminerController::class, 'GetSubjectBySection']); // get school section by ajax on exam id
    Route::get('examiner/get-set-marks-data/{subject_id}/{exam_Id}/{class_id}', [ExaminerController::class, 'getSetmarksData']); /*get-diary-student-by-class Ajax*/

    Route::post('examiner/add-setmarks', [ExaminerController::class, 'CreateSetMarks']);
    Route::get('examiner/edit-setmarks/{id}', [ExaminerController::class, 'EditSetMarks']);
    Route::post('examiner/update-setmarks', [ExaminerController::class, 'UpdateSetMarks']);
    Route::post('examiner/delete-setmarks', [ExaminerController::class, 'DeleteSetMarks']);
    Route::post('examiner/show-setmarks', [ExaminerController::class, 'ShowSetMarks']);



    /*set exam grades*/

    Route::get('examiner/check-exam-grades/{id}', [ExaminerController::class, 'CheckExamGrades']);
    Route::post('examiner/add-set-grade', [ExaminerController::class, 'CreateSetGrades']);
    Route::get('examiner/show-exam-grade/{id}', [ExaminerController::class, 'ShowSetGrades']);
    Route::get('examiner/edit-exam-grade/{id}', [ExaminerController::class, 'EditSetGrades']);
    Route::post('examiner/update-set-grade', [ExaminerController::class, 'UpdateSetGrades']);
    Route::get('examiner/delete-set-grade/{id}', [ExaminerController::class, 'DeleteSetGrades']);
    /*set exam syllabus*/
    Route::post('examiner/add-exam-syllabus', [ExaminerController::class, 'CreateExamSyllabus']);
    Route::get('examiner/delete-exam-syllabus/{id}', [ExaminerController::class, 'DeleteExamSyllabus']);
    Route::get('examiner/get-syllabus-class-by-section/{id}', [ExaminerController::class, 'GetSyllabusClassSection']);
    Route::get('examiner/edit-exam-syllabus/{id}', [ExaminerController::class, 'EditExamSyllabus']);
    Route::post('examiner/update-exam-syllabus', [ExaminerController::class, 'UpdateExamSyllabus']);

    /*set exam Paper*/
    Route::post('examiner/add-exam-paper', [ExaminerController::class, 'CreateExamPaper']);
    Route::get('examiner/delete-exam-paper/{id}', [ExaminerController::class, 'DeleteExamPaper']);
    Route::get('examiner/edit-exam-paper/{id}', [ExaminerController::class, 'EditExamPaper']);
    Route::post('examiner/update-exam-paper', [ExaminerController::class, 'UpdateExamPaper']);

    /*date sheet */
    Route::get('examiner/get-exam-date-for-datesheet/{id}', [ExaminerController::class, 'getDatesheetData']);
    Route::post('examiner/add-datesheet', [ExaminerController::class, 'CreateDatSheet']);
    Route::get('examiner/delete-datesheet/{id}', [ExaminerController::class, 'DeleteDateSheet']);
    Route::get('examiner/edit-datesheet/{id}', [ExaminerController::class, 'EditDateSheet']);

    Route::post('examiner/update-datesheet', [ExaminerController::class, 'UpdateDateSheet']);
    Route::get('examiner/show-datesheet/{id}', [ExaminerController::class, 'ShowDateSheet']);


    /*-----------------------------------Examiner Routes Ends--------------------------------------*/


    /*User*/
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('users', [UserController::class, 'index'])->name('users.index');

    Route::get('profile', [UserController::class, 'ProfileView']); //admin profile
    Route::get('profile-edit', [UserController::class, 'ProfileEdit']); //admin profile edit
    Route::post('profile-update', [UserController::class, 'ProfileUpdate']); //admin profile Update
    Route::post('teacher/portal/profile-update', [TeacherController::class, 'TeacherProfileUpdate']); //admin profile Update
    Route::post('reset-user-password', [UserController::class, 'ResetUserPaassword']); //admin profile Update
    Route::post('add-user', [UserController::class, 'CreateUser']);
    Route::get('show-user/{id}', [UserController::class, 'ShowUser']);
    Route::get('edit-user/{id}', [UserController::class, 'EditUser']);
    Route::get('show-parent/{id}', [UserController::class, 'ShowParent']);
    Route::get('edit-parent/{id}', [UserController::class, 'EditParent']);
    Route::post('update-user', [UserController::class, 'UpdateUser']);
    Route::post('update-parent', [UserController::class, 'UpdateParent']);
    Route::get('delete-user/{id}', [UserController::class, 'DeleteUser']);

    /*ajax School*/
    Route::get('school', [SchoolController::class, 'index']);
    //Route::post('add-school', [SchoolController::class, 'CreateSubject']);
    Route::get('show-school/{id}', [SchoolController::class, 'ShowSchool']);
    Route::get('edit-school/{id}', [SchoolController::class, 'EditSchool']);
    Route::post('update-school', [SchoolController::class, 'UpdateSchool']);
    Route::get('delete-school/{id}', [SchoolController::class, 'DeleteSchool']);

    /*class class*/
      
    Route::get('add-class', [AddClassesController::class, 'index']);
    Route::post('add-class', [AddClassesController::class, 'store']);
    Route::get('show-class/{id}', [AddClassesController::class, 'show']);
    Route::get('edit-class/{id}', [AddClassesController::class, 'edit']);
    Route::post('update-class', [AddClassesController::class, 'update']);
    Route::get('delete-class/{id}', [AddClassesController::class, 'delete']);

    /*class Section*/
    Route::get('class-section', [ClassSectionController::class, 'index']);
    Route::post('add-class-section', [ClassSectionController::class, 'create']);
    Route::get('show-class-section/{id}', [ClassSectionController::class, 'show']);
    Route::get('edit-class-section/{id}', [ClassSectionController::class, 'edit']);
    Route::post('update-class-section', [ClassSectionController::class, 'update']);
    Route::get('delete-class-section/{id}', [ClassSectionController::class, 'delete']);

    /*Subject*/
    Route::get('add-subject', [AddSubjectController::class, 'index']);
    Route::post('add-subject', [AddSubjectController::class, 'CreateSubject']);
    Route::get('show-subject/{id}', [AddSubjectController::class, 'ShowSubject']);
    Route::get('edit-subject/{id}', [AddSubjectController::class, 'EditSubject']);
    Route::post('update-subject', [AddSubjectController::class, 'UpdateSubject']);
    Route::get('delete-subject/{id}', [AddSubjectController::class, 'DeleteSubject']);

    /*Period*/
    Route::get('add-period', [PeriodController::class, 'index']);
    Route::post('add-period', [PeriodController::class, 'store']);
    Route::get('show-period/{id}', [PeriodController::class, 'show']);
    Route::get('edit-period/{id}', [PeriodController::class, 'edit']);
    Route::post('update-period', [PeriodController::class, 'update']);
    Route::get('delete-period/{id}', [PeriodController::class, 'delete']);



    /*--------------------------library Routes Start---------------------------------------------------*/
    /*Library*/
    Route::get('library/dashboard', [LibraryController::class, 'dashboard']);
    Route::get('library', [LibraryController::class, 'index']);
    Route::post('add-library', [LibraryController::class, 'store']);
    Route::get('show-library/{id}', [LibraryController::class, 'show']);
    Route::get('edit-library/{id}', [LibraryController::class, 'edit']);
    Route::post('update-library', [LibraryController::class, 'update']);
    Route::get('delete-library/{id}', [LibraryController::class, 'delete']);

    /*library Category*/
    Route::get('category', [StationaryCategoryController::class, 'index']);
    Route::post('add-stationary', [StationaryCategoryController::class, 'AddStationary']);
    Route::get('edit-stationary/{id}', [StationaryCategoryController::class, 'EditStationary']);
    Route::post('update-stationary', [StationaryCategoryController::class, 'UpdateStationary']);
    Route::get('show-stationary/{id}', [StationaryCategoryController::class, 'ShowStationary']);
    Route::get('delete-stationary/{id}', [StationaryCategoryController::class, 'DeleteStationary']);

    /*Library Rack*/
    Route::get('library-rack', [LibraryRackController::class, 'index']);
    Route::post('add-library-rack', [LibraryRackController::class, 'AddRack']);
    Route::get('edit-library-rack/{id}', [LibraryRackController::class, 'EditRack']);
    Route::post('update-library-rack', [LibraryRackController::class, 'UpdateRack']);
    Route::get('show-library-rack/{id}', [LibraryRackController::class, 'ShowRack']);
    Route::get('delete-library-rack/{id}', [LibraryRackController::class, 'DeleteRack']);

    /*Library Shelf*/
    Route::get('library-shelf', [LibraryShelfController::class, 'index']);
    Route::post('add-library-shelf', [LibraryShelfController::class, 'AddShelf']);
    Route::get('edit-library-shelf/{id}', [LibraryShelfController::class, 'EditShelf']);
    Route::post('update-library-shelf', [LibraryShelfController::class, 'UpdateShelf']);
    Route::get('show-library-shelf/{id}', [LibraryShelfController::class, 'ShowShelf']);
    Route::get('delete-library-shelf/{id}', [LibraryShelfController::class, 'DeleteShelf']);
    /*Library General Entity*/
    Route::get('library-general-entity', [GeneralEntityController::class, 'index']);
    Route::post('add-library-general-entity', [GeneralEntityController::class, 'AddGeneralEntity']);
    Route::get('edit-library-general-entity/{id}', [GeneralEntityController::class, 'EditGeneralEntity']);
    Route::post('update-library-general-entity', [GeneralEntityController::class, 'UpdateGeneralEntity']);
    Route::get('show-library-general-entity/{id}', [GeneralEntityController::class, 'ShowGeneralEntity']);
    Route::get('delete-library-general-entity/{id}', [GeneralEntityController::class, 'DeleteGeneralEntity']);

    /*author*/
    Route::get('author', [AuthorController::class, 'index']);
    Route::post('add-author', [AuthorController::class, 'AddAuthor']);
    Route::get('edit-author/{id}', [AuthorController::class, 'EditAuthor']);
    Route::post('update-author', [AuthorController::class, 'UpdateAuthor']);
    Route::get('show-author/{id}', [AuthorController::class, 'ShowAuthor']);
    Route::get('delete-author/{id}', [AuthorController::class, 'DeleteAuthor']);


//routes for supplier starts
    Route::get('supplier', [SupplierController::class, 'index']);
    Route::post('add-supplier', [SupplierController::class, 'AddSupplier']);
    Route::get('edit-supplier/{id}', [SupplierController::class, 'EditSupplier']);
    Route::post('update-supplier', [SupplierController::class, 'UpdateSupplier']);
    Route::get('show-supplier/{id}', [SupplierController::class, 'ShowSupplier']);
    Route::get('delete-supplier/{id}', [SupplierController::class, 'DeleteSupplier']);
//routes for publisher ends

//routes for publisher starts
    Route::get('publisher', [PublisherController::class, 'index']);
    Route::post('add-publisher', [PublisherController::class, 'AddPublisher']);
    Route::get('edit-publisher/{id}', [PublisherController::class, 'EditPublisher']);
    Route::post('update-publisher', [PublisherController::class, 'UpdatePublisher']);
    Route::get('show-publisher/{id}', [PublisherController::class, 'ShowPublisher']);
    Route::get('delete-publisher/{id}', [PublisherController::class, 'DeletePublisher']);
//routes for publisher ends

//routes for library floor starts
    Route::get('library-floor', [LibraryFloorController::class, 'index']);
    Route::post('add-libraryfloor', [LibraryFloorController::class, 'AddFloor']);
    Route::get('edit-libraryfloor/{id}', [LibraryFloorController::class, 'EditFloor']);
    Route::post('update-libraryfloor', [LibraryFloorController::class, 'UpdateFloor']);
    Route::get('show-libraryfloor/{id}', [LibraryFloorController::class, 'ShowFloor']);
    Route::get('delete-libraryfloor/{id}', [LibraryFloorController::class, 'DeleteFloor']);
//routes for library floor ends

//routes for entity types starts
    Route::get('entity-type', [EntityTypeController::class, 'index']);
    Route::post('add-entitytype', [EntityTypeController::class, 'AddEntityType']);
    Route::get('edit-entitytype/{id}', [EntityTypeController::class, 'EditEntityType']);
    Route::post('update-entitytype', [EntityTypeController::class, 'UpdateEntityType']);
    Route::get('show-entitytype/{id}', [EntityTypeController::class, 'ShowEntityType']);
    Route::get('delete-entitytype/{id}', [EntityTypeController::class, 'DeleteEntityType']);
    //routes for entity types ends

    //routes for entity types starts
    Route::get('library-entity', [LibraryEntityController::class, 'index']);
    Route::post('add-library-entity', [LibraryEntityController::class, 'AddLibraryEntity']);
    Route::get('edit-library-entity/{id}', [LibraryEntityController::class, 'EditLibraryEntity']);
    Route::post('update-library-entity', [LibraryEntityController::class, 'UpdateLibraryEntity']);
    Route::get('show-library-entity/{id}', [LibraryEntityController::class, 'ShowLibraryEntity']);
    Route::get('delete-library-entity/{id}', [LibraryEntityController::class, 'DeleteLibraryEntity']);

    /* Assign subjects */

    Route::resource('assign_subjects', AsssingSubjectsController::class);
    Route::post('assign_subjects/store', [AsssingSubjectsController::class,'store']);
    Route::get('get_section/{id}', [ClassSectionController::class,'getClassSectin']);
    Route::get('assign_subjects/delete/{id}', [AsssingSubjectsController::class,'destroy']);
    Route::post('assign_subjects/update', [AsssingSubjectsController::class,'update']);
    Route::post('assign_subjects/edit', [AsssingSubjectsController::class,'edit']);
    Route::get('get_class', [AddClassesController::class,'getClass']);
    Route::get('get_section/{id}', [ClassSectionController::class,'getClassSectin']);
    Route::get('get_class_subject/{id}', [ClassSectionController::class,'getClassSubjects']);
    Route::get('get_class/{id}/{section_id}', [ClassSectionController::class,'getSubjects']);
    Route::get('get_class_subject_by_teacher/{id}/{section_id}', [ClassSectionController::class,'getSubjectsByTeacher']);
    Route::get('get-diary-student-by-class/{id}/{section_id}', [ClassSectionController::class, 'getDiaryStudentByClass']); /*get-diary-student-by-class Ajax*
    /*  
       Generic Algoritem
    */
    Route::get('generic_schedule', [ClassScheduleController::class,'genericSchedule']);
    Route::get('generic_ajax/{id}/{section_id}', [ClassScheduleController::class,'genericScheduleajax']);

    /*
      Stundet and Admin Portal
   */
    Route::get('school-details', [StudentParentPortalController::class, 'SchoolDetails']);
    //Route::get('student-details/{id?}', [StudentParentPortalController::class, 'StudentDetails']);
    Route::post('show-student-achievement', [StudentParentPortalController::class, 'ShowStudentAchievement']);
    Route::post('show-student-behaviour', [StudentParentPortalController::class, 'ShowStudentbehaviour']);
    Route::get('show-student-attendance/{id}/{student}', [StudentParentPortalController::class, 'ShowStudentAttendance']);
    Route::post('students/dashboard', [StudentParentPortalController::class,'parentstudentsportal']);
    Route::get('students/dashboard', [StudentParentPortalController::class,'parentstudentsportal']);
    Route::get('generic_ajax/{id}/{section_id}', [ClassScheduleController::class,'genericScheduleajax']);
    Route::post('student/exam/marks', [StudentParentPortalController::class,'studentExamMarks']);




    /*
       
       Account Portal

    */
     Route::any('income',                       [AccountPortalController::class,'income']);
     Route::get('income/detail/{id}',           [AccountPortalController::class,'incomeDetail']);
     Route::get('chartOfAccount/{name?}',       [AccountPortalController::class,'chartOfAccount']);
     Route::post('chartOfAccount/delete',       [AccountPortalController::class,'chartOfAccountDelete']);
     Route::post('chartOfAccount/show',         [AccountPortalController::class,'chartOfAccountShow']);
     Route::post('chartOfAccount/edit',         [AccountPortalController::class,'chartOfAccountEdit']);
     

     /*
        Expense Controller       
     */
     
     Route::get('suppler',                      [ExpenseController::class,'suppler'])->name('supplier');
     Route::get('expense',                      [ExpenseController::class,'expense'])->name('general_Expense');
     

    
    Route::any('payroll',                      [PayRollController::class,'payroll']);

     /*  Payroll */


    Route::post('payroll/advance',             [PayRollController::class,'scheduleadvanceSalary'])->name('scheduleadvanceSalary');


    Route::post('payroll/advance/save',        [PayRollController::class,'scheduleadvanceSalarySave'])->name('scheduleadvanceSalarySave');


    Route::post('payroll/generate',             [AccountPortalController::class,'generatepayroll']);
    Route::get('payroll/detail/{id}',           [PayRollController::class,'payrolDetail']);\
    Route::post('payroll/accountdropdown',      [PayRollController::class,'accountDropdown'])->name('accountDropdown');

    Route::post('add/Pay/statement',            [PayRollController::class,'addPayStatement']);
    
    Route::post('pay/bill/print',               [PayRollController::class,'PayBillPrint']);


    Route::post('fee/accountdropdown',          [AccountPortalController::class,'accountDropdown'])->name('accountDropdown');


    Route::post('schedulepay/show',             [PayRollController::class,'schedulepayShow'])->name('schedulepayShow'); 
    Route::post('schedulepay/generate',         [PayRollController::class,'schedulePayGenerate'])->name('schedulePayGenerate');
    Route::post('schedulepay/generate/auto',         [PayRollController::class,'schedulePayGenerateAuto'])->name('schedulePayGenerateAuto');

    Route::post('schedulepay/emp-generate-schedul-save',       [PayRollController::class,'schedulepayGeneratesave'])->name('schedulepayGeneratesave');
    Route::post('schedulepay/advance-salary-transaction',       [PayRollController::class,'advanceSalaryTransaction'])->name('advanceSalaryTransaction');


    Route::post('schedulepay/makepayments',     [PayRollController::class,'schedulefeemakepayments'])->name('schedulefeemakepayments'); 
    Route::post('schedulepay/payment-recieve',  [PayRollController::class,'paymentRecieve'])->name('paymentrecieve');
    Route::post('emp/statement',                [PayRollController::class,'empStatement'])->name('empStatement');


    Route::post('student-add-schedule',       [AccountPortalController::class,'addAccountStatement'])->name('addaccountstatement');
    
    Route::post('schedulefee/show',       [AccountPortalController::class,'schedulefeeShow'])->name('schedulefeeShow'); 
    
    Route::post('schedulefee/generate',       [AccountPortalController::class,'schedulefeeGenerate'])->name('schedulefeeGenerate');


    Route::post('schedulefee/receivebill',       [AccountPortalController::class,'schedulefeeReceiveBill'])->name('schedulefeeReceiveBill');
    Route::post('schedulefee/adjust_fee',       [AccountPortalController::class,'scheduleAdjustFee'])->name('scheduleAdjustFee');
    Route::post('schedulefee/link/pending',       [AccountPortalController::class,'linkPending'])->name('linkPending');  
    Route::post('schedulefee/adjust_fee/submit',       [AccountPortalController::class,'linkPendingSubmit'])->name('linkPendingSubmit');
    
    Route::post('fee/statement',       [AccountPortalController::class,'freeStatement'])->name('freeStatement');
    

    Route::post('schedulefee/payment-recieve',       [AccountPortalController::class,'paymentRecieve'])->name('paymentrecieve');
    Route::post('schedulefee/student-generate-schedul-save',       [AccountPortalController::class,'schedulefeeGeneratesave'])->name('schedulefeeGenerateSave');
    Route::post('add_charted_account',        [AccountPortalController::class,'addChartedAccount'])->name('addChartedAccount');
    Route::post('add_student_schedule',        [AccountPortalController::class,'addStudentSchedule'])->name('add_student_schedule');
    Route::post('fee/bill-print',       [AccountPortalController::class,'PrintFeeBill']);
    // Route for Reports /
    Route::get('admission-reports', [ReportsController::class, 'admissionReports'])->name('admissionReports');
    Route::post('report-admission-ajax', [ReportsController::class, 'reportAdmissionAjax'])->name('reportAdmissionAjax');
    Route::get('examination-reports', [ReportsController::class, 'examinationReports'])->name('examinationReports');
    Route::post('report-exam-ajax', [ReportsController::class, 'examinationReportsAjax'])->name('reportExamAjax');
    Route::any('account-reports', [ReportsController::class, 'accountReports'])->name('accountReports');
    Route::get('certificate-reports', [ReportsController::class, 'certificateReports'])->name('certificateReports');
    Route::get('fee-reports', [ReportsController::class, 'feeReports'])->name('feeReports');
    Route::post('fee-reports-ajax', [ReportsController::class, 'feeReportsajax'])->name('feeReportsajax');
    // Route for Reports /        
    /*--------------------------library Routes End---------------------------------------------------*/
    /*---------------------------------------------------events---------------------------------------*/


    Route::get('fullcalender', [CalenderController::class, 'index']);
    Route::post('fullcalenderAjax', [CalenderController::class, 'ajax']);
    Route::post('remove-event', [CalenderController::class, 'eventDelete']);

    /*--------------------------Techer routes Start-----------------------------------*/

    /*Teacher*/
    Route::post('teacherpay/bill/print', [TeacherController::class,'PayBillPrint']); /*teacher pay bill print*/
    Route::get('teacher/dashboard', [TeacherController::class, 'index']);
    Route::get('teacher/profile', [TeacherController::class, 'TeacherProfile']); //teacher profile
    Route::get('teacher/editProfile', [TeacherController::class, 'editProfile']); //admin profile edit
    Route::post('teacher/profile-update', [TeacherController::class, 'TeacherProfileUpdate']); //teacher profile Update



    Route::get('teacher/diary/{name?}', [TeacherController::class, 'Dairy']);
    Route::post('teacher/diary-study-filter', [TeacherController::class, 'Dairy']);



    Route::post('teacher/diary/add-write-diary', [TeacherController::class, 'AddWriteDiary']);

    Route::post('teacher/diary/update-write-diary', [TeacherController::class, 'UpdateWriteDiary']);
    Route::post('teacher/diary/show-diary', [TeacherController::class, 'ShowDiary']);
    Route::post('show-student-diary', [StudentParentPortalController::class, 'ShowStudentDiary']);
    Route::post('sign-student-diary', [StudentParentPortalController::class, 'SignStudentDiary']);
    Route::post('teacher/diary/edit-diary', [TeacherController::class, 'EditDiary']);
    Route::get('teacher/diary/delete-diary/{id}', [TeacherController::class, 'DeleteDiary']);

    /*study material*/
    Route::post('teacher/diary/add-study-material', [TeacherController::class, 'AddStudyMaterial']);
    Route::get('teacher/diary/show-study/{id}', [TeacherController::class, 'ShowStudyMaterial']);
    Route::post('show-student-study', [StudentParentPortalController::class, 'ShowStudentStudyMaterial']);
    Route::get('teacher/diary/edit-study/{id}', [TeacherController::class, 'EditStudyMaterial']);
    Route::post('teacher/diary/update-study-material', [TeacherController::class, 'UpdateStudyMaterial']);
    Route::get('teacher/diary/delete-study/{id}', [TeacherController::class, 'DeleteStudyMaterial']);

    Route::get('teacher/class-register/{id?}', [TeacherController::class, 'ClassRegister']);


    Route::match(array('GET','POST'),'teacher/attendance', [TeacherController::class, 'Attendance']);





    Route::post('teacher/show-attendance', [TeacherController::class, 'ShowAttendance']);

    Route::get('teacher/delete-attendance/{id}', [TeacherController::class, 'deleteAttendance']);

    Route::post('teacher/attendance/date', [TeacherController::class, 'AttendanceDateWise']);
    Route::Post('teacher/class-register/add-student-register', [TeacherController::class, 'AddClassRegister']);

    Route::Post('teacher/class-register/behavoir-student-register', [TeacherController::class, 'AddClassBehavoir']);
    Route::Post('teacher/class-register/achievement-student-register', [TeacherController::class, 'AddClassachievement']);



    Route::get('teacher/assessment{name?}', [TeacherController::class, 'Assessment']);
    Route::post('teacher/get-teacher-exam-by-filter', [TeacherController::class, 'Assessment']);
    /*set exam syllabus*/
    Route::post('teacher/assessment/add-exam-syllabus', [TeacherController::class, 'CreateExamSyllabus']);
    Route::get('teacher/assessment/delete-exam-syllabus/{id}', [TeacherController::class, 'DeleteExamSyllabus']);
    Route::get('teacher/assessment/get-syllabus-class-by-section/{id}', [TeacherController::class, 'GetSyllabusClassSection']);
    Route::get('teacher/assessment/edit-exam-syllabus/{id}', [TeacherController::class, 'EditExamSyllabus']);

    Route::post('teacher/setmark', [TeacherController::class, 'ExamMakr']);
    Route::post('teacher/marks_obtain', [TeacherController::class, 'marksobtain']);

    Route::post('teacher/assessment/update-exam-syllabus', [TeacherController::class, 'UpdateExamSyllabus']);
    /*Route::get('examiner/show-exam-syllabus/{id}', [TeacherController::class, 'ShowExamSyllabus']);
    */
    /*set exam Paper*/
    Route::post('teacher/assessment/add-exam-paper', [TeacherController::class, 'CreateExamPaper']);
    Route::get('teacher/assessment/delete-exam-paper/{id}', [TeacherController::class, 'DeleteExamPaper']);
    Route::get('teacher/assessment/edit-exam-paper/{id}', [TeacherController::class, 'EditExamPaper']);
    Route::post('teacher/assessment/update-exam-paper', [TeacherController::class, 'UpdateExamPaper']);

    /*------------------------------Teacher Routes End--------------------------------*/
});








##############################Front End Routes End################################################
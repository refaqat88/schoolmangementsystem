<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('adminassets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('adminassets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title> SCIMS | @yield('title')</title>
    <meta name="_token" content="{{csrf_token()}}"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/paper-dashboard-2-pro"/>
    <!--  Social tags      -->
    <meta name="keywords"
          content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, paper dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, paper design, paper dashboard bootstrap 4 dashboard">
    <meta name="description"
          content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Paper Dashboard PRO by Creative Tim">
    <meta itemprop="description"
          content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <meta itemprop="image" content="../../../s3.amazonaws.com/creativetim_bucket/products/84/opt_pd2p_thumbnail.jpg">
    <!-- Twitter Card data -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link href="{{asset('adminassets/css/fontawesome/font-awesome.min.css')}}" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset('adminassets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminassets/css/font-awesome.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminassets/css/font-awesome.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('adminassets/css/paper-dashboard.min1036.css?v=2.1.1')}}" rel="stylesheet"/>
    <!-- CSS Just for demo purpose, don't include it in your project -->

    <link href="{{asset('css/custom.css')}}" rel="stylesheet')}}"/>
    <!-- Sweet alert cdn -->
    <link rel="stylesheet" href="{{asset('adminassets/css/sweetalert/sweetalert.css')}}"  crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('adminassets/demo/demo.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('adminassets/css/jquery-confirm.min.css')}}">
   <link rel="stylesheet" href="{{asset('adminassets/css/datepicker/bootstrap-datepicker.min.css')}}"  />
    <link href="{{asset('adminassets/css/paper-dashboard.min1036.css')}}" rel="stylesheet"/>

    {{-- style for pie charts ends --}}
    <link rel="stylesheet" href="{{asset('adminassets/css/jquery.dataTables.min.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('adminassets/css/css/buttons.dataTables.min.css')}}">
 -->
    
    <link rel="stylesheet" href="{{asset('adminassets/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminassets/css/css/buttons.dataTables.min.css')}}">
    <style>
        .sweet-alert div.form-group {
            display: none !important;
        }
    </style>
    <!-- <link rel="stylesheet" href="{{asset('adminassets/css/css/buttons.dataTables.min.css')}}">  -->

@yield('front_css')
<!-- Extra details for Live View on GitHub Pages -->
    <!-- Google Tag Manager -->
   {{-- <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
    </script>--}}
    <!-- End Google Tag Manager -->
</head>

<body class="" onload="cl();">
<!-- Extra details for Live View on GitHub Pages -->
<!-- Google Tag Manager (noscript) -->
<noscript>
     
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="wrapper ">
    <div class="sidebar" data-color="default" data-active-color="danger">
         
        <div class="logo">
            <a href="{{url('home')}}" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="{{$school->photo()}}">
                </div>
                <!-- <p>CT</p> -->
            </a>
            <a href="{{url('home')}}" class="simple-text logo-normal">
                <img src="{{$school->photo()}}" width="50px" height="50px">
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">

                    <img src="{{Auth::user()->photo()}}"/>
                    
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
              <span>
                {{Auth::user()->name}}
                <b class="caret"></b>
              </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse @if(Request::is('profile') || Request::is('profile-edit')) show @endif" id="collapseExample">
                        <ul class="nav">
                            
                            <li class="{{ Request::is('profile-edit') ? 'active' : '' }}">
                                <a href="{{url('profile-edit')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.EP') }}</span>
                                    <span class="sidebar-normal">{{ __('layout.Edit_Profile') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="sidebar-mini-icon">{{ __('layout.S') }}</span>
                                    <span class="sidebar-normal">{{ __('layout.Logout') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">

                <li class="{{ Request::is('home') ? 'active' : '' }}" >
                    <a href="{{url('home')}}">
                        <i class="fa fa-dashboard"></i>
                        <p>{{ __('layout.Dashboard') }}</p>
                    </a>
                </li>



                @can('view-school')

                <li @if(Request::is('school')  || Request::is('add-class') || Request::is('class-section')|| Request::is('class-section') || Request::is('add-subject') || Request::is('add-period')) class="active"  @endif >
                    <a  data-toggle="collapse" href="#adminpages">
                        <i class="fa fa-cogs"></i>
                        <p> {{ __('layout.Administrate') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse  @if(Request::is('school') || Request::is('add-class') || Request::is('class-section')|| Request::is('class-section') || Request::is('add-subject')|| Request::is('add-period')  ) show @endif" id="adminpages">
                        <ul class="nav">
                            <li class="{{ Request::is('school*') ? 'active' : '' }}">
                                <a href="{{url('school')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.CA') }}</span>
                                    <span class="sidebar-normal">  {{ __('layout.Campuses') }}</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('add-class*') ? 'active' : '' }}">
                                <a href="{{url('add-class')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.CLS') }} </span>
                                    <span class="sidebar-normal"> {{ __('layout.Classes') }} </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('class-section*') ? 'active' : '' }}">
                                <a href="{{url('class-section')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.CSEC') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Class_Sections') }} </span>
                                </a>
                            </li>


                          
                            <li class="{{ Request::is('add-subject*') ? 'active' : '' }}">
                                <a href="{{url('add-subject')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.SUB') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Subjects') }} </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('add-period*') ? 'active' : '' }}">
                                <a href="{{url('add-period')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.PER') }} </span>
                                    <span class="sidebar-normal"> {{ __('layout.Periods') }} </span>
                                </a>
                            </li>
                            
                            {{--<li class="{{ Request::is('type*') ? 'active' : '' }}">
                                 <a href="{{url('type')}}">
                                     <span class="sidebar-mini-icon">{{ __('layout.ADM') }}</span>
                                     <span class="sidebar-normal"> {{ __('layout.Users_Type') }}</span>
                                 </a>
                             </li>--}}

                        </ul>
                    </div>
                </li>
                @endcan
                
                 @can('view-users')

                <li @if(Request::is('users*')) class="active"  @endif>
                    
                    <a href="{{route('users.index')}}">
                        <i class="fa fa-users"></i>
                        <p>
                            {{ __('layout.Users') }}  
                        </p>
                    </a>
                    
                </li>
                @endcan
                
                <li class="@if(Route::is('admissionReports') || Route::is('examinationReports') || Route::is('accountReports') || Route::is('certificateReports') || Route::is('feeReports')  ) active  @endif ">
                    <a data-toggle="collapse" href="#reports">
                        <i class="fa fa-file"></i>
                        <p>
                            {{ __('layout.Reports') }}<b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse @if(Route::is('admissionReports') || Route::is('examinationReports') || Route::is('accountReports') || Route::is('certificateReports') || Route::is('feeReports')  ) show  @endif  " id="reports">
                        <ul class="nav">
                                <li  class="{{ Route::is('admissionReports') ? 'active' : '' }}">
                                    <a href="{{ route('admissionReports')}}">
                                        <span class="sidebar-mini-icon">{{ __('layout.AR') }}</span>
                                        <span class="sidebar-normal">{{ __('layout.Admission_Withdrawal') }}</span>
                                    </a>
                                </li>
                                <li class="{{ Route::is('examinationReports') ? 'active' : '' }}">
                                    <a href="{{ route('examinationReports')}}">
                                        <span class="sidebar-mini-icon">{{ __('layout.ER') }}</span>
                                        <span class="sidebar-normal"> {{ __('layout.Examination') }}  </span>
                                    </a>
                                </li>
                                <li class="{{ Route::is('feeReports') ? 'active' : '' }}">
                                    <a href="{{ route('feeReports')}}">
                                        <span class="sidebar-mini-icon">{{ __('layout.FR') }} </span>
                                        <span class="sidebar-normal"> {{ __('layout.Fees') }}  </span>
                                    </a>
                                </li>
                                <li class="{{ Route::is('accountReports') ? 'active' : '' }}">
                                    <a href="{{route('accountReports')}}">
                                        <span class="sidebar-mini-icon">{{ __('layout.IE') }}</span>
                                        <span class="sidebar-normal"> {{ __('layout.Accounts') }}</span>
                                    </a>
                                </li>
                                <li class="{{ Route::is('certificateReports') ? 'active' : '' }}">
                                    <a href="{{route('certificateReports')}}">
                                        <span class="sidebar-mini-icon">{{ __('layout.C') }}</span>
                                        <span class="sidebar-normal"> {{ __('layout.Certificates') }}</span>
                                    </a>
                                </li>
                        </ul>
                    </div>
                </li>
                

                @canany(['view-students', 'add-admission','parents'])

                <li @if(Request::is('students') || Request::is('admission') || Request::is('parents')  ) active  @endif >
                    <a data-toggle="collapse" href="#studentPages">
                        <i class="fa fa-graduation-cap"></i>
                        <p>
                             {{ __('layout.Students') }} <b class="caret"></b>
                        </p>
                    </a>


                    <div class="collapse @if(Request::is('students') || Request::is('admission') || Request::is('parents')  ) show @endif " id="studentPages">
                        <ul class="nav">

                          @can('add-admission')
                            <li class="{{ Request::is('admission') ? 'active' : '' }}">
                                <a href="{{url('admission')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.ADM') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Admission') }} </span>
                                </a>
                            </li>
                            @endcan


                            
                            @can('view-students')
                            <li class="{{ Request::is('students') ? 'active' : '' }}">
                                <a href="{{url('students')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.STD') }}</span>
                                    <span class="sidebar-normal">{{ __('layout.Students') }} </span>
                                </a>
                            </li>
                            @endcan

                            
                      

                            @can('parents')
                            <li class="{{ Request::is('parents') ? 'active' : '' }}">
                                <a href="{{url('parents')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.PAR') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Parents') }} </span>
                                </a>
                            </li>


                             @endcan
                        </ul>
                    </div>
                </li>
                @endcanany

                @canany(['view-staff', 'add-staff'])
                <li @if(Request::is('appointment')) class="active" @elseif(Request::is('staff')) class=" active" @endif>
                    <a data-toggle="collapse" href="#staffpages">
                        <i class="fa fa-black-tie"></i>
                        <p>
                             {{ __('layout.Staff') }} <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse  @if(Request::is('appointment') || Request::is('staff')  ) show @endif " id="staffpages">
                        <ul class="nav">
                            @can('view-staff')
                            <li class="{{ Request::is('staff*') ? 'active' : '' }}">
                                <a href="{{url('staff')}}">
                                    <span class="sidebar-mini-icon"> {{ __('layout.STF') }}</span>
                                    <span class="sidebar-normal">  {{ __('layout.Staff') }} </span>
                                </a>
                            </li>
                            @endcan
                            @can('add-staff')
                            <li class="{{ Request::is('appointment*') ? 'active' : '' }}">
                                <a href="{{url('appointment')}}">
                                    <span class="sidebar-mini-icon"> {{ __('layout.APT') }}</span>
                                    <span class="sidebar-normal">  {{ __('layout.Appointment') }} </span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcanany

                <li @if(Request::is('fullcalender')) class="active"  @endif>
                    <a data-toggle="collapse" href="#CalenderPage">
                        <i class="fa fa-calendar-plus-o"></i>
                        <p>
                             {{ __('layout.Event') }} <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse  @if(Request::is('fullcalender') ) show @endif " id="CalenderPage">
                        <ul class="nav">

                            <li class="{{ Request::is('fullcalender*') ? 'active' : '' }}">
                                <a href="{{url('fullcalender')}}">
                                    <span class="sidebar-mini-icon"> {{ __('layout.CE') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Create_Events') }} </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                @canany(['view-schedule'])
              
                     

                <li  @if(Request::is('assign_subjects*') || Request::routeIs('classSchedule')|| Request::is('class-schedule') || Request::is('generic_schedule') ) class="active"  class=" active" @endif>
                    <a data-toggle="collapse" href="#schdulesPages">
                        <i class="fa fa-calendar"></i>
                        <p>
                            {{ __('layout.Class_Schedule') }}<b class="caret"></b>
                        </p>
                    </a>


                    <div class="collapse  @if(Request::is('class-schedule') || Request::is('assign_subjects*') || Request::routeIs('classSchedule') || Request::is('generic_schedule')  ) show @endif " id="schdulesPages">
                        <ul class="nav">
                             
                            

                            <li class="{{ Request::is('assign_subjects*') ? 'active' : '' }}">

                                            <a href="{{url('assign_subjects')}}">
                                                    <span class="sidebar-mini-icon">{{ __('layout.ASS') }}</span>
                                                    <span class="sidebar-normal">{{ __('layout.Assign_Subject') }}</span>
                                                </a>
                            </li>


                            <li class="{{ Request::is('generic_schedule') ? 'active' : '' }}">

                                            <a href="{{url('generic_schedule')}}">
                                                    <span class="sidebar-mini-icon">{{ __('layout.AS') }}</span>
                                                    <span class="sidebar-normal">  {{ __('layout.Auto_Schedule') }}  </span>
                                                </a>
                            </li>


                            
                            
                            <li class="{{ Request::routeIs('classSchedule') ? 'active' : '' }}">

                                            <a href="{{route('classSchedule')}}">
                                                    <span class="sidebar-mini-icon">{{ __('layout.MS') }}</span>
                                                    <span class="sidebar-normal">{{ __('layout.Manual_Schedule') }}</span>
                                                </a>
                            </li>
                            
 
                        </ul>
                    </div>

                </li>



                @endcanany

                @canany(['view-examiner'])
                <li @if(Request::is('examiner/examination')) class="active"  @endif>

                        <a href="{{url('examiner/examination')}}">
                            <i class="fa fa-pencil-square-o"></i>
                            <p>
                                 {{ __('layout.Examination') }}
                            </p>
                        </a>

                </li>
                @endcanany
               

                @can('Accounts')

 
                
                <li  @if(Request::is('income*')) class="active"  @endif  >
                    <a data-toggle="collapse" href="#componentsExamples">
                        <i class="fa fa-line-chart"></i>
                        <p>
                            {{ __('layout.Income') }} <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse @if(Request::is('income*')) show @endif " id="componentsExamples">
                        <ul class="nav">
                            <li class="{{ Request::is('income*') ? 'active' : '' }}">
                                <a href="{{url('income')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.STD') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Students') }} </span>
                                </a>
                            </li>
                            <!-- 
                            <li>
                                <a href="#">
                                    <span class="sidebar-mini-icon">{{ __('layout.TRN') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Transport') }} </span>
                                </a>
                            </li>
                            
                           <li>
                                <a href="../../examples/pages/add-student.html">
                                    <span class="sidebar-mini-icon">{{ __('layout.HTL') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Hostel') }} </span>
                                </a>
                            </li>


                            <li>
                                <a href="#">
                                    <span class="sidebar-mini-icon">{{ __('layout.CNT') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Canteen') }} </span>
                                </a>
                            </li>
                             -->
                        </ul>
                    </div>
                </li>
                <li @if(Request::is('expense*') ||Request::is('suppler*') ) class="active"  @endif>
                    <a data-toggle="collapse" href="#expensearrow">
                        <i class="fa fa-calculator"></i>
                        <p>
                            {{ __('layout.Expense') }} <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse  @if(Request::is('expense*') ||Request::is('suppler*') ) show @endif " id="expensearrow">
                        <ul class="nav">
                            <li {{ Request::is('suppler*') ? 'active' : '' }} >
                                <a href="{{URL('suppler')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.SUP') }}</span>
                                    <span class="sidebar-normal">  {{ __('layout.Suppliers') }} </span>
                                </a>
                            </li>
                            <li  {{ Request::is('expense*') ? 'active' : '' }}>
                                <a  href="{{URL('expense')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.GE') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.General_Expense') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li  @if(Request::is('payroll*') ) class="active"  @endif>
                    <a data-toggle="collapse" href="#payarrow">
                        <i class="fa fa-google-wallet"></i>
                        <p>
                            {{ __('layout.Payroll') }} <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse @if(Request::is('payroll*') ) show @endif " id="payarrow">
                        <ul class="nav">
                            <li class="{{ Request::is('payroll*') ? 'active' : '' }} ">
                                <a href="{{url('payroll')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.PAY') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Set_Payroll') }} </span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>

 
                <li>
                    <a data-toggle="" href="#">
                        <i class="fa fa-file" aria-hidden="true"></i>
                        <p>
                            {{ __('layout.Reports') }}  
                        </p>
                    </a>

                </li>




                <li  @if(Request::is('chartOfAccount*')) class="active"  @endif >
                    <a data-toggle="collapse" href="#accarrow">
                        <i class="fa fa-money"></i>
                        <p>
                            {{ __('layout.Accounts') }} <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse  @if(Request::is('chartOfAccount*')) show @endif" id="accarrow">
                        <ul class="nav">
                            <li {{ Request::is('chartOfAccount*') ? 'active' : '' }}>
                                <a href="{{url('chartOfAccount')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.COA') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Chart_Accounts') }} </span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="#">
                                    <span class="sidebar-mini-icon">{{ __('layout.REC') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Reconcile') }}  </span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </li>

                @endcan

                 

                @canany(['view-library'])
                

                <li @if(Request::is('category')) class="active" @elseif(Request::is('library-floor')) class="active" @elseif(Request::is('author')) class="active" @elseif(Request::is('supplier')) class="active" @elseif(Request::is('publisher')) class="active" @elseif(Request::is('library-rack')) class="active" @elseif(Request::is('library-shelf')) class="active" @elseif(Request::is('library-entity')) class="active" @elseif(Request::is('entity-type')) class="active" @elseif(Request::is('library-general-entity')) class="active"@elseif(Request::is('library')) class="active" @endif>
                    <a data-toggle="collapse" href="#library">
                        <i class="fa fa-university"></i>
                        <p>
                            {{ __('layout.library') }} <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse @if(Request::is('category') || Request::is('library-floor') || Request::is('author') || Request::is('supplier') || Request::is('publisher') || Request::is('library-rack') || Request::is('library-shelf')|| Request::is('library-entity') || Request::is('entity-type') || Request::is('library-general-entity') || Request::is('library')) show @endif" id="library">
                        <ul class="nav">
                            <li class="{{ Request::is('category*') ? 'active' : '' }}">
                                <a href="{{url('category')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.C') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Category') }} </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('library-floor*') ? 'active' : '' }}">
                                <a href="{{url('library-floor')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.LF') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Library_Floor') }}</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('author*') ? 'active' : '' }}">
                                <a href="{{url('author')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.A') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Author') }} </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('supplier*') ? 'active' : '' }}">
                                <a href="{{url('supplier')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.S') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Supplier') }} </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('publisher*') ? 'active' : '' }}">
                                <a href="{{url('publisher')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.P') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Publisher') }} </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('library-rack*') ? 'active' : '' }}">
                                <a href="{{url('library-rack')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.LR') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Library_Rack') }}</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('library-shelf*') ? 'active' : '' }}">
                                <a href="{{url('library-shelf')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.LS') }}</span>
                                    <span class="sidebar-normal"> {{ __('layout.Library_Shelf') }}</span>
                                </a>
                            </li>

                            <li class="{{ Request::is('library-entity*') ? 'active' : '' }}">
                                <a href="{{url('library-entity')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.LE') }}</span>
                                    <span class="sidebar-normal">{{ __('layout.library_Entity') }}</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('entity-type*') ? 'active' : '' }}">
                                <a href="{{url('entity-type')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.ET') }}</span>
                                    <span class="sidebar-normal">{{ __('layout.Entity_Type') }}</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('library-general-entity*') ? 'active' : '' }}">
                                <a href="{{url('library-general-entity')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.LGE') }}</span>
                                    <span class="sidebar-normal">{{ __('layout.Library_General_Entity') }}</span>
                                </a>
                            </li>

                            <li class="{{ Request::is('library') ? 'active' : '' }}">
                                <a href="{{url('library')}}">
                                    <span class="sidebar-mini-icon">{{ __('layout.L') }}</span>
                                    <span class="sidebar-normal">{{ __('layout.Library') }}</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endcanany
                

                @can(['Attendance'])


                <li class="{{Request::is('employee/attendance') ? 'active' :''}}">
                    <a data-toggle="" href="{{url('employee/attendance')}}">
                        <i class="fa fa-calendar-check-o"></i>
                        <p>
                            {{ __('layout.Attendance') }}  </b>
                        </p>
                    </a>

                </li>


                @endcan

                @canany(['teacher'])
                 
                 @if(Auth::user()->employeeInfo && Auth::user()->employeeInfo->sub_Id !='null')
                 @if($form_master !='')
                <li class="{{ Request::is('teacher/class-register') ? 'active' : '' }}">
                    <a data-toggle="" href="{{url('teacher/class-register')}}">
                        <i class="fa fa-book"></i>
                        <p>
                            {{ __('layout.Register') }} </b>
                        </p>
                    </a>

                </li>

                <li class="{{Request::is('teacher/attendance') ? 'active' :''}}">
                    <a data-toggle="" href="{{url('teacher/attendance')}}">
                        <i class="fa fa-list"></i>
                        <p>
                            {{ __('layout.Attendance') }}  </b>
                        </p>
                    </a>

                </li>
                

                @endif
                

                @endif

                
                <li class="{{Request::is('teacher/diary') ? 'active' : ''}}">
                    <a data-toggle="" href="{{url('teacher/diary')}}">
                        <i class="fa fa-pencil-square"></i>
                        <p>
                          {{ __('layout.Diary') }} </b>
                        </p>
                    </a>

                </li>
                <li class="{{Request::is('teacher/assessment') ? 'active' : ''}}">
                    <a data-toggle="" href="{{url('teacher/assessment')}}">
                        <i class="fa fa-file-text"></i>
                        <p>
                           {{ __('layout.Assessments') }}  </b>
                        </p>
                    </a>

                </li>
                @endcanany


                @role('Student')
                <li class="">
                    
                    <a href="{{url('school-details')}}">
                        <i class="fa fa-university"></i>
                        <p>
                            {{ __('layout.School') }} 
                        </p>
                    </a>
                    
                </li>
                @endrole
                @role('parents')
                <li>
                   

                    <a href="{{url('school-details')}}">
                        <i class="fa fa-university"></i>
                        <p>
                             {{ __('layout.School') }}
                        </p>
                    </a>
                </li>
               
                @endrole 
              
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-icon btn-round">
                            <i class="fa fa-lg fa-angle-right text-center visible-on-sidebar-mini"></i>
                            <i class="mni fa fa-lg fa-angle-left text-center visible-on-sidebar-regular"></i>
                        </button>
                    </div>
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="javascript:;">{{ __('layout.sims') }}</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    
                    <ul class="navbar-nav">
                        
                        <li class="nav-item">
                            <a class="nav-link btn-rotate" href="{{ url('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>
                            </a>

                            <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                             
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

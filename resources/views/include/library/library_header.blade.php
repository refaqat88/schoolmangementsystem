<!--
=========================================================
* Paper SCIMS - v1.0.0
=========================================================
* Copyright 2020 Point Web Tech (https://www.pointwebtech.com)
Coded by www.pointwebtech.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

@php //echo "<pre>"; print_r($profileData); exit;@endphp
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>

    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('adminassets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('adminassets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title> SCIMS | @yield('title')</title>
    <meta name="_token" content="{{csrf_token()}}" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/paper-dashboard-2-pro" />
    <!--  Social tags      -->
    <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, paper dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, paper design, paper dashboard bootstrap 4 dashboard">
    <meta name="description" content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Paper Dashboard PRO by Creative Tim">
    <meta itemprop="description" content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <meta itemprop="image" content="../../../s3.amazonaws.com/creativetim_bucket/products/84/opt_pd2p_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Paper Dashboard PRO by Creative Tim">
    <meta name="twitter:description" content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/84/opt_pd2p_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Paper Dashboard PRO by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://creativetimofficial.github.io/paper-dashboard-2-pro/examples/dashboard.html" />
    <meta property="og:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/84/opt_pd2p_thumbnail.jpg" />
    <meta property="og:description" content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
    <meta property="og:site_name" content="Creative Tim" />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset('adminassets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('adminassets/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('adminassets/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('adminassets/css/paper-dashboard.min1036.css?v=2.1.1')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('adminassets/demo/demo.css" rel="stylesheet')}}" />
    <link href="{{asset('custom.css')}}" rel="stylesheet')}}" />
    <!-- Sweet alert cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" integrity="sha512-fRVSQp1g2M/EqDBL+UFSams+aw2qk12Pl/REApotuUVK1qEXERk3nrCFChouag/PdDsPk387HJuetJ1HBx8qAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <!-- ends sweet alerts cdn -->
 @yield('front_css')
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
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
    </script>
    <!-- End Google Tag Manager -->
</head>

<body class="" onload="cl()">
<!-- Extra details for Live View on GitHub Pages -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="wrapper ">
    <div class="sidebar" data-color="default" data-active-color="danger">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color=" default | primary | info | success | warning | danger |"
        -->
        <div class="logo">
            <a href="https://www.creative-tim.com/" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="{{url('adminassets/img/logo-small.png')}}">
                </div>
                <!-- <p>CT</p> -->
            </a>
            <a href="{{url('examiner/dashboard')}}" class="simple-text logo-normal">
                Librarian Portal
                <!-- <div class="logo-image-big">
                  <img src="../assets/img/logo-big.png">
                </div> -->
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                  {{--  @if($profileData)
                        <img src="{{asset('upload/user/'.$profileData->user_image)}}"/>
                    @else--}}
                        <img src="{{url('adminassets/img/employee%20avatar.png')}}" />
                   {{-- @endif--}}

                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
              <span>
                    Librarian
                <b class="caret"></b>
              </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{url('teacher/profile')}}">
                                    <span class="sidebar-mini-icon">MP</span>
                                    <span class="sidebar-normal">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('teacher/editProfile')}}">
                                    <span class="sidebar-mini-icon">EP</span>
                                    <span class="sidebar-normal">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="sidebar-mini-icon">S</span>
                                    <span class="sidebar-normal">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <ul class="nav">
                <li class="nav-item">
                    <a href="{{url('library/dashboard')}}" class="{{ 'library/dashboard' == request()->path() ? 'active' : '' }}">
                        <i class="fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li @if(Request::is('category')) class="active" @elseif(Request::is('library-floor')) class="active" @elseif(Request::is('author')) class="active" @elseif(Request::is('supplier')) class="active" @elseif(Request::is('publisher')) class="active" @elseif(Request::is('library-rack')) class="active" @elseif(Request::is('library-shelf')) class="active" @elseif(Request::is('library-entity')) class="active" @elseif(Request::is('entity-type')) class="active" @elseif(Request::is('library-general-entity')) class="active"@elseif(Request::is('library')) class="active" @endif>
                    <a data-toggle="collapse" href="#mapsExamples1">
                        <i class="fa fa-book"></i>
                        <p>
                            Library <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse @if(Request::is('category') || Request::is('library-floor') || Request::is('author') || Request::is('supplier') || Request::is('publisher') || Request::is('library-rack') || Request::is('library-shelf')|| Request::is('library-entity') || Request::is('entity-type') || Request::is('library-general-entity') || Request::is('library')) show @endif" id="mapsExamples1">
                        <ul class="nav">
                            <li class="{{ Request::is('category*') ? 'active' : '' }}">
                                <a href="{{url('category')}}">
                                    <span class="sidebar-mini-icon">C</span>
                                    <span class="sidebar-normal"> Category </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('library-floor*') ? 'active' : '' }}">
                                <a href="{{url('library-floor')}}">
                                    <span class="sidebar-mini-icon">LF</span>
                                    <span class="sidebar-normal"> Library Floor </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('author*') ? 'active' : '' }}">
                                <a href="{{url('author')}}">
                                    <span class="sidebar-mini-icon">A</span>
                                    <span class="sidebar-normal"> Author </span>
                                </a>
                            </li>
                            <li class="{{'supplier' == request()->path() ? 'active' : ''}}">
                                <a href="{{url('supplier')}}">
                                    <span class="sidebar-mini-icon">S</span>
                                    <span class="sidebar-normal"> Supplier </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('publisher*') ? 'active' : '' }}">
                                <a href="{{url('publisher')}}">
                                    <span class="sidebar-mini-icon">P</span>
                                    <span class="sidebar-normal"> Publisher </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('library-rack*') ? 'active' : '' }}">
                                <a href="{{url('library-rack')}}">
                                    <span class="sidebar-mini-icon">LR</span>
                                    <span class="sidebar-normal"> Library Rack </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('library-shelf*') ? 'active' : '' }}">
                                <a href="{{url('library-shelf')}}">
                                    <span class="sidebar-mini-icon">LS</span>
                                    <span class="sidebar-normal"> Library Shelf </span>
                                </a>
                            </li>

                            <li class="{{ Request::is('library-entity*') ? 'active' : '' }}">
                                <a href="{{url('library-entity')}}">
                                    <span class="sidebar-mini-icon">LE</span>
                                    <span class="sidebar-normal">library Entity</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('entity-type*') ? 'active' : '' }}">
                                <a href="{{url('entity-type')}}">
                                    <span class="sidebar-mini-icon">ET</span>
                                    <span class="sidebar-normal">Entity Type</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('library-general-entity*') ? 'active' : '' }}">
                                <a href="{{url('library-general-entity')}}">
                                    <span class="sidebar-mini-icon">LGE</span>
                                    <span class="sidebar-normal"> Library General Entity </span>
                                </a>
                            </li>
                            <li class="{{ Request::is('library*') ? 'active' : '' }}">
                                <a href="{{url('library')}}">
                                    <span class="sidebar-mini-icon">L</span>
                                    <span class="sidebar-normal"> Library </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
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
                    <a class="navbar-brand" href="javascript:;">School Information Management System</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                  {{--  <form>
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </form>--}}
                    <ul class="navbar-nav">
                        {{--<li class="nav-item">
                            <a class="nav-link btn-magnify" href="javascript:;">
                                <i class="fa fa-circle-o-notch"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Stats</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item btn-rotate dropdown">
                         --}}{{--   <a class="nav-link dropdown-toggle" href="http://example.com/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell-o"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Some Actions</span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>--}}{{--
                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link btn-rotate" href="{{ url('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>
                            </a>

                            <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            {{--<a class="nav-link btn-rotate" href="javascri">
                                <i class="fa fa-cog"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Account</span>
                                </p>
                            </a>--}}
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

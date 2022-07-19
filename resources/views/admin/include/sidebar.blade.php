<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin/home')}}" class="brand-link {{ 'admin/home' == request()->path() ? 'active' : ''}}">
        <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin | SCIMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
{{--        <!-- Sidebar user panel (optional) -->--}}
{{--        <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
{{--            <div class="image">--}}
{{--                <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">--}}
{{--            </div>--}}
{{--            <div class="info">--}}
{{--                <a href="#" class="d-block">{{session('adminData.name')}}</a>--}}
{{--            </div>--}}
{{--            <div class="info">--}}
{{--                <a data-toggle="collapse" href="#collapseExample" class="collapsed">--}}
{{--              <span>--}}
{{--                {{Auth::user()->name}}--}}
{{--                  {{Session::get('adminData')['name']}}--}}
{{--                <b class="caret"></b>--}}
{{--              </span>--}}
{{--                </a>--}}
{{--                <div class="clearfix"></div>--}}
{{--                <div class="collapse" id="collapseExample">--}}
{{--                    <ul class="nav">--}}
{{--                        <li class="{{ Request::is('') ? 'active' : '' }}">--}}
{{--                            <a href="{{url('admin/profile')}}">--}}
{{--                                <span class="sidebar-mini-icon">P</span>--}}
{{--                                <span class="sidebar-normal">Profile</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="{{ Request::is('') ? 'active' : '' }}">--}}
{{--                            <a href="{{url('admin/profile/edit')}}">--}}
{{--                                <span class="sidebar-mini-icon"></span>--}}
{{--                                <span class="sidebar-normal">Edit Profile</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                        <ul class="nav nav-pills nav-sidebar flex-column">--}}
{{--                            <!-- Add icons to the links using the .nav-icon class--}}
{{--                                 with font-awesome or any other icon font library -->--}}
{{--                            <li class="nav-item>--}}
{{--                                <a href="{{url('admin/home')}}"  class="nav-link {{ 'admin/home' == request()->path() ? 'active' : ''}}">--}}
{{--                                    <span>P</span>--}}
{{--                                    <p>Profile</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{url('admin/home')}}"  class="nav-link {{ 'admin/home' == request()->path() ? 'active' : ''}}">--}}
{{--                                    <span>EP</span>--}}
{{--                                    <p>Edit Profile</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"  data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
{{--                super admin profile
                super admin profile --}}
                <li class="nav-item has-treeview {{ 'admin/profile' == request()->path() || 'admin/profile/edit' == request()->path() ? 'menu-open' : ''}}">
                    <a  href="{{url('admin/home')}}"  class="nav-link">
                        <span>
                            <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" with="30" height="35" class="img-circle elevation-2" alt="User Image">
                         {{Auth::user()->name}}</span>
                        <p>
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item" >
                            <a href="{{url('admin/profile')}}" class="nav-link {{ 'admin/profile' == request()->path() ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item" >
                            <a href="{{url('admin/profile/edit')}}" class="nav-link {{ 'admin/profile/edit' == request()->path() ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview  {{ 'admin/home' == request()->path() ? 'menu-open' : ''}}">
                    <a href="{{url('admin/home')}}"  class="nav-link {{ 'admin/home' == request()->path() ? 'active' : ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ 'admin/school' == request()->path() || 'admin/section' == request()->path() ||'admin/student/category' == request()->path()|| 'admin/board' == request()->path()||'admin/education-level' == request()->path()||'admin/exam-type' == request()->path() ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            School Crud
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview }}">

                        <li class="nav-item" >
                            <a href="{{url('admin/school')}}" class="nav-link {{ 'admin/school' == request()->path() ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>School</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/section')}}" class="nav-link {{ 'admin/section' == request()->path() ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Section/Level</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/student/category')}}" class="nav-link {{ 'admin/student/category' == request()->path() ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Student Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/board-university')}}" class="nav-link {{ 'admin/board-university' == request()->path() ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Board/University</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/education-level')}}" class="nav-link {{ 'admin/education-level' == request()->path() ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Education Level</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('admin/exam-type')}}" class="nav-link {{ 'admin/exam-type' == request()->path() ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Exam Type</p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{url('admin/general-grade')}}" class="nav-link {{ 'admin/general-grade' == request()->path() ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General Grade</p>
                            </a>
                        </li>
                        
                        {{--<li class="nav-item">
                            <a href="pages/layout/fixed-footer.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Footer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Collapsed Sidebar</p>
                            </a>
                        </li>--}}
                    </ul>
                </li>
{{--                <li class="nav-item has-treeview">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-tree"></i>--}}
{{--                        <p>--}}
{{--                            Class Crud--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{url('admin/class-section')}}" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Class Section</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/UI/icons.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Subject</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                   {{--     <li class="nav-item">
                            <a href="pages/UI/buttons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Representative</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/sliders.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/modals.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Modals & Alerts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/navbar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Navbar & Tabs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/timeline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Timeline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/ribbons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ribbons</p>
                            </a>
                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <li class="nav-item has-treeview {{ 'admin/user-type' == request()->path() ||'admin/employee-type' == request()->path() ||'admin/roles' == request()->path() ||'admin/users' == request()->path() ||'admin/designation' == request()->path() || 'admin/occupation' == request()->path() ||'admin/relationship' == request()->path()|| 'admin/marital-status' == request()->path()||'admin/gender' == request()->path()||'admin/disability' == request()->path() ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            User Crud
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                         
                        <li class="nav-item ">
                            <a href="{{url('admin/employee-type')}}" class="nav-link {{ 'admin/employee-type'== request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employee Types</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('admin/roles')}}" class="nav-link {{ 'admin/roles'== request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role</p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{url('admin/users')}}" class="nav-link {{ 'admin/users'== request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('admin/designation')}}" class="nav-link {{ 'admin/designation'== request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Designation</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('admin/occupation')}}" class="nav-link {{ 'admin/occupation'== request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Occupation</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('admin/relationship')}}" class="nav-link {{ 'admin/relationship'== request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Relationship</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ 'admin/nationality' == request()->path() ||'admin/state' == request()->path() ||'admin/district' == request()->path() ||'admin/cities' == request()->path() ||'admin/religion' == request()->path() || 'admin/blood-group' == request()->path() ||'admin/cast' == request()->path()|| 'admin/marital-status' == request()->path()||'admin/gender' == request()->path()||'admin/disability' == request()->path() ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            General Crud
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{url('admin/nationality')}} " class="nav-link {{ 'admin/nationality'== request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nationality</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/state')}} " class="nav-link {{ 'admin/state'== request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>State</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('admin/district')}}" class="nav-link {{ 'admin/district'== request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>District</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('admin/cities')}} " class="nav-link {{ 'admin/cities'== request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cities</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('admin/religion')}} " class="nav-link {{ 'admin/religion'== request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Religion</p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{url('admin/blood-group')}} " class="nav-link {{ 'admin/blood-group'== request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blood Group</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('admin/cast')}} " class="nav-link {{ 'admin/cast'== request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cast</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('admin/marital-status')}} " class="nav-link {{ 'admin/marital-status'== request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Marital Status</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('admin/gender')}} " class="nav-link {{'admin/gender'== request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gender</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{url('admin/disability')}} " class="nav-link {{ 'admin/disability'== request()->path() ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Disability</p>
                            </a>
                        </li>
                    </ul>
                </li>
              {{--  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tables
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/tables/simple.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple Tables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/data.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>DataTables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/jsgrid.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>jsGrid</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Calendar
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Mailbox
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inbox</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/compose.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Compose</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/read-mail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Read</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/examples/invoice.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/profile.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/e_commerce.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>E-commerce</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/projects.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Projects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/project_add.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/project_edit.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Edit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/project_detail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Detail</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/contacts.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contacts</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Extras
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/examples/login.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Login</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/register.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Register</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/forgot-password.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Forgot Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/recover-password.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Recover Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/lockscreen.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lockscreen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Legacy User Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/language-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Language Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/404.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 404</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/500.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 500</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/pace.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pace</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/blank.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blank Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Starter Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.0" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Documentation</p>
                    </a>
                </li>
                <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            Level 1
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Level 2
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

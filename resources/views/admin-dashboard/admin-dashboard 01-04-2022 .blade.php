@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fa fa-user text-info"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">{{ __('layout.Active_Staff') }}</p>
                                    <p class="card-title">{{ $totalActiveEmployees }}
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i>
                            {{ __('layout.Today') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fa fa-graduation-cap text-info"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">{{ __('layout.Active_Students') }}</p>
                                    <p class="card-title">{{ $totalActiveStudents }}
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i>
                            {{ __('layout.Update_now') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fa fa-money text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">{{ __('layout.Revenue') }}</p>
                                    <p class="card-title">Rs 1,345
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i>
                            {{ __('layout.Last_day') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="fa fa-money text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">{{ __('layout.Expense') }}</p>
                                    <p class="card-title">Rs 1,000
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i>
                            {{ __('layout.Last_day') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-category">Staff</h6>
                    </div>
                    <div class="card-body" id="stf-atten-percentage" data-id="{{ $presentStaff }},{{ $absentStaff }},{{ $lateStff }},{{ $leaveStff }}">

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-category">Students</h6>
                    </div>
                    <div class="card-body" id="std-atten-percentage" data-id="{{ $presentStudent  }},{{ $absentStudent }},{{ $lateStudent }},{{ $leaveday_Std }}">

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-category">Total Staff By Gender</h6>
                    </div>
                    <div class="card-body" id="stf-by-gender" data-id="{{ $total_male_employee }},{{ $total_female_employee }}">

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-category">Total Students By Gender</h6>
                    </div>
                    <div class="card-body" id="std-by-gender"
                        data-id='{{ $total_male_std }},{{ $total_female_std }}'>

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3"></div>
        </div>
        <div class="card">
            <div class="row">
                <div class="nav-tabs-navigation nav-tabs-left col-12">
                    <div class="nav-tabs-wrapper">
                        <ul id="tabs" class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#weekly-inc-exp" role="tab"
                                    aria-expanded="true">Weekly</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#monthly-inc-exp" role="tab"
                                    aria-expanded="false">Monthly</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#yearly-inc-exp" role="tab"
                                  aria-expanded="false">Yearly</a>
                          </li>

                        </ul>
                    </div>
                </div>
                <div id="my-tab-content" class="tab-content col-lg-12 col-sm-12 col-md-12">
                    <div class="tab-pane active" id="weekly-inc-exp" role="tabpanel" aria-expanded="true">
                      <div class="">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-category">
                                    Weekly Income and Expenses
                                </h4>
                            </div>


                            <div class="card-body" id="school-weekly-income" >

                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="tab-pane" id="monthly-inc-exp" role="tabpanel" aria-expanded="false">
                      <div class="col-lg-12 col-sm-12 col-md-12" >
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-category">
                                    Monthly Income and Expenses
                                </h4>
                            </div>
                            <div class="card-body" id="school-monthly-income">

                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="tab-pane" id="yearly-inc-exp" role="tabpanel" aria-expanded="false">
                      <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-category">
                                    Yearly Income and Expenses
                                </h4>
                            </div>
                            <div class="card-body" id="school-yearly-income">

                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

        {{-- line chart for total income and expenses --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-category">
                            School Gross Profit And Total Expense
                        </h4>
                    </div>
                    <div class="card-body" id="account-chart"></div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-16 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-category">
                            Students Examination Result
                        </h4>
                    </div>
                    <div class="card-body" id="examination-result-chart">

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-category">
                            Students Enrolment Details
                        </h4>
                    </div>
                    <div class="card-body" id="std-enrol-details" data-id="{{ json_encode($total_std_enrolled) }}">

                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-category">
                            Classwise Student Strength
                        </h4>
                    </div>
                    <div class="card-body" id="std-classwise-strength" data-id="{{ json_encode($classWiseStrength); }}">

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-category">
                            Classwise Student Attendence
                        </h4>
                    </div>
                    <div class="card-body" id="std-classwise-att" data-id="{{ json_encode($classeswiseAtt_Data); }}">

                    </div>
                </div>
            </div>

        </div>



        <div class="row">
            <div class="col-md-6">
                <div class="card  card-tasks">
                    <div class="card-header ">
                        <h4 class="card-title">{{ __('layout.Tasks') }}</h4>
                        {{-- <h5 class="card-category">{{ __('layout.Backend_development') }}</h5> --}}
                    </div>
                    <div class="card-body ">
                        <div class="table-full-width table-responsive"
                            style=" overflow-y: scroll !important; overflow-x: hidden !important; height:370px !important; ">
                            <table class="table" id="table1">
                                <tbody>
                                    @foreach ($events as $event)
                                        <tr id="tasts{{ $event->id }}">

                                            <td class="text-left w-100">{{ $event->title }}</td>
                                            <td class="td-actions text-right">
                                                {{-- <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </button> --}}
                                                @role('Admin')
                                                    <button type="button" rel="tooltip" title="" data-id="{{ $event->id }}"
                                                        class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral event-remove">
                                                        <i class="fa fa-remove"></i>
                                                    </button>
                                                @endrole
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh spin"></i> {{ __('layout.Updated_3_minutes_ago') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">{{ __('layout.2020_Stats') }}</h4>
                        <p class="card-category">{{ __('layout.Weekly_Income_&_Expense') }}</p>
                    </div>
                    <div class="card-body ">
                        <canvas id="chartActivity"></canvas>
                    </div>
                    <div class="card-footer ">
                        <div class="legend">
                            <i class="fa fa-circle text-warning"></i> {{ __('layout.Expense') }}
                            <i class="fa fa-circle text-info"></i> {{ __('layout.Income') }}
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-check"></i> {{ __('layout.Data_information_certified') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('front_script')
    <script src="{{ asset('js/home_script.js') }}"></script>
    <script>
        $(document).ready(function() {


            $('#facebook').sharrre({
                share: {
                    facebook: true
                },
                enableHover: false,
                enableTracking: false,
                enableCounter: false,
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('facebook');
                },
                template: '<i class="fab fa-facebook-f"></i> Facebook',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });

            $('#google').sharrre({
                share: {
                    googlePlus: true
                },
                enableCounter: false,
                enableHover: false,
                enableTracking: true,
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('googlePlus');
                },
                template: '<i class="fab fa-google-plus"></i> Google',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });

            $('#twitter').sharrre({
                share: {
                    twitter: true
                },
                enableHover: false,
                enableTracking: false,
                enableCounter: false,
                buttons: {
                    twitter: {
                        via: 'CreativeTim'
                    }
                },
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('twitter');
                },
                template: '<i class="fab fa-twitter"></i> Twitter',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });



            // Facebook Pixel Code Don't Delete
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window,
                document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');

            try {
                fbq('init', '111649226022273');
                fbq('track', "PageView");

            } catch (err) {
                console.log('Facebook Track Error:', err);
            }

        });
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
    </noscript>
    <script>
        $(document).ready(function() {

            $sidebar = $('.sidebar');
            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');
            sidebar_mini_active = false;

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            // if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
            //     if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
            //         $('.fixed-plugin .dropdown').addClass('show');
            //     }
            //
            // }

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-active-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('data-active-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-active-color', new_color);
                }
            });

            $('.fixed-plugin .background-color span').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length !=
                    0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length !=
                    0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data(
                        'src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' +
                            new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data(
                        'src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });


            $('.switch-mini input').on("switchChange.bootstrapSwitch", function() {
                $body = $('body');

                $input = $(this);

                if (paperDashboard.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    paperDashboard.misc.sidebar_mini_active = false;
                } else {
                    $('body').addClass('sidebar-mini');
                    paperDashboard.misc.sidebar_mini_active = true;
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });

        });
    </script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();


            demo.initVectorMap();

        });
    </script>
    <script>
        var examination_res = {
            series: [{
                name: 'Pass',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]

            }, {
                name: 'Fail',
                data: [12, 14, 17, 16, 11, 8, 13, 10, 6]
            }, {
                name: 'Not Attendent',
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '75%',
                    endingShape: 'rounded'
                },

            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6', 'Grade 7', 'Grade 8',
                    'Grade 9', 'Grade 10'
                ],
            },
            yaxis: {
                title: {
                    text: 'No Of Students',
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "" + val + ""
                    }
                }
            },

            legend :{
                markers: {
                    radius: 12,
                    offsetX: 0,
                    offsetY: 0
                },
            },


        };

        var chart = new ApexCharts(document.querySelector("#examination-result-chart"), examination_res);
        chart.render();
    </script>

    <script>
        var school_monthly_inc_exp = {
            series: [{
                    name: "Income",
                    data: [28, 29, 41, 33, 36, 32, 32, 33, 22, 11, 45, 55]
                },
                {
                    name: "Expense",
                    data: [12, 11, 14, 18, 23, 21, 17, 13, 13, 43, 12, 16]
                }
            ],
            chart: {
                height: 350,
                type: 'line',
                dropShadow: {
                    enabled: true,
                    color: '#000',
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 0.2
                },
                toolbar: {
                    show: false
                }
            },
            colors: ['#6bd098', '#fbc658'],
            dataLabels: {
                enabled: true,
            },
            stroke: {
                curve: 'smooth'
            },
            title: {
                text: '',
                align: 'left'
            },
            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            markers: {
                size: 1
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                title: {
                    text: 'Months'
                }
            },
            yaxis: {
                title: {
                    text: 'Amount In Hundred Thousand'
                },

            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                floating: true,
                offsetY: -25,
                offsetX: -5
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                    return "RS: " + val + " thousands"
                    }
                }
            },
        };

        var chart = new ApexCharts(document.querySelector("#school-monthly-income"), school_monthly_inc_exp);
        chart.render();

        // weekly income and expenses
        // var data = document.getElementById('school-weekly-income').getAttribute('data-id');

        // console.log(data);





        var school_weekly_inc_exp = {
            series: [{
                    name: "Income",
                    data: [28, 29, 33, 36, 32, 32, 33]
                },
                {
                    name: "Expense",
                    data: [12, 11, 14, 18, 17, 13, 13]
                }
            ],
            chart: {
                height: 350,
                type: 'line',
                dropShadow: {
                    enabled: true,
                    color: '#000',
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 0.2
                },
                toolbar: {
                    show: false
                }
            },
            colors: ['#6bd098', '#fbc658'],
            dataLabels: {
                enabled: true,
            },
            stroke: {
                curve: 'smooth'
            },
            title: {
                text: '',
                align: 'left'
            },
            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            markers: {
                size: 1
            },
            xaxis: {
                categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                title: {
                    text: 'Days'
                }
            },
            yaxis: {
                title: {
                    text: 'Amount In Thousand'
                },
                min : 0,
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                floating: true,
                offsetY: -25,
                offsetX: -5
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                    return "RS: " + val + " thousands"
                    }
                }
            },

        };



        var chart = new ApexCharts(document.querySelector("#school-weekly-income"), school_weekly_inc_exp);
        chart.render();


        // school yearly income and expenses

        var school_yearly_inc_exp = {
            series: [{
                    name: "Income",
                    data: [28, 29, 33, 36, 32, 32, 33]
                },
                {
                    name: "Expense",
                    data: [12, 11, 14, 18, 17, 13, 13]
                }
            ],
            chart: {
                height: 350,
                type: 'line',
                dropShadow: {
                    enabled: true,
                    color: '#000',
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 0.2
                },
                toolbar: {
                    show: false
                }
            },
            colors: ['#6bd098', '#fbc658'],
            dataLabels: {
                enabled: true,
            },
            stroke: {
                curve: 'smooth'
            },
            title: {
                text: '',
                align: 'left'
            },
            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            markers: {
                size: 1
            },
            xaxis: {
                categories: ['2015', '2016', '2017', '2018', '2019', '2020', '2021'],
                title: {
                    text: 'Years'
                }
            },
            yaxis: {
                title: {
                    text: 'Amount In Hundred Thousand'
                },
                min:0,
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                floating: true,
                offsetY: -25,
                offsetX: -5
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                    return "RS: " + val + " thousands"
                    }
                }
            },
        };

        var chart = new ApexCharts(document.querySelector("#school-yearly-income"), school_yearly_inc_exp);
        chart.render();
    </script>
    <script>
        // chart for enrolment details
        var std_enrolled = $('#std-enrol-details').attr('data-id');
        console.log(std_enrolled);
        var last5years = [];
        var std_enrolled_count = [];

        $.each(JSON.parse(std_enrolled) , function(Key ,value){

            last5years.push(Key);
            std_enrolled_count.push(value);
        });



        var student_enrolement = {
            series: [{
                name: "Student Enrolled",
                data: std_enrolled_count,
            }, ],
            chart: {
                height: 350,
                type: 'line',
                dropShadow: {
                    enabled: true,
                    color: '#000',
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 0.2
                },
                toolbar: {
                    show: false
                }
            },
            colors: ['#008ffb', '#545454'],
            dataLabels: {
                enabled: true,
            },
            stroke: {
                curve: 'smooth'
            },
            title: {
                text: '',
                align: 'left'
            },
            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            markers: {
                size: 1
            },
            xaxis: {
                categories: last5years,
                title: {
                    text: 'Years'
                }
            },
            yaxis: {
                title: {
                    text: 'No Of Students'
                },
                min: 0,
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                floating: true,
                offsetY: -25,
                offsetX: -5
            }
        };

        var chart = new ApexCharts(document.querySelector("#std-enrol-details"), student_enrolement);
        chart.render();
    </script>




    <script type="text/javascript">

        var classWiseStdAttd = $('#std-classwise-att').attr('data-id');

        // console.log(classWiseStdAttd);
        var classes_name = [];
        var present_array = [];
        var absent_array = [];
        var late_array = [];
        var leave_array = [];

        $.each(JSON.parse(classWiseStdAttd), function(key, value){
            present_array.push(value.present);
            absent_array.push(value.absent);
            late_array.push(value.late);
            leave_array.push(value.leave);
            classes_name.push(key);
        });


        var employees = {
            series: [{
                name: 'P',
                data: present_array,
            },
            {
                name: 'A',
                data: absent_array
            },
            {
                name: 'LV',
                data: late_array,
            },
            {
                name: 'LT',
                data: leave_array,
            }
            ],
            chart: {
                type: 'bar',
                height: 350,
                stacked: true,
                stackType: '100'
            },

            responsive: [{
                breakpoint: 480,

            }],
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: classes_name,
            },
            colors: ['#00e396', '#ff4560', '#feb019', '#008ffb'],
            legend: {
                position: 'right',
                markers:{
                    radius: 12,
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#std-classwise-att"), employees);
        chart.render();


    </script>


    <script>
        //    student attendencee percentage
        var activeStd = document.getElementById('std-atten-percentage').getAttribute('data-id').split(',');

        var std_att_series = [];
        var std_att_color = [];
        var labels = [];

        std_att_series.push(parseInt(activeStd[0]));
        std_att_series.push(parseInt(activeStd[1]));
        std_att_series.push(parseInt(activeStd[2]));
        std_att_series.push(parseInt(activeStd[3]));

        var arr = std_att_series.filter(function(n) {return n;});
        if(arr.length>0) {
            labels = ['P','A', 'LT', 'LV'];

           std_att_color = ['#00e396', '#ff4560', '#feb019', '#008ffb'];
        }
        else {
            labels = ['No Attendence Marked'];
            std_att_series = [100];
            std_att_color = ['#546E7A'];
        };


        var std_att_percentage = {
            series: std_att_series,
            chart: {
                type: 'donut',
            },
            labels: labels,
            responsive: [{
                breakpoint: 280,

            }],
            colors: std_att_color,
            legend: {
                position: 'bottom'
            }
        };
        var chart = new ApexCharts(document.querySelector("#std-atten-percentage"), std_att_percentage);
        chart.render();


        //  staff attendence

        var activeStf = document.getElementById('stf-atten-percentage').getAttribute('data-id').split(',');

            var stf_att_series = [];
            var stf_att_color = [];
            var labels = [];
        console.log('activest-stf',activeStf);
            stf_att_series.push(parseInt(activeStf[0]));
            stf_att_series.push(parseInt(activeStf[1]));
            stf_att_series.push(parseInt(activeStf[2]));
            stf_att_series.push(parseInt(activeStf[3]));

            var arr = stf_att_series.filter(function(n) {return n;});
            if(arr.length>0) {
                labels = ['P','A', 'LT', 'LV'];

                stf_att_color = ['#00e396', '#ff4560', '#feb019', '#008ffb'];
            }
            else {
                labels = ['No Attendence Marked'];
                stf_att_series = [100];
                stf_att_color = ['#546E7A'];
            };

        var staff_attend = {

            series: stf_att_series,
            chart: {

                type: 'donut',
            },
            labels: labels,
            responsive: [{
                breakpoint: 280,

            }],

            colors: stf_att_color,
            legend: {
                position: 'bottom'
            }
        };


        var chart = new ApexCharts(document.querySelector("#stf-atten-percentage"), staff_attend);
        chart.render();
    </script>
    <script>
        var totalEmployee = $('#stf-by-gender').attr("data-id").split(',');
        const maleEmployee = parseInt(totalEmployee[0]);
        const femaleEmployee = parseInt(totalEmployee[1]);
        var stf_bygender = {

            series: [maleEmployee , femaleEmployee],
            chart: {
                type: 'pie',
            },
            labels: ['Male', 'Female'],
            responsive: [{
                breakpoint: 280,

            }],

            colors: ['#03A2fE', '#ee4ba8'],
            legend: {
                position: 'bottom'
            }
        };

        var chart = new ApexCharts(document.querySelector("#stf-by-gender"), stf_bygender);
        chart.render();
    </script>
    <script>
        var totalStd = $('#std-by-gender').attr("data-id").split(',');
        const maleStd = parseInt(totalStd[0]);
        const femaleStd = parseInt(totalStd[1]);

        //do something with value;
        var std_bygender = {
            series: [maleStd , femaleStd],
            chart: {
                type: 'pie',
            },
            labels: ['Male', 'Female'],
            responsive: [{
                breakpoint: 280,

            }],

            colors: ['#03A2fE', '#ee4ba8'],
            legend: {
                position: 'bottom'
            }
        };

        var chart = new ApexCharts(document.querySelector("#std-by-gender"), std_bygender);
        chart.render();
    </script>
    <script>

        var std_classwise_strength = $('#std-classwise-strength').attr('data-id');

        // console.log(classWiseStdAttd);
        var classes_strength_series = [];
        var classes_strength_categories = [];


        $.each(JSON.parse(std_classwise_strength), function(key, value){

            classes_strength_series.push(value);
            classes_strength_categories.push(key);
        });

        var classwiseStdstrength = {
          series: [
          {
            name : 'student Strength',
            data : classes_strength_series,
          }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: classes_strength_categories,
        }
        };

        var chart = new ApexCharts(document.querySelector("#std-classwise-strength"), classwiseStdstrength);
        chart.render();
    </script>
    <script>
        var account_data = {
          series: [
          {
            name: "Gross Profit",
            data: [28, 12, 33, 66, 168, 32, 73]
          },
          {
            name: "Total Expenses",
            data: [182, 11, 67, 18, 87, 13, 53]
          }
        ],
          chart: {
          height: 250,
          type: 'line',
          dropShadow: {
            enabled: false,
            color: '#000',
            top: 10,
            left: 0,
            blur: 10,
            opacity: 0.2
          },
          toolbar: {
            show: false
          }
        },
        colors: ['#77B6EA', '#545454'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth'
        },

        grid: {
          borderColor: '#e7e7e7',
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },


        };

        var chart = new ApexCharts(document.querySelector("#account-chart"), account_data);
        chart.render();
    </script>
@endsection

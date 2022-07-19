@extends('layouts.master')
@section('title', 'Home')
@section('front_css')

@endsection
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
                        <h6 class="card-category  ">Staff Attendance</h6>
                    </div>
                    <div class="card-body" id="stf-atten-percentage" data-id="{{ $presentStaff }},{{ $absentStaff }},{{ $lateStff }},{{ $leaveStff }}">

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-category">Students Attendance</h6>
                    </div>
                    <div class="card-body" id="std-atten-percentage" data-id="{{ $presentStudent  }},{{ $absentStudent }},{{ $lateStudent }},{{ $leaveday_Std }}">

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-header T_ByGender">
                        <h6 class="card-category">Total Staff By Gender</h6>
                    </div>
                    <div class="card-body" id="stf-by-gender" data-id="{{ $total_male_employee }},{{ $total_female_employee }}">

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-header T_ByGender">
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
                <div class="nav-tabs-navigation nav-tabs-left col-sm-12 col-lg-12 col-md-12">
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

                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-category">
                                    Weekly Income and Expenses
                                </h6>
                            </div>


                            <div class="card-body" id="school-weekly-income" >

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="monthly-inc-exp" role="tabpanel" aria-expanded="false">
                      <div class="col-lg-12 col-sm-12 col-md-12" >
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-category">
                                    Monthly Income and Expenses
                                </h6>
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
                                <h6 class="card-category">
                                    Yearly Income and Expenses
                                </h6>
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
                            Monthly Gross Profit And Total Expense
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
                    <div class="card-body" id="std-enrol-details" data-enroledStd="{{ json_encode($total_std_enrolled) }}" data-withdrawalStd="{{ json_encode($total_std_withdrawal) }}">

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

                </div>
            </div>
            <div class="col-md-6">
                <div class="card ">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('front_script')
    <script src="{{ asset('js/home_script.js') }}"></script>
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

        var monthly_income = [<?php echo '"'.implode('","',$transactionslist['monthly']['income']).'"' ?>];
        var monthly_expense = [<?php echo '"'.implode('","',$transactionslist['monthly']['expense']).'"' ?>];
        
        var school_monthly_inc_exp = {
            series: [{
                    name: "Income",
                    data: monthly_income
                },
                {
                    name: "Expense",
                    data: monthly_expense
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
            colors: ['#00e396', '#feb019'],
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

      
        var js_array = [<?php echo '"'.implode('","',$transactionslist['weekly']['income']).'"' ?>];
        var js_array2 = [<?php echo '"'.implode('","',$transactionslist['weekly']['expense']).'"' ?>];

        var school_weekly_inc_exp = {
            series: [{
                    name: "Income",
                    data: js_array
                },
                {
                    name: "Expense",
                    data: js_array2
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
            colors: ['#00e396', '#feb019'],
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
                    return "RS: " + val + ""
                    }
                }
            },

        };



        var chart = new ApexCharts(document.querySelector("#school-weekly-income"), school_weekly_inc_exp);
        chart.render();


        // school yearly income and expenses


        @php 
        $new = [];
        foreach ($transactionslist['yearly']['income'] as $key => $value){
            
            $new[]=$key;


        }

        @endphp
        var yearly_income = [<?php echo '"'.implode('","',$transactionslist['yearly']['income']).'"' ?>];
        var alert = [<?php echo '"'.implode('","',$new).'"' ?>];
        var yearly_expense = [<?php echo '"'.implode('","',$transactionslist['yearly']['expense']).'"' ?>];
        var school_yearly_inc_exp = {
            series: [{
                    name: "Income",
                    data: yearly_income
                },
                {
                    name: "Expense",
                    data: yearly_expense
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
            colors: ['#00e396', '#feb019'],
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
                categories:alert,
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
        var std_enrolled = $('#std-enrol-details').attr('data-enroledStd');
        var std_withdraw = $('#std-enrol-details').attr('data-withdrawalStd');


        var last5years = [];
        var std_enrolled_count = [];
        var std_withdrawl_count = [];

        $.each(JSON.parse(std_enrolled) , function(Key ,value){

            last5years.push(Key)
            ;
            std_enrolled_count.push(value);

        });
        $.each(JSON.parse(std_withdraw) , function(Key ,value){
            std_withdrawl_count.push(value);
        });

        var student_enrolement = {
            series: [{
                name: "Enrolled Student",
                data: std_enrolled_count
            },
                {
                    name: "Withdrawl Student",
                    data: std_withdrawl_count
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
            colors: ['#77B6EA', '#545454'],
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
                    text: '',
                }
            },
            yaxis: {
                title: {
                    text: 'No of Student'
                },
                min : 0,
            },
            legend: {

                position: 'top',
                horizontalAlign: 'center',
                floating: true,
                offsetY: +5,
                offsetX: -5
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val
                    }
                }
            },

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
                name: 'LT',
                data: late_array,
            },
            {
                name: 'LV',
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
        var alignment_row = '';

        std_att_series.push(parseInt(activeStd[0]));
        std_att_series.push(parseInt(activeStd[1]));
        std_att_series.push(parseInt(activeStd[2]));
        std_att_series.push(parseInt(activeStd[3]));

        var arr = std_att_series.filter(function(n) {return n;});
        if(arr.length>0) {
            labels = ['P '+activeStd[0],'A '+activeStd[1], 'LT ' +activeStd[2], 'LV '+activeStd[3]];
            alignment_row = 'bottom';

            std_att_color = ['#00e396', '#ff4560', '#feb019', '#008ffb'];
        }
        else {
            labels = ['No Attendence Marked'];
            std_att_series = [100];
            alignment_row = 'bottom';

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
                position: alignment_row,
            }
        };
        var chart = new ApexCharts(document.querySelector("#std-atten-percentage"), std_att_percentage);
        chart.render();


        //  staff attendence

        var activeStf = document.getElementById('stf-atten-percentage').getAttribute('data-id').split(',');

            var stf_att_series = [];
            var stf_att_color = [];
            var labels = [];
            var alignment_row = '';
        console.log('activest-stf',activeStf);
            stf_att_series.push(parseInt(activeStf[0]));
            stf_att_series.push(parseInt(activeStf[1]));
            stf_att_series.push(parseInt(activeStf[2]));
            stf_att_series.push(parseInt(activeStf[3]));

            var arr = stf_att_series.filter(function(n) {return n;});
            if(arr.length>0) {
                labels = ['P '+activeStf[0],'A '+activeStf[1], 'LT '+activeStf[2], 'LV '+activeStf[3]];
                alignment_row = 'bottom';
                stf_att_color = ['#00e396', '#ff4560', '#feb019', '#008ffb'];
            }
            else {
                labels = ['No Attendence Marked'];
                stf_att_series = [100];
                alignment_row = 'bottom';
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
                position: alignment_row,
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

@extends('layouts.master')
@section('title', 'Home')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-money text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Revenue</p>
                                <p class="card-title">Rs 1,200
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar-o"></i>
                        Last day
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
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
                                <p class="card-category">Expense</p>
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
                        Last Day
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-4 col-md-2">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-money text-warning"></i>
                            </div>
                        </div>
                        <div class="col-8 col-md-10">
                            <div class="numbers">
                                <p class="card-category">Fees Receivable</p>
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
                        Year To Date
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-4 col-md-2">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-money text-success"></i>
                            </div>
                        </div>
                        <div class="col-8 col-md-10">
                            <div class="numbers">
                                <p class="card-category">Fees Recieved</p>
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
                        Year To Date
                    </div>
                </div>
            </div>
        </div>
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
                <div id="line-chart"></div>
                <table class="table table-sm border-bottom border-success">
                    <thead class="border  rounded">
                        <tr>
                            <th scope="col">Revenue</th>
                            <th scope="col">JAN</th>
                            <th scope="col">FEB</th>
                            <th scope="col">MAR</th>
                            <th scope="col">APR</th>
                            <th scope="col">MAY</th>
                            <th scope="col">JUN</th>
                            <th scope="col">JUL</th>
                            <th scope="col">AUG</th>
                            <th scope="col">SEP</th>
                            <th scope="col">OCT</th>
                            <th scope="col">NOV</th>
                            <th scope="col">DEC</th>
                        </tr>
                    </thead>
                    <tbody  class="border  rounded">
                        <tr>
                            <th scope="row">Tuition Fee</th>
                            <td>Rs 30,200</td>
                            <td>Rs 39,600</td>
                            <td>Rs 20,200</td>
                            <td>Rs 39,600</td>
                            <td>Rs 30,200</td>
                            <td>Rs 39,600</td>
                            <td>Rs 20,200</td>
                            <td>Rs 20,200</td>
                            <td>Rs 39,600</td>
                            <td>Rs 30,200</td>
                            <td>Rs 39,600</td>
                            <td>Rs 20,200</td>
                        </tr>
                        <tr>
                            <th scope="row">Hostel Fee</th>
                            <td>Rs 130,200</td>
                            <td>Rs 139,600</td>
                            <td>Rs 120,200</td>
                            <td>Rs 139,600</td>
                            <td>Rs 130,200</td>
                            <td>Rs 139,600</td>
                            <td>Rs 120,200</td>
                            <td>Rs 120,200</td>
                            <td>Rs 139,600</td>
                            <td>Rs 130,200</td>
                            <td>Rs 139,600</td>
                            <td>Rs 120,200</td>
                        </tr>

                    </tbody>
                    <tbody  class="border-bottom border-success rounded">
                    <tr>
                        <th scope="row">Total Revenue</th>
                        <td>Rs 330,200</td>
                        <td>Rs 339,600</td>
                        <td>Rs 320,200</td>
                        <td>Rs 339,600</td>
                        <td>Rs 330,200</td>
                        <td>Rs 339,600</td>
                        <td>Rs 320,200</td>
                        <td>Rs 320,200</td>
                        <td>Rs 339,600</td>
                        <td>Rs 330,200</td>
                        <td>Rs 339,600</td>
                        <td>Rs 320,200</td>
                    </tr>

                    </tbody>
                    <thead class="border  rounded">
                    <tr>
                        <th scope="col">Expense</th>
                        <th scope="col">JAN</th>
                        <th scope="col">FEB</th>
                        <th scope="col">MAR</th>
                        <th scope="col">APR</th>
                        <th scope="col">MAY</th>
                        <th scope="col">JUN</th>
                        <th scope="col">JUL</th>
                        <th scope="col">AUG</th>
                        <th scope="col">SEP</th>
                        <th scope="col">OCT</th>
                        <th scope="col">NOV</th>
                        <th scope="col">DEC</th>
                    </tr>
                    </thead>
                    <tbody  class="border  rounded">
                    <tr>
                        <th scope="row">Basic Pay</th>
                        <td>Rs 130,200</td>
                        <td>Rs 139,600</td>
                        <td>Rs 120,200</td>
                        <td>Rs 139,600</td>
                        <td>Rs 130,200</td>
                        <td>Rs 139,600</td>
                        <td>Rs 120,200</td>
                        <td>Rs 120,200</td>
                        <td>Rs 139,600</td>
                        <td>Rs 130,200</td>
                        <td>Rs 139,600</td>
                        <td>Rs 120,200</td>
                    </tr>
                    <tr>
                        <th scope="row">Income Tax</th>
                        <td>Rs 10,200</td>
                        <td>Rs 19,600</td>
                        <td>Rs 10,200</td>
                        <td>Rs 19,600</td>
                        <td>Rs 10,200</td>
                        <td>Rs 19,600</td>
                        <td>Rs 10,200</td>
                        <td>Rs 10,200</td>
                        <td>Rs 19,600</td>
                        <td>Rs 10,200</td>
                        <td>Rs 19,600</td>
                        <td>Rs 10,200</td>
                    </tr>

                    </tbody>
                    <tbody  class="border-bottom border-success rounded">
                    <tr>
                        <th scope="row">Total Expense</th>
                        <td>Rs 230,200</td>
                        <td>Rs 239,600</td>
                        <td>Rs 220,200</td>
                        <td>Rs 239,600</td>
                        <td>Rs 230,200</td>
                        <td>Rs 239,600</td>
                        <td>Rs 220,200</td>
                        <td>Rs 220,200</td>
                        <td>Rs 239,600</td>
                        <td>Rs 230,200</td>
                        <td>Rs 239,600</td>
                        <td>Rs 220,200</td>
                    </tr>

                    </tbody>
                    <tbody class="border-bottom  border-info rounded" >

                    <tr class="border-bottom  border-info rounded">
                        <th scope="row">Gross Profit</th>
                        <td>Rs 130,200</td>
                        <td>Rs 139,600</td>
                        <td>Rs 120,200</td>
                        <td>Rs 139,600</td>
                        <td>Rs 130,200</td>
                        <td>Rs 139,600</td>
                        <td>Rs 120,200</td>
                        <td>Rs 120,200</td>
                        <td>Rs 139,600</td>
                        <td>Rs 130,200</td>
                        <td>Rs 139,600</td>
                        <td>Rs 120,200</td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>

    </div>

</div>
@endsection

@section('front_script')
<script src="{{asset('js/home_script.js')}}"></script>

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

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

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
    var options = {
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

        var chart = new ApexCharts(document.querySelector("#line-chart"), options);
        chart.render();
</script>
@endsection

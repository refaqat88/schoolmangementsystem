<style type="text/css">

    .div-hover-cus.active{ color:tomato !important;}
    .div-hover-cus.active .text-white{ color:tomato !important;}

</style>


<div class="content row">
    <div class="col-sm-2 ml-2">
        <div class="row " id="dashboarttabs">

            <div class="col-md-12 ">
                <div class="card bg-secondary dashboarttabs mb-3 widget-chart text-white card-sizes div-hover-cus {{($tabsType=='statistics')?'active':''}}" data-type="statistics" data-id="{{$user->id}}">
                    <div class="card-body icon-wrapper" >

                        <h6 >Statistics<span class="icon-wrapper-bg   vert-hor-center">
                            <i class="fa fa-bar-chart fa-lg float-right text-white "></i>
                            </span>
                        </h6>


                    </div>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="card bg-secondary dashboarttabs mb-3 widget-chart text-white card-sizes div-hover-cus {{($tabsType=='attendance')?'active':''}}"  data-type="attendance" data-id="{{$user->id}}">
                    <div class="card-body icon-wrapper" >

                        <h6 >Attendance<span class="icon-wrapper-bg   vert-hor-center">
                                <i class="fa fa-calendar-check-o fa-lg float-right text-white "></i>
                            </span>
                        </h6>


                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card bg-secondary dashboarttabs  mb-3 widget-chart text-white card-sizes div-hover-cus  {{($tabsType=='exams')?'active':''}}"  data-type="exams" data-id="{{$user->id}}">
                    <div class="card-body icon-wrapper" >
                        <h6 >Examination<span class="icon-wrapper-bg  vert-hor-center">
                                <i class="fa fa-star-half-o fa-lg float-right text-white "></i>
                            </span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card bg-secondary dashboarttabs  mb-3 widget-chart text-white card-sizes div-hover-cus {{($tabsType=='schedule')?'active':''}}"  data-type="schedule" data-id="{{$user->id}}">
                    <div class="card-body icon-wrapper"   >
                        <h6>Timetable
                            <span class="icon-wrapper-bg  vert-hor-center">
                                <i class="fa fa-calendar fa-lg float-right text-white "></i>
                             </span>
                        </h6>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card bg-secondary dashboarttabs  mb-3 widget-chart text-white card-sizes div-hover-cus {{($tabsType=='homework')?'active':''}}"  data-type="homework" data-id="{{$user->id}}">
                    <div class="card-body icon-wrapper" >
                        <h6 >Diary
                            <span class="icon-wrapper-bg  vert-hor-center">
                                <i class="fa fa-clipboard fa-lg float-right text-white "></i>
                            </span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card bg-secondary dashboarttabs  mb-3 widget-chart text-white card-sizes div-hover-cus {{($tabsType=='reports')?'active':''}}"  data-type="reports" data-id="{{$user->id}}">
                    <div class="card-body icon-wrapper"  >
                        <h6 >Reports
                            <span class="icon-wrapper-bg  vert-hor-center">
                                <i class="fa fa-files-o fa-lg float-right text-white"></i>
                                </span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card bg-secondary dashboarttabs mb-3 widget-chart text-white card-sizes div-hover-cus {{($tabsType=='payments')?'active':''}}"  data-type="payments" data-id="{{$user->id}}">
                    <div class="card-body icon-wrapper"  >
                        <h6 >Payments
                            <span class="icon-wrapper-bg  vert-hor-center">
                                <i class="fa fa-money fa-lg float-right text-white "></i>
                                </span>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card bg-secondary  dashboarttabs mb-3 widget-chart text-white card-sizes div-hover-cus   {{($tabsType=='activities')?'active':''}}" data-type="activities" data-id="{{$user->id}}">
                    <div class="card-body icon-wrapper"  >
                        <h6 >Activities
                            <span class="icon-wrapper-bg  vert-hor-center">
                                <i class="fa fa-tasks fa-lg float-right text-white "></i>
                                </span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>








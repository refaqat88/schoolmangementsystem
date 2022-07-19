

    @include('studentParentPortal.tabs.tabsidebar')

    <div class="col-sm-9">
        <h4>Student Statistics</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-category">
                                <h4 class="ml-3"> Student examination results </h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-123"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                                                <p class="card-category">Total Due's</p>
                                                <p class="card-title">Rs 1,000
                                                </p><p>
                                            </p></div>
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
                        <div class="card">
                            <div class="card-category">
                                <h4 class="ml-3"> Attendance </h4>
                            </div>
                            <div class="card-body">
                                <div id="std-attendance" data-id="{{ $P  }},{{ $A }},{{ $L }},{{ $LV }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








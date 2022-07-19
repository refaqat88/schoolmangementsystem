 <div class="row">
        <div class="col-md-12">
            
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title text-muted font-weight-bold">{{$emplolye->name}}</h4>
                </div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-sm-9">
                            <button class="btn btn-outline-choice btn-round  btn-sm pull-right viewschedulepayroll "
                                type="button" data-id="{{$emplolye->id}}"   >
                                Schedule Pay
                            </button>


                             <button class="btn btn-outline-choice btn-round  btn-sm pull-right advancesalarypayrol "
                                type="button" data-id="{{$emplolye->id}}"   >
                                
                                Advance Salary
                            </button>

                        </div>
                        <div class="col-sm-3">
                            <div class="dropdown col-sm-12">
                                <button class="dropdown-toggle btn btn-secondary btn-round"
                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    New Transaction
                                </button>
                                <div class="dropdown-menu dropdown-menu-right"
                                    aria-labelledby="dropdownMenuButton">
                                    <input type="hidden" name="hidden_id" id="hidden_id" value="{{$emplolye->id}}">
                                    <a class="dropdown-item generatebill" data-id="{{$emplolye->id}}" href="#"  >Generate Pay Bill</a>
                                    <a class="dropdown-item makepayment"  data-id="{{$emplolye->id}}" href="#" >Make payment</a>
                                   <!--  <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#adjustfees">Adjust Pay</a> -->
                                    <a class="dropdown-item empstatement" data-id="{{$emplolye->id}}">Statement</a>
                                </div>
                            </div>

                            <div class="col-sm-12 pull-right">
                                <br>
                                <h5 class="pull-right"><b>PRs {{$emplolye->balancedue()}}</b></h5>
                            </div>
                            <div class="col-sm-12 pull-right">

                                <p class="pull-right text-warning"><b>Open</b></p>
                            </div>
                            <div class="col-sm-12 pull-right">
                                <br>
                                <h5 class="pull-right"><b>PRs 0.00</b></h5>
                            </div>
                            <div class="col-sm-12 pull-right">

                                <p class="pull-right text-danger"><b>Overdue</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="row">
                    <div class="col-md-12">

                        <div class="nav-tabs-navigation nav-tabs-left">
                            <div class="nav-tabs-wrapper">
                                <ul id="tabs" class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tottranstab"
                                            role="tab" aria-expanded="true">Transaction List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#billdetailstab"
                                            role="tab" aria-expanded="false">Billing Details</a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        @include('accountPortal.partial.payrolltransaction')

                     

                    </div> <!-- end col-md-12 -->
                </div> <!-- end   ad row -->

            </div>
            
        </div>
    </div> <!-- end row -->
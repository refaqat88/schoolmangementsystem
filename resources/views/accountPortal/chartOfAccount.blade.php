 @extends('layouts.master')
 @section('title', 'Income')
 @section('content') 
<style type="text/css">
    #diarytable_wrapper .dt-buttons{ 
        text-align: right;
        margin-bottom: 10px;     
       
    }
    #diarytable_wrapper .dt-buttons button{ 
        background-color :#fff !important; 
        border: 0 !important; 
    }
</style>
 <div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="my-tab-content" class="tab-content ">
                        <div class="tab-pane active" id="allexams" role="tabpanel" aria-expanded="true">
                            <div class="row">
                                <div class="col-sm-12">
                                        <div class=" ">
                                            <div class="card-header ">
                                                <h4 class="card-title">Chart of Accounts</h4>
                                            </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="">
                                                    
                                                    <div class="card-body">
                                                        <div class="row bor-sep">
                                                            <div class="col-sm-12 pull-right">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <h3></h3>
                                                                    </div>
                                                                    <div class="col-sm-2"></div>
                                                                    <div class="col-sm-4 pull-right">
                                        <!--                                <button type="button" class="btn btn-outline-choice btn-sm btn-round">Run Report</button>-->
                                                                        <button type="button" class="btn btn-secondary btn-round float-right" id="clickaccountingModal"   >New</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <h6 class="card-title">List of Accounts</h6>
                                                        </div>
                                                        

                                                    </div><!-- end content-->
                                                </div><!--  end card  -->
                                                <!--Account modal Modal -->
                                                <div class="modal fade" id="accountingModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header justify-content-center">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </button>
                                                                <h5 class="title title-up">Account</h5>
                                                            </div>
                                                          
                                                            <form id="FormAccountstatment" action="{{route('addaccountstatement')}}" enctype="multipart/form-data" method="post">
                                                                <input type="hidden" id="acc_Id" name="acc_Id" value="">
                                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                                <div class="modal-body row">
                                                                    <div class="form-row col-sm-12">
                                                                      <div class="form-group col-sm-6">
                                                                        <label for="account_type">Account Type</label>
                                                                            <select class="selectpicker account-type" id="acc_type_Id" name="acc_type_Id" data-container="" data-size="7" data-style="btn btn-secondary" title="Select account type"  data-hide-disabled="true">
                                                                                @foreach($Account_types  as $key=>$val )
                                                                                <option data-description="{{$val->acc_Desc}}" data-id="{{$val->acc_type_Code}}" value="{{$val->acc_type_Id}}" name="">{{$val->acc_Type}}</option>
                                                                                @endforeach
                                                                              
                                                                            </select>
                                                                            <div class=" add-div-error  acc_type_Id errorsss"></div>

                                                                      </div>
                                                                      <div class="form-group col-sm-6">
                                                                        <label for="inputname">Name</label>
                                                                        <input type="text" name="acc_Name" class="form-control" id="acc_Name" placeholder="">
                                                                        <div class="add-div-error acc_Name errorsss"></div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="form-row col-sm-12">
                                                                        <div class="form-group col-sm-6">
                                                                          <label for="detailtype">*Account Code</label>
                                                                            <input type="text" class="form-control" id="acc_Code" placeholder="1101" name="acc_Code">
                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                          <label for="inputdescription">Description</label>
                                                                          <input type="text" class="form-control" name="description" id="description" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row col-sm-12">
                                                                        <br>
                                                                        <div class="form-group col-sm-6">
                                                                            <br><br>
                                                                            <textarea class="form-control" id="acc_Desc" placeholder="" rows="8"> 
                                                                            </textarea>
                                                                        </div>
                                                                        
                                                                        <div class="form-group col-sm-6">
                                                                            <br>
                                                                            <div class="form-check-inline">
                                                                                <input type="checkbox" id="inlineCheckbox1" value="option1" name="isparent">
                                                                                <label class="form-check-label" for="inlineCheckbox1">Is sub-account</label>
                                                                            </div>
                                                                            <select  disabled="true" id="acc_parent" class="selectpicker account-type" data-size="7" data-style="btn btn-secondary" name="acc_parent"  title ="Select Parent"data-hide-disabled="true" data-live-search="true" >
                                                                                

                                                                               

                                                                                 @foreach($acc_parents  as $acc_parent)
                                                                                <option  data-id="{{$acc_parent->acc_Code }}" data-description="{{$acc_parent->description }}" value="{{$acc_parent->acc_Id}}">{{$acc_parent->acc_Name}}</option>
                                                                              
                                                                                @endforeach
                                                                              </select>
                                                                               <div class=" add-div-error  acc_parent errorsss"></div>



                                                                            <!-- <script>
                                                                                $(document).ready(function() {
                                                                                    $('.mdb-select').materialSelect();
                                                                                });
                                                                            </script> -->
                                                                            <div class="row">
                                                                                <div class="form-group col-sm-6">
                                                                                    <label for="inputbalance">Balance</label>
                                                                                    <input type="text" class="form-control" id="acc_Balance" placeholder="" name="acc_Balance">
                                                                                  </div>
                                                                                  <div class="form-group col-sm-6">
                                                                                    <label for="input-as-of">as of</label>
                                                                                    <input name="acc_Date" type="date" class="form-control" id="acc_Date" placeholder="">
                                                                                  </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                
                                                                </div>
                                                           
                                                            <!--</div>-->
                                                            <div class="modal-footer">
                                                                <div class="">
                                                                    <button type="submit" class="btn btn-round btn-sm btn-outline-success "  >Save</button>
                                                                </div>
                                                                <div class="">
                                                                    <button type="button" class="btn   btn-round btn-sm btn-outline-danger " data-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </div>
                                                             </form>
                                                            </div>
                                                        </div>
                                                    </div><!-- end account modal -->


                                                    @include('accountPortal.partial.chartOfAccount')
                                                     

                                                </div> <!-- end col-md-12 -->
                                               
                                            </div>  <!-- end row -->
                                        </div>
                                     
                                   
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


 <div class="modal fade" id="show-chartedAccount-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up" id="modal-title">View Account</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h6 class="card-title">Transaction list</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="toolbar">
                                                                <div class="form-group col-sm-2 select-wizard">
                                                                    <select class="selectpicker" data-size="7" data-style="btn btn-sm btn-outline-secondary btn-round" title="Filter" >
                                                                        <option value="1">Account</option>
                                                                        <option value="3">Student</option>
                                                                        <option value="2">Employee</option>
                                                                        <option value="3">Supplier</option>
                                                                    </select>
                                                                </div>
                                                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                                                            </div>
                                                            <table id="transactionsdatatable" class=" table-hover custom_border" cellspacing="0" width="100%">
                                                                <thead class="table-secondary">
                                                                <tr>
                                                                    <th class="disabled-sorting">Date</th>
                                                                    <th class="disabled-sorting">
                                                                        Type</th>
                                                                    <th>No.</th>
                                                                    <th class="disabled-sorting">Due date</th>
                                                                    <th class="text-right disabled-sorting">Balance due</th>
                                                                    <th class="text-right disabled-sorting">Total</th>
                                                                    <th class="disabled-sorting">Status</th>
                                                                    <th class="disabled-sorting text-center">Actions</th>
                                                                </tr>
                                                                </thead>

                                                                <tbody>
                                                                <tr>
                                                                    <td>12/08/2020</td>
                                                                    <td>
                                                                        Fee Bill</td>
                                                                    <td>1001</td>
                                                                    <td>22/08/2020</td>
                                                                    <td class="text-right">&#8360 2,250</td>
                                                                    <td class="text-right">&#8360 2,250</td>
                                                                    <td class="text-muted text-success-cus font-weight-bold">Open</td>
                                                                    <td class="text-center">
                                                                        <div class=" ">
                                                                            <div class="dropdown">
                                                                                <button class="dropdown-toggle btn btn-link  btn-sm " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    Manage
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#editguardian" >Receive payment</a>
                                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#printfeechalan" >Print</a>
                                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#editguardian" >Send reminder</a>
                                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#editguardian" >View/Edit</a>
                                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#editguardian" >Delete</a>
                                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#editguardian" >Void (Adjust)</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div><!-- end content-->
                                                    </div><!--  end card  -->
                                                </div> <!-- end col-md-12 -->
                                            </div>
                                        </div>







                                        {{--                                        <div class="modal-body row">--}}
{{--                                            <div class="col-sm-6">--}}
{{--                                                <div class="row">--}}

{{--                                                    <div class="form-group col-sm-6 ">--}}
{{--                                                        <label>Name</label>--}}
{{--                                                        <p class="ad" id="show-acc_Name">No Value</p>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-group col-sm-6 ">--}}
{{--                                                        <label>Account Type</label>--}}
{{--                                                        <p class="ad" id="show-acc_type_Id">No Value</p>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}

{{--                                                <div class="row">--}}
{{--                                                    <div class="form-group col-sm-6 ">--}}
{{--                                                        <label>Balance</label>--}}
{{--                                                        <p class="ad" id="show-acc_Balance">No Value</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-sm-6 ">--}}
{{--                                                        <label>as of Date</label>--}}
{{--                                                        <p class="ad" id="show-acc_Date">No Value</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}


{{--                                            </div>--}}
{{--                                            <div class="divider"></div>--}}
{{--                                            <div class="col-sm-6  ex1">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class=" col-sm-6 select-wizard">--}}
{{--                                                        <label>Account Code</label>--}}
{{--                                                        <p class="ad" id="show-acc_Code">No Value</p>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-sm-6">--}}
{{--                                                        <label>Description</label>--}}
{{--                                                        <p class="ad" id="show-description">No Value</p>--}}
{{--                                                    </div>--}}

{{--                                                    <div class=" col-sm-6 select-wizard acc_parent">--}}
{{--                                                        <label>Parent Account</label>--}}
{{--                                                        <p class="ad" id="show-acc_parent">No Value</p>--}}
{{--                                                    </div>--}}




{{--                                                </div>--}}
{{--                                            </div>--}}


{{--                                        </div>--}}

 
                                       

                                       
                                        <div class="modal-footer">
                                            
                                            <div class="">
                                                <button type="button" class="btn btn-round btn-danger btn-link" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

@endsection
@section('front_script')
<script type="text/javascript" src="{{ asset('js/accountportal.js')}}"></script>  
@endsection

 @extends('layouts.master')
 @section('title', 'PayRoll')
 @section('content')

 <style type="text/css">
    .modal { overflow: auto !important;   }
    .salary-slip{ margin: 15px; }
    .empDetail { width: 100%; text-align: left; border: 2px solid black; border-collapse: collapse; table-layout: fixed; }  
    .head { margin: 10px; margin-bottom: 50px; width: 100%; }
    .companyName { text-align: right; font-size: 25px; font-weight: bold; }
    .salaryMonth {  text-align: center; }
    .table-border-bottom { border-bottom: 1px solid; }
    .table-border-right { border-right: 1px solid;}
    .myBackground { padding-top: 10px; text-align: left; border: 1px solid black; height: 40px; }
    .myAlign { text-align: center; border-right: 1px solid black; }
    .myTotalBackground { padding-top: 10px; text-align: left; background-color: #EBF1DE; border-spacing: 0px;}
    .align-4 { width: 25%; float: left; }
    .tail { margin-top: 35px; }
    .align-2 { margin-top: 25px; width: 50%; float: left;}
    .border-center { text-align: center; }
    .border-center th, .border-center td { border: 1px solid black; }
    th, td { padding-left: 6px; }
    .add-div-error{ color: red; }
    .labels{ display: inline-block; padding-top: 3px; position: absolute; top: 10px; cursor: pointer; }
 </style>
  
    
<div class="content" id="loadContent">
   
    @include('accountPortal.partial.payroll_detail_ajax')

</div> <!-- end content -->

@include('accountPortal.modals.print_payroll')

{{--  Payrol schedule Model --}}
  
<form id="FormpaySchedule" method="POST" action="{{url('add/Pay/statement')}}"  enctype="multipart/form-data">
 
 @include('accountPortal.modals.pay_schedule')

<div class="mt-3  modal fade" id="overtime" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm ">
     
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-id="overtime" >
                    <i class="fa fa-remove"></i>
                </button>
                <h5 class="title title-up">Add Overtime Pay</h5>
            </div>
            <div class="modal-body ">
                <div class='row'>
                    <div class='col-lg-4 col-sm-12 form-group'>
                        <label>Overtime Rate (in PRs) / Hour</label>
                        <input type="number"  class="form-control" placeholder="" name="overtime_rate" id="overtime_rate" number="true"
                               number="true" >
                    </div>
                    <div class='col-lg-4 col-sm-12 form-group'>
                        <label>Working Hours / Day</label>
                        <input type="number" class="form-control" placeholder="" name="overtime_hours" id="overtime_hours" number="true"
                               number="true" >
                    </div>
                    <div class='col-lg-4 col-sm-12 form-group'>
                        <label>No of Days</label>
                        <input type="number" class="form-control" placeholder="" name="overtime_days"   id="overtime_days"  number="true"    >
                    </div>
                    <input type="hidden" class="total_income" name="overtime_total"  id="overtime_total"   data-id="overtime">
                </div>

            </div>

            <!--</div>-->
            <div class="modal-footer">
                <div class="">
                    <button type="submit" class="btn btn-success  btn-link model_close_save_overtime"  >Save</button>
                </div>
                <div class="">
                    <button type="button" data-dismiss="modal"  class="btn btn-danger   btn-link">Cancel</button>
                </div>
            </div>
        </div>
        
    </div>
</div>

<div class="modal fade mt-3" id="vacation" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div id="allowances_vacation">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-id="vacation" aria-label="Close">
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up">Add Vacation Pay</h5>
                </div>
                <div class="modal-body ">
                    <div class='row'>
                        <div class='col-lg-4 col-sm-12 form-group'>
                            <label>Pay Rate (in PRs) / Day</label>
                            <input type="number" class="form-control calculate_vacation" placeholder="" id="vacation_Pay_Rate" name="vacation_Pay_Rate" number="true"
                                   number="true">
                        </div>
                        <div class='col-lg-4 col-sm-12 form-group'>
                            <label>No of Days</label>
                            <input type="number" class="form-control calculate_vacation" placeholder="" name="vacation_No_of_Days" id="vacation_No_of_Days" number="true"
                                   number="true">
                        </div>
                        <div class='col-lg-4 col-sm-12 form-group'>
                            <label>Amount </label>
                            <input type="text" class="form-control total_income" readonly placeholder="" id="vacation_total" data-id="vacation" name="vacation_total" number="true"/>

                        </div>

                    </div>

                </div>

                <!--</div>-->
                <div class="modal-footer">
                    <div class="">
                        <button type="submit" class="btn btn-success model_close_save_vacation  btn-link">Save</button>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-danger  btn-link"  data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3 modal fade" id="bonus" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div id="allowances_bonus">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-id="bonus" >
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up">Add Bonus</h5>
                </div>
                <div class="modal-body ">
                    <div class='row'>
                        <div class='col-lg-6 col-sm-12'>
                            <label>Choose Value</label>
                            <select class="selectpicker" data-size="7" name="bonus_type" id="bonus_type"  data-style="btn btn-secondary"
                                    title="Select Billing Scgedule">
                                <option value="" disabled >Select</option>
                                <option value="1" selected>% of Base Pay</option>
                                <option value="2">Amount</option>
                            </select>
                        </div>
                        <div class='col-lg-6 col-sm-12 form-group'>
                            <label>Amount </label>

                            <input type="text" class="form-control" placeholder="" name="bonus_amout" id="bonus_amout" number="true"
                                   number="true">
                             
                             <input type="hidden" class="form-control total_income"  placeholder="" id="bonus_total" data-id="bonus" name="bonus_total" number="true"/>
                                    
                        </div>

                    </div>

                </div>

                <!--</div>-->
                <div class="modal-footer">
                    <div class="">
                        <button type="submit" class="btn btn-success  btn-link model_close_save_bonus" data-id="bonus">Save</button>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-danger  btn-link"  data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3 modal fade" id="commission" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div id="allowances_commission">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-id="commission">
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up">Add Commission</h5>
                </div>
                <div class="modal-body ">
                    <div class='row'>
                        <div class='col-lg-6 col-sm-12'>
                            <label>Choose Value</label>
                            <select class="selectpicker"  name="commission_type" id="commission_type"  data-size="7" data-style="btn btn-secondary"
                                    title="Select Billing Scgedule">
                                <option value="" disabled >Select</option>
                                <option value="1" selected>% of Base Pay</option>
                                <option value="2">Amount</option>
                            </select>
                        </div>
                        <div class='col-lg-6 col-sm-12 form-group'>
                            <label>Amount </label>
                            <input type="text" class="form-control" placeholder="" name="commission_amout" id="commission_amout" number="true" >

                             
                            <input type="hidden" class="form-control total_income" id="commission_total" data-id="commission" name="commission_total" />
                                
                        </div>

                    </div>

                </div>

                <!--</div>-->
                <div class="modal-footer">
                    <div class="">
                        <button type="submit" class="btn btn-success  btn-link model_close_save_commission" data-id="commission" >Save</button>
                    </div>
                    <div class="">
                        <button type="button" data-dismiss="modal" class="btn btn-danger  btn-link">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3 modal fade" id="medical" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div id="allowances_medical">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-id="medical" >
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up">Add Medical Allowance</h5>
                </div>
                <div class="modal-body ">
                    <div class='row'>
                        <div class='col-lg-6 col-sm-12'>
                            <label>Choose Value</label>
                            <select class="selectpicker" data-size="7" name="medical_type" id="medical_type" data-style="btn btn-secondary"
                                    title="Select Billing Scgedule">
                                <option value="" disabled >Select</option>
                                <option value="1" selected>% of Base Pay</option>
                                <option value="2">Amount</option>
                            </select>
                        </div>
                        <div class='col-lg-6 col-sm-12 form-group'>
                            <label>per pay period </label>
                             
                            <input type="text" class="form-control" placeholder="" name="medical_amout" id="medical_amout" number="true" >

                           
                            <input type="hidden" class="form-control total_income" id="medical_total" data-id="medical" name="medical_total" />

                        </div>

                    </div>

                </div>

                <!--</div>-->
                <div class="modal-footer">
                    <div class="">
                        <button type="submit" class="btn btn-success  btn-link model_close_save_medical"  data-id="medical" >Save</button>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-danger  btn-link"  data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3 modal fade" id="house" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div id="allowances_house">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-id="house">
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up">Add House Allowance</h5>
                </div>
                <div class="modal-body ">
                    <div class='row'>
                        <div class='col-lg-6 col-sm-12'>
                            <label>Choose Value</label>
                            <select class="selectpicker" name="house_type" id="house_type" data-size="7" data-style="btn btn-secondary"
                                    title="Select Billing Scgedule">
                                <option value="" disabled >Select</option>
                                <option value="1" selected>% of Base Pay</option>
                                <option value="2">Amount</option>
                            </select>
                        </div>
                        <div class='col-lg-6 col-sm-12 form-group'>
                            <label>per pay period </label>
                            
                            <input type="text" class="form-control" placeholder="" name="house_amout" id="house_amout" number="true" >

          
                            <input type="hidden" class="form-control total_income" id="house_total" data-id="house" name="house_total" />
                                   
                        </div>

                    </div>

                </div>

                <!--</div>-->
                <div class="modal-footer">
                    <div class="">
                         <button type="submit" class="btn btn-success  btn-link model_close_save_house"  data-id="house" >Save</button>
     
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-danger  btn-link" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3 modal fade" id="convayance" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div id="allowances_convayance">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-id="convayance">
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up">Add Conveyance Allowance</h5>
                </div>
                <div class="modal-body ">
                    <div class='row'>
                        <div class='col-lg-6 col-sm-12'>
                            <label>Choose Value</label>
                            <select class="selectpicker" name="convayance_type" id="convayance_type" data-size="7" data-style="btn btn-secondary"
                                    title="Select Billing Scgedule">
                                <option value="" disabled >Select</option>
                                <option value="1" selected>% of Base Pay</option>
                                <option value="2">Amount</option>
                            </select>
                        </div>
                        <div class='col-lg-6 col-sm-12 form-group'>
                            <label>per pay period </label>
                            
                            <input type="text" class="form-control" placeholder="" name="convayance_amout" id="convayance_amout" number="true" >
           
                            <input type="hidden" class="form-control total_income" id="convayance_total" data-id="convayance" name="convayance_total" />       
                        </div>

                    </div>

                </div>

                <!--</div>-->
                <div class="modal-footer">
                    <div class="">
                        <button type="submit" class="btn btn-success  btn-link model_close_save_convayance" data-id="convayance">Save</button>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-danger  btn-link" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3 modal fade" id="education" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div id="allowances_education">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-id="education">
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up">Add Education Allowance</h5>
                </div>
                <div class="modal-body ">
                    <div class='row'>
                        <div class='col-lg-6 col-sm-12'>
                            <label>Choose Value</label>
                            <select class="selectpicker" name="education_type" id="education_type" data-size="7" data-style="btn btn-secondary"
                                    title="Select Billing Scgedule">
                                <option value="" disabled >Select</option>
                                <option value="1" selected>% of Base Pay</option>
                                <option value="2">Amount</option>
                            </select>
                        </div>
                        <div class='col-lg-6 col-sm-12 form-group'>
                            <label>per pay period </label>
                            
                            <input type="text" class="form-control" placeholder="" name="education_amout" id="education_amout" number="true" >

                        <input type="hidden" class="form-control total_income" id="education_total" data-id="education" name="education_total" />       
                        

                        </div>

                    </div>

                </div>

                <!--</div>-->
                <div class="modal-footer">
                    <div class="">
                        <button type="submit" class="btn btn-success  btn-link model_close_save_education" data-id="education">Save</button>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-danger  btn-link" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3 modal fade" id="utility" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div id="allowances_utility">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-id="utility" >
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up">Add Utility Allowance</h5>
                </div>
                <div class="modal-body ">
                    <div class='row'>
                        <div class='col-lg-6 col-sm-12'>
                            <label>Choose Value</label>
                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary"
                                    title="Select Billing Scgedule"  name="utility_type" id="utility_type">
                                <option value="" disabled >Select</option>
                                <option value="1" selected>% of Base Pay</option>
                                <option value="2">Amount</option> 
                            </select>
                        </div>
                        <div class='col-lg-6 col-sm-12 form-group'>
                            <label>per pay period </label>
                             <input type="text" class="form-control" placeholder="" name="utility_amout" id="utility_amout" number="true" >

                            <input type="hidden" class="form-control total_income" id="utility_total" data-id="utility" name="utility_total" />     

                        </div>

                    </div>

                </div>

                <!--</div>-->
                <div class="modal-footer">
                    <div class="">
                        <button type="submit" class="btn btn-success  btn-link model_close_save_utility"  >Save</button>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-danger  btn-link" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3 modal fade" id="arear" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
         
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-id="arear">
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up">Add Arrears</h5>
                </div>
                <div class="modal-body ">
                    <div class='row'>
                        <div class='col-lg-12 col-sm-12 form-group'>
                            <label>Arrears Amount </label>
                            <input type="text" class="form-control total_income" placeholder="" name="arear_total"  data-id="arear" id="arear_total" number="true">
                        </div>

                    </div>

                </div>

                <!--</div>-->
                <div class="modal-footer">
                    <div class="">
                        <button type="submit" class="btn btn-success model_close_save_arear  btn-link" data-id="arear" >Save</button>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-danger  btn-link" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        
    </div>
</div>
                            
<div class=" mt-3 modal fade" id="dearall" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div id="allowances_dearall">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-id="dearall">
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up">Add Dearness Allowance</h5>
                </div>
                <div class="modal-body ">
                    <div class='row'>
                        <div class='col-lg-6 col-sm-12'>
                            <label>Choose Value</label>
                            <select class="selectpicker"  name="dearall_type" id="dearall_type" data-size="7" data-style="btn btn-secondary"
                                    title="Select Billing Scgedule">
                                <option value="" disabled >Select</option>
                                <option value="1" selected>% of Base Pay</option>
                                <option value="2">Amount</option>
                            </select>
                        </div>
                        <div class='col-lg-6 col-sm-12 form-group'>
                            <label>per pay period </label>
                           
                            <input type="text" class="form-control" placeholder="" name="dearall_amout" id="dearall_amout" number="true" >
                            <input type="hidden" class="form-control total_income" id="dearall_total" data-id="dearall" name="dearall_total" />    
                        </div>

                    </div>

                </div>

                <!--</div>-->
                <div class="modal-footer">
                    <div class="">
                        <button type="submit" class="btn btn-success  btn-link model_close_save_dearall" data-id="dearall" >Save</button>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-danger  btn-link" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="mt-3 modal fade" id="advance" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div id="allowances_advance">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-id="advance">
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up">Grant advance salary</h5>
                </div>
                
               
                <div class="modal-body ">
                    <div class="row">
                        <div class='col-lg-4 col-sm-12 form-group'>

                            <select id="schedule_advanc" name="schedule_advanc" class="selectpicker">
                        

                            </select>

                           <div class="add-div-error schedule_advancerrorsss"></div>
                        </div>


                    </div>
                    <div class='row'>

                        <input type="hidden" name="advance_id" id="advance_id" value="">
                        <div class='col-lg-4 col-sm-12 form-group'>
                            <label>Advance Amount </label>
                            <input type="text" class="form-control" placeholder="" name="advance_amount"  id="sadvance_amount" number="true"  readonly  value="">
                        </div>
                        <div class='col-lg-4 col-sm-12 form-group'>
                            <label>No of Installments </label>
                            <input type="text" class="form-control"  placeholder="" name="Installments" id="sInstallments"  value=""  readonly>
                        </div>
                        <div class='col-lg-4 col-sm-12 form-group'>
                            <label>Amount per pay period </label>

                            <input type="text" data-id="advance" class="form-control deduction_total" placeholder="" id="samount_per_pay_peroid"  name="amount_per_pay_peroid" readonly number="true"  value="">


                            <input type="hidden" name="advance_total" id="sadvance_total" value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="">
                        <button type="submit" class="btn btn-success  btn-link deductions_advance_salary_close" >Save</button>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-danger  btn-link" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

                            

<div class="mt-3 modal fade" id="taxe" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div id="allowances_taxe">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-id="taxe">
                        <i class="fa fa-remove"></i>
                    </button>
                    <h5 class="title title-up">Add Income Tax</h5>
                </div>
                <div class="modal-body ">
                    <div class='row'>
                        <div class='col-lg-6 col-sm-12'>
                            <label>Choose Value</label>
                            <select class="selectpicker" data-size="7" data-style="btn btn-secondary"
                                    title="Select Billing Scgedule" name="taxe_type" id="taxe_type">
                                <option value="" disabled >Select</option>
                                <option value="1" selected>% of Base Pay</option>
                                <option value="2">Amount</option>
                            </select>
                        </div>
                        <div class='col-lg-6 col-sm-12 form-group'>
                            <label>per pay period </label>
                            
                            <input type="text" class="form-control" placeholder="" name="taxe_amout" id="taxe_amout" number="true" >

                            <input type="hidden" class="form-control deduction_total" id="taxe_total" data-id="taxe" name="taxe_total" /> 

                        </div>

                    </div>

                </div>

                <!--</div>-->
                <div class="modal-footer">
                    <div class="">
                        <button type="submit" class="btn btn-success  btn-link model_close_save_taxe" data-id="taxe" >Save</button>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-danger  btn-link" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                            <div class="mt-3 modal fade" id="providant" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close" data-id="providant">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up">Add General Provident Fund</h5>
                                        </div>
                                        <div class="modal-body ">
                                          <div class="row">
                                              <div class="col-sm-6">
                                                  <h6 class="">Employee Share</h6>
                                                  <div class='row'>
                                                      <div class='col-lg-6 col-sm-12'>
                                                          <label>Choose Value</label>
                                                          <select class="selectpicker" data-size="7" data-style="btn btn-secondary"
                                                                  title="Select Billing Scgedule">
                                                              <option value="" disabled >Select</option>
                                                              <option value="1" selected>% of Base Pay</option>
                                                              <option value="2">Amount</option>
                                                          </select>
                                                      </div>
                                                      <div class='col-lg-6 col-sm-12 form-group'>
                                                          <label>per pay period</label>
                                                          <input type="text" class="form-control" placeholder="" name="houseallow" number="true"
                                                                 number="true">
                                                      </div>

                                                  </div>
                                              </div>
<!--                                              <div class="divider-auto"></div>-->
                                              <div class="col-sm-6">
                                                  <h6 class="">Employer Share</h6>
                                                  <div class='row'>
                                                      <div class='col-lg-6 col-sm-12'>
                                                          <label>Choose Value</label>
                                                          <select class="selectpicker" data-size="7" data-style="btn btn-secondary"
                                                                  title="Select Billing Scgedule">
                                                              <option value="" disabled >Select</option>
                                                              <option value="1" selected>% of Base Pay</option>
                                                              <option value="2">Amount</option>
                                                          </select>
                                                      </div>
                                                      <div class='col-lg-6 col-sm-12 form-group'>
                                                          <label>per pay period</label>
                                                          <input type="text" class="form-control" placeholder="" name="houseallow" number="true"
                                                                 number="true">
                                                      </div>

                                                  </div>
                                              </div>
                                          </div>
                                        </div>

                                        <!--</div>-->
                                        <div class="modal-footer">
                                            <div class="">
                                                <button type="submit" class="btn btn-success  btn-link" data-dismiss="modal">Save</button>
                                            </div>
                                            <div class="">
                                                <button type="button" class="btn btn-danger  btn-link">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            


<div class="mt-3 modal fade" id="gratuity" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                            <button type="button" class="close" data-id="gratuity">
                                                <i class="fa fa-remove"></i>
                                            </button>
                                            <h5 class="title title-up">Add Gratuity</h5>
                                        </div>
                                        <div class="modal-body ">
                                            <div class='row'>

                                                <div class='col-lg-3 col-sm-12 form-group'>
                                                    <label>Gross pay (in PRs)</label>
                                                    <input type="text" class="form-control" placeholder="30,000" name="houseallow" number="true"
                                                           number="true">
                                                </div>
                                                <div class='col-lg-3 col-sm-12 form-group'>
                                                    <label>pay per day (in PRs)</label>
                                                    <input type="text" class="form-control" placeholder="1,153" name="houseallow" number="true"
                                                           number="true">
                                                </div>
                                                <div class='col-lg-3 col-sm-12 form-group'>
                                                    <label>Years of service </label>
                                                    <input type="text" class="form-control" placeholder="7" name="houseallow" number="true"
                                                           number="true">
                                                </div>
                                                <div class='col-lg-3 col-sm-12 form-group'>
                                                    <label>YTD Gratuity (in PRs)</label>
                                                    <input type="text" class="form-control" placeholder="242,307" name="houseallow" number="true"
                                                           number="true">
                                                </div><br>

                                            </div>
                                            <div class="">
                                                <div class="col-sm-12 form-check col-lg-12  ">
                                                    <label class="form-check-label ">
                                                        <input class="form-check-input  " type="checkbox" name="optionCheckboxes" data-toggle="modal"
                                                               data-target="#">
                                                        <span class="form-check-sign "></span>
                                                        Check if status is inactive
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <!--</div>-->
                                        <div class="modal-footer">
                                            <div class="">
                                                <button type="submit" class="btn btn-success  btn-link" data-dismiss="modal">Save</button>
                                            </div>
                                            <div class="">
                                                <button type="button" class="btn btn-danger  btn-link">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
</form>




<!-- end extra pay allowances -->







        {{--  Adjust Payrol  Model --}}
        @include('accountPortal.modals.payadjusts_payment')

        {{--  Generate Payrol schedule Model --}}
        @include('accountPortal.modals.paygenerate_schedule')

        {{--  paymake Payment Payrol schedule Model --}}
        @include('accountPortal.modals.paymake_payment')

        {{--  Statement  Payrol  Model --}}
        
        @include('accountPortal.modals.emp_statements') 
        
        {{--  Advance Salary   Payrol  Model --}}
        @include('accountPortal.modals.advanceSalary')



             
    @endsection
    
    @section('front_script')

    <script type="text/javascript" src="{{ asset('js/payroll.js')}}"></script>
 

    <script src="{{ asset('js/print/printThis.js') }}"></script>
    <script>
        $("#print-pay-state").click(function(){
            $(".print_pay_statement").printThis({
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('#transactionsdatatable').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],

                "columnDefs": [
                    { "orderable": false, "targets": [1,3,4,5,6] }
                ],

                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search",
                }

            });

            var table = $('#transactionsdatatable').DataTable();

            // Edit record
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function () {
                alert('You clicked on Like button');
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#adjustpaytable').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],

                "columnDefs": [
                    { "orderable": false, "targets": [0,2,3,4,5] }
                ],

                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search",
                }

            });

            var table = $('#adjustpaytable').DataTable();

            // Edit record
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function () {
                alert('You clicked on Like button');
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#payemptable').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],

                "columnDefs": [
                    { "orderable": false, "targets": [0,1,4,5,6] }
                ],

                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search",
                }

            });

            var table = $('#payemptable').DataTable();

            // Edit record
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function () {
                alert('You clicked on Like button');
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#alltransactionsdatatable').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],

                "columnDefs": [
                    { "orderable": false, "targets": [0,1,4,5,6] }
                ],

                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search",
                }

            });

            var table = $('#alltransactionsdatatable').DataTable();

            // Edit record
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function () {
                alert('You clicked on Like button');
            });
        });
    </script>
   @endsection
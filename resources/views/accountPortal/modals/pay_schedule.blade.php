<div class="modal fade " id="schedulepay" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" >
    <input type="hidden" name="page" id="page" value="detail">
    <div class="modal-dialog modal-xl mb-3">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-remove"></i>
                </button>
                <h5 class="title title-up">Payroll Schedule</h5>
            </div>
            <div class="modal-body ">
                <div class="row">
                    <div class="col-sm-4 bor">
                        <div class="row">
                            <h6 class="col-sm-12">Employee Details</h6>
                            <div class="form-group col-sm-12 col-lg-12">
                            </div>
                            <div class="form-group col-sm-12 col-lg-6">
                                <label>Personal Number</label>
                                <input type="text" class="form-control" readonly="readonly" placeholder=""  id="personal_No" name="pno" number="true"
                                       number="true">
                            </div>
                            <div class="form-group col-sm-12 col-lg-6">
                                <label class="text-center">Hiring Date</label>
                                <input type="text" class="form-control" readonly="readonly" id="appt_Date" placeholder=""  name="hiredate" number="true" number="true">
                            </div>
                            <div class="form-group col-sm-12 col-lg-6">
                                <label>Name</label>
                                <input type="text" class="form-control" id="name" readonly="readonly" value="" placeholder="" name="fname" number="true"
                                       number="true">
                            </div>
                             
                            <div class="form-group col-sm-12 col-lg-6">
                                <label class="text-center">National Identifier</label>
                                <input type="number" class="form-control" id="cnic" placeholder="" name="cnic"
                                       number="true" number="true">
                            </div>

                            <div class="form-group col-sm-12 col-lg-6">
                                <label class="text-center">Designation</label>
                                <input type="text" class="form-control" id="designation" value="designation" readonly="readonly" placeholder="" name="desig"
                                       number="true" number="true">
                            </div>


                            <div class="form-group col-sm-12 col-lg-6">
                                <label class="text-center">Email</label>
                                <input type="email" class="form-control" placeholder="" id="email" name="email"
                                       number="true" number="true">
                            </div>
                            <div class="form-group col-sm-12 col-lg-6">
                                <label class="text-center">Mobile Phone No</label>
                                <input type="number" class="form-control" id="phone" placeholder="" name="mobileno"
                                       number="true" number="true">
                            </div>


 
                        </div>
                    </div>
 
                    <div class="col-sm-7 bor-sep ml-3">
                        <div class="row">
                            <h6 class="col-sm-12">Pay Schedule Details</h6>
                            <div class="form-group col-sm-12 col-lg-12 select-wizard">
                                <label class="">Billing Frequency</label>
                                <select class="selectpicker" data-size="7" data-style="btn btn-secondary"
                                        title="Choose Schedule" id="bill_Freq" name="bill_Freq">
                                    <option value="" disabled selected>Choose Frequency</option>

                                    @php
                                    $Bil_Fre_payroll = config('constants.Bil_Fre_payroll')@endphp

                                    @foreach($Bil_Fre_payroll as $key=>$val)
                                    <option value="{{$key}}">{{$val}}</option>
                                    @endforeach

                                  
                                    

                                </select>
                                 <div class="add-div-error bill_Freq errorsss"></div>
                            </div>

                            <div class="form-group col-sm-12 col-lg-4">
                                <label for="start">Starting Date:</label>

                                <input class="form-control" type="date" id="issue_date" name="issue_date" 
                                        >
                                <div class="add-div-error issue_date errorsss"></div>
                            </div>
                            <div class="form-group col-sm-12 col-lg-4">
                                <label for="start">End of the pay period</label>

                                <input class="form-control" type="date"  name="due_Date" id="due_Date" value=""
                                     >
                                      <div class="add-div-error due_Date errorsss"></div>
                            </div>
                            <div class="form-group col-sm-12 col-lg-4">
                                <label for="start">Next Pay Day:</label>
                                <input class="form-control" type="date"  id="next_pay_date" name="next_pay_date"  >
                                <div class="add-div-error next_pay_date errorsss"></div>
                            </div>


                            <div class="form-group col-sm-12 col-lg-4  select-wizard">
                                <label class="">Payment Method</label>
                                <select name="payment_Mode" id="payment_Mode" class="selectpicker" data-size="7" data-style="btn btn-round btn-secondary" title="Choose payment method">
                                  <option value="" disabled selected>Choose payment method</option>                  
                                  @foreach($PaymentType as $key=>$val)
                                  
                                  @php

                                  $payment = $val->acc_Name;
                                  if($val->acc_Name=='Cash on Hand'){

                                    $payment = 'Cash';

                                  }
                                  if($val->acc_Name=='Cash at Bank'){

                                     $payment = 'Bank';

                                  }
                                  
                                  @endphp
                                    <option value="{{$val->acc_Id}}">{{$payment}}</option>
                                                                        
                                  @endforeach
                                </select>
                                  <div class="add-div-error payment_Mode errorsss"></div>
                            </div>

                            
                            <div class="form-group col-sm-12 col-lg-4 select-wizard">
                                <label>Credit Account</label>
                                <select class="selectpicker" name="acc_Id" id="acc_Id"  data-size="7" data-style="btn btn-secondary"
                                        title="Deposit Account">
                                      
                                </select>
                                 <div class="add-div-error acc_Id errorsss"></div>
                            </div>

                            <div class="form-group col-sm-12 col-lg-4 select-wizard" >
                                <div id="account_account" style="display: none; "   >
                                    <label>Deposite Account</label>
                                    <select class="selectpicker" name="account"  disabled id="account"  data-size="7" data-style="btn btn-secondary"
                                    title="Account">
                                           
                                    @foreach($accountsdata as $key=>$val)
                                  
                                  
                                  
                                    <option value="{{$val->bank_acc_Id}}">{{$val->bank_acc_No}}</option>
                                                                        
                                  @endforeach
                                  
                                          
                                    </select>
                                     <div class="add-div-error account errorsss"></div>
                                </div>
                            </div>





                            <div class="form-group col-sm-12 col-lg-4">
                                <label style="font-size:12px">Billing Rate (in PKrs) /Hour</label>
                                <input type="text" class="form-control" placeholder="" name="billing_rate" id="billing_rate">
                            </div>

                            <div class="form-group col-sm-12 col-lg-4">
                                <label>Working Hours / Day</label>
                                <input type="text" class="form-control" placeholder="" name="working_hours" id="working_hours" />
                                      
                            </div>
                            <div class="form-group col-sm-12 col-lg-4">
                                <label>No of Days / Week</label>
                                <input type="text" class="form-control" placeholder="" name="no_of_days" id="no_of_days" number="true"
                                       number="true">
                            </div>
                            <div class="form-group col-sm-12 col-lg-4">
                                <label>Incr Rate (%age)</label>
                                <input type="text" class="form-control" placeholder="" id="incr_rate" name="incr_rate" number="true"
                                       number="true">
                            </div>
                            <div class="form-group col-sm-12 col-lg-4">
                                <label>Basic Pay</label>
                                <input type="text" class="form-control" placeholder="" id="basic_pay" name="basic_pay" number="true"
                                       number="true">
                                <div class="add-div-error basic_pay errorsss"></div>       
                                       
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row bor-sep">
                    <h6 class="col-sm-12">Allowances</h6><hr>
                    <div class="col-sm-12 form-check col-lg-3  mb-4">
                        <label class="form-check-label">
                            <input class="form-check-input allowancesmodel"   id="check_overtime" type="checkbox" name="allowances[overtime]"  data-mtarget="overtime" >
                            <span class="form-check-sign "></span>
                           
                        </label>
                        <span  class="allowancesmodel labels"  data-mtarget="overtime" data-labels="overtime"> Over Time</span>                        
                    </div>

                    <div class="col-sm-12 form-check col-lg-3  mb-4">
                        
                        <label class="form-check-label">
                            <input class="form-check-input allowancesmodel" id="check_vacation" type="checkbox" name="allowances[vacation]"  data-mtarget="vacation">
                            <span class="form-check-sign "></span>
                        </label>
                        <span  class="allowancesmodel labels"  data-mtarget="vacation" data-labels="vacation">Vacation Pay</span>

                    </div>

                    <div class="col-sm-12 form-check col-lg-3  mb-4">
                        <label class="form-check-label">
                            <input class="form-check-input  allowancesmodel" id="check_bonus"  type="checkbox"   name="allowances[bonus]" data-mtarget="bonus">
                            <span class="form-check-sign "></span>
                            
                        </label>
                        <span  class="allowancesmodel labels"  data-mtarget="bonus" data-labels="bonus"> Bonus</span>        

                    </div>



                    <div class="col-sm-12 form-check col-lg-3  mb-4 ">
                        <label class="form-check-label">
                            <input class="form-check-input allowancesmodel "  id="check_commission" type="checkbox"  name="allowances[commission]"  data-mtarget="commission" >
                            <span class="form-check-sign "></span>
                            
                        </label>
                        <span  class="allowancesmodel labels"  data-mtarget="commission" data-labels="commission"> Commission</span> 
                    </div>


                    <div class="col-sm-12 form-check col-lg-3 mb-4 ">
                        <label class="form-check-label">
                            <input class="form-check-input allowancesmodel" id="check_medical" type="checkbox"  name="allowances[medical]"   ria-haspopup="true" data-mtarget="medical">
                            <span class="form-check-sign "></span>
                           
                        </label>
                         <span  class="allowancesmodel labels"  data-mtarget="medical" data-labels="medical">  Medical Allowance</span> 
                    </div>



                    <div class="col-sm-12 form-check col-lg-3 mb-4 ">
                        <label class="form-check-label">
                            <input class="form-check-input allowancesmodel" id="check_house" type="checkbox"  name="allowances[house]"  data-mtarget="house" >
                            <span class="form-check-sign "></span>
                            
                        </label>
                          <span  class="allowancesmodel labels"  data-mtarget="house" data-labels="house">House Allowance</span>

                    </div>



                    <div class="col-sm-12 form-check col-lg-3 mb-4 ">
                        <label class="form-check-label">
                            <input class="form-check-input allowancesmodel" id="check_convayance" type="checkbox"  name="allowances[convayance]" data-mtarget="convayance"  >
                            <span class="form-check-sign"></span>
                            
                        </label>
                         <span  class="allowancesmodel labels"  data-mtarget="convayance" data-labels="convayance">Conveyance Allowance</span>
                    </div>

                    <div class="col-sm-12 form-check col-lg-3 mb-4 ">
                        <label class="form-check-label">
                            <input class="form-check-input allowancesmodel" id="check_education" type="checkbox"  name="allowances[education]" name="optionCheckboxes"  data-mtarget="education"  >
                            <span class="form-check-sign "></span>
                           
                        </label>
                         <span  class="allowancesmodel labels"  data-mtarget="education" data-labels="education"> Education Allowance</span>
                    </div>


                    <div class="col-sm-12 form-check col-lg-3 mb-4 ">
                        <label class="form-check-label">
                            <input class="form-check-input allowancesmodel" id="check_utility" type="checkbox"  name="allowances[utility]"  data-mtarget="utility" >
                            <span class="form-check-sign "></span>
                            
                        </label>
                         <span  class="allowancesmodel labels"  data-mtarget="utility" data-labels="utility"> Utility Allowance</span>


                    </div>
                    <div class="col-sm-12 form-check col-lg-3 mb-4 ">
                        <label class="form-check-label">
                            <input class="form-check-input allowancesmodel" type="checkbox"  id="check_arear" type="checkbox"  name="allowances[arear]"  data-mtarget="arear" >
                            <span class="form-check-sign "></span>
                            
                        </label>
                        <span  class="allowancesmodel labels"  data-mtarget="arear" data-labels="arear"> Arrears</span>
                    </div>
                    <div class="col-sm-12 form-check col-lg-3 mb-4 ">
                        <label class="form-check-label">
                            <input class="form-check-input allowancesmodel"  id="check_dearall" type="checkbox"  name="allowances[dearall]" data-mtarget="dearall"  >
                            <span class="form-check-sign "></span>
                            
                        </label>
                        <span  class="allowancesmodel labels"  data-mtarget="dearall" data-labels="dearall"> Dearness Allowance</span>
                    </div>

                </div>
                <div class="row bor-sep">
                    <h6 class="col-sm-12">Deductions</h6><hr>
                    <div class="col-sm-12 form-check col-lg-3 mb-4  ">
                        <label class="form-check-label">
                            <input class="form-check-input allowancesmodel " type="checkbox" id="check_advance"  name="deductions[advance]" data-mtarget="advance"   >
                            <span class="form-check-sign "></span>
                           
                        </label>
                        <span  class="allowancesmodel labels"  data-mtarget="advance" data-labels="advance">  Advance Salary</span>

                    </div>

                    <div class="col-sm-12 form-check col-lg-3 mb-4  ">
                        <label class="form-check-label">
                            <input class="form-check-input allowancesmodel" type="checkbox" id="check_taxe"  name="deductions[taxe]" data-mtarget="taxe"  >
                            <span class="form-check-sign "></span>
                            
                        </label>

                        <span  class="allowancesmodel labels"  data-mtarget="taxe" data-labels="taxe"> Income Tax</span>

                    </div>



                    <div class="col-sm-12 form-check col-lg-3 mb-4 ">
                        <label class="form-check-label">
                            <input class="form-check-input allowancesmodel " type="checkbox" name="optionCheckboxes" data-mtarget="providant" >
                            <span class="form-check-sign "></span>
                            
                        </label>
                         <span  class="allowancesmodel labels"  data-mtarget="providant" data-labels="providant"> General Provident Fund</span>
                    </div>

                    <div class="col-sm-12 form-check col-lg-3 mb-4 ">
                        <label class="form-check-label">
                            <input class="form-check-input allowancesmodel" type="checkbox" name="optionCheckboxes" data-mtarget="gratuity" >
                            <span class="form-check-sign "></span>
                            
                        </label>
                         <span  class="allowancesmodel labels"  data-mtarget="gratuity" data-labels="gratuity">Gratuity</span>
                    </div>

                </div>
                <div class=" row ">
                    <div class="col-sm-12 form-check col-lg-12  text-right">
                        <label class="form-check-label text-right font-weight-bold border-bottom">
                            Basic Pay: <span id="basic_payt" class='text-right ml-2 font-weight-normal '></span>
                        </label>
                    </div>
                    <div class="col-sm-12 form-check col-lg-12  text-right">
                        <label class="form-check-label text-right font-weight-bold  text-success-cus ">
                            Allowances: <span class='text-right ml-2 font-weight-normal ' id="Allowancess"> </span>
                        </label>
                    </div>
                    <div class="col-sm-12 form-check col-lg-12  text-right">
                        <label class="form-check-label text-right font-weight-bold border-bottom ">
                            Gross Pay: <span  id="Gross_Pay" class='text-right ml-2 font-weight-normal '></span>
                        </label>
                    </div>
                    <div class="col-sm-12 form-check col-lg-12 text-right">
                        <label class="form-check-label text-right font-weight-bold  text-warning">

                            Deductions: <span id="DEDUCTIONS" class='text-right ml-2 font-weight-normal'></span>
                        </label>
                    </div>

 
                    <div class="col-sm-12 form-check col-lg-12  text-right ">
                        <label class="form-check-label text-right font-weight-bold dbl-bor-bottom">
                            Net Pay: <span id="Net_Pay" class='text-right ml-2 font-weight-normal '></span>
                            <input type="hidden" name="pay_total" value="" id="pay_total">
                        </label>
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <input id="id" value="" name="id" type="hidden">
                <div class="">
                    <button type="submit" class="btn btn-success btn-link" >Save</button>
                </div>
                <div class="">
                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
                </div>
            </div>
           



        </div>
    </div>

</div>

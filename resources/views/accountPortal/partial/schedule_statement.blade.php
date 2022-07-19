@php
  
  $accounttution = '';
  foreach ($Account_types_income as $Account_type){
              
    if($Account_type->acc_Name=='Tuition Fee'){
      $accounttution = $Account_type;
    }  
  }
@endphp
<div class="modal fade nopadd" id="schedulefee" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-xl modal-dialog">
    <div class="modal-content">
      <form id="FormAddstudentSchedule" action="{{route('add_student_schedule')}}"
          enctype="multipart/form-data" method="post" >
          <input type="hidden" name="optionCheckboxes{{$accounttution->acc_Id}}"  value="on">
          <input type="hidden" name="accounts[{{$accounttution->acc_Id}}]['id']"  value="{{$accounttution->acc_Id}}">
          <input type="hidden" name="schedule_id"  value="" id="schedule_id">                      
          @foreach ($Account_types_income as $Account_type)

          @if($Account_type->acc_Name!='Tuition Fee')
          <div class="mt-3 modal fade" id="admissionsfeeadd_{{$Account_type->acc_Id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-sm">
              <div class="modal-content">
                <div class="modal-header justify-content-center">
                  <button type="button" class="close" data-id="admissionsfeeadd_{{$Account_type->acc_Id}}">
                    <i class="fa fa-remove"></i>
                  </button>
                  <input type="hidden" name="accounts[{{$Account_type->acc_Id}}]['id']" value="{{$Account_type->acc_Id}}">
                  <h5 class="title title-up">Add {{$Account_type->acc_Name}}</h5>
                </div>
                <div class="modal-body ">
                  <div class="row" id="form_{{$Account_type->acc_Id}}">
                    <div class='col-lg-6 col-sm-12'>
                      <label>Choose Fee Type</label>
                      <select class="selectpicker" name="accounts[{{$Account_type->acc_Id}}]['bill_Freq']" data-size="7" data-style="btn btn-round btn-secondary" id="modelcheck_{{$Account_type->acc_Id}}"
                              title="Select Billing Schedule">
                        <option value="" disabled >Choose type</option>
                         
                        <?php
                         $Bil_Fre_fees = config('constants.Bil_Fre_fees')
                        ?>
                           
                        @foreach($Bil_Fre_fees as $key=>$val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach

                      </select>
                    </div>
                    <div class='col-lg-6 col-sm-12 form-group'>
                      <label>Amount per pay period </label>
                      <input type="number" class="form-control total_income" placeholder="" name="accounts[{{$Account_type->acc_Id}}]['amount']" id="total_income{{$Account_type->acc_Id}}" data-text="{{$Account_type->acc_Name}}" data-id="{{$Account_type->acc_Id}}"    >
                    </div>

                  </div>

                </div>
                <div class="modal-footer">
                  <div class="">
                    <button type="button "   data-id="{{$Account_type->acc_Id}}" class="btn btn-secondary btn-round btn-sm model_close_save  btn-link" >Save</button>
                  </div>
                    <div class="divider"></div>
                  <div class="">
                    <button type="button" class="btn btn-danger close_admission btn-round btn-sm btn-link" data-id="admissionsfeeadd_{{$Account_type->acc_Id}}" >Cancel</button>                        
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif
          @endforeach
          

          <input type="hidden"  name="std_Id" value="{{$student->id}}">
          <div class="modal-header justify-content-center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-remove"></i>
            </button> 
            <h5 class="title title-up">Fee Schedule</h5>
          </div>

      <div class="modal-body ">
        <div class="row ">
          <div class="col-sm-12 col-lg-4 bor">
            <div class="row">
              <h6 class="col-sm-12">Student Details</h6>
              <div class="form-group col-sm-12 col-lg-6">
                <label>Admission Number</label>
                <input type="text" class="form-control" readonly="readonly" value="{{$student->studentinfo?$student->studentinfo->admission->adm_Number:''}}" placeholder="GMS-2021-211" name="pno"   >
              </div>
              <div class="form-group col-sm-12 col-lg-6">
                <label class="text-center">Admission Date</label>
                <input type="text" class="form-control" value="{{$student->studentinfo?$student->studentinfo->admission->adm_Date:''}}"  readonly="readonly" placeholder="February 21, 2021"
                       name="hiredate" >
              </div>
              <div class="form-group col-sm-12 col-lg-6">
                <label>Full Name</label>
                <input type="text" class="form-control" readonly="readonly" placeholder="{{$student->name}}" name="fname"  >
              </div>
              <div class="form-group col-sm-12 col-lg-6">
                <label>Guardian Name</label>
                @if($gardFather) 
                
                <input type="text" class="form-control" readonly="readonly" value="{{$gardFather?$gardFather->name:''}}"  placeholder="Guardian Nam" name="fname" >

                  @else

                  <input type="text" class="form-control" readonly="readonly" value=""  placeholder="Guardian Nam" name="fname" >
                   

                  @endif

              </div>
              <div class="form-group col-sm-12 col-lg-6">
                <label class="text-center">Class</label>
                <input type="text" class="form-control" value="@php 
                                    $classse= $student->studentinfo?$student->studentinfo->class->class:''; echo $classse; @endphp " readonly="readonly" placeholder="Seven" name="desig"
                       >
              </div>
              <div class="form-group col-sm-12 col-lg-6">
              <label>Roll No.</label>
              <input type="text" class="form-control" readonly="readonly" placeholder="21" name="fname" value="@php 
                                    $role_number= $student->studentinfo?$student->studentinfo->role_number:''; echo $role_number; @endphp"   number="true"
                     number="true">
            </div>
              <div class="form-group col-sm-12 col-lg-6">
                <label class="text-center">Email</label>
                <input type="email" class="form-control" value="{{$student->email}}" placeholder="abc@gmail.com" name="email"
                       >
              </div>
              <div class="form-group col-sm-12 col-lg-6">
                <label class="text-center">Mobile Phone No</label>
                <input type="number" class="form-control" value="{{$student->studentinfo?$student->studentinfo->contact_emergency->emer_cont_No:''}}" placeholder="+92 300 xxxx xxx" name="mobileno"
                       number="true" number="true">
              </div>

            </div>


          </div>
          <!--                    <div class="divider-auto mt-5"></div>-->
          <div class="col-sm-12 col-lg-7 bor-sep ml-3">
            <div class="row">
              <h6 class="col-sm-12">Fee Schedule Details</h6>
              <div class="form-group col-sm-12 col-lg-6 select-wizard">
                <label class="">Billing Frequency</label>
                <select class="selectpicker" data-size="7" required="required" data-style="btn btn-round btn-secondary"
                        title="Choose Frequency" name="accounts[{{$accounttution->acc_Id}}]['bill_Freq']" id="bill_Freq">
                  <option value="" disabled selected>Choose billing Frequency</option>
                  <?php $Billing_Frequency = config('constants.Billing_Frequency') ?>
                  @foreach($Billing_Frequency as $key=>$val)
                    <option value="{{$key}}">{{$val}}</option>
                  @endforeach
                </select> 
              </div>

      <input type="hidden" name="accounts[{{$accounttution->acc_Id}}]['amount']" id="TuitionFee" value="@php $tuition_fee= $student->studentinfo?$student->studentinfo->class->tuition_fee:''; echo $tuition_fee; @endphp
          ">

              <div class="form-group col-sm-12 col-lg-6">
                <label>Tuition Fee / Month</label>
                <input type="text" value="@php 
                                    $tuition_fee= $student->studentinfo?$student->studentinfo->class->tuition_fee:''; echo $tuition_fee; @endphp" class="form-control" placeholder="2500" name="basicpay" number="true" readonly 
                       number="true" id="Tuition_Fee_per">
              </div>
              


              <div class="form-group col-sm-12 col-lg-6  select-wizard">
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


              <div class="form-group col-sm-12 col-lg-6 select-wizard">
                <label class="">Deposit Account</label>
                <select  name="acc_Id" id="acc_Id" class="selectpicker " data-size="7" data-style="btn btn-round btn-secondary "
                        title="Choose account">
                  <option value="" disabled selected>Choose account</option>
                
                </select>
                 <div class="add-div-error acc_Id errorsss"></div>
              </div>
                

              <div class="form-group col-sm-12 col-lg-4">
                <label for="start">Next Fee Day:</label>
                <input name="st_Date" class="form-control " type="date" id="next_fee_Date" name="next_fee_Date" value="" >
                <div class="add-div-error next_fee_Date errorsss"></div>

              </div>
            
               <div class="form-group col-sm-12 col-lg-4 select-wizard">
                <label class="">Term</label>
                <select class="selectpicker" id="Term" data-size="7" data-style="btn btn-round btn-secondary" name="term"
                        title="Choose term">
                  <option value="" disabled selected>Choose term</option>
                  <?php $Term = config('constants.Term') ?>
                  @foreach($Term as $key=>$val)
                    <option value="{{$key}}">{{$val}}</option>
                  @endforeach
                </select>
                <div class="add-div-error term errorsss"></div>
              </div>

                <div class="form-group col-sm-12 col-lg-4">
                <label for="start">Fine after due Date</label>

                <input class="form-control" type="number" id="fine_due_Date" name="fine_due_Date" >
                <div class="add-div-error fine_due_Date errorsss"></div>
              </div>

               

            </div>
          </div>
        </div>
        <div class="row bor-sep">
          <h6 class="col-sm-12 col-lg-12">Other Charges </h6><hr>
          
          @foreach ($Account_types_income as $Account_type)
            
           @if($Account_type->acc_Name!='Tuition Fee')

           <div class="col-sm-12 form-check col-lg-3  mb-4 ">
            
            <label class="form-check-label">
              <input class="form-check-input OtherChargesmodel" type="checkbox" id="check_{{$Account_type->acc_Id}}"  name="optionCheckboxes{{$Account_type->acc_Id}}" data-myid="{{$Account_type->acc_Id}}" data-mtarget="admissionsfeeadd_{{$Account_type->acc_Id}}">
              <span class="form-check-sign "></span>                          
            </label>
             <span  class="OtherChargesmodel labels"  data-mtarget="admissionsfeeadd_{{$Account_type->acc_Id}}" data-labels="admissionsfeeadd_{{$Account_type->acc_Id}}">{{$Account_type->acc_Name}}</span>
          </div>
          @endif
          @endforeach
        </div>

        <div class=" row ">
            <div class="col-sm-12 form-check col-lg-12  pull-right">
              <label class="form-check-label pull-right font-weight-bold">


                Tuition Fee: <span id="TuitionFeett" class='pull-right ml-2 font-weight-normal'>PKrs @php 
                                    $tuition_fee= $student->studentinfo?$student->studentinfo->class->tuition_fee:''; echo $tuition_fee; @endphp</span>
              </label>
            </div>
            <div class="col-sm-12 form-check col-lg-12  pull-right">
              <label class="form-check-label pull-right font-weight-bold border-bottom text-info">
              

              <input type="hidden" name="OtherCharges" id="OtherCharges" value="">

                Other Charges: <span id="OtherChargest" class='pull-right ml-2 font-weight-normal'>PKrs 0</span>
              </label>
            </div>
            <div class="col-sm-12 form-check col-lg-12  pull-right">
              <label class="form-check-label pull-right font-weight-bold">
              <input type="hidden" id="Payable_by_due_date" name="Payable_by_due_date" value=" @php 
                                    $tuition_fee= $student->studentinfo?$student->studentinfo->class->tuition_fee:''; echo $tuition_fee; @endphp">
                Payable by due date: <span class='pull-right ml-2 font-weight-normal text-success-cus' id="Payable_by_due_datet">PKrs  @php 
                                    $tuition_fee= $student->studentinfo?$student->studentinfo->class->tuition_fee:''; echo $tuition_fee; @endphp</span>
              </label>
            </div>
          <div class="col-sm-12 form-check col-lg-12 pull-right">
            <label class="form-check-label pull-right font-weight-bold border-bottom text-warning">
               <input type="hidden" id="totalPayable_fine" name="totalPayable_fine" value="">
              Late fee fine: <span id="totalPayable_finet" class='pull-right ml-2 font-weight-normal'>PKrs </span>
            </label>
          </div>
            <div class="col-sm-12 form-check col-lg-12 pull-right">
              <label class="form-check-label pull-right font-weight-bold border-bottom text-danger">
                <input type="hidden" name="total_Payable_after_due_date" id="total_Payable_after_due_date" value="@php 
                                    $tuition_fee= $student->studentinfo?$student->studentinfo->class->tuition_fee:''; echo $tuition_fee; @endphp">
                Payable after due date: <span id="total_Payable_after_due_datet" class='pull-right ml-2 font-weight-normal'>PKrs @php 
                                    $tuition_fee= $student->studentinfo?$student->studentinfo->class->tuition_fee:''; echo $tuition_fee; @endphp</span>
              </label>
            </div>
          </div>

      </div>

      <div class="modal-footer">
        <div class="">
          <button type="submit" class="btn btn-round btn-sm btn-link btn-secondary " >Save</button>
        </div>
          <div class="divider"></div>
        <div class="">
          <button type="button" class="btn btn-sm btn-link  btn-round btn-danger " data-dismiss="modal">Cancel</button>
        </div>
      </div>
      <input type="hidden" name="paid_Amt" id="paid_Amt" value="">
      </form>
    </div>
  </div>
</div>

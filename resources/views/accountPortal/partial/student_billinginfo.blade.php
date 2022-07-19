 <div class="tab-pane" id="billdetailstab" role="tabpanel" aria-expanded="false">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title"> Student Information</h6>
          </div>
          <div class="card-body table-full-width ">
            <div class="table-condensed">
              <table class="table " width="100%">
                <thead>
                <tr>
                  <th class="w-50"></th>
                  <th class="w-50"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <th>Admission No</th>
                  <td>{{$student->studentinfo?$student->studentinfo->admission->adm_Number:''}}</td>
                </tr>
                <tr>
                  <th>Admission Date</th>
                  <td>{{$student->studentinfo?$student->studentinfo->admission->adm_Date:''}}</td>
                </tr>
                <tr>
                  <th>Full Name </th>
                  <td>{{$student->name}}</td>
                </tr>
                <tr>
                  <th>Guardian Name</th>
                  <td>

                    @if($gardFather)

                    {{$gardFather?$gardFather->name:''}}</td>
                
                    @endif
                </tr>
                <tr>
                  <th>Class</th>
                  <td>@php  $classse= $student->studentinfo?$student->studentinfo->class->class:''; echo $classse; @endphp
                                 </td>
                </tr>
                <tr>
                  <th>Roll No</th>
                  <td>@php 
                                $role_number= $student->studentinfo?$student->studentinfo->role_number:''; echo $role_number; @endphp</td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>{{$student->email}}</td>
                </tr>
                <tr class="border-bottom">
                  <th>Mobile Phone No</th>
                  <td>{{$student->studentinfo?$student->studentinfo->contact_emergency->emer_cont_No:''}}</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h6 class="card-title"> Billing Information</h6>
          </div>
          <div class="card-body table-full-width ">
            <div class="table-condensed">
              <table class="table " width="100%">
                <thead>
                <tr>
                  <th class="w-50"></th>
                  <th class="w-50"></th>
                </tr>
                </thead>
                <tbody>

                @if($schedulefee!='')   
                <tr>
                 
                  <th>Billing Frequency</th>
                  <td> <?php $Billing_Frequency = config('constants.Billing_Frequency');
                    if(isset($schedulefee->otherdata['bill_Freq'])&& $schedulefee->otherdata['bill_Freq']!=''){
                  ?>
                  {{$Billing_Frequency[$schedulefee->otherdata['bill_Freq']]}}
                  <?php }?>
                  </td>
                </tr>
                <tr>
                    

                  <th>
                      
                      @php 
                      if(isset($schedulefee->otherdata['name'])&& $schedulefee->otherdata['name']!=''){
                      @endphp  {{$schedulefee->otherdata['name']}} @php } @endphp /  Monthly</th>
                  <td>&#8360; @php 
                      if(isset($schedulefee->otherdata['name'])&& $schedulefee->otherdata['name']!=''){
                      @endphp {{ $schedulefee->otherdata['amount']}} @php } @endphp</td>
                </tr>
                <tr>
                  <th>Payment Method </th>
                  <td>

                    @php 
                        
                       
            
                      
                      echo  $schedulefee->deposite_account->acc_Name;
                      
                    @endphp</td>
                </tr>
                <tr>
                  <th>Deposit Account</th>
                  <td>{{$schedulefee->accountS}}</td>
                </tr>
                <tr>
                  <th>Term (Due Date)</th>
                  <td>  @php 
                      if(isset($schedulefee->term)&& $schedulefee->term!=''){
                      echo $schedulefee->term;    } @endphp days</td>
                </tr>
                <tr class="border-bottom">
                  <th>Fine after due Date</th>
                  <td>&#8360;  @php 
                      if(isset($schedulefee->fine_due_Date)&& $schedulefee->fine_due_Date!=''){
                     echo number_format($schedulefee->fine_due_Date);  } @endphp </td>
                </tr>
                @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h6 class="card-title"> Other Fees</h6>
          </div>
          <div class="card-body table-full-width ">
            <div class="table-condensed">
              <table class="table " width="100%">
                <thead>
                <tr>
                  <th class="w-50"></th>
                  <th class="w-50"></th>
                </tr>
                </thead>
                <tbody>
                   
                @if($schedulefee)  

                <?php $Bil_Fre_fees = config('constants.Bil_Fre_fees');

                //print_r($schedulefee->acocuntsdata);

                ?>

                @foreach($schedulefee->acocuntsdata as $va)

                  <tr>
                    <th>{{$va['name']}} / {{$Bil_Fre_fees[$va['bill_Freq']]}}</th>
                    <td>&#8360; {{$va['amount']}} </td>
                  </tr>
                @endforeach
               
               @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
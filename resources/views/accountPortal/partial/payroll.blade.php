 <table id="datatable" data-id="datatable"
        class="  custom_border table-hover "
        cellspacing="0" width="100%">
     <thead class="table-secondary">
     <tr>
         <th>Personal No.</th>
         <th>
             Employee Name
         </th>
         <th class="text-right">Billing
             Rate</th>
         <th>Pay Method</th>
         <th>Status</th>
         <th
                 class="disabled-sorting text-center">
             Actions</th>
     </tr>
     </thead>
     <tbody>
    @if($employes)    
        @foreach($employes as $employe) 
        @php


        $personal_No='';
        if($employe->employeeInfo){
            if($employe->employeeInfo->employmentInfo){
                $personal_No = $employe->employeeInfo->employmentInfo->personal_No;
            }
        }


 

        @endphp
        <tr>
            <td> {{$personal_No}}</td>
            <td>
                <a href="{{URL('payroll/detail/'.$employe->id)}}"
                   class="text-info"
                   data-toggle=""
                   data-target="">{{$employe->name}}</a>
            </td>
            @php
            $Billing_Frequency = config('constants.Billing_Frequency');
            @endphp
            <td class="text-right">PRs
                {{$employe->schedule()?$employe->schedule()->basic_pay:'';}}/{{$employe->schedule()?$Billing_Frequency[$employe->schedule()->bill_Freq]:'';}}</td>
            <td>@php
                  
                  $deposite_account = config('constants.deposite_account');
                   
                  
                @endphp
                </td>
            <td>{{$employe->status}}</td>
            <td class="text-center">
                <div class=" ">
                    <div class="dropdown">
                        <button
                                class="dropdown-toggle btn btn-link  btn-sm "
                                type="button"
                                id="dropdownMenuButton"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                            Manage
                        </button>
                        <div class="dropdown-menu dropdown-menu-right"
                             aria-labelledby="navbarDropdownMenuLink">
                            
                            <a class="dropdown-item"
                               data-toggle="modal"
                               data-target="#prtpay">Print
                                Pay bill</a>

                            <a class="dropdown-item  generatebill" data-id="{{$employe->id}}" >Generate
                                Pay bill</a>
                            
                            <a class="dropdown-item makepayment"
                               data-id="{{$employe->id}}">Make
                                payment</a>
                            
                            <!-- <a class="dropdown-item"
                               data-toggle="modal"
                               data-target="#editguardian">Adjust
                                pay</a> -->
                            
                              <a class="dropdown-item empstatement" data-id="{{$employe->id}}">Statement</a>
                        </div>
                    </div>
                </div>
            </td>
            </tr>
            
        @endforeach
      @endif  
    </tbody>
</table>
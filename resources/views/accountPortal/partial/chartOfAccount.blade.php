<table id="diarytable" data-id="diarytable"  class=" table-hover custom_border" cellspacing="0" width="100%">
    <thead class="table-secondary">
        <tr>
            <th class="text-center" width="5%">S.No</th>
            <th class="w-25">Name</th>
            <th class="w-15">Type</th>
            <th class="w-10">Code</th>
            <th class="w-15">Parent Account</th>
            <th class="w-15 text-right">Balance</th>
            <th class="disabled-sorting text-center w-auto">Actions</th>
        </tr>
    </thead>
    <tfoot class="table-secondary">
        <tr>
            <th class="text-center" width="5%">S.No</th>
            <th class="w-25">Name</th>
            <th class="w-15">Type</th>
            <th class="w-10">Code</th>
            <th class="w-15">Parent Account</th>
            <th class="w-15 text-right">Balance</th>
            <th class="disabled-sorting text-center ">Actions</th>
        </tr>
    </tfoot>
    <tbody>
    @foreach($Chartofaccounts as $Chartofaccount)                                         
        <tr>
            <td class="text-center">{{$Chartofaccount->acc_Id}}</td>
            <td>{{$Chartofaccount->acc_Name}}</td>
            <td>{{$Chartofaccount->account?$Chartofaccount->account->acc_Type:''}}</td>
            <td>{{$Chartofaccount->acc_Code}}</td>
            <td>{{$Chartofaccount->ParentRecord()?$Chartofaccount->ParentRecord()->acc_Name:''}}</td>
            <td class="text-right" >&#8360; {{$Chartofaccount-> acc_Balance}}</td>
            <td class="">
                <div class="form-inline pull-right">
                    <div class="">
                        <button class=" btn-link  btn-round  btn-sm btn text-info  btn-cus-weight  show-accountChart-btn " type="button"    href="javascript::void(0)" data-id="{{$Chartofaccount->acc_Id}}">
                           View
                        </button>
                    </div>
                    <div class="nav-item btn-rotate dropdown ">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink"> 
                            <a  class="dropdown-item edit-chartOfAccount-btn" href="javascript::void(0)" data-id="{{$Chartofaccount->acc_Id}}">Edit</a>
                            <a  class="dropdown-item delete-chartOfAccount-btn" href="javascript::void(0)" data-id="{{$Chartofaccount->acc_Id}}">Delete</a>
                            <a  class="dropdown-item " href="#" data-id="">Run Report</a>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
     @endforeach
    </tbody>
</table>
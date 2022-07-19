<table      id="datatable"   
            data-id="datatable" 
            class=" table-hover custom_border" 
            cellspacing="0" 
            width="100%">
    <thead class="table-secondary">
    <tr>
        <th>Adm.No</th>
        <th> Student Name</th>
        <th>Phone</th>
        <th class="text-right">Open Balance</th>
        <th class="disabled-sorting text-center">Actions</th>
    </tr>
    </thead>
    <tbody> 
    
    @if($students)    
        
        @foreach($students as $student) 
        <tr>
            <td>{{$student->studentinfo?$student->studentinfo->admission->adm_Number:''}}</td>
            <td>
                <a href="{{URL('income/detail/'.$student->id)}}" class="text-info"  data-toggle="" data-target="" >{{$student->name}}</a>
            </td>
            <td>{{$student->phone}}</td>
            <td class="text-right">&#8360; {{ $student->getBalanceStudent()}}</td>
            <td class="text-center">
                <div class=" ">
                    <div class="dropdown">
                        <button class="dropdown-toggle btn-link  btn-round  btn-sm btn text-info  btn-cus-weight " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Manage
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink"><!-- 
                            <a class="dropdown-item" data-toggle="modal" data-target="#printfeecard" >Print Fee Card</a> -->
                            <a class="dropdown-item generatebill" href="#" data-id="{{$student->id}}">Generate Fee</a>
                            <a class="dropdown-item receivebill"  href="#" data-id="{{$student->id}}">Receive payment</a>
                            <a class="dropdown-item adjust_fee"   href="#" data-id="{{$student->id}}">Fee adjustment</a>
                            <a class="dropdown-item feestatement" href="#" data-id="{{$student->id}}">Statements</a>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
      @endif  
    </tbody>
</table>
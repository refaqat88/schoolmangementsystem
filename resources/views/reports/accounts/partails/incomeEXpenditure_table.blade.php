<div class="col-md-12 hiden appear" id='incomeEXpenditure_table'>
	<form id="RegisterValidation" action="#" method="">
		<div class="container-fluid card">
			<div class="col-md-12">

				@php
					$monthArray =[  "01" 		=>'January',
									"02" 		=>'February',
									"03" 		=>'March',
									"04" 		=>'April',
									"05" 		=>'May',
									"06" 		=>'June',
									"07" 		=>'July',
									"08" 		=>'August',
									"09" 		=>'September',
									"10" 		=>'October',
									"11" 		=>'November',
									"12" 		=>'December']; 
				@endphp

				<table class="table table-bordered text-center ">
					<h5 class='text-center m-4'>Monthly Record of (Total Income,Expenditure &
                            Outstanding) <span id='Year'></span></h5>
					<thead>
						<tr class='border-bottom text-center'>
							<th class='border-right'></th>
							<th colspan='13' class='border-right'>Income</th>
							<th colspan='3' class='border-right'>Expenditure</th>
						</tr>
						<tr>
							
							<th class='border-right'>MONTHS</th>
							
							@if($Account_types_income)
							
							@foreach($Account_types_income as $valA)
							<th>{{$valA->acc_Name}}</th>
					
							@endforeach
							@endif 
							<th class='border-right'>Total Income</th>
							<th>Salary</th>
							<th>General Expenses</th>
							<th class='border-right'>Total Expenditure</th>
							<th class='border-right'>Balance</th>
							<th>Remarks</th>

						</tr>

					</thead>
					<tbody>
						
						@foreach($monthArray as $key=>$val)
				 
						<tr>
							<th>{{$val}}</th>
							

							@if($Account_types_income)
							


							@foreach($Account_types_income as $valA)
							<td>

								@php

								if(isset($transactionslist[$key][$valA->acc_Id])){

									echo number_format($transactionslist[$key][$valA->acc_Id]['sum']);
								}


  
								@endphp

							</td>
							@endforeach
							@endif 
							<td>
								
								@php


								if(isset($transactionslist[$key][$accountName->acc_Id]['dr_Amt'])){

									echo number_format($transactionslist[$key][$accountName->acc_Id]['dr_Amt']-$transactionslist[$key][$accountName->acc_Id]['cr_Amt']);
								}

								@endphp

							</td>
							<td>@php

								if(isset($transactionslist[$key][$payrollExpenence->acc_Id]['dr_Amt'])){

									echo number_format($transactionslist[$key][$payrollExpenence->acc_Id]['dr_Amt']);
								}


  
								@endphp</td>
							<td>0.00</td>
							<td>0.00</td>
							<td>0.00</td>
							<td>checked</td>
						</tr>
						@endforeach
					 
					</tbody>
				</table>
			</div>
		</div>
	</form>
</div>
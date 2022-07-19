<div class="col-md-12 hiden appear" id='profit_loss'>
		<form id="RegisterValidation" action="#" method="">
			<div class="container-fluid card p-5">
				<h5 class='text-center m-0 mb-4'>Profit and Lost</h5>
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr class="border-top">
								<th></th>
								<th class="float-right">Total</th>
							</tr>
						</thead>
						<tbody>
							<tr class="border-bottom">
								<td>Income</td>
								<td class="text-right">@php

										if(isset($transactionslist[$accountName->acc_Id]['dr_Amt'])){
											echo $transactionslist[$accountName->acc_Id]['dr_Amt'];
										
										}else{
											echo 0;
										}
										
									@endphp</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<th>Total Income</th>
								<td></td>
							</tr>
							<tr>
								<td>GROSS PROFIT</td>
								<td class="text-right">@php

										if(isset($transactionslist[$accountName->acc_Id]['dr_Amt'])){
											echo $transactionslist[$accountName->acc_Id]['dr_Amt'];
										
										}else{
											echo 0;
										}
										
									@endphp</td>
							</tr>
						</tfoot>
					</table>
					<table class="table">
						<thead>
							<tr>
								<th>Expenses</th>
								<th class='float-right'></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Office Expenses</td>
								<td class="text-right"> 0</td>
							</tr>
							<tr>
								<td>Payroll Expenses</td>
								<td class="text-right">

									@php

										if(isset($transactionslist[$payrollExpenence->acc_Id]['dr_Amt'])){
											echo $transactionslist[$payrollExpenence->acc_Id]['dr_Amt'];
										
										}else{
											echo 0;
										}
										
									@endphp
								 </td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<th>Total Expenses</th>
								<td class="text-right">@php

										if(isset($transactionslist[$payrollExpenence->acc_Id]['dr_Amt'])){
											echo $transactionslist[$payrollExpenence->acc_Id]['dr_Amt'];
										
										}else{
											echo 0;
										}
										
									@endphp</td>
							</tr>
							<tr class='border-bottom'>
								<td>NET EARNING</td>
								<td class="text-right">@php

										if(isset($transactionslist[$accountName->acc_Id]['dr_Amt'])){
											$val1= $transactionslist[$accountName->acc_Id]['dr_Amt'];
										
										}else{
											$val1= 0;
										}

									if(isset($transactionslist[$payrollExpenence->acc_Id]['dr_Amt'])){
											$val2=$transactionslist[$payrollExpenence->acc_Id]['dr_Amt'];
										
										}else{
											$val2=0;
										}
										echo $val1-$val2;
										@endphp
										</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</form>
	</div>
<div class="col-md-12 hiden appear" id='journal'>
		<form id="RegisterValidation" action="#" method="">
			<div class="container-fluid card p-5">
				<h3 class='text-center m-0 mb-4'>Journal</h3>
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr class="border-top">
								<th>Date</th>
								<th>Transaction TYPE</th>
								<th>No.</th>
								<th>Name</th>
								<th>Description</th>
								<th>Account</th>
								<th>Debit</th>
								<th>Credit</th>
							</tr>
						</thead>
						<tbody>

							@if($transactions)
							
							@foreach($transactions as $transaction)

							<tr class="border-bottom"> 
								<td>{{date('Y-m-d',strtotime($transaction->tr_Date))}}</td>
								<td>{{$transaction->Type($transaction->tr_Type)}}</td>
								<td>{{$transaction->tr_Id}}</td>
								<td>{{$transaction->User?$transaction->User->name:''}}</td>
								<td>{{$transaction->Narration}}</td>
								<td>{{$transaction->acc_Id}}</td>
								<td>{{$transaction->dr_Amt!=0?number_format($transaction->dr_Amt):''}}</td>
								<td>{{$transaction->cr_Amt!=0?number_format($transaction->cr_Amt):''}}</td>
							</tr>
							
							@endforeach

							@endif
						</tbody>
					</table>
				</div>
			</div>
		</form>
	</div>
@extends('layouts.master')
@section('title', 'Fee Reports')
@section('content')

<style type="text/css">
	
	.add-div-error{ color: red; }

</style>
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<form id="IncomeReportForm" action="#" method="">
				<div class="card ">
					<div class="card-header">
						<h4 class="card-title">Fees Reports</h4> 
					</div>
					<div class="card-body">
						<div class="row bor-sep">
							<div class="col-lg-12 d-flex flex-row justify-content-between">

								<div class="col-md-3 col-lg-3 col-sm-12 pl-0">
									<label class="col-lg-12">Report Type</label>
									<select id="report_type" name="report_type" class="selectpicker " data-style="btn btn-secondary btn-round" title="Choose Report" required="true">
										<option value="" disabled selected>Choose Report</option>
										<option value="incomeEXpenditure_table">Income & Expenditure</option>
										<option value="account_list">Account List</option>
										<option value="trial_balance">Trial Balance </option>
										<option value="balance_sheet">Balance Sheet</option>
										<option value="transaction">Transcation Daily by account</option>
										<option value="profit_loss">Profit and Loss </option>
										<option value="journal">Journal</option>
									</select>
									<div class="add-div-error report_type errorsss"></div>

								</div>
								<div id='individual' class=" col-md-3 col-sm-12 col-lg-3 form-group">
									<label class="col-lg-12">Session</label>
									


									<select id="session" name="session" class="selectpicker " data-style="btn btn-secondary btn-round" title="Choose Sessions" required="true">
										<option value="" disabled selected>Choose Sessions</option>
										
										@if($sessions)

										@foreach($sessions as $session)
										<option value="{{date('Y',strtotime($session->year))}}">{{date('Y',strtotime($session->year))}}</option>
										
										@endforeach
										@endif
									</select>
 
									<div class="add-div-error session errorsss"></div>

 								</div>
								<div class='col-md-4 col-sm-12 col-lg-6 '>
									<button type="submit" class="btn pull-right btn-round btn-outline-choice"  >Generate</button>
								</div>
							</div>
						</div>
						@include('load')

						<div id="incomeReportContent"></div>
					</div>
					<!--  end card  -->
				</div>
			</form>
		</div>
		<!-- end col-md-12 -->
	</div>
	<!-- end row -->
 </div>
 
@endsection()


@section('front_script')
	 
	 <script type="text/javascript" src="{{ asset('js/report_accounts.js')}}"></script>

@endsection()
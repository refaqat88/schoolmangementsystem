@extends('layouts.master')
@section('title', 'Fee Reports')
@section('content')

<style type="text/css">
	
	.add-div-error{ color: red; }

</style>
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<form id="FeeReportForm" action="#" method="">
				<div class="card ">
					<div class="card-header">
						<h4 class="card-title">Fees Reports</h4> 
					</div>
					<div class="card-body">
						<div class="row bor-sep">
							<div class="col-lg-12 d-flex flex-row ">

								<div class="col-md-3 col-lg-2 col-sm-12 pl-0">
									 
								   <select id="report_type" name='report_type' class="selectpicker " data-size="7"
			                          data-style="btn btn-secondary btn-round" title="Choose Report" required="true">
			                          <option value="" disabled selected>Choose Report</option>
			                          <option value="school_annual_fee">School Annual Fee Report</option>
			                          <option value="school_monthly_fee">School Monthly Fee Report</option>
			                          <option value="class_wise_monthly_fee">Class wise Monthly Fee Report</option>
			                          <option value="student_fee">Student Fee Record</option>
			                          <option value="student_fee_card">Student Fee Card</option>
			                          <option value="student_fee_slip">Student Fee Slip</option>

			                        </select>
									<div class="add-div-error report_type errorsss"></div>

								</div>
								<div   class=" d-none enterInput class_wise_monthly_fee student_fee student_fee_card  student_fee_slip  col-md-3 col-sm-12 col-lg-2 form-group">
									 <select id="class" name='class' class="selectpicker"
			                                data-size="7" data-style="btn btn-secondary btn-round"
			                                title="Choose Class" required="true">
			                          <option value="" disabled selected>Choose Class</option>
			                         	

									@if($data['classes'])

									@foreach($data['classes'] as $class)
									<option value="{{$class->cls_Id}}">{{$class->class}}</option>
									
									@endforeach
									@endif


			                        </select>

 
									<div class="add-div-error class errorsss"></div>

 								</div>


 								<div class="d-none  enterInput col-md-3 col-lg-2 col-sm-12   student_fee_slip">
				                   <select id="month" name='month' class="selectpicker"
			                                data-size="7" data-style="btn btn-secondary btn-round"
			                                title="Choose Month">
							            @php
				                        $Months = config('constants.Months');
				                        @endphp 
				                        @if($Months)
				                        @foreach($Months as $key=>$val)  
				                        <option value="{{$key}}">{{$val}}</option>
				                        @endforeach
				                        @endif			                           
			                         </select>       
				                    <div class="add-div-error adm_No errorsss"></div>
				                </div>
	 							<div class="d-none  enterInput col-md-3 col-lg-2 col-sm-12 student_fee student_fee_card student_fee_slip">
				                    <input type="text" class="form-control" placeholder="Enter ad.No"
				                            name="adm_No" >
				                    <div class="add-div-error adm_No errorsss"></div>
				                </div>
			                    <div class='col-md-4 col-sm-12 col-lg-2 '>
									<button type="submit" class="btn pull-right btn-round btn-outline-choice"  >Generate</button>
								</div>
                    		</div>	
						</div>
					</div>
					@include('load')
					<div id="FeeReportContent"></div>
				</div>
					<!--  end card  -->
				 
			</form>
		</div>
		<!-- end col-md-12 -->
	</div>
	<!-- end row -->
 </div>
@endsection()
@section('front_script') 
<script type="text/javascript" src="{{ asset('js/report_fee.js')}}"></script>
<script>
	function printThis(printthis, header){

		$("."+printthis).printThis({
			header: `${header}`,
		});
	}
</script>

@endsection()
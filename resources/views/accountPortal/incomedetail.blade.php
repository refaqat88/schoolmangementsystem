 @extends('layouts.master')
 @section('title', 'Income')
 @section('content') 
<style type="text/css">
      .modal {overflow: auto !important; }
      .errorsss{ color: red; }
      .labels{
        display: inline-block;
        padding-top: 3px;
        position: absolute;
        top: 10px;
        cursor: pointer;
    }
</style>  


    <!-- End Navbar -->
    <div class="content">
      <div class=" row">
        <div class="col-md-12"> 
            <div class="card ">
              <div class="card-header ">
                <h4 class="card-title text-muted pl-3 font-weight-bold">
                 {{$student->name}}</h4>
              </div>

              <input type="hidden" name="page" value="detail" id="page">
              <input type="hidden" name="hidden_id" value="{{$student->id}}" id="hidden_id">

              <div class="card-body">
                <div class="row ">
                  <div class="col-sm-12 col-lg-9">
                    <button class="btn btn-outline-choice btn-round col-sm-12 col-lg-3 btn-sm pull-right viewschedulefee"  type="button" data-id="{{$student->id}}"  aria-haspopup="true" aria-expanded="false">
                      Schedule Fee
                    </button>
                  </div>
                  <div class="col-sm-12 col-lg-3">
                    <div class="dropdown mr-3">
                      <button class=" dropdown-toggle btn btn-secondary btn-round col-sm-12" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        New Transaction
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        
                        <a class="dropdown-item generatebill" href="#"  data-id="{{$student->id}}">Generate Fee</a>

                        <a class="dropdown-item receivebill" href="#" data-id="{{$student->id}}">Receive payment</a>
                        
                        <a class="dropdown-item adjust_fee" href="#" data-id="{{$student->id}}"  >Adjust Fee</a>
                      
                        <a class="dropdown-item feestatement" data-id="{{$student->id}}">Statement</a>

                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-lg-12 pull-right ">
                    <br>
                    <h5 class="pull-right mr-3"><b>PRs <span class="feebalance_bydue">{{ number_format($student->getBalanceStudent())}}</span></b></h5>
                  </div>
                  <div class="col-sm-12 pull-right">
                    <p class="pull-right text-warning mr-3"><b>Open</b></p>
                  </div>
                  <div class="col-sm-12 pull-right">
                    <br>
                    <h5 class="pull-right mr-3"><b>PRs 0.00</b></h5>
                  </div>
                  <div class="col-sm-12 pull-right">

                    <p class="pull-right text-danger mr-3"><b>Overdue</b></p>
                  </div>
                </div>
              </div>
            </div>




            <div class="card">
              <div class="row">
                <div class="col-md-12">

                  <div class="nav-tabs-navigation nav-tabs-left">
                    <div class="nav-tabs-wrapper">
                      <ul id="tabs" class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#tottranstab" role="tab" aria-expanded="true">Transaction List</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#billdetailstab" role="tab" aria-expanded="false">Billing Details</a>
                        </li>

                      </ul>
                    </div>
                  </div>
                      
                  @include('accountPortal.partial.transaction')

                </div> <!-- end col-md-12 -->
              </div> <!-- end row -->

            </div>
           
            @include('accountPortal.partial.schedule_statement')
            @include('accountPortal.modals.fees_print_bill')
            @include('accountPortal.modals.adjustfee')
            @include('accountPortal.modals.pendinginvoices')
            @include('accountPortal.modals.generatebill')
            @include('accountPortal.modals.receivebill')
            @include('accountPortal.modals.fee_statements')
           
        </div>
  </div>
</div>
  

@endsection

@section('front_script')
<script type="text/javascript" src="{{ asset('js/accountportal.js')}}"></script>
 
<script src="{{ asset('js/print/printThis.js') }}"></script>


<script>
    $("#print-fee-state").click(function(){
        $(".print_fee_statement").printThis({
        });
    });
</script>

<script>
  $(document).ready(function() {
    $('#recpaydatatable').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],

      "columnDefs": [
        { "orderable": false, "targets": [0,,4,5,6] }
      ],

      responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search",
      }

    });

    var table = $('#recpaydatatable').DataTable();

    // Edit record
    table.on('click', '.edit', function() {
      $tr = $(this).closest('tr');

      var data = table.row($tr).data();
      alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    });

    // Delete a record
    table.on('click', '.remove', function(e) {
      $tr = $(this).closest('tr');
      table.row($tr).remove().draw();
      e.preventDefault();
    });

    //Like record
    table.on('click', '.like', function() {
      alert('You clicked on Like button');
    });
  });
</script>
 
@endsection

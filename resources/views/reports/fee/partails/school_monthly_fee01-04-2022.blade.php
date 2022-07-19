<div class=" col-md-12 card" id='annual_table'>
   <form id="RegisterValidation" action="#" method="">
     <div class="card">
       <div class="card-header">
         <div class="container-fluid bg-light p-4">
           <div class='row d-flex flex-row'>
             <div class='col-md-6 align-self-center text-center atop'>
               <h5 class='top_heading' style='font-size:200%;'>{{ number_format($data['recieved'])}}-/Rupees</h5>
               <h6 class='sub_heading'>Amount Recieved</h6>
             </div>
             <div class='col-md-3 align-self-center text-center'>
               
              <div class="row">
                <div style="border-left: 1px solid blue;" class="col-md-6">
                 <h5 class='top_heading'>{{$data['total_bill']}}</h5>
                 <h6 class='sub_heading'>Total Bill</h6>
                 </div>
                 <div class="col-md-6">
                   <h5 class='top_heading'>{{$data['partial']}}</h5>
                   <h6 class='sub_heading'>Partail bill</h6>
                 </div>
               </div>

               <div class="row">

                 <div style="border-left: 1px solid blue;" class="col-md-6">
                   <h5 class='top_heading'>{{$data['openbill']}}</h5>
                   <h6 class='sub_heading'>unpaid bill</h6>
                 </div>

                 <div class="col-md-6">
                   <h5 class='top_heading'>{{$data['paid']}}</h5>
                   <h6 class='sub_heading'>paid Bill</h6>
                 </div>

                 </div>

             </div>


 



           </div>

         </div>


       </div>



       <div class="container-fluid m-4">
         <div class="row d-flex flex-row align-items-center">
           <div class="col-md-6 d-flex flex-row ">
             <h6 class='mt-2 sub_heading'>Year:</h6>
             <h5 class='mx-2 top_heading' id='Year'>{{date('Y')}}</h5>
           </div>
           <div class="col-md-6 d-flex flex-row">
             <h6 class="mt-2 sub_heading">Branch:</h6>
             <h5 class='mx-2 top_heading'>{{$data['school']->school_Name}}</h5>
           </div>



         </div>
       </div>






       <div class="card-body">
         <div class="toolbar">
           <div class="row">
             <div class="form-group col-sm-2 select-wizard">
               <select class="selectpicker" data-size="7"
                 data-style="btn btn-sm btn-outline-secondary btn-round" title="Filter">
                 <option value="1">All</option>
                 <option value="2">Paid</option>
                 <option value="3">Unpaid</option>

               </select>
             </div>
             
           </div>

         </div>
         <table id="paystatementdatatable" data-id="paystatementdatatable" class="table custom_border table-hover" cellspacing="0"
           width="100%">
           <thead>
             <tr class="">
                
               <th >Sr.No</th>
               <th>Class</th>
               <th>Total Fee</th>
               <th>Recieved</th>
               <th>Dues</th>
               <th>Date</th>
               <th>Reciever/Remarks</th>
             </tr>
           </thead>
           <tbody>


            @if($data['transactions'])

            @foreach($data['transactions'] as $transaction)
            
            <tr>

              <td >{{$transaction['s_no']}}</td>
              <td>{{$transaction['class']}}</td>
              <td>{{ number_format($transaction['total'])}}</td>
              <td>{{ number_format($transaction['recive'])}}</td>
              <td>{{ number_format($transaction['due'])}}</td>
              <td>{{$transaction['date']}}</td>
              <td>Reciever/Remarks</td>

            </tr>

            @endforeach
            

            @endif

           </tbody>
           <tfoot>

             <tr class="text-right mt-3">
               <th colspan="6" style='border:none;'>TOTAL</th>
               <th class='total text-center' style='border:none;'>{{ number_format($data['total'])}}</th>
             </tr>

             <tr class="text-right">
               <th colspan="6" style='border:none;'>Balance Due</th>
               <th class='total text-center' style='border:none;'>{{ number_format($data['due'])}}</th>
             </tr>
           </tfoot>
         </table>



       </div>
     </div>
   </form>
</div>
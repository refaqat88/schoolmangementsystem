//       section account charted/
   
$(document).on("click","#clickaccountingModal ",function() {
    $('#FormAccountstatment')[0].reset();
    $("#acc_Id").val('');
    $("#acc_type_Id").selectpicker('refresh');
    $("#acc_type_Id").prop('disabled',false);
    $("#acc_Code").prop('disabled',false);
    $("#acc_parent").prop('disabled',false);
    $("#acc_type_Id").selectpicker('refresh');
    $("#inlineCheckbox1").prop('disabled',false);
    $("#acc_type_Id").selectpicker('refresh');
    $("#acc_parent").selectpicker('refresh');
    $("#accountingModal").modal('show');
});



/* View Shedule Schdule */
$(document).on("click", ".viewschedulefee", function () {
    var $this =$(this);
    var id   = $this.data('id');
    var schedule   = $this.data('schedule');
    $('#schedulefee').modal('show');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: base_url + 'schedulefee/show',
        method: 'post',
        dataType : "json",
        data: { std_Id:id,'schedule':schedule },
        success: function (result) {
           
            if(result.datestart && result.datestart!=''){
                 

                  var yourFormattedDate =moment(result.datestart).format('YYYY-MM-DD');
                   
                 $("#FormAddstudentSchedule #next_fee_Date").val(yourFormattedDate);
            }else{
            
            var i = 0;
            

            $('#FormAddstudentSchedule #bill_Freq').val(result.tution_account.bill_Freq);
            
            $('#FormAddstudentSchedule #schedule_id').val(schedule);
            
            $('#FormAddstudentSchedule #bill_Freq').selectpicker("refresh");
             
            var arr = JSON.parse(result.otherCharges);
            
            $.each($(arr),function(key,value){
                $("#check_"+value.id).prop('checked',true);
                 $('#FormAddstudentSchedule #total_income'+value.id).val(value.amount);
                 $('#FormAddstudentSchedule #total_income'+value.id).selectpicker("refresh");
                 $('#FormAddstudentSchedule #modelcheck_'+value.id).val(value.bill_Freq);
                 $('#FormAddstudentSchedule #modelcheck_'+value.id).selectpicker("refresh");   
                
            });

            var yourFormattedDate =moment(result.issue_date).format('YYYY-MM-DD')
            $("#FormAddstudentSchedule #next_fee_Date ").val(yourFormattedDate);
            $("#FormAddstudentSchedule #fine_due_Date").val(result.fine_due_Date);
            $('#FormAddstudentSchedule #payment_Mode').val(result.payment_Mode).attr('selected','selected');
            $('#FormAddstudentSchedule #payment_Mode').selectpicker('refresh');
            $('#FormAddstudentSchedule #payment_Mode').trigger('change');
            $('#FormAddstudentSchedule .acc_Iddeposite').val(result.acc_Id).prop("selected", true);
            $('#FormAddstudentSchedule .acc_Iddeposite').selectpicker('refresh');
            $('#FormAddstudentSchedule #Term').val(result.term).attr('selected','selected');
            $('#FormAddstudentSchedule #Term').selectpicker('refresh');
            $('#FormAddstudentSchedule #account').val(result.account).selectpicker('refresh');
            calculate();
            $("#schedulefee").modal('show'); 
          }
              
        }
    })   
 });


loadTransactionData();

function loadTransactionData() {
    var receivebill = $(".receivebill").data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    }); 
    $.ajax({            
        url: base_url + 'income/detail/'+receivebill+'?type=transaction',
        type: 'get',
        success: function (data) {
            $('#my-tab-content').empty();
            $('#my-tab-content').html(data);
        }
    });
} 


 

function loadincomData() {
     
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    }); 
    $.ajax({            
        url: base_url + 'income?type=transaction',
        type: 'get',
        success: function (data) {
            $('#my-tab-content').empty();
            $('#my-tab-content').html(data);
        }
    });
} 


//loadTransactionData();


$(document).on("change", "#FormAddstudentSchedule #payment_Mode,#fee_reciev_form #payment_Mode", function (e) {
    var $this = $(this);
    var text = $("#FormAddstudentSchedule #payment_Mode option:selected" ).text();
    var sid = $('.generatebill').data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    }); 
    $.ajax({            
        url: base_url + 'fee/accountdropdown',
        type: 'post',
        dataType : "json",
        data: { id:$this.val(),sid:sid },

        success: function (data) {
            $('#acc_Id').html('');
            dep = `<option value="">Select Deposite Account</option>`;
            
            var sch_data= '';
            if(data.Fee_schedule!=''){
                sch_data= data.Fee_schedule.acc_Id;
            }
            
            var selected;

            $.each(data.depostaccount, function( index,  value){
                
                if(value.acc_Id==sch_data){ selected = "selected";}

                dep +=`<option ${selected} value="${value.acc_Id}">${value.acc_Name}</option>`;
            });

            $("#FormAddstudentSchedule #acc_Id").html(dep); 
            $('#FormAddstudentSchedule #acc_Id').selectpicker('refresh');


            $("#fee_reciev_form #acc_Id").html(dep); 
            $('#fee_reciev_form #acc_Id').selectpicker('refresh');




        }
    });

}) 






$(document).on("change keyup", ".amountPayable", function (e) {

    var value = $(".amountPayable").val();
     
    $(".balancehidden").each( function(){       
 
        var $this = $(this);
        var values_balance = $this.val();
        if(parseInt(value) >= parseInt(values_balance)){
           value = value-values_balance;
            $("#payments"+$this.data('id')).val(values_balance);    
            $("#tr_Status"+$this.data('id')).val('Close');    
            return true;        
        }

        if(value==0){
            $("#tr_Status"+$this.data('id')).val('Open');    
            $("#payments"+$this.data('id')).val(value); 
             
        }

        if(parseInt(value) <= parseInt(values_balance) && value!=0){
            $("#tr_Status"+$this.data('id')).val('Partail');    
            $("#payments"+$this.data('id')).val(value); 
             value =0;
        }

    })

    $(".receivedAmount").text($(".amountPayable").val());
   
})







/*  Recive Payment */

$(document).on("click", ".receivebill", function () {
        
        var $this =$(this);
        var id   = $this.data('id');
        $('#feepayment').modal('show');
        
        var transaction   = $this.data('transaction');


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + 'schedulefee/receivebill',
            method: 'post',
            dataType : "json",
            data: { std_Id:id,'transaction':transaction },
            success: function (result) { 
                $("#feepayment #stundet_name").text(result.student.name);
                $("#feepayment #std_Id").val(id);
                $('#feepayment #payment_Mode').val(result.Fee_schedule.payment_Mode).attr('selected','selected');
                $('#feepayment #payment_Mode').selectpicker('refresh');
                $('#fee_reciev_form #payment_Mode').trigger('change');
                $('#feepayment #payment_Mode').val(result.Fee_schedule.payment_Mode).attr('selected','selected');
                var yourFormattedDate =moment(result.date).format('YYYY-MM-DD')
                $("#feepayment #tr_Date").val(yourFormattedDate);
                $('#feepayment #acc_Id').val(result.Fee_schedule.acc_Id).attr('selected','selected');
                $('#feepayment #acc_Id').selectpicker('refresh');
                $('#feepayment #receipt_no').val(parseInt(result.Transactions_latest.tr_Id)+1);
                var table = '';  
                 table +=` <thead class="table-secondary">
                                    <tr>
                                      <th class="">Description</th>
                                      <th>Invoice Date</th>
                                      <th>Due Date</th>
                                      <th class="text-right flex ">Original Amount</th>
                                      <th class="text-right ">Open Balance</th>
                                      <th class="">Payment</th>
                                    </tr>
                                    </thead>
                                <tbody>`;

                if(result.transactions.length>0){
                            
                    $.each($(result.transactions),function(key,value){
                       
                        table +=`<tr > 
                                    <td><a href="#">Invoice #${value.tr_Id}</a> ${value.tr_Date}</td>
                                    <td>${value['issue_date']}</td>
                                    <td>
                                        <input type="hidden" name="schedule_id[${value.tr_Id}]" value="${value.schedule_id}" id="schedule_id${value.tr_Id}"/>
                                        <input type="hidden" name="tr_Status[${value.tr_Id}]" id="tr_Status${value.tr_Id}"/>
                                        <input type="hidden" class="balancehidden" data-id="${value.tr_Id}" name="balance[${value.tr_Id}]" value="${value['balance']}"/>
                                        ${value['due_Date']}</td>
                                    <td>${value['amount']}</td>
                                    <td>${value['balance']}</td> 
                                    <td><input type="number" readonly  class="form-control payments" id="payments${value.tr_Id}" name="payments[${value.tr_Id}]"></td>
                                </tr>`;                       
                        
                        
                    });   
                }



                table +=`</body>`;
                table +=`</table>`;
 
                 $("#recpaydatatable").html(table);
            }   

        })   
 

             
});





/*  Adjust fee  */

$(document).on("click", ".adjust_fee", function () {
    var $this =$(this);
    var id   = $this.data('id');
   var transaction   = $this.data('transaction');
    
    $('#adjustfees').modal('show');



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: base_url + 'schedulefee/adjust_fee',
        method: 'post',
        dataType : "json",
        data: { std_Id:id,'transaction':transaction },
        success: function (result) { 

            var yourFormattedDate =moment(result.date).format('YYYY-MM-DD')
            $("#adjustfees #date").val(yourFormattedDate);
            $("#adjustfees #stundet_name").text(result.student.name);
            $("#adjustfees #transaction").val(transaction);
            $("#adjustfees #counter").val(0);
            $("#adjustfeesstd_Id").val(id);
            $("#adjustfees #student_id").val(id);
            $("#feeadjusttable body").html('');
            $("#transactionsdatatablelink body ").html('');
            $("#feeadjusttable .linkings").remove();
            $('#adjustfees #receipt_no').val(parseInt(result.Transactions_latest.tr_Id)+1);
            $("#adjustfees .total").text('0');
           

        }   

    })    
        
});


/*  Statments fee  */

 $(document).on("click", ".feestatement", function () {
    var $this =$(this);
    var id   = $this.data('id');
    var report_type   = $("#report_type").val();

    $("#report_type").val(report_type).attr('selected',"Selected");

    $("#Formfeestatements #std_Id").val(id)
;
    $("#Formfeestatements #applybtn").data('id',id);

    var stdate = $("#statement_date").val().length;

    if(stdate==0){

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        today = mm + '/' + dd + '/' + yyyy;
        var yourFormattedDate =moment(today).format('YYYY-MM-DD')
        $("#Formfeestatements #statement_date").val(yourFormattedDate);
        $("#Formfeestatements #end_date").val(yourFormattedDate);
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() ).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = mm + '/' + dd + '/' + yyyy;
        var yourFormattedDate =moment(today).format('YYYY-MM-DD')
        $("#Formfeestatements #start_date").val(yourFormattedDate);

    }

    $("#date_range").show();

    if(report_type==1){
       $("#date_range").hide();
    }

    var Formfeestatements = $("#Formfeestatements").serialize();
    $('#feestatement').modal('show');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: base_url + 'fee/statement',
        method: 'post',
        dataType : "json",
        data: Formfeestatements,

        success: function (result) {

            var balancedue = 0;
            var count = 0;
            var Transactions = result.Transactions;
            var studInfo = result.student;
            var fee_statement_content = '';
            if(Transactions.length>0){

                $.each($(Transactions),function(key,value){

                   count++;

                   if(value.tr_Status!='Close')
                   {
                        balancedue =  balancedue+value.bl_Amt ;

                   }

                })
            }



            if(result.type==1){

                fee_statement_content += `<div class="container ">
                <div class="card">
                    <div class="card-header">
                        <div>Invoice</div>
                        <strong>01/01/01/2018</strong>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-12">
                                <h3>Statement</h3>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <strong>To</strong>
                                </div>
                                <div>
                                    <strong>${studInfo.name}</strong>
                                </div>
                                <div>${studInfo.contact.pnt_mail_Add}</div>
                            </div>

                            <div class="col-sm-6">
                                <div><strong class="text-uppercase text-dir-rtl">statement No.</strong> #10021</div>
                                <div class="text-dir-rtl"><strong class="text-uppercase text-dir-rtl">Date</strong> ${result.date}</div>
                                <div><strong class="text-uppercase">total Due</strong> ${balancedue}</div>
                                <div class="text-uppercase"><strong>enclosed</strong></div>
                            </div>
                        </div>

                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Open Amount</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                                $.each($(Transactions),function(key,value){
                                    var trDate = moment(value.tr_Date).format('YYYY-MM-DD')
                                    fee_statement_content +=`
                                    <tr>
                                        <td>${trDate}</td>
                                        <td>invoice #${value.tr_Id}: ${trDate}</td>
                                        <td>${value.dr_Amt}</td>
                                        <td>${value.bl_Amt}</td>
                                    </tr>`;
                                });

                                fee_statement_content +=`
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>`;


            }else if(result.type==2){

                fee_statement_content += `<div class="container ">
                <div class="card">
                    <div class="card-header">
                        <div>Invoice</div>
                        <strong>01/01/01/2018</strong>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-12">
                                <h3>Statement</h3>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <strong>To</strong>
                                </div>
                                <div>
                                    <strong>${studInfo.name}</strong>
                                </div>
                                <div>${studInfo.contact.pnt_mail_Add}</div>
                            </div>

                            <div class="col-sm-6">
                                <div><strong class="text-uppercase">statement No.</strong> #10021</div>
                                <div><strong class="text-uppercase">Date</strong> ${result.date}</div>
                                <div><strong class="text-uppercase">total Due</strong> ${balancedue}</div>
                                <div class="text-uppercase"><strong>enclosed</strong></div>
                            </div>
                        </div>

                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                                $.each($(Transactions),function(key,value){
                                    var trDate = moment(value.tr_Date).format('YYYY-MM-DD')

                                    fee_statement_content +=`
                                    <tr>`;

                                    if(value.tr_Type == "1"){
                                        fee_statement_content +=`<td>${trDate}</td>
                                        <td>invoice #${value.tr_Id}: ${trDate}</td>
                                        <td>${value.dr_Amt}</td>
                                        <td>${value.bl_Amt}</td>`;
                                    }else{

                                        fee_statement_content += `<td>${trDate}</td>
                                        <td>Payement</td>
                                        <td>${value.cr_Amt}</td>
                                        <td>${value.bl_Amt}</td>`;
                                    }


                                });

                                fee_statement_content +=`</tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>`;

            }else if(result.type==3){

                fee_statement_content += `<div class="container ">
                <div class="card">
                    <div class="card-header">
                        <div>Invoice</div>
                        <strong>01/01/01/2018</strong>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-12">
                                <h3>Statement</h3>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <strong>To</strong>
                                </div>
                                <div>
                                    <strong>${studInfo.name}</strong>
                                </div>
                                <div>${studInfo.contact.pnt_mail_Add}</div>
                            </div>

                            <div class="col-sm-6">
                                <div><strong class="text-uppercase">statement No.</strong> #10021</div>
                                <div><strong class="text-uppercase">Date</strong> ${result.date}</div>
                                <div><strong class="text-uppercase">total Due</strong> ${balancedue}</div>
                                <div class="text-uppercase"><strong>enclosed</strong></div>
                            </div>
                        </div>

                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Recieved</th>
                                    </tr>
                                </thead>
                                <tbody>`;
                                var totalPayment = 0;
                                var totalRecieved =0;
                                var recieved = 0;
                                $.each($(Transactions),function(key,value){
                                    var trDate = moment(value.tr_Date).format('YYYY-MM-DD')

                                    recieved = parseInt(value.dr_Amt) - parseInt(value.bl_Amt);
                                    totalPayment += parseInt(value.dr_Amt);
                                    totalRecieved += recieved;
                                    fee_statement_content +=`
                                    <tr>`;

                                    if(value.tr_Type == "1"){
                                        fee_statement_content +=`<td>${trDate}</td>
                                        <td>invoice #${value.tr_Id}: ${trDate}</td>
                                        <td>${value.dr_Amt}</td>
                                        <td>${parseInt(value.dr_Amt) - parseInt(value.bl_Amt)}</td>`;
                                    }

                                });

                                fee_statement_content +=`<tr><th colspan="2"></th><th class="text-uppercase" >total amount</th><th class="text-uppercase">total recived</th></tr>
                                    <tr><td colspan="2"></td><td>${totalPayment}</td><td>${totalRecieved}</td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>`;

            }



            var statement_date =  parseInt($("#statement_date").val().length) ;


            $("#Formfeestatements .name").text(result.student.name);

            var yourFormattedDate =moment(result.date).format('YYYY-MM-DD')

            $("#Formfeestatements #statement_date").val(yourFormattedDate);


            $("#Formfeestatements .Open").text(new Intl.NumberFormat().format(parseInt(parseInt(balancedue))));
            $("#Formfeestatements .count").text(count);

            $(".applyTransarow").hide();
            $("#statement_date_balance").show();
            $("#contentFormInvoive").show();

            $('.print_fee_statement').html(fee_statement_content);

            return false;
        }

    })

});

$(document).on('click', '.fee-statemnt-trans-btn', function(){
    $('#print-feestatement').modal('show');
    return false;
});


 
$(".applyTransarow").hide();




/* Print fee */
$(document).on("click", ".printFessBill", function () {
    var $this = $(this);
    var stdId = $this.data("id");
    var transaction = $this.data("transaction");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
        },
    });

    $.ajax({
        url: base_url + "fee/bill-print",
        method: "post",
        dataType: "json",
        data: { std_Id: stdId, tran_Id: transaction },
        success: function (result) {

            if (result.error) {
                swal({
                    title: result.error,
                    type: result.type,
                    showCancelButton: false,
                    showConfirmButton: false,
                    timer: 2000,
                });
            } else {

                if (result.schedulefee.student_accounts) {
                    var student_arr_accounts = JSON.parse(result.schedulefee.student_accounts);
                } else {
                    var student_arr_accounts = [];
                }

                $("#printfeechalan").modal("show");
                var month = moment(new Date(result.transaction.tr_Date)).format("MMM-YYYY");
                
                var i=0;
                $(".fee-bill").html("");
                
                var arr_bill = ['Student', 'Department', 'Bank']
                
                for(i; i<3; i++){

                    var content = '';
                content += `<div class="col-md-4">
                <div class="card card_size" style='border:1px solid black;'>
                   <div class="card-header" style="padding:15px 0" >
                      <div class="col-md-12 text-center lh-1 mb-2" style="border-bottom: 1px dashed;">
                         <h6 class="fw-bold">Fee Slip</h6>
                         <span class="fw-normal">Fee slip for the month of ${ month } <span id='date' class="font-weight-bold"></span></span>
                      </div>
                      <div class="row m-0 p-1" style="border-bottom: 1px dashed;">
                         <div class="col-sm-8 ">
                            <table class="table-no-bordered table-full-width">
                               <tbody style="line-height: 17px!important;">`;

                               content +=
                                  `<tr>
                                     <th class="w-50">
                                        <p class="font-weight-bold small ">Adm No.
                                        </p>
                                     </th>
                                     <td class="w-50">
                                        <p class=""> ${ result.studentData.studentAdissionNo}
                                        </p>
                                     </td>
                                  </tr>
                                  <tr>
                                     <th>
                                        <p class="font-weight-bold small ">Student Name:
                                        </p>
                                     </th>
                                     <td>
                                        <p class="">${ result.studentData.name}
                                        </p>
                                     </td>
                                  </tr>
                                  <tr>
                                     <th>
                                        <p class="font-weight-bold small ">Father Name:
                                        </p>
                                     </th>
                                     <td>
                                        <p class="">${ result.studentData.father.name}
                                        </p>
                                     </td>
                                  </tr>
                                  <tr>
                                     <th>
                                        <p class="font-weight-bold small ">Class:
                                        </p>
                                     </th>
                                     <td>
                                        <p class="">${ result.studentData.class}
                                        </p>
                                     </td>
                                  </tr>
                               </tbody>
                            </table>
                         </div>
                         <div class="col-sm-4  col-lg-4  justify-content-end" style="font-size:80%">
                            <table class="  table-full-width">
                               <tbody class="w-100">
                                  <tr>
                                     <th>Issue Date</th>
                                  </tr>
                                  <tr>
                                     <td>${ result.schedulefee.issue_date}</td>
                                  </tr>
                                  <tr>
                                     <th>Due Date</th>
                                  </tr>
                                  <tr>
                                     <td>${ result.schedulefee.due_Date}</td>
                                  </tr>
                               </tbody>
                            </table>
                         </div>
                      </div>
                      <div class="card-body m-0 p-1">
                         <h6 class="card-title">Fee Bill Detail</h6>`;

                         content += `<table class="table table-bordered" style="line-height: 5px!important;"
                            >
                            <thead class="table-secondary">
                               <tr>
                                  <th>Particulars</th>
                                  <th class="text-right"><span>Amount(In Rs)</span></th>
                               </tr>
                            </thead >
                            <tbody>`;
                            var j = 1;
                        var total_withduedate = 0;
                        var total_withafter = 0;

                        $.each($(student_arr_accounts), function (key, value) {
                           if(value.name!='Discount Allowed'){
                                total_withduedate =
                                    total_withduedate + parseInt(value.amount);
                            }
                               content += `<tr>
                                  <th>${value.name}</th>
                                  <td class="text-right">${new Intl.NumberFormat().format(
                                    parseInt(value.amount)
                                )}</td>
                               </tr>`;
                            j++;
                        });

                        content +=`<tr>
                                  <th ><p>Payable within</p><p> due date</p></th>
                                  <td class="text-right">${new Intl.NumberFormat().format(
                                    parseInt(total_withduedate)
                                )}</td>
                               </tr>
                               <tr >
                                  <th ><p>Payable after</p> <p>due date</p></th>
                                  <td class="text-right">${new Intl.NumberFormat().format(
                                    parseInt(total_withduedate) +
                                        parseInt(result.schedulefee.fine_due_Date)
                                )}</td>
                               </tr>
                            </tbody>
                         </table>
                      </div>
                      <div class=" card-footer">
                         <h6 class="text-left font-weight-light ">Address:  <span class='font-weight-bold'> ${result.studentData.School[0]['school_Name']}, ${result.studentData.School[0]['school_Add']} </span></h6>
                         <h6 class="text-left font-weight-light">Note: <span class='font-weight-bold'> This Challan Form
                            vaild is valid up to 5 days after due date</span>
                         </h6>
                         <div class="d-flex flex-column float-right mt-3">
                            <h5>${arr_bill[i]} Copy</h5>
                            <h3>-------------</h3>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
            </div>`;


            $(".fee-bill").append(content);

            } 
            // $(".fee-bill").append(content);



            $("#printfeechalan").modal("hide");
            }
        },
    });
});

/* print fee ends */

$(document).on("change","#Formfeestatements .report_type",function() {
    var $this = $(this); 

    $("#date_range").hide();

    if($($this).val()==1){

    }else if ($($this).val()==2){

        $("#date_range").show();
    }
    else if ($($this).val()==3){
         $("#date_range").show();
        
    }

    $(".applyTransarow").show();
    $("#statement_date_balance").hide();
    $("#contentFormInvoive").hide();



 });

$(document).on("change","#example-select-all",function() {
        if (this.checked) {
            $(".select_all").each(function() {
                var $this = $(this);
                this.checked=true;
                $this.val(1);
            });
        } else {
            $(".select_all").each(function() {
                var $this = $(this);
                this.checked=false;
                $this.val(0);
            });
        }
 });

$(document).on("change",".select_all",function() {
        if (this.checked) {
                var $this = $(this);
                $this.val(1);
            
        } else {
                var $this = $(this);
                $this.val(0);
            
        }
 });




$("#formadjustfees").submit( function(){   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $(".errorsss").hide();   
    var formadjustfees =  $('#formadjustfees').serialize();
    $.ajax({
        url: base_url + 'schedulefee/adjust_fee/submit',
        method: 'post',
        dataType : "json",
        data:  formadjustfees,
        success: function(result){
            
            if (result.errors) {
                $('.add-div-error').text('');
                $.each(result.errors, function(key, value){
                    $('.add-div-error.'+key).text(value);
                    $('.add-div-error.'+key).show();
                });
            }else {

                swal({
                        title: result.message,
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                });
                 
                var page = $("#page").val()
                if(page=='detail'){
                    $(".feebalance_bydue").text(new Intl.NumberFormat().format(parseInt(parseInt(result.balance))));
                    loadStudentTransaction();
                }else if(page=='listing'){
                   loadincomData();
                } 
                $("#adjustfees").modal('hide');
                
            }                   
        }
         
    });
    return false;
});

$("#MymodalPreventScriptForm").submit( function(){
    var classdata =  $('#MymodalPreventScriptForm').serialize();
    var table = `<thead class="table-secondary">
                           
                    <th class="" width="10%">S.No</th>
                             
                    <th class="w-35">Description</th>
                    <th class="text-right w-15">Amount</th>
                    <th class="text-center" width="8%">Credit Invoice</th>
                </thead>
                <tbody>`;

    var total = 0;
    $('.balancehidden').each( function(){
        var $this = $(this);
        var amount= $this.val();
        var id = $this.data('id');

        var seleelct = $("#example-select-all"+id).val();
        var date = $("#date"+id).val();
 


        if( seleelct==1)
        {
            total  = total+parseInt(amount);
            table += `<tr id="link${id}" class="linkings">
                        <td>${id}</td>
                        <td>
                            <input type="hidden" name="no[${id}]" value="${id}" id="adjust_tr_Id${id}"/>
                            <input type="hidden" name="amount[${id}]" value="${amount}" id="amount${id}"/>
                            <a href="#">Invoice #${id}</a> (${date})
                        </td>
                        <td class="text-right">${new Intl.NumberFormat().format(parseInt(amount))}</td>
                        <td class="text-center">
                            <button class="btn btn-simple btn-warning btn-icon unlinkind"  data-id=${id} title="Unlink invoice"><i class="fa fa-history "></i></button>
                        </td>
                       </tr>`;
        }

    })


    table +=`  <tr>
                    <td></td>
                    <td><a href="#"></a> </td>
                    <td class="text-right"></td>
                    <td class="text-center">
                      <button class="btn btn-simple btn-success btn-icon linkpending" onclick="javascript::void(0)"><i class="fa fa-chain " title="Link invoice"  name="next"></i></button>
                    </td>
                </tr>
                  </tbody>`; 
        
     $(".total").text(new Intl.NumberFormat().format(parseInt(total)));
     $("#total_amount").val(total);

    $(".errorsss").hide();

    $("#feeadjusttable").html(table);    
   
    $("#MymodalPreventScript").modal('hide');
    

    return false;
})


$(document).on("click", ".unlinkind", function () {


    var $this = $(this);
    var id= $this.data('id');
    $('#MymodalPreventScript').modal('show');
    $('#example-select-all'+id).prop('checked', false);
    $('#example-select-all').prop('checked', false);
    $('#example-select-all'+id).val(0);
    return false;
})




 
/*  Link Pending Invoice  */

$(document).on("click", ".linkpending", function () {
        
        var $this =$(this);
        var id =$("#adjustfees #student_id").val();
        var transaction =$("#adjustfees #transaction").val();
        $('#MymodalPreventScript').modal('show');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + 'schedulefee/link/pending',
            method: 'post',
            dataType : "json",
            data: { std_Id:id,'transaction':transaction },
            success: function (result) { 
                var dr;
                var counter = $("#counter").val();
                if(counter==0) {  
                 
                 $("#transactionsdatatablelink tbody").html('');
                    
                    if(result.transactions.length>0){


                        $.each($(result.transactions),function(key,value){
                        dr +=`<tr>
                                    <td><input type="checkbox" class="select_all" name="select_all" value="0" id="example-select-all${value.tr_Id}"></td>
                                    <td>${value.tr_Date}</td>
                                    <td>${value['type']}</td>
                                    <td>
                                            <input type="hidden" name="date[${value.tr_Id}]" value="${value.tr_Date}" id="date${value.tr_Id}"/>
                                            <input type="hidden" name="schedule_id[${value.tr_Id}]" value="${value.schedule_id}" id="schedule_id${value.tr_Id}"/>
                                            <input type="hidden" name="tr_Status[${value.tr_Id}]" id="tr_Status${value.tr_Id}"/>
                                            <input type="hidden" class="balancehidden" data-id="${value.tr_Id}" name="balance[${value.tr_Id}]" value="${value['balance']}"/>
                                            ${value['tr_Id']}</td>
                                        <td>${value['due_Date']}</td>
                                        <td>${value['balance']}</td> 
                                        <td>${value['amount']}</td> 
                                        <td>${value['tr_Status']}</td> 
                                  </tr> `;   
                            
                        });

                        table =` <tr>
                                       
                                    <td></td>
                                    <td><a href="#"></a> </td>
                                    <td class="text-right"></td>
                                    <td class="text-center">
                                          <button class="btn btn-simple btn-success btn-icon"><i class="fa fa-chain linkpending" title="Link invoice"  name="next"></i></button>
                                    </td>

                                </tr>`;

                        $("#transactionsdatatablelink tbody").append(dr);    

                    }





                    $("#counter").val(1);

                }


  
            }   

        })   
 
        return false; 

             
});


 
$(document).on("keyup", ".amountPayable", function () {

    var value = $(".amountPayable").val();
    $(".balancehidden").each( function(){       
 
        var $this = $(this);
        var values_balance = $this.val();
        if(parseInt(value) >= parseInt(values_balance)){
           value = value-values_balance;
            $("#payments"+$this.data('id')).val(values_balance);    
            $("#tr_Status"+$this.data('id')).val('Close');    
            return true;        
        }

    if(value==0){
        $("#tr_Status"+$this.data('id')).val('Open');    
        $("#payments"+$this.data('id')).val(value); 
         
     }

    if(parseInt(value) <= parseInt(values_balance) && value!=0){
        $("#tr_Status"+$this.data('id')).val('Partail');    
        $("#payments"+$this.data('id')).val(value); 
         value =0;
    }





    })
   
})

$("#fee_reciev_form").submit( function(e){
       e.preventDefault();
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $(".errorsss").hide();
       
       var classdata =  $('#fee_reciev_form').serialize();
        
        $.ajax({
            url: base_url + 'schedulefee/payment-recieve',
            method: 'post',
            dataType : "json",
            data:  classdata,
            success: function(result){
                
                if (result.errors) {
                    $('.add-div-error').text('');
                    $.each(result.errors, function(key, value){
                        $('.add-div-error.'+key).text(value);
                        $('.add-div-error.'+key).show();
                    });

                }else {

                    swal({
                            title: result.message,
                            type: result.types,
                            showCancelButton: false,
                            showConfirmButton: false,
                            timer: 1000
                    });

                    var page = $("#page").val()
                    if(page=='detail'){
                        $(".feebalance_bydue").text(new Intl.NumberFormat().format(parseInt(parseInt(result.balance))));

                       loadStudentTransaction();
                    }else if(page=='listing'){
                        loadincomData();
                    } 



                  

                    $("#feepayment").modal('hide');                     
                }                   
            }
             
        });       
               
    });


/*  Generate Payment */

$(document).on("click", ".generatebill", function () {
        
    var $this =$(this);
    var id   = $this.data('id');
    $('#feeinvoice').modal('show');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
   
    $.ajax({
        url: base_url + 'schedulefee/generate',
        method: 'post',
        dataType : "json",
        data: { std_Id:id },
        success: function (result) {
            
            if(result.student_accounts){
                var arr_student_accounts = JSON.parse(result.student_accounts);
            
            }else{
                var arr_student_accounts = [];
            
            }
            var i = 0;
            var table;

            $('#feeinvoiceform #std_Id').val(id);
            $('#feeinvoice #student_name').text(result.student);
            $('#feeinvoiceform #feeTerm').val(result.term).attr('selected','selected');
            $('#feeinvoiceform #feeTerm').selectpicker('refresh');
            
            var yourFormattedDate =moment(result.issue_date).format('YYYY-MM-DD')
            $("#feeinvoiceform #feeissue_date").val(yourFormattedDate);
            var yourFormattedDate =moment(result.due_Date).format('YYYY-MM-DD')
            $("#feeinvoiceform #feedue_Date").val(yourFormattedDate);
            $('#feeinvoiceform #schedule_id').val(result.fee_sch_Id);

            if(arr_student_accounts.length>0){

                table +=`<thead class='table-secondary' >
                                <tr>
                                  <th class='text-center' width="7%">S.No</th>
                                  <th class="w-65">Account</th>
                                  <th class="text-right">Amount
                                  </th>
                                   
                                </tr>
                                </thead>
                            <tbody>`;
                            var i=1;
                var total_withduedate = 0;
                var total_withafter = 0;
                
                $.each($(arr_student_accounts),function(key,value){


                    if(value.name!='Discount Allowed'){
                      total_withduedate =total_withduedate+ parseInt(value.amount);
                    }



                    table +=`<tr>
                                  <td class="text-center">${i}</td>
                                  <td>${value.name}
                                  <input type="hidden" name="accounts[] " value="${value.id}"/>
                                  <input type="hidden" name="amount[] " value="${value.amount}" />
                                  </td>
                                  <td class="text-right">Pkr ${new Intl.NumberFormat().format(parseInt(value.amount))}</td>
                                  
                                </tr>`
                   
                     i++;
                    
                });   
                table +=`<tr>
                                  <th colspan="2" class="text-right">Total Before Due date</th>

                                  <th class="text-right">Pkr ${new Intl.NumberFormat().format(parseInt(total_withduedate))} </th>
                                  <th></th>

                                </tr>`;
                    table +=`<tr>
                                  <th colspan="2" class="text-right">Fine after due date</th>

                                  <th class="text-right">Pkr ${new Intl.NumberFormat().format(parseInt(parseInt(result.fine_due_Date)))} </th>
                                  <th></th>

                                </tr>`;


                    table +=`<tr>
                                  <th colspan="2" class="text-right">Total After Due date</th>

                                  <th class="text-right">Pkr ${new Intl.NumberFormat().format(parseInt(total_withduedate)+parseInt(result.fine_due_Date))} </th>
                                  <th></th>

                                </tr>`;          


                table +=`</table>`;




            }

            $(".feebalance_bydue").text(new Intl.NumberFormat().format(parseInt(parseInt(result.open))));
            $("#genrate_bill_tbale").html(table);
        }   

    })   
             
});






$("#feeinvoiceform").submit( function(e){
       e.preventDefault();
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $(".errorsss").hide();
      
       var classdata =  $('#feeinvoiceform').serialize();
        
        $.ajax({
            url: base_url + 'schedulefee/student-generate-schedul-save',
            method: 'post',
            dataType : "json",
            data:  classdata,
            success: function(result){
               
                if (result.errors) {
                    swal({
                            title:  result.message,
                            type: result.types,
                            showCancelButton: false,
                            showConfirmButton: false,
                            timer: 1000
                    });
                    var page = $("#page").val();
                  
                    if(page=='detail'){
                       loadStudentTransaction();
                       $(".feebalance_bydue").text(new Intl.NumberFormat().format(parseInt(result.balance)));

                    }else if(page=='listing'){
                        loadincomData();
                    } 
                    $("#feeinvoice").modal('hide');
                    

                }                  
            }
             
           });       
               
    });
 
function loadStudentTransaction() {
     
     var id = $("#hidden_id").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    }); 
    $.ajax({            
        url: base_url + 'income/detail/'+id+'?type=transaction',
        type: 'get',
        success: function (data) {
             var table = $('#datatable').DataTable();
            table.destroy(); 
            $('#my-tab-content').html(data);

            $("#datatable").DataTable();
        }
    });
} 


$(".OtherChargesmodel").click( function(){
    
    var $this = $(this);
    var mtarget = $this.data('mtarget');
    var myid = $this.data('myid');
    var labels = $this.data('labels');
  
    if(($this).prop("checked") == true){
        $('#'+mtarget).modal('show');
    }else if(mtarget===labels){
        
        $('#'+mtarget).modal('show');
    } else{
         
       $("#form_"+myid+" input").each(function(){
            $(this).val('');
             
        })

        calculate();         
    }
    

})


$(document).on("change","#bill_Freq ",function() {
    
    var $this  =$(this); 
    var value = $this.find('option:selected').val();
   
    if(value==3){
       
        var Tuition_Fee_per =$("#Tuition_Fee_per").val();

        $("#TuitionFee").val(parseInt(Tuition_Fee_per)*1);

    }else if(value==1){
       
        var Tuition_Fee_per =$("#Tuition_Fee_per").val();
          
        $("#TuitionFee").val(parseInt(Tuition_Fee_per)*12);

    }else if(value==2){
       
        var Tuition_Fee_per =$("#Tuition_Fee_per").val();
          
        $("#TuitionFee").val(parseInt(Tuition_Fee_per)*4);

    }

  calculate();


})


$(document).on("keyup","#fine_due_Date ",function() {

    calculate();
});



$(document).on("click",".modal-dialog .close",function() {

    var $this = $(this);
    var id=$this.data('id'); 
    $("#"+id).modal('hide');

})



$(document).on("click",".model_close_save",function() {
    var $this  =$(this); 
    var id = $this.data('id');
    var totalPoints = 0;

    var basicpay = $("#Tuition_Fee_per").val();
    $('.total_income').each(function(){
        var $this2 = $(this);
        var ss = $this2.data('id');
        var vaaa = $this2.val();
        var vlss = (vaaa)?vaaa:0;
        
        var text =$this2.data('text');
         

       if($('#check_'+ss).is(':checked') && text!='Discount Allowed'){ 
            totalPoints = parseInt($(this).val()) + totalPoints;
        }else if($('#check_'+ss).is(':checked')){
            var ammount = $("#total_income"+ss).val();
           
            var total_fee=basicpay -  ammount ;
            $("#TuitionFee").val(total_fee);
        }



    });


    $("#OtherCharges").val(totalPoints);
    $("#OtherChargest").text("Pkr "+totalPoints);
    calculate();
    $("#admissionsfeeadd_"+id).modal('hide');
    return false;
});


function calculate(){
      
    var totalPoints = 0;
    var basicpay = $("#Tuition_Fee_per").val();

    $('.total_income').each(function(){
        var $this2 = $(this);
        var ss = $this2.data('id');
        var vaaa = $this2.val();
        var vlss = (vaaa)?vaaa:0;
        var text =$this2.data('text'); 
        if($('#check_'+ss).is(':checked') && text!='Discount Allowed'){ 
            totalPoints = parseInt($(this).val()) + totalPoints;
        }else if($('#check_'+ss).is(':checked') && text=='Discount Allowed'){
            var ammount = $("#total_income"+ss).val();
            var total_fee=basicpay -  ammount ;
            $("#TuitionFee").val(total_fee);

        }else if($('#check_'+ss).is(':checked') && $("#total_income"+ss).val()!=''){
            
        }

    });
     
    $("#OtherCharges").val(totalPoints);
    $("#OtherChargest").text("Pkr "+totalPoints);


    var TuitionFee = $("#TuitionFee").val();
    $("#TuitionFeett").text("Pkr"+new Intl.NumberFormat().format(parseInt(TuitionFee)));
    var OtherCharges = $("#OtherCharges").val();
    $("#totalPayable_by_due_datet").text("Pkr "+fine_due_Date); 

    if(OtherCharges==''){
        OtherCharges= 0;

    }

    

    var Payable_by_due_date = $("#Payable_by_due_date").val(parseInt(TuitionFee)+parseInt(OtherCharges));
    
    var total_bydudate =parseInt(TuitionFee)+parseInt(OtherCharges);
   

    var Payable_by_due_datet = $("#Payable_by_due_datet").text(new Intl.NumberFormat().format(parseInt(total_bydudate)));
    var fine_due_Date = $("#fine_due_Date").val();

    
    if(fine_due_Date==''){
        
        fine_due_Date= 0;

    }
    $("#totalPayable_fine").val(parseInt(fine_due_Date));    
    $("#totalPayable_finet").text("Pkr "+new Intl.NumberFormat().format(parseInt(fine_due_Date)));


   
    
    $("#totalPayable_by_due_datet").val("Pkr "+(parseInt(TuitionFee)+parseInt(OtherCharges))); 
   
    $("#total_Payable_after_due_date").val(parseInt(TuitionFee)+parseInt(OtherCharges)+parseInt(fine_due_Date));
    var number =parseInt(TuitionFee)+parseInt(OtherCharges)+parseInt(fine_due_Date);
    var totalaftertu = new Intl.NumberFormat().format(number);


    $("#total_Payable_after_due_datet").text("Pkrs "+totalaftertu);
    
 

}

$(document).on("change","#acc_type_Id , #acc_parent",function() {
    var $this  =$(this);  
    var id = $this.find('option:selected').data('id');
    var idattr = $this.attr('id');
    var acc_Desc = $this.find('option:selected').data('description');
    $("#acc_Code").val(id);  
    $("#acc_Desc").text(acc_Desc);  
});

/* Add Count */

function loaddata() {
 
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + 'chartOfAccount?type=Chartofaccounts',
            type: 'get',
            success: function (data) {
                $('#diarytable').empty();
                $('#diarytable').html(data);


            }
        });
} 


$("#FormAccountstatment").submit( function(e){


       e.preventDefault();
       $.ajaxSetup({
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $(".errorsss").hide();
      
       var classdata =  $('#FormAccountstatment').serialize();
        
        $.ajax({
            url: base_url + 'add_charted_account',
            method: 'post',
            dataType : "json",
            data:  classdata,
            success: function(result){
                
                if (result.errors) {
                    $('.add-div-error').text('');
                    $.each(result.errors, function(key, value){
                        $('.add-div-error.'+key).text(value);
                        $('.add-div-error.'+key).show();
                    });
                }else {

                    swal({
                            title: result.message,
                            type: "success",
                            showCancelButton: false,
                            showConfirmButton: false,
                            timer: 1000
                    });

                    $("#accountingModal").modal('hide');
                    loaddata();
                }                   
            }
             
        });       
               
    });
      


    /*
        Delete Chart of account 
    */

    $(document).on('click', ".delete-chartOfAccount-btn", function (e) {

        var id = $(this).data('id');
        
        swal({
                title: "Are you sure?",
                text: "You want delete it!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                cancelButtonClass: "btn-choice",
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: true,

            },
            function (isConfirm) {
                if (isConfirm) {
                    
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: base_url + 'chartOfAccount/delete',
                        method: 'post',
                        dataType : "json",
                        data: { acc_Id:id,
                                 
                        },
                        success: function (data) {
                                swal({
                                icon: 'warning',
                                title: "Deleted successfully!",
                                showCancelButton: false,
                                showConfirmButton: false,
                                type: "success",
                                timer: 1000
                            });
                            
                            loaddata();

                        }


                    })


                     

                }  
            });
    });


    $(document).on("click", ".show-accountChart-btn", function () {
        
      
        var id   = $(this).data('id');
        $('#show-chartedAccount-modal').modal('show');
        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + 'chartOfAccount/show',
            method: 'post',
            dataType : "json",
            data: { acc_Id:id, 
                     
                     
            },
            success: function (result) {

                $("#show-acc_type_Id").text(result.acc_Type);
                $("#show-acc_Name").text(result.acc_Name); 
                $("#show-acc_Code").text(result.acc_Code); 
                $("#show-acc_Date").text(result.acc_Date); 
                $("#show-acc_Balance").text(result.acc_Balance); 
                $("#show-description").text(result.description); 
                if(result.acc_parent==0){

                    $(".acc_parent").hide();

                }
                else
                {
                     $(".acc_parent").show();
                      $("#show-acc_parent").text(result.acc_parent); 
                     
                }
                  
            }
        })   
 

             
    });


      $(document).on("click", ".edit-chartOfAccount-btn", function () {
        
       
        var id   = $(this).data('id');
       
        $('#accountingModal').modal('show');
        
        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + 'chartOfAccount/edit',
            method: 'post',
            dataType : "json",
            data: { acc_Id:id, 
                     
                     
            },
            success: function (result) {
 
                $("#acc_Id").val(result.acc_Id); 
                $("#acc_Name").val(result.acc_Name); 
                $("#description").text(result.description); 
               
                $("#acc_Date").val(result.acc_Date); 
                $("#acc_Balance").val(result.acc_Balance); 
                $("#description").val(result.description); 
                $("#acc_Desc").val(result.description2); 
                $("#acc_Code").val(result.acc_Code); 
                $("#acc_type_Id").val(result.acc_type_Id).attr('selected','selected'); 
                $("#acc_type_Id").selectpicker('refresh');
                $("#acc_type_Id").prop('disabled',true);
                $("#acc_Code").prop('disabled',true);
                $("#acc_parent").prop('disabled',true);
                $("#acc_type_Id").selectpicker('refresh');
                $("#inlineCheckbox1").prop('disabled',true);
                 
                if(result.acc_parent==0){

                     $("#inlineCheckbox1").prop('checked',false);
                     $("#acc_parent").prop('disabled', true).selectpicker('refresh');

                }
                else
                {
                     $("#inlineCheckbox1").prop('checked',true);
                     $("#acc_parent").val(result.acc_parent).attr('selected','selected'); 
                     $("#acc_parent").prop('disabled',true);
                     $("#acc_parent").selectpicker('refresh');


                    //$("#show-acc_parent").text(result.acc_parent); 
                     
                }
                  
            }
        })   

 
             
    });


/*

*/
// $(document).on("change","#Term" , function(){

//     var $this = $(this);

//     var next_fee_Date = $("#next_fee_Date").val();
//     alert(next_fee_Date);


// })
 
$(document).on("click", ".close_admission", function () {
    var id   = $(this).data('id');
    $("#"+id).modal('hide');
});


 $(document).on('change','.filter_students#class',function (e) {

 })


 $(document).on('change','.filter_students#class,.filter_students#section',function (e) {
        var $this = $(this); 

        var  student_Class   = $('select#class option:selected').val();


       
        
        if($this.attr('id')=='class'){

          $('select#section').empty();

        }

        var  student_section = $('select#section option:selected').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        
        $.ajax({
            url: base_url +'income',
            type: "POST",
            data: {  
                    'student_class'     : student_Class,
                    'student_section'   : student_section,
                    'type'              : 'transaction'
            },
            success:function(data) {
                $('#datatable').DataTable().destroy();
                $("#datatable").html(data); 
                var table = $('#datatable').DataTable();
                table.draw();
            }
        });
        
    });


     $(document).on("change",".filter_students#class", function(event){
        
        event.stopPropagation();
        var id = $(this).val();
       
        $.ajax({
            url: base_url +'get_section/'+id,    
            type   : 'get',
            data   : {id: id},
            success: function(response){
              
                $(".filter_students#section").empty();
                var html='';
                html +=`<option value="">Select Section</option>`;
                $.each(response , function (key, value) {
                    html +=`<option value="${value.c_section_Id}">${value.class_section_name}`;
                });

                //alert(html);
                $(".filter_students#section").html(html);

                $(".filter_students#section").selectpicker("refresh");
            }
        });
    });



$("#FormAddstudentSchedule").submit( function(e){
       e.preventDefault();
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $(".errorsss").hide();
      
       var classdata =  $('#FormAddstudentSchedule').serialize();
        
        $.ajax({
            url: base_url + 'student-add-schedule',
            method: 'post',
            dataType : "json",
            data:  classdata,
            success: function(result){
                
                if (result.errors) {
                    $('.add-div-error').text('');
                    $.each(result.errors, function(key, value){
                        $('.add-div-error.'+key).text(value);
                        $('.add-div-error.'+key).show();
                    });
                }else {

                    swal({
                            title: result.message,
                            type: "success",
                            showCancelButton: false,
                            showConfirmButton: false,
                            timer: 1000
                    });

                    $("#schedulefee").modal('hide');

                    if($("#page").val()=='detail'){
                        loadStudentTransaction();

                    }
                    
                }                   
            }
             
           });       
               
        });
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
  
$(".allowancesmodel").click( function(){
    
    var $this = $(this);
    var mtarget = $this.data('mtarget');
    var labels = $this.data('labels');
    //alert(labels);  alert(mtarget);
    if(($this).prop("checked") == true){
        $('#'+mtarget).modal('show');
    }else if(mtarget===labels){
        $('#'+mtarget).modal('show');
    } else{



       $("#allowances_"+mtarget+' input').each(function(){
            $(this).val('');
        })
        calculate();         
    }
    

})




$(document).on("change", "#FormpaySchedule #payment_Mode", function (e) {
    var $this = $(this);
    var text = $("#FormpaySchedule #payment_Mode option:selected" ).text();
    var sid = $('.generatebill').data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    }); 

    $.ajax({            
        url: base_url + 'payroll/accountdropdown',
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

              $("#account_account").css('display','none')
             
             $("#account").prop("disabled", true);
               $('#account').selectpicker('refresh');


            if(text=='Bank'){

                $("#account").prop("disabled", false);
                $('#account').selectpicker('refresh');
               
                $("#account_account").css('display','block')

            }

            var selected;

            $.each(data.depostaccount, function( index,  value){
                if(value.acc_Id==sch_data){ selected = "selected";}
                dep +=`<option ${selected} value="${value.acc_Id}">${value.acc_Name}</option>`;
            });
           
            $("#FormpaySchedule #acc_Id").html(dep); 
            $('#FormpaySchedule #acc_Id').selectpicker('refresh');


            $("#FormpaySchedule #acc_Id").html(dep); 
            $('#FormpaySchedule #acc_Id').selectpicker('refresh');




        }
    });

}) 




/* View Payroll Schdule */
$(document).on("click", ".advancesalarypayrol", function () {
    var $this =$(this);
    var id   = $this.data('id');
    $('#advanceinvoice').modal('show');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: base_url + 'payroll/advance',
        method: 'post',
        dataType : "json",
        data: { id:id},
        success: function (result) {

            $('#advancesalaryForm #emp_id').val(result.emp.id);
            $('#advancesalaryForm #student_name').text(result.emp.name);
            $('#advancesalaryForm #advance_amount').val('');
            $('#schedulepay #Installments').val(1);
            $('#schedulepay #Installments').selectpicker("refresh");
            $('#advancesalaryForm #amount_per_pay_peroid').val(''); 
            $('#schedulepay #acc_Id').val('');
            $('#schedulepay #acc_Id').selectpicker("refresh");                
            var table = '';
            table +=`<thead class="table-secondary">
                                <tr>
                                  <th class="">Original Amount</th>
                                  <th>Due Amount</th>
                                  <th>Installment</th>
                                  <th>Pay Per Period</th>
                                  <th class="">Status</th>
                                </tr>
                                </thead>
                            <tbody>`;
            
            if(result.Advance_salary.length>0){
                var balanace = 0;
                $.each($(result.Advance_salary),function(key,value){   
                    table +=`<tr > 
                                <td>${value.total_amount}</td>
                                <td>${value.advance_amount}</td>
                                <td>${value.Installments}</td>
                                <td>${value.amount_per_pay_peroid}</td>
                                <td>Open</td> 
                            </tr>`;                                                               
                });   
            }


            table +=`</body>`;
            table +=`</table>`;
            $("#advanceSalaryList").html(table)
            
            
        }
    })   
 

             
});



$("#advancesalaryForm").submit( function(e){
       e.preventDefault();
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $(".errorsss").hide();
        var classdata =  $('#advancesalaryForm').serialize();
        $.ajax({
            url: base_url + 'payroll/advance/save',
            method: 'post',
            dataType : "json",
            data:  classdata,
            success: function(result){

                
                if (result.errors) {
                    $('#advancesalaryForm .add-div-error').text('');
                    $.each(result.errors, function(key, value){
                        $('#advancesalaryForm .add-div-error.'+key).text(value);
                        
                        $('#advancesalaryForm .add-div-error.'+key).show();
                    });
                }else {

                    swal({
                            title: result.message,
                            type: "success",
                            showCancelButton: false,
                            showConfirmButton: false,
                            timer: 1000
                    });

                    $("#advanceinvoice").modal('hide');
 
                    loaddata();
                }                     
            }
             
           });       
               
    });



$(document).on("change","#schedule_advanc", function(){
    var $this = $(this).find(':selected');
    $("#sadvance_amount").val($this.data('advance_amount'))
    $("#sInstallments").val($this.data('installments'))
    $("#advance_id").val($this.data('id'))
    $("#sadvance_total").val($this.data('total_amount'))
    $("#samount_per_pay_peroid").val($this.data('amount_per_pay_peroid'))  
})

$(document).on("click", ".viewschedulepayroll", function () {
    var $this =$(this);
    var id   = $this.data('id');
    $('#schedulepay').modal('show');
    var schedule   = $this.data('schedule');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: base_url + 'schedulepay/show',
        method: 'post',
        dataType : "json",
        data: { id:id,'schedule':schedule },
        success: function (result) {
            
            $('#schedulepay #name').val(result.empploye.name);
            $('#schedulepay #id').val(result.empploye.id);
            $('#schedulepay #cnic').val(result.empploye.cnic);
            $('#schedulepay #designation').val(result.empploye.designation);
            $('#schedulepay #email').val(result.empploye.email);
            $('#schedulepay #phone').val(result.empploye.phone);
            $('#schedulepay #personal_No').val(result.empploye.personal_No);
            $('#schedulepay #appt_Date').val(result.empploye.appt_Date);
            $('#schedulepay #basic_pay').val(result.schedulepay.basic_pay);
            $('#schedulepay #incr_rate').val(result.schedulepay.incr_rate);
            $('#schedulepay #no_of_days').val(result.schedulepay.no_of_days);
            $('#schedulepay #bill_Freq').val(result.schedulepay.bill_Freq);
            $('#schedulepay #bill_Freq').selectpicker("refresh");
            $('#schedulepay #working_hours').val(result.schedulepay.working_hours);
            $('#schedulepay #billing_rate').val(result.schedulepay.billing_rate);
            $('#schedulepay #payment_Mode').val(result.schedulepay.payment_Mode).attr('selected','selected');
            $('#schedulepay #payment_Mode').selectpicker('refresh');
            $('#FormpaySchedule #payment_Mode').trigger('change');
            $('#schedulepay #acc_Id').val(result.schedulepay.acc_Id);
            $('#schedulepay #acc_Id').selectpicker("refresh");
            $('#schedulepay #account').val(result.schedulepay.account);
            $('#schedulepay #account').selectpicker("refresh");
            var selectedSlara = 0;
            if(result.schedulepay.allowances!='' && result.schedulepay!='')
            {
 

                $.each(JSON.parse(result.schedulepay.allowances), function( index,  value){
                    if(value!=''){
                        $("#check_"+index).attr('checked','checked');
                        $('#FormpaySchedule #'+index).val(value);
                    }

                });
            }



            $("#schedule_advanc").html('');

             var Advance_salary=''; 
            if(result.Advance_salary!='' )
            {
                Advance_salary += "<option value=\"\">Select Advance salary</option>";
                $.each(result.Advance_salary, function( index,  value){
                      
                      Advance_salary +=`<option value="${value.id}" data-id="${value.id}" data-advance_amount="${value.advance_amount}" data-Installments="${value.Installments}"  data-amount_per_pay_peroid="${value.amount_per_pay_peroid}"   data-total_amount="${value.total_amount}"  >Total ${value.total_amount} Remaning amount ${value.advance_amount}</option>`;
                }); 
                 
            }

            $("#schedule_advanc").html(Advance_salary);
            $('#schedule_advanc').selectpicker("refresh");
            
             
            if(result.schedulepay.deductions!='' && result.schedulepay!='')
            {
                $.each(JSON.parse(result.schedulepay.deductions), function( index,  value){
                    if(value!=''){
                        $("#check_"+index).attr('checked','checked');
                        $('#FormpaySchedule #'+index).val(value);
                        if(index=='advance_id'){    
                            $('#schedule_advanc').val(value);
                            $('#schedule_advanc').selectpicker('refresh');
                        }
                        $("#schedule_advanc").trigger('change');                       
                    }
                });
            }
            var yourFormattedDate =moment(result.schedulepay.issue_date).format('YYYY-MM-DD')
            $("#schedulepay #issue_date").val(yourFormattedDate);
            var yourFormattedDate =moment(result.schedulepay.due_Date).format('YYYY-MM-DD')
            $("#schedulepay #due_Date").val(yourFormattedDate);
            var yourFormattedDate =moment(result.schedulepay.next_pay_date).format('YYYY-MM-DD')
            $("#schedulepay #next_pay_date ").val(yourFormattedDate);
            calculate();
                
        }
    })   
 

             
});

loadTransactionData(); 

function loadTransactionData() {
    var id = $("#hidden_id").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    }); 
    $.ajax({            
        url: base_url + 'payroll/detail/'+id+'?type=transaction',
        type: 'get',
        success: function (data) {
            $('#loadContent').empty();
            $('#loadContent').html(data);
        }
    });
} 


//loadTransactionData();


$(document).on('change','.filter_emptoy#status',function (e) {
        var $this = $(this); 


        var  status = $('.filter_emptoy#status option:selected').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        
        $.ajax({
            url: base_url +'payroll',
            type: "POST",
            data: {  
                    'status'     : status,
                    
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


/*  make Payment */

$(document).on("click", ".makepayment", function () {
    var $this =$(this);
    var id   = $this.data('id');
    var transaction   = $this.data('transaction');
    $('#makepayment').modal('show');
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url      : base_url + 'schedulepay/makepayments',
        method   : 'post',
        dataType : "json",
        data     : { 'id':id,'transaction':transaction },
        success  : function (result) { 
            
           
            $('#pay_reciev_form #paymentamount').text(0);
            $('#pay_reciev_form .amountPayable').val('');
            $("#makepayment #name").text(result.emp.name);
            $("#makepayment #id").val(id);
            
            $('#makepayment #receipt_no').val(parseInt(result.Transactions_latest.tr_Id)+1);
            var next_pay_date =moment(result.Pay_schedule.next_pay_date).format('YYYY-MM-DD');
            
            $("#makepayment #acc_type_Id").val(result.Pay_schedule.acc_Id).attr('selected','selected'); 
            $("#makepayment #acc_type_Id").selectpicker('refresh');

            $("#makepayment #next_pay_date").val(next_pay_date);


            var table = '';
             table +=`<thead class="table-secondary">
                                <tr>
                                  <th class="">Description</th>
                                  <th>Invoice Date</th>
                                  <th class="text-right flex ">Original Amount</th>
                                  <th class="text-right ">Open Balance</th>
                                  <th class="">Payment</th>
                                </tr>
                                </thead>
                            <tbody>`;
            if(result.transactions.length>0){
                var balanace = 0;
                $.each($(result.transactions),function(key,value){   
                    


                     
                    table +=`<tr > 
                                <td><a href="#">Invoice #${value.tr_Id}</a> </td>
                                <td>${value.tr_Date}</td>
                              
                                <td>${value.cr_Amt}</td>
                                <td>${value.bl_Amt}</td>
                                 <input type="hidden" name="schedule_id[${value.tr_Id}]" value="${value.schedule_id}" id="schedule_id${value.tr_Id}"/>
                                        <input type="hidden" name="tr_Status[${value.tr_Id}]" id="tr_Status${value.tr_Id}"/>
                                        <input type="hidden" class="balancehidden" data-id="${value.tr_Id}" name="balance[${value.tr_Id}]" value="${value['bl_Amt']}"/>
                                </td> 
                                <td><input type="number" readonly  class="form-control payments" id="payments${value.tr_Id}" name="payments[${value.tr_Id}]"></td>
                            </tr>`;                                                               
                });   
            }
            table +=`</body>`;
            table +=`</table>`;

             $("#payemptable").html(table);
        }   
    })       
});





/*  Adjust fee  */

$(document).on("click", ".adjust_fee", function () {
        
    var $this =$(this);
    var id   = $this.data('id');
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
        data: { std_Id:id },
        success: function (result) { 

            $("#adjustfees #stundet_name").text(result.student.name);
            $("#adjustfees #counter").val(0);
            $("#adjustfeesstd_Id").val(id);
            $("#adjustfees #student_id").val(id);
            $("#feeadjusttable body").html('');
            $("#transactionsdatatablelink body").html('');
            $('#adjustfees #receipt_no').val(parseInt(result.Transactions_latest.tr_Id)+1);

        }   

    })    
        
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
                    var income = $("#income").val()

                    if(income!=''){

                        loadStudentTransaction();

                    }

                    $("#adjustfees").modal('hide');
                    loadTransactionData();
                }                   
            }
             
        });


        return false;
})



$("#MymodalPreventScriptForm").submit( function(){

    var classdata =  $('#MymodalPreventScriptForm').serialize();

      var table = '';

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
             table += ` <tr id="link${id}">
                        <td>${id}</td>
                        <td>
                            <input type="hidden" name="no[${id}]" value="${id}" id="adjust_tr_Id${id}"/>
                            <input type="hidden" name="amount[${id}]" value="${amount}" id="amount${id}"/>
                            <a href="#">Invoice #${id}</a> (${date})
                        </td>
                        <td class="text-right">${new Intl.NumberFormat().format(parseInt(amount))}</td>
                        <td class="text-center">
                            <button class="btn btn-simple btn-warning btn-icon"><i class="fa fa-history unlinkind" data-id=${id} title="Unlink invoice"></i></button>
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
                </tr>`; 
        
     $(".total").text(new Intl.NumberFormat().format(parseInt(total)));
     $("#total_amount").val(total);

    $(".errorsss").hide();

    $("#feeadjusttable tbody").html('');    
    $("#feeadjusttable tbody").append(table);    
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
            data: { std_Id:id },
            success: function (result) { 
                var dr;
                var counter = $("#counter").val();
                if(counter==0) {  
                 $("#transactionsdatatablelink tbody").html('');
                    if(result.transactions.length>0){
                        $.each($(result.transactions),function(key,value){
                        dr +=`<tr>
                                    <td><input type="checkbox" class="select_all" name="select_all" value="1" id="example-select-all${value.tr_Id}"></td>
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

    $("#paymentamount").text($(".amountPayable").val());
   
})






$(".generatepayroll").click( function(e){

   e.preventDefault();
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
 
   

    $.ajax({
        url: base_url + 'schedulepay/generate/auto',
        method: 'post',
        dataType : "json", 
        success: function(result){
            
            swal({
                    title: result.message,
                    type: "success",
                    showCancelButton: false,
                    showConfirmButton: false,
                    timer: 1000
            });                                            
        }
    });                      
});



/*  Statments fee  */
 
 /  Statments fee  /

$(document).on("click", ".empstatement", function () {

    var $this =$(this);
    var id   = $this.data('id');
    var report_type   = $("#report_type").val();
    $("#report_type").val(report_type).attr('selected',"Selected");
    $("#Formemptatements #emp_id").val(id)
;
    $("#Formemptatements #applybtn").data('id',id);
    var stdate = $("#statement_date").val().length;
    if(stdate==0)
    {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        today = mm + '/' + dd + '/' + yyyy;
        var yourFormattedDate =moment(today).format('YYYY-MM-DD')
        $("#Formemptatements #statement_date").val(yourFormattedDate);
        $("#Formemptatements #end_date").val(yourFormattedDate);
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() ).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        today = mm + '/' + dd + '/' + yyyy;
        var yourFormattedDate =moment(today).format('YYYY-MM-DD')
        $("#Formemptatements #start_date").val(yourFormattedDate);
    }

    $("#date_range").show();
    if(report_type==1){
       $("#date_range").hide();
    }
    var Formemptatements = $("#Formemptatements").serialize();
    $('#emptatement').modal('show');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: base_url + 'emp/statement',
        method: 'post',
        dataType : "json",
        data: Formemptatements,

        success: function (result) {
            var balancedue = 0;
            var count = 0;
            var Transactions = result.Transactions;
            var emp = result.emp;
            var pay_statement_content = '';
            var trans_type = '';
            if(Transactions.length>0){
                $.each($(Transactions),function(key,value){
                   count++;
                   if(value.tr_Status!='Close')
                   {
                        balancedue =  balancedue+value.bl_Amt ;
                   }


                })
            }

            if(result.tr_type ==1){

                pay_statement_content += `<div class="container ">
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
                                    <strong>${emp.name}</strong>
                                </div>
                                <div>${emp.contact.emp_mail_Add}</div>
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
                                    pay_statement_content +=`
                                    <tr>
                                        <td>${trDate}</td>
                                        <td>invoice #${value.tr_Id}: ${trDate}</td>
                                        <td>${value.cr_Amt}</td>
                                        <td>${value.bl_Amt}</td>
                                    </tr>`;
                                });

                                pay_statement_content +=`
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>`;


            }else if(result.tr_type ==2){

                pay_statement_content += `<div class="container ">
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
                                    <strong>${emp.name}</strong>
                                </div>
                                <div>${emp.contact.emp_mail_Add}</div>
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
                                        <th>Paid</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                                $.each($(Transactions),function(key,value){
                                    var trDate = moment(value.tr_Date).format('YYYY-MM-DD')

                                    pay_statement_content +=`
                                    <tr>`;

                                    if(value.tr_Type == "1"){
                                        pay_statement_content +=`<td>${trDate}</td>
                                        <td>invoice #${value.tr_Id}: ${trDate}</td>
                                        <td>${value.cr_Amt}</td>
                                        <td>${parseInt(value.cr_Amt) - parseInt(value.bl_Amt)}</td>`;
                                    }else{

                                        pay_statement_content += `<td>${trDate}</td>
                                        <td>Payement</td>
                                        <td>${parseInt(value.dr_Amt) + parseInt(value.bl_Amt)}</td>
                                        <td>${value.dr_Amt}</td>`;
                                    }


                                });

                                pay_statement_content +=`</tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>`;

            }else if(result.tr_type ==3){

                pay_statement_content += `<div class="container ">
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
                                    <strong>${emp.name}</strong>
                                </div>
                                <div>${emp.contact.emp_mail_Add}</div>
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
                                        <th>Paied</th>
                                    </tr>
                                </thead>
                                <tbody>`;
                                var totalPayment = 0;
                                var totalpaid =0;
                                var paid = 0;
                                $.each($(Transactions),function(key,value){
                                    var trDate = moment(value.tr_Date).format('YYYY-MM-DD')
                                    paid = parseInt(value.cr_Amt) - parseInt(value.bl_Amt);
                                    totalPayment += parseInt(value.cr_Amt);
                                    totalpaid += paid;
                                    pay_statement_content +=`
                                    <tr>`;

                                        pay_statement_content +=`<td>${trDate}</td>
                                        <td>invoice #${value.tr_Id}: ${trDate}</td>
                                        <td>${value.cr_Amt}</td>
                                        <td>${paid}</td>`;
                                });

                                pay_statement_content +=`<tr><th colspan="2"></th><th class="text-uppercase" >total amount</th><th class="text-uppercase">total paid</th></tr>
                                    <tr><td colspan="2"></td><td>${totalPayment}</td><td>${totalpaid}</td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>`;

            }

            var statement_date =  parseInt($("#statement_date").val().length) ;
            $("#Formemptatements .name").text(result.emp.name);
            var yourFormattedDate =moment(result.date).format('YYYY-MM-DD')
            $("#Formemptatements #statement_date").val(yourFormattedDate);
            $("#Formemptatements .Open").text(new Intl.NumberFormat().format(parseInt(parseInt(balancedue))));
            $("#Formemptatements .count").text(count);
            $(".applyTransarow").hide();
            $("#statement_date_balance").show();
            $("#contentFormInvoive").show();

            $('.print_pay_statement').html(pay_statement_content);

            return false;
        }

    })

});


$(document).on('click', '.pay-statemnt-trans-btn', function(){
    $('#print-paystatement').modal('show');
    return false;
});




$(document).on("change","#Formemptatements .report_type",function() {
    var $this = $(this); 
    $("#date_range").hide();
    if($($this).val()==1){
    }else if ($($this).val()==2){
        $("#date_range").show();
    }else if ($($this).val()==3){
         $("#date_range").show();   
    }
    $(".applyTransarow").show();
    $("#statement_date_balance").hide();
    $("#contentFormInvoive").hide();
 });

$(".applyTransarow").hide();

$("#pay_reciev_form").submit( function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $(".errorsss").hide();
    var classdata =  $('#pay_reciev_form').serialize();
    
    $.ajax({
        url: base_url + 'schedulepay/payment-recieve',
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
                
                if($("#page").val()=='detail'){
                        loadTransactionData();

                }

                $("#makepayment").modal('hide');
                
            }                   
        }
    });                      
});





/* print employee pay bill */

$(document).on("click", ".paybillprint", function () {

    var $this =$(this);
    var id   = $this.data('id');
    var transaction   = $this.data('transaction');
    $('#prtpay').modal('show');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: base_url + 'pay/bill/print',
        method: 'post',
        dataType : "json",
        data: { id:id,'transaction':transaction },
        success: function (result) {
            console.log(result);
            var i = 0;
            var content = '';

            var month = moment(new Date(result.schedulePay.pay_month)).format("MMM-YYYY");


            content += `<div class="modal-content" id="pay-slip">
            <div class="modal-header justify-content-center">
                <div class="pull-right">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-remove"></i> </button>
                    <button type="button" onclick="printDiv('pay-slip')" class="btn btn-sm btn-secondary"><i class="fa fa-print"></i></button>
                </div>
                <div class="col-md-12" style="margin-top: 36px;">
                    <div class="text-center lh-1 mb-2">
                        <h6 class="fw-bold">Payslip</h6> <span class="fw-normal">Payment slip for the month of <span id='date' class="font-weight-bold">${month}</span></span>
                    </div>
                    <div class="d-flex justify-content-end"> Working Campus:<span class="font-weight-bold">Peshawar</span> </div>
                    <div class="row d-flex justify-content-around">
                        <div class="col-md-10 text-left">
                            <div class="row">
                                <div class="col-md-4">
                                    <p> <span class="font-weight-bold">P.No: </span> ${ result.emp.personal_No}} </p>
                                </div>
                                <div class="col-md-8">`;
                                var empNtn;
                                if(result.emp.employee_info.emp_NTN != null){   empNtn= result.emp.employee_info.emp_NTN }else empNtn ='N/A';
                                content += `
                                    <p> <span class="font-weight-bold">NTN: </span>${empNtn}  </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p> <span class="font-weight-bold">Full Name: </span> ${result.emp.name} </p>
                                </div>
                                <div class="col-md-4">
                                    <p> <span class="font-weight-bold">Designation: </span> ${result.emp.designation} </div>
                                <div class="col-md-4">
                                    <p> <span class="font-weight-bold">F.Designation: </span> ${result.emp.designation} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body row">
                <div class="col-md-6">
                    <table class="mt-4 table empDetail">
                        <thead class="table-secondary">
                            <tr class="myBackground">
                                <th colspan="3"> Payments </th>
                                <th> Amount (in Rs) </th>

                            </tr>
                        </thead>
                        <tbody>`;
                            if(result.schedulePay.allowances.length>0){
                                $.each($(result.schedulePay.allowances),function(key,allowance){
                                    sumdeductiototal = allowance['amount']!=''? allowance['amount']:0;

                                    content += `<tr>
                                        <th colspan="2"> ${allowance['title']}</th>
                                        <td></td>
                                        <td class="myAlign"> ${allowance['amount']} </td>
                                    </tr>`;
                                });
                            }

                            content += `<tr class="table-secondary myBackground">
                                <th colspan="3"> Total Payments </th>
                                <td class="myAlign"> ₨ ${result.schedulePay.allowancesub}/- </td>

                            </tr>
                            <tr height="40px">
                                <th colspan="2"> PROVIDENT FUND BALANCES AS ON: </th>
                                <td class=""> 05-12/2021  </td>
                                <td class="table-border-right "></td>

                            </tr>
                            <tr>
                                <td colspan="2"> OWN CONTRIBUTION </td>
                                <td></td>
                                <td class="myAlign"> 00.00 </td>
                            </tr>
                            <tr>
                                <td colspan="2"> SCHOOL'S CONTRIBUTION </td>
                                <td></td>
                                <td class="myAlign"> 00.00 </td>
                            </tr>
                            <tr height="40px">
                                <th colspan="2"> Gratuity AS ON: </th>
                                <th> </th>
                                <td class="table-border-right"> </td>
                            </tr>
                            <tr>
                                <td colspan="2"> YTD Balance on </td>
                                <td> 05/12/21 </td>
                                <td class="myAlign"> 27600.00 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="mt-4 table empDetail">
                        <thead class="table-secondary">
                            <tr class="myBackground">
                                <th colspan="3"> Deductions </th>
                                <th> Amount (in &#8360) </th>
                            </tr>
                        </thead>
                        <tbody>`;
                            var totalPayment = result.schedulePay.allowancesub;
                            var totalDeductions = result.schedulePay.deductionsSub;
                            var netSalry = totalPayment - totalDeductions;
                            if(result.schedulePay.deductions.length>0){
                                $.each($(result.schedulePay.deductions),function(key,value){
                                    sumdeductiototal = value['amount']!=''? value['amount']:0;
                                    content += `<tr>
                                        <th colspan="2"> ${value['title']}</th>
                                        <td></td>
                                        <td class="myAlign"> ${value['amount']} </td>
                                    </tr>`;
                                });
                            }

                        content +=`<tr class="table-secondary myBackground">
                                <th colspan="3"> Total Deductions </th>
                                <td class="myAlign"> ${result.schedulePay.deductionsSub} </td>
                            </tr>
                            <tr height="40px">
                                <th colspan="3" class=" "> Net Salary </th>
                                <td class="myAlign"> ₨ ${netSalry}/- </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">`;

                        content += `<table class="empDetail">
                        <tbody class="border-center">
                            <tr CLASS="table-secondary">
                                <th> Attend/ Absence </th>
                                <th> Days in Month </th>
                                <th> Days Paid </th>
                                <th> Days Not Paid </th>
                                <th> Leave Position </th>
                                <th> Privilege Leave </th>
                                <th> Sick Leave </th>
                                <th> Casual Leave </th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Yearly Open Balance</td>
                                <td>0.0</td>
                                <td>0.0</td>
                                <td>0.0</td>
                            </tr>
                            <tr>
                                <th>Current Month</th>
                                <td>31.0</td>
                                <td>31.0</td>
                                <td>31.0</td>
                                <td>Availed</td>
                                <td>0.0</td>
                                <td>0.0</td>
                                <td>0.0</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td>Closing Balance</td>
                                <td>0.0</td>
                                <td>0.0</td>
                                <td>0.0</td>
                            </tr>
                            <tr>
                                <td colspan="4"> &nbsp; </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td>Company Pool Leave Balance</td>
                                <td>1500</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>`;
            $("#pay-bill-cnt").html('');
            
            $("#pay-bill-cnt").html(content);

        }

    })



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
        url: base_url + 'schedulepay/generate',
        method: 'post',
        dataType : "json",
        data: { id:id },
        success: function (result) {
            var i = 0;
            var table;

            $('#feeinvoiceform #id').val(id);
            $('#feeinvoiceform #name').text(result.emp.name);
            $('#feeinvoiceform #designation').text(result.emp.designation);
            $('#feeinvoiceform #personal_No').text(result.emp.personal_No);
            $('#feeinvoiceform .basic').text(result.schedulePay.basic_pay);
            $('#feeinvoiceform #payments').text(result.schedulePay.payments);
            $('#feeinvoiceform .netamount').val(result.schedulePay.payments);
            $('#feeinvoiceform .invoice_num').text(result.schedulePay.invoice_num+1);

            var yourFormattedDate =moment(result.schedulePay.issue_date).format('YYYY-MM-DD')
            $("#feeinvoiceform #issue_date").val(yourFormattedDate);

            var next_pay_date =moment(result.schedulePay.next_pay_date).format('YYYY-MM-DD')

            $("#feeinvoiceform #next_pay_date").val(next_pay_date); 

            var yourFormattedDate =moment(result.schedulePay.due_Date).format('YYYY-MM-DD')
            $("#feeinvoiceform #due_Date").val(yourFormattedDate);

            var table = '';
            if(result.schedulePay.allowances.length>0){
                table +=`<table class="custom_border  table-hover" cellspacing="0" width="100%" >
                            <thead class='table-secondary' >
                                <tr>
                                    <th class='text-center' width="7%">S.No</th>
                                    <th class="w-65">Account</th>
                                    <th class="text-right">Amount
                                    </th>
                                     
                                </tr>
                            </thead>            
                            <tbody>`;
                        var i=1;
                        $.each($(result.schedulePay.allowances),function(key,value){
                            sumdeductiototal = value['amount']!=''? value['amount']:0;
                            table +=`<tr>
                                            <td class="text-center">${i++}</td>
                                            <td>${value['title']}</td>
                                            <td class="text-right"> &#8360 ${sumdeductiototal}
                                                <span class="basic"></span></td>
                                             
                                        </tr>`;
                        })
                    table +=`</tbody>

                             <tfoot>
                                <tr>
                                    <th colspan="2" class="text-right">Gross Pay</th>
                                    <th class="text-right">&#8360 ${result.schedulePay.allowancesub}</th>
                                     

                                </tr>
                            </tfoot>
                    </table>`;
                }

                if(result.schedulePay.deductions.length>0){
                    table +=`<h6>Deductions</h6><table class="custom_border mb-3 table-hover" cellspacing="0" width="100%">
                        <thead class='table-secondary'>
                            <tr>
                                <th class='text-center' width="7%">S.No</th>
                                <th class="w-65">Account</th>
                                <th class="text-right">Amount
                                </th>
                            </tr>
                            
                            </thead> 
                                        
                            <tbody>`;
                            var i=1;
                            $.each($(result.schedulePay.deductions),function(key,value){



                                sumdeductiototal = value['amount']!=''? value['amount']:0;
                                table +=`<tr>
                                        <td class="text-center">${i}</td>
                                        <td>${value['title']}</td>
                                        <td class="text-right"> &#8360
                                            ${value['amount']}</td>
                                        
                                    </tr>`;
                             })
                            
                            table +=`</tbody>

                            <tfoot>
                                <tr>
                                    <th colspan="2" class="text-right">Total Deductions</th>
                                    <th class="text-right">&#8360 ${result.schedulePay.deductionsSub} </th>
                                </tr>
                            </tfoot> 

                        </table>`;
            }

            table +=` 
                        <table class=" ">
                            <tr>
                                <td class=""></td>
                                <td class="text-right w-85">
                                    <b>Net Payable</b></td>
                                    <input type="hidden" name="netamount" class="netamount" >
                                    <td class="w-15 text-right"><b>&#8360 ${result.schedulePay.netamount} </b></td>
                            </tr>
                             <tr>
                                <td class=""></td>
                                <td class="text-right w-85">
                                    <b>Balance Due</b></td>
                                <td class="w-15 text-right"><b>&#8360 ${result.schedulePay.balancedue}</b></td>
                            </tr> 
                        </table>
                     `;
            $("#generateTable").html(table);
             
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
            url: base_url + 'schedulepay/emp-generate-schedul-save',
            method: 'post',
            dataType : "json",
            data:  classdata,
            success: function(result){
                
                
                if($("#page").val()=='detail'){
                        loadTransactionData();

                }


                if (result.errors) {

                    swal({
                            title:  result.message,
                            type: "success",
                            showCancelButton: false,
                            showConfirmButton: false,
                            timer: 1000
                    });
                    $("#feeinvoice").modal('hide');
                }else {
                    swal({
                            title: result.message,
                            type: "success",
                            showCancelButton: false,
                            showConfirmButton: false,
                            timer: 1000
                    });
                   $("#feeinvoice").modal('hide');
                }                   
            }
             
           });       
               
    });

function loadStudentTransaction() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    }); 
    $.ajax({            
        url: base_url + 'income?type=transaction',
        type: 'get',
        success: function (data) {
             var table = $('#datatable').DataTable();

            table.destroy(); 
            $('#datatable').html(data);
            $("#datatable").DataTable();
        }
    });
} 


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

    $("#billing_rate").trigger('change');

  calculate();


})


$(document).on("keyup","#fine_due_Date ",function() {

    calculate();
});

 



$(document).on("click",".model_close_save_overtime",function() {
    var $this  =$(this); 
    
    var overtime = 0;

    if($("#overtime_rate").val()!='' && $("#overtime_hours").val()!='' && $("#overtime_days").val()!='')
    {
        overtime = $("#overtime_rate").val()*$("#overtime_hours").val()*$("#overtime_days").val();
       $("#overtime_total").val(overtime);
    }   

    calculate();
    $("#overtime").modal('hide');
    return false;
});





$(document).on("click",".modal-dialog .close",function() {

    var $this = $(this);
    var id=$this.data('id'); 
    $("#"+id).modal('hide');

})


$(document).on("click",".model_close_save_bonus",function() {
    var bonus_type  = $("#bonus_type").val();
    var basic_pay = parseFloat($("#basic_pay").val());
    var bonus_amout =parseFloat($("#bonus_amout").val())!=''?parseFloat($("#bonus_amout").val()):0;
    
    if(bonus_type==1){
        
        var amount  = calculateper(basic_pay,bonus_amout);
        $("#bonus_total").val(amount);
    }else{
       $("#bonus_total").val(bonus_amout);
    }
    calculate();
    $("#bonus").modal('hide');
    return false;



 });



$(document).on("click",".model_close_save_commission",function() {
    var commission_type  = $("#commission_type").val();
    var basic_pay = parseFloat($("#basic_pay").val());
    var commission_amout =parseFloat($("#commission_amout").val())!=''?parseFloat($("#commission_amout").val()):0;
    if(commission_type==1){
        
        var amount  = calculateper(basic_pay,commission_amout);
        $("#commission_total").val(amount);
    }else{
       $("#commission_total").val(commission_amout);
    }
    calculate();
    $("#commission").modal('hide');
    return false;


 });

$(document).on("click",".model_close_save_medical",function() {
    var medical_type  = $("#medical_type").val();
    var basic_pay = parseFloat($("#basic_pay").val());
    var medical_amout =parseFloat($("#medical_amout").val())!=''?parseFloat($("#medical_amout").val()):0;
    if(medical_type==1){
        var amount  = calculateper(basic_pay,medical_amout);
        $("#medical_total").val(amount);
    }else{
       $("#medical_total").val(medical_amout);
    }
     calculate();
     $("#medical").modal('hide');
     return false;

 });


$(document).on("click",".model_close_save_convayance",function() {
    var convayance_type  = $("#convayance_type").val();
    var basic_pay = parseFloat($("#basic_pay").val());
    var convayance_amout =parseFloat($("#convayance_amout").val())!=''?parseFloat($("#convayance_amout").val()):0;
    if(convayance_type==1){
        
        var amount  = calculateper(basic_pay,convayance_amout);
        $("#convayance_total").val(amount);
    }else{
       $("#convayance_total").val(convayance_amout);
    }
     calculate();
     $("#convayance").modal('hide');

     return false;


 });




$(document).on("click",".model_close_save_education",function() {
    var education_type  = $("#education_type").val();
    var basic_pay = parseFloat($("#basic_pay").val());
    var education_amout =parseFloat($("#education_amout").val())!=''?parseFloat($("#education_amout").val()):0;

    if(education_type==1){
        var amount  = calculateper(basic_pay,education_amout);
        $("#education_total").val(amount);
    }else{
       $("#education_total").val(education_amout);
    }
     calculate();
     $("#education").modal('hide');
     return false;
 });



$(document).on("click",".model_close_save_taxe",function() {
    var taxe_type  = $("#taxe_type").val();
    var basic_pay = parseFloat($("#basic_pay").val());
    var taxe_amout =parseFloat($("#taxe_amout").val())!=''?parseFloat($("#taxe_amout").val()):0;

    if(taxe_type==1){
        var amount  = calculateper(basic_pay,taxe_amout);
        $("#taxe_total").val(amount);
    }else{
       $("#taxe_total").val(taxe_amout);
    }
     calculate();
     $("#taxe").modal('hide');
     return false;
 });




$(document).on("click",".deductions_advance_salary_close",function() {
    

    var amount =$("#schedule_advanc").val();
    
     if(amount==''){
        $(".schedule_advancerrorsss").text('Please select salary ')
     }else{
        $("#advance").modal('hide');
     }
     
     
    return false;
 });




$(document).on("click",".model_close_save_house",function() {
    var house_type  = $("#house_type").val();
    var basic_pay = parseFloat($("#basic_pay").val());
    var house_amout =parseFloat($("#house_amout").val())!=''?parseFloat($("#house_amout").val()):0;

    if(house_type==1){
        var amount  = calculateper(basic_pay,house_amout);
        $("#house_total").val(amount);
    }else{
       $("#house_total").val(education_amout);
    }
     calculate();
     $("#house").modal('hide');
     return false;
 });




$(document).on("click",".model_close_save_utility",function() {
    var utility_type  = $("#utility_type").val();
    var basic_pay = parseFloat($("#basic_pay").val());
    var utility_amout =parseFloat($("#utility_amout").val())!=''?parseFloat($("#utility_amout").val()):0;
    if(utility_type==1){
        
        var amount  = calculateper(basic_pay,utility_amout);
        $("#utility_total").val(amount);
    }else{
       $("#utility_total").val(utility_amout);
    }
     calculate();
     $("#utility").modal('hide');

     return false;

 });

$(document).on("click",".model_close_save_dearall",function() {
    var dearall_type  = $("#dearall_type").val();
    var basic_pay = parseFloat($("#basic_pay").val());
    var dearall_amout =parseFloat($("#dearall_amout").val())!=''?parseFloat($("#dearall_amout").val()):0;
    if(dearall_type==1){
        
        var amount  = calculateper(basic_pay,dearall_amout);
        $("#dearall_total").val(amount);
    }else{
       $("#dearall_total").val(dearall_amout);
    }
     calculate();
     $("#dearall").modal('hide');

     return false;

 });

$(document).on("click",".model_close_save_arear",function() {
    calculate();
    $("#arear").modal('hide');
    return false;
});


function calculateper(basic_pay,bonus_amout){ 
    var value = (bonus_amout / 100) * basic_pay;   
    return value;
}



$(document).on("change keyup",".calculate_vacation",function() {
    var vacation = 0;
    if($("#vacation_Pay_Rate").val()!='' && $("#vacation_No_of_Days").val()!='')
    {
        vacation = $("#vacation_Pay_Rate").val()*$("#vacation_No_of_Days").val();
       $("#vacation_total").val(vacation);
    }
    calculate();

});

$(document).on("click",".model_close_save_vacation",function() {
    var $this  =$(this); 
    var vacation = 0;

    if($("#vacation_Pay_Rate").val()!='' && $("#vacation_No_of_Days").val()!='')
    {
        vacation = $("#vacation_Pay_Rate").val()*$("#vacation_No_of_Days").val();
       $("#vacation_total").val(vacation);
    }
   
    calculate();
    $("#vacation").modal('hide');
    return false;
});


$(document).on("change", "#Installments" , function(){

    var Installments = parseFloat($("#Installments").val());
    var advance_amount =parseFloat($("#advance_amount").val())!=''?parseFloat($("#advance_amount").val()):0;
    var total =advance_amount/Installments;
    $("#amount_per_pay_peroid").val(total.toFixed(2));

});

$(document).on("change keyup","#advance_amount",function() {
    
    var Installments = parseFloat($("#Installments").val());
    var advance_amount =parseFloat($("#advance_amount").val())!=''?parseFloat($("#advance_amount").val()):0;
    var total =advance_amount/Installments;
    $("#amount_per_pay_peroid").val(total.toFixed(2));

});


$(document).on("change keyup","#billing_rate,#working_hours,#no_of_days",function() {
    var billing_rate    =  $("#billing_rate").val()!=''?parseFloat($("#billing_rate").val()):0;
    var working_hours   =  $("#working_hours").val()!=''?parseFloat($("#working_hours").val()):0;
    var no_of_days      =  $("#no_of_days").val()!=''?parseFloat($("#no_of_days").val()):0;

    if($("#bill_Freq").val()==1){

        var total =billing_rate*working_hours*no_of_days*4;
        $("#basic_pay").val(total.toFixed(2));
    }else{
        var total =billing_rate*working_hours*no_of_days;
        $("#basic_pay").val(total.toFixed(2));


    }
    calculate();
});


function calculate(){
    
    var totalPoints = 0;  
    var basic_pay = $("#basic_pay").val();
    $("#basic_payt").text("Pkr"+Number(basic_pay).toFixed(2));
    var Allowancess = 0.00;

    $('.total_income').each(function(){
        var $this2 = $(this);
        var ss = $this2.data('id');
        var vaaa = $this2.val();
        var vlss = (vaaa)?vaaa:0;
        if($('#check_'+ss).is(':checked')){

            if($(this).val()!=''){
                Allowancess += parseFloat($(this).val());
             }
        }
    });
       
   

    $("#Allowancess").text("Pkr "+Number(Allowancess).toFixed(2));
    
    var DEDUCTIONS = 0;
    
    $('.deduction_total').each(function(){

        var $this2 = $(this);
        var ss = $this2.data('id');
        var vaaa = $this2.val();
        var vlss = (vaaa)?vaaa:0;
        
        if($('#check_'+ss).is(':checked')){
            if($(this).val()!=''){
                DEDUCTIONS = parseInt($(this).val()) + DEDUCTIONS;
            }
        }
    });

     
    
  $("#DEDUCTIONS").text("Pkr "+Number(DEDUCTIONS).toFixed(2));


   var Gross_Pay= parseFloat(Allowancess)+parseFloat(basic_pay); 
    
   var Net_Pay= Gross_Pay-DEDUCTIONS; 

   $("#Gross_Pay").text("Pkr " + Number(Gross_Pay).toFixed(2));
   $("#Net_Pay").text("Pkr " + Number(Net_Pay).toFixed(2));
   $("#pay_total").val(Number(Net_Pay).toFixed(2));

    
    
 

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
            url: base_url + 'add-account-statement',
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


 

$("#FormpaySchedule").submit( function(e){
       e.preventDefault();
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $(".errorsss").hide();
      
       var classdata =  $('#FormpaySchedule').serialize();
        
        $.ajax({
            url: base_url + 'add/Pay/statement',
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

                    $("#schedulepay").modal('hide');


                    if($("#page").val()=='detail'){
                        loadTransactionData();

                    }else{

                        
                    }
                    
                }                   
            }
             
           });       
               
        });
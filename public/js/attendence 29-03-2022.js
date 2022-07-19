
$(document).ready(function(e){
    $('#success-alert').html('');
    $('#newclassbtn').click(function(e){
        $('#newclass').modal('show');
        e.preventDefault();
    });


    $('#attendance-table').DataTable();


    $('#attend-date').datetimepicker({
        format: 'YYYY-MM-DD',
        maxDate: new Date(),


     });

    $("#list-employee").click(function(){
        getEmployees();
    });
    $(document).on("focusout","#attend-date", function () {
        // function getEmployees() {

            attendenceList();


    });



  function attendenceList(){

    var date = $('#attend-date').val();
    // alert(date);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
        type: "GET",
        url: base_url + 'employee/attendance?date='+ date,

        contentType: "application/json; charset=utf-8",

        success: function(data) {

            $("#attendance-table").html(data);
            refreshTable();
            LoadAttendance();

        },

    });

  }





    function LoadAttendance(){

        $('table > tbody  > tr').each(function(index, tr) {
            // alert(i++);
            var attendstatus = $(this).find("input[type='radio']:checked").val();

            if(attendstatus === 'A' || attendstatus === 'H'){
                $(this).find(".datetimepicker3").val();
            }
         });
    }

    $(document).ready(LoadAttendance);

    function AttendRadioChange(){

        if($(this).val() === 'H' || $(this).val() === 'A'){
            var $row = $(this).closest("tr");    // Find the row
            $row.find(".datetimepicker3").val('');
            // $row.find(".datetimepicker3").val('');




        }

        if($(this).val() === 'P'){
            var school_time = $('#attend-date').attr('data-id');

            var d = new Date(`2011-04-20 ${school_time}`);
            var time = d.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })
            var $row = $(this).closest("tr");    // Find the row

            $row.find(".datetimepicker3").first().val(time);
        }
    }

    $(document).on("change","input:radio", AttendRadioChange);

    $(document).on("focusin",".datetimepicker3", function () {

        $(this).datetimepicker({
            //          format: 'H:mm',    // use this format if you want the 24hours timepicker
            format: 'h:mm A', //use this format if you want the 12hours timpiecker with AM/PM toggle
            icons: {
              time: "fa fa-clock-o",
              date: "fa fa-calendar",
              up: "fa fa-chevron-up",
              down: "fa fa-chevron-down",
              previous: 'fa fa-chevron-left',
              next: 'fa fa-chevron-right',
              today: 'fa fa-screenshot',
              clear: 'fa fa-trash',
              close: 'fa fa-remove'
            }
        });
    });

    $(document).on("focusout",".datetimepicker3", function () {
        var school_time = $('.school_start').attr('data-id');
        var p = new Date(`2011-04-20 ${school_time}`);
        var sch_time_H = p.getHours;



        var time_start = $(this).first().val();
        var d = new Date(`2011-04-20 ${time_start}`);
        var start_time_H = d.getHours;

        if(start_time_H > sch_time_H){
            alert('dgfsdffd');
        }




    });

    $(document).on("click","#emp-attend-save", function (e) {
        e.preventDefault();

        //$('#ClassForm')[0].reset();
        $('#employee-attend-form').attr('action', base_url +'employee/attendance');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var emp_attendance =  $('#employee-attend-form').serialize();
        $.ajax({
            url: base_url + 'employee/attendance',
            method: 'post',
            data:  emp_attendance,
            success: function(result){

                $('.add-div-error').text('');
                if(result.errors)
                {
                    $('#add-alert-danger').html('');
                    $.each(result.errors, function(key, value){
                        $('#newclass').modal('show');
                        $('.add-div-error.'+key).text(value);
                        $('.add-div-error .'+key).show();
                        //$('.alert-danger').show();
                    });
                }
                else
                {
                    swal({
                        title: "Added successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                    });

                    setTimeout(function(){ this.swal.close();}, 2000);
                    $('#attendance-table').html(result);
                    refreshTable();
                    attendenceList();
                    LoadAttendance();


                }
            }
        });
    });

    function refreshTable(){
        $("#attendance-table").dataTable().fnDestroy();
        // Reinitialize
        $("#attendance-table").dataTable();

    }

});

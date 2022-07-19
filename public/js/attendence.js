

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
    $(document).on("focusout change",".filter_staff .filter_staff", function () {



        // function getEmployees() {

            attendenceList();


    });



  function attendenceList(){

      var date = $('#attend-date').val();

      var  employee_type   = $('select#employee_type option:selected').val();



      // alert(date);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
        type: "GET",
        url: base_url + 'employee/attendance?date='+ date +'&'+'type='+ employee_type,
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
                $(this).find(".datetimepicker3").val('');
            }
         });
    }

    $(document).ready(LoadAttendance);

    function AttendRadioChange(){
        var s_prev = $(".start_time").val();
        var e_prev = $(".end_time").val();

        if($(this).val() === 'H' || $(this).val() === 'A'){
            var $row = $(this).closest("tr");    // Find the row

            $row.find(".start_time").val('');
            $row.find(".end_time").val('');

        }


        if($(this).val() === 'P'){
            // $(this).attr("checked", true);


            var start = $('#attend-date').attr('data-start');
            var end = $('#attend-date').attr('data-end');

            var ds = new Date(`2011-04-20 ${start}`);
            var times = ds.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });

            var de = new Date(`2011-04-20 ${end}`);
            var timee = de.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
                // Find the row
            var $row = $(this).closest("tr");
            $row.find(".start_time").val(times);
            $row.find(".end_time").val(timee);

        }
        if($(this).val() === 'L'){
            var c_time = new Date();
            var c_t = c_time.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });

            var $row = $(this).closest("tr");    // Find the row
            $row.find(".start_time").val(c_t);
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


        var school_time = $('#attend-date').attr('data-start');
        var p = new Date(`2011-04-20 ${school_time}`);
        var time = p.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
        var time_start = $(".start_time").val();


        if(time_start > time){

            var $row = $(this).closest("tr");    // Find the row
            $row.find(".attendstatus").prop('checked', false);
            $row.find(":radio[value=L]").prop('checked',true);
        }
    });

    $(document).on("click","#emp-attend-save", function (e) {
        e.preventDefault();

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

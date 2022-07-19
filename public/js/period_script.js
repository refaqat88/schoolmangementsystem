// Wait for the DOM to be ready
$(document).ready(function(){


    $('#datatable_period').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search",
        }

    });
    

    $('#success-alert').html('');
    
    $('#show-period-btn').click(function(e){
        e.preventDefault();
        $('#PeriodModal').modal('show');
    });

    $('#add-period-Btn').click(function(e){
        e.preventDefault();
        $('#PeriodForm').attr('action', base_url +'add-period');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var classdata =  $('#PeriodForm').serialize();
        $.ajax({
            url: base_url + 'add-period',
            method: 'post',
            data:  classdata,
            success: function(result){
                console.log(result);
                if(result.errors)
                {
                    $('.add-div-error').text('');
                    $.each(result.errors, function(key, value){
                        $('#PeriodModal').modal('show');
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
                    setTimeout(function(){ location.reload(); }, 2000);

                }
            }});
    });
        $('#update-period-btn').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var editsubjectdata =  $('#EditPeriodForm').serialize();
        $.ajax({
            url: base_url + "update-period",
            method: 'post',
            data:  editsubjectdata,
            success: function(result){
                //alert(response.message);
                $('.edit-div-error').text('');
                if(result.errors)
                {
                    //$('#edit-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#EditPeriodModal').modal('show');
                        $('.edit-div-error.'+key).text(value);

                        $('.edit-div-error .'+key).show();

                    });
                }
                else
                {

                     $('.edit-div-error').hide();

                     $('#EditPeriodModal').modal('hide');

                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                    });
                    setTimeout(function(){ location.reload(); }, 1000);

                }
            }});
    });
});

 

$('body').on('click', '.edit-period-btn', function () {
    var edit_period_id = $(this).data('id');
    $.get('edit-period/'+edit_period_id, function (data) {
        $('#EditPeriodForm')[0].reset();
        $('#EditPeriodForm').attr('action', base_url +'update-period');
        $('#EditPeriodModal').modal('show');
        $('#edit_period_id').val(data.id);
        $('#edit_period').val(data.period);
        $('#edit_start_time').val(data.start_time);
        $('#orders').val(data.orders);
        $('#edit_end_time').val(data.end_time);


    })
});

$('.delete-period-btn').on('click', function () {

    var period_delete_id = $(this).data('id');
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
                closeOnCancel: false,

            },
            function (isConfirm) {
                if (isConfirm) {
                    $.get('delete-period/'+period_delete_id, function (data) {
                        swal({
                            icon: 'warning',
                            title: "Deleted successfully!",
                            showCancelButton: false,
                            showConfirmButton: false,
                            type: "success"
                        });
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    });
                } else {
                    location.reload();
                    }
    })
});


$('body').on('click', '.view-period-btn', function () {
    

    var show_period_id = $(this).data('id');
    $.get('show-period/'+show_period_id, function (data) {
        $('#ShowPeriodModal').modal('show');
        $('#show_period').html(data.period);
        $('#show_orders').html(data.orders);
        $('#show_start_time').html(data.start_time);
        $('#show_end_time').html(data.end_time);

    })


});


    window.setTimeout(function () {
        $("#success-alert1").alert('close');
    }, 5000);
    /*window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);
*/



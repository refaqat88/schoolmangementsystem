// Wait for the DOM to be ready
$(document).ready(function(){
    $('#success-alert').html('');
    $(document).on("click","#show-stationary-btn",function(e) {
        e.preventDefault();
        $('#StationaryModalModal').modal('show');
    });

$(document).on("click","#add-Stationary-Btn",function(e) {
        e.preventDefault();
        //$('#SubjectForm')[0].reset();
        // $('#StationaryForm').attr('action', base_url +'stationary/add-stationary');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var stationaryData =  $('#StationaryForm').serialize();
        $.ajax({
            url: base_url + 'add-stationary',
            method: 'post',
            data:  stationaryData,
            success: function(result){
                console.log(result);
                if(result.errors)
                {
                    //$('#add-alert-danger').html('');
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#StationaryModal').modal('show');
                        $('.add-div-error.'+key).text(value);

                        $('.add-div-error .'+key).show();
                        //$('.add-div-error').show();
                        //$('.alert-danger').show();
                        //$('#add-alert-danger').append('<li>'+value+'</li>');

                    });
                }
                else
                {
                    // $('#success-message').html('');
                    // $('.add-div-error').hide();
                    //
                    // $('#SubjectModal').modal('hide');
                    // $('#success-message').show();
                    // $('#success-message').append('<p>'+result.message+'</p>');
                    // //$('#success-alert').show();
                    // //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    // $('#success-message').delay(2000).fadeOut('slow');
                    swal({
                        title: "Added successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    location.reload();


                }
            }});
    });
    $(document).on("click","#update-Btn",function(e) {
        e.preventDefault();
        //$('#SubjectForm')[0].reset();
        //$('#EditSubjectForm').attr('action', base_url +'update-subject');
        //$('#Model-Title').html("Add New Subject");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var editstationarydata =  $('#EditStationaryForm').serialize();
        $.ajax({
            url: base_url + "update-stationary",
            method: 'post',
            data:  editstationarydata,
            success: function(result){
                console.log(result);
                //alert(response.message);
                $('.edit-div-error').text('');
                if(result.errors)
                {
                    //$('#edit-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#EditStationaryModal').modal('show');
                        $('.edit-div-error.'+key).text(value);

                        $('.edit-div-error .'+key).show();
                        //$('.edit-div-error').show();
                        //$('.alert-danger').show();
                        //$('#edit-alert-danger').append('<li>'+value+'</li>');

                    });
                }
                else
                {
                    // $('#success-message').html('');
                    // $('.edit-div-error').hide();
                    //
                    // $('#EditSubjectModal').modal('hide');
                    // $('#success-message').show();
                    // $('#success-message').append('<p>'+result.message+'</p>');
                    // //$('#success-alert').show();
                    // //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    // $('#success-message').delay(2000).fadeOut('slow');
                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    location.reload();

                    // setTimeout(function(){ location.reload(); }, 1000);

                }
            }});
    });
});

/*
$("#SubjectForm").validate({
    rules:
        {
            name: {
                required: true,
                minlength: 3,
                maxlength: 15
            },
            code: {
                required: true,
                minlength: 3,
                maxlength: 15
            },
            theory_marks: {
                required: true,
            },
            practical_marks: {
                required: true,
            },
            total_marks: {
                required: true,
            },
            passing_marks: {
                required: true,
            },
        },
    messages:
        {
            name: "please enter name",
            code:{
                required: "please enter code",
            },
            theory_marks: "please enter theory marks",
            practical_marks:{
                required: "please retype practical marks",
            },
            total_marks: "please enter total marks",
            passing_marks:{
                required: "please retype passing marks",
            }
        },
            submitHandler: function (form) {
                form.submit();
            }
});
*/
$(document).on("click",".edit-stationary",function() {

    // console.log('edit modal');
    var stat_id = $(this).data('id');
    $.get('edit-stationary/'+stat_id, function (data) {
        $('#EditStationaryForm')[0].reset();
        $('#EditStationaryForm').attr('action', base_url +'update-stationary');
        $('#EditStationaryModal').modal('show');
        $('#stat_id').val(data.stat_categ_Id);
        $('#stat_name').val(data.stat_categ_Name);
    })
});

$(document).on("click",".delete-station-btn",function() {


    var stat_delete_id = $(this).data('id');
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
                    $.get('delete-stationary/'+stat_delete_id, function (data) {
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
                    // var myhref = $('.confrm_delet').attr("data-id")
                    // swal("Deleted Successfully!", "success");
                    // window.location.href= myhref;

                }
    })
});

$(document).on("click",".show-stationary",function() {
    var stat_id = $(this).data('id');

    $.get('show-stationary/'+stat_id, function (data) {
        console.log(data);

        $('#Show-Stat-Btn').hide();
        $('#ShowStationaryModal').modal('show');
        $('#show-stat-name').text(data.stat_categ_Name);

    })

});


    window.setTimeout(function () {
        $("#success-alert1").alert('close');
    }, 5000);
    /*window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);
*/

$('.conf_msg').on('click', function () {
    console.log('you  clicked cancel');
    swal({
            title: "Are you sure?",
            text: "You want to cancel it!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-choice",
            cancelButtonClass: "btn-danger",
            confirmButtonText: "No",
            cancelButtonText: "Yes",
            closeOnConfirm: false,
            closeOnCancel: false,

        },
        function (isConfirm) {
            if (isConfirm) {
                $(".close").attr('disabled' , false);
                $(".add-btn").attr('disabled' , false);
                $(".update-btn").attr('disabled' , false);
                swal.close();
            } else {
                location.reload();
            }
        });
});

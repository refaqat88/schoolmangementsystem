// Wait for the DOM to be ready
$(document).ready(function(){
    $('#success-alert').html('');
    $(document).on("click","#show-publisher-btn",function(e) {
        e.preventDefault();
        $('#add-publisher-modal').modal('show');
    });

    $(document).on("click","#add-publisher-btn",function(e) {
        e.preventDefault();
        //$('#SubjectForm')[0].reset();
        console.log('in pulisher');
        // $('#StationaryForm').attr('action', base_url +'stationary/add-stationary');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var publisherData =  $('#publisher-form').serialize();
        $.ajax({
            url: base_url + 'add-publisher',
            method: 'post',
            data:  publisherData,
            success: function(result){
                console.log(result);
                if(result.errors)
                {
                    //$('#add-alert-danger').html('');
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#add-publisher-modal').modal('show');
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

    $(document).on("click","#update-publisher-btn",function(e) {

        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var editpublisherdata =  $('#edit-publisher-form').serialize();
        $.ajax({
            url: base_url + "update-publisher",
            method: 'post',
            data:  editpublisherdata,
            success: function(result){
                console.log(result);
                //alert(response.message);
                $('.edit-div-error').text('');
                if(result.errors)
                {
                    //$('#edit-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#edit-publisher-modal').modal('show');
                        $('.edit-div-error.'+key).text(value);

                        $('.edit-div-error .'+key).show();

                    });
                }
                else
                {

                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    location.reload();

                }
            }});
    });
});

$(document).on("click",".edit-publisher",function() {

    // console.log('edit modal');
    var pub_id = $(this).data('id');
    $.get('edit-publisher/'+pub_id, function (data) {
        console.log(data);
        $('#edit-publisher-form')[0].reset();
        $('#edit-publisher-form').attr('action', base_url +'update-publisher');
        $('#edit-publisher-modal').modal('show');
        $('#pub_id').val(data.pub_Id);
        $('#pub_name').val(data.pub_Name);
        $('#pub_cont').val(data.pub_Contact)
        // $('#pub_status').val(data.pub_Status).change();
        $('#pub_status').val(data.pub_Status).change();



    })
});

$(document).on("click",".delete-publish-btn",function() {


    var pub_delete_id = $(this).data('id');
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
                    $.get('delete-publisher/'+pub_delete_id, function (data) {
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

$(document).on("click",".show-publisher",function() {

    var pub_id = $(this).data('id');

    $.get('show-publisher/'+pub_id, function (data) {
        console.log(data);

        $('#Show-pub-Btn').hide();
        $('#show-publisher-modal').modal('show');
        $('#show-publisher-name').text(data.pub_Name);
        $('#show-publisher-cont').text(data.pub_Contact);
        $('#show-publisher-status').text(data.pub_Status);


    })

});



//Sweet Alert
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
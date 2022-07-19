// Wait for the DOM to be ready
$(document).ready(function(){
    $('#success-alert').html('');
    $(document).on("click","#show-author-btn",function(e) {
        e.preventDefault();
        $('#AuthorModal').modal('show');
    });

    $(document).on("click","#add-Author-Btn",function(e) {
        e.preventDefault();
        //$('#SubjectForm')[0].reset();
        // $('#StationaryForm').attr('action', base_url +'stationary/add-stationary');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var authorData =  $('#AuthorForm').serialize();
        $.ajax({
            url: base_url + 'add-author',
            method: 'post',
            data:  authorData,
            success: function(result){
                console.log(result);
                if(result.errors)
                {
                    //$('#add-alert-danger').html('');
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#AuthorModal').modal('show');
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
        var editauthordata =  $('#EditAuthorForm').serialize();
        $.ajax({
            url: base_url + "update-author",
            method: 'post',
            data:  editauthordata,
            success: function(result){
                console.log(result);
                //alert(response.message);
                $('.edit-div-error').text('');
                if(result.errors)
                {
                    //$('#edit-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#EditAuthorModal').modal('show');
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
                     $('.edit-div-error').hide();
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


$(document).on("click",".edit-auther",function() {

    // console.log('edit modal');
    var auth_id = $(this).data('id');
    $.get('edit-author/'+auth_id, function (data) {
        //$('#EditAuthorForm')[0].reset();
        $('#EditAuthorForm').attr('action', base_url +'update-author');
        $('#EditAuthorModal').modal('show');
        $('#auth_id').val(data.auth_Id);
        $('#auth_name').val(data.auth_Name);
    })
});

$(document).on("click",".delete-author-btn",function() {


    var auth_delete_id = $(this).data('id');
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
                    $.get('delete-author/'+auth_delete_id, function (data) {
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

$(document).on("click",".show-auther",function() {

    var auth_id = $(this).data('id');

    $.get('show-author/'+auth_id, function (data) {
        console.log(data);

        $('#Show-Author-Btn').hide();
        $('#ShowAuthorModal').modal('show');
        $('#show-auth-name').text(data.auth_Name);

    })

});


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


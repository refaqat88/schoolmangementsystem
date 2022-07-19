// Wait for the DOM to be ready
$(document).ready(function(){

    $(document).on("click","#show-rack-modal-btn",function(e) {
        e.preventDefault();
        $('#add-rack-Modal').modal('show');
    });

    $(document).on("click","#add-rack-save-Btn",function(e) {
           e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var rackData =  $('#add-rack-form').serialize();
        $.ajax({
            url: base_url + 'add-library-rack',
            method: 'post',
            data:  rackData,
            success: function(result){
                console.log(result);
                if(result.errors)
                {
                    //$('#add-alert-danger').html('');
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#add-rack-Modal').modal('show');
                        $('.add-div-error.'+key).text(value);

                        $('.add-div-error .'+key).show();

                    });
                }
                else
                {

                     $('#add-rack-Modal').modal('hide');

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

    $(document).on("click","#update-rack-btn",function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var edit_rack_data =  $('#edit-rack-form').serialize();
        $.ajax({
            url: base_url + "update-library-rack",
            method: 'post',
            data:  edit_rack_data,
            success: function(result){
                console.log(result);

                $('.edit-div-error').text('');
                if(result.errors)
                {
                     $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#edit-rack-modal').modal('show');
                        $('.edit-div-error.'+key).text(value);

                        $('.edit-div-error .'+key).show();

                    });
                }
                else
                {
                    // $('#success-message').html('');
                     $('.edit-div-error').hide();
                    //
                     $('#edit-rack-modal').modal('hide');

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


$(document).on("click",".edit-rack-btn",function() {

        var edit_rack_id = $(this).data('id');
        $.get('edit-library-rack/'+edit_rack_id, function (data) {
            //$('#EditAuthorForm')[0].reset();
            $('#edit-rack-form').attr('action', base_url +'update-library-rack');
            $('#edit-rack-modal').modal('show');
            $('#edit-rack-id').val(data.rack_Id);
            $('#edit-rack-no').val(data.rack_No);
        })
    });

$(document).on("click",".delete-rack-btn",function() {

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
                $.get('delete-library-rack/'+auth_delete_id, function (data) {
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

$(document).on("click",".show-rack-btn",function() {


    var auth_id = $(this).data('id');

    $.get('show-library-rack/'+auth_id, function (data) {
        console.log(data);

        $('#show-rack-modal').modal('show');
        $('#show-rack-no').text(data.rack_No);

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


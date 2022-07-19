// Wait for the DOM to be ready
$(document).ready(function(){

    $(document).on("click","#show-shelf-modal-btn",function(e) {
         e.preventDefault();
        $('#add-shelf-Modal').modal('show');
    });

    $(document).on("click","#add-shelf-save-btn",function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var rackData =  $('#add-shelf-form').serialize();
        $.ajax({
            url: base_url + 'add-library-shelf',
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

                    $('.add-div-error').hide();

                     $('#add-shelf-Modal').modal('hide');

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

    $(document).on("click","#update-shelf-btn",function(e) {

        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var edit_rack_data =  $('#edit-shelf-form').serialize();
        $.ajax({
            url: base_url + "update-library-shelf",
            method: 'post',
            data:  edit_rack_data,
            success: function(result){
                console.log(result);
                //alert(response.message);
                $('.edit-div-error').text('');
                if(result.errors)
                {
                    //$('#edit-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#edit-shelf-modal').modal('show');
                        $('.edit-div-error.'+key).text(value);

                        $('.edit-div-error .'+key).show();

                    });
                }
                else
                {
                     $('.edit-div-error').hide();
                    //
                     $('#edit-shelf-modal').modal('hide');

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


    $('.conf_msg').on('click', function () {

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
});


$(document).on("click",".edit-shelf-btn",function() {


        var edit_shelf_id = $(this).data('id');
        $.get('edit-library-shelf/'+edit_shelf_id, function (data) {

            $('#edit-shelf-form').attr('action', base_url +'update-library-shelf');
            $('#edit-shelf-modal').modal('show');
            $('#edit-shelf-id').val(data.shelf_Id);
            $('#edit-shelf-no').val(data.shelf_No);
            $('#edit-rack-id').val(data.rack_Id).trigger('change');
        })
    });

$(document).on("click",".delete-shelf-btn",function() {


    var shelf_delete_id = $(this).data('id');
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
                $.get('delete-library-shelf/'+shelf_delete_id, function (data) {
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

$(document).on("click",".show-shelf-btn",function() {

    var show_shelf_id = $(this).data('id');

    $.get('show-library-shelf/'+show_shelf_id, function (data) {
        console.log(data);

        $('#show-shelf-modal').modal('show');
        $('#show-shelf-no').text(data.shelf_No);
        $('#show-rack-no').text(data.rack_No);

    })

});

function myFunction() {

    $(".close").attr('disabled' , true);
    $(".add-btn").attr('disabled' , true);
    $(".update-btn").attr('disabled' , true);
};


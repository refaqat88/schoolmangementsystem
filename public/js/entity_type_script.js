// Wait for the DOM to be ready
$(document).ready(function () {

    $(document).on("click", "#show-entitytype-modal-btn", function (e) {
        e.preventDefault();
        $('#add-entitytype-modal').modal('show');
    });

    $(document).on("click", "#add-entitytype-btn", function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var entitytypeData = $('#add-entitytype-form').serialize();
        $.ajax({
            url: base_url + 'add-entitytype',
            method: 'post',
            data: entitytypeData,
            success: function (result) {
                console.log(result);
                if (result.errors) {
                    //$('#add-alert-danger').html('');
                    $('.add-div-error').text('');

                    $.each(result.errors, function (key, value) {
                        //console.log(value);
                        $('#add-entitytype-modal').modal('show');
                        $('.add-div-error.' + key).text(value);

                        $('.add-div-error .' + key).show();

                    });
                } else {
                    swal({
                        title: "Added successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    location.reload();
                }
            }
        });
    });

    $(document).on("click", "#update-entitytype-btn", function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var editentitytypeData = $('#edit-entitytype-form').serialize();
        $.ajax({
            url: base_url + "update-entitytype",
            method: 'post',
            data: editentitytypeData,
            success: function (result) {
                console.log(result);
                //alert(response.message);
                $('.edit-div-error').text('');
                if (result.errors) {

                    $.each(result.errors, function (key, value) {
                        //console.log(value);
                        $('#edit-entitytype-modal').modal('show');
                        $('.edit-div-error.' + key).text(value);

                        $('.edit-div-error .' + key).show();

                    });
                } else {
                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    location.reload();

                }
            }
        });
    });
});

$(document).on("click", ".edit-entitytype-btn", function () {
    var entity_typ_id = $(this).data('id');
    $.get('edit-entitytype/' + entity_typ_id, function (data) {
        console.log(data);
        $('#edit-entitytype-form')[0].reset();
        $('#edit-entitytype-form').attr('action', base_url + 'update-entitytype');
        $('#edit-entitytype-modal').modal('show');
        $('#entity_id').val(data.ent_typ_Id);
        $('#ent_type_name').val(data.ent_typ_Name).change();


    })
});

$(document).on("click", ".delete-entitytype-btn", function () {
    var ent_typ_delete_id = $(this).data('id');
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
                $.get('delete-entitytype/' + ent_typ_delete_id, function (data) {
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

$(document).on("click", ".show-entitytype-btn", function () {

    var ent_type_id = $(this).data('id');

    $.get('show-entitytype/' + ent_type_id, function (data) {
        console.log(data);

        $('#show-ent-save-btn').hide();
        $('#show-entity-modal').modal('show');
        $('#show_ent_name').text(data.ent_typ_Name);


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
                $(".close").attr('disabled', false);
                $(".add-btn").attr('disabled', false);
                $(".update-btn").attr('disabled', false);
                swal.close();
            } else {
                location.reload();
            }
        });
});
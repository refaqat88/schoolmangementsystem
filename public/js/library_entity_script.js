// Wait for the DOM to be ready
$(document).ready(function(){

    $(document).on("click","#show-library-entity-btn",function(e) {
        e.preventDefault();
        $('#add-library-entity-modal').modal('show');
    });

    $(document).on("click","#add-library-entity-btn",function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var add_library_Data =  $('#add-library-entity-form').serialize();
        $.ajax({
            url: base_url + 'add-library-entity',
            method: 'post',
            data:  add_library_Data,
            success: function(result){
                console.log(result);
                if(result.errors)
                {
                    //$('#add-alert-danger').html('');
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#add-library-entity-modal').modal('show');
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
                        timer: 1000
                    });
                    location.reload();


                }
            }});
    });

    $(document).on("click","#update-library_entity-btn",function(e) {

        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var edit_library_data =  $('#edit-library-entity-form').serialize();
        $.ajax({
            url: base_url + "update-library-entity",
            method: 'post',
            data:  edit_library_data,
            success: function(result){
                console.log(result);
                $('.edit-div-error').text('');
                if(result.errors)
                {
                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#edit-library-entity-modal').modal('show');
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


$(document).on("click",".edit-library-entity",function() {
    var library_entity_id = $(this).data('id');
    $.get('edit-library-entity/'+library_entity_id, function (data) {
        console.log(data);
        //$('#edit-library-entity-form')[0].reset();
        $('#edit-library-entity-form').attr('action', base_url +'update-library-entity');
        $('#edit-library-entity-modal').modal('show');
        $('#library-entity-id').val(data.lent_Code);

        $('#edit-publisher').val(data.pub_Id).change();
        $('#edit-author').val(data.auth_Id).change();
        $('#edit-edition').val(data.edition_Id).change();
        $('#edit-general-entity').val(data.gent_Code).change();



    })
});

$(document).on("click",".delete-library-entity-btn",function() {
    var library_entity_delete_id = $(this).data('id');
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
                $.get('delete-library-entity/'+library_entity_delete_id, function (data) {
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

$(document).on("click",".show-library-entity",function() {

    var show_library_id = $(this).data('id');

    $.get('show-library-entity/'+show_library_id, function (data) {
        //console.log(data);
        $('#show-library-entity-modal').modal('show');
        $('#show-publisher').text(data.pub_Name);
        $('#show-author').text(data.auth_Name);
        $('#show-edition').text(data.edition_N0);
        $('#show-general-entity').text(data.gent_Name);
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

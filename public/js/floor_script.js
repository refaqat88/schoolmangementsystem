// Wait for the DOM to be ready
$(document).ready(function(){
    $('#success-alert').html('');
    $(document).on("click","#show-floor-btn",function(e) {
        e.preventDefault();
        $('#add-floor-modal').modal('show');
    });

    $(document).on("click","#add-floor-btn",function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var floorData =  $('#add-floor-form').serialize();
        $.ajax({
            url: base_url + 'add-libraryfloor',
            method: 'post',
            data:  floorData,
            success: function(result){
                console.log(result);
                if(result.errors)
                {
                    //$('#add-alert-danger').html('');
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#add-floor-modal').modal('show');
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

    $(document).on("click","#update-floor-btn",function(e) {

        e.preventDefault();
        //$('#SubjectForm')[0].reset();
        //$('#EditSubjectForm').attr('action', base_url +'update-subject');
        //$('#Model-Title').html("Add New Subject");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var editfloordata =  $('#edit-floor-form').serialize();
        $.ajax({
            url: base_url + "update-libraryfloor",
            method: 'post',
            data:  editfloordata,
            success: function(result){
                console.log(result);
                //alert(response.message);
                $('.edit-div-error').text('');
                if(result.errors)
                {
                    //$('#edit-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#edit-floor-modal').modal('show');
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

$(document).on("click",".edit-floor",function() {
    // console.log('edit modal');
    var floor_id = $(this).data('id');
    $.get('edit-libraryfloor/'+floor_id, function (data) {
        console.log(data);
        $('#edit-floor-form')[0].reset();
        $('#edit-floor-form').attr('action', base_url +'update-libraryfloor');
        $('#edit-floor-modal').modal('show');
        $('#floor_id').val(data.floor_Id);
        $('#floor_name').val(data.floor_Name);
        $('#floor_shelfid').val(data.shelf_Id).change();
        // $('#pub_status').val(data.pub_Status).change();



    })
});
$(document).on("click",".delete-floor-btn",function() {
    var floor_delete_id = $(this).data('id');
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
                $.get('delete-libraryfloor/'+floor_delete_id, function (data) {
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

$(document).on("click",".show-floor",function() {

    var floor_id = $(this).data('id');

    $.get('show-libraryfloor/'+floor_id, function (data) {
        console.log(data);

        $('#show-floor-Btn').hide();
        $('#show-floor-modal').modal('show');
        $('#show_floor_name').text(data.floor_Name);
        $('#show_floor_shelfid').text(data.shelf_Id);


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

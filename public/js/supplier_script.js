// Wait for the DOM to be ready
$(document).ready(function(){
    $('#success-alert').html('');
    $(document).on("click","#show-supplier-btn",function(e) {
        e.preventDefault();
        $('#add-supplier-modal').modal('show');
    });

    $(document).on("click","#add-supplier-btn",function(e) {
        e.preventDefault();
        //$('#SubjectForm')[0].reset();
        console.log('in pulisher');
        // $('#StationaryForm').attr('action', base_url +'stationary/add-stationary');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var supplierData =  $('#add-supplier-form').serialize();
        $.ajax({
            url: base_url + 'add-supplier',
            method: 'post',
            data:  supplierData,
            success: function(result){
                console.log(result);
                if(result.errors)
                {
                    //$('#add-alert-danger').html('');
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#add-supplier-modal').modal('show');
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

    $(document).on("click","#update-supplier-btn",function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var editsupplierdata =  $('#edit-supplier-form').serialize();
        $.ajax({
            url: base_url + "update-supplier",
            method: 'post',
            data:  editsupplierdata,
            success: function(result){
                console.log(result);
                //alert(response.message);
                $('.edit-div-error').text('');
                if(result.errors)
                {
                    //$('#edit-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#edit-supplier-modal').modal('show');
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


$(document).on("click",".edit-supplier",function() {

    // console.log('edit modal');
    var supp_id = $(this).data('id');
    $.get('edit-supplier/'+supp_id, function (data) {
        console.log(data);
        $('#edit-supplier-form')[0].reset();
        $('#edit-supplier-form').attr('action', base_url +'update-supplier');
        $('#edit-supplier-modal').modal('show');
        $('#supp_id').val(data.supp_Id);
        $('#supp_name').val(data.supp_Name);
        $('#supp_cont').val(data.supp_Contact);
        $('#supp_add').val(data.supp_Add);
        // $('#pub_status').val(data.pub_Status).change();
        $('#supp_status').val(data.supp_Status).change();



    })
});

$(document).on("click",".delete-supplier-btn",function() {

    var supp_delete_id = $(this).data('id');
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
                $.get('delete-supplier/'+supp_delete_id, function (data) {
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

$(document).on("click",".show-supplier",function() {

    var supp_id = $(this).data('id');

    $.get('show-supplier/'+supp_id, function (data) {
        console.log(data);

        $('#show-supp-btn').hide();
        $('#show-supplier-modal').modal('show');
        $('#show_supp_name').text(data.supp_Name);
        $('#show_supp_cont').text(data.supp_Contact);
        $('#show_supp_add').text(data.supp_Add);
        $('#show_supp_stat').text(data.supp_Status);


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



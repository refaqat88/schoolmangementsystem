// Wait for the DOM to be ready
$(document).ready(function(e){

    $(document).on("click", "#add-library-modal-btn", function (e) {
        $('#add-library-modal').modal('show');
        e.preventDefault();
    });

    $(document).on("click", "#add-library-btn", function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var library_Data =  $('#add-new-library-form').serialize();
        $.ajax({
            url: base_url + 'add-library',
            method: 'post',
            data:  library_Data,
            success: function(result){
                console.log(result);
                $('.add-div-error').text('');
                if(result.errors)
                {

                    $('#add-alert-danger').html('');

                    $.each(result.errors, function(key, value){

                        $('#add-stationary-modal').modal('show');

                        $('.add-div-error.'+key).text(value);

                        $('.add-div-error .'+key).show();
                        //$('.alert-danger').show();


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
                    setTimeout(function(){location.reload();}, 2000);
                }
            }});
    });
    $(document).on("click", "#update-library-btn", function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var update_library_data =  $('#edit-new-library-form').serialize();
        $.ajax({
            url: base_url + "update-library",
            method: 'post',
            data:  update_library_data,
            success: function(result){
                //alert(response.message);
                $('.edit-div-error').text('');
                if(result.errors)
                {
                    $('#edit-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#edit-library-modal').modal('show');
                        $('.edit-div-error.'+key).text(value);

                        $('.edit-div-error .'+key).show();

                    });
                }
                else
                {
                    //$('#success-message').html('');
                    $('.edit-div-error').hide();

                    $('#edit-library-modal').modal('hide');

                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                    });

                    setTimeout(function(){ location.reload();}, 2000);

                }
            }});
    });

    $(document).on("click", ".edit-library-btn", function (e) {
        var edit_library_id = $(this).data('id');
        $.get('edit-library/'+edit_library_id, function (data) {

            console.log(data);
            $('#edit-library-modal').modal('show');
            $('#edit-libriry-id').val(data.library_Id);
            $('#edit-library-entity').val(data.lent_Code).trigger('change');
            $('#edit-category').val(data.stat_categ_Id).trigger('change');
            $('#edit-floor').val(data.floor_Id).trigger('change');
            $('#edit-condition').val(data.stat_ret_Condition).trigger('change');
            $('#edit-author').val(data.auth_Id).trigger('change');
            $('#edit-publisher').val(data.pub_Id).trigger('change');
            $('#edit-supplier').val(data.supp_Id).trigger('change');
            $('#edit-edition').val(data.edition_Id).trigger('change');
            $('#edit-student').val(data.std_Id).trigger('change');
            $('#edit-teacher').val(data.emp_Id).trigger('change');
            //$('#edit-teacher').val(data.emp_Id).trigger('change');
            $('#edit-alert-type').val(data.stat_alert_Type).trigger('change');
            $('#edit-issue-date').val(data.stat_iss_Date);
            $('#edit-return-date').val(data.stat_ret_Date);

            $("#edit-school-section").val(data.sc_sec_Id).trigger('change');
            $("#edit-subject").val(data.selectedSubjectIds).trigger('change');

        })
    });


    $(document).on("click", ".show-library-btn", function () {
        var library_id = $(this).data('id');
        $.get('show-library/'+library_id, function (data) {
            //console.log(data);
            $('#view-library-modal').modal('show');
            $('#show-library-enity').text(data.gent_Name);
            $('#show-stationary-category').text(data.stat_categ_Name);
            $('#show-library-floor').text(data.floor_Name);
            $('#show-condition').text(data.stat_ret_Condition);
            $('#show-author-name').text(data.auth_Name);
            $('#show-publisher').text(data.pub_Name);
            $('#show-supplier').text(data.supp_Name);
            $('#show-edition').text(data.edition_N0);
            $('#show-alert-type').text(data.stat_alert_Type);
            $('#show-student').text(data.std_Fname+" "+data.std_Mname+" "+data.std_Lname);
            $('#show-teacher').text(data.emp_given_name);


            $('#show-issue-date').text(data.stat_iss_Date);
            $('#show-return-date').text(data.stat_ret_Date);

        })
    });

    $(document).on("click", ".delete-library-btn", function () {

        var library_id = $(this).data('id');
        
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
                closeOnCancel: true,

            },
            function (isConfirm) {
                if (isConfirm) {
                    $.get('delete-library/'+library_id, function (data) {
                    swal({
                        icon : 'warning',
                        title: "Deleted successfully!",
                        showCancelButton: false,
                        showConfirmButton: false,
                        type: "success"
                    });
                    setTimeout(function(){ location.reload(); }, 2000);
                    });
                    
                } else {

                    location.reload();

                }
            });
    });
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
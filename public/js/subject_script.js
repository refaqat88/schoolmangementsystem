// Wait for the DOM to be ready
$(document).ready(function(){
    $('#success-alert').html('');
    $('#show-subject-btn').click(function(e){
        e.preventDefault();
        $('#SubjectModal').modal('show');
    });

    $(document).on('click','#add-subject-Btn',function(e){
        e.preventDefault();
        //$('#SubjectForm')[0].reset();
        $('#SubjectForm').attr('action', base_url +'add-subject');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var classdata =  $('#SubjectForm').serialize();
        $.ajax({
            url: base_url + 'add-subject',
            method: 'post',
            data:  classdata,
            success: function(result){
                console.log(result);
                if(result.errors)
                {
                    //$('#add-alert-danger').html('');
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#SubjectModal').modal('show');
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
                    });
                    setTimeout(function(){ location.reload(); }, 2000);

                }
            }});
    });
    $(document).on('click','#update-Btn',function(e){
        e.preventDefault();
        //$('#SubjectForm')[0].reset();
        //$('#EditSubjectForm').attr('action', base_url +'update-subject');
        //$('#Model-Title').html("Add New Subject");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var editsubjectdata =  $('#EditSubjectForm').serialize();
        $.ajax({
            url: base_url + "update-subject",
            method: 'post',
            data:  editsubjectdata,
            success: function(result){
                //alert(response.message);
                $('.edit-div-error').text('');
                if(result.errors)
                {
                    //$('#edit-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#EditSubjectModal').modal('show');
                        $('.edit-div-error.'+key).text(value);

                        $('.edit-div-error .'+key).show();

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
                    });
                    setTimeout(function(){ location.reload(); }, 1000);

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

$(document).on('click', '#edit-subject', function () {
    var subject_id = $(this).data('id');
    $.get('edit-subject/'+subject_id, function (data) {
        $('#EditSubjectForm')[0].reset();
        $('#EditSubjectForm').attr('action', base_url +'update-subject');
        $('#EditSubjectModal').modal('show');
        $('#sub_id').val(data.sub_Id);
        $('#sub_name').val(data.subject);
        $('#sub_code').val(data.sub_Code);


    })
});

$(document).on('click','.delete-subject-btn', function () {

    var subject_delete_id = $(this).data('id');
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
                    $.get('delete-subject/'+subject_delete_id, function (data) {
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


$(document).on('click', '.show-subject', function () {
    // alert('fdgfsg');
    var subject_id = $(this).data('id');
    $.get('show-subject/'+subject_id, function (data) {
        $('#Show-Btn').hide();
        $('#ShowSubjectModal').modal('show');
        $('#show_sub_name').html(data.subject);
        $('#show_sub_code').html(data.sub_Code);
        // $('#show_theory_marks').html(data.sub_th_Mks);
        // $('#show_practical_marks').html(data.sub_prac_Mks);
        // $('#show_total_marks').html(data.sub_tot_Mks);
        // $('#show_passing_marks').html(data.sub_pass_Mks);

    })


});


    window.setTimeout(function () {
        $("#success-alert1").alert('close');
    }, 5000);
    /*window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);
*/



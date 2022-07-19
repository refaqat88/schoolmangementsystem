// Wait for the DOM to be ready
$(document).ready(function(){
    //alert('hello');
    $('#ShowSubject').click(function(e){
        $('#SubjectForm')[0].reset();
        $('#SubjectForm').attr('action', base_url +'add-subject');
        $('#Model-Title').html("Add New Subject");
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: base_url + "add-subject",
            method: 'post',
            data:  $(this).serialize(),
            success: function(result){
                if(result.errors)
                {
                    $('.alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(result.errors);
                        $('#SubjectModal').modal('show');
                        $('.alert-danger').show();
                        $('.alert-danger').append('<li>'+value+'</li>');
                    });
                }
                else
                {
                    $('.alert-danger').hide();
                    //$('#open').hide();
                    $('#SubjectForm').modal('hide');
                }
            }});
    });
});

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

$('body').on('click', '#edit-subject', function () {
    var subject_id = $(this).data('id');
    $.get('edit-subject/'+subject_id, function (data) {
        //console.log(data);
        $('#Model-Title').html("Edit Subject");
        //$('#Save-Btn').val("Update");
        //$('#Save-Btn').prop('disabled',false);
        $('#SubjectForm').attr('action', base_url +'update-subject/'+subject_id);
        $('#SubjectModal').modal('show');
        $('#sub_id').val(data.sub_Id);
        $('#sub_name').val(data.subject);
        $('#sub_code').val(data.sub_Code);
        $('#theory_marks').val(data.sub_th_Mks);
        $('#practical_marks').val(data.sub_prac_Mks);
        $('#total_marks').val(data.sub_tot_Mks);
        $('#passing_marks').val(data.sub_pass_Mks);

    })
});

$('body').on('click', '#show-subject', function () {
    var subject_id = $(this).data('id');
    $.get('show-subject/'+subject_id, function (data) {
        //console.log(data);
        $('#Model-Title').html("Show Subject");
        $('#Show-Btn').hide();
        //$('#Save-Btn').prop('disabled',false);
        $('#ShowSubjectModal').modal('show');
        //$('#sub_id').val(data.sub_Id);
        $('#show_sub_name').html(data.subject);
        $('#show_sub_code').html(data.sub_Code);
        $('#show_theory_marks').html(data.sub_th_Mks);
        $('#show_practical_marks').html(data.sub_prac_Mks);
        $('#show_total_marks').html(data.sub_tot_Mks);
        $('#show_passing_marks').html(data.sub_pass_Mks);

    })


});


    window.setTimeout(function () {
        $("#success-alert").alert('close');
    }, 2000);

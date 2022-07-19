// Wait for the DOM to be ready
$(document).ready(function(){
    $('#success-alert').html('');
    $('#show-subject-btn').click(function(e){
        e.preventDefault();
        $('#SubjectModal').modal('show');
    });

    $('#add-subject-Btn').click(function(e){
        e.preventDefault();
        console.log('subject Modal');
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
                    $('#add-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#SubjectModal').modal('show');
                        $('.add-div-error').show();
                        //$('.alert-danger').show();
                        $('#add-alert-danger').append('<li>'+value+'</li>');

                    });
                }
                else
                {
                    $('#success-message').html('');
                    $('.add-div-error').hide();

                    $('#SubjectModal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>'+result.message+'</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    $('#success-message').delay(2000).fadeOut('slow');
                    //location.reload();

                }
            }});
    });
        $('#update-school-btn').click(function(e){
        e.preventDefault();
        //$('#SubjectForm')[0].reset();
        //$('#EditSubjectForm').attr('action', base_url +'update-subject');
        //$('#Model-Title').html("Add New Subject");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var editschooldata  = new FormData($('#editschoolform')[0]);
        $.ajax({
            url: base_url + "update-school",
            method: 'post',
            contentType: false,
            processData: false,
            data:  editschooldata,
            success: function(result){
                console.log(result);
                $('.edit-div-error').text('');
                if(result.errors)
                {
                    //$('#edit-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#edit-School-modal').modal('show');
                        $('.edit-div-error.'+key).text(value);

                        $('.edit-div-error .'+key).show();

                        //$('.edit-div-error').show();
                        //$('.alert-danger').show();
                        //$('#edit-alert-danger').append('<li>'+value+'</li>');

                    });
                }
                else
                {
                    $('#success-message').html('');
                    $('.edit-div-error').hide();

                    $('#edit-School-modal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').show();
                    $('#success-message').append('<p>'+result.message+'</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    $('#success-message').delay(2000).fadeOut('slow');

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
});


$('body').on('click', '.edit-school-btn', function () {

    var school_id = $(this).data('id');
    $.get('edit-school/'+school_id, function (data) {
        console.log(data.school_logo);
        //$('#editschoolform')[0].reset();
        $('#editschoolform').attr('action', base_url +'update-school');

        $('#edit-School-modal').modal('show');
        $('#edit-school-id').val(data.pk_school_Id);
        $('#edit-school-name').val(data.school_Name);
        $('#sch-logo-view').attr('src', asset_url+'/upload/school/' + data.school_logo);
        $('#edit-principal-name').val(data.principal_Name);

        $('#edit-affiliation').val(data.affiliation_No);

        $("#edit-board").val(data.board_Id).trigger('change');
        $("#edit-district").val(data.dom_Id).trigger('change');
        $("#edit-city").val(data.city_Id).trigger('change');

        $('#edit-registration').val(data.registration);
        $('#edit-registered-with').val(data.registered_with);
        $('#edit-primary-contact').val(data.primary_Contact);
        $('#edit-secondary-contact').val(data.secondary_Contact);
        $('#edit-school-address').val(data.school_Add);
        $('#edit-email').val(data.email);
        $('#edit-website').val(data.website);

    })
});

$('body').on('click', '#view-school-btn', function () {
    //alert('fdgfsg');
    var show_school_id = $(this).data('id');
    $.get('show-school/'+show_school_id, function (data) {
        console.log(data);
        $('#Show-Btn').hide();
        $('#view-school-modal').modal('show');


        $('#show-school-name').html(data.school_Name);
        $('#show-principal-name').html(data.principal_Name);
        $('#show-logo-view').attr('src', asset_url+'/upload/school/' + data.school_logo);
        $('#show-affiliation-no').html(data.affiliation_No);

        $("#show-board").html(data.board_Name);

        $('#show-registration').html(data.registration);
        $('#show-registered-with').html(data.registered_with);
        $('#show-primary-contact').html(data.primary_Contact);
        $('#show-secondary-contact').html(data.secondary_Contact);
        $('#show-district').html(data.dom_District);
        $('#show-city').html(data.city_name);
        $('#show-address').html(data.school_Add);
        $('#show-email').html(data.email);
        $('#show-website').html(data.website);

    })


});


    window.setTimeout(function () {
        $("#success-alert1").alert('close');
    }, 5000);
   /* window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);
*/

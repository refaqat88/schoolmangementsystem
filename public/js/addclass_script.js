// Wait for the DOM to be ready
$(document).ready(function(e){
    $('#success-alert').html('');
    $('#newclassbtn').click(function(e){
        $('#newclass').modal('show');
        e.preventDefault();
    });

        $('#add-new-class-btn').click(function(e){
        e.preventDefault();
        // alert('yeah');
        //$('#ClassForm')[0].reset();
        $('#add-new-class-form').attr('action', base_url +'add-class');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var classdata =  $('#add-new-class-form').serialize();
        $.ajax({
            url: base_url + 'add-class',
            method: 'post',
            data:  classdata,
            success: function(result){
                console.log(result);
                $('.add-div-error').text('');
                if(result.errors)
                {

                    $('#add-alert-danger').html('');

                    $.each(result.errors, function(key, value){

                        $('#newclass').modal('show');

                        $('.add-div-error.'+key).text(value);

                        $('.add-div-error .'+key).show();
                        //$('.alert-danger').show();


                    });
                }
                else
                {
                    // $('#success-message').html('');
                    // $('.add-div-error').hide();
                    //
                    // $('#newclass').modal('hide');
                    // $('#success-message').show();
                    // $('#success-message').append('<p>'+result.message+'</p>');
                    // //$('#success-alert').show();
                    // //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    // swal("Good job!", "Your Class Added Successfully!", "success");
                    // $('#success-message').delay(2000).fadeOut('slow');
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
        $('#update-class-btn').click(function(e){
        e.preventDefault();
        //alert('hello');
        //$('#SubjectForm')[0].reset();
        $('#edit-new-class-form').attr('action', base_url +'update-class');
        //$('#Model-Title').html("Add New Subject");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var editsubjectdata =  $('#edit-new-class-form').serialize();
        $.ajax({
            url: base_url + "update-class",
            method: 'post',
            data:  editsubjectdata,
            success: function(result){
                //alert(response.message);
                $('.edit-div-error').text('');
                if(result.errors)
                {
                    $('#edit-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#editclassmodal').modal('show');
                        $('.edit-div-error.'+key).text(value);

                        $('.edit-div-error .'+key).show();
                        //$('.alert-danger').show();
                        //$('#edit-alert-danger').append('<li>'+value+'</li>');

                    });
                }
                else
                {
                    $('#success-message').html('');
                    $('.edit-div-error').hide();

                    $('#editclassmodal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>'+result.message+'</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    // $('#success-message').delay(2000).fadeOut('slow');
                    // location.reload();
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

    $('body').on('click', '.editclass', function () {
        var class_id = $(this).data('id');

        $.get('edit-class/'+class_id, function (data) {

            //console.log(data);
            $('#editclassmodal').modal('show');
            $('#edit-class-id').val(data.cls_Id);
            $('#edit-class-name').val(data.class);
            $('#edit-numeric-name').val(data.numeric_name);
            $('#edit-no-of-period').val(data.no_of_period);
            $('#edit-tuition-fee').val(data.tuition_fee);
            var num = data.sc_sec_Id;
            /*$("#edit-school-section select.select option").each(function(){
                if($(this).val()==num){ // EDITED THIS LINE
                    $(this).attr("selected","selected");
                }
            });*/
            //$("select#edit-school-section option:selected").val(data.sc_sec_Id);
            //$('#edit-school-section option[value="'+data.sc_sec_Id+'"]').prop('selected', true);
            //$('[id=edit-school-section] option').filter(function() {
               // return ($(this).val() == data.sc_sec_Id); //To select Green
            //}).attr('selected', true);
            $("#edit-school-section").val(data.sc_sec_Id).trigger('change');
            $("#edit-subject").val(data.selectedSubjectIds).trigger('change');
            /*var valoresArea = $('#edit-subject').val(data.subject);
            alert(valoresArea);*/
            //var newvaloresArea=data.subject;

           // var values=data.subject;
           // $.each(values.split(","), function(i,e){
               // $(".edit-subject option[value='" + e + "']").prop("selected", true);
           // /});

// it has the multiple values to set separated by comma
            //var arrayArea = newvaloresArea.split(',');
            //alert(newvaloresArea);
         /*   $.each(data.subject, function(key, value) {
                $('select[name="subject"]').append('<option value="'+ key +'">'+ value +'</option>');
            });*/
            /*$.each(newvaloresArea, function(key, value){
                //$(this).select2('val', newvaloresArea);
                $('.edit-subject').select2('val',value);
            });
*/





        })
    });
    $('.show-view-class-btn').on('click', function () {

        var class_id = $(this).data('id');
        $.get('show-class/'+class_id, function (data) {
           //console.log(data);
            $('#viewclass').modal('show');
            $('#show-class-name').text(data.class);
            $('#show-tuition-fee').text(data.tuition_fee);
            $('#show-no-of-periods').text(data.no_of_period);
            $('#show-school-section').text(data.sc_sec_name);
            $(".subjects_table tbody").empty();
            $.each(data.subjects, function(key, val) {
                var markup = "<tr><td>" + (key + 1) + "</td><td>" + val.subject + "</td></tr>";
                $(".subjects_table tbody").append(markup);
                // $('select[name="subject"]').append('<option value="'+ key +'">'+ value +'</option>');
            });

        })
    });

    $('.delete-class-btn').on('click', function () {

        var class_delete_id = $(this).data('id');
        
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
                    $.get('delete-class/'+class_delete_id, function (data) {
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
                    // var myhref = $('.confrm_delet').attr("data-id")
                    // swal("Deleted Successfully!", "success");
                    // window.location.href= myhref;

                }
            });
    });
});

    window.setTimeout(function () {
        $("#success-alert").alert('close');
    }, 2000);
    /*window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);
*/

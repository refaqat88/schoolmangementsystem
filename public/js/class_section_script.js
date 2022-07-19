// Wait for the DOM to be ready
$(document).ready(function(e) {
    TotalStudent();
    $('#success-alert').html('');
    $('#show-class-section-btn').click(function(e) {
        $('#class-section-modal').modal('show');
        e.preventDefault();
    });

    $('#add-class-section-btn').click(function(e) {
        e.preventDefault();
        // alert('hello');
        //$('#ClassForm')[0].reset();
        $('#add-class-section-form').attr('action', base_url + 'add-class-section');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var add_class_section_data = $('#add-class-section-form').serialize();
        $.ajax({
            url: base_url + 'add-class-section',
            method: 'post',
            data: add_class_section_data,
            success: function(result) {
                //console.log(result);
                $('.add-div-error').text('');
                if (result.errors) {
                    $('#add-alert-danger').html('');

                    $.each(result.errors, function(key, value) {
                        //console.log(value);
                        $('#class-section-modal').modal('show');
                        $('.add-div-error.' + key).text(value);

                        $('.add-div-error .' + key).show();
                        /*$('.add-div-error').show();
                        //$('.alert-danger').show();
                        $('#add-alert-danger').append('<li>'+value+'</li>');*/



                    });
                } else {
                    $('#success-message').html('');
                    $('.add-div-error').hide();

                    $('#class-section-modal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>' + result.message + '</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    $('#success-message').delay(2000).fadeOut('slow');
                    // location.reload();
                    swal({
                        title: "Added successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                    });
                    setTimeout(function() { location.reload(); }, 1000);

                }
            }
        });
    });


    $(document).on("change", "#sel_class", function(event) {
        event.stopPropagation();
        // Department id
        var id = $(this).val();

        // Empty the dropdown
        $('#sel_student').find('option').not(':first').remove();

        // AJAX request
        $.ajax({
            url: base_url + 'get-student/' + id,

            type: 'get',

            data: { id: id },

            success: function(response) {

                $("#sel_student").empty();
                $("#edit_sel_student").empty();
                $("#representative").empty();
                $("#edit-representative").empty();
                $("#sel_student").append('<option value="">Select Student</option>');
                $("#representative").append('<option value="">Select Class representative</option>');
                $("#edit-representative").append('<option value="">Select Class representative</option>');

                $.each(response, function(key, value) {

                    $("#sel_student").append('<option value="' + value.id + '">' + value.name + '</option>');
                    $('#sel_student').selectpicker("refresh");

                    $("#edit_sel_student").append('<option value="' + value.id + '">' + value.name + '</option>');
                    $('#edit_sel_student').selectpicker("refresh");


                    //$("#representative").append('<option value="' + value.std_Id + '">' + value.std_Fname + '</option>');
                    $('#representative').append('<option value="' + value.id + '">' + value.name + '</option>');
                    $('#representative').selectpicker("refresh");

                    $('#edit-representative').append('<option value="' + value.id + '">' + value.name + '</option>');
                    $('#edit-representative').selectpicker("refresh");


                });


            }
        });
    });



    $('#sel_student').change(function() {
        var count = $("#sel_student :selected").length;
        $("#add-no-of-student").val(count);
    });
    $('#edit_sel_student').change(function() {
        var count = $("#edit_sel_student :selected").length;
        console.log(count);
        $("#edit-no-of-student").val(count);
    });

    /*for edit modal */


    // $("#edit_sel_class").bind("ready change", function(event){
    // //$('#edit_sel_class').change(function(){

    //     // Department id
    //     var id = $(this).val();
    //     //alert(id);
    //     // Empty the dropdown
    //     $('#edit_sel_student').find('option').not(':first').remove();

    //     // AJAX request
    //     $.ajax({
    //         url: base_url +'get-student/'+id,
    //         type   : 'get',
    //         data   : {id: id},
    //         success: function(response){
    //             //console.log(response);
    //             $("#edit_sel_student").empty();
    //             $("#edit-representative").empty();
    //             $("#edit-representative").append('<option value="">Select Class Representative</option>');
    //             $("#edit_sel_student").append('<option value="">Select Student</option>');
    //             $.each(response , function (key, value) {
    //                 $("#edit_sel_student").append('<option value="' + value.id + '" >' + value.name + '</option>');
    //                 $("#edit-representative").append('<option value="' + value.id + '" >' + value.name + '</option>');

    //             });
    //         }
    //     });
    // });

    function TotalStudent() {
        var count = $("#edit_sel_student :selected").length;
        $("#edit-no-of-student").val(count);
    };
    /*$('#edit_sel_student').change(function(){
        var count = $("#edit_sel_student :selected").length;
        $("#edit-no-of-student").val(count);
    });*/
    /*for edit modal */
    /* $('#sel_student').change(function(){

         $('#select-meal-type option:selected').each(function() {
             alert($(this).val());
         });
         // Department id
                 //var id = $(this).val();
                 //console.log(response);
                 //$("#representative").empty();
                 //$("#sel_student").append('<option value="">Select Class Representative</option>');
                     var val = $(this).val(),

                         text = $(this).find("option:selected").html();
                     //$("#sel_student").append('<option value="' + value.std_Id + '">' + value.std_Fname + '</option>');
                     //$("#representative").val(val).trigger('change');
                     $("#representative").html('<option value="' + val + '">' + text + '</option>');


         });*/


    $('#update-class-section-btn').click(function(e) {
        e.preventDefault();
        $('#edit-class-section-form').attr('action', base_url + 'update-class-section');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var edit_class_section_data = $('#edit-class-section-form').serialize();
        $.ajax({
            url: base_url + "update-class-section",
            method: 'post',
            data: edit_class_section_data,
            success: function(result) {
                $('.edit-div-error').text('');
                if (result.errors) {
                    $('#edit-alert-danger').html('');
                    $.each(result.errors, function(key, value) {
                        $('#edit-class-section-modal').modal('show');
                        $('.edit-div-error.' + key).text(value);
                        $('.edit-div-error .' + key).show();
                    });
                } else {
                    $('#success-message').html('');
                    $('.edit-div-error').hide();
                    $('#edit-class-section-modal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>' + result.message + '</p>');
                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                    });
                    setTimeout(function() { location.reload(); }, 1000);
                }
            }
        });
    });

    $(document).on('click', '.edit-class-section-btn', function() {
        TotalStudent();
        var edit_class_section_id = $(this).data('id');
        $.get('edit-class-section/' + edit_class_section_id, function(data) {
            $('#edit-class-section-modal').modal('show');
            $('#class-section-id').val(data.data.c_section_Id);
            $('#edit-class-section-name').val(data.data.class_section_name);
            $('#edit-no-of-student').val(data.data.no_of_student);
            var studentlist = '';
            $("#edit_sel_student").empty();
            studentlist += '<option value="" >Please Select Student</option>'
            var studentarrya = [];
            var i = 0;
            $.each(data.list, function(key1, value1) {
                studentarrya[i] = value1.id;
                i++;
            })
            $.each(data.list_student, function(key1, value1) {
                var selected = '';
                if (jQuery.inArray(value1.id, studentarrya) !== -1) {
                    selected = 'selected';
                }
                studentlist += '<option value="' + value1.id + '" ' + selected + ' >' + value1.name + '</option>'
            })

            $('#edit_sel_student').append(studentlist);
            $("#edit-teacher").val(data.data.emp_Id).trigger('change');

            // Subject section
            var teachersss = '';
            $('#edit-class-section-modal #edit-teacher').empty();

            teachersss += '<option value="" >Select Teacher</option>';

            $.each(data.teacherlist, function(key1, value1) {
                //alert(data.data.emp_Id);
                var selected = "";
                if (value1.id == data.data.emp_Id) {

                    selected = "selected";
                }
                teachersss += '<option value="' + value1.id + '" ' + selected + ' >' + value1.name + '</option>'
            })

            $('#edit-class-section-modal #edit-teacher').append(teachersss);


            // Subject section
            var subjectEl = '';
            $('#edit-class-section-modal #sel_class').empty();

            subjectEl += '<option value="" >Select Class</option>';

            $.each(data.classes, function(key1, value1) {
                var selected = "";
                if (value1.cls_Id == data.data.cls_Id) {
                    selected = "selected";
                }
                subjectEl += '<option value="' + value1.cls_Id + '" ' + selected + ' >' + value1.class + '</option>'
            })

            $('#edit-class-section-modal #sel_class').append(subjectEl);

            // Subject section
            var class_representatiavelist = '';
            $('#edit-class-section-modal #edit-representative').empty();

            class_representatiavelist += '<option value="" >Select Class Representative</option>';

            $.each(data.list_student, function(key1, value1) {
                var selected = "";
                if (value1.id == data.data.crep_Id) {
                    selected = "selected";
                }
                class_representatiavelist += '<option value="' + value1.id + '" ' + selected + ' >' + value1.name + '</option>'
            })

            $('#edit-class-section-modal #edit-representative').append(class_representatiavelist);

        })
    });
    $('.show-view-class-section-btn').on('click', function() {
        //alert('hello');
        var class_section_id = $(this).data('id');

        $.get('show-class-section/' + class_section_id, function(data) {
            console.log(data);
            var no_of_student = data.no_of_student ? data.no_of_student : '0';
            $('#view-class-section-modal').modal('show');
            $('#show-class-name').text(data.classs);
            $('#show-class-section-name').text(data.class_section_name);
            $('#show-class-strength').text(no_of_student);
            $('#show-class-teacher').text(data.teachers);
            $('#show-class-rep').text(data.classreps);
            $('.show_lst_student').html('');
               var markup = '';
                $.each(data.students , function (key, value) {
                     markup += "<tr><td>" +(key + 1) + "</td><td>" + value.name + "</td></tr>";

                    $(".show_lst_student").html(markup);
                    //$("#show_lst_student").text('<option value="' + value.id + '" >' + value.name + '</option>');
                    // $("#edit-representative").append('<option value="' + value.id + '" >' + value.name + '</option>');

                });
        })
    });


    $(document).on('click', '.delete-class-section-btn', function() {

        var class_section_delete_id = $(this).data('id');

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
            function(isConfirm) {
                if (isConfirm) {
                    $.get('delete-class-section/' + class_section_delete_id, function(data) {
                        swal({
                            icon: 'warning',
                            title: "Deleted successfully!",
                            showCancelButton: false,
                            showConfirmButton: false,
                            type: "success"
                        });
                        setTimeout(function() { location.reload(); }, 2000);
                    });

                } else {

                    location.reload();

                }
            });
    });
});





/*    window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);*/
window.setTimeout(function() {
    $("#success-message").alert('close');
}, 2000);
/*  window.setTimeout(function () {
      $("#success-message1").alert('close');
  }, 2000);*/
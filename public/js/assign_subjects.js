// Wait for the DOM to be ready
$(document).ready(function(e){
     $('#success-alert').html('');  
     

     $('#show-class-section-btn').click(function(e){
        $('#class-section-modal').modal('show');
        $('#add-class-section-form').attr('action', base_url +'assign_subjects/store');
        $('#id').val('');
        e.preventDefault();
    });


      
     $("#add-class-section-form").submit(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var add_class_section_data =  $('#add-class-section-form').serialize();
        var url =  $(this).attr('action');
       
        $.ajax({
            url: url ,
            method: 'post',
            data:  add_class_section_data,
            success: function(result){
                //console.log(result);
                $('.add-div-error').text('');


                if(result.subject){

                     $('#add-alert-danger').html('');
                       
                    $('.add-div-error.subject_id').text(result.subject);

                       $('.add-div-error .subject_id').show();

                }else if(result.errors)
                {
                    $('#add-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#class-section-modal').modal('show');
                        $('.add-div-error.'+key).text(value);

                        $('.add-div-error .'+key).show();
                        /*$('.add-div-error').show();
                        //$('.alert-danger').show();
                        $('#add-alert-danger').append('<li>'+value+'</li>');*/

                        

                    });


                }
                else
                {
                    $('#success-message').html('');
                    $('.add-div-error').hide();

                    $('#class-section-modal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>'+result.message+'</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    $('#success-message').delay(2000).fadeOut('slow');
                    location.reload();
                    swal({
                        title: result.message,
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                    });
                    setTimeout(function(){ location.reload();}, 1000);

                }
            }});
 
        return false;

     });

    $('#add-class-section-btn').click(function(e){
        e.preventDefault();
        $("#add-class-section-form").submit();
        //$('#ClassForm')[0].reset();
         
         
         
        
    });


    $(document).on("change",".cls_id", function(event){
        
        event.stopPropagation();
        var $this = $("#section_id");
        var id = $(this).val();
       
        $.ajax({
            url: base_url +'get_section/'+id,    
            type   : 'get',
            data   : {id: id},
            success: function(response){
                $this.empty(); 
                $("#subject_id").empty();
                $this.append('<option value="">Select Section</option>');
                $.each(response , function (key, value) {
                    $this.append('<option value="'+ value.c_section_Id +'">'+value.class_section_name+'</option>');
                });
                $this.selectpicker("refresh");
            }
        });
    });


    $(document).on("change",".section_id", function(event){
        
        event.stopPropagation();
        var $this = $("#subject_id");
        var id = $(this).val();
        var class_id = $("#cls_id option:selected").val() ;
        

        $.ajax({
            url: base_url +'get_class/'+class_id+'/'+id,    
            type   : 'get',
            data   : {id: id},
            success: function(response){
                $this.empty();
                $this.append('<option value="">Select Subject</option>');
                $.each(response , function (key, value) {

                    $this.append('<option value="'+ value.sub_Id +'">'+value.subject+'</option>');
                });
                $this.selectpicker("refresh");
            }
        });
    });



     $('#sel_student').change(function(){
         var count = $("#sel_student :selected").length;
         $("#add-no-of-student").val(count);
     });
    $('#edit_sel_student').change(function(){
         var count = $("#edit_sel_student :selected").length;
         console.log(count);
         $("#edit-no-of-student").val(count);
     });

        $('#update-class-section-btn').click(function(e){
        e.preventDefault();
        //alert('hello');
        //$('#SubjectForm')[0].reset();
        $('#edit-class-section-form').attr('action', base_url +'update-class-section');
        //$('#Model-Title').html("Add New Subject");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var edit_class_section_data =  $('#edit-class-section-form').serialize();
        $.ajax({
            url: base_url + "update-class-section",
            method: 'post',
            data:  edit_class_section_data,
            success: function(result){
                $('.edit-div-error').text('');
                //alert(result);
                if(result.errors)
                {
                    $('#edit-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        console.log(value);
                        $('#edit-class-section-modal').modal('show');
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

                    $('#edit-class-section-modal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>'+result.message+'</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    //$('#success-message').delay(2000).fadeOut('slow');
                    location.reload();

                }
            }});
    });

     


     $(document).on("click",".edit-assign-subject-btn",function() {

        var assign_sub_id = $(this).data('id');
        
        $('.add-div-error').html('');
        
        $('#class-section-modal').modal('show');

        $('#add-class-section-form').attr('action', base_url + 'assign_subjects/update')

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + 'assign_subjects/edit',
            type: 'post',
            dataType:'json',
            data: {id: assign_sub_id},
            success: function (response) {

                
                $('#lecture_per_week').val(response.lecture_per_week);
                $('#assign-subject-id').val(response.id);
                $("#cls_id").empty();
                var classlist = '';
                classlist +='<option value="">Select Class</option>';
                $.each(response.classes, function (key, value) {
                    var selected = '';
                    if(value.cls_Id == response.cls_id){
                        selected = "selected";
                    }
                    classlist +='<option '+selected+' value="'+value.cls_Id+'">'+value.class+'</option>';
                });

                $("#cls_id").html(classlist);
                $("#cls_id").selectpicker("refresh");
                $("#section_id").empty();
                var sectionlist = '';
                sectionlist +='<option value="">Select Section</option>';
                $.each(response.sections, function (key, value) {
                    var selected = '';
                    if(value.c_section_Id == response.section_id){
                        selected = "selected";
                    }
                    sectionlist +='<option '+selected+' value="'+value.c_section_Id+'">'+value.class_section_name+'</option>';
                });

                $("#section_id").html(sectionlist);
                $("#section_id").selectpicker("refresh");
                $("#subject_id").empty();
                var subjectList = '';
                subjectList +='<option value="">Select Subject</option>';
                setTimeout(function() {
                    $.each(response.subjects, function (key, value) {
                    var selected = '';
                    if(value.sub_Id==response.subject_id){
                        selected = "selected";
                    }
                    subjectList +='<option '+selected+' value="'+value.sub_Id+'">'+value.subject+'</option>';
                });
                    $("#subject_id").html(subjectList);
                    $("#subject_id").selectpicker("refresh");}, 500);



                $("#teacherselect").empty();
                var teacherList = '';
                teacherList +='<option value="">Select Teacher</option>';
                $.each(response.teachers, function (key, value) {
                    var selected = '';
                    if(value.id == response.teacher_id){

                        selected = "selected";
                    }
                    teacherList +='<option '+selected+' value="'+value.id+'">'+value.name+'</option>';
                });
                $("#teacherselect").append(teacherList);
                $("#teacherselect").selectpicker("refresh");
                $("#id").val(response.id);
            }
        });
    });


     $(document).on("click",".show-view-class-section-btn",function() {

        var assign_sub_id = $(this).data('id');

        $.get('assign_subjects/' + assign_sub_id, function (data) {

            $('#show-assign-subject').modal('show');
            $('#class-name').text(data.className);
             
            $('#sec-name').text(data.sectionName);
            $('#sub-name').text(data.subjectName);
            $('#teach-name').text(data.techerName);
            $('#lec-per-week').text(data.lecture_per_week);
            $('#lec-type').text(data.type);
        })
    });



     $('.delete-assign-subject-btn').on('click', function () {

        var assign_subject_delete_id = $(this).data('id');
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
                    $.get('assign_subjects/delete/'+assign_subject_delete_id, function (data) {
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
            });
    });

});



/*    window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);*/
    window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);
  /*  window.setTimeout(function () {
        $("#success-message1").alert('close');
    }, 2000);*/

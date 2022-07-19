$(document).ready(function() {
    /*------------------------Schedule Exam Code Start----------------------------------*/
    $('#success-alert').html('');
    $(document).on('click', "#schedule-exam-btn", function(e) {
        e.preventDefault();
        $("#Shedule-Exam-Form .add-div-error").text('');
        $('#schedule-exam')
            .find("input,select")
            .val('')
            .end()
            .find("select")
            .prop("selected", "").selectpicker("refresh")
            .end();
        $('#schedule-exam').modal('show');
    });

    $(document).on('click', "#add-schedule-exam-btn", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('#Shedule-Exam-Form').attr('action', base_url + 'examiner/add-schedule-exam');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $('#add-schedule-exam-btn').attr('disabled', true);
        var examdata = $('#Shedule-Exam-Form').serialize();
        $.ajax({
            url: base_url + 'examiner/add-schedule-exam',
            method: 'post',
            data: examdata,
            success: function(result) {
                //console.log(result);
                if (result.errors) {
                    $('#add-schedule-exam-btn').attr('disabled', false);
                    //$('#add-alert-danger').html('');
                    $('.add-div-error').text('');
                    $.each(result.errors, function(key, value) {
                        //console.log(value);
                        $('#schedule-exam').modal('show');
                        $('.add-div-error.' + key).text(value);
                        $('.add-div-error .' + key).show();

                    });
                } else {
                    swal({
                        title: "Added successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });


                    location.reload();
                }
            }
        });
    });

    $(document).on('click', "#schedule-update-exam-btn", function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var editexamdata = $('#Edit-Exam-Form').serialize();
        $.ajax({
            url: base_url + "examiner/update-schedule-exam",
            method: 'post',
            data: editexamdata,
            success: function(result) {
                $('.edit-div-error').text('');
                if (result.errors) {
                    $.each(result.errors, function(key, value) {
                        $('#edit-schedule-exam-modal').modal('show');
                        $('.edit-div-error.' + key).text(value);
                        $('.edit-div-error .' + key).show();

                    });
                } else {
                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $('.edit-div-error').hide();
                    $('#edit-schedule-exam-modal').modal('hide');
                    //location.reload();

                }
            }
        });
    });

    $(document).on('click', ".show-exam-btn", function() {


        var show_exam_id = $(this).data('id');
        $.get('show-schedule-exam/' + show_exam_id, function(data) {
            console.log(data);
            $('#show-schedule-exam-modal').modal('show');
            $('#show-exam-type').text(data.Examtype);
            //$('#show-school-section').text(data.tuition_fee);
            $('#show-exam-name').text(data.exam_Name);
            $('#show-exam-start-date').text(data.exam_Start);
            $('#show-exam-end-date').text(data.exam_End);
            $('#show-exam-comment').text(data.exam_Comment);
            $('#show-exam-status').text(data.exam_Status);

            $(".show-school-section").empty();
            $.each(data.section, function(key, val) {
                var markup = "<tr><td>" + val.sc_sec_name + "</td></tr>";
                $(".show-school-section").append(markup);
                // $('select[name="subject"]').append('<option value="'+ key +'">'+ value +'</option>');
            });

        })
    });

    $(document).on('click', ".edit-schedule-exam-btn", function() {
        var exam_id = $(this).data('id');
        $.get('edit-schedule-exam/' + exam_id, function(data) {
            $('#edit-schedule-exam-modal').modal('show');
            $('#edit-exam-id').val(data.exam_Id);
            $("#edit-exam-type").val(data.exm_typ_Id).trigger('change');
            $('#edit-exam-name').val(data.exam_Name);
            $('#edit-exam-start').val(data.exam_Start);
            $('#edit-exam_end').val(data.exam_End);
            $('#edit-exam-Comment').text(data.exam_Comment);
            if(data.exam_Status=='Active') {
                $('#edit-exam-Status').prop('checked',true);
            }else{
                $('#edit-exam-Status').prop('checked',false);
            }  
            $.each(data.selectedSchoolSectionIds, function(key, value) {
                 
                 $("#edit-school-section option[value='"+value.sc_sec_Id+"']").attr("selected", "selected");;
            });
            $("#edit-school-section").selectpicker("refresh");
        })
    });

    /*---------------------- Schedule Exam Code end---------------------------------*/


    /*--------------------- Set Marks Code Start------------------------------------*/

    /*for set syllabus section ajax*/
    $('#exam-syllabus-dropdown').on('change', function() {
        var exam_ID = $(this).val();
        //alert(exam_ID);
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'examiner/get-syllabus-class-by-section/' + exam_ID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                //console.log(data);
                $('#exam-syllabus-class-dropdown').html('');
                if (data != "") {
                    $.each(data, function(key, value) {

                        $('#exam-syllabus-class-dropdown').append('<option value="' + value.cls_Id + '">' + value.class + '</option>');
                        $('#exam-syllabus-class-dropdown').selectpicker("refresh");
                    });
                } else {
                    $('#exam-syllabus-class-dropdown').append('<option value=""></option>');
                    $('#exam-syllabus-class-dropdown').selectpicker("refresh");
                }
            }
        });
    });
    /*for set syllabus section ajax*/
    /*for edit set syllabus section ajax*/
    $(document).on('change', "#edit-exam-syllabus-dropdown", function() {

        //alert('click works');
        var exam_ID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'examiner/get-syllabus-class-by-section/' + exam_ID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                //console.log(data);
                $('#edit-exam-syllabus-class-dropdown').html('');
                if (data != "") {
                    $.each(data, function(key, value) {

                        $('#edit-exam-syllabus-class-dropdown').append('<option value="' + value.cls_Id + '">' + value.class + '</option>');
                        $('#edit-exam-syllabus-class-dropdown').selectpicker("refresh");
                    });
                } else {
                    $('#edit-exam-syllabus-class-dropdown').append('<option value=""></option>');
                    $('#edit-exam-syllabus-class-dropdown').selectpicker("refresh");
                }
            }
        });
    });
    /*for edit set syllabus section ajax*/

    /*for add exam paper section ajax*/
    $('#exam-paper-dropdown').on('change', function() {
        var exam_ID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'examiner/get-syllabus-class-by-section/' + exam_ID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                //console.log(data);
                $('#exam-paper-class-dropdown').html('');
                if (data != "") {
                    $.each(data, function(key, value) {

                        $('#exam-paper-class-dropdown').append('<option value="' + value.cls_Id + '">' + value.class + '</option>');
                        $('#exam-paper-class-dropdown').selectpicker("refresh");
                    });
                } else {
                    $('#exam-paper-class-dropdown').append('<option value=""></option>');
                    $('#exam-paper-class-dropdown').selectpicker("refresh");
                }
            }
        });
    });
    /*for add exam paper section ajax*/

    /*for edit exam paper section ajax*/
    $('#edit-exam-paper-dropdown').on('change', function() {
        var exam_ID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'examiner/get-syllabus-class-by-section/' + exam_ID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                //console.log(data);
                $('#edit-exam-paper-class-dropdown').html('');
                if (data != "") {
                    $.each(data, function(key, value) {

                        $('#edit-exam-paper-class-dropdown').append('<option value="' + value.cls_Id + '">' + value.class + '</option>');
                        $('#edit-exam-paper-class-dropdown').selectpicker("refresh");
                    });
                } else {
                    $('#edit-exam-paper-class-dropdown').append('<option value=""></option>');
                    $('#edit-exam-paper-class-dropdown').selectpicker("refresh");
                }
            }
        });
    });
    /*for edit exam paper section ajax*/

    /*for set exam section ajax*/
    $('#exam-name-dropdown').on('change', function() {
        var exam_ID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'examiner/get-school-section/' + exam_ID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                //console.log(data);
                $('#school-section-dropdown').html('');
                if (data.school_section_ajax != "") {
                    $.each(data.school_section_ajax, function(key, value) {
                         
                        $('#school-section-dropdown').append('<option value="' + key + '">' + value + '</option>');
                        $('#school-section-dropdown').selectpicker("refresh");
                    });
                } else {
                    $('#school-section-dropdown').append('<option value=""></option>');
                    $('#school-section-dropdown').selectpicker("refresh");
                }
            }
        });
    });
    /*for set exam section ajax*/

    /*for set exam section ajax*/
    $('#school-section-dropdown').on('change', function() {
        var section_ID = $(this).val();
        
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'examiner/get-subject-by-section/' + section_ID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                console.log(data);
                $('#set-subject-marks').html('');
                if (data != "") {
                    $.each(data, function(key, value) {

                        $('#set-subject-marks').append('<option value="' + value.sub_Id + '">' + value.subject + '</option>');
                        $('#set-subject-marks').selectpicker("refresh");
                    });
                } else {
                    $('#set-subject-marks').append('<option value=""></option>');
                    $('#set-subject-marks').selectpicker("refresh");
                }
            }
        });
    });
    /*for set exam section ajax*/
    /*for edit set exam section ajax*/
    $('#edit-setmarks-exam-name').on('change', function() {
        var exam_ID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'examiner/get-school-section/' + exam_ID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                //console.log(data);
                $('#edit-setmarks-school_section').html('');
                if (data != "") {
                    $.each(data, function(key, value) {

                        $('#edit-setmarks-school_section').append('<option value="' + value.sc_sec_Id + '">' + value.sc_sec_name + '</option>');
                        $('#edit-setmarks-school_section').selectpicker("refresh");
                    });
                }
                /*else{
                                    $('#edit-setmarks-school_section').append('<option value=""></option>');
                                    $('#edit-setmarks-school_section').selectpicker("refresh");
                                }*/
            }
        });
    });
    /*for edit set exam section ajax*/

    /*$('#success-alert').html('');*/
    $(document).on('click', "#set-exam-marks-btm", function(e) {
        e.preventDefault();
        $("#add-Set-marks-form .add-div-error").text('');
        $('#set-marks-modal')
            .find("input,select")
            .val('')
            .end()
            .find("select")
            .prop("selected", "").selectpicker("refresh")
            .end();
        $('#set-marks-modal').modal('show');
        $('#setmarks-dataTable tbody').html('');
    });

    function getAllSetmarks() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + 'examiner/examination?name=marks',
            type: 'get',
            success: function(data) {
                $('#set-marks-table').empty();
                $('#set-marks-table').html(data);


            }
        });

    }

    $(document).on('click', "#add-set-marks-btn", function(e) {
        e.preventDefault();
        //alert('hhurturtuh');
        //console.log('Set Marks Modal');
        //$('#SubjectForm')[0].reset();
        $('#add-Set-marks-form').attr('action', base_url + 'examiner/add-setmarks');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var setmarksdata = $('#add-Set-marks-form').serialize();
        $.ajax({
            url: base_url + 'examiner/add-setmarks',
            method: 'post',
            data: setmarksdata,
            success: function(result) {
                //console.log(result);
                if (result.errors) {
                    //$('#add-alert-danger').html('');
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value) {
                        //console.log(value);
                        $('#set-marks-modal').modal('show');
                        $('.add-div-error.' + key).text(value);

                        $('.add-div-error .' + key).show();

                    });
                } else {
                    swal({
                        title: "Added successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $('#set-marks-modal').modal('hide');
                    $('#add-Set-marks-form').text();
                    getAllSetmarks();

                }
            }
        });
    });

    $(document).on('click', "#update-set-marks-btn", function(e) {
        e.preventDefault();
        //$('#SubjectForm')[0].reset();
        //$('#edit-Set-marks-form').attr('action', base_url +'examiner/update-setmarks');
        //$('#Model-Title').html("Add New Subject");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var editsetmarksdata = $('#edit-Set-marks-form').serialize();
        $.ajax({
            url: base_url + "examiner/update-setmarks",
            method: 'post',
            data: editsetmarksdata,
            success: function(result) {
                console.log(result);
                //alert(response.message);
                $('.edit-div-error').text('');
                if (result.errors) {
                    $.each(result.errors, function(key, value) {
                        console.log(value);
                        $('#edit-set-marks-modal').modal('show');
                        $('.edit-div-error.' + key).text(value);
                        $('.edit-div-error .' + key).show();

                    });
                } else {
                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $('.edit-div-error').hide();
                    $('#edit-set-marks-modal').modal('hide');
                    getAllSetmarks();


                }
            }
        });
    });


    $(document).on('click', ".delete-setmarks-btn", function(e) {

        var subject = $(this).data('subject');
        var schoolsection = $(this).data('schoolsection');
        var exam = $(this).data('exam');


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

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: base_url + 'examiner/delete-setmarks',
                        method: 'post',
                        dataType: "json",
                        data: {
                            sub_Id: subject,
                            sc_sec_Id: schoolsection,
                            exam_Id: exam,

                        },
                        success: function(data) {
                            swal({
                                icon: 'warning',
                                title: "Deleted successfully!",
                                showCancelButton: false,
                                showConfirmButton: false,
                                type: "success",
                                timer: 1000
                            });

                            getAllSetmarks();

                        }


                    })


                    $.get('delete-setmarks/' + setmarks_delete_id, function(data) {
                        swal({
                            icon: 'warning',
                            title: "Deleted successfully!",
                            showCancelButton: false,
                            showConfirmButton: false,
                            type: "success",
                            timer: 1000
                        });
                        // location.reload();
                        getAllSetmarks();
                    });

                } else {

                }
            });
    });

    $(document).on('click', ".delete-schedule-exam-btn", function() {


        var exam_schedule_delete_id = $(this).data('id');

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
                    $.get('delete-schedule-exam/' + exam_schedule_delete_id, function(data) {
                        swal({
                            icon: 'warning',
                            title: "Deleted successfully!",
                            showCancelButton: false,
                            showConfirmButton: false,
                            type: "success",
                            timer: 1000
                        });
                         location.reload();
                    });

                } else {

                }
            });

    });


    $(document).on("click", ".edit-setmarks-btn", function() {
        var setmarks_id = $(this).data('id');

        $.get('edit-setmarks/' + setmarks_id, function(data) {

            console.log(data);
            $('#set-marks-modal').modal('show');
            //$('#edit-setmarks-id').val(data.submarks_Id);
            $("#exam-name-dropdown").val(data.exam_Id).attr('selected', 'selected');
            $("#exam-name-dropdown").selectpicker("refresh");
            $("#school-section-dropdown").val(data.sc_sec_Id).attr('selected', 'selected');
            $("#school-section-dropdown").selectpicker("refresh");
            $("#set-subject-marks").val(data.sub_Id).trigger('change');

        })
    });

    $(document).on("change", ".set-subject-marks", function() {

        var $this = $(this);
        var subject_Id = $(this).val();
        var exam_Id = $("#exam-name-dropdown option:selected").val();
        var section_Id = $("#school-section-dropdown option:selected").val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'examiner/get-set-marks-data/' + subject_Id + '/' + exam_Id + '/' + section_Id,
            type: "GET",
            dataType: "json",

            success: function(data) {
                console.log("datadatadata", data);

                if (data != '') {
                    $('.setmarks-dataTable tbody').html('');
                    var modules = $this.data('modules');
                    var arraymodules = modules.split(',');
                    var seleted;
                    $.each(data, function(key, val) {


                        var setmarksHtml = `<tr id="edit-appended-setmarksHtml-div" class="appended-setmarksHtml-div"> 
                                <td> 
                                <div class="select-wizard"> 
                                <select class="selectpicker" name="module[]" data-style="btn btn-round btn btn-secondary"  title="choose module"> 
                                <option value="" disabled  selected>Choose module </option>`

                        $.each(arraymodules, function(key, value) {
                            seleted = "";
                            if (val.exam_Module == value) {

                                seleted = "selected";
                            }

                            setmarksHtml += `<option value="${value}" ${seleted}>${value}</option>`;


                        });

                        setmarksHtml += `</select> 

                                </div> 
                                </td> 
                                <td> 
                                <input type="text" class="form-control" value="${val.set_Total}" name="total_marks[]"/> 
                                </td> 
                                <td> 
                                <input type="text" name="percentage[]" value=" ${val.set_pass_Per} " class="form-control"/> 
                                </td> 
                                <td class="text-center"> 
                                <div class="form-inline pull-left"> 
                                <div class=""> 
                                <button class=" btn-icon btn-link btn btn-round btn-danger remove_setmarks-btn" id="remove-Setmarks-btn"  title="Remove module" value="Add Row"  type="button" id="" data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false"> 
                                <i class="fa fa-minus"></i> 
                                </button> 
                                </div> 
                                </div> 
                                </td> 
                                </tr>`;

                        $('.setmarks-dataTable > tbody:last-child').append(setmarksHtml);
                        //$('.setmarks-dataTable').find('.bootstrap-select').replaceWith(function() { return $('select', this); })
                        $('.setmarks-dataTable').find('.selectpicker').selectpicker('render');
                    });
                } else if (data == '') {
                    //alert('else pat');
                    $('.setmarks-dataTable tbody').html('');


                    var modules = $this.data('modules');
                    var arraymodules = modules.split(',');

                    var setmarksHtml = `<tr id="edit-appended-setmarksHtml-div" class="appended-setmarksHtml-div"> 
                        <td> 
                        <div class="select-wizard"> 
                        <select class="selectpicker" name="module[]" data-style="btn btn-round btn btn-secondary"  title="choose module"> 
                        <option value="" disabled  selected>Choose module </option> 
                         `;
                    $.each(arraymodules, function(key, value) {
                        setmarksHtml += `<option value="${value}">${value}</option>`;

                    });
                    setmarksHtml += `</select> 
                        </div> 
                        </td> 
                        <td> 
                        <input type="text" class="form-control" value="" name="total_marks[]"/> 
                        </td> 
                        <td> 
                        <input type="text" name="percentage[]" value="" class="form-control"/> 
                        </td> 
                        <td class="text-center"> 
                        <div class="form-inline pull-left"> 
                        <div class=""> 
                        <button class=" btn-icon btn-link btn btn-round btn-danger remove_setmarks-btn" id="remove-Setmarks-btn"  title="Remove module" value="Add Row"  type="button" id="" data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false"> 
                        <i class="fa fa-minus"></i> 
                        </button> 
                        </div> 
                        </div> 
                        </td> 
                        </tr>`;

                    $('.setmarks-dataTable > tbody:last-child').append(setmarksHtml);
                    //$('.setmarks-dataTable').find('.bootstrap-select').replaceWith(function() { return $('select', this); })
                    $('.setmarks-dataTable').find('.selectpicker').selectpicker('render');

                }


            }
        });



        // var setmarks_id = $(this).data('id');
        //
        // $.get('get-set-marks/' + setmarks_id, function (data) {
        //
        //     console.log(data);
        //     $('#edit-set-marks-modal').modal('show');
        //     $('#edit-setmarks-id').val(data.submarks_Id);
        //
        //     /*    $("#edit-setmarks-exam-name").val(data.exam_Id).trigger('change');
        //         $("#edit-setmarks-school_section").val(data.sc_sec_Id).trigger('change');*/
        //     $("#edit-setmarks-exam-name").val(data.exam_Id).attr('selected', 'selected');
        //     $("#edit-setmarks-exam-name").selectpicker("refresh");
        //     $("#edit-setmarks-school_section").val(data.sc_sec_Id).attr('selected', 'selected');
        //     $("#edit-setmarks-school_section").selectpicker("refresh");
        //     $("#edit-setmarks-subject").val(data.sub_Id).trigger('change');
        //
        //     $('.edit-setmarks-dataTable > tbody:last-child').html('');
        //
        //     $.each(data.unserialized_setmarks_array, function (key, val) {
        //
        //         //console.log("loop percentage value>>>>>>>>>",val['percentage']);
        //         var editsetmarksHtmlAppend = '<tr id="appended-setmarksHtml-div" class="appended-setmarksHtml-div">' +
        //             '<td>' +
        //             '<div class="select-wizard">' +
        //             '<select class="" name="module[]" data-style="btn btn-round btn btn-secondary"  title="choose module">' +
        //             '<option value="">Choose module </option>' +
        //             '<option value="' + val['module'] + '" selected>' + val['module'] + '</option>' +
        //             '<option value="Reading">Reading</option>' +
        //             '<option value="Writing">Writing</option>' +
        //             '<option value="Listening">Listening</option>' +
        //             '<option value="Speaking">Speaking</option>' +
        //             '<option value="Practical">Practical</option>' +
        //             '<option value="Theory">Theory</option>' +
        //             '<option value="Notebook Marks">Notebook Marks</option>' +
        //             '<option value="Behaviour">Behaviour</option>' +
        //             '</select>' +
        //             '</div>' +
        //             '</td>' +
        //             '<td>' +
        //             '<input type="text" class="form-control" value="' + val['theory'] + '" name="total_marks[]"/>' +
        //             '</td>' +
        //             '<td>' +
        //             '<input type="text" name="percentage[]" value="' + val['percentage'] + '" class="form-control"/>' +
        //             '</td>' +
        //             '<td class="text-center">' +
        //             '<div class="form-inline pull-left">' +
        //             '<div class="">' +
        //             '<button class=" btn-icon btn-link btn btn-round btn-danger remove_setmarks-btn"  title="Remove module" value="Add Row"  type="button" id="" data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">' +
        //             '<i class="fa fa-minus"></i>' +
        //             '</button>' +
        //             '</div>' +
        //             '</div>' +
        //             '</td>' +
        //             '</tr>';
        //         $('.edit-setmarks-dataTable > tbody:last-child').append(editsetmarksHtmlAppend);
        //     });
        //     //data.unserialized_setmarks_array = '';
        //
        // })
    });

    $(document).on("click", ".show-setmarks-btn", function() {

        var subject = $(this).data('subject');
        var schoolsection = $(this).data('schoolsection');
        var exam = $(this).data('exam');
        var examname = $(this).data('examname');
        var subjectname = $(this).data('subjectname');
        var schoolsectionname = $(this).data('schoolsectionname');
        $('#show-set-marks-modal').modal('show');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + 'examiner/show-setmarks',
            method: 'post',
            dataType: "json",
            data: {
                sub_Id: subject,
                sc_sec_Id: schoolsection,
                exam_Id: exam,
                examname: examname,
                schoolsectionname: schoolsectionname,
                subjectname: subjectname,

            },
            success: function(result) {

                $("#show-setmarks-exam-name").text(result.examname);
                $("#show-setmarks-school_section").text(result.schoolsectionname);
                $("#show-setmarks-subject").text(result.subjectname);
                $('.show-setmarks-dataTable > tbody').html('');

                var showsetmarksHtmlAppend;
                $.each(result.list_mark, function(key, val) {

                    showsetmarksHtmlAppend += '<tr>' +
                        '<td>' + val.exam_Module + '</p>' +
                        '</td>' +
                        '<td>' + val.set_Total + '</p>' +
                        '</td>' +
                        '<td>' + val.set_pass_Per + ' %</p>' +
                        '</td>' +
                        '</tr>';

                });
                $('.show-setmarks-dataTable > tbody').append(showsetmarksHtmlAppend);

            }
        })



    });

    $(document).on('click', ".edit-clone-setmarks-btn", function(e) {
        e.preventDefault();

        var editsetmarksHtml = '<tr id="edit-appended-setmarksHtml-div" class="appended-setmarksHtml-div">' +
            '<td>' +
            '<div class="select-wizard">' +
            '<select class="selectpicker" name="module[]" data-style="btn btn-round btn btn-secondary"  title="choose module">' +
            '<option value="" disabled  selected>Choose module </option>' +
            '<option value="Reading">Reading</option>' +
            '<option value="Writing">Writing</option>' +
            '<option value="Writing">Listening</option>' +
            '<option value="Speaking">Speaking</option>' +
            '<option value="Practical">Practical</option>' +
            '<option value="Theory">Theory</option>' +
            '<option value="Notebook marks">Notebook marks</option>' +
            '<option value="Behaviour">Behaviour</option>' +
            '</select>' +
            '</div>' +
            '</td>' +
            '<td>' +
            '<input type="text" class="form-control" name="total_marks[]"/>' +
            '</td>' +
            '<td>' +
            '<input type="text" name="percentage[]" class="form-control"/>' +
            '</td>' +
            '<td class="text-center">' +
            '<div class="form-inline pull-left">' +
            '<div class="">' +
            '<button class=" btn-icon btn-link btn btn-round btn-danger remove_setmarks-btn" id="remove-Setmarks-btn"  title="Remove module" value="Add Row"  type="button" id="" data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">' +
            '<i class="fa fa-minus"></i>' +
            '</button>' +
            '</div>' +
            '</div>' +
            '</td>' +
            '</tr>';

        $('.edit-setmarks-dataTable > tbody:last-child').append(editsetmarksHtml);
        $('.edit-setmarks-dataTable').find('.selectpicker').selectpicker('render');

    });
    $(document).on('click', ".clone-setmarks-btn", function(e) {
        e.preventDefault();

        var $this = $(this);

        var modules = $this.data('modules');
        var arraymodules = modules.split(',');

        var setmarksHtml = `<tr id="edit-appended-setmarksHtml-div" class="appended-setmarksHtml-div">' +
            <td> 
            <div class="select-wizard"> 
            <select class="selectpicker" name="module[]" data-style="btn btn-round btn btn-secondary"  title="choose module"> 
            <option value="" disabled  selected>Choose module </option> 
            `;

        $.each(arraymodules, function(key, value) {
            setmarksHtml += `<option value="${value}">${value}</option>`;

        });
        setmarksHtml += `</select> 
            </div> 
            </td> 
            <td> 
            <input type="text" class="form-control" name="total_marks[]"/> 
            </td> 
            <td> 
            <input type="text" name="percentage[]" class="form-control"/> 
            </td> 
            <td class="text-center"> 
            <div class="form-inline pull-left"> 
            <div class=""> 
            <button class=" btn-icon btn-link btn btn-round btn-danger remove_setmarks-btn" id="remove-Setmarks-btn"  title="Remove module" value="Add Row"  type="button" id="" data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-minus"></i>
            </button>
            </div>
            </div>
            </td>
             </tr>`;

        $('.setmarks-dataTable > tbody:last-child').append(setmarksHtml);
        //$('.setmarks-dataTable').find('.bootstrap-select').replaceWith(function() { return $('select', this); })
        $('.setmarks-dataTable').find('.selectpicker').selectpicker('render');
    });


    /*remove Appended div of academic*/
    $(document).on('click', ".remove_setmarks-btn", function() {
        //alert('works');
        //(this).closest(".setmark-row:not(:first-child)").remove();
        $(this).closest('tr').remove();
    });

    /* $(document).on('click', ".clone-grade-btn", function(e) {
         e.preventDefault();

         var result=  $('#clone-grade-row').clone().insertBefore('#clone-grade-row');


         //result.find('#delete-clone:tr:first').empty(); // or .find('tr:last td span').text('');
     });*/


    /*---------------------------set marks code end*/


    /*------------------ set grades jquery code Start -------------------------------  */
    $(document).on('click', ".clone-grade-btn", function(e) {
        e.preventDefault();

        var setgradeHtml = '<tr class="appended-setgradeHtml-div">' +
            '<td class="">' +
            '<div class="form-group">' +
            '<input type="text" class="form-control" placeholder="" name="exam_grade[]">' +
            '</div>' +
            '</td><td>' +
            '<div class="form-group">' +
            '<input type="text" class="form-control" placeholder="" name="from_percentage[]">' +
            '</div>' +
            '</td>' +
            '<td class="text-center">' +
            '<div class="form-group">' +
            '<input type="text" class="form-control" placeholder="" name="to_percentage[]">' +
            '</div>' +
            '</td>' +
            '<td class="text-center">' +
            '<div class="form-group">' +
            '<input type="text" class="form-control" placeholder="" name="comment[]">' +
            '</div>' +
            '</td>' +
            '<td class="text-center">' +
            '<div class="form-inline pull-right">' +
            '<button class="btn-icon btn-link btn btn-round btn-danger remove-grade-btn" title="Remove module" value="Add Row"  type="button" id="" data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">' +
            '<i class="fa fa-minus"></i>' +
            '</button>' +
            '</div>' +
            '</td>' +
            '</tr>';
        //$("img").after("Some text after");
        $('#markstable > tbody:last-child').append(setgradeHtml);
        //$(setgradeHtml).appendTo("#clone-grade-row");

    });


    $(document).on('click', ".remove-grade-btn", function() {
        //alert('works');
        $(this).closest('tr').remove();
        //$(this).closest("tr.appended-setgradeHtml-div")
    });


    $(document).on('click', "#set-grade-modal-btn", function(e) {
        e.preventDefault();
        $('#set-grades-modal').modal('show');
    });

    $(document).on('click', "#add-set-grade-modal-btn", function(e) {

        e.preventDefault();
        //alert('hhurturtuh');
        //console.log('Set Marks Modal');
        //$('#SubjectForm')[0].reset();
        $('#add-set-grade-form').attr('action', base_url + 'examiner/add-set-grade');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var addsetgradesdata = $('#add-set-grade-form').serialize();
        $.ajax({
            url: base_url + 'examiner/add-set-grade',
            method: 'post',
            data: addsetgradesdata,
            success: function(result) {
                console.log(result);
                if (result.errors) {

                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value) {
                        console.log(value);
                        $('#set-grades-modal').modal('show');
                        $('.add-div-error.' + key).text(value);

                        $('.add-div-error .' + key).show();

                    });
                } else {

                    swal({
                        title: "Added successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $('.edit-div-error').hide();
                    $('#set-grades-modal').modal('hide');
                    getAllgrades();
                    $('#add-set-grade-form').val('');
                    //location.reload();
                    //$(".nav-link").removeClass("active");

                    //adding active class to current clicked tab

                    /* location.reload();
                     $('#setgradestabs').addClass("active");*/
                    //window.location.href = base_url +'examiner/examination#setgrades';
                }
            }
        });
    });

    function getAllgrades() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + 'examiner/examination?name=grade',
            type: 'get',
            success: function(data) {
                $('#set-grades-table').empty();
                $('#set-grades-table').html(data);


            }
        });

    }

    $(document).on('click', ".show-exam-grade-btn", function() {

        var show_exam_id = $(this).data('id');

        $.get('show-exam-grade/' + show_exam_id, function(data) {

            //console.log(data);
            $('#show-exam-grade-modal').modal('show');

            $("#show-exam-grade-name").text(data.exam_Name);
            $("#show-setmarks-school_section").text(data.sc_sec_name);
            $("#show-setmarks-subject").text(data.subject);

            $('.show-exams-grade-table > tbody').html('');

            $.each(data.setgrade, function(key, val) {


                var showSetGradeHtmlAppend = '<tr>' +
                    '<td class="">' +
                    '<div class="form-group">' +
                    '<p>' + val.grade_Name + '</p>' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<p>' + val.grade_st_Per + '</p>' +
                    '</div>' +
                    '</td>' +
                    '<td class="text-center">' +
                    '<div class="form-group">' +
                    '<p>' + val.grade_end_Per + '</p>' +
                    '</div>' +
                    '</td>' +
                    '<td class="text-center">' +
                    '<div class="form-group">' +
                    '<p>' + val.comment + '</p>' +

                    '</div>' +
                    '</td>' +
                    '</tr>';

                $('.show-exams-grade-table > tbody:last-child').append(showSetGradeHtmlAppend);
            });


        })
    });

    $(document).on('click', ".edit-set-exam-grade-btn", function() {

        var edit_exam_grade_id = $(this).data('id');

        $.get('edit-exam-grade/' + edit_exam_grade_id, function(data) {

            console.log(data);
            $('#edit-exam-grade-modal').modal('show');
            $('#edit-exam-grade-id').val(data.exam_Id);

            $("#edit-grade_exam_name").val(data.exam_Id).trigger('change');

            $('.edit-exam-grade-table > tbody').html('');

            $.each(data.setgrade, function(key, val) {

                var editsetGradeHtmlAppend = '<tr id="clone-grade-row">' +
                    '<td class="">' +
                    '<div class="form-group">' +
                    '<input type="text" class="form-control"placeholder="" value="' + val.grade_Name + '" name="exam_grade[]" required>' +
                    '<div class="edit-div-error exam_grade"></div>' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<input type="text" class="form-control" placeholder="" value="' + val.grade_st_Per + '" name="from_percentage[]" required>' +
                    '<div class="edit-div-error from_percentage"></div>' +
                    '</div>' +
                    '</td>' +
                    '<td class="text-center">' +
                    '<div class="form-group">' +
                    '<input type="text" class="form-control" placeholder="" value="' + val.grade_end_Per + '" name="to_percentage[]" required>' +
                    '<div class="add-div-error to_percentage"></div>' +
                    '</div>' +
                    '</td>' +
                    '<td class="text-center">' +
                    '<div class="form-group">' +
                    '<input type="text" class="form-control" placeholder="" value="' + val.comment + '" name="comment[]" required>' +
                    '<div class="add-div-error comment"></div>' +
                    '</div>' +
                    '</td>' +
                    '<td class="text-center">' +
                    '<div class="form-inline pull-right">' +
                    '<button class="btn-icon btn-link btn btn-round btn-danger remove-grade-btn" title="Remove module" value="Add Row"  type="button" id="" data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">' +
                    '<i class="fa fa-minus"></i>' +
                    '</button>' +
                    '</div>' +

                    '</td>' +
                    '</tr>';
                $('.edit-exam-grade-table > tbody:last-child').append(editsetGradeHtmlAppend);
            });
        })
    });

    $(document).on('click', ".edit-clone-grade-btn", function(e) {
        e.preventDefault();

        var setgradeHtml = '<tr class="appended-setgradeHtml-div">' +
            '<td class="">' +
            '<div class="form-group">' +
            '<input type="text" class="form-control" placeholder="" name="exam_grade[]">' +
            '</div>' +
            '</td><td>' +
            '<div class="form-group">' +
            '<input type="text" class="form-control" placeholder="" name="from_percentage[]">' +
            '</div>' +
            '</td>' +
            '<td class="text-center">' +
            '<div class="form-group">' +
            '<input type="text" class="form-control" placeholder="" name="to_percentage[]">' +
            '</div>' +
            '</td>' +
            '<td class="text-center">' +
            '<div class="form-group">' +
            '<input type="text" class="form-control" placeholder="" name="comment[]">' +
            '</div>' +
            '</td>' +
            '<td class="text-center">' +
            '<div class="form-inline pull-right">' +
            '<button class="btn-icon btn-link btn btn-round btn-danger remove-grade-btn" title="Remove module" value="Add Row"  type="button" id="" data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">' +
            '<i class="fa fa-minus"></i>' +
            '</button>' +
            '</div>' +
            '</td>' +
            '</tr>';

        $('.edit-exam-grade-table > tbody:last-child').append(setgradeHtml);

    });

    $(document).on('change', "#exam-grade-dropdown", function(e) {
        e.preventDefault();
        var exam_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + 'examiner/check-exam-grades/' + exam_id,
            method: 'get',
            success: function(data) {

                if (data.setgrade != '') {
                    $('.markstable > tbody').html('');

                    $.each(data.setgrade, function(key, val) {

                        var editsetGradeHtmlAppend = '<tr id="clone-grade-row">' +
                            '<td class="">' +
                            '<div class="form-group">' +
                            '<input type="text" class="form-control"placeholder="" value="' + val.grade_Name + '" name="exam_grade[]" required>' +
                            '<div class="edit-div-error exam_grade"></div>' +
                            '</div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="form-group">' +
                            '<input type="text" class="form-control" placeholder="" value="' + val.grade_st_Per + '" name="from_percentage[]" required>' +
                            '<div class="edit-div-error from_percentage"></div>' +
                            '</div>' +
                            '</td>' +
                            '<td class="text-center">' +
                            '<div class="form-group">' +
                            '<input type="text" class="form-control" placeholder="" value="' + val.grade_end_Per + '" name="to_percentage[]" required>' +
                            '<div class="add-div-error to_percentage"></div>' +
                            '</div>' +
                            '</td>' +
                            '<td class="text-center">' +
                            '<div class="form-group">' +
                            '<input type="text" class="form-control" placeholder="" value="' + val.comment + '" name="comment[]" required>' +
                            '<div class="add-div-error comment"></div>' +
                            '</div>' +
                            '</td>' +
                            '<td class="text-center">' +
                            '<div class="form-inline pull-right">' +
                            '<button class="btn-icon btn-link btn btn-round btn-danger remove-grade-btn" title="Remove module" value="Add Row"  type="button" id="" data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">' +
                            '<i class="fa fa-minus"></i>' +
                            '</button>' +
                            '</div>' +

                            '</td>' +
                            '</tr>';
                        $('#markstable > tbody:last-child').append(editsetGradeHtmlAppend);

                    });
                }
            }
        });
    });

    $(document).on('click', "#edit-set-grade-modal-btn", function(e) {

        e.preventDefault();
        // $('#edit-set-grade-form').attr('action', base_url +'examiner/update-set-grade');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var addsetgradesdata = $('#edit-set-grade-form').serialize();
        $.ajax({
            url: base_url + 'examiner/update-set-grade',
            method: 'post',
            data: addsetgradesdata,
            success: function(result) {
                console.log(result);
                if (result.errors) {
                    $('.edit-div-error').text('');

                    $.each(result.errors, function(key, value) {
                        console.log(value);
                        $('#edit-exam-grade-modal').modal('show');
                        $('.add-div-error.' + key).text(value);

                        $('.add-div-error .' + key).show();

                    });
                } else {
                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $('.edit-div-error').hide();
                    $('#edit-exam-grade-modal').modal('hide');
                    getAllgrades();
                }
            }
        });
    });
    $(document).on("click", ".delete-set-exam-grade-btn", function() {

        var exam_id = $(this).data('id');
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
                    $.get('delete-set-grade/' + exam_id, function(data) {
                        swal({
                            icon: 'warning',
                            title: "Deleted successfully!",
                            showCancelButton: false,
                            showConfirmButton: false,
                            type: "success",
                            timer: 1000
                        });
                        // location.reload();
                        getAllgrades();
                    });

                } else {

                }
            });
    });

    /*------------------ set grades jquery code End-----------------------------------  */
    /*------------------ set Syllabus jquery code start-------------------------------  */

    $(document).on("change", ".syllabus_cls_id", function(event) {

        event.stopPropagation();
        var $this = $(this);

        var id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + 'get_class_subject/' + id,
            type: 'get',
            data: { id: id },
            success: function(response) {
                $("#exam-syllabus-subject").empty();
                var subject = '';
                subject += '<option value="">Select Subjects</option>';
                $.each(response, function(key, value) {
                    subject += '<option value="' + value.sub_Id + '">' + value.subject + '</option>';

                });
                $("#exam-syllabus-subject").append(subject).selectpicker("refresh");
            }
        });
    });
    $(document).on("change", ".exam-paper-class-dropdown", function(event) {

        event.stopPropagation();
        var $this = $(this);

        var id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + 'get_class_subject/' + id,
            type: 'get',
            data: { id: id },
            success: function(response) {
                $("#exam-paper-subject-dropdown").empty();
                var subject = '';
                subject += '<option value="">Select Subjects</option>';
                $.each(response, function(key, value) {
                    subject += '<option value="' + value.sub_Id + '">' + value.subject + '</option>';

                });
                $("#exam-paper-subject-dropdown").append(subject).selectpicker("refresh");
            }
        });
    });
    $(document).on("change", ".edit-exam-paper-class-dropdown", function(event) {

        event.stopPropagation();
        var $this = $(this);

        var id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + 'get_class_subject/' + id,
            type: 'get',
            data: { id: id },
            success: function(response) {
                $("#edit-exam-paper-subject").empty();
                var subject = '';
                subject += '<option value="">Select Subjects</option>';
                $.each(response, function(key, value) {
                    subject += '<option value="' + value.sub_Id + '">' + value.subject + '</option>';

                });
                $("#edit-exam-paper-subject").append(subject).selectpicker("refresh");
            }
        });
    });
    $(document).on("change", ".edit-exam-syllabus-class-dropdown", function(event) {

        event.stopPropagation();
        var $this = $(this);

        var id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + 'get_class_subject/' + id,
            type: 'get',
            data: { id: id },
            success: function(response) {
                $("#edit-syllabus-subject-name").empty();
                var subject = '';
                subject += '<option value="">Select Subjects</option>';
                $.each(response, function(key, value) {
                    subject += '<option value="' + value.sub_Id + '">' + value.subject + '</option>';

                });
                $("#edit-syllabus-subject-name").append(subject).selectpicker("refresh");
            }
        });
    });


    $(document).on('click', "#set-syllabus-btn", function(e) {
        e.preventDefault();
        $('#add-syllabus-save-btn').attr('disabled', false);
        $("#set-syllabus-modal .add-div-error").text('');
        $('#set-syllabus-modal')
            .find("input,select")
            .val('')
            .end()
            .find("select")
            .prop("selected", "").selectpicker("refresh")
            .end();
        $('#set-syllabus-modal').modal('show');

    });
    $(document).on('click', "#add-syllabus-save-btn", function(e) {

        //alert('hello');
        e.preventDefault();
        //$('#add-syllabus-form').attr('action', base_url + 'examiner/add-exam-syllabus');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $('#add-syllabus-save-btn').attr('disabled', true);
        var add_syllabus_data = new FormData($('#add-syllabus-form')[0]);
        $.ajax({
            url: base_url + 'examiner/add-exam-syllabus',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: add_syllabus_data,
            success: function(result) {
                console.log(result);
                if (result.errors) {
                    $('.add-div-error').text('');
                    $('#add-syllabus-save-btn').attr('disabled', false);
                    $.each(result.errors, function(key, value) {
                        console.log(value);
                        $('#set-syllabus-modal').modal('show');
                        $('.add-div-error.' + key).text(value);

                        $('.add-div-error .' + key).show();

                    });
                } else {

                    swal({
                        title: "Added successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $('#set-syllabus-modal').modal('hide');
                    getAllSyllabus();
                    $("#add-syllabus-form").get(0).reset()


                }
            }
        });
    });

    function getAllSyllabus() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + 'examiner/examination?name=syllabus',
            type: 'get',
            success: function(data) {
                console.log(data);
                $('#set-syllabus-table').html('');
                $('#set-syllabus-table').html(data);
            }
        });

    }

    $(document).on('click', "#update-syllabus-btn", function(e) {


        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var edit_syllabus_data = new FormData($('#edit-syllabus-form')[0]);
        $.ajax({
            url: base_url + 'examiner/update-exam-syllabus',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: edit_syllabus_data,
            success: function(result) {
                console.log(result);
                if (result.errors) {
                    $('.edit-div-error').text('');

                    $.each(result.errors, function(key, value) {
                        console.log(value);
                        $('#edit-set-syllabus-modal').modal('show');
                        $('.edit-div-error.' + key).text(value);

                        $('.edit-div-error .' + key).show();

                    });
                } else {
                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $('.edit-div-error').hide();
                    $('#edit-set-syllabus-modal').modal('hide');
                    getAllSyllabus();

                }
            }
        });
    });

    $(document).on('click', ".edit-syllabus-btn", function() {

        var edit_syllabus_id = $(this).data('id');

        $.get('edit-exam-syllabus/' + edit_syllabus_id, function(data) {

            console.log(data);
            $('#edit-set-syllabus-modal').modal('show');
            $('#edit-syllabus-id').val(data.syllabus_Id);

            $("#edit-exam-syllabus-dropdown").val(data.exam_Id).attr('selected', 'selected');
            $("#edit-exam-syllabus-dropdown").selectpicker("refresh");
            $("#edit-exam-syllabus-class-dropdown").val(data.cls_Id).attr('selected', 'selected');
            $("#edit-exam-syllabus-class-dropdown").selectpicker("refresh");
            $("#edit-syllabus-subject-name").val(data.sub_Id).trigger('change');
            $("#edit-exam-syllabus-file").attr('href', asset_url + '/upload/syllabus/' + data.syllabus_docs);
            $("#edit-exam-syllabus-file").text(data.syllabus_docs);


        })
    });

    $(document).on("click", ".delete-syllabus-btn", function() {

        var syllabus_delete_id = $(this).data('id');

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
                    $.get('delete-exam-syllabus/' + syllabus_delete_id, function(data) {
                        swal({
                            icon: 'warning',
                            title: "Deleted successfully!",
                            showCancelButton: false,
                            showConfirmButton: false,
                            type: "success",
                            timer: 1000
                        });
                        // location.reload();
                        getAllSyllabus();
                    });

                } else {

                }
            });

    });
    /*------------------ set Syllabus jquery code End-------------------------------  */

    /*------------------ set Exam Paper jquery code start-------------------------------  */
    $(document).on('click', "#set-exam-paper-btn", function(e) {

        e.preventDefault();
        $("#set-exam-paper-modal .add-div-error").text('');
        $('#set-exam-paper-modal')
            .find("input,select,file")
            .val('')
            .end()
            .find("select")
            .prop("selected", "").selectpicker("refresh")
            .end();
        $('#set-exam-paper-modal').modal('show');

    });
    $(document).on('click', "#add-exam-paper-save-btn", function(e) {

        //alert('hello');
        e.preventDefault();
        //$('#add-syllabus-form').attr('action', base_url + 'examiner/add-exam-syllabus');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var add_exam_paper_data = new FormData($('#add-exam-paper-form')[0]);
        $.ajax({
            url: base_url + 'examiner/add-exam-paper',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: add_exam_paper_data,
            success: function(result) {
                console.log(result);
                if (result.errors) {
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value) {
                        console.log(value);
                        $('#set-exam-paper-modal').modal('show');
                        $('.add-div-error.' + key).text(value);

                        $('.add-div-error .' + key).show();

                    });
                } else {

                    swal({
                        title: "Added successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $('.add-div-error').hide();
                    $('#set-exam-paper-modal').modal('hide');
                    getAllPaper();

                }
            }
        });
    });
    $(document).on('click', ".edit-exam-paper-btn", function() {

        var edit_exam_paper_id = $(this).data('id');

        $.get('edit-exam-paper/' + edit_exam_paper_id, function(data) {

            console.log(data);
            $('#edit-set-exam-paper-modal').modal('show');
            $('#edit-exam-paper-id').val(data.exampaper_Id);

            $("#edit-exam-paper-dropdown").val(data.exam_Id).attr('selected', 'selected');
            $("#edit-exam-paper-dropdown").selectpicker("refresh");
            $("#edit-exam-paper-class-dropdown").val(data.cls_Id).attr('selected', 'selected');
            $("#edit-exam-paper-class-dropdown").selectpicker("refresh");
            $("#edit-exam-paper-subject").val(data.sub_Id).trigger('change');
            $("#edit-exam-paper-file").attr('href', asset_url + '/upload/paper/' + data.paper_File);
            $("#edit-exam-paper-file").text(data.paper_File);


        })
    });

    $(document).on('click', "#update-exam-paper-btn", function(e) {


        e.preventDefault();
        //$('#add-syllabus-form').attr('action', base_url + 'examiner/add-exam-syllabus');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var edit_exam_paper_data = new FormData($('#edit-exam-paper-form')[0]);
        $.ajax({
            url: base_url + 'examiner/update-exam-paper',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: edit_exam_paper_data,
            success: function(result) {
                console.log(result);
                if (result.errors) {
                    $('.edit-div-error').text('');

                    $.each(result.errors, function(key, value) {
                        console.log(value);
                        $('#edit-set-exam-paper-modal').modal('show');
                        $('.edit-div-error.' + key).text(value);

                        $('.edit-div-error .' + key).show();

                    });
                } else {

                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $('.edit-div-error').hide();
                    $('#edit-set-exam-paper-modal').modal('hide');
                    getAllPaper();

                }
            }
        });
    });

    $(document).on("click", ".delete-exam-paper-btn", function() {

        var exam_paper_id = $(this).data('id');

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
                    $.get('delete-exam-paper/' + exam_paper_id, function(data) {
                        swal({
                            icon: 'warning',
                            title: "Deleted successfully!",
                            showCancelButton: false,
                            showConfirmButton: false,
                            type: "success",
                            timer: 1000
                        });
                        // location.reload();
                        getAllPaper();
                    });

                } else {

                }
            });

    });

    function getAllPaper() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + 'examiner/examination?name=paper',
            type: 'get',
            success: function(data) {
                $('#set-paper-table').empty();
                $('#set-paper-table').html(data);


            }
        });

    }

    /*------------------ set Exam Paper jquery code End-------------------------------  */

    /*------------------ set Date Sheet jquery code start------------------------------ */

    $(document).on("change", ".cls_id", function(event) {

        event.stopPropagation();
        var $this = $(this);

        var id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + 'get_class_subject/' + id,
            type: 'get',
            data: { id: id },
            success: function(response) {
                //console.log('class subject',response);
                var tr = $this.closest('tr').attr('id');
                $("#" + tr + " select.subject_id").empty();
                var subject = '';
                subject += '<option value="">Select Subjects</option>';
                $.each(response, function(key, value) {
                    subject += '<option value="' + value.sub_Id + '">' + value.subject + '</option>';

                });
                $("#" + tr + " select.subject_id").append(subject).selectpicker("refresh");
            }
        });
    });

    $(document).on('click', "#show-datesheet-modal-btn", function(e) {

        e.preventDefault();
        $('#create-datesheet-modal')
            .find("input,select")
            .val('')
            .end()
            .find("select")
            .prop("selected", "").selectpicker("refresh")
            .end();

        $('#create-datesheet-modal').modal('show');
        $('#datesheet-table tbody').html('');


    });

    $(document).on('click', "#add-datesheet-btn", function(e) {

        e.preventDefault();
        //alert('hhurturtuh');
        console.log('Shedule Exam Modal');
        //$('#SubjectForm')[0].reset();
        //$('#add-date-sheet-form').attr('action', base_url +'examiner/add-schedule-exam');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var examdata = $('#add-date-sheet-form').serialize();
        $.ajax({
            url: base_url + 'examiner/add-datesheet',
            method: 'post',
            data: examdata,
            success: function(result) {
                console.log(result);
                if (result.errors) {

                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value) {
                        //console.log(value);
                        $('#create-datesheet-modal').modal('show');
                        $('.add-div-error.' + key).text(value);

                        $('.add-div-error .' + key).show();

                    });
                } else {
                    // $('#success-message').html('');
                    // $('.add-div-error').hide();
                    //
                    // $('#create-datesheet-modal').modal('hide');
                    // $('#success-message').show();
                    // $('#success-message').append('<p>'+result.message+'</p>');
                    //
                    // $('#success-message').delay(2000).fadeOut('slow');
                    swal({
                        title: "Added successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $('.add-div-error').hide();
                    $('#create-datesheet-modal').modal('hide');
                    getAllDateSheet();
                }
            }
        });
    });

    /*for Date Sheet date selection class selection and subject ajax*/
    $(document).on('change', "#datesheet-exam-dropdownexam", function() {

        var exam_ID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'examiner/get-exam-date-for-datesheet/' + exam_ID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                console.log('data', data);
                if (data.datesheet != '') {
                    var appendhtml = '';
                    $('#date-sheet-modal-row').html('');

                    $.each(data.datesheet, function(key, value) {

                        appendhtml += `<tr id="datesheet-append-row_` + key + `"  class="div_dateshette"> 
                            <td > 
                                <div class="col-sm-12 select-wizard">
                                    <select class="selectpicker" name="date[]" id="exam-date-for-datesheet" data-container="" data-size="5" 
                                    data-style="btn btn-round btn-secondary" title="Select date" 
                                    data-live-search="true" data-hide-disabled="true">`;

                        $.each(data.date, function(keyda, valueval) {
                            var selecteddate = '';
                            if (value.date == valueval) {
                                selecteddate = 'selected';
                            }
                            appendhtml += `<option value="` + valueval + `" ` + selecteddate + `>` + valueval + `</option>`;
                        });

                        appendhtml += `</select>
                                 
                                <div>`;

                        appendhtml += `<td>
                                <div class="col-sm-12 select-wizard">
                                <select class="selectpicker cls_id" name="class[]" id="exam-class-for-datesheet" data-container=""
                                data-size="7" data-style="btn btn-round btn-secondary" title="Select class"
                                data-live-search="true" data-hide-disabled="true">`;

                        var selectedClassId = '';
                        $.each(data.classes, function(keyclass, valueclass) {

                            var selectedclass = '';
                            if (value.cls_Id == valueclass.cls_Id) {
                                selectedclass = 'selected';
                                selectedClassId = valueclass.cls_Id;
                            }
                            appendhtml += `<option value="` + valueclass.cls_Id + `" ` + selectedclass + `>` + valueclass.class + `</option>`;
                        });

                        appendhtml += `</select>
                                <div class="add-div-error class"></div>
                                </div>
                                </td>`;

                        appendhtml += `<td>
                                <div class="col-sm-12 select-wizard">
                                <select class="selectpicker subject_id"  id="subject_id" name="subject[]"  data-container=""
                                data-size="7" data-style="btn btn-round btn-secondary" title="Select Subject"
                                data-live-search="true" data-hide-disabled="true">`;

                        var i = 1;


                        var subjeee = [];
                        var subjeees = [];
                        subjeee = data.subject;

                        subjeees = subjeee[parseInt(selectedClassId)];

                        appendhtml += `<option >Select Subject</option>`;


                        $.each(subjeees, function(keysubject, valuesubject) {
                            var selectedsubject = '';
                            if (value.sub_Id == valuesubject.sub_Id) {
                                selectedsubject = 'selected';

                            }


                            appendhtml += `<option value="` + valuesubject.sub_Id + `" ` + selectedsubject + `>` + valuesubject.subject + `</option>`;


                        });

                        appendhtml += `</select>
                                <div class="add-div-error subject"></div>
                                </div>
                                </td>`;


                        appendhtml += `</div>
                             </td>
                             <td class=""> 
                                <div class="form-group col-sm-12">
                                    <input type="time" class="form-control" placeholder="" value="` + value.start_time + `" name="start_time[]" required="true">
                                </div>
                                <div class="add-div-error start_time"></div>
                              </td>
                             <td class="">
                                <div class="form-group col-sm-12">
                                    <input type="time" class="form-control" placeholder="" value="` + value.end_time + `" name="end_time[]" required="true">
                                </div>
                                <div class="add-div-error end_time"></div>
                            </td>`;

                        appendhtml += `<td class="">
                                <button class=" btn-icon btn-link btn btn-round btn-danger remove-date-sheet-row"
                                        style="visibility: visible" title="Remove module" value="Remove Row" type="button" id=""
                                        data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </td> </tr>`;


                    });
                    $('#date-sheet-modal-row').append(appendhtml).find('.selectpicker').selectpicker('render');
                    $('#datesheet-append-row_0').find('.remove-date-sheet-row').css('visibility', 'hidden');
                } else if (data.datesheet == '') {
                    //alert('else part');
                    $('#date-sheet-modal-row').html('');
                    var appendhtml = '';


                    appendhtml += `<tr id="datesheet-append-row_0"  class="div_dateshette"> 
                            <td > 
                                <div class="col-sm-12 select-wizard">
                                    <select class="selectpicker" name="date[]" id="exam-date-for-datesheet" data-container="" data-size="5" 
                                    data-style="btn btn-round btn-secondary" title="Select date" 
                                    data-live-search="true" data-hide-disabled="true">`;

                    $.each(data.date, function(keyda, valueval) {
                        var selecteddate = '';
                        appendhtml += `<option value="` + valueval + `" ` + selecteddate + `>` + valueval + `</option>`;
                    });

                    appendhtml += `</select>
                                 
                                <div>`;

                    appendhtml += `<td>
                                <div class="col-sm-12 select-wizard">
                                <select class="selectpicker cls_id" name="class[]" id="exam-class-for-datesheet" data-container=""
                                data-size="7" data-style="btn btn-round btn-secondary" title="Select class"
                                data-live-search="true" data-hide-disabled="true">`;

                    var selectedClassId = '';
                    $.each(data.classes, function(keyclass, valueclass) {

                        var selectedclass = '';
                        appendhtml += `<option value="` + valueclass.cls_Id + `" ` + selectedclass + `>` + valueclass.class + `</option>`;
                    });

                    appendhtml += `</select>
                                <div class="add-div-error class"></div>
                                </div>
                                </td>`;

                    appendhtml += `<td>
                                <div class="col-sm-12 select-wizard">
                                <select class="selectpicker subject_id"  id="subject_id" name="subject[]"  data-container=""
                                data-size="7" data-style="btn btn-round btn-secondary" title="Select Subject"
                                data-live-search="true" data-hide-disabled="true">`;

                    var i = 1;


                    var subjeee = [];
                    var subjeees = [];
                    subjeee = data.subject;

                    subjeees = subjeee[parseInt(selectedClassId)];

                    appendhtml += `<option >Select Subject</option>`;


                    $.each(subjeees, function(keysubject, valuesubject) {
                        var selectedsubject = '';


                        appendhtml += `<option value="` + valuesubject.sub_Id + `" ` + selectedsubject + `>` + valuesubject.subject + `</option>`;


                    });

                    appendhtml += `</select>
                                <div class="add-div-error subject"></div>
                                </div>
                                </td>`;


                    appendhtml += `</div>
                             </td>
                             <td class=""> 
                                <div class="form-group col-sm-12">
                                    <input type="time" class="form-control" placeholder="" value="" name="start_time[]" required="true">
                                </div>
                                <div class="add-div-error start_time"></div>
                              </td>
                             <td class="">
                                <div class="form-group col-sm-12">
                                    <input type="time" class="form-control" placeholder="" value="" name="end_time[]" required="true">
                                </div>
                                <div class="add-div-error end_time"></div>
                            </td>`;


                    appendhtml += `<td class="">
                                <button class=" btn-icon btn-link btn btn-round btn-danger remove-date-sheet-row"
                                        style="visibility: hidden" title="Remove module" value="Remove Row" type="button" id=""
                                        data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-minus"></i>
                                </button>
                           </td> </tr>`;


                    $('#date-sheet-modal-row').append(appendhtml).find('.selectpicker').selectpicker('render');
                }

            }
        });
    });


    $('#datesheet-exam-dropdown').on('change', function() {
        var exam_ID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'examiner/get-syllabus-class-by-section/' + exam_ID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                //console.log(data);
                $('#exam-class-for-datesheet').html('');
                if (data != "") {
                    $.each(data, function(key, value) {

                        $('#exam-class-for-datesheet').append('<option value="' + value.cls_Id + '">' + value.class + '</option>');
                        $('#exam-class-for-datesheet').selectpicker("refresh");
                    });
                } else {
                    $('#exam-class-for-datesheet').append('<option value=""></option>');
                    $('#exam-class-for-datesheet').selectpicker("refresh");
                }
            }
        });
    });


    /*for edit Date Sheet date selection class selection and subject ajax*/
    $('#edit-datesheet-exam-dropdown').on('change', function() {
        var exam_ID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'examiner/get-exam-date-for-datesheet/' + exam_ID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                //console.log(data);
                $('.edit-exam-date-for-datesheet').find('option').remove().end();
                if (data != "") {
                    //$('.edit-exam-date-for-datesheet').html();
                    $.each(data.period, function(key, value) {
                        //console.log("value",value);

                        $('.edit-exam-date-for-datesheet').append('<option value="' + value + '">' + value + '</option>');
                        $('.edit-exam-date-for-datesheet').selectpicker("refresh");
                    });
                }

            }
        });
    });

    $('#edit-datesheet-exam-dropdown').on('change', function() {
        var exam_ID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'examiner/get-syllabus-class-by-section/' + exam_ID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                //console.log(data);
                $('.edit-exam-class-for-datesheet').find('option').remove().end();
                $('.edit-exam-class-for-datesheet').selectpicker("refresh");
                if (data != "") {
                    $.each(data, function(key, value) {

                        $('.edit-exam-class-for-datesheet').append('<option value="' + value.class + '">' + value.class + '</option>');
                        $('.edit-exam-class-for-datesheet').selectpicker("refresh");
                    });
                } else {
                    $('.edit-exam-class-for-datesheet').append('<option value=""></option>');
                    $('.edit-exam-class-for-datesheet').selectpicker("refresh");
                }
            }
        });
    });

    $(document).on('click', '#append-datesheet-row-btn', function() {
        ///$('#datesheet-exam-dropdownexam').at
        var selected_option = $('#datesheet-exam-dropdownexam option:selected').val();
        if (selected_option == '') {
            alert('please select Exam first');
            return false;
        }
        var $orginal = $('#datesheet-append-row_0');
        var $cloned = $orginal.clone();

        var div_id = $('.div_dateshette').length;
        div_id++;
        $cloned.attr('id', 'datesheet-append-row_' + div_id)
        $cloned.find('.bootstrap-select').replaceWith(function() {
            return $('select', this);
        })
        $cloned.find('.selectpicker').selectpicker('render');

        //Then Append
        $cloned.appendTo('#date-sheet-modal-row');
        $cloned.find('.remove-date-sheet-row').css('visibility', 'visible');




    });
    $(document).on('click', '#edit-append-datesheet-row-btn', function() {
        alert('edit date sheet');
        var $orginal = $('#edit-datesheet-append-row');
        var $cloned = $orginal.clone();
        //Or
        // var $cloned = $('#append-row').clone();

        //then use this to solve duplication problem

        // kgdkd
        $cloned.find('.bootstrap-select').replaceWith(function() {
            return $('select', this);
        })
        $cloned.find('.selectpicker').selectpicker('render');

        //Then Append
        $cloned.appendTo('#edit-date-sheet-modal-row');
        $cloned.find('.remove-date-sheet-row').css('visibility', 'visible');
    });

    $(document).on('click', ".remove-date-sheet-row", function() {
        //alert('works');
        //(this).closest(".setmark-row:not(:first-child)").remove();
        $(this).closest('tr').remove();
    });

    /*delete date sheet*/

    $(document).on("click", ".delete-date-sheet-btn", function() {

        var datesheet_delete_id = $(this).data('id');

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
                    $.get('delete-datesheet/' + datesheet_delete_id, function(data) {
                        swal({
                            icon: 'warning',
                            title: "Deleted successfully!",
                            showCancelButton: false,
                            showConfirmButton: false,
                            type: "success",
                            timer: 1000
                        });
                        getAllDateSheet();
                    });

                } else {
                    getAllDateSheet();
                }
            });
    });


    /*all date sheet ajax*/

    function getAllDateSheet() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + 'examiner/examination?name=datesheet',
            type: 'get',
            success: function(data) {
                $('#set-datesheet-table').empty();
                $('#set-datesheet-table').html(data);


            }
        });

    }

    /*edit date sheet*/
    $(document).on("click", ".edit-date-sheet-btn", function() {
        $("#create-datesheet-modal").modal('show');

        var exam_id = $(this).data('id');

        $("#datesheet-exam-dropdownexam").val(exam_id).attr('selected', 'selected').selectpicker('refresh');

        $("#datesheet-exam-dropdownexam").trigger('change');



    });

    $(document).on('click', "#update-datesheet-btn", function(e) {

        e.preventDefault();
        //alert('hhurturtuh');
        //console.log('edit date sheet Exam Modal');
        //$('#SubjectForm')[0].reset();
        //$('#add-date-sheet-form').attr('action', base_url +'examiner/add-schedule-exam');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var examdata = $('#edit-date-sheet-form').serialize();
        $.ajax({
            url: base_url + 'examiner/update-datesheet',
            method: 'post',
            data: examdata,
            success: function(result) {
                //console.log(result);
                if (result.errors) {

                    $('.edit-div-error').text('');

                    $.each(result.errors, function(key, value) {
                        //console.log(value);
                        $('#edit-datesheet-modal').modal('show');
                        $('.edit-div-error.' + key).text(value);

                        $('.edit-div-error .' + key).show();

                    });
                } else {
                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $('.edit-div-error').hide();
                    $('#edit-datesheet-modal').modal('hide');
                    getAllDateSheet();
                }
            }
        });
    });

    $(document).on('click', ".show-date-sheet-btn", function() {

        var show_datesheet_id = $(this).data('id');


        $.ajax({
            url: base_url + 'examiner/show-datesheet/' + show_datesheet_id,
            method: 'get',
            dataType: "json",


            success: function(data) {


                var head = '<tr><th>Date</th>';

                $.each(data.class, function(key111, value) {
                    head += '<th class="text-center text-small p-1 font-weight-normal table-dark">' + value.name + '</th>';
                });

                head += '</tr><body>';
                var body = '';

                $.each(data.datesheet, function(key, value) {
                    body += '<tr>';
                    body += '<td >' + key + '</td>';


                    $.each(data.class, function(keys, values) {
                        var select = '';

                        var myas = data.datesheet[key][values.cls_Id] ? data.datesheet[key][values.cls_Id] : '';
                        console.log(myas);

                        var subject = 'N/A';
                        var subjectstart = '';
                        var subjectend = '';
                        var html='';
                        $.each(myas, function(keyshh, valueshh) {

                        var subject = 'N/A';
                        var subjectstart = '';
                        var subjectend = '';


                            if (valueshh != '') {


                                var chars = valueshh.split('/');
                                subject = chars[0];
                                subjectstart = chars[1];
                                subjectend = chars[2];

                               html += '' + subject + '<br >' + subjectstart + '</br>' + subjectend + '</br>';
                            }
                        });


                        body += '<td>' + html+'</td>';
                    });

                    body += '</tr>';

                });

                body += '</body>';


                $('#show-datesheet-modal').modal('show');
                $("#show-date-sheet-table").html('');

                $("#show-date-sheet-table").append(head);
                $("#show-date-sheet-table").append(body);


            }
        });

    });


    $(document).on('change','.filter_schedule_exam .filter_schedule_exam',function (e) {
        var $this = $(this);
        var  filter_schedule_exam_type = $('select#filter_schedule_exam_type option:selected').val();
        var  filter_schedule_exam_name   = $('select#filter_schedule_exam_name option:selected').val();


        if($this.attr('id')=='filter_schedule_exam_type')
        {
            filter_schedule_exam_type = $this.val();
        }else if($this.attr('id')=='filter_schedule_exam_name')
        {
            filter_schedule_exam_name = $this.val();
        }
        // else if($this.attr('id')=='student_Shift')
        // {
        //     student_Shift = $this.val();
        // }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url +'get-exam-by-filter',
            type: "POST",

            data: JSON.stringify({
                "type": filter_schedule_exam_type,
                'schedule_exam_name' : filter_schedule_exam_name

            }),
            contentType: "application/json; charset=UTF-8",
            success:function(data) {

                $('#exam_table').DataTable().destroy();
                $("#exam_table").html(data);
                var table = $('#exam_table').DataTable();
                table.draw();
            }
        });

    });
    $(document).on('change','.filter_setmarks .filter_setmarks',function (e) {
        var $this = $(this);
        var  setmark_exam_name = $('select#setmark_exam_name option:selected').val();
        var  setmark_school_section   = $('select#setmark_school_section option:selected').val();


        if($this.attr('id')=='setmark_exam_name')
        {
            setmark_exam_name = $this.val();
        }else if($this.attr('id')=='setmark_school_section')
        {
            setmark_school_section = $this.val();
        }
        // else if($this.attr('id')=='student_Shift')
        // {
        //     student_Shift = $this.val();
        // }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url +'get-exam-by-filter',
            type: "POST",

            data: JSON.stringify({
                "exam_name": setmark_exam_name,
                'school_section' : setmark_school_section

            }),
            contentType: "application/json; charset=UTF-8",
            success:function(data) {

                $('#set-marks-table').DataTable().destroy();
                $("#set-marks-table").html(data);
                var table = $('#set-marks-table').DataTable();
                table.draw();
            }
        });

    });
    $(document).on('change','#grade_exam_name',function (e) {
        var $this = $(this);
        var grade_exam_name = $this.val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url +'get-exam-by-filter',
            type: "POST",

            data: JSON.stringify({
                "grade_exam_name": grade_exam_name,
            }),
            contentType: "application/json; charset=UTF-8",
            success:function(data) {

                $('#set-grades-table').DataTable().destroy();
                $("#set-grades-table").html(data);
                var table = $('#set-grades-table').DataTable();
                table.draw();
            }
        });

    });


    $(document).on('change','.filter_syllabus .filter_syllabus',function (e) {
        var $this = $(this);
        var  filter_syllabus_exam = $('select#filter_syllabus_exam option:selected').val();
        var  filter_syllabus_class   = $('select#filter_syllabus_class option:selected').val();


        if($this.attr('id')=='filter_syllabus_exam')
        {
            filter_syllabus_exam = $this.val();
        }else if($this.attr('id')=='filter_syllabus_class')
        {
            filter_syllabus_class = $this.val();
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url +'get-exam-by-filter',
            type: "POST",
            datatype:"json",
            data: {  "syllabus_class": filter_syllabus_class,
                           'syllabus_exam' : filter_syllabus_exam

                        },

            success:function(data) {

                $('#set-syllabus-table').DataTable().destroy();
                $("#set-syllabus-table").html(data);
                var table = $('#set-syllabus-table').DataTable();
                table.draw();
            }
        });

    });

    $(document).on('change','.filter_paper .filter_paper',function (e) {
        var $this = $(this);
        var  filter_paper_exam = $('select#filter_paper_exam option:selected').val();
        var  filter_paper_class   = $('select#filter_paper_class option:selected').val();


        if($this.attr('id')=='filter_paper_exam')
        {
            filter_paper_exam = $this.val();
        }else if($this.attr('id')=='filter_paper_class')
        {
            filter_paper_class = $this.val();
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url +'get-exam-by-filter',
            type: "POST",
            datatype:"json",
            data: {  "paper_class": filter_paper_class,
                           'paper_exam' : filter_paper_exam

                        },

            success:function(data) {

                $('#set-paper-table').DataTable().destroy();
                $("#set-paper-table").html(data);
                var table = $('#set-paper-table').DataTable();
                table.draw();
            }
        });

    });
    $(document).on('change','#filter_datesheet_exam',function (e) {
        //e.preventDefault();
        var $this = $(this);
        var  datesheet_exam = $this.val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url +'get-exam-by-filter',
            type: "POST",
            datatype:"json",
            data: { 'datesheet_exam' : datesheet_exam  },
            success:function(data) {

                $('#set-datesheet-table').DataTable().destroy();
                $("#set-datesheet-table").html(data);
                var table = $('#set-datesheet-table').DataTable();
                table.draw();
            }
        });

    });

    $(document).on('click', ".datesheet-pdf", function() {

        exportpdf('show-date-sheet-table');


    });

    function exportpdf(tableid) {
        var doc = new jsPDF('l', 'pt', 'a4');
        doc.addHTML($('#'+tableid)[0], 15, 15, {
            'background': '#fff',
        }, function() {
            doc.save(tableid+'.pdf');
        });

    }
 /*   $(document).on('click', ".datesheet-pdf", function() {
        var doc = new jsPDF('l', 'pt', 'a4');
        var htmlstring = '';
        var tempVarToCheckPageHeight = 0;
        var pageHeight = 0;
        pageHeight = doc.internal.pageSize.height;
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function(element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 150,
            bottom: 60,
            left:5,
            right: 5,
            width: 700
        };
        var y = 20;
        doc.setLineWidth(2);
        doc.text(350, y = y + 30, "Exam DateSheet");
        doc.autoTable({
            html: '#show-date-sheet-table',
            startY: 70,
            theme: 'grid',
            columnStyles: {
                0: {
                    cellWidth: 50,
                },
                1: {
                    cellWidth: 50,
                },
                2: {
                    cellWidth: 50,
                },
                3: {
                    cellWidth: 40,
                },
                4: {
                    cellWidth: 40,
                },
                5: {
                    cellWidth: 40,
                },
                6: {
                    cellWidth: 40,
                },
                7: {
                    cellWidth: 40,
                },
                8: {
                    cellWidth: 40,
                },
                9: {
                    cellWidth: 40,
                },
                10: {
                    cellWidth: 40,
                },
                11: {
                    cellWidth: 40,
                },
                12: {
                    cellWidth: 40,
                },
                13: {
                    cellWidth: 40,
                },
                14: {
                    cellWidth: 40,
                },
                15: {
                    cellWidth: 40,
                },
                16: {
                    cellWidth: 40,
                },
                17: {
                    cellWidth: 40,
                },
                18: {
                    cellWidth: 40,
                },
                19: {
                    cellWidth: 40,
                }
            },
            styles: {
                minCellHeight: 40
            }
        })
        doc.save('datesheet.pdf');
    });*/
    // $(document).on('click', ".datesheet-pdf", function() {
    //     var pdf = new jsPDF('p', 'pt', 'letter');
    //     // source can be HTML-formatted string, or a reference
    //     // to an actual DOM element from which the text will be scraped.
    //     source = $('#date-sheet-content')[0];
    //
    //     // we support special element handlers. Register them with jQuery-style
    //     // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
    //     // There is no support for any other type of selectors
    //     // (class, of compound) at this time.
    //     specialElementHandlers = {
    //         // element with id of "bypass" - jQuery style selector
    //         '#bypassme': function (element, renderer) {
    //             // true = "handled elsewhere, bypass text extraction"
    //             return true
    //         }
    //     };
    //     margins = {
    //         top: 80,
    //         bottom: 60,
    //         left: 10,
    //         width: 900
    //     };
    //     // all coords and widths are in jsPDF instance's declared units
    //     // 'inches' in this case
    //     pdf.fromHTML(
    //         source, // HTML string or DOM elem ref.
    //         margins.left, // x coord
    //         margins.top, { // y coord
    //             'width': margins.width, // max width of content on PDF
    //             'elementHandlers': specialElementHandlers
    //
    //         },
    //
    //         function (dispose) {
    //             // dispose: object with X, Y of the last line add to the PDF
    //             //          this allow the insertion of new lines after html
    //             pdf.save('Test.pdf');
    //         }, margins);
    // });


    // document.querySelector(".conf_msg").addEventListener("click", function() {
    // const promise2 =
    // .then(successCallback, failureCallback);
    $(document).ready(function() {
        $('.conf_msg').on('click', function() {
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
                function(isConfirm) {
                    if (isConfirm) {
                        $(".close").attr('disabled', false);
                        $(".add-btn").attr('disabled', false);
                        $(".update-btn").attr('disabled', false);
                        swal.close();
                    } else {
                        location.reload();
                    }
                });
        });

    });

    // $( "#cancel" ).click(function() {
    //     swal({
    //         title: "Are you sure?",
    //         text: "Once deleted, you will not be able to recover this imaginary file!",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //     },
    //         function(willDelete) {
    //         if (willDelete) {
    //             swal("Poof! Your imaginary file has been deleted!", {
    //                 icon: "success",
    //             });
    //         } else {
    //             swal("Your imaginary file is safe!");
    // }
    // });
    // });


    /*------------------ set Date Sheet jquery code end------------------------------ */


});
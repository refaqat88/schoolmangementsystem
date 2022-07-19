$(document).ready(function(e){
    $('#success-alert').html('');
    $('#show-Class-Sched-modal-btn').click(function(e){
        $('#newclassSchedule').modal('show');
        e.preventDefault();
    });

    $('#add-class-schedule').click(function(e){
        e.preventDefault();
        // alert('hello');
        //$('#ClassForm')[0].reset();
        // $('#add-class-schedule-form').attr('action', base_url +'class-schedule');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var classScheduleData =  $('#add-class-schedule-form').serialize();
        $.ajax({
            url: base_url + 'class-schedule',
            method: 'post',
            data:  classScheduleData,
            success: function(result){
                // console.log(result);
                $('.add-div-error').text('');
                if(result.errors)
                {

                    $('#add-alert-danger').html('');

                    $.each(result.errors, function(key, value){

                        $('#newclassSchedule').modal('show');

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
                    //swal("Good job!", "Your Class Added Successfully!", "success");
                    $('#success-message').delay(2000).fadeOut('slow');
                    swal({
                        title: "Class schedule added successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    location.reload();

                }
            }});
    });

    $('body').on('click', '.editClassSched', function () {


        var edit_class_sched = $(this).data('id');

        $.get('edit-class-schedule/'+edit_class_sched, function (data) {
            console.log('data=============',data);
            $('#edit-classched-modal').modal('show');
            $('#edit-classSched-id').val(data.ttable_Id);
            $(".edit-timetable-class").val(data.cls_Id).trigger('change');
            $(".edit-timetable-sec").val(data.c_section_Id).trigger('change');
            // //$("#edit-datesheet-exam-dropdown").selectpicker("refresh");
            // $("#edit-date-sheet-id").val(data.dsheet_Id);
            // $('#modalrow').empty();
            // $(this).closest("#edit-appendrow:not(:first-child)").empty();


//            console.log('da');


            $.each(data.unserialized_array, function(key, value) {

                console.log("unserlized array", value);
                // $('#edit-appendrow').closest("#append-row:first-child").remove();
                $orginal = $('#edit-appendrow');
                var $cloned = $orginal.clone();

                $cloned.find('.bootstrap-select').replaceWith(function() { return $('select', this); })
                $cloned .find('.selectpicker').selectpicker('render');


                //Then Append
                //alert(value['date']); alert(value['subject']);

                $cloned.appendTo('#edit-modalrow');
                // $cloned.empty();

                $cloned.find('.date-start-time').val(value['start_time']);
                $cloned.find('.date-end-time').val(value['end_time']);
                $cloned.find('.edit-remove-class-schedule-row:not("first")').css('visibility','visible');




                $cloned.find('.edit-timetable-days').val(value['days']).attr('selected','selected');
                $cloned.find('.edit-timetable-days').selectpicker('refresh');
                $cloned.find('.edit-timetable-periods').val(value['periods']).attr('selected','selected');
                $cloned.find('.edit-timetable-periods').selectpicker('refresh');
                $cloned.find('.edit-timetable-subject').val(value['subjects']).attr('selected','selected');
                $cloned.find('.edit-timetable-subject').selectpicker('refresh');
                $cloned.find('.edit-timetable-teacher').val(value['teachers']).attr('selected','selected');
                $cloned.find('.edit-timetable-teacher').selectpicker('refresh');



            });


            //data.unserialized_setmarks_array = '';

        })
    });

    $('#update-class-schedule').click(function(e){
        e.preventDefault();
        //alert('hello');
        //$('#SubjectForm')[0].reset();
        // $('#edit-new-class-form').attr('action', base_url +'update-class');
        //$('#Model-Title').html("Add New Subject");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var editsubjectdata =  $('#edit-class-schedule-form').serialize();
        $.ajax({
            url: base_url + "update-class-schedule",
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
                        $('#edit-classched-modal').modal('show');
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
                    $('#success-message').delay(2000).fadeOut('slow');
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





    $('.show-view-class_sched-btn').on('click', function () {
        // alert('subjectwise');
        var class_sched_Id = $(this).data('id');
        $.get('show-class-schedule/'+class_sched_Id, function (data) {
            // console.log(data);
            var classSche = data.unserialized_array;
            $("#table-monday tbody").empty();
            $("#table-tuesday tbody").empty();
            $("#table-wednesday tbody").empty();
            $("#table-thursday tbody").empty();
            $("#table-friday tbody").empty();
            $("#table-saturday tbody").empty();
            $.each(classSche, function(key, val) {
                var days = val.days;
                console.log('unserialized array days===',val.days);
                if(days =='Monday'){
                    var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + data.class + "</td><td>" + val.start_time +" to "+ val.end_time + "</td></tr>";

                    $("#table-monday tbody").append(markup);
                }
                if(days =='Tuesday'){
                    var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + data.class + "</td><td>" + val.start_time +" to "+ val.end_time + "</td></tr>";

                    $("#table-tuesday tbody").append(markup);
                }
                if(days =='Wednesday'){
                    var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + data.class + "</td><td>" + val.start_time +" to "+ val.end_time + "</td></tr>";

                    $("#table-wednesday tbody").append(markup);
                }
                if(days =='Thursday'){
                    var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + data.class + "</td><td>" + val.start_time +" to "+ val.end_time + "</td></tr>";

                    $("#table-thursday tbody").append(markup);
                }
                if(days =='Friday'){
                    var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + data.class + "</td><td>" + val.start_time +" to "+ val.end_time + "</td></tr>";

                    $("#table-friday tbody").append(markup);
                }
                if(days =='Saturday'){
                    var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + data.class + "</td><td>" + val.start_time +" to "+ val.end_time + "</td></tr>";

                    $("#table-saturday tbody").append(markup);
                }
            //
            //
            //         // $('select[name="subject"]').append('<option value="'+ key +'">'+ value +'</option>');
            });

        })
    });


});



$('#add-class-schedule-dropdown').on('change',  function () {

    var class_Id = $(this).val();
    // alert(filter);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    // var editsubjectdata =  $('#edit-class-schedule-form').serialize();
    $.ajax({
        url: base_url +'class-section-by-class/'+class_Id,
        method: 'get',

        success: function (data) {
            $("#select-class-section").empty();

            $("#select-class-section").append('<option value="">Select Section</option>');
            $('#select-class-section').selectpicker("refresh");
            $.each(data , function (key, value) {
                //console.log(value);
                $("#select-class-section").append('<option value="' + value.c_section_Id + '">' + value.class_section_name + '</option>');
                $('#select-class-section').selectpicker("refresh");

            });
        }
    });
});

$('#select-class-section').on('change',  function () {

    var class_section_Id = $(this).val();
    // alert(filter);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
      var class_value = $('select#add-class-schedule-dropdown option:selected').val();
    $.ajax({
        url: base_url +'add-class-schedule-check',
        method: 'post',
        data: {
            section: class_section_Id,
            class:class_value,
        },

        success: function (data) {
            console.log('data.schedule>>>>>>>>>>>',data.schedule);
            $('#modalrow').empty() ;


            if(data.schedule.length==0){

                var daylist = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

                var days = '';

                $.each(daylist, function (keydaylist, valuedaylist) {
                    days += '<option value="' + valuedaylist + '"   >' + valuedaylist + '</option>';
                })

                var subjectlist = '';
                $.each(data.subject, function (key2subject, value2subject) {

                    subjectlist += '<option value="' + value2subject.sub_Id + '">' + value2subject.subject + '</option>'
                })

                var teacher;

                $.each(data.employee, function (key1, value1) {

                    teacher += '<option value="' + value1.id + '" >' + value1.name + '</option>'
                 })
                var periodss = '';
                $.each(data.periods, function (keyperiods, valueperiods) {
                    //console.log(valueperiods);
                    periodss += '<option data-end_time="' + valueperiods.end_time + '" data-start_time="' + valueperiods.start_time + '"  value="' + valueperiods.id + '">' + valueperiods.period + '</option>';

                })
                var i=0;
                var visible = (i > 0) ? "visible" : "hidden";

                $('#modalrow').append('<div class="row append-row" id="append-row'+i+'" >\n' +
                    '\n' +
                    '<div class="col-sm-2 select-wizard">\n' +
                    '<label class="col-sm-12">Days</label>\n' +
                    '<select multiple class="selectpicker  select-insert days" name="day[0][]" data-size="5" id="number-multiple" data-style="btn btn-round btn-secondary" data-container="" data-live-search="false" title="Choose days" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">\n' +
                    '<option value="" disabled>Choose days</option>' + days + '\n' +
                    '</select>\n' +
                    '<div class="add-div-error day"></div>\n' +
                    '</div>\n' +
                    '<div class="form-group has-label col-sm-1">\n' +
                    '<label>\n' + 'Period\n' + '</label>\n' +
                    '<select class="selectpicker select-insert period period_dropdown" data-size="7" name="period[]"  data-style="btn btn-secondary btn-round" title="Choose Period" >\n' +
                    '<option value="" disabled selected>Choose Period</option>' + periodss + '\n' +
                    '</select>\n' +
                    '<div class="add-div-error period"></div>\n' +
                    '</div>\n' +
                    '<div class="form-group col-sm-2">\n' +
                    '<label>Start time</label>\n' +
                    '<input type="time" class="form-control Period_start" placeholder="" name="time_start[]" value="" >\n' +
                    '<div class="add-div-error time_start"></div>\n' +
                    '</div>\n' +
                    '<div class="form-group has-label col-sm-2">\n' +
                    '<label>\n' +
                    ' End time\n' +
                    '</label>\n' +
                    '<input type="time" class="form-control Period_end" placeholder="" name="time_end[]" value="" >\n' +
                    '<div class="add-div-error time_end"></div>\n' +
                    '</div>\n' +
                    '<div class="form-group has-label col-sm-2">\n' +
                    '<label>\n' +
                    'Subject\n' +
                    '</label>\n' +
                    '<select class="selectpicker select-insert" name="sub_Id[]" data-size="7" data-style="btn btn-round btn-secondary" title="Select Blood Group" >\n' +
                    '<option value="" disabled selected>Choose subject</option>' + subjectlist + '\n' +
                    '</select>\n' +
                    '<div class="add-div-error sub_Id"></div>\n' +
                    '</div>\n' +
                    '<div class="form-group has-label col-sm-2 emp_Id">\n' +
                    '<label>\n' +
                    'Teacher\n' +
                    '</label>\n' +
                    '<div class="select-insert">\n' +
                    '<select class="selectpicker schedule-teacher" name="emp_Id[]" data-id ="'+i+'" data-size="7" data-style="btn btn-round btn-secondary" title="Select Blood Group" >\n' +
                    '<option value="" disabled selected>Choose teacher</option>' + teacher + '\n' +
                    '</select>\n' +
                    '<div class="add-div-error emp_Id"></div>\n' +
                    '</div>\n' +
                    '</div>\n' +
                    '<div class="col-sm-1">\n' +
                    '<label class="action_text">Action</label>\n' +
                    '<button class="btn-icon btn-link btn btn-round btn-danger remove-class-schedule-row"  style="visibility: '+visible+'"  title="Remove module" value="Remove Row"  type="button" id="" data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">\n' +
                    '<i class="fa fa-minus"></i>\n' +
                    '</button>\n' +
                    '</div>\n' +
                    '\n' +
                    '</div>');
                /*//$('#modalrow').find('.bootstrap-select').replaceWith(function() { return $('select', this); })*/
                $('#modalrow').find('.selectpicker').selectpicker('render');

                i++;

            }else {
                //console.log('data.schedule.sub_Id>>>>>>>>>>>',data.schedule.sub_Id);
                $('#modalrow').empty() ;

                var teacher = '';
                $.each(data.schedule, function (emp, empvalue) {
                    $.each(data.employee, function (key1, value1) {
                        var selected = (value1.id == empvalue.emp_Id) ? "selected" : "";
                        teacher += '<option value="' + value1.id + '" ' + selected + '>' + value1.name + '</option>'
                        /*//$("select[name='emp_Id']").selectpicker("refresh");*/

                    })
                })

                var subjectlist = '';
                $.each(data.schedule, function (sub, subvalue) {


                    $.each(data.subject, function (key2, value2) {
                        var selected = (value2.sub_Id == subvalue.sub_Id) ? "selected" : "";
                        subjectlist += '<option value="' + value2.sub_Id + '" ' + selected + '>' + value2.subject + '</option>'
                        /*//$("select[name='emp_Id']").selectpicker("refresh");*/

                    })
                })


                var i = 0;


                $.each(data.schedule, function (key, value) {



                    var subjectlist = '';
                    $.each(data.subject, function (key2subject, value2subject) {
                        var selected = (value2subject.sub_Id == value.sub_Id) ? "selected" : "";
                        subjectlist += '<option value="' + value2subject.sub_Id + '" ' + selected + '>' + value2subject.subject + '</option>'
                        /*//$("select[name='emp_Id']").selectpicker("refresh");*/

                    })


                    var visible = (i > 0) ? "visible" : "hidden";

                    //var listss = parseInt(data.periods);

                    var periodss = '';
                    //var days = '';
                    //var s;
                    //for (s = 1; s <= listss; s++) {
                    var start_time;
                    var end_time;

                    $.each(data.periods, function (keyperiods, valueperiods) {
                        //console.log(valueperiods);
                        var selected;
                        if(value.period == valueperiods.id){
                            selected = 'selected';
                            start_time= valueperiods.start_time;
                            end_time= valueperiods.end_time;
                        }

                        periodss += '<option data-end_time="' + valueperiods.end_time + '" data-start_time="' + valueperiods.start_time + '" value="' + valueperiods.id + '" ' + selected + ' >' + valueperiods.period + '</option>';


                    })
                    //var selected = (0 == value.period) ? "selected" : "";
                    // periodss += '<option value="0" ' + selected + ' >break</option>';


                    // $.each(list   , function (keylist, valuelist) {
                    //     var selected = (valuelist == value.period)? "selected":"";
                    //     periodss +='<option value="'+valuelist+'" '+selected+' >'+valuelist+'</option>';
                    // })


                    var daylist = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                    var daysss = 'Monday Tuesday Wednesday Thursday Friday Saturday';
                    var days = [];

                    $.each(daylist, function (keydaylist, valuedaylist) {
                        var selected = daysss.indexOf(valuedaylist) ? "selected" : "";
                        days += '<option value="' + valuedaylist + '" ' + selected + ' >' + valuedaylist + '</option>';

                    })


                    //var day = value.day;

                    $('#modalrow').append('<div class="row append-row" id="append-row'+i+'" >\n' +
                        '\n' +
                        '<div class="col-sm-2 select-wizard">\n' +
                        '<label class="col-sm-12">Days</label>\n' +
                        '<select multiple class="selectpicker  select-insert days" name="day[' + i + '][]" data-size="5" id="number-multiple" data-style="btn btn-round btn-secondary" data-container="" data-live-search="false" title="Choose days" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">\n' +
                        '<option value="" disabled>Choose days</option>' + days + '\n' +
                        '</select>\n' +
                        '<div class="add-div-error day"></div>\n' +
                        '</div>\n' +
                        '<div class="form-group has-label col-sm-1">\n' +
                        '<label>\n' + 'Period\n' + '</label>\n' +
                        '<select class="selectpicker select-insert period_dropdown" data-size="7" name="period[]" data-style="btn btn-secondary btn-round" title="Choose Period" >\n' +
                        '<option value="" disabled selected>Choose Period</option>' + periodss + '\n' +
                        '</select>\n' +
                        '<div class="add-div-error period"></div>\n' +
                        '</div>\n' +
                        '<div class="form-group col-sm-2">\n' +
                        '<label>Start time</label>\n' +
                        '<input type="time" class="form-control Period_start" placeholder="" name="time_start[]" readonly value="' + start_time + '" >\n' +
                        '<div class="add-div-error time_start"></div>\n' +
                        '</div>\n' +
                        '<div class="form-group has-label col-sm-2">\n' +
                        '<label>\n' +
                        ' End time\n' +
                        '</label>\n' +
                        '<input type="time" class="form-control Period_end" placeholder="" name="time_end[]" readonly value="' + end_time + '" >\n' +
                        '<div class="add-div-error time_end"></div>\n' +
                        '</div>\n' +
                        '<div class="form-group has-label col-sm-2">\n' +
                        '<label>\n' +
                        'Subject\n' +
                        '</label>\n' +
                        '<select class="selectpicker select-insert"  name="sub_Id[]" data-size="7" data-style="btn btn-round btn-secondary" title="Select Blood Group" >\n' +
                        '<option value="" disabled selected>Choose subject</option>' + subjectlist + '\n' +
                        '</select>\n' +
                        '<div class="add-div-error sub_Id"></div>\n' +
                        '</div>\n' +
                        '<div class="form-group has-label col-sm-2 emp_Id">\n' +
                        '<label>\n' +
                        'Teacher\n' +
                        '</label>\n' +
                        '<div class="select-insert">\n' +
                        '<select class="selectpicker schedule-teacher"  data-id ="'+i+'" name="emp_Id[]" data-size="7" data-style="btn btn-round btn-secondary" title="Select Blood Group" >\n' +
                        '<option value="" disabled selected>Choose teacher</option>' + teacher + '\n' +
                        '</select>\n' +
                        '<div class="add-div-error emp_Id"></div>\n' +
                        '</div>\n' +
                        '</div>\n' +
                        '<div class="col-sm-1">\n' +
                        '<label class="action_text">Action</label>\n' +
                        '<button class="btn-icon btn-link btn btn-round btn-danger remove-class-schedule-row"  style="visibility: ' + visible + '"  title="Remove module" value="Remove Row"  type="button" id="" data-toggle="modal" data-target="#" aria-haspopup="true" aria-expanded="false">\n' +
                        '<i class="fa fa-minus"></i>\n' +
                        '</button>\n' +
                        '</div>\n' +
                        '\n' +
                        '</div>');
                    /*//$('#modalrow').find('.bootstrap-select').replaceWith(function() { return $('select', this); })*/
                    $('#modalrow').find('.selectpicker').selectpicker('render');


                    i++;

                });
            }

        }
    });
});

    //    code for filtering table according on classwise and subject wise
    $('#class-Sched-filter').on('change',  function () {

        var filter = $(this).val();
        // alert(filter);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        // var editsubjectdata =  $('#edit-class-schedule-form').serialize();
        $.ajax({
            url: base_url + "class-schedule?name="+filter,
            method: 'get',

            success: function (data) {
                $("#datatable tbody").empty();
                    var markup = data;

                    $("#datatable tbody").append(markup);
            }
        });
    });

    function deleteClassSched(id){
        // var subject_delete_id = $(this).data('id');
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
                    $.get('delete-class-schedule/'+id, function (data) {
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
    }

window.setTimeout(function () {
    $("#success-alert").alert('close');
}, 2000);

$(document).on('click', "#append-schdle", function() {
    //you can use :   
    var $orginal = $('#append-row0');
    var $cloned = $orginal.clone();
    //Or
    // var $cloned = $('#append-row').clone();

    //then use this to solve duplication problem
    $('.teacher').append('');
    // kgdkd
    $cloned.find('.bootstrap-select').replaceWith(function() { return $('select', this); })
    $cloned .find('.selectpicker').selectpicker('render');

    //Then Append
    $cloned.appendTo('#modalrow');

    $cloned.find('.remove-class-schedule-row').css('visibility','visible');



    var length = $("#modalrow").find(".Periodss").length;
    var length2 = $("#modalrow").find(".append-row").length;


    var length = length-1;
     $cloned.find('#number-multiple').attr('name', 'day[' + length+'][]');

    $cloned.find('.schedule-teacher').attr('data-id',length2);

     $cloned.attr('id', 'append-row'+length2);






    // $(".remove-class-schedule-row").css('visibillity : visible');

});

$(document).on('click', ".remove-class-schedule-row", function() {
    // alert('works');
    $(this).closest("#append-row:not(:first-child)").remove();
    // $('#append-row').closest('div').remove();
});
$(document).on('ready', function() {
    // alert('works');
    $(".closeScheduleEdit").css('visibility', 'disabled');
    // $("#edit-appendrow").empty();
    // $("#edit-classched-modal").modal('hide');
    // $('#append-row').closest('div').remove();
});

function myFunction1() {
    // alert('dffdfdfdf');
    //you can use :   
    var $orginal = $('#edit-appendrow');
    var $cloned = $orginal.clone();
    //Or
    // var $cloned = $('#append-row').clone();

    //then use this to solve duplication problem
    $('.teacher').append('');
    // kgdkd
    $cloned.find('.bootstrap-select').replaceWith(function() { return $('select', this); })
    $cloned .find('.selectpicker').selectpicker('render');

    //Then Append
    $cloned.appendTo('#edit-modalrow');
    $cloned.find('.edit-remove-class-schedule-row').css('visibility','visible');
    // $(".remove-class-schedule-row").css('visibillity', 'visible');

}

    $(document).on('click', ".edit-remove-class-schedule-row", function() {
        // alert('works');
        $(this).closest("#edit-appendrow:not(:first-child)").remove();
        // $('#append-row').closest('div').remove();
    });

    $('#datatable').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search",
        }

    });

$(document).on('change','.period_dropdown select',  function () {

    var period_Id = $(this).val();
    var $this= $(this);

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
     });

     var end_time = $this.find(':selected').attr('data-end_time');
     var start_time = $this.find(':selected').attr('data-start_time');


    $this.parent().parent().next().find('.Period_start').val(start_time);
    $this.parent().parent().next().next().find('.Period_end').val(end_time);

     // $.ajax({
     //     url: base_url +'period-time/'+period_Id,
     //     method: 'get',
     //
     //     success: function (data) {
     //         //console.log(data);
     //         //$('.Periodss').val(data.start_time);
     //         $this.parent().parent().next().find('.Period_start').val(data.start_time);
     //         //alert(id);
     //         $this.parent().parent().next().find('.Period_start').val(data.start_time);
     //         $this.parent().parent().next().next().find('.Period_end').val(data.end_time);
     //
     //         //$("input[name='start_time']").val(data.start_time);
     //         //$("input[name='end_time']").val(data.end_time);
     //     }
     // });
});
$(document).on('change','.schedule-teacher select',  function () {
    var $this = $(this);
    var data_id=$this.data('id');
    var teacher_id = $this.val();
    var days = $("#append-row"+data_id).find('.days').val();
    
    var start_date = $("#append-row"+data_id).find('.Period_start').val();
    var end_date = $("#append-row"+data_id).find('.Period_end').val();

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
     });

     //var end_time = $this.find(':selected').attr('data-end_time');
     //var start_time = $this.find(':selected').attr('data-start_time');


    //$this.parent().parent().next().find('.Period_start').val(start_time);
    //$this.parent().parent().next().next().find('.Period_end').val(end_time);

     $.ajax({
         url: base_url +'teacher-availability-check',
         method: 'post',
         data:{teacher:teacher_id, days:days, start_date:start_date, end_date:end_date},

         success: function (data) {
             //console.log(data);
             //$('.Periodss').val(data.start_time);
             //$this.parent().parent().next().find('.Period_start').val(data.start_time);
             //alert(id);
             //$this.parent().parent().next().find('.Period_start').val(data.start_time);
             //$this.parent().parent().next().next().find('.Period_end').val(data.end_time);

             //$("input[name='start_time']").val(data.start_time);
             //$("input[name='end_time']").val(data.end_time);
         }
     });
});


// function showViewClass(id){
    //
    //     $.get('show-viewClass-schedule/'+id, function (data) {
    //         // console.log('data=========',data);return false;
    //         var classSche = data.unserialized_array;
    //         // $("#period1").empty();
    //         // $("#period2").empty();
    //         // $("#period3").empty();
    //         // $("#period4").empty();
    //         // $("#period5").empty();
    //         // $("#period6").empty();
    //         // $("#period7").empty();
    //         // $("#period8").empty();
    //         $("#classPeroid1").empty();
    //         $("#classPeroid2").empty();
    //         $("#classPeroid3").empty();
    //         $("#classPeroid4").empty();
    //         $("#classPeroid5").empty();
    //         $("#classPeroid6").empty();
    //         $("#classPeroid7").empty();
    //         $("#classPeroid8").empty();
    //
    //
    //         $.each(classSche, function(key, val) {
    //             var periods = val.periods;
    //             console.log("kdfsfj",periods);
    //             // console.log('unserialized array days===',val.periods);
    //             if(periods == 1){
    //
    //                 var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + val.teachers + "</td><td>" + val.start_time +" - "+ val.end_time + "</td></tr>";
    //                 $("#classPeroid1").append(markup);
    //             }
    //             if(periods == 2){
    //
    //                 var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + val.teachers + "</td><td>" + val.start_time +" - "+ val.end_time + "</td></tr>";
    //                 $("#classPeroid2").append(markup);
    //             }
    //             if(periods == 3){
    //
    //                 var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + val.teachers + "</td><td>" + val.start_time +" - "+ val.end_time + "</td></tr>";
    //                 $("#classPeroid3").append(markup);
    //             }
    //             if(periods == 4){
    //
    //                 var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + val.teachers + "</td><td>" + val.start_time +" - "+ val.end_time + "</td></tr>";
    //                 $("#classPeroid4").append(markup);
    //             }
    //             if(periods == 5){
    //
    //                 var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + val.teachers + "</td><td>" + val.start_time +" - "+ val.end_time + "</td></tr>";
    //                 $("#classPeroid5").append(markup);
    //             }
    //             if(periods == 6){
    //
    //                 var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + val.teachers + "</td><td>" + val.start_time +" - "+ val.end_time + "</td></tr>";
    //                 $("#classPeroid6").append(markup);
    //             }
    //             if(periods == 7){
    //
    //                 var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + val.teachers + "</td><td>" + val.start_time +" - "+ val.end_time + "</td></tr>";
    //                 $("#classPeroid7").append(markup);
    //             }
    //             if(periods == 8){
    //
    //                 var markup = "<tr><td>" + val.days + "</td>+<td>" + val.periods + "</td><td>" + val.subjects + "</td><td>" + val.teachers + "</td><td>" + val.start_time +" - "+ val.end_time + "</td></tr>";
    //                 $("#classPeroid8").append(markup);
    //             }
    //
    //             //
    //             //
    //             //         // $('select[name="subject"]').append('<option value="'+ key +'">'+ value +'</option>');
    //         });
    //
    //     })
    // }


    // $('.sel_filter_classSched').on('change', function() {
    //     var sel_filter = $(this).children("option:selected").val();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     });
    //     var filterschedData =  $('#class-schedule-filter-form').serialize();
    //     $.ajax({
    //         url: base_url + 'filter-class-schedule/'+sel_filter,
    //         method: 'get',
    //         data:  filterschedData,
    //         success: function(result){
    //             console.log(result);return false;
    //             $('.add-div-error').text('');
    //             if(result.errors)
    //             {
    //
    //                 $('#add-alert-danger').html('');
    //
    //                 $.each(result.errors, function(key, value){
    //
    //                     $('#newclassSchedule').modal('show');
    //
    //                     $('.add-div-error.'+key).text(value);
    //
    //                     $('.add-div-error .'+key).show();
    //                     //$('.alert-danger').show();
    //
    //
    //                 });
    //             }
    //             else
    //             {
    //
    //                 // $('#success-message').html('');
    //                 // $('.add-div-error').hide();
    //                 //
    //                 // $('#newclass').modal('hide');
    //                 // $('#success-message').show();
    //                 // $('#success-message').append('<p>'+result.message+'</p>');
    //                 // //$('#success-alert').show();
    //                 // //$('#success-alert').text('Successfully Added!').fadeIn('slow');
    //                 // swal("Good job!", "Your Class Added Successfully!", "success");
    //                 // $('#success-message').delay(2000).fadeOut('slow');
    //
    //             }
    //         }});
    // });






// $("#addnewrow").click(function () {
//     let selectElement = document.querySelectorAll('[name=selteacher]');
//     let optionValues = [...selectElement[0].options].map(o => o.value);
//
// //     });
// // /*window.setTimeout(function () {
//     $("#success-message").alert('close');
// }, 2000);
// */
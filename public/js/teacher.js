$(document).ready(function(){

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

    /*--------------------- Set Marks Code Start------------------------------------*/

    /*for set syllabus section ajax*/
    $(document).on("change","#exam-syllabus-dropdown",function() {

        var exam_ID = $(this).val();
        $.ajaxSetup({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
        });

        $.ajax({
            url : base_url +'teacher/assessment/get-syllabus-class-by-section/' +exam_ID,
            type : "GET",
            dataType : "json",

            success:function(data)
            {
                console.log(data);
                $('#exam-syllabus-class-dropdown').html('');
                if(data != "") {
                    $.each(data, function(key,value){

                        $('#exam-syllabus-class-dropdown').append('<option value="'+value.cls_Id+'">'+value.class+'</option>');
                        $('#exam-syllabus-class-dropdown').selectpicker("refresh");
                    });
                }else{
                    $('#exam-syllabus-class-dropdown').append('<option value=""></option>');
                    $('#exam-syllabus-class-dropdown').selectpicker("refresh");
                }
            }
        });
    });
    /*for set syllabus section ajax*/


    /*for edit set syllabus section ajax*/
    $(document).on("change","#edit-exam-syllabus-dropdown",function() {
        var exam_ID = $(this).val();
        $.ajaxSetup({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
        });

        $.ajax({
            url : base_url +'teacher/assessment/get-syllabus-class-by-section/' +exam_ID,
            type : "GET",
            dataType : "json",

            success:function(data)
            {
                console.log(data);
                $('#edit-exam-syllabus-class-dropdown').html('');
                if(data != "") {
                    $.each(data, function(key,value){

                        $('#edit-exam-syllabus-class-dropdown').append('<option value="'+value.cls_Id+'">'+value.class+'</option>');
                        $('#edit-exam-syllabus-class-dropdown').selectpicker("refresh");
                    });
                }else{
                    $('#edit-exam-syllabus-class-dropdown').append('<option value=""></option>');
                    $('#edit-exam-syllabus-class-dropdown').selectpicker("refresh");
                }
            }
        });
    });
    /*for edit set syllabus section ajax*/


    /*for add exam paper section ajax*/
    $(document).on("change","#exam-paper-dropdown",function() {
        var exam_ID = $(this).val();
        $.ajaxSetup({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
        });

        $.ajax({
            url : base_url +'teacher/assessment/get-syllabus-class-by-section/' +exam_ID,
            type : "GET",
            dataType : "json",

            success:function(data)
            {
                console.log(data);
                $('#exam-paper-class-dropdown').html('');
                if(data != "") {
                    $.each(data, function(key,value){

                        $('#exam-paper-class-dropdown').append('<option value="'+value.cls_Id+'">'+value.class+'</option>');
                        $('#exam-paper-class-dropdown').selectpicker("refresh");
                    });
                }else{
                    $('#exam-paper-class-dropdown').append('<option value=""></option>');
                    $('#exam-paper-class-dropdown').selectpicker("refresh");
                }
            }
        });
    });

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
    $(document).on("change", ".edit_syllabus_cls_id", function(event) {

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
    $(document).on("change", ".edit_paper_cls_id", function(event) {

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

    /*for add exam paper section ajax*/

    /*for edit exam paper section ajax*/
    $(document).on("change","#edit-exam-paper-dropdown",function() {
        var exam_ID = $(this).val();
        $.ajaxSetup({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
        });

        $.ajax({
            url : base_url +'teacher/assessment/get-syllabus-class-by-section/' +exam_ID,
            type : "GET",
            dataType : "json",

            success:function(data)
            {
                console.log(data);
                $('#edit-exam-paper-class-dropdown').html('');
                if(data != "") {
                    $.each(data, function(key,value){

                        $('#edit-exam-paper-class-dropdown').append('<option value="'+value.cls_Id+'">'+value.class+'</option>');
                        $('#edit-exam-paper-class-dropdown').selectpicker("refresh");
                    });
                }else{
                    $('#edit-exam-paper-class-dropdown').append('<option value=""></option>');
                    $('#edit-exam-paper-class-dropdown').selectpicker("refresh");
                }
            }
        });
    });
    /*for edit exam paper section ajax*/

    /*for set exam section ajax*/
    $(document).on("change","#exam-name-dropdown",function() {
        var exam_ID = $(this).val();
        $.ajaxSetup({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
        });

        $.ajax({
            url : base_url +'examiner/get-school-section/' +exam_ID,
            type : "GET",
            dataType : "json",

            success:function(data)
            {
                console.log(data);
                $('#school-section-dropdown').html('');
                if(data != "") {
                    $.each(data, function(key,value){

                        $('#school-section-dropdown').append('<option value="'+value.sc_sec_Id+'">'+value.sc_sec_name+'</option>');
                        $('#school-section-dropdown').selectpicker("refresh");
                    });
                }else{
                    $('#school-section-dropdown').append('<option value=""></option>');
                    $('#school-section-dropdown').selectpicker("refresh");
                }
            }
        });
    });
    /*for set exam section ajax*/


    /*for edit set exam section ajax*/
    $(document).on("change","#edit-setmarks-exam-name",function() {
        var exam_ID = $(this).val();
        $.ajaxSetup({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
        });

        $.ajax({
            url : base_url +'examiner/get-school-section/' +exam_ID,
            type : "GET",
            dataType : "json",

            success:function(data)
            {
                $('#edit-setmarks-school_section').html('');
                if(data != "") {
                    $.each(data, function(key,value){

                        $('#edit-setmarks-school_section').append('<option value="'+value.sc_sec_Id+'">'+value.sc_sec_name+'</option>');
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


    /*------------------ set Syllabus jquery code start-------------------------------  */
    $(document).on("click","#set-syllabus-btn",function(e) {
        e.preventDefault();
        $('#set-syllabus-modal').modal('show');

    });

    $(document).on("click","#add-syllabus-save-btn",function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var add_syllabus_data = new FormData($('#add-syllabus-form')[0]);
        $.ajax({
            url: base_url + 'teacher/assessment/add-exam-syllabus',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: add_syllabus_data,
            success: function (result) {
                console.log(result);
                if (result.errors) {
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value){
                        console.log(value);
                        $('#set-syllabus-modal').modal('show');
                        $('.add-div-error.'+key).text(value);

                        $('.add-div-error .'+key).show();

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

                    $('#set-syllabus-modal').modal('hide');

                    getAllSyllabus();

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
            url: base_url + 'teacher/assessment?name=syllabus',
            type   : 'get',
            success: function (data) {
                console.log(data);
                $('#set-syllabus-table').html('');
                $('#set-syllabus-table').html(data);
                //$('#set-syllabus-table').html(data);


            }
        });

    }

    $(document).on("click","#update-syllabus-btn",function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var edit_syllabus_data = new FormData($('#edit-syllabus-form')[0]);
        $.ajax({
            url: base_url + 'teacher/assessment/update-exam-syllabus',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: edit_syllabus_data,
            success: function (result) {
                console.log(result);
                if (result.errors) {
                    $('.edit-div-error').text('');

                    $.each(result.errors, function(key, value){
                        console.log(value);
                        $('#edit-set-syllabus-modal').modal('show');
                        $('.edit-div-error.'+key).text(value);

                        $('.edit-div-error .'+key).show();

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

    $(document).on("click",".edit-syllabus-btn",function() {

        var edit_syllabus_id = $(this).data('id');

        $.get('assessment/edit-exam-syllabus/'+edit_syllabus_id, function (data) {

            console.log(data);
            $('#edit-set-syllabus-modal').modal('show');
            $('#edit-syllabus-id').val(data.syllabus_Id);

            $("#edit-exam-syllabus-dropdown").val(data.exam_Id).attr('selected','selected');
            $("#edit-exam-syllabus-dropdown").selectpicker("refresh");
            $("#edit-exam-syllabus-class-dropdown").val(data.cls_Id).attr('selected','selected');
            $("#edit-exam-syllabus-class-dropdown").selectpicker("refresh");
            $("#edit-syllabus-subject-name").val(data.sub_Id).trigger('change');
            $("#edit-exam-syllabus-file").attr('href',asset_url + '/upload/syllabus/'+ data.syllabus_docs);
            $("#edit-exam-syllabus-file").text(data.syllabus_docs);



        })
    });





    $(document).on("click",".edit-makr-btn",function() {

        var id      = $(this).data('id');
        var date    = $(this).data('date');
        var classs  = $(this).data('class');
        var section = $(this).data('section');
        var subject = $(this).data('subject');
        var exam    = $(this).data('exam');
        var classsection = $(this).data('classsection');





        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + 'teacher/setmark',
            method: 'post',
            dataType : "json",
            data: { id:id,
                date: date,
                class:classs,
                section:section,
                subject:subject ,
                exam:exam,
                sc_sec_Id:classsection,
            },
            success: function (result) {

                $("#markexam").modal('show');

                $("#marks").html('');

                $("#subjects").text(result.subjects);
                $("#show-paperdate").text(result.paperDate);
                $("#show-subject").text(result.subjects.subject);
                $("#show-exame").text(result.exame_name.exam_Name);
                $("#exam_Id").val(result.exam);
                $("#subject_id").val(result.subject);
                $("#date").val(result.paperDate);
                var htmlgrade = '';
                $.each(result.exame_grade, function(key, value){

                    htmlgrade +=`<input class="exame_grade_hidden" value=${value.grade_Name} type="hidden" data-start="${value.grade_st_Per}" data-comment="${value.comment}" data-end="${value.grade_end_Per}"   id="general${value.grade_Id}"/>`

                })
                $("#grade").html(htmlgrade);

                var html = '';



                var exam_Module = '';
                var totalMark =0;
                $.each(result.ExamSubjectMark, function(key, value){
                    exam_Module +=`<th>${value.exam_Module}  (${value.set_Total})</th>`;
                    totalMark += value.set_Total;

                });

                $("#show-total").text(totalMark);


                html +=`<thead>   
                                <tr>
                                    <th>Adm.#</th>
                                    <th>Role#</th>
                                    <th>Name</th>
                                    ${exam_Module}
                                    <th>Obtained</th>
                                    <th >%age</th>
                                    <th>Grade</th>
                                    <th>Status</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>
                        <tbody>`;


                var exam_Moduletd = '';


                var obtainmakrs =  '';
                var comments =  '';

                var studentId ='';
                var totalMarkObtained = 0;

                var totalMark;
                $.each(result.stundets, function(key, value){
                    totalMarkObtained = 0;
                    totalMark = 0;

                    exam_Moduletd ='';
                    $.each(result.ExamSubjectMark, function(keymar, valuemar){



                        obtainmakrs = '';

                        totalMark +=parseInt(valuemar.set_Total);

                        //if(result.stundets[key]['ObtaiMarks'].length>0){
                        if (typeof result.stundets[key]['ObtaiMarks']!=='undefined'){

                            obtainmakrs =result.stundets[key]['ObtaiMarks'][valuemar.exam_Module];
                            totalMarkObtained += parseInt(result.stundets[key]['ObtaiMarks'][valuemar.exam_Module]);
                        }






                        exam_Moduletd +=`<td>
                                <input type="number" class="form-control comments" data-id="${valuemar.set_Total}" data-student="${value.id}"   name="marks[${value.id}][${valuemar.exam_Module}]" value="${obtainmakrs}">
                                </td>
                                `;

                    })
                    //console.log(totalMark);

                    if(result.stundets[key]['ObtaiMarks']){
                        if(result.stundets[key]['ObtaiMarks']['comment']==null){
                            comments ='';


                        } else{

                            comments =result.stundets[key]['ObtaiMarks']['comment'];

                        }

                    }



                    var percentage = Math.round(((totalMarkObtained/totalMark) * 100));







                     var stundetgrade = '';
                     var status = '';
                     var commentsss = '';
                    $('.exame_grade_hidden').each(function() {

                        var $this =$(this);

                        var start = parseInt($this.data('start'));
                        var end   = parseInt($this.data('end'));

                        if (percentage >= start && percentage <= end) {

                            commentsss   = $this.data('comment');

                            stundetgrade = $(this).val() ;
                            if (stundetgrade != '' && stundetgrade == 'Fail' || stundetgrade == 'F') {
                                status = 'Fail';
                                commentsss   = $this.data('comment');
                            }
                            if (stundetgrade != '' && stundetgrade != 'Fail' || stundetgrade != 'F') {
                                status = 'Pass';
                                commentsss   = $this.data('comment');
                            }
                            if (stundetgrade == '') {
                                status = '';
                                commentsss   = '';
                            }

                            //status = (stundetgrade =='Fail')?'Fail':'Pass';
                            //alert(stundetgrade);
                            return;
                            // ...
                        }






                    });




                    // alert(percentage);


            var role_number;
                    html +=`<tr id="student_${value.id}">
                                <td>${value.admission}</td>`;

                        if(value.role_number){
                            role_number = value.role_number
                        }else{
                        role_number = '';
                    }

                    html +=`<td>${role_number}</td>
                            <td>${value.name}</td>
                                ${exam_Moduletd}
                                <td>
                                <input type="number" class="form-control totalMarkObtained" readonly name=""  value="${totalMarkObtained}">
                                </td>
                                <td>
                                    <input type="number" class="form-control percentage" readonly name="" value="${percentage}" >
                                </td>

                                <td>
                                    <input type="text" value="${stundetgrade}" class="form-control student_exame_status"  readonly  > 
                                </td>
                                <td>
                                    <input type="text" class="form-control student_status" name="status[${value.id}]" value="${status}" readonly> 
                                </td>
                                <td>
                                    <input type="text" class="form-control student_comment" name="comments[${value.id}]" value="${commentsss}" > 
                                </td>
                                
                           </tr>`;


                });




                html +=`</tbody>`;





                $("#marks").append(html);






            }

        });


    });




    $(document).on("submit","#marks_obtain",function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var url =  $(this).attr('action');
        var marksdata =  $('#marks_obtain').serialize();

        $.ajax({
            url: url ,
            method: 'post',
            data:  marksdata,
            success: function(result){
                $("#markexam").modal('hide');
                swal({
                    title: "Updated successfully!",
                    type: "success",
                    showCancelButton: false,
                    showConfirmButton: false,
                    timer: 1000
                });

            }
        });

        return false;
    });


    $(document).on('click','.delete-syllabus-btn', function () {

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
            function (isConfirm) {
                if (isConfirm) {
                    $.get('assessment/delete-exam-syllabus/'+syllabus_delete_id, function (data) {
                        swal({
                            icon : 'warning',
                            title: "Deleted successfully!",
                            showCancelButton: false,
                            showConfirmButton: false,
                            type: "success",
                            timer: 1000
                        });
                         //location.reload();
                        getAllSyllabus();
                    });

                } else {
                    getAllSyllabus();
                }
            });
    });




    /*------------------ set Syllabus jquery code End-------------------------------  */

    /*------------------ set Exam Paper jquery code start-------------------------------  */
    $(document).on("click","#set-exam-paper-btn",function(e) {
        e.preventDefault();
        $('#set-exam-paper-modal').modal('show');

    });

    $(document).on("click","#add-exam-paper-save-btn",function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var add_exam_paper_data = new FormData($('#add-exam-paper-form')[0]);
        $.ajax({
            url: base_url + 'teacher/assessment/add-exam-paper',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: add_exam_paper_data,
            success: function (result) {
                console.log(result);
                if (result.errors) {
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value){
                        console.log(value);
                        $('#set-exam-paper-modal').modal('show');
                        $('.add-div-error.'+key).text(value);

                        $('.add-div-error .'+key).show();

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

    $(document).on("click",".edit-exam-paper-btn",function() {
        var edit_exam_paper_id = $(this).data('id');

        $.get('assessment/edit-exam-paper/'+edit_exam_paper_id, function (data) {

            console.log(data);
            $('#edit-set-exam-paper-modal').modal('show');
            $('#edit-exam-paper-id').val(data.exampaper_Id);

            $("#edit-exam-paper-dropdown").val(data.exam_Id).attr('selected','selected');
            $("#edit-exam-paper-dropdown").selectpicker("refresh");
            $("#edit-exam-paper-class-dropdown").val(data.cls_Id).attr('selected','selected');
            $("#edit-exam-paper-class-dropdown").selectpicker("refresh");
            $("#edit-exam-paper-subject").val(data.sub_Id).trigger('change');
            $("#edit-exam-paper-file").attr('href',asset_url + '/upload/paper/'+ data.paper_File);
            $("#edit-exam-paper-file").text(data.paper_File);



        })
    });

    $(document).on("click","#update-exam-paper-btn",function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var edit_exam_paper_data = new FormData($('#edit-exam-paper-form')[0]);
        $.ajax({
            url: base_url + 'teacher/assessment/update-exam-paper',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: edit_exam_paper_data,
            success: function (result) {
                console.log(result);
                if (result.errors) {
                    $('.edit-div-error').text('');

                    $.each(result.errors, function(key, value){
                        console.log(value);
                        $('#edit-set-exam-paper-modal').modal('show');
                        $('.edit-div-error.'+key).text(value);

                        $('.edit-div-error .'+key).show();

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


    $(document).on('keyup','.comments', function (e) {

        var $this =$(this);
        var value =$this.val();
        var id =$this.data('id');
        var student_id =$this.data('student');
        if(value>id){
            alert('please enter mark less than or equal to '+id);
            $this.val('');
            var sum = 0;
            $('#student_'+student_id+' .comments').each(function() {
                sum += Number($(this).val());
            });
            var total_marks= $("#show-total").text();
            var percentage = Math.round(((sum/parseInt(total_marks)) * 100));

            $("#student_"+student_id+" .totalMarkObtained").val(sum);



            $("#student_"+student_id+" .percentage").val(percentage);




        }else{


            var sum = 0;

            $('#student_'+student_id+' .comments').each(function() {
                sum += Number($(this).val());
            });

            var total_marks= $("#show-total").text();
            var percentage = Math.round(((sum/parseInt(total_marks)) * 100));

            $("#student_"+student_id+" .totalMarkObtained").val(sum);
            $("#student_"+student_id+" .percentage").val(percentage);


            var stundetgrade = '';
            var status = '';
            var commentsss = '';
            $('.exame_grade_hidden').each(function() {

                var $this =$(this);

                var start = parseInt($this.data('start'));
                var end   = parseInt($this.data('end'));
                if (percentage >= start && percentage <= end) {

                    stundetgrade = $(this).val() ;
                    if (stundetgrade != '' && stundetgrade == 'Fail' || stundetgrade == 'F') {
                        status = 'Fail';
                        commentsss   = $this.data('comment');
                    }
                    if (stundetgrade != '' && stundetgrade != 'Fail' || stundetgrade == 'F') {
                        status = 'Pass';
                        commentsss   = $this.data('comment');
                    }
                    if (stundetgrade == '') {
                        status = '';
                        commentsss   = $this.data('comment');
                    }

                    return;
                    // ...
                }


            });

             $("#student_"+student_id+" .student_exame_status").val(stundetgrade);
             $("#student_"+student_id+" .student_status").val(status);
             $("#student_"+student_id+" .student_comment").val(commentsss);



        }








    })




    $(document).on('click','.delete-exam-paper-btn', function () {


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
            function (isConfirm) {
                if (isConfirm) {
                    $.get('assessment/delete-exam-paper/'+exam_paper_id, function (data) {
                        swal({
                            icon : 'warning',
                            title: "Deleted successfully!",
                            showCancelButton: false,
                            showConfirmButton: false,
                            type: "success",
                            timer: 1000
                        });
                         //location.reload();
                        getAllPaper();
                    });

                } else {
                    getAllPaper();
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
            url: base_url + 'teacher/assessment/?name=paper',
            type   : 'get',
            success: function (data) {
                $('#set-paper-table').empty();
                $('#set-paper-table').html(data);


            }
        });

    }

    /*------------------ set Exam Paper jquery code End-------------------------------  */

    $(document).on("click","#write-new-diary-btn",function(e) {
        e.preventDefault();
        $('#write-new-diary-modal')
            .find("input,textarea,select,file")
            .val('')
            .end()
            .find("select")
            .prop("selected", "").selectpicker("refresh")
            .end();

        $('#write-new-diary-modal').modal('show');
        $("#write-diary-save-btn").show();
        $("#write-new-diary-modal .add-div-error").text('');
        $("#update-write-diary-btn").hide();

        $('.title').text('Add New Diary');

    });

    $(document).on("click","#write-diary-save-btn",function(e) {
        e.preventDefault();
        $('#write-diary-form').attr('action', base_url + 'teacher/diary/add-write-diary');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var add_diary_data = new FormData($('#write-diary-form')[0]);
        $.ajax({
            url: base_url + 'teacher/diary/add-write-diary',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: add_diary_data,
            success: function (result) {
                console.log(result);
                if (result.errors) {
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value){
                        console.log(value);
                        $('#write-new-diary-modal').modal('show');
                        $('.add-div-error.'+key).text(value);

                        $('.add-div-error.'+key).show();

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

                    $('#write-new-diary-modal').modal('hide');

                    getAllDiaries();

                }
            }
        });
    });
    $(document).on('click','.show-diary-btn', function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var show_diary_id = $(this).data('id');
        $.ajax({
            url: base_url + 'teacher/diary/show-diary',
            type   : 'post',
            dataType : "json",
            data: { id : show_diary_id },
            success: function (data) {
                //console.log(data);
                $('#view-diary-modal').modal('show');
                $('.title').text('View Diary');
                $('#view-diary-modal #show-dairy-class').text(data.className);
                $('#view-diary-modal #show-dairy-class-section').text(data.classSection);
                $('#view-diary-modal #show-dairy-subject').text(data.subjectName);
                $('#view-diary-modal #show-dairy-due-date').text(data.due_Date);
                $('#view-diary-modal #show-dairy-diary-type').text(data.diaryType);
                $('#view-diary-modal #show-dairy-audience').text(data.audience);
                $('#view-diary-modal #diary-note').text(data.diary_Note);
                $("#view-diary-modal #show-diary-file").attr('href',asset_url + '/upload/diary/'+ data.diary_File);
                $("#view-diary-modal #show-diary-file").text(data.diary_File);
                $("#view-diary-modal #diary-student-table > tbody").empty();
                var markup ='';
                $.each(data.studentInfo, function(key, val) {

                    markup += "<tr><td>" + (key+1) + "</td><td>" + val.name + "</td><td>" + val.status + "</td></tr>";
                });
                $("#view-diary-modal #diary-student-table").append(markup);


            }
        });






    });

    $(document).on("click",".edit-diary-btn",function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var edit_diary_id = $(this).data('id');
        $.ajax({
            url: base_url + 'teacher/diary/edit-diary',
            type   : 'post',
            dataType : "json",
            data: { id : edit_diary_id },
            success: function (data) {
                console.log(data);
                var status = data.diary_Status;

                $('#write-new-diary-modal').modal('show');
                $('#write-diary-form').attr('id', 'edit-diary-form');
                $('.title').text('Edit New Diary');
                $("#update-write-diary-btn").show();
                $(".add-div-error").hide();
                $("#write-diary-save-btn").hide();

                $('#edit-diary-id').val(data.pk_diary_Id);
                //$('#edit-diary-id').selectpicker('refresh');
                $("#cls_id").val(data.fk_cls_Id).attr('selected', 'selected');
                $('#cls_id').selectpicker('refresh');
                $('#section_id').val(data.fk_c_section_Id).trigger('selected', 'selected');
                $('#section_id').selectpicker('refresh');

                $('#subject_id').val(data.fk_sub_Id).attr('selected', 'selected');
                $('#subject_id').selectpicker('refresh');

                $('#diary-status-dropdown').val(status).attr('selected', 'selected');
                $('#diary-status-dropdown').selectpicker('refresh');

                $('#diary-type-dropdown').val(data.fk_diary_type_Id).attr('selected', 'selected');
                $('#diary-type-dropdown').selectpicker('refresh');
                $('#audience').val(data.audience).attr('selected', 'selected');
                $('#audience').selectpicker('refresh');
                $('#due-date').val(data.due_Date);
                $('#diary-note').val(data.diary_Note);

                $('#diary-students-dropdown').html('');

                var selected;
                var table ='';
                $.each(data.datastundet, function (key, val) {
                    selected = '';

                    if(val['selected']=='true'){

                        selected = " selected ";

                    }
                    table +=`<option value="${key}" ${selected}>${val['name']}</option>`;
                });
                $("#diary-students-dropdown").html(table);
                if (data.audience=='Whole Class') {
                    $('#student-dropdown-div').css("visibility", "hidden");
                }else{
                    $('#student-dropdown-div').css("visibility", "visible");
                }
                $('#diary-students-dropdown').selectpicker('refresh');
                $("#diary-file").attr('href',asset_url + '/upload/diary/'+ data.diary_File);
                $("#diary-file").text(data.diary_File);

            }



        })
    });

    $(document).on("click","#update-write-diary-btn",function(e) {

        e.preventDefault();
        //$('#edit-diary-form').attr('action', base_url + 'teacher/diary/update-write-diary');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var edit_diary_data = new FormData($('#edit-diary-form')[0]);
        $.ajax({
            url: base_url + 'teacher/diary/update-write-diary',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: edit_diary_data,
            success: function (result) {
                console.log(result);
                if (result.errors) {
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value){
                        console.log(value);
                        $('#write-new-diary-modal').modal('show');
                        $('.add-div-error.'+key).text(value);

                        $('.add-div-error.'+key).show();

                    });
                } else {

                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });

                    $('.add-div-error').hide();

                    $('#write-new-diary-modal').modal('hide');

                    getAllDiaries();

                }
            }
        });
    });



    $(document).on('click','.delete-diary-btn', function () {

        var diary_delete_id = $(this).data('id');
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
                    $.get('diary/delete-diary/'+diary_delete_id, function (data) {
                        swal({
                            icon : 'warning',
                            title: "Deleted successfully!",
                            showCancelButton: false,
                            showConfirmButton: false,
                            type: "success",
                            timer: 1000
                        });
                        getAllDiaries();

                    });

                } else {
                    getAllDiaries();
                }
            });
    });

    function getAllDiaries() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + 'teacher/diary?name=diary',
            type   : 'get',
            success: function (data) {
                console.log(data);
                $('#diarytable').html('');
                $('#diarytable').html(data);


            }
        });

    }

    /*for select student ajax*/
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

    $(document).on("change", ".section_id",function(){
        var $this = $("#diary-students-dropdown");
        var id = $(this).val();

        var class_id = $("#cls_id option:selected").val() ;

        $.ajaxSetup({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
        });

        $.ajax({
            url: base_url +'get-diary-student-by-class/'+class_id+'/'+id,
            type   : 'get',
            data   : {id: id},
            success: function(response){
                $this.empty();
                $this.append('<option value="">Select Students</option>');
                $.each(response , function (key, value) {
                    console.log("student",value)

                    $this.append('<option value="'+ value.id +'">'+value.name+'</option>');
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
            url: base_url +'get_class_subject_by_teacher/'+class_id+'/'+id,
            type   : 'get',
            data   : {id: id},
            success: function(response){
                $this.empty();
                $this.append('<option value="">Select Subject</option>');
                $.each(response , function (key, value) {

                    $this.append('<option value="'+ value.id +'">'+value.name+'</option>');
                });
                $this.selectpicker("refresh");
            }
        });
    });


    $(document).on("change", "#audience",function() {
        var $this = $("#diary-students-dropdown");
        var id = $(this).val();
        var section_id = $("#section_id option:selected").val();
        var class_id = $("#cls_id option:selected").val();
        var aunience = $("#audience option:selected").val();
        if (class_id == '' && section_id == '') {
            alert('please select class and section'); return false;
        }


        if (aunience=='Whole Class') {
            $('#student-dropdown-div').css("visibility", "hidden");
            $('#diary-students-dropdown option[value!=""]').prop('selected', true);


        } else {
            $('#student-dropdown-div').css("visibility", "visible");

        }

    });
    /*for select student ajax*/





    /*---------------------------------Dairy Code end---------------------------------------*/
    /*---------------------------------study material code start---------------------------------------*/
    /*for select student ajax*/
    /*for select student ajax*/
    $(document).on("change",".study_cls_id", function(event){

        event.stopPropagation();
        var $this = $("#study_class_section_id");
        var id = $(this).val();

        $.ajax({
            url: base_url +'get_section/'+id,
            type   : 'get',
            data   : {id: id},
            success: function(response){
                $this.empty();
                $("#study_subject_id").empty();
                $this.append('<option value="">Select Section</option>');
                $.each(response , function (key, value) {
                    $this.append('<option value="'+ value.c_section_Id +'">'+value.class_section_name+'</option>');
                });
                $this.selectpicker("refresh");
            }
        });
    });

    $(document).on("change", ".study_class_section_id",function(){
        var $this = $("#study-material-students-dropdown");
        var id = $(this).val();

        var class_id = $("#study_class_section_id option:selected").val() ;

        $.ajaxSetup({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
        });

        $.ajax({
            url: base_url +'get-diary-student-by-class/'+class_id+'/'+id,
            type   : 'get',
            data   : {id: id},
            success: function(response){
                $this.empty();
                $this.append('<option value="">Select Students</option>');
                $.each(response , function (key, value) {
                    console.log("student",value)

                    $this.append('<option value="'+ value.id +'">'+value.name+'</option>');
                });
                $this.selectpicker("refresh");
            }
        });

    });

    $(document).on("change",".study_class_section_id", function(event){

        event.stopPropagation();
        var $this = $("#study_subject_id");
        var id = $(this).val();
        var class_id = $("#study_cls_id option:selected").val() ;

        $.ajax({
            url: base_url +'get_class_subject_by_teacher/'+class_id+'/'+id,
            type   : 'get',
            data   : {id: id},
            success: function(response){
                $this.empty();
                $this.append('<option value="">Select Subject</option>');
                $.each(response , function (key, value) {

                    $this.append('<option value="'+ value.id +'">'+value.name+'</option>');
                });
                $this.selectpicker("refresh");
            }
        });
    });


    $(document).on("change", "#study_audience",function() {
        var $this = $("#study-material-students-dropdown");
        var id = $(this).val();
        var section_id = $("#study_class_section_id option:selected").val();
        var class_id = $("#study_cls_id option:selected").val();
        var aunience = $("#study_audience option:selected").val();
        if (class_id == '' && section_id == '') {
            alert('please select class and section'); return false;
        }
        $.ajaxSetup({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
        });


        if (aunience=='Whole Class') {
            $('#study-student-dropdown-div').css("visibility", "hidden");

            $.ajax({
                url: base_url + 'get-diary-student-by-class/' + class_id + '/' + section_id,
                type: 'get',
                data: {id: id},
                success: function (response) {
                    $this.empty();
                    if (id == 'Whole Class') {

                        $.each(response, function (key, value) {
                            console.log("student", value)

                            $this.append('<option value="' + value.id + '" selected="selected">' + value.name + '</option>');
                        });
                        $this.selectpicker("refresh");
                    }

                }
            });

        } else {
            $('#study-student-dropdown-div').css("visibility", "visible");
            $.ajax({
                url: base_url + 'get-diary-student-by-class/' + class_id + '/' + section_id,
                type: 'get',
                data: {id: id},
                success: function (response) {
                    $this.empty();
                    if (id == 'Individuals') {

                        $this.append('<option value="">Select Students</option>');
                        $.each(response, function (key, value) {
                            console.log("student", value)

                            $this.append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $this.selectpicker("refresh");
                    }

                }
            });
        }

    });
    /*for select student ajax*/

    $(document).on("click", "#study-material-btn",function(e) {
        e.preventDefault();
        $('#add-material-modal')
            .find("input,textarea,select,file")
            .val('')
            .end()
            .find("select")
            .prop("selected", "").selectpicker("refresh")
            .end();

        $('#add-material-modal .title').text('Upload Study Material');

        $("#add-study-save-btn").show();
        $(".add-div-error").hide();
        $("#study-update-btn").hide();
        $('#add-material-modal').modal('show');

    });

    $(document).on("click", "#add-study-save-btn",function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var add_study_data = new FormData($('#add-material-form')[0]);
        $.ajax({
            url: base_url + 'teacher/diary/add-study-material',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: add_study_data,
            success: function (result) {
                console.log(result);
                if (result.errors) {
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value){
                        console.log(value);
                        $('#add-material-modal').modal('show');
                        $('.add-div-error.'+key).text(value);

                        $('.add-div-error.'+key).show();

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

                    $('#add-material-modal').modal('hide');

                    getAllStudyMaterial();

                }
            }
        });
    });



    $(document).on('click','.view-study-btn', function () {
        $('#view-study-modal .title').text('View Study Material');
        var show_study_id = $(this).data('id');
        $.get('diary/show-study/'+show_study_id, function (data) {
            console.log(data);
            $('#view-study-modal').modal('show');
            $('#show-study-class').text(data.className);
            //$('#show-school-section').text(data.tuition_fee);
            $('#show-study-class-section').text(data.classSection);
            $('#show-study-subject').text(data.subjectName);
            $('#show-study-due-date').text(data.due_Date);
            $('#show-study-topic').text(data.topic);
            $('#show-study-audience').text(data.audience);
            $('#study-note').text(data.study_Note);
            $("#show-study-file").attr('href',asset_url + '/upload/study/'+ data.study_File);
            $("#show-study-file").text(data.study_File);

            $("#study-student-table").empty();
            $.each(data.studentInfo, function(key, val) {
                var markup = "<tr><td>" + (key+1) + "</td><td>" + val.name + "</td></tr>";
                $("#study-student-table").append(markup);
            });

        })
    });

    $(document).on('click','.edit-study-btn', function () {
        $('#add-material-modal .title').text('Edit Upload Study Material');
        $("#add-study-save-btn").hide();
        $(".add-div-error").hide();

        $("#study-update-btn").show();

        var edit_study_id = $(this).data('id');

        $.get('diary/edit-study/'+edit_study_id, function (data) {
            console.log(data);
            $('#add-material-modal').modal('show');

            $('#edit-study-id').val(data.pk_study_material_Id);
            $("#study_cls_id").val(data.fk_cls_Id).attr('selected', 'selected');
            $('#study_cls_id').selectpicker('refresh');
            $('#study_class_section_id').val(data.fk_c_section_Id).attr('selected', 'selected');
            $('#study_class_section_id').selectpicker('refresh');
            $('#study_subject_id').val(data.fk_sub_Id).attr('selected', 'selected');
            $('#study_subject_id').selectpicker('refresh');
            $('#study-topic').val(data.topic);
            $('#study_audience').val(data.audience).attr('selected', 'selected');
            $('#study_audience').selectpicker('refresh');
            $('#study-due-date').val(data.due_Date);
            $('#study-note').val(data.study_Note);

            $('#study-material-students-dropdown').empty();
            if (data.audience=='Whole Class') {
                $('#study-student-dropdown-div').css("visibility", "hidden");
                $.each(data.studentInfo, function (key, val) {
                    $("#study-material-students-dropdown").append('<option value="'+ val.id +'" selected>'+val.name+'</option>');
                    $('#study-material-students-dropdown').selectpicker('refresh');
                });
            }else{
                $('#study-student-dropdown-div').css("visibility", "visible");
                $.each(data.studentInfo, function (key, val) {
                    $("#study-material-students-dropdown").append('<option value="'+ val.id +'" selected>'+val.name+'</option>');
                    $('#study-material-students-dropdown').selectpicker('refresh');

                });
            }
            $("#study-file").attr('href',asset_url + '/upload/study/'+ data.study_File);
            $("#study-file").text(data.study_File);


        })
    });

    $(document).on("click", "#study-update-btn",function(e) {
        e.preventDefault();
        $('#add-material-form').attr('action', base_url + 'teacher/diary/update-study-material');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var edit_diary_data = new FormData($('#add-material-form')[0]);
        $.ajax({
            url: base_url + 'teacher/diary/update-study-material',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: edit_diary_data,
            success: function (result) {
                console.log(result);
                if (result.errors) {
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value){
                        console.log(value);
                        $('#add-material-modal').modal('show');
                        $('.add-div-error.'+key).text(value);

                        $('.add-div-error.'+key).show();

                    });
                } else {

                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });

                    $('.add-div-error').hide();

                    $('#add-material-modal').modal('hide');

                    getAllStudyMaterial();

                }
            }
        });
    });


    $(document).on('click','.delete-study-btn', function () {

        var study_delete_id = $(this).data('id');
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
                    $.get('diary/delete-study/'+study_delete_id, function (data) {
                        swal({
                            icon : 'warning',
                            title: "Deleted successfully!",
                            showCancelButton: false,
                            showConfirmButton: false,
                            type: "success",
                            timer: 1000
                        });
                        getAllStudyMaterial();

                    });

                } else {
                    getAllStudyMaterial();
                }
            });
    });



    function getAllStudyMaterial() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + 'teacher/diary?name=study',
            type   : 'get',
            success: function (data) {
                console.log(data);
                $('#materialtable').html('');
                $('#materialtable').html(data);
                //$('#set-syllabus-table').html(data);


            }
        });

    }
    /*---------------------------------study material code end---------------------------------------*/


    /*--------------------------------Teacher Student Register Code start----------------------------------------*/



    $(document).on("click", "#date-wise-attendance-submit-btn",function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var from = $("select[name=from_date]").val();

        var to = $("select[name=to_date]").val();

        var add_date_data = $('#date-wise-attendance-form').serialize();
        $.ajax({
            url: base_url + 'teacher/attendance/date',
            method: 'post',
            data: add_date_data,
            success: function (data) {

                console.log("data>>>>>>>>>>>>",data);

                if (data.errors) {
                    $('.add-div-error').text('');


                    $.each(data.errors, function(key, value){
                        //console.log(value);
                        $('#edit-attendance-modal').modal('show');
                        $('.add-div-error.'+key).text(value);

                        $('.add-div-error.'+key).show();

                    });
                } else {


                    //console.log(add_date_data['from_date']);

                    //if (data){
                        $('#show-datewise-attendance-date').text(from);
                        $('#show-datewise-attendance-to-date').text(to);
                        $('#show-datewise-attendance-class').text(data.attendances[0].class);
                        $('#show-datewise-attendance-section').text(data.attendances[0].class_section_name);
                   // }

                    $('.add-div-error').hide();

                    //$.each(data.errors, function(key, value){
                        //console.log(value);
                        $('#show-datewise-attendance-modal').modal('show');
                        //console.log(data);
                        // $('#show-attendance-modal').modal('show');
                        // $('#show-attendance-date').text(data.date_register);
                        // $('#show-attendance-class').text(data.class);
                        // $('#show-attendance-section').text(data.class_section_name);

                        //$('#show-datewise-attendance-table > thead').html('');

                        $('#show-datewise-attendance-table > tbody').html('');

                            $.each(data.attendances, function(key, datevalue) {
                                // console.log(datevalue.date_register);
                                // $("#show-datewise-attendance-table>thead>tr").append('<th>'+datevalue.date_register +'</th>');
                            var showAttendanceAppendHead = '<th>'+datevalue.date_register +'</th>';
                             $('#show-datewise-attendance-table > thead tr:last-child').append(showAttendanceAppendHead);
                        });



                        $.each(data.attendance_sheet, function(key, value) {

                            var showAttendanceAppendTable = '<tr>';
                            $.each(value, function(key, val) {

                                 showAttendanceAppendTable += '<td>Roll Number</td>'+
                                     '<td>'+val.f_name + ' ' + val.m_name+ ' ' + val.l_name +'</td>'+
                                     '<td>'+val.attendance +'</td>'+

                                     '</tr>';


                            $('#show-datewise-attendance-table > tbody:last-child').append(showAttendanceAppendTable);
                        });
                        });

                    //});



                    //getAllStudyMaterial();

                }
            }
        });
    });


    $(document).on("click", ".imgCheckboxachvi .imgCheckbox2",function(e)
    {
        e.preventDefault();
        $this= $(this);
        var classs =$this.attr("class");
        var id =$this.parent().data("id");
        var attendence_status =$("#attendence_status").val();
        var Classs= $this.attr("class");
        var classs =$this.attr("class");
        var student_iREC = $("#achievementstudentLists").val();
        var studentArray=[];
        if(student_iREC==''){
            studentArray = [];
        }else{
            studentArray = student_iREC.split(',');
        }
        var student_id = $(this).parent().data('id');
        var check =  $.inArray(""+student_id+"", studentArray);
        if (check == -1 && classs=="imgCheckbox2 imgChked")
        {
            studentArray.push(student_id);
        }
        else
        {
            studentArray.splice($.inArray(""+student_id+"", studentArray),1);
        }
        var ids = '';
        var i=1;
        $.each(studentArray, function(key, val) {
            ids +=val;
            if(studentArray.length!=i){
                ids +=",";
            }
            i++;
        });
        $("#achievementstudentLists").val(ids);
    });

    /*one date attendance*/
    $(document).on('click', ".attendance-pdf", function() {
        var doc = new jsPDF('l', 'mm', "a0");
        var tbl = $('#show-attendance-table').clone();
        var res = doc.autoTableHtmlToJson(tbl.get(0));
        doc.autoTable(res.columns, res.data, {
            startY: 40,
            margin: {
                top: 40
            },
            addPageContent: function (data) {
                doc.setFontSize(28);
                doc.setTextColor(0);
                doc.setFontStyle('bold');
                doc.text("Attendance Sheet " + " Date :" +$("#show-attendance-date").text()+ " Class :" +$("#show-attendance-class").text() +" Section :" +$("#show-attendance-section").text(), 500, 30);
            },
            styles: {
                fontSize: 20,
                overflow: 'linebreak',
                columnWidth: 'wrap',
            },
            theme: 'grid'
        });

        doc.save("Attendance.pdf");
    });
    /*date waise Attendance*/
    $(document).on('click', ".datewise-attendance-pdf", function() {
        var doc = new jsPDF('l', 'mm', "a0");
        var tbl = $('#show-datewise-attendance-table').clone();
        var res = doc.autoTableHtmlToJson(tbl.get(0));
        doc.autoTable(res.columns, res.data, {
            startY: 40,
            margin: {
                top: 40
            },
            addPageContent: function (data) {
                doc.setFontSize(28);
                doc.setTextColor(0);
                doc.setFontStyle('bold');
                doc.text("Attendance Sheet " + "From date :" +$("#show-datewise-attendance-date").text()+" To date :" +$("#show-datewise-attendance-to-date").text()+ " Class :" +$("#show-datewise-attendance-class").text() +" Section :" +$("#show-datewise-attendance-section").text(), 500, 30);
            },
            styles: {
                fontSize: 20,
                overflow: 'linebreak',
                columnWidth: 'wrap',
            },
            theme: 'grid'
        });

        doc.save("Attendance.pdf");
    });

   /* attendance pdf end*/

    var attendance = [];


    /* 
    
      Behaviur 
    
    */

     $(document).on("click", ".imgCheckboxbah .imgCheckbox2",function(e)
    {

        e.preventDefault();
        $this= $(this);
        var classs =$this.attr("class");
        var id =$this.parent().data("id");
        var attendence_status =$("#attendence_status").val();
        var Classs= $this.attr("class");
        var classs =$this.attr("class");
        var student_iREC = $("#bstudents").val();

        var studentArray=[];
        if(student_iREC==''){
             studentArray = [];
        }else{
             studentArray = student_iREC.split(',');
        }

        var student_id = $(this).parent().data('id');
        var check =  $.inArray(""+student_id+"", studentArray);

        if (check == -1 && classs=="imgCheckbox2 imgChked")
        {
            studentArray.push(student_id);
        }
        else
        {
            studentArray.splice($.inArray(""+student_id+"", studentArray),1);
        }

        var ids = '';
        var i=1;
         $.each(studentArray, function(key, val) {
            ids +=val;
            if(studentArray.length!=i){
                ids +=",";
            }
            i++;
        });
        $("#bstudents").val(ids);



    });




    // $(document).on("click", ".imgCheckboxachvi .imgCheckbox2",function(e)
    // {

    //     e.preventDefault();
    //     $this= $(this);
    //     var classs =$this.attr("class");
    //     var id =$this.parent().data("id");
    //     var attendence_status =$("#attendence_status").val();
    //     var Classs= $this.attr("class");
    //     var classs =$this.attr("class");
    //     var student_iREC = $("#achievementstudentLists").val();
    //     var studentArray=[];
    //     if(student_iREC==''){
    //         studentArray = [];
    //     }else{
    //         studentArray = student_iREC.split(',');
    //     }
    //     var student_id = $(this).parent().data('id');
    //     var check =  $.inArray(""+student_id+"", studentArray);
    //     if (check == -1 && classs=="imgCheckbox2 imgChked")
    //     {
    //         studentArray.push(student_id);
    //     }
    //     else
    //     {
    //         studentArray.splice($.inArray(""+student_id+"", studentArray),1);
    //     }
    //     var ids = '';
    //     var i=1;
    //     $.each(studentArray, function(key, val) {
    //         ids +=val;
    //         if(studentArray.length!=i){
    //             ids +=",";
    //         }
    //         i++;
    //     });
    //     alert('da');
    //     $("#achievementstudentLists").val(ids);
    // });


    $(document).on("click", ".saveach",function(e) {
        var $this = $(this);

        var students = $("#achievementstudentLists").val();
        if(students=='')
        {

            return false;
        }else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var cls_Id = $('#cls_Id').val();
            var c_section_Id = $('#c_section_Id').val();
            var activities_id = $('#activities_idachement').val();


            var achievement_type = $('#achievement_type').val();
            var udat = $('#id').val();
            var comments = $('#comments').val();

            $.ajax({
                url: base_url + 'teacher/class-register/achievement-student-register',
                method: 'post',
                dataType : "json",
                data: {
                    cls_Id            : cls_Id,
                    c_section_Id      : c_section_Id,
                    student           : students,
                    achievement_type  :achievement_type,
                    activities_id     :activities_id,
                    comments          :comments,

                    id:udat
                },
                success: function (result) {

                    swal({
                        title: " Save successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $("#myModalachieve").modal('hide');

                }
            });
            attendance = [];
            //$('#bstudents').val('');
        }
        return false;
    });


    $(document).on("click", ".saveba",function(e) {
        var $this = $(this);
        var students = $("#bstudents").val();
        if(students=='')
        {

            return false;

        }else {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            var cls_Id = $('#cls_Id').val();
            var c_section_Id = $('#c_section_Id').val();
            var behaviour_type = $('#behaviour_type').val();
            var activities_id = $('#activities_id').val();
            var location_id = $('#location_id').val();
            var status = $('#status').val();
            var udat = $('#id').val();
             var comments = $('#behaviour_comment').val();


             $.ajax({
                url: base_url + 'teacher/class-register/behavoir-student-register',
                method: 'post',
                 dataType : "json",
                data: {
                        cls_Id: cls_Id,
                        c_section_Id: c_section_Id,
                        student: students,
                        behaviour_type:behaviour_type,
                        activities_id:activities_id,
                        location_id:location_id,
                        status:status,
                        id:udat,
                        comments:comments
                    },
                success: function (result) {

                        swal({
                        title: " Save successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });


                        $("#myModalparticipant").modal('hide');




                }

            });

            attendance = [];
             //$('#bstudents').val('');


        }
        return false;


    });



    $(document).on("click", ".imgCheckbox2 .imgCheckbox2",function(e)
    {

        e.preventDefault();
        $this= $(this);
        var classs =$this.attr("class");
        var id =$this.parent().data("id");
        var attendence_status =$("#attendence_status").val();
        var Classs= $this.attr("class");
        var classs =$this.attr("class");
        var student_iREC = $("#students").val();
        var studentArray=[];
        if(student_iREC==''){
             studentArray = [];
        }else{
             studentArray = student_iREC.split(',');
        }

        var student_id = $(this).parent().data('id');
        var check =  $.inArray(""+student_id+"", studentArray);

        if (check == -1 && classs=="imgCheckbox2 imgChked")
        {
            studentArray.push(student_id);
        }
        else
        {
            studentArray.splice($.inArray(""+student_id+"", studentArray),1);
        }

        var ids = '';
        var i=1;
         $.each(studentArray, function(key, val) {
            ids +=val;
            if(studentArray.length!=i){
                ids +=",";
            }
            i++;
        });
        $("#students").val(ids);



    });


    $(document).on("click", ".register-save",function(e) {

        var $this = $(this);
        var data= $this.data('id');
        var CheckedID = $('span.imgCheckbox2.imgChked');
        CheckedID.removeClass('imgChked');
        //alert(data);
        var txt= $this.data('text');
        $(".btn-outline-choice").removeClass('active');

        // var x = document.getElementById("snackbar");
        //
        // x.removeAttribute('hidden');
        // setTimeout(function(){
        //     $('#snackbar').prop("hidden", true); }, 1000);
        swal({
            title: 'Success',
            text: 'Attendence Marked Successfully!',
            timer: 2000,
            type : 'success',
            showCancelButton: false,
            showConfirmButton: false
        });
        setTimeout(function(){
            swal.close();

                //.removeClass('imgChked');
        },1000);


        if(data!=''){

            $('#attendence_status').val($this.data('id'));
        }
        $(this).addClass('active');

        $('#status_attend').val(data);

        var atteens_stus=  $('#attendence_status').val();
        var group = $('#attendance [data-id="'+atteens_stus+'"]');

        group.addClass('active');
        var attendance_type=  $('#attendance_type').val();
        var students = $("#students").val();

        if(students=='')
        {
            return false;
        }else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var cls_Id = $('#cls_Id').val();

            var c_section_Id = $('#c_section_Id').val();
            var attendance_type = $('#attendance_type').val();
            var udat = $('#id').val();

             $.ajax({
                url: base_url + 'teacher/class-register/add-student-register',
                method: 'post',
                 dataType : "json",
                data: {attendance_type:attendance_type, cls_Id: cls_Id, c_section_Id: c_section_Id, student: students, attendance: atteens_stus,id:udat},
                success: function (result) {

                    $.each(result, function(key,value){
                         let static = '';
                        if(value.attendence_stutus=='P'){
                            static = "Present";
                        }else if(value.attendence_stutus=='A'){
                            static = "Absent";
                        }
                        else if(value.attendence_stutus=='L'){
                            static = "Late";
                        }else if(value.attendence_stutus=='H'){
                            static = "Leave";
                        }
                        $('#studentId'+key).text(static);

                    });
                }
            });
            attendance = [];
             $('#students').val('');
        }
        return false;
    });


    $(document).on("click", ".select_Badll",function(e) {
        e.preventDefault();
        var ids = "";
        var length =$('.imgCheckboxbah.author').length;
        $('.imgCheckboxbah.author').each(function(i, obj) {
            var idss = $(this).attr("id");
            var j=i+1;
            ids +=$(this).data('id');
            if(length!=j){
                ids +=",";
            }


            $("#"+idss+" .imgCheckbox2").addClass('imgChked');


        });
        $("#bstudents").val(ids);

            //test
    });


    $(document).on("click", "#select-all-setudent",function(e) {
        e.preventDefault();



        var ids = "";

        var length =$('.imgCheckbox2.author').length;

        $('.imgCheckbox2.author').each(function(i, obj) {

            var idss = $(this).attr("id");

            var j=i+1;
            ids +=$(this).data('id');
            if(length!=j){
                ids +=",";
            }


            $("#"+idss+" .imgCheckbox2").addClass('imgChked');


        });


        $("#students").val(ids);

            //test
    });

    $(document).on("click", "#cancel-all-setudent",function(e) {
        e.preventDefault();
        $('span.imgCheckbox2').removeClass('imgChked');
        $('.present_absent').val('A');
    });

    $(document).on("click", ".show-attendance-btn",function() {

        var attendance_date = $(this).data('id');
        var class_id = $(this).data('class');
        var class_section_id = $(this).data('section');

        $('#show-attendance-modal').modal('show');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url : base_url +'teacher/show-attendance',
            type : "post",
            dataType : "json",
            data:{
                'attendance_date': attendance_date,
                'class_id': class_id,
                'class_section_id': class_section_id,

            },
            success:function(data)
            {

                $("#bavContainer").html('');
                $("#achieveContainer").html('');

                $('#show-attendance-date').text(" " + data.date_register);
                $('#show-attendance-class').text(" " + data.class);
                $('#show-attendance-section').text(" " +data.section);
                $('#show-attendance-table > tbody').html('');
                let static1;
                $.each(data.attedence, function(key, val) {

                        if(val.attendanc=='P'){
                            static1 = "Present";
                        }else if(val.attendanc=='A'){
                            static1 = "Absent";
                        }
                        else if(val.attendanc=='L'){
                            static1 = "Late";
                        }else if(val.attendanc=='H'){
                            static1 = "Leave";
                        }
                    var showAttendanceAppendTable = '<tr>'+

                        '<td>'+val.name +'</td>'+
                        '<td>'+static1 +'</td>'+

                        '</tr>';
                    $('#show-attendance-table > tbody:last-child').append(showAttendanceAppendTable);

                });


                var behav = '';


                if(data.behavArray.length>0){

                    behav +=`<h6>Behaviour</h6>`;

                    behav +=`<table class="table table-bordered table-hover" id="show-attendance-table">

                            


                            <thead class="text-secondary">
                            <tr><th>Student</th>
                            <th>Behaviour Type</th>
                            <th>Activities</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Comments</th>
                            </tr>
                            </thead>
                            <tbody>`;


                             $.each(data.behavArray, function(key, val) {

                                behav +=`<tr>
                                    <td>`+val.name+`</td>
                                    <td>`+val.behaviour_type+`</td>
                                    <td>`+val.activities+`</td>
                                    <td>`+val.location+`</td>
                                    <td>`+val.status+`</td>
                                     <td>`+val.comments+`</td>
                                    </tr>`;

                             })


                           behav  +=`</tbody>
                        </table>`;



                }

                var achieve='';

                if(data.achievement.length>0){

                    achieve +=`<h6>Achievement</h6>`;

                    achieve +=`<table class="table table-bordered table-hover" id="show-attendance-table">

                            


                            <thead class="text-secondary">
                            <tr><th>Student</th>
                            <th>Achievement Type</th>
                            <th>Activities</th>
                            
                            <th>Comments</th>
                            </tr>
                            </thead>
                            <tbody>`;


                             $.each(data.achievement, function(key, val) {

                                 achieve +=`<tr>
                                    <td>`+val.name+`</td>
                                    <td>`+val.achievement_type+`</td>
                                    <td>`+val.activities+`</td>
                                     
                                    <td>`+val.comments+`</td>
                                    </tr>`;

                             })


                    achieve  +=`</tbody>
                        </table>`;



                }





                $("#bavContainer").html(behav);
                $("#achieveContainer").html(achieve);



            }
        });

    });

    /*
            Delete Register 
    */

     $('.delete-attendence-btn').on('click', function () {

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
                    $.get(base_url + 'teacher/delete-attendance/'+class_delete_id, function (data) {
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



    /*--------------------------------Teacher Student Register Code End----------------------------------------*/
/*   js for teacher timetable pdf starts  */
    $(document).on('click', ".prnt-btn", function() {

        var doc = new jsPDF('l', 'mm', "a0");
        var tbl = $('#print-timetable').clone();
        var res = doc.autoTableHtmlToJson(tbl.get(0));
        doc.autoTable(res.columns, res.data, {
            startY: 40,
            margin: {
                top: 40
            },
            addPageContent: function (data) {
                doc.setFontSize(28);
                doc.setTextColor(0);
                doc.setFontStyle('bold');
                doc.text("Date Sheet " , 500, 30);
            },
            styles: {
                fontSize: 20,
                overflow: 'linebreak',
                columnWidth: 'wrap',
            },
            theme: 'grid'
        });

        doc.save("timetable.pdf");


    });
    /*   js for teacher timetable pdf ends  */


    /*filter teacher diary and study*/
    $(document).on('change','.filter_diary .filter_diary',function (e) {
        var $this = $(this);
        var  filter_diary_class   = $('select#filter_diary_class option:selected').val();
        var  filter_diary_class_section   = $('select#filter_diary_class_section option:selected').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        if($this.attr('id')=='filter_diary_class')
        {
            filter_diary_exam = $this.val();
        }
        else if($this.attr('id')=='filter_diary_class_section')
        {
            filter_diary_class_section = $this.val();
        }

        $.ajax({
            url: base_url +'teacher/diary-study-filter',
            type: "POST",
            datatype:"json",
            data: {  "class": filter_diary_class,
                "class_section": filter_diary_class_section

            },

            success:function(data) {

                $('#diarytable').DataTable().destroy();
                $("#diarytable").html(data);
                var table = $('#diarytable').DataTable();
                table.draw();
            }
        });

    });


    $(document).on('change','.filter_study .filter_study',function (e) {
        var $this = $(this);
        var  filter_study_class   = $('select#filter_study_class option:selected').val();
        var  filter_study_class_section   = $('select#filter_study_class_section option:selected').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });


        $.ajax({
            url: base_url +'teacher/diary-study-filter',
            type: "POST",
            datatype:"json",
            data: {  "study_class": filter_study_class,
                "study_class_section": filter_study_class_section

            },

            success:function(data) {

                $('#materialtable').DataTable().destroy();
                $("#materialtable").html(data);
                var table = $('#materialtable').DataTable();
                table.draw();
            }
        });

    });

    $(document).on("change","#filter_diary_class", function(event){

        event.stopPropagation();
        var $this = $("#filter_diary_class_section");
        var id = $(this).val();

        $.ajax({
            url: base_url +'get_section/'+id,
            type   : 'get',
            data   : {id: id},
            success: function(response){
                $this.empty();
                $("#filter_diary_class_section").empty();
                $this.append('<option value="">Select Section</option>');
                $this.append('<option value="all">All</option>');
                $.each(response , function (key, value) {
                    $this.append('<option value="'+ value.c_section_Id +'">'+value.class_section_name+'</option>');
                });
                $this.selectpicker("refresh");
            }
        });
    });
    $(document).on("change","#filter_study_class", function(event){

        event.stopPropagation();
        var $this = $("#filter_study_class_section");
        var id = $(this).val();

        $.ajax({
            url: base_url +'get_section/'+id,
            type   : 'get',
            data   : {id: id},
            success: function(response){
                $this.empty();
                $("#filter_study_class_section").empty();
                $this.append('<option value="">Select Section</option>');
                $this.append('<option value="all">All</option>');
                $.each(response , function (key, value) {
                    $this.append('<option value="'+ value.c_section_Id +'">'+value.class_section_name+'</option>');
                });
                $this.selectpicker("refresh");
            }
        });
    });
    $(document).on('change','.filter_syllabus .filter_syllabus',function (e) {
        var $this = $(this);
        var  filter_syllabus_exam = $('select#filter_syllabus_exam option:selected').val();
        var  filter_syllabus_class   = $('select#filter_syllabus_class option:selected').val();


        /*if($this.attr('id')=='filter_syllabus_exam')
        {
            filter_syllabus_exam = $this.val();
        }else if($this.attr('id')=='filter_syllabus_class')
        {
            filter_syllabus_class = $this.val();
        }*/

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url +'teacher/get-teacher-exam-by-filter',
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url +'teacher/get-teacher-exam-by-filter',
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
    /*filter teacher diary and study Assesment*/


    /*teacher Salary*/
    $(document).on("click", ".paybillprint", function () {

        var $this =$(this);
        var id   = $this.data('id');
        var transaction   = $this.data('transaction');
        $('#prtpay').modal('show');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + 'teacherpay/bill/print',
            method: 'post',
            dataType : "json",
            data: { 'transaction':transaction },
            success: function (result) {
                //console.log("result>>>>",result.school);
                var i = 0;
                var content = '';

                var month = moment(new Date(result.schedulePay.pay_month)).format("MMM-YYYY");
               //alert(month);

                content += `<div class="modal-content" id="pay-slip">
            <div class="modal-header justify-content-center">
                <div class="pull-right">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-remove"></i> </button>
                    <button type="button" onclick="printDiv('pay-slip')" class="btn btn-sm btn-secondary"><i class="fa fa-print"></i></button>
                </div>
                <div class="col-md-12" style="margin-top: 36px;">
                    <div class="text-center lh-1 mb-2">
                        <h6 class="fw-bold">Payslip</h6> <span class="fw-normal">Payment slip for the month of <span id='date' class="font-weight-bold">${month}</span></span>
                    </div>
                    <div class="d-flex justify-content-end"> Working Campus:<span class="font-weight-bold">${ result.school}</span> </div>
                    <div class="row d-flex justify-content-around">
                        <div class="col-md-10 text-left">
                            <div class="row">
                                <div class="col-md-4">
                                    <p> <span class="font-weight-bold">P.No: </span> ${ result.emp.personal_No}} </p>
                                </div>
                                <div class="col-md-8">`;
                var empNtn;
                if(result.emp.employee_info.emp_NTN != null){   empNtn = result.emp.employee_info.emp_NTN }else empNtn ='N/A';
                content += `
                                    <p> <span class="font-weight-bold">NTN: </span>${empNtn}  </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p> <span class="font-weight-bold">Full Name: </span> ${result.emp.name} </p>
                                </div>
                                <div class="col-md-4">
                                    <p> <span class="font-weight-bold">Designation: </span> ${result.emp.designation} </div>
                                <div class="col-md-4">
                                    <p> <span class="font-weight-bold">F.Designation: </span> ${result.emp.designation} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body row">
                <div class="col-md-6">
                    <table class="mt-4 table empDetail">
                        <thead class="table-secondary">
                            <tr class="myBackground">
                                <th colspan="3"> Payments </th>
                                <th> Amount (in Rs) </th>

                            </tr>
                        </thead>
                        <tbody>`;
                if(result.schedulePay.allowances.length>0){
                    $.each($(result.schedulePay.allowances),function(key,allowance){
                        sumdeductiototal = allowance['amount']!=''? allowance['amount']:0;

                        content += `<tr>
                                        <th colspan="2"> ${allowance['title']}</th>
                                        <td></td>
                                        <td class="myAlign"> ${allowance['amount']} </td>
                                    </tr>`;
                    });
                }

                content += `<tr class="table-secondary myBackground">
                                <th colspan="3"> Total Payments </th>
                                <td class="myAlign"> ₨ ${result.schedulePay.allowancesub}/- </td>

                            </tr>
                            <tr height="40px">
                                <th colspan="2"> PROVIDENT FUND BALANCES AS ON: </th>
                                <td class=""> 05-12/2021  </td>
                                <td class="table-border-right "></td>

                            </tr>
                            <tr>
                                <td colspan="2"> OWN CONTRIBUTION </td>
                                <td></td>
                                <td class="myAlign"> 00.00 </td>
                            </tr>
                            <tr>
                                <td colspan="2"> SCHOOL'S CONTRIBUTION </td>
                                <td></td>
                                <td class="myAlign"> 00.00 </td>
                            </tr>
                            <tr height="40px">
                                <th colspan="2"> Gratuity AS ON: </th>
                                <th> </th>
                                <td class="table-border-right"> </td>
                            </tr>
                            <tr>
                                <td colspan="2"> YTD Balance on </td>
                                <td> 05/12/21 </td>
                                <td class="myAlign"> 27600.00 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="mt-4 table empDetail">
                        <thead class="table-secondary">
                            <tr class="myBackground">
                                <th colspan="3"> Deductions </th>
                                <th> Amount (in &#8360) </th>
                            </tr>
                        </thead>
                        <tbody>`;
                var totalPayment = result.schedulePay.allowancesub;
                var totalDeductions = result.schedulePay.deductionsSub;
                var netSalry = totalPayment - totalDeductions;
                if(result.schedulePay.deductions.length>0){
                    $.each($(result.schedulePay.deductions),function(key,value){
                        sumdeductiototal = value['amount']!=''? value['amount']:0;
                        content += `<tr>
                                        <th colspan="2"> ${value['title']}</th>
                                        <td></td>
                                        <td class="myAlign"> ${value['amount']} </td>
                                    </tr>`;
                    });
                }

                content +=`<tr class="table-secondary myBackground">
                                <th colspan="3"> Total Deductions </th>
                                <td class="myAlign"> ${result.schedulePay.deductionsSub} </td>
                            </tr>
                            <tr height="40px">
                                <th colspan="3" class=" "> Net Salary </th>
                                <td class="myAlign"> ₨ ${netSalry}/- </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">`;

                content += `<table class="empDetail">
                        <tbody class="border-center">
                            <tr CLASS="table-secondary">
                                <th> Attend/ Absence </th>
                                <th> Days in Month </th>
                                <th> Days Paid </th>
                                <th> Days Not Paid </th>
                                <th> Leave Position </th>
                                <th> Privilege Leave </th>
                                <th> Sick Leave </th>
                                <th> Casual Leave </th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Yearly Open Balance</td>
                                <td>0.0</td>
                                <td>0.0</td>
                                <td>0.0</td>
                            </tr>
                            <tr>
                                <th>Current Month</th>
                                <td>31.0</td>
                                <td>31.0</td>
                                <td>31.0</td>
                                <td>Availed</td>
                                <td>0.0</td>
                                <td>0.0</td>
                                <td>0.0</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td>Closing Balance</td>
                                <td>0.0</td>
                                <td>0.0</td>
                                <td>0.0</td>
                            </tr>
                            <tr>
                                <td colspan="4"> &nbsp; </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td>Company Pool Leave Balance</td>
                                <td>1500</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>`;
                $("#pay-bill-cnt").html('');

                $("#pay-bill-cnt").html(content);

            }

        })



    });


});


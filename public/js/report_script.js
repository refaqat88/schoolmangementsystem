    $('#selBtn').on('click', function(){
      $(".appear").removeAttr('hidden');
    });

    $(document).on("change",".cls_id", function(event){

        event.stopPropagation();
        var $this = $("#section_idr");
        $("#student_id").empty();
        var id = $(this).val();

        $.ajax({
            url: base_url +'get_section/'+id,
            type   : 'get',
            data   : {id: id},
            success: function(response){
                
                $this.empty();
                $("#student_id").empty();
                

                $this.append('<option value="">Select Section</option>');
                $.each(response , function (key, value) {
                    $this.append('<option value="'+ value.c_section_Id +'">'+value.class_section_name+'</option>');
                });
                $this.selectpicker("refresh");
            }
        });
    });


    $(document).on("change",".session", function(event){
        event.stopPropagation();
        var $this = $("#exam");
        var id = $(this).val();

        $.ajax({
            url: base_url +'get-exam-by-session/'+id,
            type   : 'get',
            data   : {id: id},
            success: function(response){
                

                $("#exam").html('');
                studentDropdown= '';
                studentDropdown +=`<option value="">Select Exam</option>`;
                if(response.exam){
                    $.each(response.exam , function (key, value) {
                        studentDropdown +=`<option value="${value.exam_Id}">${value.exam_Name}</option>`;
                    });                   
                } 
                $("#exam").html(studentDropdown);
                $("#exam").selectpicker("refresh"); 



                  
                $("#student_id").empty();
                $("#student_id").selectpicker("refresh");  
                $("#section_idr").empty();
                $("#section_idr").selectpicker("refresh");  
                $("#cls_id").empty();
                $("#cls_id").selectpicker("refresh"); 

                   

            }
        });
    });

    /*
     *  Exame 
    */

    $(document).on("change","#exam", function(event){
        event.stopPropagation();
        var $this = $(this);
        var id = $(this).val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url +'get-class-by-exam',
            type   : 'post',
            data   : {id: id},
            success: function(response){
                var examDropdown = '';
                var studentDropdown = '';
                $("#cls_id").empty();
                examDropdown +=`<option value="">Select Class</option>`;
                if(response.class){

                    $.each(response.class , function (key, value) {
                          
                        examDropdown +=`<option value="${value.cls_Id}">${value.class}</option>`;
                    });
                }

                
                $("#cls_id").html(examDropdown);
                $("#cls_id").selectpicker("refresh");                 
                $("#student_id").empty();
                $("#student_id").selectpicker("refresh");     
                $("#section_idr").empty();
                $("#section_idr").selectpicker("refresh");     
            }
        });
    });


    
  




    $(document).on("change", "#section_idr",function() {
        var $this = $("#student_id");
        var id = $(this).val();
        var section_id = $("#section_idr option:selected").val();
        var session = $("#session option:selected").val();

        var class_id = $("#cls_id option:selected").val();
        //alert(class_id); return;
        $.ajaxSetup({
            headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
        });

            //$('#study-student-dropdown-div').css("visibility", "hidden");

            $.ajax({
                url: base_url + 'GetstudentBySession',
                type: 'post',
                data: {
                        'section_id'    :   section_id, 
                        'class_id'      :   class_id,
                        'session'       :   session
                }
                ,success: function (response) {
                    $this.empty();
                    studentDropdown= '';
                    studentDropdown +=`<option value="">Select Student</option>`;
                    if(response.students){
                        $.each(response.students , function (key, value) {
                            studentDropdown +=`<option value="${value.id}">${value.name}</option>`;
                        });                   
                    } 
                    $("#student_id").html(studentDropdown);
                    $("#student_id").selectpicker("refresh"); 

                   /* if (id == 'Whole Class') {*/
                    
                }

              /*  }*/
            });
    });

   $("#FormreportAdmission").submit( function(){
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
       $(".loader").css("display","block")
        var FormreportAdmissiondata =  $('#FormreportAdmission').serialize();        
        $.ajax({
            url: base_url+'report-admission-ajax' ,
            method: 'post',
            data:  FormreportAdmissiondata,
            success: function(result){
                $(".loader").css("display","none")
                $('.add-div-error').text('');
                if (result.errors) {
                  $("#admission_form").html('') 
                  $(".add-div-error").addClass('error');   
                  $.each(result.errors, function(key, value){
                        $('.add-div-error.'+key).text(value);
                        $('.add-div-error .'+key).show();
                    });
               } else {
                    $("#AdmissionPrintButton").show();
                    $(".add-div-error").removeClass('error');   
                    $("#admission_form").html(result);

               }
               
            }
        });
        return false;
   })

   /*
        Examination Reports 
   */
    $("#FormExameReport").submit( function(){
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
       $(".loader").css("display","block");
       
       var Formreportexadata =  $('#FormExameReport').serialize();        
        $.ajax({
            url: base_url+'report-exam-ajax' ,
            method: 'post',
            data:  Formreportexadata,
            success: function(result){
                $(".loader").css("display","none")
                $('.add-div-error').text('');
                if (result.errors) {
                  $("#exame_report_content").html('') 
                  $(".add-div-error").addClass('error');   
                  $.each(result.errors, function(key, value){
                        $('.add-div-error.'+key).text(value);
                        $('.add-div-error .'+key).show();
                    });
               } else { 
                    $(".add-div-error").removeClass('error');   
                    $("#exame_report_content").html(result); 
               }
               
            }
        });
        return false;
   })
    
    /* Examination section */
    $("#selectID").change( function(){
        var admission= $(this).val();
        var $this= $("#selectID option:selected");
        //var $this= $("#report_type option:selected");
        //alert($this);
        //var classs =$this.data('class');

        var admission_number =$this.data('admission_number');
        if(admission_number && admission_number!="undefined"){
            $("#admission_number_hide").removeClass('hide') ;
        }else{
            $("#admission_number_hide").addClass('hide');
        }
        var from_date =$this.data('from_date');
        if(from_date && from_date!="undefined"){
            $("#from_date_hide").removeClass('hide');
        }else{
            $("#from_date_hide").addClass('hide');
        }
        var to_date =$this.data('to_date');
        if(to_date && to_date!="undefined"){
            $("#to_date_hide").removeClass('hide');
        }else{
            $("#to_date_hide").addClass('hide');
        }
     
        if(admission=="admission_form"){
          //$("#admission-hint").show();
        }else if(admission=="admission_record"){
            $("#FormreportAdmission input").val('');

        }

    });
    $("#report_type").change( function(){
        var $this= $("#report_type option:selected");
  /*
        var report_type = $this.val();
        if (report_type == "single_exam_report"){
            $("#generate-btn").removeClass('col-lg-8');
            $("#generate-btn").addClass('col-lg-4');
        }else if(report_type == "student_progress_report"){
            $("#generate-btn").removeClass('col-lg-8');
            $("#generate-btn").removeClass('col-lg-4');
            $("#generate-btn").addClass('col-lg-2');
        }
        else if(report_type == "class_progress_report"){
            $("#generate-btn").removeClass('col-lg-8');
            $("#generate-btn").removeClass('col-lg-4');
            $("#generate-btn").removeClass('col-lg-2');
            $("#generate-btn").addClass('col-lg-2');
        }else if(report_type == "school_progress_report"){
            $("#generate-btn").removeClass('col-lg-8');
            $("#generate-btn").removeClass('col-lg-4');
            $("#generate-btn").removeClass('col-lg-2');
            $("#generate-btn").addClass('col-lg-4');
        }*/
        var classs =$this.data('class');

        if(classs && classs!="undefined"){
          $("#class_hide").removeClass('hide');
        }else{
            $("#class_hide").addClass('hide');
        }
        var section =$this.data('section');

        if(section && section!="undefined"){
          $("#section_hide").removeClass('hide');
        }else{
            $("#section_hide").addClass('hide');
        }
        var exam =$this.data('exam');
        if(exam && exam!="undefined"){
          $("#exam_hide").removeClass('hide');
        }else{
            $("#exam_hide").addClass('hide');
        }
        var session =$this.data('session');
        if(session && session!="undefined"){
          $("#session_hide").removeClass('hide');
        }else{
            $("#session_hide").addClass('hide');
        }
        var student =$this.data('student');
        if(student && student!="undefined"){
          $("#student_hide").removeClass('hide');
        }else{
            $("#student_hide").addClass('hide');
        }

        var admission_number =$this.data('admission_number');
        if(admission_number && admission_number!="undefined"){
          $("#admission_number_hide").removeClass('hide') ;
        }else{
            $("#admission_number_hide").addClass('hide');
        }
        var issue_date =$this.data('issue_date');
        if(issue_date && issue_date!="undefined"){
          $("#issue_date_hide").removeClass('hide');
        }else{
            $("#issue_date_hide").addClass('hide');
        }
    })

    $(document).on('click', ".export", function() {

        generatePDF('admission_form');


    });




    /*var doc = new jsPDF();
    doc.addHTML($('#'+tableid)[0], 15, 15, {
    'background': '#fffff',
    }, function() {
    doc.save(tableid+'.pdf');
    });*/

    function generatePDF(tableId) {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById(tableId);
        // Choose the element and save the PDF for our user.

        html2pdf().set({
            margin: [10, 1, 10, 1],

        }).from(element).save();
    }

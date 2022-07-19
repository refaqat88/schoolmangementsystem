$(document).ready(function () {


    // filter student data by class id 
    
     $(document).on('change','.stdClass',function (e) {
        var classId = $(this).val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        
        if(classId) {
            $.ajax({
                url: base_url +'getstudent-by-filter/'+classId+'?type=1',
                type: "GET",
                success:function(data) {
                    
                    $('#datatable').DataTable().destroy();

                    $("#datatable").html(data); 
                    
                    var table = $('#datatable').DataTable();
                   
                    table.draw();

                    
                }
            });
        }
    });




     //js for student view start 
    
    $(document).on("click", ".viewStudentInfo", function (e) {
        e.stopPropagation();
        var $this = $(this);
        var id = $this.data('id');
        
        $("#admission_form").modal('show');
        $('#viewStudentdata').html('');
                
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + 'view-student-admission/'+id,
            type: 'get',
            success: function (data) {
                 
                $('#viewStudentdata').html(data);
                 

            }
        });


    });


    //js for student view ends

     $(document).on('change','.filter_students .filter_students',function (e) {
        var $this = $(this); 
        var  student_Session = $('select#student_Session option:selected').val();
        var  student_Class   = $('select#student_Class option:selected').val();
        // var student_Shift    = $('select#student_Shift option:selected').val();
        
        if($this.attr('id')=='student_Session')
        {   
            student_Session = $this.val();
        }else if($this.attr('id')=='student_Class')
        {   
            student_Class = $this.val();
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
            url: base_url +'getstudent-by-filter?type=1',
            type: "POST",
            
            data: JSON.stringify({ "student_Session": student_Session, 
            'student_Class' : student_Class,
            'type' : '1'
            }),
            contentType: "application/json; charset=UTF-8",
            success:function(data) {
             
                $('#datatable').DataTable().destroy();
                $("#datatable").html(data); 
                var table = $('#datatable').DataTable();
                table.draw();
            }
        });
        
    });
    // filter student data by class id 

    // filter student data by class id 

    
    /*print-attendance*/
    $(document).on('click', ".print-attendance", function() {
        $('#attendance-table').printThis({

            debug: false,
            footer: $("#attendance-table").clone().children().find('table').css('display','block').get(0),
        });
    });
    /*.print-achievement*/
    $(document).on('click', ".print-achievement", function() {
        $('#achievement-table').printThis({

            debug: false,
            footer: $("#achievement-table").clone().children().find('table').css('display','block'),
        });
    });
    /*print-schedulee*/
    $(document).on('click', ".print-schedulee", function() {

        $('#schedulee-table').printThis({
            debug: false,
            footer: $("#schedulee-table").clone().children().find('table').css('display','block').get(0),
        });
    });

    /*schedule */
    $(document).on('click', ".schedule-pdf", function() {
        var doc = new jsPDF('p', 'pt', 'a4');
        var tbl = $('#schedulee-table').clone();
        var res = doc.autoTableHtmlToJson(tbl.get(0));
        doc.autoTable(res.columns, res.data, {
            startY: 40,
            margin: {
                top: 40,
            },
            addPageContent: function (data) {
                doc.setFontSize(12);
                doc.setTextColor(0);
                doc.setFontStyle('bold');
                doc.text($("#shedule-class").text(), 380, 10,'center');
            },
            styles: {
                fontSize: 10,
                overflow: 'linebreak',
                columnWidth: 'wrap',
            },
            theme: 'grid'
        });

        doc.save("Schedule.pdf");
    });
    /*Attendance */
    $(document).on('click', ".attendance-pdf", function() {
        var doc = new jsPDF('p', 'pt', 'a4');
        var tbl = $('#attendance-table').clone();
        var res = doc.autoTableHtmlToJson(tbl.get(0));
        doc.autoTable(res.columns, res.data, {
            startY: 40,
            margin: {
                top: 40,
            },
            addPageContent: function (data) {
                doc.setFontSize(12);
                doc.setTextColor(0);
                doc.setFontStyle('bold');
                doc.text($("#shedule-class").text(), 250, 10,'center');
                //doc.text("Attendance of " +$("#show-attendance-date").text()+ "Class :" +$("#show-attendance-class").text()+ " Section :" + $("#show-attendance-section").text() , 200, 20);
                //doc.text($("#show-attendance-date").text()+ $("#show-attendance-class").text()+ $("#show-attendance-section").text(), 380, 10);
            },
            styles: {
                fontSize: 10,
                overflow: 'linebreak',
                columnWidth: 'wrap',
            },
            theme: 'grid'
        });

        doc.save("Attendance.pdf");
    });
    $(document).on('click', ".export-attendance-pdf", function() {
        var doc = new jsPDF('p', 'pt', 'a4');
        var tbl = $('#show-attendance-table').clone();
        var res = doc.autoTableHtmlToJson(tbl.get(0));
        doc.autoTable(res.columns, res.data, {
            startY: 40,
            margin: {
                top: 40,
            },
            addPageContent: function (data) {
                doc.setFontSize(12);
                doc.setTextColor(0);
                doc.setFontStyle('bold');
               doc.text("Attendance of Date" +$("#show-attendance-date").text()+ " Class :" +$("#show-attendance-class").text()+ " Section :" + $("#show-attendance-section").text() , 170, 20);

                //doc.text("Attendance of " +$("#show-attendance-date").text()+ "Class :" +$("#show-attendance-class").text()+ " Section :" + $("#show-attendance-section").text() , 200, 20);
                //doc.text($("#show-attendance-date").text()+ $("#show-attendance-class").text()+ $("#show-attendance-section").text(), 380, 10);
            },
            styles: {
                fontSize: 10,
                overflow: 'linebreak',
                columnWidth: 'wrap',
            },
            theme: 'grid'
        });

        doc.save("Attendance.pdf");
    });
    $(document).on('click', ".export-achievement-pdf", function() {

        exportpdf('achievement-content');


    });
    $(document).on('click', ".export-achievement-pdf", function() {

        exportpdf('behaviour-content');


    });
    /*$(document).on('click', ".export-marksheet-pdf", function(e) {
        e.stopPropagation();
        var doc = new jsPDF('l', 'mm', [297, 210]);
        doc.addHTML($('#markssheet_print_div')[0], 5, 5, {
            'background': '#fff',
            'color': 'back',
        }, function() {
            doc.save('markssheet.pdf');
        });


    });*/



    $(document).on("click", ".show_student_marks",function(e) {
        e.preventDefault();
        var $this = $(this);
        var exam_Id = $this.data('exam');
        var sc_sec_id = $this.data('sc_sec_id');
        var id = $this.data('id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var studentmarklist = { id :id , exam_Id:exam_Id,sc_sec_id:sc_sec_id };
        $.ajax({
            url: base_url + 'student/exam/marks',
            method: 'post',
            dataType : "json",
            data: studentmarklist,
            success: function (result) {

                $('#markexam').modal('show');
                $('#markexam #name').text(result.user.name);
                $('#markexam #exam_name').text(result.exam.exam_Name);
                $('#markexam #examFrom').text(result.exam.exam_Start);
                $('#markexam #examTo').text(result.exam.exam_End);
                $('#markexam #class').text(result.class);
                $('#markexam #section').text(result.section);

                var markup = '';

                markup +=`<thead class="table-active">
                            <th class="">S.#</th>
                            <th>Subject</th>`;
                            $.each(result.exam_Module, function(keye, vale) {

                                markup +=`<th>${vale}</th>`;
                            });
                markup +=`<th>Total</th>
                            <th>Obtained</th>
                            <th>%age</th>
                            <th>Comments</th>
                    </thead>`;
                markup +=`<tbody>`;
                  var j=1;
                  var comment = '';
                  var subjectmarks = '';
                $.each(result.datasheet, function(key, val) {




                    var subid = val.sub_Id;


                     if(val.subject_marks!=''){
                        subjectmarks =parseInt(val.subject_marks);
                     }
                     else{
                        subjectmarks = '';
                     }
                    if(result.subjectmark[subid]!=''){
                        comment = result.subjectmark[subid].comment;

                    }else {
                        comment = '';
                    }


                    markup += `<tr>
                                <td>${j++}</td>
                                 <td>
                                    ${val.subject}
                                </td>`;
                                var makss='';
                                var totalObtainMarks=0;
                                $.each(result.datasheet[key]['marks'][subid], function(keyw, valw) {
                                    if(result.datasheet[key]['marks'][subid][valw]!=''){
                                        makss=  valw;

                                        if(valw!='') {
                                            totalObtainMarks += parseInt(makss);
                                        }
                                    }else{
                                        makss=  '';
                                    }
                                    markup +=` <td> <input type="text" class="form-control marks" value="${makss}">
                                                </td>`;

                                });


                     var percentage = Math.round(((totalObtainMarks/subjectmarks) * 100));
                    if(isNaN(percentage)){
                        percentage = '';
                    }
                                
                    markup +=`
                            <td>
                              <input type="text" class="form-control marks"  value="${subjectmarks}" style=""> 
                            </td>
                            <td>
                                <input type="text" class="form-control obtained_marks" value="${new Intl.NumberFormat().format(parseInt(totalObtainMarks))}"> 
                            </td>
                            <td><input type="text" class="form-control marks"  value="${percentage}" style=""></td>                    
                            <td><input type="text" class="form-control comments"  value="${comment}" ></td>

                    </tr>`;

                });
                markup +=`</tbody>`;

                $("#stundet-markssheet").empty();
                $("#stundet-markssheet").html(markup);



            }
        });
    });





    $(document).on('click', ".achievement-pdf", function() {
        var doc = new jsPDF('p', 'pt', 'a4');
        var tbl = $('#achievement-table').clone();
        var res = doc.autoTableHtmlToJson(tbl.get(0));
        doc.autoTable(res.columns, res.data, {
            startY: 40,
            margin: {
                top: 40,
            },
            addPageContent: function (data) {
                doc.setFontSize(12);
                doc.setTextColor(0);
                doc.setFontStyle('bold');
                doc.text($(".shedule-class h4").text(), 250, 20,'center');
                //doc.text("Attendance of Date" +$("#show-achievement-date").text()+ " Class :" +$("#show-achievement-class").text()+ ", Section :" + $("#show-achievement-section").text() , 130, 20);

                //doc.text("Attendance of " +$("#show-attendance-date").text()+ "Class :" +$("#show-attendance-class").text()+ " Section :" + $("#show-attendance-section").text() , 200, 20);
                //doc.text($("#show-attendance-date").text()+ $("#show-attendance-class").text()+ $("#show-attendance-section").text(), 380, 10);
            },
            styles: {
                fontSize: 10,
                overflow: 'linebreak',
                columnWidth: 'wrap',
            },
            theme: 'grid'
        });

        doc.save("achievementlist.pdf");
    });





    $(document).on("click", ".dashboarttabs", function () {

        var $this = $(this);

        var stundet_id =$this.data('id');
        var type =$this.data('type');


        myDivs(stundet_id,type);


    });

    $(document).on('click','.show-diary-btn', function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var diary_id = $(this).data('id');
        var student_id = $(this).data('student');

        $.ajax({
                url: base_url + 'show-student-diary',
                type: 'post',
                data:{id:diary_id,student:student_id},
                success: function (data) {
                    $('#view-diary-modal').modal('show');
                    $('#show-dairy-class').text(data.className);
                    //$('#show-school-section').text(data.tuition_fee);
                    $('#show-dairy-class-section').text(data.classSection);
                    $('#show-dairy-subject').text(data.subjectName);
                    $('#show-dairy-due-date').text(data.due_Date);
                    $('#show-dairy-diary-type').text(data.diaryType);
                    $('#show-dairy-audience').text(data.audience);
                    $('#diary-note').text(data.diary_Note);
                    $("#show-diary-file").attr('href',asset_url + '/upload/diary/'+ data.diary_File);
                    $("#show-diary-file").text(data.diary_File);

                    $("#diary-student-table > tbody").empty();
                    var markup ='';
                    $.each(data.studentInfo, function(key, val) {
                        markup += "<tr><td>" + (key+1) + "</td><td>" + val.name + "</td><td>" + val.status + "</td></tr>";

                    });
                    $("#diary-student-table > tbody").append(markup);
                }
        });

    });
    $(document).on('click','.sign-diary-btn', function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var diary_id = $(this).data('id');
        var student_id = $(this).data('student');
        var status = $(this).data('status');

        $.ajax({
            url: base_url + 'sign-student-diary',
            type: 'post',
            data:{id:diary_id,student:student_id,status:status},
            success: function (data) {
                swal({
                    title: "Updated successfully!",
                    type: "success",
                    showCancelButton: false,
                    showConfirmButton: false,
                    timer: 1000
                });

                myDivs(student_id,'homework');
            }
        });

    });
    $(document).on('click','.view-study-btn', function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var show_study_id = $(this).data('id');
        var student_id = $(this).data('student');

        $.ajax({
            url: base_url + 'show-student-study',
            type: 'post',
            data: {id: show_study_id, student: student_id},
            success: function (data) {
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
            }

        })

    });


    $(document).on("click", ".studentrecord", function (e) {

        e.stopPropagation();
        var $this = $(this);

        var stundet_id =$this.data('id');
        var type =$this.data('type');
        $(".childernnav").hide();
        myDivs(stundet_id,type);

    });


    // Render Dashboard for parents and students portal

    function getParentStundetDashboards() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var id = $("#stundet_id").val();
        var id1 = $("#stundet_id1").val();
        var id2 = $("#stundet_id1").val();


        if (id != '') {

            $.ajax({
                url: base_url + 'home?id=' + id,
                type: 'get',
                success: function (data) {

                }
            });
        }

    }


    $(document).on("click", ".show-attendance-btn",function() {

        var show_attendance_id = $(this).data('id');
        var student_id = $(this).data('student');
        $('#show-attendance-modal').modal('show');
        $.ajax({
            url : base_url +'show-student-attendance/' +show_attendance_id+'/'+student_id,
            type : "GET",
            dataType : "json",
            success:function(data)
            {

                $("#bavContainer").html('');

                $('#show-attendance-date').text(" " + data.date_register);
                $('#show-attendance-class').text(" " + data.class);
                $('#show-attendance-section').text(" " +data.section);
                $('#show-attendance-table > tbody').html('');
                var static;
                $.each(data.attedence, function(key, val) {

                    if(val.attendanc=='P'){
                        static = "Present";
                    }else if(val.attendanc=='A'){
                        static = "Absent";
                    }
                    else if(val.attendanc=='L'){
                        static = "Late";
                    }else if(val.attendanc=='H'){
                        static = "Leave";
                    }
                    var showAttendanceAppendTable = '<tr>'+

                        '<td>'+val.name +'</td>'+
                        '<td>'+static +'</td>'+

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


                if(data.achievement.length>0){

                    behav +=`<h6>Achievement</h6>`;

                    behav +=`<table class="table table-bordered table-hover" id="show-attendance-table">

                            


                            <thead class="text-secondary">
                            <tr><th>Student</th>
                            <th>Achievement Type</th>
                            <th>Activities</th>
                            
                            <th>Comments</th>
                            </tr>
                            </thead>
                            <tbody>`;


                    $.each(data.achievement, function(key, val) {

                        behav +=`<tr>
                                    <td>`+val.name+`</td>
                                    <td>`+val.achievement_type+`</td>
                                    <td>`+val.activities+`</td>
                                     
                                    <td>`+val.comments+`</td>
                                    </tr>`;

                    })


                    behav  +=`</tbody>
                        </table>`;



                }





                $("#bavContainer").html(behav);



            }
        });

    });
    $(document).on("click", ".show-achievement-btn",function() {

        var show_attendance_id = $(this).data('id');
        var name = $(this).data('name');
        var std_Id = $(this).data('std_id');
        var classs = $(this).data('class');
        var sectionss = $(this).data('section');

        $('#show-achievement-modal').modal('show');
        $.ajax({
            url : base_url +'show-student-achievement',
            type : "post",
            data:{ date:show_attendance_id , std_Id:std_Id},
            dataType : "json",
            success:function(data)
            {
                $('#show-achievement-date').text(" " + show_attendance_id);
                $('#show-achievement-class').text(" " + classs);
                $('#show-achievement-section').text(" " +sectionss);
                $('#acvContainer').html('');


                ach = '';
                ach +=`<table class="table table-bordered table-hover" id="show-achievement-table">

                         
                            <thead class="text-secondary">
                            <tr><th>Student</th>
                            <th>Achievement Type</th>
                            <th>Activities</th>
                            
                            <th>Comments</th>
                            </tr>
                            </thead>
                            <tbody>`;


                ach +=`<tr>
                                    <td>`+name+`</td>
                                    <td>`+data.achievement_type+`</td>
                                    <td>`+data.activities+`</td>
                                     
                                    <td>`+data.comments+`</td>
                                    </tr>`;


                ach  +=`</tbody>
                        </table>`;




                $("#acvContainer").html(ach);



            }
        });

    });


    $(document).on("click", ".show-behr-btn",function() {

        var show_attendance_id = $(this).data('id');
        var name = $(this).data('name');
        var std_Id = $(this).data('std_id');
        var classs = $(this).data('class');
        var sectionss = $(this).data('section');

        $('#show-behe-modal').modal('show');
        $.ajax({
            url : base_url +'show-student-behaviour',
            type : "post",
            data:{ date:show_attendance_id , std_Id:std_Id},
            dataType : "json",
            success:function(data)
            {
                $('#show-behe-date').text(" " + show_attendance_id);
                $('#show-behe-class').text(" " + classs);
                $('#show-behe-section').text(" " +sectionss);
                $('#behContainer').html('');


                bbehe = '';
                bbehe +=`<table class="table table-bordered table-hover" id="show-behe-table">

                         
                            <thead class="text-secondary">
                            <tr><th>Student</th>
                            <th>Behaviour Type</th>
                            <th>Activities</th>
                            <th>location</th>
                            <th>status</th>
                            
                            <th>Comments</th>
                            </tr>
                            </thead>
                            <tbody>`;


                bbehe +=`<tr>
                                    <td>`+name+`</td>
                                    <td>`+data.behaviour_type+`</td>
                                    <td>`+data.activities+`</td>
                                    <td>`+data.location+`</td>
                                    <td>`+data.status+`</td>
                                     
                                    <td>`+data.comments+`</td>
                                    </tr>`;


                bbehe  +=`</tbody>
                        </table>`;




                $("#behContainer").html(bbehe);



            }
        });

    });


});



function exportpdf(tableid) {
    var doc = new jsPDF();
    doc.addHTML($('#'+tableid)[0], 15, 15, {
        'background': '#fff',
    }, function() {
        doc.save(tableid+'.pdf');
    });

}


function  myDivs(student,type){

    $("#s").css("display","block");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: base_url + 'students/dashboard',
        type: 'post',
        data: {tabsType: type, stundet_id: student},
        success:function(data)
        {
            $("#myDiv").html('');
            $("#s").css("display","none");
            $("#myDiv").html(data);
            // Chart for student examination result
            var options = {
                series: [{
                    name: 'First Term',
                    data: [44, 55, 41, 67, 22, 43, 21]
                }, {
                    name: 'Mid Term',
                    data: [13, 23, 20, 8, 13, 27, 33]
                }, {
                    name: 'Final Term',
                    data: [11, 17, 15, 15, 21, 14, 15]
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    stacked: false,
                    options :{
                        Selection: false
                    },

                },
                dataLabels: {
                    enabled: false
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        legend: {
                            position: 'bottom',
                            offsetX: -10,
                            offsetY: 0
                        }
                    }
                }],
                xaxis: {
                    categories: ['English', 'Maths', 'Physics', 'Chemistry','Islmiat','Pak Study','Urdu'
                    ],
                },
                fill: {
                    opacity: 1
                },
                legend: {
                    position: 'right',
                    offsetX: 0,
                    offsetY: 50
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart-123"), options);
            chart.render();

            //   student attendance

            var std_atteendance = document.getElementById('std-attendance').getAttribute('data-id').split(',');
            console.log('fakhar ghwal',std_atteendance);
            var std_att_series = [];
            var std_att_color = [];
            var labels = [];

            std_att_series.push(parseInt(std_atteendance[0]));
            std_att_series.push(parseInt(std_atteendance[1]));
            std_att_series.push(parseInt(std_atteendance[2]));
            std_att_series.push(parseInt(std_atteendance[3]));

            var arr = std_att_series.filter(function(n) {return n;});
            if(arr.length>0) {
                labels = ['P','A', 'LT', 'LV'];
                std_att_color = ['#00e396', '#ff4560', '#feb019', '#008ffb'];
            }
            else {
                labels = ['No Attendence Marked'];
                std_att_series = [100];
                std_att_color = ['#546E7A'];
            };
            var std_att_percentage = {
                series: std_att_series,
                chart: {
                    type: 'donut',
                    width: '250',
                    height: '235'
                },
                labels: labels,
                responsive: [{
                    breakpoint: 280,

                }],
                colors: std_att_color,
                legend: {
                    position: 'bottom'
                }
            };
            var chart = new ApexCharts(document.querySelector("#std-attendance"), std_att_percentage);
            chart.render();

        }
    });





}


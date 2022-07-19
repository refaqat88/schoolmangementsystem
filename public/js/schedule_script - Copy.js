$(document).ready(function(e){
    $('#success-alert').html('');
     
     
     $('#show-Class-Sched-modal-btn').click(function(e){
       
        $('#newclassSchedule').modal('show');
        e.preventDefault();
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




$(document).on('change','#section_id', function(event){
 

    var section_id = $(this).val();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var classs = $('select#cls_id option:selected').val();


    $.ajax({
        url: base_url+'schedule/list',
        method: 'post',
        dataType: "json",
        data: {
            section: section_id,
            class:classs,
        },

        success: function (data) {
            console.log('data.schedule>>>>>>>>>>>'); 
            $("#modalrow").html('');
        var schdulePeriod = '';
        var i = 1;

         
       

        var dayslist = '';

        $.each(data.days , function (key, value) {
            dayslist +=`  <th class="text-center table-dark">`+value.name+`</th>`;
        });

        var teachers = '';

        $.each(data.teachers , function (key, value) {
        
              teachers +=`<option value="`+value.id+`">`+value.name+`</option>`;
        
        });
        

        
        var subjectListhidden = '';

        $.each(data.subjects , function (key, value) {

            subjectListhidden +=`<input id="subject_`+value.subject_id+`" value="`+value.lecture_per_week+`" type="hidden" />`;
 
            subjectListhidden +=`<input id="subject_current`+value.subject_id+`" class="current_value" value="0" type="hidden"  />`;
 

        });

        $.each(data.periods , function (key, value) {
            var selectedP = value.id;
        schdulePeriod +=`<tr   >
        
        <td class="table-light">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <h6>`+i+`</h6>
                    </div>

            </div>
        </td>`;

        $.each(data.days , function (key2, value2) {
                 var selectedd= value2.id;
            schdulePeriod +=`<td class="table-light" id="period_container`+value.id+`_`+value2.id+`">
            
            <div class="row">
                <div class="col-xl-12 ">
                    <label> Starts</label>
                    <input type="time" class="form-control " readonly id="school-name" value="`+value.start_time+`" name="time_start[`+value.id+`][`+value2.id+`]" placeholder="Start time">

                     </div>
                <div class="col-md-12">
                    <label> Ends</label>
                    <input type="time" readonly  class="form-control " id="school-name" value="`+value.end_time+`" name="time_end[`+value.id+`][`+value2.id+`]" placeholder="End time">
                    
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 mt-3 ">
                    <select class="subject"  name="subject_id[`+value.id+`][`+value2.id+`]"  id ="subject"  data-size="5" data-style="btn btn-secondary" title="Select Subject">
                     <option value=""  selected>Subject</option>`;

                     /*
            Subject List
        */
        var subjectList = '';
        
         
     
                

        $.each(data.subjects , function (keysubject, valuesubject) {       

            if (data.list.length != 0) {
                
                var selected  = "";


                if(data.list[value.id][value2.id]['subject_id']==valuesubject.subject_id){

                    var selected = "selected";

                }
                
                 


               


            }  
            schdulePeriod +=`<option `+selected+`  value="`+valuesubject.subject_id+`"  data-id="`+valuesubject.teacher_id+`"   data-name="`+valuesubject.teacher.name+`">`+valuesubject.subject_name+`</option>`;
        });
        
        
           if (data.list.length != 0) {

                    var teachervee =data.list[value.id][value2.id]['emp_Id'];

                    var teacherveename =data.list[value.id][value2.id]['teacher'];


           }else{

                    var teachervee ='';

                    var teacherveename ='';


           }

         
        
        schdulePeriod +=`</select>
                </div>
                <div class="col-md-12 mt-3 ">
                  <input  class ="teachersname" value="`+teacherveename+`" type="text"/>
                  <input  class="teachers" value="`+teachervee+`" name="emp_Id[`+value.id+`][`+value2.id+`]"  type="hidden"/>
                       
                    </select>
                 </div>
            <div class="row">

            </div>

        </td>`;

         });



    schdulePeriod +=`</tr>`;
        i++;
        }); 


           $("#modalrow").html(`<div class="card-body ">
        <div class="">`+subjectListhidden+`
                <input type="hidden" name="class" value="`+data.class+`">
            <input type="hidden" name="section"  value="`+data.section+`">
            <div style="overflow:auto;">
            <table cellpadding="0" cellspacing="0" class=" table table-bordered table-striped">
            <tbody>
        <tr>

            <th class="text-center table-dark">Period</th>
            `+dayslist+`
        </tr>
         `+schdulePeriod+`
         </tbody>
            </table>
        </div>

            
    </div>

 
     
    </div>`);

        }    
    });
});

 


  


/*
    Subject Change

*/
$(document).on("change",".subject", function(event)
{
 
    
    var $this = $(this);
    var id=$this.find(':selected').attr('data-id');
    var name=$this.find(':selected').attr('data-name');

    var value=$this.find(':selected').val();
    //var name=$this.find(':selected').text();

    var subjectcounter = $("#subject_"+value).val();
    

    $('.current_value').val(0)

    var flag =false;

    $(".subject").each(function (index,item) {
        
        var subject = $(item).children("option:selected").val();


        var subject_current = $("#subject_current"+subject).val();
        
        var subject_current = parseInt(subject_current);
         
         
        var subjectcounter = $("#subject_"+subject).val();

        var subjectcounter = parseInt(subjectcounter);
 
        
        if(subject_current<subjectcounter){

              
            $("#subject_current"+subject).val(subject_current+1);

        }else if(subjectcounter<=subject_current){

             flag =true;
 //           $(item).removeAttr('selected');

           alert('Per Week Class Increase');
        



        }

    });
   
        


       if (flag == false) {


            var td = $this.parent().parent().parent().attr('id');
        
             $("#"+td+" .teachers").val(id);

            var subjectcont = $this.find(':selected').val();
            
            $("#"+td+" .teachersname").val(name);


        }else{


            var td = $this.parent().parent().parent().attr('id');

             $("#"+td+" .teachers").val('');

             $("#"+td+" .teachersname").val('');
             
             $("#"+td+" .subject").val($("#"+td+" .subject option:first").val())

        }
    

    

  

});


/*
    Add Schedle

*/
 $(document).on("click","#add-class-schedule", function(event){
        event.preventDefault(); 
         
       
         //alert('add-class-schedule-form');
        var oForm = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var classScheduleData = $("#add-class-schedule-form").serialize();
        
        $.ajax({
            url: base_url + 'schedule/list/ajax',
            method: 'post',
            data:  classScheduleData,
            success: function(result){

                swal({
                        title: "Schedule Added!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                });

                setTimeout(function(){ location.reload();}, 2000);

            }
        });
    });



/*View Schudle*/
$('.show-view-class_sched-btn').on('click', function () {
    var ttable_Id = $(this).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: base_url+'schedule/show/ajax',
        method: 'post',
        dataType: "json",
        data: {
            ttable_Id: ttable_Id,
         
        },

        success: function (data) {

            $(".class_name").text(data.class);
            $(".section_name").text(data.section);


            var dayslist = '';

            $.each(data.days , function (key, value) {

                dayslist +=`  <th class="text-center table-dark">`+value.name+`</th>`;
            
            });

            schdulePeriod = "";
            var i = 1;
            $.each(data.periods , function (key, value) {
 
                
                schdulePeriod +=`<tr   >
                

                <td class="table-light">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <h6>`+i+`</h6>
                            </div>

                    </div>
                </td>`;

                 $.each(data.days , function (key2, value2) {


                   if (data.list.length != 0) {

                            var teacherveename =data.list[value.id][value2.id]['teacher']?data.list[value.id][value2.id]['teacher']:'N/A';
                             

                             var subjectname =data.list[value.id][value2.id]['subjects']?data.list[value.id][value2.id]['subjects']:'N/A';
                   }else{

                            var subjectname =' ';
                            var teacherveename = "";
                   }



                    schdulePeriod +=`
                        <td class="table-light" id="">
            
                            <div class="row">
                                <div class="col-xl-12 ">
                                    <label> Starts</label>
                                    <input type="time" class="form-control " readonly id="school-name" value="`+value.start_time+`" name="time_start[`+value.id+`][`+value2.id+`]" placeholder="Start time">

                                </div>

                                <div class="col-md-12">
                                    <label> Ends</label>
                                    <input type="time" readonly  class="form-control " id="school-name" value="`+value.end_time+`" name="time_end[`+value.id+`][`+value2.id+`]" placeholder="End time">
                    
                                </div>
                                <div class="col-md-12">
                                    <label> Subject</label>
                                    <input   readonly   class="form-control "  value="`+subjectname+`" >
                    
                                </div>
                                <div class="col-md-12">
                                    <label> Teacher</label>
                                     <input class="form-control " readonly value="`+teacherveename+`" />
                                </div>
                            </div>
                        </td>`;

                  })  

                schdulePeriod +=`</tr>`;

                i++;
            });



             $("#modalrows").html(`
        <div class=""> 
                
            <div style="overflow:auto;">
            <table cellpadding="0" cellspacing="0" class=" table table-bordered table-striped">
            <tbody>
        <tr>

            <th class="text-center table-dark">Period</th>
            `+dayslist+`
        </tr>
        `+schdulePeriod+`
         
         </tbody>
            </table>
        </div>

             

 
     
    </div>`);


        }
    });
});   
             
           
         

/*

Edit Schdule

*/

$(document).on('click','.editClassSched', function(event){
    var $this = $(this);
    var classid =$this.data('class');
    var sectionsa =$this.data('section');
    
    $("#cls_id").val(classid).attr("selected","Selected").selectpicker('refresh')
    $("#cls_id").trigger('change')

    $("#section_id").val(sectionsa).attr("selected","Selected").selectpicker('refresh')
    $("#section_id").trigger('change')
     
    //  $.ajax({
    //    url: base_url +'get_section/'+classid,    
    //     type   : 'get',
    //     data   : {id: classid},
    //     success: function(response){
    //         $this.empty(); 
    //         $("#section_id option").remove();
    //         var sections='';
    //         sections +='<option value="">Select Section</option>';
    //         $.each(response , function (key, value) {
    //             var selected = "";
    //             if(value.c_section_Id==sectionsa){
    //                 selected = "selected";
    //             }

    //             sections +='<option '+selected+' value="'+ value.c_section_Id +'">'+value.class_section_name+'</option>';
    //         });
            
    //         $("#section_id").append(sections);
    //         $("#section_id").selectpicker("refresh");



    //     }
    // });
 

    $('#newclassSchedule').modal('show');

      





})

/* Sedule delete*/

$(document).on('click','.deleteClassSched', function(event){
 

        var sheudle_id = $(this).data('id');
        
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
                    $.get('schedule/delete/'+sheudle_id, function (data) {
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

/*
    Get Section By Class
*/
$(document).on("change",".cls_id", function(event){
        
    event.stopPropagation();
    var $this = $("#section_id");
    var id = $(this).val();
   
    $.ajax({
        url: base_url +'get_section/'+id,    
        type   : 'get',
        async: false,
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
   
 

window.setTimeout(function () {
    $("#success-alert").alert('close');
}, 2000);

 
 
 

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

});
    
 
  
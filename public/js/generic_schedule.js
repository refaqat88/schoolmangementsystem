// Wait for the DOM to be ready
$(document).ready(function(e){
     $('#success-alert').html('');
     

     $('#show-class-section-btn').click(function(e){
        $('#class-section-modal').modal('show');
        e.preventDefault();
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



    

    $(document).on("submit","#saveFormgeneraic",function() {

        
        event.preventDefault(); 
         
       
          
        var oForm = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var classScheduleData = $("#saveFormgeneraic").serialize();
        
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

        

    })



    $('body').on('click', '#generate_geneti', function () {
      
        var cls_id  = $("#cls_id option:selected").val();
        var section_id  = $("#section_id option:selected").val();
        var shedule = '';
        var weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        lunch = "LUNCH";

       
        $.ajax({
            url: "generic_ajax/"+cls_id+"/"+section_id,
            
            
            success: function(data){

                //console.log('dataaaaaaaaaaaaaa',data);

                // shedule +="<table border='1' class='table'>";
                // shedule +="<tr class='danger text-center'>";
                // shedule += "<th class='text-center'>Days/Lecture</th>";
                // shedule +="<th class='text-center'>Lecture 1<br>09:00-10:00</th>";
                // shedule +="<th class='text-center'>Lecture 2<br>10:00-11:00</th>";
                // shedule +="<th class='text-center'>Lecture 3<br>11:00-12:00</th>";
                // shedule +="<th class='text-center'>Lecture 4<br>12:00-01:00</th>";
                // shedule +="<th class='text-center'>Break</th>";
                // shedule +="<th class='text-center'>Lecture 5<br>02:30-03:30</th>";
                // shedule +="<th class='text-center'>Lecture 6<br>03:30-04:30</th>";

                // for(i = 0; i < 5; i++){
                    
                //     shedule +="<tr>";
                //     shedule += "<th center class='danger text-center'>"+weekDays[i]+"</th>";
                                  
                //     for(j = 0; j < 6; j++){

                             
                //         if(data[i][j]['type'] === 'Lab')
                //         {
                //           //shedule +="<th class=' text-center' colspan=2>Physic</th>";
                //           shedule +="<th class=' text-center' colspan=2>"+data[i][j]['subject_name']+"</th>";
                //          j++;
                //         }
                //         else{
                //           //shedule +="<th class=' text-center'>Puysic</th>";
                //           shedule +="<th class=' text-center'>"+data[i][j]['subject_name']+"</th>";
                //         }

                //          if(j === 3){
                //            shedule +="<th class=' text-center'><b style='text-sze=24'>"+lunch[i]+"</b></th>";
                //         }


                //     }
                //     shedule +="</tr>";
                // }

                // shedule +="</table>";

                $("#schdule_container").html(data);



            }


             
        })
       
    

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

    /*
        Income Report 
   */

    $("#report_type").on('change', function () {
            let selection = $("#report_type").find('option:selected').val();
            $(".enterInput").addClass('d-none');
            $("." + selection).removeClass('d-none');
        });


    $("#FeeReportForm").submit( function(){
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $(".loader").css("display","block")
        $("#FeeReportContent").html('')
        $(".errorsss").hide();


        var FeeReportForm =  $('#FeeReportForm').serialize();        
        $.ajax({
            url: base_url+'fee-reports-ajax' ,
            method: 'post',
            data:  FeeReportForm,
            success: function(result){
                $(".loader").css("display","none")
                if (result.errors) {
                    $('.add-div-error').text('');   
                    $.each(result.errors, function(key, value){

                        $('.add-div-error.'+key).text(value);
                        $('.add-div-error.'+key).show();
                    });

                } else {

                    $("#FeeReportContent").html(result); 
               } 
               
            }
        });
        return false;
   })
    
    /*
        Income Report 
   */

    $("#IncomeReportForm").submit( function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $(".loader").css("display","block")
        $("#incomeReportContent").html('')
        $(".errorsss").hide();

        
        var IncomeReportForm =  $('#IncomeReportForm').serialize();        
        $.ajax({
            url: base_url+'account-reports' ,
            method: 'post',
            data:  IncomeReportForm,
            success: function(result){
                $(".loader").css("display","none")
                if (result.errors) {
                    $('.add-div-error').text('');s
                    $.each(result.errors, function(key, value){
                        $('.add-div-error.'+key).text(value);
                        $('.add-div-error.'+key).show();
                    });

                } else {

                    $("#incomeReportContent").html(result); 
               } 
               
            }
        });
        return false;
   })
    
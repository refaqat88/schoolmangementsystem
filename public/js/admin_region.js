$(document).ready(function () {

    $('select[name="nationality"]').on('change',function(){
        var countryID = $(this).val();
        if(countryID)
        {
            $.ajaxSetup({
                headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
            });
            $.ajax({
                url : admin +'/getstates/' +countryID,
                type : "GET",
                dataType : "json",
                success:function(data)
                {
                    console.log(data);
                    $('select[name="state"]').empty();
                    $('select[name="state"]').append('<option selected="selected" value="">Select State</option>');
                    $.each(data, function(key,value){
                        $('select[name="state"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });
        }
        else
        {
            //$('select[name="state"]').empty();
            $('select[name="state"]').append('<option selected="selected" value="">No record found</option>');
        }
    });

    /*editDropdown();

    function editDropdown() {
        $('#edit-nationality').on('ready load change',function(){
            var countryID = $(this).val();
            if(countryID)
            {
                $.ajaxSetup({
                    headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}
                });
                $.ajax({
                    url : admin +'/getstates/' +countryID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        console.log(data);
                        $('#edit-state').empty();
                        $.each(data, function(key,value){
                            $('#edit-state').append('<option selected="selected" value="">Select State</option>');
                            $('#edit-state').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }
            else
            {

                $('#edit-state').empty();
                $('#edit-state').append('<option selected="selected" value="">No record found</option>');
            }
        });
    }*/
});

// Wait for the DOM to be ready
$(document).ready(function(){
    $(document).on("click", "#show-general-entity-modal-btn", function (e) {
        e.preventDefault();
        $('#add-general-entity-modal').modal('show');
    });

    $(document).on("click", "#add-general-entity-save-btn", function (e) {

        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var rackData =  $('#add-general-entity-form').serialize();
        $.ajax({
            url: base_url + 'add-library-general-entity',
            method: 'post',
            data:  rackData,
            success: function(result){
                console.log(result);
                if(result.errors)
                {
                    //$('#add-alert-danger').html('');
                    $('.add-div-error').text('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        $('#add-general-entity-modal').modal('show');
                        $('.add-div-error.'+key).text(value);

                        $('.add-div-error .'+key).show();

                    });
                }
                else
                {

                    $('.add-div-error').hide();

                     $('#add-general-entity-modal').modal('hide');

                    swal({
                        title: "Added successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    location.reload();


                }
            }});
    });

    $(document).on("click", "#update-general-entity-btn", function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var edit_eneral_entity_data =  $('#edit-general-entity-form').serialize();
        $.ajax({
            url: base_url + "update-library-general-entity",
            method: 'post',
            data:  edit_eneral_entity_data,
            success: function(result){
                console.log(result);
                //alert(response.message);
                $('.edit-div-error').text('');
                if(result.errors)
                {

                    $.each(result.errors, function(key, value){
                        $('#edit-shelf-modal').modal('show');
                        $('.edit-div-error.'+key).text(value);

                        $('.edit-div-error .'+key).show();

                    });
                }
                else
                {
                     $('.edit-div-error').hide();
                    //
                     $('#edit-shelf-modal').modal('hide');

                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    location.reload();

                }
            }});
    });


    $('.conf_msg').on('click', function () {

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
});


$(document).on("click", ".edit-general-entity-btn", function () {

        var edit_general_entity_id = $(this).data('id');
        $.get('edit-library-general-entity/'+edit_general_entity_id, function (data) {


            $('#edit-general-entity-form').attr('action', base_url +'update-library-general-entity');
            $('#edit-general-entity-modal').modal('show');
            $('#edit-general-entity-id').val(data.gent_Code);
            $('#edit-entity-name').val(data.gent_Name);
            $('#edit-single-price').val(data.gent_single_Price);
            $('#edit-quantity').val(data.gent_Quantity);
            $('#edit-discount').val(data.gent_Discount);
            $('#edit-total-price').val(data.gent_tot_Price);
            $('#edit-supplier').val(data.supp_Id).trigger('change');
        })
    });

    $(document).on("change keyup blur", "#edit-single-price, #edit-discount, #edit-quantity",  function() {
        var main = $('#edit-single-price').val();
        var disc = $('#edit-discount').val();
        //var dec = (disc / 100).toFixed(2); //its convert 10 into 0.10
       // var mult = main * dec; // gives the value for subtract from main value
        var quantity = $('#edit-quantity').val();
            quantity=  (quantity > 1)?quantity:1;
        var discont = (main * quantity) - (disc *quantity);
        $('#edit-total-price').val(discont).toFixed(2);
    });

    $(document).on("change keyup blur", "#add-single-price, #add-discount, #add-quantity",  function() {
        var main = $('#add-single-price').val();
        var disc = $('#add-discount').val();
        //var dec = (disc / 100).toFixed(2); //its convert 10 into 0.10
       // var mult = main * dec; // gives the value for subtract from main value
        var quantity = $('#add-quantity').val();
        quantity =  (quantity > 1)?quantity:1;
        var discont = (main * quantity) - (disc *quantity);
        $('#add-total-price').val(discont).toFixed(2);
    });


$(document).on("click", ".delete-general-entity-btn", function () {

    var general_entity_delete_id = $(this).data('id');
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
                $.get('delete-library-general-entity/'+general_entity_delete_id, function (data) {
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
});

$(document).on("click", ".show-general-entity-btn", function () {

    var show_general_entity_id = $(this).data('id');

    $.get('show-library-general-entity/'+show_general_entity_id, function (data) {
        console.log(data);

        $('#show-general-entity-modal').modal('show');
        $('#show-entity-name').text(data.gent_Name);
        $('#show-single-price').text(data.gent_single_Price);
        $('#show-quantity').text(data.gent_Quantity);
        $('#show-discount').text(data.gent_Discount);
        $('#show-total-price').text(data.gent_tot_Price);
        $('#show-supplier').text(data.supp_Name);

    })

});


function myFunction() {

    $(".close").attr('disabled' , true);
    $(".add-btn").attr('disabled' , true);
    $(".update-btn").attr('disabled' , true);
};


// Wait for the DOM to be ready
$(document).ready(function(e) {


    /*disable input field of disability*/

    $("select.disability-dropdown").change(function() {
        if ($(this).val() == 3) {
            $("#disability-input").attr("disabled", "disabled");
        } else {
            $("#disability-input").removeAttr("disabled");
        }
    }).trigger("change");

    $("select.mother_working_status").change(function() {
        if ($(this).val() == 'House Wife') {
            $("div.Working-div").hide();
        } else {
            $("div.Working-div").show();
        }
    });

    $(document).on("change", "#previous_shcool_check",function() {
        var ischecked= $(this).is(':checked');
        if(ischecked){
            $('.previous-school-disabled').prop('disabled', true);
            $('.previous-school-disabled').prop('disabled', true);
            $('input.previous-school-disabled').val('');
            $('textarea.previous-school-disabled').val('');
            $('select.previous-school-disabled').val('disabled', true);
            $('select.previous-school-disabled').prop("selected", "").selectpicker("refresh");

        }else{
            $('.previous-school-disabled').prop('disabled', false);
            $('select.previous-school-disabled').val('disabled', false);
            $('select.previous-school-disabled').prop("selected", "").selectpicker("refresh");
        }

    });





    $(document).on("submit","#Withdrawal",function(e) {

        
        e.preventDefault();
         
       
          
        var oForm = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var classScheduleData = $("#Withdrawal").serialize();
        
        $.ajax({
            url: base_url + 'withdrawl-student',
            method: 'post',
            data:  classScheduleData,
            success: function(result){
                 $('.add-div-error').text('');
                if (result.errors) {
                   
                  $(".add-div-error").addClass('error');   
                  $.each(result.errors, function(key, value){
                        $('.add-div-error.'+key).text(value);
                        $('.add-div-error .'+key).show();
                    });
               }else{

                swal({
                        title: result.message,
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                });

                setTimeout(function(){ window.location.replace(base_url+'students')}, 2000);
                }

            }
        });

        return false;

    })



    /*parent district and city*/

    /*for city ajax on district*/
    $('select[name="pnt_District"]').on('change', function() {
        var districtID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'get-student-city-by-district/' + districtID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                $('select[name="pnt_City"]').html('');
                if (data != "") {
                    $.each(data, function(key, value) {

                        $('select[name="pnt_City"]').append('<option value="' + key + '">' + value + '</option>');
                        $('select[name="pnt_City"]').selectpicker("refresh");
                    });
                } else {
                    $('select[name="pnt_City"]').append('<option value=""></option>');
                    $('select[name="pnt_City"]').selectpicker("refresh");
                }
            }
        });
    });

    /*for zipcode ajax on city*/

    $('select[name="pnt_City"]').on('change', function() {
        var cityID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });
        $.ajax({
            url: base_url + 'getzipcode/' + cityID,
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log(data.zip_code);
                $('[name="zip_No"]').val('');
                if (data != "") {
                    $('[name="zip_No"]').val(data);
                } else {
                    $('select[name="zip_No"]').val('');
                }
            }
        });
    });
    /*for zipcode ajax on city*/

    $('select[name="nation_Id"]').on('change', function() {
        var NationID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'get-nationality-district/' + NationID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                console.log(data)
                $('select[name="dom_Id"]').html('');
                if (data != "") {
                    $.each(data, function(key, value) {


                        $('select[name="dom_Id"]').append('<option value="' + key + '">' + value + '</option>');
                        $('select[name="dom_Id"]').selectpicker("refresh");
                    });
                } else {
                    $('select[name="dom_Id"]').append('<option value=""></option>');
                    $('select[name="dom_Id"]').selectpicker("refresh");
                }
            }
        });
    });



    /*    $('#success-alert').html('');
            $('.admission-btn-save-exit-submit').click(function(e){
                // alert('hello');

        });*/

    $("#std-date-of-birth").blur(function() {

        calculateAge();
    });

    $("#std-date-of-birth").keyup(function() {

        calculateAge();

    });

    function calculateAge() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var today = new Date();
        var birthDate = new Date($('#std-date-of-birth').val());
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return $('#std-age').val(age);

    }
    /*add gardian */
    $('#success-alert').html('');
    $('#show-guardian-modal-btn').click(function(e) {
        $('#add-guardian-modal')
            .find("input,textarea,select,file")
            .val('')
            .end()
            .find("select")
            .prop("selected", "").selectpicker("refresh")
            .end();
        $('#add-guardian-modal').modal('show');
        e.preventDefault();
    });


    // $(document).on('change', '#student-b-form', function (e) {
    //
    //     $("#student-b-form").keyup(function(){
    //
    //         var username = $(this).val().trim();
    //
    //         if(username != ''){
    //
    //             $.ajaxSetup({
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //                 }
    //             });
    //
    //             $.ajax({
    //                 url: base_url+'student-username-availability',
    //                 type: 'post',
    //                 data: {username: username},
    //                 success: function(response){
    //
    //                     $('#uname_response').html(response);
    //
    //                 }
    //             });
    //         }else{
    //             $("#uname_response").html("");
    //         }
    //
    //     });
    // });

    /*add father guardian form validation*/
    // $("#admission-form").validate({
    //
    //     rules:
    //         {
    //             guardian_image: {
    //                 required: true
    //             },
    //             guardian_first_name: {
    //                 required: true
    //             },
    //             /* regno: {
    //                  required: true
    //              },*/
    //             guardian_last_name: {
    //                 required: true
    //             },
    //
    //             guardian_gender: {
    //                 required: true
    //             },
    //             guardian_cnic: {
    //                 required: true
    //             },
    //             guardian_relation: {
    //                 required: true
    //             },
    //
    //             guardian_occupation: {
    //                 required: true
    //             },
    //             guardian_designation: {
    //                 required: true
    //             },
    //             guardian_employer: {
    //                 required: true
    //             },
    //
    //         },
    //     messages:
    //         {
    //             guardian_image: {
    //                 required: "Please upload a mother photo"
    //             },
    //             guardian_first_name: {
    //                 required: "Please enter guardian first name"
    //             },
    //             /* regno: {
    //                  required: true
    //              },*/
    //             guardian_last_name: {
    //                 required: "Please enter guardian last name"
    //             },
    //
    //             guardian_gender: {
    //                 required: "Please select a gender"
    //             },
    //             guardian_cnic: {
    //                 required: "Please enter cnic number"
    //             },
    //             guardian_relation: {
    //                 required: "Please select a relation"
    //             },
    //
    //             guardian_occupation: {
    //                 required: "Please select a occupation"
    //             },
    //             guardian_designation: {
    //                 required: "Please select a designation"
    //             },
    //             guardian_employer: {
    //                 required: "Please enter employer"
    //             },
    //         },
    //     submitHandler: function (form) {
    //         form.submit();
    //     }
    // });
    /*add mother guardian form validation*/
    /*    $("#admission-form").validate({

            rules:
                {
                    mother_image: {
                        required: true
                    },
                    mother_first_name: {
                        required: true
                    },
                    /!* regno: {
                         required: true
                     },*!/
                    mother_last_name: {
                        required: true
                    },

                    mother_cnic: {
                        required: true
                    },
                    mother_gender: {
                        required: true
                    },
                    mother_marital_status: {
                        required: true
                    },

                    mother_working_status: {
                        required: true
                    },
                    mother_relation: {
                        required: true
                    },
                    mother_occupation: {
                        required: true
                    },
                    mother_designation: {
                        required: true
                    },
                    mother_employer: {
                        required: true
                    },

                },
            messages:
                {
                    mother_image: {
                        required: "Please upload a photo"
                    },
                    mother_first_name: {
                        required: "Please enter mother first name"
                    },
                    /!* regno: {
                         required: true
                     },*!/
                    mother_last_name: {
                        required: "Please enter mother last name"
                    },

                    mother_cnic: {
                        required: "Please enter mother cnic no"
                    },
                    mother_gender: {
                        required: "Please select a gender"
                    },
                    mother_marital_status: {
                        required: "Please select a marital status"
                    },

                    mother_working_status: {
                        required: "Please select a working status"
                    },
                    mother_relation: {
                        required: "Please select a relation"
                    },
                    mother_occupation: {
                        required: "Please select a occupation"
                    },
                    mother_designation: {
                        required: "Please select a designation"
                    },
                    mother_employer: {
                        required: "Please enter employer"
                    },
                },
            submitHandler: function (form) {
                form.submit();
            }
        });*/

    $('#save-guardian-modal-btn').click(function(e) {
        e.preventDefault();
        
        $('#add-guardian-form').attr('action', base_url + 'add-guardian');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });


        var formData = new FormData($('#add-guardian-form')[0]); //$('#add-guardian-form').serialize();
        $.ajax({
            url: base_url + 'add-guardian',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: formData,

            success: function(result) {


                if (result.errors) {
                    $('.add-div-error').text('');
                    $.each(result.errors, function(key, value) {
                        //console.log(value);
                        $('#add-guardian-modal').modal('show');
                        $('.add-div-error.' + key).text(value);

                        $('.add-div-error .' + key).show();
                        
                    });
                }
                //console.log(result);
                else {
                    /*$('#add-guardian-form')[0].reset();*/
                    //$('#success-message').html('');
                    $('.add-div-error').hide();

                    $('#add-guardian-modal').modal('hide');
                    //$('input[name="pnt_Email"]').val($('#add-guardian-form input[name="email"]'));

                    $("#guardian-dropdown").append(`<option value="" disabled selected>Select Guardian</option>
                                                    
                                                        <option selected value="${result.data.id}" 
                                                                data-name="${result.data.name}"
                                                                data-phone="${result.data.phone}"
                                                                data-email="${result.data.email}"
                                                                data-photo="${result.data.photo}"
                                                                data-pnt_home_Ph="${result.data.pnt_home_Ph}"
                                                                data-pnt_off_Ph="${result.data.pnt_off_Ph}">${result.data.name}</option>

                                                        

                                                </select>`)

                    $("#guardian-dropdown").trigger('change');



                }
            } 
        });
    });
    /*add gardian*/

    /*add mother */
    //$('#success-alert').html('');
    $('#mymother-modal-btn').click(function(e) {
        $('#mymother-modal')
            .find("input,file")
            .val('')
            .end();
            if($("select[name='occupation'] option:selected")){
                $("select[name='occupation']").prop("select[name='occupation']", "").val('').selectpicker("refresh")
            }
            if($("select[name='designation'] option:selected")){
                $("select[name='designation']").prop("select[name='designation']", "").val('').selectpicker("refresh")
            }
            if($("select[name='working_status'] option:selected")){
                $("select[name='working_status']").prop("select[name='working_status']", "").val('').selectpicker("refresh")
            }
            if($("select[name='marital_status'] option:selected")){
                $("select[name='marital_status']").prop("select[name='marital_status']", "").val('').selectpicker("refresh")
            }
        $('#mymother-modal').modal('show');
        e.preventDefault();
    });

    $('#add-mother-save-btn').click(function(e) {
        e.preventDefault();
        //$('#add-mother-form').attr('action', base_url +'add-mother');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var add_mother_data = new FormData($('#add-mother-form')[0]);
        //$('#add-mother-form').serialize();
        $.ajax({
            url: base_url + 'add-mother',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: add_mother_data,
            success: function(result) {
                //console.log(result);
                if (result.errors) {
                    $('.add-mother-div-error').text('');
                    $.each(result.errors, function(key, value) {
                        //console.log(value);
                        $('#mymother-modal').modal('show');
                        $('.add-mother-div-error.' + key).text(value);

                        $('.add-mother-div-error .' + key).show();
                         
                    });
                } else {
                    $('#success-message').html('');
                    $('.add-mother-div-error').hide();

                    $('#mymother-modal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>' + result.message + '</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    $('#success-message').delay(2000).fadeOut('slow');
                    
                    //$('input[name="mother_email"]').val($('#add-mother-form input[name="email"]'));

                    $("#guardian-mother-dropdown").append(`<option value="" disabled selected>Select Mother</option>
                                                    
                                                        <option selected value="${result.data.id}" 

                                                                data-name="${result.data.name}"
                                                                data-phone="${result.data.phone}"
                                                                data-email="${result.data.email}"

                                                                data-photo="${result.data.photo}"
                                                                data-pnt_home_Ph="${result.data.pnt_home_Ph}"
                                                                data-pnt_off_Ph="${result.data.pnt_off_Ph}"
                                                               

                                                              >${result.data.name}</option>

                                                        

                                                </select>`)

                    $("#guardian-mother-dropdown").trigger('change');
                    
                    //motherAppend();

                }
            }
        });
    });
    /* add mother*/

    function motherAppend() {
        //$('#guardian-mother-dropdown').find('option').not(':first').remove();
        //console.log('motherAppend call...');
        var studentSelect = $('#guardian-mother-dropdown');
        $.ajax({
            type: 'GET',
            url: base_url + 'get-guardian-mother',
        }).then(function(data) {
            // create the option and append to Select2
            var option = new Option(data.name, data.id, true, true);
            studentSelect.append(option).trigger('change');
            $('#grdMotherPreview').attr('src', asset_url + 'upload/user/' + data.user_image);
            // manually trigger the `select2:select` event
            studentSelect.trigger({
                type: 'select2:select',
                params: {
                    data: data
                }
            });
        });
    }


    /*function myAppendNow(newOption) {
        // var newOption = new Option('TEST TEST DDDDDDD www', 'myoption', false, false);
        console.log('newOption >>>>', newOption);
        $('#guardian-mother-dropdown').append(newOption).trigger('change');
    }

    function myAlert(opt) {
        alert(JSON.stringify(opt));
    }*/

    function guardianAppend()

    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        var guardianFather = $('#guardian-dropdown');
        $.ajax({
            type: 'GET',
            url: base_url + 'get-guardian-father',
        }).then(function(data) {
            // create the option and append to Select2
            var option = new Option(data.name, data.id, true, true);
            guardianFather.append(option).trigger('change');
            $('#grdPicturePreview').attr('src', asset_url + 'upload/user/' + data.user_image);
            // manually trigger the `select2:select` event
            guardianFather.trigger({
                type: 'select2:select',
                params: {
                    data: data
                }
            });
        });
        // Department id
        //var id = $(this).val();

        // Empty the dropdown
        //$('#guardian-dropdown').find('option').not(':first').remove();

        // AJAX request
        /*   $.ajax({
               url: base_url +'get-guardian-father',
               type   : 'get',
               success: function(response){
                   console.log(response);
                   //$(".guardian-dropdown").empty();
                   //$(".guardian-dropdown").append('<option value="">Select Guardian</option>');
                   //$.each(response , function (key, value) {
                       //$("select.guardian-father-div").append(value.pnt_Id + value.pnt_Fname+ value.pnt_Mname  + value.pnt_Lname);
                   //$('#guardian-dropdown').append($("<option></option>").attr("value", response.pnt_Id).text(response.pnt_Fname));
                   //$('#guardian-dropdown').append($('<option>', { value : response.pnt_Id }).text(response.pnt_Fname));
                       $(".guardian-dropdown").append('<option value="' + response.pnt_Id + '">" + response.pnt_Fname + "</option>');
                       //$("#guardian-dropdown").append(new Option("option text", "value"));
                       //});
               }
           });*/
    }


    $('#guardian-dropdown').bind('ready load change', function() {

        var id = $(this).find(':selected').val();

        var photo = $(this).find(':selected').data('photo');
        var phone = $(this).find(':selected').data('phone');
        $("#pnt_mob_Ph2").val(phone);

        var email = $(this).find(':selected').data('email');

        $("#pnt_Email").val(email);


        var pnt_home_ph = $(this).find(':selected').data('pnt_home_ph');
        $("#pnt_home_Ph").val(pnt_home_ph);

        var pnt_off_ph = $(this).find(':selected').data('pnt_off_ph');
        $("#pnt_off_Ph").val(pnt_off_ph);







        $('#grdPicturePreview').attr("src", photo);

    });



    $('#guardian-mother-dropdown').bind('ready load change', function() {
        //$('#guardian-mother-dropdown').change(function(){


        var id = $(this).find(':selected').val();

        var photo = $(this).find(':selected').data('photo');
        var phone = $(this).find(':selected').data('phone');
        //alert(phone);

        $("#mother_mobile").val(phone);

        var email = $(this).find(':selected').data('email');
        $("#mother_email").val(email);


        var pnt_home_ph = $(this).find(':selected').data('pnt_home_ph');
        $("#mother_home_phone").val(pnt_home_ph);

        var pnt_off_ph = $(this).find(':selected').data('pnt_off_ph');
        $("#mother_office_phone").val(pnt_off_ph);


        $('#grdMotherPreview').attr("src", photo);




 /*       $('#grdMotherPreview').attr("src", photo);

        // Department id
        var id = $(this).val();
        //alert(id);
        // Empty the dropdown
        //$('#guardian-dropdown').find('option').not(':first').remove();

        // AJAX request
        $.ajax({
            url: base_url + 'get-guardian-mother-image/' + id,
            type: 'get',
            success: function(response) {
                console.log(response);
                $('#grdMotherPreview').attr("src", base_url + "upload/user/" + response.user_image);
            }
        });*/
    });

    /* $('.admission-btn-save-exit-submit').click(function (e){
        $('#admission-form').attr('id', 'admission-form');
        //e.preventDefault();
        $('#admission-form').attr('action', base_url +'admission-info');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var admission_data =  $('#admission-form').serialize();
        $.ajax({
            url: base_url + 'admission-info',
            method: 'post',
            data:  admission_data,
            success: function(result){
                console.log(result);
                if(result.errors)
                {
                    $('#add-alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        //console.log(value);
                        //$('#class-section-modal').modal('show');
                        //$('.add-div-error').show();
                        //$('.alert-danger').show();
                        $('#add-alert-danger').append('<li>'+value+'</li>');

                    });
                }
                else
                {
                    $('#success-message').html('');
                    //$('.add-div-error').hide();

                    //$('#class-section-modal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>'+result.message+'</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    $('#success-message').delay(2000).fadeOut('slow');
                    //location.reload();

                }
            }});
    });
*/
    window.setTimeout(function() {
        $("#success-message").alert('close');
    }, 2000);


    /*  $('.save-guardian-modal-btn').click(function(){

        });

        $('.add-mother-save-btn').click(function(){
            // Empty the dropdown

        });*/

    /*
     $('#sel_student').change(function(){
         var count = $("#sel_student :selected").length;
         $("#add-no-of-student").val(count);
     });

     /!*for edit modal *!/
    $("#edit_sel_class").bind("ready change", function(event){
    //$('#edit_sel_class').change(function(){

        // Department id
        var id = $(this).val();
        //alert(id);
        // Empty the dropdown
        $('#edit_sel_student').find('option').not(':first').remove();

        // AJAX request
        $.ajax({
            url: base_url +'get-student/'+id,
            type   : 'get',
            data   : {id: id},
            success: function(response){
                console.log(response);
                $("#edit_sel_student").empty();
                $("#edit_sel_student").append('<option value="">Select Student</option>');
                $.each(response , function (key, value) {
                    $("#edit_sel_student").append('<option value="' + value.std_Id + '">' + value.std_Fname + '</option>');

                    $("#edit-representative").append('<option value="' + value.std_Id + '">' + value.std_Fname + '</option>');
                });


            }
        });
    });

    $('#edit_sel_student').change(function(){
        var count = $("#edit_sel_student :selected").length;
        $("#edit-no-of-student").val(count);
    });*/



    /*        $('#update-class-section-btn').click(function(e){
            e.preventDefault();
            //alert('hello');
            //$('#SubjectForm')[0].reset();
            $('#edit-class-section-form').attr('action', base_url +'update-class-section');
            //$('#Model-Title').html("Add New Subject");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            let edit_class_section_data =  $('#edit-class-section-form').serialize();
            $.ajax({
                url: base_url + "update-class-section",
                method: 'post',
                data:  edit_class_section_data,
                success: function(result){
                    //alert(result);
                    if(result.errors)
                    {
                        $('#edit-alert-danger').html('');

                        $.each(result.errors, function(key, value){
                            console.log(value);
                            $('#edit-class-section-modal').modal('show');
                            $('.edit-div-error').show();
                            //$('.alert-danger').show();
                            $('#edit-alert-danger').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#success-message').html('');
                        $('.edit-div-error').hide();

                        $('#edit-class-section-modal').modal('hide');
                        $('#success-message').show();
                        $('#success-message').append('<p>'+result.message+'</p>');
                        //$('#success-alert').show();
                        //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                        //$('#success-message').delay(2000).fadeOut('slow');
                        location.reload();

                    }
                }});
        });

        $('body').on('click', '.edit-class-section-btn', function () {
            var edit_class_section_id = $(this).data('id');

            $.get('edit-class-section/'+edit_class_section_id, function (data) {

                console.log(data.studentbyids);
                $('#edit-class-section-modal').modal('show');
                $('#class-section-id').val(data.c_section_Id);
                $('#edit-class-section-name').val(data.class_section_name);

                $('#edit-no-of-student').val(data.no_of_student);

                $("#edit_sel_class").val(data.cls_Id).trigger('change');
                $("#edit-teacher").val(data.emp_Id).trigger('change');
                $("#edit-representative").val(data.crep_Id).trigger('change');
                $("#edit_sel_student").val(data.student).trigger('change');
              /!*  $.each(data.studentbyids, function(key, val) {



                });*!/
                /!*var valoresArea = $('#edit-subject').val(data.subject);
                alert(valoresArea);*!/
                //var newvaloresArea=data.subject;

               // var values=data.subject;
               // $.each(values.split(","), function(i,e){
                   // $(".edit-subject option[value='" + e + "']").prop("selected", true);
               // /});

    // it has the multiple values to set separated by comma
                //var arrayArea = newvaloresArea.split(',');
                //alert(newvaloresArea);
             /!*   $.each(data.subject, function(key, value) {
                    $('select[name="subject"]').append('<option value="'+ key +'">'+ value +'</option>');
                });*!/
                /!*$.each(newvaloresArea, function(key, value){
                    //$(this).select2('val', newvaloresArea);
                    $('.edit-subject').select2('val',value);
                });
    *!/





            })
        });
        $('.show-view-class-section-btn').on('click', function () {
            alert('hello');
            var class_section_id = $(this).data('id');
            $.get('show-class/'+class_section_id, function (data) {
               //console.log(data);
                $('#view-class-section-modal').modal('show');
               /!* $('#show-class-name').text(data.class);
                $('#show-tuition-fee').text(data.tuition_fee);
                $('#show-no-of-periods').text(data.no_of_period);
                $('#show-school-section').text(data.sc_sec_name);*!/
               /!* $(".subjects_table tbody").empty();
                $.each(data.subjects, function(key, val) {
                    var markup = "<tr><td>" + (key + 1) + "</td><td>" + val.subject + "</td></tr>";
                    $(".subjects_table tbody").append(markup);
                    // $('select[name="subject"]').append('<option value="'+ key +'">'+ value +'</option>');
                });*!/

            })
        });*/
});


$('#adm_Date').on('click keyup blur', function() {

    var start = new Date(document.getElementById('adm_Date').value);
    var year = start.getFullYear();
    var nextyear = year + 1;
    var session = year + "-" + nextyear;
    if (year) {
        $('#adm_Session').val(session);
    } else {
        $('#adm_Session').val('');
    }

    //alert(session);
});
$.validator.addMethod('lettersonly', function(value) {
    return /^[a-zA-ZÑñ\s]+$/.test(value);
}, 'Please enter a valid National Identity Card Number.');



/*add admission form validation*/
$("#admission-form").validate({

    rules: {
        adm_Date: {
            required: true
        },
        adm_Session: {
            required: true
        },
        nadra_b: {
            required: true
        },

        cls_Id: {
            required: true
        },
        name: {
            required: true,
            lettersonly: true

        },
        user_image: {
            required: true,

        },
        gnd_Id: {
            required: true
        },
        std_Dob: {
            required: true
        },
        bg_Id: {
            required: true
        },
        relig_Id: {
            required: true
        },
        nation_Id: {
            required: true
        },
        dom_Id: {
            required: true
        },
        cast_Id: {
            required: true
        },
        std_cat_Id: {
            required: true
        },
        disable_Id: {
            required: true
        },
        guardian: {
            required: true
        },
        mother: {
            required: true
        },
        lsch_Name: {
            required: true,
            lettersonly: true
        },
        lsch_contact_No: {
            required: true
        },
        lsch_lv_Date: {
            required: true
        },
        lsch_class_Passed: {
            required: true
        },
        lsch_Comments: {
            required: true,
            lettersonly: true
        },
        pnt_mail_Add: {
            required: true
        },
        pnt_pmt_Add: {
            required: true
        },
        pnt_District: {
            required: true
        },
        pnt_City: {
            required: true
        },
        zip_No: {
            required: true
        },
        pnt_mob_: {
            required: true
        },
        pnt_Email: {
            required: true,
            email: true
        },
        mother_mobile: {
            required: true
        },
        emer_cont_Name: {
            required: true,
            lettersonly: true
        },
        emer_cont_No: {
            required: true
        },
    },
    messages: {
        adm_Date: "Please select admission date.",
        adm_Session: {
            required: "Please enter session.",
        },
        /*regno: "please enter registration",*/
        nadra_b: {
            required: "Please enter B form number.",
        },
        user_image: {
            required: "Please Select Picture.",
        },
        cls_Id: {
            required: "Please select a class.",
        },
        name: {
            required: "Please enter  student name.",
            lettersonly: "Only Letter required",
        },
        std_Dob: {
            required: "Please select a date of birth.",
        },
        blood_group: {
            required: "Please select a blood group.",
        },
        relig_Id: {
            required: "Please select a religion.",
        },
        nation_Id: {
            required: "Please select a nationality.",
        },
        dom_Id: {
            required: "Please select a district.",
        },
        cast_Id: {
            required: "Please select a cast.",
        },
        std_cat_Id: {
            required: "Please select a student category.",
        },
        disable_Id: {
            required: "Please select a disability.",
        },
        guardian: {
            required: "Please select a guardian.",
        },
        mother: {
            required: "Please select a mother.",
        },
        lsch_Name: {
            required: "Please enter previous school name.",
            lettersonly: "Only Letter required",
        },
        lsch_contact_No: {
            required: "Please enter previous school contact.",
        },
        lsch_lv_Date: {
            required: "Please enter previous school leaving date.",
        },
        lsch_class_Passed: {
            required: "Please enter previous class passed.",
        },
        lsch_Comments: {
            required: "Please enter previous school comment.",
            lettersonly: "Only Letter required",
        },
        pnt_mail_Add: {
            required: "Please enter mailing address.",
        },
        pnt_pmt_Add: {
            required: "Please enter permanent_address.",
        },
        pnt_District: {
            required: "Please select a district.",
        },
        pnt_City: {
            required: "Please select a city.",
        },
        zip_No: {
            required: "Please enter zipcode.",
        },
        pnt_mob_Ph: {
            required: "Please enter guardian mobile.",
        },
        pnt_Email: {
            required: "Please enter guardian email.",
        },
        mother_mobile: {
            required: "Please enter guardian mobile.",
        },
        emer_cont_Name: {
            required: "Please enter emergency person name.",
            lettersonly: "Only Letter required",
        },
        emer_cont_No: {
            required: "Please enter emergency person name.",
        },
    },
    submitHandler: function(form, e) {
        //form.submit();
        e.preventDefault();
        $('#admission-form').attr('action', base_url + 'admission-info');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var admission_data = new FormData($('#admission-form')[0]);

        $(".admission-btn-save-exit-submit").prop("disabled", true );

        $.ajax({
            url: base_url + 'admission-info',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: admission_data,
            success: function(result) {
                
                if (result.errors) {
                    $('#add-alert-danger').html('');
                    $('#success-message').html('');
                    $(".admission-btn-save-exit-submit").prop("disabled", false );
                    $.each(result.errors, function(key, value) {
                        //alert(value);

                        $('#add-div-error').show();

                        $('.add-div-error.' + key).text(value);

                        $('.add-div-error .' + key).show();

                        if (value != "") {

                            swal("Oops!", "Nadra B Form Already Exist!", "error");
                        }
                        //$('.alert-danger').show();
                    });
                } else {
                    $('#success-message').html('');
                    $('.add-div-error').hide();
                    $('#class-section-modal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>' + result.message + '</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    $('#success-message').delay(2000).fadeOut('slow');
                    swal({
                        title: "Added successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                    });
                    setTimeout(function() { window.location.href = base_url + "students"; }, 2000);

                }
            }
        });
    }
});
/*edit admission form validation*/
$("#edit-admission-form").validate({

    rules: {
        adm_Date: {
            required: true
        },
        adm_Session: {
            required: true
        },
        /*regno: {
            required: true
        },*/
        nadra_b: {
            required: true
        },

        cls_Id: {
            required: true
        },

        name: {
            required: true
        },
        gnd_Id: {
            required: true
        },
        std_Dob: {
            required: true
        },
        bg_Id: {
            required: true
        },
        relig_Id: {
            required: true
        },
        nation_Id: {
            required: true
        },
        dom_Id: {
            required: true
        },
        cast_Id: {
            required: true
        },
        std_cat_Id: {
            required: true
        },
        disable_Id: {
            required: true
        },
        guardian: {
            required: true
        },
        mother: {
            required: true
        },
   /*     lsch_Name: {
            required: true
        },
        lsch_contact_No: {
            required: true
        },
        lsch_lv_Date: {
            required: true
        },
        lsch_class_Passed: {
            required: true
        },
        lsch_Comments: {
            required: true
        },*/
        pnt_mail_Add: {
            required: true
        },
        pnt_pmt_Add: {
            required: true
        },
        pnt_District: {
            required: true
        },
        pnt_City: {
            required: true
        },
        zip_No: {
            required: true
        },
        pnt_mob_Ph: {
            required: true
        },
        pnt_Email: {
            required: true,
            email: true
        },
        mother_mobile: {
            required: true
        },
        emer_cont_Name: {
            required: true
        },
        emer_cont_No: {
            required: true
        },
    },
    messages: {
        admdate: "Please select admission date",
        adm_Session: {
            required: "Please enter session",
        },
        /*regno: "please enter registration",*/
        nadra_b: {
            required: "Please Nadra B form",
        },
        cls_Id: {
            required: "Please select a class",
        },
        name: {
            required: "Please enter student full name",
        },
        std_Dob: {
            required: "Please enter date of birth",
        },
        blood_group: {
            required: "Please select blood group",
        },
        relig_Id: {
            required: "Please select religion",
        },
        nation_Id: {
            required: "Please select nationality",
        },
        dom_Id: {
            required: "Please select a district",
        },
        cast_Id: {
            required: "Please select a cast",
        },
        std_cat_Id: {
            required: "Please select a student category",
        },
        disable_Id: {
            required: "Please select a disability",
        },
        guardian: {
            required: "Please select a guardian",
        },
        mother: {
            required: "Please select a mother",
        },
     /*   lsch_Name: {
            required: "Please enter previous school name",
        },
        lsch_contact_No: {
            required: "Please enter previous school contact",
        },
        lsch_lv_Date: {
            required: "Please select a previous school leaving date",
        },
        lsch_class_Passed: {
            required: "Please enter previous class passed",
        },
        lsch_Comments: {
            required: "Please enter previous school comment",
        },*/
        pnt_mail_Add: {
            required: "Please enter mailing address",
        },
        pnt_pmt_Add: {
            required: "Please enter permanent_address",
        },
        pnt_District: {
            required: "Please select a district",
        },
        pnt_City: {
            required: "Please select a city",
        },
        zip_No: {
            required: "Please enter zipcode",
        },
        pnt_mob_Ph: {
            required: "Please enter guardian mobile",
        },
        pnt_Email: {
            required: "Please enter guardian email",
        },
        mother_mobile: {
            required: "Please enter guardian mobile",
        },
        emer_cont_Name: {
            required: "Please enter emergency person name",
        },
        emer_cont_No: {
            required: "Please enter emergency person name",
        },
    },
    submitHandler: function(form, e) {
        e.preventDefault();
        $('#edit-admission-form').attr('action', base_url + 'update-admission-info');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var edit_admission_data = new FormData($('#edit-admission-form')[0]);
        $.ajax({

            url: base_url + 'update-admission-info',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: edit_admission_data,

            success: function(result) {
                console.log(result);
                if (result.errors) {
                    $('#add-alert-danger').html('');
                    $('#success-message').html('');

                    $.each(result.errors, function(key, value) {
                        //alert(value);

                        $('.add-div-error').show();

                        $('.add-div-error.' + key).text(value);

                        $('.add-div-error .' + key).show();



                        if (value != "") {

                            swal("Oops!", "Nadra B Form Already Exist!", "error");
                        }



                        //$('.alert-danger').show();


                    });

                } else {
                    $('#success-message').html('');
                    $('.add-div-error').hide();

                    $('#class-section-modal').modal('hide');
                    $('#success-message').show();
                    $('#success-message').append('<p>' + result.message + '</p>');
                    //$('#success-alert').show();
                    //$('#success-alert').text('Successfully Added!').fadeIn('slow');
                    $('#success-message').delay(2000).fadeOut('slow');
                    //location.reload();
                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                    });
                    setTimeout(function() { window.location.href = base_url + "students"; }, 2000);
                }
            }
        });
        //form.submit();
    }
});
/*start edit student Admission*/
/*$('.edit-admission-btn-save-exit-submit').click(function(e){
    // alert('hello');

});*/
/*start edit student Admission*/
/*});*/

/*    window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);*/
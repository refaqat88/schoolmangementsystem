// Wait for the DOM to be ready


$(document).ready(function() {

    $('select[name="country"]').on('change', function() {
        $('select[name="state"]').empty();
        $('select[name="state"]').selectpicker("refresh");
        $('select[name="district"]').empty();
        $('select[name="district"]').selectpicker("refresh");
        $('select[name="employee_city"]').empty();
        $('select[name="employee_city"]').selectpicker("refresh");
    });
    $('select[name="state"]').on('change', function() {
        $('select[name="district"]').empty();
        $('select[name="district"]').selectpicker("refresh");
        $('select[name="employee_city"]').empty();
        $('select[name="employee_city"]').selectpicker("refresh");
    });



    /*for showing staff ajax*/
    $(document).on('click','.show-view-staff', function() {
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
            url: base_url + 'view-staff-details/'+id,
            type: 'get',
            success: function (data) {
                console.log('dsfkfkfjfk fkffdkf',data);
                $('#viewStudentdata').html(data);
                 

            }
        });
    });
    /*for showing staff ajax*/
    
    /*for district ajax*/
    $('select[name="nationality"]').on('change', function() {
        var nationalityID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'getdistrict/' + nationalityID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                $('select[name="employee_district"]').html('');
                if (data != "") {
                    $.each(data, function(key, value) {

                        $('select[name="employee_district"]').append('<option value="' + key + '">' + value + '</option>');
                        $('select[name="employee_district"]').selectpicker("refresh");
                    });
                } else {
                    $('select[name="employee_district"]').append('<option value=""></option>');
                    $('select[name="employee_district"]').selectpicker("refresh");
                }
            }
        });
    });
    /*for district ajax*/



    /*for state ajax*/
    $('select[name="country"]').on('change', function() {
        var nationID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'getstate/' + nationID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                $('select[name="state"]').html('');
                if (data != "") {
                    $.each(data, function(key, value) {

                        $('select[name="state"]').append('<option value="' + key + '">' + value + '</option>');
                        $('select[name="state"]').selectpicker("refresh");
                    });
                } else {
                    $('select[name="state"]').append('<option value=""></option>');
                    $('select[name="state"]').selectpicker("refresh");
                }
            }
        });
    });
    /*for state ajax*/

    /*for district ajax on state*/
    $('select[name="state"]').on('change', function() {
        var stateID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'get-district-by-state/' + stateID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                $('select[name="district"]').html('');
                if (data != "") {
                    $.each(data, function(key, value) {

                        $('select[name="district"]').append('<option value="' + key + '">' + value + '</option>');
                        $('select[name="district"]').selectpicker("refresh");
                    });
                } else {
                    $('select[name="district"]').append('<option value=""></option>');
                    $('select[name="district"]').selectpicker("refresh");
                }
            }
        });
    });
    /*for distrrict ajax on state*/

    /*for city ajax on district*/
    $('select[name="district"]').on('change', function() {
        var districtID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'get-city-by-district/' + districtID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                $('select[name="employee_city"]').html('');
                if (data != "") {
                    $.each(data, function(key, value) {

                        $('select[name="employee_city"]').append('<option value="' + key + '">' + value + '</option>');
                        $('select[name="employee_city"]').selectpicker("refresh");
                    });
                } else {
                    $('select[name="employee_city"]').append('<option value=""></option>');
                    $('select[name="employee_city"]').selectpicker("refresh");
                }
            }
        });
    });
    /*for zipcode ajax on city*/

    $('select[name="employee_city"]').on('change', function() {
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
                $('[name="zip_code"]').val('');
                if (data != "") {
                    $('[name="zip_code"]').val(data);
                } else {
                    $('select[name="zip_code"]').val('');
                }
            }
        });
    });
    /*for zipcode ajax on city*/

    /*for designation*/
    $(document).on('change', 'select[name="emp_typ_Id"]', function() {
        var emptypeID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'getdesignation/' + emptypeID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                $('select[name="desig_Id"]').html('');
                if (data != "") {
                    $.each(data, function(key, value) {

                        $('select[name="desig_Id"]').append('<option value="' + key + '">' + value + '</option>');
                        $('select[name="desig_Id"]').selectpicker("refresh");
                    });
                } else {
                    $('select[name="desig_Id"]').append('<option value=""></option>');
                    $('select[name="desig_Id"]').selectpicker("refresh");
                }
            }
        });
    });
    /*for designation*/

    /*get board university by level*/

    $(document).on('change', '#Level_Id_show', function() {
        var Level_ID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'get-board-university/' + Level_ID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                //console.log('data');
                $('#univ_Id_show').html('');
                if (data != "") {
                    $.each(data, function(key, value) {

                        $('#univ_Id_show').append('<option value="' + value.pk_board_Id + '">' + value.board_Name + '</option>');
                        $('#univ_Id_show').selectpicker("refresh");
                    });
                } else {
                    $('#univ_Id_show').append('<option value=""></option>');
                    $('#univ_Id_show').selectpicker("refresh");
                }
            }
        });
    });
    $(document).on('change', '#Level_Id_showp', function() {
        var Level_ID = $(this).val();
        $.ajaxSetup({
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
        });

        $.ajax({
            url: base_url + 'get-board-university/' + Level_ID,
            type: "GET",
            dataType: "json",

            success: function(data) {
                //console.log('data');
                $('#univ_Id_showp').html('');
                if (data != "") {
                    $.each(data, function(key, value) {

                        $('#univ_Id_showp').append('<option value="' + value.pk_board_Id + '">' + value.board_Name + '</option>');
                        $('#univ_Id_showp').selectpicker("refresh");
                    });
                } else {
                    $('#univ_Id_showp').append('<option value=""></option>');
                    $('#univ_Id_showp').selectpicker("refresh");
                }
            }
        });
    });

    /*filter Staff by Status start*/

    $(document).on('change','.filter_staff',function (e) {
        var $this = $(this);
        var  employee_status = $('select#employee_status option:selected').val();
        var  employee_type   = $('select#employee_type option:selected').val();
        //console.log(employee_status);
        //console.log(employee_type);
        //return;
        // var student_Shift    = $('select#student_Shift option:selected').val();

        if($this.attr('id')=='employee_status')
        {
            employee_status = $this.val();
        }else if($this.attr('id')=='employee_type')
        {
            employee_type = $this.val();
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
            url: base_url +'getstaff-by-filter',
            type: "POST",

            data: JSON.stringify({
                "status": employee_status,
                'employee_type' : employee_type

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

    /*$(document).on('change','#employee_status',function (e) {
        var $this = $(this);
        var  staff_status = $this.val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url +'getstaff-by-filter',
            type: "POST",

            data: JSON.stringify({ "status": staff_status }),
            contentType: "application/json; charset=UTF-8",
            success:function(data) {
                $('#datatable').DataTable().destroy();
                $("#datatable").html(data);
                var table = $('#datatable').DataTable();
                table.draw();
            }
        });

    });*/

    /*filter Staff by Status end*/


    $(".add-academic-btn").click(function(e) { 
        e.preventDefault();
        var length = $("#datatable .academics_list_univ_Id").length;
        var title = $(this).closest("div#show-acad-qual").find("input[name='title']").val();
       /* var filesss = $("#acdm_degree_show")[0].files[0];

        filesss = filesss!=''?filesss.name:'';*/
        //alert(filesss);
        var univ_Id_show = $("#univ_Id_show").html();
        var selecteduniv_Id = $("#univ_Id_show").val();

        var sub_Id_show = $("#sub_Id_show").html();  
        var selectedsub_Id =$("#sub_Id_show").val();
        var session_show =$("#session_show").val();
       
        var grade_Id_show = $("#grade_Id_show").html();  
        var selectedgrade_Id =$("#grade_Id_show").val();
        var acdm_Gpa_show =$("#acdm_Gpa_show").val();
        

         var table = $('#datatable').DataTable();

        table.destroy(); 
        length++;
        
        var tr =`<tr>                                                           
                    <td> 
                        <input type="hidden" name="type3[]" value="1"> 
                        <input type="text" class="form-control" placeholder="" name="title3[]" value="${title}" aria-invalid="false">
                    </td>

                    <td>
                    <select class="selectpicker academics_list_univ_Id" name="univ_Id3[]"    id="emp-univ_Id${length}"  data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select Board/University" data-live-search="true"  data-hide-disabled="true">
                         
                    </select>
   
                    </td>
                        
                    <td>
                    <select class="selectpicker academics_list_sub_Id" name="sub_Id3[]"    id="emp-sub_Id${length}"  data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select Subject" data-live-search="true"  data-hide-disabled="true">
                         
                    </select>
   

                    </td>
                    
                    <td>
                       <input type="text" class="form-control  " placeholder="" name="session3[]"  id="emp-session${length}" value="${session_show}">
                    </td>

                    <td>

                    <select class="selectpicker" name="grade_Id3[]"    id="emp-grade_Id${length}"  data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select Grade" data-live-search="true"  data-hide-disabled="true">
                         
                    </select>


                    </td>
                    <td><input type="text" class="form-control  " placeholder="" name="acdm_Gpa3[]"  id="emp-acdm_Gpa${length}" value="${acdm_Gpa_show}">
                   </td>
                   <td><input type="file" class="form-control" placeholder="" name="degree3[]"  id="emp-File_Degree${length}" value=""></td>
                    <td class="text-center">
                        <a href="#" class="btn btn-danger btn-link btn-icon btn-sm remove-adademic" title="Delete"><i class="fa fa-times"></i></a>
                    </td>
                </tr>`;
        
        
        $('#datatable > tbody:last-child').append(tr).find('.datepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });
        $("#emp-univ_Id"+length).empty();
        $("#emp-univ_Id"+length).append(univ_Id_show);
        $("#emp-univ_Id"+length+" [value="+selecteduniv_Id+"]").attr('selected', 'true');
        $("#emp-univ_Id"+length).selectpicker('refresh');


        $("#emp-sub_Id"+length).empty();

        $("#emp-sub_Id"+length).append(sub_Id_show);
        $("#emp-sub_Id"+length+" [value="+selectedsub_Id+"]").attr('selected', 'true');
        $("#emp-sub_Id"+length).selectpicker('refresh');

        $("#emp-grade_Id"+length).append(grade_Id_show);
        $("#emp-grade_Id"+length+" [value="+selectedgrade_Id+"]").attr('selected', 'true');
        $("#emp-grade_Id"+length).selectpicker('refresh');
 
         
        $(this).closest("div#show-acad-qual").find("input").val('');
         

        $("#datatable").DataTable();
         
     });

    /*remove Appended div of academic*/
    $(document).on('click', ".remove-adademic", function() {
        $(this).closest("tr").remove();

          var table = $('#datatable').DataTable();
        table
            .row($(this).parents('tr'))
            .remove()
         .draw();

    });
    /*$(document).on('click', ".remove_academic_btn", function() {
        //alert('works');
        $(this).closest(".show-acadqual-div").remove();
    });*/

    $(".profession-qual-btn").click(function(e) {
        e.preventDefault();

        var length = $("#professional .academics_list_univ_Idp").length;
        var title = $(this).closest("div#showprofqual").find("input[name='title']").val();
         var session_show =$("#session_showp").val();
        var univ_Id_show = $("#univ_Id_showp").html();
        var selecteduniv_Id = $("#univ_Id_showp").val();
        var table = $('#professional').DataTable();

        table.destroy(); 
        length++;
  
           var tr =`<tr>                                                           
                    <td> 
                        <input type="hidden" name="type3[]" value="2"> 
                        <input type="text" class="form-control" placeholder="" name="title3[]" value="${title}" aria-invalid="false">
                    </td>

                    <td>
                    <select class="selectpicker academics_list_univ_Idp" name="univ_Id3[]"    id="emp-univ_Idp${length}"  data-container="" data-size="3" data-style="btn btn-secondary btn-round" title="Select Board/University" data-live-search="true"  data-hide-disabled="true">
                         
                    </select>
   
                    </td>
                        
                     
                    <td>
                       <input type="text" class="form-control  " placeholder="" name="session3[]"   value="${session_show}">
                    </td>

                     <td><input type="file" class="form-control" placeholder="" name="degree3[]"   value=""></td>
                                                                    
                    
                    <td class="text-center">
                       <a href="#" class=" btn btn-simple btn-danger btn-link btn-icon btn-sm remove-professional" title="Delete"><i class="fa fa-times fa-lg"></i></a>
                    </td>
                </tr>`;
        


        $('#professional > tbody:last-child').append(tr).find('.datepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });

        $("#emp-univ_Idp"+length).empty();
        $("#emp-univ_Idp"+length).append(univ_Id_show);
        $("#emp-univ_Idp"+length+" [value="+selecteduniv_Id+"]").attr('selected', 'true');
        $("#emp-univ_Idp"+length).selectpicker('refresh');
        $("#professional").DataTable();


        $(this).closest("div#showprofqual").find("input").val('');

    });

    $(document).on('click', ".remove-professional", function() {
        
         var table = $('#professional').DataTable();
        table
            .row($(this).parents('tr'))
            .remove()
         .draw();


    });


    $("#professional").DataTable();
    $("#expertable").DataTable();

    $(".add-experience-div-btn").click(function(e) {
        e.preventDefault();

        var prev_exper_Org = $("div#show-experience #prev_exper_Org").val();
        var prev_exper_Position = $("div#show-experience #prev_exper_Position").val();
        var prev_exper_Role = $("div#show-experience #prev_exper_Role").val();
        var prev_Frmdate = $("div#show-experience #prev_Frmdate").val();
        var prev_Todate = $("div#show-experience #prev_Todate").val();
         var table = $('#expertable').DataTable();

         table.destroy(); 
         var tr =`<tr>
                                                             
                    <td><input type="text" class="form-control" placeholder="" name="prev_exper_Org[]" value="${prev_exper_Org}"></td>
                    <td><input type="text" class="form-control" placeholder="" name="prev_exper_Position[]" value="${prev_exper_Position}"></td>
                    <td><input type="text" class="form-control" placeholder="" name="prev_exper_Role[]" value="${prev_exper_Role}"></td>
                    <td><input type="text" class="form-control datepicker" placeholder="" name="prev_Frmdate[]" value="${prev_Frmdate}"></td>
                    <td><input type="text" class="form-control datepicker" placeholder="" name="prev_Todate[]" value="${prev_Todate}"></td>
                    <td><input type="file" class="form-control" placeholder="" name="exp_file[]"></td>
                                                             
                    <td class="text-center">
                         
                         <a href="#" class=" btn btn-simple btn-danger btn-link btn-icon btn-sm remove-experience" title="Delete"><i class="fa fa-times fa-lg"></i></a>
                     </td>
                 </tr>`;

        $('#expertable > tbody:last-child').append(tr).find('.datepicker').datetimepicker({
            format: 'YYYY-MM-DD',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });
        $("#expertable").DataTable();
        $(this).closest("div#show-experience").find("input").val('');

    });

     
    $(document).on('click', ".remove-experience", function() {
        var table = $('#expertable').DataTable();
        table
            .row($(this).parents('tr'))
            .remove()
         .draw();
    });


    $('#success-alert').html('');
    /*  $('.add-employee-submit-btn').click(function (e) {
          // alert('hello');

      });*/

    $(document).on('change keyup', '#staff_cnic', function(e) {

        //$("#staff_cnic").keyup(function() {

            var username = $(this).val().trim();

            if (username != '') {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    url: base_url + 'username-availability',
                    type: 'post',
                    data: { username: username },
                    success: function(response) {

                        $('#uname_response').html(response);

                    }
                });
            } else {
                $("#uname_response").html("");
            }

       // });
    });

    $(document).on('change', '#employee-filter', function(e) {

        var value = $(this).val();
        employeeSearch(value);
    });

    function employeeSearch(value) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + 'staff',
            // url    : "http://localhost/nextdaylabels_live/admin/public/template",

            type: 'get',
            data: { 'search': value },
            success: function(data) {
                $('#datatable').empty();
                $("#datatable").html(data);


            }
        });

    }


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


    window.setTimeout(function() {
        $("#success-message").alert('close');
    }, 2000);








});

$.validator.addMethod('lettersonly', function(value) {
    return /^[a-zA-ZÑñ\s]+$/.test(value);
}, 'Please enter a valid National Identity Card Number.');


/*add employee form validation*/
$("#add-employee-form").validate({

        rules: {
            roles: {
                required: true
            },
            given_name: {
                required: true,
                lettersonly: true
            },
            surname: {
                required: true,
                lettersonly: true
            },
            father: {
                required: true,
                lettersonly: true
            },
            gender: {
                required: true
            },

            marital_status: {
                required: true
            },
            blood_group: {
                required: true
            },

            staff_cnic: {
                required: true
            },

            date_of_birth: {
                required: true
            },
            religion: {
                required: true
            },

            nationality: {
                required: true
            },
            employee_district: {
                required: true
            },
            staff_cast: {
                required: true
            },

            hire_date: {
                required: true
            },
            adjustment_date: {
                required: true
            },
            /*employee_status: {
                required: true
            },*/
            contract_type: {
                required: true
            },
            staff_contract_duration: {
                required: true
            },
            employee_type: {
                required: true
            },
            desig_Id: {
                required: true
            },
            qual_sno: {
                required: true
            },
            mailing_address: {
                required: true
            },
            country: {
                required: true
            },
            state: {
                required: true
            },
            district: {
                required: true
            },
            employee_city: {
                required: true
            },
            zip_code: {
                required: true
            },
            permanent_address: {
                required: true
            },

            employee_mobile_phone: {
                required: true
            },
            // employee_home_phone: {
            //     required: true
            // },
            employee_email: {
                required: true
            },
            emergency_contact_name: {
                required: true
            },
            emergency_contact_phone: {
                required: true
            },
            relation: {
                required: true
            },
            employee_image: {
                required: true
            }
        },
        messages: {
            roles: {
                required: "Please select a Role"
            },
            given_name: {
                required: "Please enter given name",
                lettersonly: "Only Letter required",
            },
            surname: {
                required: "Please enter surname",
                lettersonly: "Only Letter required",
            },

            father: "Please enter father name",
            lettersonly: "Only Letter required",

            gender: {
                required: "Please select a gender"
            },

            marital_status: {
                required: "Please select a martial status"
            },
            blood_group: {
                required: "Please select a blood group"
            },
            staff_cnic: {
                required: "Please enter Empoyee Cnic"
            },
            date_of_birth: {
                required: "Please enter date of birth"
            },

            religion: {
                required: "Please select a religion"
            },

            /*employee_image:{
                required: "Please upload employee image"
            },*/

            nationality: {
                required: "Please select a nationality"
            },
            employee_district: {
                required: "Please select a employee district"
            },
            staff_cast: {
                required: "Please select a cast"
            },

            hire_date: {
                required: "Please select a hire date"
            },
            adjustment_date: {
                required: "Please select a adjustment date"
            },
            /* employee_status:{
                 required: "Please select employee status",
             },*/
            contract_type: {
                required: "Please select a contract type"
            },
            staff_contract_duration: {
                required: "Please enter staff contract duration"
            },
            employee_type: {
                required: "Please select a employee type"
            },
            desig_Id: {
                required: "Please select a designation"
            },
            mailing_address: {
                required: "Please enter mailing address."
            },
            country: {
                required: "Please select a country."
            },
            state: {
                required: "Please select a state."
            },
            district: {
                required: "Please select a district."
            },
            employee_city: {
                required: "Please select a employee city."
            },
            zip_code: {
                required: "Please enter zipcode."
            },
            permanent_address: {
                required: "Please enter permanent address."
            },

            employee_mobile_phone: {
                required: "Please enter phone no."
            },
            // employee_home_phone: {
            //     required: "Please enter employee home phone no."
            // },
            employee_email: {
                required: "Please enter email address."
            },
            emergency_contact_name: {
                required: "Please enter emergency contact name."
            },
            emergency_contact_phone: {
                required: "Please enter emergency contact name."
            },
            relation: {
                required: "Please select a relation."
            },

            employee_image: {
                required: "Please select a photo"
            }


        },
    submitHandler: function(form, e) {
        e.preventDefault();
        $('#add-employee-form').attr('action', base_url + 'appointment-info');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var admission_data = new FormData($('#add-employee-form')[0]);
        $.ajax({
            url: base_url + 'appointment-info',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: admission_data,
            success: function(result) {
                console.log(result);
                if (result.errors) {
                    $('#add-alert-danger').html('');

                    $.each(result.errors, function(key, value) {
                        //console.log(value);
                        //$('#class-section-modal').modal('show');
                        $('.add-div-error').show();
                        //$('.alert-danger').show();
                        $('#add-alert-danger').append('<li>' + value + '</li>');
                        if (value != "") {

                            swal("Oops!", "Nadra B Form Already Exist!", "error");
                        }

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

                    setTimeout(function() { window.location.href = base_url + "staff"; }, 2000);

                }
            }
        });
        //form.submit();
    }
});
/*add employee form validation*/

/*edit employee form validation*/
$("#edit-employee-form").validate({
    rules: {
        roles: {
            required: true
        },
        given_name: {
            required: true
        },
        surname: {
            required: true
        },
        father: {
            required: true
        },
        gender: {
            required: true
        },

        marital_status: {
            required: true
        },
        blood_group: {
            required: true
        },

        staff_cnic: {
            required: true
        },

        date_of_birth: {
            required: true
        },
        religion: {
            required: true
        },

        nationality: {
            required: true
        },
        employee_district: {
            required: true
        },
        staff_cast: {
            required: true
        },

        hire_date: {
            required: true
        },
        adjustment_date: {
            required: true
        },
        /* employee_status: {
             required: true
         },*/
        contract_type: {
            required: true
        },
        staff_contract_duration: {
            required: true
        },
        employee_type: {
            required: true
        },
        desig_Id: {
            required: true
        },
        /*qual_sno: {
            required: true
        },*/
        mailing_address: {
            required: true
        },
        country: {
            required: true
        },
        state: {
            required: true
        },
        district: {
            required: true
        },
        employee_city: {
            required: true
        },
        // zip_code: {
        //     required: true
        // },
        permanent_address: {
            required: true
        },

        employee_mobile_phone: {
            required: true
        },
        // employee_home_phone: {
        //     required: true
        // },
        employee_email: {
            required: true
        },
        emergency_contact_name: {
            required: true
        },
        emergency_contact_phone: {
            required: true
        },
        relation: {
            required: true
        }


    },
    messages: {
        roles: {
            required: "Please select a Role"
        },
        given_name: {
            required: "Please enter given name"
        },

        surname: {
            required: "Please enter surname"
        },

        father: {
            required: "Please enter father name"
        },

        gender: {
            required: "Please select a gender"
        },

        marital_status: {
            required: "Please select a martial status"
        },
        blood_group: {
            required: "Please select blood group"
        },
        staff_cnic: {
            required: "Please enter Empoyee Cnic"
        },
        date_of_birth: {
            required: "Please select a date of birth"
        },

        religion: {
            required: "Please a select religion"
        },

        //employee_image:{required: 'Please upload employee image'},

        nationality: {
            required: "Please select a nationality"
        },
        employee_district: {
            required: "Please select a employee district"
        },
        staff_cast: {
            required: "Please select a cast"
        },

        hire_date: {
            required: "Please select a hire date"
        },
        adjustment_date: {
            required: "Please select a adjustment date"
        },
        /* employee_status:{
             required: "Please select employee status.",
         },*/
        contract_type: {
            required: "Please select a contract type"
        },
        staff_contract_duration: {
            required: "Please enter staff contract duration"
        },
        employee_type: {
            required: "Please select a employee type"
        },
        desig_Id: {
            required: "Please select a designation"
        },
        mailing_address: {
            required: "Please enter mailing address"
        },
        country: {
            required: "Please select a country"
        },
        state: {
            required: "Please select a state"
        },
        district: {
            required: "Please select a district"
        },
        employee_city: {
            required: "Please select a employee city"
        },
        // zip_code: {
        //     required: "Please enter zipcode"
        // },
        permanent_address: {
            required: "Please enter permanent address"
        },

        employee_mobile_phone: {
            required: "Please enter phone no"
        },
        // employee_home_phone: {
        //     required: "Please enter employee home phone no"
        // },
        employee_email: {
            required: "Please enter email address"
        },
        emergency_contact_name: {
            required: "Please enter emergency contact name"
        },
        emergency_contact_phone: {
            required: "Please enter emergency contact name"
        },
        relation: {
            required: "Please select a relation"
        }
    }, 
    submitHandler: function(form, e) {
        e.preventDefault();
        $('#edit-employee-form').attr('action', base_url + 'update-appointment-info');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var edit_admission_data = new FormData($('#edit-employee-form')[0]);

        $.ajax({
            url: base_url + 'update-appointment-info',
            enctype: 'multipart/form-data',
            method: 'post',
            contentType: false,
            processData: false,
            data: edit_admission_data,
            success: function(result) {
                console.log(result);
                if (result.errors) {
                    $('#add-alert-danger').html('');

                    $.each(result.errors, function(key, value) {
                        //console.log(value);
                        //$('#class-section-modal').modal('show');
                        $('.add-div-error').show();
                        //$('.alert-danger').show();
                        $('#add-alert-danger').append('<li>' + value + '</li>');

                    });
                } else {
                    // $('#success-message').html('');
                    // $('.add-div-error').hide();

                    // $('#class-section-modal').modal('hide');
                    // $('#success-message').show();
                    // $('#success-message').append('<p>' + result.message + '</p>');
                    // //$('#success-alert').show();
                    // $('#success-message').text('Successfully Added!').fadeIn('slow');
                    // $('#success-message').delay(2000).fadeOut('slow');
                    // //location.reload();
                    swal({
                        title: "Updated successfully!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                    });

                    setTimeout(function() { window.location.href = base_url + 'staff'; }, 2000);
                }
            }
        });
    }
});




/*edit employee form validation*/

/*start edit student Admission*/

/*start edit student Admission*/
/*});*/

/*    window.setTimeout(function () {
        $("#success-message").alert('close');
    }, 2000);*/

<footer class="footer footer-black  footer-white ">
    <div class="container-fluid">
        <div class="row">
            <nav class="footer-nav">
                <ul>
                    <li><a href="#" target="_blank">SCIMS</a></li>
                </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write("2021-"+ new Date().getFullYear())+",";
                </script>, by Point Web Tech Pvt Ltd
              </span>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
 
<!--   Core JS Files   -->
<script> var base_url = "{{ env('APP_URL') }}";
    var asset_url = "{{ env('ASSET_URL') }}";
  
</script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
{{-- printthis --}}
<script src="{{asset('js/print/printThis.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{asset('js/slidmini.js')}}"></script> {{-- sidebar slide adjust--}}
{{--<script src="{{asset('adminassets/js/core/jquery.min.js')}}"></script>--}}
<script src="{{asset('adminassets/js/core/popper.min.js')}}"></script>
<script src="{{asset('adminassets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('adminassets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('adminassets/js/plugins/moment.min.js')}}"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('adminassets/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Plugin for Sweet Alert -->
<script src="{{asset('adminassets/js/plugins/sweetalert.min.js')}}"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('adminassets/js/plugins/jquery.validate.min.js')}}"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('adminassets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('adminassets/js/plugins/bootstrap-selectpicker.js')}}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{asset('adminassets/js/plugins/bootstrap-datetimepicker.js')}}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{asset('adminassets/js/plugins/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('adminassets/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('adminassets/js/jszip.min.js')}}"></script>
<script src="{{asset('adminassets/js/buttons.print.min.js')}}"></script>
<script src="{{asset('adminassets/js/pdfmake.min.js')}}"></script>
<script src="{{asset('adminassets/js/vfs_fonts.js')}}"></script>
<script src="{{asset('adminassets/js/buttons.html5.min.js')}}"></script>

<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('adminassets/js/plugins/bootstrap-tagsinput.js')}} "></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('adminassets/js/plugins/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
{{--<script src="{{asset('adminassets/js/plugins/fullcalendar/fullcalendar.min.js')}} "></script>
<script src="{{asset('adminassets/js/plugins/fullcalendar/daygrid.min.js')}}"></script>
<script src="{{asset('adminassets/js/plugins/fullcalendar/timegrid.min.js')}}"></script>
<script src="{{asset('adminassets/js/plugins/fullcalendar/interaction.min.js')}}"></script>--}}
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{asset('adminassets/js/plugins/jquery-jvectormap.js')}}"></script>
<!--  Plugin for the Bootstrap Table -->
<script src="{{asset('adminassets/js/plugins/nouislider.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Chart JS -->
<script src="{{asset('adminassets/js/plugins/chartjs.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('adminassets/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('adminassets/js/paper-dashboard.min1036.js?v=2.1.1')}}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('adminassets/demo/demo.js')}}"></script>
<!-- Sharrre libray -->
<script src="{{asset('adminassets/demo/jquery.sharrre.js')}}"></script>


{{-- scrip for pie chart starts --}}
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
<script>
    $(document).ready(function() {
        var ctx = $("#chart-line");
        var activeStaff = document.getElementById('chart-line').getAttribute('data-id').split(',');
        var presentStaff = activeStaff[0];
        var absentStaff = activeStaff[1];
        var lateStaff = activeStaff[2];
        var myLineChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Present", "Absent", "Late" ],

                datasets: [{
                    data: [presentStaff, absentStaff, lateStaff],
                    backgroundColor: ["#2ca01c", "#dc3545", "#ffc107"]
                }],
            },
            options: {
                title: {
                    display: false,
                    text: '',

                }
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        var ctx = $("#std-chart");
        var activeStd = document.getElementById('std-chart').getAttribute('data-id').split(',');
        var presentStd = activeStd[0];
        var absentStd = activeStd[1];
        var lateStd = activeStd[2];
        var myLineChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Present", "Absent", "Late" ],

                datasets: [{
                    data: [presentStd, absentStd, lateStd],
                    backgroundColor: ["#2ca01c", "#dc3545", "#ffc107"]
                }],
            },
            options: {
                title: {
                    display: false,
                    text: '',

                }
            }
        });
    });
</script>
{{-- scrip for pie chart ends --}}

{{--sweet alert script starts--}}
 <script>
    

        // document.querySelector(".conf_msg").addEventListener("click", function() {
            // const promise2 =
            // .then(successCallback, failureCallback);
        $(document).ready(function() {

            $('.conf_msg').on('click', function () {
                //$(this).closest().find('div.form-group').css("display", "none");
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
                            swal.close();

                            $('#add-guardian-modal').modal('hide');
                            $('#mymother-modal').modal('hide');
                            $('#user-modal').modal('hide');
                            // $('#newclass').modal('hide');
                            // $('#class-section-modal').modal('hide');
                            // $('#SubjectModal').modal('hide');
                            // $('#PeriodModal').modal('hide');
                            // $('#user-modal').modal('hide');
                            // $('#schedule-exam').modal('hide');

                        }
                    });
            });

        });
    </script>

    <script>
        $("#cancel").click(function() {
            $.ajax({
            success: function(result){
                $("#medal").css("background","black");
            }});
        });
    </script>
    
    <script>
        $('.chnge_status').on('click',function () {
            //$(this).closest().find('div.form-group').css("display", "none");
            swal({
                    title: "Are you sure?",
                    text: "You want to change the status!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-primary",
                    cancelButtonClass: "btn-danger",
                    confirmButtonText: "No",
                    cancelButtonText: "Yes",
                    closeOnConfirm: false,
                    closeOnCancel: false,
                    // showCancelButton: true,
                    // confirmButtonClass: "btn-danger",
                    // confirmButtonText: "No",
                    // cancelButtonText: "Yes",
                    // confirmButtonClass: "btn-danger",
                    // closeOnConfirm: false,
                    // closeOnCancel: false,

                },
                function (isConfirm) {
                    if (isConfirm) {
                        // location.reload();
                        swal.close();
                    } else {
                        // location.reload();
                        var myhref = $('.chnge_status').attr("data-id")

                        setTimeout(function(){
                            swal("Status Changed Successfully!", { type : "success"},"success");
                            }, 3000);
                        window.location.href= myhref;

                    }
                });
        });
    </script>
    <script>
        $('.delete-class-btn').on('click', function () {
            var $this = $(this);
            //alert($this);

            /*var class_section_id = $(this).data('id');
            class_section_id.closest('div').find('.form-group').css("display", "none")*/
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
                        $.get('class-section/delete/'+class_section_id, function(data) {
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
                          
                    }
                });
        });
    </script>
<script src="{{asset('adminassets/demo/demo.js')}}"></script>
@yield('front_script')
@include('include.common_scripts')

</body>
 
</html>

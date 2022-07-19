
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
                  document.write(new Date().getFullYear())
                </script> by Point Web Tech Pvt Ltd
              </span>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

<!--   Core JS Files   -->
<script> var base_url = "{{ env('APP_URL') }}"
    var asset_url = "{{ env('ASSET_URL') }}"
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{asset('js/slidmini.js')}}"></script> {{-- sidebar slide adjust--}}
{{--<script src="{{asset('adminassets/js/core/jquery.min.js')}}"></script>--}}
<script src="{{asset('adminassets/js/core/popper.min.js')}}"></script>
<script src="{{asset('adminassets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('adminassets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('adminassets/js/plugins/moment.min.js')}}"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('adminassets/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Plugin for Sweet Alert -->
<script src="{{asset('adminassets/js/plugins/sweetalert2.min.js')}}"></script>
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
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('adminassets/js/plugins/bootstrap-tagsinput.js')}} "></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('adminassets/js/plugins/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{asset('adminassets/js/plugins/fullcalendar/fullcalendar.min.js')}} "></script>
<script src="{{asset('adminassets/js/plugins/fullcalendar/daygrid.min.js')}}"></script>
<script src="{{asset('adminassets/js/plugins/fullcalendar/timegrid.min.js')}}"></script>
<script src="{{asset('adminassets/js/plugins/fullcalendar/interaction.min.js')}}"></script>
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
<script>
    var url = document.location.href;  // Getting the url
    var str = url.substr(0, url.lastIndexOf('/')); // get the specific url
    var nUrl = url.substr(url.lastIndexOf('/')+1); // Get the page name from url

    $('.main-menu li a').each(function(){
        if( $(this).attr('href') === nUrl){ // Comparing if we on the same page or not
            $(this).addClass('active'); // applying the class on the active page
        };
    });
</script>

{{--Custom Script for Pages--}}
@yield('front_script')

{{--Custom Script for Pages--}}
</body>


<!-- Mirrored from demos.creative-tim.com/paper-dashboard-2-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Jan 2021 14:42:52 GMT -->
</html>

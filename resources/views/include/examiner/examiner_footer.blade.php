
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
{{--<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Background</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors text-center">
                        <span class="badge filter badge-default active" data-color="default"></span>
                        <span class="badge filter badge-light" data-color="white"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title"> Sidebar Active Color</li>
            <li class="adjustments-line text-center">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                    <span class="badge filter badge-primary" data-color="primary"></span>
                    <span class="badge filter badge-info" data-color="info"></span>
                    <span class="badge filter badge-success" data-color="success"></span>
                    <span class="badge filter badge-warning" data-color="warning"></span>
                    <span class="badge filter badge-danger active" data-color="danger"></span>
                </a>
            </li>
            <li class="header-title">
                Sidebar Mini
            </li>
            <li class="adjustments-line">
                <div class="togglebutton switch-sidebar-mini">
                    <label class="switch-mini">
                        <input class="bootstrap-switch" type="checkbox" data-toggle="switch" data-on-color="info" data-off-color="info" data-on-label="ON" data-off-label="OFF">
                        <span class="toggle"></span>
                    </label>
                </div>
            </li>
        </ul>
    </div>
</div>--}}
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

{{--sweet alert script starts--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js" integrity="sha512-XVz1P4Cymt04puwm5OITPm5gylyyj5vkahvf64T8xlt/ybeTpz4oHqJVIeDtDoF5kSrXMOUmdYewE4JS/4RWAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{--<script src="{{asset('adminassets/js/plugins/sweetalert2.min.js')}}"></script>--}}

{{--sweet alert cdn ends--}}

{{--Custom Script for Pages--}}
@yield('front_script')

{{--Custom Script for Pages--}}
</body>


<!-- Mirrored from demos.creative-tim.com/paper-dashboard-2-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Jan 2021 14:42:52 GMT -->
</html>

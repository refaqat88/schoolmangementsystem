
<footer class="main-footer">
    <strong>Copyright &copy; 2020-{{date('Y')}} <a href="#">Point Web Tech</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script> var admin = "{{ url('admin') }}"; </script>
<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('adminlte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('adminlte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('adminlte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.js')}}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte/dist/js/demo.js')}}"></script>
<!-- sweet alert cdn -->
<!--  Plugin for Sweet Alert -->
{{--<script src="{{asset('assets/js/plugins/sweetalert2.min.js')}}"></script>--}}
<!-- Forms Validations Plugin -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
    $('a.delete').confirm({
        content: '<h3 class="text-center"><i class="fas fa-exclamation-triangle"></i></h3>'+
                '<h4 class="text-center">This record will be deleted permanently!</h4>' +
                '<p class="text-center">Are you sure to proceed?</p>',

    });
    $('a.delete').confirm({
        buttons: {
            hey: function(){
                $.alert('Confirmed!');
                location.href = this.$target.attr('href');
            }
        }
    });
</script>
<script>
    $('a.cancel').confirm({
        content: '<h3 class="text-center"><i class="fas fa-exclamation-triangle"></i></h3>'+
            '<h4 class="text-center">This process will be cancelled!</h4>' +
            '<p class="text-center">Are you sure to proceed?</p>',

    });
    $('a.cancel').confirm({
        buttons: {
            hey: function(){
                $.alert('Confirmed!');
                location.href = this.$target.attr('href');
            }
        }
    });
</script>

<!-- sweet cdn alert ends -->
@yield('custom_script')
</body>
</html>

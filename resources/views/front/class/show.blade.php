@extends('layouts.master')
@section('title', 'Add Class')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">

                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">Classes</h4>
                    </div>
                    <div class="card-body">

                                <div class="">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <h6 class="col-sm-12 text-center">New Class Details</h6>
                                                <div class="form-group col-sm-6">
                                                    <label>Class Name</label>
                                                    <p>{{$class->class}}</p>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Numeric Name</label>
                                                    <p>{{$class->numeric_name}}</p>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>No of Periods</label>
                                                    <p>{{$class->numeric_name}}</p>
                                                </div>
                                                <div class=" col-sm-6 select-wizard">
                                                    <label>Assign Teacher</label>
                                                    <p>{{$class->numeric_name}}</p>
                                                </div>
                                                <div class=" col-sm-6 select-wizard">
                                                    <label for="school-section">School Section</label>
                                                        @foreach($school_sections as $school_section)
                                                            @if($class->sc_sec_Id==$school_section->sc_sec_Id)
                                                             <p>{{$school_section->sc_sec_name}}</p>
                                                            @endif
                                                        @endforeach
                                                     </div>
                                                     <div class="form-group col-sm-6">
                                                         <label for="add-tuition-fee">Tuition Fee</label>
                                                         <p>{{$class->tuition_fee}}</p>
                                                     </div>
                                                     <div class="col-sm-12">
                                                         <label for="add-subject">Assign Subjects</label>
                                                         <select class="" id="add-subject" name="subject[]" data-style="btn btn-secondary" multiple="multiple" title="Choose Subjects" data-size="10">
                                                             <option disabled> Choose Subjects</option>
                                                            @foreach($subjects as $subject))
                                                            <option value="{{$subject->sub_Id}}">{{$subject->subject}} </option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                       {{-- <div class="divider"></div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <h6 class="col-sm-12">Add Section</h6>
                                                <div class=" col-sm-6 select-wizard">
                                                    <label>For Class</label>
                                                    <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Class" >
                                                        <option value="" disabled selected>Select Class</option>
                                                        <option value="1">Playgroup</option>
                                                        <option value="2">Kindergarten</option>
                                                        <option value="3">Preparatory</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                        <option value="1">Four</option>
                                                        <option value="2">Five</option>
                                                        <option value="3">Six</option>
                                                        <option value="1">Seven</option>
                                                        <option value="2">Eight</option>
                                                        <option value="3">Eleven</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Section Name</label>
                                                    <input type="text" class="form-control" placeholder="" name="houseallow"  number="true" number="true">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Add Students</label>
                                                    <select class="selectpicker" data-style="btn btn-secondary " multiple title="Choose Students" data-size="7">
                                                        <option disabled> Choose Students</option>
                                                        <option value="1">Ali</option>
                                                        <option value="2">Basit</option>
                                                        <option value="2">Kashif</option>
                                                        <option value="1">Ahmed</option>
                                                        <option value="2">Jaffar</option>
                                                        <option value="3">Muneer</option>
                                                        <option value="3">Saleem</option>
                                                        <option value="3">Awais</option>
                                                        <option value="1">Ahmed</option>
                                                        <option value="2">Jaffar</option>
                                                        <option value="3">Muneer</option>
                                                        <option value="3">Saleem</option>
                                                        <option value="3">Awais</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>No of Students Added</label>
                                                    <input type="text" class="form-control" placeholder="" name="houseallow"  number="true" number="true">
                                                </div>
                                                <div class=" col-sm-6 select-wizard">
                                                    <label>Assign Class Rep</label>
                                                    <select class="selectpicker" data-size="7" data-style="btn btn-secondary" title="Select Billing Scgedule" >
                                                        <option value="" disabled selected>Select Student</option>
                                                        <option value="1">Ali</option>
                                                        <option value="2">Basit</option>
                                                        <option value="2">Kashif</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>--}}
                                    </div>
                                    <!--<div class="row modal-body">-->
                                    <!--<h6 class="col-sm-12">Pension Details</h6>-->
                                    <!--<div class="form-group col-sm-3">-->
                                    <!--<label>GPF Employer Share (%age)</label>-->
                                    <!--<input type="text" class="form-control" placeholder="" name="deduction"  number="true" number="true">-->
                                    <!--</div>-->
                                    <!--<div class="form-group col-sm-3">-->
                                    <!--<label class="">Employee Pension Scheme (%age)</label>-->
                                    <!--<input type="text" class="form-control" placeholder="" name="netpay"  number="true" number="true">-->
                                    <!--</div>-->
                                    <!--<div class="form-group col-sm-3">-->
                                    <!--<label class="">Graduity Balance</label>-->
                                    <!--<input type="text" class="form-control" placeholder="" name="netpay"  number="true" number="true">-->
                                    <!--</div>-->
                                    <!--<div class="form-group col-sm-3">-->
                                    <!--<label class="">Total Pension Benefits</label>-->
                                    <!--<input type="text" class="form-control" placeholder="" name="netpay"  number="true" number="true">-->
                                    <!--</div>-->
                                    <!--</div>-->
                                    <div class="modal-footer">
                                        {{--<div class="">
                                            <button type="submit" class="btn btn-outline-success btn-round">Save</button>
                                        </div>
                                        <div class="divider"></div>--}}
                                        <div class="">
                                            <a href="{{url('class')}}" type="button" data-dismiss="modal" class="btn btn-outline-danger btn-round">Cancel</a>
                                        </div>
                                    </div>

                        </div>
                    </div>

                </div>

                <!--<div class="card-footer text-right">-->
                <!--<div class="form-check pull-left">-->
                <!--<label class="form-check-label">-->
                <!--<input class="form-check-input" type="checkbox" name="optionCheckboxes" required>-->
                <!--<span class="form-check-sign"></span>-->
                <!--Subscribe to newsletter-->
                <!--</label>-->
                <!--</div>-->
                <!--<button type="submit" class="btn btn-primary">Register</button>-->
                <!--</div>-->
        </div>
    </div>

</div>

@endsection

@section('front_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('front_script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('js/addclass_script.js')}}"></script>
<script>
$('select').select2({ width: '100%', placeholder: "Select an Option", allowClear: true, tags: true });
</script>
{{--<script>
        $(document).ready(function() {
            $('select').select2({ width: '100%', placeholder: "Select an Option", allowClear: true, tags: true });
            $('#facebook').sharrre({
                share: {
                    facebook: true
                },
                enableHover: false,
                enableTracking: false,
                enableCounter: false,
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('facebook');
                },
                template: '<i class="fab fa-facebook-f"></i> Facebook',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });

            $('#google').sharrre({
                share: {
                    googlePlus: true
                },
                enableCounter: false,
                enableHover: false,
                enableTracking: true,
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('googlePlus');
                },
                template: '<i class="fab fa-google-plus"></i> Google',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });

            $('#twitter').sharrre({
                share: {
                    twitter: true
                },
                enableHover: false,
                enableTracking: false,
                enableCounter: false,
                buttons: {
                    twitter: {
                        via: 'CreativeTim'
                    }
                },
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('twitter');
                },
                template: '<i class="fab fa-twitter"></i> Twitter',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });



            // Facebook Pixel Code Don't Delete
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window,
                document, 'script', '../../../../connect.facebook.net/en_US/fbevents.js');

            try {
                fbq('init', '111649226022273');
                fbq('track', "PageView");

            } catch (err) {
                console.log('Facebook Track Error:', err);
            }

        });
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1" />
    </noscript>
    <script>
        $(document).ready(function() {

            $sidebar = $('.sidebar');
            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');
            sidebar_mini_active = false;

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            // if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
            //     if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
            //         $('.fixed-plugin .dropdown').addClass('show');
            //     }
            //
            // }

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-active-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('data-active-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-active-color', new_color);
                }
            });

            $('.fixed-plugin .background-color span').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });


            $('.switch-mini input').on("switchChange.bootstrapSwitch", function() {
                $body = $('body');

                $input = $(this);

                if (paperDashboard.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    paperDashboard.misc.sidebar_mini_active = false;
                } else {
                    $('body').addClass('sidebar-mini');
                    paperDashboard.misc.sidebar_mini_active = true;
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });

        });
    </script>
    <script>
        function setFormValidation(id) {
            $(id).validate({
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
                    $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
                },
                success: function(element) {
                    $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
                    $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
                },
                errorPlacement: function(error, element) {
                    $(element).closest('.form-group').append(error);
                },
            });
        }

        $(document).ready(function() {
            setFormValidation('#RegisterValidation');
            setFormValidation('#TypeValidation');
            setFormValidation('#LoginValidation');
            setFormValidation('#RangeValidation');
        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialise the wizard
            demo.initWizard();
            setTimeout(function() {
                $('.card.card-wizard').addClass('active');
            }, 600);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search",
                }

            });

            var table = $('#datatable').DataTable();

            // Edit record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');

                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function() {
                alert('You clicked on Like button');
            });
        });
    </script>--}}
@endsection

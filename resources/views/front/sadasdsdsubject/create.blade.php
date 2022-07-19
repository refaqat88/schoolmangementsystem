@extends('layouts.master')
@section('title', 'Add Subject')
@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Subjects</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="col-sm-12 pull-right">
                                <button class="btn btn-secondary pull-right" data-toggle="modal"
                                        data-target="#SubjectModal" id="ShowSubject">
                                    Add New Subject
                                </button>
                            </div>
                        </div>
                        <div class="modal fade" id="SubjectModal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Add New Subject</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <form id="SubjectForm" action="" method="Post">
                                            @csrf
                                            <div class="col-sm-12">
                                                <div class="div-error" style="display:none">
                                                    <div class="alert alert-danger alert-dismissible fade show"
                                                         role="alert" id="add-alert-danger">
                                                        <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <ul class="p-0 m-0" style="list-style: none;">
                                                            <li></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="name">
                                                        <span class="" id="name-error"></span>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Code</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="code">
                                                        <span id="code-error"></span>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Theory Marks</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="theory_marks">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Practical Marks</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="practical_marks">
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label>Total Marks</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="total_marks">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Passing Marks</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="passing_marks">
                                                    </div>
                                                </div>
                                            </div>
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
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-link" id="Save-Btn">Save
                                            </button>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="">
                                            <button type="button" data-dismiss="modal" class="btn btn-danger btn-link">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="EditSubjectModal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Edit Subject</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <form id="EditSubjectForm" action="" method="Post">
                                            @csrf
                                            <input type="hidden" name="id" id="sub_id">
                                            <div class="col-sm-12">
                                                <div class="edit-div-error" style="display:none">
                                                    <div class="alert alert-danger alert-dismissible fade show"
                                                         role="alert" id="edit-alert-danger">
                                                        <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <ul class="p-0 m-0" style="list-style: none;">
                                                            <li></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="name" id="sub_name">

                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Code</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="code" id="sub_code">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Theory Marks</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="theory_marks" id="theory_marks">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Practical Marks</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="practical_marks" id="practical_marks">
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label>Total Marks</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="total_marks" id="total_marks">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Passing Marks</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                               name="passing_marks" id="passing_marks">
                                                    </div>
                                                </div>
                                            </div>
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
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-link" id="update-Btn">Save
                                            </button>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="">
                                            <button type="button" data-dismiss="modal" class="btn btn-danger btn-link">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="ShowSubjectModal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Show Subject</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>Name</label>
                                                    <p id="show_sub_name"></p>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Code</label>
                                                    <p id="show_sub_code"></p>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Theory Marks</label>
                                                    <p id="show_theory_marks"></p>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Practical Marks</label>
                                                    <p id="show_practical_marks"></p>
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label>Total Marks</label>
                                                    <p id="show_total_marks"></p>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Passing Marks</label>
                                                    <p id="show_passing_marks"></p>
                                                </div>
                                            </div>
                                        </div>
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
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-link" id="Show-Btn">Save
                                            </button>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="">
                                            <button type="button" data-dismiss="modal" class="btn btn-danger btn-link">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @if(session()->has('message'))
                                <div class="alert alert-success col-md-6" id="success-alert1">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <div class="alert alert-success" id="success-message" style="display: none">
                                {{--{{ session()->get('message') }}--}}
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">Students Record List</h6>
                                </div>
                                <div class="card-body">
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0"
                                           width="100%">
                                        <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th class="disabled-sorting text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th class="disabled-sorting text-center">Actions</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php $i=1;  ?>
                                        @foreach($subjects as $subject)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$subject->subject}}</td>
                                                <td>{{$subject->sub_Code}}</td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" title="View"
                                                       class="btn btn-info btn-link btn-icon btn-sm show"
                                                       id="show-subject" data-toggle="modal"
                                                       data-id="{{ $subject->sub_Id }}"><i class="fa fa-eye"></i></a>
                                                    {{--<a href="{{url('edit-subject/'.$subject->sub_Id)}}"   title="Edit" class="btn btn-warning btn-link btn-icon btn-sm edit" id="EditSubject"><i class="fa fa-edit"></i></a>
                                                    --}}
                                                    <a href="javascript:void(0)"
                                                       class="btn btn-warning btn-link btn-icon btn-sm edit"
                                                       id="edit-subject" data-toggle="modal"
                                                       data-id="{{ $subject->sub_Id }}"><i class="fa fa-edit"></i> </a>
                                                    <a href="{{url('delete-subject/'.$subject->sub_Id)}}" title="Delete"
                                                       class="btn btn-danger btn-link btn-icon btn-sm edit"
                                                       onclick="return confirm('Are you sure you want to delete this Subject?');"><i
                                                            class="fa fa-times"></i></a>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- end content-->
                            </div><!--  end card  -->
                        </div> <!-- end col-md-12 -->
                    </div> <!-- end row -->

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

@section('subject_script')
    <script src="{{asset('adminassets/validator/dist/jquery.validate.js')}}"></script>
    <script src="{{asset('js/subject_script.js')}}"></script>
    <script>
        $(document).ready(function () {


            $('#facebook').sharrre({
                share: {
                    facebook: true
                },
                enableHover: false,
                enableTracking: false,
                enableCounter: false,
                click: function (api, options) {
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
                click: function (api, options) {
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
                click: function (api, options) {
                    api.simulateClick();
                    api.openPopup('twitter');
                },
                template: '<i class="fab fa-twitter"></i> Twitter',
                url: 'https://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard.html'
            });


            // Facebook Pixel Code Don't Delete
            !function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
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
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=111649226022273&amp;ev=PageView&amp;noscript=1"/>
    </noscript>
    <script>
        $(document).ready(function () {

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

            $('.fixed-plugin a').click(function (event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function () {
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

            $('.fixed-plugin .background-color span').click(function () {
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

            $('.fixed-plugin .img-holder').click(function () {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function () {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function () {
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

            $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function () {
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


            $('.switch-mini input').on("switchChange.bootstrapSwitch", function () {
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
                var simulateWindowResize = setInterval(function () {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function () {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });

        });
    </script>
    <script>
        function setFormValidation(id) {
            $(id).validate({
                highlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
                    $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
                },
                success: function (element) {
                    $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
                    $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
                },
                errorPlacement: function (error, element) {
                    $(element).closest('.form-group').append(error);
                },
            });
        }

        $(document).ready(function () {
            setFormValidation('#RegisterValidation');
            setFormValidation('#TypeValidation');
            setFormValidation('#LoginValidation');
            setFormValidation('#RangeValidation');
        });
    </script>
    <script>
        $(document).ready(function () {
            // Initialise the wizard
            demo.initWizard();
            setTimeout(function () {
                $('.card.card-wizard').addClass('active');
            }, 600);
        });
    </script>
    <script>
        $(document).ready(function () {
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

            /*      var table = $('#datatable').DataTable();

                  // Edit record
                  table.on('click', '.edit', function() {
                      $tr = $(this).closest('tr');

                      var data = table.row($tr).data();
                      alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
                  });*/

            // Delete a record
            /*     table.on('click', '.remove', function(e) {
                     $tr = $(this).closest('tr');
                     table.row($tr).remove().draw();
                     e.preventDefault();
                 });*/

            //Like record
            /* table.on('click', '.like', function() {
                 alert('You clicked on Like button');
             });*/
        });
    </script>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>Kisan 27</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="{{ asset('logo/favicon.icon') }}" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/theme-default.css') }}" />
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/notification.css') }}" />
    <link rel="stylesheet" type="text/css" id="theme"
        href=" https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" id="theme"
        href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" />



    <!-- EOF CSS INCLUDE -->
    @yield('extra_css')

</head>

<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container page-navigation-top">
        <!-- PAGE CONTENT -->
        <div class="page-content">

            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal">
                <li class="xn-logo" style="margin-right:30px;">
                    <a> <img src="{{ 'logo/Logo.png' }}" alt="" style="margin-top:-8px;" /></a>
                    <a href="#" class="x-navigation-control"></a>
                </li>
                <!--  <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/avatar.jpg" alt="EMR - OPD Software"/>
                        </a>
                    </li>     -->
                <li class="xn-openable">
                    <a href="{{ route('dashboard-view') }}" title="Admin Dashboard"><span
                            class="fa fa-dashboard"></span>Dashboard</a>
                </li>

                <li class="xn-openable">
                    <a href="{{ route('state-index') }}" title="Master Entries"><span
                            class="fa fa-list"></span>Masters</a>
                    <!-- <ul>
                        <li><a href="area_master.html"><span class="fa fa-plus"></span>Area Master</a></li>
                        <li><a href="role_master.html"><span class="fa fa-plus"></span>Role</a></li>

                    </ul> -->
                </li>
                <!-- <li class="xn-openable">
                    <a href="../admin/emp_reg.html" title="Master Entries"><span class="fa fa-list"></span>Employee</a>
                </li> -->
                <li class="xn-openable">
                    <a title="Employee"><span class="fa fa-navicon"></span>Registration</a>
                    <ul>
                        <li><a href="{{ route('sales_manager-index') }}"><span class="fa fa-plus"></span>Sales
                                Manager</a></li>
                        <li><a href="{{ route('area_manager-index') }}"><span class="fa fa-plus"></span>ASM</a></li>
                        <li><a href="{{ route('sales_person-index') }}"><span class="fa fa-plus"></span>SP/JTM/TM/SO/STM
                                Registration</a></li>
                         <li><a href="{{ route('retailers-index') }}"><span class="fa fa-plus"></span> Retailers</a></li>
                        <li><a href="{{ route('distributor-index') }}"><span class="fa fa-plus"></span> Distributor</a></li> 
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="{{ route('assign_team-index') }}" title="Master Entries"><span
                            class="fa fa-users"></span>Assign Team</a>
                </li>
                <!-- <li class="xn-openable">
                    <a href="../admin/#" title="Master Entries"><span class="fa fa-list"></span>Masters</a>
                </li> -->
                <!--
                <li class="xn-openable">
                    <a href="../admin/#" title="Users Management"><span class="fa fa-user"></span>User Management</a>
                </li> -->
                <li class="xn-icon-button pull-right">
                    <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                </li>
                <!-- MESSAGES -->
                <li class="xn-icon-button pull-right"
                    style="margin-right:25px; min-width:100px; color:#FFFFFF; padding-top:20px;">
                    Welcome, Admin
                </li>

            </ul>

            <!-- END X-NAVIGATION -->

            @yield('content')


            <!-- END PAGE CONTENT -->


            <!-- MESSAGE BOX-->
            <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
                <div class="mb-container">
                    <div class="mb-middle">
                        <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                        <div class="mb-content">
                            <p>Are you sure you want to log out?</p>
                            <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                        </div>
                        <div class="mb-footer">
                            <div class="pull-right">
                                <a href="{{ route('/') }}" class="btn btn-success btn-lg">Yes</a>
                                <button class="btn btn-default btn-lg mb-control-close">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MESSAGE BOX-->

            <!-- START PRELOADS -->
            <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
            <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
            <!-- END PRELOADS -->

            <!-- START SCRIPTS -->
            <script type="text/javascript" src="{{ asset('js/plugins/jquery/jquery.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/plugins/jquery/jquery-ui.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap.min.js') }}"></script>
            <!-- END PLUGINS -->

            <!-- THIS PAGE PLUGINS -->
            <script type="text/javascript" src="{{ asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}">
            </script>
            <script type='text/javascript' src="{{ asset('js/plugins/icheck/icheck.min.js') }}"></script>



            <script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap-timepicker.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap-colorpicker.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap-file-input.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap-select.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/plugins/tagsinput/jquery.tagsinput.min.js') }}"></script>


            {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> --}}


            <script type="text/javascript" src="{{ asset('js/plugins/dropzone/dropzone.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/plugins/fileinput/fileinput.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/plugins/filetree/jqueryFileTree.js') }}"></script>

            {{-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js
                         "></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> --}}


             <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
             <script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
             <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
             <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
             <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
             <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
             <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
             <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
             <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>


            <!-- START TEMPLATE -->


            <script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/actions.js') }}"></script>
            <!-- END TEMPLATE -->


            <script>
                $(document).ready(function() {
                    var now = new Date();
                    var month = (now.getMonth() + 1);
                    var day = now.getDate();
                    if (month < 10)
                        month = "0" + month;
                    if (day < 10)
                        day = "0" + day;
                    var today = now.getFullYear() + '-' + month + '-' + day;
                    $('.datePicker').val(today);
                });

                $(function() {
                    $("#file-simple").fileinput({
                        showUpload: false,
                        showCaption: false,
                        browseClass: "btn btn-danger",
                        fileType: "any"
                    });
                    $("#filetree").fileTree({
                        root: '/',

                        expandSpeed: 100,
                        collapseSpeed: 100,
                        multiFolder: false
                    }, function(file) {
                        alert(file);
                    }, function(dir) {
                        setTimeout(function() {
                            page_content_onresize();
                        }, 200);
                    });
                });

               

            </script>
            @yield('js')

</body>

</html>

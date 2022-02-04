<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description"
          content="attendance, client management, finance, freelance, freelancer, goal tracking, Income Managment, lead management, payroll, project management, project manager, support ticket, task management, timecard">
    <meta name="keywords"
          content="	attendance, client management, finance, freelance, freelancer, goal tracking, Income Managment, lead management, payroll, project management, project manager, support ticket, task management, timecard">
    <title>Nashville | {{ ucfirst(Request::segment(2)) }}</title>
            <link rel="icon" href="/frontend/images/cropped-favicon-32x32.png" type="image/png">
        <!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="/admin/css/font-awesome.min.css">
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="/admin/css/simple-line-icons.css">
    <!-- ANIMATE.CSS-->
    <link rel="stylesheet" href="/admin/css/animate.min.css">
    <!-- =============== PAGE VENDOR STYLES ===============-->

    <!-- =============== APP STYLES ===============-->
                <!-- =============== BOOTSTRAP STYLES ===============-->
        <link rel="stylesheet" href="/admin/css/bootstrap.min.css" id="bscss">
        <link rel="stylesheet" href="/admin/css/app.css" id="maincss">
            <link id="autoloaded-stylesheet" rel="stylesheet"
              href="/admin/css/bg-danger-dark.css">


    <!-- SELECT2-->

    <link rel="stylesheet" href="/admin/css/select2.min.css">
    <link rel="stylesheet"
          href="/admin/css/select2-bootstrap.min.css">

    <!-- Datepicker-->
    <link rel="stylesheet" href="/admin/css/datepicker.min.css">

    <link rel="stylesheet" href="/admin/css/timepicker.min.css">

    <!-- Toastr-->
    <link rel="stylesheet" href="/admin/css/toastr.min.css">
    <!-- Data Table  CSS -->
    <link rel="stylesheet" href="/admin/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/admin/css/dataTables.colVis.min.css">
    <link rel="stylesheet" href="/admin/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="/admin/css/responsive.dataTables.min.css">
    <style>
        img[src=""] {
            display: none;
        }
    </style>
    <!-- summernote Editor -->

    <!--- bootstrap-select ---->
    <link href="/admin/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/admin/css/chat.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/vendor/fancybox/jquery.fancybox.css') }}" media="screen">
    <!-- JQUERY-->
    

    <link href="/admin/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="/admin/js/jquery.min.js"></script>
    <script src="/admin/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</head>


<script type="text/javascript">
    function startTime() {
        var c_time = new Date();
        var time = new Date(c_time.toLocaleString('en-US', {timeZone: 'Asia/Kathmandu'}));
        var date = time.getDate();
        var month = time.getMonth() + 1;
        var years = time.getFullYear();
        var hr = time.getHours();
        var hour = time.getHours();
        var min = time.getMinutes();
        var minn = time.getMinutes();
        var sec = time.getSeconds();
        var secc = time.getSeconds();
        if (date <= 9) {
            var dates = "0" + date;
        } else {
            dates = date;
        }
        if (month <= 9) {
            var months = "0" + month;
        } else {
            months = month;
        }
                var ampm = ' ';

        if (hr < 10) {
            hr = " " + hr
        }
        if (min < 10) {
            min = "0" + min
        }
        if (sec < 10) {
            sec = "0" + sec
        }
        document.getElementById('txt').innerHTML = hr + ":" + min + ":" + sec + ampm;
        var t = setTimeout(function () {
            startTime()
        }, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }
        ;  // add zero in front of numbers < 10
        return i;
    }

</script>
<body onload="startTime();" class="     ">
<div class="wrapper">
    <!-- top navbar-->

<header class="topnavbar-wrapper">
    <!-- START Top Navbar-->
    <nav role="navigation" class="navbar topnavbar">
        <!-- START navbar header-->
                <div class="navbar-header">
                            <a href="#/" class="navbar-brand">
                    <div class="brand-logo">
                        <img style="width: 100%;max-height: 42px;"
                             src="/uploads/logo_tranparent.png" alt="App Logo"
                             class="img-responsive">
                    </div>
                    <div class="brand-logo-collapsed">
                        <img style="width: 100%;height: 48px;border-radius: 50px"
                             src="/uploads/logo_tranparent.png" alt="App Logo"
                             class="img-responsive">
                    </div>
                </a>
                    </div>
        <!-- END navbar header-->
        <!-- START Nav wrapper-->
        <div class="nav-wrapper">
            <!-- START Left navbar-->
            <ul class="nav navbar-nav">
                <li>
                    <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                    <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                        <em class="fa fa-navicon"></em>
                    </a>
                    <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                    <a href="#" data-toggle-state="aside-toggled" data-no-persist="true"
                       class="visible-xs sidebar-toggle">
                        <em class="fa fa-navicon"></em>
                    </a>
                </li>
                <!-- END User avatar toggle-->
                <!-- START lock screen-->
                <li class="hidden-xs">
                    <a href="" class="text-center" style="vertical-align: middle;font-size: 20px;">Nashville Institute</a>
                </li>
                <!-- END lock screen-->
            </ul>
            <!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class="nav navbar-nav navbar-right">

                <!-- Search icon-->
                <li>
                    <a href="#" data-search-open="">
                        <em class="icon-magnifier"></em>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                    <ul class="dropdown-menu animated zoomIn">
                     <li>
                        <a href="">
                        New Post</a>
                     </li>
                     <li>
                        <a href="">
                        New Course</a>
                     </li>
                     <li>
                        <a href="">
                        New Study Page</a>
                     </li>
                     <li>
                        <a href="">
                        New Testimonial</a>
                     </li>
                     <li>
                        <a href="">
                        New Event Speaker</a>
                     </li>
                     <li>
                        <a href="">
                        New Event Category</a>
                     </li>
                     <li>
                        <a href="">
                        New Event</a>
                     </li>
                  </ul>
                </li>

                                <!-- START Alert menu-->
                <li class="dropdown dropdown-list notifications">
                    <a href="#" data-toggle="dropdown">
                    <em class="icon-bell"></em>
                    </a>
<!-- START Dropdown menu-->
                <ul class="dropdown-menu animated zoomIn notifications-list" data-total-unread="0"
                    style="width: 350px">
                    <li class="text-sm text-right" style="border-bottom: 1px solid rgb(238, 238, 238)">
                        <a href="#" class="list-group-item"
                           onclick="mark_all_as_read(); return false;">Mark all as read</a>
                    </li>
                                <li class="notification-li"
                                data-notification-id="91">
                                <!-- list item-->
                                <!-- list item-->
                                                <a href=""
                                   class="n-top n-link list-group-item ">
                                    <div class="n-box media-box ">
                                        <div class="pull-left">
                                                                        <img src="https://raw.githubusercontent.com/encharm/Font-Awesome-SVG-PNG/master/black/png/128/suitcase.png" alt="Avatar"
                                                 width="40"
                                                 height="40" class="img-thumbnail img-circle n-image">
                                        </div>
                                        <div class="media-box-body clearfix">
                                            <span class="n-title text-sm block">A new Training  By Android Apps Development   has been assigned to you</span>                            <small class="text-muted pull-left" style="margin-top: -4px"><i
                                                    class="fa fa-clock-o"></i> 2 years ago</small>
                                                                    </div>
                                    </div>
                                </a>
                            </li>
                            <li class="text-center">
                                    <a href="">View all notifications</a>
                            </li>
                    <!-- END list group-->
                </ul>

                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <img src="{{ \Auth::user()->image }}" class="img-xs user-image"
                             alt="User Image"/>
                        <span class="hidden-xs">{{ \Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu animated zoomIn">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ \Auth::user()->image }}" class="img-circle" alt="User Image"/>
                            <p>
                                {{ \Auth::user()->name }}
                                <!-- <small>Last Login:03.31.2020 23:05</small> -->
                            </p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                {{--<a href="{{ route('users.show', \Auth::user()->id) }}"
                                   class="btn btn-default btn-flat">Update Profile
                                </a>--}}
                            </div>
                            <form method="post" action="{{ route('logout') }}"  class="form-horizontal">
                              @csrf
                                <input type="hidden" name="clock_time" value="" id="time">
                                <div class="pull-right">
                                    <button type="submit"
                                            class="btn btn-default btn-flat">Log Out</button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
                        <em class="icon-notebook"></em>
                    </a>
                </li>
            </ul>
            <!-- END Right Navbar-->
        </div>
        <!-- END Nav wrapper-->
        <!-- START Search form-->
        <div class="navbar-form">
            <div class="form-group has-feedback">
                <div class="input-group">
                    <div class="input-group-btn">
                        <select id="searchType"
                                class="form-control">
                            <option value="projects">Projects</option>
                            <option value="tasks">Tasks</option>
                            <option value="employee">Employee</option>
                            <option value="client">Clients</option>
                            <option value="bugs">Bugs</option>
                            <option value="opportunities">Opportunities</option>
                            <option value="leads">Leads</option>
                            <option value="purchase">Purchase</option>
                            <option value="invoice">Invoices</option>
                            <option value="credit_note">Credit Note</option>
                            <option value="estimates">Estimates</option>
                            <option value="tickets">Tickets</option>
                        </select>
                    </div>
                    <input type="text" id="all_search" placeholder="Search your need ...."
                           class="form-control search-icon">
                    <div data-search-dismiss="" class="fa fa-times form-control-feedback"></div>
                </div>
            </div>
            <button type="submit" class="hidden btn btn-default">Submit</button>
        </div>
        <!-- END Search form-->
    </nav>
    <!-- END Top Navbar-->
</header>
@include('admin.partials.aside')

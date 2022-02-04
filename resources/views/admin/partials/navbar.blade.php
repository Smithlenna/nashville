<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ url('/admin/dashboard') }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-image"></i></span>
                    <span class="pcoded-mtext">Sliders</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" pcoded-hasmenu">
                    <li class="">
                        <a href="{{ route('sliders.create') }}">
                            <span class="pcoded-mtext">Add New</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('sliders.index') }}">
                            <span class="pcoded-mtext">Sliders</span>
                        </a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-edit-1"></i></span>
                    <span class="pcoded-mtext">Posts</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" pcoded-hasmenu">
                    <li class="">
                        <a href="{{ route('posts.create') }}">
                            <span class="pcoded-mtext">Add New</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('posts.index') }}">
                            <span class="pcoded-mtext">posts</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('category.index') }}">
                            <span class="pcoded-mtext">categories</span>
                        </a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-edit-1"></i></span>
                    <span class="pcoded-mtext">Courses</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" pcoded-hasmenu">
                    <li class="">
                        <a href="{{ route('courses.create') }}">
                            <span class="pcoded-mtext">Add New</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('courses.index') }}">
                            <span class="pcoded-mtext">courses</span>
                        </a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-globe"></i></span>
                    <span class="pcoded-mtext">Study Pages</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" pcoded-hasmenu">
                    <li class="">
                        <a href="{{ route('study.create') }}">
                            <span class="pcoded-mtext">Add New</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('study.index') }}">
                            <span class="pcoded-mtext">pages</span>
                        </a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                   <span class="pcoded-mtext">Testimonials</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" pcoded-hasmenu">
                    <li class="">
                        <a href="{{ route('testimonials.create') }}">
                            <span class="pcoded-mtext">Add New</span>
                        </a>
                    </li>
                   <li class="">
                        <a href="{{ route('testimonials.index') }}">
                            <span class="pcoded-mtext">testimonials</span>
                        </a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-package"></i></span>
                    <span class="pcoded-mtext">Events</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" pcoded-hasmenu">
                        <li class="">
                            <a href="{{ route('speakers.index') }}">
                                <span class="pcoded-mtext">Event Speaker</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('event_categories.index') }}">
                                <span class="pcoded-mtext">Event Category</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('events.index') }}">
                                <span class="pcoded-mtext">Events</span>
                            </a>
                        </li>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="{{ url('/admin/media/fileupload') }}">
                    <span class="pcoded-micon"><i class="feather icon-upload-cloud"></i></span>
                    <span class="pcoded-mtext">File Upload</span>
                </a>
            </li>
            <!--<li class="">-->
            <!--    <a href="{{ route('popups.create') }}">-->
            <!--        <span class="pcoded-micon"><i class="feather icon-layers"></i></span>-->
            <!--        <span class="pcoded-mtext">Pop up</span>-->
            <!--    </a>-->
            <!--</li>-->
            <li class="">
                <a href="{{ route('settings') }}">
                    <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                    <span class="pcoded-mtext">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

        <!--sidebar start-->
        <aside>
            <div id="sidebar"  class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li class="">
                        <a class="" href="{{ URL::to('admin/dashboard') }}">
                            <i class="icon-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="{{ URL::to('admin/users') }}">
                            <i class="icon-user"></i>
                            <span>User</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="{{ URL::to('admin/towerlink') }}">
                            <i class="icon-signal"></i>
                            <span>Tower Link</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="{{ URL::to('admin/towerReport') }}">
                            <i class="icon-file"></i>
                            <span>Tower Report</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="{{ URL::to('/downloads') }}">
                            <i class="icon-download"></i>
                            <span>Downloads</span>
                        </a>
                    </li>


                    {{--<li class="sub-menu ">--}}
                    {{--<a href="javascript:;" class="">--}}
                        {{--<i class="icon_documents_alt"></i>--}}
                        {{--<span>Pages</span>--}}
                        {{--<span class="menu-arrow arrow_carrot-right"></span>--}}
                        {{--</a>--}}
                    {{--<ul class="sub">--}}
                        {{--<li><a class="" href="profile.html">Profile</a></li>--}}
                        {{--<li><a class="" href="login.html"><span>Login Page</span></a></li>--}}
                        {{--<li><a class="active" href="blank.html">Blank Page</a></li>--}}
                        {{--<li><a class="" href="404.html">404 Error</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}

                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
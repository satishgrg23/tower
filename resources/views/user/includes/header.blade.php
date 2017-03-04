<?php
use Cartalyst\Sentinel\Users\EloquentUser;
use Carbon\Carbon;

if(Sentinel::check()){
    $id = Sentinel::getUser()->id;
    $user = EloquentUser::find($id);
}
?>
        <!--header start-->

        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="#" class="logo">GET <span class="lite">Tower</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>
                </ul>
                <!--  search form end -->

            </div>

            <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- alert notification start-->
                    <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-alt"></i>
                            <span class="badge bg-important">7</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have 4 new notifications</p>
                            </li>
                            @foreach($user->notification as $notifications)
                            <li>
                                <a href="#">
                                    {{ $notifications->title }}
                                    <span class="small italic pull-right">
                                        {{ 
                                        Carbon::createFromFormat('Y-m-d H:i:s', $notifications->created_at, 'Asia/Kathmandu')->diffForHumans()                
                                        }}
                                    </span>
                                </a>
                            </li>
                            @endforeach
                            <li>
                                <a href="#" style="color: green;">See all notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- alert notification end-->

                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="username">
                                @if(Sentinel::check())
                                    {{ Sentinel::getUser()->full_name }}
                                @endif
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="/profile"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <form action="/logout" method="post" id="logout-form">
                                    {{ csrf_field() }}
                                    <a href="#" onclick="document.getElementById('logout-form').submit()" class="logout-link"><i class="icon_key_alt"></i> Log Out</a>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
        </header>
        <!--header end-->
        <script type="text/javascript">
            $(function dateModify(adate) {
                var a = jQuery.format.prettyDate(adate);
                return a;
            }
        </script>
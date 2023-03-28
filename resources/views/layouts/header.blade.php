<div class="header header-one">

    <div class="header-left header-left-one">
        <a href="index.html" class="logo">

            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
        </a>
        <a href="index.html" class="white-logo">
            <img src="{{ asset('assets/img/logo-white.png') }}" alt="Logo">
        </a>
        <a href="index.html" class="logo logo-small">
            <img src="{{ asset('assets/img/logo-small.png') }}" alt="Logo" width="30" height="30">
        </a>
    </div>


    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fas fa-bars"></i>
    </a>

    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <!--
            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="time">
                <span id="clock"></span>
            </a>
        -->


    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>


    <ul class="nav nav-tabs user-menu">
        <li class="nav-item dropdown has-arrow flag-nav">
            <a class="nav-link " data-bs-toggle="dropdown" href="#" role="button">
                <img src="assets/img/flags/us.png" alt="" height="20"> <span>Arabic</span>
            </a>

        </li>

       <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i data-feather="bell"></i> <span
                    class="badge rounded-pill">{{ auth()->user()->unreadNotifications()->count() }}</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">الاشعارات</span>
                    <a href="javascript:void(0)" class="clear-noti"> </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        @foreach (auth()->user()->Notifications as $notification)
                            <li class="notification-message">
                                @if ($notification->read_at == '')
                                    <style>
                                        .notifications ul.notification-list>li {
                                            background-color: aliceblue;
                                        }
                                    </style>
                                @endif
                                <a href="{{ $notification->data['url'] }}">
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm">
                                            <img class="avatar-img rounded-circle" alt=""
                                                src="{{ asset('assets/img/logo-small.png') }}">
                                        </span>
                                        <div class="media-body">
                                            <p class="noti-details"><span
                                                    class="noti-title">{{ $notification->data['title'] }}</span>
                                                {{ $notification->data['body'] }}</p>
                                            <p class="noti-time"><span
                                                    class="notification-time">{{ $notification->created_at }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>

            </div>
        </li>



        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img src="{{ asset('assets/img/profiles/avatar-01.jpg') }}" alt="">
                    <span class="status online"></span>
                </span>
                <span>{{ Auth::user()->role_name }}</span>
            </a>
            <div class="dropdown-menu">
                <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                    class="dropdown-item"><i data-feather="log-out" class="me-1"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>

    </ul>

</div>
<script>
    $(document).on('click', '#toggle_btn', function() {
        if ($('body').hasClass('mini-sidebar')) {
            $('body').removeClass('mini-sidebar');
            $('.subdrop + ul').slideDown();
        } else {
            $('body').addClass('mini-sidebar');
            $('.subdrop + ul').slideUp();
        }
        setTimeout(function() {
            mA.redraw();
            mL.redraw();
        }, 300);
        return false;
    });
</script>

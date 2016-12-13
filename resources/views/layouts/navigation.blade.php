<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="profile-element">
                    <a href="{{route('main')}}"><strong class="font-bold">Braincities</strong></a>
                </div>
                <div class="logo-element">
                    BC+
                </div>
            </li>
            <li class="{{ isActiveRoute('main') }}">
                <a href="{{ route('main') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Jobs Listing</span></a>
            </li>
        </ul>

    </div>
</nav>

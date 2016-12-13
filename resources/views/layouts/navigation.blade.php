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
                <a href="{{ route('main') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">Jobs Listing</span></a>
            </li>
            @if(Auth::check() && Auth::user()->isAdmin())
              <li>
                  <a href="#"> <span class="nav-label">ADMIN</span></a>
              </li>
              <li class="{{ isActiveURL('/user') }}">
                  <a href="{{ route('simple',['mdl'=>'user']) }}"><i class="fa fa-users"></i> <span class="nav-label">Users list</span></a>
              </li>
              <li class="{{ isActiveURL('/city') }}">
                  <a href="{{ route('simple',['mdl'=>'city']) }}"><i class="fa fa-globe"></i> <span class="nav-label">Cities list</span></a>
              </li>
              <li class="{{ isActiveURL('/category') }}">
                  <a href="{{ route('simple',['mdl'=>'category']) }}"><i class="fa fa-folder-open"></i> <span class="nav-label">Categories list</span></a>
              </li>
              <li class="{{ isActiveURL('/type') }}">
                  <a href="{{ route('simple',['mdl'=>'type']) }}"><i class="fa fa-file-text"></i> <span class="nav-label">Types list</span></a>
              </li>
              <li>
                  <a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span></a>
              </li>
            @endif
        </ul>

    </div>
</nav>

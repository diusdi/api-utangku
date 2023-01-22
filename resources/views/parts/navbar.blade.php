<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        @auth
        <a href="#" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="fas fa-sign-out-alt"></i> Logout</a>
        <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
        @endauth
      </div>
    </li>
  </ul>
</nav>
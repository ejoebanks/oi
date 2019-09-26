@if (is_Object(Auth::user()))
  @php ($id = Auth::user()->type)
@endif

@php(asset('images/Owens_Illinois.png'))
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="{{ asset('images/employee_management.svg') }}" alt="Owens-Header" class="nav_img">
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-chevron-circle-down"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/calendar">
              <i class="fas fa-calendar-alt fa-lg"></i>
              Events
            </a>
          </li>
        </ul>
          <ul class="navbar-nav ml-auto">
            @guest
            <li class="nav-item">
              <a class="nav-link" href="/lists">
                <i class="fa fa-list" aria-hidden="true"></i>
                Shifts
              </a>
            </li>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fa fa-user-o"></i>
                </i>
                <i class="fas fa-user"></i>
                Account Name
                <span class="caret">
                </span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <!--
                <a href="" class="dropdown-item">Update Account
                </a>
              -->
                <a href="/admin" class="dropdown-item">Admin</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
            @else
            @endguest
          </ul>
      </div>
  </nav>

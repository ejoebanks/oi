@if (is_Object(Auth::user()))
  @php ($id = Auth::user()->type)
@endif
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <h6 id="nav_title">Shift Management</h6>
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
            <i class="bi bi-arrow-down-circle" style="color:white; font-size: 2rem;"></i>
        </button>
	      @auth
        <div class="navbar-collapse collapse" id="navbar">
          <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/calendar">
              <i class="fas fa-calendar-alt fa-lg"></i>
              Events
            </a>
          </li>
        </li>
		      @endauth
                    <!-- Authentication Links -->
            @guest

            <li>
              <a class="nav-link" href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt fa-lg"></i>
                {{ __('Login') }}
              </a>
            </li>
            <li>
              <a class="nav-link" href="{{ route('register') }}">
                <i class="fas fa-user-plus fa-lg"></i>
                {{ __('Register') }}
              </a>
            </li>
            @else
            @if($id > 0)
            <li class="nav-item">
              <a class="nav-link" href="/lists">
                <i class="fa fa-list" aria-hidden="true"></i>
                Shifts
              </a>
            </li>
            @endif
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fa fa-user-o"></i>
                </i>
                <i class="fas fa-user"></i>
                @if (!is_object(Auth::user()->info))
                {{ Auth::user()->email }}
                @else
                {{ Auth::user()->info->firstName." ".Auth::user()->info->lastName }}
                @endif
                <span class="caret">
                </span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @php ($uid = Auth::user()->id)
                <a href="{{action('UserController@singleEdit', $uid)}}" class="dropdown-item">Update Account
                </a>
              @if ($id > 0)
                <a href="/admin" class="dropdown-item">Admin</a>
              @endif
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
            @endguest
          </ul>

    </div>
  </div>
</nav>

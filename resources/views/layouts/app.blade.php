<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <div id ="container">
    <head>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>-->
      @yield('style')

      <title>{{ ('OI Employee Management') }}
      </title>
      <!-- Scripts -->
      <?php
      if (is_Object(Auth::user())) {
          $id = Auth::user()->type;
      }
      ?>
      <script src="{{ asset('js/app.js') }}" >
      </script>

      <script src="{{ asset('js/custom.js') }}" >
      </script>

      <script src="{{ asset('js/moment.min.js') }}" >
      </script>

      <script src="{{ asset('js/fullcalendar.js') }}" >
      </script>


      <link href="{{ asset('css/gijgo.css') }}" rel="stylesheet">

      <script src="{{ asset('js/gijgo.js') }}" >
      </script>
      <!-- Fonts -->
      <link rel="dns-prefetch" href="https://fonts.gstatic.com">
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet">

      <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
      <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    </head>
    <body>
      <?php asset('images/Owens_Illinois.png') ?>
      <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container">
            <a class="navbar-brand" href="/">
              <img src="{{ asset('images/Owens_Illinois.png') }}" alt="Owens-Header">
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
                      {{ Auth::user()->firstname." ".Auth::user()->lastname }}
                      <span class="caret">
                      </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <?php $uid = Auth::user()->id; ?>
                      <a href="{{action('UserController@singleEdit', $uid)}}" class="dropdown-item">Update Account
                      </a>
                  <?php if ($id > 0) {
              ?>
                    <a href="/admin" class="dropdown-item">Admin</a>
          <?php
          } ?>
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

        <main class="py-4">
          <br/>
          @yield('content')
        </main>
      </div>
      </div>
    </body>
  <div id="footer">
    © 2018
    <strong>Elijah Banks, Joshua Razalan, Joseph Kovack, Adam Deisz
    </strong>
  </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
      @yield('script')
  </html>

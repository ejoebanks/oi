<!DOCTYPE html>
<html>
@include('layouts.partials.head')
      @include('layouts.partials.nav')
      <br/>
      <div class="main-container">
        @yield('content')
    @include('layouts.partials.footer')
  </div>


      @yield('script')
</html>

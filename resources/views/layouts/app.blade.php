<!DOCTYPE html>
<html>
@include('layouts.partials.head')
      @include('layouts.partials.nav')
      <br/>
      <div class="main-container">
        @yield('content')
    @include('layouts.partials.footer')
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

      @yield('script')
</html>

<!DOCTYPE html>
<html>
@include('layouts.partials.head')
<div class="main-container">
      @include('layouts.partials.nav')
        <br/>
        @yield('content')
    @include('layouts.partials.footer')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
      @yield('script')
</div>
</html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ ('OI Employee Management') }}
  </title>

  <!-- Base Javascript -->
  <script src="{{ asset('js/app.js') }}" ></script>

  <!-- Added Javascript  -->
  <script src="{{ asset('js/moment.min.js') }}" ></script>
  <script src="{{ asset('js/fullcalendar.js') }}" ></script>
  <script src="{{ asset('js/gijgo.js') }}" ></script>
  <script src="{{ asset('js/custom.js') }}" ></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet">
  <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
  <link href="{{ asset('css/gijgo.css') }}" rel="stylesheet">
</head>

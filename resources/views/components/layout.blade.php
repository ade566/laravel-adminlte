<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>Laravel x AdminLTE 3</title>

  {{-- FAVICON --}}
  <link 
    rel="alternate icon" 
    class="js-site-favicon" 
    type="image/png" 
    href="{{asset('img/logo/logo.png')}}" />
  <link 
    rel="icon" 
    class="js-site-favicon" 
    type="image/svg+xml" 
    href="{{asset('img/logo/logo.png')}}" />
  <link 
    rel="stylesheet" 
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  
  {{-- CSS --}}
  <link 
    rel="stylesheet" 
    type="text/css" 
    href="{{asset('dist/css/adminlte.min.css')}}" />
  <link 
    rel="stylesheet" 
    type="text/css" 
    href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}" />

</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <x-navbar />  

    <x-sidebar />  

    <div class="content-wrapper">
      {{$slot}}
      <div class="pb-1"></div>
    </div>

    <x-footer />  
  </div>

  {{-- JS LIBRARY --}}
  <script 
    type="text/javascript" 
    src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <script 
    type="text/javascript" 
    src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script 
    type="text/javascript" 
    src="{{asset('dist/js/adminlte.min.js')}}"></script>
  <script 
    type="text/javascript" 
    src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
  <script 
    src="https://kit.fontawesome.com/6e7d570307.js" 
    crossorigin="anonymous"></script>

</body>
</html>

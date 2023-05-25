<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Scripts -->
    
    <!--script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script-->
    
   
    <!-- Styles -->
   
    <link href="{{asset('css/pace.min.css')}}" rel="stylesheet"/>
  <script src="{{asset('js/pace.min.js')}}"></script>
  <!--favicon-->
  <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
  
  <!-- Vector CSS -->
  <link href="{{asset('plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="{{asset('plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{asset('css/animate.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{asset('css/icons.css')}}" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="{{asset('css/app-style.css')}}" rel="stylesheet"/>
   
  <script src="https://kit.fontawesome.com/3b01b14772.js" crossorigin="anonymous"></script>
  <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
 </head>
 <body>
 </body>
</html>

</head>
<body class="bg-theme bg-theme1">
    <div id="app">
        
        <main class="">
            @yield('content')
        </main>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
	
  <!-- simplebar js -->
  <script src="{{asset('plugins/simplebar/js/simplebar.js')}}"></script>

  <!-- sidebar-menu js -->
  <script src="{{asset('js/sidebar-menu.js')}}"></script>
  <!-- loader scripts -->
  <!--script src="{{asset('js/jquery.loading-indicator.js')}}"></script-->

  <!-- Custom scripts -->
  <script src="{{asset('js/app-script.js')}}"></script>

  <!-- Chart js -->
  
  <script src="{{asset('plugins/Chart.js/Chart.min.js')}}"></script>
 
  <!-- Index js -->
  <script src="{{asset('js/index.js')}}"></script>
    </body>
</html>

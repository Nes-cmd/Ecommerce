<!DOCTYPE html> 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- Slider -->
    @if(Route::currentRouteName() == 'customer.welcome')
    <!-- Blue-Slider CSS -->
    <link rel="stylesheet" href="{{ asset('/slider/css/style.min.css')}}">
    <!-- Blue-Slider JS -->
    <script src="{{ asset('/slider/js/blue-slider.js')}}"></script>
    @endif
    <!--  end slider -->
    <!-- Zoomer -->
    @if(Route::currentRouteName() == 'customer.detail')  
        <style>img {display: inline-block;vertical-align: middle; }</style>
        <script src="{{ asset('zoomer/js/vendor/modernizr.js')}}"></script>
        <!-- xzoom plugin here -->
        <link rel="stylesheet" type="text/css" href="{{ asset('zoomer/dist/xzoom.min.css')}}" media="all" /> 
        <!-- hammer plugin here -->
        <link type="text/css" rel="stylesheet" media="all" href="{{ asset('zoomer/fancybox/source/jquery.fancybox.css')}}" />
        <link type="text/css" rel="stylesheet" media="all" href="{{ asset('zoomer/magnific-popup/css/magnific-popup.css')}}" />
    @endif 
    <!-- end zoomer -->
    <style>
      #snackbar {
        visibility: hidden; /* Hidden by default. Visible on click */
        min-width: 400px; /* Set a default minimum width */
        margin-left: -250px; /* Divide value of min-width by 2 */
        /* background-color: green; Black background color */
        color: #fff; /* White text color */
        /* text-align: left; Centered text */
        border-radius: 5px; /* Rounded borders */
        padding: 5px; /* Padding */
        position: fixed; /* Sit on top of the screen */
        z-index: 1; /* Add a z-index if needed */
        left: 90%; /* Center the snackbar */
        top: 30px; /* 30px from the bottom */
      }
      /* Show the snackbar when clicking on a button (class added with JavaScript) */
      #snackbar.show {
        visibility: visible; /* Show the snackbar */
        /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
        However, delay the fade out process for 2.5 seconds */
        -webkit-animation: fadein 1s, fadeout 1s 4s;
        animation: fadein 1s, fadeout 1s 4s;
      }
      /* Animations to fade the snackbar in and out */
      @-webkit-keyframes fadein {
        from {top: 0; opacity: 0;}
        to {top: 30px; opacity: 1;}
      }
      @keyframes fadein {
        from {top: 0; opacity: 0;}
        to {top: 30px; opacity: 1;}
      }
      @-webkit-keyframes fadeout {
        from {top: 30px; opacity: 1;}
        to {top: 0; opacity: 0;}
      }
      @keyframes fadeout {
        from {top: 30px; opacity: 1;}
        to {top: 0; opacity: 0;}
      }
    </style>
  </head>
  <body class="bg-gray-200">
      @livewire('navigation-bar')
      <!-- Main  -->
      <div class="flex">
          @livewire('customer.alert')
          @can('stake-holder')
              @include('layouts.sidebar')
          @endcan   
          <div class="mainbody flex-1">
              <!-- Page Heading -->
              @if (isset($header))
                  <div class="shadow bg-gradient-to-r from-gray-700 via-indigo-400 to-red-300 rounded-b-full" style="width:100%">
                      <div class="flex justify-center md:justify-start md:px-10 h-10 items-center">
                      <h2 class="text-2xl text-gray-100 font-bold leading-tight">
                              {{ $header }}
                          </h2>
                      </div>
                  </div>
              @endif
            {{ $slot }}
        </div>
    </div>
    <!-- The flash snackbar -->
    @include('layouts.footer')
    @stack('modals')
    @livewireScripts
  </body>
  <script>
      const btn = document.querySelector("button.mobile-menu-button");
      const menu = document.querySelector(".mobile-menu");
      btn.addEventListener("click", () => {
          menu.classList.toggle("hidden");
      });
  </script>
</html>

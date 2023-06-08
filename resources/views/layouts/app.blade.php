<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="meta_description" content="@yield('meta_description')">
    <meta name="meta_keyword" content="@yield('meta_keyword')">
    <meta name="author" content="Sherzad coding">
    @php
    $setting=App\Models\Setting::find(1);
    @endphp
    @if($setting)
    <link rel="shortcut icon " href="{{ asset('uploads/settings/'. $setting->favicon) }}">
    @endif
  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    @include('layouts.inc.frontendnavbar')

        <main>
            @yield('content')
        </main>
        @include('layouts.inc.frontend_footer')
    </div>


      <!-- Scripts -->
      <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" ></script>
      <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" ></script>


      <script src="{{ asset('assets/js/owl.carousel.min.js') }}" ></script>
      <script>
        $('.category-carousel').owlCarousel({
            loop:true,
            margin:20,
            nav:true,
            dots: false,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
})
      </script>


@yield('scripts')
    
</body>
</html>

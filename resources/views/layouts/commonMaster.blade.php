<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" 
      data-theme="theme-default" 
      data-assets-path="{{ asset('/assets') . '/' }}" 
      data-base-url="{{ url('/') }}"
      data-framework="laravel" 
      data-template="vertical-menu-laravel-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | Materio - HTML Laravel Free Admin Template </title>
    <meta name="description" content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
    <meta name="keywords" content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
    <!-- Laravel CSRF token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Canonical SEO -->
    <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Include Styles -->
    @include('layouts/sections.styles')
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    
    <!-- Include Flag Icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">

    <!-- Include Scripts for customizer, helper, analytics, config -->
    @include('layouts/sections.scriptsIncludes')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-XXXXXX" crossorigin="anonymous" />

</head>

<body>
    <!-- Layout Content -->
    @yield('layoutContent')
    <!--/ Layout Content -->

    <!-- Include jQuery -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    
    <!-- Include Popper.js -->
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    
    <!-- Include Bootstrap JavaScript -->
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>

    <!-- Include Scripts -->
    @include('layouts/sections.scripts')
</body>

</html>

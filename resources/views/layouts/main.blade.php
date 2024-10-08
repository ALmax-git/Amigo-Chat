<!DOCTYPE html>

<html
  lang="{{ str_replace('_', '-', app()->getLocale()) }}"
  class="light-style layout-menu-fixed"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Hi Amigo  </title>

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="build/assets/img/favicon/favicon.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('build/assets/vendor/fonts/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('build/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('build/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('build/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/vendor/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('build/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
<link rel="stylesheet" href="{{ asset('build/assets/css/fontawesome.css') }}">
    <script src="{{ asset('build/assets/vendor/js/helpers.js') }}"></script>

    <script src="{{ asset('build/assets/js/config.js') }}"></script>
  </head>

  <body>
   <livewire:Main />
    
@livewireScripts
<script src="{{ asset('build/assets/vendors/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
<x-livewire-alert::scripts />
    <script src="{{ asset('build/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('build/assets/vendor/libs/popper/popper.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('build/assets/vendor/libs/bootstrap/dist/js/bootstrap.min.js') }}" />
    <script src="{{ asset('build/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('build/assets/vendor/js/menu.js') }}"></script>
   
    <script src="{{ asset('build/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
 	 <script src="build/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('build/assets/js/main.js') }}"></script>

    <script src="{{ asset('build/assets/js/extended-ui-perfect-scrollbar.js') }}"></script>
  </body>
</html>

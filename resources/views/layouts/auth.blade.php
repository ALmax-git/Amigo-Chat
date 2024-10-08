<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="build/assets/">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>Amigo Chat</title>
        <meta name="description" content="" />
        <link rel="icon" type="image/x-icon" href="{{ asset('build/assets/img/favicon/favicon.ico') }}" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link rel="stylesheet" href="{{ asset('build/assets/vendor/fonts/boxicons.css') }}" />
        <link rel="stylesheet" href="{{ asset('build/assets/vendor/css/core.css') }}"
            class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('build/assets/vendor/css/theme-default.css') }}"
            class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('build/assets/css/demo.css') }}" />
        <link rel="stylesheet" href="{{ asset('build/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
        <link rel="stylesheet" href="{{ asset('build/assets/vendor/css/pages/page-auth.css') }}" />
        <script src="{{ asset('build/assets/vendor/js/helpers.js') }}"></script>
        <script src="{{ asset('build/assets/js/config.js') }}"></script>
        @livewireStyles
    </head>

    <body>

        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner py-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="app-brand justify-content-center">
                                <a href="/" class="app-brand-link">
                                    <h1 class="fw-bolder"><u>Amigo Chat</u>  🔒 </h1>
                                </a>
                            </div>
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewireScripts
        <script src="{{ asset('build/assets/vendors/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
        <x-livewire-alert::scripts />
        <script src="{{ asset('build/assets/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('build/assets/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('build/assets/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('build/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('build/assets/vendor/js/menu.js') }}"></script>
        <script src="{{ asset('build/assets/js/main.js') }}"></script>
    </body>

</html>
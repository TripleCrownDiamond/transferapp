<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href={{ asset('theme/assets/img/apple-icon.png') }}>
    <link rel="icon" type="image/png" href={{ asset('theme/assets/img/favicon.png') }}>
    <title>
        {{ $title ?? config('app.name') }}
    </title>
    @include('imports.auth.dashboard-links')
    @livewireStyles
    @stack('styles') <!-- Ajoutez cette ligne pour les styles -->
</head>

<body class="g-sidenav-show  bg-gray-100">
    <div>
        <livewire:auth.components.aside />
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <livewire:auth.components.nav-bar />
            <!-- End Navbar -->
            <div class="container-fluid py-4">


                {{ $slot }}

                <footer class="footer pt-3">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <div class="copyright text-center text-sm text-muted text-lg-start">
                                    ©
                                    2023,
                                    made with <i class="fa fa-heart"></i> by
                                    <a href="#" class="font-weight-bold" target="">{{ env('APP_NAME') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </main>
    </div>

    @include('components.dashboard.confirm-logout-modal')
    @include('imports.auth.dashboard-scripts')
    @livewireScripts
    @stack('scripts') <!-- Ajoutez cette ligne pour les scripts -->
</body>

</html>

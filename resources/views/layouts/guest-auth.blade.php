<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href={{ asset('theme/assets/img/favicon.png') }}>
    <title>{{ $title ?? __('login-register-messages.LoginRegister.title') }}</title>
    @include('imports.guest.guest-auth-pages-links')

    @livewireStyles
</head>

<body>
    <div>
        <section class="min-vh-100 mb-2">

            {{ $slot }}

        </section>
    </div>
    @include('imports.guest.guest-auth-pages-scripts')
    @livewireScripts
</body>

</html>

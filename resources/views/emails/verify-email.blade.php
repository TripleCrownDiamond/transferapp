<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('login-register-messages.verificationEmail.title') }}</title>
</head>

<body>
    <h1>{{ __('login-register-messages.verificationEmail.header') }} </h1>
    <p>{{ __('login-register-messages.verificationEmail.body') }}</p>
    <a href='{{ $url }}' type='button'>{{ __('login-register-messages.verificationEmail.button_text') }}</a><br>
    <p>{{ config('app.name') }}</p>

    <!-- Ajoutez le contenu de l'e-mail ici -->
</body>

</html>

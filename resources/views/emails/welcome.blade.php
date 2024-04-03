<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('login-register-messages.WelcomeEmail.title') }}</title>
</head>

<body>
    <h1>{{ __('login-register-messages.WelcomeEmail.header') . env('APP_NAME') . ' ' . $user->name . '!' }} </h1>
    <p>{{ __('login-register-messages.WelcomeEmail.body') }}</p><br>
    <p>{{ config('app.name') }}</p>
    <!-- Ajoutez le contenu de l'e-mail ici -->
</body>

</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

{{--@component('mail::message')--}}
    <h1># Reset Your Password !</h1>
    Hello {{ $user->first_name }},
    Hopefully you are having a great day :)
    please click on the link below to finish up the reset password process
    @component('mail::button', ['url' => env('APP_URL','http://127.0.0.1:8000/api'). sprintf('/reset-password/%s/%s', $user->id, $token)])
        Reset Your Password
    @endcomponent

    Cheers,<br>
    {{ config('app.name') }} !
{{--@endcomponent--}}

</body>
</html>

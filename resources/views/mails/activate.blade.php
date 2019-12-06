{{--@component('mail::message')--}}
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MacQueeen</title>
</head>
<body>
<h1># MacQueen Email Activation</h1>
Hello {{ $user->first_name }},
We are glad that you are joining us, Let's hope you enjoy our website
We know It's really annoying to activate your account, but the world is full of spammers.
Just press the link below and we are done.
@component('mail::button', ['url' => url('/'). '/api/activate/'. $user->id .'/' . $token])
    Activate Account
@endcomponent
Thanks,<br>
{{ config('app.name') }}
</body>
</html>

{{--@endcomponent--}}

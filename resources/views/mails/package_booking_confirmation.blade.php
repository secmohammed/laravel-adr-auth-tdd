{{--@component('mail::message')--}}
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MacQueen</title>
</head>
<body>
<h1># MacQueen Package Confirmation</h1>
Hello {{ $user->first_name }},
We are glad that you booked package through our Website, Let's hope you enjoy your trip with us
One of our agent will contact you as soon as possible.
<h3>Booking Summery</h3>
<p>Package :{{$booked_package->package_name}}</p>
Thanks,<br>
{{ config('app.name') }}
</body>
</html>

{{--@endcomponent--}}

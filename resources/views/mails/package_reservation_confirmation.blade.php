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
<h1># MacQueen Package Reservation</h1>
Hello {{ $user->first_name }},
We are glad that you reserved one of our packages , Let's check this package availability and we'll get bak to as soon as possible.
<h3>Reservation Summery</h3>
<p>Package :{{$package_reservation->package_name}}</p>
Thanks,<br>
{{ config('app.name') }}
</body>
</html>

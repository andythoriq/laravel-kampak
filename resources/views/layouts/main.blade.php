<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kampak Laravel | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <x-nav></x-nav>
    <x-alert></x-alert>
    @yield('content')
    <x-foot></x-foot>
</body>
</html>

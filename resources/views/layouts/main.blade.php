<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penailaian | {{ $title ?? '' }}</title>
</head>
<body>
    <x-nav></x-nav>
    @yield('content')
    <x-foot></x-foot>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.partials.headerScripts')
</head>
<body>

@yield('content')

@stack('js')
</body>
</html>

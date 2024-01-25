<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('build/assets/custom.css')}}">

</head>
<body style="height: 98vh;">
    @yield('content');

    <script src="{{asset('build/assets/custom2.js')}}"></script>

</body>
</html>

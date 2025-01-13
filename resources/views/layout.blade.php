<!DOCTYPE html>
<html lang="@yield('lang')">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{url('public/css/app.css')}}">
</head>
<body>
    @include('components.header')
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
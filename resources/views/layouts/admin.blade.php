<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page-title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<body>
    <div class="head_dashboard">
        <div>
            <h1>Панель администратора<h1>
        </div>
        <div class="logout_button">
            <a href="{{ route('admin.logout') }}"><h2>Выйти</h2></a>
        </div>
    </div>
    @yield('content')
    @include('partials.aside')
    <script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>

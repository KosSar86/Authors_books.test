<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page-title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">  --}}
</head>
<body>
    @yield('content')
    @include('partials.aside')
    <script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>

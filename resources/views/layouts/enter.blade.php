<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" class="app">
    <header>
        @yield('header')
        <div class="header-image"></div>
    </header>

    <section>
        @yield('form')
    </section>

</div>
<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>

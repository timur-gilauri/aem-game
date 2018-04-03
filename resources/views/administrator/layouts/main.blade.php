<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - {{$title}}</title>

    {{-- @include("blocks.system.favicons")--}}


    <link href="{{ mix('css/app.css') }}" rel="stylesheet">


</head>
<body>

@include('administrator.common.top-nav')

<main class="main-content">
    <header class="page-heading">
        <h2 class="page-title_text">{{$title}}</h2>
    </header>

    <section>
        @yield('content')

        @if(isset($paginator))
            {{$paginator->appends(request()->query())->links()}}
        @endif
    </section>

</main>

<!-- Scripts -->
<script src="{{mix('js/app.js')}}"></script>


</body>
</html>

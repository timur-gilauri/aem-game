<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{$title}} - {{ config('app.name') }}</title>

<!-- Styles -->
<link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
<link rel="stylesheet" href="/vendors/foundation/foundation.css">
<link rel="stylesheet" href="/vendors/foundation-icons/foundation-icons.css">
<link rel="stylesheet" href="/vendors/font-awesome/css/font-awesome.css">
<link href="/css/index-f26fb02ea5.css" rel="stylesheet">
<link rel="icon" href="favicon3.png">


<!-- Scripts -->
<script>
    window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    var user = {!! json_encode($player)!!};
</script>
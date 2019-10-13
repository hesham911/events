<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/Events/css/customStyle.css')}}" rel="stylesheet">
    @yield('customCss')
</head>
<body>
<div class="h1 text-center m-5">
    @yield('titlePage')
</div>
<div class="container">
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}"></script>
@yield('customScript')
</body>
</html>
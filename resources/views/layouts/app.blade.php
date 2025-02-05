<!DOCTYPE html>
<html lang="{{str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Larabbs')</title>

    {{-- scrf token --}}
    <meta name='scrf-token' content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>
<body>
    <div id=app class="{{route_class()}}-page">
        @include('layouts._header')

        <div class="container">

            @include('shared._message')

            @yield('content')

        </div>

        @include('layouts._footer')
    </div>
    {{-- script --}}
    <script src="{{mix('js/app.js')}}"></script>
</body>
</html>
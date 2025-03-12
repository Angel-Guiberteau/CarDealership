<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @include('components.home_css')
        @include('components.home_js')
        @stack('css')
        <title>@yield('title')</title>
    </head>
    <body>
        @include('components.header')
        @yield('filter')
        <div class="container custom-container">
            @yield('content')
        </div>
        @stack('js')
    </body>
</html>

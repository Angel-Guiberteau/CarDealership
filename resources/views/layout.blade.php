<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @include('components.css')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
        <title>@yield('title')</title>
    </head>
    <body>
        @include('components.header')
        @yield('filter')
        <div class="container">
            @yield('content')
        </div>
        @stack('js')
    </body>
</html>

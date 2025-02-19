<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @include('components.css')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert/dist/sweetalert.min.js"></script>
        <title>@yield('title')</title>
        <style>
            .container-custom {
                width: 97%;
                background-color: #858585;
                margin: auto;
                padding: 10px;
            }
        </style>
    </head>
    <body>
        @include('components.header')
        @include('components.admin_nav')
        <div class="container-custom">
            @yield('content')
        </div>
    </body>
</html>

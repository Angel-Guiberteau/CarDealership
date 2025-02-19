<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @include('components.admin_css')
        @include('components.admin_js')
        <title>@yield('title')</title>
    </head>
    <body>
        @include('components.header')
        @include('components.admin_nav')
        <div class="container-custom">
            @yield('content')
        </div>
        
    </body>
</html>

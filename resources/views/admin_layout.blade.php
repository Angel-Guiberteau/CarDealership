<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @include('components.css')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert/dist/sweetalert.min.js"></script>
        <title>@yield('title')</title>
        <style> /* Borrar despues */
            .container-custom {
                width: 97%;
                background-color: #adababb8;
                margin: auto;
                padding: 0.5%;
            }
        </style>
    </head>
    <body>
        @include('components.header')
        @include('components.admin_nav')
        <div class="container-custom">
            @yield('content')
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    </body>
</html>

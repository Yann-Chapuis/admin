<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
        <!-- css -->
        <link rel="stylesheet" href="{{ mix('css/admin.css') }}">

        @yield('css')

    </head>

    <body class="hold-transition login-page">
        @yield('content')
        <!-- js -->
        <script src="{{ mix('js/admin.js') }}"></script> 
        @yield('js')
    </body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include('layouts.partials.head')
    </head>

    <body>
        @include('layouts.partials.navhome')
        @yield('content')
        @include('layouts.partials.footer')
    </body>

</html>

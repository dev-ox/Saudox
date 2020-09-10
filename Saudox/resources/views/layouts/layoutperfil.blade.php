<style>

.desktop{
    display: block;
}

.celular {
    display: none;
}

@media screen and (max-width: 600px) {
    .desktop {display: none !important;}
    .celular{display: block;}
}
</style>

<head>
    @include('layouts.partials.navhome')
    @include('layouts.partials.headhome')
</head>

<body>
    @include('layouts.partials.bodyhome')
    @yield('content')
</body>

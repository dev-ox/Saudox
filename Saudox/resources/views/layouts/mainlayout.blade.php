<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/imagens/saudox_icone.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Saudox</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/refator.css') }}" rel="stylesheet">
</head>

<body class="bg-claro">
    <div id="app">
        <div id="espacador_top_nav_global"></div>
        <nav id="topnav_global" class="navbar navbar-expand-md navbar-light bg-amarelo shadow-sm" style="position: fixed; width: 100%; z-index: 9999;">
            <div class="container" style="max-width: 98%;">
                <a class="navbar-brand" href="{{ url('/') }}" style="display: contents;">
                    <img src="https://avatars3.githubusercontent.com/u/64805526?s=400&u=e4188ff9af3c0927962a181f241fbee79c506f4d&v=4">
                    <span style="margin-left: 2%;">Saudox</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php //O !Auth::id() é pq a rota da pagina / não passa pelo Auth, então Auth::id() é null ?>
                        @if(!Auth::id() || (!Auth::guard('profissional')->check() && !Auth::guard('paciente')->check()))
                            <li class="nav-item">
                                <a class="bt" href="#Rodape">Contato</a>
                            </li>

                            <li class="nav-item">
                                <a class="bt" href={{route('profissional.login')}}>Login Profissional</a>
                            </li>

                            <li class="nav-item">
                                <a class="bt" href="/login">Login Paciente</a>
                            </li>


                        @else

                            @if(Auth::guard('paciente')->check())
                                <li class="nav-item">
                                    <a class="bt" href={{route('paciente.home')}}> Home </a>
                                </li>
                                <li class="nav-item">
                                    <a class="bt" href="/">Perfil</a>
                                </li>
                            @elseif(Auth::guard('profissional')->check())
                                <li class="nav-item">
                                    <a class="bt" href={{ route('profissional.home') }}> Home </a>
                                </li>
                                <li class="nav-item">
                                    <a class="bt" href={{ route('profissional.ver', Auth::id()) }}> Perfil </a>
                                </li>
                            @endif

                                <li class="nav-item dropdown_controller">
                                    <a class="bt bt_opcoes" href="#">
                                        Opções
                                    </a>
                                </li>

                                <div class="dropdown">
                                    @if(Auth::guard('profissional')->check() && Auth::user()->ehAdmin())
                                        <a class="dropdown-item" href={{route('profissional.admin.cadastro')}}>Criar Profissional</a>
                                    @endif

                                    <a class="dropdown-item perigo" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                   </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>



                                </div>



                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="padding-top: 7rem !important;">
            @yield('content')
        </main>
    </div>
</body>

<br>
<footer>
  <div class="container-fluid bordas_amarelas" style="background-color:var(--cor_fundo)">

    <button onclick="topFunction()" id="to-top" title="Go to top">Top</button>

    <div class="row row-no-gutters">
      <div class="col-xs-12 col-sm-6 col-md-6" >
        <ul>
          <li class="col-heading">Contato</li>
          <li>
            <i class="fa fa-phone" aria-hidden="true"></i><a href="tel:99-999-999-9999">99-999-999-9999</a>
          </li>
          <li>
            <i class="fa fa-mobile" aria-hidden="true"></i><a href="sms:99-999-999-9999">SMS Message</a>
          </li>
          <li>
             <i class="fa fa-envelope-square" aria-hidden="true"></i><a href="mailto:someone@yoursite.com?subject=Email Subject line">Email Us</a>
          </li>
        </ul>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-6" >
        <ul>
          <li class="col-heading">Endereço</li>
          <li class="ender">Link to page</li>
          <li class="ender">Link to page</li>
          <li class="ender">Link to page</li>
        </ul>
      </div>

    </div> <!--  end row  -->

    <div class="row row-no-gutters bg-padrao-claro" id="bottom-footer" >

      <div class="col-xs-12 col-md-5 text-center" >
          <ul class="vertical-links small">
            <li><a href="#" style="color:black; text-decoration: underline;">Privacidade</a></li>
            <li><a href="#" style="color:black; text-decoration: underline;">Licença</a></li>
            <li><a href="#" style="color:black; text-decoration: underline;">Fale conosco</a></li>
          </ul>
      </div>
      <div class="col-xs-12 col-md-2 text-center" >
        <p><i class="fa fa-heart-o" aria-hidden="true"></i></p>
      </div>
      <div class="col-xs-12 col-md-5 text-center" >
        <ul>
          <li class="small">© Copyright 2020 Website by <a href="#" style="color:black; text-decoration: underline; font-weight:500;">Devox</a>. All Rights reserved.</li>
        </ul>
      </div>
    </div> <!--  end row  -->

  </div> <!--  end container-fluid  -->
<script>
    window.onscroll = function() {scrollFunction()};
</script>
</footer>
</html>

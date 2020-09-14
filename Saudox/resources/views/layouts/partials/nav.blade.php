<div class="desktop">
    <div class="topnav">
        @if(Request::route()->getName() == 'home')
            <a class="bt" href="#Rodape">Contato</a>
        @else
            <a class="home" href="/">Home</a>
        @endif
        <a class="bt" href={{route('profissional.login')}}>Login Profissional</a>
        <a class="bt" href="/paciente/login">Login Paciente</a>
        <a class="navbar-brand" href="/">
            <div class="logo-image">
                <img src="https://avatars3.githubusercontent.com/u/64805526?s=400&u=e4188ff9af3c0927962a181f241fbee79c506f4d&v=4">
            </div>
        </a>
        <h2> SAUDOX </h2>
    </div>
</div>

<div class="celular">
    <div class="topnav">
        <div class="dropdown">
            <button class="dropbtn"> Opções
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                @if(Request::route()->getName() == 'home')
                    <a href="#Rodape">Contato</a>
                @else
                    <a href="/">Home</a>
                @endif
                <a href={{route('profissional.login')}}>Login Profissional</a>
                <a href="/paciente/login">Login Paciente</a>
            </div>
        </div>

        <a class="navbar-brand" href="/">
            <div class="logo-image">
                <img src="https://avatars3.githubusercontent.com/u/64805526?s=400&u=e4188ff9af3c0927962a181f241fbee79c506f4d&v=4">
            </div>
        </a>
        <h2>SAUDOX</h2>
    </div>
</div>

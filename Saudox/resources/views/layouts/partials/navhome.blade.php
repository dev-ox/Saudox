<div class="desktop">
    <div class="topnav">
        <div class="dropdown">
            <button class="dropbtn"> Opções
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                @if(Auth::guard('profissional')->check() && App\Profissional::find(Auth::id())->ehAdmin())
                    <a href={{route('profissional.admin.cadastro')}}>Criar Profissional</a>
                @endif
                @if(Auth::guard('profissional')->check())
                    <a href={{route('profissional.logout')}}>Sair</a>
                @elseif(Auth::guard('paciente')->check())
                    <a href={{route('paciente.logout')}}>Sair</a>
                @endif
            </div>
        </div>
        @if(Auth::guard('paciente')->check())
            <a class="home" href={{route('paciente.home')}}> Home </a>
            <a class="bt" href="/">Perfil</a>
        @elseif(Auth::guard('profissional')->check())
            <a class="home" href={{route('profissional.home')}}> Home </a>
            <a class="bt" href={{route('agendamento.criar')}}> Novo Agendamento </a>
            <a class="bt" href={{route('profissional.ver', ['id' => Auth::id()])}}>Perfil</a>
        @endif
            <a class="navbar-brand" href="/">
                <div class="logo-image">
                    <img src="https://avatars3.githubusercontent.com/u/64805526?s=400&u=e4188ff9af3c0927962a181f241fbee79c506f4d&v=4">
                </div>
            </a>
            <h2>SAUDOX</h2>

    </div>
</div>


<div class="celular">
    <div class="topnav">
        <div class="dropdown">
            <button class="dropbtn"> Opções
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                @if(Auth::guard('profissional')->check() && App\Profissional::find(Auth::id())->ehAdmin())
                    <a href="{{route('profissional.admin.cadastro')}}">Criar Profissional</a>
                @endif
                @if(Auth::guard('paciente')->check())
                    <a href={{route("paciente.home")}}> Home </a>
                    <a href="/">Perfil</a>
                    <a href={{route('paciente.logout')}}>Sair</a>
                @elseif(Auth::guard('profissional')->check())
                    <a href={{route('profissional.home')}}> Home </a>
                    <a href={{route('profissional.ver', ['id' => Auth::id()]) }}>Perfil</a>
                    <a href={{route('profissional.logout')}}>Sair</a>
                @endif
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

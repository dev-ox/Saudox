<style>

.topnav {
  overflow: visible;
  background-color:  #FFCC33;
  position: fixed; /* Set the navbar to fixed position */
  top: 0; /* Position the navbar at the top of the page */
  width: 100%; /* Full width */
}

.topnav a.bt {
  background-color:#1C2934;
  outline: none;
  border: 10px;
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.topnav a.home {
  background-color:#1C2934;
  outline: none;
  border: 10px;
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.topnav a:hover {
  background-color: #800080;
  color: black;
}

.home {
  display: block;
  width: 50px;
  height: 20px;
  background: #194f5a;
  padding: 5px;
  color: white;
  margin: 5px;
  font-size: 14px;
  text-align: center;
  margin-top: 10px;
}

.bt{
  display: block;
  width: 150px;
  height: 20px;
  background: #1C2934;
  padding: 5px;
  color: white;
  margin: 5px;
  text-indent: inherit;
  font-size: 14px;
  margin-top: 10px;
}




img{
  width:65px;
  height: 65px;
  float: left;
  margin-left: 1px;
  margin-top: 1px;
}

h2 {
  color: #1C2934;
  margin-left: 75px;
  margin-top: 15px;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  display: block;
  width: 100px;
  height: 48px;
  background: #1C2934;
  padding: 5px;
  color: white;
  margin: 5px;
  text-indent: inherit;
  font-size: 14px;
  margin-top: 10px;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  position: absolute;
  min-width: 100px;
  display: none;
  background-color: #f9f9f9;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
  font-size: 12px;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

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
      <a class="bt" href={{route('profissional.agendamento')}}> Novo Agendamento </a>
      <a class="bt" href={{route('profissional.ver', ['id' => Auth::id()])}}>Perfil</a>
  @endif
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
      <h2> SAUDOX </h2>

    </div>

</div>

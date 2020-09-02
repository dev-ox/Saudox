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


@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive a.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
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
</style>


<div class="topnav">
  <div class="dropdown">
    <button class="dropbtn"> Opções
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      @if(Auth::guard('profissional')->check())
          <a href="/profissional/logout">Sair</a>
      @elseif(Auth::guard('paciente')->check())
          <a href="/paciente/logout">Sair</a>
      @endif
      <a href="#">Acessibilidade</a>
      <a href="#">Sobre</a>
    </div>
  </div>
  <a class="home" href="/profissional/home"> Home </a>
  @if(Auth::guard('paciente')->check())
      <a class="bt" href="/paciente/perfil">Perfil</a>
  @elseif(Auth::guard('profissional')->check())
      <a class="bt" href="/profissional/perfil">Perfil</a>
  @endif
  <a class="navbar-brand" href="/">
        <div class="logo-image">
              <img src="https://avatars3.githubusercontent.com/u/64805526?s=400&u=e4188ff9af3c0927962a181f241fbee79c506f4d&v=4">
        </div>
  </a>
  <h2> SAUDOX </h2>

</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

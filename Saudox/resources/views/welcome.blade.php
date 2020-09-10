@include('layouts/mainlayout');
<meta content="width=device-width, initial-scale=1" name="viewport" />

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


<div class="desktop">
    <div class="infos-clinica">
        <div class="imagens-slide">
              <img class="slides" src="https://avatars3.githubusercontent.com/u/64805526?s=400&u=e4188ff9af3c0927962a181f241fbee79c506f4d&v=4">
        </div>
        <div class="info-slide-atual">
            <h3 class="title-part">Sobre o slide atual:</h3>
            <h4> Info 1: Sobre a empresa (objetivo geral)</h4>
            <h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h4>
            <h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h4>
        </div>
    </div>

    <div class="mais-infos-clinica">
        <div class="nome-clinica">
            <h1 class="title-part">Clínica (NOME DA CLINICA):</h1>
        </div>
        <div class="texto_clinica">
            <h3> Info 1: Sobre a empresa (objetivo geral)</h3>
            <h3> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h3>
            <h3> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h3>
            <h3> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h3>
            <h3> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h3>
            <h3> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h3>
        </div>
        <div class="logo-image">
              <img class="empresa" src="https://avatars3.githubusercontent.com/u/64805526?s=400&u=e4188ff9af3c0927962a181f241fbee79c506f4d&v=4">
        </div>
    </div>
</div>


<div class="celular">
    <div class="infos-clinica-phone">
        <div class="info-slide-atual-phone">
            <h4 class="title-part">Sobre o slide atual:</h4>
            <h5> Info 1: Sobre a empresa (objetivo geral)</h5>
            <h5> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h5>
            <h5> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h5>
        </div>
        <div class="imagens-slide">
              <img class="slides-phone" src="https://avatars3.githubusercontent.com/u/64805526?s=400&u=e4188ff9af3c0927962a181f241fbee79c506f4d&v=4">
        </div>
    </div>

    <div class="mais-infos-clinica-phone">
        <div class="nome-clinica-phone">
            <h3 class="title-part">Clínica (NOME DA CLINICA):</h3>
        </div>
        <div class="texto_clinica-phone">
            <h5> Info 1: Sobre a empresa (objetivo geral)</h5>
            <h5> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h5>
            <h5> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h5>
            <h5> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h5>
            <h5> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h5>
            <h5> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h5>
        </div>
        <div class="logo-image-phone">
              <img class="empresa-phone" src="https://avatars3.githubusercontent.com/u/64805526?s=400&u=e4188ff9af3c0927962a181f241fbee79c506f4d&v=4">
        </div>
    </div>

</div>

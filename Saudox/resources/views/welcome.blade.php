@extends('layouts/mainlayout')
@section('content')

    <div class="desktop">
        <div class="infos-clinica">
            <div id="carousel_indicadores" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel_indicadores" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel_indicadores" data-slide-to="1" ></li>
                    <li data-target="#carousel_indicadores" data-slide-to="2" ></li>
                </ol>
                <div class="carousel-inner">



                    <div class="carousel-item active">
                        <div>
                            <div class="imagens-slide">
                                <img class="slides" src="https://avatars3.githubusercontent.com/u/64805526?s=400&u=e4188ff9af3c0927962a181f241fbee79c506f4d&v=4">
                            </div>
                            <div class="info-slide-atual">
                                <br>
                                <h3 class="title-part">Sobre o slide atual:</h3>
                                <h4> Info 1: Sobre a empresa (objetivo geral)</h4>
                                <h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h4>
                                <h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h4>
                            </div>
                        </div>
                        <br><br>
                    </div>





                    <div class="carousel-item">
                        <div>
                            <div class="imagens-slide">
                                <img class="slides" src="https://avatars3.githubusercontent.com/u/64805526?s=400&u=e4188ff9af3c0927962a181f241fbee79c506f4d&v=4">
                            </div>
                            <div class="info-slide-atual">
                                <br>
                                <h3 class="title-part">Sobre o slide atual:</h3>
                                <h4> Info 2: Sobre a empresa (objetivo geral)</h4>
                                <h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h4>
                                <h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h4>
                            </div>
                        </div>
                        <br><br>
                    </div>





                    <div class="carousel-item">
                        <div>
                            <div class="imagens-slide">
                                <img class="slides" src="https://avatars3.githubusercontent.com/u/64805526?s=400&u=e4188ff9af3c0927962a181f241fbee79c506f4d&v=4">
                            </div>
                            <div class="info-slide-atual">
                                <br>
                                <h3 class="title-part">Sobre o slide atual:</h3>
                                <h4> Info 3: Sobre a empresa (objetivo geral)</h4>
                                <h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h4>
                                <h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</h4>
                            </div>
                        </div>
                        <br><br>
                    </div>




                </div>

                <!-- BOTOES DE CONTROLE (SE QUISER USAR)
                <a class="carousel-control-prev" href="#carousel_indicadores" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel_indicadores" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

                -->
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
            <img class="lg-emp" src="https://avatars3.githubusercontent.com/u/64805526?s=400&u=e4188ff9af3c0927962a181f241fbee79c506f4d&v=4">
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

@endsection

@extends('layouts.mainlayout')
@section('content')

    <div class="container">
        <div id="welcome_div" class="row bordas_amarelas bg-padrao">
            <div class="col-md">
                <h1 style="margin-top: 1%;">Bem vindo! {{$profissional->nome}}</h1>
                <div class="profissional-bt">
                    <!-- TODO: Fazer com que a home envie as infos do agendamento para o cadastro de novo paciente -->

                </div>
            </div>
        </div>

        <div style="height: 5px;"></div>

        <div id="nav-extra" class="row bordas_amarelas bg-padrao">
            @if($profissional->ehAdmin())
                <a class="btn-full bordas_vermelhas" href={{route('profissional.admin.dashboard') }}>Ir para administração</a>
            @endif

            <a class="btn-full bordas_vermelhas" href={{route('profissional.recepcao.home') }}>Ir para recepção</a>
            @if($profissional->podeCriarPaciente())
                <a class="btn-full bordas_vermelhas" href={{route('profissional.criar_paciente') }}>Novo Paciente</a>
            @endif
        </div>

        <div style="height: 5px;"></div>


        <div id="prox_paciente_div" class="row bordas_amarelas bg-padrao">
            <div class="col-xl-8">
                @if(count($agenda) > 0)

                    <table class="table table-borderless bg-padrao" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">Nome:</th>
                                <th scope="col">Hora de Entrada:</th>
                                <th scope="col">Hora de Saída:</th>
                                <th scope="col">Local de atendimento:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$agenda[0]->nome}}</td>
                                <td>{{$agenda[0]->dataEntradaFormatada()}}</td>
                                <td>{{$agenda[0]->dataSaidaFormatada()}}</td>
                                <td>{{$agenda[0]->local_de_atendimento}}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="btpc">
                        @if($prox_paciente)
                            <a class="btn-paciente bordas_amarelas" href={{route('paciente.perfil', ['id' => $prox_paciente->id]) }}>Ver perfil</a>
                        @else
                            <a class="btn-paciente bordas_amarelas"  href={{route('profissional.criar_paciente', $agenda[0]->id) }}>Registrar Cliente</a>
                        @endif
                    </div>

                @else
                    <h3>Não há agendamentos para você!</h3>
                @endif
            </div>

            <div class="col-sm-3 bordas_amarelas" id="timer_container">
                <body onload="startTime2()">
                    <h1 id="txt2"></h1>
                </body>
            </div>
        </div>



        <div style="height: 5px;"></div>

        <div id="agenda_div" class="row bordas_amarelas bg-padrao">
            <div class="col-md">
                <h3 style="text-align: center; margin-top: 1%;">Agenda</h3>
                <div class="search-agenda-home">
                    <label for="pac" class="search-label-agenda">Buscar Paciente:</label>
                    <input placeholder="Nome do paciente" id="pac" type="text" class="search-agenda" name="buscar">
                    <input value="Buscar" type="submit" class="bt-search-agenda_r" href="#" onclick="buscarPacientePorNome()">
                </div>



                @if(count($agenda) > 0)
                    <div class="table-wrapper">
                        <table class="ag table">
                            <thead id="home-profissional">
                                <tr class="ag table-row">
                                    <th class="tag">Paciente:</th>
                                    <th class="tag">Hora Entrada:</th>
                                    <th class="tag">Hora Saída:</th>
                                    <th class="tag">Local do atendimento:</th>
                                    <th class="tag">Tipo da Recorrência:</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($agenda as $ag)
                                    <tr>
                                        <td class="corsim">{{$ag->nome}}</td>
                                        <td class="corsim">{{$ag->dataEntradaFormatada()}}</td>
                                        <td class="corsim">{{$ag->dataSaidaFormatada()}}</td>
                                        <td class="corsim">{{$ag->local_de_atendimento}}</td>
                                        <td class="corsim">{{$ag->tipo_da_recorrencia}}</td>
                                        <td class="bt-acao-adm-tb"><a class="bt-acao-adm" href= {{ route('agendamento.ver', $ag->id) }}>Ver</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <h3 class="agnd">Não há agendamentos para você!</h3>
                @endif




            </div>
        </div>




        <!--
            <div class="logo-image">
            <img class="empresa" src="https://avatars3.githubusercontent.com/u/64805526?s=400&u=e4188ff9af3c0927962a181f241fbee79c506f4d&v=4">
            </div>
            <div class="adm-bt">
            <a class="btn-adm" id="novo-paciente-home" href={{route('profissional.criar_paciente') }}>Novo Paciente</a>
            @if(in_array('admin', $profissoes))
                <a class="btn-adm" id="ir-adm" href={{route('profissional.admin.dashboard') }}>Ir para administração</a>
            @endif
            </div>
        -->
    </div>
@endsection

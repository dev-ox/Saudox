@extends('layouts.mainlayout')
@section('content')

    @php
        $profissional = App\Profissional::find(Auth::id());
    @endphp

    <div class="container">



        @if($profissional->podeCriarAnamnese())
            <div id="linha_anamneses" class="row justify-content-center text-center">
                <div class="col-md-10">

                    @if($profissional->temProfissao(App\Profissional::Fonoaudiologo) || $profissional->ehAdmin())
                        @if(!$paciente->anamneseFonoaudiologias)
                            <a style="padding-top: 2%;" class="btn bordas_amarelas bg-azul bt_ana_ava_evo" href="{{ route("profissional.anamnese.fonoaudiologia.criar", $paciente->id) }}">Criar Anamnese de Fonoaudiologia</a>
                        @else
                            <a style="padding-top: 2%;" class="btn bordas_amarelas bg-azul bt_ana_ava_evo" href="{{ route("profissional.anamnese.fonoaudiologia.ver", $paciente->id) }}">Ver Anamnese de Fonoaudiologia</a>
                        @endif
                    @endif

                    @if($profissional->temProfissao(App\Profissional::Psicopedagogo) || $profissional->temProfissao(App\Profissional::Neuropsicologo) || $profissional->ehAdmin())
                        @if(!$paciente->anamneseGigantePsicopedaNeuroPsicomotos())
                            <!-- <a style="padding-top: 1%;" class="btn bordas_amarelas bg-azul bt_ana_ava_evo" href="{{ route("profissional.anamnese.psicopedagogia.criar", $paciente->id) }}">Criar Anamnese de Psicopedagia/Neuropsicologia/Psicomotricidade</a> -->
                        @else
                            <!-- <a style="padding-top: 1%;" class="btn bordas_amarelas bg-azul bt_ana_ava_evo" href="{{ route("profissional.anamnese.psicopedagogia.ver", $paciente->id) }}">Ver Anamnese de Psicopedagia/Neuropsicologia/Psicomotricidade</a> -->
                        @endif
                    @endif

                    @if($profissional->temProfissao(App\Profissional::TerapeutaOcupacional) || $profissional->ehAdmin())
                        @if(!$paciente->anamneseTerapiaOcupacionals)
                            <a style="padding-top: 2%;" class="btn bordas_amarelas bg-azul bt_ana_ava_evo" href="{{ route("profissional.anamnese.terapia_ocupacional.criar", $paciente->id) }}">Criar Anamnese de Terapia Ocupacional</a>
                        @else
                            <a style="padding-top: 2%;" class="btn bordas_amarelas bg-azul bt_ana_ava_evo" href="{{ route("profissional.anamnese.terapia_ocupacional.ver", $paciente->id) }}">Ver Anamnese de Terapia Ocupacional</a>
                        @endif
                    @endif

                </div>
            </div>

            <br>
            <br>
        @endif


        @if($profissional->podeCriarAvaliacao())
            <div id="linha_anamneses" class="row justify-content-center text-center">
                <div class="col-md-10">


                    @if($profissional->temProfissao(App\Profissional::TerapeutaOcupacional) || $profissional->ehAdmin())
                        @if(!$paciente->avaliacaoJudo)
                            <a style="padding-top: 2%;" class="btn bordas_amarelas bg-azul bt_ana_ava_evo" href="{{ route("profissional.avaliacao.judo.criar", $paciente->id) }}">Criar Avaliação de Judô</a>
                        @else
                            <a style="padding-top: 2%;" class="btn bordas_amarelas bg-azul bt_ana_ava_evo" href="{{ route("profissional.avaliacao.judo.ver", $paciente->id) }}">Ver Avaliação de Judô</a>
                        @endif
                    @endif
                    @if($profissional->temProfissao(App\Profissional::TerapeutaOcupacional) || $profissional->ehAdmin())
                        @if(!$paciente->avaliacaoTerapiaOcupacional)
                            <a style="padding-top: 2%;" class="btn bordas_amarelas bg-azul bt_ana_ava_evo" href="{{ route("profissional.avaliacao.terapia_ocupacional.criar", $paciente->id) }}">Criar Avaliação de Terapia Ocupacional</a>
                        @else
                            <a style="padding-top: 2%;" class="btn bordas_amarelas bg-azul bt_ana_ava_evo" href="{{ route("profissional.avaliacao.terapia_ocupacional.ver", $paciente->id) }}">Ver Avaliação de Terapia Ocupacional</a>
                        @endif
                    @endif




                </div>
            </div>

            <br>
            <br>
        @endif



        <div class="row bordas_amarelas bg-padrao">
            <div class="col-md">

                <h1 class="pessoal"> Perfil de {{$paciente->nome_paciente}} </h1>
                <h3 class="pessoal"> <a href="{{ route('agendamento.criar', $paciente->id) }}">Agendar pra esse paciente</a> <h3>

                        <!--
                            BOTÃOD E EDITAR PACIENTE!!!!
                        -->
                        <br>
                        <div class="info-pessoal">
                            <h3 class="marker-label">Informações Pessoais:</h3>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="lbinfo-static">Nome:<br><label class="lbinfo-ntstatic">{{$paciente->nome_paciente}}</label></label>
                                    <br>
                                    <label class="lbinfo-static">CPF:<br><label class="lbinfo-ntstatic">{{$paciente->cpf}}</label></label>
                                    <br>
                                    <label class="lbinfo-static">Numero de Irmãos:<br><label class="lbinfo-ntstatic">{{$paciente->numero_irmaos}}</label></label>
                                </div>

                                <div class="col-md-3">
                                    <label class="lbinfo-static">Naturalidade:<br><label class="lbinfo-ntstatic">{{$paciente->naturalidade}}</label></label>
                                    <br>
                                    <label class="lbinfo-static">Sexo:
                                        @if($paciente->sexo == 0)
                                            <br><label class="lbinfo-ntstatic">Masculino
                                        @else
                                            <br><label class="lbinfo-ntstatic">Feminino
                                        @endif
                                            </label></label>
                                            <br>
                                            <label class="lbinfo-static">Irmãos:<br><label class="lbinfo-ntstatic">{{$paciente->lista_irmaos}}</label></label>
                                </div>

                                <div class="col-md-3">
                                    <label class="lbinfo-static">Responsavel:<br><label class="lbinfo-ntstatic">{{$paciente->responsavel}}</label></label>
                                    <br>
                                    <label class="lbinfo-static">Filho Biológico:
                                        @if($paciente->tipo_filho_biologico_adotivo == 0)
                                            <br><label class="lbinfo-ntstatic">Sim
                                        @else
                                            <br><label class="lbinfo-ntstatic">Adotado
                                        @endif
                                            </label></label>
                                            <br>
                                            @if($paciente->tipo_filho_biologico_adotivo == 1)
                                                <label class="lbinfo-static">Paciente sabe que é adotado:
                                                    @if($paciente->crianca_sabe_se_adotivo == 0)
                                                        <br><label class="lbinfo-ntstatic">Não
                                                    @else
                                                        <br><label class="lbinfo-ntstatic">Sim
                                                    @endif
                                                        </label></label>
                                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <label class="lbinfo-static">Nascimento:<br><label class="lbinfo-ntstatic">{{$paciente->dataNascimentoFormatada()}}</label></label>
                                    <br>
                                </div>
                            </div>

                        </div>

                        <div class="info-pais">
                            <h3 class="marker-label">Informações sobre os pais:</h3>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="lbinfo-static">Nome do Pai:<br><label class="lbinfo-ntstatic">{{$paciente->nome_pai}}</label></label>
                                    <br>
                                    <label class="lbinfo-static">Nome da Mãe:<br><label class="lbinfo-ntstatic">{{$paciente->nome_mae}}</label></label>
                                    <br>
                                    <label class="lbinfo-static">Pais São casados?
                                        @if($paciente->pais_sao_casados == 1)
                                            <br><label class="lbinfo-ntstatic">Sim
                                        @else
                                            <br><label class="lbinfo-ntstatic">Não
                                        @endif
                                            </label></label>

                                </div>

                                <div class="col-md-3">
                                    <label class="lbinfo-static">Telefone do Pai:<br><label class="lbinfo-ntstatic">{{$paciente->telefone_pai}}</label></label>
                                    <br>
                                    <label class="lbinfo-static">Telefone da Mãe:<br><label class="lbinfo-ntstatic">{{$paciente->telefone_mae}}</label></label>
                                    <br>
                                    <label class="lbinfo-static">Pais São divorciados?
                                        @if($paciente->pais_sao_divorciados == 1)
                                            <br><label class="lbinfo-ntstatic">Sim
                                        @else
                                            <br><label class="lbinfo-ntstatic">Não
                                        @endif
                                            </label></label>
                                </div>

                                <div class="col-md-3">
                                    <label class="lbinfo-static">Email do Pai:<br><label class="lbinfo-ntstatic">{{$paciente->email_pai}}</label></label>
                                    <br>
                                    <label class="lbinfo-static">Email da Mãe:<br><label class="lbinfo-ntstatic">{{$paciente->email_mae}}</label></label>
                                    <br>
                                    @if($paciente->pais_sao_divorciados == 1)
                                        <label class="lbinfo-static">Reação da criança ao divorcio:<br><label class="lbinfo-ntstatic">{{$paciente->reacao_sobre_a_relacao_pais_caso_divorciados}}</label></label>
                                        <br>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <label class="lbinfo-static">Idade do Pai:<br><label class="lbinfo-ntstatic">{{$paciente->idade_pai}}</label></label>
                                    <br>
                                    <label class="lbinfo-static">Idade da Mãe:<br><label class="lbinfo-ntstatic">{{$paciente->idade_mae}}</label></label>
                                    <br>
                                    @if($paciente->pais_sao_divorciados == 1)
                                        <label class="lbinfo-static">Criança vive com quem?<br><label class="lbinfo-ntstatic">{{$paciente->vive_com_quem_caso_pais_divorciados}}</label></label>
                                        <br>
                                    @endif
                                </div>

                            </div>

                            <div class="info-localizacao">
                                <h3 class="marker-label">Endereço:</h3>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="lbinfo-static">Rua:<br><label class="lbinfo-ntstatic">{{$paciente->endereco->nome_rua}}</label></label>
                                        <br>
                                        <label class="lbinfo-static">Cidade:<br><label class="lbinfo-ntstatic">{{$paciente->endereco->cidade}}</label></label>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="lbinfo-static">Nº:<br><label class="lbinfo-ntstatic">{{$paciente->endereco->numero_casa}}</label></label>
                                        <br>
                                        <label class="lbinfo-static">Estado:<br><label class="lbinfo-ntstatic">{{$paciente->endereco->estado}}</label></label>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="lbinfo-static">Bairro:<br><label class="lbinfo-ntstatic">{{$paciente->endereco->bairro}}</label></label>
                                        <br>
                                        <label class="lbinfo-static">Descricao:<br><label class="lbinfo-ntstatic">{{$paciente->endereco->descricao}}</label></label>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="lbinfo-static">Ponto de Referência:<br><label class="lbinfo-ntstatic">{{$paciente->endereco->ponto_referencia}}</label></label>
                                    </div>
                                </div>

                            </div>











                        </div>
            </div>
        </div>

    @endsection

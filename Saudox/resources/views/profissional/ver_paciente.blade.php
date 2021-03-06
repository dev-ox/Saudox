@extends('layouts.mainlayout')
@section('content')

    @php
        $profissional = App\Profissional::find(Auth::id());
    @endphp

    <div class="container">
        <div id="welcome_div" class="row bordas_amarelas bg-padrao">
            <div class="col-md">
                <h1 class="pessoal"> Perfil de {{$paciente->nome_paciente}} </h1>
                @if(Auth::user()->podeCriarAgendamento())
                    <h3 class="pessoal"> <a href="{{ route('agendamento.criar', $paciente->id) }}">Agendar pra esse paciente</a> <h3>
                @endif

                        <br>
            </div>
        </div>

        <div style="height: 5px;"></div>

        @if($profissional->podeCriarAnamnese())
            <div class="row bordas_amarelas bg-padrao">
                <div class="col-md-12">
                    <br>
                    <h4 class="paciente-nav-titles">Anamneses</h4>
                </div>
                <div class="col-md-4">
                    @if(!$paciente->anamneseFonoaudiologias)
                        @if($profissional->temProfissao(App\Profissional::Fonoaudiologo) || $profissional->ehAdmin())
                            <a style="padding-top: 2%;" class="bt formularios-bt" href="{{ route("profissional.anamnese.fonoaudiologia.criar", $paciente->id) }}">Criar Anamnese de Fonoaudiologia</a>
                        @endif
                    @else
                        <a style="padding-top: 2%;" class="bt formularios-bt" href="{{ route("profissional.anamnese.fonoaudiologia.ver", $paciente->id) }}">Ver Anamnese de Fonoaudiologia</a>
                    @endif
                    <br>
                </div>
                <div class="col-md-4">
                    @if(!$paciente->anamneseGigantePsicopedaNeuroPsicomotos())
                        @if($profissional->temProfissao(App\Profissional::Psicopedagogo) || $profissional->temProfissao(App\Profissional::Neuropsicologo) || $profissional->ehAdmin())
                            <a style="padding-top: 1%;" class="bt formularios-bt" href="{{ route("profissional.anamnese.psicopedagogia.criar", $paciente->id) }}">Criar Anamnese de PsicopedaNeuroPsicomoto</a>
                        @endif
                    @else
                        <a style="padding-top: 1%;" class="bt formularios-bt" href="{{ route("profissional.anamnese.psicopedagogia.ver", $paciente->id) }}">Ver Anamnese de PsicopedaNeuroPsicomoto</a>
                    @endif
                    <br>
                </div>
                <div class="col-md-4">
                    @if(!$paciente->anamneseTerapiaOcupacionals)
                        @if($profissional->temProfissao(App\Profissional::TerapeutaOcupacional) || $profissional->ehAdmin())
                        <a style="padding-top: 2%;" class="bt formularios-bt" href="{{ route("profissional.anamnese.terapia_ocupacional.criar", $paciente->id) }}">Criar Anamnese de Terapia Ocupacional</a>
                        @endif
                    @else
                        <a style="padding-top: 2%;" class="bt formularios-bt" href="{{ route("profissional.anamnese.terapia_ocupacional.ver", $paciente->id) }}">Ver Anamnese de Terapia Ocupacional</a>
                    @endif
                    <br>
                </div>
            </div>
        @endif

        <div style="height: 5px;"></div>

        @if($profissional->podeCriarAvaliacao())
            <div class="row bordas_amarelas bg-padrao">
                <div class="col-md-12">
                    <br>
                    <h4 class="paciente-nav-titles">Avaliações</h4>
                </div>



                    <div class="col-md-3">
                        @if(!$paciente->avaliacaoJudo)
                            @if($profissional->temProfissao(App\Profissional::TerapeutaOcupacional) || $profissional->ehAdmin())
                                <a style="padding-top: 2%;" class="bt formularios-bt" href="{{ route("profissional.avaliacao.judo.criar", $paciente->id) }}">Criar Avaliação de Judô</a>
                            @endif
                        @else
                            <a style="padding-top: 2%;" class="bt formularios-bt" href="{{ route("profissional.avaliacao.judo.ver", $paciente->id) }}">Ver Avaliação de Judô</a>
                        @endif
                        <br>
                    </div>

                    <div class="col-md-3">
                        @if(!$paciente->avaliacaoTerapiaOcupacional)
                            @if($profissional->temProfissao(App\Profissional::TerapeutaOcupacional) || $profissional->ehAdmin())
                                <a style="padding-top: 2%;" class="bt formularios-bt" href="{{ route("profissional.avaliacao.terapia_ocupacional.criar", $paciente->id) }}">Criar Avaliação de Terapia Ocupacional</a>
                            @endif
                        @else
                            <a style="padding-top: 2%;" class="bt formularios-bt" href="{{ route("profissional.avaliacao.terapia_ocupacional.ver", $paciente->id) }}">Ver Avaliação de Terapia Ocupacional</a>
                        @endif
                        <br>
                    </div>




                    <div class="col-md-3">
                        @if(!$paciente->avaliacaoNeuro)
                            @if($profissional->temProfissao(App\Profissional::Neuropsicologo) || $profissional->ehAdmin())
                                <a style="padding-top: 2%;" class="bt formularios-bt" href="{{ route("profissional.avaliacao.neuropsicologia.criar", $paciente->id) }}">Criar Avaliação de Neuropsicologia</a>
                            @endif
                        @else
                            <a style="padding-top: 2%;" class="bt formularios-bt" href="{{ route("profissional.avaliacao.neuropsicologia.ver", $paciente->id) }}">Ver Avaliação de Neuropsicologia</a>
                        @endif
                        <br>
                    </div>


                <div class="col-md-3">

                        @if(!$paciente->avaliacaoFono)
                            @if($profissional->temProfissao(App\Profissional::Fonoaudiologo) || $profissional->ehAdmin())
                                <a style="padding-top: 2%;" class="bt formularios-bt" href="{{ route("profissional.avaliacao.fonoaudiologia.criar", $paciente->id) }}">Criar Avaliação de Fonoaudiologia</a>
                            @endif
                        @else
                            <a style="padding-top: 2%;" class="bt formularios-bt" href="{{ route("profissional.avaliacao.fonoaudiologia.ver", $paciente->id) }}">Ver Avaliação de Fonoaudiologia</a>
                        @endif
                        <br>
                </div>




            </div>
        @endif

        <div style="height: 5px;"></div>

        @if($profissional->podeCriarEvolucao())
            <div class="row bordas_amarelas bg-padrao">
                <div class="col-md-12">
                    <br>
                    <h4 class="paciente-nav-titles">Evoluções</h4>
                </div>
                <div class="col-md-3">
                <a style="padding-top: 2%;" class="bt formularios-bt" href="{{ route("profissional.evolucao.neuropsicologica.ver", $paciente->id) }}">Neuropsicológica</a>
                <br>
            </div>


                <div class="col-md-3">

                </div>

                <div class="col-md-3">

                </div>
                <div class="col-md-3">

                </div>
            </div>
        @endif

        <div style="height: 15px;"></div>

        <div class="row bordas_amarelas bg-padrao">
            <div class="col-md">

                @if(Auth::guard('profissional')->check())
                    <h3 class="pessoal"> <a href="{{ route('profissional.criar_paciente.editar', $paciente->id) }}">Editar</a> </h3>
                @endif


                <br>
                <div class="row bg-padrao">
                    <br>
                    <div class="info-pessoal">
                        <h3 class="marker-label">Informações Pessoais:</h3>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="lbinfo-static">Nome:<br><label class="lbinfo-ntstatic">{{$paciente->nome_paciente}}</label></label>
                                <br>
                                <label class="lbinfo-static">CPF:<br><label class="lbinfo-ntstatic">{{$paciente->cpf}}</label></label>
                                <br>
                                <label class="lbinfo-static">Numero de Irmãos:<br><label class="lbinfo-ntstatic">{{$paciente->numero_irmaos}}</label></label>
                            </div>
                            <div class="col-md-4">
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
                                        <label class="lbinfo-static">Nascimento:<br><label class="lbinfo-ntstatic">{{$paciente->dataNascimentoFormatada()}}</label></label>
                            </div>
                            <div class="col-md-4">
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

                            <div class="col-md-12">
                                <label class="lbinfo-static">Irmãos:<br>
                                    <div class="b-wrapper">
                                        <label class="lbinfo-ntstatic">{{$paciente->lista_irmaos}}</label></label>
                                    </div>
                                    <br>
                            </div>
                        </div>
                    </div>

                    <div class="info-pais">
                        <h3 class="marker-label">Informações sobre os pais:</h3>
                        <br>
                        <div class="row">
                            <label style="margin-left: 115px;" class="lbinfo-static"> Pai: </label>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="lbinfo-static">Nome:<br><label class="lbinfo-ntstatic">{{$paciente->nome_pai}}</label></label>
                            </div>

                            <div class="col-md-3">
                                <label class="lbinfo-static">Telefone:<br><label class="lbinfo-ntstatic">{{$paciente->telefone_pai}}</label></label>
                            </div>

                            <div class="col-md-3">
                                <label class="lbinfo-static">Email:<br><label class="lbinfo-ntstatic">{{$paciente->email_pai}}</label></label>
                            </div>

                            <div class="col-md-3">
                                <label class="lbinfo-static">Idade:<br><label class="lbinfo-ntstatic">{{$paciente->idade_pai}}</label></label>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label style="margin-left: 115px;" class="lbinfo-static"> Mãe: </label>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="lbinfo-static">Nome:<br><label class="lbinfo-ntstatic">{{$paciente->nome_mae}}</label></label>
                            </div>
                            <div class="col-md-3">
                                <label class="lbinfo-static">Telefone:<br><label class="lbinfo-ntstatic">{{$paciente->telefone_mae}}</label></label>
                                <br>
                            </div>
                            <div class="col-md-3">
                                <label class="lbinfo-static">Email:<br><label class="lbinfo-ntstatic">{{$paciente->email_mae}}</label></label>
                            </div>
                            <div class="col-md-3">
                                <label class="lbinfo-static">Idade:<br><label class="lbinfo-ntstatic">{{$paciente->idade_mae}}</label></label>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="lbinfo-static">Pais São casados?
                                    @if($paciente->pais_sao_casados == 1)
                                        <br><label class="lbinfo-ntstatic">Sim
                                    @else
                                        <br><label class="lbinfo-ntstatic">Não
                                    @endif
                                        </label></label>
                            </div>
                            <div class="col-md-4">
                                <label class="lbinfo-static">Pais São divorciados?
                                    @if($paciente->pais_sao_divorciados == 1)
                                        <br><label class="lbinfo-ntstatic">Sim
                                    @else
                                        <br><label class="lbinfo-ntstatic">Não
                                    @endif
                                        </label></label>
                            </div>
                            <div class="col-md-4">
                                @if($paciente->pais_sao_divorciados == 1)
                                    <label class="lbinfo-static">Criança vive com quem?<br><label class="lbinfo-ntstatic">{{$paciente->vive_com_quem_caso_pais_divorciados}}</label></label>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="info-localizacao">
                        <h3 class="marker-label">Endereço:</h3>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="lbinfo-static">Rua:<br><label class="lbinfo-ntstatic">{{$paciente->endereco->nome_rua}}</label></label>
                                <br>
                                <label class="lbinfo-static">Cidade:<br><label class="lbinfo-ntstatic">{{$paciente->endereco->cidade}}</label></label>
                            </div>

                            <div class="col-md-4">
                                <label class="lbinfo-static">Nº:<br><label class="lbinfo-ntstatic">{{$paciente->endereco->numero_casa}}</label></label>
                                <br>
                                <label class="lbinfo-static">Estado:<br><label class="lbinfo-ntstatic">{{$paciente->endereco->estado}}</label></label>
                            </div>

                            <div class="col-md-4">
                                <label class="lbinfo-static">Bairro:<br><label class="lbinfo-ntstatic">{{$paciente->endereco->bairro}}</label></label>
                                <br>
                                <label class="lbinfo-static">Ponto de Referência:<br><label class="lbinfo-ntstatic">{{$paciente->endereco->ponto_referencia}}</label></label>
                            </div>

                            <div class="col-md-12">
                                <label class="lbinfo-static">Descricao:<br>
                                    <div class="b-wrapper">
                                        <label class="lbinfo-ntstatic">{{$paciente->endereco->descricao}}</label></label>
                                    </div>
                                    <br>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection

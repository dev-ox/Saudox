
@extends('layouts.mainlayout')
@section('content')

    <div class="container">
        <div id="welcome_div" class="row bordas_amarelas bg-padrao">
            <div class="col-md">
                <h1 style="margin-top: 1%;">Bem vindo! {{$paciente->nome_paciente}}</h1>
                <hr class="hr_home">
            </div>
        </div>

        <div style="height: 30px;"></div>

        <div class="row">
                <div class="col-xl-3 bg-padrao box">
                    <div class="col-md-12">
                        <br>
                        <h4 class="paciente-nav-titles">Anamneses</h4>
                        @if($anamnese_fono)
                            <a href={{route('paciente.anamnese.fonoaudiologia.ver') }} class="bt paciente-bt">Fonoaudiologica</a>
                        @endif
                        @if($anamnese_pnps)
                            <a href={{route('paciente.anamnese.pnp.ver')}} class="bt paciente-bt">Psicomotricidade</a>
                        @endif
                        @if($anamnese_tocp)
                            <a href={{route('paciente.anamnese.terapia_ocupacional.ver')}} class="bt paciente-bt">Terapia Ocupacional</a>
                        @endif
                        <br>
                        <h4 class="paciente-nav-titles">Avaliações</h4>
                        @if($ava_fono)
                            <a href={{route('paciente.avaliacao.fonoaudiologia.ver')}} class="bt paciente-bt">Fonoaudiologica</a>
                        @endif
                        @if($ava_judo)
                            <a href={{route('paciente.avaliacao.judo.ver')}} class="bt paciente-bt">Judô</a>
                        @endif
                        @if($ava_neur)
                            <a href={{route('paciente.avaliacao.neuropsicologia.ver')}} class="bt paciente-bt">Neuropsicologica</a>
                        @endif
                        @if($ava_tocp)
                            <a href={{route('paciente.avaliacao.terapia_ocupacional.ver')}} class="bt paciente-bt">Terapia Ocupacional</a>
                        @endif
                        <br>
                        <h4 class="paciente-nav-titles">Evoluções</h4>
                        <a href={{route('paciente.evolucao.fonoaudiologia')}} class="bt paciente-bt">Fonoaudiologica</a>
                        <a href={{route('paciente.evolucao.judo')}} class="bt paciente-bt">Judô</a>
                        <a href={{route('paciente.evolucao.neuropsicologica')}} class="bt paciente-bt">Neuropsicologica</a>
                        <a href={{route('paciente.evolucao.terapia_ocupacional')}} class="bt paciente-bt">Terapia Ocupacional</a>
                    </div>
                </div>


                <div class="col-xl-9 bordas_amarelas bg-padrao">
                    <div class="col-xl-12">
                        <h3 class="marker-label">Próximas Consultas:</h3>
                        @if(count($agendamentos) > 0)
                            <table class="table table-borderless bg-padrao" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Hora de Entrada:</th>
                                            <th scope="col">Hora de Saída:</th>
                                            <th scope="col">Local de atendimento:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($agendamentos as $ag)
                                        <tr>
                                            <td>{{$ag->dataEntradaFormatada()}}</td>
                                            <td>{{$ag->dataSaidaFormatada()}}</td>
                                            <td>{{$ag->local_de_atendimento}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                            </table>

                        @else
                            {{$agendamentos}}
                            <h3>Não há agendamentos para você!</h3>
                        @endif
                    </div>
                    <div class="col-xl-12">
                        <div class="row bg-padrao">
                            <br>
                                <div class="info-pessoal">
                                    <h3 class="marker-label">Informações Pessoais:</h3>
                                        <br>
                                            <div class="row perfil-pac">
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
                                                    <div class="row perfil-pac">
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
                                                </div>

                                                <div class="info-localizacao">
                                                    <h3 class="marker-label">Endereço:</h3>
                                                    <br>
                                                    <div class="row perfil-pac">
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
            </div>
        </div>

@endsection

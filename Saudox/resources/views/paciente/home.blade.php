@extends('layouts.mainlayout')
@section('content')

    <div class="container">
    <div id="welcome_div" class="row bordas_amarelas bg-padrao">
        <div class="col-md">
            <h1 style="margin-top: 1%;">Bem vindo! {{$paciente->nome_paciente}}</h1>
            <br>
            <br>
        </div>
    </div>

    <div style="height: 30px;"></div>

    <div class="row">

        <div class="col-md-3 bg-padrao box">
            <div class="col-md-12">
            <br>
            @if($id_anamnese_fono != -1 || $id_anamnese_pnps != -1 || $id_anamnese_tocp != -1)
                <h4 class="paciente-nav-titles">Anamneses</h4>
            @endif
            @if($id_anamnese_fono != -1)
                <a href={{route('paciente.anamnese.fonoaudiologia.ver') }} class="bt paciente-bt old-bt">Fonoaudiologica</a>
            @endif
            @if($id_anamnese_pnps != -1)
                <a href={{route('paciente.anamnese.pnp.ver')}} class="bt paciente-bt old-bt old">Psicomotricidade</a>
            @endif
            @if($id_anamnese_tocp != -1)
                <a href={{route('paciente.anamnese.terapia_ocupacional.ver')}} class="bt paciente-bt old-bt">Terapia Ocupacional</a>
            @endif
            <br>
            @if($id_ava_fono != -1 || $id_ava_judo != -1 || $id_ava_neur != -1 || $id_ava_tocp != -1)
                <h4 class="paciente-nav-titles">Avaliações</h4>
            @endif
            @if($id_ava_fono != -1)
                <a href={{route('paciente.avaliacao.fonoaudiologia.ver')}} class="bt paciente-bt old-bt">Fonoaudiologica</a>
            @endif
            @if($id_ava_judo != -1)
                <a href={{route('paciente.avaliacao.judo.ver')}} class="bt paciente-bt old-bt">Judô</a>
            @endif
            @if($id_ava_neur != -1)
                <a href={{route('paciente.avaliacao.neuropsicologia.ver')}} class="bt paciente-bt old-bt">Neuropsicologica</a>
            @endif
            @if($id_ava_tocp != -1)
                <a href={{route('paciente.avaliacao.terapia_ocupacional.ver')}} class="bt paciente-bt old-bt">Terapia Ocupacional</a>
            @endif
            <br>
            <h4 class="paciente-nav-titles">Evoluções</h4>
            <a href={{route('paciente.evolucao.fonoaudiologia')}} class="bt paciente-bt old-bt">Fonoaudiologica</a>
            <a href={{route('paciente.evolucao.judo')}} class="bt paciente-bt old-bt">Judô</a>
            <a href={{route('paciente.evolucao.neuropsicologica')}} class="bt paciente-bt old-bt">Neuropsicologica</a>
            <a href={{route('paciente.evolucao.terapia_ocupacional')}} class="bt paciente-bt old-bt">Terapia Ocupacional</a>
        </div>
        </div>


        <div class="col-md-9 bg-padrao bordas_amarelas">

            <br>
            <br>
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
                        @if( $loop->first or $loop->iteration  <= 3 )
                                <tr>
                                    <td>{{$ag->dataEntradaFormatada()}}</td>
                                    <td>{{$ag->dataSaidaFormatada()}}</td>
                                    <td>{{$ag->local_de_atendimento}}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 style="text-align: center">Não há agendamentos para você!</h3>
            @endif
            <br>
            <br>
            <div class="row bg-padrao">
                <br>
                <div class="info-pessoal">
                    <h3 class="marker-label">Informações Pessoais:</h3>
                    <br>
                    <div class="row perfil-pac">
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
                                    <br><label class="lbinfo-ntstatic">Não</label>
                                @else
                                    <br><label class="lbinfo-ntstatic">Sim</label>
                                @endif
                            </label>
                            @endif
                        </label>
                    </div>

                    <div class="col-md-12">
                        <label class="lbinfo-static">Irmãos:<br>
                            <div class="c-wrapper">
                                <label class="lbinfo-ntstatic">{{$paciente->lista_irmaos}}</label></label>
                            </div>
                            <br>
                        </div>
                    </div>

                </div>


                <div class="info-pais">
                    <h3 class="marker-label">Informações sobre os pais:</h3>
                    <br>
                    <div class="row perfil-pac">
                        <label style="margin-left: 115px;" class="lbinfo-static"> Pai: </label>
                    </div>
                    <div class="row perfil-pac">
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
                    <div class="row perfil-pac">
                        <label style="margin-left: 115px;" class="lbinfo-static"> Mãe: </label>
                    </div>
                    <div class="row perfil-pac">
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
                    <div class="row perfil-pac">
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
                    <div class="row perfil-pac">
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
                            <label class="lbinfo-static">Descrição:<br>
                                <div class="c-wrapper">
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

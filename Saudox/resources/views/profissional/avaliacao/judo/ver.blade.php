@extends('layouts.mainlayout')
@section('content')


    <div class="container bordas_amarelas bg-padrao">
        <br>
        <br>
        <h1> Avaliação de Judô de {{$paciente->nome_paciente}} </h1>
        @if(Auth::guard('profissional')->check())
            <h3 class="pessoal"> <a href="{{ route('profissional.avaliacao.judo.editar', $paciente->id) }}">Editar</a> </h3>
        @endif
        <div class="row">
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

        </div>
        <div class="row">
            <div class="col-md-6 m-auto">
                <br>

                <br>
                <br>

                <table class="table table-bordered bg-padrao" style="text-align: center;">
                    <thead>
                    </thead>
                    <tbody>
                        <tr><td>Relação com os outros no Judô</td><td>{{$avaliacao->relacao_com_as_pessoas_judo}}</td></tr>
                        <tr><td>Resposta emocional</td><td>{{$avaliacao->resposta_emocional}}</td></tr>
                        <tr><td>Uso do corpo</td><td>{{$avaliacao->uso_do_corpo}}</td></tr>
                        <tr><td>Uso de objetos</td><td>{{$avaliacao->uso_de_objetos}}</td></tr>
                        <tr><td>Adaptação a mudanças</td><td>{{$avaliacao->adaptacao_a_mudancas}}</td></tr>
                        <tr><td>Resposta auditiva</td><td>{{$avaliacao->resposta_auditiva}}</td></tr>
                        <tr><td>Resposta visual</td><td>{{$avaliacao->resposta_visual}}</td></tr>
                        <tr><td>Medo ou Nervosismo</td><td>{{$avaliacao->medo_ou_nervosismo}}</td></tr>
                        <tr><td>Comunicação Verbal</td><td>{{$avaliacao->comunicacao_verbal}}</td></tr>
                        <tr><td>Comunicação não Verbal</td><td>{{$avaliacao->comunicacao_nao_verbal}}</td></tr>
                        <tr><td>Orientação por som</td><td>{{$avaliacao->orienta_se_por_som}}</td></tr>
                        <tr><td>Reação ao som</td><td>{{$avaliacao->reacao_ao_nao}}</td></tr>
                        <tr><td>Compreensão de comandos simples <br> com palavras que descrevem objetos</td><td>{{$avaliacao->compreendem_comandos_simples_palavras_que_descrevam_objetos}}</td></tr>
                        <tr><td>Manipulação de brinquedos e/ou objetos</td><td>{{$avaliacao->manipula_brinquedos_objetos}}</td></tr>
                        <tr><td>Equilibio</td><td>{{$avaliacao->equilibrio}}</td></tr>
                        <tr><td>Força</td><td>{{$avaliacao->forca}}</td></tr>
                        <tr><td>Resistencia</td><td>{{$avaliacao->resistencia}}</td></tr>
                        <tr><td>Marcha</td><td>{{$avaliacao->marcha}}</td></tr>
                        <tr><td>Agilidade</td><td>{{$avaliacao->agilidade}}</td></tr>
                        <tr><td>Coordenação motora fina</td><td>{{$avaliacao->coordenacao_motora_fina}}</td></tr>
                        <tr><td>Coordenação motora grossa</td><td>{{$avaliacao->coordenacao_motora_grossa}}</td></tr>
                        <tr><td>Propriocepção</td><td>{{$avaliacao->propriocepcao}}</td></tr>
                        <tr><td>Compreensão de direções</td><td>{{$avaliacao->compreende_direcoes}}</td></tr>
                        <tr><td>Compreensão de comandos de professores</td><td>{{$avaliacao->compreende_comandos_professoras}}</td></tr>
                        <tr><td>Concentração</td><td>{{$avaliacao->concentracao}}</td></tr>
                        <tr><td>Comportamento reflexivo</td><td>{{$avaliacao->comportamento_reflexo}}</td></tr>
                    </tbody>
                </table>

                <br>
                <br>
                <br>

                <h3>Observações</h3>
                <p> {{ $avaliacao->observacoes }}</p>

                <br>

                <h3>Terapias</h3>
                <p> {{ $avaliacao->terapias}}</p>

                <br>

                <h3>Objetivos</h3>
                <p> {{ $avaliacao->objetivos}}</p>

                <br>

                <h3>Tipo da aula</h3>
                <p> {{ $avaliacao->tipo_da_aula}}</p>

                <br>

                <h3>Diagnostico</h3>
                <p> {{ $avaliacao->diagnostico}}</p>
            </div>
        </div>
    </div>

@endsection

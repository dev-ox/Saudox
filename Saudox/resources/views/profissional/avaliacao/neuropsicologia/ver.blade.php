@extends('layouts.mainlayout')
@section('content')


    <div class="container">
        <div class="row bordas_amarelas bg-padrao">
            <div class="col-md">


                <h1 class="pessoal">Avaliação Neuropsicológica de {{$paciente->nome_paciente}}</h1>
                @if(Auth::guard('profissional')->check())
                    <h3 class="pessoal"> <a href="{{ route('profissional.avaliacao.neuropsicologia.editar', $paciente->id) }}">Editar</a> </h3>
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
                <br>
                <div>
                    <h3 class="marker-label">Informações Iniciais</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Encaminhado por:<br><label class="lbinfo-ntstatic">{{$avaliacao->encaminhado_por}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <label class="lbinfo-static">Queixa Principal:<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->queixa_principal}}</label>
                                    </div>
                                </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <label class="lbinfo-static">Participantes durante a Anamnese:<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->participantes_durante_anaminese}}</label>
                                    </div>
                                </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <label class="lbinfo-static">Descrição das funções cognitivas avaliadas<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->descricao_das_funcoes_cognitivas_avaliadas}}</label>
                                    </div>
                                </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <label class="lbinfo-static">Testes neuropsicológicos:<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->testes_neuropsicologicos}}</label>
                                    </div>
                                </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <label class="lbinfo-static">Recursos complementares usados no testes neuropsicológicos:<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->recursos_complementares}}</label>
                                    </div>
                                </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <label class="lbinfo-static">Quantidade de dias necessários para avaliação:<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->dias_necessarios_para_avaliacao_justificados_se_mais_que_4_dias}}</label>
                                    </div>
                                </label>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="marker-label">Condições do (a) paciente nos dias da avaliação relativas à</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Alimentação nos dias da avaliação<br><label class="lbinfo-ntstatic">{{$avaliacao->alimentacao_nos_dias_da_avalicao}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Sono nos dias da avaliação<br><label class="lbinfo-ntstatic">{{$avaliacao->sono_nos_dias_da_avalicao}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Higiene nos dias da avaliação<br><label class="lbinfo-ntstatic">{{$avaliacao->higiene_nos_dias_da_avalicao}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Humor nos dias da avaliação<br><label class="lbinfo-ntstatic">{{$avaliacao->humor_nos_dias_da_avalicao}}</label></label>
                        </div>
                    </div>
                </div>


                <div>
                    <h3 class="marker-label">Análise quantitativa e qualitativa dos resultados</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Apontar áreas preservadas<br><label class="lbinfo-ntstatic">{{$avaliacao->areas_preservadas}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Apontar áreas lesionadas<br><label class="lbinfo-ntstatic">{{$avaliacao->areas_lesionadas}}</label></label>
                        </div>
                    </div>
                    <div class="row bg-padrao-claro">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Laudo<br><label class="lbinfo-ntstatic">{{$avaliacao->anexar_arquivos}}</label></label>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="marker-label">Devolutiva aos responsáveis</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Data e Hora<br><label class="lbinfo-ntstatic">{{$avaliacao->dia_hora_devolutiva_aos_responsavel_formatado()}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Participantes<br><label class="lbinfo-ntstatic">{{$avaliacao->participantes}}</label></label>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="marker-label">Elaboração do Programa de Reabilitação Neuropsicológica</h3>
                    <br>
                    <br>
                    <h3 class="marker-label">Atividades para serem feitas na clínica:</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-wrapper">
                                <table class="ag table">
                                    <thead id="home-profissional">
                                        <tr class="ag table-row">
                                            <th class="tag">Nome da atividade:</th>
                                            <th class="tag">Recurso utilizado:</th>
                                            <th class="tag">Tempo de duração:</th>
                                            <th class="tag">Função cognitiva:</th>
                                            <th class="tag">Objetivo:</th>
                                            <th class="tag">Resultados:</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($avaliacao->atividades_para_ser_feito_na_clinica() as $idx => $atividade_clinica)
                                        <tr>
                                            <td class="corsim">{{$atividade_clinica->nome_atividade}}</td>
                                            <td class="corsim">{{$atividade_clinica->recursos_utilizados}}</td>
                                            <td class="corsim">{{$atividade_clinica->tempo_de_duracao}}</td>
                                            <td class="corsim">{{ $atividade_clinica->funcao_cognitiva}}</td>
                                            <td class="corsim">{{$atividade_clinica->objetivo}}</td>
                                            <td class="corsim">{{$atividade_clinica->resultados}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <br>
                    <h3 class="marker-label">Atividades para serem feitas em casa:</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-wrapper">
                                <table class="ag table">
                                    <thead id="home-profissional">
                                        <tr class="ag table-row">
                                            <th class="tag">Nome da atividade:</th>
                                            <th class="tag">Recurso utilizado:</th>
                                            <th class="tag">Tempo de duração:</th>
                                            <th class="tag">Função cognitiva:</th>
                                            <th class="tag">Objetivo:</th>
                                            <th class="tag">Resultados:</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($avaliacao->atividades_para_ser_feito_em_casa() as $idx => $atividade_clinica)
                                        <tr>
                                            <td class="corsim">{{$atividade_clinica->nome_atividade}}</td>
                                            <td class="corsim">{{$atividade_clinica->recursos_utilizados}}</td>
                                            <td class="corsim">{{$atividade_clinica->tempo_de_duracao}}</td>
                                            <td class="corsim">{{$atividade_clinica->funcao_cognitiva}}</td>
                                            <td class="corsim">{{$atividade_clinica->objetivo}}</td>
                                            <td class="corsim">{{$atividade_clinica->resultados}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <br>
                    <br>
                    <h3 class="marker-label">Sugestão de encaminhamento</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Sugestão de encaminhamento:<br><label class="lbinfo-ntstatic">{{$avaliacao->sugestao_encaminhamento}}</label></label>
                        </div>
                    </div>
                    <div class="row bg-padrao-claro">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Exames clínicos:<br><label class="lbinfo-ntstatic">
                            @if($avaliacao->exames_clinicos_se_houver)
                                {{$avaliacao->exames_clinicos_se_houver}}
                            @else
                                Nenhum exame
                            @endif
                            </label></label>
                        </div>
                    </div>
                </div>

                <br>
                <br>
                <br>



            </div>
        </div>
    </div>

@endsection

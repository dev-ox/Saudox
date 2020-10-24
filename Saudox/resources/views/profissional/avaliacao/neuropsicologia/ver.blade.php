@extends('layouts.mainlayout')
@section('content')


    <div class="container">
        <div class="row bordas_amarelas bg-padrao">
            <div class="col-md">


                <h1 class="pessoal">Avaliação Neuropsicológica de {{$paciente->nome_paciente}}</h1>
                @if(Auth::guard('profissional')->check())
                    <h3 class="pessoal"> <a href="{{ route('profissional.avaliacao.neuropsicologia.editar', $paciente->id) }}">Editar</a> </h3>
                @endif

                <br>
                <div class="info-pessoal">
                    <h3 class="marker-label">Informações Pessoais:</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Nome:<br><label class="lbinfo-ntstatic">{{$paciente->nome_paciente}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">CPF:<br><label class="lbinfo-ntstatic">{{$paciente->cpf}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Número de Irmãos:<br><label class="lbinfo-ntstatic">{{$paciente->numero_irmaos}}</label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Naturalidade:<br><label class="lbinfo-ntstatic">{{$paciente->naturalidade}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Sexo:
                            @if($paciente->sexo == 0)
                            <br><label class="lbinfo-ntstatic">Masculino
                            @else
                            <br><label class="lbinfo-ntstatic">Feminino
                            @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-perfis">Nascimento:<br><label class="lbinfo-ntstatic">{{$paciente->dataNascimentoFormatada()}}</label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Responsavel:<br><label class="lbinfo-ntstatic">{{$paciente->responsavel}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Filho Biológico:
                            @if($paciente->tipo_filho_biologico_adotivo == 0)
                            <br><label class="lbinfo-ntstatic">Sim
                            @else
                            <br><label class="lbinfo-ntstatic">Adotado
                            @endif
                            </label></label>
                            <br>
                            @if($paciente->tipo_filho_biologico_adotivo == 1)
                            <label class="lbinfo-perfis">Paciente sabe que é adotado:
                            @if($paciente->crianca_sabe_se_adotivo == 0)
                            <br><label class="lbinfo-ntstatic">Não
                            @else
                            <br><label class="lbinfo-ntstatic">Sim
                            @endif
                            </label></label>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Irmãos:<br>
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
                        <label style="margin-left: 65px;" class="lbinfo-perfis"> Pai: </label>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Nome:<br><label class="lbinfo-ntstatic">{{$paciente->nome_pai}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Telefone:<br><label class="lbinfo-ntstatic">{{$paciente->telefone_pai}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Email:<br><label class="lbinfo-ntstatic">{{$paciente->email_pai}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Idade:<br><label class="lbinfo-ntstatic">{{$paciente->idade_pai}}</label></label>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <label style="margin-left: 65px;" class="lbinfo-perfis"> Mãe: </label>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Nome:<br><label class="lbinfo-ntstatic">{{$paciente->nome_mae}}</label></label>
                        </div>
                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Telefone:<br><label class="lbinfo-ntstatic">{{$paciente->telefone_mae}}</label></label>
                            <br>
                        </div>
                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Email:<br><label class="lbinfo-ntstatic">{{$paciente->email_mae}}</label></label>
                        </div>
                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Idade:<br><label class="lbinfo-ntstatic">{{$paciente->idade_mae}}</label></label>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Pais São casados?
                            @if($paciente->pais_sao_casados == 1)
                            <br><label class="lbinfo-ntstatic">Sim
                            @else
                            <br><label class="lbinfo-ntstatic">Não
                            @endif
                            </label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Pais São divorciados?
                            @if($paciente->pais_sao_divorciados == 1)
                            <br><label class="lbinfo-ntstatic">Sim
                            @else
                            <br><label class="lbinfo-ntstatic">Não
                            @endif
                            </label></label>
                        </div>
                        <div class="col-md-4">
                            @if($paciente->pais_sao_divorciados == 1)
                            <label class="lbinfo-perfis">Criança vive com quem?<br><label class="lbinfo-ntstatic">{{$paciente->vive_com_quem_caso_pais_divorciados}}</label></label>
                            @endif
                        </div>
                    </div>
                <br>
                <div>
                    <h3 class="marker-label">Informações Iniciais</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Encaminhado por:<br><label class="lbinfo-ntstatic">{{$avaliacao->encaminhado_por}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <label class="lbinfo-perfis">Queixa Principal:<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->queixa_principal}}</label>
                                    </div>
                                </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <label class="lbinfo-perfis">Participantes durante a Anamnese:<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->participantes_durante_anaminese}}</label>
                                    </div>
                                </label>
                        </div>
                    </div>

                    <h3 class="marker-label">Funções cognitivas avaliadas</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                                <label class="lbinfo-perfis">Descrição das funções:<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->descricao_das_funcoes_cognitivas_avaliadas}}</label>
                                    </div>
                                </label>
                        </div>
                    </div>

                    <h3 class="marker-label">Instrumentos avaliativos utilizados</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                                <label class="lbinfo-perfis">Testes neuropsicológicos:<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->testes_neuropsicologicos}}</label>
                                    </div>
                                </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <label class="lbinfo-perfis">Recursos complementares usados no testes neuropsicológicos:<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->recursos_complementares}}</label>
                                    </div>
                                </label>
                        </div>
                    </div>
                    <h3 class="marker-label">Quantidade de dias necessários para avaliação:</h3>
                    <div class="row">
                        <div class="col-md-12">
                                <label class="lbinfo-perfis"><br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->dias_necessarios_para_avaliacao_justificados_se_mais_que_4_dias}}</label>
                                    </div>
                                </label>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="marker-label">Condições do(a) paciente nos dias da avaliação relativas à</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Alimentação nos dias da avaliação:<br><label class="lbinfo-ntstatic">{{$avaliacao->alimentacao_nos_dias_da_avalicao}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Sono nos dias da avaliação:<br><label class="lbinfo-ntstatic">{{$avaliacao->sono_nos_dias_da_avalicao}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Higiene nos dias da avaliação:<br><label class="lbinfo-ntstatic">{{$avaliacao->higiene_nos_dias_da_avalicao}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Humor nos dias da avaliação:<br><label class="lbinfo-ntstatic">{{$avaliacao->humor_nos_dias_da_avalicao}}</label></label>
                        </div>
                    </div>
                </div>


                <div>
                    <h3 class="marker-label">Análise quantitativa e qualitativa dos resultados</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Apontar áreas preservadas:<br><label class="lbinfo-ntstatic">{{$avaliacao->areas_preservadas}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Apontar áreas lesionadas:<br><label class="lbinfo-ntstatic">{{$avaliacao->areas_lesionadas}}</label></label>
                        </div>
                    </div>
                    <div class="row bg-padrao-claro">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Laudo  ESSE CAMPO NÃO ESTÁ PRONTO POIS É UM ARQUIVO!!!!: <br><label class="lbinfo-ntstatic">{{$avaliacao->anexar_arquivos}}</label></label>
                        </div>
                    </div>
                </div>

                <div>
                    <br>
                    <h3 class="marker-label">Hipótese diagnóstica</h3>
                    <div class="row">
                        <label class="lbinfo-perfis"><br>
                            <div class="c-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->hipotese_diagnostica}}</label>
                            </div>
                        </label>

                    </div>
                </div>

                <div>
                    <h3 class="marker-label">Devolutiva aos responsáveis</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Data e Hora:<br><label class="lbinfo-ntstatic">{{$avaliacao->dia_hora_devolutiva_aos_responsavel_formatado()}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Participantes:<br><label class="lbinfo-ntstatic">{{$avaliacao->participantes}}</label></label>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="marker-label">Elaboração do Programa de Reabilitação Neuropsicológica</h3>
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
                            <label class="lbinfo-perfis">Sugestão de encaminhamento:<br><label class="lbinfo-ntstatic">{{$avaliacao->sugestao_encaminhamento}}</label></label>
                        </div>
                    </div>
                    <h3 class="marker-label">Anexos de exames clínicos:</h3>
                    <div class="row bg-padrao-claro">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis"><br><label class="lbinfo-ntstatic">
                            <h1> ESSE CAMPO NÃO ESTÁ PRONTO POIS É UM ARQUIVO!!!! </h1>
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

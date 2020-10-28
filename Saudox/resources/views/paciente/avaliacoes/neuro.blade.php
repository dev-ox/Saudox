@extends('layouts.mainlayout')
@section('content')


    <div class="container">
        <div class="row bordas_amarelas bg-padrao">
            <div class="col-md">


                <h1 class="pessoal">Avaliação Neuropsicológica</h1>
                <br>
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

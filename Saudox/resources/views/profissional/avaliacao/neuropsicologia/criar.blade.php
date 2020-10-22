@extends('layouts.mainlayout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="espacador_mesma_altura_top_nav"></div>
            <div style="text-align: center; width: 100%;">
                <div class = "caixa_form">
                    <br>
                    <h1>Avaliação de Neuropsicologia/Terapia Ocupacional/PsicoMotricidade de {{$paciente->nome_paciente}}</h1>

                    <form method="post" action="{{route('profissional.avaliacao.neuropsicologia.criar.salvar')}}" enctype="multipart/form-data">
                        <!-- CROSS Site Request Forgery Protection -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul style="padding: 0px;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        <input value="{{$paciente->id}}" type="hidden"  name="id_paciente" id="id_paciente">
                        <input value="{{Auth::id()}}" type="hidden"  name="id_profissional" id="id_profissional">

                        <hr class="hr_form">
                        <h3>Informações Iniciais</h3>

                        <label class="required">Encaminhado por:</label><br>
                        <input value="{{ g_old($avaliacao, 'encaminhado_por') }}" type="text" name="encaminhado_por" id="encaminhado_por" required>

                        <label class="required">Queixa Principal:</label><br>
                        <input value="{{ g_old($avaliacao, 'queixa_principal') }}" type="text" name="queixa_principal" id="posicao_bloco_familiar" required>

                        <label class="required">Participantes durante a Anamnese</label><br>
                        <input value="{{ g_old($avaliacao, 'participantes_durante_anaminese') }}" type="text" name="participantes_durante_anaminese" id="participantes_durante_anaminese" required>

                        <h3 class="required">Descrição das funções cognitivas avaliadas</h3><br>
                        <textarea class="textareas_form" id="descricao_das_funcoes_cognitivas_avaliadas" name="descricao_das_funcoes_cognitivas_avaliadas" rows="4" cols="50" style="" required>{{ g_old($avaliacao, "descricao_das_funcoes_cognitivas_avaliadas")}}</textarea><br><br>


                        <h3 class="required">Testes neuropsicológicos</h3><br>
                        <input value="{{ g_old($avaliacao, 'testes_neuropsicologicos') }}" type="text" name="testes_neuropsicologicos" id="testes_neuropsicologicos" required>

                        <h3 class="required">Recursos complementares usados no testes neuropsicológicos</h3><br>
                        <input value="{{ g_old($avaliacao, 'recursos_complementares') }}" type="text" name="recursos_complementares" id="recursos_complementares" required>

                        <h3 class="required">Quantidade de dias necessários para avaliação</h3><br>
                        <input value="{{ g_old($avaliacao, 'dias_necessarios_para_avaliacao_justificados_se_mais_que_4_dias') }}" type="text" name="dias_necessarios_para_avaliacao_justificados_se_mais_que_4_dias" id="dias_necessarios_para_avaliacao_justificados_se_mais_que_4_dias" placeholder="3, 4 dias... descreva intercorrencias se tiver" required>


                        <hr class="hr_form">
                        <h3>Condições do (a) paciente nos dias da avaliação relativas à</h3>


                        <label class="required">Alimentação nos dias da avaliação</label><br>
                        <input value="{{ g_old($avaliacao, 'alimentacao_nos_dias_da_avalicao') }}" type="text" name="alimentacao_nos_dias_da_avalicao" id="alimentacao_nos_dias_da_avalicao" required>

                        <label class="required">Sono nos dias da avaliação</label><br>
                        <input value="{{ g_old($avaliacao, 'sono_nos_dias_da_avalicao') }}" type="text" name="sono_nos_dias_da_avalicao" id="sono_nos_dias_da_avalicao" required>

                        <label class="required">Higiene nos dias da avaliação</label><br>
                        <input value="{{ g_old($avaliacao, 'higiene_nos_dias_da_avalicao') }}" type="text" name="higiene_nos_dias_da_avalicao" id="higiene_nos_dias_da_avalicao" required>

                        <label class="required">Humor nos dias da avaliação</label><br>
                        <input value="{{ g_old($avaliacao, 'humor_nos_dias_da_avalicao') }}" type="text" name="humor_nos_dias_da_avalicao" id="humor_nos_dias_da_avalicao" required>




                        <hr class="hr_form">
                        <h3>Análise quantitativa e qualitativa dos resultados</h3>

                        <label class="required">Apontar áreas preservadas</label><br>
                        <input value="{{ g_old($avaliacao, 'areas_preservadas') }}" type="text" name="areas_preservadas" id="areas_preservadas" required>

                        <label class="required">Apontar áreas lesionadas</label><br>
                        <input value="{{ g_old($avaliacao, 'areas_lesionadas') }}" type="text" name="areas_lesionadas" id="areas_lesionadas" required>

                        <label>Anexar laudo</label><br>
                        <input type="file" name="anexar_arquivos" id="anexar_arquivos">


                        <hr class="hr_form">
                        <h3 class="required">Hipótese diagnóstica</h3>
                        <textarea class="textareas_form" id="hipotese_diagnostica" name="hipotese_diagnostica" rows="4" cols="50" style="" required>{{ g_old($avaliacao, "hipotese_diagnostica")}}</textarea><br><br>





                        <hr class="hr_form">
                        <h3>Devolutiva aos responsáveis</h3>

                        <label class="required">Dia</label>
                        <input type="date" name="dia_devolutiva" id="dia_devolutiva" value="{{ g_old($avaliacao, 'dia_devolutiva') }}" required>

                        <label class="required">Hora</label>
                        <input type="time" name="hora_devolutiva" id="hora_devolutiva" value="{{ g_old($avaliacao, 'hora_devolutiva') }}" required>

                        <label class="required">Participantes</label><br>
                        <input value="{{ g_old($avaliacao, 'participantes') }}" type="text" name="participantes" id="participantes" required>



                        <hr class="hr_form">
                        <h3>Elaboração do Programa de Reabilitação Neuropsicológica</h3>
                        <hr class="hr_form">
                        <h3>Atividades para serem feitas na clínica</h3>

                        <div class="text-center justify-content-center" style="width: 90%; margin:auto;" >
                            <table class="tabelao_input table table-dark justify-content-center text-center" id="tabela_atividades_para_ser_feita_na_clinica">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome da atividade</th>
                                        <th scope="col">Recurso utilizado</th>
                                        <th scope="col">Tempo de duração</th>
                                        <th scope="col">Função cognitiva</th>
                                        <th scope="col">Objetivo</th>
                                        <th scope="col">Resultados</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td><textarea required class="textareas_form" row="4" cols="10" name="atividades_para_ser_feito_na_clinica[0][nome_atividade]"></textarea></td>
                                        <td><textarea required class="textareas_form" row="4" cols="10" name="atividades_para_ser_feito_na_clinica[0][recursos_utilizados]"></textarea></td>
                                        <td><textarea required class="textareas_form" row="4" cols="10" name="atividades_para_ser_feito_na_clinica[0][tempo_de_duracao]"></textarea></td>
                                        <td><textarea required class="textareas_form" row="4" cols="10" name="atividades_para_ser_feito_na_clinica[0][funcao_cognitiva]"></textarea></td>
                                        <td><textarea required class="textareas_form" row="4" cols="10" name="atividades_para_ser_feito_na_clinica[0][objetivo]"></textarea></td>
                                        <td><textarea required class="textareas_form" row="4" cols="10" name="atividades_para_ser_feito_na_clinica[0][resultados]"></textarea></td>
                                        <td style="vertical-align: middle;"><a onclick="remover_linha(this)" class="bt" style="margin: auto;width: 25px; padding:0px; cursor: pointer;">X</a></td>
                                    </tr>

                                </tbody>


                                    <tr>
                                        <td style="position: relative;left: 40%;">
                                            <a onclick="add_linha_na_tabela(this)" style="margin: auto; cursor: pointer;" class="bt">Adicionar atividade</a>
                                        </td>
                                    </tr>


                            </table>
                        </div>




                        <hr class="hr_form">
                        <h3>Atividades para serem feitas em casa</h3>

                        <div class="text-center justify-content-center" style="width: 90%; margin:auto;" >
                            <table class="tabelao_input table table-dark justify-content-center text-center" id="tabela_atividades_para_ser_feita_em_casa">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome da atividade</th>
                                        <th scope="col">Recurso utilizado</th>
                                        <th scope="col">Tempo de duração</th>
                                        <th scope="col">Função cognitiva</th>
                                        <th scope="col">Objetivo</th>
                                        <th scope="col">Resultados</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td><textarea required class="textareas_form" row="4" cols="10" name="atividades_para_ser_feito_em_casa[0][nome_atividade]"></textarea></td>
                                        <td><textarea required class="textareas_form" row="4" cols="10" name="atividades_para_ser_feito_em_casa[0][recursos_utilizados]"></textarea></td>
                                        <td><textarea required class="textareas_form" row="4" cols="10" name="atividades_para_ser_feito_em_casa[0][tempo_de_duracao]"></textarea></td>
                                        <td><textarea required class="textareas_form" row="4" cols="10" name="atividades_para_ser_feito_em_casa[0][funcao_cognitiva]"></textarea></td>
                                        <td><textarea required class="textareas_form" row="4" cols="10" name="atividades_para_ser_feito_em_casa[0][objetivo]"></textarea></td>
                                        <td><textarea required class="textareas_form" row="4" cols="10" name="atividades_para_ser_feito_em_casa[0][resultados]"></textarea></td>
                                        <td style="vertical-align: middle;"><a onclick="remover_linha(this)" class="bt" style="margin: auto;width: 25px; padding:0px; cursor: pointer;">X</a></td>
                                    </tr>

                                </tbody>


                                    <tr>
                                        <td style="position: relative;left: 40%;">
                                            <a onclick="add_linha_na_tabela(this)" style="margin: auto; cursor: pointer;" class="bt">Adicionar atividade</a>
                                        </td>
                                    </tr>


                            </table>
                        </div>

                        <hr class="hr_form">
                        <h3>Sugestão de encaminhamento</h3>

                        <label>Sugestão de encaminhamento</label><br>
                        <textarea placeholder="Nome do profissional e motivo" class="textareas_form" id="sugestao_encaminhamento" name="sugestao_encaminhamento" rows="4" cols="50" style="">{{ g_old($avaliacao, "sugestao_encaminhamento")}}</textarea><br><br>

                        <label>Exames clínicos (se houver)</label><br>
                        <input type="file" name="exames_clinicos_se_houver" id="exames_clinicos_se_houver">

                        <input type="submit" value="Salvar avaliação">

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

<link href="{{ asset('css/tabela.css') }}" rel="stylesheet">
<script src="{{ asset('js/tabela.js') }}" defer></script>

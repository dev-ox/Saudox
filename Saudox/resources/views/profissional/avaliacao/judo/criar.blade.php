@extends('layouts.mainlayout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="espacador_mesma_altura_top_nav"></div>
            <div style="text-align: center; width: 100%;">
                <div class = "caixa_form">
                    <br>
                    <h1>Avaliação de Judo de {{$paciente->nome_paciente}}</h1>
                    <h3>Notas de 0 à 10</h3>

                    <form method="post" action="{{route('profissional.avaliacao.judo.criar.salvar')}}">
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

                        <h2 style="margin: auto; color: var(--cor_amarelo)">Avaliação Geral</h2>

                        <hr class="hr_form">
                        <h3>Relações com outras pessoas enquanto pratica judô</h3><br>
                        <input type="number" step="0.1" id="relacao_com_as_pessoas_judo" name="relacao_com_as_pessoas_judo" min="0" max="10" value="{{ old("relacao_com_as_pessoas_judo") }}">


                        <hr class="hr_form">
                        <h3>Resposta emocional</h3><br>
                        <input type="number" step="0.1" id="resposta_emocional" name="resposta_emocional" min="0" max="10" value="{{ old("resposta_emocional") }}">


                        <hr class="hr_form">
                        <h3>Uso do corpo</h3><br>
                        <input type="number" step="0.1" id="uso_do_corpo" name="uso_do_corpo" min="0" max="10" value="{{ old("uso_do_corpo") }}">


                        <hr class="hr_form">
                        <h3>Uso de objetos</h3><br>
                        <input type="number" step="0.1" id="uso_de_objetos" name="uso_de_objetos" min="0" max="10" value="{{ old("uso_de_objetos") }}">

                        <hr class="hr_form">
                        <h3>Adaptação à mudanças</h3><br>
                        <input type="number" step="0.1" id="adaptacao_a_mudancas" name="adaptacao_a_mudancas" min="0" max="10" value="{{ old("adaptacao_a_mudancas") }}">

                        <hr class="hr_form">
                        <h3>Resposta Auditiva</h3><br>
                        <input type="number" step="0.1" id="resposta_auditiva" name="resposta_auditiva" min="0" max="10" value="{{ old("resposta_auditiva") }}">

                        <hr class="hr_form">
                        <h3>Resposta Visual</h3><br>
                        <input type="number" step="0.1" id="resposta_visual" name="resposta_visual" min="0" max="10" value="{{ old("resposta_visual") }}">

                        <hr class="hr_form">
                        <h3>Medo ou Nervosismo enquanto pratica judô</h3><br>
                        <input type="number" step="0.1" id="medo_ou_nervosismo" name="medo_ou_nervosismo" min="0" max="10" value="{{ old("medo_ou_nervosismo") }}">

                        <hr class="hr_form">
                        <h3>Comunicação Verbal</h3><br>
                        <input type="number" step="0.1" id="comunicacao_verbal" name="comunicacao_verbal" min="0" max="10" value="{{ old("comunicacao_verbal") }}">

                        <hr class="hr_form">
                        <h3>Comunicação Não Verbal</h3><br>
                        <input type="number" step="0.1" id="comunicacao_nao_verbal" name="comunicacao_nao_verbal" min="0" max="10" value="{{ old("comunicacao_nao_verbal") }}">

                        <hr class="hr_form">
                        <h3>Capacidade de orientar-se por som</h3><br>
                        <input type="number" step="0.1" id="orienta_se_por_som" name="orienta_se_por_som" min="0" max="10" value="{{ old("orienta_se_por_som") }}">

                        <hr class="hr_form">
                        <h3 >Reação ao "Não"</h3><br>
                        <input type="number" step="0.1" id="reacao_ao_nao" name="reacao_ao_nao" min="0" max="10" value="{{ old("reacao_ao_nao") }}">

                        <hr class="hr_form">
                        <h3>Compreensão de comandos simples com palavras que descrevam objetos</h3><br>
                        <input type="number" step="0.1" id="compreendem_comandos_simples_palavras_que_descrevam_objetos" name="compreendem_comandos_simples_palavras_que_descrevam_objetos" min="0" max="10" value="{{ old("compreendem_comandos_simples_palavras_que_descrevam_objetos") }}">

                        <hr class="hr_form">
                        <h3>Manipula brinquedos/objetos</h3><br>
                        <input type="number" step="0.1" id="manipula_brinquedos_objetos" name="manipula_brinquedos_objetos" min="0" max="10" value="{{ old("manipula_brinquedos_objetos") }}">

                        <hr class="hr_form">
                        <h2 style="margin: auto; color: var(--cor_amarelo)">Avaliação de aptidão para o Judô</h2>
                        <hr class="hr_form">


                        <hr class="hr_form">
                        <h3>Equilibro</h3><br>
                        <input type="number" step="0.1" id="equilibrio" name="equilibrio" min="0" max="10" value="{{ old("equilibrio") }}">

                        <hr class="hr_form">
                        <h3>Força</h3><br>
                        <input type="number" step="0.1" id="forca" name="forca" min="0" max="10" value="{{ old("forca") }}">

                        <hr class="hr_form">
                        <h3>Resistência</h3><br>
                        <input type="number" step="0.1" id="resistencia" name="resistencia" min="0" max="10" value="{{ old("resistencia") }}">

                        <hr class="hr_form">
                        <h3>Marcha</h3><br>
                        <input type="number" step="0.1" id="marcha" name="marcha" min="0" max="10" value="{{ old("marcha") }}">

                        <hr class="hr_form">
                        <h3>Agilidade</h3><br>
                        <input type="number" step="0.1" id="agilidade" name="agilidade" min="0" max="10" value="{{ old("agilidade") }}">

                        <hr class="hr_form">
                        <h3>Coordenação motora fina</h3><br>
                        <input type="number" step="0.1" id="coordenacao_motora_fina" name="coordenacao_motora_fina" min="0" max="10" value="{{ old("coordenacao_motora_fina") }}">

                        <hr class="hr_form">
                        <h3>Coordenação motora grossa</h3><br>
                        <input type="number" step="0.1" id="coordenacao_motora_grossa" name="coordenacao_motora_grossa" min="0" max="10" value="{{ old("coordenacao_motora_grossa") }}">

                        <hr class="hr_form">
                        <h3>Propriocepção</h3><br>
                        <input type="number" step="0.1" id="propriocepcao" name="propriocepcao" min="0" max="10" value="{{ old("propriocepcao") }}">

                        <hr class="hr_form">
                        <h3>Compreensão de direções</h3><br>
                        <input type="number" step="0.1" id="compreende_direcoes" name="compreende_direcoes" min="0" max="10" value="{{ old("compreende_direcoes") }}">

                        <hr class="hr_form">
                        <h3>Compreensão de comandos dos professores</h3><br>
                        <input type="number" step="0.1" id="compreende_comandos_professoras" name="compreende_comandos_professoras" min="0" max="10" value="{{ old("compreende_comandos_professoras") }}">

                        <hr class="hr_form">
                        <h3>Concentração</h3><br>
                        <input type="number" step="0.1" id="concentracao" name="concentracao" min="0" max="10" value="{{ old("concentracao") }}">

                        <hr class="hr_form">
                        <h3>Comportamento reflexo</h3><br>
                        <input type="number" step="0.1" id="comportamento_reflexo" name="comportamento_reflexo" min="0" max="10" value="{{ old("comportamento_reflexo") }}">

                        <hr class="hr_form">
                        <h3>Observações</h3><br>
                        <textarea class="textareas_form" id="observacoes" name="observacoes" rows="4" cols="50" style="">{{old("observacoes")}}</textarea>

                        <hr class="hr_form">
                        <h3>Terapias</h3><br>
                        <textarea class="textareas_form" id="terapias" name="terapias" rows="4" cols="50" style="">{{old("terapias")}}</textarea>

                        <hr class="hr_form">
                        <h3>Objetivos</h3><br>
                        <textarea class="textareas_form" id="objetivos" name="objetivos" rows="4" cols="50" style="">{{old("objetivos")}}</textarea>

                        <hr class="hr_form">
                        <h3>Diagnostico</h3><br>
                        <textarea class="textareas_form" id="diagnostico" name="diagnostico" rows="4" cols="50" style="">{{old("diagnostico")}}</textarea>

                        <hr class="hr_form">
                        <h3>Tipo de aula</h3><br>
                        <input type="text" id="tipo_da_aula" name="tipo_da_aula" value="{{ old("tipo_da_aula") }}">

                        <br>
                        <br>
                        <br>

                        <input type="submit" value="Salvar avaliação">

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

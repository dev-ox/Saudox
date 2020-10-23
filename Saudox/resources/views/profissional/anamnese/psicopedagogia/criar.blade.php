@extends('layouts.mainlayout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="espacador_mesma_altura_top_nav"></div>
            <div style="text-align: center; width: 100%;">
                <div class = "caixa_form">
                    <br>
                    <div id="pontos_pags">
                    </div>

                    <br>

                    <h1>Criar Anamnese PNP de {{$paciente->nome_paciente}}</h1>



                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="padding: 0px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form style="margin-top: 0px;" method="post" action="{{route('profissional.anamnese.psicopedagogia.criar.salvar')}}">

                        <!-- CROSS Site Request Forgery Protection -->
                        @csrf

                        <input value="{{$paciente->id}}" type="hidden"  name="id_paciente" id="id_paciente">
                        <input value="{{Auth::id()}}" type="hidden"  name="id_profissional" id="id_profissional">



                        <div class="pag_form">

                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Entrevista</h1>
                            <br>
                            <h3>Compareceram à entrevista</h3>
                            <input type="text" name="compareceram_entrevista" value="{{ g_old($anamnese, "compareceram_entrevista") }}" />

                            <h3>Queixa (motivo)</h3>
                            <textarea class="textareas_form" name="queixa" rows="4" cols="50" style="">{{ g_old($anamnese, "queixa") }}</textarea>





                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Escola</h1>
                            <br>

                            <h3>Escolaridade</h3>
                            <input type="text" name="escolaridade" value="{{ g_old($anamnese, "escolaridade") }}" />

                            <h3>Turno de aulas</h3>
                            <input type="text" name="turno_das_aulas" value="{{ g_old($anamnese, "turno_das_aulas") }}" />

                            <h3>Horário das aulas</h3>
                            <input type="text" name="horario_das_aulas" value="{{ g_old($anamnese, "horario_das_aulas") }}" />

                            <h3>Escola</h3>
                            <input type="text" name="escola" value="{{ g_old($anamnese, "escola") }}" />

                            <h3>Escola pública ou privada?</h3>
                            <input type="radio" name="escola_publica_privada" value="Publica" {{ g_old_checked($anamnese, "escola_publica_privada", "Publica") }} /><label>Publica</label><br>
                            <input type="radio" name="escola_publica_privada" value="Privada" {{ g_old_checked($anamnese, "escola_publica_privada", "Privada") }} /><label>Privada</label><br>

                            <h3>Professor responsável</h3>
                            <input type="text" name="professor_responsavel" value="{{ g_old($anamnese, "professor_responsavel") }}" />

                            <h3>Coordenador</h3>
                            <input type="text" name="coordenador" value="{{ g_old($anamnese, "coordenador") }}" />


                            <h3>Encaminhado pela escola</h3>
                            <input type="radio" name="encaminhado_pela_escola" value="1" {{ g_old_checked($anamnese, "encaminhado_pela_escola", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="encaminhado_pela_escola" value="0" {{ g_old_checked($anamnese, "encaminhado_pela_escola", "0") }} /><label>Não</label><br>





                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Família</h1>
                            <br>

                            <h3>Profissão do pai</h3>
                            <input type="text" name="profissao_pai" value="{{ g_old($anamnese, "profissao_pai") }}" />

                            <h3>Profissão da mãe</h3>
                            <input type="text" name="profissao_mae" value="{{ g_old($anamnese, "profissao_mae") }}" />

                            <h3>Escolaridade do pai</h3>
                            <input type="text" name="escolaridade_pai" value="{{ g_old($anamnese, "escolaridade_pai") }}" />

                            <h3>Escolaridade da mãe</h3>
                            <input type="text" name="escolaridade_mae" value="{{ g_old($anamnese, "escolaridade_mae") }}" />





                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Composição familiar</h1>
                            <br>

                            <h3>Relação com os pais hoje</h3>
                            <input type="text" name="relacao_dos_pais_hoje" value="{{ g_old($anamnese, "relacao_dos_pais_hoje") }}" />


                            <!-- TODO: tabela de quem mais mora com a criança -->
                            <!-- $table->text('outras_crianças_e_parentes_que_moram_com_a_criança')->nullable(true); -->

                            <h3>Outras crianças e parentes que moram com a criança</h3>
                            <textarea placeholder="Nome, Idade, Relação, Educação, Ocupação, Saúde, Problemas de aprendizado" class="textareas_form" name="outras_crianças_e_parentes_que_moram_com_a_criança" rows="4" cols="50" style="">{{ g_old($anamnese, "outras_crianças_e_parentes_que_moram_com_a_criança") }}</textarea>



                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Pré-concepção</h1>
                            <br>

                            <h3>Tratamento para infertilidade</h3>
                            <input type="text" name="tratamento_para_infertilidade" value="{{ g_old($anamnese, "tratamento_para_infertilidade") }}" />

                            <h3>História familiar de doença neurológica</h3>
                            <input type="text" name="historia_familiar_de_doenca_neurologica" value="{{ g_old($anamnese, "historia_familiar_de_doenca_neurologica") }}" />

                            <h3>Convulsões</h3>
                            <input type="text" name="convulcoes" value="{{ g_old($anamnese, "convulcoes") }}" />





                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Concepção</h1>
                            <br>

                            <h3>Composição familiar na época de concepção</h3>
                            <input type="text" name="como_era_composta_a_familia_na_epoca_da_concepcao" value="{{ g_old($anamnese, "como_era_composta_a_familia_na_epoca_da_concepcao") }}" />

                            <h3>Idade da mãe na concepção</h3>
                            <input type="number" name="idade_dos_pais_na_epoca_mãe" value="{{ g_old($anamnese, "idade_dos_pais_na_epoca_mãe") }}" />

                            <h3>Idade do pai na concepção</h3>
                            <input type="number" name="idade_dos_pais_na_epoca_pai" value="{{ g_old($anamnese, "idade_dos_pais_na_epoca_pai") }}" />

                            <h3>Número de gestações anteriores</h3>
                            <input type="number" name="gestacoes_anteriores" value="{{ g_old($anamnese, "gestacoes_anteriores") }}" />

                            <h3>Abortos?</h3>
                            <input onclick="document.getElementById('div_numeros_abortos').style.display = 'block'" type="radio" name="abortos" value="1" {{ g_old_checked($anamnese, "abortos", "1") }} /><label>Sim</label><br>
                            <input onclick="document.getElementById('div_numeros_abortos').style.display = 'none'" type="radio" name="abortos" value="0" {{ g_old_checked($anamnese, "abortos", "0") }} /><label>Não</label><br>

                            <div id="div_numeros_abortos">
                                <h3>Número de abortos naturais</h3>
                                <input type="number" name="naturais" value="{{ g_old($anamnese, "naturais") }}" />

                                <h3>Número de abortos provocados</h3>
                                <input type="number" name="provocados" value="{{ g_old($anamnese, "provocados") }}" />
                            </div>

                            <h3>Perdeu algum filho?</h3>
                            <input onclick="document.getElementById('div_perda_filhos').style.display = 'block'" type="radio" name="perdeu_algum_filho" value="1" {{ g_old_checked($anamnese, "abortos", "1") }} /><label>Sim</label><br>
                            <input onclick="document.getElementById('div_perda_filhos').style.display = 'none'" type="radio" name="perdeu_algum_filho" value="0" {{ g_old_checked($anamnese, "abortos", "0") }} /><label>Não</label><br>

                            <div id="div_perda_filhos">
                                <input type="radio" name="a_perca_foi_antes_do_paciente" value="1" {{ g_old_checked($anamnese, "a_perca_foi_antes_do_paciente", "1") }} /><label>Perdeu o filho antes do paciente</label><br>
                                <input type="radio" name="a_perca_foi_antes_do_paciente" value="0" {{ g_old_checked($anamnese, "a_perca_foi_antes_do_paciente", "0") }} /><label>Perdeu o filho depois do paciente</label><br>

                                <h3>Como perdeu o(s) filho(s)?</h3>
                                <input type="text" name="como_perdeu_o_filho" value="{{ g_old($anamnese, "como_perdeu_o_filho") }}" />
                            </div>








                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Gravidez</h1>
                            <br>

                            <h3>Aceitação das famílias</h3>
                            <input type="text" name="como_foi_a_aceitacao_das_familias" value="{{ g_old($anamnese, "como_foi_a_aceitacao_das_familias") }}" />

                            <h3>Gravidez planejada? Por ambos?</h3>
                            <input type="text" name="gravidez_planejada_por_ambos" value="{{ g_old($anamnese, "gravidez_planejada_por_ambos") }}" />

                            <h3>Fez pré-natal?</h3>
                            <input type="radio" name="fez_tratamento_pre_natal" value="1" {{ g_old_checked($anamnese, "fez_tratamento_pre_natal", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="fez_tratamento_pre_natal" value="0" {{ g_old_checked($anamnese, "fez_tratamento_pre_natal", "0") }} /><label>Não</label><br>

                            <h3>Sofreu acidentes/quedas? Como foi (foram)?</h3>
                            <input type="text" name="sofreu_acidentes_quedas_se_sim_como_foi" value="{{ g_old($anamnese, "sofreu_acidentes_quedas_se_sim_como_foi") }}" />

                            <h3>Teve alguma doença durante a gravidez? Se sim, quais?</h3>
                            <input placeholder="(Rubéola, Toxoplasmose, Sífilis, Herpes, etc)" type="text" name="teve_alguma_doenca_na_gestacao" value="{{ g_old($anamnese, "teve_alguma_doenca_na_gestacao") }}" />

                            <h3>Tomou alguma medicação durante a gravidez? Se sim, qual?</h3>
                            <input type="text" name="tomou_alguma_medicacao_se_sim_qual" value="{{ g_old($anamnese, "tomou_alguma_medicacao_se_sim_qual") }}" />

                            <h3>Teve enjoos na gravides?</h3>
                            <input type="radio" name="enjoo" value="1" {{ g_old_checked($anamnese, "enjoo", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="enjoo" value="0" {{ g_old_checked($anamnese, "enjoo", "0") }} /><label>Não</label><br>

                            <h3>Bebeu durante a gravidez?</h3>
                            <input type="radio" name="bebeu" value="1" {{ g_old_checked($anamnese, "bebeu", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="bebeu" value="0" {{ g_old_checked($anamnese, "bebeu", "0") }} /><label>Não</label><br>

                            <h3>Fumou durante a gravidez?</h3>
                            <input type="radio" name="fumou" value="1" {{ g_old_checked($anamnese, "fumou", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="fumou" value="0" {{ g_old_checked($anamnese, "fumou", "0") }} /><label>Não</label><br>


                            <h3>Entrou em contato com algum produto químico/toxico? Se sim, qual?</h3>
                            <input type="text" name="entrou_em_contato_com_algum_produto_quimicotoxico_se_sim_qual" value="{{ g_old($anamnese, "entrou_em_contato_com_algum_produto_quimicotoxico_se_sim_qual") }}" />


                            <h3>Esteve em ambientes com alto nível de poluição?</h3>
                            <input type="radio" name="esteve_em_ambientes_com_alto_nivel_de_poluicao" value="1" {{ g_old_checked($anamnese, "esteve_em_ambientes_com_alto_nivel_de_poluicao", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="esteve_em_ambientes_com_alto_nivel_de_poluicao" value="0" {{ g_old_checked($anamnese, "esteve_em_ambientes_com_alto_nivel_de_poluicao", "0") }} /><label>Não</label><br>

                            <h3>Teve exposição a raios x?</h3>
                            <input type="radio" name="exposição_a_raiox" value="1" {{ g_old_checked($anamnese, "exposição_a_raiox", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="exposição_a_raiox" value="0" {{ g_old_checked($anamnese, "exposição_a_raiox", "0") }} /><label>Não</label><br>

                            <h3>Situação econômica do casal na época</h3>
                            <input type="text" name="qual_era_a_situacao_economica_do_casal_na_epoca" value="{{ g_old($anamnese, "qual_era_a_situacao_economica_do_casal_na_epoca") }}" />

                            <h3>Já tinham outros filhos? Quantos?</h3>
                            <input type="text" name="ja_tinham_outros_filhos_se_sim_quantos" value="{{ g_old($anamnese, "ja_tinham_outros_filhos_se_sim_quantos") }}" />

                            <h3>Mãe trabalhou durante a gravidez?</h3>
                            <input type="radio" name="mae_trabalhava_fora_durante_gravidez" value="1" {{ g_old_checked($anamnese, "mae_trabalhava_fora_durante_gravidez", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="mae_trabalhava_fora_durante_gravidez" value="0" {{ g_old_checked($anamnese, "mae_trabalhava_fora_durante_gravidez", "0") }} /><label>Não</label><br>

                            <h3>O casal ou alguém na família de ambos possui alguma doença hereditária?</h3>
                            <input type="text" name="casal_ou_familia_de_ambos_possui_doenca_hereditaria_se_sim_qual" value="{{ g_old($anamnese, "casal_ou_familia_de_ambos_possui_doenca_hereditaria_se_sim_qual") }}" />









                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Parto</h1>
                            <br>

                            <h3>Local do parto</h3>
                            <input type="text" name="local_parto" value="{{ g_old($anamnese, "local_parto") }}" />

                            <h3>Tipo do parto</h3>
                            <input type="text" name="tipo_parto" value="{{ g_old($anamnese, "tipo_parto") }}" />

                            <h3>Problemas no parto</h3>
                            <input type="text" name="algum_problema_no_parto_se_sim_qual" value="{{ g_old($anamnese, "algum_problema_no_parto_se_sim_qual") }}" />

                            <h3>Peso ao nascer (kg)</h3>
                            <input type="number" step="0.001" name="peso_ao_nascer" value="{{ g_old($anamnese, "peso_ao_nascer") }}" />

                            <h3>Comprimento ao nascer (cm)</h3>
                            <input type="number" name="comprimento_ao_nascer" value="{{ g_old($anamnese, "comprimento_ao_nascer") }}" />

                            <h3>Teve icterícia?</h3>
                            <input type="radio" name="teve_ictericia" value="1" {{ g_old_checked($anamnese, "teve_ictericia", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="teve_ictericia" value="0" {{ g_old_checked($anamnese, "teve_ictericia", "0") }} /><label>Não</label><br>

                            <h3>Idade gestacional (semanas)</h3>
                            <input type="number" name="idade_gestacional_do_bebe_ao_nascer" value="{{ g_old($anamnese, "idade_gestacional_do_bebe_ao_nascer") }}" />








                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Alimentação</h1>
                            <br>

                            <h3>Como se deu a alimentação?</h3>
                            <textarea class="textareas_form" name="como_se_deu_a_alimentação" rows="4" cols="50" style="">{{ g_old($anamnese, "como_se_deu_a_alimentação") }}</textarea><br><br>

                            <h3>Mamou no seio? Se não, por quê?</h3>
                            <input type="text" name="mamou_no_seio_se_nao_qual_o_motivo" value="{{ g_old($anamnese, "mamou_no_seio_se_nao_qual_o_motivo") }}" />

                            <h3>Se mamou, até quando? E como se sentia ao amamentar?</h3>
                            <input type="text" name="se_mamou_foi_ate_quando_e_como_se_sentia_ao_amamentar" value="{{ g_old($anamnese, "se_mamou_foi_ate_quando_e_como_se_sentia_ao_amamentar") }}" />

                            <h3>Tomou mamadeira até quando?</h3>
                            <input type="text" name="tomou_mamadeira_ate_quando" value="{{ g_old($anamnese, "tomou_mamadeira_ate_quando") }}" />

                            <h3>Aceitou bem a alimentação pastosa?</h3>
                            <input type="radio" name="aceitou_bem_a_alimentação_pastosa" value="1" {{ g_old_checked($anamnese, "aceitou_bem_a_alimentação_pastosa", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="aceitou_bem_a_alimentação_pastosa" value="0" {{ g_old_checked($anamnese, "aceitou_bem_a_alimentação_pastosa", "0") }} /><label>Não</label><br>


                            <h3>Aceitou bem a alimentação sólida?</h3>
                            <input type="radio" name="aceitou_bem_a_alimentação_solida" value="1" {{ g_old_checked($anamnese, "aceitou_bem_a_alimentação_solida", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="aceitou_bem_a_alimentação_solida" value="0" {{ g_old_checked($anamnese, "aceitou_bem_a_alimentação_solida", "0") }} /><label>Não</label><br>


                            <h3>Usa copo?</h3>
                            <input type="radio" name="usa_copo" value="1" {{ g_old_checked($anamnese, "usa_copo", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="usa_copo" value="0" {{ g_old_checked($anamnese, "usa_copo", "0") }} /><label>Não</label><br>


                            <h3>Alimentação atual (tipo, preferências, apetite, posição, mastigação)</h3>
                            <input type="text" name="alimentacao_atual" value="{{ g_old($anamnese, "alimentacao_atual") }}" />











                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Doenças</h1>
                            <br>

                            <h3>História Patológica Pregressa</h3>
                            <textarea placeholder="(Retardo, diabetes, síndromes, doenças nervosas, epilepsia)"  class="textareas_form" name="retardo_diabetes_síndromes_doenças_nervosas_epilepsia" rows="4" cols="50" style="">{{ g_old($anamnese, "retardo_diabetes_síndromes_doenças_nervosas_epilepsia") }}</textarea>

                            <br>
                            <br>
                            <br>
                            <h2 style="color: #fff; margin-left: 0px; margin-top: 0px;">Doenças na infância</h2>
                            <hr class="hr_form">
                            <br>


                            <h3>Sarampo</h3>
                            <input type="text" name="teve_sarampo_infancia" value="{{ g_old($anamnese, "teve_sarampo_infancia") }}" />

                            <h3>Dores de ouvido</h3>
                            <input type="text" name="teve_dores_ouvido_infancia" value="{{ g_old($anamnese, "teve_dores_ouvido_infancia") }}" />

                            <h3>Cólicas</h3>
                            <input type="text" name="teve_colicas_infancia" value="{{ g_old($anamnese, "teve_colicas_infancia") }}" />

                            <h3>Catapora</h3>
                            <input type="text" name="teve_catapora_infancia" value="{{ g_old($anamnese, "teve_catapora_infancia") }}" />

                            <h3>Caxumba</h3>
                            <input type="text" name="teve_caxumba_infancia" value="{{ g_old($anamnese, "teve_caxumba_infancia") }}" />

                            <h3>Rubéola</h3>
                            <input type="text" name="teve_rubeola_infancia" value="{{ g_old($anamnese, "teve_rubeola_infancia") }}" />

                            <h3>Coqueluche</h3>
                            <input type="text" name="teve_coqueluche_infancia" value="{{ g_old($anamnese, "teve_coqueluche_infancia") }}" />

                            <h3>Meninginte</h3>
                            <input type="text" name="teve_meningite_infancia" value="{{ g_old($anamnese, "teve_meningite_infancia") }}" />

                            <h3>Desidratação</h3>
                            <input type="text" name="teve_desidratacao_infancia" value="{{ g_old($anamnese, "teve_desidratacao_infancia") }}" />

                            <h3>Otite</h3>
                            <input type="text" name="teve_otite_infancia" value="{{ g_old($anamnese, "teve_otite_infancia") }}" />

                            <h3>Adenoides</h3>
                            <input type="text" name="teve_adenoides_infancia" value="{{ g_old($anamnese, "teve_adenoides_infancia") }}" />

                            <h3>Amigdalites</h3>
                            <input type="text" name="teve_amigdalites_infancia" value="{{ g_old($anamnese, "teve_amigdalites_infancia") }}" />

                            <h3>Alergias</h3>
                            <input type="text" name="teve_alergias_infancia" value="{{ g_old($anamnese, "teve_alergias_infancia") }}" />

                            <h3>Acidentes</h3>
                            <input type="text" name="teve_acidentes_infancia" value="{{ g_old($anamnese, "teve_acidentes_infancia") }}" />

                            <h3>Convulsões</h3>
                            <input type="text" name="teve_convulsoes_infancia" value="{{ g_old($anamnese, "teve_convulsoes_infancia") }}" />

                            <h3>Febres</h3>
                            <input type="text" name="teve_febres_infancia" value="{{ g_old($anamnese, "teve_febres_infancia") }}" />

                            <h3>Internações (quanto tempo?)</h3>
                            <input type="text" name="foi_internado_se_sim_por_quanto_tempo" value="{{ g_old($anamnese, "foi_internado_se_sim_por_quanto_tempo") }}" />

                            <h3>Cirurgias (e idade que fez as cirurgias)</h3>
                            <input type="text" name="ja_fez_cirurgia_se_sim_com_quantos_anos_e_qual_cirugia" value="{{ g_old($anamnese, "ja_fez_cirurgia_se_sim_com_quantos_anos_e_qual_cirugia") }}" />

                            <h3>Quedas e traumatismos</h3>
                            <input type="text" name="quedas_e_traumatismos" value="{{ g_old($anamnese, "quedas_e_traumatismos") }}" />

                            <h3>Complicações com vacinas</h3>
                            <input type="text" name="teve_complicacao_com_vacina_se_sim_qual" value="{{ g_old($anamnese, "teve_complicacao_com_vacina_se_sim_qual") }}" />

                            <h3>Audição e visão. Óculos? Leva o óculos pra escola?</h3>
                            <input type="text" name="audicao_e_visao" value="{{ g_old($anamnese, "audicao_e_visao") }}" />














                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Sono</h1>
                            <br>

                            <h3>Sono tranquilo ou agitado? Se é agitado, quando acontece? Com que frequência?</h3>
                            <input type="text" name="sono_tranquilo_se_for_agitado_quando_e_qual_frequencia" value="{{ g_old($anamnese, "sono_tranquilo_se_for_agitado_quando_e_qual_frequencia") }}" />

                            <h3>Ranger de dentes</h3>
                            <input type="radio" name="range_dentes" value="1" {{ g_old_checked($anamnese, "range_dentes", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="range_dentes" value="0" {{ g_old_checked($anamnese, "range_dentes", "0") }} /><label>Não</label><br>

                            <h3>Terror noturno</h3>
                            <input type="radio" name="terror_noturno" value="1" {{ g_old_checked($anamnese, "terror_noturno", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="terror_noturno" value="0" {{ g_old_checked($anamnese, "terror_noturno", "0") }} /><label>Não</label><br>

                            <h3>Sonambulismo</h3>
                            <input type="radio" name="sonambulistmo" value="1" {{ g_old_checked($anamnese, "sonambulistmo", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="sonambulistmo" value="0" {{ g_old_checked($anamnese, "sonambulistmo", "0") }} /><label>Não</label><br>

                            <h3>Enurese</h3>
                            <input type="radio" name="enurese" value="1" {{ g_old_checked($anamnese, "enurese", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="enurese" value="0" {{ g_old_checked($anamnese, "enurese", "0") }} /><label>Não</label><br>

                            <h3>Fala dormindo</h3>
                            <input type="radio" name="fala_durante_sono" value="1" {{ g_old_checked($anamnese, "fala_durante_sono", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="fala_durante_sono" value="0" {{ g_old_checked($anamnese, "fala_durante_sono", "0") }} /><label>Não</label><br>

                            <h3>Dorme com alguém? Com quem?</h3>
                            <textarea class="textareas_form" name="dorme_so_se_nao_com_quem_dorme" rows="4" cols="50" style="">{{ g_old($anamnese, "dorme_so_se_nao_com_quem_dorme") }}</textarea><br><br>

                            <h3>Até quando dormiu com os pais?</h3>
                            <input type="text" name="ate_quando_dormiu_com_os_pais" value="{{ g_old($anamnese, "ate_quando_dormiu_com_os_pais") }}" />

                            <h3>Como foi quando parou de dormir com os pais?</h3>
                            <input type="text" name="como_foi_a_separacao_dormida_com_os_pais" value="{{ g_old($anamnese, "como_foi_a_separacao_dormida_com_os_pais") }}" />

                            <h3>Hábitos especiais</h3>
                            <textarea placeholder="presença de alguém, chupeta, brinquedos, embalo, chupa dedo, etc." class="textareas_form" name="habitos_especiais_sono" rows="4" cols="50" style="">{{ g_old($anamnese, "habitos_especiais_sono") }}</textarea>








                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Desenvolvimento psicomotor</h1>
                            <br>

                            <h3>Idade que sustentou a cabeça</h3>
                            <input type="text" name="com_que_idade_sustentou_a_cabeca" value="{{ g_old($anamnese, "com_que_idade_sustentou_a_cabeca") }}" />

                            <h3>Idade que se sentou</h3>
                            <input type="text" name="com_que_idade_sentou" value="{{ g_old($anamnese, "com_que_idade_sentou") }}" />

                            <h3>Idade que engatinhou</h3>
                            <input type="text" name="com_que_idade_engatinhou" value="{{ g_old($anamnese, "com_que_idade_engatinhou") }}" />

                            <h3>Forma de engatinhar</h3>
                            <input type="text" name="forma_de_engatinhar" value="{{ g_old($anamnese, "forma_de_engatinhar") }}" />

                            <h3>Idade que começou a andar</h3>
                            <input type="text" name="com_que_idade_comecou_a_andar" value="{{ g_old($anamnese, "com_que_idade_comecou_a_andar") }}" />

                            <h3>Caia muito enquanto aprendia a andar?</h3>
                            <input type="text" name="caia_muito" value="{{ g_old($anamnese, "caia_muito") }}" />

                            <h3>Deixa cair as coisas?</h3>
                            <input type="text" name="deixa_cair_as_coisas" value="{{ g_old($anamnese, "deixa_cair_as_coisas") }}" />

                            <h3>Esbarra muito?</h3>
                            <input type="text" name="esbarra_muito" value="{{ g_old($anamnese, "esbarra_muito") }}" />

                            <h3>Acredita que tem algum problema motor?</h3>
                            <input type="text" name="acredita_que_apresenta_alguma_dificuldade_motora" value="{{ g_old($anamnese, "acredita_que_apresenta_alguma_dificuldade_motora") }}" />














                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Controle dos esfíncteres</h1>
                            <br>

                            <h3>Controle vesical (bexiga)</h3>
                            <input type="text" name="controle_vesical_bexiga" value="{{ g_old($anamnese, "controle_vesical_bexiga") }}" />

                            <h3>Controle anal (fezes)</h3>
                            <input type="text" name="controle_anal_fezes" value="{{ g_old($anamnese, "controle_anal_fezes") }}" />

                            <h3>Foi difícil, Tranquilo, houve alguma pressão da família?</h3>
                            <textarea class="textareas_form" name="foi_difícil_tranquilo_ou_houve_algum_a_pressao_da_família" rows="4" cols="50" style="">{{ g_old($anamnese, "foi_difícil_tranquilo_ou_houve_algum_a_pressao_da_família") }}</textarea>














                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Desenvolvimento da linguagem</h1>
                            <br>

                            <h3>Época que começou a balbuciar</h3>
                            <input type="text" name="balbucios" value="{{ g_old($anamnese, "balbucios") }}" />

                            <h3>Época que começou a falar</h3>
                            <input type="text" name="quando_comecou_a_falar" value="{{ g_old($anamnese, "quando_comecou_a_falar") }}" />

                            <h3>Demorou? Como os pais reagiram a fala?</h3>
                            <input type="text" name="como_os_pais_reagiram_fala" value="{{ g_old($anamnese, "como_os_pais_reagiram_fala") }}" />

                            <h3>Problemas que apresentou na fala</h3>
                            <input type="text" name="apresentou_problema_na_fala_se_sim_quais" value="{{ g_old($anamnese, "apresentou_problema_na_fala_se_sim_quais") }}" />

                            <h3>Compreensão de ordens</h3>
                            <input type="text" name="compreende_ordens" value="{{ g_old($anamnese, "compreende_ordens") }}" />

                            <h3>Bilinguismo em casa</h3>
                            <input type="text" name="presenca_de_bilinguismo_em_casa" value="{{ g_old($anamnese, "presenca_de_bilinguismo_em_casa") }}" />

                            <h3>Como a criança se comunica?</h3>
                            <input type="text" name="como_a_crianca_se_comunica" value="{{ g_old($anamnese, "como_a_crianca_se_comunica") }}" />

                            <h3>Apresenta salivação no canto da boca?</h3>
                            <input type="text" name="apresenta_salivacao_no_canto_da_boca" value="{{ g_old($anamnese, "apresenta_salivacao_no_canto_da_boca") }}" />





                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Escolaridade</h1>
                            <br>

                            <h3>Idade que entrou na escola</h3>
                            <input type="text" name="idade_entrou_na_escola" value="{{ g_old($anamnese, "idade_entrou_na_escola") }}" />

                            <h3>Se adaptou bem na escola</h3>
                            <input type="text" name="adaptouse_bem" value="{{ g_old($anamnese, "adaptouse_bem") }}" />

                            <h3>Método de alfabetização</h3>
                            <input type="text" name="metodo_alfabetizacao" value="{{ g_old($anamnese, "metodo_alfabetizacao") }}" />

                            <h3>Mudou-se de escola, em que série e qual idade?</h3>
                            <input type="text" name="mudou_de_escola_se_sim_em_qual_serie_e_idade" value="{{ g_old($anamnese, "mudou_de_escola_se_sim_em_qual_serie_e_idade") }}" />

                            <h3>Escola atual</h3>
                            <input type="text" name="escola_atual" value="{{ g_old($anamnese, "escola_atual") }}" />

                            <h3>Método de alfabetização atual</h3>
                            <input type="text" name="metodo_alfabetizacao_atual" value="{{ g_old($anamnese, "metodo_alfabetizacao_atual") }}" />

                            <h3>Série e turno</h3>
                            <input type="text" name="serie_e_turno" value="{{ g_old($anamnese, "serie_e_turno") }}" />

                            <h3>Professor(a)</h3>
                            <input type="text" name="professor" value="{{ g_old($anamnese, "professor") }}" />

                            <h3>Com quem faz as tarefas?</h3>
                            <input type="text" name="faz_as_tarefaz_sozinho_se_nao_com_quem_faz" value="{{ g_old($anamnese, "faz_as_tarefaz_sozinho_se_nao_com_quem_faz") }}" />

                            <h3>Como é o momento das lições? Tem horário? Rotina?</h3>
                            <input type="text" name="descricao_momento_licoes" value="{{ g_old($anamnese, "descricao_momento_licoes") }}" />

                            <h3>Como é a escola na opinião dos pais?</h3>
                            <input type="text" name="opniao_dos_pais_sobre_escola" value="{{ g_old($anamnese, "opniao_dos_pais_sobre_escola") }}" />

                            <h3>Opinião sobre tarefas das escolas</h3>
                            <input type="text" name="opniao_dos_pais_sobre_tarefas" value="{{ g_old($anamnese, "opniao_dos_pais_sobre_tarefas") }}" />

                            <h3>Fatos importantes da vida escolar</h3>
                            <input type="text" name="fato_importante_vida_escolar" value="{{ g_old($anamnese, "fato_importante_vida_escolar") }}" />

                            <h3>Queixas frequentes sobre a escola</h3>
                            <input type="text" name="queixas_frequentes" value="{{ g_old($anamnese, "queixas_frequentes") }}" />

                            <h3>Dificuldades</h3>
                            <textarea placeholder="Ler, Escrever, Coordenação Motora, Contar, Calcular, Atenção, Esquece o que aprende, Troca letras na leitura ou na escrita, Letra ilegível, Concentração" class="textareas_form" name="tem_dificuldades_para" rows="4" cols="50" style="">{{ g_old($anamnese, "tem_dificuldades_para") }}</textarea>
                            <br><br><br>

                            <h3>Conhece</h3>
                            <label>Cores</label><input value="Cores" type="checkbox" name="conhece_tais_coisas[]" id="mesmo_sexo" {{ g_in_array_old($anamnese, "Cores", "conhece_tais_coisas") }}><br>
                            <label>Letras</label><input value="Letras" type="checkbox" name="conhece_tais_coisas[]" id="mesmo_sexo" {{ g_in_array_old($anamnese, "Letras", "conhece_tais_coisas") }}><br>
                            <label>Números</label><input value="Números" type="checkbox" name="conhece_tais_coisas[]" id="mesmo_sexo" {{ g_in_array_old($anamnese, "Números", "conhece_tais_coisas") }}><br>
                            <label>Dinheiro</label><input value="Dinheiro" type="checkbox" name="conhece_tais_coisas[]" id="mesmo_sexo" {{ g_in_array_old($anamnese, "Dinheiro", "conhece_tais_coisas") }}><br>
                            <label>Meses do ano</label><input value="Meses do ano" type="checkbox" name="conhece_tais_coisas[]" id="mesmo_sexo" {{ g_in_array_old($anamnese, "Meses do ano", "conhece_tais_coisas") }}><br>
                            <label>Sabe recortar</label><input value="Sabe recortar" type="checkbox" name="conhece_tais_coisas[]" id="mesmo_sexo" {{ g_in_array_old($anamnese, "Sabe recortar", "conhece_tais_coisas") }}><br>
                            <label>Sabe dias da semana</label><input value="Sabe dias da semana" type="checkbox" name="conhece_tais_coisas[]" id="mesmo_sexo" {{ g_in_array_old($anamnese, "Sabe dias da semana", "conhece_tais_coisas") }}><br>
                            <br><br><br>

                            <h3>Tem tique? Quais?</h3>
                            <input type="text" name="apresenta_tiques_se_sim_quais" value="{{ g_old($anamnese, "apresenta_tiques_se_sim_quais") }}" />

                            <h3>Como pega no lápis?</h3>
                            <input type="text" name="como_pegua_o_lapis" value="{{ g_old($anamnese, "como_pegua_o_lapis") }}" />

                            <h3>Força da escrita</h3>
                            <input type="text" name="forca_da_escrita" value="{{ g_old($anamnese, "forca_da_escrita") }}" />

                            <h3>Como vocês acham que começou o problema? A que fatores atribuem?</h3>
                            <textarea class="textareas_form" name="como_acha_que_surgiu_o_problema_a_que_fatores_atribuem" rows="4" cols="50" style="">{{ g_old($anamnese, "como_acha_que_surgiu_o_problema_a_que_fatores_atribuem") }}</textarea>
                            <br><br><br>

                            <h3>Outras questões</h3>
                            <textarea class="textareas_form" name="outras_questoes" rows="4" cols="50" style="">{{ g_old($anamnese, "outras_questoes") }}</textarea><br><br><br>

                            <h3>Quais escolas frequentou e quando as frequentou?</h3>
                            <textarea placeholder="(Escola, Série, Ano)" class="textareas_form" name="escolas_que_frequentou" rows="4" cols="50" style="">{{ g_old($anamnese, "escolas_que_frequentou") }}</textarea><br><br><br>

                            <h3>Repetiu de ano? Quando o porque?</h3>
                            <input type="text" name="repetiu_ano_se_sim_qual_e_porque" value="{{ g_old($anamnese, "repetiu_ano_se_sim_qual_e_porque") }}" />







                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Comportamento</h1>
                            <br>

                            <h3>Humor habitual</h3>
                            <input type="text" name="humor_habitual" value="{{ g_old($anamnese, "humor_habitual") }}" />

                            <h3>Prefere brincar sozinho ou em grupo?</h3>
                            <input type="text" name="prefere_brincar_sozinho_ou_em_grupos" value="{{ g_old($anamnese, "prefere_brincar_sozinho_ou_em_grupos") }}" />

                            <h3>Estranha mudanças de ambiente?</h3>
                            <input type="text" name="estranha_mudancas_de_ambiente" value="{{ g_old($anamnese, "estranha_mudancas_de_ambiente") }}" />

                            <h3>Adapta-se facilmente ao meio?</h3>
                            <input type="radio" name="adaptase_facilmente_ao_meio" value="1" {{ g_old_checked($anamnese, "adaptase_facilmente_ao_meio", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="adaptase_facilmente_ao_meio" value="0" {{ g_old_checked($anamnese, "adaptase_facilmente_ao_meio", "0") }} /><label>Não</label><br>

                            <h3>Tem horários?</h3>
                            <input type="radio" name="tem_horarios" value="1" {{ g_old_checked($anamnese, "tem_horarios", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="tem_horarios" value="0" {{ g_old_checked($anamnese, "tem_horarios", "0") }} /><label>Não</label><br>

                            <h3>É lider?</h3>
                            <input type="radio" name="e_lider" value="1" {{ g_old_checked($anamnese, "e_lider", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="e_lider" value="0" {{ g_old_checked($anamnese, "e_lider", "0") }} /><label>Não</label><br>

                            <h3>Aceita bem ordens?</h3>
                            <input type="radio" name="aceita_bem_ordens" value="1" {{ g_old_checked($anamnese, "aceita_bem_ordens", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="aceita_bem_ordens" value="0" {{ g_old_checked($anamnese, "aceita_bem_ordens", "0") }} /><label>Não</label><br>

                            <h3>Faz birras?</h3>
                            <input type="radio" name="faz_birras" value="1" {{ g_old_checked($anamnese, "faz_birras", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="faz_birras" value="0" {{ g_old_checked($anamnese, "faz_birras", "0") }} /><label>Não</label><br>

                            <h3>Chora com frequência?</h3>
                            <input type="radio" name="chora_com_frequencia" value="1" {{ g_old_checked($anamnese, "chora_com_frequencia", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="chora_com_frequencia" value="0" {{ g_old_checked($anamnese, "chora_com_frequencia", "0") }} /><label>Não</label><br>

                            <h3>De que forma é punida?</h3>
                            <textarea class="textareas_form" name="de_que_forma_e_punido" rows="4" cols="50" style="">{{ g_old($anamnese, "de_que_forma_e_punido") }}</textarea><br><br><br>

                            <h3>Esportes que pratica</h3>
                            <input type="text" name="pratica_esportes_se_sim_quais" value="{{ g_old($anamnese, "pratica_esportes_se_sim_quais") }}" />

                            <h3>Agressivo, apático ou teimoso?</h3>
                            <input type="radio" name="apresenta_agressividade_apatia_ou_teimosia" value="1" {{ g_old_checked($anamnese, "apresenta_agressividade_apatia_ou_teimosia", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="apresenta_agressividade_apatia_ou_teimosia" value="0" {{ g_old_checked($anamnese, "apresenta_agressividade_apatia_ou_teimosia", "0") }} /><label>Não</label><br>

                            <h3>Medos que apresenta</h3>
                            <input type="text" name="tem_algum_medo_se_sim_quais" value="{{ g_old($anamnese, "tem_algum_medo_se_sim_quais") }}" />

                            <h3>Brincadeiras de brinquedos favoritos</h3>
                            <input type="text" name="quais_as_brincadeiras_e_brinquedos_favoritos" value="{{ g_old($anamnese, "quais_as_brincadeiras_e_brinquedos_favoritos") }}" />

                            <h3>Quem cuidava da criança até os três anos?</h3>
                            <input type="text" name="quem_cuidava_da_criança_ate_os_tres_anos" value="{{ g_old($anamnese, "quem_cuidava_da_criança_ate_os_tres_anos") }}" />

                            <h3>Quem cuidou da criança depois dos três anos?</h3>
                            <input type="text" name="quem_cuida_posteriormente" value="{{ g_old($anamnese, "quem_cuida_posteriormente") }}" />

                            <h3>Como a criança se comporta sozinha?</h3>
                            <input type="text" name="como_a_crianca_se_comporta_sozinha" value="{{ g_old($anamnese, "como_a_crianca_se_comporta_sozinha") }}" />

                            <h3>Como a criança se comporta em família?</h3>
                            <input type="text" name="como_a_crianca_se_comporta_em_familia" value="{{ g_old($anamnese, "como_a_crianca_se_comporta_em_familia") }}" />

                            <h3>Como a criança se comporta com outras pessoas?</h3>
                            <input type="text" name="como_a_crianca_se_comporta_com_outras_pessoas" value="{{ g_old($anamnese, "como_a_crianca_se_comporta_com_outras_pessoas") }}" />

                            <h3>Com quem a criança gosta de ficar? Por quê?</h3>
                            <input type="text" name="com_quem_ele_mais_gosta_de_ficar_e_por_que" value="{{ g_old($anamnese, "com_quem_ele_mais_gosta_de_ficar_e_por_que") }}" />

                            <h3>Em que momento a criança se encontra com a família?</h3>
                            <input type="text" name="em_que_momento_a_crianca_encontra_a_familia" value="{{ g_old($anamnese, "em_que_momento_a_crianca_encontra_a_familia") }}" />

                            <h3>Que tipos de perdas já enfrentou? Com que idade?</h3>
                            <textarea placeholder="separação, falecimento, outros" class="textareas_form" name="que_tipos_de_perdas_ja_enfrentou_e_em_que_idade" rows="4" cols="50" style="">{{ g_old($anamnese, "que_tipos_de_perdas_ja_enfrentou_e_em_que_idade") }}</textarea><br><br><br>

                            <h3>Já houve conflitos familiares? A criança presenciou ou presencia?</h3>
                            <input type="text" name="ja_houve_conflitos_familiares_e_a_crianca_presencia" value="{{ g_old($anamnese, "ja_houve_conflitos_familiares_e_a_crianca_presencia") }}" />

                            <h3>Assiste TV em demasia? Quais programas favoritos?</h3>
                            <input type="text" name="assiste_tv_em_demasia" value="{{ g_old($anamnese, "assiste_tv_em_demasia") }}" />

                            <h3>Quais programas de tv favoritos?</h3>
                            <input type="text" name="quais_programas_favoritos" value="{{ g_old($anamnese, "quais_programas_favoritos") }}" />

                            <h3>De que forma o pai e a mãe se relacionam com a criança?</h3>
                            <textarea class="textareas_form" name="de_que_forma_o_pai_e_a_mae_se_relacionam_com_a_crianca" rows="4" cols="50" style="">{{ g_old($anamnese, "de_que_forma_o_pai_e_a_mae_se_relacionam_com_a_crianca") }}</textarea><br><br><br>

                            <h3>Em que horário brincam ou fazem alguma atividade de lazer?</h3>
                            <textarea class="textareas_form" name="em_que_horario_brincam_ou_fazem_alguma_atividade_de_lazer" rows="4" cols="50" style="">{{ g_old($anamnese, "em_que_horario_brincam_ou_fazem_alguma_atividade_de_lazer") }}</textarea><br><br><br>

                            <h3>Como se relaciona com irmãos?</h3>
                            <input type="text" name="como_se_relaciona_com_irmaos" value="{{ g_old($anamnese, "como_se_relaciona_com_irmaos") }}" />

                            <h3>Como se relaciona com colegas e professores?</h3>
                            <input type="text" name="como_se_relaciona_com_colegas_e_professores" value="{{ g_old($anamnese, "como_se_relaciona_com_colegas_e_professores") }}" />











                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Sexualidade</h1>
                            <br>

                            <h3>Apresenta curiosidade sexual? Quando começou?</h3>
                            <input type="text" name="apresenta_curiosidade_sexual_se_sim_quando_comecou" value="{{ g_old($anamnese, "apresenta_curiosidade_sexual_se_sim_quando_comecou") }}" />

                            <h3>Tipos de perguntas</h3>
                            <input type="text" name="tipos_de_perguntas_fase_sexual" value="{{ g_old($anamnese, "tipos_de_perguntas_fase_sexual") }}" />

                            <h3>Fase de masturbação</h3>
                            <input type="text" name="fase_de_masturbacao" value="{{ g_old($anamnese, "fase_de_masturbacao") }}" />

                            <h3>Atitude da família</h3>
                            <input type="text" name="atitude_da_família" value="{{ g_old($anamnese, "atitude_da_família") }}" />












                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Independência</h1>
                            <br>

                            <h3>Se veste só a partir de qual idade?</h3>
                            <input type="text" name="se_veste_so_a_partir_de_qual_idade" value="{{ g_old($anamnese, "se_veste_so_a_partir_de_qual_idade") }}" />

                            <h3>Começou a abotoar só a partir de qual idade?</h3>
                            <input type="text" name="se_abotoa_so_a_partir_de_qual_idade" value="{{ g_old($anamnese, "se_abotoa_so_a_partir_de_qual_idade") }}" />

                            <h3>Começou a fechar roupa só a partir de qual idade?</h3>
                            <input type="text" name="fecha_roupa_so_a_partir_de_qual_idade" value="{{ g_old($anamnese, "fecha_roupa_so_a_partir_de_qual_idade") }}" />

                            <h3>Começou a tomar banho só a partir de qual idade?</h3>
                            <input type="text" name="toma_banho_so_a_partir_de_qual_idade" value="{{ g_old($anamnese, "toma_banho_so_a_partir_de_qual_idade") }}" />

                            <h3>Começou a se pentear só a partir de qual idade?</h3>
                            <input type="text" name="se_penteia_so_a_partir_de_qual_idade" value="{{ g_old($anamnese, "se_penteia_so_a_partir_de_qual_idade") }}" />

                            <h3>Começou a amarrar cadarços só a partir de qual idade?</h3>
                            <input type="text" name="se_amarra_so_a_partir_de_qual_idade" value="{{ g_old($anamnese, "se_amarra_so_a_partir_de_qual_idade") }}" />

                            <h3>Começou a escovar os dentes só a partir de qual idade?</h3>
                            <input type="text" name="escova_os_dentes_so_a_partir_de_qual_idade" value="{{ g_old($anamnese, "escova_os_dentes_so_a_partir_de_qual_idade") }}" />

                            <h3>Começou a comer só a partir de qual idade?</h3>
                            <input type="text" name="come_so_a_partir_de_qual_idade" value="{{ g_old($anamnese, "come_so_a_partir_de_qual_idade") }}" />

                            <h3>Começou a se calçar só a partir de qual idade?</h3>
                            <input type="text" name="se_calca_so_a_partir_de_qual_idade" value="{{ g_old($anamnese, "se_calca_so_a_partir_de_qual_idade") }}" />












                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Hábitos</h1>
                            <br>


                            <h3>Rói unhas?</h3>
                            <input type="radio" name="roi_unhas" value="1" {{ g_old_checked($anamnese, "roi_unhas", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="roi_unhas" value="0" {{ g_old_checked($anamnese, "roi_unhas", "0") }} /><label>Não</label><br>

                            <h3>Tiques nervosos</h3>
                            <input type="text" name="tem_tiques_nervosos_se_sim_quais" value="{{ g_old($anamnese, "tem_tiques_nervosos_se_sim_quais") }}" />

                            <h3>Mania repetitiva (TOC)</h3>
                            <input type="text" name="alguma_mania_repetitiva_se_sim_qual" value="{{ g_old($anamnese, "alguma_mania_repetitiva_se_sim_qual") }}" />

                            <h3>Tem movimentos rítmicos?</h3>
                            <input type="radio" name="tem_movimentos_ritmicos" value="1" {{ g_old_checked($anamnese, "tem_movimentos_ritmicos", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="tem_movimentos_ritmicos" value="0" {{ g_old_checked($anamnese, "tem_movimentos_ritmicos", "0") }} /><label>Não</label><br>

                            <h3>Chupa dedo ou bico?</h3>
                            <input type="radio" name="chupa_dedo_ou_bico" value="1" {{ g_old_checked($anamnese, "chupa_dedo_ou_bico", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="chupa_dedo_ou_bico" value="0" {{ g_old_checked($anamnese, "chupa_dedo_ou_bico", "0") }} /><label>Não</label><br>

                            <h3>Tem ou tinha algum objeto como cheirinho ou outro para dormir, levar para escola?</h3>
                            <input type="text" name="temObjetoComoCheirinhoOuOutroParaDormirLevarParaEscolaSeSimQual" value="{{ g_old($anamnese, "temObjetoComoCheirinhoOuOutroParaDormirLevarParaEscolaSeSimQual") }}" />

                            <h3>Outros?</h3>
                            <input type="text" name="outros_habitos" value="{{ g_old($anamnese, "outros_habitos") }}" />















                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Outros</h1>
                            <br>

                            <h3>Como a família vê o problema?</h3>
                            <input type="text" name="como_a_familia_ve_o_problema" value="{{ g_old($anamnese, "como_a_familia_ve_o_problema") }}" />

                            <h3>Como o casal age em função da criança?</h3>
                            <input type="text" name="como_o_casal_age_em_funcao_da_crianca" value="{{ g_old($anamnese, "como_o_casal_age_em_funcao_da_crianca") }}" />

                            <h3>Como os pais se veem: permissivos, autoritários, equilibrados?</h3>
                            <input type="text" name="comoOsPaisSeVeemPermissivosAutoritariosEquilibradosEPorque" value="{{ g_old($anamnese, "comoOsPaisSeVeemPermissivosAutoritariosEquilibradosEPorque") }}" />

                            <h3>Como são colocados os limites para a criança no seu cotidiano?</h3>
                            <textarea class="textareas_form" name="como_sao_colocados_os_limites_para_a_crianca_no_seu_cotidiano" rows="4" cols="50" style="">{{ g_old($anamnese, "como_sao_colocados_os_limites_para_a_crianca_no_seu_cotidiano") }}</textarea><br><br><br>

















                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Informações gerais familiares</h1>
                            <br>


                            <h3>Situação econômica?</h3>
                            <input type="text" name="situacao_economica" value="{{ g_old($anamnese, "situacao_economica") }}" />

                            <h3>Situação cultural?</h3>
                            <input type="text" name="situacao_cultural" value="{{ g_old($anamnese, "situacao_cultural") }}" />

                            <h3>Lê quais livros e com que frequência?</h3>
                            <input type="text" name="le_quais_livros_com_que_frequência" value="{{ g_old($anamnese, "le_quais_livros_com_que_frequência") }}" />

                            <h3>Vai ao cinema ver o que e com que frequência?</h3>
                            <input type="text" name="vai_ao_cinema_e_com_que_frequencia" value="{{ g_old($anamnese, "vai_ao_cinema_e_com_que_frequencia") }}" />

                            <h3>Estímulos culturais</h3>
                            <input type="text" name="estimulo_cultural_se_sim_quais" value="{{ g_old($anamnese, "estimulo_cultural_se_sim_quais") }}" />

                            <h3>Hábitos de lazer</h3>
                            <input type="text" name="habitos_de_lazer" value="{{ g_old($anamnese, "habitos_de_lazer") }}" />

                            <h3>Constância de diálogos</h3>
                            <input type="text" name="constancia_de_dialogos" value="{{ g_old($anamnese, "constancia_de_dialogos") }}" />

                            <h3>Quais refeições fazem juntos?</h3>
                            <input type="text" name="fazem_refeicoes_juntos_se_sim_quais" value="{{ g_old($anamnese, "fazem_refeicoes_juntos_se_sim_quais") }}" />

                            <h3>Algum vício na família? (drogas, alcoolismo)</h3>
                            <input type="text" name="algum_vício_na_família_se_sim_quais" value="{{ g_old($anamnese, "algum_vício_na_família_se_sim_quais") }}" />

























                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Cognições</h1>
                            <br>

                            <h3>Como é o contato visual?</h3>
                            <input type="text" name="estabelece_contato_visual_se_sim_em_quais_situacoes" value="{{ g_old($anamnese, "estabelece_contato_visual_se_sim_em_quais_situacoes") }}" />

                            <h3>Imita algum gesto e/ou expressão facial de emoção de familiares e pessoas próximas?</h3>
                            <input type="text" name="imitaAlgumGestoDeEmocaoFamiliaresPessoasProximasSeSimQuais" value="{{ g_old($anamnese, "imitaAlgumGestoDeEmocaoFamiliaresPessoasProximasSeSimQuais") }}" />

                            <h3>Imita algum som específico?</h3>
                            <input type="text" name="imita_algum_som_especifico_se_sim_quais" value="{{ g_old($anamnese, "imita_algum_som_especifico_se_sim_quais") }}" />

                            <h3>Mostra-se sonolento? Com qual frequência?</h3>
                            <input type="text" name="mostrase_sonolento_se_sim_com_qual_frequencia" value="{{ g_old($anamnese, "mostrase_sonolento_se_sim_com_qual_frequencia") }}" />

                            <h3>Quando estimulado, consegue relembrar de situações vivenciadas?</h3>
                            <input type="radio" name="quando_estimulado_consegue_relembrar_de_situacoes_vivenciadas" value="1" {{ g_old_checked($anamnese, "quando_estimulado_consegue_relembrar_de_situacoes_vivenciadas", "1") }} /><label>Sim</label><br>
                            <input type="radio" name="quando_estimulado_consegue_relembrar_de_situacoes_vivenciadas" value="0" {{ g_old_checked($anamnese, "quando_estimulado_consegue_relembrar_de_situacoes_vivenciadas", "0") }} /><label>Não</label><br>

                            <h3>Com que frequência ignora estímulos?</h3>
                            <input type="text" name="com_que_frequencia_ignora_estimulos" value="{{ g_old($anamnese, "com_que_frequencia_ignora_estimulos") }}" />

                            <h3>Com que frequência manipula brinquedos e objetos?</h3>
                            <input type="text" name="com_que_frequencia_manipula_brinquedos_e_objetos" value="{{ g_old($anamnese, "com_que_frequencia_manipula_brinquedos_e_objetos") }}" />

                            <h3>Ansiedade em processos de mudança de rotina? Algum exemplo?</h3>
                            <input type="text" name="ansioso_no_processo_de_mudanca_de_rotina_se_sim_voce_lembra" value="{{ g_old($anamnese, "ansioso_no_processo_de_mudanca_de_rotina_se_sim_voce_lembra") }}" />






                        </div>
                        <div class="pag_form">
                            <br>
                            <br>
                            <hr class="hr_form">
                            <h1>Finalização</h1>
                            <br>

                            <h3>Análise da entrevista</h3>
                            <textarea class="textareas_form" name="analise_da_entrevista" rows="4" cols="50" style="">{{ g_old($anamnese, "analise_da_entrevista") }}</textarea><br><br><br>

                            <h3>Encaminhamentos</h3>
                            <textarea class="textareas_form" name="encaminhamentos" rows="4" cols="50" style="">{{ g_old($anamnese, "encaminhamentos") }}</textarea><br><br><br>



                        </div>

                        <input type="submit" value="Salvar">
                        <br>
                        <div id="container_btn_pags">
                            <a onclick="form_ante_pag(this)" class="btn_pags redondo">&#8249;</a>
                            <a onclick="form_prox_pag(this)" class="btn_pags redondo">&#8250;</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

<script src="{{ asset('js/form_pag.js') }}" defer></script>
<link href="{{ asset('css/form_pag.css') }}" rel="stylesheet">

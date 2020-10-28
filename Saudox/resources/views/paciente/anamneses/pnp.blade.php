
@extends('layouts.mainlayout')
@section('content')


    <div class="container">
        <div class="row bordas_amarelas bg-padrao">
            <div class="col-md">


                <h1 class="pessoal"> Anamnese Psicopedagogica </h1>

                <!--
                BOTÃOD E EDITAR PACIENTE!!!!
                -->
                <br>
                <br>
                <div class="info-gestacao">
                    <h3 class="marker-label">Entrevista</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Compareceram a entrevista:<br><label class="lbinfo-ntstatic">{{$anamnese->compareceram_entrevista}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Queixa (motivo):<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->queixa}}</label></label>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="info-atual">
                    <h3 class="marker-label">Escola</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Escolaridade:<br><label class="lbinfo-ntstatic">{{$anamnese->escolaridade}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Escola:<br><label class="lbinfo-ntstatic">{{$anamnese->escola}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Coordenador:<br><label class="lbinfo-ntstatic">{{$anamnese->coordenador}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Turno das aulas:<br><label class="lbinfo-ntstatic">{{$anamnese->turno_das_aulas}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Pública ou Privada?<br><label class="lbinfo-ntstatic">{{$anamnese->escola_publica_privada}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Encaminhado pela escola?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->encaminhado_pela_escola == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Horário das aulas:<br><label class="lbinfo-ntstatic">{{$anamnese->horario_das_aulas}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Professor responsável:<br><label class="lbinfo-ntstatic">{{$anamnese->professor_responsavel}}</label></label>
                        </div>

                </div>

                <div class="info-avd">
                    <h3 class="marker-label">Família</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Profissão do pai:<br><label class="lbinfo-ntstatic">{{$anamnese->profissao_pai}}</label></label>
                            <br>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Escolaridade do pai:<br><label class="lbinfo-ntstatic">{{$anamnese->escolaridade_pai}}</label></label>
                            <br>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Profissão da mãe:<br><label class="lbinfo-ntstatic">{{$anamnese->profissao_mae}}</label></label>
                            <br>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Escolaridade da mãe:<br><label class="lbinfo-ntstatic">{{$anamnese->escolaridade_mae}}</label></label>
                            <br>
                        </div>
                    </div>
                </div>

                <div class="info-tendencias">
                    <h3 class="marker-label">Composição Familiar</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Relação atual com os pais:<br><label class="lbinfo-ntstatic">{{$anamnese->relacao_dos_pais_hoje}}</label></label>
                            <br>
                        </div>

                        <div class="col-md-12">
                            <h6 class="lbinfo-perfis">Outras crianças e parentes que moram com a criança:</h6>
                            <label class="lbinfo-perfis-sub">(Nome, Idade, Relação, Educação, Ocupação, Saúde, Prob. aprendiz)
                            <br>
                            <div class="c-wrapper">
                                <label class="lbinfo-ntstatic">{{$anamnese->outras_crianças_e_parentes_que_moram_com_a_criança}}</label></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Pré-concepção</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Tratamento para infertilidade:<br><label class="lbinfo-ntstatic">{{$anamnese->tratamento_para_infertilidade}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Histórico familiar de doença neurológica:<br><label class="lbinfo-ntstatic">{{$anamnese->historia_familiar_de_doenca_neurologica}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Convulsões:<br><label class="lbinfo-ntstatic">{{$anamnese->convulcoes}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Concepção</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Composição familiar na época de concepção:<br>
                            <div class="c-wrapper">
                                <label class="lbinfo-ntstatic">{{$anamnese->como_era_composta_a_familia_na_epoca_da_concepcao}}</label></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Número de gestações anteriores:<br><label class="lbinfo-ntstatic">{{$anamnese->gestacoes_anteriores}}</label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Idade da mãe na concepção:<br><label class="lbinfo-ntstatic">{{$anamnese->idade_dos_pais_na_epoca_mãe}}</label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Idade do pai na concepção:<br><label class="lbinfo-ntstatic">{{$anamnese->idade_dos_pais_na_epoca_pai}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Abortos?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->abortos == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                        <div class="col-md-4">
                            @if($anamnese->abortos == 1)
                                <label class="lbinfo-perfis">Número de abortos naturais:<br><label class="lbinfo-ntstatic">{{$anamnese->naturais}}</label></label>
                            @endif
                        </div>
                        <div class="col-md-4">
                            @if($anamnese->abortos == 1)
                                <label class="lbinfo-perfis">Número de abortos Provocados:<br><label class="lbinfo-ntstatic">{{$anamnese->provocados}}</label></label>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Perdeu algum filho?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->perdeu_algum_filho == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                        <div class="col-md-4">
                            @if($anamnese->perdeu_algum_filho == 1)
                                <label class="lbinfo-perfis">A perda ocorreu antes do nascimento do paciente?<br><label class="lbinfo-ntstatic"><label class="lbinfo-ntstatic">
                                    @if($anamnese->a_perca_foi_antes_do_paciente == 1)
                                    Sim
                                    @else
                                    Não
                                    @endif
                                </label></label>
                            @endif
                        </div>
                        <div class="col-md-4">
                            @if($anamnese->perdeu_algum_filho == 1)
                                <label class="lbinfo-perfis">Como perdeu o filho?<br><label class="lbinfo-ntstatic">{{$anamnese->como_perdeu_o_filho}}</label></label>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Gravidez</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Aceitação das famílias:<br><label class="lbinfo-ntstatic">{{$anamnese->como_foi_a_aceitacao_das_familias}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Gravidez planejada por ambos?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->gravidez_planejada_por_ambos == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Fez pré-natal?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->fez_tratamento_pre_natal == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Teve alguma doença durante a gravidez?<br><label class="lbinfo-ntstatic">{{$anamnese->teve_alguma_doenca_na_gestacao}}</label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Tomou alguma medicação durante a gravidez?<br><label class="lbinfo-ntstatic">{{$anamnese->tomou_alguma_medicacao_se_sim_qual}}</label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Sofreu acidentes/quedas?<br><label class="lbinfo-ntstatic">{{$anamnese->sofreu_acidentes_quedas_se_sim_como_foi}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Teve enjoos na gravidez?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->enjoo == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Bebeu durante a gravidez?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->bebeu == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Fumou durante a gravidez?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->fumou == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Entrou em contato com algum produto químico/toxico?<br><label class="lbinfo-ntstatic">{{$anamnese->entrou_em_contato_com_algum_produto_quimicotoxico_se_sim_qual}}</label></label>
                        </div>
                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Esteve em ambientes com alto nível de poluição?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->esteve_em_ambientes_com_alto_nivel_de_poluicao == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Teve exposição a raios x?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->exposição_a_raiox == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Situação econômica do casal na época<br><label class="lbinfo-ntstatic">{{$anamnese->qual_era_a_situacao_economica_do_casal_na_epoca}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Já tinham outros filhos?<br><label class="lbinfo-ntstatic">{{$anamnese->ja_tinham_outros_filhos_se_sim_quantos}}</label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Mãe trabalhou durante a gravidez?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->mae_trabalhava_fora_durante_gravidez == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">O casal ou alguém na família de ambos possui alguma doença hereditária?<br><label class="lbinfo-ntstatic">{{$anamnese->casal_ou_familia_de_ambos_possui_doenca_hereditaria_se_sim_qual}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Parto</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Local do parto:<br><label class="lbinfo-ntstatic">{{$anamnese->local_parto}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Tipo do parto:<br><label class="lbinfo-ntstatic">{{$anamnese->tipo_parto}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Problemas no parto:<br><label class="lbinfo-ntstatic">{{$anamnese->algum_problema_no_parto_se_sim_qual}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Peso ao nascer (kg):<br><label class="lbinfo-ntstatic">{{$anamnese->peso_ao_nascer}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Comprimento ao nascer (cm):<br><label class="lbinfo-ntstatic">{{$anamnese->comprimento_ao_nascer}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Teve icterícia?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->teve_ictericia == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Idade gestacional (semanas):<br><label class="lbinfo-ntstatic">{{$anamnese->idade_gestacional_do_bebe_ao_nascer}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Alimentação</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Como se deu a alimentação?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->como_se_deu_a_alimentação}}</label></label>
                                </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Mamou no seio? Se não, por quê?<br><label class="lbinfo-ntstatic">{{$anamnese->mamou_no_seio_se_nao_qual_o_motivo}}</label></label>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Tomou mamadeira até quando?<br><label class="lbinfo-ntstatic">{{$anamnese->tomou_mamadeira_ate_quando}}</label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Se mamou, até quando? E como se sentia ao amamentar?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->se_mamou_foi_ate_quando_e_como_se_sentia_ao_amamentar}}</label></label>
                                </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Aceitou bem a alimentação pastosa?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->aceitou_bem_a_alimentação_pastosa == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Aceitou bem a alimentação sólida?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->aceitou_bem_a_alimentação_solida == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Usa copo?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->usa_copo == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Alimentação atual (tipo, preferências, apetite, posição, mastigação):<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->alimentacao_atual}}</label></label>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Doenças</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="lbinfo-perfis">História Patológica Pregressa:</h6>
                            <label class="lbinfo-perfis-sub">(Retardo, diabetes, síndromes, doenças nervosas, epilepsia)
                            <br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->retardo_diabetes_síndromes_doenças_nervosas_epilepsia}}</label></label>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Sarampo:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_sarampo_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Dores de ouvido:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_dores_ouvido_infancia}}</label></label>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Cólicas:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_colicas_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Catapora:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_catapora_infancia}}</label></label>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Caxumba:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_caxumba_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Rubéola:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_rubeola_infancia}}</label></label>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Coqueluche:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_coqueluche_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Meninginte:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_meningite_infancia}}</label></label>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Desidratação:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_desidratacao_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Otite:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_otite_infancia}}</label></label>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Adenoides:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_adenoides_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Amigdalites:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_amigdalites_infancia}}</label></label>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Alergias:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_alergias_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Acidentes:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_acidentes_infancia}}</label></label>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Convulsões:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_convulsoes_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Febres:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_febres_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Internações:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->foi_internado_se_sim_por_quanto_tempo}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Cirurgias:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->ja_fez_cirurgia_se_sim_com_quantos_anos_e_qual_cirugia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Quedas e traumatismos:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->quedas_e_traumatismos}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Complicações com vacinas:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_complicacao_com_vacina_se_sim_qual}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Audição e visão. Óculos? Leva o óculos pra escola?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->audicao_e_visao}}</label></label>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Sono</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Sono tranquilo ou agitado? Se é agitado, quando acontece? Com que frequência?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->sono_tranquilo_se_for_agitado_quando_e_qual_frequencia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Range dentes:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">
                                    @if($anamnese->range_dentes == 1)
                                    Sim
                                    @else
                                    Não
                                    @endif
                                </label></label>
                                </div>
                        </div>
                        <div class="col-md-2">
                            <label class="lbinfo-perfis">Terror noturno:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">
                                    @if($anamnese->terror_noturno == 1)
                                    Sim
                                    @else
                                    Não
                                    @endif
                                    </label></label>
                                </div>
                        </div>
                        <div class="col-md-2">
                            <label class="lbinfo-perfis">Sonambulismo:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">
                                    @if($anamnese->sonambulistmo == 1)
                                    Sim
                                    @else
                                    Não
                                    @endif
                                    </label></label>
                                </div>
                        </div>
                        <div class="col-md-2">
                            <label class="lbinfo-perfis">Enurese:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">
                                    @if($anamnese->enurese == 1)
                                    Sim
                                    @else
                                    Não
                                    @endif
                                    </label></label>
                                </div>
                        </div>
                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Fala dormindo:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">
                                    @if($anamnese->fala_durante_sono == 1)
                                    Sim
                                    @else
                                    Não
                                    @endif
                                    </label></label>
                                </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Dorme com alguém? Com quem?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->dorme_so_se_nao_com_quem_dorme}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Até quando dormiu com os pais?<br>
                                <div class="b-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->ate_quando_dormiu_com_os_pais}}</label></label>
                                </div>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Como foi quando parou de dormir com os pais?<br>
                                <div class="b-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->como_foi_a_separacao_dormida_com_os_pais}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Hábitos especiais:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->habitos_especiais_sono}}</label></label>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Desenvolvimento psicomotor</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Idade que sustentou a cabeça:<br><label class="lbinfo-ntstatic">{{$anamnese->com_que_idade_sustentou_a_cabeca}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Idade que se sentou:<br><label class="lbinfo-ntstatic">{{$anamnese->com_que_idade_sentou}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Idade que engatinhou:<br><label class="lbinfo-ntstatic">{{$anamnese->com_que_idade_engatinhou}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Forma de engatinhar:<br><label class="lbinfo-ntstatic">{{$anamnese->forma_de_engatinhar}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Idade que começou a andar:<br><label class="lbinfo-ntstatic">{{$anamnese->com_que_idade_comecou_a_andar}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Caía muito enquanto aprendia a andar?<br><label class="lbinfo-ntstatic">{{$anamnese->caia_muito}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Deixa cair as coisas?<br><label class="lbinfo-ntstatic">{{$anamnese->deixa_cair_as_coisas}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Esbarra muito?<br><label class="lbinfo-ntstatic">{{$anamnese->esbarra_muito}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Acredita que tem algum problema motor?<br><label class="lbinfo-ntstatic">{{$anamnese->acredita_que_apresenta_alguma_dificuldade_motora}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Controle de esfíncteres</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Controle vesical (bexiga):<br><label class="lbinfo-ntstatic">{{$anamnese->controle_vesical_bexiga}}</label></label>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Controle anal (fezes):<br><label class="lbinfo-ntstatic">{{$anamnese->controle_anal_fezes}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Foi difícil, tranquilo, houve alguma pressão da família?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->foi_difícil_tranquilo_ou_houve_algum_a_pressao_da_família}}</label></label>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Desenvolvimento da linguagem</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Época que começou a balbuciar:<br><label class="lbinfo-ntstatic">{{$anamnese->balbucios}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Época que começou a falar:<br><label class="lbinfo-ntstatic">{{$anamnese->quando_comecou_a_falar}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Demorou? Como os pais reagiram a fala?<br><label class="lbinfo-ntstatic">{{$anamnese->como_os_pais_reagiram_fala}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Problemas que apresentou na fala:<br><label class="lbinfo-ntstatic">{{$anamnese->apresentou_problema_na_fala_se_sim_quais}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Compreensão de ordens:<br><label class="lbinfo-ntstatic">{{$anamnese->compreende_ordens}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Bilinguismo em casa:<br><label class="lbinfo-ntstatic">{{$anamnese->presenca_de_bilinguismo_em_casa}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Como a criança se comunica?<br><label class="lbinfo-ntstatic">{{$anamnese->como_a_crianca_se_comunica}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-perfis">Apresenta salivação no canto da boca?<br><label class="lbinfo-ntstatic">{{$anamnese->apresenta_salivacao_no_canto_da_boca}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Escolaridade</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Idade que entrou na escola:<br><label class="lbinfo-ntstatic">{{$anamnese->idade_entrou_na_escola}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Se adaptou bem na escola:<br><label class="lbinfo-ntstatic">{{$anamnese->adaptouse_bem}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Método de alfabetização:<br><label class="lbinfo-ntstatic">{{$anamnese->metodo_alfabetizacao}}</label></label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Mudou-se de escola, em que série e qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->mudou_de_escola_se_sim_em_qual_serie_e_idade}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Escola atual:<br><label class="lbinfo-ntstatic">{{$anamnese->escola_atual}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Método de alfabetização atual:<br><label class="lbinfo-ntstatic">{{$anamnese->metodo_alfabetizacao_atual}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Série e turno:<br><label class="lbinfo-ntstatic">{{$anamnese->serie_e_turno}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Professor(a):<br><label class="lbinfo-ntstatic">{{$anamnese->professor}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Com quem faz as tarefas?<br><label class="lbinfo-ntstatic">{{$anamnese->faz_as_tarefaz_sozinho_se_nao_com_quem_faz}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Como é o momento das lições? Tem horário? Rotina?<br><label class="lbinfo-ntstatic">{{$anamnese->descricao_momento_licoes}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Como é a escola na opinião dos pais?<br><label class="lbinfo-ntstatic">{{$anamnese->opniao_dos_pais_sobre_escola}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Opinião sobre tarefas das escolas:<br><label class="lbinfo-ntstatic">{{$anamnese->opniao_dos_pais_sobre_tarefas}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Fatos importantes da vida escolar:<br><label class="lbinfo-ntstatic">{{$anamnese->fato_importante_vida_escolar}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Tem tique? Quais?<br><label class="lbinfo-ntstatic">{{$anamnese->apresenta_tiques_se_sim_quais}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Como pega no lápis?<br><label class="lbinfo-ntstatic">{{$anamnese->como_pegua_o_lapis}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Força da escrita:<br><label class="lbinfo-ntstatic">{{$anamnese->forca_da_escrita}}</label></label>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Repetiu de ano? Quando e porque?<br><label class="lbinfo-ntstatic">{{$anamnese->repetiu_ano_se_sim_qual_e_porque}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Queixas frequentes sobre a escola:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->queixas_frequentes}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Dificuldades<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->tem_dificuldades_para}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Conhece<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->conhece_tais_coisas}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Como vocês acham que começou o problema? A que fatores atribuem?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->como_acha_que_surgiu_o_problema_a_que_fatores_atribuem}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Outras questões<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->outras_questoes}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="lbinfo-perfis">Quais escolas frequentou e quando as frequentou?</h6>
                            <label class="lbinfo-perfis-sub">(Escola, Série, Ano)
                            <br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->escolas_que_frequentou}}</label></label>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Comportamento</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Humor habitual:<br><label class="lbinfo-ntstatic">{{$anamnese->humor_habitual}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Prefere brincar sozinho ou em grupo?<br><label class="lbinfo-ntstatic">{{$anamnese->prefere_brincar_sozinho_ou_em_grupos}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Estranha mudanças de ambiente?<br><label class="lbinfo-ntstatic">{{$anamnese->estranha_mudancas_de_ambiente}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Adapta-se facilmente ao meio?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->adaptase_facilmente_ao_meio == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Tem horários?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->tem_horarios == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">É lider?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->e_lider == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Aceita bem ordens?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->aceita_bem_ordens == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Faz birras?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->faz_birras == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Chora com frequência?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->chora_com_frequencia == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Esportes que pratica:<br><label class="lbinfo-ntstatic">{{$anamnese->pratica_esportes_se_sim_quais}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Agressivo, apático ou teimoso?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->apresenta_agressividade_apatia_ou_teimosia == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Medos que apresenta:<br><label class="lbinfo-ntstatic">{{$anamnese->tem_algum_medo_se_sim_quais}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Brincadeiras de brinquedos favoritos:<br><label class="lbinfo-ntstatic">{{$anamnese->quais_as_brincadeiras_e_brinquedos_favoritos}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Quem cuidava da criança até os três anos?<br><label class="lbinfo-ntstatic">{{$anamnese->quem_cuidava_da_criança_ate_os_tres_anos}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Quem cuidou da criança depois dos três anos?<br><label class="lbinfo-ntstatic">{{$anamnese->quem_cuida_posteriormente}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Como a criança se comporta sozinha?<br><label class="lbinfo-ntstatic">{{$anamnese->como_a_crianca_se_comporta_sozinha}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Como a criança se comporta em família?<br><label class="lbinfo-ntstatic">{{$anamnese->como_a_crianca_se_comporta_em_familia}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Como a criança se comporta com outras pessoas?<br><label class="lbinfo-ntstatic">{{$anamnese->como_a_crianca_se_comporta_com_outras_pessoas}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Com quem a criança gosta de ficar? Por quê?<br><label class="lbinfo-ntstatic">{{$anamnese->com_quem_ele_mais_gosta_de_ficar_e_por_que}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Em que momento a criança se encontra com a família?<br><label class="lbinfo-ntstatic">{{$anamnese->em_que_momento_a_crianca_encontra_a_familia}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Já houve conflitos familiares? A criança presenciou ou presencia?<br><label class="lbinfo-ntstatic">{{$anamnese->ja_houve_conflitos_familiares_e_a_crianca_presencia}}</label></label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Assiste TV em demasia? Quais programas favoritos?<br><label class="lbinfo-ntstatic">{{$anamnese->assiste_tv_em_demasia}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Como se relaciona com colegas e professores?<br><label class="lbinfo-ntstatic">{{$anamnese->como_se_relaciona_com_colegas_e_professores}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Como se relaciona com irmãos?<br><label class="lbinfo-ntstatic">{{$anamnese->como_se_relaciona_com_irmaos}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Quais programas de tv favoritos?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->quais_programas_favoritos}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">De que forma é punida?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->de_que_forma_e_punido}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Que tipos de perdas já enfrentou? Com que idade?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->que_tipos_de_perdas_ja_enfrentou_e_em_que_idade}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">De que forma o pai e a mãe se relacionam com a criança?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->de_que_forma_o_pai_e_a_mae_se_relacionam_com_a_crianca}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Em que horário brincam ou fazem alguma atividade de lazer?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->em_que_horario_brincam_ou_fazem_alguma_atividade_de_lazer}}</label></label>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Sexualidade</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Apresenta curiosidade sexual? Quando começou?<br><label class="lbinfo-ntstatic">{{$anamnese->apresenta_curiosidade_sexual_se_sim_quando_comecou}}</label></label>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Tipos de perguntas:<br><label class="lbinfo-ntstatic">{{$anamnese->tipos_de_perguntas_fase_sexual}}</label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Fase de masturbação:<br><label class="lbinfo-ntstatic">{{$anamnese->fase_de_masturbacao}}</label></label>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Atitude da família:<br><label class="lbinfo-ntstatic">{{$anamnese->atitude_da_família}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Independência</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Se veste só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->se_veste_so_a_partir_de_qual_idade}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Começou a abotoar só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->se_abotoa_so_a_partir_de_qual_idade}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Começou a fechar roupa só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->fecha_roupa_so_a_partir_de_qual_idade}}</label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Começou a tomar banho só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->toma_banho_so_a_partir_de_qual_idade}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Começou a se pentear só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->se_penteia_so_a_partir_de_qual_idade}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Começou a amarrar cadarços sozinho a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->se_amarra_so_a_partir_de_qual_idade}}</label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Começou a escovar os dentes só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->escova_os_dentes_so_a_partir_de_qual_idade}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Começou a comer só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->come_so_a_partir_de_qual_idade}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Começou a se calçar só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->se_calca_so_a_partir_de_qual_idade}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Hábitos</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Rói unhas?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->roi_unhas == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Tiques nervosos:<br><label class="lbinfo-ntstatic">{{$anamnese->tem_tiques_nervosos_se_sim_quais}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Mania repetitiva (TOC):<br><label class="lbinfo-ntstatic">{{$anamnese->alguma_mania_repetitiva_se_sim_qual}}</label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Tem ou tinha algum objeto como cheirinho ou outro para dormir, levar para escola?<br><label class="lbinfo-ntstatic">{{$anamnese->temObjetoComoCheirinhoOuOutroParaDormirLevarParaEscolaSeSimQual}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Chupa dedo ou bico?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->chupa_dedo_ou_bico == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Tem movimentos rítmicos?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->tem_movimentos_ritmicos == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Outros Hábitos:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->outros_habitos}}</label></label>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Outros</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Como a família vê o problema?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->como_a_familia_ve_o_problema}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Como o casal age em função da criança?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->como_o_casal_age_em_funcao_da_crianca}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Como os pais se veem: permissivos, autoritários, equilibrados?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->comoOsPaisSeVeemPermissivosAutoritariosEquilibradosEPorque}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Como são colocados os limites para a criança no seu cotidiano?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->como_sao_colocados_os_limites_para_a_crianca_no_seu_cotidiano}}</label></label>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Informações gerais familiares</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Situação econômica?<br><label class="lbinfo-ntstatic">{{$anamnese->situacao_economica}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Situação cultural?<br><label class="lbinfo-ntstatic">{{$anamnese->situacao_cultural}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Hábitos de lazer?<br><label class="lbinfo-ntstatic">{{$anamnese->habitos_de_lazer}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Vai ao cinema ver o que e com que frequência?<br><label class="lbinfo-ntstatic">{{$anamnese->vai_ao_cinema_e_com_que_frequencia}}</label></label>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Estímulos culturais:<br><label class="lbinfo-ntstatic">{{$anamnese->estimulo_cultural_se_sim_quais}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Lê quais livros e com que frequência?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->le_quais_livros_com_que_frequência}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Constância de diálogos?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->constancia_de_dialogos}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Quais refeições fazem juntos?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->fazem_refeicoes_juntos_se_sim_quais}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Algum vício na família? (drogas, alcoolismo)?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->algum_vício_na_família_se_sim_quais}}</label></label>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Cognições</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Com que frequência manipula brinquedos e objetos?<br><label class="lbinfo-ntstatic">{{$anamnese->com_que_frequencia_manipula_brinquedos_e_objetos}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Imita algum gesto e/ou expressão facial de emoção de familiares e pessoas próximas?<br><label class="lbinfo-ntstatic">{{$anamnese->imitaAlgumGestoDeEmocaoFamiliaresPessoasProximasSeSimQuais}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Imita algum som específico?<br><label class="lbinfo-ntstatic">{{$anamnese->imita_algum_som_especifico_se_sim_quais}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Mostra-se sonolento? Com qual frequência?<br><label class="lbinfo-ntstatic">{{$anamnese->mostrase_sonolento_se_sim_com_qual_frequencia}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Quando estimulado, consegue relembrar de situações vivenciadas?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->quando_estimulado_consegue_relembrar_de_situacoes_vivenciadas == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Com que frequência ignora estímulos?<br><label class="lbinfo-ntstatic">{{$anamnese->com_que_frequencia_ignora_estimulos}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Como é o contato visual?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->estabelece_contato_visual_se_sim_em_quais_situacoes}}</label></label>
                                </div>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Ansiedade em processos de mudança de rotina? Algum exemplo?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->ansioso_no_processo_de_mudanca_de_rotina_se_sim_voce_lembra}}</label></label>
                                </div>
                        </div>

                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Finalização</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Análise da entrevista:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->analise_da_entrevista}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Encaminhamentos<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->encaminhamentos}}</label></label>
                                </div>
                        </div>
                    </div>
                </div>


                <br>
                <br>


            </div>
        </div>
    </div>

@endsection

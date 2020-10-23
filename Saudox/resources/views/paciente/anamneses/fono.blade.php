
@extends('layouts.mainlayout')
@section('content')


    <div class="container">
        <div class="row bordas_amarelas bg-padrao">
            <div class="col-md">


                <h1 class="pessoal">Anamnese Fonoaudiologica</h1>
                <!--
                BOTÃOD E EDITAR PACIENTE!!!!
                -->
                <div class="info-gestacao">
                    <h3 class="marker-label">Histórico de vida da criança</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Posição no bloco familiar:<br><label class="lbinfo-ntstatic">{{$anamnese->posicao_bloco_familiar}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Criança desejada:<br><label class="lbinfo-ntstatic">
                                @if($anamnese->crianca_desejada == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-perfis">Desenvolvimento motor no tempo certo:<br><label class="lbinfo-ntstatic">
                                @if($anamnese->desenvolvimento_motor_no_tempo_esperado == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-perfis">Amamentação:<br><label class="lbinfo-ntstatic">
                                @if($anamnese->amamentacao_natural == 1)
                                Materna
                                @else
                                Artificial
                                @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-perfis">Fatos que afetaram o desenvolvimento do(a) paciente (a) (acidentes, operações, traumas etc.) ou outras ocorrências:<br><label class="lbinfo-ntstatic">{{$anamnese->fatos_que_afetaram_o_desenvolvimento_do_paciente}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Reação da criança em relação ao status da relação dos pais:<br><label class="lbinfo-ntstatic">{{$anamnese->reacao_crianca_status_relacao_pais}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Existiam expectativas em relação ao sexo da criança?<br><label class="lbinfo-ntstatic">{{$anamnese->tinha_expectativa_em_relacao_ao_sexo_da_crianca}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Troca letras ou fonemas?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->letras_ou_fonemas_trocados == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-perfis">Atraso ou problema na fala?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->atraso_ou_problema_na_fala == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-perfis">Até que idade usou chupeta?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->atraso_ou_problema_na_fala == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Duração da gestação:<br><label class="lbinfo-ntstatic">{{$anamnese->duracao_da_gestacao}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Fez pré-natal?<br><label class="lbinfo-ntstatic">{{$anamnese->fez_pre_natal}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Mãe apresentou algum problema durante a gestação?<br><label class="lbinfo-ntstatic">{{$anamnese->mae_apresentou_algum_problema_durante_gravidez}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Tem enurese noturna?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->tem_enurese_noturna == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-perfis">A criança faz ou já fez algum tipo de tratamento fonoaudiológico?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->ja_fez_tratamento_fonoaudiologo == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-perfis">Onde fez tratamento fonoaudiológico?<br><label class="lbinfo-ntstatic">{{$anamnese->se_sim_tratamento_fono_anterior_onde}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Quando fez tratamento fonoaudiológico?<br><label class="lbinfo-ntstatic">{{$anamnese->se_sim_tratamento_fono_anterior_quando}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Tipo de parto:<br><label class="lbinfo-ntstatic">{{$anamnese->tipo_parto}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Houveram complicações durante o parto?<br><label class="lbinfo-ntstatic">{{$anamnese->complicacao_durante_parto}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Foi necessário algum recurso?<br><label class="lbinfo-ntstatic">{{$anamnese->foi_necessario_utilizar_algum_recurso}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Perturbações (pesadelos, sonambulismo, agitação, etc.):<br><label class="lbinfo-ntstatic">
                                @if($anamnese->perturbacoes_como_pesadelos_sonambulismo_agitacao_etc == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                        </div>
                    </div>

                </div>

                <div class="info-atual">
                    <h3 class="marker-label">Estado atual da criança</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Dificuldade na fala:<br><label class="lbinfo-ntstatic">{{$anamnese->dificuldades_na_fala}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Dificuldade na locomocao:<br><label class="lbinfo-ntstatic">{{$anamnese->dificuldades_na_locomocao}}</label></label>

                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Dificuldade na visão:<br><label class="lbinfo-ntstatic">{{$anamnese->dificuldades_na_visao}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">O paciente apresenta algum problema de saúde?<br><label class="lbinfo-ntstatic">{{$anamnese->problemas_de_saude}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Toma ou já tomou algum remédio controlado?<br><label class="lbinfo-ntstatic">{{$anamnese->toma_ou_ja_tomou_remedio_controlado_se_sim_quais}}</label></label>
                        </div>

                </div>

                <div class="info-avd">
                    <h3 class="marker-label">É dependente em quais nas AVDs (atividades de vida diária)?</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Toma banho sozinho?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->toma_banho_sozinho == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Escova os dentes sozinho:<br><label class="lbinfo-ntstatic">
                                @if($anamnese->escova_os_dentes_sozinho == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Usa o banheiro sozinho:<br><label class="lbinfo-ntstatic">
                                @if($anamnese->usa_o_banheiro_sozinho == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Necessita auxílio para se vestir/despir:<br><label class="lbinfo-ntstatic">
                                @if($anamnese->necessita_de_auxilio_para_se_vestir_ou_despir == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                        </div>
                    </div>
                </div>

                <div class="info-tendencias">
                    <h3 class="marker-label">Tendencias próprias</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Atende intervenções quando está desobedecendo:<br><label class="lbinfo-ntstatic">
                                @if($anamnese->atende_as_intervencoes_quando_esta_desobedecendo == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Chora fácil:<br><label class="lbinfo-ntstatic">
                                @if($anamnese->chora_facil == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Recusa auxílio:<br><label class="lbinfo-ntstatic">
                                @if($anamnese->recusa_auxílio == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Resistência ao toque:<br><label class="lbinfo-ntstatic">{{$anamnese->tem_resistencia_ao_toque}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Escolaridade</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Série atual:<br><label class="lbinfo-ntstatic">{{$anamnese->serie_atual_na_escola}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Alfabetizada?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->alfabetizada == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                            <br>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Possui dificuldades de aprendizagem?<br><label class="lbinfo-ntstatic">{{$anamnese->tem_dificuldades_de_aprendizagem}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Já repetiu alguma série?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->repetiu_algum_ano == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                            <br>
                        </div>
                    </div>
                </div>

                <div class="info-sociabilidade">
                    <h3 class="marker-label">Sociabilidade</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Faz amigos com facilidade?<br><label class="lbinfo-ntstatic">{{$anamnese->faz_amigos_com_facilidade}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Distrações preferidas:<br><label class="lbinfo-ntstatic">{{$anamnese->distracoes_preferidas}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Dorme sozinho?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->dorme_sozinho == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-perfis">Dorme no quarto dos pais?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->dorme_no_quarto_dos_pais == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Adapta-se facilmente ao meio?<br><label class="lbinfo-ntstatic">{{$anamnese->adapta_se_facilmente_ao_meio}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Atitudes sociais predominantes:<br><label class="lbinfo-ntstatic">{{$anamnese->atitudes_sociais_predominantes}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-perfis">Companheiros da criança nas brincadeiras:<br><label class="lbinfo-ntstatic">{{$anamnese->companheiros_da_crianca_nas_brincadeiras}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Emocionais<br><label class="lbinfo-ntstatic">{{$anamnese->comportamento_emocional}}</label></label>
                            <br>
                            <label class="lbinfo-perfis">Sono<br><label class="lbinfo-ntstatic">{{$anamnese->comportamento_sono}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-pais">
                    <h3 class="marker-label">Medidas disciplinares empregadas pelos pais</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12 justify-content-center text-center">
                            <label class="lbinfo-ntstatic">{{$anamnese->medidas_disciplinares_empregadas_pelos_pais}}</label>
                        </div>
                    </div>
                </div>


                <div class="info-saude">
                    <h3 class="marker-label">Outras Ocorrências</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12 justify-content-center text-center">
                            <label class="lbinfo-ntstatic">{{$anamnese->outras_ocorrencias_observacoes}}</label>
                        </div>
                    </div>
                </div>

                <br>
                <br>


            </div>
        </div>
    </div>

@endsection

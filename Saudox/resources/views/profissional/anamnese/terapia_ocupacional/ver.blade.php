
@extends('layouts.mainlayout')
@section('content')


    <div class="container">
        <div class="row bordas_amarelas bg-padrao">
            <div class="col-md">


                <h1 class="pessoal"> Anamnese de Terapia Ocupacional do {{$paciente->nome_paciente}} </h1>
                @if(Auth::guard('profissional')->check())
                    <h3 class="pessoal"> <a href="{{ route('profissional.anamnese.terapia_ocupacional.editar', $anamnese->id) }}">Editar</a> </h3>
                @endif


                <!--
                BOTÃOD E EDITAR PACIENTE!!!!
                -->
                <br>
                <div class="info-gestacao">
                    <h3 class="marker-label">Informações sobre a gestação</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Gestação:<br><label class="lbinfo-ntstatic">{{$anamnese->gestacao}}</label></label>
                            <br>
                            <label class="lbinfo-static">Parto::<br><label class="lbinfo-ntstatic">{{$anamnese->parto}}</label></label>
                            <br>
                            <label class="lbinfo-static">Desenvolvimento motor no tempo certo:<br><label class="lbinfo-ntstatic">{{$anamnese->desenvolvimento_motor_no_tempo_certo}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Doenças da mãe na gravidez::<br><label class="lbinfo-ntstatic">{{$anamnese->doencas_da_mae_na_gravidez}}</label></label>
                            <br>
                            <label class="lbinfo-static">Amamentação:<br><label class="lbinfo-ntstatic">{{$anamnese->amamentacao_natural}}</label></label>
                            <br>
                            <label class="lbinfo-static">Troca letras ou fonemas?<br><label class="lbinfo-ntstatic">{{$anamnese->troca_letras_ou_fonemas}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Inquietacoes da mae na gravidez:<br><label class="lbinfo-ntstatic">{{$anamnese->inquietacoes_da_mae_na_gravidez}}</label></label>
                            <br>
                            <label class="lbinfo-static">Perturbações no sono?:<br><label class="lbinfo-ntstatic">{{$anamnese->perturbacoes_no_sono}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Dificuldade ou atraso no controle do esfíncter:<br><label class="lbinfo-ntstatic">{{$anamnese->dificuldade_ou_atraso_no_controle_do_esfincter}}</label></label>
                            <br>
                            <label class="lbinfo-static">Hábitos Especiais?:<br><label class="lbinfo-ntstatic">{{$anamnese->habitos_especiais_ao_dormir}}</label></label>
                        </div>
                    </div>

                </div>

                <div class="info-atual">
                    <h3 class="marker-label">Estado atual da criança</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Dificuldade na fala:<br><label class="lbinfo-ntstatic">{{$anamnese->dificuldade_na_fala}}</label></label>
                            <br>
                            <label class="lbinfo-static">Dificuldade na locomocao:<br><label class="lbinfo-ntstatic">{{$anamnese->dificuldade_na_locomocao}}</label></label>

                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Dificuldade na visão:<br><label class="lbinfo-ntstatic">{{$anamnese->dificuldade_na_visao}}</label></label>
                            <br>
                            <label class="lbinfo-static">Ecolalias?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->ecolalias == 1)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-static">Movimentos estereotipados?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->movimentos_estereotipados == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                            <br>

                        </div>


                </div>

                <div class="info-avd">
                    <h3 class="marker-label">É dependente em quais nas AVDs (atividades de vida diária)?</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Toma banho sozinho?<br><label class="lbinfo-ntstatic">{{$anamnese->toma_banho_sozinho}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Escova os dentes sozinho:<br><label class="lbinfo-ntstatic">{{$anamnese->escova_os_dentes_sozinho}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Usa o banheiro sozinho:<br><label class="lbinfo-ntstatic">{{$anamnese->usa_o_banheiro_sozinho}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Necessita auxílio para se vestir/despir:<br><label class="lbinfo-ntstatic">{{$anamnese->necessita_auxilio_para_se_vestir_ou_despir}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-tendencias">
                    <h3 class="marker-label">Tendencias próprias</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Atende intervenções quando está desobedecendo:<br><label class="lbinfo-ntstatic">{{$anamnese->atende_intervencoes_quando_esta_desobedecendo}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Chora fácil:<br><label class="lbinfo-ntstatic">{{$anamnese->chora_facil}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Recusa auxílio:<br><label class="lbinfo-ntstatic">{{$anamnese->recusa_auxílio}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Resistência ao toque:<br><label class="lbinfo-ntstatic">{{$anamnese->resistencia_ao_toque}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Escolaridade</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Criança estuda?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->crianca_estuda == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                            <br>
                            <label class="lbinfo-static">Já repetiu alguma série?<br><label class="lbinfo-ntstatic">{{$anamnese->ja_repetiu_alguma_serie}}</label></label>
                            <br>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Já estudou antes em outra escola?<br><label class="lbinfo-ntstatic">{{$anamnese->ja_estudou_antes_em_outra_escola}}</label></label>
                            <br>
                            <label class="lbinfo-static">Possui acompanhante terapêutico em sala?<br><label class="lbinfo-ntstatic">{{$anamnese->possui_acompanhante_terapeutico_em_sala}}</label></label>
                            <br>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Motivo da transferência escolar:<br><label class="lbinfo-ntstatic">{{$anamnese->recusa_auxílio}}</label></label>
                            <br>
                            <label class="lbinfo-static">Recebe orientação para fazer deveres escolares em casa?<br><label class="lbinfo-ntstatic">{{$anamnese->recebe_orientacao_aos_deveres_em_casa}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Quem orienta nos deveres de casa?<br><label class="lbinfo-ntstatic">{{$anamnese->quem_orienta_os_deveres_em_casa_se_sim_orientacao_deveres}}</label></label>
                            <br>
                            <label class="lbinfo-static">Durante quanto tempo?<br><label class="lbinfo-ntstatic">{{$anamnese->quanto_tempo_executa_os_deveres_em_casa}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-atividades">
                    <h3 class="marker-label">Participa de algumas das atividades abaixo?</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Linguas estrangeiras:<br><label class="lbinfo-ntstatic">{{$anamnese->quais_linguas_estrangeiras_fala}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Esportes:<br><label class="lbinfo-ntstatic">{{$anamnese->quais_esportes_pratica}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Instrumentos:<br><label class="lbinfo-ntstatic">{{$anamnese->quais_intrumentos_toca}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Outras atividades:<br><label class="lbinfo-ntstatic">{{$anamnese->outras_atividades_que_pratica}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-sociabilidade">
                    <h3 class="marker-label">Sociabilidade</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Faz amigos com facilidade?<br><label class="lbinfo-ntstatic">{{$anamnese->faz_amigos_com_facilidade}}</label></label>
                            <br>
                            <label class="lbinfo-static">Distrações preferidas:<br><label class="lbinfo-ntstatic">{{$anamnese->distracoes_preferidas}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Adapta-se facilmente ao meio?<br><label class="lbinfo-ntstatic">{{$anamnese->adaptase_facilmente_ao_meio}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Companheiros da criança nas brincadeiras:<br><label class="lbinfo-ntstatic">{{$anamnese->companheiros_da_crianca_em_brincadeiras}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Escolha de grupo:<br><label class="lbinfo-ntstatic">{{$anamnese->escolha_de_grupo}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-atitudes">
                    <h3 class="marker-label">Atitudes sociais predominantes</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Obediente?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->obediente == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                            <br>
                            <label class="lbinfo-static">Dependente?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->dependente == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                            <br>
                            <label class="lbinfo-static">Independente?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->independente == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Comunicativo?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->comunicativo == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                            <br>
                            <label class="lbinfo-static">Descrição caso dependente:<label class="lbinfo-ntstatic">{{$anamnese->descricao_se_sim_dependente}}</label></label>
                            <br>
                            <label class="lbinfo-static">Descrição caso independente:<label class="lbinfo-ntstatic">{{$anamnese->descricao_se_sim_indepedente}}</label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Agressivo?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->agressivo == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                            <br>
                            <label class="lbinfo-static">Cooperativo?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->cooperativo == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                            <br>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Descrição caso agressivo:<br><label class="lbinfo-ntstatic">{{$anamnese->descricao_se_sim_agressivo}}</label></label>
                            <br>
                            <label class="lbinfo-static">Descrição caso cooperativo:<br><label class="lbinfo-ntstatic">{{$anamnese->descricao_se_sim_cooperador}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-emocionais">
                    <h3 class="marker-label">Emocionais</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Tranquilo?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->tranquilo == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                            <br>
                            <label class="lbinfo-static">Seguro?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->seguro == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                            <br>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Ansioso?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->ansioso == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                            <br>
                            <label class="lbinfo-static">Emotivo?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->emotivo == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Alegre?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->alegre == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                            <br>
                            <label class="lbinfo-static">Queixoso?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->queixoso == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                        </div>


                    </div>
                </div>

                <div class="info-sono">
                    <h3 class="marker-label">Sono</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Insônia?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->insonia == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                            <br>
                            <label class="lbinfo-static">Pesadelos?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->pesadelos == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                            <br>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Hipersonia?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->hipersonia == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                            <br>
                            <label class="lbinfo-static">Dorme Sozinho?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->dorme_sozinho == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Dorme no quarto dos pais?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->dorme_no_quarto_dos_pais == 1)
                                Não
                                @else
                                Sim
                                @endif
                                </label></label>
                            <br>
                            <label class="lbinfo-static">Divide quarto com alguem?<br><label class="lbinfo-ntstatic">{{$anamnese->divide_quarto_com_alguem}}</label></label>
                        </div>


                    </div>
                </div>

                <div class="info-pais">
                    <h3 class="marker-label">Medidas disciplinares empregadas pelos pais</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-ntstatic">{{$anamnese->medidas_disciplinares_empregadas_pelos_pais}}</label>
                        </div>
                    </div>
                </div>

                <div class="info-pais">
                    <h3 class="marker-label">Reação do filho ao ser contráriado</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-ntstatic">{{$anamnese->reação_do_filho_ao_ser_contrariado}}</label>
                        </div>
                    </div>
                </div>

                <div class="info-pais">
                    <h3 class="marker-label">Atitude dos pais à reação do filho ao ser contráriado</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-ntstatic">{{$anamnese->atitude_dos_pais_a_reacao_filho_contrareado}}</label>
                        </div>
                    </div>
                </div>

                <div class="info-saude">
                    <h3 class="marker-label">Saúde</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="lbinfo-static">Acompanhamento médico?<br><label class="lbinfo-ntstatic">{{$anamnese->acompanhamento_medico}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-static">Médico responsável:<br><label class="lbinfo-ntstatic">{{$anamnese->qual_medico_responsavel}}</label></label>
                        </div>

                    </div>
                </div>

                <div class="info-saude">
                    <h3 class="marker-label">Diagnostico médico</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-ntstatic">{{$anamnese->diagnostico_medico}}</label>
                        </div>
                    </div>
                </div>











            </div>
        </div>
    </div>

@endsection

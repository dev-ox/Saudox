
@extends('layouts.mainlayout')
@section('content')


    <div class="container">
        <div class="row bordas_amarelas bg-padrao">
            <div class="col-md">


                <h1 class="pessoal"> Anamnese Psicopedagogica de {{$paciente->nome_paciente}} </h1>
                @if(Auth::guard('profissional')->check())
                    <h3 class="pessoal"> <a href="{{ route('profissional.anamnese.psicopedagogia.editar', $paciente->id) }}">Editar</a> </h3>
                @endif

                <!--
                BOTÃOD E EDITAR PACIENTE!!!!
                -->

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
                <div class="info-gestacao">
                    <h3 class="marker-label">Entrevista</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Compareceram a entrevista:<br><label class="lbinfo-ntstatic">{{$anamnese->compareceram_entrevista}}</label></label>
                            <br>
                            <label class="lbinfo-static">Queixa:<br><label class="lbinfo-ntstatic">{{$anamnese->queixa}}</label></label>
                            <br>
                        </div>
                    </div>

                </div>

                <div class="info-atual">
                    <h3 class="marker-label">Escola</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Escolaridade:<br><label class="lbinfo-ntstatic">{{$anamnese->escolaridade}}</label></label>
                            <br>
                            <label class="lbinfo-static">Escola:<br><label class="lbinfo-ntstatic">{{$anamnese->escola}}</label></label>
                            <br>
                            <label class="lbinfo-static">Coordenador:<br><label class="lbinfo-ntstatic">{{$anamnese->coordenador}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Turno das aulas:<br><label class="lbinfo-ntstatic">{{$anamnese->turno_das_aulas}}</label></label>
                            <br>
                            <label class="lbinfo-static">Pública ou Privada?<br><label class="lbinfo-ntstatic">{{$anamnese->escola_publica_privada}}</label></label>
                            <br>
                            <label class="lbinfo-static">Encaminhado pela escola?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->encaminhado_pela_escola == 0)
                                Não
                                @else
                                Sim
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Horário das aulas:<br><label class="lbinfo-ntstatic">{{$anamnese->horario_das_aulas}}</label></label>
                            <br>
                            <label class="lbinfo-static">Professor responsável:<br><label class="lbinfo-ntstatic">{{$anamnese->professor_responsavel}}</label></label>
                        </div>

                </div>

                <div class="info-avd">
                    <h3 class="marker-label">Família</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-static">Profissão do pai:<br><label class="lbinfo-ntstatic">{{$anamnese->profissao_pai}}</label></label>
                            <br>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-static">Escolaridade do pai:<br><label class="lbinfo-ntstatic">{{$anamnese->escolaridade_pai}}</label></label>
                            <br>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-static">Profissão da mãe:<br><label class="lbinfo-ntstatic">{{$anamnese->profissao_mae}}</label></label>
                            <br>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-static">Escolaridade da mãe:<br><label class="lbinfo-ntstatic">{{$anamnese->escolaridade_mae}}</label></label>
                            <br>
                        </div>
                    </div>
                </div>

                <div class="info-tendencias">
                    <h3 class="marker-label">Composição Familiar</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Relação atual com os pais:<br><label class="lbinfo-ntstatic">{{$anamnese->relacao_dos_pais_hoje}}</label></label>
                            <br>
                        </div>

                        <div class="col-md-12">
                            <label class="lbinfo-static">Outra crianças e parentes que moram com a criança:<br>
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
                            <label class="lbinfo-static">Tratamento para infertilidade:<br><label class="lbinfo-ntstatic">{{$anamnese->tratamento_para_infertilidade}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Histórico familiar de doença neurológica:<br><label class="lbinfo-ntstatic">{{$anamnese->historia_familiar_de_doenca_neurologica}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Convulsões:<br><label class="lbinfo-ntstatic">{{$anamnese->convulcoes}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Concepção</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Composição familiar na época de concepção:<br>
                            <div class="c-wrapper">
                                <label class="lbinfo-ntstatic">{{$anamnese->como_era_composta_a_familia_na_epoca_da_concepcao}}</label></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Número de gestações anteriores:<br><label class="lbinfo-ntstatic">{{$anamnese->gestacoes_anteriores}}</label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-static">Idade da mãe na concepção:<br><label class="lbinfo-ntstatic">{{$anamnese->idade_dos_pais_na_epoca_mãe}}</label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-static">Idade do pai na concepção:<br><label class="lbinfo-ntstatic">{{$anamnese->idade_dos_pais_na_epoca_pai}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Abortos?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->abortos == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                        <div class="col-md-4">
                            @if($anamnese->abortos == 1)
                                <label class="lbinfo-static">Numero de abortos naturais:<br><label class="lbinfo-ntstatic">{{$anamnese->naturais}}</label></label>
                            @endif
                        </div>
                        <div class="col-md-4">
                            @if($anamnese->abortos == 1)
                                <label class="lbinfo-static">Numero de abortos Provocados:<br><label class="lbinfo-ntstatic">{{$anamnese->provocados}}</label></label>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Perdeu algum filho?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->perdeu_algum_filho == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                        <div class="col-md-4">
                            @if($anamnese->perdeu_algum_filho == 1)
                                <label class="lbinfo-static">A perda ocorreu antes do nascimento do paciente?<br><label class="lbinfo-ntstatic"><label class="lbinfo-ntstatic">
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
                                <label class="lbinfo-static">Como perdeu o filho?<br><label class="lbinfo-ntstatic">{{$anamnese->como_perdeu_o_filho}}</label></label>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Gravidez</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Aceitação das famílias:<br><label class="lbinfo-ntstatic">{{$anamnese->como_foi_a_aceitacao_das_familias}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Gravidez planejada por ambos?<br><label class="lbinfo-ntstatic">{{$anamnese->gravidez_planejada_por_ambos}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Fez pré-natal?<br><label class="lbinfo-ntstatic">
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
                            <label class="lbinfo-static">Teve alguma doença durante a gravidez? Se sim, quais?<br><label class="lbinfo-ntstatic">{{$anamnese->teve_alguma_doenca_na_gestacao}}</label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-static">Tomou alguma medicação durante a gravidez? Se sim, qual?<br><label class="lbinfo-ntstatic">{{$anamnese->tomou_alguma_medicacao_se_sim_qual}}</label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-static">Sofreu acidentes/quedas? Como foi (foram)?<br><label class="lbinfo-ntstatic">{{$anamnese->sofreu_acidentes_quedas_se_sim_como_foi}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Teve enjoos na gravidez?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->enjoo == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-static">Bebeu durante a gravidez?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->bebeu == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-static">Fumou durante a gravidez?<br><label class="lbinfo-ntstatic">
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
                            <label class="lbinfo-static">Entrou em contato com algum produto químico/toxico? Se sim, qual?<br><label class="lbinfo-ntstatic">{{$anamnese->entrou_em_contato_com_algum_produto_quimicotoxico_se_sim_qual}}</label></label>
                        </div>
                        <div class="col-md-3">
                            <label class="lbinfo-static">Esteve em ambientes com alto nível de poluição?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->esteve_em_ambientes_com_alto_nivel_de_poluicao == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                        <div class="col-md-3">
                            <label class="lbinfo-static">ETeve exposição a raios x?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->exposição_a_raiox == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                        <div class="col-md-3">
                            <label class="lbinfo-static">Situação econômica do casal na época<br><label class="lbinfo-ntstatic">{{$anamnese->qual_era_a_situacao_economica_do_casal_na_epoca}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Já tinham outros filhos? Quantos?<br><label class="lbinfo-ntstatic">{{$anamnese->ja_tinham_outros_filhos_se_sim_quantos}}</label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-static">Mãe trabalhou durante a gravidez?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->mae_trabalhava_fora_durante_gravidez == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>
                        <div class="col-md-4">
                            <label class="lbinfo-static">O casal ou alguém na família de ambos possui alguma doença hereditária?<br><label class="lbinfo-ntstatic">{{$anamnese->casal_ou_familia_de_ambos_possui_doenca_hereditaria_se_sim_qual}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Parto</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Local do parto:<br><label class="lbinfo-ntstatic">{{$anamnese->local_parto}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Tipo do parto:<br><label class="lbinfo-ntstatic">{{$anamnese->tipo_parto}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Problemas no parto:<br><label class="lbinfo-ntstatic">{{$anamnese->algum_problema_no_parto_se_sim_qual}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="lbinfo-static">Peso ao nascer (kg):<br><label class="lbinfo-ntstatic">{{$anamnese->peso_ao_nascer}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-static">Comprimento ao nascer (cm):<br><label class="lbinfo-ntstatic">{{$anamnese->comprimento_ao_nascer}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-static">Teve icterícia?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->teve_ictericia == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-static">Idade gestacional (semanas):<br><label class="lbinfo-ntstatic">{{$anamnese->idade_gestacional_do_bebe_ao_nascer}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Alimentação</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Como se deu a alimentação?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->como_se_deu_a_alimentação}}</label></label>
                                </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Se mamou, até quando? E como se sentia ao amamentar?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->se_mamou_foi_ate_quando_e_como_se_sentia_ao_amamentar}}</label></label>
                                </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-static">Mamou no seio? Se não, por quê?<br><label class="lbinfo-ntstatic">{{$anamnese->mamou_no_seio_se_nao_qual_o_motivo}}</label></label>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-static">Tomou mamadeira até quando?<br><label class="lbinfo-ntstatic">{{$anamnese->tomou_mamadeira_ate_quando}}</label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Aceitou bem a alimentação pastosa?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->aceitou_bem_a_alimentação_pastosa == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Aceitou bem a alimentação sólida?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->aceitou_bem_a_alimentação_solida == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Usa copo?<br><label class="lbinfo-ntstatic">
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
                            <label class="lbinfo-static">Alimentação atual (tipo, preferências, apetite, posição, mastigação):<br>
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
                        <div class="col-md-12">
                            <label class="lbinfo-static">História Patológica Pregressa:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->retardo_diabetes_síndromes_doenças_nervosas_epilepsia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Sarampo:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_sarampo_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Dores de ouvido:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_dores_ouvido_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Cólicas:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_colicas_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Catapora:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_catapora_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Caxumba:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_caxumba_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Rubéola:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_rubeola_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Coqueluche:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_coqueluche_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Meninginte:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_meningite_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Desidratação:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_desidratacao_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Otite:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_otite_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Adenoides:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_adenoides_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Amigdalites:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_amigdalites_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Alergias:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_alergias_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Acidentes:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_acidentes_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Convulsões:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_convulsoes_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Febres:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_febres_infancia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Internações (quanto tempo?):<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->foi_internado_se_sim_por_quanto_tempo}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Cirurgias (e idade que fez as cirurgias):<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->ja_fez_cirurgia_se_sim_com_quantos_anos_e_qual_cirugia}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Quedas e traumatismos:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->quedas_e_traumatismos}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Complicações com vacinas:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->teve_complicacao_com_vacina_se_sim_qual}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Audição e visão. Óculos? Leva o óculos pra escola?<br>
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
                        <div class="col-md-6">
                            <label class="lbinfo-static">Até quando dormiu com os pais?<br>
                                <div class="b-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->ate_quando_dormiu_com_os_pais}}</label></label>
                                </div>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-static">Como foi quando parou de dormir com os pais?<br>
                                <div class="b-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->como_foi_a_separacao_dormida_com_os_pais}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-static">Sono tranquilo ou agitado? Se é agitado, quando acontece? Com que frequência?<br>
                                <div class="b-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->sono_tranquilo_se_for_agitado_quando_e_qual_frequencia}}</label></label>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <label class="lbinfo-static">Dorme com alguém? Com quem?<br>
                                <div class="b-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->dorme_so_se_nao_com_quem_dorme}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Ranger de dentes:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->audicao_e_visao}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Terror noturno:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->audicao_e_visao}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static"Sonambulismo:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->audicao_e_visao}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Enurese:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->audicao_e_visao}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Fala dormindo:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->audicao_e_visao}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Hábitos especiais:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->audicao_e_visao}}</label></label>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Desenvolvimento psicomotor</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Idade que sustentou a cabeça:<br><label class="lbinfo-ntstatic">{{$anamnese->com_que_idade_sustentou_a_cabeca}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Idade que se sentou:<br><label class="lbinfo-ntstatic">{{$anamnese->com_que_idade_sentou}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Idade que engatinhou:<br><label class="lbinfo-ntstatic">{{$anamnese->com_que_idade_engatinhou}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Forma de engatinhar:<br><label class="lbinfo-ntstatic">{{$anamnese->forma_de_engatinhar}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Idade que começou a andar:<br><label class="lbinfo-ntstatic">{{$anamnese->com_que_idade_comecou_a_andar}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Caia muito enquanto aprendia a andar?<br><label class="lbinfo-ntstatic">{{$anamnese->caia_muito}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Deixa cair as coisas?<br><label class="lbinfo-ntstatic">{{$anamnese->deixa_cair_as_coisas}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Esbarra muito?<br><label class="lbinfo-ntstatic">{{$anamnese->esbarra_muito}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Acredita que tem algum problema motor?<br><label class="lbinfo-ntstatic">{{$anamnese->acredita_que_apresenta_alguma_dificuldade_motora}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Controle dos esfíncteres</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-static">Controle vesical (bexiga):<br><label class="lbinfo-ntstatic">{{$anamnese->controle_vesical_bexiga}}</label></label>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-static">Controle anal (fezes):<br><label class="lbinfo-ntstatic">{{$anamnese->controle_anal_fezes}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Foi difícil, Tranquilo, houve alguma pressão da família?<br>
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
                            <label class="lbinfo-static">Época que começou a balbuciar:<br><label class="lbinfo-ntstatic">{{$anamnese->balbucios}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-static">Época que começou a falar:<br><label class="lbinfo-ntstatic">{{$anamnese->quando_comecou_a_falar}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-static">Demorou? Como os pais reagiram a fala?<br><label class="lbinfo-ntstatic">{{$anamnese->como_os_pais_reagiram_fala}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-static">Problemas que apresentou na fala:<br><label class="lbinfo-ntstatic">{{$anamnese->apresentou_problema_na_fala_se_sim_quais}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="lbinfo-static">Compreensão de ordens:<br><label class="lbinfo-ntstatic">{{$anamnese->compreende_ordens}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-static">Bilinguismo em casa:<br><label class="lbinfo-ntstatic">{{$anamnese->presenca_de_bilinguismo_em_casa}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-static">Como a criança se comunica?<br><label class="lbinfo-ntstatic">{{$anamnese->como_a_crianca_se_comunica}}</label></label>
                        </div>

                        <div class="col-md-3">
                            <label class="lbinfo-static">Apresenta salivação no canto da boca?<br><label class="lbinfo-ntstatic">{{$anamnese->apresenta_salivacao_no_canto_da_boca}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Escolaridade</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Idade que entrou na escola:<br><label class="lbinfo-ntstatic">{{$anamnese->idade_entrou_na_escola}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Se adaptou bem na escola:<br><label class="lbinfo-ntstatic">{{$anamnese->adaptouse_bem}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Método de alfabetização:<br><label class="lbinfo-ntstatic">{{$anamnese->metodo_alfabetizacao}}</label></label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Mudou-se de escola, em que série e qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->mudou_de_escola_se_sim_em_qual_serie_e_idade}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Escola atual:<br><label class="lbinfo-ntstatic">{{$anamnese->escola_atual}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Método de alfabetização atual:<br><label class="lbinfo-ntstatic">{{$anamnese->metodo_alfabetizacao_atual}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Série e turno:<br><label class="lbinfo-ntstatic">{{$anamnese->serie_e_turno}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Professor(a):<br><label class="lbinfo-ntstatic">{{$anamnese->professor}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Com quem faz as tarefas?<br><label class="lbinfo-ntstatic">{{$anamnese->faz_as_tarefaz_sozinho_se_nao_com_quem_faz}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Como é o momento das lições? Tem horário? Rotina?<br><label class="lbinfo-ntstatic">{{$anamnese->descricao_momento_licoes}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Como é a escola na opinião dos pais?<br><label class="lbinfo-ntstatic">{{$anamnese->opniao_dos_pais_sobre_escola}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Opinião sobre tarefas das escolas:<br><label class="lbinfo-ntstatic">{{$anamnese->opniao_dos_pais_sobre_tarefas}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Fatos importantes da vida escolar:<br><label class="lbinfo-ntstatic">{{$anamnese->fato_importante_vida_escolar}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Tem tique? Quais?<br><label class="lbinfo-ntstatic">{{$anamnese->apresenta_tiques_se_sim_quais}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Como pega no lápis?<br><label class="lbinfo-ntstatic">{{$anamnese->como_pegua_o_lapis}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-static">Força da escrita:<br><label class="lbinfo-ntstatic">{{$anamnese->forca_da_escrita}}</label></label>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-static">Repetiu de ano? Quando e porque?<br><label class="lbinfo-ntstatic">{{$anamnese->repetiu_ano_se_sim_qual_e_porque}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Queixas frequentes sobre a escola:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->queixas_frequentes}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Dificuldades<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->tem_dificuldades_para}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Conhece<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->conhece_tais_coisas}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Como vocês acham que começou o problema? A que fatores atribuem?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->como_acha_que_surgiu_o_problema_a_que_fatores_atribuem}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Outras questões<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->outras_questoes}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Quais escolas frequentou e quando as frequentou?<br>
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
                            <label class="lbinfo-static">Humor habitual:<br><label class="lbinfo-ntstatic">{{$anamnese->humor_habitual}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Prefere brincar sozinho ou em grupo?<br><label class="lbinfo-ntstatic">{{$anamnese->prefere_brincar_sozinho_ou_em_grupos}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Estranha mudanças de ambiente?<br><label class="lbinfo-ntstatic">{{$anamnese->estranha_mudancas_de_ambiente}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Adapta-se facilmente ao meio?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->adaptase_facilmente_ao_meio == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Tem horários?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->tem_horarios == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">É lider?<br><label class="lbinfo-ntstatic">
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
                            <label class="lbinfo-static">Aceita bem ordens?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->aceita_bem_ordens == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Faz birras?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->faz_birras == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Chora com frequência?<br><label class="lbinfo-ntstatic">
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
                            <label class="lbinfo-static">Esportes que pratica:<br><label class="lbinfo-ntstatic">{{$anamnese->pratica_esportes_se_sim_quais}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Agressivo, apático ou teimoso?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->apresenta_agressividade_apatia_ou_teimosia == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Medos que apresenta:<br><label class="lbinfo-ntstatic">{{$anamnese->tem_algum_medo_se_sim_quais}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Brincadeiras de brinquedos favoritos:<br><label class="lbinfo-ntstatic">{{$anamnese->quais_as_brincadeiras_e_brinquedos_favoritos}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Quem cuidava da criança até os três anos?<br><label class="lbinfo-ntstatic">{{$anamnese->quem_cuidava_da_criança_ate_os_tres_anos}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Quem cuidou da criança depois dos três anos?<br><label class="lbinfo-ntstatic">{{$anamnese->quem_cuida_posteriormente}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Como a criança se comporta sozinha?<br><label class="lbinfo-ntstatic">{{$anamnese->como_a_crianca_se_comporta_sozinha}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Como a criança se comporta em família?<br><label class="lbinfo-ntstatic">{{$anamnese->como_a_crianca_se_comporta_em_familia}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Como a criança se comporta com outras pessoas?<br><label class="lbinfo-ntstatic">{{$anamnese->como_a_crianca_se_comporta_com_outras_pessoas}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Com quem a criança gosta de ficar? Por quê?<br><label class="lbinfo-ntstatic">{{$anamnese->com_quem_ele_mais_gosta_de_ficar_e_por_que}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Em que momento a criança se encontra com a família?<br><label class="lbinfo-ntstatic">{{$anamnese->em_que_momento_a_crianca_encontra_a_familia}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Já houve conflitos familiares? A criança presenciou ou presencia?<br><label class="lbinfo-ntstatic">{{$anamnese->ja_houve_conflitos_familiares_e_a_crianca_presencia}}</label></label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Assiste TV em demasia? Quais programas favoritos?<br><label class="lbinfo-ntstatic">{{$anamnese->assiste_tv_em_demasia}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Como se relaciona com colegas e professores?<br><label class="lbinfo-ntstatic">{{$anamnese->como_se_relaciona_com_colegas_e_professores}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Como se relaciona com irmãos?<br><label class="lbinfo-ntstatic">{{$anamnese->como_se_relaciona_com_irmaos}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Quais programas de tv favoritos?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->quais_programas_favoritos}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">De que forma é punida?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->de_que_forma_e_punido}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Que tipos de perdas já enfrentou? Com que idade?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->que_tipos_de_perdas_ja_enfrentou_e_em_que_idade}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">De que forma o pai e a mãe se relacionam com a criança?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->de_que_forma_o_pai_e_a_mae_se_relacionam_com_a_crianca}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Em que horário brincam ou fazem alguma atividade de lazer?<br>
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
                            <label class="lbinfo-static">Apresenta curiosidade sexual? Quando começou?<br><label class="lbinfo-ntstatic">{{$anamnese->apresenta_curiosidade_sexual_se_sim_quando_comecou}}</label></label>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-static">Tipos de perguntas:<br><label class="lbinfo-ntstatic">{{$anamnese->tipos_de_perguntas_fase_sexual}}</label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-static">Fase de masturbaçã:<br><label class="lbinfo-ntstatic">{{$anamnese->fase_de_masturbacao}}</label></label>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-static">Atitude da família:<br><label class="lbinfo-ntstatic">{{$anamnese->atitude_da_família}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Independência</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Se veste só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->se_veste_so_a_partir_de_qual_idade}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Começou a abotoar só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->se_abotoa_so_a_partir_de_qual_idade}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Começou a fechar roupa só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->fecha_roupa_so_a_partir_de_qual_idade}}</label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Começou a tomar banho só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->toma_banho_so_a_partir_de_qual_idade}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Começou a se pentear só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->se_penteia_so_a_partir_de_qual_idade}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Começou a amarrar cadarços só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->se_amarra_so_a_partir_de_qual_idade}}</label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Começou a escovar os dentes só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->escova_os_dentes_so_a_partir_de_qual_idade}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Começou a comer só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->come_so_a_partir_de_qual_idade}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Começou a se calçar só a partir de qual idade?<br><label class="lbinfo-ntstatic">{{$anamnese->se_calca_so_a_partir_de_qual_idade}}</label></label>
                        </div>
                    </div>
                </div>

                <div class="info-escolaridade">
                    <h3 class="marker-label">Hábitos</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Rói unhas?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->roi_unhas == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Tiques nervosos:<br><label class="lbinfo-ntstatic">{{$anamnese->tem_tiques_nervosos_se_sim_quais}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Mania repetitiva (TOC):<br><label class="lbinfo-ntstatic">{{$anamnese->alguma_mania_repetitiva_se_sim_qual}}</label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Tem ou tinha algum objeto como cheirinho ou outro para dormir, levar para escola?<br><label class="lbinfo-ntstatic">{{$anamnese->temObjetoComoCheirinhoOuOutroParaDormirLevarParaEscolaSeSimQual}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Chupa dedo ou bico?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->chupa_dedo_ou_bico == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Tem movimentos rítmicos?<br><label class="lbinfo-ntstatic">
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
                            <label class="lbinfo-static">Outros?<br>
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
                            <label class="lbinfo-static">Como a família vê o problema??<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->como_a_familia_ve_o_problema}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Como o casal age em função da criança??<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->como_o_casal_age_em_funcao_da_crianca}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Como os pais se veem: permissivos, autoritários, equilibrados??<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->comoOsPaisSeVeemPermissivosAutoritariosEquilibradosEPorque}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Como são colocados os limites para a criança no seu cotidiano??<br>
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
                            <label class="lbinfo-static">Situação econômica?<br><label class="lbinfo-ntstatic">{{$anamnese->situacao_economica}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Situação cultural?<br><label class="lbinfo-ntstatic">{{$anamnese->situacao_cultural}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Hábitos de lazer?<br><label class="lbinfo-ntstatic">{{$anamnese->habitos_de_lazer}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Vai ao cinema ver o que e com que frequência?<br><label class="lbinfo-ntstatic">{{$anamnese->vai_ao_cinema_e_com_que_frequencia}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Vai ao cinema ver o que e com que frequência?<br><label class="lbinfo-ntstatic">{{$anamnese->vai_ao_cinema_e_com_que_frequencia}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Estímulos culturais:<br><label class="lbinfo-ntstatic">{{$anamnese->estimulo_cultural_se_sim_quais}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Lê quais livros e com que frequência?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->le_quais_livros_com_que_frequência}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Constância de diálogos?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->constancia_de_dialogos}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Quais refeições fazem juntos??<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->fazem_refeicoes_juntos_se_sim_quais}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Algum vício na família? (drogas, alcoolismo)?<br>
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
                            <label class="lbinfo-static">Com que frequência manipula brinquedos e objetos?<br><label class="lbinfo-ntstatic">{{$anamnese->com_que_frequencia_manipula_brinquedos_e_objetos}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Imita algum gesto e/ou expressão facial de emoção de familiares e pessoas próximas?<br><label class="lbinfo-ntstatic">{{$anamnese->imitaAlgumGestoDeEmocaoFamiliaresPessoasProximasSeSimQuais}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Imita algum som específico?<br><label class="lbinfo-ntstatic">{{$anamnese->imita_algum_som_especifico_se_sim_quais}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-static">Mostra-se sonolento? Com qual frequência?<br><label class="lbinfo-ntstatic">{{$anamnese->mostrase_sonolento_se_sim_com_qual_frequencia}}</label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Quando estimulado, consegue relembrar de situações vivenciadas?<br><label class="lbinfo-ntstatic">
                                @if($anamnese->quando_estimulado_consegue_relembrar_de_situacoes_vivenciadas == 1)
                                Sim
                                @else
                                Não
                                @endif
                            </label></label>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Com que frequência ignora estímulos?<br><label class="lbinfo-ntstatic">{{$anamnese->com_que_frequencia_ignora_estimulos}}</label></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-static">Como é o contato visual?<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->estabelece_contato_visual_se_sim_em_quais_situacoes}}</label></label>
                                </div>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-static">Ansiedade em processos de mudança de rotina? Algum exemplo?<br>
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
                            <label class="lbinfo-static">Análise da entrevista:<br>
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$anamnese->analise_da_entrevista}}</label></label>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="lbinfo-static">Encaminhamentos<br>
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

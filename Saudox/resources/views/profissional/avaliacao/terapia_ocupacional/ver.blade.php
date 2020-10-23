
@extends('layouts.mainlayout')
@section('content')


    <div class="container">
        <div class="row bordas_amarelas bg-padrao">
            <div class="col-md">


                <h1 class="pessoal">Avaliação de Terapia Ocupacional de {{$paciente->nome_paciente}}</h1>
                @if(Auth::guard('profissional')->check())
                    <h3 class="pessoal"> <a href="{{ route('profissional.avaliacao.terapia_ocupacional.editar', $paciente->id) }}">Editar</a> </h3>
                @endif

                <br>
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
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Data da avaliação:<br><label class="lbinfo-ntstatic">{{$avaliacao->data_avaliacao}}</label></label>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Entrevistado:<br><label class="lbinfo-ntstatic">{{$avaliacao->entrevistado}}</label></label>
                        </div>
                        <br>
                        <div class="col-md-12">
                                <label class="lbinfo-perfis">Queixa Principal:<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->queixa_principal}}</label>
                                    </div>
                                </label>
                        </div>

                    </div>

                </div>

                <div>
                    <br>
                    <br>
                    <h3 class="marker-label">Brincar</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Brincadeiras favoritas:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->brincadeiras_favoritas}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-perfis">O que faz rir e sorrir?
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->o_que_faz_rir}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-perfis">Postura ao brincar:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->postura_crianca_quando_brinca}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-perfis">Reação as orientações dos pais:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->como_reage_a_orientacao_dos_pais}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-perfis">Áreas de maior dificuldade:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->areas_maior_dificuldade}}</label>
                            </div>
                            </label><br>

                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Brincadeiras evitadas:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->brincadeiras_evitadas}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-perfis">Onde brinca:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->onde_brinca}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-perfis">Reacao à raiva/frustração:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->reacao_ao_ser_frustrada_ou_raiva}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-perfis">Reação à abraços/carinho:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->reacao_a_abracos_carinhos}}</label>
                            </div>
                            </label><br>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Com quem prefere brincar?
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->com_quem_prefere_brincar}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-perfis">Precisa de atenção ao brincar?
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->brinca_sozinho_ou_precisa_de_atencao}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-perfis">Quem geralmente disciplina a criança?
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->quem_disciplina_a_crianca}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-perfis">Àreas de maior habilidade:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->areas_maior_habilidade}}</label>
                            </div>
                            </label><br>
                        </div>

                    </div>

                </div>

                <div>
                    <br>
                    <br>
                    <h3 class="marker-label">Hórario de:</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Levantar:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->hora_de_levantar}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-perfis">Almoço:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->hora_almoco}}</label>
                            </div>
                            </label><br>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Café da manhã:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->hora_cafe_da_manha}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-perfis">Janta:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->hora_janta}}</label>
                            </div>
                            </label><br>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Escola:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->hora_da_escola}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-perfis">Dormir:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->hora_dormir}}</label>
                            </div>
                            </label><br>
                        </div>

                    </div>

                </div>

                <div>
                    <br>
                    <br>
                    <h3 class="marker-label">Sono</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Dorme durante o dia?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->dorme_durante_dia == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-perfis">Tem pesadelos?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->pesadelos == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Dorme com facilidade?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->dorme_com_facilidade == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-perfis">Sonambulismo?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->sonambulismo == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                        </div>
                        <br>
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Tem sono tranquilo?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->sono_tranqulo == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-perfis">Rola/balança a cabeça?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->rola_balanca_cabeca_enquanto_dorme == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                            </label></label>
                            <br>
                        </div>
                        <br>
                        <div class="col-md-12">
                                <label class="lbinfo-perfis">Acorda à noite?<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->acorda_noite}}</label>
                                    </div>
                                </label>
                        </div>

                    </div>

                </div>

                <div>
                    <br>
                    <br>
                    <h3 class="marker-label">Alimentação</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Come com os dedos?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->come_com_os_dedos == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-perfis">Derrama a comida?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->derrama_comida == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-perfis">Usa canudo?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->usa_canudo == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-perfis">Tem bom apetite?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->tem_bom_apetite == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Como com talheres?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->come_com_talheres == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-perfis">Usa qual mão para comer?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->come_com_os_dedos == 0)
                                        Esquerda
                                        @else
                                        Direita
                                        @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-perfis">Ajuda a colocar a mesa?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->ajuda_a_colocar_a_mesa == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Brinca com a comida?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->brinca_com_comida == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-perfis">Bebe em garrafa, copo?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->bebe_em_garrafa == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-perfis">Teve dificuldades de passar de pastoso para sólido?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->houve_dificuldade_transicao_pastoso_solido == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                            </label></label>
                            <br>

                        </div>
                        <div class="col-md-12">
                                <label class="lbinfo-perfis">Segura o copo ou garrafa com uma mão? ou com as duas mãos?<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->segura_copo_garrafa_com_uma_ou_duas_maos}}</label>
                                    </div>
                                </label>
                        </div>
                        <div class="col-md-12">
                                <label class="lbinfo-perfis">Qual o tipo de alimentação usada?<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->tipo_alimentacao}}</label>
                                    </div>
                                </label>
                        </div>
                        <div class="col-md-12">
                                <label class="lbinfo-perfis">O que mais gosta de comer?<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->o_que_gosta_de_comer}}</label>
                                    </div>
                                </label>
                        </div>
                        <div class="col-md-12">
                                <label class="lbinfo-perfis">O que não gosta de comer?<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->nao_gosta_de_comer}}</label>
                                    </div>
                                </label>
                        </div>

                    </div>

                </div>

                <div>
                    <br>
                    <br>
                    <h3 class="marker-label">Vestuários</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Já abotoa?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->abotoa == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                                </label></label>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-perfis">Amarra?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->amarra == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                                </label></label>
                        </div>
                        <div class="col-md-12">
                                <label class="lbinfo-perfis">Gosta de vestir roupas?<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->gosta_de_vestir_roupa}}</label>
                                    </div>
                                </label>
                        </div>
                        <div class="col-md-12">
                                <label class="lbinfo-perfis">Veste roupa sozinho? Quais?<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->veste_roupa_sozinho_quais_pecas}}</label>
                                    </div>
                                </label>
                        </div>
                        <div class="col-md-12">
                                <label class="lbinfo-perfis">Tira a roupa sozinho? Quais?<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->tira_roupa_sozinho_quais_pecas}}</label>
                                    </div>
                                </label>
                        </div>

                    </div>

                </div>

                <div>
                    <br>
                    <br>
                    <h3 class="marker-label">Higiene</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Usa fraldas?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->usa_fralda == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-perfis">Escova os dentes?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->escova_dentes == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-perfis">Enxuga-se?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->enxuga_se == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-perfis">Gosta de cortar as unhas?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->gosta_cortar_unhas == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Usa o vaso sanitário?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->usa_vaso_sanitario == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-perfis">Se diverte com o banho?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->se_diverte_com_o_banho == 0)
                                        Esquerda
                                        @else
                                        Direita
                                        @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-perfis">Gosta de pentear os cabelos?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->gosta_pentear_cabelos == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-perfis">Lava as mãos, face e corpo?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->lava_maos_face_corpo == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-perfis">Gosta de molhar a cabeça?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->gosta_molhar_cabeca == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-perfis">Gosta de cortar os cabelos?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->gosta_cortar_cabelos == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                            </label></label>
                            <br>

                        </div>

                    </div>

                </div>

                <div>
                    <br>
                    <br>
                    <h3 class="marker-label">Outras informações importantes:</h3>
                    <div class="col-md-12">
                            <label class="lbinfo-perfis">
                                <div class="c-wrapper">
                                    <label class="lbinfo-ntstatic">{{$avaliacao->info_extras_relevante}}</label>
                                </div>
                            </label>
                    </div>
                    <br>
                    <br>

                </div>



            </div>
        </div>
    </div>

@endsection

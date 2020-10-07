
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
                <div>
                    <h3 class="marker-label">Informações Iniciais</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="lbinfo-static">Data da avaliação:<br><label class="lbinfo-ntstatic">{{$avaliacao->data_avaliacao}}</label></label>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-static">Entrevistado:<br><label class="lbinfo-ntstatic">{{$avaliacao->entrevistado}}</label></label>
                        </div>
                        <br>
                        <div class="col-md-12">
                                <label class="lbinfo-static">Queixa Principal:<br>
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
                            <label class="lbinfo-static">Brincadeiras favoritas:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->brincadeiras_favoritas}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-static">O que faz rir e sorrir?
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->o_que_faz_rir}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-static">Postura ao brincar:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->postura_crianca_quando_brinca}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-static">Reação as orientações dos pais:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->como_reage_a_orientacao_dos_pais}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-static">Áreas de maior dificuldade:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->areas_maior_dificuldade}}</label>
                            </div>
                            </label><br>

                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Brincadeiras evitadas:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->brincadeiras_evitadas}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-static">Onde brinca:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->onde_brinca}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-static">Reacao à raiva/frustração:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->reacao_ao_ser_frustrada_ou_raiva}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-static">Reação à abraços/carinho:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->reacao_a_abracos_carinhos}}</label>
                            </div>
                            </label><br>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Com quem prefere brincar?
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->com_quem_prefere_brincar}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-static">Precisa de atenção ao brincar?
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->brinca_sozinho_ou_precisa_de_atencao}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-static">Quem geralmente disciplina a criança?
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->quem_disciplina_a_crianca}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-static">Àreas de maior habilidade:
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
                            <label class="lbinfo-static">Levantar:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->hora_de_levantar}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-static">Almoço:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->hora_almoco}}</label>
                            </div>
                            </label><br>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Café da manhã:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->hora_cafe_da_manha}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-static">Janta:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->hora_janta}}</label>
                            </div>
                            </label><br>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Escola:
                            <div class="d-wrapper">
                                <label class="lbinfo-ntstatic">{{$avaliacao->hora_da_escola}}</label>
                            </div>
                            </label><br>
                            <label class="lbinfo-static">Dormir:
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
                            <label class="lbinfo-static">Dorme durante o dia?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->dorme_durante_dia == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-static">Tem pesadelos?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->pesadelos == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Dorme com facilidade?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->dorme_com_facilidade == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-static">Sonambulismo?<br><label class="lbinfo-ntstatic">
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
                            <label class="lbinfo-static">Tem sono tranquilo?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->sono_tranqulo == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-static">Rola/balança a cabeça?<br><label class="lbinfo-ntstatic">
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
                                <label class="lbinfo-static">Acorda à noite?<br>
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
                            <label class="lbinfo-static">Come com os dedos?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->come_com_os_dedos == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-static">Derrama a comida?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->derrama_comida == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-static">Usa canudo?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->usa_canudo == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-static">Tem bom apetite?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->tem_bom_apetite == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Como com talheres?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->come_com_talheres == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-static">Usa qual mão para comer?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->come_com_os_dedos == 0)
                                        Esquerda
                                        @else
                                        Direita
                                        @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-static">Ajuda a colocar a mesa?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->ajuda_a_colocar_a_mesa == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Brinca com a comida?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->brinca_com_comida == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-static">Bebe em garrafa, copo?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->bebe_em_garrafa == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-static">Teve dificuldades de passar de pastoso para sólido?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->houve_dificuldade_transicao_pastoso_solido == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                            </label></label>
                            <br>

                        </div>
                        <div class="col-md-12">
                                <label class="lbinfo-static">Segura o copo ou garrafa com uma mão? ou com as duas mãos?<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->segura_copo_garrafa_com_uma_ou_duas_maos}}</label>
                                    </div>
                                </label>
                        </div>
                        <div class="col-md-12">
                                <label class="lbinfo-static">Qual o tipo de alimentação usada?<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->tipo_alimentacao}}</label>
                                    </div>
                                </label>
                        </div>
                        <div class="col-md-12">
                                <label class="lbinfo-static">O que mais gosta de comer?<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->o_que_gosta_de_comer}}</label>
                                    </div>
                                </label>
                        </div>
                        <div class="col-md-12">
                                <label class="lbinfo-static">O que não gosta de comer?<br>
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
                            <label class="lbinfo-static">Já abotoa?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->abotoa == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                                </label></label>
                        </div>

                        <div class="col-md-6">
                            <label class="lbinfo-static">Amarra?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->amarra == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                                </label></label>
                        </div>
                        <div class="col-md-12">
                                <label class="lbinfo-static">Gosta de vestir roupas?<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->gosta_de_vestir_roupa}}</label>
                                    </div>
                                </label>
                        </div>
                        <div class="col-md-12">
                                <label class="lbinfo-static">Veste roupa sozinho? Quais?<br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->veste_roupa_sozinho_quais_pecas}}</label>
                                    </div>
                                </label>
                        </div>
                        <div class="col-md-12">
                                <label class="lbinfo-static">Tira a roupa sozinho? Quais?<br>
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
                            <label class="lbinfo-static">Usa fraldas?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->usa_fralda == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-static">Escova os dentes?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->escova_dentes == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-static">Enxuga-se?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->enxuga_se == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-static">Gosta de cortar as unhas?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->gosta_cortar_unhas == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Usa o vaso sanitário?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->usa_vaso_sanitario == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-static">Se diverte com o banho?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->se_diverte_com_o_banho == 0)
                                        Esquerda
                                        @else
                                        Direita
                                        @endif
                                </label></label>
                                <br>
                                <label class="lbinfo-static">Gosta de pentear os cabelos?<br><label class="lbinfo-ntstatic">
                                    @if($avaliacao->gosta_pentear_cabelos == 0)
                                        Não
                                        @else
                                        Sim
                                        @endif
                                </label></label>
                                <br>
                        </div>

                        <div class="col-md-4">
                            <label class="lbinfo-static">Lava as mãos, face e corpo?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->lava_maos_face_corpo == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-static">Gosta de molhar a cabeça?<br><label class="lbinfo-ntstatic">
                                @if($avaliacao->gosta_molhar_cabeca == 0)
                                    Não
                                    @else
                                    Sim
                                    @endif
                            </label></label>
                            <br>
                            <label class="lbinfo-static">Gosta de cortar os cabelos?<br><label class="lbinfo-ntstatic">
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
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                                <label class="lbinfo-static"><br>
                                    <div class="c-wrapper">
                                        <label class="lbinfo-ntstatic">{{$avaliacao->info_extras_relevante}}</label>
                                    </div>
                                </label>
                        </div>

                    </div>

                </div>



            </div>
        </div>
    </div>

@endsection

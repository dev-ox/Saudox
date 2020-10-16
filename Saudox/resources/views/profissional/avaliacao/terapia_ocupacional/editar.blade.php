@extends('layouts.mainlayout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="espacador_mesma_altura_top_nav"></div>
            <div style="text-align: center; width: 100%;">
                <div class = "caixa_form">
                    <br>
                    <h1>Editr Avaliação de Terapia Ocupacional de {{$paciente->nome_paciente}}</h1>

                    <form method="post" action="{{route('profissional.avaliacao.terapia_ocupacional.editar.salvar')}}">
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


                        <h2 style="margin: auto; color: var(--cor_amarelo)">Avaliação Geral</h2>
                        <input value="{{$avaliacao->id}}" type="hidden"  name="id_avaliacao" id="id_avaliacao">
                        <input value="{{$paciente->id}}" type="hidden"  name="id_paciente" id="id_paciente">
                        <input value="{{Auth::id()}}" type="hidden"  name="id_profissional" id="id_profissional">

                        <hr class="hr_form">
                        <h3>Informações Iniciais</h3>

                        <label class="required">Entrevistado:</label><br>
                        <input value="{{ g_old($avaliacao, "entrevistado") }}" placeholder="Entrevistado" type="text" name="entrevistado" id="entrevistado">

                        <label class="required">Queixa Principal:</label><br>
                        <input value="{{ g_old($avaliacao, "queixa_principal")}}" placeholder="Queixa" type="text" name="queixa_principal" id="posicao_bloco_familiar">

                        <hr class="hr_form">
                        <h3>Brincar</h3>
                        <br>
                        <br>

                        <label class="required">Quais as brincadeiras favoritas de sua criança?</label><br>
                        <label>(Brinquedos, Animais, Materiais e outros)</label><br><br>
                        <textarea class="textareas_form" id="brincadeiras_favoritas" name="brincadeiras_favoritas" rows="4" cols="50" style="">{{ g_old($avaliacao, "brincadeiras_favoritas") }}</textarea><br><br>

                        <label class="required">Onde sua criança brinca?</label><br>
                        <label>(Em casa, Na comunidade – parque, escola,...)</label><br><br>
                        <textarea class="textareas_form" id="onde_brinca" name="onde_brinca" rows="4" cols="50" style="">{{ g_old($avaliacao, "onde_brinca") }}</textarea><br><br>

                        <label class="required">Com quem sua criança prefere brincar?</label><br><br>
                        <textarea class="textareas_form" id="com_quem_prefere_brincar" name="com_quem_prefere_brincar" rows="4" cols="50" style="">{{ g_old($avaliacao, "com_quem_prefere_brincar") }}</textarea><br><br>

                        <label class="required">O que faz sua criança sorrir e dar gargalhada?</label><br><br>
                        <textarea class="textareas_form" id="o_que_faz_rir" name="o_que_faz_rir" rows="4" cols="50" style="">{{ g_old($avaliacao, "o_que_faz_rir") }}</textarea><br><br>

                        <label class="required">Que tipo de brincadeira é evitada?</label><br><br>
                        <textarea class="textareas_form" id="brincadeiras_evitadas" name="brincadeiras_evitadas" rows="4" cols="50" style="">{{ g_old($avaliacao, "brincadeiras_evitadas") }}</textarea><br><br>

                        <label class="required">Você tem que dar muita atenção à criança quando ela brinca ou ela brinca sozinha?</label><br><br>
                        <textarea class="textareas_form" id="brinca_sozinho_ou_precisa_de_atencao" name="brinca_sozinho_ou_precisa_de_atencao" rows="4" cols="50" style="">{{ g_old($avaliacao, "brinca_sozinho_ou_precisa_de_atencao") }}</textarea><br><br>

                        <label class="required">Qual a postura mais frequente quando sua criança está brincando?</label><br><br>
                        <textarea class="textareas_form" id="postura_crianca_quando_brinca" name="postura_crianca_quando_brinca" rows="4" cols="50" style="">{{ g_old($avaliacao, "postura_crianca_quando_brinca") }}</textarea><br><br>

                        <label class="required">O que sua criança faz quando está com raiva ou frustrada?</label><br><br>
                        <textarea class="textareas_form" id="reacao_ao_ser_frustrada_ou_raiva" name="reacao_ao_ser_frustrada_ou_raiva" rows="4" cols="50" style="">{{ g_old($avaliacao, "reacao_ao_ser_frustrada_ou_raiva") }}</textarea><br><br>

                        <label class="required">Quem geralmente disciplina a criança?</label><br><br>
                        <textarea class="textareas_form" id="quem_disciplina_a_crianca" name="quem_disciplina_a_crianca" rows="4" cols="50" style="">{{ g_old($avaliacao, "quem_disciplina_a_crianca") }}</textarea><br><br>

                        <label class="required">Como a criança reage às orientações dos pais?</label><br><br>
                        <textarea class="textareas_form" id="como_reage_a_orientacao_dos_pais" name="como_reage_a_orientacao_dos_pais" rows="4" cols="50" style="">{{ g_old($avaliacao, "como_reage_a_orientacao_dos_pais") }}</textarea><br><br>

                        <label class="required">Como reage à abraços e carinho?</label><br><br>
                        <textarea class="textareas_form" id="reacao_a_abracos_carinhos" name="reacao_a_abracos_carinhos" rows="4" cols="50" style="">{{ g_old($avaliacao, "reacao_a_abracos_carinhos") }}</textarea><br><br>

                        <label class="required">Áreas de maior habilidade?</label><br><br>
                        <textarea class="textareas_form" id="areas_maior_habilidade" name="areas_maior_habilidade" rows="4" cols="50" style="">{{ g_old($avaliacao, "areas_maior_habilidade") }}</textarea><br><br>

                        <label class="required">Áreas de maior dificuldade?</label><br><br>
                        <textarea class="textareas_form" id="areas_maior_dificuldade" name="areas_maior_dificuldade" rows="4" cols="50" style="">{{ g_old($avaliacao, "areas_maior_dificuldade") }}</textarea><br><br>

                        <hr class="hr_form">
                        <h3>Rotina Diária</h3><br>

                        <h4>Horário de:</h4>
                        <label class="required">Levantar:</label><br>
                        <input value="{{ g_old($avaliacao, "hora_de_levantar") }}" placeholder="Ex:. Ao amanhecer, ás 6:00 h" type="text" name="hora_de_levantar" id="hora_de_levantar">

                        <label class="required">Café da manhã:</label><br>
                        <input value="{{ g_old($avaliacao, "hora_cafe_da_manha") }}" placeholder="Ex:. Após escola, ao 12:00 h" type="text" name="hora_cafe_da_manha" id="hora_cafe_da_manha">

                        <label class="required">Escola:</label><br>
                        <input value="{{ g_old($avaliacao, "hora_da_escola") }}" placeholder="Ex:. Após almoço, ao 12:00 h" type="text" name="hora_da_escola" id="hora_da_escola">

                        <label class="required">Almoço:</label><br>
                        <input value="{{ g_old($avaliacao, "hora_almoco") }}" placeholder="Ex:. Após escola, ao 12:00 h" type="text" name="hora_almoco" id="hora_almoco">

                        <label class="required">Janta:</label><br>
                        <input value="{{ g_old($avaliacao, "hora_janta") }}" placeholder="Ex:. Após escola, ás 20:00 h" type="text" name="hora_janta" id="hora_janta">

                        <label class="required">Dormir:</label><br>
                        <input value="{{ g_old($avaliacao, "hora_dormir") }}" placeholder="Ex:. Após janta, ás 22:00 h" type="text" name="hora_dormir" id="hora_dormir">

                        <hr class="hr_form">
                        <h3>Sono</h3><br>

                        <label class="required">A criança dorme durante o dia?:</label><br>
                        <label for="dorme_durante_dia">Sim</label>
                        <input value="1" type="radio" name="dorme_durante_dia" id="dorme_durante_dia" {{ g_old_checked($avaliacao, "dorme_durante_dia", "1") }}>
                        <label for="dorme_durante_dia">Não</label>
                        <input value="0" type="radio" name="dorme_durante_dia" id="dorme_durante_dia" {{ g_old_checked($avaliacao, "dorme_durante_dia", "0") }}><br>

                        <label class="required">Dorme com facilidade?</label><br>
                        <label for="dorme_com_facilidade">Sim</label>
                        <input value="1" type="radio" name="dorme_com_facilidade" id="dorme_com_facilidade" {{ g_old_checked($avaliacao, "dorme_com_facilidade", "1") }}>
                        <label for="dorme_com_facilidade">Não</label>
                        <input value="0" type="radio" name="dorme_com_facilidade" id="dorme_com_facilidade" {{ g_old_checked($avaliacao, "dorme_com_facilidade", "0") }}><br>

                        <label class="required">Tem sono tranquilo?</label><br>
                        <label for="sono_tranqulo">Sim</label>
                        <input value="1" type="radio" name="sono_tranqulo" id="sono_tranqulo" {{ g_old_checked($avaliacao, "sono_tranqulo", "1") }}>
                        <label for="sono_tranqulo">Não</label>
                        <input value="0" type="radio" name="sono_tranqulo" id="sono_tranqulo" {{ g_old_checked($avaliacao, "sono_tranqulo", "0") }}><br>

                        <label class="required">Acorda à noite?</label><br>
                        <input value="{{ g_old($avaliacao, "acorda_noite") }}" placeholder="Acorda durante a noite? Quando? Quantas vezes?" type="text" name="acorda_noite" id="acorda_noite">

                        <label class="required">Tem pesadelos?</label><br>
                        <label for="pesadelos">Sim</label>
                        <input value="1" type="radio" name="pesadelos" id="pesadelos" {{ g_old_checked($avaliacao, "pesadelos", "1") }}>
                        <label for="pesadelos">Não</label>
                        <input value="0" type="radio" name="pesadelos" id="pesadelos" {{ g_old_checked($avaliacao, "pesadelos", "0") }}><br>

                        <label class="required">Sonambulismo?</label><br>
                        <label for="sonambulismo">Sim</label>
                        <input value="1" type="radio" name="sonambulismo" id="sonambulismo" {{ g_old_checked($avaliacao, "sonambulismo", "1") }}>
                        <label for="sonambulismo">Não</label>
                        <input value="0" type="radio" name="sonambulismo" id="sonambulismo" {{ g_old_checked($avaliacao, "sonambulismo", "0") }}><br>

                        <label class="required">Rola/balança a cabeça?</label><br>
                        <label for="rola_balanca_cabeca_enquanto_dorme">Sim</label>
                        <input value="1" type="radio" name="rola_balanca_cabeca_enquanto_dorme" id="rola_balanca_cabeca_enquanto_dorme" {{ g_old_checked($avaliacao, "rola_balanca_cabeca_enquanto_dorme", "1") }}>
                        <label for="rola_balanca_cabeca_enquanto_dorme">Não</label>
                        <input value="0" type="radio" name="rola_balanca_cabeca_enquanto_dorme" id="rola_balanca_cabeca_enquanto_dorme" {{ g_old_checked($avaliacao, "rola_balanca_cabeca_enquanto_dorme", "0") }}><br>

                        <hr class="hr_form">
                        <h3>Alimentação</h3><br>

                        <label class="required">Come com os dedos?</label><br>
                        <label for="come_com_os_dedos">Sim</label>
                        <input value="1" type="radio" name="come_com_os_dedos" id="come_com_os_dedos" {{ g_old_checked($avaliacao, "come_com_os_dedos", "1") }}>
                        <label for="come_com_os_dedos">Não</label>
                        <input value="0" type="radio" name="come_com_os_dedos" id="come_com_os_dedos" {{ g_old_checked($avaliacao, "come_com_os_dedos", "0") }}><br>

                        <label class="required">Come com garfo, colher?</label><br>
                        <label for="come_com_talheres">Sim</label>
                        <input value="1" type="radio" name="come_com_talheres" id="come_com_talheres" {{ g_old_checked($avaliacao, "come_com_talheres", "1") }}>
                        <label for="come_com_talheres">Não</label>
                        <input value="0" type="radio" name="come_com_talheres" id="come_com_talheres" {{ g_old_checked($avaliacao, "come_com_talheres", "0") }}><br>

                        <label class="required">Brinca com a comida?</label><br>
                        <label for="brinca_com_comida">Sim</label>
                        <input value="1" type="radio" name="brinca_com_comida" id="brinca_com_comida" {{ g_old_checked($avaliacao, "brinca_com_comida", "1") }}>
                        <label for="brinca_com_comida">Não</label>
                        <input value="0" type="radio" name="brinca_com_comida" id="brinca_com_comida" {{ g_old_checked($avaliacao, "brinca_com_comida", "0") }}><br>

                        <label class="required">Derrama a comida?</label><br>
                        <label for="derrama_comida">Sim</label>
                        <input value="1" type="radio" name="derrama_comida" id="derrama_comida" {{ g_old_checked($avaliacao, "derrama_comida", "1") }}>
                        <label for="derrama_comida">Não</label>
                        <input value="0" type="radio" name="derrama_comida" id="derrama_comida" {{ g_old_checked($avaliacao, "derrama_comida", "0") }}><br>

                        <label class="required">Usa qual mão para comer?</label><br>
                        <label for="usa_mao_direita_para_comer">Direita</label>
                        <input value="1" type="radio" name="usa_mao_direita_para_comer" id="usa_mao_direita_para_comer" {{ g_old_checked($avaliacao, "usa_mao_direita_para_comer", "1") }}>
                        <label for="usa_mao_direita_para_comer">Esquerda</label>
                        <input value="0" type="radio" name="usa_mao_direita_para_comer" id="usa_mao_direita_para_comer" {{ g_old_checked($avaliacao, "usa_mao_direita_para_comer", "0") }}><br>

                        <label class="required">Bebe em garrafa, copo?</label><br>
                        <label for="bebe_em_garrafa">Sim</label>
                        <input value="1" type="radio" name="bebe_em_garrafa" id="bebe_em_garrafa" {{ g_old_checked($avaliacao, "bebe_em_garrafa", "1") }}>
                        <label for="bebe_em_garrafa">Não</label>
                        <input value="0" type="radio" name="bebe_em_garrafa" id="bebe_em_garrafa" {{ g_old_checked($avaliacao, "bebe_em_garrafa", "0") }}><br>

                        <label class="required">Usa canudo?</label><br>
                        <label for="usa_canudo">Sim</label>
                        <input value="1" type="radio" name="usa_canudo" id="usa_canudo" {{ g_old_checked($avaliacao, "usa_canudo", "1") }}>
                        <label for="usa_canudo">Não</label>
                        <input value="0" type="radio" name="usa_canudo" id="usa_canudo" {{ g_old_checked($avaliacao, "usa_canudo", "0") }}><br>

                        <label class="required">Segura o copo ou garrafa com uma mão? ou Com as duas mãos?</label><br>
                        <input value="{{ g_old($avaliacao, "segura_copo_garrafa_com_uma_ou_duas_maos") }}" placeholder="Segura? Com uma ou duas?" type="text" name="segura_copo_garrafa_com_uma_ou_duas_maos" id="segura_copo_garrafa_com_uma_ou_duas_maos">

                        <label class="required">Ajuda a colocar a mesa, pratos?</label><br>
                        <label for="ajuda_a_colocar_a_mesa">Sim</label>
                        <input value="1" type="radio" name="ajuda_a_colocar_a_mesa" id="ajuda_a_colocar_a_mesa" {{ g_old_checked($avaliacao, "ajuda_a_colocar_a_mesa", "1") }}>
                        <label for="ajuda_a_colocar_a_mesa">Não</label>
                        <input value="0" type="radio" name="ajuda_a_colocar_a_mesa" id="ajuda_a_colocar_a_mesa" {{ g_old_checked($avaliacao, "ajuda_a_colocar_a_mesa", "0") }}><br>

                        <label class="required">Qual o tipo de alimentação usada?</label><br><br>
                        <textarea class="textareas_form" id="tipo_alimentacao" name="tipo_alimentacao" rows="4" cols="50" style="">{{ g_old($avaliacao, "tipo_alimentacao") }}</textarea><br><br>

                        <label class="required">Tem bom apetite?</label><br>
                        <label for="tem_bom_apetite">Sim</label>
                        <input value="1" type="radio" name="tem_bom_apetite" id="tem_bom_apetite" {{ g_old_checked($avaliacao, "tem_bom_apetite", "1") }}>
                        <label for="tem_bom_apetite">Não</label>
                        <input value="0" type="radio" name="tem_bom_apetite" id="tem_bom_apetite" {{ g_old_checked($avaliacao, "tem_bom_apetite", "0") }}><br>

                        <label class="required">O que mais gosta de comer?</label><br><br>
                        <textarea class="textareas_form" id="o_que_gosta_de_comer" name="o_que_gosta_de_comer" rows="4" cols="50" style="">{{ g_old($avaliacao, "o_que_gosta_de_comer") }}</textarea><br><br>

                        <label class="required">O que não gosta de comer?</label><br><br>
                        <textarea class="textareas_form" id="nao_gosta_de_comer" name="nao_gosta_de_comer" rows="4" cols="50" style="">{{ g_old($avaliacao, "nao_gosta_de_comer") }}</textarea><br><br>

                        <label class="required">Teve dificuldade de passar de pastoso para sólido?</label><br>
                        <label for="houve_dificuldade_transicao_pastoso_solido">Sim</label>
                        <input value="1" type="radio" name="houve_dificuldade_transicao_pastoso_solido" id="houve_dificuldade_transicao_pastoso_solido" {{ g_old_checked($avaliacao, "houve_dificuldade_transicao_pastoso_solido", "1") }}>
                        <label for="houve_dificuldade_transicao_pastoso_solido">Não</label>
                        <input value="0" type="radio" name="houve_dificuldade_transicao_pastoso_solido" id="houve_dificuldade_transicao_pastoso_solido" {{ g_old_checked($avaliacao, "houve_dificuldade_transicao_pastoso_solido", "0") }}><br>

                        <hr class="hr_form">
                        <h3>Vestuário</h3><br>

                        <label class="required">Gosta de vestir roupa?</label><br>
                        <label>Descreva tipo de roupa preferida? (tecido, vestido, short,...)</label><br>
                        <input value="{{ g_old($avaliacao, "gosta_de_vestir_roupa") }}" placeholder="Gosta de se vestir? Descreva" type="text" name="gosta_de_vestir_roupa" id="gosta_de_vestir_roupa">

                        <label class="required">Veste roupa sozinha? Quais peças?</label><br>
                        <input value="{{ g_old($avaliacao, "veste_roupa_sozinho_quais_pecas") }}" placeholder="Se veste só? Quais roupas?" type="text" name="veste_roupa_sozinho_quais_pecas" id="veste_roupa_sozinho_quais_pecas">

                        <label class="required">Tira a roupa sozinha? Quais peças?</label><br>
                        <input value="{{ g_old($avaliacao, "tira_roupa_sozinho_quais_pecas") }}" placeholder="Se despe só? Quais peças?" type="text" name="tira_roupa_sozinho_quais_pecas" id="tira_roupa_sozinho_quais_pecas">

                        <label class="required">Já abotoa?</label><br>
                        <label for="abotoa">Sim</label>
                        <input value="1" type="radio" name="abotoa" id="abotoa" {{ g_old_checked($avaliacao, "abotoa", "1") }}>
                        <label for="abotoa">Não</label>
                        <input value="0" type="radio" name="abotoa" id="abotoa" {{ g_old_checked($avaliacao, "abotoa", "0") }}><br>

                        <label class="required">Amarra?</label><br>
                        <label for="amarra">Sim</label>
                        <input value="1" type="radio" name="amarra" id="amarra" {{ g_old_checked($avaliacao, "amarra", "1") }}>
                        <label for="amarra">Não</label>
                        <input value="0" type="radio" name="amarra" id="amarra" {{ g_old_checked($avaliacao, "amarra", "0") }}><br>

                        <hr class="hr_form">
                        <h3>Higiene</h3><br>

                        <label class="required">Usa fralda?</label><br>
                        <label for="usa_fralda">Sim</label>
                        <input value="1" type="radio" name="usa_fralda" id="usa_fralda" {{ g_old_checked($avaliacao, "usa_fralda", "1") }}>
                        <label for="usa_fralda">Não</label>
                        <input value="0" type="radio" name="usa_fralda" id="usa_fralda" {{ g_old_checked($avaliacao, "usa_fralda", "0") }}><br>

                        <label class="required">Usa o vaso sanitário?</label><br>
                        <label for="usa_vaso_sanitario">Sim</label>
                        <input value="1" type="radio" name="usa_vaso_sanitario" id="usa_vaso_sanitario" {{ g_old_checked($avaliacao, "usa_vaso_sanitario", "1") }}>
                        <label for="usa_vaso_sanitario">Não</label>
                        <input value="0" type="radio" name="usa_vaso_sanitario" id="usa_vaso_sanitario" {{ g_old_checked($avaliacao, "usa_vaso_sanitario", "0") }}><br>

                        <label class="required">Lava as mãos, face e corpo?</label><br>
                        <label for="lava_maos_face_corpo">Sim</label>
                        <input value="1" type="radio" name="lava_maos_face_corpo" id="lava_maos_face_corpo" {{ g_old_checked($avaliacao, "lava_maos_face_corpo", "1") }}>
                        <label for="lava_maos_face_corpo">Não</label>
                        <input value="0" type="radio" name="lava_maos_face_corpo" id="lava_maos_face_corpo" {{ g_old_checked($avaliacao, "lava_maos_face_corpo", "0") }}><br>

                        <label class="required">Escova os dentes?</label><br>
                        <label for="escova_dentes">Sim</label>
                        <input value="1" type="radio" name="escova_dentes" id="escova_dentes" {{ g_old_checked($avaliacao, "escova_dentes", "1") }}>
                        <label for="escova_dentes">Não</label>
                        <input value="0" type="radio" name="escova_dentes" id="escova_dentes" {{ g_old_checked($avaliacao, "escova_dentes", "0") }}><br>

                        <label class="required">Se diverte com o banho?</label><br>
                        <label for="se_diverte_com_o_banho">Sim</label>
                        <input value="1" type="radio" name="se_diverte_com_o_banho" id="se_diverte_com_o_banho" {{ g_old_checked($avaliacao, "se_diverte_com_o_banho", "1") }}>
                        <label for="se_diverte_com_o_banho">Não</label>
                        <input value="0" type="radio" name="se_diverte_com_o_banho" id="se_diverte_com_o_banho" {{ g_old_checked($avaliacao, "se_diverte_com_o_banho", "0") }}><br>

                        <label class="required">Gosta de molhar a cabeça?</label><br>
                        <label for="gosta_molhar_cabeca">Sim</label>
                        <input value="1" type="radio" name="gosta_molhar_cabeca" id="gosta_molhar_cabeca" {{ g_old_checked($avaliacao, "gosta_molhar_cabeca", "1") }}>
                        <label for="gosta_molhar_cabeca">Não</label>
                        <input value="0" type="radio" name="gosta_molhar_cabeca" id="gosta_molhar_cabeca" {{ g_old_checked($avaliacao, "gosta_molhar_cabeca", "0") }}><br>

                        <label class="required">Enxuga-se?</label><br>
                        <label for="enxuga_se">Sim</label>
                        <input value="1" type="radio" name="enxuga_se" id="enxuga_se" {{ g_old_checked($avaliacao, "enxuga_se", "1") }}>
                        <label for="enxuga_se">Não</label>
                        <input value="0" type="radio" name="enxuga_se" id="enxuga_se" {{ g_old_checked($avaliacao, "enxuga_se", "0") }}><br>

                        <label class="required">Gosta de pentear os cabelos?:</label><br>
                        <label for="gosta_pentear_cabelos">Sim</label>
                        <input value="1" type="radio" name="gosta_pentear_cabelos" id="gosta_pentear_cabelos" {{ g_old_checked($avaliacao, "gosta_pentear_cabelos", "1") }}>
                        <label for="gosta_pentear_cabelos">Não</label>
                        <input value="0" type="radio" name="gosta_pentear_cabelos" id="gosta_pentear_cabelos" {{ g_old_checked($avaliacao, "gosta_pentear_cabelos", "0") }}><br>

                        <label class="required">Gosta de cortar os cabelos?</label><br>
                        <label for="gosta_cortar_cabelos">Sim</label>
                        <input value="1" type="radio" name="gosta_cortar_cabelos" id="gosta_cortar_cabelos" {{ g_old_checked($avaliacao, "gosta_cortar_cabelos", "1") }}>
                        <label for="gosta_cortar_cabelos">Não</label>
                        <input value="0" type="radio" name="gosta_cortar_cabelos" id="gosta_cortar_cabelos" {{ g_old_checked($avaliacao, "gosta_cortar_cabelos", "0") }}><br>

                        <label class="required">Gosta de cortar as unhas?</label><br>
                        <label for="gosta_cortar_unhas">Sim</label>
                        <input value="1" type="radio" name="gosta_cortar_unhas" id="gosta_cortar_unhas" {{ g_old_checked($avaliacao, "gosta_cortar_unhas", "1") }}>
                        <label for="gosta_cortar_unhas">Não</label>
                        <input value="0" type="radio" name="gosta_cortar_unhas" id="gosta_cortar_unhas" {{ g_old_checked($avaliacao, "gosta_cortar_unhas", "0") }}><br>

                        <hr class="hr_form">
                        <h3>Outras informações importantes:</h3><br>
                        <textarea class="textareas_form" id="info_extras_relevante" name="info_extras_relevante" rows="4" cols="50" style="">{{ g_old($avaliacao, "info_extras_relevante") }}</textarea><br><br>


                        <input type="submit" value="Salvar avaliação">

                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection

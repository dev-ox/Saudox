
@extends('layouts.mainlayout')
@section('content')

    @php
        function old_checked($obj, $valor, $teste) {
            return old($valor, $obj->$valor) == $teste ? "checked" : "";
        }

        function in_array_old($obj, $valor, $arr) {

            if(old($arr) && in_array($valor, old($arr))) {
                return "checked";
            }

            $arr_coisas = preg_split('/,/', $obj->$arr);

            if(in_array($valor, $arr_coisas)) {
                return "checked";
            }

            return "";

        }

        function old2($obj, $valor) {
            return old($valor, $obj->$valor);
        }
    @endphp

    <div class="container">
        <div class="row">
            <div class="espacador_mesma_altura_top_nav"></div>
            <div style="text-align: center; width: 100%;">
                <div class = "caixa_form">
                    <br>
                    <h1>Editar Anamnese Fonoaudiologica de {{$paciente->nome_paciente}}</h1>


                    <form method="post" action="{{route('profissional.anamnese.fonoaudiologia.editar.salvar')}}">
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
                        <input value="{{$anamnese->id}}" type="hidden"  name="id" id="id">
                        <input value="{{$paciente->id}}" type="hidden"  name="id_paciente" id="id_paciente">
                        <input value="{{Auth::id()}}" type="hidden"  name="id_profissional" id="id_profissional">

                        <hr class="hr_form">
                        <h3>Histórico de vida da criança</h3><br>

                        <label class="required">Posição no bloco familiar:</label><br>
                        <input value="{{ old2($anamnese, 'posicao_bloco_familiar') }}" placeholder="Posição" type="text" name="posicao_bloco_familiar" id="posicao_bloco_familiar">

                        <label class="required">Criança desejada?</label><br>
                        <label for="crianca_desejada">Sim</label>
                        <input value="1" type="radio" name="crianca_desejada" id="crianca_desejada" {{ old_checked($anamnese, "crianca_desejada", "1") }}>
                        <label for="crianca_desejada">Não</label>
                        <input value="0" type="radio" name="crianca_desejada" id="crianca_desejada" {{ old_checked($anamnese, "crianca_desejada", "0") }}><br>

                        <label class="required">Reação da criança em relação ao status da relação dos pais:</label><br>
                        <input value="{{ old2($anamnese, 'reacao_crianca_status_relacao_pais') }}" placeholder="Reação da criança" type="text" name="reacao_crianca_status_relacao_pais" id="reacao_crianca_status_relacao_pais">

                        <label class="required">Existiam expectativas em relação ao sexo da criança?</label><br>
                        <input value="{{ old2($anamnese, 'tinha_expectativa_em_relacao_ao_sexo_da_crianca') }}" placeholder="Sim, não? Qual?" type="text" name="tinha_expectativa_em_relacao_ao_sexo_da_crianca" id="tinha_expectativa_em_relacao_ao_sexo_da_crianca">

                        <label class="required">Duração da gestação:</label><br>
                        <input value="{{ old2($anamnese, 'duracao_da_gestacao') }}" placeholder="Tempo de gestação" type="text" name="duracao_da_gestacao" id="duracao_da_gestacao">

                        <label class="required">Fez pré natal?</label><br>
                        <input value="{{ old2($anamnese, 'fez_pre_natal') }}" placeholder="Sim? Não? Informações adicionais" type="text" name="fez_pre_natal" id="fez_pre_natal">

                        <label class="required">Tipo de parto:</label><br>
                        <label for="tipo_parto">Normal</label>
                        <input value="Normal" type="radio" name="tipo_parto" id="tipo_parto" {{ old_checked($anamnese, "tipo_parto", "Normal") }}>
                        <label for="tipo_parto">Cesariana</label>
                        <input value="Cesariana" type="radio" name="tipo_parto" id="tipo_parto" {{ old_checked($anamnese, "tipo_parto", "Cesariana") }}>
                        <label for="tipo_parto">Fórceps</label>
                        <input value="Fórceps" type="radio" name="tipo_parto" id="tipo_parto" {{ old_checked($anamnese, "tipo_parto", "Fórceps") }}><br>

                        <label class="required">Houveram complicações durante o parto?</label><br>
                        <input value="{{ old2($anamnese, 'complicacao_durante_parto') }}" placeholder="Sim? Não? Informações adicionais" type="text" name="complicacao_durante_parto" id="complicacao_durante_parto">

                        <label for="foi_necessario_utilizar_algum_recurso" class="required">Foi necessário algum recurso no parto?</label><br>
                        <input placeholder="Oxigênio, Ressuscitador, Transfusão Sanguínea...?" value="{{ old2($anamnese, "foi_necessario_utilizar_algum_recurso") }}" type="text" name="foi_necessario_utilizar_algum_recurso" id="foi_necessario_utilizar_algum_recurso"><br><br>

                        <hr class="hr_form">
                        <label for="mae_apresentou_algum_problema_durante_gravidez" class="required">Mãe apresentou algum problema durante a gestação?</label><br>
                        <input placeholder="Remédios Controlados, Emocional, Infecção(Rubéola, Sarampo)?" value="{{ old2($anamnese, "mae_apresentou_algum_problema_durante_gravidez") }}" type="text" name="mae_apresentou_algum_problema_durante_gravidez" id="mae_apresentou_algum_problema_durante_gravidez"><br><br>

                        <hr class="hr_form">
                        <label class="required">Amamentação:</label><br>
                        <label for="amamentacao_natural">Materna</label>
                        <input value="1" type="radio" name="amamentacao_natural" id="amamentacao_natural" {{ old_checked($anamnese, "amamentacao_natural", "1") }}>
                        <label for="amamentacao_natural">Artificial</label>
                        <input value="0" type="radio" name="amamentacao_natural" id="amamentacao_natural" {{ old_checked($anamnese, "amamentacao_natural", "0") }}><br>

                        <hr class="hr_form">
                        <label class="required">Atraso ou problema na fala:</label><br>
                        <label for="atraso_ou_problema_na_fala">Sim</label>
                        <input value="1" type="radio" name="atraso_ou_problema_na_fala" id="atraso_ou_problema_na_fala" {{ old_checked($anamnese, "atraso_ou_problema_na_fala", "1") }}>
                        <label for="atraso_ou_problema_na_fala">Não</label>
                        <input value="0" type="radio" name="atraso_ou_problema_na_fala" id="atraso_ou_problema_na_fala" {{ old_checked($anamnese, "atraso_ou_problema_na_fala", "0") }}>

                        <hr class="hr_form">
                        <label class="required">Tem enurese noturna?</label><br>
                        <label for="tem_enurese_noturna">Sim</label>
                        <input value="1" type="radio" name="tem_enurese_noturna" id="tem_enurese_noturna" {{ old_checked($anamnese, "tem_enurese_noturna", "1") }}>
                        <label for="tem_enurese_noturna">Não</label>
                        <input value="0" type="radio" name="tem_enurese_noturna" id="tem_enurese_noturna" {{ old_checked($anamnese, "tem_enurese_noturna", "0") }}><br>

                        <hr class="hr_form">
                        <label class="required">Desenvolvimento motor no tempo esperado:</label><br>
                        <label for="desenvolvimento_motor_no_tempo_esperado">Sim</label>
                        <input value="1" type="radio" name="desenvolvimento_motor_no_tempo_esperado" id="desenvolvimento_motor_no_tempo_esperado" {{ old_checked($anamnese, "desenvolvimento_motor_no_tempo_esperado", "1") }}>
                        <label for="desenvolvimento_motor_no_tempo_esperado">Não</label>
                        <input value="0" type="radio" name="desenvolvimento_motor_no_tempo_esperado" id="desenvolvimento_motor_no_tempo_esperado" {{ old_checked($anamnese, "desenvolvimento_motor_no_tempo_esperado", "0") }}><br>

                        <hr class="hr_form">
                        <label class="required">Perturbações (pesadelos, sonambulismo, agitação, etc.):</label><br>
                        <label for="perturbacoes_como_pesadelos_sonambulismo_agitacao_etc">Sim</label>
                        <input value="1" type="radio" name="perturbacoes_como_pesadelos_sonambulismo_agitacao_etc" id="perturbacoes_como_pesadelos_sonambulismo_agitacao_etc" {{ old_checked($anamnese, "perturbacoes_como_pesadelos_sonambulismo_agitacao_etc", "1") }}>
                        <label for="perturbacoes_como_pesadelos_sonambulismo_agitacao_etc">Não</label>
                        <input value="0" type="radio" name="perturbacoes_como_pesadelos_sonambulismo_agitacao_etc" id="perturbacoes_como_pesadelos_sonambulismo_agitacao_etc" {{ old_checked($anamnese, "perturbacoes_como_pesadelos_sonambulismo_agitacao_etc", "0") }}><br>

                        <hr class="hr_form">
                        <label class="required">Troca letras ou fonemas? Se sim, quais?</label><br>
                        <input value="{{ old2($anamnese, 'letras_ou_fonemas_trocados') }}" placeholder="Se sim, quais?" type="text" name="letras_ou_fonemas_trocados" id="letras_ou_fonemas_trocados">

                        <label class="required">Fatos que afetaram o desenvolvimento do(a) paciente (a) (acidentes, operações, traumas etc.) ou outras ocorrências:</label><br><br>
                        <textarea class="textareas_form" id="fatos_que_afetaram_o_desenvolvimento_do_paciente" name="fatos_que_afetaram_o_desenvolvimento_do_paciente" rows="4" cols="50">{{ old2($anamnese, "fatos_que_afetaram_o_desenvolvimento_do_paciente") }}</textarea><br><br>

                        <label class="required">Até que idade usou chupeta?</label><br>
                        <input value="{{ old2($anamnese, 'ate_quantos_anos_usou_chupetas') }}" placeholder="Ex:. 8 meses" type="text" name="ate_quantos_anos_usou_chupetas" id="ate_quantos_anos_usou_chupetas">

                        <label class="required">A criança faz ou já fez algum tipo de tratamento fonoaudiológico?</label><br>
                        <label for="ja_fez_tratamento_fonoaudiologo">Sim</label>
                        <input value="1" type="radio" name="ja_fez_tratamento_fonoaudiologo" id="ja_fez_tratamento_fonoaudiologo" {{ old_checked($anamnese, "ja_fez_tratamento_fonoaudiologo", "1") }}>
                        <label for="ja_fez_tratamento_fonoaudiologo">Não</label>
                        <input value="0" type="radio" name="ja_fez_tratamento_fonoaudiologo" id="ja_fez_tratamento_fonoaudiologo" {{ old_checked($anamnese, "ja_fez_tratamento_fonoaudiologo", "0") }}><br>

                        <label class="required">Onde fez o tratamento fonoaudiológico?</label><br>
                        <input value="{{ old2($anamnese, 'se_sim_tratamento_fono_anterior_onde') }}" placeholder="Onde?" type="text" name="se_sim_tratamento_fono_anterior_onde" id="se_sim_tratamento_fono_anterior_onde">

                        <label class="required">Quando fez o tratamento fonoaudiologico?</label><br>
                        <input value="{{ old2($anamnese, 'se_sim_tratamento_fono_anterior_quando') }}" placeholder="Quando?" type="text" name="se_sim_tratamento_fono_anterior_quando" id="se_sim_tratamento_fono_anterior_quando">


                        <hr class="hr_form">
                        <h3>Estado atual do paciente</h3><br>
                        <label class="required">Dificuldade na fala:</label><br>
                        <input value="{{ old2($anamnese, 'dificuldades_na_fala') }}" placeholder="Quais?" type="text" name="dificuldades_na_fala" id="dificuldades_na_fala">

                        <label class="required">Dificuldade na visão:</label><br>
                        <input value="{{ old2($anamnese, 'dificuldades_na_visao') }}" placeholder="Quais?" type="text" name="dificuldades_na_visao" id="dificuldades_na_visao">

                        <label class="required">Dificuldade na locomoção:</label><br>
                        <input value="{{ old2($anamnese, 'dificuldades_na_locomocao') }}" placeholder="Quais?" type="text" name="dificuldades_na_locomocao" id="dificuldades_na_locomocao">

                        <label class="required">O paciente apresenta algum problema de saúde?</label><br><br>
                        <textarea class="textareas_form" id="problemas_de_saude" name="problemas_de_saude" rows="4" cols="50" style="">{{ old2($anamnese, "problemas_de_saude") }}</textarea><br><br>

                        <label class="required">Toma ou já tomou algum remédio controlado?</label><br><br>
                        <textarea class="textareas_form" id="toma_ou_ja_tomou_remedio_controlado_se_sim_quais" name="toma_ou_ja_tomou_remedio_controlado_se_sim_quais" rows="4" cols="50" style="">{{ old2($anamnese, "toma_ou_ja_tomou_remedio_controlado_se_sim_quais") }}</textarea><br>

                        <hr class="hr_form">
                        <h3>É dependente em quais nas AVDs (atividades de vida diária)?</h3><br>
                        <label class="required">Toma banho sozinho:</label><br>
                        <label for="toma_banho_sozinho">Sim</label>
                        <input value="1" type="radio" name="toma_banho_sozinho" id="toma_banho_sozinho" {{ old_checked($anamnese, "toma_banho_sozinho", "1") }}>
                        <label for="toma_banho_sozinho">Não</label>
                        <input value="0" type="radio" name="toma_banho_sozinho" id="toma_banho_sozinho" {{ old_checked($anamnese, "toma_banho_sozinho", "0") }}><br>

                        <label class="required">Escova os dentes sozinho:</label><br>
                        <label for="escova_os_dentes_sozinho">Sim</label>
                        <input value="1" type="radio" name="escova_os_dentes_sozinho" id="escova_os_dentes_sozinho" {{old_checked($anamnese, "escova_os_dentes_sozinho", "1")}}>
                        <label for="escova_os_dentes_sozinho">Não</label>
                        <input value="0" type="radio" name="escova_os_dentes_sozinho" id="escova_os_dentes_sozinho" {{ old_checked($anamnese, "escova_os_dentes_sozinho", "0") }}><br>

                        <label class="required">Usa o banheiro sozinho:</label><br>
                        <label for="usa_o_banheiro_sozinho">Sim</label>
                        <input value="1" type="radio" name="usa_o_banheiro_sozinho" id="usa_o_banheiro_sozinho" {{ old_checked($anamnese, "usa_o_banheiro_sozinho", "1") }}>
                        <label for="usa_o_banheiro_sozinho">Não</label>
                        <input value="0" type="radio" name="usa_o_banheiro_sozinho" id="usa_o_banheiro_sozinho" {{ old_checked($anamnese, "usa_o_banheiro_sozinho", "0") }}><br>

                        <label class="required">Necessita auxílio para se vestir ou despir:</label><br>
                        <label for="necessita_de_auxilio_para_se_vestir_ou_despir">Sim</label>
                        <input value="1" type="radio" name="necessita_de_auxilio_para_se_vestir_ou_despir" id="necessita_de_auxilio_para_se_vestir_ou_despir" {{ old_checked($anamnese, "necessita_de_auxilio_para_se_vestir_ou_despir", "1") }}>
                        <label for="necessita_de_auxilio_para_se_vestir_ou_despir">Não</label>
                        <input value="0" type="radio" name="necessita_de_auxilio_para_se_vestir_ou_despir" id="necessita_de_auxilio_para_se_vestir_ou_despir" {{ old_checked($anamnese, "necessita_de_auxilio_para_se_vestir_ou_despir", "0") }}><br>


                        <hr class="hr_form">
                        <h3>Tendencias próprias</h3><br>
                        <label class="required">Atende intervenções quando está desobedecendo:</label><br>
                        <label for="atende_as_intervencoes_quando_esta_desobedecendo">Sim</label>
                        <input value="1" type="radio" name="atende_as_intervencoes_quando_esta_desobedecendo" id="atende_as_intervencoes_quando_esta_desobedecendo" {{ old_checked($anamnese, "atende_as_intervencoes_quando_esta_desobedecendo", "1") }}>
                        <label for="atende_as_intervencoes_quando_esta_desobedecendo">Não</label>
                        <input value="0" type="radio" name="atende_as_intervencoes_quando_esta_desobedecendo" id="atende_as_intervencoes_quando_esta_desobedecendo" {{ old_checked($anamnese, "atende_as_intervencoes_quando_esta_desobedecendo", "0") }}><br>

                        <label class="required">Chora fácil:</label><br>
                        <label for="chora_facil">Sim</label>
                        <input value="1" type="radio" name="chora_facil" id="chora_facil" {{ old_checked($anamnese, "chora_facil", "1") }}>
                        <label for="chora_facil">Não</label>
                        <input value="0" type="radio" name="chora_facil" id="chora_facil" {{ old_checked($anamnese, "chora_facil", "0") }}><br>

                        <label class="required">Recusa auxílio:</label><br>
                        <label for="recusa_auxilio">Sim</label>
                        <input value="1" type="radio" name="recusa_auxilio" id="recusa_auxilio" {{ old_checked($anamnese, "recusa_auxilio", "1") }}>
                        <label for="recusa_auxilio">Não</label>
                        <input value="0" type="radio" name="recusa_auxilio" id="recusa_auxilio" {{ old_checked($anamnese, "recusa_auxilio", "0") }}><br>

                        <label class="required">Resistência ao toque (Afago, carinho):</label><br>
                        <input value="{{ old2($anamnese, 'tem_resistencia_ao_toque') }}" placeholder="Se sim, quais?" type="text" name="tem_resistencia_ao_toque" id="tem_resistencia_ao_toque">

                        <hr class="hr_form">
                        <h3>Escolaridade</h3><br>
                        <label class="required">Qual a série atual?</label><br>
                        <input value="{{ old2($anamnese, 'serie_atual_na_escola') }}" placeholder="Série atual" type="text" name="serie_atual_na_escola" id="serie_atual_na_escola">

                        <label class="required">Alfabetizada?</label><br>
                        <label for="alfabetizada">Sim</label>
                        <input value="1" type="radio" name="alfabetizada" id="alfabetizada" {{ old_checked($anamnese, "alfabetizada", "1") }}>
                        <label for="alfabetizada">Não</label>
                        <input value="0" type="radio" name="alfabetizada" id="alfabetizada" {{ old_checked($anamnese, "alfabetizada", "0") }}><br><br>

                        <label class="required">Possui dificuldades de aprendizagem?</label><br><br>
                        <textarea class="textareas_form" id="tem_dificuldades_de_aprendizagem" name="tem_dificuldades_de_aprendizagem" rows="4" cols="50" style="">{{ old2($anamnese, "tem_dificuldades_de_aprendizagem") }}</textarea><br><br>

                        <label class="required">Já repetiu alguma série?</label><br>
                        <label for="repetiu_algum_ano">Sim</label>
                        <input value="1" type="radio" name="repetiu_algum_ano" id="repetiu_algum_ano" {{ old_checked($anamnese, "repetiu_algum_ano", "1") }}>
                        <label for="repetiu_algum_ano">Não</label>
                        <input value="0" type="radio" name="repetiu_algum_ano" id="repetiu_algum_ano" {{ old_checked($anamnese, "repetiu_algum_ano", "0") }}><br>

                        <hr class="hr_form">
                        <h3>Sociabilidade</h3><br>
                        <label class="required">Faz amigos com facilidade?</label><br>
                        <input value="{{ old2($anamnese, 'faz_amigos_com_facilidade') }}" placeholder="Descreva" type="text" name="faz_amigos_com_facilidade" id="faz_amigos_com_facilidade">

                        <label class="required">Adapta-se facilmente ao meio?</label><br>
                        <input value="{{ old2($anamnese, 'adapta_se_facilmente_ao_meio') }}" placeholder="Descreva" type="text" name="adapta_se_facilmente_ao_meio" id="adapta_se_facilmente_ao_meio">

                        <label class="required">Companheiros da criança nas brincadeiras:</label><br>
                        <label for="companheiros_da_crianca_nas_brincadeiras">Mesmo Sexo</label>
                        <input value="Mesmo Sexo" type="checkbox" name="companheiros_da_crianca_nas_brincadeiras[1]" id="mesmo_sexo" {{ in_array_old($anamnese, "Mesmo Sexo", "companheiros_da_crianca_nas_brincadeiras") }}>
                        <label for="companheiros_da_crianca_nas_brincadeiras">Sexo Oposto</label>
                        <input value="Sexo Oposto" type="checkbox" name="companheiros_da_crianca_nas_brincadeiras[2]" id="sexo_oposto"  {{ in_array_old($anamnese, "Sexo Oposto", "companheiros_da_crianca_nas_brincadeiras") }} >
                        <label for="companheiros_da_crianca_nas_brincadeiras">Criança da Mesma Idade</label>
                        <input value="Criança da Mesma Idade" type="checkbox" name="companheiros_da_crianca_nas_brincadeiras[3]" id="mesma_idade"{{ in_array_old($anamnese, "Criança da Mesma Idade", "companheiros_da_crianca_nas_brincadeiras") }} ><br>
                        <label for="companheiros_da_crianca_nas_brincadeiras">Criança Mais Nova</label>
                        <input value="Criança Mais Nova" type="checkbox" name="companheiros_da_crianca_nas_brincadeiras[4]" id="mais_nova"{{ in_array_old($anamnese, "Criança Mais Nova", "companheiros_da_crianca_nas_brincadeiras") }} >
                        <label for="companheiros_da_crianca_nas_brincadeiras">Criança Mais Velha</label>
                        <input value="Criança Mais Velha" type="checkbox" name="companheiros_da_crianca_nas_brincadeiras[5]" id="mais_velha"{{ in_array_old($anamnese, "Criança Mais Velha", "companheiros_da_crianca_nas_brincadeiras") }} >
                        <br>

                        <label for="distracoes_preferidas" class="required">Distrações preferidas:</label><br>
                        <input value="{{ old2($anamnese, 'distracoes_preferidas') }}" placeholder="Distrações favoritas (Televisão, Música, Celular, Brinquedos)..." type="text" name="distracoes_preferidas" id="distracoes_preferidas">


                        <label class="required">Atitudes sociais predominantes:</label><br>
                        <label for="atitudes_sociais_predominantes">Obediente</label>
                        <input value="Obediente" type="checkbox" name="atitudes_sociais_predominantes[1]" id="obediente" {{ in_array_old($anamnese, "Obediente", "atitudes_sociais_predominantes") }}>
                        <label for="atitudes_sociais_predominantes">Independente</label>
                        <input value="Independente" type="checkbox" name="atitudes_sociais_predominantes[2]" id="independente" {{ in_array_old($anamnese, "Independente", "atitudes_sociais_predominantes") }}>
                        <label for="atitudes_sociais_predominantes">Comunicativo</label>
                        <input value="Comunicativo" type="checkbox" name="atitudes_sociais_predominantes[3]" id="comunicativo" {{ in_array_old($anamnese, "Comunicativo", "atitudes_sociais_predominantes") }}><br>
                        <label for="atitudes_sociais_predominantes">Agressivo</label>
                        <input value="Agressivo" type="checkbox" name="atitudes_sociais_predominantes[4]" id="agressivo" {{ in_array_old($anamnese, "Agressivo", "atitudes_sociais_predominantes") }}>
                        <label for="atitudes_sociais_predominantes">Cooperador</label>
                        <input value="Cooperador" type="checkbox" name="atitudes_sociais_predominantes[5]" id="cooperador" {{ in_array_old($anamnese, "Cooperador", "atitudes_sociais_predominantes") }}><br><br>

                        <label class="required">Emocionais:</label><br>
                        <label for="comportamento_emocional">Tranquilo</label>
                        <input value="Tranquilo" type="checkbox" name="comportamento_emocional[1]" id="tranquilo" {{ in_array_old($anamnese, "Tranquilo", "comportamento_emocional") }}>
                        <label for="comportamento_emocional">Seguro</label>
                        <input value="Seguro" type="checkbox" name="comportamento_emocional[2]" id="seguro" {{ in_array_old($anamnese, "Seguro", "comportamento_emocional") }}>
                        <label for="comportamento_emocional">Ansioso</label>
                        <input value="Ansioso" type="checkbox" name="comportamento_emocional[3]" id="ansioso" {{ in_array_old($anamnese, "Ansioso", "comportamento_emocional") }}><br>
                        <label for="comportamento_emocional">Alegre</label>
                        <input value="Alegre" type="checkbox" name="comportamento_emocional[4]" id="alegre" {{ in_array_old($anamnese, "Alegre", "comportamento_emocional") }}>
                        <label for="comportamento_emocional">Emotivo</label>
                        <input value="Emotivo" type="checkbox" name="comportamento_emocional[5]" id="emotivo" {{ in_array_old($anamnese, "Emotivo", "comportamento_emocional") }}>
                        <label for="comportamento_emocional">Queixoso</label>
                        <input value="Queixoso" type="checkbox" name="comportamento_emocional[6]" id="queixoso" {{ in_array_old($anamnese, "Queixoso", "comportamento_emocional") }}><br><br>

                        <label class="required">Sono:</label><br>
                        <label for="comportamento_sono">Insônia</label>
                        <input value="Insônia" type="checkbox" name="comportamento_sono[1]" id="insonia" {{ in_array_old($anamnese, "Insônia", "comportamento_sono") }}>
                        <label for="comportamento_sono">Pesadelos</label>
                        <input value="Pesadelos" type="checkbox" name="comportamento_sono[2]" id="pesadelos" {{ in_array_old($anamnese, "Pesadelos", "comportamento_sono") }}>
                        <label for="comportamento_sono">Hipersonia</label>
                        <input value="Hipersonia" type="checkbox" name="comportamento_sono[3]" id="hipersonia" {{ in_array_old($anamnese, "Hipersonia", "comportamento_sono") }}><br>


                        <label class="required" for="dorme_sozinho">Dorme sozinho</label>
                        <label for="dorme_sozinho">Sim</label>
                        <input value="1" type="radio" name="dorme_sozinho" id="dorme_sozinho" {{ old_checked($anamnese, "dorme_sozinho", "1") }}>
                        <label for="dorme_sozinho">Não</label>
                        <input value="0" type="radio" name="dorme_sozinho" id="dorme_sozinho" {{ old_checked($anamnese, "dorme_sozinho", "0") }}>

                        <br>

                        <label class="required" for="dorme_no_quarto_dos_pais">Dorme no quarto dos pais</label>
                        <label for="dorme_no_quarto_dos_pais">Sim</label>
                        <input value="1" type="radio" name="dorme_no_quarto_dos_pais" id="dorme_no_quarto_dos_pais" {{ old_checked($anamnese, "dorme_no_quarto_dos_pais", "1") }}>
                        <label for="dorme_no_quarto_dos_pais">Não</label>
                        <input value="0" type="radio" name="dorme_no_quarto_dos_pais" id="dorme_no_quarto_dos_pais" {{ old_checked($anamnese, "dorme_no_quarto_dos_pais", "0") }}>

                        <hr class="hr_form">
                        <h3 class="required">Medidas disciplinares empregadas pelos pais:</h3><br>
                        <textarea class="textareas_form" id="medidas_disciplinares_empregadas_pelos_pais" name="medidas_disciplinares_empregadas_pelos_pais" rows="4" cols="50" style="">{{ old2($anamnese, "medidas_disciplinares_empregadas_pelos_pais") }}</textarea>


                        <hr class="hr_form">
                        <h3 class="required">Outras Ocorrências:</h3><br>
                        <textarea class="textareas_form" id="outras_ocorrencias_observacoes" name="outras_ocorrencias_observacoes" rows="4" cols="50" style="">{{ old2($anamnese, "outras_ocorrencias_observacoes") }}</textarea>



                        <input type="submit" value="Cadastrar">

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

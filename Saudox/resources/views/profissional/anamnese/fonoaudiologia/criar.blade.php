@extends('layouts.mainlayout')
@section('content')


    <div class="container">
        <div class="row">
            <div class="espacador_mesma_altura_top_nav"></div>
            <div style="text-align: center; width: 100%;">
                <div class = "caixa_form">
                    <br>
                    <h1>Anamnese Fonoaudiologica de {{$paciente->nome_paciente}}</h1>


                    <form method="post" action="{{route('profissional.anamnese.fonoaudiologia.salvar')}}">
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

                        <hr class="hr_form">
                        <h3>Histórico de vida da criança</h3><br>

                        <label class="required">Posição no bloco familiar:</label><br>
                        <input value="{{ old('posicao_bloco_familiar') }}" placeholder="Posição" type="text" name="posicao_bloco_familiar" id="posicao_bloco_familiar">

                        <label class="required">Criança desejada?</label><br>
                        <label for="crianca_desejada">Sim</label>
                        <input value="Sim" type="radio" name="crianca_desejada" id="crianca_desejada">
                        <label for="crianca_desejada">Não</label>
                        <input value="Não" type="radio" name="crianca_desejada" id="crianca_desejada"><br>

                        <label class="required">Reação da criança em relação ao status da relação dos pais:</label><br>
                        <input value="{{ old('reacao_crianca_status_relacao_pais') }}" placeholder="Reação da criança" type="text" name="reacao_crianca_status_relacao_pais" id="reacao_crianca_status_relacao_pais">

                        <label class="required">Existiam expectativas em relação ao sexo da criança?</label><br>
                        <input value="{{ old('tinha_expectativa_em_relacao_ao_sexo_da_crianca') }}" placeholder="Sim, não? Qual?" type="text" name="tinha_expectativa_em_relacao_ao_sexo_da_crianca" id="tinha_expectativa_em_relacao_ao_sexo_da_crianca">

                        <label class="required">Duração da gestação:</label><br>
                        <input value="{{ old('duracao_da_gestacao') }}" placeholder="Tempo de gestação" type="text" name="duracao_da_gestacao" id="duracao_da_gestacao">

                        <label class="required">Fez pré natal?</label><br>
                        <input value="{{ old('fez_pre_natal') }}" placeholder="Sim? Não? Informações adicionais" type="text" name="fez_pre_natal" id="fez_pre_natal">

                        <label class="required">Tipo de parto:</label><br>
                        <label for="tipo_parto">Normal</label>
                        <input value="Normal" type="radio" name="tipo_parto" id="tipo_parto">
                        <label for="tipo_parto">Cesariana</label>
                        <input value="Cesariana" type="radio" name="tipo_parto" id="tipo_parto">
                        <label for="tipo_parto">Fórceps</label>
                        <input value="Fórceps" type="radio" name="tipo_parto" id="tipo_parto"><br>

                        <label class="required">Houveram complicações durante o parto?</label><br>
                        <input value="{{ old('complicacao_durante_parto') }}" placeholder="Sim? Não? Informações adicionais" type="text" name="complicacao_durante_parto" id="complicacao_durante_parto">

                        <label class="required">Foi necessário algum recurso?</label><br>
                        <label for="foi_necessario_utilizar_algum_recurso">Oxigênio</label>
                        <input value="Oxigênio" type="checkbox" name="foi_necessario_utilizar_algum_recurso[1]" id="foi_necessario_utilizar_algum_recurso">
                        <label for="foi_necessario_utilizar_algum_recurso">Ressuscitador</label>
                        <input value="Ressuscitador" type="checkbox" name="foi_necessario_utilizar_algum_recurso[2]" id="foi_necessario_utilizar_algum_recurso"><br>
                        <label for="foi_necessario_utilizar_algum_recurso">Transfusão Sanguínea</label>
                        <input value="Transfusão Sanguínea" type="checkbox" name="foi_necessario_utilizar_algum_recurso[3]" id="foi_necessario_utilizar_algum_recurso">
                        <label for="foi_necessario_utilizar_algum_recurso">Outros</label>
                        <input value="Outros" type="checkbox" name="foi_necessario_utilizar_algum_recurso[4]" id="foi_necessario_utilizar_algum_recurso"><br><br>

                        <label class="required">Mãe apresentou algum problema durante a gestação?</label><br>
                        <label for="mae_apresentou_algum_problema_durante_gravidez">Emocional</label>
                        <input value="Emocional" type="checkbox" name="mae_apresentou_algum_problema_durante_gravidez[1]" id="mae_apresentou_algum_problema_durante_gravidez">
                        <label for="mae_apresentou_algum_problema_durante_gravidez">Queda mês</label>
                        <input value="Queda mês" type="checkbox" name="mae_apresentou_algum_problema_durante_gravidez[2]" id="mae_apresentou_algum_problema_durante_gravidez">
                        <label for="mae_apresentou_algum_problema_durante_gravidez">Medicamentos controlados</label>
                        <input value="Medicamentos controlados" type="checkbox" name="mae_apresentou_algum_problema_durante_gravidez[3]" id="mae_apresentou_algum_problema_durante_gravidez"><br>
                        <label for="mae_apresentou_algum_problema_durante_gravidez">Infecção</label>
                        <input value="Infecção" type="checkbox" name="mae_apresentou_algum_problema_durante_gravidez[4]" id="mae_apresentou_algum_problema_durante_gravidez">
                        <label for="mae_apresentou_algum_problema_durante_gravidez">Rubéola</label>
                        <input value="Rubéola" type="checkbox" name="mae_apresentou_algum_problema_durante_gravidez[5]" id="mae_apresentou_algum_problema_durante_gravidez">
                        <label for="mae_apresentou_algum_problema_durante_gravidez">Sarampo</label>
                        <input value="Sarampo" type="checkbox" name="mae_apresentou_algum_problema_durante_gravidez[6]" id="mae_apresentou_algum_problema_durante_gravidez"><br>
                        <label for="mae_apresentou_algum_problema_durante_gravidez">Toxoplasmose</label>
                        <input value="Toxoplasmose" type="checkbox" name="mae_apresentou_algum_problema_durante_gravidez[7]" id="mae_apresentou_algum_problema_durante_gravidez">
                        <label for="mae_apresentou_algum_problema_durante_gravidez">Outros</label>
                        <input value="Outros" type="checkbox" name="mae_apresentou_algum_problema_durante_gravidez[8]" id="mae_apresentou_algum_problema_durante_gravidez"><br><br>

                        <label class="required">Amamentação:</label><br>
                        <label for="amamentacao_natural">Materna</label>
                        <input value="Materna" type="radio" name="amamentacao_natural" id="amamentacao_natural">
                        <label for="amamentacao_natural">Artificial</label>
                        <input value="Artificial" type="radio" name="amamentacao_natural" id="amamentacao_natural"><br>

                        <label class="required">Atraso ou problema na fala:</label><br>
                        <label for="atraso_ou_problema_na_fala">Sim</label>
                        <input value="Sim" type="radio" name="atraso_ou_problema_na_fala" id="atraso_ou_problema_na_fala">
                        <label for="atraso_ou_problema_na_fala">Não</label>
                        <input value="Não" type="radio" name="atraso_ou_problema_na_fala" id="atraso_ou_problema_na_fala"><br>

                        <label class="required">Tem enurese noturna?</label><br>
                        <label for="tem_enurese_noturna">Sim</label>
                        <input value="Sim" type="radio" name="tem_enurese_noturna" id="tem_enurese_noturna">
                        <label for="tem_enurese_noturna">Não</label>
                        <input value="Não" type="radio" name="tem_enurese_noturna" id="tem_enurese_noturna"><br>

                        <label class="required">Desenvolvimento motor no tempo esperado:</label><br>
                        <label for="desenvolvimento_motor_no_tempo_esperado">Sim</label>
                        <input value="Sim" type="radio" name="desenvolvimento_motor_no_tempo_esperado" id="desenvolvimento_motor_no_tempo_esperado">
                        <label for="desenvolvimento_motor_no_tempo_esperado">Não</label>
                        <input value="Não" type="radio" name="desenvolvimento_motor_no_tempo_esperado" id="desenvolvimento_motor_no_tempo_esperado"><br>

                        <label class="required">Perturbações (pesadelos, sonambulismo, agitação, etc.):</label><br>
                        <label for="perturbacoes_como_pesadelos_sonambulismo_agitacao_etc">Sim</label>
                        <input value="Sim" type="radio" name="perturbacoes_como_pesadelos_sonambulismo_agitacao_etc" id="perturbacoes_como_pesadelos_sonambulismo_agitacao_etc">
                        <label for="perturbacoes_como_pesadelos_sonambulismo_agitacao_etc">Não</label>
                        <input value="Não" type="radio" name="perturbacoes_como_pesadelos_sonambulismo_agitacao_etc" id="perturbacoes_como_pesadelos_sonambulismo_agitacao_etc"><br>

                        <label class="required">Troca letras ou fonemas?</label><br>
                        <label for="letras_ou_fonemas_trocados">Sim</label>
                        <input value="Sim" type="radio" name="letras_ou_fonemas_trocados" id="letras_ou_fonemas_trocados">
                        <label for="letras_ou_fonemas_trocados">Não</label>
                        <input value="Não" type="radio" name="letras_ou_fonemas_trocados" id="letras_ou_fonemas_trocados">
                        <input value="{{ old('letras_ou_fonemas_trocados') }}" placeholder="Se sim, quais?" type="text" name="letras_ou_fonemas_trocados-adicional" id="letras_ou_fonemas_trocados-adicional">

                        <label class="required">Fatos que afetaram o desenvolvimento do(a) paciente (a) (acidentes, operações, traumas etc.) ou outras ocorrências:</label><br><br>
                        <textarea class="textareas_form" id="fatos_que_afetaram_o_desenvolvimento_do_paciente" name="Fatos " rows="4" cols="50" style=""></textarea><br><br>

                        <label class="required">Até que idade usou chupeta?</label><br>
                        <input value="{{ old('ate_quantos_anos_usou_chupetas') }}" placeholder="Ex:. 8 meses" type="text" name="ate_quantos_anos_usou_chupetas" id="ate_quantos_anos_usou_chupetas">

                        <label class="required">A criança faz ou já fez algum tipo de tratamento fonoaudiológico?</label><br>
                        <label for="ja_fez_tratamento_fonoaudiologo">Sim</label>
                        <input value="Sim" type="radio" name="ja_fez_tratamento_fonoaudiologo" id="ja_fez_tratamento_fonoaudiologo">
                        <label for="ja_fez_tratamento_fonoaudiologo">Não</label>
                        <input value="Não" type="radio" name="ja_fez_tratamento_fonoaudiologo" id="ja_fez_tratamento_fonoaudiologo"><br>

                        <label class="required">Onde fez o tratamento fonoaudiológico?</label><br>
                        <input value="{{ old('se_sim_tratamento_fono_anterior_onde') }}" placeholder="Onde?" type="text" name="se_sim_tratamento_fono_anterior_onde" id="se_sim_tratamento_fono_anterior_onde">

                        <label class="required">Quando fez o tratamento fonoaudiologico?</label><br>
                        <input value="{{ old('se_sim_tratamento_fono_anterior_quando') }}" placeholder="Quando?" type="text" name="se_sim_tratamento_fono_anterior_quando" id="se_sim_tratamento_fono_anterior_quando">


                        <hr class="hr_form">
                        <h3>Estado atual do paciente</h3><br>
                        <label class="required">Dificuldade na fala:</label><br>
                        <label for="dificuldades_na_fala">Sim</label>
                        <input value="Sim" type="radio" name="dificuldades_na_fala" id="dificuldades_na_fala">
                        <label for="dificuldades_na_fala">Não</label>
                        <input value="Não" type="radio" name="dificuldades_na_fala" id="dificuldades_na_fala">
                        <input value="{{ old('dificuldades_na_fala') }}" placeholder="Quais?" type="text" name="dificuldades_na_fala-adicional" id="dificuldades_na_fala-adicional">

                        <label class="required">Dificuldade na visão:</label><br>
                        <label for="dificuldades_na_visao">Sim</label>
                        <input value="Sim" type="radio" name="dificuldades_na_visao" id="dificuldades_na_visao">
                        <label for="dificuldades_na_visao">Não</label>
                        <input value="Não" type="radio" name="dificuldades_na_visao" id="dificuldades_na_visao">
                        <input value="{{ old('dificuldades_na_visao') }}" placeholder="Quais?" type="text" name="dificuldades_na_visao-adicional" id="dificuldades_na_visao-adicional">


                        <label class="required">Dificuldade na locomoção:</label><br>
                        <label for="dificuldades_na_locomocao">Sim</label>
                        <input value="Sim" type="radio" name="dificuldades_na_locomocao" id="dificuldades_na_locomocao">
                        <label for="dificuldades_na_locomocao">Não</label>
                        <input value="Não" type="radio" name="dificuldades_na_locomocao" id="dificuldades_na_locomocao">
                        <input value="{{ old('dificuldades_na_locomocao') }}" placeholder="Quais?" type="text" name="dificuldades_na_locomocao-adicional" id="dificuldades_na_locomocao">

                        <label class="required">O paciente apresenta algum problema de saúde?</label><br><br>
                        <textarea class="textareas_form" id="problemas_de_saude" name="problemas_de_saude" rows="4" cols="50" style=""></textarea><br><br>

                        <label class="required">Toma ou já tomou algum remédio controlado?</label><br><br>
                        <textarea class="textareas_form" id="toma_ou_ja_tomou_remedio_controlado_se_sim_quais" name="toma_ou_ja_tomou_remedio_controlado_se_sim_quais" rows="4" cols="50" style=""></textarea><br>

                        <hr class="hr_form">
                        <h3>É dependente em quais nas AVDs (atividades de vida diária)?</h3><br>
                        <label class="required">Toma banho sozinho:</label><br>
                        <label for="toma_banho_sozinho">Sim</label>
                        <input value="Sim" type="radio" name="toma_banho_sozinho" id="toma_banho_sozinho">
                        <label for="toma_banho_sozinho">Não</label>
                        <input value="Não" type="radio" name="toma_banho_sozinho" id="toma_banho_sozinho"><br>

                        <label class="required">Escova os dentes sozinho:</label><br>
                        <label for="escova_os_dentes_sozinho">Sim</label>
                        <input value="Sim" type="radio" name="escova_os_dentes_sozinho" id="escova_os_dentes_sozinho">
                        <label for="escova_os_dentes_sozinho">Não</label>
                        <input value="Não" type="radio" name="escova_os_dentes_sozinho" id="escova_os_dentes_sozinho"><br>

                        <label class="required">Usa o banheiro sozinho:</label><br>
                        <label for="usa_o_banheiro_sozinho">Sim</label>
                        <input value="Sim" type="radio" name="usa_o_banheiro_sozinho" id="usa_o_banheiro_sozinho">
                        <label for="usa_o_banheiro_sozinho">Não</label>
                        <input value="Não" type="radio" name="usa_o_banheiro_sozinho" id="usa_o_banheiro_sozinho"><br>

                        <label class="required">Necessita auxílio para se vestir ou despir:</label><br>
                        <label for="necessita_de_auxilio_para_se_vestir_ou_despir">Sim</label>
                        <input value="Sim" type="radio" name="necessita_de_auxilio_para_se_vestir_ou_despir" id="necessita_de_auxilio_para_se_vestir_ou_despir">
                        <label for="necessita_de_auxilio_para_se_vestir_ou_despir">Não</label>
                        <input value="Não" type="radio" name="necessita_de_auxilio_para_se_vestir_ou_despir" id="necessita_de_auxilio_para_se_vestir_ou_despir"><br>


                        <hr class="hr_form">
                        <h3>Tendencias próprias</h3><br>
                        <label class="required">Atende intervenções quando está desobedecendo:</label><br>
                        <label for="atende_as_intervencoes_quando_esta_desobedecendo">Sim</label>
                        <input value="Sim" type="radio" name="atende_as_intervencoes_quando_esta_desobedecendo" id="atende_as_intervencoes_quando_esta_desobedecendo">
                        <label for="atende_as_intervencoes_quando_esta_desobedecendo">Não</label>
                        <input value="Não" type="radio" name="atende_as_intervencoes_quando_esta_desobedecendo" id="atende_as_intervencoes_quando_esta_desobedecendo"><br>

                        <label class="required">Chora fácil:</label><br>
                        <label for="chora_facil">Sim</label>
                        <input value="Sim" type="radio" name="chora_facil" id="chora_facil">
                        <label for="chora_facil">Não</label>
                        <input value="Não" type="radio" name="chora_facil" id="chora_facil"><br>

                        <label class="required">Recusa auxílio:</label><br>
                        <label for="recusa_auxílio">Sim</label>
                        <input value="Sim" type="radio" name="recusa_auxílio" id="recusa_auxílio">
                        <label for="recusa_auxílio">Não</label>
                        <input value="Não" type="radio" name="recusa_auxílio" id="recusa_auxílio"><br>

                        <label class="required">Resistência ao toque (Afago, carinho):</label><br>
                        <label for="tem_resistencia_ao_toque">Sim</label>
                        <input value="Sim" type="radio" name="tem_resistencia_ao_toque" id="tem_resistencia_ao_toque">
                        <label for="tem_resistencia_ao_toque">Não</label>
                        <input value="Não" type="radio" name="tem_resistencia_ao_toque" id="tem_resistencia_ao_toque">
                        <input value="{{ old('tem_resistencia_ao_toque') }}" placeholder="Informações Adicionais" type="text" name="tem_resistencia_ao_toque-adicional" id="tem_resistencia_ao_toque">

                        <hr class="hr_form">
                        <h3>Escolaridade</h3><br>
                        <label class="required">Qual a série atual?</label><br>
                        <input value="{{ old('serie_atual_na_escola') }}" placeholder="Série atual" type="text" name="serie_atual_na_escola" id="serie_atual_na_escola">

                        <label class="required">Alfabetizada?</label><br>
                        <label for="alfabetizada">Sim</label>
                        <input value="Sim" type="radio" name="alfabetizada" id="alfabetizada">
                        <label for="alfabetizada">Não</label>
                        <input value="Não" type="radio" name="alfabetizada" id="alfabetizada"><br><br>

                        <label class="required">Possui dificuldades de aprendizagem?</label><br><br>
                        <textarea class="textareas_form" id="tem_dificuldades_de_aprendizagem" name="tem_dificuldades_de_aprendizagem" rows="4" cols="50" style=""></textarea><br><br>

                        <label class="required">Já repetiu alguma série?</label><br>
                        <label for="repetiu_algum_ano">Sim</label>
                        <input value="Sim" type="radio" name="repetiu_algum_ano" id="repetiu_algum_ano">
                        <label for="repetiu_algum_ano">Não</label>
                        <input value="Não" type="radio" name="repetiu_algum_ano" id="repetiu_algum_ano"><br>

                        <hr class="hr_form">
                        <h3>Sociabilidade</h3><br>
                        <label class="required">Faz amigos com facilidade?</label><br>
                        <label for="faz_amigos_com_facilidade">Sim</label>
                        <input value="Sim" type="radio" name="faz_amigos_com_facilidade" id="faz_amigos_com_facilidade">
                        <label for="faz_amigos_com_facilidade">Não</label>
                        <input value="Não" type="radio" name="faz_amigos_com_facilidade" id="faz_amigos_com_facilidade">
                        <input value="{{ old('faz_amigos_com_facilidade') }}" placeholder="Informações Adicionais" type="text" name="faz_amigos_com_facilidade-adicional" id="faz_amigos_com_facilidade">

                        <label class="required">Adapta-se facilmente ao meio?</label><br>
                        <label for="adapta_se_facilmente_ao_meio">Sim</label>
                        <input value="Sim" type="radio" name="adapta_se_facilmente_ao_meio" id="adapta_se_facilmente_ao_meio">
                        <label for="adapta_se_facilmente_ao_meio">Não</label>
                        <input value="Não" type="radio" name="adapta_se_facilmente_ao_meio" id="adapta_se_facilmente_ao_meio">
                        <input value="{{ old('adapta_se_facilmente_ao_meio') }}" placeholder="Informações Adicionais" type="text" name="adapta_se_facilmente_ao_meio-adicional" id="adapta_se_facilmente_ao_meio">

                        <label class="required">Companheiros da criança nas brincadeiras:</label><br>
                        <label for="companheiros_da_crianca_nas_brincadeiras">Mesmo Sexo</label>
                        <input value="Mesmo Sexo" type="checkbox" name="companheiros_da_crianca_nas_brincadeiras[1]" id="mesmo_sexo">
                        <label for="companheiros_da_crianca_nas_brincadeiras">Sexo Oposto</label>
                        <input value="Sexo Oposto" type="checkbox" name="companheiros_da_crianca_nas_brincadeiras[2]" id="sexo_oposto">
                        <label for="companheiros_da_crianca_nas_brincadeiras">Criança da Mesma Idade</label>
                        <input value="Criança da Mesma Idade" type="checkbox" name="companheiros_da_crianca_nas_brincadeiras[3]" id="mesma_idade"><br>
                        <label for="companheiros_da_crianca_nas_brincadeiras">Criança Mais Nova</label>
                        <input value="Criança Mais Nova" type="checkbox" name="companheiros_da_crianca_nas_brincadeiras[4]" id="mais_nova">
                        <label for="companheiros_da_crianca_nas_brincadeiras">Criança Mais Velha</label>
                        <input value="Criança Mais Velha" type="checkbox" name="companheiros_da_crianca_nas_brincadeiras[5]" id="mais_velha">
                        <label for="companheiros_da_crianca_nas_brincadeiras">Nenhum</label>
                        <input value="Nenhum" type="checkbox" name="companheiros_da_crianca_nas_brincadeiras[6]" id="nenhum"><br>
                        <br>

                        <label class="required">Distrações preferidas:</label><br>
                        <label for="distracoes_preferidas">Televisão</label>
                        <input value="Televisão" type="checkbox" name="distracoes_preferidas[1]" id="televisao">
                        <label for="distracoes_preferidas">Música</label>
                        <input value="Música" type="checkbox" name="distracoes_preferidas[2]" id="musica">
                        <label for="distracoes_preferidas">Leitura</label>
                        <input value="Leitura" type="checkbox" name="distracoes_preferidas[3]" id="leitura"><br>
                        <label for="distracoes_preferidas">Celular</label>
                        <input value="Celular" type="checkbox" name="distracoes_preferidas[4]" id="celular">
                        <label for="distracoes_preferidas">Brinquedos</label>
                        <input value="Brinquedos" type="checkbox" name="distracoes_preferidas[5]" id="brinquedos">
                        <label for="distracoes_preferidas">Computador</label>
                        <input value="Computador" type="checkbox" name="distracoes_preferidas[6]" id="computador"><br>
                        <label for="distracoes_preferidas">Nenhuma</label>
                        <input value="Nenhum" type="checkbox" name="distracoes_preferidas[7]" id="nenhum"><br><br>
                        <label for="distracoes_preferidas">Outras distrações</label>
                        <input value="{{ old('distracoes_preferidas') }}" placeholder="Outras distrações" type="text" name="distracoes_preferidas-adicional" id="distracoes_preferidas">


                        <label class="required">Atitudes sociais predominantes:</label><br>
                        <label for="atitudes_sociais_predominantes">Obediente</label>
                        <input value="Obediente" type="checkbox" name="atitudes_sociais_predominantes[1]" id="obediente">
                        <label for="atitudes_sociais_predominantes">Independente</label>
                        <input value="Independente" type="checkbox" name="atitudes_sociais_predominantes[2]" id="independente">
                        <label for="atitudes_sociais_predominantes">Comunicativo</label>
                        <input value="Comunicativo" type="checkbox" name="atitudes_sociais_predominantes[3]" id="comunicativo"><br>
                        <label for="atitudes_sociais_predominantes">Agressivo</label>
                        <input value="Agressivo" type="checkbox" name="atitudes_sociais_predominantes[4]" id="agressivo">
                        <label for="atitudes_sociais_predominantes">Cooperador</label>
                        <input value="Cooperador" type="checkbox" name="atitudes_sociais_predominantes[5]" id="cooperador"><br><br>

                        <label class="required">Emocionais:</label><br>
                        <label for="comportamento_emocional">Tranquilo</label>
                        <input value="Tranquilo" type="checkbox" name="comportamento_emocional[1]" id="tranquilo">
                        <label for="comportamento_emocional">Seguro</label>
                        <input value="Seguro" type="checkbox" name="comportamento_emocional[2]" id="seguro">
                        <label for="comportamento_emocional">Ansioso</label>
                        <input value="Ansioso" type="checkbox" name="comportamento_emocional[3]" id="ansioso"><br>
                        <label for="comportamento_emocional">Alegre</label>
                        <input value="Alegre" type="checkbox" name="comportamento_emocional[4]" id="alegre">
                        <label for="comportamento_emocional">Emotivo</label>
                        <input value="Emotivo" type="checkbox" name="comportamento_emocional[5]" id="emotivo">
                        <label for="comportamento_emocional">Queixoso</label>
                        <input value="Queixoso" type="checkbox" name="comportamento_emocional[6]" id="queixoso"><br><br>

                        <label class="required">Sono:</label><br>
                        <label for="comportamento_sono">Insônia</label>
                        <input value="Insônia" type="checkbox" name="comportamento_sono[1]" id="insonia">
                        <label for="comportamento_sono">Pesadelos</label>
                        <input value="Pesadelos" type="checkbox" name="comportamento_sono[2]" id="pesadelos">
                        <label for="comportamento_sono">Hipersonia</label>
                        <input value="Hipersonia" type="checkbox" name="comportamento_sono[3]" id="hipersonia"><br>
                        <label for="comportamento_sono">Dorme sozinho</label>
                        <input value="Dorme sozinho" type="checkbox" name="comportamento_sono[4]" id="dorme_so">
                        <label for="comportamento_sono">Dorme no quarto dos pais</label>
                        <input value="Dorme no quarto dos pais" type="checkbox" name="comportamento_sono[5]" id="dorme_com_pais"><br><br>

                        <hr class="hr_form">
                        <h3 class="required">Medidas disciplinares empregadas pelos pais:</h3><br>
                        <textarea class="textareas_form" id="medidas_disciplinares_empregadas_pelos_pais" name="medidas_disciplinares_empregadas_pelos_pais" rows="4" cols="50" style=""></textarea>


                        <hr class="hr_form">
                        <h3 class="required">Outras Ocorrências:</h3><br>
                        <textarea class="textareas_form" id="outras_ocorrencias_observacoes" name="outras_ocorrencias_observacoes" rows="4" cols="50" style=""></textarea>



                        <input type="submit" value="Cadastrar">

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
